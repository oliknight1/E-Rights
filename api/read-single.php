<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../config/User.php';

// Instantiate database and connect to it
$db = new Database();
$db->connect();

// Instantiate user object
$user = new User($db);


// ADD A CHECK IF THERE IS A USER WITH THAT ID
if (isset($_GET['id'])) {

    $user->getSingleUser($_GET["id"]);


    $userArr = array(
        'id' => $user->getId(),
        'username' => $user->getUsername(),
        'password' => $user->getPassword(),
        'security_question' => $user->getSecurityQuesion(),
        'security_answer' => $user->getSecurityAnswer(),

    );

    // Print out the json data
    print_r(json_encode($userArr));
} else {
    echo "No id selected";
}
