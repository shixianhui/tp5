<?php
namespace app\index\controller;
use app\index\controller\BaseController;

class SearchController extends BaseController
{
    public function index(){
            $keywords = input('keywords');
        if($keywords){
            $searchres = db('article')->where('title','like','%'.$keywords.'%')->order('id asc')->paginate($listRows = 3,
                $simple = false, $config = ['query'=>array('keywords'=>$keywords)]);
            $this->assign(array(
                'searchres'=>$searchres,
                'keywords'=>$keywords
                ));
        }else{
            $this->assign(array(
                'searchres'=>null,
                'keywords'=>'暂无数据'
                ));
        }


       return $this->fetch('search');
    }

}
