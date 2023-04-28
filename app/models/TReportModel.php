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
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'],$id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getAnalyse2($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 10 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'],$id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getAnalyse3($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 15 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'],$id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }

    public function getAnalyse4($id1)
    {
        $stmt = $this->prepare("SELECT Distinct sm.quiz_id, sm.marks, u.id, u.name FROM ( SELECT quiz_id FROM student_marks WHERE student_id = ? AND class_id = ? ORDER BY quiz_id DESC LIMIT 20 ) AS recent_quizzes INNER JOIN student_marks AS sm ON recent_quizzes.quiz_id = sm.quiz_id INNER JOIN classes_has_students AS chs ON sm.student_id = chs.student_id INNER JOIN
         user AS u ON chs.student_id = u.id WHERE u.type = 'st' AND u.id=? AND sm.class_id=?;");
        $stmt->bind_param("iiii", $id1,  $_SESSION['cid'],$id1,  $_SESSION['cid']);
        return $this->fetchObjs($stmt);
    }
}