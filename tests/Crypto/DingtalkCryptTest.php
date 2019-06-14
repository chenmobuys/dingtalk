<?php

use ChenDingtalk\Crypto\DingtalkCrypt;

class DingtalkCryptTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var DingtalkCrypt
     */
    private $dingtalkCrypt;

    protected function setUp()
    {
        $this->dingtalkCrypt = new DingtalkCrypt($_ENV['token'], $_ENV['aes_key'], $_ENV['key']);
    }

    /**
     * @test
     */
    public function encrypt()
    {
        $plain = json_encode(['foo' => 'bar']);
        $timestamp = '1445827045067';
        $nonce = 'nEXhMP4r';
        $encryptMsg = $this->dingtalkCrypt->encryptMsg($plain, $timestamp, $nonce);
        $this->assertTrue(is_string($encryptMsg));
        return json_decode($encryptMsg, true);
    }

    /**
     * @test
     * @depends encrypt
     * @param $encryptMsg
     */
    public function decrypt($encryptMsg)
    {
        extract($encryptMsg);
        $decryptMsg = $this->dingtalkCrypt->decryptMsg($msg_signature, $timeStamp, $nonce, $encrypt);
        $this->assertEquals(['foo' => 'bar'], $decryptMsg);
    }
}