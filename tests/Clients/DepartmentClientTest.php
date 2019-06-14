<?php


class DepartmentClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\DepartmentClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->department();
    }

    /**
     * @test
     */
    public function listIds()
    {
        $response = $this->client->listIds();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function lists()
    {
        $response = $this->client->lists();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function get()
    {
        $response = $this->client->get();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function listParentDeptsByDept()
    {
        $response = $this->client->listParentDeptsByDept();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function listParentDepts()
    {
        $response = $this->dingtalkManager->user()->getDeptMember(1);
        $userId = array_shift($response->userIds);
        $response = $this->client->listParentDepts($userId);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @return mixed
     */
    public function create()
    {
        $params = ['name' => 'foo', 'parentid' => 1];
        $response = $this->client->create($params);
        $this->assertEquals(0, $response->errcode);
        return $response->id;
    }

    /**
     * @test
     * @depends create
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $params = ['name' => 'foo_bar', 'id' => $id];
        $response = $this->client->update($params);
        $this->assertEquals(0, $response->errcode);
        return $id;
    }

    /**
     * @test
     * @depends update
     * @param $id
     */
    public function delete($id)
    {
        $response = $this->client->delete($id);
        $this->assertEquals(0, $response->errcode);
    }
}