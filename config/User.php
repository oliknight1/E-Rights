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





    public function getSingleUserById($data)
    {

        // if $data is a int, then it will be an id
        // if $data is a string, it will be a username
        if (is_int($data)) {

            $query = "SELECT * from `users` WHERE `id` = " . $data . " LIMIT 0,1";
        } else if (is_string($data)) {


            $query = "SELECT * from `users` WHERE `username` = \"" . $data . "\" LIMIT 0,1";
        }

        $result = $this->conn->query($query);
        // Place the data into an array
        if ($result->num_rows > 0) {

            $row = $result->fetch_assoc();

            // Set user properties 
            $this->id = $row["id"];
            $this->username = $row["username"];
            $this->password = $row["password"];
            $this->security_question = $row["security_question"];
            $this->security_answer = $row["security_answer"];

            return json_encode($row);
        } else {
            echo "No users found";
        }
    }
}
