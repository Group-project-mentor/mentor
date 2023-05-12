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
    public function getMatchingNames($search_query)
    {
        $q="Select id,name from user where user.type='st' and user.name LIKE ?";
        $s = "$search_query%";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s',$s);
        return $this->fetchObjs($stmt);
    }
}
