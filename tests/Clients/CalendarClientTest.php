<?php

namespace ChenDingtalk\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ChenDingtalk\Tests\CreateDingtalkManager;

class CalendarClientTest extends TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\CalendarClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->calendar();
    }

    /**
     * @test
     * @return mixed
     */
    public function create()
    {
        $response = $this->dingtalkManager->user()->getDeptMember();
        $userIds = $response->userIds;
        $userid = array_shift($response->userIds);
        $create_vo = [
            'summary' => 'foo',
            'receiver_userids' => $userIds,
            'calendar_type' => 'notification',
            'end_time' => ['unix_timestamp' => strtotime('+1 day') * 1000],
            'start_time' => ['unix_timestamp' => strtotime('-1 day') * 1000],
            'source' => ['title' => 'foo', 'url' => 'http://foo.com'],
            'creator_userid' => $userid,
            'uuid' => uniqid(),
            'biz_id' => uniqid(),
        ];
        $response = $this->client->create($create_vo);
        $this->assertEquals(0, $response->errcode);
    }
}