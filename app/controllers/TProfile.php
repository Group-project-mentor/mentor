<?php

class TProfile extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index($msg = null)
    {
        $result = $this->model("userModel")->getUserData($_SESSION['id']);
        $this->view('Teacher/Profile/Tprofile', array($result, $msg));
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
                header("location:" . BASEURL . "TProfile");
                break;
        }
    }

    private function image($msg)
    {
        $result = $this->model("userModel")->getImage($_SESSION['id']);
        $this->view("Teacher/Profile/Tchange_image", $result);
    }

    private function password($msg)
    {
        $this->view("Teacher/Profile/Tchange_passwd", $msg);
    }

    private function email()
    {

    }

    private function mobile($msg = null)
    {
        $result = $this->model("userModel")->getMobile($_SESSION['id']);
        $this->view("Teacher/Profile/Tchange_mobile", array($result,$msg));
    }

    private function name($msg = null)
    {
        $this->view("Teacher/Profile/Tchange_name", $msg);
    }

    public function changeName()
    {
        if (isset($_POST['name'])) {
            if ((preg_match('/[a-zA-Z][a-zA-Z ]+/',$_POST['name'])) && ($_POST['name'] != '')) {
                $this->model("userModel")->updateName($_POST['name'], $_SESSION['id']);
                $_SESSION['name'] = $_POST['name'];
                header("location:" . BASEURL . 'TProfile/index/success');
            } else {
                header("location:" . BASEURL . 'TProfile/change/name/failed');
            }
        } else {
            header("location:" . BASEURL . 'TProfile/change/name/failed');
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
                header("location:" . BASEURL . 'TProfile/index/success');
            } else {
                header("location:" . BASEURL . 'TProfile/change/mobile/failed');
            }
        } else {
            header("location:" . BASEURL . 'TProfile/change/mobile/failed');
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
                        header("location:" . BASEURL . 'TProfile/index/success');
                    } else {
                        header("location:" . BASEURL . 'TProfile/change/password/failed');
                    }
                } else {
                    header("location:" . BASEURL . 'TProfile/change/password/wrongPass');
                }
            } else {
                header("location:" . BASEURL . 'Profile/change/password/failed');
                //! todo
            }
        } else {
            header("location:" . BASEURL . 'rcProfile/change/password/failed');
            //! todo
        }
    }

    public function reportIssue()
    {
        $result = $this->model("reportIssue")->getReportTypes($_SESSION['usertype']);
        $this->view('Teacher/reportIssue/TreportIssue',array($result));
    }
    public function saveReport(){
        $response = array("alert"=>"","message"=>"");
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if($_POST['reportOptions'] == "0" or empty($_POST['reportDesc'])){
                $response['alert'] = "fill all";
            }else{
                if($this->model('reportIssue')->saveIssue($_SESSION['id'], $_POST['reportOptions'], $_POST['reportDesc'])){
                    $response['message'] = "success";
                }else{
                    $response['message'] = "failed";
                }
            }
        }

        // header('Content-Type:application/json');
        echo json_encode($response);
    }
}

?>