<?php
// this is use to set view of all public resources through this controller.

class St_private_resources extends Controller
{
    public function __construct()
    {
        sessionValidator();
    }

    // this is use to set view of all public resources through this controller.
    public function index($class_name)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        // $this->getNames($grade, $subject);
        $_SESSION["class_name"] = $class_name;
        
        $result = $this->model("St_private_resources_model")->findClassId($class_name);

        $_SESSION["class_id"] = $result->class_id;
        $this->view('student/enrollment_private/st_private_resources', array($result));
        
    }

    public function index_documents($class_name)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        // $this->getNames($grade, $subject);
        $_SESSION["class_name"] = $class_name;
        $result = $this->model("St_private_resources_model")->findDocuments();
        $this->view('student/enrollment_private/st_documents', array($result,$class_name));
    }

    public function index_others($class_name)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        // $this->getNames($grade, $subject);
        $_SESSION["class_name"] = $class_name;
        $result = $this->model("St_private_resources_model")->findOthers($class_name);
        $this->view('student/enrollment_private/st_other', array($result,$class_name));
    }

    public function index_quizzes($class_name)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        // $this->getNames($grade, $subject);
        $_SESSION["class_name"] = $class_name;
        $result = $this->model("St_private_resources_model")->findQuizzes($class_name);
        $this->view('student/enrollment_private/st_quizzes', array($result,$class_name));
    }

    public function st_quizzes_do($id)
    {
        $this->view("student/enrollment/st_quizzes_do", array($id));
    }

    public function st_quizzes_intro($id)
    {
        $this->view("student/enrollment/st_quizzes_intro", array($id));
    }

    public function index_past_papers($class_name)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        // $this->getNames($grade, $subject);
        $_SESSION["class_name"] = $class_name;
        $result = $this->model("St_private_resources_model")->findPastpapers($class_name);
        $this->view('student/enrollment_private/st_pastpapers', array($result,$class_name));
    }

    public function st_pastpaper_link_Quiz($id)
    {
        $file = $this->model("St_private_resources_model")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'paper');
        $this->view('student/enrollment/st_pastpaper_link_Quiz',$file);

    }

    public function index_videos($class_name)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        //$this->getNames($grade, $subject);
        $_SESSION["class_name"] = $class_name;
        
        $result = $this->model("St_private_resources_model")->findVideos($class_name);
        $this->view('student/enrollment_private/st_video', array($result,$class_name));
    }

    public function index_video_play()
    {
        $this->view('student/enrollment_private/st_video_play');
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

    public function preview($type, $id)
    {
        switch ($type) {
            case 'document':
                $file = $this->model("St_private_resources_model")->getResource($id, 'pdf');
                $this->view("student/enrollment_private/st_document_do", array($file));
                break;
            case 'others':
                $file = $this->model("St_private_resources_model")->getResource($id, 'other');
                $this->view("student/enrollment_private/st_other_do", array($file));
                break;
            case 'paper':
                $file = $this->model("St_private_resources_model")->getResource($id, 'paper');
                $this->view("student/enrollment_private/st_pastpaper_do", array($file));
                break;
            case 'video':
                $file = $this->model("St_private_resources_model")->getResource($id, 'video');

                $resourceData = $this->model("St_private_resources_model")->getVideo($id);
                //var_dump($resourceData);
                if ($resourceData->type === "L")
                    $resourceData->link = $this->filterVideoId($resourceData->link);
                $this->view("student/enrollment_private/st_video_play", array($file, $resourceData));
                break;
        }
    }

    private function filterVideoId($link){
        $splitted_link = explode('/',$link);
        if($splitted_link[2] == "youtu.be"){
            return "https://www.youtube.com/embed/".$splitted_link[3];
        }
        elseif($splitted_link[2] == "www.youtube.com"){
            $splitted_link = explode('=',$splitted_link[3]);
            return "https://www.youtube.com/embed/".$splitted_link[1];
        }
        else{
            return $link;
        }
        // var_dump($splitted_link);
    }
}
