<?php

class RcEdit extends Controller
{

    public function __construct()
    {
        sessionValidator();
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
                            header("location:" . BASEURL . "rcEdit/document/$id/success");
                        } else {
                            header("location:" . BASEURL . "rcEdit/document/$id/failed");
                        }

                    } else {
                        echo "Upload unsuccessful !";
                        header("location:" . BASEURL . "rcEdit/document/$id/failed");
                    }
                }
            } else {
                $oldFileName = $this->model("resourceModel")->getLocation($id);
                if ($this->model("resourceModel")->updateDocument($id, $_POST["title"], $oldFileName)) {
                    header("location:" . BASEURL . "rcEdit/document/$id/success");
                } else {
                    header("location:" . BASEURL . "rcEdit/document/$id/failed");
                }

            }
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
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if ($fileData["size"] > $maxFileSize) {
                    header("location:" . BASEURL . "rcAdd/document/error");
                }
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . $_POST['title'] . "." . $extention;
                $fileDest = "public_resources/others/" . $newFileName;
                $oldFileName = $this->model("resourceModel")->getLocation($id);

                if (!file_exists($fileDest) && file_exists("public_resources/others/" . $oldFileName)) {

                    move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
                    unlink("public_resources/others/" . $oldFileName);

                    if ($this->model("resourceModel")->updateOther($id, $_POST["title"], $newFileName, $extention)) {
                        header("location:" . BASEURL . "rcEdit/other/$id/success");
                    } else {
                        header("location:" . BASEURL . "rcEdit/other/$id/failed");
                    }
                } else {
                    echo "Upload unsuccessful !";
                    header("location:" . BASEURL . "rcEdit/other/$id/failed");
                }
                // }else{}
            } else {
                $oldFileName = $this->model("resourceModel")->getLocation($id);
                $extention = pathinfo($oldFileName, PATHINFO_EXTENSION);
                if ($this->model("resourceModel")->updateOther($id, $_POST["title"], $oldFileName, $extention)) {
                    header("location:" . BASEURL . "rcEdit/other/$id/success");
                } else {
                    header("location:" . BASEURL . "rcEdit/other/$id/failed");
                }
            }
        }

    }

}
