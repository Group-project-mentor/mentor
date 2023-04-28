<?php

class St_quiz_model extends Model
{
    public function getQuizData($id)
    {
        $sql = "select * from quiz where id = $id";
        $res = $this->executeQuery($sql);
        if ($res->num_rows > 0) {
            return $res->fetch_row();
        } else {
            return array(0);
        }
    }

    public function getQuiz( $id)   // get questions from the DB 
    {
        $q = "SELECT quiz.id , quiz.name , question.number , question.description , question.image FROM 
        ( question INNER JOIN quiz on question.quiz_id = quiz.id ) WHERE quiz.id = ? ; ";
        $stmt = $this->prepare($q);
        $stmt->bind_param('i',$id);
        return $this->fetchObjs($stmt);
    }

    public function getQuestionData($quiz, $qno)
    {
        $stmt = $this->prepare("select * from question where quiz_id = ? and number = ?");
        $stmt->bind_param('ii', $quiz, $qno);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return $res;
        } else {
            return array(0);
        }
    }

    public function getQuestions($id)
    {
        $sql = "select question.id, question.number, question.description from question where quiz_id = $id order by question.number";
        $res = $this->executeQuery($sql);
        if ($res->num_rows > 0) {
            return $res;
        } else {
            return array();
        }
    }

    public function getLastId($table)
    {
        $sql = "select id from $table order by id desc limit 1";
        $res = $this->executeQuery($sql);
        if ($res->num_rows > 0) {
            return $res->fetch_row();
        } else {
            return array(0);
        }
    }

    public function getLastQuestionNo($quizId)
    {
        $sql = "select number from question where quiz_id = $quizId order by number desc limit 1";
        $res = $this->executeQuery($sql);
        if ($res->num_rows > 0) {
            return $res->fetch_row()[0];
        } else {
            return 0;
        }
    }

    public function getLastAnswerNo($questionId)
    {
        $stmt = $this->prepare("select number from answer where question_id = ? order by number desc limit 1");
        $stmt->bind_param('i', $questionId);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return $res[0];
        } else {
            return 0;
        }
    }

    public function isQuizExists($quiz, $question = null)
    {
        if ($question == null) {
            $stmt = $this->prepare("select id from quiz where id = ?");
            $stmt->bind_param('i', $quiz);
        } else {
            $stmt = $this->prepare("select id from question where quiz_id = ? and number = ?");
            $stmt->bind_param('ii', $quiz, $question);
        }
        $stmt->execute();
        $res = $stmt->get_result()->fetch_row();
        if (empty($res)) {
            return false;
        } else {
            return true;
        }
    }

    public function getQuestionId($quiz, $q_number)
    {
        $stmt = $this->prepare("select id from question where quiz_id=? and number=?");
        $stmt->bind_param('ii', $quiz, $q_number);
        if ($stmt->execute()) {
            $res = $stmt->get_result()->fetch_row();
            return $res[0];
        } else {
            return 0;
        }
    }

    public function saveAnswer($number, $qid, $desc, $correct, $img)
    {
        $stmt = $this->prepare("insert into answer(number, description, correctness, question_id, image) values (?,?,?,?,?)");
        $stmt->bind_param('isiis', $number, $desc, $correct, $qid, $img);
        return $stmt->execute();
    }

    public function getAnswers($quiz, $ques_id)
    {
        $stmt = $this->prepare("select answer.id, answer.number, answer.description, answer.correctness, answer.image from answer inner join question on question.id = answer.question_id where answer.question_id = ? and question.quiz_id = ?");
        $stmt->bind_param('ii', $ques_id, $quiz);
        return $this->fetchAll($stmt);
    }

    public function getAnswerData($question, $answer)
    {
        $stmt = $this->prepare("select * from answer where answer.question_id = ? and answer.id = ?");
        $stmt->bind_param('ii', $question, $answer);
        return $this->fetchOne($stmt);
    }



    public function verifyAndQuizId($qid, $grade, $subject)
    {
        $stmt = $this->prepare("SELECT rs_subject_grade.rsrc_id FROM rs_subject_grade WHERE rs_subject_grade.rsrc_id =? AND rs_subject_grade.grade_id =? AND rs_subject_grade.subject_id =?");
        $stmt->bind_param('iii', $qid, $grade, $subject);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return $res[0];
        } else {
            return 0;
        }
    }

    public function getQuestion($quizId,$ordNo){
        $stmt = $this->prepare("SELECT * FROM question where quiz_id = ? order by number limit 1 offset ?");
        $stmt->bind_param('ii',$quizId, $ordNo);
        return $this->fetchOne($stmt);
    }

    public function countQuestions($quizId){
        $stmt = $this->prepare("SELECT count(id) FROM question WHERE quiz_id = ?");
        $stmt->bind_param('i', $quizId);
        return $this->fetchOne($stmt);
    }


}
