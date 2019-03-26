<?php
/**
* 前台配置
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
return array(
	//错误页无法使用全局参数 请自行修改
    'TMPL_EXCEPTION_FILE' => '/Public/Html/404.html',
    'TMPL_ACTION_ERROR'   => '/Public/Html/404.html',
	'ERROR_PAGE'   =>  '/Public/Html/404.html',
	'TMPL_PARSE_STRING' =>  array(
        '__JS__'    =>  '/Public/Js',
        '__CSS__'   =>  '/Public/Css',
        '__IMG__'   =>  '/Public/Img',   
    ),
    'URL_MODEL' =>2,    
    'URL_ROUTER_ON' => true,   
    'URL_ROUTE_RULES' => array(
    	'/^index$/'           	=>    'Index/index',
        '/^about$/'           	=>    'About/index', 
        '/^feel$/'            	=>  'Feel/index',
        '/^feel\/page\/(\d{1,})$/'  =>  'Feel/index?page=:1',
        '/^feel-(\d{1,})$/'     =>  'Feel/info?id=:1',
        '/^gust$/'          	=>  'Gust/index',
        '/^gust\/(\d{1,})$/'	=>	'Gust/index?page=:1',
        '/^album-(\d{1,5})$/'   =>  'Album/look?id=:1',
        '/^album$/'             =>  'Album/index',
        '/^class-(\d{1,})\/page\/(\d{1,})$/'        =>  'Class/index?id=:1&page=:2',
        '/^class-(\d)$/'        =>  'Class/index?id=:1',
        '/^article-(\d{1,5})$/' =>  'Article/index?id=:1',
        '/^tools$' 				=>  'Tools/index',
        '/^tools_str$/' 		=>  'Tools/str',
        '/^tools_md5$/' 		=>  'Tools/md5',
        '/^tools_unix$/' 		=>  'Tools/unix',
        '/^music$/' 			=>  'Tools/music',
        '/^tools_machine$/' 	=>  'Tools/machine',
        '/^seo$/' 				=>  'Tools/seo',
        '/^down$/' 				=>  'Down/index',
    ),
);