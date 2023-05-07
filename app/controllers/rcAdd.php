<?php

class RcAdd extends Controller
{
    private $user = "rc";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
        $this->getNames($_SESSION['gid'], $_SESSION['sid']);
    }

    public function index()
    {
        header("location:" . BASEURL . "rcSubjects");
    }

// functions for render "upload each resource"
    public function other($message = null)
    {
        $data = array("$message", "other");
        $this->view("resourceCtr/uploadViews/rc_upload_other", $data);
    }

    public function document($message = null)
    {
        $data = array("$message", "document");
        $this->view("resourceCtr/uploadViews/rc_upload_document", $data);
    }

    public function video($message = null)
    {
        $data = array("$message", "video");
        $this->view("resourceCtr/uploadViews/rc_upload_video", $data);
    }

    public function videoUpload($message = null)
    {
        $data = array("$message", "video");
        $this->view("resourceCtr/uploadViews/rc_upload_video_2", $data);
    }

    public function pastpaper($message = null){
        $data = array("$message", "pastpaper");
        $this->view("resourceCtr/uploadViews/rc_upload_pastpaper");
    }


// these are for get upload data

    public function addVideo() //!done
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $this->getId();
            if ($this->model("resourceModel")->addVideo($Id, $_SESSION['gid'], $_SESSION['sid'], sanitizeText($_POST['title']), sanitizeText($_POST['lec']), $_POST['link'], sanitizeText($_POST['descr']), $_SESSION['id'])) {
                flashMessage("success");
            } else {
                flashMessage("error");
            }
            header("location:" . BASEURL . "rcAdd/video");
        }

    }

    public function addVideoUpload() //!done
    {
        if (isset($_FILES['resource']) && $_FILES['resource']['error'] === 0) {
            $fileName = $_FILES['resource']['name'];
            $tmp_name = $_FILES['resource']['tmp_name'];
            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid()."v".rand(10000,99999).".".$extension;
            $fileDest = "public_resources/temp/" . $newFileName;
            if (move_uploaded_file($tmp_name, $fileDest)) {
                if(!empty($_SESSION['temporary_file'])){
                    $path = "public_resources/temp/".$_SESSION['temporary_file'];
                    if (file_exists($path)){
                        unlink($path);
                    }
                }
                $_SESSION['temporary_file']= $newFileName;
                $_SESSION['tempTag'] = true;
                echo 'UploadSuccess';
            } else {
                echo 'UploadError';
            }
        }else{
            echo 'FileNotExist';
        }
    }

    public function addVideoUploadForm(){ //!done
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_SESSION['temporary_file'])){
                $Id = $this->getId();
                if ($this->model("resourceModel")->addVideo($Id, $_SESSION['gid'], $_SESSION['sid'], sanitizeText($_POST['title']), sanitizeText($_POST['lec']), $_SESSION['temporary_file'], sanitizeText($_POST['descr']),$_SESSION['id'],'U')) {
                    $temp_path = "public_resources/temp/".$_SESSION['temporary_file'];
                    if (file_exists($temp_path)){
                        saveFile($temp_path,$_SESSION['temporary_file'],"videos",$_SESSION['gid'],$_SESSION['sid']);
                        unset($_SESSION['temporary_file']);
                        flashMessage( "success");
                    }else{
                        flashMessage( "SavingError");
                    }
                } else {
                    flashMessage( "DatabaseError");
                }
            }else{
                flashMessage( "FileNotExist");
            }
            header("location:" . BASEURL . "rcAdd/video");
        }
    }

    public function addDocument($grade, $subject) //!done
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                $typeArray = array("pdf" => "application/pdf");
                $fileData = array("name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]);
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if (!array_key_exists($extention, $typeArray)) {
                    die("Error: Please select a valid file format.");
                }

                // if($fileData["size"] > $maxFileSize) die("Error: File size is larger than the allowed limit.");
                $nameId = $this->getId();
                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . sanitizeFileName($_POST["title"]) . "." . $extention;
                    if (saveFile($_FILES["resource"]["tmp_name"],$newFileName,"documents",$_SESSION['gid'],$_SESSION['sid'])) {
                        if ($this->model("resourceModel")->addDocument($nameId, $grade, $subject, sanitizeText($_POST["title"]), $newFileName,$_SESSION['id'])) {
                            flashMessage("success");
                            header("location:" . BASEURL . "rcResources/documents/" . $_SESSION['gid'] . "/".$_SESSION['sid']);
                        } else {
                            flashMessage("error");
                            header("location:" . BASEURL . "rcAdd/document");
                        }
                    } else {
                        flashMessage("error");
                        header("location:" . BASEURL . "rcAdd/document");
                    }
                }
            } else {
                flashMessage("error");
                header("location:" . BASEURL . "rcAdd/document");
            }
        } else {
            flashMessage("error");
            header("location:" . BASEURL . "rcAdd/document");
        }
    }

    public function addOther($grade, $subject) //!done
    {
        $maxFileSize = 50 * 1024 * 1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                // $typeArray = array("pdf"=>"application/pdf");
                $fileData = array("name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]);
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                // echo $extention=="pdf";
                // if(!array_key_exists($extention, $typeArray)) header("location:" . BASEURL . "add/document/error");
                if ($fileData["size"] > $maxFileSize) {
                    flashMessage("error");
                    header("location:" . BASEURL . "rcAdd/other");
                }

                $nameId = $this->getId();
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . sanitizeFileName($_POST["title"]) . "." . $extention;
                if (saveFile($_FILES["resource"]["tmp_name"],$newFileName,"others",$_SESSION['gid'],$_SESSION['sid'])) {
                    if ($this->model("resourceModel")->addOther($nameId, $grade, $subject, sanitizeText($_POST["title"]), $newFileName, $extention,$_SESSION['id'])) {
                        flashMessage("success");
                        header("location:" . BASEURL . "rcResources/others/" . $_SESSION['gid'] . "/".$_SESSION['sid']);
                    } else {
                        flashMessage("error");
                        header("location:" . BASEURL . "rcAdd/other");
                    }
                } else {
                    echo "Upload unsuccessful !";
                    flashMessage("error");
                    header("location:" . BASEURL . "rcAdd/other");
                }
                // }
            } else {
                flashMessage("error");
                header("location:" . BASEURL . "rcAdd/other");
            }
        } else {
            flashMessage("error");
            header("location:" . BASEURL . "rcAdd/other");
        }
    }

    public function addPastPaper(){ //!done
        $maxFileSize = 50 * 1024 * 1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                // $typeArray = array("pdf"=>"application/pdf");
                $fileData = array(
                    "name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]
                );
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                // echo $extention=="pdf";
                // if(!array_key_exists($extention, $typeArray)) header("location:" . BASEURL . "add/document/error");
                if ($fileData["size"] > $maxFileSize) {
                    flashMessage("error");
                    header("location:" . BASEURL . "rcAdd/pastpaper");
                }

                $ansStatus = false;
                $newAnsName = '';
                //? answer data
                if(isset($_FILES["answer"]) && $_FILES["answer"]["error"] == 0){
                    $answerData = array(
                        "name" => $_FILES["resource"]["name"],
                        "type" => $_FILES["resource"]["type"],
                        "size" => $_FILES["resource"]["size"]
                    );
                    $extentionAns = pathinfo($answerData["name"], PATHINFO_EXTENSION);
                    if ($answerData["size"] > $maxFileSize) {
                        flashMessage("error");
                        header("location:" . BASEURL . "rcAdd/pastpaper");
                    }
                    $newAnsName = uniqid().sanitizeFileName($_POST['name'])."." . $extention;
                    if(saveFile($_FILES["answer"]["tmp_name"], $newAnsName, "answers", $_SESSION['gid'], $_SESSION['sid'])){
                        $ansStatus = true;
                    }
                }

                $nameId = $this->getId();
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . $_POST["name"] . "." . $extention;
                if (saveFile($_FILES["resource"]["tmp_name"],$newFileName,"pastpapers",$_SESSION['gid'],$_SESSION['sid'])) {
                    if($ansStatus){
                        if ($this->model("resourceModel")->addPastPaperWithAns($nameId, $_SESSION['gid'], $_SESSION['sid'],sanitizeText($_POST["name"]), sanitizeText($_POST["year"]), sanitizeText($_POST["part"]), sanitizeText($_POST["question"]), $newFileName ,$_SESSION['id'], $newAnsName)) {
                            flashMessage("success");
                            header("location:" . BASEURL . "rcResources/pastpapers/" . $_SESSION['gid'] . "/".$_SESSION['sid']);
                        } else {
                            flashMessage("error");
                            header("location:" . BASEURL . "rcAdd/pastpaper");
                        }
                    }else{
                        if ($this->model("resourceModel")->addPastPaper($nameId, $_SESSION['gid'], $_SESSION['sid'], sanitizeText($_POST["name"]), sanitizeText($_POST["year"]), sanitizeText($_POST["part"]), sanitizeText($_POST["question"]), $newFileName,$_SESSION['id'])) {
                            flashMessage("success");
                            header("location:" . BASEURL . "rcResources/pastpapers/" . $_SESSION['gid'] . "/".$_SESSION['sid']);
                        } else {
                            flashMessage("error");
                            header("location:" . BASEURL . "rcAdd/pastpaper");
                        }
                    }

                } else {
                    echo "Upload unsuccessful !";
                    flashMessage("error");
                    header("location:" . BASEURL . "rcAdd/pastpaper");
                }
                // }
            } else {
                flashMessage("error");
                header("location:" . BASEURL . "rcAdd/pastpaper");
            }
        } else {
            flashMessage("error");
            header("location:" . BASEURL . "rcAdd/pastpaper");
        }
    }


// get the most id from table
    private function getId()
    {
        $result = $this->model("resourceModel")->getLastId();
        return $result + 1;
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

// * resource topic related functions

    public function newTopic($gid, $sid){
        $this->view("resourceCtr/organized/createTopic",array($gid,$sid));
    }

    public function createTopic(){
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            $this->model("resourceModel")->transaction();
            if($_POST["name"] != null and 0 < strlen($_POST["name"]) and strlen($_POST["name"])< 50 ){
                $res = $this->model("resourceModel")->addTopic(sanitizeText($_POST["name"]), sanitizeText($_POST["description"]),$_SESSION["gid"], $_SESSION['sid']);
                if($res){
                    $lastID = $this->model("resourceModel")->getLastTopicID()->id;
                    $topicOrderRow = $this->model("resourceModel")->getTopicOrder($_SESSION['gid'], $_SESSION['sid']);
                    $topicOrder = $topicOrderRow->tpcOrder;
                    if(!empty($topicOrderRow)){
                        if($topicOrder == "") $topicOrder = "$lastID";
                        else $topicOrder = $topicOrder.",".$lastID;
                        $this->model("resourceModel")->editTopicOrder($_SESSION['gid'], $_SESSION['sid'], $topicOrder);
                    }else{
                        $topicOrder = "$lastID";
                        $this->model("resourceModel")->addTopicOrder($_SESSION['gid'], $_SESSION['sid'], $topicOrder);
                    }
                    flashMessage("success");
                    $this->model("resourceModel")->commit();
                    header("location:".BASEURL."rcResources/organized/".$_SESSION['gid']."/".$_SESSION['sid']);
                }else{
                    $this->model("resourceModel")->rollBack();
                    flashMessage("failed");
                    header("location:".BASEURL."rcAdd/newTopic/".$_SESSION['gid']."/".$_SESSION['sid']);
                }
            }else{
                $this->model("resourceModel")->rollBack();
                flashMessage("failed");
                header("location:".BASEURL."rcAdd/newTopic/".$_SESSION['gid']."/".$_SESSION['sid']);
            }
        }else{
            flashMessage("failed");
            header("location:".BASEURL."rcAdd/newTopic/".$_SESSION['gid']."/".$_SESSION['sid']);
        }
    }

    public function toTopic($topic_id){
        if($this->isVerifiedTopic($topic_id)){
            $topic = $this->model("resourceModel")->getTopicDetails($topic_id);
            $resources = $this->model("resourceModel")->getResourcesTopicWise($topic_id);

            $videos = $this->model("resourceModel")->getResourceByType($_SESSION['gid'], $_SESSION['sid'],'video');
            $pdfs = $this->model("resourceModel")->getResourceByType($_SESSION['gid'], $_SESSION['sid'],'pdf');
            $others = $this->model("resourceModel")->getResourceByType($_SESSION['gid'], $_SESSION['sid'], 'other');
            $quizzes = $this->model("resourceModel")->getResourceByType($_SESSION['gid'], $_SESSION['sid'], 'quiz');
            $papers = $this->model("resourceModel")->getResourceByType($_SESSION['gid'], $_SESSION['sid'], 'paper');

            $resouceByType = array("videos" => $videos, "pdfs" => $pdfs, "others"=> $others, "quizzes"=> $quizzes, "papers" => $papers);
            $this->view("resourceCtr/organized/addResource",array($topic, $resources, $resouceByType));
        }else{
            flashMessage("failed");
            header("location:".BASEURL."rcResources/organized/".$_SESSION['gid']."/".$_SESSION['sid']);
        }
    }

    public function connectToTopic(){
        $message = array("status"=>"","message"=>"");
        if($this->model("resourceModel")->connectToTopic($_POST["topic"], $_POST["resource"])){
            $message["status"] = "success";
        }else{
            $message["message"] = "failed";
        }
        echo json_encode($message);
    }

    private function isVerifiedTopic($topic_id){
        $result = $this->model("resourceModel")->isVerifiedTopic($topic_id,$_SESSION['gid'],$_SESSION['sid']);
        if(empty($result)){
            return false;
        }
        else{
            return true;
        }
    }
}
