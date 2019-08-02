## 钉钉运动

### 获取用户钉钉运动开启状态
```php
$ding->health()->getUserStatus($userid);
```

### 获取个人或部门的钉钉运动数据
```php
$ding->health()->lists($type, $object_id, $stat_dates);
```

### 批量获取钉钉运动数据
```php
$ding->health()->listByUserId($userids, $stat_date);
```