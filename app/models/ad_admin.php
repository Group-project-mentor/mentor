<?php 

class Ad_admin extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function addAdmin($name,$email,$password){
        
        $addAdmin = "insert into admin(name,email,password,super_admin) values('$name','$email','$password','0');";
        $result = $this->executeQuery($addAdmin);

        return ($result);
    }

}

?>