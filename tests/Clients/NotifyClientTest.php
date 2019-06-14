<?php

/**
 * Class NotifyClientTest
 * TODO
 */
class NotifyClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\NotifyClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->notify();
    }
}