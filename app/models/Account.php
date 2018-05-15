<?php

namespace app\models;

use app\core\Model;

class Account extends Model
{
    public function register($vars)
    {
        $email = $this->db->quote($vars["email"]);
        $role = $this->db->quote($vars["role"]);
        $password = password_hash($vars["password"], PASSWORD_BCRYPT);
        setcookie("email", $vars["email"], time() + 2592000);
        setcookie("password", $password, time() + 2592000);
        $password = $this->db->quote($password);
        $sql = "INSERT INTO users (email, password, role) VALUES ($email, $password, $role)";
        $this->db->query($sql);
    }

    public function isUser($email)
    {
        $email = $this->db->quote($email);
        $sql = "SELECT id FROM users WHERE email = $email";
        return $this->db->row($sql);
    }
}
