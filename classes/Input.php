<?php
class Input
{
    public static function exists($type = 'post')
    {

        switch ($type) {
            case 'post':
                // Ternary operator, essentially an if statement
                return (!empty($_POST)) ? true : false;
                break;
            case 'get':
                return (!empty($_GET)) ? true : false;

                break;

            default:
                return false;
                break;
        }
    }
    public static function getInput($item)
    {

        if (isset($_POST[$item])) {
            return $_POST[$item];
        } else if (isset($_GET[$item])) {
            return $_GET[$item];
        }
        // Return empty string if there is no data availble
        return '';
    }
}
