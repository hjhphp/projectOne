<?php
/**
* 网站配置
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
return array(
	'URL_CASE_INSENSITIVE'  =>  false,  
	//'SHOW_PAGE_TraCE' 	=> true, 
	//'ERROR_PAGE'=>'/Public/Html/404.html',
	'S_TIME'			=>	10,
    'LOAD_EXT_CONFIG'   =>  'db,email,sdk,system',
	'MODULE_ALLOW_LIST' =>  array('Home','Admin'),
    'DEFAULT_MODULE'    =>  'Home',
    'TMPL_FILE_DEPR'    =>  '_',
    'TMPL_PARSE_STRING' =>  array(
        '__JS__'    =>  '/Public/Js',
        '__CSS__'   =>  '/Public/Css',
        '__IMG__'   =>  '/Public/Img'     
    ),
);