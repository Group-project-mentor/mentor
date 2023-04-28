<?php 

class Ad_admin extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function addAdmin($name,$email,$password){
        
        $addAdmin = "insert into admin(name,email,password) values('$name','$email','$password');";
        $result = $this->executeQuery($addAdmin);

        return ($result);
    }

}

?>