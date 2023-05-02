<?php

class St_profile extends Controller
{
    private string $user = "st";
    
    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
    }

    public function index($msg = null)
    {
        $result = $this->model("userModel")->getUserData($_SESSION['id']);
        $this->view('student/profile/st_profile', array($result, $msg));
    }

    public function change($type, $msg = null)
    {
        switch ($type) {
            case 'image':
                $this->image($msg);
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
                header("location:" . BASEURL . "st_profile");
                break;
        }
    }

    private function image($msg)
    {
        $result = $this->model("userModel")->getImage($_SESSION['id']);
        $this->view("student/profile/st_change_image", $result);
    }

    private function password($msg)
    {
        $this->view("student/profile/st_change_passwd", $msg);
    }

    private function email()
    {

    }

    private function mobile($msg = null)
    {
        $result = $this->model("userModel")->getMobile($_SESSION['id']);
        $this->view("student/profile/st_change_mobile", array($result,$msg));
    }

    private function name($msg = null)
    {
        $this->view("student/profile/st_change_name", $msg);
    }

    public function changeName()
    {
        if (isset($_POST['name'])) {
            if ((preg_match('/[a-zA-Z][a-zA-Z ]+/',$_POST['name'])) && ($_POST['name'] != '')) {
                $this->model("userModel")->updateName($_POST['name'], $_SESSION['id']);
                $_SESSION['name'] = $_POST['name'];
                header("location:" . BASEURL . 'st_profile/index/success');
            } else {
                header("location:" . BASEURL . 'st_profile/change/name/failed');
            }
        } else {
            header("location:" . BASEURL . 'st_profile/change/name/failed');
        }
    }

    public function changeImage()
    {
        if (isset($_POST['image'])) {
            if($this->model("userModel")->changeImg($_SESSION['id'],$_POST['image'])){
                echo "success";
            }else{
                echo "unsuccess";
            }
        }
    }

    public function changeMobile()
    {
        if (isset($_POST['mobile'])) {
            if ((preg_match('/[0-9]{10}/',$_POST['name'])) && ($_POST['mobile'] != '')) {
                $this->model("userModel")->updateMobile($_POST['mobile'], $_SESSION['id']);
                header("location:" . BASEURL . 'st_profile/index/success');
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'st_profile/change/mobile/failed');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'st_profile/change/mobile/failed');
        }
    }

    public function changePassword()
    {
        if (isset($_POST['cpasswd']) && isset($_POST['npasswd']) && isset($_POST['cnfpasswd'])) {
            if ($_POST['npasswd'] == $_POST['cnfpasswd']) {
                $result = $this->model("userModel")->changeProfilePasswd($_SESSION['id']);
                if (!empty($result) && password_verify($_POST['cpasswd'], $result[2])) {
                    $hash = password_hash($_POST['npasswd'], PASSWORD_BCRYPT, ["cost" => 10]);
                    if ($this->model("userModel")->changePassword($hash, $_SESSION['user'])) {
                        flashMessage("success");
                        header("location:" . BASEURL . 'st_profile/index/success');
                    } else {
                        flashMessage("failed");
                        header("location:" . BASEURL . 'st_profile/change/password/failed');
                    }
                } else {
                    flashMessage("wrongPass");
                    header("location:" . BASEURL . 'st_profile/change/password/wrongPass');
                }
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'st_profile/change/password/failed');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'st_profile/change/password/failed');
        }
    }


    public function Scholarship_page1(){
        $this->view('student/profile/st_scholarship');
    }

    public function Scholarship_page2(){
        $this->view('student/profile/st_scholarship_form');
    }

    public function applyCreatorForm(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $message = array("status"=>"","message"=>"");

            $firstname = sanitizeText($_POST['firstName']);
            $lastname = sanitizeText($_POST['lastName']);
            $initialsName = sanitizeText($_POST['fullName']);
            $email = sanitizeText($_POST['email']);
            $gradientname = sanitizeText($_POST['gradientname']);
            $tel1 = sanitizeText($_POST['tel1']);
            $tel2 = sanitizeText($_POST['tel2']);
            $address = sanitizeText($_POST['address']);
            $school = sanitizeText($_POST['school']);
            $dob = sanitizeText($_POST['dob']);
            $gender = sanitizeText($_POST['gender']);
            $description = sanitizeText($_POST['description']);
            $class = $_POST['class'];
            $subjects = sanitizeText($_POST['subjects']);
            $cv = $_FILES['cv'];

            
            if($firstname != null && $lastname != null 
                && $initialsName != null && 
                validateEmail($email) && validateTelNo($tel1) && $gradientname != null &&
                $address != null && $school != null && $dob != null && $gender != null && $description != null && 
                $subjects != null && $class != null && 
                isset($cv) && $cv['error'] === 0)
            {

                if($tel2 == "" || validateTelNo($tel2) ){
                    $tel2 = null;
                }

                $cvName = uniqid($firstname);
                $cvTarget = $cvName.".".pathinfo($cv['name'], PATHINFO_EXTENSION);
                $cvDest = "data/creatorInfo/cvs/".$cvTarget;

                if(move_uploaded_file($cv['tmp_name'], $cvDest)){
                    $status = $this->model("userModel")->saveAppliedCreator($firstname,$lastname,$initialsName,
                    $email,$gradientname,$tel1,$tel2,$address,$school,$dob,$gender,$description,$class,$subjects, $cvTarget);
                    if($status){
                        $message['status'] = "success";
                        $message['message'] = "Successfully applied to be a creator";
                        $mail = "<center><div>
                                <h1 style='color: green;'>M E N T O R</h1>
                                <h3>Hello $initialsName ,</h3>
                                <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
                                Thank you for applying to be a creator in MENTOR. <br> We will contact you soon.
                                </h1>
                                <h5 style='color:red;'>message from MENTOR team</h5>
                            </div></center>";
;
                        sendMail($email,$initialsName,"Applied to Sponsorship in MENTOR",$mail);
                    }else{
                        $message['status'] = "error";
                        $message['message'] = "Error in Sponsorship from";
                    }
                }else{
                    $message['status'] = "error";
                    $message['message'] = "Error in uploading CV";
                }
            }else{
                $message['status'] = "error";
                $message['message'] = "Please fill all the fields";            
            }
            echo json_encode($message);
        }else{
            header("location".BASEURL."");
        }
    }
}

?>



