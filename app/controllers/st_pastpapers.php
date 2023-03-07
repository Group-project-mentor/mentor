<?php

class St_pastpapers extends Controller
{
    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
    }
    
    public function index($gid,$sid)
    {
        $_SESSION['sid'] = $sid;
        $res = $this->model('st_public_model')->findPastpapers($gid, $sid);
        $this->view('student/enrollment/st_pastpapers', array($res));
    }

    public function pastpapers($grade, $subject, $msg = null)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findPastpapers($grade, $subject);
        $this->view('student/enrollment/st_pastpapers', array($result));
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

    public function preview($type, $id){
        switch ($type) {
            case 'document':
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'pdf');
                $this->view("student/enrollment/st_pastpaper_do",$file);
                break;
        }
    }
    

    public function st_pastpaper_down( $id)
    {
        $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'pdf');
        $this->view('student/enrollment/st_pastpaper_down',$file);

    }


    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }
}

?>



