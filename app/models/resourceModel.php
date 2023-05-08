<?php

//* this model is for access resource related tables in database
class ResourceModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

//? get all resource data from combination of (subject & grade)
    public function findVideos($grade, $subject, $offset, $limit, $filter, $creatorID)
    {
        $q = "SELECT video.id, video.name, video.lecturer ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM video, public_resource,rs_subject_grade WHERE video.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=$subject AND rs_subject_grade.grade_id=$grade";
        $q = $this->getFilteringQuery($filter, $q, $creatorID);
        $q .= " LIMIT $offset, $limit;";
        $stmt = $this->prepare($q);
        return $this->fetchObjs($stmt);
    }

    public function findQuizzes($grade, $subject)
    {
        $stmt = $this->prepare("SELECT quiz.id, quiz.name, quiz.marks ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM quiz, public_resource,rs_subject_grade WHERE quiz.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?");
        $stmt->bind_param('ii',$subject,$grade);
        return $this->fetchObjs($stmt);
    }

    public function filterFindQuizes($grade, $subject, $filter, $creatorID){
        $q = "SELECT quiz.id, quiz.name, quiz.marks ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM quiz, public_resource,rs_subject_grade WHERE quiz.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id= $subject AND rs_subject_grade.grade_id= $grade";
        if(!empty($filter['approvals'])){
            switch ($filter['approvals']){
                case "P" :
                    $q .= " AND public_resource.approved = 'P'";
                    break;
                case "Y":
                    $q .= " AND public_resource.approved = 'Y'";
                    break;
                case "N":
                    $q .= " AND public_resource.approved = 'N'";
                    break;
            }
        }
        if(!empty($filter['ownedBy'])){
            switch ($filter['ownedBy']){
                case "ME" :
                    $q .= " AND rs_subject_grade.creator_id = $creatorID;";
                    break;
                case "THEM":
                    $q .= " AND rs_subject_grade.creator_id <> $creatorID;";
                    break;
            }
        }
        $stmt = $this->prepare($q);
        return $this->fetchObjs($stmt);
    }

    public function findPastpapers($grade, $subject, $offset, $limit, $filter, $creatorID)
    {
        $q = "SELECT pastpaper.id,pastpaper.name, pastpaper.year, pastpaper.part ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=$subject AND rs_subject_grade.grade_id=$grade";
        $q = $this->getFilteringQuery($filter, $q, $creatorID);
        $q .= " LIMIT $offset, $limit;";
        $stmt = $this->prepare($q);
        return $this->fetchObjs($stmt);
    }

    public function findDocuments($grade, $subject, $offset, $limit, $filter, $creatorID)
    {
        $q = "SELECT document.id,document.name,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=$subject AND rs_subject_grade.grade_id=$grade";

        $q = $this->getFilteringQuery($filter, $q, $creatorID);
        $q .= " LIMIT $offset, $limit;";
        $stmt = $this->prepare($q);
        return $this->fetchObjs($stmt);
    }


    public function findOthers($grade, $subject, $offset, $limit, $filter, $creatorID){
        $q = "SELECT other.id, other.name, other.type,public_resource.approved,rs_subject_grade.creator_id 
               FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id AND
                 public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=$subject AND rs_subject_grade.grade_id=$grade";

        $q = $this->getFilteringQuery($filter, $q, $creatorID);
        $q .= " LIMIT $offset, $limit;";
        $stmt = $this->prepare($q);
        return $this->fetchObjs($stmt);
    }

    public function findQuestionCounts($grade, $subject){
        $stmt = $this->prepare("SELECT rs_subject_grade.rsrc_id, COUNT(question.id) as count 
                                        FROM rs_subject_grade,question WHERE rs_subject_grade.rsrc_id = question.quiz_id AND rs_subject_grade.grade_id = ? 
                                        AND rs_subject_grade.subject_id = ? GROUP BY rs_subject_grade.rsrc_id;");
        $stmt->bind_param('ii',$grade,$subject);
        return $this->fetchObjs($stmt);
    }

    public function getResourceCount($type, $grade, $subject, $filter, $creatorID)
    {
        $q = "";
        switch($type){
            case "pdf":
                $q = "SELECT COUNT(document.id) AS count FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id";
                break;
            case "video":
                $q = "SELECT COUNT(video.id) AS count FROM video, public_resource,rs_subject_grade WHERE video.id = public_resource.id";
                break;
            case "quiz":
                $q = "SELECT COUNT(quiz.id) AS count FROM quiz, public_resource,rs_subject_grade WHERE quiz.id = public_resource.id";
                break;
            case "pastpaper":
                $q = "SELECT COUNT(pastpaper.id) AS count FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id";
                break;
            case "other":
                $q = "SELECT COUNT(other.id) AS count FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id";
                break;
        }
        $q .=  " AND public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=$subject AND rs_subject_grade.grade_id=$grade";

        $q = $this->getFilteringQuery($filter, $q, $creatorID);
        $q .= ";";

        $stmt = $this->prepare($q);
        return $this->fetchOneObj($stmt);
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

    public function addVideo($id, $grade, $subject, $name, $lec, $link, $descr,$creator,$type = 'L'){ //!done
        $sql = "insert into video(id, name, lecturer, description, link, type) values ($id, '$name', '$lec', '$descr', '$link','$type')";
        return ($this->addResource($id, $grade, $subject, null , 'video',$creator) && $this->executeQuery($sql));
    }

    public function addDocument($id, $grade, $subject, $name, $file,$creator) //!done
    {
        $sql = "insert into document values ($id ,'$name')";
        return ($this->addResource($id, $grade, $subject, $file,'pdf',$creator) && $this->executeQuery($sql));
    }

    public function addOther($id, $grade, $subject, $name, $file, $ext,$creator) //!done
    {
        $sql = "insert into other values ($id ,'$name', '$ext')";
        return ($this->addResource($id, $grade, $subject, $file,'other',$creator) && $this->executeQuery($sql));
    }

    public function addPastPaper($id, $gid, $sid, $name, $year, $part, $qid, $file,$creator){ //!done
        if($qid != 0){
            $stmt = $this->prepare("INSERT INTO pastpaper(id, year, part, name, qid)  VALUES (?,?,?,?,?)");
            $stmt->bind_param('iiisi' ,$id, $year, $part, $name, $qid);
        }else{
            $stmt = $this->prepare("INSERT INTO pastpaper(id, year, part, name, qid)  VALUES (?,?,?,?,NULL)");
            $stmt->bind_param('iiis',$id, $year, $part, $name);
        }
        return ( $this->addResource($id, $gid, $sid, $file, 'paper',$creator)
            and $this->executePrepared($stmt));
    }

    public function addPastPaperWithAns($id, $gid, $sid, $name, $year, $part, $qid, $file, $creator, $ans){
        if($qid != 0){
            $stmt = $this->prepare("INSERT INTO pastpaper(id, year, part, name, qid, answer) VALUES (?,?,?,?,?,?)");
            $stmt->bind_param('iiisis' ,$id, $year, $part, $name, $qid, $ans);
        }else{
            $stmt = $this->prepare("INSERT INTO pastpaper(id, year, part, name, qid, answer) VALUES (?,?,?,?,NULL,?)");
            $stmt->bind_param('iiiss',$id, $year, $part, $name,$ans);
        }
        return ( $this->addResource($id, $gid, $sid, $file, 'paper',$creator)
            and $this->executePrepared($stmt));
    }

    private function addResource($id, $grade, $subject, $file, $type, $creator) //! Check the pending 'P' or null
    {
        $sql1 = "insert into public_resource(id, type, location, approved, approved_by) values ($id ,'$type', '$file','P',NULL)";
        if(empty($file)){
            $sql1 = "insert into public_resource(id, type,approved) values ($id ,'$type','P')";
        }
        $sql2 = "insert into rs_subject_grade values ($id ,$subject ,$grade,$creator)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

//? get reaource for preview => document | other

    public function getResource($id, $gid=null, $sid=null, $type=null){
        $stmt = $this->prepare('select public_resource.id, public_resource.type, public_resource.location from public_resource,rs_subject_grade 
        where public_resource.id = rs_subject_grade.rsrc_id AND public_resource.id = ? AND rs_subject_grade.subject_id =? 
          AND rs_subject_grade.grade_id =? AND type = ?');

        $stmt->bind_param('iiis',$id,$sid,$gid,$type);
        return $this->fetchOneObj($stmt);
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
//        elseif ($table == 'pastpaper'){
//            return ($res1 && $res2 && $res3 && $this->deletePaper($id));
//        }
        return ($res1 && $res2 && $res3);
    }

    public function deletePaper($id){ //TODO:

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
    public function getDocument($id){ //!done
        $sql = "select document.id, document.name, public_resource.location, public_resource.type,rs_subject_grade.creator_id 
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

    public function getOther($id){ //!done
        $sql = "select other.id, other.name, public_resource.location, public_resource.type,rs_subject_grade.creator_id 
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

    public function getVideo($id){ //!done
        $sql = "select video.id, video.name, video.lecturer, video.description, video.link, 
                    video.thumbnail, video.type, public_resource.location ,public_resource.type,rs_subject_grade.creator_id
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

    public function getPastPaper($id, $gid, $sid){ //!done
        $sql = "select pastpaper.id, pastpaper.name, pastpaper.year, pastpaper.part, pastpaper.qid, pastpaper.answer, public_resource.type, public_resource.location,rs_subject_grade.creator_id 
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

    public function updatePastpaperAnswer($id, $file){
        $stmt = $this->prepare("update pastpaper p set p.answer = ? where p.id = ?");
        $stmt->bind_param('si',$file,$id);
        return $this->executePrepared($stmt);
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

    public function updatePaper($id, $title, $year, $part, $location){
        $stmt1 = $this->prepare("UPDATE pastpaper p SET p.name = ?, p.year = ?, p.part = ? WHERE p.id = ?");
        $stmt1->bind_param('siii',$title,$year,$part,$id);
        $stmt2 = $this->prepare("UPDATE public_resource p SET p.location = ? WHERE p.id = ?");
        $stmt2->bind_param('si',$location,$id);
        return ($this->executePrepared($stmt1) && $this->executePrepared($stmt2));
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

    public function getAllQuizIds($gid, $sid){ //!done
        $stmt = $this->prepare("SELECT rsrc_id,quiz.name,rs_subject_grade.creator_id FROM rs_subject_grade, public_resource, quiz 
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

//    ? For rc main page Chart -> Resources can Access
    public function getChartCounts($rcid){ //!done
        $stmt = $this->prepare("SELECT public_resource.type,count(public_resource.id) as resCount FROM rc_has_subject,rs_subject_grade,public_resource 
                                         WHERE rc_has_subject.subject_id = rs_subject_grade.subject_id AND rs_subject_grade.rsrc_id = public_resource.id AND 
                                                rs_subject_grade.creator_id = ? AND rc_has_subject.rc_id = ? GROUP BY public_resource.type");
        $stmt->bind_param('ii',$rcid,$rcid);
        return $this->fetchObjs($stmt);
    }

//    ? verification functions

    public function isVerifiedAccess($res_id, $gid, $sid, $rc_id){
        $stmt = $this->prepare("SELECT rs_subject_grade.rsrc_id FROM rs_subject_grade WHERE rsrc_id=? AND grade_id=? AND subject_id=? AND creator_id=?");
        $stmt->bind_param('iiii',$res_id,$gid,$sid,$rc_id);
        return $this->fetchOne($stmt);
    }

    public function getMyResourcesCount($uid){
        $stmt = $this->prepare("SELECT COUNT(rs_subject_grade.rsrc_id) as res_count FROM rs_subject_grade WHERE creator_id=?");
        $stmt->bind_param('i',$uid);
        return $this->fetchOneObj($stmt);
    }

    public function getTypeCount($uid){
        $stmt = $this->prepare("SELECT approved as status, COUNT(rs_subject_grade.rsrc_id) as res_count FROM rs_subject_grade,public_resource WHERE rs_subject_grade.rsrc_id=public_resource.id AND creator_id=? GROUP BY approved");
        $stmt->bind_param('i',$uid);
        return $this->fetchObjs($stmt);
    }

//    * Search functions

    public function searchVideos($gid,$sid,$searchText){
        $stmt = $this->prepare("SELECT video.id, video.name, video.lecturer ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM video, public_resource,rs_subject_grade WHERE video.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=? 
                                         AND (video.name LIKE ? OR video.lecturer LIKE ?)");
        $searchText = "%$searchText%";
        $stmt->bind_param("iiss",$sid,$gid,$searchText,$searchText);
        return $this->fetchObjs($stmt);
    }

    public function searchQuizzes($grade, $subject,$searchText)
    {
        $stmt = $this->prepare("SELECT quiz.id, quiz.name, quiz.marks ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM quiz, public_resource,rs_subject_grade WHERE quiz.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?
                                         AND (quiz.name LIKE ?)");
        $searchText = "%$searchText%";
        $stmt->bind_param('iis',$subject,$grade,$searchText);
        return $this->fetchObjs($stmt);
    }

    public function searchPastpapers($grade, $subject,$searchText)
    {
        $stmt = $this->prepare("SELECT pastpaper.id,pastpaper.name, pastpaper.year, pastpaper.part ,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM pastpaper, public_resource,rs_subject_grade WHERE pastpaper.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?
                                         AND (pastpaper.name LIKE ? OR pastpaper.year LIKE ? OR pastpaper.part LIKE ?)");
        $searchText = "%$searchText%";
        $stmt->bind_param('iisss',$subject,$grade,$searchText,$searchText,$searchText);
        return $this->fetchObjs($stmt);
    }

    public function searchDocuments($grade, $subject,$searchText) //!done
    {
        $stmt = $this->prepare("SELECT document.id,document.name,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM document, public_resource,rs_subject_grade WHERE document.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?
                                         AND (document.name LIKE ?)");
        $searchText = "%$searchText%";
        $stmt->bind_param('iis',$subject,$grade,$searchText);
        return $this->fetchObjs($stmt);
    }

    public function searchOthers($grade, $subject,$searchText)
    {
        $stmt = $this->prepare("SELECT other.id, other.name, other.type,public_resource.approved,rs_subject_grade.creator_id 
                                        FROM other, public_resource,rs_subject_grade WHERE other.id = public_resource.id AND
                                         public_resource.id=rs_subject_grade.rsrc_id AND rs_subject_grade.subject_id=? AND rs_subject_grade.grade_id=?
                                         AND (other.name LIKE ? OR other.type LIKE ?)");
        $searchText = "%$searchText%";
        $stmt->bind_param('iiss',$subject,$grade,$searchText,$searchText);
        return $this->fetchObjs($stmt);
    }

    // * Topic related functions

    public function addTopic($name, $description, $grade, $subject){
        $stmt = $this->prepare("INSERT INTO topic(name, description, gradeID, subjectID) VALUES(?,?,?,?)");
        $stmt->bind_param('ssii',$name,$description,$grade,$subject);
        if($this->executePrepared($stmt)){
            return true;
        }else{
            return false;
        }
    }

    public function getLastTopicID(){
        $stmt = $this->prepare("SELECT id FROM topic ORDER BY id DESC LIMIT 1");
        return $this->fetchOneObj($stmt);
    }

    public function getTopics($grade, $subject){
        $stmt = $this->prepare("SELECT t.id, t.name, t.description FROM topic t WHERE gradeID=? AND subjectID=?");
        $stmt->bind_param('ii',$grade,$subject);
        return $this->fetchObjs($stmt);
    }

    public function editTopic($id, $name, $description){
        $stmt = $this->prepare("UPDATE topic SET name=?, description=? WHERE id=?");
        $stmt->bind_param('ssi',$name,$description,$id);
        return $this->executePrepared($stmt);
    }

    public function getTopicDetails($id){
        $stmt = $this->prepare("SELECT * FROM topic WHERE id=?");
        $stmt->bind_param('i',$id);
        return $this->fetchOneObj($stmt);
    }

    public function deleteTopic($id){
        $stmt1 = $this->prepare("DELETE FROM topic WHERE id=?");
        $stmt1->bind_param('i',$id);
        $stmt2 = $this->prepare("UPDATE public_resource SET topicID=NULL WHERE topicID=?");
        $stmt2->bind_param('i',$id);
        return ($this->executePrepared($stmt1) && $this->executePrepared($stmt2));
    }

    public function getTopicOrder($grade, $subject){
        $stmt = $this->prepare("SELECT * FROM topic_order WHERE subjectID=? AND gradeID=?");
        $stmt->bind_param('ii',$subject,$grade);
        return $this->fetchOneObj($stmt);
    }

    public function addTopicOrder( $grade,$subject, $order){
        $stmt = $this->prepare("INSERT INTO topic_order(subjectID, gradeID, tpcOrder) VALUES (?,?,?)");
        $stmt->bind_param('iis',$subject,$grade,$order);
        return $this->executePrepared($stmt);
    }

    public function editTopicOrder($grade, $subject, $order){
        $stmt = $this->prepare("UPDATE topic_order SET tpcOrder=? WHERE subjectID=? AND gradeID=?");
        $stmt->bind_param('sii',$order,$subject,$grade);
        return $this->executePrepared($stmt);
    }

    public function getResourcesTopicWise($topic){
        $stmt = $this->prepare("SELECT p.id, p.type, p.approved, r.creator_id FROM public_resource p, rs_subject_grade r, topic t 
                                WHERE t.id = p.topicID AND p.id = r.rsrc_id AND t.id = ?");
        $stmt->bind_param('i',$topic);
        return $this->fetchObjs($stmt);
    }

    public function getResourceByType($grade, $subject, $type){
        switch($type){
            case 'video':
                $stmt = $this->prepare("SELECT p.id, rsrc.name, rsrc.thumbnail, rsrc.type AS vtype, p.type, p.approved, r.creator_id 
                                        FROM public_resource p, rs_subject_grade r, video rsrc 
                                        WHERE p.id = r.rsrc_id AND rsrc.id = p.id AND r.subject_id = ? AND r.grade_id = ? AND p.topicID IS NULL");
                break;
            case 'pdf':
                $stmt = $this->prepare("SELECT p.id, rsrc.name, p.type, p.approved, r.creator_id 
                                        FROM public_resource p, rs_subject_grade r, document rsrc 
                                        WHERE p.id = r.rsrc_id AND rsrc.id = p.id AND r.subject_id = ? AND r.grade_id = ? AND p.topicID IS NULL");

                break;
            case 'other':
                $stmt = $this->prepare("SELECT p.id, rsrc.name, rsrc.type AS otype, p.type, p.approved, r.creator_id 
                                        FROM public_resource p, rs_subject_grade r, other rsrc 
                                        WHERE p.id = r.rsrc_id AND rsrc.id = p.id AND r.subject_id = ? AND r.grade_id = ? AND p.topicID IS NULL");
                break;
            case "paper":
                $stmt = $this->prepare("SELECT p.id, rsrc.name, rsrc.part, rsrc.year , p.type, p.approved, r.creator_id 
                                        FROM public_resource p, rs_subject_grade r, pastpaper rsrc 
                                        WHERE p.id = r.rsrc_id AND rsrc.id = p.id AND r.subject_id = ? AND r.grade_id = ? AND p.topicID IS NULL");
                break;
            case "quiz":
                $stmt = $this->prepare("SELECT p.id, rsrc.name, rsrc.marks, p.type, p.approved, r.creator_id 
                                        FROM public_resource p, rs_subject_grade r, quiz rsrc 
                                        WHERE p.id = r.rsrc_id AND rsrc.id = p.id AND r.subject_id = ? AND r.grade_id = ? AND p.topicID IS NULL");
                break;
            default:
                $stmt = $this->prepare("SELECT p.id, p.type, p.approved, r.creator_id 
                                        FROM public_resource p, rs_subject_grade r 
                                        WHERE p.id = r.rsrc_id AND r.subject_id = ? AND r.grade_id = ? AND p.topicID IS NULL");
                break;
        }
        $stmt->bind_param('ii',$subject,$grade);
        return $this->fetchObjs($stmt);
    }

    public function getResourcesWithTopics($subject, $grade){
        $stmt = $this->prepare("SELECT p.id as rsrc_id, p.type, p.approved, r.creator_id, t.id as t_id, t.name, t.description FROM public_resource p, rs_subject_grade r, topic t 
                                WHERE t.id = p.topicID AND p.id = r.rsrc_id AND t.subjectID = ? AND t.gradeID = ?");
        $stmt->bind_param('ii',$subject,$grade);
        return $this->fetchObjs($stmt);
    }

    public function connectToTopic($topic, $resource){
        $stmt = $this->prepare("UPDATE public_resource SET topicID=? WHERE id=?");
        $stmt->bind_param('ii',$topic,$resource);
        return $this->executePrepared($stmt);
    }


    public function removeFromTopic($id){
        $stmt = $this->prepare("UPDATE public_resource SET topicID=NULL WHERE id=?");
        $stmt->bind_param('i',$id);
        return $this->executePrepared($stmt);
    }

    public function isVerifiedTopic($id, $grade, $subject){
        $stmt = $this->prepare("SELECT topic.id FROM topic  WHERE topic.id = ? AND topic.gradeID=? AND topic.subjectID=?");
        $stmt->bind_param('iii',$id,$grade,$subject);
        return $this->fetchOneObj($stmt);
    }

    private function getFilteringQuery($filter, $q, $creatorID)
    {
        if (!empty($filter['approvals'])) {
            switch ($filter['approvals']) {
                case "P" :
                    $q .= " AND public_resource.approved = 'P'";
                    break;
                case "Y":
                    $q .= " AND public_resource.approved = 'Y'";
                    break;
                case "N":
                    $q .= " AND public_resource.approved = 'N'";
                    break;
            }
        }
        if (!empty($filter['ownedBy'])) {
            switch ($filter['ownedBy']) {
                case "ME" :
                    $q .= " AND rs_subject_grade.creator_id = $creatorID";
                    break;
                case "THEM":
                    $q .= " AND rs_subject_grade.creator_id <> $creatorID";
                    break;
            }
        }
        return $q;
    }

}