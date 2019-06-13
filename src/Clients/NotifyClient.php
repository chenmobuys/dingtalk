<?php


namespace ChenDingtalk\Clients;

use Closure;
use GuzzleHttp\Psr7\Response;
use ChenDingtalk\Crypto\DingtalkCrypt;

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

        $msg = $this->getDingtalkCrypt()->decryptMsg($signature, $timestamp, $nonce, $encrypt);

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
        $encryptMsg = $this->getDingtalkCrypt()->encryptMsg('success');

        header('Content-Type: application/json');
        header('HTTP/1.1 200 OK', true, 200);
        echo $encryptMsg;

        return $encryptMsg;
    }


    /**
     * @return DingtalkCrypt
     */
    public function getDingtalkCrypt()
    {
        return new DingtalkCrypt($this->config['token'], $this->config['aes_key'], $this->config['key']);
    }
}