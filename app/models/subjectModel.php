<?php 

class SubjectModel extends Model{

    private $table = 'subject';

    public function __construct(){
        parent::__construct();
    }

    public function getSubject($id){
        $row = array();
        $result = $this->getData($this->table,"id = $id");
        if (empty($result)) {
            redirect(BASEURL."subjects");
        }
        else{
            $row = $result -> fetch_row();
            return $row;
        }
    }
}

?>