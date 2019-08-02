## 管理钉盘文件

### 上传媒体文件
```php
$ding->media()->upload($type, $media);
```

### 单步文件上传
```php
$ding->media()->fileUploadSingle($agent_id, $file_size);
```

### 分块上传文件
```php
$ding->media()->fileUploadTransaction($agent_id, $file_size, $chunk_numbers);
```

### 上传文件块
```php
$ding->media()->fileUploadChunk($agent_id, $upload_id, $chunk_sequence);
```

### 提交文件上传事务
```php
$ding->media()->fileUploadCommit($agent_id, $file_size, $chunk_numbers, $upload_id);
```