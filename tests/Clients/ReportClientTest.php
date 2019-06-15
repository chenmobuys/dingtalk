<?php

namespace ChenDingtalk\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ChenDingtalk\Tests\CreateDingtalkManager;

class ReportClientTest extends TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\ReportClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->report();
    }

    /**
     * @test
     */
    public function lists()
    {
        $start_time = strtotime('-1 day') * 1000;
        $end_time = time() * 1000;
        $response = $this->client->lists($start_time, $end_time);
        $this->assertEquals(0, $response->errcode);
        $list = $response->result->data_list;
        $report = array_shift($list);
        return $report->report_id;
    }

    /**
     * @test
     * @depends lists
     * @param $report_id
     */
    public function statisticsList($report_id)
    {
        $response = $this->client->statisticsList($report_id);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends lists
     * @param $report_id
     */
    public function statisticsListByType($report_id)
    {
        $response = $this->client->statisticsListByType($report_id, 1);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends lists
     * @param $report_id
     */
    public function receiverList($report_id)
    {
        $response = $this->client->receiverList($report_id);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends lists
     * @param $report_id
     */
    public function commentList($report_id)
    {
        $response = $this->client->commentList($report_id);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function getUnreadCount()
    {
        $response = $this->dingtalkManager->user()->getDeptMember();
        $userid = array_shift($response->userIds);
        $response = $this->client->getUnreadCount($userid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function templateListByUserId()
    {
        $response = $this->client->templateListByUserId();
        $this->assertEquals(0, $response->errcode);
    }
}