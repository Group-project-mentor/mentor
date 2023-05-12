<?php

class St_public_resources extends Controller
{
    public function __construct()
    {
        sessionValidator();
        flashMessage();
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

    public function st_quizzes_do($id, $question = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($question != 1) ? ($question - 1) * $limit : 0;
        $_SESSION['cid'] = $id;
        $sid = $_SESSION["sid"];
        $gid = $_SESSION["gid"];
        
        $res2= $this->model("st_public_resources_model")->UpdateQuizInDB($_SESSION['id'],$_SESSION['cid']);
        
        $rowCount = $this->model("st_public_resources_model")->getResourceCount("quiz", $gid, $sid)->count;
        $result = $this->model("st_public_resources_model")->findQuizzes($gid,$sid,$offset, $limit);
        $quiz = $this->model("st_quiz_model")->getQuiz($gid,$offset, $limit);

        $pageData = array($question, ceil($rowCount / $limit));
        if ($question < 1 || ($question > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "st_public_resources/st_quizzes_do/" . $id . "/" . $question);
        }
        $this->view("student/enrollment/st_quizzes_do", array($result,$quiz,$id));
    }

    public function st_quizzes_intro($id){

        $this->view("student/enrollment/st_quizzes_intro", array($id));
    }

    public function st_quizzes_do_end(){
        $res = $this->model("st_quiz_model")->getQuizendData($_SESSION['id'],$_SESSION['cid']);
        $this->view("student/enrollment/st_quizzes_do_end", array($res));
    }

    public function st_quizzes_do_end_preview(){
        flashMessage("QuizEnd");
        header("location:" . BASEURL . 'st_public_resources/index_quizzes/' . $_SESSION['gid'] . '/' .$_SESSION["sid"] );
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

    public function organized($grade_id, $subject_id)
    {
        $topics = $this->model("resourceModel")->getTopics($grade_id, $subject_id);
        $topicOrderRow = $this->model("resourceModel")->getTopicOrder($grade_id, $subject_id);
        $topicOrder = (!empty($topicOrderRow))?$topicOrderRow->tpcOrder:null;
        $this->getNames($grade_id, $subject_id);
        $_SESSION["gid"] = $grade_id;
        $_SESSION["sid"] = $subject_id;
        if(empty($topicOrderRow)){
            if(!empty($topics)){
                foreach ($topics as $topic) {
                    $topicIds = array();
                    foreach ($topics as $topic) {
                        $topicIds[] = $topic->id;
                    }
                    $topicOrder = implode(',', $topicIds);
                }
            }else{
                $topicOrder = "";
            }
        }elseif(empty($topicOrder) || $topicOrder == ""){
            $topicOrder = "";
        }
        $topicData = array();
        foreach ($topics as $topic) {
            $topicData[$topic->id] = $topic;
        }
        $this->view('student/enrollment/st_organized',array($topicData,$topicOrder));
    }

    public function getResourcesTopics(){
        $resourcesTopicWise = $this->model("resourceModel")->getResourcesWithTopics($_SESSION['gid'], $_SESSION['sid']);
        $organizedList = array();
        if(!empty($resourcesTopicWise)){
            foreach ($resourcesTopicWise as $topic) {
                $organizedList[$topic->t_id][] = $topic;
            }
        }
        header("Content-Type:Application/json");
        echo json_encode($organizedList);
    }

}
