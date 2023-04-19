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

    public function videos($cid,$page=1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $this->getClass($cid);
        $rowCount = $this->model("TchResourceModel")->getResourceCount("video", $cid)->count;
        $_SESSION["cid"] = $cid;
        $result = $this->model("TchResourceModel")->findVideos($cid, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {
            header("location:" . BASEURL . "TResources/videos/" . $cid);
        }
        $this->view('Teacher/resources/video', array($result, $pageData));
    }

    public function documents($cid, $page = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["cid"] = $cid;
        $this->getClass($cid);
        $rowCount = $this->model("TchResourceModel")->getResourceCount("pdf", $cid)->count;
        $result = $this->model("TchResourceModel")->findDocuments($cid, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "TResources/document/" . $cid );
        }
        $this->view('Teacher/resources/document', array($result, $pageData));
    }

    public function others($cid, $page = 1)
    {
        $limit = paginationRowLimit;
        $offset = ($page != 1) ? ($page - 1) * $limit : 0;
        $_SESSION["cid"] = $cid;
        $this->getClass($cid);
        $rowCount = $this->model("TchResourceModel")->getResourceCount("other", $cid)->count;
        $result = $this->model("TchResourceModel")->findOthers($cid, $offset, $limit);
        $pageData = array($page, ceil($rowCount / $limit));
        if ($page < 1 || ($page > $pageData[1] and $pageData[1] != 0)) {

            header("location:" . BASEURL . "TResources/others/" . $cid );
        }
        $this->view('Teacher/resources/others', array($result, $pageData));
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
                $this->view("Teacher/preview/doc_preview",$file);
                break;
            case 'other' :
                $file = $this->model("TchResourceModel")->getResource($id,$_SESSION['cid'],'other');
                $this->view("Teacher/preview/other_preview",$file);
                break;
            case 'video':
                $file = $this->model("TchResourceModel")->getResource($id,$_SESSION['cid'],'video');
                $resourceData = $this->model("TChResourceModel")->getVideo($id);
                if($resourceData[6] === "L")
                    $resourceData[4] = $this->filterVideoId($resourceData[4]);
                $this->view("Teacher/preview/video_preview",array($file,$resourceData));
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