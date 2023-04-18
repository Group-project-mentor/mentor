<?php 

class admin extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function studentCount(){
        $result = $this->getData("user", "`type` = 'st'"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        }
    }


    public function teacherCount(){
        $result = $this->getData("user", "`type` = 'tch'"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        } 
    }


    public function complaints(){
        $query = "SELECT user.name, user.id, complaint.description, complaint.work_id FROM user INNER JOIN complaint ON user.id = complaint.user_id";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }
    
    
    public function addAdmin($name,$email,$password){
        
        $addAdmin = "insert into admin(name,email,password) values('$name','$email','$password');";
        $result = $this->executeQuery($addAdmin);

        return ($result);
    }

    public function addTeamMemb($id){
        
        $addAdmin = "insert into admin(name,email,password) values('$name','$email','$password');";
        $result = $this->executeQuery($addAdmin);

        return ($result);
    }

    // public function addComplaintToTask(){

    //     $result[] = $this->getData("complaint")
    // }

}

?>