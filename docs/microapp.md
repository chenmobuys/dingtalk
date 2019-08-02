## 应用管理

### 获取应用列表
```php
$ding->microapp()->list();
```

### 获取员工可见的应用列表
```php
$ding->microapp()->listByUserId($userid);
```

### 获取应用可见范围
```php
$ding->microapp()->visibleScopes($agentId);
```

### 设置应用可见范围
```php
$ding->microapp()->setVisibleScopes($agentId);
```