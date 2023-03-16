<?php

class TClassRoom extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function createClass(){
        $this->view('Teacher/classRoom/createclass');
    }

    public function createAction(){
        $l_id = $this->model('teacher_data')->getLastClassID();
        var_dump($l_id);
        if($this->model('teacher_data')->addClass($l_id,$_POST['class_name']) and $this->model('teacher_data')->teacherHasClass($l_id) ){
            
            header("location:".BASEURL."index");
        }
        else{
            header("location:".BASEURL."TClassRoom/createClass");
        }

    }
 
    
    


}

?>