<?php
class St_video extends Controller
{
    public function __construct(){
        sessionValidator();
        //$this->hasLogged();
    }

    public function index($gid,$sid)
    {
        $_SESSION['sid'] = $sid;
        $res = $this->model('st_public_model')->findVideos($gid, $sid);
        $this->view('student/enrollment/st_video', array($res));

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }

    public function videos($grade, $subject, $msg = null)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findVideos($grade, $subject);
        $this->view('student/enrollment/st_video', array($result, $msg));
    }

    private function getNames($gid, $sid)
    {
        if (!isset($_SESSION["gname"])) {
            $result1 = $this->model("gradeModel")->getGrade($gid)[1];
            $_SESSION["gname"] = $result1;
        }
        if (!isset($_SESSION["sname"])) {
            $result2 = $this->model("subjectModel")->getSubject($sid)[1];
            $_SESSION["sname"] = $result2;
        }
    }
}


?>



