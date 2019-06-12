<?php


namespace ChenDingtalk\Clients;

/**
 * Class MessageClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/pgoxpy
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/pm0m06
 */
class MessageClient extends AbstractClient
{
    /**
     * 发送工作通知消息
     * @param $agent_id
     * @param $userid_list
     * @param $msg https://open-doc.dingtalk.com/microapp/serverapi2/ye8tup
     * @param $to_all_user
     * @param $dept_id_list
     * @return \stdClass
     */
    public function asyncSend($agent_id, $userid_list, $msg, $to_all_user, $dept_id_list)
    {
        return $this->executePost('topapi/message/corpconversation/asyncsend_v2', compact('agent_id', 'userid_list', 'msg', 'to_all_user', 'dept_id_list'))->task_id;
    }

    /**
     * 查询工作通知消息的发送进度
     * @param $agent_id
     * @param $task_id
     * @return mixed
     */
    public function getSendProgress($agent_id, $task_id)
    {
        return $this->executePost('topapi/message/corpconversation/getsendprogress', compact('agent_id', 'task_id'))->progress;
    }

    /**
     * 查询工作通知消息的发送结果
     * @param $agent_id
     * @param $task_id
     * @return mixed
     */
    public function getSendResult($agent_id, $task_id)
    {
        return $this->executePost('topapi/message/corpconversation/getsendresult', compact('agent_id', 'task_id'))->send_result;
    }

    /**
     * 发送普通消息
     * @param $sender
     * @param $cid
     * @param $msg
     * @return \stdClass
     */
    public function sendToConversation($sender, $cid, $msg)
    {
        return $this->executePost('message/send_to_conversation', compact('sender', 'cid', 'msg'))->receiver;
    }
}