<?php
namespace app\index\controller;
use app\index\controller\BaseController;

class IndexController extends BaseController
{
	public function index()
	{
	    $articleres=db('article')->order('id desc')->paginate(3);
    	$this->assign('articleres',$articleres);
	    return $this->fetch();
	}
}