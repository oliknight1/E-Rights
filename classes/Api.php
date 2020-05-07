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
        if (is_null($col) || is_null($data)) {
            $data = $this->db->getData('courses');
            return json_encode($data->allResults());
        }
        $data = $this->db->getData('courses', array($col, '=', $data));
        return json_encode($data->firstResult());
    }
}
