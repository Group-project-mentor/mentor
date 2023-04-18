<?php

class TEdit extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function video($id, $msg = null)
    {
        $result = $this->model("TchResourceModel")->getVideo($id);
        if ($result[6] === "L")
            $this->view("Teacher/editViews/edit_video", array($result, $msg));
        elseif ($result[6] === "U")
            $this->view("Teacher/editViews/edit_video_2", array($result, $msg));
    }

    public function editVideo($id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if($_POST['title'] != "" and $_POST['lec'] != "" and $_POST['link'] != ""){
                if(!filter_var($_POST['link'],FILTER_VALIDATE_URL) === false){
                    if($this->model("TchResourceModel")->updateVideo($id, $_POST['title'], $_POST['lec'], $_POST['link'], $_POST['descr'])){
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
        header("location:".BASEURL."TEdit/video/$id");
    }

    public function editVideoUploaded($Id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            if(!empty($_SESSION['temporary_file'])){
                $oldFileName = $this->model("resourceModel")->getVideo($Id)[4];
//                unlink("public_resources/videos/$fileName");
                if ($this->model("TchResourceModel")->updateVideoUploaded($Id ,$_POST['title'], $_POST['lec'], $_POST['descr'],$_SESSION['temporary_file'])) {
//                    $new_path = "public_resources/videos/".$_SESSION['temporary_file'];
                    $temp_path = "public_resources/temp/".$_SESSION['temporary_file'];
                    if (updateFile($temp_path,$_SESSION['temporary_file'],$oldFileName,"videos",$_SESSION['gid'],$_SESSION['sid'])){
//                        rename($temp_path,$new_path);
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
            header("location:" . BASEURL . "TEdit/video/$Id");
        }
    }

    public function editVideoUpload()
    {
        if (isset($_FILES['resource']) && $_FILES['resource']['error'] === 0) {
            $fileName = $_FILES['resource']['name'];
            $tmp_name = $_FILES['resource']['tmp_name'];
//            $extension = pathinfo($fileName, PATHINFO_EXTENSION);
            $newFileName = uniqid().$fileName;
            $fileDest = "private_resources/temp/" . $newFileName ;
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
}
