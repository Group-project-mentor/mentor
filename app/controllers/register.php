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
            $email_pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/";
            $name_pattern = "/[A-Za-z0-9]+/";

            $email = trim($_POST["stEmail"]);
            $password = $_POST["stPasswd"];
            $name = $_POST["stName"];

            $response = array("message"=>"");
            $salt = base64_encode(random_bytes(5));
            
            if (preg_match($email_pattern, $email) and preg_match($name_pattern, $name) and ($password == $_POST["stPassConf"])) {
                // $password = $password.$salt;
                $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

                if ($this->model("userModel")->registrationStudent($email, $name, $hash, $salt)) {
                    $response['message'] = "successful";
                } else {
                    $response['message'] = "unsuccessful";
                }
            } else {
                $response['message'] = "INVALID";
            }
        echo json_encode($response);
    }

    // ?Done
    public function verify_register_teacher()
    {
            $email_pattern = "/[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]/";
            $name_pattern = "/[A-Za-z0-9]+/";

            $email = trim($_POST["temail"]);
            $password = $_POST["tpasswd"];
            $name = $_POST["tname"];

            $response = array("message"=>"");
            $salt = base64_encode(random_bytes(5));
            
            if (preg_match($email_pattern, $email) and preg_match($name_pattern, $name) and ($password == $_POST["tcpasswd"])) {
                // $password = $password . $salt;
                $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]);

                if ($this->model("userModel")->registrationTeacher($email, $name, $hash, $salt)) {
                    $response['message'] = "successful";
                } else {
                    $response['message'] = "unsuccessful";
                }
            } else {
                $response['message'] = "invalid";
            }
        header('Content-Type: application/json');
        echo json_encode($response);
    }
}
