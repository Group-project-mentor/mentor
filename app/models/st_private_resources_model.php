<?php

class St_private_resources_model extends Model{
    public function __construct(){
        parent::__construct();
    }

    public function findClassId($class_name){
        $q = "SELECT private_class.class_id FROM private_class WHERE private_class.class_name = ?;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('s', $class_name );

        $result = $this->fetchOneObj($stmt);
        return $result;
    }
    

    public function findVideos(){
        
        $q="SELECT teacher_videos.name , teacher_videos.lecturer ,teacher_videos.description  ,teacher_class_resources.class_id , private_resource.location
        FROM  teacher_class_resources , teacher_videos , private_resource
        WHERE teacher_class_resources.rs_id = private_resource.id AND teacher_videos.id = private_resource.id AND teacher_class_resources.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $_SESSION['class_id'] );

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findQuizzes()
    {
        $q="SELECT teacher_quiz.name ,teacher_quiz.marks ,teacher_quiz.questions  ,teacher_class_resources.class_id , private_resource.location
        FROM  teacher_class_resources , teacher_quiz , private_resource
        WHERE teacher_class_resources.rs_id = private_resource.id AND teacher_quiz.id = private_resource.id AND teacher_class_resources.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $_SESSION['class_id'] );

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findPastpapers()
    {
        $q ="SELECT teacher_pastpaper.name ,teacher_pastpaper.year, teacher_pastpaper.part ,teacher_class_resources.class_id , private_resource.location
        FROM  teacher_class_resources , teacher_pastpaper , private_resource
        WHERE teacher_class_resources.rs_id = private_resource.id AND teacher_pastpaper.id = private_resource.id AND teacher_class_resources.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $_SESSION['class_id'] );
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findDocuments() 
    {
        $q="SELECT teacher_document.name ,teacher_class_resources.class_id , private_resource.location
        FROM  teacher_class_resources , teacher_document , private_resource
        WHERE teacher_class_resources.rs_id = private_resource.id AND teacher_document.id = private_resource.id AND teacher_class_resources.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $_SESSION['class_id'] );

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findOthers()
    {
        $q="SELECT teacher_other.name ,teacher_other.type  ,teacher_class_resources.class_id , private_resource.location
        FROM  teacher_class_resources , teacher_other , private_resource
        WHERE teacher_class_resources.rs_id = private_resource.id AND teacher_other.id = private_resource.id AND teacher_class_resources.class_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $_SESSION['class_id'] );
        
        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getResource($id, $type){
        $q = "SELECT private_resource.id, private_resource.type, private_resource.location FROM private_resource INNER JOIN teacher_class_resources 
        ON private_resource.id = teacher_class_resources.rs_id WHERE teacher_class_resources.class_id =? AND private_resource.type =?; ";

        $stmt = $this->prepare($q);
        $stmt->bind_param('is',$id,$type);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getVideo($id,$sid=null,$gid=null){
        $q = "SELECT private_class.class_name ,private_class.class_id , teacher_videos.name , teacher_videos.lecturer ,teacher_videos.description , teacher_videos.type , teacher_videos.link
        FROM (( teacher_videos INNER JOIN teacher_class_resources ON teacher_videos.id = teacher_class_resources.rs_id ) 
        INNER JOIN private_class ON teacher_class_resources.class_id = private_class.class_id ) 
        WHERE private_class.class_id = ?  ";

        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }
}

?>

