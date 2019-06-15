<?php

namespace ChenDingtalk\Clients;

/**
 * Class AttendanceClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/bm4dlh
 */
class AttendanceClient extends AbstractClient
{
    /**
     * 企业考勤排班详情
     * @param $workDate
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function listSchedule($workDate, $offset = 0, $size = 200)
    {
        return $this->executePost('topapi/attendance/listschedule', compact('workDate', 'offset', 'size'));
    }

    /**
     * 企业考勤组详情
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function getSimpleGroups($offset = 0, $size = 10)
    {
        return $this->executePost('topapi/attendance/getsimplegroups', compact('offset', 'size'));
    }

    /**
     * 获取打卡详情
     * @param $userIds
     * @param $checkDateFrom
     * @param $checkDateTo
     * @param bool $isI18n
     * @return \stdClass
     */
    public function listRecord($userIds, $checkDateFrom, $checkDateTo, $isI18n = false)
    {
        return $this->executePost('attendance/listRecord', compact('userIds', 'checkDateFrom', 'checkDateTo', 'isI18n'));
    }

    /**
     * 获取打卡结果
     * @param $workDateFrom
     * @param $workDateTo
     * @param $userIdList
     * @param $offset
     * @param $limit
     * @param bool $isI18n
     * @return \stdClass
     */
    public function lists($workDateFrom, $workDateTo, $userIdList, $offset = 0, $limit = 50, $isI18n = false)
    {
        return $this->executePost('attendance/list', compact('workDateFrom', 'workDateTo', 'userIdList', 'offset', 'limit', 'isI18n'));
    }

    /**
     * 获取请假时长
     * @param $userid
     * @param $from_date
     * @param $to_date
     * @return \stdClass
     */
    public function getLeaveApproveDuration($userid, $from_date, $to_date)
    {
        return $this->executePost('topapi/attendance/getleaveapproveduration', compact('userid', 'from_date', 'to_date'));
    }

    /**
     * 查询请假状态
     * @param $userid_list
     * @param $start_time
     * @param $end_time
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function getLeaveStatus($userid_list, $start_time, $end_time, $offset = 0, $size = 20)
    {
        return $this->executePost('topapi/attendance/getleavestatus', compact('userid_list', 'start_time', 'end_time', 'offset', 'size'));
    }

    /**
     * 获取用户考勤组
     * @param $userid
     * @return \stdClass
     */
    public function getUserGroup($userid)
    {
        return $this->executePost('topapi/attendance/getusergroup', compact('userid'));
    }
}