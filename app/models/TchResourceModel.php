<?php
class TchResourceModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    //? get all resource data from class
    public function findVideos($cid, $offset, $limit)
    {

        $stmt = $this->prepare("SELECT teacher_videos.id, teacher_videos.name, teacher_videos.lecturer ,teacher_class_resources.upload_teacher_id FROM teacher_videos,teacher_class_resources,private_resource WHERE teacher_videos.id = private_resource.id AND
                               private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=? LIMIT ?,?");
        $stmt->bind_param('iii', $cid, $offset, $limit);
        return $this->fetchObjs($stmt);
    }

    public function findQuizzes($cid)
    {
        $stmt = $this->prepare("SELECT teacher_quiz.id, teacher_quiz.name, teacher_quiz.marks ,teacher_class_resources.upload_teacher_id 
                                        FROM teacher_quiz, private_resource,teacher_class_resources WHERE teacher_quiz.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
        $stmt->bind_param('i', $cid);
        return $this->fetchObjs($stmt);
    }

    public function findDocuments($cid, $offset, $limit)
    {
        $stmt = $this->prepare("SELECT teacher_document.id,teacher_document.name,teacher_class_resources.upload_teacher_id 
                                        FROM teacher_document, teacher_class_resources,private_resource WHERE teacher_document.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=? LIMIT ?,?");
        $stmt->bind_param('iii', $cid, $offset, $limit);
        return $this->fetchObjs($stmt);
    }

    public function findOthers($cid, $offset, $limit)
    {
        $stmt = $this->prepare("SELECT teacher_other.id, teacher_other.name, teacher_other.type,teacher_class_resources.upload_teacher_id 
                                        FROM teacher_other, private_resource,teacher_class_resources WHERE teacher_other.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=? LIMIT ?,?");
        $stmt->bind_param('iii', $cid, $offset, $limit);
        return $this->fetchObjs($stmt);
    }

    public function findPastpapers($cid, $offset, $limit)
    {
        $stmt = $this->prepare("SELECT teacher_pastpaper.id,teacher_pastpaper.name, teacher_pastpaper.year, teacher_pastpaper.part,teacher_class_resources.upload_teacher_id 
        FROM teacher_pastpaper, private_resource,teacher_class_resources WHERE teacher_pastpaper.id = private_resource.id AND
         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=? LIMIT ?,?");
        $stmt->bind_param('iii', $cid, $offset, $limit);
        return $this->fetchObjs($stmt);
    }

    public function findQuestionCounts($cid){
        $stmt = $this->prepare("SELECT teacher_class_resources.rs_id, COUNT(teacher_question.id) as count FROM teacher_class_resources,teacher_question WHERE
         teacher_class_resources.rs_id = teacher_question.quiz_id AND teacher_class_resources.class_id = ? GROUP BY teacher_class_resources.rs_id;");
        $stmt->bind_param('i',$cid);
        return $this->fetchObjs($stmt);
    }

    //? Functions for add a resource

    public function addVideo($id, $cid, $name, $lec, $link, $descr, $tid, $type = 'L')
    { //!done

        $sql = "insert into teacher_videos(id, name, lecturer, description, link, type) values ($id, '$name', '$lec', '$descr', '$link','$type')";
        return ($this->addResource($id, $cid, null, 'video', $tid) && $this->executeQuery($sql));
    }

    public function addDocument($id, $cid, $name, $file, $tid) //!done
    {
        $sql = "insert into teacher_document values ($id ,'$name')";
        return ($this->addResource($id, $cid, $file, 'pdf', $tid) && $this->executeQuery($sql));
    }

    public function addOther($id, $cid, $name, $file, $ext, $tid) //!done
    {
        $sql = "insert into teacher_other values ($id ,'$name', '$ext')";
        return ($this->addResource($id, $cid, $file, 'other', $tid) && $this->executeQuery($sql));
    }


    private function addResource($id, $cid, $file, $type, $uploader) //!done
    {
        $sql1 = "insert into private_resource values ($id ,'$type', '$file')";
        if (empty($file)) {
            $sql1 = "insert into private_resource(id, type) values ($id ,'$type')";
        }
        $sql2 = "insert into teacher_class_resources values ($id ,$cid ,$uploader)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function addPastPaper($id, $cid, $name, $year, $part, $qid, $file, $ext, $tid)
    { //!done
        if ($qid != 0) {
            $stmt = $this->prepare("INSERT INTO teacher_pastpaper VALUES (?,?,?,?,?)");
            $stmt->bind_param('iiisi', $id, $year, $part, $name, $qid);
        } else {
            $stmt = $this->prepare("INSERT INTO teacher_pastpaper VALUES (?,?,?,?,NULL)");
            $stmt->bind_param('iiis', $id, $year, $part, $name);
        }
        return ($this->addResource($id,  $cid, $file, 'paper', $tid)
            and $this->executePrepared($stmt));
    }

    //? get the last resource id from table
    public function getLastId()
    {
        // $sql = "select id from public_resource order by id desc limit 1";
        $result = $this->getData("private_resource", null, "id", "desc", 1);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            //            echo $row[0];
            return $row[0];
        } else {
            return 0;
        }
    }

    public function getResourceCount($type, $cid)
    {
        switch ($type) {
            case "pdf":
                $stmt = $this->prepare("SELECT COUNT(teacher_document.id) AS count FROM teacher_document, private_resource,teacher_class_resources WHERE teacher_document.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
                break;
            case "video":
                $stmt = $this->prepare("SELECT COUNT(teacher_videos.id) AS count FROM teacher_videos, private_resource,teacher_class_resources WHERE teacher_videos.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
                break;
            case "quiz":
                $stmt = $this->prepare("SELECT COUNT(teacher_quiz.id) AS count FROM teacher_quiz, private_resource,teacher_class_resources WHERE teacher_quiz.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
                break;
            case "pastpaper":
                $stmt = $this->prepare("SELECT COUNT(teacher_pastpaper.id) AS count FROM teacher_pastpaper, private_resource,teacher_class_resources WHERE teacher_pastpaper.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
                break;
            case "other":
                $stmt = $this->prepare("SELECT COUNT(teacher_other.id) AS count FROM teacher_other, private_resource,teacher_class_resources WHERE teacher_other.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
                break;
        }
        $stmt->bind_param('i', $cid);
        return $this->fetchOneObj($stmt);
    }

    //? get reaource for preview => document | other

    public function getResource($id, $cid = null, $type = null)
    {
        $stmt = $this->prepare('select private_resource.id, private_resource.type, private_resource.location from private_resource,teacher_class_resources where private_resource.id = teacher_class_resources.rs_id AND private_resource.id = ? 
        AND teacher_class_resources.class_id =? AND type = ?');
        //        $stmt = $this->prepare('select public_resource.id, public_resource.type, public_resource.location from public_resource
        //        inner join rs_subject_grade on public_resource.id = rs_subject_grade.rsrc_id
        //        where public_resource.id = ? and rs_subject_grade.subject_id =? and rs_subject_grade.grade_id =? and type = ?');
        $stmt->bind_param('iis', $id, $cid, $type);
        return $this->fetchOneObj($stmt);
    }

    public function getVideo($id,$cid)
    { //!done
        $sql = "select teacher_videos.id, teacher_videos.name, teacher_videos.lecturer, teacher_videos.description, teacher_videos.link, teacher_videos.thumbnail, teacher_videos.type, private_resource.location ,private_resource.type,teacher_class_resources.upload_teacher_id from teacher_videos 
        inner join teacher_class_resources on teacher_videos.id = teacher_class_resources.rs_id 
        inner join private_resource on private_resource.id = teacher_class_resources.rs_id where teacher_videos.id = $id and teacher_class_resources.class_id = $cid" ;

        $result = $this->executeQuery($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_row();
        }
        return array();
    }

    //? Functions for find specific resource
    public function getDocument($id)
    { //!done
        $sql = "select teacher_document.id, teacher_document.name, private_resource.location, private_resource.type,teacher_class_resources.upload_teacher_id from teacher_document inner 
        join teacher_class_resources on teacher_document.id = teacher_class_resources.rs_id inner join private_resource on private_resource.id = teacher_class_resources.rs_id where teacher_document.id = $id
        and teacher_class_resources.class_id =" . $_SESSION['cid'];

        $result = $this->executeQuery($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_row();
        }
        return array();
    }

    public function getOther($id)
    { //!done
        $sql = "select teacher_other.id, teacher_other.name, private_resource.location, private_resource.type,teacher_class_resources.upload_teacher_id from teacher_other inner join
         teacher_class_resources on teacher_other.id = teacher_class_resources.rs_id inner join private_resource on private_resource.id = teacher_class_resources.rs_id where 
         teacher_other.id = $id and teacher_class_resources.class_id =" . $_SESSION['cid'];

        $result = $this->executeQuery($sql);

        if ($result->num_rows > 0) {
            return $result->fetch_row();
        }
        return array();
    }

    //? Functions for update/edit resource
    public function updateVideo($id, $title, $lec, $link, $description)
    {
        $sql = "update teacher_videos set teacher_videos.name = '$title', teacher_videos.lecturer = '$lec', teacher_videos.description = '$description', teacher_videos.link='$link' where teacher_videos.id = $id";
        return ($this->executeQuery($sql));
    }

    public function updateDocument($id, $title, $file)
    {
        $sql1 = "update private_resource set private_resource.location = '$file' where private_resource.id = $id";
        $sql2 = "update teacher_document set teacher_document.name = '$title' where teacher_document.id = $id";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function updateVideoUploaded($id, $title, $lecture, $description, $fileName = null)
    {
        if (!empty($fileName)) {
            $stmt = $this->prepare("UPDATE teacher_videos SET teacher_videos.name=? , teacher_videos.lecturer=? , teacher_videos.description=? , teacher_videos.link=? WHERE teacher_videos.id=?");
            $stmt->bind_param('ssssi', $title, $lecture, $description, $fileName, $id);
            return $this->executePrepared($stmt);
        } else {
            $stmt = $this->prepare("UPDATE teacher_videos SET teacher_videos.name=? , teacher_videos.lecturer=? , teacher_videos.description=? WHERE teacher_videos.id=?");
            $stmt->bind_param('sssi', $title, $lecture, $description, $id);
            return $this->executePrepared($stmt);
        }
    }
    public function updateOther($id, $title, $file, $type)
    {
        $sql1 = "update private_resource set private_resource.location = '$file' where private_resource.id = $id";
        $sql2 = "update teacher_other set teacher_other.name = '$title', teacher_other.type = '$type' where teacher_other.id = $id";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }


    //? Functions for delete resource
    public function deleteResource($id, $table)
    {
        $res1 = $this->deleteData('teacher_class_resources', "rs_id = $id");
        $table_name = "teacher_" . $table;
        $res2 = $this->deleteData($table_name, "id = $id");
        $res3 = $this->deleteData('private_resource', "id = $id");
        //        elseif ($table == 'pastpaper'){
        //            return ($res1 && $res2 && $res3 && $this->deletePaper($id));
        //        }
        return ($res1 && $res2 && $res3);
    }

    public function deleteDoc($id)
    {
        $res1 = $this->deleteData('teacher_class_resources', "rs_id = $id");
        $res2 = $this->deleteData('teacher_document', "id = $id");
        $res3 = $this->deleteData('private_resource', "id = $id");
        return ($res1 && $res2 && $res3);
    }

    private function deleteQuiz($id)
    {
        $stmt1 = $this->prepare('DELETE FROM teacher_question WHERE quiz_id = ? ');
        $stmt2 = $this->prepare('DELETE FROM teacher_answer WHERE teacher_answer.question_id IN 
                    (SELECT id FROM teacher_question WHERE teacher_question.quiz_id = ?)');
        $stmt1->bind_param('i', $id);
        $stmt2->bind_param('i', $id);
        return ($stmt1->execute() and $stmt2->execute());
    }

    //? get the saved filename of a specific resource
    public function getLocation($id)
    {
        $sql = "select private_resource.location from private_resource where id = $id";
        $result = $this->executeQuery($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_row();
            return $row[0];
        }
        return null;
    }

    public function getAllQuizIds($cid)
    { //!done
        $stmt = $this->prepare("SELECT rs_id,teacher_quiz.name,teacher_class_resources.upload_teacher_id FROM teacher_class_resources, private_resource, teacher_quiz 
                                     WHERE teacher_class_resources.class_id = ?  AND 
                                           private_resource.type = 'quiz' AND teacher_class_resources.rs_id = private_resource.id AND 
                                           private_resource.id = teacher_quiz.id");
        $stmt->bind_param('ii', $gid, $sid);
        return $this->fetchAll($stmt);
    }

    public function changeQuizId($ppid, $qid)
    {
        $stmt = $this->prepare("UPDATE teacher_pastpaper SET teacher_pastpaper.qid = ? WHERE teacher_pastpaper.id = ?;");
        $stmt->bind_param('ii', $qid, $ppid);
        return $this->executePrepared($stmt);
    }

    public function getSpecificQuiz($qid)
    {
        $stmt = $this->prepare("SELECT * FROM teacher_quiz WHERE id = ? ");
        $stmt->bind_param('i', $qid);
        return $this->fetchOneObj($stmt);
    }

    public function unlinkQuiz($ppid)
    {
        $stmt = $this->prepare("UPDATE teacher_pastpaper SET teacher_pastpaper.qid=NULL WHERE id = ? ");
        $stmt->bind_param("i", $ppid);
        return $this->executePrepared($stmt);
    }

    //search resources

    public function searchDocuments($cid,$searchText) //!done
    {
        $stmt = $this->prepare("SELECT teacher_document.id,teacher_document.name,teacher_class_resources.upload_teacher_id 
                                        FROM teacher_document,private_resource,teacher_class_resources WHERE teacher_document.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=? 
                                         AND (teacher_document.name LIKE ?)");
        $searchText = "%$searchText%";
        $stmt->bind_param('is',$cid,$searchText);
        return $this->fetchObjs($stmt);
    }
}
