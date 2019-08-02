## 管理钉盘文件

### 发送钉盘文件给指定用户
```php
$ding->cspace()->addToSingleChat($agent_id, $userid, $media_id, $file_name);
```

### 新增文件到用户钉盘
```php
$ding->cspace()->add($agent_id, $code, $media_id, $space_id, $folder_id, $name);
```

### 获取企业下的自定义空间
```php
$ding->cspace()->getCustomSpace();
```

### 授权用户访问企业自定义空间
```php
$ding->cspace()->grantCustomSpace($type, $userid);
```