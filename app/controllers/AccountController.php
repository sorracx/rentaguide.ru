<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
    public function registerAction()
    {
        $this->view->render("Регистрация");
    }
}
