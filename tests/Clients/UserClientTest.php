<?php

namespace ChenDingtalk\Tests\Clients;

use PHPUnit\Framework\TestCase;
use ChenDingtalk\Tests\CreateDingtalkManager;

class UserClientTest extends TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\UserClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->user();
    }

    /**
     * @test
     * @return mixed
     */
    public function getDeptMember()
    {
        $response = $this->client->getDeptMember();
        $this->assertEquals(0, $response->errcode);
        return $response->userIds;
    }

    /**
     * @test
     * @depends getDeptMember
     * @param $userIds
     * @return mixed
     */
    public function get($userIds)
    {
        $userid = array_shift($userIds);
        $response = $this->client->get($userid);
        $this->assertEquals(0, $response->errcode);
        return $response->unionid;
    }

    /**
     * @test
     */
    public function getSimpleList()
    {
        $response = $this->client->getSimpleList();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function getListByPage()
    {
        $response = $this->client->getListByPage();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function getAdmin()
    {
        $response = $this->client->getAdmin();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends getDeptMember
     * @param $userIds
     */
    public function getAdminScope($userIds)
    {
        $userid = array_shift($userIds);
        $response = $this->client->getAdminScope($userid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends get
     * @param $unionid
     */
    public function getUseridByUnionid($unionid)
    {
        $response = $this->client->getUseridByUnionid($unionid);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     */
    public function getOrgUserCount()
    {
        $response = $this->client->getOrgUserCount();
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @return mixed
     */
    public function create()
    {
        $params = [
            'name' => 'foo',
            'department' => [1],
            'mobile' => 13075712365,
        ];
        $response = $this->client->create($params);
        $this->assertEquals(0, $response->errcode);
        return $response->userid;
    }

    /**
     * @test
     * @depends create
     * @param $userid
     * @return mixed
     */
    public function update($userid)
    {
        $params = [
            'userid' => $userid,
            'name' => 'foo_bar',
        ];
        $response = $this->client->update($params);
        $this->assertEquals(0, $response->errcode);
        return $userid;
    }

    /**
     * @test
     * @depends update
     * @param $userid
     */
    public function delete($userid)
    {
        $response = $this->client->delete($userid);
        $this->assertEquals(0, $response->errcode);
    }
}