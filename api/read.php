<?php

// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../config/Database.php';
include_once '../config/User.php';

// Instantiate database and connect to it
$db = new Database();
$connection = $db->connect();

// Instantiate user object
$user = new User($db);

$user->getUsers();
$rowCount = $result->num_rows;

// Check if there are any users

if ($rowCount > 0) {
    $userArr = array();
    $userArr['data'] = array();

    while ($row = $result->fetch_assoc()) {
        extract($row);

        $userItem = array(
            'id' => $id,
            'username' => $username,
            'password' => $password,
            'security_question' => $securityQ,
            'security_answer' => $securityA

        );

        // Push to 'data'

        array_push($userArr['data'], $userItem);
    }
    // Turn into JSON & output

    echo json_encode($userArr);
} else {
    // No users

    echo json_encode(
        array('message' => "No Users Found")
    )
}
