<?php 

class RcHasSubjectModel extends Model{

    private $table = 'rc_has_subject';

    public function __construct(){
        parent::__construct();
    }

//    ? Find grades initially
    public function getSubsGrades($id){
        $stmt = $this->prepare("select  subject.id as sid, subject.name as sname, grade.id as gid, grade.name as gname FROM grade, subject_has_grade, subject
                WHERE grade.id = subject_has_grade.grade_id AND subject.id = subject_has_grade.subject_id AND
                subject_id IN (SELECT subject_id FROM `rc_has_subject` where rc_id = ?)");
        $stmt->bind_param('i',$id);
        return $this->fetchObjs($stmt);
    }

//    ? Find grades and subjects for filter inputs
    public function getSubjects($id){
        $stmt = $this->prepare("SELECT subject.id,subject.name FROM rc_has_subject,subject 
                               WHERE rc_has_subject.subject_id=subject.id AND rc_has_subject.rc_id = ?");
        $stmt->bind_param('i',$id);
        return $this->fetchObjs($stmt);
    }

    public function getGrades($id){
        $stmt = $this->prepare("SELECT DISTINCT(grade.id), grade.name FROM grade,subject_has_grade,rc_has_subject 
                                      WHERE rc_has_subject.subject_id = subject_has_grade.subject_id AND grade.id = subject_has_grade.grade_id 
                                        AND rc_has_subject.rc_id = ?");
        $stmt->bind_param('i',$id);
        return $this->fetchObjs($stmt);
    }

//    ? Filtering Functions
    public function getGradeSubjectFiltered($rcid, $gid = 0, $sid = 0)
    {
        if($gid!=0 and $sid!=0){
            $stmt = $this->prepare("select  subject.id as sid, subject.name as sname, grade.id as gid, grade.name as gname FROM grade, subject_has_grade, subject
                WHERE grade.id = subject_has_grade.grade_id AND subject.id = subject_has_grade.subject_id AND
                subject_id IN (SELECT subject_id FROM `rc_has_subject` where rc_id = ?) AND grade.id = ? AND subject.id = ?");
            $stmt->bind_param('iii',$rcid,$gid,$sid);
        }elseif ($gid!=0){
            $stmt = $this->prepare("select  subject.id as sid, subject.name as sname, grade.id as gid, grade.name as gname FROM grade, subject_has_grade, subject
                WHERE grade.id = subject_has_grade.grade_id AND subject.id = subject_has_grade.subject_id AND
                subject_id IN (SELECT subject_id FROM `rc_has_subject` where rc_id = ?) AND grade.id = ?");
            $stmt->bind_param('ii',$rcid,$gid);
        }elseif($sid!=0){
            $stmt = $this->prepare("select  subject.id as sid, subject.name as sname, grade.id as gid, grade.name as gname FROM grade, subject_has_grade, subject
                WHERE grade.id = subject_has_grade.grade_id AND subject.id = subject_has_grade.subject_id AND
                subject_id IN (SELECT subject_id FROM `rc_has_subject` where rc_id = ?) AND subject.id = ?");
            $stmt->bind_param('ii',$rcid,$sid);
        }else{
            return $this->getSubsGrades($rcid);
        }
        return $this->fetchObjs($stmt);
    }

//    ? Searching Functions -> No need of searching
    public function searchGradeSubjects($rcid, $grade, $subject){
        $grade = "%$grade%";
        $subject = "%$subject%";
        $stmt = $this->prepare("select  subject.id as sid, subject.name as sname, grade.id as gid, grade.name as gname FROM grade, subject_has_grade, subject
                WHERE grade.id = subject_has_grade.grade_id AND subject.id = subject_has_grade.subject_id AND
                subject_id IN (SELECT subject_id FROM `rc_has_subject` where rc_id = ?) AND grade.name LIKE ? OR subject.name LIKE ?");
        $stmt->bind_param("iss",$rcid,$grade,$subject);
        return $this->fetchObjs($stmt);
    }
}

