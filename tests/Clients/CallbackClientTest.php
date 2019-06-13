<?php


class CallbackClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\CallbackClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->callback();
    }

//    /**
//     * @test
//     */
//    public function registerCallback()
//    {
//        $call_back_tag = ['user_add_org'];
//        $token = $_ENV['token'];
//        $aes_key = $_ENV['aes_key'];
//        $url = $_ENV['url'];
//        $response = $this->client->registerCallback($call_back_tag, $token, $aes_key, $url);
//        $this->assertEquals(0, $response->errcode);
//
//        return true;
//    }
//
//    /**
//     * @test
//     * @depends registerCallback
//     */
//    public function updateCallback()
//    {
//        $call_back_tag = ['user_modify_org'];
//        $token = $_ENV['token'];
//        $aes_key = $_ENV['aes_key'];
//        $url = $_ENV['url'];
//        $response = $this->client->updateCallback($call_back_tag, $token, $aes_key, $url);
//        $this->assertEquals(0, $response->errcode);
//    }
//
//    /**
//     * @test
//     * @depends registerCallback
//     */
//    public function deleteCallback()
//    {
//        $response = $this->client->deleteCallback();
//        $this->assertEquals(0, $response->errcode);
//    }
//
//    /**
//     * @test
//     * @depends registerCallback
//     */
//    public function getCallback()
//    {
//        $response = $this->client->getCallback();
//        $this->assertEquals(0, $response->errcode);
//    }

    /**
     * @test
     */
    public function getCallBackFailedResult()
    {
        $response = $this->client->getCallBackFailedResult();
        $this->assertEquals(0, $response->errcode);
    }
}