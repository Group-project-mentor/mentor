<?php

class ResourceModel extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    //* get all videos of (subject & grade)
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

    //* get most id from database
    public function getLastId()
    {
        // $sql = "select id from public_resource order by id desc limit 1";
        $result = $this->getData("public_resource", null, "id", "desc", 1);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            echo $row[0];
            return $row[0];
        } else {
            return 0;
        }
    }

    
    public function addDocument($id, $grade, $subject, $name, $file)
    {
        $sql = "insert into document values ($id ,'$name')";
        return ($this->addResource($id, $grade, $subject, $file,'pdf') && $this->executeQuery($sql));
    }

    public function addOther($id, $grade, $subject, $name, $file, $ext)
    {
        $sql = "insert into other values ($id ,'$name', '$ext')";
        return ($this->addResource($id, $grade, $subject, $file,'other') && $this->executeQuery($sql));
    }

    private function addResource($id, $grade, $subject, $file, $type)
    {
        $sql1 = "insert into public_resource values ($id ,'$type', '$file')";
        $sql2 = "insert into rs_subject_grade values ($id ,$subject ,$grade)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function deleteDoc($id){
        $res1 = $this->deleteData('rs_subject_grade',"rsrc_id = $id");
        $res2 = $this->deleteData('document', "id = $id");
        $res3 = $this->deleteData('public_resource',"id = $id");
        return ($res1 && $res2 && $res3);
    }

    public function getResource($id){
        $result =  $this->getData('public_resource',"id = $id");
        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return $result;
    }

    public function deleteResource($id,$table){
        $res1 = $this->deleteData('rs_subject_grade',"rsrc_id = $id");
        $res2 = $this->deleteData($table, "id = $id");
        $res3 = $this->deleteData('public_resource',"id = $id");
        return ($res1 && $res2 && $res3);
    }

}

?>