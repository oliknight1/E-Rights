<?php

class User
{
    // Database variables
    private $conn;
    private $table = 'user';

    // User variables

    private $id;
    private $username;
    private $password;
    private $security_question;
    private $security_answer;

    public function __construct($db)
    {
        $this->conn = $db->connect();
    }

    // Grabs every users inside the table
    public function getUsers()
    {
        $query = "SELECT * from `users` ORDER BY `id` ASC";

        $result = $this->conn->query($query);

        return $result;
    }





    public function getSingleUser($id)
    {
        // ? is the id of the user we want to get
        $query = "SELECT * from `users` WHERE `id` = " . $id . " LIMIT 0,1";

        $result = $this->conn->query($query);
        $row = $result->fetch_assoc();

        // Set user properties 
        $this->id = $row["id"];
        $this->username = $row["username"];
        $this->password = $row["password"];
        $this->security_question = $row["security_question"];
        $this->security_answer = $row["security_answer"];
    }

    public function getId()
    {
        return $this->id;
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getSecurityQuesion()
    {
        return $this->security_question;
    }

    public function getSecurityAnswer()
    {
        return $this->security_answer;
    }
}
