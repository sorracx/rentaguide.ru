<?php

namespace app\core;

abstract class Controller
{
    protected $params;
    protected $acl;
    protected $view;
    protected $model;

    public function __construct($params)
    {
        $this->params = $params;
        if (!$this->checkAcl()) {
            View::errorCode(403);
        }
        $this->view = new View($params);
        $this->model = $this->loadModel($this->params["controller"]);
    }

    protected function checkAcl()
    {
        $path = "app/acl/".$this->params["controller"].".php";
        if (!file_exists($path)) {
            return false;
        }
        $this->acl = require_once $path;

        if ($this->getAcl("all")) {
            return "all";
        }
        if ($this->getAcl("guest") and !isset($_SESSION["account"])) {
            return "guest";
        }
        // TODO: other acl

        return false;
    }

    protected function getAcl($key)
    {
        return in_array($this->params["action"], $this->acl[$key]);
    }

    protected function loadModel($title)
    {
        $model = "app\models\\".ucfirst($title);
        if (class_exists($model)) {
            return new $model();
        }
        return false;
    }
}
