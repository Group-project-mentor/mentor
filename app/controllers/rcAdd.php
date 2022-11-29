<?php 

class RcAdd extends Controller{
    public function __construct(){
        sessionValidator();
    }

    public function index(){
        header("location:".BASEURL."subjects");
    }

// functions for render "upload each resource"
    public function other($message=null){
        $data = array("$message","other");
        $this->view("resourceCtr/uploadViews/rc_upload_other",$data);
    }

    public function document($message=null){
        $data = array("$message","document");
        $this->view("resourceCtr/uploadViews/rc_upload_document",$data);
    }


// these are for get upload data  
    public function addDocument($grade, $subject){
        // $maxFileSize = 50*1024*1024;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0){
                $typeArray = array("pdf"=>"application/pdf");
                $fileData = array(  "name"=>$_FILES["resource"]["name"],
                                    "type"=>$_FILES["resource"]["type"],
                                    "size"=>$_FILES["resource"]["size"]);
                $extention = pathinfo($fileData["name"],PATHINFO_EXTENSION);
                if(!array_key_exists($extention, $typeArray)) die("Error: Please select a valid file format.");
                // if($fileData["size"] > $maxFileSize) die("Error: File size is larger than the allowed limit.");
                $nameId = $this->getId();
                if(in_array($fileData['type'],$typeArray)){
                    $newFileName = uniqid() . "_" . $fileData["name"];
                    $fileDest = "public_resources/documents/".$newFileName;
                    if(!file_exists($fileDest)){
                       move_uploaded_file($_FILES["resource"]["tmp_name"],$fileDest);
                       if($this->model("resourceModel")->addDocument($nameId, $grade, $subject, $_POST["title"],$newFileName)){
                           header("location:".BASEURL."rcAdd/document/success");
                       }
                       else{
                           header("location:".BASEURL."rcAdd/document/error");
                       }
                    }
                    else{
                       echo "Upload unsuccessful !";
                       header("location:".BASEURL."rcAdd/document/error");
                    }
                }
            }
        }
    }

    public function addOther($grade, $subject){
        $maxFileSize = 50*1024*1024;
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_FILES["resource"]) && $_FILES["resource"]["error"] == 0){
                // $typeArray = array("pdf"=>"application/pdf");
                $fileData = array(  "name"=>$_FILES["resource"]["name"],
                                    "type"=>$_FILES["resource"]["type"],
                                    "size"=>$_FILES["resource"]["size"]);
                $extention = pathinfo($fileData["name"],PATHINFO_EXTENSION);
                // echo $extention=="pdf";
                // if(!array_key_exists($extention, $typeArray)) header("location:" . BASEURL . "add/document/error");
                if($fileData["size"] > $maxFileSize) header("location:" . BASEURL . "rcAdd/document/error");

                $nameId = $this->getId();
                // if(in_array($fileData['type'],$typeArray)){
                $newFileName = uniqid() . "_" . $fileData["name"];
                $fileDest = "public_resources/others/".$newFileName;
                // var_dump($fileDest);
                if(!file_exists($fileDest)){
                   move_uploaded_file($_FILES["resource"]["tmp_name"],$fileDest);
                //    echo "Upload successful !";
                   if($this->model("resourceModel")->addOther($nameId, $grade, $subject, $_POST["title"],$newFileName,$extention)){
                       header("location:".BASEURL."rcAdd/other/success");
                   }
                   else{
                       header("location:".BASEURL."rcAdd/other/error");
                   }
                }
                else{
                   echo "Upload unsuccessful !";
                   header("location:".BASEURL."rcAdd/other/error");
                }
                // }
            }
        }
    }

// get the most id from table
    private function getId(){
        $result = $this->model("resourceModel")->getLastId();
        return $result+1;
    }
}

?>