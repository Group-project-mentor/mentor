<?php

class St_profile extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/profile/st_profile');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

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
                header("location:" . BASEURL . "st_profile");
                break;
        }
    }

    public function Scholarship_page1(){
        $this->view('student/profile/st_scholarship');
    }

    public function Scholarship_page2(){
        $this->view('student/profile/st_scholarship_form');
    }

    public function Scholarship_page2_action(){
        if ($this->model("st_scholarship_form_model")->request_form($_POST['fname'], $_POST['lname'], 
        $_POST['addr'], $_POST['sch'], $_POST['email'], $_POST['coun'], $_POST['cno'], $_POST['des'])) {
            header("location:" . BASEURL . "st_profile");
        } else {
            header("location:" . BASEURL . "st_profile/Scholarship_page2");
        }
    }
}

?>



