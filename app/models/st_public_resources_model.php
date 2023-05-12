<?php

class St_public_resources_model extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function findVideos($gid, $sid)
    {
        $q = "select video.id, video.name, video.lecturer from video, public_resource
        WHERE video.id = public_resource.id and public_resource.id
        IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=? and grade_id=?) and public_resource.type = 'video'
         and public_resource.approved = 'Y' ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $sid, $gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findQuizzes($gid, $sid)
    {
        $q = "select quiz.id, quiz.name, quiz.marks, quiz.questions from quiz, public_resource WHERE quiz.id = public_resource.id and
                public_resource.id IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id=? and grade_id=?)
                and public_resource.type = 'quiz' and public_resource.approved = 'Y' ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $sid, $gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findPastpapers($gid, $sid)
    {
        $q = "SELECT pastpaper.id,pastpaper.name, pastpaper.year, pastpaper.part , public_resource.location
        FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id AND
         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? 
         and public_resource.approved = 'Y' ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $sid, $gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findDocuments($gid, $sid) //!done
    {
        $q = "SELECT document.id,document.name,public_resource.approved,rs_subject_grade.creator_id , public_resource.location
        FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id AND
         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? 
         and public_resource.approved = 'Y' ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $sid, $gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function findOthers($gid, $sid)
    {
        $q = "SELECT other.id, other.name, other.type,public_resource.approved,rs_subject_grade.creator_id , public_resource.location
        FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id AND
         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? 
         and public_resource.approved = 'Y' ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii', $sid, $gid);

        $result = $this->fetchObjs($stmt);
        return $result;
    }

    public function getResource($id, $gid = null, $sid = null, $type = null)
    {
        $q = "select public_resource.id, public_resource.type, public_resource.location from public_resource 
        inner join rs_subject_grade on public_resource.id = rs_subject_grade.rsrc_id 
        where public_resource.id = ? and rs_subject_grade.subject_id =? and rs_subject_grade.grade_id =? and type =? 
        and public_resource.approved = 'Y';";

        $stmt = $this->prepare($q);
        $stmt->bind_param('iiis', $id, $sid, $gid, $type);

        $result = $this->fetchObjs($stmt);
        return $result;
    }
    
    public function getLinkedQuiz($id)
    {
        $q = "SELECT pastpaper.qid FROM pastpaper WHERE pastpaper.id = ? ;" ;
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }
    
    public function getPastPaperAnswer($id)
    {
        $q = "SELECT pastpaper.answer FROM pastpaper WHERE pastpaper.id = ? ;" ;
        $stmt = $this->prepare($q);
        $stmt->bind_param('i', $id);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function getVideo($id, $sid = null, $gid = null)
    {
        $q = "select video.id, video.name, video.lecturer, video.description, video.link, 
                    video.thumbnail, video.type, public_resource.location ,public_resource.type AS Rtype
                    from video inner join rs_subject_grade on video.id = rs_subject_grade.rsrc_id 
                    inner join public_resource on public_resource.id = rs_subject_grade.rsrc_id 
                    where video.id = ? and rs_subject_grade.subject_id =?  
                    and rs_subject_grade.grade_id =? and public_resource.approved = 'Y' ;";

        $stmt = $this->prepare($q);
        $stmt->bind_param('iii', $id, $sid, $gid);

        $result = $this->fetchOneObj($stmt);
        return $result;
    }

    public function getRandomVideos($gid, $sid, $limit = 3){
        $stmt = $this->prepare("SELECT video.id, video.name, video.lecturer ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM video, public_resource,rs_subject_grade WHERE video.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND 
                                         rs_subject_grade.grade_id=? ORDER BY RAND() LIMIT ? and public_resource.approved = 'Y' ;");
        $stmt->bind_param('iii',$sid,$gid,$limit);
        return $this->fetchObjs($stmt);
    }


    public function getResourceCount($type, $grade, $subject)
    {
        switch ($type) {
            case "pdf":
                $stmt = $this->prepare("SELECT COUNT(document.id) AS count FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? and public_resource.approved = 'Y';");
                break;
            case "video":
                $stmt = $this->prepare("SELECT COUNT(video.id) AS count FROM video, public_resource,rs_subject_grade WHERE video.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? and public_resource.approved = 'Y';");
                break;
            case "quiz":
                $stmt = $this->prepare("SELECT COUNT(quiz.id) AS count FROM quiz, public_resource,rs_subject_grade WHERE quiz.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? and public_resource.approved = 'Y';");
                break;
            case "pastpaper":
                $stmt = $this->prepare("SELECT COUNT(pastpaper.id) AS count FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? and public_resource.approved = 'Y';");
                break;
            case "other":
                $stmt = $this->prepare("SELECT COUNT(other.id) AS count FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? and public_resource.approved = 'Y';");
                break;
        }
        $stmt->bind_param('ii', $subject, $grade);
        return $this->fetchOneObj($stmt);
    }


    public function UpdateQuizInDB($user_id,$quiz_id){
        $q = "INSERT INTO quizresults(quiz_id, user_id, status, current_q, score) VALUES ($quiz_id,$user_id,0,0,0)
         ON DUPLICATE KEY UPDATE quiz_id=$quiz_id, user_id=$user_id;";

        $result = $this->executeQuery($q);
        return $result;
    }
}
