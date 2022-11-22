<?php

class ForgotPassword extends Controller
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION["user"])) {
            header("location:" . BASEURL . "home");
        }
    }

    public function index($hasreg = 1)
    {
        $this->view("auth/forgotPassword", $hasreg);
    }

    public function emailExist()
    {
        if (isset($_POST['email'])) {
            $result = $this->model("userModel")->getEmail($_POST['email']);
            if ($result->num_rows > 0) {
                $_SESSION['email'] = $_POST['email'];
                header("location:" . BASEURL . "forgotPassword/OTP");
            } else {
                header("location:" . BASEURL . "forgotPassword/index/0");
            }
        } else {
            header("location:" . BASEURL . "forgotPassword");
        }

    }

    public function OTP($msg = null)
    {
        if (isset($_SESSION['email'])) {
            if (!isset($_SESSION['otp'])) {
                $otp = $this->OTPGenerator();
                ?>
                <script src="https://smtpjs.com/v3/smtp.js"></script>
                <script>
                    let otpNo = <?php echo $otp ?>;
                    let message = "This is OTP : "+otpNo;
                    Email.send({
                        SecureToken : "9bb64158-5ce1-40c1-9eb2-1a4e6f20206d",
                        To : "<?php echo $_SESSION['email'] ?>".trim(),
                        From : "kavisulakshana2000@gmail.com",
                        Subject : "MENTOR OTP NUMBER",
                        Body : message
                    }).then((message)=>{
                        console.log("OTP SENT");
                    }
                    )
                    .catch(()=>{
                        console.log("There is error !");
                    });
                </script>
                <?php
                $_SESSION['otp'] = $otp;
            }
            $this->view("auth/otpForm", $msg);
        } else {
            header("location:" . BASEURL . "forgotPassword");
        }
    }

    // todo : Change password ui should be implemented
    // todo : Its functionality should be implemented
    public function verifyOTP()
    {
        // var_dump($_POST['otp']);
        // var_dump($_SESSION['otp']);
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

    private function OTPGenerator()
    {
        $result = rand(100000, 999999);
        return $result;
        // $generator = "1357902468";
        // $result = "";

        // for ($i = 1; $i <= $n; $i++) {
        //     $result .= substr($generator, (rand() % (strlen($generator))), 1);
        // }
    }

    function unset() {
        unset($_SESSION['email']);
        unset($_SESSION['otp']);
        header("location:" . BASEURL . "forgotPassword");
    }
}
