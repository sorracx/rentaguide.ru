<?php

namespace app\controllers;

use app\core\Controller;

class AccountController extends Controller
{
    public function registerAction()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = filter_var($this->clearStr($_POST["email"]), FILTER_SANITIZE_EMAIL);
            $password = $this->clearStr($_POST["password"]);

            if (!isset($_POST["sla"])) {
                $this->view->message("Требуется принять лицензионное соглашение");
            } elseif (
                !filter_var($email, FILTER_VALIDATE_EMAIL) or
                strlen($email) > 50 or
                strlen($password) > 50 or
                strlen($password) < 8
            ) {
                $this->view->message("Введенные данные некорректны");
            } elseif ($password != $_POST["re-password"]) {
                $this->view->message("Пароли не совпадают");
            } elseif ($this->model->isUser($email)) {
                $this->view->message("Пользователь с таким email уже существует");
            } else {
                $role = isset($_POST["guide"]) ? "guide" : "user";
                $vars = [
                    "email" => $email,
                    "password" => $password,
                    "role" => $role
                ];
                $this->model->register($vars);
                $this->view->location("/");
            }
        }
        $this->view->render("Регистрация");
    }

    public function logoutAction()
    {
        setcookie("email", "", time() - 2592000);
        setcookie("password", "", time() - 2592000);
        $this->view->redirect("/");
    }
}
