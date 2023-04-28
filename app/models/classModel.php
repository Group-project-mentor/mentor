<?php 

class classModel extends Model{

    private $table = 'private_class';

    public function __construct(){
        parent::__construct();
    }

    public function getClassId($id){
        $row = array();
        $result = $this->getData($this->table,"class_id = $id");
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

