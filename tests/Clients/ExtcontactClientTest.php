<?php


class ExtcontactClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\ExtcontactClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->extcontact();
    }

    /**
     * @test
     */
    public function listLabelGroups()
    {
        $response = $this->client->listLabelGroups();
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
     * @return mixed
     */
    public function create()
    {
        $this->setDingtalkManager();
        $response = $this->dingtalkManager->user()->getDeptMember();
        $follower_user_id = array_shift($response->userIds);
        $contact = [
            'label_ids' => [459184699],
            'follower_user_id' => $follower_user_id,
            'name' => 'foo',
            'state_code' => 86,
            'mobile' => 13075689756
        ];
        $response = $this->client->create($contact);
        $this->assertEquals(0, $response->errcode);

        return [$follower_user_id, $response->userid];
    }

    /**
     * @test
     * @depends create
     * @param $stack
     * @return mixed
     */
    public function get($stack)
    {
        list($follower_user_id, $user_id) = $stack;
        $response = $this->client->get($user_id);
        $this->assertEquals(0, $response->errcode);
        return $stack;
    }

    /**
     * @test
     * @depends create
     * @param $stack
     * @return mixed
     */
    public function update($stack)
    {
        list($follower_user_id, $user_id) = $stack;
        $contact = [
            'user_id' => $user_id,
            'label_ids' => [459184699],
            'follower_user_id' => $follower_user_id,
            'name' => 'foo_bar',
            'state_code' => 86,
            'mobile' => 13075689756
        ];
        $response = $this->client->update($contact);
        $this->assertEquals(0, $response->errcode);
        return $stack;
    }

    /**
     * @test
     * @depends update
     * @param $stack
     */
    public function delete($stack)
    {
        list($follower_user_id, $user_id) = $stack;
        $response = $this->client->delete($user_id);
        $this->assertEquals(0, $response->errcode);
    }
}