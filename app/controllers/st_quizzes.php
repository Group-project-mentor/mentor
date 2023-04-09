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
        $result = $this->model("resourceModel")->findQuizzes($grade, $subject);
        $this->view('student/enrollment/st_quizzes', array($result,$msg));
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
        
        $result = $this->model('quizModel')->verifyAndQuizId($id, $_SESSION['gid'], $_SESSION['sid']);
        if($result){
            
            $this->view("student/enrollment/st_quizzes_do",array($id));
        }else{
            header("location:");
        }
    }

    public function st_quizzes_intro($id)
    {
        
        $result = $this->model('quizModel')->verifyAndQuizId($id, $_SESSION['gid'], $_SESSION['sid']);
        if($result){
            $this->view("student/enrollment/st_quizzes_intro",array($id));
        }else{
            header("location:");
        }
    }


    }




?>



