## 智能人事

### 获取员工花名册字段信息
```php
$ding->smartwork()->lists($userid_list);
```

### 查询企业待入职员工列表
```php
$ding->smartwork()->queryPreentry();
```

### 查询企业在职员工列表
```php
$ding->smartwork()->queryOnJob();
```

### 查询企业离职员工列表
```php
$ding->smartwork()->queryDimission();
```

### 获取离职员工离职信息
```php
$ding->smartwork()->listDimission($userid_list);
```

### 添加企业待入职员工
```php
$ding->smartwork()->addPreentry($name, $mobile);
```