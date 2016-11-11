<?php
namespace app\index\controller;
use app\index\controller\BaseController;

class CateController extends BaseController
{
	public function index()
	{
	    $cateid=input('cateid');
    	//查询当前栏目名称
    	$cates=db('cate')->find($cateid);
    	$this->assign('cates',$cates);
    	//查询当前栏目下的文章
    	$articleres=db('article')->where('cateid',$cateid)->paginate(3);
    	$this->assign('articleres',$articleres);
	    return $this->fetch('cate');
	}
}