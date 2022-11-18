<?php

class ResourceModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function findVideos($grade, $subject)
    {
        $sql = "select video.id, video.name, video.lecturer from video, public_resource 
        WHERE video.id = public_resource.id and public_resource.id 
        IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=$subject and grade_id=$grade) and public_resource.type = 'video';";
        $result = $this->executeQuery($sql);
        return $result;

    }

    public function findQuizzes($grade, $subject)
    {
        $sql = "select quiz.id, quiz.name, quiz.questions from quiz, public_resource WHERE quiz.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'quiz'";
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function findPastpapers($grade, $subject)
    {
        $sql = "select pastpaper.id, pastpaper.name, pastpaper.year, pastpaper.part from pastpaper, public_resource WHERE pastpaper.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM rs_subject_grade WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'pastpaper'";
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function findDocuments($grade, $subject)
    {
        $sql = "select document.id, document.name from document, public_resource WHERE document.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM rs_subject_grade WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'pdf'";
        $result = $this->executeQuery($sql);
        return $result;
    }

    public function findOthers($grade, $subject)
    {
        $sql = "select other.id, other.name, other.type from other, public_resource WHERE other.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM rs_subject_grade WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'other'";
        $result = $this->executeQuery($sql);
        return $result;
    }
}
