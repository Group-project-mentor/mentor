<?php

class RcAdd extends Controller
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

// these are for get upload data

    public function addVideo()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $this->getId();
            if ($this->model("resourceModel")->addVideo($Id, $_SESSION['gid'], $_SESSION['sid'], $_POST['title'], $_POST['lec'], $_POST['link'], $_POST['descr'])) {
                flashMessage("success");
            } else {
                flashMessage("error");
            }
            header("location:" . BASEURL . "rcAdd/video");
        }

    }

    public function addVideoUpload()
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

    public function addVideoUploadForm(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_SESSION['temporary_file'])){
                $Id = $this->getId();
                if ($this->model("resourceModel")->addVideo($Id, $_SESSION['gid'], $_SESSION['sid'], $_POST['title'], $_POST['lec'], $_SESSION['temporary_file'], $_POST['descr'],'U')) {
                    $new_path = "public_resources/videos/".$_SESSION['temporary_file'];
                    $temp_path = "public_resources/temp/".$_SESSION['temporary_file'];
                    if (file_exists($temp_path) and !file_exists($new_path)){
                        rename($temp_path,$new_path);
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

    public function addDocument($grade, $subject)
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
                    $newFileName = uniqid() . $_POST["title"] . "." . $extention;
                    $fileDest = "public_resources/documents/" . $newFileName;
                    if (!file_exists($fileDest)) {
                        move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
                        if ($this->model("resourceModel")->addDocument($nameId, $grade, $subject, $_POST["title"], $newFileName)) {
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

    public function addOther($grade, $subject)
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
                $newFileName = uniqid() . $_POST["title"] . "." . $extention;
                $fileDest = "public_resources/others/" . $newFileName;
                // var_dump($fileDest);
                if (!file_exists($fileDest)) {
                    move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
                    //    echo "Upload successful !";
                    if ($this->model("resourceModel")->addOther($nameId, $grade, $subject, $_POST["title"], $newFileName, $extention)) {
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

// get the most id from table
    private function getId()
    {
        $result = $this->model("resourceModel")->getLastId();
        return $result + 1;
    }
}
