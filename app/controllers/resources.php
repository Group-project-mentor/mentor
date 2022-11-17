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

    private function getNames($gid,$sid){
        $result1 = $this->model("gradeModel")->getGrade($gid)[1];
        $result2 = $this->model("subjectModel")->getSubject($sid)[1];
        $_SESSION["gid"] = $gid;
        $_SESSION["sid"] = $sid;
        $_SESSION["gname"] = $result1;
        $_SESSION["sname"] = $result2;
    }
}

?>