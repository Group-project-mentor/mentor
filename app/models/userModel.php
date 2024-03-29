<?php

class UserModel extends Model
{

    private $table = 'user';

    public function __construct()
    {
        parent::__construct();
    }

    public function userLogin($email)
    {
        $stmt = $this->prepare("SELECT * FROM user WHERE email = ?");
        $stmt->bind_param("s",$email);
        return $this->fetchOneObj($stmt);
    }

    public function registrationStudent($email, $name, $hash, $salt)
    {
        $query = "INSERT INTO user(email,name,password,type,salt) VALUES (?,?,?,'st',?)";
        $stmt = $this->prepare($query);
        $stmt -> bind_param('ssss',$email,$name,$hash,$salt);
        return $stmt->execute();
    }

    public function registrationTeacher($email, $name, $hash, $salt)
    {
        $stmt = $this->prepare("INSERT INTO user(email,name,password,type,salt) VALUES (?,?,?,'tch',?)");
        $stmt -> bind_param('ssss',$email, $name, $hash, $salt);
        return $stmt->execute();
    }

    public function getUserData($id)
    {
        $query = "select user.id,name,email,mobile_no,image from user,resource_creator where user.id = resource_creator.id and user.id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }

    public function StgetUserData($id)
    {
        $query = "SELECT user.id, user.name, user.email, user.image FROM user WHERE user.type = 'st' and user.id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }

    public function TgetUserData($id)
    {
        $query = "SELECT user.id, user.name, user.email, user.image FROM user WHERE user.type = 'tch' and user.id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }


    public function getSponsorData($id)
    {
        $query = "SELECT user.id,name,email,image,dispName,description,mobileNo FROM user LEFT JOIN sponsor ON sponsor.id =user.id WHERE user.id=?;";
        $stmt = $this->prepare($query);
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }

    public function getEmail($email)
    {
        $query = "select id, email from user where email = '$email'";
        $result = $this->executeQuery($query);
        return $result;
    }

    public function changePassword($passwd, $email)
    {
        $query = "update user set password='$passwd' where email='$email'";
        return $this->executeQuery($query);
    }

    public function getImage($id)
    {
        $query = "select image from user where id = $id";
        $result = $this->executeQuery($query);
        if ($this->numRows($result) > 0) {
            return $result->fetch_row();
        } else {
            return [];
        }
    }

    public function getMobile($id)
    {
        $query = "select mobile_no from resource_creator where id = $id";
        $result = $this->executeQuery($query);
        if ($this->numRows($result) > 0) {
            return $result->fetch_row();
        } else {
            return [];
        }
    }

    

    public function updateName($name, $id, $dispName = null)
    {
        $query1 = "update user set name = '$name' where id=$id";
        $res = 1;
        if(!empty($dispName)){
            $query2 = "update sponsor set dispName = '$dispName' where id=$id";
            $res = $this->executeQuery($query2);
        }
        return $this->executeQuery($query1) && $res;
    }

    public function updateMobile($mobile, $id, $type = null)
    {
        if ($type == "sponsor"){
            $query = "update sponsor set mobileNo = '$mobile' where id=$id";
        }else{
            $query = "update resource_creator set mobile_no = '$mobile' where id=$id";
        }
        return $this->executeQuery($query);
    }

    public function updateOthers($desc, $id){
        $query = "update sponsor set description = '$desc' where id=$id";
        return $this->executeQuery($query);
    }

    public function changeProfilePasswd($id)
    {
        $result = $this->getData($this->table, "id = '$id'");
        if ($result->num_rows > 0) {
            return $result->fetch_row();
        }
        return [];
    }

    public function getOptSponsorDetails($id){
        $stmt = $this->prepare("SELECT * FROM sponsor WHERE id = ?");
        $stmt->bind_param("i",$id);
        return $this->fetchOneObj($stmt);
    }

    public function changeImg($id, $img)
    {
        $query = "update user set image = '$img' where id = $id";
        return $this->executeQuery($query);
    }

    public function saveAppliedCreator($firstname,$lastname,$initialsName,$email,$tel1,$tel2,$address,$gender,$description,$subjects,$resources,$other, $cvTarget, $exampleTarget){
        $stmt = $this->prepare("INSERT INTO applied_creator(firstName,lastName,initialsName,email,telephone1,telephone2,gender,description,subjects,example,cv,resourceTypes)
                                 VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssssss",$firstname,$lastname,$initialsName,$email,$tel1,$tel2,$gender,$description,$subjects,$exampleTarget,$cvTarget,$resources);       
        return $stmt->execute();
    }

    public function ScholershipApply($firstname,$lastname,$initialsName,$gradientname,$email,$tel1,$tel2,$address,$school,$dob,$gender,$description,$class,$subjects, $cvTarget){
        $stmt = $this->prepare("INSERT INTO scholarship(firstName,lastName,initialsName,email,gradientname,tel1,tel2,address,school,dob,gender,description,class,subjects,cv)
                                 VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("sssssssssssssss",$firstname,$lastname,$initialsName,$gradientname,$email,$tel1,$tel2,$address,$school,$dob,$gender,$description,$class,$subjects,$cvTarget);       
        return $stmt->execute();
    }

    public function saveAppliedSponsor($firstname,$lastname,$initialsName,$email,$tel1,$tel2,$address,$howKnew,$maxAmount){
        $stmt = $this->prepare("INSERT INTO applied_sponsor(firstName,lastName,initialsName,email,telephone1,telephone2,address,howKnew,maxAmount)
                                 VALUES (?,?,?,?,?,?,?,?,?)");
        $stmt->bind_param("ssssssssi",$firstname,$lastname,$initialsName,$email,$tel1,$tel2,$address,$howKnew,$maxAmount);       
        return $stmt->execute();
    }

    public function isUserExists($email){
        $stmt = $this->prepare("SELECT id FROM user WHERE email = ?");
        $stmt->bind_param("s",$email);
        $result = $this->fetchOneObj($stmt);
        if($result){
            return true;
        }else{
            return false;
        }
    }

}
