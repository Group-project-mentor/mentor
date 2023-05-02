<?php

class St_home_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getstudent($id){
        
        $q = "SELECT user.name FROM user WHERE user.id = ?;" ;
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$id);
        return $this->fetchOneObj($stmt);
    }


}

?>
