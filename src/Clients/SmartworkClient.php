<?php

namespace ChenDingtalk\Clients;

/**
 * Class SmartworkClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/dt96kf
 */
class SmartworkClient extends AbstractClient
{
    /**
     * 获取员工花名册字段信息
     *
     * @param $userid_list
     * @param $field_filter_list
     * @return \stdClass
     */
    public function lists($userid_list, $field_filter_list = null)
    {
        return $this->executePost('topapi/smartwork/hrm/employee/list', compact('userid_list', 'field_filter_list'));
    }

    /**
     * 查询企业待入职员工列表
     *
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function queryPreentry($offset = 0, $size = 50)
    {
        return $this->executePost('topapi/smartwork/hrm/employee/querypreentry', compact('offset', 'size'));
    }

    /**
     * 查询企业在职员工列表
     *
     * @param string $status_list 在职员工子状态筛选，其他状态无效。2，试用期；3，正式；5，待离职；-1，无状态
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function queryOnJob($status_list = '2,3,5,-1', $offset = 0, $size = 20)
    {
        return $this->executePost('topapi/smartwork/hrm/employee/queryonjob', compact('status_list', 'offset', 'size'));
    }

    /**
     * 查询企业离职员工列表
     *
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function queryDimission($offset = 0, $size = 50)
    {
        return $this->executePost('topapi/smartwork/hrm/employee/querydimission', compact('offset', 'size'));
    }

    /**
     * 获取离职员工离职信息
     *
     * @param $userid_list
     * @return \stdClass
     */
    public function listDimission($userid_list)
    {
        return $this->executePost('topapi/smartwork/hrm/employee/listdimission', compact('userid_list'));
    }

    /**
     * 添加企业待入职员工
     * @param $name
     * @param $mobile
     * @param null $pre_entry_time
     * @param null $op_userid
     * @param null $extend_info
     * @return \stdClass
     */
    public function addPreentry($name, $mobile, $pre_entry_time = null, $op_userid = null, $extend_info = null)
    {
        $param = compact('name', 'mobile', 'op_userid', 'extend_info');
        return $this->executePost('topapi/smartwork/hrm/employee/addpreentry', compact('param'));
    }
}