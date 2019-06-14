<?php


class WorkrecordClientTest extends \PHPUnit\Framework\TestCase
{

    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\WorkrecordClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->workrecord();
    }

    /**
     * @test
     * @return mixed
     */
    public function add()
    {
        $response = $this->dingtalkManager->user()->getDeptMember();
        $userid = array_shift($response->userIds);
        $params = [
            'userid' => $userid,
            'create_time' => time() * 1000,
            'title' => 'foo',
            'url' => '	https://oa.dingtalk.com	',
            'formItemList' => [
                'title' => 'foo',
                'content' => 'bar',
            ]
        ];
        $response = $this->client->add($params);
        $this->assertEquals(0, $response->errcode);
        return [$userid, $response->record_id];
    }

    /**
     * @test
     * @depends add
     * @param $stack
     */
    public function update($stack)
    {
        list($userid, $record_id) = $stack;
        $response = $this->client->update($userid, $record_id);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends add
     * @param $stack
     */
    public function getByUserId($stack)
    {
        list($userid, $record_id) = $stack;
        $response = $this->client->getByUserId($userid);
        $this->assertEquals(0, $response->errcode);
    }
}