<?php

class UserModel extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function userLogin($username){
        $result = $this->getData("user","email = '$username'");
        return $result;
    }


    public function getUserData($id){
        $query = "select user.id,name,email,mobile_no,image from user,resource_creator where user.id = resource_creator.id and user.id=$id;";
        $result = $this->executeQuery($query);
        if ($this->numRows($result) > 0){
            return $result->fetch_row();
        }
        else{
            return [];
        }
    }

    public function registration($email, $name, $hash){
        $query = "insert into user(email,name,password) values ('" . $email . "','" . $name . "','" . $hash . "')";
        $result = $this->executeQuery($query);
        return $result;
    }

    public function getEmail($email){
        $query = "select id, email from user where email = '$email'";
        $result = $this->executeQuery($query);
        return $result;
    }

    public function changePassword($passwd, $email){
        $query = "update user set password='$passwd' where email='$email'";
        return $this->executeQuery($query);
    } 
    public function getImage($id){
        $query = "select image from user where id = $id";
        $result = $this->executeQuery($query);
        if ($this->numRows($result) > 0){
            return $result->fetch_row();
        }
        else{
            return [];
        }
    }

    public function getMobile($id){
        $query = "select mobile_no from resource_creator where id = $id";
        $result = $this->executeQuery($query);
        if ($this->numRows($result) > 0){
            return $result->fetch_row();
        }
        else{
            return [];
        }
    }

    public function updateName($name, $id){
        $query = "update user set name = '$name' where id=$id";
        return $this->executeQuery($query);
    }
    
    public function updateMobile($mobile, $id){
        $query = "update resource_creator set mobile_no = '$mobile' where id=$id";
        return $this->executeQuery($query);
     }

    public function changeProfilePasswd($id){
        $result = $this->getData($this->table, "id = '$id'");
        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return [];
    }
}

?>
