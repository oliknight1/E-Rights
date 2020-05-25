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
            throw new Exception('There was a problem creating a new account');
        }
    }
    public function findUser($user = null)
    {

        if ($user) {
            $field = (is_numeric($user)) ? 'id' : 'username';
            $userData = $this->db->getData('users', array($field, '=', $user));

            if ($userData->count()) {
                $this->userData = $userData->firstResult();
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
            if (password_verify($password, $this->getData()['password'])) {
                // Store user id inside the session
                Session::putSession($this->sessionName, $this->getData()['id']);
                return true;
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
        return $this->userData;
    }

    public function getIsLoggedIn()
    {
        return $this->isLoggedIn;
    }

    public function assignCourse($username, $courseId)
    {
        $user = $this->findUser($username);
        $id =  $this->getData()['id'];
        // add the user id and course id to the assigned_courses table
        $this->db->insertData("assigned_courses", array(
            'user_id' => $id,
            'course_id' => $courseId
        ));
    }
}
