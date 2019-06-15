<?php

namespace ChenDingtalk\Clients;

/**
 * Class DepartmentClient
 * @package ChenDingtalk\Clients
 * @doc https://open-doc.dingtalk.com/microapp/serverapi2/dubakq
 */
class DepartmentClient extends AbstractClient
{
    /**
     * 获取子部门ID列表
     * @param int $id
     * @return \stdClass
     */
    public function listIds($id = 1)
    {
        return $this->executeGet('department/list_ids', compact('id'));
    }

    /**
     * 获取部门列表
     * @return \stdClass
     */
    public function lists()
    {
        return $this->executeGet('department/list');
    }

    /**
     * 获取部门详情
     * @param $id
     * @return \stdClass
     */
    public function get($id = 1)
    {
        return $this->executeGet('department/get', compact('id'));
    }

    /**
     * 查询部门的所有上级父部门路径
     * @param $id
     * @return \stdClass
     */
    public function listParentDeptsByDept($id = 1)
    {
        return $this->executeGet('department/list_parent_depts_by_dept', compact('id'));
    }

    /**
     * 查询指定用户的所有上级父部门路径
     * @param $userId
     * @return \stdClass
     */
    public function listParentDepts($userId)
    {
        return $this->executeGet('department/list_parent_depts', compact('userId'));
    }

    /**
     * 创建部门
     * @param $params
     * @return \stdClass
     */
    public function create($params)
    {
        return $this->executePost('department/create', $params);
    }

    /**
     * 更新部门
     * @param $params
     * @return \StdClass
     */
    public function update($params)
    {
        return $this->executePost('department/update', $params);
    }

    /**
     * 删除部门
     * @param $id
     * @return \StdClass
     */
    public function delete($id)
    {
        return $this->executeGet('department/delete', compact('id'));
    }
}
