<?php

class TInsideClass extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function addSt()
    {
        $this->view('Teacher/insideClass/addStudent');
    }


    public function addTr()
    {
        $this->view('Teacher/insideClass/addTeacher');
    }

    public function InClass()
    {
        $this->view('Teacher/insideClass/InsideClass');
    }


    public function createAction()
    {
        $l_id = $_POST['student_id'];
        var_dump($l_id);
        $premium = ($this->model("premiumModel")->getPremium($_SESSION['id'])->active);
        $student_count = ($this->model("premiumModel")->studentCount($_SESSION['cid'])->student_count);
        if ($premium == 1) {
            if ($this->model('teacher_data')->requestStudentsClass($l_id)) {

                header("location:" . BASEURL . "TInsideClass/inClass");
            } else {
                header("location:" . BASEURL . "TInsideClass/addSt");
            }
        } else if ($premium != 1 and $student_count < 10) {
            if ($this->model('teacher_data')->requestStudentsClass($l_id)) {

                header("location:" . BASEURL . "TInsideClass/inClass");
            } else {
                header("location:" . BASEURL . "TInsideClass/addSt");
            }
        } else if ($premium != 1 and $student_count >= 10) {
            flashMessage("Your add student limit for free account is over");
        }
        header("location:" . BASEURL . "TInsideClass/inClass");
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
        var_dump($id1, $id2, $id3);
        var_dump($premium, $teacher_count);
        if ($premium == 1) {
            if ($this->model('teacher_data')->addExtraTeachersClass($id1, $id2, $id3) and $this->model('notificationModel')->notify($id1, $message, $id3, 'tch')) {
                header("location:" . BASEURL . "TInsideClass/inClass");
            } else {
                header("location:" . BASEURL . "TInsideClass/addTr");
            }
        } else if ($premium != 1 and $teacher_count < 2) {
            if ($this->model('teacher_data')->addExtraTeachersClass($id1, $id2, $id3) and $this->model('notificationModel')->notify($id1, $message, $id3, 'tch')) {

                header("location:" . BASEURL . "TInsideClass/inClass");
            } else {
                header("location:" . BASEURL . "TInsideClass/addTr");
            }
        } else if ($premium != 1 and $teacher_count >= 2) {
            flashMessage("Your add teacher limit for free account is over");
        }
        header("location:" . BASEURL . "TInsideClass/addTr");
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
}
