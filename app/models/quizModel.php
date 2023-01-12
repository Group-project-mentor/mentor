<?php

class quizModel extends Model
{
    public function createQuiz($name, $marks, $id=null, $grade=null, $subject=null){
        $sql = "insert into quiz (name, marks) values ('$name',$marks)";
        if ($id != null){
            $sql = "insert into quiz (id, name, marks) values ($id,'$name',$marks)";
        }
        $res = $this->executeQuery($sql);
        return $res;
    }

    public function getQuizData($id){
        $sql = "select * from quiz where id = $id";
        $res = $this->executeQuery($sql);
        if($res->num_rows > 0){
            return $res->fetch_row();
        }
        else{
            return array(0);
        }
    }

    public function getQuestionData($quiz, $qno){
        $stmt = $this->prepare("select * from question where quiz_id = ? and number = ?");
        $stmt->bind_param('ii',$quiz, $qno);
        $res = $this->fetchOne($stmt);
        if(!empty($res)){
            return $res;
        }
        else{
            return array(0);
        }
    }

    public function getQuestions($id){
        $sql = "select question.id, question.number, question.description from question where quiz_id = $id order by question.number";
        $res = $this->executeQuery($sql);
        if($res->num_rows > 0){
            return $res;
        }
        else{
            return array();
        }
    }

    public function getLastId($table){
        $sql = "select id from $table order by id desc limit 1";
        $res = $this->executeQuery($sql);
        if($res->num_rows > 0){
            return $res->fetch_row();
        }
        else{
            return array(0);
        }
    }

    public function getLastQuestionNo($quizId){
        $sql = "select number from question where quiz_id = $quizId order by number desc limit 1";
        $res = $this->executeQuery($sql);
        if($res->num_rows > 0){
            return $res->fetch_row()[0];
        }else{
            return 0;
        }
    }

    public function getLastAnswerNo($questionId){
        $stmt = $this->prepare("select number from answer where question_id = ? order by number desc limit 1");
        $stmt->bind_param('i', $questionId);
        $res = $this->fetchOne($stmt);
        if(!empty($res)){
            return $res[0];
        }else{
            return 0;
        }
    }

    public  function  insertQuestion($quizNo, $quesNo, $question, $img){
        $sql = "insert into question(number, description, quiz_id, image) values ($quesNo, '$question', $quizNo, '$img')";
        return $this->executeQuery($sql);
    }

    public function isQuizExists($quiz,$question = null){
        if ($question == null){
            $stmt = $this->prepare("select id from quiz where id = ?");
            $stmt->bind_param('i',$quiz);
        }else{
            $stmt = $this->prepare("select id from question where quiz_id = ? and number = ?");
            $stmt->bind_param('ii',$quiz, $question);
        }
        $stmt->execute();
        $res = $stmt->get_result()->fetch_row();
        if(empty($res)){
            return false;
        }else{
            return true;
        }
    }

    public function getQuestionId($quiz, $q_number){
        $stmt = $this->prepare("select id from question where quiz_id=? and number=?");
        $stmt->bind_param('ii', $quiz, $q_number);
        if($stmt->execute()){
            $res = $stmt->get_result()->fetch_row();
            return $res[0];
        }else{
            return 0;
        }
    }

    public function saveAnswer($number, $qid, $desc, $correct, $img){
        $stmt = $this->prepare("insert into answer(number, description, correctness, question_id, image) values (?,?,?,?,?)");
        $stmt->bind_param('isiib',$number,$desc, $correct, $qid, $img);
        return $stmt->execute();
    }

    public function getAnswers($quiz, $ques_id){
        $stmt = $this->prepare("select answer.id, answer.number, answer.description, answer.correctness from answer inner join question on question.id = answer.question_id where answer.question_id = ? and question.quiz_id = ?");
        $stmt->bind_param('ii',$ques_id,$quiz);
        return $this->fetchAll($stmt);
    }

    public function deleteQuestion($question){
        $stmt = $this->prepare("delete from question where question.id = ?");
        $stmt->bind_param('i', $question);
        return $stmt->execute();
    }

    public function getAnswerData($question, $answer){
        $stmt = $this->prepare("select * from answer where answer.question_id = ? and answer.id = ?");
        $stmt->bind_param('ii',$question,$answer);
        return $this->fetchOne($stmt);
    }
    public function updateAnswer($des, $corr, $img, $ans){
        $stmt = $this->prepare("update answer set answer.description=?, answer.correctness=?, answer.image=?  where answer.id = ?");
        $stmt->bind_param('sibi', $des, $corr, $img, $ans);
        return $stmt->execute();
    }
}