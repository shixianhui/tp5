<?php
namespace app\admin\controller;
use app\admin\controller\BaseController;
use think\Loader;
use app\admin\model\Admin;
class AdminController extends BaseController
{
	public function lst()
	{
        $list = Admin::paginate(3);
        $this->assign('list',$list);
	    return $this->fetch();
	}

	public function add()
	{
		if(request()->isPost()){
			$data=[
			'username'=>input('username'),
			'password'=>input('password'),
			];

            $validate = Loader::validate('Admin');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->geterror());die;
            }
            $data['password'] = md5(input('password'));

//            $result = $this->validate($data,'Admin');
//            if (true !== $result) {
//                return $result;
//            }


			if(db('admin')->insert($data)){
				return $this->success('添加管理员成功','lst');
			}else{
				return $this->error('添加管理员失败！');
			}
			return;
		}
	    return $this->fetch();
	}

	public function edit()
	{
        $id = input('id');
        $admins = db('admin')->where('id',$id)->find();
        if(request()->isPost()){
            $data = [
                'id'=>input('id'),
                'username'=>input('username'),

            ];
            if(input('password')){
                $data['password'] = md5(input('password'));
            }else{
                $data['password'] = $admins['password'];
            }
            $validate = Loader::validate('Admin');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->geterror());die;
            }

            $save=db('admin')->update($data);
            if($save !== false){
                return $this->success('编辑管理员信息成功！','lst');
            }else{
                return $this->error('编辑管理员信息失败！');
            }
        }
        $this->assign('admins',$admins);
	    return $this->fetch();

	}

    public function del()
    {
        $id = input('id');
        if(db('admin')->delete($id)){
            return $this->success('管理员删除成功！','lst');
        }else{
            return $this->error('管理员删除失败！');
        }
    }
    public function logout()
    {
        session(null);
        $this->success('退出成功','login/index');
    }
}