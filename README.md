<h1 align="center"> ChenDingtalk </h1>

<p align="center">
<a href="https://packagist.org/packages/chen/dingtalk"><img src="https://poser.pugx.org/chen/dingtalk/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/chen/dingtalk"><img src="https://poser.pugx.org/chen/dingtalk/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/chen/dingtalk"><img src="https://poser.pugx.org/chen/dingtalk/license.svg" alt="License"></a>
</p>

## 介绍
`ChenDingtalk` 封装了钉钉身份验证、通讯录管理、消息通知、审批、业务事件回调管理等服务端接口，让开发者可以使用简单的配置，提供简洁的 API 以供方便快速地调用钉钉接口。

## 环境要求
* PHP 5.4+
* [Composer](https://getcomposer.org/)

## 安装
```bash
composer require chen/dingtalk
```

## 使用
```php
<?php

require __DIR__ . '/vendor/autoload.php';

use ChenDingtalk\DingtalkManager;

$config = [
  'app_key' => 'xxx',
  'app_secret' => 'xxx',
  'aes_key' => '4g5j64qlyl3zvetqxz5jiocdr586fn2zvjpa8zls3ij',
  'token' => '123465',
  'key' => 'suite4xxxxxxxxxxxxxxx',
];

$ding = new DingtalkManager($config);
```

## 文档
[README.md](docs/README.md)

## 开源协议
[MIT](LICENSE)

## TODO
* 钉钉机器人

