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

    public function userIdsProvider()
    {
        $this->setDingtalkManager();
        $response = $this->dingtalkManager->user()->getDeptMember();
        return [[$response->userIds]];
    }

    /**
     * @param $userIds
     * @dataProvider userIdsProvider
     * @test
     */
    public function lists($userIds)
    {
        $userid = array_shift($userIds);
        $response = $this->client->lists($userid);
        $this->assertEquals(0, $response->errcode);
    }
}