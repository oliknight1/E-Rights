<?php

require_once 'core/init.php';

$user = new User();


if ($user->getIsLoggedIn()) {
    echo "logged in";
}
