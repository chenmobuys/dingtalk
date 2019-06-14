<?php

/**
 * Class MessageClientTest
 * TODO
 */
class MessageClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\MessageClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->message();
    }
}