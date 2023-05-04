<?php

class Login extends Controller{
    public function __construct()
    {
        session_start();
        if (isset($_SESSION['user'])) {
           header("location:" . BASEURL . "home");
    }
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
                            $_SESSION["profilePic"] = $result->image;
                            header("location:" . BASEURL . "home");
                    } else {
                        echo $result->password;
                        // header("location:" . BASEURL . "login/index/2");
                    }
                } else {
                    header("location:" . BASEURL . "login/index/3");
                }
            } else {
                header("location:" . BASEURL . "login/index/4");
            }
        }
    }
}
