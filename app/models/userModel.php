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
}

?>
