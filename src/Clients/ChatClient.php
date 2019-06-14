<?php


namespace ChenDingtalk\Clients;


/**
 * Class ChatClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/isu6nk
 */
class ChatClient extends AbstractClient
{
    /**
     * 发送群消息
     * @param $chatid
     * @param $msg
     * @return \stdClass
     */
    public function send($chatid, $msg)
    {
        return $this->executePost('chat/send', compact('chatid', 'msg'));
    }

    /**
     * 查询群消息已读人员列表
     * @param $messageId
     * @param int $cursor
     * @param int $size
     * @return \stdClass
     */
    public function getReadList($messageId, $cursor = 0, $size = 20)
    {
        return $this->executeGet('chat/getReadList', compact('messageId', 'cursor', 'size'));
    }

    /**
     * 获取会话
     * @param $chatid
     * @return mixed
     */
    public function get($chatid)
    {
        return $this->executeGet('chat/get', compact('chatid'));
    }

    /**
     * 创建会话
     * @param $params
     * @return \stdClass
     */
    public function create($params)
    {
        return $this->executePost('chat/create', $params);
    }

    /**
     * 修改会话
     * @param $params
     * @return \StdClass
     */
    public function update($params)
    {
        return $this->executePost('chat/update', $params);
    }
}