## 审批管理

### 发起审批实例
```php
$ding->process()->create($params);
```

### 批量获取审批实例id
```php
$ding->process()->listIds($process_code, $start_time, $end_time);
```

### 获取用户可见的审批模板
```php
$ding->process()->listByUserId();
```

### 获取审批实例详情
```php
$ding->process()->get($process_instance_id);
```

### 获取用户待审批数量
```php
$ding->process()->getTodoNum($userid);
```

### 获取审批钉盘空间信息
```php
$ding->process()->getCspaceInfo($user_id);
```