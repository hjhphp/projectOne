<?php
/**
* 等三方登陆插件配置
* @date: 2015年10月17日
* @author: Administrator
* @return:
*/
$SITE_URL = "http://weiloving.com/";
define('URL_CALLBACK', "" . $SITE_URL . "Home/Common/callback?type=");
return array(    
    #腾讯QQ登录配置
    'THINK_SDK_QQ' => array(
        'APP_KEY' => '101401966', # APP ID
        'APP_SECRET' => '7c22979c147993cadc748cae6c1117fe', # KEY
        'CALLBACK' => URL_CALLBACK . 'qq',
    ),
    
);