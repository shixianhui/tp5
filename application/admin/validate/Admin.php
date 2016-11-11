<?php
namespace app\admin\validate;
use think\Validate;
class Admin extends Validate
{
    protected $rule = [
        'username' => 'require|max:10|unique:admin',
        'password' => 'require',
    ];

    protected $message = [
        'username.require' => '管理员名称不能为空',
        'uesrname.max' => '管理员名称长度不能大于10',
        'username.unique'=>'管理员名称不能重复',
        'password.require' => '管理员密码必须填写',
    ];
//      protected  $rule = [
//          ['username','require|max:10|unique:admin','管理员名称不能为空|管理员名称长度不能大于10|管理员名称不能重复'],
//          ['password','require','管理员密码必须填写']
//      ];

    protected $scene = [
        'add' => ['username','password'],
        'edit' => ['username'],
    ];



}