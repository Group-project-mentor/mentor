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
        if($result[6] === "L")
            $this->view("resourceCtr/editViews/rc_edit_video", array($result, $msg));
        elseif ($result[6] === "U")
            $this->view("resourceCtr/editViews/rc_edit_video_2", array($result, $msg));
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














    public function editVideoUploaded($Id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_SESSION['temporary_file'])){
                $fileName = $this->model("resourceModel")->getVideo($Id)[4];
                unlink("public_resources/videos/$fileName");
                if ($this->model("resourceModel")->updateVideoUploaded($Id ,$_POST['title'], $_POST['lec'], $_POST['descr'],$_SESSION['temporary_file'])) {
                    $new_path = "public_resources/videos/".$_SESSION['temporary_file'];
                    $temp_path = "public_resources/temp/".$_SESSION['temporary_file'];
                    if (file_exists($temp_path) and !file_exists($new_path)){
                        rename($temp_path,$new_path);
                        unset($_SESSION['temporary_file']);
                        flashMessage("success");
                    }else{
                        flashMessage("SavingError");
                    }
                } else {
                    flashMessage( "DatabaseError");
                }
            }else{
                if ($this->model("resourceModel")->updateVideoUploaded($Id ,$_POST['title'], $_POST['lec'], $_POST['descr'])) {
                    flashMessage( "success");
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
            $newFileName = uniqid().$fileName;
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
