<?php

class RcResources extends Controller{
    
    private $user = "rc";

    public function __construct(){
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index(){
        $this->view('resourceCtr/resources/rc_videos');
    }

    public function videos($grade, $subject, $msg = null)
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findVideos($grade, $subject);
        $this->view('resourceCtr/resources/rc_videos', array($result, $msg));
    }

    public function quizzes($grade, $subject, $msg = null)
    {
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findQuizzes($grade, $subject);
        $this->view('resourceCtr/resources/rc_quizzes', array($result,$msg));
    }

    public function pastpapers($grade, $subject, $msg = null)
    {
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findPastpapers($grade, $subject);
        $this->view('resourceCtr/resources/rc_pastpapers', $result);
    }

    public function documents($grade, $subject, $msg = null)
    {
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $result = $this->model("resourceModel")->findDocuments($grade, $subject);
        $this->view('resourceCtr/resources/rc_documents', $result);
    }

    public function others($grade, $subject, $msg = null)
    {
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $result = $this->model("resourceModel")->findOthers($grade, $subject);
        $this->view('resourceCtr/resources/rc_others', $result);
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
                $this->view("resourceCtr/previews/doc_preview",$file);
                break;
            case 'other' :
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'other');
                $this->view("resourceCtr/previews/other_preview",$file);
                break;
            case 'video':
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'video');
                $resourceData = $this->model("resourceModel")->getVideo($id);
                if($resourceData[6] === "L")
                    $resourceData[4] = $this->filterVideoId($resourceData[4]);
                $this->view("resourceCtr/previews/video_preview",array($file,$resourceData));
                break;
            case 'pastpaper':
                // todo : under development
                break;
        }
    }

    public function settings($grade,$subject){
        $this->view('resourceCtr/resources/rc_settings');
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

    protected function approvedGenerator($approval){
        if($approval == 'N'){
            return "icon_not_approved.png";
        }
        elseif($approval == 'Y'){
            return "icon_approved.png";
        }
        else{
            return "icon_pending.png";
        }
    }

    protected function isCreatedBy($creator){
        if($creator == $_SESSION['id']){
            return true;
        }
        else{
            return false;
        }
    }



}
