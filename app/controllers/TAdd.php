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

    public function document($message = null)
    {
        $data = array("$message", "document");
        $this->view("Teacher/Tupload/Tupload_document", $data);
    }

    public function other($message = null)
    {
        $data = array("$message", "other");
        $this->view("Teacher/Tupload/Tupload_other", $data);
    }

    public function pastpaper($message = null){
        $data = array("$message", "pastpaper");
        $this->view("Teacher/Tupload/Tupload_pastpaper");
    }

    // these are for get upload data

    public function addVideo()
    {
        echo '!done';
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $Id = $this->getId();
            if ($this->model("TchResourceModel")->addVideo($Id, $_SESSION['cid'], $_POST['title'], $_POST['lec'], $_POST['link'], $_POST['descr'], $_SESSION['id'])) {
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
            $newFileName = uniqid() . $fileName;
            $fileDest = "private_resources/temp/" . $newFileName;
            if (move_uploaded_file($tmp_name, $fileDest)) {
                if (!empty($_SESSION['temporary_file'])) {
                    $path = "private_resources/temp/" . $_SESSION['temporary_file'];
                    if (file_exists($path)) {
                        unlink($path);
                    }
                }
                $_SESSION['temporary_file'] = $newFileName;
                $_SESSION['tempTag'] = true;
                echo 'UploadSuccess';
            } else {
                echo 'UploadError';
            }
        } else {
            echo 'FileNotExist';
        }
    }

    // get the most id from table
    private function getId()
    {
        $result = $this->model("TchResourceModel")->getLastId();
        return $result + 1;
    }

    public function addDocument($cid) //!done
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                $typeArray = array("pdf" => "application/pdf");
                $fileData = array(
                    "name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]
                );
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if (!array_key_exists($extention, $typeArray)) {
                    die("Error: Please select a valid file format.");
                }

                // if($fileData["size"] > $maxFileSize) die("Error: File size is larger than the allowed limit.");
                $nameId = $this->getId();
                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . $_POST["title"] . "." . $extention;
                    if (TsaveFile($_FILES["resource"]["tmp_name"], $newFileName, "documents", $_SESSION['cid'])) {
                        if ($this->model("TchResourceModel")->addDocument($nameId, $cid, $_POST["title"], $newFileName, $_SESSION['id'])) {
                            flashMessage("success");
                            header("location:" . BASEURL . "TResources/documents/" . $_SESSION['cid']);
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

    public function addOther($cid) //!done
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
                    header("location:" . BASEURL . "TAdd/other");
                }

                $nameId = $this->getId();
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . $_POST["title"] . "." . $extention;
                echo "called";
                if (TsaveFile($_FILES["resource"]["tmp_name"],$newFileName,"others",$_SESSION['cid'])) {
                    if ($this->model("TchResourceModel")->addOther($nameId, $cid, $_POST["title"], $newFileName, $extention,$_SESSION['id'])) {
                        flashMessage("success");
                        header("location:" . BASEURL . "TResources/others/" .$_SESSION['cid']);
                    }else {
                        flashMessage("error");
                        header("location:" . BASEURL . "TAdd/other");
                     
                } 
                // }
            } else {
                    echo "Upload unsuccessful !";
                    flashMessage("error");
                    header("location:" . BASEURL . "TAdd/other");
                }
            }else {
                flashMessage("error");
                header("location:" . BASEURL . "TAdd/other");
        } 
    } else {
            flashMessage("error");
            header("location:" . BASEURL . "TAdd/other");
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
                    header("location:" . BASEURL . "TAdd/pastpaper");
                }
                
                $nameId = $this->getId();
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . $_POST["name"] . "." . $extention;
                if (TsaveFile($_FILES["resource"]["tmp_name"],$newFileName,"pastpapers",$_SESSION['cid'])) {
                    if ($this->model("TchResourceModel")->addPastPaper($nameId,$_SESSION['cid'], $_POST["name"], $_POST["year"], $_POST["part"], $_POST["question"], $newFileName, $extention,$_SESSION['id'])) {
                        flashMessage("success");
                        header("location:" . BASEURL . "TResources/pastpapers/" . "/".$_SESSION['cid']);
                    } else {
                        flashMessage("error");
                        header("location:" . BASEURL . "TAdd/pastpaper");
                    }
                } else {
                    echo "Upload unsuccessful !";
                    flashMessage("error");
                    header("location:" . BASEURL . "TAdd/pastpaper");
                }
                // }
            } else {
                flashMessage("error");
                header("location:" . BASEURL . "TAdd/pastpaper");
            }
        } else {
            flashMessage("error");
            header("location:" . BASEURL . "TAdd/pastpaper");
        }
    }
}
