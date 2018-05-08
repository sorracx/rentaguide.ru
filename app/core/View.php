<?php

namespace app\core;

class View
{
    public static function errorCode($code)
    {
        http_response_code($code);
        $path = "app/views/errors/$code.php";
        if (file_exists($path)) {
            require_once $path;
        }
        exit;
    }
}
