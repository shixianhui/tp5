<?php

return [
    
    'template'               => [ 
        // 模板后缀
        'view_suffix'  => 'htm',
    ],

    // 视图输出字符串内容替换
    'view_replace_str'       => [
    '__PUBLIC__'=>SITE_URL.'/public/static/index',
    '__IMG__'=>SITE_URL.'/public/static',
    '__ROOT__' => SITE_URL,
    ],
  
];
