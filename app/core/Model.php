<?php

namespace app\core;

use app\lib\Db;

abstract class Model
{
    private $db;

    public function __construct()
    {
        $this->db = new Db();
    }
}
