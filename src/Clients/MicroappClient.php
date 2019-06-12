<?php


namespace ChenDingtalk\Clients;


/**
 * Class MicroappClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/zc304p
 */
class MicroappClient extends AbstractClient
{
    /**
     * 获取应用列表
     * @return \stdClass
     */
    public function lists()
    {
        return $this->executePost('microapp/list')->appList;
    }

    /**
     * 获取员工可见的应用列表
     * @param $userid
     * @return \stdClass
     */
    public function listByUserid($userid)
    {
        return $this->executeGet('microapp/list_by_userid', compact('userid'))->appList;
    }

    /**
     * 获取应用的可见范围
     * @param $agentId
     * @return \stdClass
     */
    public function visibleScopes($agentId)
    {
        return $this->executePost('microapp/visible_scopes', compact('agentId'));
    }

    /**
     * 设置应用的可见范围
     * @param $agentId
     * @param bool $isHidden
     * @param null $deptVisibleScopes
     * @param null $userVisibleScopes
     * @return boolean
     */
    public function setVisibleScopes($agentId, $isHidden = false, $deptVisibleScopes = null, $userVisibleScopes = null)
    {
        return $this->executePost('microapp/set_visible_scopes', compact('agentId', 'isHidden', 'deptVisibleScopes', 'userVisibleScopes')) ? true : false;
    }


}