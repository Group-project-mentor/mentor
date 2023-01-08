<?php 
class Teacher_data extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses(){
        $id = 1;
        $q = "select private_class.class_id, private_class.class_name from private_class inner join teacher_has_class on teacher_has_class.class_id = private_class.class_id where teacher_has_class.teacher_id = 1";
        $result = $this->executeQuery($q);
        if($result->num_rows > 0){
            $row = array();
            while($row = $result->fetch_assoc()){
                $rows[] = $row;
            }
            return $rows;
        }
        else{
            return array() ;
        } 
    }

    public function addClass($id,$name){
        $q = "INSERT INTO private_class (class_id,class_name) VALUES (".$id.",'".$name."')";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function getLastClassID(){
        $query = "select class_id from private_class order by class_id desc limit 1";
        $result = $this->executeQuery($query)->fetch_row();
        if(!empty($result)){
            return ++$result[0];
        }else{
            return 1;
        }
    }

    public function teacherHasClass($id){
        $q = "INSERT INTO teacher_has_class (teacher_id,class_id,host_teacher_id) VALUES (1,".$id.",1)";
        $result = $this->executeQuery($q);
        return $result;
    }
}

?>
