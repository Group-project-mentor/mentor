<?php

class RcSubjects extends Controller{
    
    private $user = "rc";

    public function __construct(){
        sessionValidator();
        $this->userValidate($this->user);
    }
        
    public function index(){
        unset($_SESSION["sname"]);
        unset($_SESSION["gname"]);
        $id = $_SESSION['id'];
        $dataList = $this->model("rcHasSubjectModel")->getSubsGrades($id);
        $subjectList = $this->model("rcHasSubjectModel")->getSubjects($id);
        $gradeList = $this->model("rcHasSubjectModel")->getGrades($id);
        $this->view('resourceCtr/subjects',array($dataList, $gradeList, $subjectList));
    }

    public function filterByGradeSubject($gid,$sid){
        $result = $this->model("rcHasSubjectModel")->getGradeSubjectFiltered($_SESSION['id'],$gid,$sid);
        header("Content-Type:Application/json");
        echo json_encode($result);
    }
}
