<?php
namespace app\admin\controller;
use think\Controller;

class LoginController extends Controller
{
	public function index()
	{
        if(request()->isPost()){
            $data = [
                'username'=>input('username'),
                'password'=>input('password'),
            ];
            $uvalue = model('Admin')->login($data);
            $code = input('code');
            if (!captcha_check($code)) {
                $this->error('验证码错误');
            } else {
                if($uvalue == 1){
                    $this->success('信息正确，正在登入....','index/index');
                }else{
                    $this->error('用户名或密码错误！');
                }
            }

        }
	    return $this->fetch('login');
	}
}