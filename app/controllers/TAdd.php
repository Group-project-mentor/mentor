<?php

class TAdd extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
        $this->getClass($_SESSION['cid']);
    }

    public function index()
    {
        header("location:" . BASEURL . "TClassRoom/allHostClasses");
    }

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    // functions for render "upload each resource"


    public function video($message = null)
    {
        $data = array("$message", "video");
        $this->view("Teacher/Tupload/TUpload_videos", $data);
    }

    public function videoUpload($message = null)
    {
        $data = array("$message", "video");
        $this->view("Teacher/Tupload/TUpload_videos_2", $data);
    }

    // these are for get upload data

    public function addVideo() 
    {
        echo '!done';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $this->getId();
            if ($this->model("TchResourceModel")->addVideo($Id, $_SESSION['cid'], $_POST['title'], $_POST['lec'], $_POST['link'], $_POST['descr'],$_SESSION['id'])) {
                flashMessage("success");
            } else {
                flashMessage("error");
            }
            header("location:" . BASEURL . "TAdd/video");
        }

    }

    public function addVideoUpload() //!done
    {
        if (isset($_FILES['resource']) && $_FILES['resource']['error'] === 0) {
            $fileName = $_FILES['resource']['name'];
            $tmp_name = $_FILES['resource']['tmp_name'];
//            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid().$fileName;
            $fileDest = "private_resources/temp/" . $newFileName;
            if (move_uploaded_file($tmp_name, $fileDest)) {
                if(!empty($_SESSION['temporary_file'])){
                    $path = "private_resources/temp/".$_SESSION['temporary_file'];
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

    // get the most id from table
    private function getId()
    {
        $result = $this->model("TchResourceModel")->getLastId();
        return $result + 1;
    }

}