<?php

class User
{
    private $db;
    private $userData;
    private $sessionName;

    private $isLoggedIn;

    public function __construct($user = null)
    {
        $this->db = Database::getInstance();
        $this->sessionName = Config::get('session/session_name');
        // Check if the user is not logged in
        if (!$user) {

            if (Session::checkExists($this->sessionName)) {
                $user = Session::getSession($this->sessionName);

                if ($this->findUser($user)) {
                    $this->isLoggedIn = true;
                } else {
                    // Log out
                }
            }
        } else {
            $this->findUser($user);
        }
    }
    public function createUser($fields)
    {
        if (!$this->db->insertData('users', $fields)) {
            throw new Exception('There was a problem creating an new account');
        }
    }
    public function findUser($user = null)
    {
        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $data = $this->db->getData('users', array($field, '=', $user));

            if ($data->count()) {
                $this->data = $data->firstResult();
                return true;
            }
        }
    }
    public function login($username = null, $password = null)
    {
        // Check that the username entered is in the database
        $user = $this->findUser($username);

        // Check if the user exists
        if ($user) {
            // verify that the password inputted is the same as the hashed password stored in the db
            if (password_verify(Input::getInput('password'), $this->getData()->password)); {
                // Store user id inside the session
                Session::putSession($this->sessionName, $this->getData()->id);
            }
        }
        return false;
    }

    public function logOut()
    {
        Session::deleteSession($this->sessionName);
    }

    public function getData()
    {
        return $this->data;
    }

    public function getIsLoggedIn()
    {
        return $this->isLoggedIn;
    }
}
