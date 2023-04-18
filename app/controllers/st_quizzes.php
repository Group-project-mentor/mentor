<?php

class St_quizzes extends Controller
{
    public function __construct()
    {
        sessionValidator();
        // $this->hasLogged();
    }


    public function index($grade, $subject, $msg = null)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("st_public_model")->findQuizzes($grade, $subject);
        $this->view('student/enrollment/st_quizzes', array($result, $msg));
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

    public function st_quizzes_do($id)
    {
        $this->view("student/enrollment/st_quizzes_do", array($id));
    }

    public function st_quizzes_intro($id)
    {
        $this->view("student/enrollment/st_quizzes_intro", array($id));
    }
}
