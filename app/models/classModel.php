<?php

class classModel extends Model
{

    private $table = 'private_class';

    public function __construct()
    {
        parent::__construct();
    }

    public function getClassId($id)
    {
        $row = array();
        $result = $this->getData($this->table, "class_id = $id");
        if (empty($result)) {
            return array();
        } else {
            $row = $result->fetch_row();
            return $row;
        }
    }
    // Function to get matching names from database
    //public function getMatchingNames($search_query)
    //{
       // $sql = "SELECT 1";
        //$stmt = $this->prepare($sql);
        //$search_query = '%' . $search_query . '%';
       // $stmt->bind_param("s", $search_query);
       // $stmt->execute();
        //$result = $stmt->get_result();
        //$matching_names = array();
        //while ($row = $result->fetch_assoc()) {
          //  array_push($matching_names, $row['name']);
        //}
        //$stmt->close();
        //return $matching_names;
    //}
}
