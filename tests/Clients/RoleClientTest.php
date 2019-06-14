<?php


class RoleClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\RoleClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->role();
    }

    /**
     * @test
     */
    public function lists()
    {
        $response = $this->client->lists();
        $this->assertEquals(0, $response->errcode);
        $list = $response->result->list;
        $group = array_shift($list);
        return $group->groupId;
    }

    /**
     * @test
     * @depends lists
     * @param $groupId
     * @return mixed
     */
    public function getRoleGroup($groupId)
    {
        $response = $this->client->getRoleGroup($groupId);
        $this->assertEquals(0, $response->errcode);
        $list = $response->role_group->roles;
        $role = array_shift($list);
        return $role->role_id;
    }

    /**
     * @test
     * @depends getRoleGroup
     * @param $roleId
     */
    public function simpleList($roleId)
    {
        $response = $this->client->simpleList($roleId);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends getRoleGroup
     * @param $roleId
     */
    public function getRole($roleId)
    {
        $response = $this->client->getRole($roleId);
        $this->assertEquals(0, $response->errcode);
    }

    /**
     * @test
     * @depends lists
     * @param $groupId
     * @return mixed
     */
    public function createRole($groupId)
    {
        $roleName = 'foo';
        $response = $this->client->createRole($roleName, $groupId);
        $this->assertEquals(0, $response->errcode);
        return $response->roleId;
    }

    /**
     * @test
     * @depends createRole
     * @param $roleId
     * @return mixed
     */
    public function updateRole($roleId)
    {
        $roleName = 'foo_bar';
        $response = $this->client->updateRole($roleName, $roleId);
        $this->assertEquals(0, $response->errcode);
        return $roleId;
    }

    /**
     * @test
     * @depends updateRole
     * @param $roleId
     */
    public function deleteRole($roleId)
    {
        $response = $this->client->deleteRole($roleId);
        $this->assertEquals(0, $response->errcode);
    }
}