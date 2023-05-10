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
            $result1 = $this->model("classModel")->getClassId($class_id)[0];
            $_SESSION["cid"] = $result1;
        }
    }

    public function deleteRequest($id, $cid)
    {
        if ($this->model("joinRequestsModel")->deleteRequest($id)) {
            flashMessage("delete_success");
            header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
        } else {
            flashMessage("delete_failed");
            header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
        }
    }

    public function acceptRequest($id, $cid, $sid)
    {
        $premium = ($this->model("premiumModel")->getPremium($_SESSION['id'])->active);
        $student_count = ($this->model("premiumModel")->studentCount($_SESSION['cid'])->student_count);
        if ($premium == 1) {
            if ($this->model('teacher_data')->addStudentsbyRequest($sid, $cid) and $this->model("joinRequestsModel")->markAccept($id)) {
                flashMessage("success");
                header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
            } else {
                flashMessage("failed");
                header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
            }
        } else if ($premium != 1 and $student_count < 10) {
            if ($this->model('teacher_data')->addStudentsbyRequest($sid, $cid) and $this->model("joinRequestsModel")->markAccept($id)) {
                flashMessage("success");
                header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
            } else {
                flashMessage("failed");
                header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
            }
        } else if ($premium != 1 and $student_count >= 10) {
            flashMessage("premiumLimited");
        }
        header("Location: " . BASEURL . "joinRequests/getRequests/" . $cid);
    }
}
