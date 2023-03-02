<?php

class st_public_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_videos($gid, $sid)
    {
        $q ="select video.id, video.name, video.lecturer from video, public_resource
        WHERE video.id = public_resource.id and public_resource.id
        IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=? and grade_id=?) and public_resource.type = 'video';";
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

