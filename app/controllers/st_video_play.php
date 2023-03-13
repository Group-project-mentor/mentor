<?php

class St_video_play extends Controller
{
    public function __construct(){
        sessionValidator();
        //$this->hasLogged();
    }

    public function index()
    {
        $this->view('student/enrollment/st_video_play');
    }

    public function preview($type, $id)
    {

       // echo $_SESSION['gid'];
        switch ($type) {
            case 'video':
                $file = $this->model("st_public_model")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'video');
                
                $resourceData = $this->model("st_public_model")->getVideo($id,$_SESSION['sid'],$_SESSION['gid']);
                //var_dump($resourceData);
                if($resourceData->type === "L")
                    $resourceData->link = $this->filterVideoId($resourceData->link);
                $this->view("student/enrollment/st_video_play", array($file, $resourceData));
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
