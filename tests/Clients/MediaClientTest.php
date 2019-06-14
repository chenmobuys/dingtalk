<?php

/**
 * Class MediaClientTest
 * TODO
 */
class MediaClientTest extends \PHPUnit\Framework\TestCase
{
    use CreateDingtalkManager;

    /**
     * @var \ChenDingtalk\Clients\MediaClient
     */
    private $client;

    public function setUp()
    {
        $this->setDingtalkManager();
        $this->client = $this->dingtalkManager->media();
    }

    public function upload()
    {

    }

    public function fileUploadSingle()
    {

    }
}