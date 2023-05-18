<?php

namespace Core;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database('mysql:dbname=Gestion_school;dbhost=localhost', 'root', 'sukuna');
    }
}
