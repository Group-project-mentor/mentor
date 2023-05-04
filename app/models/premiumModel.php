<?php
class premiumModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getPremium($id)
    {
        $q = "select premium.active_state as active from premium WHERE premium.teacher_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function teacherCount($id)
    {
        $q = "select count(classes_has_extra_teachers.teacher_id) as teacher_count from classes_has_extra_teachers where classes_has_extra_teachers.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function studentCount($id)
    {
        $q = "select count(classes_has_students.student_id) as student_count from classes_has_students where classes_has_students.class_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }

    public function classCount($id)
    {
        $q = "select count(teacher_has_class.class_id) as class_count from teacher_has_class where teacher_has_class.teacher_id=?";
        $result = $this->prepare($q);
        $result->bind_param('i', $id);
        return $this->fetchOneObj($result, true);
    }
}