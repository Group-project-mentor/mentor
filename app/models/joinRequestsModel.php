<?php

class joinRequestsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function notify($user, $message, $type=null, $validity=null){
        $stmt = $this->prepare("INSERT INTO notification (notification.user_id, notification.message, notification.seen, notification.type, notification.validity) VALUES (?,?,0,?,?)");
        $stmt->bind_param('isss',$user,$message,$type,$validity);
        $res = $this->executePrepared($stmt);
        return $res;
    }

    public function getAllRequests($cid){
        $stmt = $this->prepare("SELECT user.id,user.name,join_requests.timestamp,join_requests.id as rid,join_requests.accept FROM user,join_requests WHERE user.id = join_requests.student_id AND join_requests.class_id=? AND join_requests.accept = 0 AND user.type='st' ORDER BY timestamp DESC;");
        $stmt->bind_param('i',$cid);
        $res = $this->fetchObjs($stmt);
        return $res;
    }

    public function markAccept($id){
        $stmt = $this->prepare("UPDATE join_requests SET accept = 1 WHERE id = ?");
        $stmt->bind_param('i',$id);
        $res = $this->executePrepared($stmt);
        return $res;
    }

    public function deleteRequest($id){
        $stmt = $this->prepare("DELETE FROM join_requests WHERE id = ?");
        $stmt->bind_param('i',$id);
        $res = $this->executePrepared($stmt);
        return $res;
    }

    public function getRequestCount($cid){
        $stmt = $this->prepare("SELECT COUNT(id) AS count FROM join_requests WHERE class_id = ? AND accept = 0");
        $stmt->bind_param('i',$cid);
        $res = $this->fetchOneObj($stmt);
        return $res->count;
    }

}