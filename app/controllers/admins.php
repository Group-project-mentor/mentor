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

            $uID = $_SESSION["id"];
            $data = [];
            $data['studentCount'] = $this->adminModel->studentCount();
            $data['teacherCount'] = $this->adminModel->teacherCount();
            $data['classCount'] = $this->adminModel->classCount();
            $data['sponsorCount'] = $this->adminModel->sponsorCount();
            $data['complaints'] = $this->adminModel->complaint();
            $data['rtask'] = $this->adminModel->ResourceTask($uID);
            $data['ctask'] = $this->adminModel->ComplaintTask($uID);
            $data['ResourceCrCount'] = $this->adminModel->ResourceCrCount();
            

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
            $data['complaints'] = $this->adminModel->complaint();

            // print_r($data['complaints']);

            $this->view('admin/complaintHandle',$data);

        }

    }

    public function coDashboard() {

        sessionValidator();
        $this->hasLogged();

        // if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $uID = $_SESSION["id"];
            $data = [];
            $data['studentCount'] = $this->adminModel->studentCount();
            $data['teacherCount'] = $this->adminModel->teacherCount();
            $data['classCount'] = $this->adminModel->classCount();
            $data['sponsorCount'] = $this->adminModel->sponsorCount();
            $data['complaints'] = $this->adminModel->complaint();
            $data['rtask'] = $this->adminModel->ResourceTask($uID);
            $data['ctask'] = $this->adminModel->ComplaintTask($uID);
            $data['rctask'] = $this->adminModel->ResourceCreatorTask($uID);


            // print_r($data);

            $this->view('admin/coAdminView/coDashboard',$data);

        }
    }

    public function complaint($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $cID = $_POST['cID'];
            $uID = $_POST['uID'];
            if($this->adminModel->addComplaintToTaskManager($cID,$uID)){
                echo 'Successful';
            } else{
                echo 'Error';
            }

            
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            

            $data = [];
            $data['complaints'] = $this->adminModel->complaint($id);

            
            $this->view('admin/complaintview',$data);

        }

    }

    public function deleteComplaintTM($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->adminModel->deleteComplaintFromTaskManager($id)){
                echo 'Successful';
            } else{
                echo 'Error';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            

        }

    }

    public function deleteSPTM($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->adminModel->deleteSPFromTaskManager($id)){
                echo 'Successful';
            } else{
                echo 'Error';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            

        }

    }


    public function deleteSchlTM($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->adminModel->deleteSchlFromTaskManager($id)){
                echo 'Successful';
            } else{
                echo 'Error';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            

        }

    }

    public function deleteResouceTM($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->adminModel->deleteResourceFromTaskManager($id)){
                echo 'Successful';
            } else{
                echo 'Error';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            

        }

    }

    public function deleteResouceCreatorTM($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if($this->adminModel->deleteRCFromTaskManager($id)){
                echo 'Successful';
            } else{
                echo 'Error';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            

        }

    }

    public function taskmanager() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $uID = $_SESSION["id"];
            // $cID = $_POST['cID'];

            // if($this->adminModel->deleteComplaintFromTaskManager($cID)){
            //     echo 'Successful';
            // } else{
            //     echo 'Error';
            // }
                
            $data = [];
            $data['rtask'] = $this->adminModel->ResourceTask($uID);
            $data['ctask'] = $this->adminModel->ComplaintTask($uID);
            $data['rctask'] = $this->adminModel->ResourceCreatorTask($uID);
            $data['schltask'] = $this->adminModel->ScholorTask($uID);
            $data['sptask'] = $this->adminModel->SponsorTask($uID);

            $this->view('admin/task',$data);

        }

    }

    public function ComplaintReview($element,$cID) {

        sessionValidator();
        $this->hasLogged();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['complaints'] = $this->adminModel->usercomplaint($cID);

            if ($element == "complete") {
                
                if ($this->adminModel->ComplaintTookAction($cID)) {
                    $message = "<center><div>
                    <h1 style='color: green;'>M E N T O R</h1>
                    <h3>We are so glad to informe you that you have been selected as a Resource Creator at MENTOR<br> You Can Use This PASSWORD to login to your account<br>Thank You!</h3>
                    <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
                   
                    </h1>
                    <h5 style='color:red;'>Do not share this PASSWORD with anyone !</h5>
                    </div></center>";
                    // sendMail($data['creator'][0]['email'], "User", "MENTOR RESOURCE CREATOR PASSWORD", $message);
           
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            } elseif ($element == "SendAcknoledged") {
                if ($this->adminModel->sendAcknowledgment($cID)) {
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            }else{
                echo 'Error';
            }

        
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['complaints'] = $this->adminModel->usercomplaint($cID);
            
            $this->view('admin/complaintaction',$data);

        }

    }

    // public function task($id) {

    //     sessionValidator();
    //     $this->hasLogged();

    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    //         if ($this->adminModel->ComplaintTookAction($id)) {
    //             echo 'Successful';
    //         } else {
    //             echo 'Error';
    //         }
    //     }

    //     if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            
    //         $data['complaints'] = $this->adminModel->usercomplaint($id);
            
    //         $this->view('admin/complaintaction',$data);

    //     }

    // }
  
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

            $data = [];
            $data['task'] = $this->adminModel->ResourceTask();
            
            $this->view('admin/userhandle',$data);

        }

    }

    public function verify($element = "") {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $rID = $_POST['rID'];
            $uID = $_POST['uID'];
        }

        if ($element == "") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                echo $rID;
                echo $uID;
                
                 //print_r($this->adminModel->addtoTaskManger($rID,$uID));die;
                if ($this->model('admin')->addResourcetoTaskManger($rID,$uID)) {
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
                $data['element'] = $element;
                $this->view('admin/resourceVerificationVideos',$data);

            }
        }

        if ($element == "quizzes") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                

                $data = [];
                $data['quiz'] = $this->adminModel->quiz();
                $data['element'] = $element;
                $this->view('admin/resourceVerificationQuizzes',$data);

            }
        }

        if ($element == "pastpappers") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $data = [];
                $data['pastpaper'] = $this->adminModel->pastpapers();
                $data['element'] = $element;
                $this->view('admin/resourceVerificationPstppr',$data);

            }
        }

        if ($element == "pdf") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $data = [];
                $data['pdf'] = $this->adminModel->pdfs();
                $data['element'] = $element;
                
                $this->view('admin/resourceVerificationPdf',$data);

            }
        }

        if ($element == "others") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $data = [];
                $data['other'] = $this->adminModel->others();
                $data['element'] = $element;
                $this->view('admin/resourceVerificationOther',$data);

            }
        }

    }
    
    public function resource($element = "",$id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            if ($element == "approve") {
                if ($this->adminModel->approveResource($id)) {
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            } elseif ($element == "decline") {
                if ($this->adminModel->declineResource($id)) {
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            }else{
                echo 'Error';
            }

            
        
        }


        if ($element == "video") {

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                

                $data = [];
                $data['videov'] = $this->adminModel->videoview($id);
                
                $this->view('admin/videoview',$data);

            }
        }

        if ($element == "quiz") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                

                $data = [];
                $data['quizv'] = $this->adminModel->quizview($id);

                $this->view('admin/quizview',$data);

            }
        }

        if ($element == "paper") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {
                
                $data = [];
                $data['pastpaperv'] = $this->adminModel->pastpaperview($id);

                $this->view('admin/pastpaperview',$data);

            }
        }

        if ($element == "pdf") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $data = [];
                $data['pdfv'] = $this->adminModel->pdfview($id);

                
                $this->view('admin/pdfview',$data);

            }
        }

        if ($element == "other") {

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            }

            if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                $data = [];
                $data['otherv'] = $this->adminModel->otherview($id);
                
                $this->view('admin/otherview',$data);

            }
        }

    }

    public function scholorships($schlID="%") {

        sessionValidator();
        $this->hasLogged();
        

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ID = $_SESSION["id"];
            $data = [];
            $data['scholarship'] = $this->adminModel->scholorship($ID);
            $data['sponsors'] = $this->adminModel->sponsors();
            $this->view('admin/scholpro',$data);

        }

    }

    public function scholorshipviews() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ID = $_SESSION["id"];
            $data = [];
            $data['scholarship'] = $this->adminModel->scholorship($ID);
            
            $this->view('admin/scholoviewall',$data);

        }

    }

    public function sponsorviews() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['sponsors'] = $this->adminModel->sponsors();
            
            $this->view('admin/sponsorviewall',$data);

        }

    }

    public function scholorshipview($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uID = $_SESSION["id"];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->adminModel->addScholToTaskManager($id,$uID)){
                    echo 'Successful';
                } else{
                    echo 'Error';
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $ID = $_SESSION["id"];
            $data = [];
            $data['scholarship'] = $this->adminModel->scholorship($ID);
            
            $this->view('admin/scholoview',$data);

        }

    }

    public function sponsorview($id) {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $uID = $_SESSION["id"];

            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if($this->adminModel->addSPToTaskManager($id,$uID)){
                    echo 'Successful';
                } else{
                    echo 'Error';
                }
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['sponsors'] = $this->adminModel->sponsors();
            
            $this->view('admin/sponsorview',$data);

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

            $data['admin'] = $this->adminModel->admin();
            $data['appliedrc'] = $this->adminModel->AppliedResourcecreator();
            
            // $data['classes'] = $this->hrModel->getClasses();
            
            $this->view('admin/humanResource',$data);

        }

    }

    public function adminviewall() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['admin'] = $this->adminModel->admin();
            
            $this->view('admin/addMemberViewall',$data);

        }

    }

    public function resourceCreatorViewall($rcID='%') {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['appliedrc'] = $this->adminModel->AppliedResourcecreator();
            
            $this->view('admin/resourcecreatorviewall',$data);

        }

    }

    public function resourceCreatorView($rcID) {

        sessionValidator();
        $this->hasLogged();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $uID = $_SESSION["id"];

            if($this->adminModel->addRCToTaskManager($rcID,$uID)){
                echo 'Successful';
            } else{
                echo 'Error';
            }

        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['appliedrc'] = $this->adminModel->ResourceCreatorView($rcID);
            
            $this->view('admin/resourceCreatorView',$data);

        }

    }

                    public function resourceCreatorReview($element,$rcID) {

                        sessionValidator();
                        $this->hasLogged();
                        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                            $data['creator'] = $this->adminModel->ResourceCreatorDetails($rcID);

                            if ($element == "approve") {
                                $password = $this->randompassword();
                                if ($this->adminModel->approveResourceCreator($rcID,$data['creator']['0']['firstName'],$data['creator'][0]['email'],$password)) {
                                    $message = "<center><div>
                                    <h1 style='color: green;'>M E N T O R</h1>
                                    <h3>We are so glad to informe you that you have been selected as a Resource Creator at MENTOR<br> You Can Use This PASSWORD to login to your account<br>Thank You!</h3>
                                    <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
                                    $password
                                    </h1>
                                    <h5 style='color:red;'>Do not share this PASSWORD with anyone !</h5>
                                    </div></center>";
                                    // sendMail($data['creator'][0]['email'], "User", "MENTOR RESOURCE CREATOR PASSWORD", $message);
                        
                                    echo 'Successful';
                                } else {
                                    echo 'Error';
                                }
                            } elseif ($element == "decline") {
                                if ($this->adminModel->declineResourceCreator($rcID)) {
                                    echo 'Successful';
                                } else {
                                    echo 'Error';
                                }
                            }else{
                                echo 'Error';
                            }

                        
                        }

                        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

                            $data = [];
                            $data['appliedrc'] = $this->adminModel->ResourceCreatorView($rcID);
                            
                            $this->view('admin/resourceCreatorReview',$data);

                        }

                    }

    public function SponsorReview($element,$spID) {

        sessionValidator();
        $this->hasLogged();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['sponsor'] = $this->adminModel->SponsorDetails($spID);

            if ($element == "approve") {
                $password = $this->randompassword();
                if ($this->adminModel->approveSponsors($spID,$data['sponsor']['0']['firstName'],$data['sponsor'][0]['email'],$password)) {
                    $message = "<center><div>
                    <h1 style='color: green;'>M E N T O R</h1>
                    <h3>We are so glad to informe you that you have been selected as a Resource Creator at MENTOR<br> You Can Use This PASSWORD to login to your account<br>Thank You!</h3>
                    <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
                    $password
                    </h1>
                    <h5 style='color:red;'>Do not share this PASSWORD with anyone !</h5>
                    </div></center>";
                    // sendMail($data['creator'][0]['email'], "User", "MENTOR RESOURCE CREATOR PASSWORD", $message);
           
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            } elseif ($element == "decline") {
                if ($this->adminModel->declineSponsor($spID)) {
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            }else{
                echo 'Error';
            }

        
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['sponsor'] = $this->adminModel->SponsorDetails($spID);
            
            $this->view('admin/sponsorReview',$data);

        }

    }

    public function SchlReview($element,$sID) {

        sessionValidator();
        $this->hasLogged();
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data['schl'] = $this->adminModel->SchlDetails($sID);

            if ($element == "approve") {
                if ($this->adminModel->approveSchl($sID)){
                    echo 'Successful';
                }else {
                    echo 'Error';
                }
            }elseif ($element == "decline") {
                if ($this->adminModel->declineSchl($sID)) {
                    echo 'Successful';
                } else {
                    echo 'Error';
                }
            }else{
                echo 'Error';
            }
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $data = [];
            $data['schl'] = $this->adminModel->SchlDetails($sID);
            
            $this->view('admin/scholorReview',$data);

        }
    }

    public function addMember() {

        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // $id = $this
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $data = [];
            $data['admin'] = $this->adminModel->admin();
            $this->view('admin/addMemberView',$data);

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
            $this->model('admin')->addNewAdminToUser($name,$email,$password);
            
            $message = "<center><div>
            <h1 style='color: green;'>M E N T O R</h1>
            <h3>This is your Password for Login to your account</h3>
            <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
            $password
            </h1>
            <h5 style='color:red;'>Do not share this PASSWORD with anyone !</h5>
            </div></center>";
            sendMail($email, "User", "MENTOR ADMIN PASSWORD", $message);
            // // the message
            // $msg = "First line of text\nSecond line of text";

            // // use wordwrap() if lines are longer than 70 characters
            // $msg = wordwrap($msg, 70);

            // // send email
            // mail("someone@example.com", "My subject", $msg);

            // echo "Success";
            
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/addNewAdmin');

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

        $data[] = $this->userModel->getImage($_SESSION['id'])[0];
        var_dump($data);
        $this->view("admin/ad_profile/profile_changeimg", $data);
    }

    private function password($msg) {
        sessionValidator();
        $this->hasLogged();
        $this->view("admin/setting", $msg);
    }

    private function email() {

    }

    private function mobile($msg = null) {
        $result = $this->model("userModel")->getMobile($_SESSION['id']);
        $this->view("admin/ad_profile/profile_changephone", array($result,$msg));
    }

    private function name($msg = null) {
        sessionValidator();
        $this->hasLogged();

        $data[] = $this->adminModel->getName($_SESSION['id']);
        $this->view("admin/ad_profile/profile_changename", $data);
    }

    public function changeName() {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['name'])) {
            if ((preg_match('/[a-zA-Z][a-zA-Z ]+/',$_POST['name'])) && ($_POST['name'] != '')) {
                $this->adminModel->updateName($_POST['name'], $_SESSION['id']);
                $_SESSION['name'] = $_POST['name'];
                header("location:" . BASEURL . 'admins/profile/success');
            } else {
                header("location:" . BASEURL . 'admins/change/name/failed');
            }
        } else {
            header("location:" . BASEURL . 'admins/change/name/failed');
        }
    }

    public function changeImage() {
        sessionValidator();
        $this->hasLogged();

        // print_r($_POST['image']);

        if (isset($_POST['image'])) {
            if($this->adminModel->updateImage($_SESSION['id'],$_POST['image'])){
                echo "success";
            }else{
                echo "unsuccess";
            }
        }
    }

    public function updateImage() {
        session_start();
        if (isset($_FILES["image"])) {
            $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg");
            $fileData = array("name" => $_FILES["image"]["name"],
                    "type" => $_FILES["image"]["type"],
                    "size" => $_FILES["image"]["size"]);
            $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
            if (in_array($fileData['type'], $typeArray)) {
                $newFileName = uniqid() . $_SESSION["id"] . "." . $extention;
                $image = $this->model("userModel")->getImage($_SESSION['id'])[0];
                if(empty($image) or $image == ""){
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], "data/profiles/" . $newFileName)) {
                        if($this->model("userModel")->changeImg($_SESSION['id'],$newFileName)){
                            $_SESSION['profilePic'] = $newFileName; 
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    } else {
                        echo "failed";
                    }
                }else{
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], "data/profiles/" . $newFileName) and file_exists("data/profiles/".$image) and unlink("data/profiles/".$image)) {
                        if($this->model("userModel")->changeImg($_SESSION['id'],$newFileName)){
                            $_SESSION['profilePic'] = $newFileName; 
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }elseif(!file_exists("data/profiles/".$image)){
                        if($this->model("userModel")->changeImg($_SESSION['id'],$newFileName)){
                            $_SESSION['profilePic'] = $newFileName; 
                            echo "success";
                        }else{
                            echo "failed";
                        }
                    }
                     else {
                        echo "failed";
                    }
                }
            }else{
                echo "type_error";
            }     
        }else{
            echo "failed";
        }
    }

    public function changeMobile() {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['mobile'])) {
            if ((preg_match('/[0-9]{10}/',$_POST['name'])) && ($_POST['mobile'] != '')) {
                $this->adminModel->updateMobile($_POST['mobile'], $_SESSION['id']);
                header("location:" . BASEURL . 'admins/profile/success');
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'admins/change/mobile/failed');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'admins/change/mobile/failed');
        }
    }

    public function changePassword() {
        sessionValidator();
        $this->hasLogged();

        if (isset($_POST['cpasswd']) && isset($_POST['npasswd']) && isset($_POST['cnfpasswd'])) {
            if ($_POST['npasswd'] == $_POST['cnfpasswd']) {
                // $this->adminModel->verifyPassword($_POST['cpasswd'], $_SESSION['user']);
                if($this->adminModel->verifyPassword($_POST['cpasswd'], $_SESSION['user'])) {
                    $hash = password_hash($_POST['npasswd'], PASSWORD_BCRYPT, ["cost" => 10]);
                    if ($this->adminModel->changePassword($hash, $_SESSION['user'])) {
                        flashMessage("success");
                        header("location:" . BASEURL . 'admins/change/password/success');
                    } else {
                        flashMessage("failed");
                        header("location:" . BASEURL . 'admins/change/password/failed');
                    }
                } else {
                    flashMessage("wrongPass");
                    header("location:" . BASEURL . 'admins/change/password/wrongPass');
                }

            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'admins/change/password/failed');
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
            $photo =$_POST['image'];
            $grade = $_POST['grade'];
            
            // print_r($_POST);

            $res = $this->adminModel->addGrade($grade,$photo);

            if ($res) {
                echo 'success';
            } else {
                print_r($res);
            }
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            
            $this->view('admin/add/addNewGrade');

        }

    }

    public function addsubject() {  

        sessionValidator();
        $this->hasLogged();
        

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
           
           
        }

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // $data =$this->model('admins')->addGrade($name,$photo);
            // $this->view('admin/add/addNewSubject',$data);

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

    public function adminAnalytics()
    {
        sessionValidator();
        $this->hasLogged();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // handle POST request
        }

        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $currentMonth = date('m');
            $monthlyStArray = $this->model('admin')->getUserCountsByTypeAndMonth('st', $currentMonth);
            $monthlytArray = $this->model('admin')->getUserCountsByTypeAndMonth('tch', $currentMonth);
            $monthlyRcArray = $this->model('admin')->getUserCountsByTypeAndMonth('rc', $currentMonth);
            $monthlySpArray = $this->model('admin')->getUserCountsByTypeAndMonth('sp', $currentMonth);

            $this->view('admin/analytics', compact('monthlyStArray', 'monthlytArray', 'monthlyRcArray', 'monthlySpArray'));
        }
    }
    
    
}


?>