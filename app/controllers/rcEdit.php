<?php

class RcEdit extends Controller
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

    }

//? For excecute resource editing views
    public function document($id, $msg = null)
    {
        if($this->isVerifiedOperation($id)) {
            $result = $this->model("resourceModel")->getDocument($id);
            $this->view("resourceCtr/editViews/rc_edit_document", array($result, $msg));
        }else{
            $this->view("resourceCtr/editViews/rc_edit_document", array(null, $msg));
        }
    }

    public function other($id, $msg = null)
    {
        if($this->isVerifiedOperation($id)) {
            $result = $this->model("resourceModel")->getOther($id);
            $this->view("resourceCtr/editViews/rc_edit_other", array($result, $msg));
        }else{
            $this->view("resourceCtr/editViews/rc_edit_other", array(null, $msg));
        }
    }

    public function video($id, $msg = null)
    {
        if($this->isVerifiedOperation($id)) {
            $result = $this->model("resourceModel")->getVideo($id);
            if ($result[6] === "L")
                $this->view("resourceCtr/editViews/rc_edit_video", array($result, $msg));
            elseif ($result[6] === "U")
                $this->view("resourceCtr/editViews/rc_edit_video_2", array($result, $msg));
        }else{
            $this->view("resourceCtr/editViews/rc_edit_video", array(null, $msg));
        }
    }

    public function pastpaper($id)
    {
        if($this->isVerifiedOperation($id)){
            $result = $this->model("resourceModel")->getpastPaper($id,$_SESSION['gid'],$_SESSION['sid']);
        }else{
            $result = null;
        }
        $this->view("resourceCtr/editViews/rc_edit_pastPaper", array($result));
    }

//? Action functions of editing views
    // this is for update document
    public function editDocument($id)
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
                if (in_array($fileData['type'], $typeArray)) {
                    // if(($fileData["name"]))
                    $newFileName = uniqid() . sanitizeFileName($_POST['title']) . "." . $extention;
//                    $fileDest = "public_resources/documents/" . $newFileName;
                    $oldFileName = $this->model("resourceModel")->getLocation($id);

                    if (updateFile($_FILES["resource"]["tmp_name"],$newFileName,$oldFileName,"documents",$_SESSION['gid'],$_SESSION['sid'])) {

//                        move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
//                        unlink("public_resources/documents/" . $oldFileName);

                        if ($this->model("resourceModel")->updateDocument($id, sanitizeText($_POST["title"]), $newFileName)) {
                            flashMessage("success");
                            header("location:" . BASEURL . "rcResources/documents/".$_SESSION['gid']."/".$_SESSION['sid']);
                            return true;
                        } else {
                            flashMessage("failed");
                        }

                    } else {
//                        echo "Upload unsuccessful !";
                        flashMessage("failed");
                    }
                }
            } else {
                $oldFileName = $this->model("resourceModel")->getLocation($id);
                if ($this->model("resourceModel")->updateDocument($id, sanitizeText($_POST["title"]), $oldFileName)) {
                    flashMessage("success");
                    header("location:" . BASEURL . "rcResources/documents/".$_SESSION['gid']."/".$_SESSION['sid']);
                    return true;
                } else {
                    flashMessage("failed");
                }
            }
            header("location:" . BASEURL . "rcEdit/document/$id");
        }
    }

    public function editVideo($id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['title'] != "" and $_POST['lec'] != "" and $_POST['link'] != ""){
                if(!filter_var($_POST['link'],FILTER_VALIDATE_URL) === false){
                    if($this->model("resourceModel")->updateVideo($id, sanitizeText($_POST['title']), sanitizeText($_POST['lec']), $_POST['link'], sanitizeText($_POST['descr']))){
                        flashMessage("success");
//                        header("location:". BASEURL . "rcResources/videos/".$_SESSION['gid']."/".$_SESSION['sid']);
                    }else{
                        flashMessage("update_err");
                    }
                }else{
                    flashMessage("url_err");
                }
            }else{
                flashMessage("empty_err");
            }
        }
        header("location:".BASEURL."rcEdit/video/$id");
    }

    public function editVideoUploaded($Id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_SESSION['temporary_file'])){
                $oldFileName = $this->model("resourceModel")->getVideo($Id)[4];
//                unlink("public_resources/videos/$fileName");
                if ($this->model("resourceModel")->updateVideoUploaded($Id ,sanitizeText($_POST['title']), sanitizeText($_POST['lec']), sanitizeText($_POST['descr']),$_SESSION['temporary_file'])) {
//                    $new_path = "public_resources/videos/".$_SESSION['temporary_file'];
                    $temp_path = "public_resources/temp/".$_SESSION['temporary_file'];
                    if (updateFile($temp_path,$_SESSION['temporary_file'],$oldFileName,"videos",$_SESSION['gid'],$_SESSION['sid'])){
//                        rename($temp_path,$new_path);
                        unset($_SESSION['temporary_file']);
                        flashMessage("success");
                        header("location:" . BASEURL . "rcResources/videos/".$_SESSION['gid']."/".$_SESSION['sid']);
                        return true;
                    }else{
                        flashMessage("SavingError");
                    }
                } else {
                    flashMessage( "DatabaseError");
                }
            }else{
                if ($this->model("resourceModel")->updateVideoUploaded($Id ,sanitizeText($_POST['title']), sanitizeText($_POST['lec']), sanitizeText($_POST['descr']))) {
                    flashMessage( "success");
                    header("location:" . BASEURL . "rcResources/videos/".$_SESSION['gid']."/".$_SESSION['sid']);
                    return true;
                }else{
                    flashMessage( "SavingError");
                }
            }
            header("location:" . BASEURL . "rcEdit/video/$Id");
        }
    }

    public function editVideoUpload()
    {
        if (isset($_FILES['resource']) && $_FILES['resource']['error'] === 0) {
            $fileName = $_FILES['resource']['name'];
            $tmp_name = $_FILES['resource']['tmp_name'];
//            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid().sanitizeFileName($fileName);
            $fileDest = "public_resources/temp/" . $newFileName ;
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

    // this is for update other resource
    public function editOther($id)
    {
        $maxFileSize = 50 * 1024 * 1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                $fileData = array("name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]);
                $extension = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if ($fileData["size"] > $maxFileSize) {
                    header("location:" . BASEURL . "rcAdd/document/error");
                }
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . sanitizeFileName($_POST['title']) . "." . $extension;
//                $fileDest = "public_resources/others/" . $newFileName;
                $oldFileName = $this->model("resourceModel")->getLocation($id);

                if (updateFile($_FILES["resource"]["tmp_name"],$newFileName,$oldFileName,"others",$_SESSION['gid'],$_SESSION['sid'])) {

//                    move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
//                    unlink("public_resources/others/" . $oldFileName);

                    if ($this->model("resourceModel")->updateOther($id, sanitizeText($_POST["title"]), $newFileName, $extension)) {
                        flashMessage("success");
                        header("location:" . BASEURL . "rcResources/others/".$_SESSION['gid']."/".$_SESSION['sid']);
                        return true;
                    } else {
                        flashMessage("failed");
                    }
                } else {
                    echo "Upload unsuccessful !";
                    flashMessage("failed");
                }
                // }else{}
            } else {
                $oldFileName = $this->model("resourceModel")->getLocation($id);
                $extension = pathinfo($oldFileName, PATHINFO_EXTENSION);
                if ($this->model("resourceModel")->updateOther($id, sanitizeText($_POST["title"]), $oldFileName, $extension)) {
                    flashMessage("success");
                    header("location:" . BASEURL . "rcResources/others/".$_SESSION['gid']."/".$_SESSION['sid']);
                    return true;
                } else {
                    flashMessage("failed");
                }
            }
        }
        header("location:" . BASEURL . "rcEdit/other/$id");
    }

    public function editPastpaper($id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["paper"]) && $_FILES["paper"]["error"] == 0) {
                $typeArray = array("pdf" => "application/pdf");
                $fileData = array("name" => $_FILES["paper"]["name"],
                    "type" => $_FILES["paper"]["type"],
                    "size" => $_FILES["paper"]["size"]);
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                // if (!array_key_exists($extention, $typeArray)) {
                //     die("Error: Please select a valid file format.");
                // }
                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . sanitizeFileName($_POST['title']) . "." . $extention;
                    $oldFileName = $this->model("resourceModel")->getLocation($id);

                    if (updateFile($_FILES["paper"]["tmp_name"],$newFileName,$oldFileName,"pastpapers",$_SESSION['gid'],$_SESSION['sid'])) {

                        if ($this->model("resourceModel")->updatePaper($id, sanitizeText($_POST["title"]), sanitizeText($_POST['year']), sanitizeText($_POST['part']), $newFileName)) {
                            flashMessage("success");
                            header("location:" . BASEURL . "rcResources/pastpapers/".$_SESSION['gid']."/".$_SESSION['sid']);
                            return true;
                        } else {
                            flashMessage("failed");
                        }

                    } else {
                        flashMessage("failed");
                    }
                }else{
                    flashMessage("failed");
                }
            } else {
                $oldFileName = $this->model("resourceModel")->getLocation($id);
                if ($this->model("resourceModel")->updatePaper($id, sanitizeText($_POST["title"]), sanitizeText($_POST['year']), sanitizeText($_POST['part']), $oldFileName)) {
                    flashMessage("success");
                    header("location:" . BASEURL . "rcResources/pastpapers/".$_SESSION['gid']."/".$_SESSION['sid']);
                    return true;
                } else {
                    flashMessage("failed");
                }
            }
            header("location:" . BASEURL . "rcEdit/pastpaper/$id");
        }
    }

    public function editPastpaperAnswer($id){
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["answer"]) && $_FILES["answer"]["error"] == 0) {
                $typeArray = array("pdf" => "application/pdf");
                $fileData = array("name" => $_FILES["answer"]["name"],
                    "type" => $_FILES["answer"]["type"],
                    "size" => $_FILES["answer"]["size"]);
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if (!array_key_exists($extention, $typeArray)) {
                    flashMessage("failed");
                    header("location:" . BASEURL . "rcEdit/document/$id");
                }

                // if($fileData["size"] > $maxFileSize) die("Error: File size is larger than the allowed limit.");
                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . nFirstChars(explode('.',sanitizeFileName($fileData["name"]))[0],10) . "." . $extention;
                    $oldFileName = $this->model("resourceModel")->getPastPaper($id, $_SESSION['gid'], $_SESSION['sid'])->answer;
                    if (updateFile($_FILES["answer"]["tmp_name"],$newFileName,$oldFileName,"answers",$_SESSION['gid'],$_SESSION['sid'])) {
                        if ($this->model("resourceModel")->updatePastpaperAnswer($id, $newFileName)) {
                            flashMessage("success");
                        } else {
                            flashMessage("failed");
                        }
                    } else {
                        flashMessage("failed");
                    }
                }
            } else {
                flashMessage("failed");
            }
            header("location:" . BASEURL . "rcEdit/pastpaper/$id");
        }
    }

    public function getQuizListInfo(){
        $result = $this->model("resourceModel")->getAllQuizIds($_SESSION['gid'],$_SESSION['sid']);
        header("Content-Type:Application/json");
        echo json_encode($result);
    }

    public function changePPQuiz($ppid){
        $res = $this->model("resourceModel")->changeQuizId($ppid,$_POST['quiz_id']);
        if ($res){
            echo "Done";
        }else{
            echo "Error";
        }
    }

    public function getSpecificQuizInfo($qid){
        $result = $this->model('resourceModel')->getSpecificQuiz($qid);
        header("Content-Type:Application/json");
        echo json_encode($result);
    }

    public function pastPaperUnlinkQuiz($ppid){
        $result = $this->model('resourceModel')->unlinkQuiz($ppid);
        if ($result){
            flashMessage("unlinked");
        }else{
            flashMessage("failed");
        }
        header("location:".BASEURL."rcEdit/pastpaper/$ppid");
    }

    private function isVerifiedOperation($res_id){
        $result = $this->model("resourceModel")->isVerifiedAccess($res_id,$_SESSION['gid'],$_SESSION['sid'],$_SESSION['id']);
        if(empty($result)){
            return false;
        }
        else{
            return true;
        }
    }

    // ? topic edit functions

    public function topic($id){
        if ($this->isVerifiedTopic($id)){
            $result = $this->model("resourceModel")->getTopicDetails($id);
            $this->view("resourceCtr/organized/editTopic",array($result));
        }else{
            flashMessage("failed");
            header("location:".BASEURL."rcResources/organized/".$_SESSION['gid']."/".$_SESSION['sid']);
        }
    }

    public function updateTopic($topic_id){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if (isset($_POST['name']) && !empty($_POST['name'])){
                if ($this->model("resourceModel")->editTopic($topic_id,sanitizeText($_POST['name']),sanitizeText($_POST['description']))){
                    flashMessage("success");
                    header("location:".BASEURL."rcResources/organized/".$_SESSION['gid']."/".$_SESSION['sid']);
                }else{
                    flashMessage("failed");
                    header("location:".BASEURL."rcEdit/updateTopic/$topic_id");
                }
            }else{
                flashMessage("failed");
                header("location:".BASEURL."rcEdit/updateTopic/$topic_id");
            }
        }
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
