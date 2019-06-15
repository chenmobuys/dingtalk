<?php

namespace ChenDingtalk\Clients;

/**
 * Class UserClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/ege851
 */
/**
 * Class UserClient
 * @package ChenDingtalk\Clients
 */
class UserClient extends AbstractClient
{
    /**
     * 获取用户详情
     * @param $userid
     * @param string $lang
     * @return \stdClass
     */
    public function get($userid, $lang = 'zh_CN')
    {
        return $this->executeGet('user/get', compact('userid', 'lang'));
    }

    /**
     * 获取部门用户userid列表
     * @param $deptId
     * @return \StdClass
     */
    public function getDeptMember($deptId = 1)
    {
        return $this->executeGet('user/getDeptMember', compact('deptId'));
    }

    /**
     * 获取部门用户
     * @param $department_id
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     * @return \StdClass
     */
    public function getSimpleList($department_id = 1, $offset = 0, $size = 100, $order = 'custom', $lang = 'zh_CN')
    {
        return $this->executeGet('user/simplelist', compact('department_id', 'offset', 'size', 'order', 'lang'));
    }

    /**
     * 获取部门用户详情
     * @param $department_id
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     * @return \StdClass
     */
    public function getListByPage($department_id = 1, $offset = 0, $size = 100, $order = 'custom', $lang = 'zh_CN')
    {
        return $this->executeGet('user/listbypage', compact('department_id', 'offset', 'size', 'order', 'lang'));
    }

    /**
     * 获取管理员列表
     * @return \StdClass
     */
    public function getAdmin()
    {
        return $this->executeGet('user/get_admin');
    }

    /**
     * 获取管理员通讯录权限范围
     * @param $userid
     * @return \StdClass
     */
    public function getAdminScope($userid)
    {
        return $this->executeGet('topapi/user/get_admin_scope', compact('userid'));
    }

    /**
     * 根据unionid获取userid
     * @param $unionid
     * @return \StdClass
     */
    public function getUseridByUnionid($unionid)
    {
        return $this->executeGet('user/getUseridByUnionid', compact('unionid'));
    }

    /**
     * 获取企业员工人数
     * @param int $onlyActive
     * @return \stdClass
     */
    public function getOrgUserCount($onlyActive = 0)
    {
        return $this->executeGet('user/get_org_user_count', compact('onlyActive'));
    }

    /**
     * 创建用户
     * @param $params
     * @return \StdClass
     */
    public function create($params)
    {
        return $this->executePost('user/create', $params);
    }

    /**
     * 更新用户
     * @param $params
     * @return \StdClass
     */
    public function update($params)
    {
        return $this->executePost('user/update', $params);
    }

    /**
     * 删除用户
     * @param $userid
     * @return \StdClass
     */
    public function delete($userid)
    {
        return $this->executeGet('user/delete', compact('userid'));
    }
}