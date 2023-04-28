<?php 

class Notification extends Controller{
    private string $userType;
    private int $user;

    public function __construct(){
        sessionValidator();
        $this->userType = $_SESSION['usertype'];
        $this->user = $_SESSION['id'];
    }

    public function index(){
        $data = $this->model('notificationModel')->getAllNotifications($_SESSION['id']);
        switch ($_SESSION['usertype']){
            case "rc":
                $this->view('resourceCtr/notifications/main',array($data));
                break;
            case "sp":
                $this->view('sponsor/notifications/main',array($data));
                break;
            case "tch":
                $this->view('Teacher/notification/main',array($data));
                break;
            case "st":
                $this->view('Student/notifications/main',array($data));
                break;
        }

    }

    public function deleteNotification($id){
        $this->model("notificationModel")->deleteNotification($id);
        header("Location: ".BASEURL."/notification");
    }

    public function readNotification($id){
        $this->model("notificationModel")->readNotification($id);
        header("Location: ".BASEURL."/notification");
    }

    public function delAllReadNotifi(){
        $this->model("notificationModel")->deleteAllNotifications($_SESSION['id'], 1);
        header("Location: ".BASEURL."/notification");
    }
} 