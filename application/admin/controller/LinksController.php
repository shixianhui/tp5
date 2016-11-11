<?php
namespace app\admin\controller;
use app\admin\controller\BaseController;
use think\Loader;
use app\admin\model\Links;
class LinksController extends BaseController
{
	public function lst()
	{
        $list = Links::paginate(3);
        $this->assign('list',$list);
	    return $this->fetch();
	}

	public function add()
	{
		if(request()->isPost()){
			$data=[
			'title'=>input('title'),
			'url'=>input('url'),
            'desc'=>input('desc'),
			];

            $validate = Loader::validate('Links');
            if(!$validate->scene('add')->check($data)){
                $this->error($validate->geterror());die;
            }

//            $result = $this->validate($data,'links');
//            if (true !== $result) {
//                return $result;
//            }


			if(db('links')->insert($data)){
				return $this->success('添加链接成功','lst');
			}else{
				return $this->error('添加链接失败！');
			}
			return;
		}
	    return $this->fetch();
	}

	public function edit()
	{
        $id = input('id');
        $linkss = db('links')->where('id',$id)->find();

        $this->assign('linkss',$linkss);
        if(request()->isPost()){
            $data = [
                'title'=>input('title'),
                'desc'=>input('desc')
            ];
            if(input('url')){
                $data['url'] = input('url');
            }else{
                $data['url'] = $linkss['url'];
             }

            $validate = Loader::validate('Links');
            if(!$validate->scene('edit')->check($data)){
                $this->error($validate->geterror());die;
            }
            if(db('links')->where('id',$id)->update($data)){
                return $this->success('编辑管理员信息成功！','lst');
            }else{
                return $this->error('编辑管理员信息失败！');
            }
        }
	    return $this->fetch();
	}

    public function del()
    {
        $id = input('id');
        if(db('links')->delete($id)){
            return $this->success('链接删除成功！','lst');
        }else{
            return $this->error('链接删除失败！');
        }
    }
}