<?php

namespace ChenDingtalk\Clients;

/**
 * Class CallbackClient
 * @package ChenDingtalk\Clients
 * @doc https://open-doc.dingtalk.com/microapp/serverapi2/lo5n6i
 */
class CallbackClient extends AbstractClient
{
    /**
     * 注册业务事件回调接口
     * @param $call_back_tag
     * @param $token
     * @param $aes_key
     * @param $url
     * @return \StdClass
     */
    public function registerCallback($call_back_tag, $token, $aes_key, $url)
    {
        return $this->executePost('call_back/register_call_back', compact('call_back_tag', 'token', 'aes_key', 'url'));
    }

    /**
     * 查询事件回调接口
     * @return \stdClass
     */
    public function getCallback()
    {
        return $this->executeGet('call_back/get_call_back');
    }

    /**
     * 更新事件回调接口
     * @param $call_back_tag
     * @param $token
     * @param $aes_key
     * @param $url
     * @return \stdClass
     */
    public function updateCallback($call_back_tag, $token, $aes_key, $url)
    {
        return $this->executePost('call_back/update_call_back', compact('call_back_tag', 'token', 'aes_key', 'url'));
    }

    /**
     * 删除事件回调接口
     * @return \stdClass
     */
    public function deleteCallback()
    {
        return $this->executeGet('call_back/delete_call_back');
    }

    /**
     * 获取回调失败的结果
     * @return \stdClass
     */
    public function getCallBackFailedResult()
    {
        return $this->executeGet('call_back/get_call_back_failed_result');
    }
}