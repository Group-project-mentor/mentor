<?php

class TReport extends Controller
{
    private $user = "tch";

    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
    }


    public function generateReport()
    {
        unset($_SESSION['Rcategory']);
        unset($_SESSION['sid']);
        $this->view('Teacher/report/generateReport');
    }


    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function ReportRequest($cid, $id1, $id2)
    {
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        $cname = $this->model('TReportModel')->getCname($cid);
        //$id2 = $_POST['report_category'];
        // $id1 = $_POST['student_id'];
        $sid = $id1;
        switch ($id2) {
            case 1:
                $res = $this->model('TReportModel')->getAnalyse1($id1);
                $sname = $this->model('TReportModel')->getSName($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/report', array($res, $sid, $sname, $cname));
                break;
            case 2:
                $res = $this->model('TReportModel')->getAnalyse2($id1);
                $sname = $this->model('TReportModel')->getSName($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/report', array($res, $sid, $sname, $cname));
                break;
            case 3:
                $res = $this->model('TReportModel')->getAnalyse3($id1);
                $sname = $this->model('TReportModel')->getSName($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/report', array($res, $sid, $sname, $cname));
                break;
            case 4:
                $res = $this->model('TReportModel')->getAnalyse4($id1);
                $sname = $this->model('TReportModel')->getSName($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/report', array($res, $sid, $sname, $cname));
                break;
            default:
                header("location:" . BASEURL . "TReport/generateReport");
        }
    }

    public function AskFeedback($cid)
    {
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        $id2 = $_POST['report_category'];
        $id1 = $_POST['student_id'];

        if (isset($id1) && !empty($id1) && isset($id2) && !empty($id2)) {
            $_SESSION['Rcategory'] = $id2;
            $_SESSION['sid'] = $id1;
        }

        switch ($id2) {
            case 1:
                $res = $this->model('TReportModel')->getAnalyse1($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            case 2:
                $res = $this->model('TReportModel')->getAnalyse2($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            case 3:
                $res = $this->model('TReportModel')->getAnalyse3($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            case 4:
                $res = $this->model('TReportModel')->getAnalyse4($id1);
                $marks = [];
                foreach ($res as $row) {
                    $marks[$row->quiz_id] = $row->marks;
                }
                $this->view('Teacher/report/reportAskNote', array($res));
                break;
            default:
                header("location:" . BASEURL . "TReport/generateReport");
        }
    }

    public function uploadFeedback($message = null)
    {
        $data = array("$message", "document");
        $this->view("Teacher/report/uploadFeedback", $data);
    }


    public function addReport($cid, $sid) //!done
    {
        echo 'called';
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                $typeArray = array("pdf" => "application/pdf");
                $fileData = array(
                    "name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]
                );
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if (!array_key_exists($extention, $typeArray)) {
                    die("Error: Please select a valid file format.");
                }

                // if($fileData["size"] > $maxFileSize) die("Error: File size is larger than the allowed limit.");
                $nameId = $this->getId();
                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . $_POST["title"] . "." . $extention;
                    if (TsaveReport($_FILES["resource"]["tmp_name"], $newFileName, "documents", $_SESSION['cid'])) {
                        if ($this->model("TReportModel")->addFeedback($nameId, $_POST["title"], $cid, $sid, $newFileName, $_SESSION['id'])) {
                            flashMessage("success");
                            header("location:" . BASEURL . "TReport/studentReports" . "/" . $_SESSION['cid']);
                        } else {
                            flashMessage("error");
                            header("location:" . BASEURL . "TReport/uploadFeedback");
                        }
                    } else {
                        flashMessage("error");
                        header("location:" . BASEURL . "TReport/uploadFeedback");
                    }
                }
            } else {
                flashMessage("error");
                header("location:" . BASEURL . "TReport/uploadFeedback");
            }
        } else {
            flashMessage("error");
            header("location:" . BASEURL . "TReport/uploadFeedback");
        }
    }

    // get the most id from table
    private function getId()
    {
        $result = $this->model("TReportModel")->getLastId();
        return $result + 1;
    }

    public function studentReports($cid, $page = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["cid"] = $cid;
        $this->getClass($cid);
        $rowCount = $this->model("TReportModel")->getReportCount($cid)->count;
        $result = $this->model("TReportModel")->findReports($cid, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "TReport/studentReports/" . $cid);
        }
        $this->view('Teacher/report/studentReports', array($result, $pageData));
    }

    public function preview($id)
    {
        $file = $this->model("TReportModel")->getReport($id, $_SESSION['cid']);
        $this->view("Teacher/report/preview", $file);
    }

    public function edit($id, $msg = null)
    {

        $result = $this->model("TReportModel")->getREdit($id);
        $this->view("Teacher/report/edit", array($result, $msg));
    }

    public function editReport($id)
    {
        // $maxFileSize = 50*1024*1024;
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0) {
                $typeArray = array("pdf" => "application/pdf");
                $fileData = array(
                    "name" => $_FILES["resource"]["name"],
                    "type" => $_FILES["resource"]["type"],
                    "size" => $_FILES["resource"]["size"]
                );
                $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);
                if (!array_key_exists($extention, $typeArray)) {
                    die("Error: Please select a valid file format.");
                }

                // if($fileData["size"] > $maxFileSize) die("Error: File size is larger than the allowed limit.");
                if (in_array($fileData['type'], $typeArray)) {
                    // if(($fileData["name"]))
                    $newFileName = uniqid() . $_POST['title'] . "." . $extention;
                    //                    $fileDest = "public_resources/documents/" . $newFileName;
                    $oldFileName = $this->model("TReportModel")->getLocation($id);

                    if (TupdateReport($_FILES["resource"]["tmp_name"], $newFileName, $oldFileName, "documents", $_SESSION['cid'])) {

                        //                        move_uploaded_file($_FILES["resource"]["tmp_name"], $fileDest);
                        //                        unlink("public_resources/documents/" . $oldFileName);

                        if ($this->model("TReportModel")->updateReport($id, $_POST["title"], $newFileName)) {
                            flashMessage("success");
                        } else {
                            flashMessage("failed");
                        }
                    } else {
                        //                        echo "Upload unsuccessful !";
                        flashMessage("failed");
                    }
                }
            } else {
                $oldFileName = $this->model("TReportModel")->getLocation($id);
                if ($this->model("TReportModel")->updateReport($id, $_POST["title"], $oldFileName)) {
                    flashMessage("success");
                } else {
                    flashMessage("failed");
                }
            }
            header("location:" . BASEURL . "TReport/studentReports/{$_SESSION['cid']}");

        }
    }
}
