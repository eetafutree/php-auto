<?php
//公共函数
function dump($var, $echo = true, $label = null, $flags = ENT_SUBSTITUTE)
{
    $label = (null === $label) ? '' : rtrim($label) . ':';

    ob_start();
    var_dump($var);
    $output = preg_replace('/\]\=\>\n(\s+)/m', '] => ', ob_get_clean());

    if (php_sapi_name()==='cli') {
        $output = PHP_EOL . $label . $output . PHP_EOL;
    } else {
        if (!extension_loaded('xdebug')) {
            $output = htmlspecialchars($output, $flags);
        }

        $output = '<pre>' . $label . $output . '</pre>';
    }

    if ($echo) {
        echo($output);
        return;
    }

    return $output;
}


function http_response_json($code,$msg,$data){
    header('Content-Type: application/json');
    echo json_encode(['code'=>$code,'msg'=>$msg,'data'=>$data]);
    exit();
}

function convertSize($size)
{
    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB',];
    for ($i = 0; $size >= 1024 && $i < count($units) - 1; $i++) {
        $size /= 1024;
    }
    return sprintf("%10s", sprintf("%.3f", round($size, 3)) . ' ' . $units[$i]);
}
