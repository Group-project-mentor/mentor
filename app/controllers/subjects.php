<?php

class subjects extends Controller
{
    
    public function select($grade, $subject){
        
        $this->view('resourceCtr/resources');
    }
    
    public function index(){
        session_start();
        unset($_SESSION["sname"]);
        unset($_SESSION["gname"]);
        $id = $_SESSION['id'];
        $rows = array();
        $dataList = $this->model("rcHasSubjectModel")->getSubsGrades($id);
        if($dataList->num_rows > 0){
                while ($row = $dataList->fetch_assoc()) {
                        $rows[] = $row;
                }
        }
        $this->view('resourceCtr/subjects',$rows); 
    }

    
}
?>