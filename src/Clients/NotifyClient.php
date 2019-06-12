<?php


namespace ChenDingtalk\Clients;

use Closure;
use ChenDingtalk\Crypto\DingtalkCrypt;
use GuzzleHttp\Psr7\Response;

/**
 * Class NotifyClient
 * @package ChenDingtalk\Clients
 * @see https://open-doc.dingtalk.com/microapp/serverapi2/lo5n6i
 */
class NotifyClient extends AbstractClient
{
    /**
     * @param Closure $callback
     * @return Response|mixed
     */
    public function handle(Closure $callback)
    {
        $signature = $_GET['signature'];
        $timestamp = $_GET['timestamp'];
        $nonce = $_GET['nonce'];
        $postData = file_get_contents("php://input");
        $postList = json_decode($postData, true);
        $encrypt = $postList['encrypt'];

        $this->getDingtalkCrypt()->decryptMsg($signature, $timestamp, $nonce, $encrypt, $msg);

        $eventType = $msg['EventType'];

        if ($eventType == 'check_url') {
            return $this->checkUrl();
        }

        return $callback($eventType, $msg);
    }

    /**
     * @return string
     */
    public function checkUrl()
    {
        $this->getDingtalkCrypt()->encryptMsg('success', null, null, $encryptMsg);

        header('Content-Type: application/json');
        header('HTTP/1.1 200 OK', true, 200);
        echo $encryptMsg;

        return $encryptMsg;
    }


    /**
     * @return DingtalkCrypt
     */
    private function getDingtalkCrypt()
    {
        return new DingtalkCrypt($this->config['token'], $this->config['encoding_aes_key'], $this->config['key']);
    }
}