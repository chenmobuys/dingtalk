### 考勤管理

#### 企业考勤排班详情
```php
$ding->attendance()->listSchedule($workDate);
```

#### 企业考勤组详情
```php
$ding->attendance()->getSimpleGroups();
```

#### 获取打卡详情
```php
$ding->attendance()->listRecord($userIds, $checkDateFrom, $checkDateTo);
```

#### 获取打卡结果
```php
$ding->attendance()->lists($workDateFrom, $workDateTo, $userIdList);
```

#### 获取请假时长
```php
$ding->attendance()->getLeaveApproveDuration($userid, $from_date, $to_date);
```

#### 查询请假状态
```php
$ding->attendance()->getLeaveStatus($userid_list, $start_time, $end_time);
```

#### 获取用户考勤组
```php
$ding->attendance()->getUserGroup($userid);
```