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




if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Check if there has been a GET request
    if (isset($_GET['id'])) {

        // display the data
        // make sure the id is an int
        print_r($user->getSingleUser(intval($_GET['id'])));
    } else if (isset($_GET['username'])) {
        // display the data
        // make sure the username is an is string
        print_r($user->getSingleUserById(strval($_GET['username'])));
    }
}
