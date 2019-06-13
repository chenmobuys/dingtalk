<?php


class AuthClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\AuthClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->auth();
    }

    public function testGetAccessToken()
    {
        $access_token = $this->client->getAccessToken();
        $this->assertTrue(is_string($access_token) && strlen($access_token) === 32);
    }

    public function testScopes()
    {
        $response = $this->client->scopes();
        $this->assertEquals(0, $response->errcode);
    }
}