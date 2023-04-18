<?php

class admins extends Controller {

    private $adminModel;
    private $hrModel;

    public function __construct() {
        $this->adminModel =  $this->model('admin');
        $this->hrModel = $this->model('adHumanResource_model');
    }
    
    // Other Functions
    private function hasLogged() {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }

    private function randompassword(){
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }

    // Routers
    public function dashboard() {

        sessionValidator();
        $this->hasLogged();

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['studentCount'] = $this->adminModel->studentCount();
            $data['teacherCount'] = $this->adminModel->teacherCount();
            $data['complaints'] = $this->adminModel->complaints();

            // print_r($data);

            $this->view('admin/home/index',$data);

        }  

    }

    public function complaints() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           


        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {


            $data = [];
            $data['complaints'] = $this->adminModel->complaints();



            $this->view('admin/complaintHandle',$data);

        }

    }

    public function complaint($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           echo("Added");
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            

            $data = [];
            $data['complaints'] = $this->adminModel->complaints();

            
            $this->view('admin/complaintview',$data);

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

            
            $name = $_POST['user-name'];
            //$id = $_POST['user-id'];
            //$description =$_POST['user-description']

            $this->model('ad_admin')->addAdmin($name);

            echo "Success";
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

    public function scholorships() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/scholpro');

        }

    }

    public function wallet() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/wallet');

        }

    }

    public function analatics() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            // $this->view('admin/scholpro');

        }

    }

    public function humanResource() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $data['classes'] = $this->hrModel->getClasses();
            $this->view('admin/humanResource',$data);

        }

    }

    public function addMember() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $this
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/addMemberTeam');

        }

    }

    public function addAdmin() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $password = $this->randompassword();
            $name = $_POST['admin-name'];
            $email = $_POST['admin-mail'];

            $this->model('ad_admin')->addAdmin($name,$email,$password);

            echo "Success";
            
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/addNewAdmin');

        }

    }

    public function addmemberview($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/addMemberView');

        }

    }
    
    public function profile() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/profile');

        }

    }

    public function settings() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/setting');

        }

    }

    public function activitylog() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/activitylog');

        }

    }



    
}


?>