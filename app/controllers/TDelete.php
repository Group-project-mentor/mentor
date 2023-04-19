<?php

class TDelete extends Controller
{

    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function video($id)
    {
        $row = $this->model("TchResourceModel")->getResource($id, $_SESSION['cid'], 'video');
        if (!empty($row)) {
//            if($row->id)
            if ($this->model("TchResourceModel")->deleteResource($id, 'video') == true) {
                header("location:" . BASEURL . "TResources/videos/" . $_SESSION["cid"] );
            } else {
                header("location:" . BASEURL . "TResources/videos/" . $_SESSION["cid"] . "/error");
            }
        }
    }

    public function document($id)
    {
        $row = $this->model("TchResourceModel")->getResource($id, $_SESSION['cid'], 'pdf');
        if (!empty($row)) {
            $location = $row->location;
//            $fileDest = "public_resources/documents/" . $location;
            if ($this->model("TchResourceModel")->deleteResource($id, 'document') == true) {
//                unlink($fileDest);
                TdeleteFile($location,"documents",$_SESSION['cid']);
                header("location:" . BASEURL . "TResources/documents/" .  $_SESSION["cid"]);
            } else {
                header("location:" . BASEURL . "TResources/documents/" .  $_SESSION["cid"] . "/error");
            }
        }
    }
}