<?php

namespace ChenDingtalk\Clients;

/**
 * Class RoleClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/dnu5l1
 */
class RoleClient extends AbstractClient
{
    /**
     * 获取角色列表
     * @param int $offset
     * @param int $size
     * @return \StdClass
     */
    public function lists($offset = 0, $size = 20)
    {
        return $this->executeGet('topapi/role/list', compact('offset', 'size'));
    }

    /**
     * 获取角色下的员工列表
     * @param $role_id
     * @param int $offset
     * @param int $size
     * @return \StdClass
     */
    public function simpleList($role_id, $offset = 0, $size = 20)
    {
        return $this->executeGet('topapi/role/simplelist', compact('role_id', 'offset', 'size'));
    }

    /**
     * 获取角色组
     * @param $group_id
     * @return \StdClass
     */
    public function getRoleGroup($group_id)
    {
        return $this->executeGet('topapi/role/getrolegroup', compact('group_id'));
    }

    /**
     * 获取角色详情
     * @param $roleId
     * @return \StdClass
     */
    public function getRole($roleId)
    {
        return $this->executeGet('topapi/role/getrole', compact('roleId'));
    }

    /**
     * 创建角色
     * @param $roleName
     * @param $groupId
     * @return \StdClass
     */
    public function createRole($roleName, $groupId)
    {
        return $this->executePost('role/add_role', compact('roleName', 'groupId'));
    }

    /**
     *
     * 更新角色
     * @param $roleName
     * @param $roleId
     * @return \StdClass
     */
    public function updateRole($roleName, $roleId)
    {
        return $this->executePost('role/update_role', compact('roleName', 'roleId'));
    }

    /**
     * 删除角色
     * @param $role_id
     * @return \StdClass
     */
    public function deleteRole($role_id)
    {
        return $this->executePost('topapi/role/deleterole', compact('role_id'));
    }

    /**
     * 创建角色组
     * @param $name
     * @return \StdClass
     */
    public function createRoleGroup($name)
    {
        return $this->executePost('role/add_role_group', compact('name'));
    }

    /**
     * 批量增加员工角色
     * @param $roleIds
     * @param $userIds
     * @return \stdClass
     */
    public function createRolesForemps($roleIds, $userIds)
    {
        return $this->executePost('topapi/role/addrolesforemps', compact('roleIds', 'userIds'));
    }

    /**
     * 批量删除员工角色
     * @param $roleIds
     * @param $userIds
     * @return \StdClass
     */
    public function deleteRolesForemps($roleIds, $userIds)
    {
        return $this->executePost('topapi/role/removerolesforemps', compact('roleIds', 'userIds'));
    }
}