<?php
class Validation
{

    private $passed = false;
    private $errors = array();
    private $db = null;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }
    // Checks the data passed in, against a set of rules that are also passed in 
    // $request will be what sort of request is passed into the function e.g POST
    public function checkData($request, $inputNames = array())
    {
        // $inputName will be 'password' 'username' etc.,
        // $rules are the rules attached to the input, e.g min length
        foreach ($inputNames as $inputName => $rules) {
            // Loop through all the rules with $ruleValue as each individual rule
            foreach ($rules as $rule => $ruleValue) {

                // Trim to remove whitespace
                $value = trim($request[$inputName]);

                // Add an error if the input is required, and hasn't beeen filled out
                if ($rule === 'required' && empty($ruleValue)) {
                    $this->addError("{$rules['name']} is required");
                } else if (!empty($value)) {

                    switch ($rule) {
                        case 'min':

                            // Add an error if string length of $value is less than than the rule min value
                            if (strlen($value) < $ruleValue) {
                                $this->addError("{$rules['name']} must be a minimum of {$ruleValue} characters");
                                echo $inputName . "<br>";
                            }
                            break;
                        case 'max':

                            // Add an error if string length of $value is more than than the rule max value
                            if (strlen($value) > $ruleValue) {
                                $this->addError("{$rules['name']} must be a maximum of {$ruleValue} characters");
                            }
                            break;
                        case 'matches':

                            // Need to use $request[$ruleValue] as we dont have the value we want to check availble in the loop
                            if ($value != $request[$ruleValue]) {
                                $this->addError("{$ruleValue} must match {$rules['name']}");
                            }

                            break;
                        case 'unique';
                            // Run a query using a function from Database.php to check if the input is already in the database
                            // Add an error if it is already in the database
                            $check = $this->db->getData($ruleValue, array($inputName, '=', $value));
                            if ($check->count()) {
                                $this->addError("{$rules['name']} already exists");
                            }
                            break;
                    }
                }
            }
        }
        // Check if there are no errros
        // Do not need an else as $passed is set to false by default
        if (empty($this->errors)) {
            $this->passed = true;
        }
        return $this;
    }
    // Recieves and error and adds it into the array of errors
    private function addError($error)
    {
        $this->errors[] = $error;
    }

    public function displayErrors()
    {
        return $this->errors;
    }
    public function checkPassed()
    {
        return $this->passed;
    }
}
