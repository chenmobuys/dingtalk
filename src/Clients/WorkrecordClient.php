<?php

namespace ChenDingtalk\Clients;

/**
 * Class WorkrecordClient
 * @package ChenDingtalk\Clients
 */
class WorkrecordClient extends AbstractClient
{
    /**
     * 发起待办
     * @param $params
     * @return \StdClass
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/gpmpiq
     */
    public function add($params)
    {
        return $this->executePost('topapi/workrecord/add', $params);
    }

    /**
     * 更新待办
     * @param $userid
     * @param $record_id
     * @return \StdClass
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/cxls8y
     */
    public function update($userid, $record_id)
    {
        return $this->executePost('topapi/workrecord/update', compact('userid', 'record_id'));
    }

    /**
     * 获取用户待办事项
     * @param $userid
     * @param int $offset
     * @param int $limit
     * @param int $status
     * @return \stdClass
     * @see https://open-doc.dingtalk.com/microapp/serverapi2/neevhm
     */
    public function getByUserId($userid, $offset = 0, $limit = 50, $status = 1)
    {
        return $this->executePost('topapi/workrecord/getbyuserid', compact('userid', 'offset', 'limit', 'status'));
    }
}