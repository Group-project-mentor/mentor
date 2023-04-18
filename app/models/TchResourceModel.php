<?php
class TchResourceModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    //? get all resource data from class
    public function findVideos($cid,$offset,$limit)
    {
        
        $stmt = $this->prepare("SELECT teacher_videos.id, teacher_videos.name, teacher_videos.lecturer ,teacher_class_resources.upload_teacher_id FROM teacher_videos,teacher_class_resources,private_resource WHERE teacher_videos.id = private_resource.id AND
                               private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=? LIMIT ?,?" );
        $stmt->bind_param('iii',$cid,$offset,$limit);
        return $this->fetchObjs($stmt);
    }

    //? Functions for add a resource

    public function addVideo($id,$cid,$name, $lec, $link, $descr ,$tid,$type = 'L'){ //!done
    
        $sql = "insert into teacher_videos(id, name, lecturer, description, link, type) values ($id, '$name', '$lec', '$descr', '$link','$type')";
        return ($this->addResource($id, $cid, null , 'video',$tid) && $this->executeQuery($sql));
    }

    private function addResource($id, $cid, $file, $type, $uploader) //!done
    {
        $sql1 = "insert into private_resource values ($id ,'$type', '$file')";
        if(empty($file)){
            $sql1 = "insert into private_resource(id, type) values ($id ,'$type')";
        }
        $sql2 = "insert into teacher_class_resources values ($id ,$cid ,$uploader)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
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
        switch($type){
            case "pdf":
                $stmt = $this->prepare("SELECT COUNT(document.id) AS count FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?");
                break;
            case "video":
                $stmt = $this->prepare("SELECT COUNT(teacher_videos.id) AS count FROM teacher_videos, private_resource,teacher_class_resources WHERE teacher_videos.id = private_resource.id AND
                                         private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?");
                break;
            case "quiz":
                $stmt = $this->prepare("SELECT COUNT(quiz.id) AS count FROM quiz, public_resource,rs_subject_grade WHERE quiz.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?");
                break;  
            case "pastpaper":
                $stmt = $this->prepare("SELECT COUNT(pastpaper.id) AS count FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?");
                break;
            case "other":
                $stmt = $this->prepare("SELECT COUNT(other.id) AS count FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?");
                break;
    }
        $stmt->bind_param('i',$cid);
        return $this->fetchOneObj($stmt);
    }

    //? get reaource for preview => document | other

    public function getResource($id, $cid=null, $type=null){
        $stmt = $this->prepare('select private_resource.id, private_resource.type, private_resource.location from private_resource,teacher_class_resources where private_resource.id = teacher_class_resources.rs_id AND private_resource.id = ? 
        AND teacher_class_resources.class_id =? AND type = ?');
//        $stmt = $this->prepare('select public_resource.id, public_resource.type, public_resource.location from public_resource
//        inner join rs_subject_grade on public_resource.id = rs_subject_grade.rsrc_id
//        where public_resource.id = ? and rs_subject_grade.subject_id =? and rs_subject_grade.grade_id =? and type = ?');
        $stmt->bind_param('iis',$id,$cid,$type);
        return $this->fetchOneObj($stmt);
    }

    public function getVideo($id){ //!done
        $sql = "select teacher_videos.id, teacher_videos.name, teacher_videos.lecturer, teacher_videos.description, teacher_videos.link, teacher_videos.thumbnail, teacher_videos.type, private_resource.location ,private_resource.type,teacher_class_resources.upload_teacher_id from teacher_videos 
        inner join teacher_class_resources on teacher_videos.id = teacher_class_resources.rs_id 
        inner join private_resource on private_resource.id = teacher_class_resources.rs_id where teacher_videos.id = $id and teacher_class_resources.class_id =".$_SESSION['cid'];

        $result = $this->executeQuery($sql);

        if($result->num_rows > 0){
            return $result->fetch_row();
        }
        return array();
    }

//? Functions for update/edit resource
    public function updateVideo($id, $title, $lec, $link, $description){
        $sql = "update teacher_videos set teacher_videos.name = '$title', teacher_videos.lecturer = '$lec', teacher_videos.description = '$description', teacher_videos.link='$link' where teacher_videos.id = $id";
        return ($this->executeQuery($sql));
    }

    public function updateVideoUploaded($id, $title, $lecture, $description, $fileName=null){
        if(!empty($fileName)) {
            $stmt = $this->prepare("UPDATE teacher_videos SET teacher_videos.name=? , teacher_videos.lecturer=? , teacher_videos.description=? , teacher_videos.link=? WHERE teacher_videos.id=?");
            $stmt->bind_param('ssssi', $title, $lecture, $description, $fileName, $id);
            return $this->executePrepared($stmt);
        }else{
            $stmt = $this->prepare("UPDATE teacher_videos SET teacher_videos.name=? , teacher_videos.lecturer=? , teacher_videos.description=? WHERE teacher_videos.id=?");
            $stmt->bind_param('sssi', $title, $lecture, $description, $id);
            return $this->executePrepared($stmt);
        }
    }

    public function deleteResource($id,$table){
        $res1 = $this->deleteData('teacher_class_resources',"rs_id = $id");
        $res2 = $this->deleteData($table, "id = $id");
        $res3 = $this->deleteData('private_resource',"id = $id");
//        elseif ($table == 'pastpaper'){
//            return ($res1 && $res2 && $res3 && $this->deletePaper($id));
//        }
        return ($res1 && $res2 && $res3);
    }


}    
?>