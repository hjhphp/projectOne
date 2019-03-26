<?php
// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');
// 开启调试模式
//define('APP_DEBUG',TRUE);
define('APP_DEBUG',FALSE);
// 定义模板路径
define('TMPL_PATH','./Tpl/');
// 定义缓存目录
define('RUNTIME_PATH', './Runtime/');
// 定义应用目录
define('APP_PATH','./Application/');
// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';