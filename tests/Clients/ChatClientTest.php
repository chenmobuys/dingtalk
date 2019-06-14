<?php

/**
 * Class ChatClientTest
 * TODO
 */
class ChatClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\ChatClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->chat();
    }

    /**
     * @test
     */
    public function create()
    {
        $response = $this->dingtalkManager->user()->getDeptMember();
        $useridlist = $response->userIds;
        $owner = array_shift($response->userIds);
        $params = [
            'name' => 'foo',
            'owner' => $owner,
            'useridlist' => $useridlist,
        ];
        $response = $this->client->create($params);
        $this->assertEquals(0, $response->errcode);
        return $response->chatid;
    }

    /**
     * @test
     * @depends create
     * @param $chatid
     */
    public function update($chatid)
    {
        $params = [
            'chatid' => $chatid,
            'name' => 'foo_bar',
        ];
        $response = $this->client->update($params);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends create
     * @param $chatid
     */
    public function get($chatid)
    {
        $response = $this->client->get($chatid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends create
     * @param $chatid
     * @return mixed
     */
    public function send($chatid)
    {
        $msg = [
            'msgtype' => 'text',
            'text' => [
                'content' => 'foo'
            ]
        ];
        $response = $this->client->send($chatid, $msg);
        $this->assertEquals(0, $response->errcode);
        return $response->messageId;
    }

    /**
     * @test
     * @depends send
     * @param $messageId
     */
    public function getReadList($messageId)
    {
        $response = $this->client->getReadList($messageId);
        $this->assertEquals(0, $response->errcode);
    }
}