<?php

class joinRequests extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }

    public function getRequests($cid)
    {
        $this->getClass($cid);
        $data = $this->model('joinRequestsModel')->getAllRequests($_SESSION['cid']);
        $this->view('Teacher/insideClass/joinRequests', array($data));
    }

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function deleteRequest($id, $cid)
    {
        $this->model("joinRequestsModel")->deleteRequest($id);
        header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
    }

    public function acceptRequest($id, $cid, $sid)
    {
        if ($this->model('teacher_data')->addStudentsbyRequest($sid,$cid) and $this->model("joinRequestsModel")->markAccept($id))
        {
            header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
        }
    }
}
