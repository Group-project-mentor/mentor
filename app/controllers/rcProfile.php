<?php

class RcProfile extends Controller
{
    private string $user = "rc";
    
    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index($msg = null)
    {
        $result = $this->model("userModel")->getUserData($_SESSION['id']);
        $this->view('resourceCtr/profile/rc_profile', array($result, $msg));
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
                header("location:" . BASEURL . "rcProfile");
                break;
        }
    }

    private function image($msg)
    {
        $result = $this->model("userModel")->getImage($_SESSION['id']);
        $this->view("resourceCtr/profile/rc_change_image", $result);
    }

    private function password($msg)
    {
        $this->view("resourceCtr/profile/rc_change_passwd", $msg);
    }

    private function email()
    {

    }

    private function mobile($msg = null)
    {
        $result = $this->model("userModel")->getMobile($_SESSION['id']);
        $this->view("resourceCtr/profile/rc_change_mobile", array($result,$msg));
    }

    private function name($msg = null)
    {
        $this->view("resourceCtr/profile/rc_change_name", $msg);
    }

    public function changeName()
    {
        if (isset($_POST['name'])) {
            if ((validateName($_POST['name'])) && ($_POST['name'] != '')) {
                $this->model("userModel")->updateName($_POST['name'], $_SESSION['id']);
                $_SESSION['name'] = $_POST['name'];
                flashMessage("success");
                header("location:" . BASEURL . 'rcProfile/index');
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'rcProfile/change/name');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'rcProfile/change/name');
        }
    }

    // ! Not using now
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

    public function updateImage()
    {
        if (isset($_FILES["image"])) {
            $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg");
            $fileData = array("name" => $_FILES["image"]["name"],
                    "type" => $_FILES["image"]["type"],
                    "size" => $_FILES["image"]["size"]);
            $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
            if (in_array($fileData['type'], $typeArray)) {
                $newFileName = uniqid() . $_SESSION["id"] . "." . $extention;
                $image = $this->model("userModel")->getUserData($_SESSION['id'])->image;
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

    public function changeMobile()
    {
        if (isset($_POST['mobile'])) {
            if ((preg_match('/[0-9]{10}/',$_POST['mobile'])) && ($_POST['mobile'] != '')) {
                $this->model("userModel")->updateMobile($_POST['mobile'], $_SESSION['id']);
                flashMessage("success");
                header("location:" . BASEURL . 'rcProfile');
            } else {
                flashMessage("failed");
                header("location:" . BASEURL . 'rcProfile/change/mobile');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'rcProfile/change/mobile');
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
                        header("location:" . BASEURL . 'rcProfile');
                    } else {
                        flashMessage("failed");
                        header("location:" . BASEURL . 'rcProfile/change/password');
                    }
                } else {
                    flashMessage("wrong_pass");
                    header("location:" . BASEURL . 'rcProfile/change/password');
                }
            } else {
                flashMessage("not_match");
                header("location:" . BASEURL . 'rcProfile/change/password');
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . 'rcProfile/change/password');
        }
    }

    public function reportIssue()
    {
        $result = $this->model("reportIssue")->getReportTypes($_SESSION['usertype']);
        $this->view('resourceCtr/reportIssue/reportIssue',array($result));
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
