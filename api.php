<?php
require_once 'core/init.php';
$api = new Api();
if (!empty($_GET)) {
    foreach ($_GET as $key => $value) {
        // check if it has a valid parameter, if not display all courses
        // Use return to stop it from printing multiple json records
        return print_r($api->getCourse($key, $value));
    }
} else {
    return print_r($api->getCourse($key, $value));
}
