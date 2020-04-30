<?php

class Token
{
    // Creates a token to be used to protect against CSRF attacks 
    public static function createToken()
    {
        return Session::putSession(Config::get('session/token_name'), md5(uniqid()));
    }
    // Check if token exists in the session
    public static function checkToken($token)
    {
        $tokenName = Config::get('session/token_name');
        // Check if session token exists, and if the token generated in sign-up.php the same as the token in the session
        if (Session::checkExists($tokenName) && $token === Session::getSession($tokenName)) {
            Session::deleteSession($tokenName);
            return true;
        }
        return false;
    }
}
