<?php


class ProcessClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\ProcessClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->process();
    }

    public function userIdsProvider()
    {
        $this->setDingtalkManager();
        $response = $this->dingtalkManager->user()->getDeptMember();
        return [[$response->userIds]];
    }

    /**
     * @test
     */
    public function listByUserId()
    {
        $response = $this->client->listByUserId();
        $this->assertEquals(0, $response->errcode);
        $list = $response->result->process_list;
        $template = array_shift($list);
        return $template->process_code;
    }

    /**
     * @depends listByUserId
     * @param $process_code
     * @return mixed
     */
    public function create($process_code)
    {
        $this->setDingtalkManager();
        $response = $this->dingtalkManager->user()->getDeptMember();
        $originator_user_id = array_shift($response->userIds);
        $params = [
            'process_code' => $process_code,
            'originator_user_id' => $originator_user_id,
            'dept_id' => -1,
            'form_component_values' => [
                ['name' => '单行输入框', 'value' => '事假'],
                ['name' => '开始时间', 'value' => date('Y-m-d 上午')],
                ['name' => '结束时间', 'value' => date('Y-m-d 下午')],
            ]
        ];
        $response = $this->client->create($params);
        $this->assertEquals(0, $response->errcode);
        return $process_code;
    }

    /**
     * @test
     * @depends listByUserId
     * @param $process_code
     * @return mixed
     */
    public function listIds($process_code)
    {
        $start_time = strtotime('-1 month');
        $end_time = time();
        $response = $this->client->listIds($process_code, $start_time, $end_time);
        $this->assertEquals(0, $response->errcode);
        $list = $response->result->list;
        return array_shift($list);
    }

    /**
     * @depends listIds
     * @param $process_instance_id
     */
    public function get($process_instance_id)
    {
        $response = $this->client->get($process_instance_id);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @dataProvider  userIdsProvider
     * @param $userIds
     */
    public function getTodoNum($userIds)
    {
        $this->assertTrue(true);
        $userid = array_shift($userIds);
        $response = $this->client->getTodoNum($userid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @dataProvider userIdsProvider
     * @param $userIds
     */
    public function getCspaceInfo($userIds)
    {
        $userid = array_shift($userIds);
        $response = $this->client->getCspaceInfo($userid);
        $this->assertEquals(0, $response->errcode);
    }
}