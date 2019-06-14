<?php


class SmartworkClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\SmartworkClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->smartwork();
    }

    public function userIdsProvider()
    {
        $this->setDingtalkManager();
        $response = $this->dingtalkManager->user()->getDeptMember();
        return [[$response->userIds]];
    }

    /**
     * @test
     * @dataProvider userIdsProvider
     * @param $userIds
     */
    public function lists($userIds)
    {
        $userid_list = implode(',', $userIds);
        $response = $this->client->lists($userid_list);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function queryPreentry()
    {
        $response = $this->client->queryPreentry();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function queryOnJob()
    {
        $response = $this->client->queryOnJob();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function queryDimission()
    {
        $response = $this->client->queryDimission();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @dataProvider
     * @param $userIds
     */
    public function listDimission($userIds)
    {
        $userid_list = implode(',', $userIds);
        $response = $this->client->listDimission($userid_list);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function addPreentry()
    {
        $name = 'foo';
        $mobile = 125564897564;
        $response = $this->client->addPreentry($name, $mobile);
        $this->assertEquals(0, $response->errcode);
    }
}