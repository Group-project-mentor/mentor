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
}


?>

