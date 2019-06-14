<?php

/**
 * Class CspaceClientTest
 * TODO
 */
class CspaceClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\CspaceClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->cspace();
    }


}