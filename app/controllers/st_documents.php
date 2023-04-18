<?php

class St_documents extends Controller
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
        $result = $this->model("st_public_model")->findDocuments($grade, $subject);
        $this->view('student/enrollment/st_documents', array($result));
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

    // public function st_document_do()
    // {
    //     $this->view('student/enrollment/st_document_do');

    // }

    public function preview($type, $id){
        switch ($type) {
            case 'document':
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'pdf');
                $this->view("student/enrollment/st_document_do",$file);
                break;
        }
    }
    

    public function st_documents_down( $id)
    {
        $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'pdf');
        $this->view('student/enrollment/st_documents_down',$file);

    }

    // private function hasLogged()
    // {
    //     if (!isset($_SESSION['user'])) {
    //         header("location:" . BASEURL . "login");
    //     }

    // }
}

?>



