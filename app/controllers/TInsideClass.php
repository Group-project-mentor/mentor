<?php

class TInsideClass extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        flashMessage();
        $this->userValidate($this->user);
    }


    public function addSt()
    {
        $this->view('Teacher/insideClass/addStudent');
    }


    public function addTr()
    {
        $this->view('Teacher/insideClass/addTeacher');
    }


    public function createAction()
    {
        $l_id = $_POST['student_id'];
        $premium = ($this->model("premiumModel")->getPremium($_SESSION['id']));
        if ($premium !== null and $premium !== 0) {
            $premium = $premium->active;
        } else {
            $premium = 0;
        }
        $STcount = ($this->model("teacher_data")->getduplicateSt($l_id, $_SESSION['id']));

        $STaccept = ($this->model("teacher_data")->getduplicateStJoined($l_id, $_SESSION['id'])->accept);
        var_dump($STaccept);
        $student_count = ($this->model("premiumModel")->studentCount($_SESSION['cid'])->student_count);
        $fee = ($this->model("teacher_data")->getFee($_SESSION['cid'])->fees);
        $currency = ($this->model("teacher_data")->getCurrency($_SESSION['cid'])->fees);
        $message = "Teacher " . $_SESSION['name'] . " has request to join to class " . $_SESSION['cname'] . ". Class fee is " . $currency . " " . $fee;
        if ($STaccept == 1 and $STcount >= 1) {
            flashMessage("already");
            header("location:" . BASEURL . "TInsideClass/addSt");
        } else if ($STcount >= 1  and $STaccept == 0) {
            echo 'called';
            flashMessage("duplicate");
            header("location:" . BASEURL . "TInsideClass/addSt");
        } else {
            if ($premium == 1) {
                if ($this->model('teacher_data')->requestStudentsClass($l_id) and $this->model('notificationModel')->notify($l_id, $message, 'tch')) {

                    flashMessage("success");
                    header("location:" . BASEURL . "TInsideClass/addSt");
                } else {
                    flashMessage("failed");
                    header("location:" . BASEURL . "TInsideClass/addSt");
                }
            } else if ($premium == 0 and $student_count < 10) {
                if ($this->model('teacher_data')->requestStudentsClass($l_id) and $this->model('notificationModel')->notify($l_id, $message, 'tch')) {

                    flashMessage("success");
                    header("location:" . BASEURL . "TInsideClass/addSt");
                } else {
                    flashMessage("failed");
                    header("location:" . BASEURL . "TInsideClass/addSt");
                }
            } else if ($premium == 0 and $student_count >= 10) {
                flashMessage("premiumLimited");
                header("location:" . BASEURL . "TInsideClass/addSt");
            }
        }
    }

    public function addTchAction($cid)
    {
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        $id2 = $_POST['teacher_name'];
        $id1 = $_POST['teacher_id'];
        $id3 = $_POST['teacher_privilege'];
        $message = "You have assigned as a Co-Teacher to class " . $_SESSION['cid'];
        $premium = ($this->model("premiumModel")->getPremium($_SESSION['id'])->active);
        $teacher_count = ($this->model("premiumModel")->teacherCount($_SESSION['cid'])->teacher_count);
        $teacherExist = ($this->model("teacher_data")->getduplicateTr($id1, $_SESSION['id'])->tcount);
        $Tname = ($this->model("teacher_data")->getCName($id1)->name);
        if ($Tname == $id2 and $id1 != 0) {
            if ($teacherExist >= 1) {
                flashMessage("already");
                header("location:" . BASEURL . "TInsideClass/inClass");
            } else if ($teacherExist == 0) {
                if ($premium == 1) {
                    if ($this->model('teacher_data')->addExtraTeachersClass($id1, $id2, $id3) and $this->model('notificationModel')->notify($id1, $message, $id3, 'tch')) {
                        flashMessage("success");
                        header("location:" . BASEURL . "TInsideClass/addTr");
                    } else {
                        flashMessage("failed");
                        header("location:" . BASEURL . "TInsideClass/addTr");
                    }
                } else if ($premium != 1 and $teacher_count < 2) {

                    if ($this->model('teacher_data')->addExtraTeachersClass($id1, $id2, $id3) and $this->model('notificationModel')->notify($id1, $message, $id3, 'tch')) {
                        flashMessage("success");
                        header("location:" . BASEURL . "TInsideClass/addTr");
                    } else {
                        flashMessage("failed");
                        header("location:" . BASEURL . "TInsideClass/addTr");
                    }
                } else if ($premium != 1 and $teacher_count >= 2) {
                    flashMessage("premiumLimited");
                }
                header("location:" . BASEURL . "TInsideClass/addTr");
            }
            header("location:" . BASEURL . "TInsideClass/addTr");
        } else {
            flashMessage("invalid");
            header("location:" . BASEURL . "TInsideClass/addTr");
        }
    }


    public function getStudentId()
    {
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        $res = $this->model('teacher_data')->getStudents($l_id);
        $this->view('Teacher/classMembers/membersDetails', array($res));
    }

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function getStudentSearch($search_query)
    {
        //Get search query from input field
        // $search_query = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        if ($search_query !== null && $search_query !== '') {
            $res = $this->model('classModel')->getMatchingNames($search_query);
            if ($res !== null && !empty($res)) {
                echo json_encode($res);
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function getTeacherSearch($search_query)
    {
        //Get search query from input field
        // $search_query = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        if ($search_query !== null && $search_query !== '') {
            $res = $this->model('classModel')->getMatchingTchNames($search_query);
            if ($res !== null && !empty($res)) {
                echo json_encode($res);
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function getStudentReportSearch($search_query)
    {
        //Get search query from input field
        // $search_query = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        if ($search_query !== null && $search_query !== '') {
            $res = $this->model('classModel')->getReportMatchingNames($search_query);
            if ($res !== null && !empty($res)) {
                echo json_encode($res);
            }
        } else {
            echo json_encode(array("status" => "error"));
        }
    }

    public function settings($cid)
    {
      
        $res = $this->model('classModel')->getToken($cid);
        $this->view('Teacher/classRoom/settings', array($res));
    }
}
