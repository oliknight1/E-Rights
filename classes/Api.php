<?php
class Api
{
    private  $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function getCourse($col = null, $data = null)
    {

        switch ($col) {

                // No GET parameter was set, so get all courses
            case null:
                $returnData = $this->db->getData('courses');
                return json_encode($returnData->allResults(), JSON_PRETTY_PRINT);

                // Name GET parameter was set, so return only the course with that name
            case 'name':
                $returnData = $this->db->getData('courses', array($col, '=', $data));
                return json_encode($returnData->firstResult(), JSON_PRETTY_PRINT);

                // category GET parameter was set, so return all courses with that category
            case 'category':
                $returnData = $this->db->getData('courses', array($col, '=', $data));
                return json_encode($returnData->allResults(), JSON_PRETTY_PRINT);
        }
    }
}
