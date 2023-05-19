<?php
class Teacher_data extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getClasses($id)
    {

        $q = "select private_class.class_id as cid, private_class.class_name as cname from private_class inner join
         teacher_has_class on teacher_has_class.class_id = private_class.class_id where teacher_has_class.teacher_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchObjs($result);
    }

    public function addClass($id, $name, $currency, $fees)
    {
        $password = bin2hex(random_bytes(16)); // Generate a random password
        $hash = password_hash($password, PASSWORD_BCRYPT, ["cost" => 10]); // Generate hash value
        $q = "INSERT INTO private_class (class_id,class_name,currency,fees,token) VALUES (" . $id . ",'" . $name . "','" . $currency . "','" . $fees . "','" . $hash . "')";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function getLastClassID()
    {
        $query = "select class_id from private_class order by class_id desc limit 1";
        $result = $this->executeQuery($query)->fetch_row();
        if (!empty($result)) {
            return ++$result[0];
        } else {
            return 1;
        }
    }

    public function getfee($id)
    {
        $q = "SELECT private_class.fees as fees from private_class WHERE private_class.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result);
    }

    public function getCurrency($id)
    {
        $q = "SELECT private_class.currency as fees from private_class WHERE private_class.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result);
    }

    public function getCName($id)
    {
        $q = "SELECT user.name as name from user WHERE user.id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result);
    }

    public function teacherHasClass($id)
    {
        $q = "INSERT INTO teacher_has_class (teacher_id,class_id,host_teacher_id) VALUES (" . $_SESSION['id'] . "," . $id . ",1)";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function getStudents($id)
    {

        $q = "select user.id,user.name from user inner join classes_has_students on user.id=classes_has_students.student_id where user.type='st' and 
        classes_has_students.accept=1 AND classes_has_students.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchObjs($result);
    }

    public function requestStudentsClass($id)
    {
        $q = "INSERT INTO classes_has_students(class_id,student_id) VALUES (" . $_SESSION['cid'] . "," . $id . ")";
        $result = $this->executeQuery($q);
        return $result;
    }

    public function addStudentsbyRequest($sid, $cid)
    {
        $stmt = $this->prepare("INSERT INTO classes_has_students(class_id,student_id) VALUES (?,?)");
        $stmt->bind_param("ii", $cid, $sid);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function deleteSt($student_id, $class_id)
    {

        $q = "delete from classes_has_students where student_id=? and class_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('ii', $student_id, $class_id);
        return $result->execute();
    }

    public function addExtraTeachersClass($id1, $id2, $id3)
    {
        $stmt = $this->prepare("INSERT INTO classes_has_extra_teachers(class_id,teacher_id,teacher_name,teacher_privilege) VALUES (?, ?,?,?)");
        $stmt->bind_param("iiss", $_SESSION['cid'], $id1, $id2, $id3);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    public function getTeachers($id)
    {

        $q = "select user.id,user.name from user inner join classes_has_extra_teachers on user.id=classes_has_extra_teachers.teacher_id where user.type='tch' and classes_has_extra_teachers.class_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchObjs($result);
    }

    public function deleteTch($teacher_id, $class_id)
    {

        $q = "delete from classes_has_extra_teachers where teacher_id=? and class_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('ii', $teacher_id, $class_id);
        return $result->execute();
    }

    public function getHostTeacher($id)
    {

        $q = "select user.id,user.name from user inner join teacher_has_class on user.id=teacher_has_class.teacher_id where user.type='tch' and teacher_has_class.class_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchObjs($result);
    }

    public function getCoordinateClasses($id)
    {

        $q = "select private_class.class_id as cid, private_class.class_name as cname from private_class inner join
         classes_has_extra_teachers on classes_has_extra_teachers.class_id = private_class.class_id where classes_has_extra_teachers.teacher_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchObjs($result);
    }

    public function getTPrivilege($id1, $id2)
    {
        $q = "select classes_has_extra_teachers.teacher_privilege as pid from classes_has_extra_teachers where classes_has_extra_teachers.teacher_id=? and classes_has_extra_teachers.class_id=?; ";
        $result = $this->prepare($q);
        $result->bind_param('ii', $id1, $id2);
        return $this->fetchOneObj($result, true);
    }

    public function getduplicateSt($id1, $id2)
    {
        $q = "SELECT COUNT(classes_has_students.student_id) as scount FROM classes_has_students WHERE classes_has_students.student_id = ? AND classes_has_students.class_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('ii', $id1, $id2);
        return $this->fetchOneObj($result, true);
    }

    public function getduplicateStJoined($id1, $id2)
    {
        $q = "SELECT classes_has_students.accept as accept FROM classes_has_students WHERE classes_has_students.student_id = ? AND classes_has_students.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('ii', $id1, $id2);
        return $this->fetchOneObj($result, true);
    }

    public function getduplicateTr($id1, $id2)
    {
        $q = "SELECT COUNT(classes_has_extra_teachers.teacher_id) as tcount FROM classes_has_extra_teachers WHERE classes_has_extra_teachers.teacher_id = ? AND classes_has_extra_teachers.class_id=? ";
        $result = $this->prepare($q);
        $result->bind_param('ii', $id1, $id2);
        return $this->fetchOneObj($result, true);
    }
}
