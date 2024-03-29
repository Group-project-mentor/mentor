<?php




class TPrivileges extends Controller{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    

    


    public function pMemberDetails($class_id,$class_name){
        
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getClassID($class_id);
        $_SESSION["cid"]=$class_id;
        $this->getClassName($class_id);
        $_SESSION["cname"] = $class_name;
        $res1 = $this->model('teacher_data')->getStudents($class_id);
        $res2 = $this->model('teacher_data')->getTeachers($class_id);
        $res3 = $this->model('teacher_data')->getHostTeacher($class_id);
       
        
        $privilege=($this->model("teacher_data")->getTPrivilege($_SESSION['id'], $class_id)->pid);
        
        if($privilege==1)
        {
            $this->view('Teacher/TPrivilege1/memberDetailsP1',array($res1,$res2,$res3));
        }
        elseif($privilege==2)
        {
            $this->view('Teacher/TPrivilege2/memberDetailsP2',array($res1,$res2,$res3));
        }
    }

    private function getClassID($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[0];
            $_SESSION["cid"] = $result1;
        }
    }

    private function getClassName($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function p1AddSt(){
        $this->view('Teacher/TPrivilege1/addStudentP1');
    }  

    public function p1CreateAction(){
        $cid=$_SESSION['cid'];
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        if($this->model('teacher_data')->addStudentsClass($l_id) ){
            
            header("Location: " . BASEURL . "TPrivileges/p1MemberDetails/" . $cid);

        }
        else{
            header("location:".BASEURL."TInsideClass/addSt");
        }

    }

 

    public function p2AddSt(){
        $this->view('Teacher/TPrivilege1/addStudentP1');
    }  

    public function p2CreateAction(){
        $cid=$_SESSION['cid'];
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        if($this->model('teacher_data')->addStudentsClass($l_id) ){
            
            header("Location: " . BASEURL . "TPrivileges/p2MemberDetails/" . $cid);

        }
        else{
            header("location:".BASEURL."TInsideClass/addSt");
        }

    }

    public function p2RmvSt($student_id,$class_id)
    {
       
            $this->model("teacher_data")->deleteSt($student_id,$class_id);
                header("location:" . BASEURL . "TClassMembers/memDetails/" . $_SESSION["cid"]);
            
        
    }

}
