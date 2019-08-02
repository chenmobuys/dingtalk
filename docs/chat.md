## 群消息

### 发送群消息
```php
$ding->chat()->send($chatid, $msg);
```

### 查询群消息已读人员列表
```php
$ding->chat()->getReadList($messageId, $cursor = 0, $size = 20);
```

### 获取会话
```php
$ding->chat()->get($chatid);
```

### 创建会话
```php
$params = [
    'name' => '群名称',
    'owner' => 1,
    'useridlist' => [1,2]
];

$ding->chat()->create($params);
```

### 修改会话
```php
$params = [
    'chatid' => 'chatxxxxxxxxxx',
    'name' => '修改',
];

$ding->chat()->update($params);
```