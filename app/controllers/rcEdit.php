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
        $result = $this->model("resourceModel")->getDocument($id);
        $this->view("resourceCtr/editViews/rc_edit_document", array($result, $msg));
    }

    public function other($id, $msg = null)
    {
        $result = $this->model("resourceModel")->getOther($id);
        $this->view("resourceCtr/editViews/rc_edit_other", array($result, $msg));
    }

    public function video($id, $msg = null)
    {
        $result = $this->model("resourceModel")->getVideo($id);
        $this->view("resourceCtr/editViews/rc_edit_video", array($result, $msg));
    }

    public function pastpaper($id)
    {
        $result = $this->model("resourceModel")->getpastPaper($id,$_SESSION['gid'],$_SESSION['sid']);
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
                    $newFileName = uniqid() . $_POST['title'] . "." . $extention;
                    $fileDest = "public_resources/documents/" . $newFileName;
                    $oldFileName = $this->model("resourceModel")->getLocation($id);

                    if (!file_exists($fileDest) && file_exists("public_resources/documents/" . $oldFileName)) {

                        move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
                        unlink("public_resources/documents/" . $oldFileName);

                        if ($this->model("resourceModel")->updateDocument($id, $_POST["title"], $newFileName)) {
                            flashMessage("success");
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
                if ($this->model("resourceModel")->updateDocument($id, $_POST["title"], $oldFileName)) {
                    flashMessage("success");
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
                    if($this->model("resourceModel")->updateVideo($id, $_POST['title'], $_POST['lec'], $_POST['link'], $_POST['descr'])){
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
                $newFileName = uniqid() . $_POST['title'] . "." . $extension;
                $fileDest = "public_resources/others/" . $newFileName;
                $oldFileName = $this->model("resourceModel")->getLocation($id);

                if (!file_exists($fileDest) && file_exists("public_resources/others/" . $oldFileName)) {

                    move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
                    unlink("public_resources/others/" . $oldFileName);

                    if ($this->model("resourceModel")->updateOther($id, $_POST["title"], $newFileName, $extension)) {
                        flashMessage("success");
//                        header("location:" . BASEURL . "rcEdit/other/$id/success");
                    } else {
                        flashMessage("failed");
//                        header("location:" . BASEURL . "rcEdit/other/$id/failed");
                    }
                } else {
                    echo "Upload unsuccessful !";
                    flashMessage("failed");
//                    header("location:" . BASEURL . "rcEdit/other/$id/failed");
                }
                // }else{}
            } else {
                $oldFileName = $this->model("resourceModel")->getLocation($id);
                $extension = pathinfo($oldFileName, PATHINFO_EXTENSION);
                if ($this->model("resourceModel")->updateOther($id, $_POST["title"], $oldFileName, $extension)) {
                    flashMessage("success");
//                    header("location:" . BASEURL . "rcEdit/other/$id/success");
                } else {
                    flashMessage("failed");
//                    header("location:" . BASEURL . "rcEdit/other/$id/failed");
                }
            }
        }
        header("location:" . BASEURL . "rcEdit/other/$id");
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


}
