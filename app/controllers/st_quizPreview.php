<?php

class St_quizPreview extends Controller{
    public function __construct()
    {
        session_start();
        flashMessage();
    }

    public function index(){
        
    }

    public function quizStart(){
        
    }

    public function question($quizId){
        $result = $this->model('quizModel')->verifyAndQuizId($quizId, $_SESSION['gid'], $_SESSION['sid']);
        if($result){
            $this->view("quizModule/rc/quiz_preview/question",array($quizId));
        }else{
            header("location:");
        }
    }

    public function instructions($quizId){
        $result = $this->model('quizModel')->verifyAndQuizId($quizId, $_SESSION['gid'], $_SESSION['sid']);
        if($result){
            $this->view("quizModule/rc/quiz_preview/quiz_instructions",array($quizId));
        }else{
            header("location:");
        }
    }


    public function getQuestion($quizId){
         $result_state = $this->model('quizModel')->getQuizState($_SESSION['id'],$quizId);
        if($result_state->status == 0){
            $current_q = 0;
            $total = 0;
        }else{
            $current_q = $result_state->current_q;
            $total = $result_state->score;
        }
        $qCount = $this->model('quizModel')->countQuestions($quizId);
        if($qCount[0] == $current_q){
            header('Content-Type:Application/json');
            echo json_encode(array("end"=> 1));
        }else{


            // record ek thiboth , total ekath gaini
            $result = $this->model('quizModel')->getQuestion($quizId, $current_q);
            $answers = $this->model('quizModel')->getAnswers($quizId, $result[0]);
            $noOfQsts = ($this->model('quizModel')->countQuestions($quizId))[0];
            header('Content-Type:Application/json');
            if(!empty($result) or !empty($answers)) {
                echo json_encode(array("question" => $result, "Answers" => $answers, "noOfQsts"=>$noOfQsts, "total"=> $total, "current_q"=>$current_q));
            }else{
                echo json_encode(array("question" => array(), "Answers" => array(), "noOfQsts"=>$noOfQsts,"total"=> $total, "current_q"=>$current_q));
            }
        }

    }

    public function getNextQuestion($quizId, $questionNo,$user_score){
        $qCount = $this->model('quizModel')->countQuestions($quizId);
        $res = $this->model("quizModel")->updateQuestionResult($quizId, $_SESSION['id'], $user_score, $questionNo+1, 1);
        if($qCount[0] == $questionNo+1){
            header('Content-Type:Application/json');
            echo json_encode(array("total"=> $user_score, "current_q"=>$questionNo+1, "end"=> 1));
        }else{
            $result = $this->model('quizModel')->getQuestion($quizId, $questionNo+1);
            $answers = $this->model('quizModel')->getAnswers($quizId, $result[0]);
            $noOfQsts = ($this->model('quizModel')->countQuestions($quizId))[0];
            header('Content-Type:Application/json');
            if(!empty($result) or !empty($answers)) {
                echo json_encode(array("question" => $result, "Answers" => $answers, "noOfQsts"=>$noOfQsts, "total"=> $user_score, "current_q"=>$questionNo+1));
            }else{
                echo json_encode(array("question" => array(), "Answers" => array(), "noOfQsts"=>$noOfQsts, "total"=> $user_score, "current_q"=>$questionNo+1));
            }
        }


    }

    public function countQuestions($quizId){
        return ($this->model('quizModel')->countQuestions($quizId))[0];
    }
}

