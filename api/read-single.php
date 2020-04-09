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


// Check if there has been a GET request
if (isset($_GET['id'])) {

    // display the data
    print_r($user->getSingleUser($_GET["id"]));
} else {
    echo "No id selected";
}
