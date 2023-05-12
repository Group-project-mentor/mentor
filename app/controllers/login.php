<?php

class Login extends Controller
{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['user']) && !isset($_SESSION['premium_expired'])) {
            header("location:" . BASEURL . "home");
        } else if (isset($_SESSION['user']) && isset($_SESSION['premium_expired']) && $_SESSION['premium_expired'] == true) {
            header("location:" . BASEURL . "PremiumExpired");
        }
        flashMessage();
    }
    public function index($err = null)
    {
        $this->view("auth/login", $err);
    }


    public function verify_login()
    {
        if (isset($_POST["login"])) {
            $pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";

            

            $email = trim($_POST["email"]);
            if (preg_match($pattern, $email)) {

                $result = $this->model("userModel")->userLogin($email);
                $password = $_POST["passwd"];
                // $password = $password.$result->salt;

                if (!empty($result)) {

                    if (password_verify($password, $result->password)) {

                        $_SESSION["id"] = $result->id;
                        $_SESSION["user"] = $email;
                        $_SESSION["name"] = $result->name;
                        $_SESSION["usertype"] = $result->type;
                        //$_SESSION["profilePic"] = $result->image;

                        //checking premium availability for teachers
                        if ($result->type == 'tch') {
                            if ($this->premiumExpireNotify($result->id)==1) {
                                header("location:" . BASEURL . "PremiumExpired");
                            } else {
                                header("location:" . BASEURL . "home");
                            }
                        }else
                        {
                            header("location:" . BASEURL . "home");
                        }
                    } else {
                        // echo $result->password;
                        flashMessage("incorrect_passwd");
                        header("location:" . BASEURL . "login");
                    }
                } else {
                    flashMessage("not_registered");
                    header("location:" . BASEURL . "login");
                }
            } else {
                if($_POST["email"] == "" || $_POST["passwd"] == ""){
                    flashMessage("empty_fields");
                }else{
                    flashMessage("incorrect_email");
                }
                header("location:" . BASEURL . "login");
            }
        }
    }


    private function premiumExpireNotify($id)
    {
         //echo "called";
        // Get the current timestamp
        $login_time = date('Y-m-d H:i:s', strtotime('now'));
        //var_dump($login_time);
        $expire_time = ($this->model("premiumModel")->getExpireTime($id));
        //var_dump($expire_time);
        if ($expire_time != NULL) {
            $expire_date = date('Y-m-d H:i:s', strtotime($expire_time));


            // Calculate the notification date
            $notification_date1 = date('Y-m-d H:i:s', strtotime('-1 days', strtotime($expire_time)));
            $notification_date2 = date('Y-m-d H:i:s', strtotime('-2 days', strtotime($expire_time)));
            $notification_date3 = date('Y-m-d H:i:s', strtotime('-3 days', strtotime($expire_time)));
            $notification_date4 = date('Y-m-d H:i:s', strtotime('-7 days', strtotime($expire_time)));

            if ($login_time >= $notification_date4 and $login_time < $notification_date3) {
                $message = "Your premium will be expired within one week ";
                $this->model('notificationModel')->notify($id, $message, 'tch');
                return 0;
            } else if ($login_time >= $notification_date3 and $login_time < $notification_date2) {
                $message = "Your premium will be expired within three days ";
                $this->model('notificationModel')->notify($id, $message, 'tch');
                return 0;
            } else if ($login_time >= $notification_date2 and $login_time < $notification_date1) {
                $message = "Your premium will be expired within two days ";
                $this->model('notificationModel')->notify($id, $message, 'tch');
                return 0;
            } else if ($login_time >= $notification_date1 and $login_time < $expire_date) {
                $message = "Your premium will be expired within one day ";
                $this->model('notificationModel')->notify($id, $message, 'tch');
                return 0;
            } else if ($login_time > $expire_date) {
                $_SESSION['premium_expired'] = true;
                return 1;
            }
        }
    }
}
