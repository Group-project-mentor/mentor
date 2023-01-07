<?php

class AdHumanResource extends Controller{
    // public function __construct()
    // {
    //     sessionValidator();
    // }
    public function index()
    {
         sessionValidator();
        $this->hasLogged();
        $res = $this->model('adHumanResource_model')->getClasses();
        $this->view('admin/humanResource',array($res));
    }

    private function hasLogged(){
        if(!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }

}


?>