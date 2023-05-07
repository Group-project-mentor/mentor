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
        // $result_state = $this->model('quizModel')->getQuizState($_SESSION['id'],$quizId);  
        // var_dump($result_state);
        // User Quiz eke karala nam record ekk thiyanwa--ethkota results table eke record list eka ganna --- > 
        //state eka check karanna one ----> state 0 nam total-->question ekai ganna one

        $current_q = 0;
        $total = 0;
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

    public function getNextQuestion($quizId, $questionNo,$current_q,$user_score){
        // $current_q aragen result table eka update kala

        $result = $this->model('quizModel')->getQuestion($quizId, $questionNo);
        $answers = $this->model('quizModel')->getAnswers($quizId, $result[0]);
        $noOfQsts = ($this->model('quizModel')->countQuestions($quizId))[0];
        header('Content-Type:Application/json');
        if(!empty($result) or !empty($answers)) {
            echo json_encode(array("question" => $result, "Answers" => $answers, "noOfQsts"=>$noOfQsts));
        }else{
            echo json_encode(array("question" => array(), "Answers" => array(), "noOfQsts"=>$noOfQsts));
        }
    }

    public function countQuestions($quizId){
        return ($this->model('quizModel')->countQuestions($quizId))[0];
    }
}

