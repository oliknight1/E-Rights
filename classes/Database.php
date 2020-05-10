<?php

class Database
{
    // Stores instance of database
    private static $instance = null;

    // Store the pdo object here
    private $pdo;

    // Last query excecuted
    private $query;
    private $error = false;
    private $results;
    // Counts the results
    private $count = 0;

    private function __construct()
    {
        // Attempt to connection to the database
        try {
            $this->pdo  = new PDO('mysql:host=' . Config::get('mysql/host') . ';dbname=' . Config::get('mysql/dbName'), Config::get('mysql/username'), Config::get('mysql/password'));
        } catch (PDOException $e) {

            // kill the connection if there is an error connecting to the db and print out an error message for the user
            // make the message friendly to make the user less worried about running into an error]
            // also do not give any details about the error, as could be used by hackers
            die("There was an error on our end, sorry for any inconvenience!");
        }
    }

    // Allows us to get an instance of our databse if it has already been instantiated, means we do not need to keep create a new Database object on each page
    public static function getInstance()
    {

        // Check if we have instantiated a db object (e.g already connected to the db)
        // If not instantiate a new Database object

        // Need to use self on static variables

        if (!isset(self::$instance)) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    // Use preapred statments and binding values to protect against SQL injection 
    public function query($sql, $params = array())
    {
        // Set error to false to make sure we do not return an error from a query that has been made previously
        $this->error = false;
        // Check if query has been prepared successfully
        if ($this->query = $this->pdo->prepare($sql)) {
            $x = 1;
            // Check if parameters exist
            if (count($params)) {
                foreach ($params as $param) {
                    // Binds the parameter at position $x to $param
                    // e.g if $x = 1, we bind the first ? in the prepared query to $param
                    $this->query->bindValue($x, $param);
                    $x++;
                }
            }
            // Execute the query and check that it has been successful
            if ($this->query->execute()) {


                // Fetch the object of the results
                // Allows you to get rows and collumns of the table
                $this->results = $this->query->fetchAll(PDO::FETCH_ASSOC);

                $this->count = $this->query->rowCount();
            } else {
                $this->error = true;
            }
        }
        // Returns the current object, allows error() to check for errors in the query
        return $this;
    }

    public function action($action, $table, $where = array())
    {

        // Check that when the fucntion is called, $where has all the parameters it needs
        if (count($where) === 3) {

            // Define what comparison operators are allowed
            // Prevents unwanted characters being entered
            $operators = array('=', '<', '>', '<=', '>=');

            $field = $where[0];
            $operator = $where[1];
            $value = $where[2];

            // Check if a valid operator has been used
            if (in_array($operator, $operators)) {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
            }

            // Make sure there isn't an error in the query
            if (!$this->query($sql, array($value))->error()) {

                return $this;
            }
        } else {

            $sql = "{$action} FROM {$table}";

            // Make sure there isn't an error in the query
            if (!$this->query($sql)->error()) {
                return $this;
            }
        }
    }


    public function getData($table, $where = null)
    {

        // Passes parameters to action()
        return $this->action('SELECT *', $table, $where);
    }


    public function insertData($table, $fields = array())
    {
        if (count($fields)) {
            $keys = array_keys($fields);
            $values = '';
            $x = 1;

            // Adds ? for the values to create a prepared statement to protect against sql injection
            // Will output something like ?,?,?
            foreach ($fields as $field) {
                $values .= '?';
                // Only adds a , if we are NOT at the last $fields, prevents us from getting ?,?,?,
                if ($x < count($fields)) {
                    $values .= ', ';
                }
                $x++;
            }

            // Implode will add a ` , between each of the $keys
            // This allows us to make an reuseable insert query without always needing to know the table and what is going to be inserted
            $sql = "INSERT INTO users (`" . implode('`, `', $keys) . "`) VALUES({$values})";



            // Checks if the sql query worked correctly
            if (!$this->query($sql, $fields)->error()) {
                return true;
            }
        }
        return false;
    }
    public function results()
    {
        return $this->results;
    }

    public function firstResult()
    {
        return $this->results()[0];
    }
    public function allResults()
    {


        return $this->results();
    }

    // Returns false be default, but will return true if there has been an error
    public function error()
    {
        return $this->error;
    }

    public function count()
    {
        return $this->count;
    }
}
