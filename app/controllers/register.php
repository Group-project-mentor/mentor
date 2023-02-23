<?php
class Register extends Controller
{
    public function index($msg = null)
    {
        $this->view("auth/register",$msg);
    }

    //! Not completed
    public function verify_register_student()
    {
//        if (isset($_POST["register"])) {
            $email_pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/";
            $name_pattern = "/[A-Za-z0-9]+/";

            $email = trim($_POST["stEmail"]);
            $password = $_POST["stPasswd"];
            $name = $_POST["stName"];
            $age = $_POST["stAge"];

            $response = array("message"=>"");

        // $result = null;

            if (preg_match($email_pattern, $email) and preg_match($name_pattern, $name and $password == $_POST["stPassConf"])) {
                $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

                if ($this->model("userModel")->registrationStudent($email, $name, $hash, $age)) {
                    $response['message'] = "successful";
                } else {
//                    echo "Registration unsuccessful !";
                    $response['message'] = "unsuccessful";
                    // header("location:register.php?error=Can't add the user");
                    // header("location:" . BASEURL . "register/index/1");
                }
            } else {
//                echo "Invalid Data !";
                $response['message'] = "INVALID";
                // header("location:" . BASEURL . "register/index/2");
                // header("location:register.php?error=Invalid Data");
            }
//        } else {
//            header("location:" . BASEURL . "login");
//        }
//        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // ?Done
    public function verify_register_teacher()
    {
        // if (isset($_POST["register"])) {
            $email_pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/";
            $name_pattern = "/[A-Za-z0-9]+/";

            $email = trim($_POST["temail"]);
            $password = $_POST["tpasswd"];
            $name = $_POST["tname"];

            $response = array("message"=>"");

            if (preg_match($email_pattern, $email) and preg_match($name_pattern, $name) and ($password == $_POST["tcpasswd"])) {
                $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

                if ($this->model("userModel")->registrationTeacher($email, $name, $hash)) {
                    $response['message'] = "successful";
                    // header("location:" . BASEURL . "login");
                } else {
                    $response['message'] = "unsuccessful";
                    // header("location:" . BASEURL . "register/index/1");
                }
            } else {
                $response['message'] = "invalid";
                // header("location:" . BASEURL . "register/index/2");
            }
        // } else {
        //     $response['message'] = "Invalid !";
        // }
        header('Content-Type: application/json');
        echo json_encode($response);
    }

    // public function test(){
    //     $response = array("message" => $_POST['temail']);
    //     $response['message'] = "Invalid Data !";

    //     header('Content-Type: application/json');
    //     echo json_encode($response);
    // }
}
