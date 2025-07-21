<?php
//自动加载类
if(file_exists(app.'/vendor/autoload.php')){
    require_once app.'/vendor/autoload.php';
}
spl_autoload_register(function ($class_name) {
    $class_name = preg_replace('/^app/',app,$class_name);
    $class_name = str_replace('\\','/',$class_name);
    $class_file = $class_name.'.php';
    require_once $class_file;
});
