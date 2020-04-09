<?php

class Get
{
    // Database properties
    private $conn;
    private $table = 'users';

    // Get properties
    public $id;
    public $username;
    public $password;
    public $securityQ;
    public $securityA;

    public function __construct($db)
    {
        $this->conn = $db;
    }
}
