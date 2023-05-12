<?php

class RcResources extends Controller
{

    private $user = "rc";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function index()
    {
        $this->view('resourceCtr/resources/rc_videos');
    }

    public function videos($grade, $subject, $page = 1)
    {
        $filters = removeMainURL($_GET);
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $this->getNames($grade, $subject);
        $rowCount = $this->model("resourceModel")->getResourceCount("video", $grade, $subject,$filters, $_SESSION['id'])->count;
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findVideos($grade, $subject, $offset, $limit, $filters, $_SESSION['id']);
        $pageData = array($page, ceil($rowCount / $limit), $this->getFilterString($filters));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {
            header("location:" . BASEURL . "rcResources/videos/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_videos', array($result, $pageData));
    }

//    public function quizzes($grade, $subject)
//    {
//        $this->getNames($grade, $subject);
//        $_SESSION["gid"] = $grade;
//        $_SESSION["sid"] = $subject;
//        $result = $this->model("resourceModel")->findQuizzes($grade, $subject);
//        $res2 = $this->model("resourceModel")->findQuestionCounts($grade, $subject);
//        $questionCount = array();
//        foreach ($res2 as $item) $questionCount[$item->rsrc_id] = $item->count;
//
//        $this->view('resourceCtr/resources/rc_quizzes', array($result,$questionCount));
//    }

    public function quizzes($grade, $subject)
    {
        $filters = removeMainURL($_GET);
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->filterFindQuizes($grade, $subject, $filters, $_SESSION['id']);
        $res2 = $this->model("resourceModel")->findQuestionCounts($grade, $subject);
        $questionCount = array();
        foreach ($res2 as $item) $questionCount[$item->rsrc_id] = $item->count;

        $this->view('resourceCtr/resources/rc_quizzes', array($result,$questionCount));
    }

    public function pastpapers($grade, $subject, $page = 1, $f = null)
    {
        $filters = removeMainURL($_GET);
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $rowCount = $this->model("resourceModel")->getResourceCount("pastpaper", $grade, $subject, $filters, $_SESSION['id'])->count;
        $result = $this->model("resourceModel")->findPastpapers($grade, $subject, $offset, $limit, $filters, $_SESSION['id']);
        $pageData = array($page, ceil($rowCount / $limit), $this->getFilterString($filters));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "rcResources/pastpapers/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_pastpapers', array($result, $pageData));
    }

    public function documents($grade, $subject, $page = 1, $f = null)
    {
        $filters = removeMainURL($_GET);
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $rowCount = $this->model("resourceModel")->getResourceCount("pdf", $grade, $subject, $filters, $_SESSION['id'])->count;
        $result = $this->model("resourceModel")->findDocuments($grade, $subject, $offset, $limit, $filters, $_SESSION['id']);
        $pageData = array($page, ceil($rowCount / $limit), $this->getFilterString($filters));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "rcResources/documents/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_documents', array($result, $pageData));
    }

    public function others($grade, $subject, $page = 1, $f = null)
    {
        $filters = removeMainURL($_GET);
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $rowCount = $this->model("resourceModel")->getResourceCount("other", $grade, $subject, $filters, $_SESSION['id'])->count;
        $result = $this->model("resourceModel")->findOthers($grade, $subject, $offset, $limit, $filters, $_SESSION['id']);
        $pageData = array($page, ceil($rowCount / $limit), $this->getFilterString($filters));

        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {
            header("location:" . BASEURL . "rcResources/others/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_others', array($result, $pageData));
    }

    private function getFilterString($filters){
        if (!empty($filters))
            return $url_part = "?".http_build_query($filters);
        else
            return $url_part = "";
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
                $file = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'pdf');
                $this->view("resourceCtr/previews/doc_preview", $file);
                break;
            case 'other':
                $file = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'other');
                $this->view("resourceCtr/previews/other_preview", $file);
                break;
            case 'video':
                $related = $this->model("resourceModel")->getRandomVideos($_SESSION['gid'], $_SESSION['sid']);
                $file = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'video');
                $resourceData = $this->model("resourceModel")->getVideo($id);
                if ($resourceData[6] === "L") {
                    $resourceData[4] = $this->filterVideoId($resourceData[4]);
                }
                $this->view("resourceCtr/previews/video_preview", array($file, $resourceData, $related));
                break;
            case 'pastpaper':
                $file = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'paper');
                $resourceData = $this->model("resourceModel")->getPastpaper($id, $_SESSION['gid'], $_SESSION['sid']);
                $this->view("resourceCtr/previews/paper_preview", array($file, $resourceData));
                break;
        }
    }

    public function settings($grade, $subject)
    {
        $this->view('resourceCtr/resources/rc_settings');
    }

    private function filterVideoId($link)
    {
        $splitted_link = explode('/', $link);
        if ($splitted_link[2] == "youtu.be") {
            return "https://www.youtube.com/embed/" . $splitted_link[3];
        } elseif ($splitted_link[2] == "www.youtube.com") {
            $splitted_link = explode('=', $splitted_link[3]);
            return "https://www.youtube.com/embed/" . $splitted_link[1];
        } else {
            return $link;
        }
        // var_dump($splitted_link);
    }

    protected function approvedGenerator($approval)
    {
        if ($approval == 'N') {
            return "icon_not_approved.png";
        } elseif ($approval == 'Y') {
            return "icon_approved.png";
        } else {
            return "icon_pending.png";
        }
    }

    protected function isCreatedBy($creator)
    {
        if ($creator == $_SESSION['id']) {
            return true;
        } else {
            return false;
        }
    }

//    * Search Functions
    public function searchResource($type, $searchText)
    {
        $result = array();
        switch ($type) {
            case "videos":
                $result = $this->model("resourceModel")->searchVideos($_SESSION['gid'], $_SESSION['sid'], $searchText);
                break;
            case "quizzes":
                $result = $this->model("resourceModel")->searchQuizzes($_SESSION['gid'], $_SESSION['sid'], $searchText);
                break;
            case "documents":
                $result = $this->model("resourceModel")->searchDocuments($_SESSION['gid'], $_SESSION['sid'], $searchText);
                break;
            case "others":
                $result = $this->model("resourceModel")->searchOthers($_SESSION['gid'], $_SESSION['sid'], $searchText);
                break;
            case "pastpapers":
                $result = $this->model("resourceModel")->searchPastpapers($_SESSION['gid'], $_SESSION['sid'], $searchText);
                break;
        }
        header("Content-Type:Application/json");
        echo json_encode($result);
    }

    public function organized($grade_id, $subject_id)
    {
        $this->getNames($grade_id, $subject_id);
        $_SESSION["gid"] = $grade_id;
        $_SESSION["sid"] = $subject_id;
        $topics = $this->model("resourceModel")->getTopics($grade_id, $subject_id);
        $topicOrderRow = $this->model("resourceModel")->getTopicOrder($grade_id, $subject_id);
        $topicOrder = (!empty($topicOrderRow))?$topicOrderRow->tpcOrder:null;
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
            $this->model("resourceModel")->addTopicOrder($grade_id, $subject_id, $topicOrder);
        }elseif(empty($topicOrder) || $topicOrder == ""){
            $topicOrder = "";
        }
        $topicData = array();
        foreach ($topics as $topic) {
            $topicData[$topic->id] = $topic;
        }
        print_r($topicData);
        print_r($topicOrder);
        $this->view('resourceCtr/resources/organized',array($topicData,$topicOrder));
    }

    public function getResourcesTopics(){
        $resourcesTopicWise = $this->model("resourceModel")->getResourcesWithTopics($_SESSION['sid'], $_SESSION['gid']);
        $organizedList = array();
        if(!empty($resourcesTopicWise)){
            foreach ($resourcesTopicWise as $topic) {
                $organizedList[$topic->t_id][] = $topic;
            }
        }
        header("Content-Type:Application/json");
        echo json_encode($organizedList);
    }

    public function saveTopicOrder(){
        $topicOrder = $_POST['order'];
        $message = array("status"=>"");
        if($this->model("resourceModel")->editTopicOrder($_SESSION['gid'], $_SESSION['sid'], $topicOrder)){
            $message['status'] = "success";
        }else{
            $message['status'] = "failed";
        }
        echo json_encode($message);
    }



}
