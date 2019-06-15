<?php

namespace ChenDingtalk\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ChenDingtalk\Tests\CreateDingtalkManager;

class MicroappClientTest extends TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\MicroappClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->microapp();
    }

    /**
     * @test
     * @return mixed
     */
    public function lists()
    {
        $response = $this->client->lists();
        $this->assertEquals(0, $response->errcode);
        $list = $response->appList;
        $app = array_shift($list);
        return $app->agentId;
    }

    /**
     * @test
     */
    public function listByUserId()
    {
        $response = $this->dingtalkManager->user()->getDeptMember();
        $userid = array_shift($response->userIds);
        $response = $this->client->listByUserId($userid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends lists
     * @param $agentId
     */
    public function visibleScopes($agentId)
    {
        $response = $this->client->visibleScopes($agentId);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends lists
     * @param $agentId
     */
    public function setVisibleScopes($agentId)
    {
        $response = $this->client->setVisibleScopes($agentId);
        $this->assertEquals(0, $response->errcode);
    }
}