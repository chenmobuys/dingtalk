## 事件回调

### 注册业务事件回调接口
```php
$ding->callback()->registerCallback($call_back_tag, $token, $aes_key, $url);
```

### 查询事件回调接口
```php
$ding->callback()->getCallback();
```

### 更新事件回调接口
```php
$ding->callback()->updateCallback($call_back_tag, $token, $aes_key, $url);
```

### 删除事件回调接口
```php
$ding->callback()->deleteCallback();
```

### 获取回调失败的结果
```php
$ding->callback()->getCallBackFailedResult();
```