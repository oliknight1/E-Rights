<?php

class Session
{
    public static function putSession($name, $value)
    {
        return $_SESSION[$name] = $value;
    }

    public static function checkExists($sessionName)
    {
        return (isset($_SESSION[$sessionName])) ? true : false;
    }
    public static function deleteSession($sessionName)
    {
        if (self::checkExists($sessionName)) {
            unset($_SESSION[$sessionName]);
        }
    }
    public static function getSession($sessionName)
    {
        return $_SESSION[$sessionName];
    }
}
