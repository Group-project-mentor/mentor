<?php

class St_private_resources_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function findVideos($class_name, $grade)
    {
        $q ="SELECT private_class.class_name , private_class.grade , teacher_videos.name , teacher_videos.lecturer ,teacher_videos.description 
        FROM (( teacher_videos INNER JOIN teacher_class_resources ON teacher_videos.id = teacher_class_resources.rs_id ) 
        INNER JOIN private_class ON teacher_class_resources.class_id = private_class.class_id ) 
        WHERE private_class.class_name = ? AND private_class.grade = ?;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('si',$class_name,$grade);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findQuizzes($gid, $sid)
    {
        $q = "select quiz.id, quiz.name, quiz.marks from quiz, public_resource WHERE quiz.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=? and grade_id=?)
                and public_resource.type = 'quiz'";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$sid,$gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findPastpapers($gid, $sid)
    {
        $q = "SELECT pastpaper.id,pastpaper.name, pastpaper.year, pastpaper.part 
        FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id AND
         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?" ;
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$sid,$gid);
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findDocuments($gid, $sid) //!done
    {
        $q = "SELECT document.id,document.name,public_resource.approved,rs_subject_grade.creator_id 
        FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id AND
         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$sid,$gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findOthers($gid, $sid)
    {
        $q = "SELECT other.id, other.name, other.type,public_resource.approved,rs_subject_grade.creator_id 
        FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id AND
         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$sid,$gid);
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getResource($id, $gid=null, $sid=null, $type=null){
        $q = "select public_resource.id, public_resource.type, public_resource.location from public_resource 
        inner join rs_subject_grade on public_resource.id = rs_subject_grade.rsrc_id 
        where public_resource.id = ? and rs_subject_grade.subject_id =? and rs_subject_grade.grade_id =? and type =? ";

        $stmt = $this->prepare($q);
        $stmt->bind_param('iiis',$id,$sid,$gid,$type);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getVideo($id,$sid=null,$gid=null){
        $q = "select video.id, video.name, video.lecturer, video.description, video.link, 
                    video.thumbnail, video.type, public_resource.location ,public_resource.type AS Rtype
                    from video inner join rs_subject_grade on video.id = rs_subject_grade.rsrc_id 
                    inner join public_resource on public_resource.id = rs_subject_grade.rsrc_id 
                    where video.id = ? and rs_subject_grade.subject_id =?  
                    and rs_subject_grade.grade_id =?" ;

        $stmt = $this->prepare($q);
        $stmt->bind_param('iii',$id,$sid,$gid);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }
}

?>

