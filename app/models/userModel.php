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

    public function registrationStudent($email, $name, $hash, $salt, $age = null, $grade = null)
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
        $query = "update resource_creator set mobile_no = '$mobile' where id=$id";
        if ($type == "sponsor"){
            $query = "update sponsor set mobileNo = '$mobile' where id=$id";
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
        $query = "update user set image = '$img' where id = '$id'";
        return $this->executeQuery($query);
    }

}
