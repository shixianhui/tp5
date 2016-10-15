<?php
namespace app\demo\model;

use think\Model;
use think\Db;

class User extends Model
{
	public function signin($username,$password)
    {
        
        // $result = Db::table('users')->where('username',$username,'password',$password)->select();
        $result = Db::query("SELECT * from users WHERE username = '".$username."' AND password ='".md5($password)."'");

        return $result;
    }

    public function signup($username,$email,$password)
    {
    	// $insert = Db::execute("INSERT INTO users VALUES(?,?,?,?)",[NULL,"$username", "$email", "md5($password)"]);
    	$insert = Db::execute("INSERT INTO users VALUES(NULL,'".$username."', '".$email."', '".md5($password)."')");
    	return $insert;
    }
    
}