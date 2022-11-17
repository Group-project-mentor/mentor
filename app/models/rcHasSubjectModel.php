<?php 

class RcHasSubjectModel extends Model{

    private $table = 'rc_has_subject';

    public function __construct(){
        parent::__construct();
    }

    public function getSubsGrades($id){

        $sql = "select  subject.id as sid, subject.name as sname, grade.id as gid, grade.name as gname FROM grade, subject_has_grade, subject
                WHERE grade.id = subject_has_grade.grade_id AND subject.id = subject_has_grade.subject_id AND
                subject_id IN (SELECT subject_id FROM `rc_has_subject` where rc_id = $id)";
        // $sql = "select * from resource_creator where rc_id = $id)";
        $result =  $this->executeQuery($sql);
        return $result;

    }

}

?>