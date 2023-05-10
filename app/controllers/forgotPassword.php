<?php

class ForgotPassword extends Controller
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION["user"])) {
            header("location:" . BASEURL . "home");
        }
        flashMessage();
    }

    public function index($hasreg = 1)
    {
        $this->view("auth/forgotPassword", $hasreg);
    }

    public function emailExist()
    {
        if (isset($_POST['email']) and validateEmail($_POST['email'])) {
            $result = $this->model("userModel")->getEmail($_POST['email']);
            if ($result->num_rows > 0) {
                $_SESSION['email'] = $_POST['email'];
                header("location:" . BASEURL . "forgotPassword/OTP");
            } else {
                flashMessage("not_registered");
                header("location:" . BASEURL . "forgotPassword");
            }
        } else {
            flashMessage("incorrect_email");
            header("location:" . BASEURL . "forgotPassword");
        }

    }

    public function OTP($msg = null)
    {
        if (isset($_SESSION['email'])) {
            if (!isset($_SESSION['otp'])) {
                $otp = $this->OTPGenerator();
                $_SESSION['otp'] = $otp;
                $message = "<center><div>
                                <h1 style='color: green;'>M E N T O R</h1>
                                <h3>This is your OTP for Change the password of your account</h3>
                                <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
			                    $otp
                                </h1>
                                <h5 style='color:red;'>Do not share this OTP with anyone !</h5>
                            </div></center>";
                sendMail($_SESSION['email'], "User", "MENTOR OTP", $message);
                header("location:" . BASEURL . "forgotPassword/OTPForm");
            }
        } else {
            header("location:" . BASEURL . "forgotPassword");
        }
    }

    public function OTPForm($msg = null)
    {
        if (isset($_SESSION['otp'])) {
            $this->view("auth/otpForm", $msg);
        }
    }

    public function verifyOTP()
    {
        if (isset($_POST['otpForm']) && isset($_SESSION['otp'])) {
            if ($_POST['otp'] == $_SESSION['otp']) {
                unset($_SESSION['otp']);
                $this->view("auth/newPassword");
            } else {
                header("location:" . BASEURL . "forgotPassword/OTP/0");
            }
        } else {
            header("location:" . BASEURL . "forgotPassword");
        }
    }

    public function changePassword()
    {
        if (isset($_POST['passwd']) && isset($_POST['passwdconf'])) {
            if ($_POST['passwd'] == $_POST['passwdconf']) {
                $hash = password_hash($_POST['passwd'], PASSWORD_BCRYPT, ["cost" => 10]);
                if ($this->model("userModel")->changePassword($hash, $_SESSION['email'])) {
                    unset($_SESSION['email']);
                    header("location:" . BASEURL . "login");
                } else {
                    flashMessage("failed");
                    header("location:" . BASEURL . "forgotPassword/changePassword");
                }
            } else {
                flashMessage("not_match");
                header("location:" . BASEURL . "forgotPassword/changePassword");
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . "forgotPassword");
        }
    }

    private function OTPGenerator()
    {
        $result = rand(100000, 999999);
        return $result;
    }

    function unset() {
        unset($_SESSION['email']);
        unset($_SESSION['otp']);
        header("location:" . BASEURL . "forgotPassword");
    }
}

?>
