<?php

class Resources extends Controller
{
    public function index()
    {
        $this->view('resourceCtr/resources/rc_videos');
    }

    public function videos($grade, $subject){
        session_start();
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findVideos($grade, $subject);
        $rows = array();
        if(!empty($result) and $result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
            }
        $this->view('resourceCtr/resources/rc_videos',$rows);
    }

    public function quizzes($grade, $subject){
        session_start();
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findQuizzes($grade, $subject);
        $rows = array();
        if(!empty($result) and $result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
            }
        $this->view('resourceCtr/resources/rc_quizzes',$rows);
    }

    public function pastpapers($grade, $subject){
        session_start();
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findPastpapers($grade, $subject);
        $rows = array();
        if(!empty($result) and $result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
            }
        $this->view('resourceCtr/resources/rc_pastpapers',$rows);
    }

    public function documents($grade, $subject){
        session_start();
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $result = $this->model("resourceModel")->findDocuments($grade, $subject);
        $rows = array();
        if(!empty($result) and $result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
            }
        $this->view('resourceCtr/resources/rc_documents',$rows);
    }

    public function others($grade, $subject){
        session_start();
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $result = $this->model("resourceModel")->findOthers($grade, $subject);
        $rows = array();
        if(!empty($result) and $result->num_rows > 0){
                while ($row = $result->fetch_assoc()) {
                        $rows[] = $row;
                }
            }
        $this->view('resourceCtr/resources/rc_others',$rows);
    }

    private function getNames($gid,$sid){
        if(!isset($_SESSION["gname"])){
            $result1 = $this->model("gradeModel")->getGrade($gid)[1];
            $_SESSION["gname"] = $result1;
        }
        if(!isset($_SESSION["sname"])){
            $result2 = $this->model("subjectModel")->getSubject($sid)[1];
            $_SESSION["sname"] = $result2;
        }
        
    }
}

?>