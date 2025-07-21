<?php
//配置编码
header("Content-Type:text/html;charset=utf-8");

//配置时区
date_default_timezone_set('Asia/Shanghai');

//定义根目录app
define('app',str_replace('\\','/',realpath(dirname(__FILE__).'/../')));

//自动加载
require app.'/auto/autoload.php';

//加载公共配置
require app.'/auto/conf.php';

//加载公共函数
require app.'/auto/common.php';
