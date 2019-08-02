## 用户管理

### 获取用户详情
```php
$ding->user()->get($userid, $lang = 'zh_CN');
```

### 获取部门用户userid列表
```php
$ding->user()->getDeptMember($deptId = 1);
```

### 获取部门用户
```php
$ding->user()->getSimpleList($department_id = 1, $offset = 0, $size = 100, $order = 'custom', $lang = 'zh_CN');
```

### 获取部门用户详情
```php
$ding->user()->getListByPage($department_id = 1, $offset = 0, $size = 100, $order = 'custom', $lang = 'zh_CN');
```

### 获取管理员列表
```php
$ding->user()->getAdmin();
```

### 获取管理员通讯录权限范围
```php
$ding->user()->getAdminScope($userid);
```

### 根据unionid获取userid
```php
$ding->user()->getUseridByUnionid($unionid);
```

### 获取企业员工人数
```php
$ding->user()->getOrgUserCount($onlyActive = 0);
```

### 创建用户
```php
$params = [
     'userid' => 'example',
     'name' => 'Example',
     'orderInDepts' => '{1:10, 2:20}',
     'department' => [1],
     'position' => '产品经理',
     'mobile' => 'xxxxxxxxxxx',
     'tel' => 'xxx-xxxxxxxxx',
     'workPlace' => '',
     'remark' => '',
     'email' => 'example@example.com',
     'orgEmail' => 'example@example.org',
     'jobnumber' => '111111',
     'isHide' => false,
     'isSenior' => false,
     'extattr' => [
       '爱好' => '旅游'
     ],
];

$ding->user()->create($params);
```

### 更新用户
```php
$params = [
     'userid' => 'example',
     'name' => 'Example',
     'orderInDepts' => '{1:10, 2:20}',
     'department' => [1],
     'position' => '产品经理',
     'mobile' => 'xxxxxxxxxxx',
     'tel' => 'xxx-xxxxxxxxx',
     'workPlace' => '',
     'remark' => '',
     'email' => 'example@example.com',
     'orgEmail' => 'example@example.org',
     'jobnumber' => '111111',
     'isHide' => false,
     'isSenior' => false,
     'extattr' => [
       '爱好' => '旅游'
     ],
];
$ding->user()->update($params);
```

### 删除用户
```php
$ding->user()->delete($userid);
```
