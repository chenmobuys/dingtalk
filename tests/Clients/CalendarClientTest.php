<?php


class CalendarClientTest extends \PHPUnit\Framework\TestCase
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

    public function userIdsProvider()
    {
        $this->setDingtalkManager();
        $response = $this->dingtalkManager->user()->getDeptMember(1);
        return [[$response->userIds]];
    }

    /**
     * @test
     * @dataProvider userIdsProvider
     * @param $userIds
     * @return mixed
     */
    public function create($userIds)
    {
        $userid = current($userIds);
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
//        $response = $this->client->create($create_vo);
//        $this->assertEquals(0, $response->errcode);
        $this->assertTrue(is_array($userIds));
        return $response->result->dingtalk_calendar_id;
    }
}