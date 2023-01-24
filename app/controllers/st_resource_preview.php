<?php

class St_resource_preview extends Controller
{
    public function index()
    {
        sessionValidator();
        $this->hasLogged();
        $this->view('student/enrollment/st_quizzes');

    }

    private function hasLogged()
    {
        if (!isset($_SESSION['user'])) {
            header("location:" . BASEURL . "login");
        }

    }


    public function preview($type, $id)
    {
        switch ($type) {
            case 'document':
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'pdf');
                $this->view("resourceCtr/previews/doc_preview",$file);
                break;
            case 'other' :
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'other');
                $this->view("resourceCtr/previews/other_preview",$file);
                break;
            case 'video':
                $file = $this->model("resourceModel")->getResource($id,$_SESSION['gid'],$_SESSION['sid'],'video');
                $resourceData = $this->model("resourceModel")->getVideo($id);
                $this->view("resourceCtr/previews/video_preview",array($file,$resourceData));
                break;
            case 'quiz':
                // todo : under development
                break;
            case 'pastpaper':
                // todo : under development
                break;
        }
    }
}