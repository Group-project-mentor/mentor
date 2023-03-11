<?php

class admins extends Controller {

    private $adminModel;

    public function __construct() {
        $this->adminModel =  $this->model('admin');
    }
    
    private function hasLogged() {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
    
    public function dashboard() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['studentCount'] = $this->adminModel->studentCount();
            $data['teacherCount'] = $this->adminModel->teacherCount();

            $this->view('admin/home/index',$data);

        }  

    }

    public function complaints() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $this->view('admin/complaintHandle');

        }

    }

    public function complaint($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           echo("Added");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/complaintview');

        }

    }

    public function taskmanager() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/task');

        }

    }

    public function task($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/complaintaction');

        }

    }

    public function userhandling() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/userhandle');

        }

    }

    public function verify($element = "") {

        sessionValidator();
        $this->hasLogged();

        if ($element == "") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/verification');

            }
        }

        if ($element == "videos") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/resourceVerificationVideos');

            }
        }

        if ($element == "quizzes") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/resourceVerificationQuizzes');

            }
        }

        if ($element == "pastpappers") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/resourceVerificationPstppr');

            }
        }

        if ($element == "pdf") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/resourceVerificationPdf');

            }
        }

        if ($element == "others") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/resourceVerificationOther');

            }
        }

    }

    public function popup($element = "") {

        sessionValidator();
        $this->hasLogged();

        if ($element == "") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/verification');

            }
        }
        

    }

    

}


?>