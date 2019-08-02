## 角色管理

### 获取角色列表
```php
$ding->role()->lists();
```

### 获取角色下的员工列表
```php
$ding->role()->simpleList($role_id);
```

### 获取角色组
```php
$ding->role()->getRoleGroup($group_id);
```

### 获取角色详情
```php
$ding->role()->getRole($role_id);
```

### 创建角色
```php
$ding->role()->createRole($roleName, $groupId);
```

### 更新角色
```php
$ding->role()->updateRole($roleName, $roleId);
```

### 删除角色
```php
$ding->role()->deleteRole($role_id);
```

### 创建角色组
```php
$ding->role()->createRoleGroup($name);
```

### 批量增加员工角色
```php
$ding->role()->createRolesForemps($roleIds, $userIds);
```

### 批量删除员工角色
```php
$ding->role()->deleteRolesForemps($roleIds, $userIds);
```