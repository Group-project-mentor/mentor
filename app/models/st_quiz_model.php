<?php

class St_quiz_model extends Model
{

    public function getQuiz( $id,$offset, $limit)   // get questions from the DB 
    {
        $q = "SELECT quiz.id , quiz.name , question.number , question.description , question.image FROM 
        ( question INNER JOIN quiz on question.quiz_id = quiz.id ) WHERE quiz.id = ? LIMIT ?,?; ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('iii',$id,$offset,$limit);
        return $this->fetchObjs($stmt);
    }

}
