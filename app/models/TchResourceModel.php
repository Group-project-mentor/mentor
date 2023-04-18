<?php
class TchResourceModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        
    }

    //? get all resource data from class
    public function findVideos($cid)
    {
        echo 'called';
        $stmt = $this->prepare("SELECT teacher_videos.id, teacher_videos.name, teacher_videos.lecturer ,teacher_class_resources.upload_teacher_id FROM teacher_videos,teacher_class_resources,private_resource WHERE teacher_videos.id = private_resource.id AND
 private_resource.id=teacher_class_resources.rs_id AND teacher_class_resources.class_id=?" );
        $stmt->bind_param('i',$cid);
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
}    
?>