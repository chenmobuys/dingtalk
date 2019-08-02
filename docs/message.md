## 消息通知

### 发送工作通知消息
```php
$ding->message()->asyncSend($agent_id, $userid_list, $msg, $to_all_user, $dept_id_list);
```

### 查询工作通知消息的发送进度
```php
$ding->message()->getSendProgress($agent_id, $task_id);
```

### 查询工作通知消息的发送结果
```php
$ding->message()->getSendResult($agent_id, $task_id);
```

### 发送普通消息
```php
$ding->message()->sendToConversation($sender, $cid, $msg);
```