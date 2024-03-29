<?php

class St_private_mode extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
        flashMessage();
    }

    public function index()
    {
        $sid = $_SESSION['id'];
        $res = $this->model('st_private_mode_model')->getClassesDetails($sid);
        $this->view('student/privatemode/st_private_mode', array($res));
    }

    public function st_classroom_inside()
    {
        $this->view('student/enrollment_private/st_classroom_inside');
    }

    public function st_myclasses()
    {
        $res = $this->model('st_private_mode_model')->getClassesDetails($_SESSION['id']);
        $this->view('student/privatemode/st_myclasses', array($res));
    }

    public function st_join_classes()
    {
        $this->view('student/privatemode/st_join_classes');
    }

    public function st_join_token()
    {
        $this->view('student/privatemode/st_join_token');
    }

    public function st_join_token_send($token)
    {
        $sid = $_SESSION['id'];
        $res = $this->model('st_private_mode_model')->jointoken($token)->class_id;
        //var_dump($res);
        $res2 = $this->model('st_private_mode_model')->jointokenaddtoDB($sid, $res, $token);

        if ($res2 == 1) {
            $res3 = $this->model('st_private_mode_model')->jointokenview($sid, $res, $token)->class_name;
            $res4 = $this->model('st_private_mode_model')->jointokenview($sid, $res, $token)->fees;
            $res5 = $this->model('st_private_mode_model')->GetTeacherID($res)->teacher_id;
            $_SESSION['class_name'] = $res3;
            $_SESSION['fees'] = $res4;
            $this->notify($res5, "You have Token request from the Student", "request");  
            $this->view('student/privatemode/st_join_token_send', array($res2));
        } else if($res2 == 2){
            $this->notify($_SESSION['id'], "Your Token seems invalid.Please Check it Again", "Fail_request");
            flashMessage("Failrequest");
            header("location:" . BASEURL . 'st_private_mode/st_join_token' );
            // $this->view('student/privatemode/st_join_token');
        } else {
            $this->notify($_SESSION['id'], "You have already Send Token Request Or Already Add to This Class. Check it Again", "Not_request");
            flashMessage("NOrequest");
            header("location:" . BASEURL . 'st_private_mode/st_join_token' );
            // $this->view('student/privatemode/st_join_token');
        }
    }

    public function st_join_request_update($access, $class_id)
    {
        $sid = $_SESSION['id'];
        if ($access == 0) {
            $res = $this->model('st_private_mode_model')->AddStudentToClassUsingRequest($sid, $access, $class_id);
            $this->notify($_SESSION["id"], "You Add To New Class By Accepting The Teacher Request", "request");
            $this->view('student/privatemode/st_join_classes', array($res));
        } else if ($access == 1) {
            $res = $this->model('st_private_mode_model')->RemoveTeacherRequest($sid, $access, $class_id);
            $this->notify($_SESSION["id"], "You Delete One Teacher's Request", "delete");
            $this->view('student/privatemode/st_join_classes', array($res));
        }
    }

    public function st_join_request()
    {
        $sid = $_SESSION['id'];
        $res = $this->model('st_private_mode_model')->getTeacherRequests($sid);
        $this->view('student/privatemode/st_join_request', array($res));
    }


    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
