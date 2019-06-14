<h1 align="center"> Dingtalk </h1>

<p align="center">
<a href="https://open-doc.dingtalk.com/microapp/serverapi2">钉钉文档</a>
</p>

## Install
```bash
composer require chen/dingtalk
```

## Usage
```php

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

## Examples 
### 用户管理
```php
$userClient = $ding->user();
//获取部门用户ID列表
$response = $userClient->getDeptMember();
$userIds = $response->userIds;
```
