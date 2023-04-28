<?php

class St_public_resources extends Controller
{
    public function __construct()
    {
        sessionValidator();
    }

    // this is use to set view of all public resources through this controller.
    public function index($grade, $subject, $name = null)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->view('student/enrollment/st_public_resources', array($grade, $subject));
        
    }

    public function index_documents($grade, $subject)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("st_public_resources_model")->findDocuments($grade, $subject);
        $this->view('student/enrollment/st_documents', array($result));
    }

    public function index_others($grade, $subject)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("st_public_resources_model")->findOthers($grade, $subject);
        $this->view('student/enrollment/st_other', array($result));
    }

    public function index_quizzes($grade, $subject)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("st_public_resources_model")->findQuizzes($grade, $subject);
        $_SESSION["quiz"] = $result;
        $this->view('student/enrollment/st_quizzes', array($result));
    }

    public function st_quizzes_do($id)
    {
        $sid = $_SESSION["sid"];
        //echo $id;
        $result = $this->model("st_public_resources_model")->findQuizzes($id,$sid);
        $quiz = $this->model("st_quiz_model")->getQuiz($id);
        $this->view("student/enrollment/st_quizzes_do", array($result,$quiz,$id));
    }

    public function st_quizzes_intro($id,$qname)
    {
        $_SESSION['qname'] = $qname;
        $this->view("student/enrollment/st_quizzes_intro", array($id));
    }

    public function index_past_papers($grade, $subject)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("st_public_resources_model")->findPastpapers($grade, $subject);
        $this->view('student/enrollment/st_pastpapers', array($result));
    }

    public function st_pastpaper_link_Quiz($id)
    {
        $file = $this->model("st_public_resources_model")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'paper');
        $this->view('student/enrollment/st_pastpaper_link_Quiz',$file);

    }

    public function index_videos($grade, $subject)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("st_public_resources_model")->findVideos($grade, $subject);
        $this->view('student/enrollment/st_video', array($result));
    }

    public function index_video_play()
    {
        $this->view('student/enrollment/st_video_play');
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
                $file = $this->model("st_public_resources_model")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'pdf');
                $this->view("student/enrollment/st_document_do", $file);
                break;
            case 'others':
                $file = $this->model("st_public_resources_model")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'other');
                $this->view("student/enrollment/st_other_do", $file);
                break;
            case 'paper':
                $file = $this->model("st_public_resources_model")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'paper');
                $this->view("student/enrollment/st_pastpaper_do", $file);
                break;
            case 'video':
                $file = $this->model("st_public_resources_model")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'video');

                $resourceData = $this->model("st_public_resources_model")->getVideo($id, $_SESSION['sid'], $_SESSION['gid']);
                //var_dump($resourceData);
                if ($resourceData->type === "L")
                    $resourceData->link = $this->filterVideoId($resourceData->link);
                $this->view("student/enrollment/st_video_play", array($file, $resourceData));
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
