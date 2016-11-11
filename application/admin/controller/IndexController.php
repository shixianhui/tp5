<?php
namespace app\admin\controller;
use app\admin\controller\BaseController;

class IndexController extends BaseController
{
	public function index()
	{
	    return $this->fetch();
	}
}