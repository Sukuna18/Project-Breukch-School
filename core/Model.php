<?php

namespace Core;

class Model
{
    public $db;

    public function __construct()
    {
        $this->db = new Database('mysql:dbname=Gestion_commerciale;dbhost=localhost', 'root', 'sukuna');
    }
}
