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
    }
}
