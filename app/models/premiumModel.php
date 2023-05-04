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
}