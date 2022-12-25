<?php

class subject_to_enroll extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $res=$this->model('subject_to_enroll_model')->getClasses();
        $this->view('student/enrollment/subject_to_enroll',$res);

    }

    public function enroll_records($gid, $sid)
    {
        $result = $this->model('subject_to_enroll_model')->enroll_rec(5,$gid,$sid);
        if($result)
        {
            header("location:" . BASEURL . "st_courses");
        }
        else
        { ?>
            <div style="padding: 15px 20px;">
                <!-- <button style="padding: 5px 10px;color: white; float:right ;border-radius: 10px;background-color: #186537;">Back</button> -->
                <h2 style="color:green ; text-align:center ;padding: 5px 10px;">
                    <?php echo "You Already Enroll To This Subject" ; ?>
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



