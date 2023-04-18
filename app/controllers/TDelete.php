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
}