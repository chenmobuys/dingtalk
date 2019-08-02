## 外部联系人管理

### 获取外部联系人标签列表
```php
$ding->extcontact()->listLabelGroups();
```

### 获取外部联系人列表
```php
$ding->extcontact()->lists();
```

### 获取企业外部联系人详情
```php
$ding->extcontact()->get($user_id);
```

### 添加外部联系人
```php
$params = [
    'label_ids' => [1,2,3],
    'follower_user_id' => 1,
    'name' => '张三',
    'state_code' => 86,
    'mobile' => 'xxxxxxxxxxx',
];

$ding->extcontact()->create($params);
```

### 更新外部联系人
```php
$params = [
    'user_id' => 1324324,
    'label_ids' => [1,2,3],
    'follower_user_id' => 1,
    'name' => '张三',
    'state_code' => 86,
    'mobile' => 'xxxxxxxxxxx',
];

$ding->extcontact()->update($params);
```

### 删除外部联系人
```php
$ding->extcontact()->delete($user_id);
```