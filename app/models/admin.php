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

    public function scholorship(){
        $query = "SELECT *FROM scholarship;";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }
    
    
    

    public function addGrade($name,$photo){
        
        $addgrade = "INSERT into grade(`name`,`image`) values('$name','$photo');";
        $result = $this->executeQuery($addgrade);

        return ($result);
    }

    // public function addTeamMemb($id){
        
    //     $addAdmin = "insert into admin(name,email,password) values('$name','$email','$password');";
    //     $result = $this->executeQuery($addAdmin);

    //     return ($result);
    // }

    public function videos(){
        $query = "SELECT `public_resource`.*, `video`.* FROM `public_resource` INNER JOIN `video` ON `public_resource`.id = `video`.id WHERE `public_resource`.`type`='video' AND `public_resource`.`approved_by` IS NULL";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function quiz(){
        $query = "SELECT `public_resource`.*, `quiz`.* FROM `public_resource` INNER JOIN `quiz` ON `public_resource`.id = `quiz`.id WHERE `public_resource`.`type`='quiz' AND `public_resource`.`approved_by` IS NULL";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function pastpapers(){
        $query = "SELECT `public_resource`.*, `pastpaper`.* FROM `public_resource` INNER JOIN `pastpaper` ON `public_resource`.id = `pastpaper`.id WHERE `public_resource`.`type`='paper' AND `public_resource`.`approved_by` IS NULL";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function pdfs(){
        $query = "SELECT `public_resource`.*, `document`.* FROM `public_resource` INNER JOIN `document` ON `public_resource`.id = `document`.id WHERE `public_resource`.`type`='pdf' AND `public_resource`.`approved_by` IS NULL";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function others(){
        $query = "SELECT `public_resource`.*, `other`.* FROM `public_resource` INNER JOIN `other` ON `public_resource`.id = `other`.id WHERE `public_resource`.`type`='other' AND `public_resource`.`approved_by` IS NULL";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    // public function pastpprs(){
    //     $query = "SELECT* FROM pastpaper";
    //     $result = $this->executeQuery($query);
    
    //     if ($result->num_rows > 0) {
    //         return $result->fetch_all(MYSQLI_ASSOC);
    //     } else {
    //         return false;
    //     } 
    // }
    
    public function addtoTaskManger($rID,$uID){
        $query = "UPDATE `public_resource` SET `approved_by` = $uID WHERE `id` = $rID ";
        
        $result = $this->executeQuery($query);

        // return $result;
        // print_r($result);die;
        if ($result) {
            return true;
        } else {
            return false;
        } 
    }

    // public function addComplaintToTask(){
   
    //     $result[] = $this->getData("complaint")
    // }

    

}

?>