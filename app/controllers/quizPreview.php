<?php

class QuizPreview extends Controller{
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

    public function getQuestion($quizId, $questionNo){
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

