<?php

class St_courses extends Controller
{

    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
        flashMessage();
    }

    public function index($gid)
    {
        $_SESSION['gid'] = $gid;
        // echo $_SESSION['gid'];
        $res = $this->model('st_courses_model')->getClasses($gid);
        $res2 = $this->model('st_courses_model')->getClasses2($gid, $_SESSION['id']);
        $this->view('student/enrollment/st_courses', array($res, $res2));
    }

    public function Enroll_subject_all($gid)
    {
        unset($_SESSION["gname"]);
        unset($_SESSION["sname"]);
        $res = $this->model('st_courses_model')->getClasses3($gid, $_SESSION['id']);
        $this->view('student/enrollment/st_enrolled_subject', array($res));
    }

    public function Enroll_subject_delete($grade, $subject)
    {
        $res = $this->model('st_courses_model')->getClasses5($grade,$subject);
        $this->notify($_SESSION['id'],"you Leave from the subject ","leave");
        flashMessage("Delete");
        header("location:" . BASEURL . 'st_courses/Enroll_subject_all/' . $_SESSION['gid'] );
    }

    public function Subject_to_Enroll_all($gid)
    {
        $res = $this->model('st_courses_model')->getClasses4($gid, $_SESSION['id']);
        $this->view('student/enrollment/st_subject_to_enroll', array($res));
    }

    public function Enroll_records($gid, $sid)
    {
        $result = $this->model('st_subject_to_enroll_model')->enroll_rec(2, $gid, $sid);
        if ($result) {
            header("location:" . BASEURL . "st_courses/index/$gid");
            $this->notify($_SESSION['id'],"you enroll to new subject ","enroll");
            flashMessage("Enroll");
            header("location:" . BASEURL . 'st_courses/index/' . $_SESSION['gid'] );
        } else {
            header("location:" . BASEURL . "st_courses/index/$gid");
            flashMessage("NOEnroll");
            header("location:" . BASEURL . 'st_courses/index/' . $_SESSION['gid'] ); 
            ?>
            
<?php
        }
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
?>