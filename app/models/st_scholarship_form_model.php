<?php

class St_scholarship_form_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function request_form($fname,$lname,$addr,$sch,$email,$coun,$cnum,$des){
        $stmt = $this->prepare("INSERT INTO scholarship(first_name,last_name,address,school,email,country,contact_number,description) VALUES
         (?,?,?,?,?,?,?,?)");
        $stmt->bind_param('ssssssis',$fname,$lname,$addr,$sch,$email,$coun,$cnum,$des);
        return $stmt->execute();
    }

}


?>