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
     * @return mixed
     */
    public function getDeptMember($deptId)
    {
        return $this->executeGet('user/getDeptMember', compact('deptId'))->userIds;
    }

    /**
     * 获取部门用户
     * @param $department_id
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     * @return mixed
     */
    public function getSimpleList($department_id, $offset = 0, $size = 100, $order = 'custom', $lang = 'zh_CN')
    {
        return $this->executeGet('user/simplelist', compact('department_id', 'offset', 'size', 'order'))->userlist;
    }

    /**
     * 获取部门用户详情
     * @param $department_id
     * @param int $offset
     * @param int $size
     * @param string $order
     * @param string $lang
     * @return mixed
     */
    public function getListByPage($department_id, $offset = 0, $size = 100, $order = 'custom', $lang = 'zh_CN')
    {
        return $this->executeGet('user/listbypage', compact('department_id', 'offset', 'size', 'order'))->userlist;
    }

    /**
     * 获取管理员列表
     * @return mixed
     */
    public function getAdmin()
    {
        return $this->executeGet('user/get_admin')->admin_list;
    }

    /**
     * 获取管理员通讯录权限范围
     * @param $userid
     * @return mixed
     */
    public function getAdminScope($userid)
    {
        return $this->executeGet('topapi/user/get_admin_scope', compact('userid'))->dept_ids;
    }

    /**
     * 根据unionid获取userid
     * @param $unionid
     * @return mixed
     */
    public function getUseridByUnionid($unionid)
    {
        return $this->executeGet('user/getUseridByUnionid', compact('unionid'))->userid;
    }

    /**
     * 创建用户
     * @param $param
     * @return mixed
     */
    public function create($param)
    {
        return $this->executePost('user/create', $param)->userid;
    }

    /**
     * 更新用户
     * @param $param
     * @return bool
     */
    public function update($param)
    {
        return $this->executePost('user/update', $param) ? true : false;
    }

    /**
     * 删除用户
     * @param $userid
     * @return bool
     */
    public function delete($userid)
    {
        return $this->executeGet('user/delete', compact('userid')) ? true : false;
    }
}