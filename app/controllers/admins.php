<?php

class admins extends Controller {

    //private string $user = "ad";

    private $adminModel;
    private $hrModel;
    private $userModel;

    public function __construct() {
        $this->adminModel =  $this->model('admin');
        $this->hrModel = $this->model('adHumanResource_model');
        $this->userModel = $this->model('userModel');
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
            $data[] = $this->adminModel->getUserDetails($_SESSION['id']);
            $this->view('admin/ad_profile/profile',$data);

        }

    }

    public function change($type, $msg = null) {
        switch ($type) {
            case 'image':
                $this->image();
                break;
            case 'name':
                $this->name();
                break;
            case 'mobile':
                $this->mobile();
                break;
            case 'password':
                $this->password($msg);
                break;
            case 'email':
                $this->email();
                break;
            default:
                header("location:" . BASEURL . "Profile");
                break;
        }
    }

    private function image() {
        sessionValidator();
        $this->hasLogged();

        $data[] = $this->adminModel->getImage($_SESSION['id']);
        $this->view("admin/ad_profile/profile_changeimg", $data);
    }

    private function password($msg)
    {
        $this->view("admin/ad_profile/profile_changepw", $msg);
    }

    private function email()
    {

    }

    private function mobile($msg = null)
    {
        $result = $this->model("userModel")->getMobile($_SESSION['id']);
        $this->view("admin/ad_profile/profile_changephone", array($result,$msg));
    }

    private function name($msg = null)
    {
        $result = $this->model("admin")->getName($_SESSION['id']);
        $this->view("admin/ad_profile/profile_changename", array($result,$msg));
    }

    public function changeName()
    {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['name'])) {
            if ((preg_match('/[a-zA-Z][a-zA-Z ]+/',$_POST['name'])) && ($_POST['name'] != '')) {
                $this->model("userModel")->updateName($_POST['name'], $_SESSION['id']);
                $_SESSION['name'] = $_POST['name'];
                header("location:" . BASEURL . 'adProfile/index/success');
            } else {
                header("location:" . BASEURL . 'adProfile/change/name/failed');
            }
        } else {
            header("location:" . BASEURL . 'adProfile/change/name/failed');
        }
    }

    public function changeImage()
    {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['image'])) {
            if($this->adminModel->updateImage($_SESSION['id'],$_POST['image'])){
                echo "success";
            }else{
                echo "unsuccess";
            }
        }
    }

    public function changeMobile()
    {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['mobile'])) {
            if ((preg_match('/[0-9]{10}/',$_POST['name'])) && ($_POST['mobile'] != '')) {
                $this->model("userModel")->updateMobile($_POST['mobile'], $_SESSION['id']);
                header("location:" . BASEURL . 'rcProfile/index/success');
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'adProfile/change/mobile/failed');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'adProfile/change/mobile/failed');
        }
    }

    public function changePassword()
    {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['cpasswd']) && isset($_POST['npasswd']) && isset($_POST['cnfpasswd'])) {
            if ($_POST['npasswd'] == $_POST['cnfpasswd']) {
                $result = $this->model("userModel")->changeProfilePasswd($_SESSION['id']);
                if (!empty($result) && password_verify($_POST['cpasswd'], $result[2])) {
                    $hash = password_hash($_POST['npasswd'], PASSWORD_BCRYPT, ["cost" => 10]);
                    if ($this->model("userModel")->changePassword($hash, $_SESSION['user'])) {
                        flashMessage("success");
                        header("location:" . BASEURL . 'adProfile/index/success');
                    } else {
                        flashMessage("failed");
                        header("location:" . BASEURL . 'adProfile/change/password/failed');
                    }
                } else {
                    flashMessage("wrongPass");
                    header("location:" . BASEURL . 'adProfile/change/password/wrongPass');
                }
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'adProfile/change/password/failed');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'adProfile/change/password/failed');
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