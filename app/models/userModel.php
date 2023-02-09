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
        $result = $this->getData($this->table, "email = '$email'");
        return $result;
    }

    public function registrationStudent($email, $name, $hash, $age = null, $grade = null)
    {
        $query = "INSERT INTO user(email,name,password,type) VALUES (?,?,?,'st')";
        $stmt = $this->prepare($query);
        $stmt -> bind_param('sss',$email,$name,$hash);
        return $stmt->execute();
    }

    public function registrationTeacher($email, $name, $hash)
    {
        $stmt = $this->prepare("INSERT INTO user(email,name,password,type) VALUES (?,?,?,'tch')");
        $stmt -> bind_param('sss',$email, $name, $hash);
        return $stmt->execute();

    }

    public function getUserData($id)
    {
        $query = "select user.id,name,email,mobile_no,image from user,resource_creator where user.id = resource_creator.id and user.id=$id;";
        $result = $this->executeQuery($query);
        if ($this->numRows($result) > 0) {
            return $result->fetch_row();
        } else {
            return [];
        }
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

    public function updateName($name, $id)
    {
        $query = "update user set name = '$name' where id=$id";
        return $this->executeQuery($query);
    }

    public function updateMobile($mobile, $id)
    {
        $query = "update resource_creator set mobile_no = '$mobile' where id=$id";
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

    public function changeImg($id, $img)
    {
        $query = "update user set image = '$img' where id = '$id'";
        return $this->executeQuery($query);
    }

}
