<?php
namespace app\admin\validate;
use think\Validate;
class Links extends Validate
{

     protected  $rule = [
         ['title','require|max:10|unique:links','链接标题不能为空|链接标题长度不能大于10|链接标题不能重复'],
         ['url','require','链接地址必须填写'],
         ['desc','require|max:25','内容长度不能大于25']
     ];

    protected $scene = [
        'add' => ['title','url','desc'=>'max:25'],
        'edit' => ['title','desc'=>'max:25'],
    ];

}