<?php

class St_scholarship_form_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function request_form($fname,$lname,$addr,$sch,$email,$coun,$cnum,$des){
        $q="INSERT INTO scholarship(first_name,last_name,address,school,email,country,contact_number,description) 
        VALUES ('$fname','$lname','$addr','$sch','$email','$coun','$cnum','$des')" ;
        $result = $this->executeQuery($q);
        return $result;
    }

}


?>