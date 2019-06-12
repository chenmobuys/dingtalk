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
        return $this->executeGet('department/list_ids', compact('id'))->sub_dept_id_list;
    }

    /**
     * 获取部门列表
     * @return \stdClass
     */
    public function lists()
    {
        return $this->executeGet('department/list')->department;
    }

    /**
     * 获取部门详情
     * @param $id
     * @return \stdClass
     */
    public function get($id)
    {
        return $this->executeGet('department/get', compact('id'));
    }

    /**
     * 查询部门的所有上级父部门路径
     * @param $id
     * @return \stdClass
     */
    public function listParentDeptsByDept($id)
    {
        return $this->executeGet('department/list_parent_depts_by_dept', compact('id'))->parentIds;
    }

    /**
     * 查询指定用户的所有上级父部门路径
     * @param $userId
     * @return \stdClass
     */
    public function listParentDepts($userId)
    {
        return $this->executeGet('department/list_parent_depts', compact('userId'))->parentIds;
    }

    /**
     * 获取企业员工人数
     * @param int $onlyActive
     * @return \stdClass
     */
    public function getOrgUserCount($onlyActive = 0)
    {
        return $this->executeGet('department/get_org_user_count', compact('onlyActive'))->count;
    }

    /**
     * 创建部门
     * @param $params
     * @return \stdClass
     */
    public function create($params)
    {
        return $this->executePost('department/create', $params)->id;
    }

    /**
     * 更新部门
     * @param $params
     * @return boolean
     */
    public function update($params)
    {
        return $this->executePost('department/update', $params) ? true : false;
    }

    /**
     * 删除部门
     * @param $id
     * @return boolean
     */
    public function delete($id)
    {
        return $this->executeGet('department/delete', compact('id')) ? true : false;
    }
}
