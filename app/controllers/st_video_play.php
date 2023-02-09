<?php

class St_video_play extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/enrollment/st_video_play');
    }

    public function preview($type, $id)
    {
        switch ($type) {
            case 'video':
                $file = $this->model("resourceModel")->getResource($id, $_SESSION['gid'], $_SESSION['sid'], 'video');
                $resourceData = $this->model("resourceModel")->getVideo($id);
                $resourceData[4] = $this->filterVideoId($resourceData[4]);
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


    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }
    }
}
