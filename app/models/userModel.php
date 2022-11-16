<?php 

class UserModel extends Model{

    private $table = 'user';

    public function __construct(){
        parent::__construct();
    }

    public function userLogin($email){
        $result = $this->getData($this->table, "email = '$email'");
        return $result;
    }

    public function registration($email, $name, $hash){
        $query = "insert into user(email,name,password) values ('" . $email . "','" . $name . "','" . $hash . "')";
        $result = $this->executeQuery($query);
        return $result;
    }
}

?>
