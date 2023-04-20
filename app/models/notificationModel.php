<?php

class notificationModel extends Model
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

    public function getAllNotifications($user){
        $stmt = $this->prepare("SELECT * FROM notification n WHERE n.user_id = ? ORDER BY timestamp DESC");
        $stmt->bind_param('i',$user);
        $res = $this->fetchObjs($stmt);
        return $res;
    }

    public function getUnreadNotifications($user){
        $stmt = $this->prepare("SELECT * FROM notification n WHERE n.user_id = ? AND n.seen = 0 ORDER BY timestamp DESC");
        $stmt->bind_param('i',$user);
        return $$this->fetchObjs($stmt);
    }

    public function getReadNotifications($user){
        $stmt = $this->prepare("SELECT * FROM notification n WHERE n.user_id = ? AND n.seen = 1 ORDER BY timestamp DESC");
        $stmt->bind_param('i',$user);
        $res = $this->fetchObjs($stmt);
        return $res;
    }

    public function readNotification($id){
        $stmt = $this->prepare("UPDATE notification SET seen = 1 WHERE id = ?");
        $stmt->bind_param('i',$id);
        $res = $this->executePrepared($stmt);
        return $res;
    }

    public function deleteNotification($id){
        $stmt = $this->prepare("DELETE FROM notification WHERE id = ?");
        $stmt->bind_param('i',$id);
        $res = $this->executePrepared($stmt);
        return $res;
    }

    public function deleteAllNotifications($user, $seen=null){
        if($seen == null){
            $stmt = $this->prepare("DELETE FROM notification WHERE user_id = ?");
        }
        else{
            $stmt = $this->prepare("DELETE FROM notification WHERE user_id = ? AND seen = 1");
        }
        $stmt->bind_param('i',$user);
        return $this->executePrepared($stmt);
    }

    public function getNotificationCount($user){
        $stmt = $this->prepare("SELECT COUNT(id) AS count FROM notification WHERE user_id = ? AND seen = 0");
        $stmt->bind_param('i',$user);
        $res = $this->fetchOneObj($stmt);
        return $res->count;
    }

}