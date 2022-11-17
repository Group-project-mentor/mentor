<?php 

class ResourceModel extends Model{

    public function __construct(){
        parent::__construct();
    }

    public function findVideos($grade, $subject){
        $sql = "select video.id, video.name, video.lecturer from video, public_resource WHERE video.id = public_resource.id and 
                public_resource.id = (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=$subject and grade_id=$grade) 
                and public_resource.type = 'video'";
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function findQuizzes($grade, $subject){
        $sql = "select quiz.id, quiz.name, quiz.questions from quiz, public_resource WHERE quiz.id = public_resource.id and 
                public_resource.id = (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=$subject and grade_id=$grade) 
                and public_resource.type = 'quiz'";
        $result = $this->executeQuery($sql);
        return $result;
    }
}

?>