## 部门管理

### 获取子部门ID列表
```php
$ding->department()->listIds();
``` 

### 获取部门列表
```php
$ding->department()->lists();
```

### 获取部门详情
```php
$ding->department()->get();
```

### 查询部门的所有上级父部门路径
```php
$ding->department()->listParentDeptsByDept($id);
```

### 查询指定用户的所有上级父部门路径
```php
$ding->department()->listParentDepts($userId);
```

### 创建部门
```php
$params = [
    'name '=> 'name',
    'parentid' => 1,
];

$ding->department()->create($params);
```

### 更新部门
```php
$params = [
    'id' => 324234
    'name '=> 'name',
];

$ding->department()->update($params);
```

### 删除部门
```php
$ding->department()->delete($id);
```