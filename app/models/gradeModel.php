<?php 

class GradeModel extends Model{

    private $table = 'grade';

    public function __construct(){
        parent::__construct();
    }

    public function getGrade($id){
        $row = array();
        $result = $this->getData($this->table,"id = $id");
        if (empty($result)) {
            return array();
        }
        else{
            $row = $result -> fetch_row();
            return $row;
        }
    }
}

?>

