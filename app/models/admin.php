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

    public function classCount(){
        $result = $this->getData("private_class"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        }
    }

    public function sponsorCount(){
        $result = $this->getData("sponsor"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        }
    }

    public function ResourceCrCount(){
        $result = $this->getData("resource_creator"); //Retrieve Data

        if ($result->num_rows > 0) {
            return $result->num_rows;
        } else {
            return false;
        }
    }
    public function complaint($id='%'){
        $query = "SELECT user.name, user.id, complaint.description, report_type.name as category, complaint.work_id 
        FROM user 
        INNER JOIN complaint 
        ON user.id = complaint.user_id 
        INNER JOIN report_type 
        ON complaint.category=report_type.id 
        WHERE `complaint`.`approved_by` IS NULL AND `complaint`.`work_id` LIKE '$id'";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function usercomplaint($id='%'){
        $query = "SELECT user.name, user.id, complaint.description, report_type.name as category, complaint.work_id 
        FROM user 
        INNER JOIN complaint 
        ON user.id = complaint.user_id 
        INNER JOIN report_type 
        ON complaint.category=report_type.id 
        WHERE `complaint`.`work_id` LIKE '$id'";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function addComplaintToTaskManager($cID, $uID) {
        $query = "UPDATE `complaint` SET `approved_by`='$uID',`status`='in Progress' WHERE `work_id`='$cID';";
        return $this->executeQuery($query);
    }

    public function deleteComplaintFromTaskManager($cID) {
        $query = "UPDATE `complaint` SET `approved_by`= NULL ,`status`='pending' WHERE `work_id`='$cID';";
        return $this->executeQuery($query);
    }

    public function addSPToTaskManager($sID, $uID) {
        $query = "UPDATE `applied_sponsor` SET `approved_by`='$uID',`review_status`='in Progress' WHERE `id`='$sID';";
        return $this->executeQuery($query);
    }

    public function deleteSPtFromTaskManager($cID) {
        $query = "UPDATE `applied_sponsor` SET `approved_by`= NULL ,`status`='pending' WHERE `id`='$cID';";
        return $this->executeQuery($query);
    }
    public function deleteResourceFromTaskManager($rID) {
        $query = "UPDATE `public_resource` SET `approved_by`= NULL WHERE `id`='$rID';";
        return $this->executeQuery($query);
    }

    public function ComplaintTask($uID){
        $query = "SELECT * FROM `complaint` WHERE `approved_by`='$uID' AND `status`='in Progress'; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function ComplaintTookAction($cID){
        $query = "UPDATE `complaint` SET `status` = 'complete' WHERE `work_id` = '$cID'; ";
        
        return $this->executeQuery($query);
    }

    public function approveResource($rID){
        $query = "UPDATE `public_resource` SET `approved` = 'Y' WHERE `id` = '$rID'; ";
        
        return $this->executeQuery($query);
    }

    public function approveResourceCreator($rcID,$email,$name,$password){
        $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
        $query1 = "UPDATE `applied_creator` SET `approved` = 'Y' WHERE `id` = '$rcID'; ";
        
        if ($this->executeQuery($query1)) {
            $query2 = "INSERT INTO user(`email`,`name`,`password`,`type`) VALUE('$email','$name','$hash','rc');";
            return $this->executeQuery($query2);
        } else {
            return false;
        }

        
    }

    public function declineResourceCreator($rcID){
        $query = "UPDATE `applied_creator` SET `approved` = 'N' WHERE `id` = '$rcID'; ";
        
        return $this->executeQuery($query);
    }



    public function declineResource($rID){
        $query = "UPDATE `public_resource` SET `approved` = 'N' WHERE `id` = '$rID'; ";
        
        return $this->executeQuery($query);
    }

    public function declineSponsor($spID){
        $query = "UPDATE `Sponsor` SET `approved` = 'N' WHERE `id` = '$spID'; ";
        
        return $this->executeQuery($query);
    }





    public function ResourceTask($uID){
        $query = "SELECT* FROM `public_resource` WHERE `approved_by`='$uID' AND `approved` IS NULL; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function ScholorTask($uID){
        $query = "SELECT* FROM `scholarship` WHERE `approved_by`='$uID' AND `approved` IS NULL; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function SponsorTask($uID){
        $query = "SELECT* FROM `applied_sponsor` WHERE `approved_by`='$uID' AND `approved` IS NULL; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function ResourceCreatorView($rcID){
        $query = "SELECT * FROM `applied_creator` WHERE `id`='$rcID'; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }
    public function ResourceCreatorTask($uID){
        $query = "SELECT * FROM `applied_creator` WHERE `approved_by`='$uID' AND `approved` IS NULL; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function ResourceCreatorDetails($rcID){
        $query = "SELECT * FROM `applied_creator` WHERE `id` = '$rcID'; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    
    public function deleteRCFromTaskManager($rcID) {
        $query = "UPDATE `applied_creator` SET `approved_by`= NULL WHERE `id`='$rcID';";
        return $this->executeQuery($query);
    }

    public function SponsorDetails($spID){
        $query = "SELECT * FROM `applied_sponsor` WHERE `id` = '$spID'; ";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    
    public function deleteSPFromTaskManager($spID) {
        $query = "UPDATE `applied_sponsor` SET `approved_by`= NULL WHERE `id`='$spID';";
        return $this->executeQuery($query);
    }

    public function deleteSchlFromTaskManager($sID) {
        $query = "UPDATE `scholarship` SET `approved_by`= NULL WHERE `id`='$sID';";
        return $this->executeQuery($query);
    }
    public function videoview($id) {
        $query = "SELECT `public_resource`.*, `video`.* FROM `public_resource` INNER JOIN `video` ON `public_resource`.id = `video`.id WHERE `public_resource`.`type`='video' AND `video`.`id`='$id';";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }
    public function quizview($id) {
        $query = "SELECT `public_resource`.*, `quiz`.* FROM `public_resource` INNER JOIN `quiz` ON `public_resource`.id = `quiz`.id WHERE `public_resource`.`type`='quiz' AND `quiz`.`id`='$id';";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function pastpaperview($id) {
        $query = "SELECT `public_resource`.*, `pastpaper`.* FROM `public_resource` INNER JOIN `pastpaper` ON `public_resource`.id = `pastpaper`.id WHERE `public_resource`.`type`='pastpaper' AND `pastpaper`.`id`='$id';";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function pdfview($id) {
        $query = "SELECT `public_resource`.*, `document`.* FROM `public_resource` INNER JOIN `document` ON `public_resource`.id = `document`.id WHERE `public_resource`.`type`='pdf' AND `document`.`id`='$id';";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function otherview($id) {
        $query = "SELECT `public_resource`.*, `other`.* FROM `public_resource` INNER JOIN `other` ON `public_resource`.id = `other`.id WHERE `public_resource`.`type`='other' AND `other`.`id`='$id';";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }


    public function sponsors(){
        $query = "SELECT *FROM `applied_sponsor` WHERE `approved_by` IS NULL;";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function scholorship($ID){
        $query = "SELECT *FROM scholarship WHERE `approved_by` IS NULL ;";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function getPrivilege($ID){
        $query = "SELECT `super_admin` as privilege FROM `admin` WHERE `admin_id`='$ID';";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }


    public function admin(){
        $query = "SELECT *FROM `admin`;";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function addNewAdminToUser($name,$email,$password){
        $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);
        $query = "INSERT INTO user(`email`,`name`,`password`,`type`) VALUE('$email','$name','$hash','ad') ;";
        $result = $this->executeQuery($query);
    
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }

    public function AppliedResourcecreator(){
        $query = "SELECT * FROM `applied_creator` WHERE `approved_by` IS NULL ;";
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

        if ($result) {
            return true;
        } else {
            return false;
        } 
    }

    // public function addTeamMemb($id){
        
    //     $addAdmin = "insert into admin(name,email,password) values('$name','$email','$password');";
    //     $result = $this->executeQuery($addAdmin);

    //     return ($result);
    // }

    public function elements($rID){
        $query = "SELECT `type` FROM `public_resource` WHERE `id`='$rID';";
        $result = $this->executeQuery($query);
        
        if ($result->num_rows > 0) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            return false;
        } 
    }
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
    
    public function addResourcetoTaskManger($rID,$uID){
        $query = "UPDATE `public_resource` SET `approved_by` = '$uID' WHERE `id` = '$rID' ;";
        
        $result = $this->executeQuery($query);

        // return $result;
        // print_r($result);die;
        if ($result) {
            return true;
        } else {
            return false;
        } 
    }


    public function addRCToTaskManager($rcID,$uID){
        $query = "UPDATE `applied_creator` SET `approved_by` = '$uID' WHERE `id` = '$rcID'; ";
        
        $result = $this->executeQuery($query);

        // return $result;
        // print_r($result);die;
        if ($result) {
            return true;
        } else {
            return false;
        } 
    }


    public function addScholToTaskManager($schlID,$uID){
        $query = "UPDATE `scholarship` SET `approved_by` = '$uID' WHERE `id` = '$schlID' ";
        
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

    public function getUserDetails($id)
    {
        $query = "select id,name,email,image from user where id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }

    public function getImage($id)
    {
        $query = "SELECT image from user where id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }

    public function updateImage($id,$image){
        $query = "UPDATE `user` SET `image` = '$image' WHERE id = $id ";
        
        $result = $this->executeQuery($query);

        if ($result) {
            return true;
        } else {
            return false;
        } 
    }

    

    public function getName($id)
    {
        $query = "SELECT `name` from user where id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }
    
    public function updateName($name, $id, $dispName = null)
    {
        $query1 = "UPDATE user set name = '$name' where id=$id";
        $res = 1;
        if(!empty($dispName)){
            $query2 = "UPDATE `admin` set dispName = '$dispName' where id=$id";
            $res = $this->executeQuery($query2);
        }
        return $this->executeQuery($query1) && $res;
    }

    public function verifyPassword($passwd, $email)
    {
        $stmt = $this->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s",$email);
        $result = $this->fetchOneObj($stmt);

        // print_r($result->password);

        return password_verify($passwd,$result->password);
    }
    public function changePassword($passwd, $email)
    {
        $query = "UPDATE `user` SET password='$passwd' where email='$email'";
        return $this->executeQuery($query);
    }

    public function getUserCountsByTypeAndMonth($type, $month)
    {
        $stmt = $this->prepare("SELECT COUNT(id) as count, MONTH(time_stamp) as month FROM user WHERE type = ? AND MONTH(time_stamp) = ?");
        $stmt->bind_param('si', $type, $month);
        $result = $this->fetchObjs($stmt);

        $monthArray = $this->createEmptyMonthArray();

        foreach ($result as $row) {
            $monthName = date('F', mktime(0, 0, 0, $row->month, 1));
            $monthArray[$monthName] = $row->count;
        }

        return $monthArray;
    }

    private function createEmptyMonthArray()
    {
        $monthArray = array();
        for ($i = 1; $i <= 12; $i++) {
            $date = DateTime::createFromFormat('!m', $i);
            $monthArray[$date->format('F')] = 0;
        }
        return $monthArray;
    }

    

}

?>