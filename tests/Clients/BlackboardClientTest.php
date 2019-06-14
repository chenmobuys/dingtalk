<?php


class BlackboardClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\BlackboardClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->blackboard();
    }

    /**
     * @test
     */
    public function lists()
    {
        $response = $this->dingtalkManager->user()->getDeptMember();
        $userid = array_shift($response->userIds);
        $response = $this->client->lists($userid);
        $this->assertEquals(0, $response->errcode);
    }
}