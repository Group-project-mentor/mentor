<?php

class RcDelete extends Controller{

    public function __construct(){
        sessionValidator();
    }

    public function index()
    {
        header("location:" . BASEURL . "subjects");
    }

    public function document($id)
    {
        $row = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'pdf');
        if (!empty($row)) {
            $location = $row[2];
            $fileDest = "public_resources/documents/".$location;
            if ($this->model("resourceModel")->deleteResource($id,'document') == true) {
                unlink($fileDest);
                header("location:" . BASEURL . "rcResources/documents/" . $_SESSION["gid"] . "/" . $_SESSION["sid"]);
            } else {
                header("location:" . BASEURL . "rcResources/documents/" . $_SESSION["gid"] . "/" . $_SESSION["sid"] . "/error");
            }
        }
    }

    public function other($id)
    {
        $row = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'other');
        if (!empty($row)) {
            $location = $row[2];
            $fileDest = "public_resources/others/".$location;
            if ($this->model("resourceModel")->deleteResource($id,'other') == true) {
                unlink($fileDest);
                header("location:" . BASEURL . "rcResources/others/" . $_SESSION["gid"] . "/" . $_SESSION["sid"]);
            } else {
                header("location:" . BASEURL . "rcResources/others/" . $_SESSION["gid"] . "/" . $_SESSION["sid"] . "/error");
            }
        }
    }

    public function video($id)
    {
        $row = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'video');
        if (!empty($row)) {
            if ($this->model("resourceModel")->deleteResource($id,'video') == true) {
                header("location:" . BASEURL . "rcResources/videos/" . $_SESSION["gid"] . "/" . $_SESSION["sid"]);
            } else {
                header("location:" . BASEURL . "rcResources/videos/" . $_SESSION["gid"] . "/" . $_SESSION["sid"] . "/error");
            }
        }
    }
}
