<?php
class TReportModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getAnalyse1($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 5 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'], $id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getAnalyse2($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 10 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'], $id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getAnalyse3($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 15 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'], $id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getAnalyse4($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 20 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'], $id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getSName($id1)
    {
        $stmt = $this->prepare("SELECT user.name as sname FROM user WHERE user.type = 'st' AND user.id = ?");
        $stmt->bind_param("i", $id1);
        return $this->fetchObjs($stmt);
    }
    public function getCname($id1)
    {
        $stmt = $this->prepare("SELECT private_class.class_name as cname FROM private_class WHERE private_class.class_id = ?");
        $stmt->bind_param("i", $id1);
        return $this->fetchObjs($stmt);
    }

    //? get the last resource id from table
    public function getLastId()
    {
        // $sql = "select id from public_resource order by id desc limit 1";
        $result = $this->getData("teacher_report", null, "id", "desc", 1);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            //            echo $row[0];
            return $row[0];
        } else {
            return 0;
        }
    }

    public function addFeedback($id, $name, $cid, $sid, $file, $tid) //!done
    {
        $sql = "insert into teacher_report values ($id ,'$name',$sid,$cid,'$file',$tid)";
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function findReports($cid, $offset, $limit)
    {
        $stmt = $this->prepare("SELECT teacher_report.id,teacher_report.name,teacher_report.student_id FROM teacher_report WHERE teacher_report.class_id=? LIMIT ?,?");
        $stmt->bind_param('iii', $cid, $offset, $limit);
        return $this->fetchObjs($stmt);
    }

    public function getReportCount($cid)
    {
        $stmt = $this->prepare("SELECT COUNT(teacher_report.id) AS count FROM teacher_report WHERE teacher_report.class_id=?");
        $stmt->bind_param('i', $cid);
        return $this->fetchOneObj($stmt);
    }

    public function getReport($id, $cid = null)
    {
        $stmt = $this->prepare('select teacher_report.id,teacher_report.location from teacher_report where teacher_report.id = ? 
        AND teacher_report.class_id =? ');
        $stmt->bind_param('ii', $id, $cid);
        return $this->fetchOneObj($stmt);
    }

    public function getREdit($id)
    { //!done
        $sql = "select teacher_report.id,teacher_report.name,teacher_report.student_id,teacher_report.class_id,teacher_report.location,teacher_report.teacher_id from 
        teacher_report where teacher_report.id = $id AND teacher_report.class_id  =" . $_SESSION['cid'];

        $result = $this->executeQuery($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_row();
        }
        return array();
    }

    public function getLocation($id)
    {
        $sql = "select teacher_report.location from teacher_report where id = $id";
        $result = $this->executeQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            return $row[0];
        }
        return null;
    }

    public function updateReport($id, $title, $file)
    {
        $sql1 = "UPDATE teacher_report SET location = '$file', name = '$title' WHERE id = $id";
        return $this->executeQuery($sql1);
    }
}
