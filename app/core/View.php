<?php

namespace app\core;

class View
{
    private $params;
    private $path;
    public $layouts = "default";
    public $header = "unregistered";

    public function __construct($params)
    {
        $this->params = $params;
        $this->path = $params["controller"]."/".$params["action"];
    }

    public function render($title, $vars = [])
    {
        extract($vars);
        $header = $this->header;
        $path = "app/views/$this->path.php";
        if (file_exists($path)) {
            ob_start();
            require_once $path;
            $content = ob_get_clean();
            $path = "public/styles/$this->path.css";
            if (file_exists($path)) {
                $style = "<link rel='stylesheet' href='$path'>";
            } else {
                $style = "";
            }
            require_once "app/views/layouts/$this->layouts.php";
        }
    }

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
