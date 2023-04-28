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
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $this->getNames($grade, $subject);
        $rowCount = $this->model("resourceModel")->getResourceCount("video", $grade, $subject)->count;
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findVideos($grade, $subject, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {
            header("location:" . BASEURL . "rcResources/videos/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_videos', array($result, $pageData));
    }

    public function quizzes($grade, $subject)
    {
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $result = $this->model("resourceModel")->findQuizzes($grade, $subject);
        $this->view('resourceCtr/resources/rc_quizzes', array($result));
    }

    public function pastpapers($grade, $subject, $page = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $this->getNames($grade, $subject);
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $rowCount = $this->model("resourceModel")->getResourceCount("pastpaper", $grade, $subject)->count;
        $result = $this->model("resourceModel")->findPastpapers($grade, $subject, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "rcResources/pastpapers/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_pastpapers', array($result, $pageData));
    }

    public function documents($grade, $subject, $page = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $rowCount = $this->model("resourceModel")->getResourceCount("pdf", $grade, $subject)->count;
        $result = $this->model("resourceModel")->findDocuments($grade, $subject, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "rcResources/documents/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_documents', array($result, $pageData));
    }

    public function others($grade, $subject, $page = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["gid"] = $grade;
        $_SESSION["sid"] = $subject;
        $this->getNames($grade, $subject);
        $rowCount = $this->model("resourceModel")->getResourceCount("other", $grade, $subject)->count;
        $result = $this->model("resourceModel")->findOthers($grade, $subject, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "rcResources/others/" . $grade . "/" . $subject);
        }
        $this->view('resourceCtr/resources/rc_others', array($result, $pageData));
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
                $file = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'video');
                $resourceData = $this->model("resourceModel")->getVideo($id);
                if ($resourceData[6] === "L") {
                    $resourceData[4] = $this->filterVideoId($resourceData[4]);
                }

                $this->view("resourceCtr/previews/video_preview", array($file, $resourceData));
                break;
            case 'pastpaper':
                // todo : under development
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
        // $getOrganized = $this->model("resourceModel")->getOrganizedResources($grade_id, $subject_id);
        // $topicIDs = $this->model("resourceModel")->getTopicIDs($grade_id, $subject_id);
        $this->view('resourceCtr/resources/organized');
    }

}
