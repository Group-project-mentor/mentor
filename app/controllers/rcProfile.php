<?php

class RcProfile extends Controller
{
    public function __construct()
    {
        sessionValidator();
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
            if (($_SESSION['name'] != $_POST['name']) && ($_POST['name'] != '')) {
                $this->model("userModel")->updateName($_POST['name'], $_SESSION['id']);
                $_SESSION['name'] = $_POST['name'];
                header("location:" . BASEURL . 'rcProfile/index/success');
            } else {
                header("location:" . BASEURL . 'rcProfile/change/name/failed');
            }
        } else {
            header("location:" . BASEURL . 'rcProfile/change/name/failed');
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
            if ($_POST['mobile'] != '') {
                $this->model("userModel")->updateMobile($_POST['mobile'], $_SESSION['id']);
                header("location:" . BASEURL . 'rcProfile/index/success');
            } else {
                header("location:" . BASEURL . 'rcProfile/change/mobile/failed');
            }
        } else {
            header("location:" . BASEURL . 'rcProfile/change/mobile/failed');
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
                        header("location:" . BASEURL . 'rcProfile/index/success');
                    } else {
                        header("location:" . BASEURL . 'rcProfile/change/password/failed');
                    }
                } else {
                    header("location:" . BASEURL . 'rcProfile/change/password/wrongPass');
                }
            } else {
                header("location:" . BASEURL . 'rcProfile/change/password/failed');
                //! todo
            }
        } else {
            header("location:" . BASEURL . 'rcProfile/change/password/failed');
            //! todo
        }
    }
}
