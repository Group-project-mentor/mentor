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
                $rID = $_POST['rID'];
                $uID = $_POST['uID'];

                 //print_r($this->adminModel->addtoTaskManger($rID,$uID));die;
                if ($this->adminModel->addtoTaskManger($rID,$uID)) {
                    echo 'Successful';
                } else {
                    echo 'Error';
                }

            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $this->view('admin/verification');

            }
        }

        if ($element == "videos") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                

                $data = [];
                $data['video'] = $this->adminModel->videos();
                
                $this->view('admin/resourceVerificationVideos',$data);

            }
        }

        if ($element == "quizzes") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                

                $data = [];
                $data['quiz'] = $this->adminModel->quiz();

                $this->view('admin/resourceVerificationQuizzes',$data);

            }
        }

        if ($element == "pastpappers") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $data = [];
                $data['pastpaper'] = $this->adminModel->pastpapers();

                $this->view('admin/resourceVerificationPstppr',$data);

            }
        }

        if ($element == "pdf") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $data = [];
                $data['pdf'] = $this->adminModel->pdfs();

                
                $this->view('admin/resourceVerificationPdf',$data);

            }
        }

        if ($element == "others") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $data = [];
                $data['other'] = $this->adminModel->others();
                
                $this->view('admin/resourceVerificationOther',$data);

            }
        }

    }

    public function scholorships() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['scholarship'] = $this->adminModel->scholorship();
            
            $this->view('admin/scholpro',$data);

        }

    }

    public function scholorshipviews() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['scholarship'] = $this->adminModel->scholorship();
            
            $this->view('admin/scholoviewall',$data);

        }

    }

    public function scholorshipview($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['scholarship'] = $this->adminModel->scholorship();
            
            $this->view('admin/scholoview',$data);

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

            // $id = $this
           
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

    public function addgrades() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $photo =$_POST['grade-photo'];
            // $name = $_POST['grade-name'];

            // $res =$this->model('admins')->addGrade($name,$photo);
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/addNewGrade');

        }

    }

    public function addsubject() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $photo =$_POST['grade-photo'];
            // $name = $_POST['grade-name'];

            // $res =$this->model('admins')->addGrade($name,$photo);
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/addNewSubject');

        }

    }


    public function add()
    {
        $password = $this->randompassword();
        $name = $_POST['admin-name'];
        $email = $_POST['admin-mail'];

        $res = $this->model('ad_admin')->addAdmin($name,$email,$password);

        if ($res) {
            header("location:" . BASEURL . "adhumanResource#/1");

        }
        else{
            header("location:" . BASEURL . "adAddnewadmin");

        }




    }

    
}


?>