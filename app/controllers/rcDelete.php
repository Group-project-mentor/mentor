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
                header("location:" . BASEURL . "resources/documents/" . $_SESSION["gid"] . "/" . $_SESSION["sid"]);
            } else {
                header("location:" . BASEURL . "resources/documents/" . $_SESSION["gid"] . "/" . $_SESSION["sid"] . "/error");
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
                header("location:" . BASEURL . "resources/others/" . $_SESSION["gid"] . "/" . $_SESSION["sid"]);
            } else {
                header("location:" . BASEURL . "resources/others/" . $_SESSION["gid"] . "/" . $_SESSION["sid"] . "/error");
            }
        }
    }
}
