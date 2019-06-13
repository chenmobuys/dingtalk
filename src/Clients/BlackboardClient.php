<?php


namespace ChenDingtalk\Clients;

/**
 * Class BlackboardClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/knmd16
 */
class BlackboardClient extends AbstractClient
{
    /**
     * 获取用户公告数据
     * @param $userid
     * @return \stdClass
     */
    public function lists($userid)
    {
        return $this->executePost('topapi/blackboard/listtopten', compact('userid'));
    }
}