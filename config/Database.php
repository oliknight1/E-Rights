<?php

class Database
{

    // DO NOT CHANGE THESE VARIABLES
    private $dbHost = 'localhost';
    private $dbUserName = 'ok131_admin';
    private $dbPass = 'i9uhXX99gOZW';
    private $dbName = 'ok131_e_rights_db';
    private $conn;
    public function connect()
    {

        // Make sure there isn't already a connection to the database
        $this->conn = null;

        // Set the connection to the database
        $this->conn = new mysqli($this->dbHost, $this->dbUserName, $this->dbPass,$this->dbName);

        // If there is an error connecting to the database, terminate
        if ($this->conn->connect_error) {
            die("Connection to database has failed: " . $this->conn->connect_error);
        }

        return $this->conn;
    }
}

$db = new Database();

$db->connect();



?>
