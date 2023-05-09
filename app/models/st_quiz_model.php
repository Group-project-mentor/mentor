<?php

class St_quiz_model extends Model
{

    public function getQuiz( $id,$offset=null, $limit=null)   // get questions from the DB 
    {
        $q = "SELECT quiz.id , quiz.name , question.number , question.description , question.image FROM 
        ( question INNER JOIN quiz on question.quiz_id = quiz.id ) WHERE quiz.id = ? LIMIT ?,?; ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('iii',$id,$offset,$limit);
        return $this->fetchObjs($stmt);
    }

    public function getQuizendData( $id,$cid)   // get questions from the DB 
    {
        $q = "SELECT quizresults.current_q , quizresults.score, quiz.questions , quiz.marks FROM quizresults 
        INNER JOIN quiz ON quizresults.quiz_id = quiz.id WHERE quizresults.user_id=? AND quiz.id = ?; ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$id,$cid);
        return $this->fetchOneObj($stmt);
    }

}
