<?php

class Landing extends Controller
{
    public function index()
    {
        $this->view('landing');
    }

    public function registerCreator($part=null){
        if($part=="instructions"){
            $this->view('resourceCtr/registration/instructions');
        }
        else{
            $this->view('resourceCtr/registration/applyForm');
        }
    }


    public function applyCreatorForm(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $message = array("status"=>"","message"=>"");

            $firstname = sanitizeText($_POST['firstName']);
            $lastname = sanitizeText($_POST['lastName']);
            $initialsName = sanitizeText($_POST['fullName']);
            $email = sanitizeText($_POST['email']);
            $tel1 = sanitizeText($_POST['tel1']);
            $tel2 = sanitizeText($_POST['tel2']);
            $address = sanitizeText($_POST['address']);
            $gender = sanitizeText($_POST['gender']);
            $description = sanitizeText($_POST['description']);
            $subjects = sanitizeText($_POST['subjects']);
            $resourceTypes = $_POST['resources'];
            $other = $_POST['otherTypes'];

            $cv = $_FILES['cv'];
            $workSample = $_FILES['workSample']; 

            $resources = "";
            foreach ($resourceTypes as $resourceType){
                $resources = $resources.",".$resourceType;
            }
            
            if($firstname != null && $lastname != null 
                && $initialsName != null && 
                validateEmail($email) && validateTelNo($tel1) && 
                $address != null && $gender != null && $description != null && 
                $subjects != null && $resources != null && 
                isset($cv) && $cv['error'] === 0)
            {

                if($other == ""){
                    $other = null;
                }
                if($tel2 == "" || validateTelNo($tel2) ){
                    $tel2 = null;
                }
                if(isset($workSample) || $workSample['error'] === 0){
                    $exampleName = uniqid($firstname);
                    $exampleTarget = $exampleName.".".pathinfo($workSample['name'], PATHINFO_EXTENSION);
                    $exampleDest = "data/creatorInfo/examples/".$exampleTarget;
                    move_uploaded_file($workSample['tmp_name'], $exampleDest);
                }

                $cvName = uniqid($firstname);
                $cvTarget = $cvName.".".pathinfo($cv['name'], PATHINFO_EXTENSION);
                $cvDest = "data/creatorInfo/cvs/".$cvTarget;

                if(move_uploaded_file($cv['tmp_name'], $cvDest)){
                    $status = $this->model("userModel")->saveAppliedCreator($firstname,$lastname,$initialsName,$email,$tel1,$tel2,$address,$gender,$description,$subjects,$resources,$other, $cvTarget, $exampleTarget);
                    if($status){
                        $message['status'] = "success";
                        $message['message'] = "Successfully applied to be a creator";
                        echo json_encode($message);
                        $mail = "<center><div>
                                <h1 style='color: green;'>M E N T O R</h1>
                                <h3>Hello $initialsName ,</h3>
                                <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
                                Thank you for applying to be a creator in MENTOR. <br> We will contact you soon.
                                </h1>
                                <h5 style='color:red;'>message from MENTOR team</h5>
                            </div></center>";
;
                        sendMail($email,$initialsName,"Applied to be a creator in MENTOR",$mail);
                    }else{
                        $message['status'] = "error";
                        $message['message'] = "Error in applying to be a creator";
                    }
                }else{
                    $message['status'] = "error";
                    $message['message'] = "Error in uploading CV";
                    echo json_encode($message);
                }
            }else{
                $message['status'] = "error";
                $message['message'] = "Please fill all the fields";            
                echo json_encode($message);
            }
        }else{
            header("location".BASEURL."landing/registerCreator");
        }
    }

    public function registerSponsor($part=null){
        if($part=="instructions"){
            $this->view('sponsor/registration/instructions');
        }
        else{
            $this->view('sponsor/registration/applyForm');
        }
    }

    public function applySponsorForm(){
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            $message = array("status"=>"","message"=>"");

            $firstname = sanitizeText($_POST['firstName']);
            $lastname = sanitizeText($_POST['lastName']);
            $initialsName = sanitizeText($_POST['fullName']);
            $email = sanitizeText($_POST['email']);
            $tel1 = sanitizeText($_POST['tel1']);
            $tel2 = sanitizeText($_POST['tel2']);
            $address = sanitizeText($_POST['address']);
            $howKnew = sanitizeText($_POST['howKnew']);
            $maxAmount = $_POST['maxAmount'];
            
            if($firstname != null && $lastname != null 
                && $initialsName != null && 
                validateEmail($email) && validateTelNo($tel1) && 
                $address != null && $howKnew != null && 
                $maxAmount <= 50000 && 
                $maxAmount >= 5000)
            {
                if($tel2 == "" || validateTelNo($tel2) ){
                    $tel2 = null;
                }

                    $status = $this->model("userModel")->saveAppliedSponsor($firstname,$lastname,$initialsName,$email,$tel1,$tel2,$address,$howKnew,$maxAmount);
                    if($status){
                        $message['status'] = "success";
                        $message['message'] = "Successfully applied to be a sponsor";
                        echo json_encode($message);
                        $mail = "<center><div>
                                <h1 style='color: green;'>M E N T O R</h1>
                                <h3>Hello $initialsName ,</h3>
                                <h1 style='letter-spacing: 4px;background-color:#EEE;padding:10px 15px;border-radius: 10px;border: 1px solid #CCC;'>
                                Thank you for applying to be a sponsor in MENTOR. <br> We will contact you soon. Thank you for your support.
                                </h1>
                                <h5 style='color:red;'>message from MENTOR team</h5>
                            </div></center>";
;
                        sendMail($email,$initialsName,"Applied to be a creator in MENTOR",$mail);
                    }else{
                        $message['status'] = "error";
                        $message['message'] = "Error in applying to be a creator";
                        echo json_encode($message);
                    }
            }else{
                $message['status'] = "error";
                $message['message'] = "Please fill all the fields";            
                echo json_encode($message);
            }
        }else{
            header("location".BASEURL."landing/registerSponsor");
        }
    }
}

