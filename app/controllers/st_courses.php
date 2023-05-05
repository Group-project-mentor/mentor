<?php

class St_courses extends Controller
{

    public function __construct()
    {
        sessionValidator();
        $this->hasLogged();
        flashMessage();
    }

    public function index($gid)
    {
        $_SESSION['gid'] = $gid;
        // echo $_SESSION['gid'];
        $res = $this->model('st_courses_model')->getClasses($gid);
        $res2 = $this->model('st_courses_model')->getClasses2($gid, $_SESSION['id']);
        $this->view('student/enrollment/st_courses', array($res, $res2));
    }

    public function Enroll_subject_all($gid)
    {
        unset($_SESSION["gname"]);
        unset($_SESSION["sname"]);
        $res = $this->model('st_courses_model')->getClasses3($gid, $_SESSION['id']);
        $this->view('student/enrollment/st_enrolled_subject', array($res));
    }

    public function Enroll_subject_delete($grade, $subject)
    {
        $res = $this->model('st_courses_model')->getClasses5($grade,$subject);
        $this->notify($_SESSION['id'],"you Leave from the subject ","leave");
        flashMessage("Delete");
        header("location:" . BASEURL . 'st_courses/Enroll_subject_all/' . $_SESSION['gid'] );
    }

    public function Subject_to_Enroll_all($gid)
    {
        $res = $this->model('st_courses_model')->getClasses4($gid, $_SESSION['id']);
        $this->view('student/enrollment/st_subject_to_enroll', array($res));
    }

    public function Enroll_records($gid, $sid)
    {
        $result = $this->model('st_subject_to_enroll_model')->enroll_rec(2, $gid, $sid);
        if ($result) {
            header("location:" . BASEURL . "st_courses/index/$gid");
            $this->notify($_SESSION['id'],"you enroll to new subject ","enroll");
        } else { ?>
            <div style="padding: 15px 20px;">

                <a class="see-all-btn" href="<?php echo BASEURL . 'st_courses/Subject_to_Enroll_all/' . $_SESSION['gid']  ?>">
                    <button style="padding: 5px 10px;color: white; float:right ;border-radius: 10px;background-color: #186537; text-decoration: none;">Back</button>
                </a>
                <h2 style="color:green ; text-align:center ;padding: 5px 10px;">
                    <?php echo "You Already Enroll To This Subject"; ?>
                    <br>
                    <img src="<?php echo BASEURL  ?>assets/clips/issue.png" alt="">
                </h2>
            </div>
            

<?php
        }
    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
?>