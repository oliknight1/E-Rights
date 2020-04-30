<?php

session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'ok131_admin',
        'password' => 'i9uhXX99gOZW',
        'dbName' => 'ok131_e_rights_db'
    ), 'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

// Auto requires all the classes needed
spl_autoload_register(function ($class) {
    require_once 'classes/' . $class . '.php';
});

require_once 'functions/sanitize.php';
