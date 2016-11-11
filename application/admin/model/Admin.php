<?php
namespace app\admin\model;
use think\Db;
use think\Model;

class Admin extends Model
{
    public function login($data)
    {
        $user = Db::name('admin')->where('username',$data['username'])->find();
        if($user && $user['password'] == md5($data['password'])){
                session('username',$user['username']);
                session('uid',$user['id']);
                return 1;//信息正确
        }else{
            return 0;//信息错误
        }
    }
}