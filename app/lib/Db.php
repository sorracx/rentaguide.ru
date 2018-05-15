<?php

namespace app\lib;

use PDO;

class Db
{
    private $db;

    public function __construct()
    {
        $config = require_once "app/config/db.php";
        $this->db = new PDO(
            "mysql:host=".$config["host"].
            ";dbname=".$config["db"],
            $config["user"],
            $config["password"]
        );
        $this->tableExists();
    }

    private function tableExists()
    {
        $sql = "CREATE TABLE IF NOT EXISTS `users` (
            `id` INT NOT NULL AUTO_INCREMENT,
            `email` VARCHAR(255) NOT NULL,
            `password` VARCHAR(255) NOT NULL,
            `role` VARCHAR(255) NOT NULL,
            PRIMARY KEY (`id`)) ENGINE = InnoDB";
        $this->query($sql);
    }

    public function query($sql)
    {
        $query = $this->db->query($sql);
        return $query;
    }

    public function row($sql)
    {
        $result = $this->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql)
    {
        $result = $this->query($sql);
        return $result->fetch(PDO::FETCH_ASSOC);
    }

    public function quote($str)
    {
        return $this->db->quote($str);
    }

    public function errorInfo()
    {
        return $this->db->errorInfo();
    }
}
