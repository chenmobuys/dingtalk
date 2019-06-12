<?php


namespace ChenDingtalk\Clients;


/**
 * Class CheckinClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/uyr2ah
 */
class CheckinClient extends AbstractClient
{
    /**
     * 获取部门用户签到记录
     * @param $department_id
     * @param $start_time
     * @param $end_time
     * @param int $offset
     * @param int $size
     * @param null $order
     * @return \stdClass
     */
    public function record($department_id, $start_time, $end_time, $offset = 0, $size = 100, $order = null)
    {
        return $this->executeGet('checkin/record', compact('department_id', 'start_time', 'end_time', 'offset', 'size', 'order'))->data;
    }

    /**
     * 获取用户签到记录
     * @param $userid_list
     * @param $start_time
     * @param $end_time
     * @param int $cursor
     * @param int $size
     * @return \stdClass
     */
    public function recordGet($userid_list, $start_time, $end_time, $cursor = 0, $size = 100)
    {
        return $this->executePost('topapi/checkin/record/get', compact('userid_list', 'start_time', 'end_time', 'cursor', 'size'))->result;
    }


}