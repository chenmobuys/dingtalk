## 日志管理

### 获取用户日志数据
```php
$ding->report()->lists($start_time, $end_time);
```

### 获取日志统计数据
```php
$ding->report()->statisticsList($report_id);
```

### 获取日志相关人员列表
```php
$ding->report()->statisticsListByType($report_id, $type);
```

### 获取日志接收人员列表
```php
$ding->report()->receiverList($report_id);
```

### 获取日志评论详情
```php
$ding->report()->commentList($report_id);
```

### 获取用户日志未读数
```php
$ding->report()->getUnreadCount($userid);
```

### 获取用户可见的日志模板 
```php
$ding->report()->templateListByUserId();
```