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
        $q = "Select id,name from user where user.type='st' and user.name LIKE ?";
        $s = "$search_query%";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $s);
        return $this->fetchObjs($stmt);
    }

    public function getMatchingTchNames($search_query)
    {
        $q = "Select id,name from user where user.type='tch' and user.name LIKE ?";
        $s = "$search_query%";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $s);
        return $this->fetchObjs($stmt);
    }

    // Function to get matching names from database
    public function getReportMatchingNames($search_query)
    {
        $q = "Select user.id,name from user where user.type='st' and user.name LIKE ?";
        $s = "$search_query%";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $s);
        return $this->fetchObjs($stmt);
    }

    public function getTotalSt( $cid)
    {

        $stmt = $this->prepare("SELECT COUNT(classes_has_students.student_id) AS count FROM classes_has_students WHERE classes_has_students.class_id=?");
        $stmt->bind_param('i', $cid);
        return $this->fetchOneObj($stmt);
    }

    public function getTotalTr( $cid)
    {
        $stmt = $this->prepare("SELECT COUNT(classes_has_extra_teachers.teacher_id) AS count FROM classes_has_extra_teachers WHERE classes_has_extra_teachers.class_id=?");
        $stmt->bind_param('i', $cid);
        return $this->fetchOneObj($stmt);
    }

    public function getToken($cid)
    {
        $stmt = $this->prepare("SELECT private_class.token from private_class WHERE private_class.class_id=?;");
        $stmt->bind_param('i', $cid);
        return $this->fetchOneObj($stmt);
    }
}
