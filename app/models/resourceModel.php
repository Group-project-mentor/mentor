<?php

//* this model is for access resource related tables in database
class ResourceModel extends Model 
{
    public function __construct()
    {
        parent::__construct();
    }

//? get all resource data from combination of (subject & grade)
    public function findVideos($grade, $subject)
    {
        $sql = "select video.id, video.name, video.lecturer from video, public_resource
        WHERE video.id = public_resource.id and public_resource.id
        IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=$subject and grade_id=$grade) and public_resource.type = 'video';";
        return $this->executeQuery($sql);

    }

    public function findQuizzes($grade, $subject)
    {
        $sql = "select quiz.id, quiz.name, quiz.marks from quiz, public_resource WHERE quiz.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'quiz'";
        return $this->executeQuery($sql);
    }

    public function findPastpapers($grade, $subject)
    {
        $sql = "select pastpaper.id, pastpaper.name, pastpaper.year, pastpaper.part from pastpaper, public_resource WHERE pastpaper.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM rs_subject_grade WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'pastp'";
        return $this->executeQuery($sql);
    }

    public function findDocuments($grade, $subject)
    {
        $sql = "select document.id, document.name from document, public_resource WHERE document.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM rs_subject_grade WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'pdf'";
        return $this->executeQuery($sql);
    }

    public function findOthers($grade, $subject)
    {
        $sql = "select other.id, other.name, other.type from other, public_resource WHERE other.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM rs_subject_grade WHERE subject_id=$subject and grade_id=$grade)
                and public_resource.type = 'other'";
        return $this->executeQuery($sql);
    }

//? get the last resource id from table
    public function getLastId()
    {
        // $sql = "select id from public_resource order by id desc limit 1";
        $result = $this->getData("public_resource", null, "id", "desc", 1);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
//            echo $row[0];
            return $row[0];
        } else {
            return 0;
        }
    }


//? Functions for add a resource 

    public function addVideo($id, $grade, $subject, $name, $lec, $link, $descr,$type = 'L'){
        $sql = "insert into video(id, name, lecturer, description, link, type) values ($id, '$name', '$lec', '$descr', '$link','$type')";
        return ($this->addResource($id, $grade, $subject, null , 'video') && $this->executeQuery($sql));
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
        if(empty($file)){
            $sql1 = "insert into public_resource(id, type) values ($id ,'$type')";
        }
        $sql2 = "insert into rs_subject_grade values ($id ,$subject ,$grade)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

//? get reaource for preview => document | other
    public function getResource($id, $gid=null, $sid=null, $type=null){
        $sql = "select public_resource.id, public_resource.type, public_resource.location from public_resource 
        inner join rs_subject_grade on public_resource.id = rs_subject_grade.rsrc_id 
        where public_resource.id = $id and rs_subject_grade.subject_id =$sid and rs_subject_grade.grade_id =$gid and type = '$type'";
        $result =  $this->executeQuery($sql);
        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return array();
    }



//? Functions for delete resource
    public function deleteDoc($id){
        $res1 = $this->deleteData('rs_subject_grade',"rsrc_id = $id");
        $res2 = $this->deleteData('document', "id = $id");
        $res3 = $this->deleteData('public_resource',"id = $id");
        return ($res1 && $res2 && $res3);
    }
    
    public function deleteResource($id,$table){
        $res1 = $this->deleteData('rs_subject_grade',"rsrc_id = $id");
        $res2 = $this->deleteData($table, "id = $id");
        $res3 = $this->deleteData('public_resource',"id = $id");
        if($table == 'quiz'){
            return ($res1 && $res2 && $res3 && $this->deleteQuiz($id));    
        }
        return ($res1 && $res2 && $res3);
    }

    private function deleteQuiz($id){
        $stmt1 = $this->prepare('DELETE FROM question WHERE quiz_id = ? ');
        $stmt2 = $this->prepare('DELETE FROM answer WHERE answer.question_id IN 
                    (SELECT id FROM question WHERE question.quiz_id = ?)');
        $stmt1->bind_param('i',$id);
        $stmt2->bind_param('i', $id);
        return ($stmt1->execute() and $stmt2->execute());
    }


//? Functions for find specific resource
    public function getDocument($id){
        $sql = "select document.id, document.name, public_resource.location, public_resource.type 
                    from document inner join rs_subject_grade on document.id = rs_subject_grade.rsrc_id 
                    inner join public_resource on public_resource.id = rs_subject_grade.rsrc_id 
                    where document.id = $id and rs_subject_grade.subject_id =".$_SESSION['sid']." 
                                            and rs_subject_grade.grade_id =".$_SESSION['gid'];

        $result = $this->executeQuery($sql);

        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return array(); 
    }

    public function getOther($id){
        $sql = "select other.id, other.name, public_resource.location, public_resource.type 
                    from other inner join rs_subject_grade on other.id = rs_subject_grade.rsrc_id 
                    inner join public_resource on public_resource.id = rs_subject_grade.rsrc_id 
                    where other.id = $id and rs_subject_grade.subject_id =".$_SESSION['sid']." 
                                            and rs_subject_grade.grade_id =".$_SESSION['gid'];

        $result = $this->executeQuery($sql);

        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return array(); 
    }

    public function getVideo($id){
        $sql = "select video.id, video.name, video.lecturer, video.description, video.link, 
                    video.thumbnail, video.type, public_resource.location ,public_resource.type
                    from video inner join rs_subject_grade on video.id = rs_subject_grade.rsrc_id 
                    inner join public_resource on public_resource.id = rs_subject_grade.rsrc_id 
                    where video.id = $id and rs_subject_grade.subject_id =".$_SESSION['sid']." 
                                            and rs_subject_grade.grade_id =".$_SESSION['gid'];

        $result = $this->executeQuery($sql);
        
        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return array(); 
    }

    public function getPastPaper($id, $gid, $sid){
        $sql = "select pastpaper.id, pastpaper.name, pastpaper.year, pastpaper.part, pastpaper.qid, public_resource.type, public_resource.location 
                    from pastpaper inner join rs_subject_grade on pastpaper.id = rs_subject_grade.rsrc_id 
                    inner join public_resource on public_resource.id = rs_subject_grade.rsrc_id 
                    where pastpaper.id = ? and rs_subject_grade.subject_id = ?
                    and rs_subject_grade.grade_id = ?";
        $stmt = $this->prepare($sql);
        $stmt->bind_param('iii',$id,$sid,$gid);
        return $this->fetchOneObj($stmt);
    }


//? Functions for update/edit resource
    public function updateDocument($id, $title, $file){
        $sql1 = "update public_resource set public_resource.location = '$file' where public_resource.id = $id";
        $sql2 = "update document set document.name = '$title' where document.id = $id";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function updateOther($id, $title, $file, $type){
        $sql1 = "update public_resource set public_resource.location = '$file' where public_resource.id = $id";
        $sql2 = "update other set other.name = '$title', other.type = '$type' where other.id = $id";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function updateVideo($id, $title, $lec, $link, $description){
        $sql = "update video set video.name = '$title', video.lecturer = '$lec', video.description = '$description', video.link='$link' where video.id = $id";
        return ($this->executeQuery($sql));
    }


//? get the saved filename of a specific resource
    public function getLocation($id){
        $sql = "select public_resource.location from public_resource where id = $id";
        $result = $this->executeQuery($sql);
        if($result->num_rows > 0){
            $row = $result->fetch_row();
            return $row[0];
        }
        return null;
    }

    public function getAllQuizIds($gid, $sid){
        $stmt = $this->prepare("SELECT rsrc_id,quiz.name FROM rs_subject_grade, public_resource, quiz 
                                     WHERE rs_subject_grade.grade_id = ? AND rs_subject_grade.subject_id = ? AND 
                                           public_resource.type = 'quiz' AND rs_subject_grade.rsrc_id = public_resource.id AND 
                                           public_resource.id = quiz.id");
        $stmt->bind_param('ii',$gid, $sid);
        return $this->fetchAll($stmt);
    }

    public function changeQuizId($ppid, $qid){
        $stmt = $this->prepare("UPDATE pastpaper SET pastpaper.qid = ? WHERE pastpaper.id = ?;");
        $stmt->bind_param('ii',$qid,$ppid);
        return $this->executePrepared($stmt);
    }

    public function getSpecificQuiz($qid){
        $stmt = $this->prepare("SELECT * FROM quiz WHERE id = ? ");
        $stmt->bind_param('i',$qid);
        return $this->fetchOneObj($stmt);
    }

    public function unlinkQuiz($ppid){
        $stmt = $this->prepare("UPDATE pastpaper SET pastpaper.qid=NULL WHERE id = ? ");
        $stmt->bind_param("i",$ppid);
        return $this->executePrepared($stmt);
    }

    public function updateVideoUploaded($id, $title, $lecture, $description, $fileName=null){
        if(!empty($fileName)) {
            $stmt = $this->prepare("UPDATE video SET video.name=? , video.lecturer=? , video.description=? , video.link=? WHERE video.id=?");
            $stmt->bind_param('ssssi', $title, $lecture, $description, $fileName, $id);
            return $this->executePrepared($stmt);
        }else{
            $stmt = $this->prepare("UPDATE video SET video.name=? , video.lecturer=? , video.description=? WHERE video.id=?");
            $stmt->bind_param('sssi', $title, $lecture, $description, $id);
            return $this->executePrepared($stmt);
        }
    }
}

?>