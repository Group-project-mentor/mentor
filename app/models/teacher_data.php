<?php 
class Teacher_data extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function getClasses($id){
        
        $q = "select private_class.class_id, private_class.class_name from private_class inner join
         teacher_has_class on teacher_has_class.class_id = private_class.class_id where teacher_has_class.teacher_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('i',$id);
        return $this->fetchObjs($result);
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
        $q = "INSERT INTO teacher_has_class (teacher_id,class_id,host_teacher_id) VALUES (".$_SESSION['id'].",".$id.",1)";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function getStudents($id){
        
        $q = "select DISTINCT user.id, user.name from user where id=? ";
        $result = $this->prepare($q);
        $result->bind_param('i',$id);
        return $this->fetchObjs($result);
    }

    public function addStudentsClass($id){
        $q = "INSERT INTO classes_has_students(class_id,student_id) VALUES (4,".$id.")";
        $result = $this->executeQuery($q);
        return $result;
    }

   
}

?>
