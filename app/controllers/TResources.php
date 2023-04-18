<?php

class TResources extends Controller{
    private $user = "tch";

public function __construct()
{
    sessionValidator();
    $this->userValidate($this->user);
    flashMessage();
}


    public function forum(){
        $this->view('Teacher/resources/forum');
    }   

    public function resource(){
        $this->view('Teacher/resources/resource');
    } 

    public function resourceOne(){
        $this->view('Teacher/resources/resourceOne');
    }

    public function index(){
        $this->view('Teacher/resources/video');
    }

    public function videos($cid)
    {
        echo "called";
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
        $this->getClass($cid);
        $_SESSION["cid"] = $cid;
        $result = $this->model("TchresourceModel")->findVideos($cid);
        
        $this->view('Teacher/resources/video',array($result));
    }

    private function getClass($class_id)
    {
        if (!isset($_SESSION["cid"])) {
            $result1 = $this->model("classModel")->getClassId($class_id)[1];
            $_SESSION["cid"] = $result1;
        }
    }

    public function preview($type, $id){
        switch ($type) {
            case 'document':
                $file = $this->model("TchResourceModel")->getResource($id,$_SESSION['cid'],'pdf');
                $this->view("resourceCtr/previews/doc_preview",$file);
                break;
            case 'other' :
                $file = $this->model("TchResourceModel")->getResource($id,$_SESSION['cid'],'other');
                $this->view("resourceCtr/previews/other_preview",$file);
                break;
            case 'video':
                $file = $this->model("TchResourceModel")->getResource($id,$_SESSION['cid'],'video');
                $resourceData = $this->model("TChResourceModel")->getVideo($id);
                if($resourceData[6] === "L")
                    $resourceData[4] = $this->filterVideoId($resourceData[4]);
                $this->view("resourceCtr/previews/video_preview",array($file,$resourceData));
                break;
            case 'pastpaper':
                // todo : under development
                break;
        }
    }

    private function filterVideoId($link){
        $splitted_link = explode('/',$link);
        if($splitted_link[2] == "youtu.be"){
            return "https://www.youtube.com/embed/".$splitted_link[3];
        }
        elseif($splitted_link[2] == "www.youtube.com"){
            $splitted_link = explode('=',$splitted_link[3]);
            return "https://www.youtube.com/embed/".$splitted_link[1];
        }
        else{
            return $link;
        }
        // var_dump($splitted_link);
    }
}

?>