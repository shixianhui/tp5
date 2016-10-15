<?php
namespace app\demo\controller;

use think\Controller;
// use think\Db;
use app\demo\model\User;
// use think\Session;
class Index extends Controller
{
    function __contruct()
    {

    }
    public function signin()
    {   
        
        if(!empty($_POST['username'])&&(!empty($_POST['password']))) 
        {
            $username = $_POST['username'];
            $password = $_POST['password'];
        
            $User = new User;
            $result = $User->signin($username,$password);
            // dump($result);die;
            if(!empty($result))
            {
                echo "欢迎光临！";
            }
            else
            {
                echo "你的用户名或者密码错误";
            }

        }
        else
        {
            echo "请输入用户名和密码";
        }
        $this->assign('title','登录页');
        return $this->fetch();
    }

    public function signup()
    {
        if(!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['password-confirm']))
        {
            if($_POST['password'] == $_POST['password-confirm']) 
            {   $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $User = new User;
                $result = $User->signup($username,$email,$password);
                if(count($result) != 0)
                {
                    echo "注册成功，请前往登录！";
                }
            }
            else
            {
                echo "请检查输入的密码是否一致";
            }
        }
        else
        {
            echo "请输入信息";
        }
        $this->assign('title','注册页');
        return $this->fetch();
    }

    
}


