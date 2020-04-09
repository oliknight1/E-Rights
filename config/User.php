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
}


// Not quite ready yet

//     public function getSingleUser()
//     {
//         // ? is the id of the user we want to get
//         $query = "SELECT * from `users` WHERE `id` = ? LIMIT 0,1";

//         // here we bind ? to the id of the user
//         $query->bind_param("i", $this->id);

//         $result = $this->conn->prepare($query);

//         $result->execute();
//         $row = $result->fetch_assoc();

//         // Set user properties 

//         $this->username = $row["username"];
//         $this->password = $row["password"];
//         $this->securityQ = $row["security_question"];
//         $this->securityA = $row["security_answer"];
//     }
// }
