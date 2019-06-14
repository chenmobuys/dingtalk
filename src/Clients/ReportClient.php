<?php


namespace ChenDingtalk\Clients;


/**
 * Class ReportClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/uoufgd
 */
class ReportClient extends AbstractClient
{
    /**
     * 获取用户日志数据
     * @param $start_time
     * @param $end_time
     * @param int $cursor
     * @param int $size
     * @param null $template_name
     * @param null $userid
     * @return \StdClass
     */
    public function lists($start_time, $end_time, $cursor = 0, $size = 20, $template_name = null, $userid = null)
    {
        return $this->executePost('topapi/report/list', compact('start_time', 'end_time', 'cursor', 'size', 'template_name', 'userid'));
    }

    /**
     * 获取日志统计数据
     * @param $report_id
     * @return \stdClass
     */
    public function statisticsList($report_id)
    {
        return $this->executePost('topapi/report/statistics', compact('report_id'));
    }

    /**
     * 获取日志相关人员列表
     * @param $report_id
     * @param $type
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function statisticsListByType($report_id, $type, $offset = 0, $size = 100)
    {
        return $this->executePost('topapi/report/statistics/listbytype', compact('report_id', 'type', 'offset', 'size'));
    }

    /**
     * 获取日志接收人员列表
     * @param $report_id
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function receiverList($report_id, $offset = 0, $size = 100)
    {
        return $this->executePost('topapi/report/receiver/list', compact('report_id', 'offset', 'size'));
    }

    /**
     * 获取日志评论详情
     * @param $report_id
     * @param int $offset
     * @param int $size
     * @return \stdClass
     */
    public function commentList($report_id, $offset = 0, $size = 20)
    {
        return $this->executePost('topapi/report/comment/list', compact('report_id', 'offset', 'size'));
    }

    /**
     * 获取用户日志未读数
     * @param $userid
     * @return \StdClass
     */
    public function getUnreadCount($userid)
    {
        return $this->executePost('topapi/report/getunreadcount', compact('userid'));
    }

    /**
     * 获取用户可见的日志模板
     * @param int $offset
     * @param int $size
     * @param $userid
     * @return \stdClass
     */
    public function templateListByUserId($offset = 0, $size = 100, $userid = null)
    {
        return $this->executePost('topapi/report/template/listbyuserid', compact('offset', 'size', 'userid'));
    }
}