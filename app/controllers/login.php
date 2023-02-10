<?php

class Login extends Controller{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) {
           header("location:" . BASEURL . "home");
    }
    }

    public function index($err=null)
    {
        $this->view("auth/login",$err);
    }


    public function verify_login()
    {
        if (isset($_POST["login"])) {
            session_start();
            $pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/";

            $email = trim($_POST["email"]);
            $result = null;

            if (preg_match($pattern, $email)) {

                //  Use the model
                $data = $this->model("userModel")->userLogin($email);

                if ($data->num_rows > 0) {
                    while ($record = $data->fetch_row()) {
                        $result = $record;
                    }

                   if (password_verify($_POST["passwd"], $result[2])) {
                    //if (true) {
                        $_SESSION["id"] = $result[0];
                        $_SESSION["user"] = $email;
                        $_SESSION["name"] = $result[3];
                        $_SESSION["usertype"] = $result[4];
                        // echo "Login successful !\nWelcome $result[3]";
                        header("location:" . BASEURL . "home");
                    } else {
                        header("location:" . BASEURL . "login/index/1");
                    }
                } else {
                    // echo "Login unsuccessful !";
                    header("location:" . BASEURL . "login/index/2");
                }
            } else {
                // echo "invalid email !";
                header("location:" . BASEURL . "login/index/3");

            }
        } else {
            header("location:" . BASEURL . "login/index/4");
        }
    }
}
