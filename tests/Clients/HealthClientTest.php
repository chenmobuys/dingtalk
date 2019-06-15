<?php

namespace ChenDingtalk\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ChenDingtalk\Tests\CreateDingtalkManager;

class HealthClientTest extends TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\HealthClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->health();
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
    public function getUserStatus($userIds)
    {
        $userid = array_shift($userIds);
        $response = $this->client->getUserStatus($userid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function lists()
    {
        $response = $this->client->lists(1, 1, date('Ymd'));
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @dataProvider userIdsProvider
     * @param $userIds
     */
    public function listByUserId($userIds)
    {
        $userids = implode(',', $userIds);
        $stat_date = date('Ymd');
        $response = $this->client->listByUserId($userids, $stat_date);
        $this->assertEquals(0, $response->errcode);
    }
}