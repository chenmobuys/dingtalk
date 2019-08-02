## 签到

### 获取部门用户签到记录
```php
$ding->checkin()->record($department_id, $start_time, $end_time);
```

### 获取用户签到记录
```php
$ding->checkin()->recordGet($userid_list, $start_time, $end_time);
```