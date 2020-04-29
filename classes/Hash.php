<?php

class Hash
{
    public static function makeHash($str, $salt = '')
    {
        return hash('sha256', $str . $salt);
    }
    public static function makeSalt($length)
    {
        return mcrypt_create_iv($length);
    }
    public static function makeUnique()
    {
    }
}
