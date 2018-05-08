<?php

namespace app\core;

class Router
{
    private $routes;
    private $params;

    public function __construct()
    {
        $routes = require_once "app/config/routes.php";
        foreach ($routes as $route => $params) {
            $this->add($route, $params);
        }
    }

    private function add($route, $params)
    {
        $route = "#^$route$#";
        $route = str_replace("*", "[^/]*", $route);
        $route = str_replace(")", ")?", $route);
        list($controller, $action) = explode("@", $params);
        $this->routes[$route] = ["controller" => $controller, "action" => $action];
    }

    private function match()
    {
        $url = trim($_SERVER["REQUEST_URI"], "/");
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url, $matches)) {
                $this->params = $params;
                unset($matches[0]);
                foreach ($matches as $match) {
                    list($param, $val) = explode("/", trim($match, "/"));
                    $this->params[$param] = $val;
                }
                return true;
            }
        }
        return false;
    }

    public function run()
    {
        if ($this->match()) {
            $path = "app\controllers\\".ucfirst($this->params["controller"])."Controller";
            if (class_exists($path)) {
                $action = $this->params["action"]."Action";
                if (method_exists($path, $action)) {
                    $controller = new $path($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }
}
