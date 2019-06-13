<?php


namespace ChenDingtalk\Clients;

/**
 * Class ProcessClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/ca8r99
 */
class ProcessClient extends AbstractClient
{
    /**
     * 发起审批实例
     * @param $params
     * @return \StdClass
     */
    public function create($params)
    {
        return $this->executePost('topapi/processinstance/create', $params);
    }

    /**
     * 批量获取审批实例id
     * @param $process_code
     * @param $start_time
     * @param $end_time
     * @param int $cursor
     * @param int $size
     * @param $userid_list
     * @return \stdClass
     */
    public function listIds($process_code, $start_time, $end_time, $cursor = 0, $size = 10, $userid_list = null)
    {
        return $this->executePost('topapi/processinstance/listids', compact('process_code', 'start_time', 'end_time', 'cursor', 'size', 'userid_list'));
    }

    /**
     * 获取用户可见的审批模板
     * @param int $offset
     * @param int $size
     * @param null $userid
     * @return \stdClass
     */
    public function listByUserId($offset = 0, $size = 100, $userid = null)
    {
        return $this->executePost('topapi/process/listbyuserid', compact('offset', 'size', 'userid'));
    }

    /**
     * 获取审批实例详情
     * @param $process_instance_id
     * @return \stdClass
     */
    public function get($process_instance_id)
    {
        return $this->executePost('topapi/processinstance/get', compact('process_instance_id'));
    }

    /**
     * 获取用户待审批数量
     * @param $userid
     * @return \StdClass
     */
    public function getTodoNum($userid)
    {
        return $this->executePost('topapi/process/gettodonum', compact('userid'));
    }

    /**
     * 获取审批钉盘空间信息
     * @param $userid
     * @return \stdClass
     */
    public function getCspaceInfo($userid)
    {
        return $this->executePost('topapi/processinstance/cspace/info', compact('userid'));
    }

}