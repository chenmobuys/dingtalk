<?php

namespace ChenDingtalk\Tests;

trait CreateDingtalkManager
{
    /**
     * @var \ChenDingtalk\DingtalkManager
     */
    private $dingtalkManager;

    public function setDingtalkManager()
    {
        $this->dingtalkManager = new \ChenDingtalk\DingtalkManager($_ENV);
    }
}