<?php

namespace ChenDingtalk\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ChenDingtalk\Tests\CreateDingtalkManager;

class CheckinClientTest extends TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\CheckinClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->checkin();
    }

    /**
     * @test
     */
    public function record()
    {
        $department_id = 1;
        $start_time = strtotime('-1 day') * 1000;
        $end_time = time() * 1000;
        $response = $this->client->record($department_id, $start_time, $end_time);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function recordGet()
    {
        $response = $this->dingtalkManager->user()->getDeptMember(1);
        $userid_list = implode(',', $response->userIds);
        $start_time = strtotime('-1 day') * 1000;
        $end_time = time() * 1000;
        $response = $this->client->recordGet($userid_list, $start_time, $end_time);
        $this->assertEquals(0, $response->errcode);
    }
}