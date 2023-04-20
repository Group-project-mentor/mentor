<?php

class TquizModel extends Model
{
    public function createQuiz($name, $marks, $id, $cid,$creator)
    {
        if ($id != null) {
            $stmt = $this->prepare("insert into teacher_quiz(id, name, marks) values (?,?,?)");
            $stmt->bind_param('isi', $id, $name, $marks);
        } else {
            $stmt = $this->prepare("insert into teacher_quiz(name, marks) values (?,?)");
            $stmt->bind_param('si', $name, $marks);
        }
        return ($this->addResource($id, $cid, null, 'quiz',$creator) && $stmt->execute());
    }

    public function getQuizData($id)
    {
        $sql = "select * from teacher_quiz where id = $id";
        $res = $this->executeQuery($sql);
        if ($res->num_rows > 0) {
            return $res->fetch_row();
        } else {
            return array(0);
        }
    }

    public function getQuiz( $id, $cid)
    {
        $stmt = $this->prepare("SELECT teacher_quiz.id, teacher_quiz.name, teacher_quiz.marks, teacher_quiz.questions FROM teacher_quiz,private_resource WHERE teacher_quiz.id = private_resource.id AND teacher_quiz.id = ? and 
                private_resource.id IN (SELECT rs_id FROM `teacher_class_resources` WHERE class_id= ?)");
        $stmt->bind_param('ii',$id,$cid);
        return $this->fetchOneObj($stmt);
    }
    public function editQuiz( $id, $name, $marks)
    {
        $stmt = $this->prepare("UPDATE teacher_quiz SET teacher_quiz.name=? , teacher_quiz.marks=? WHERE teacher_quiz.id = ? ");
        $stmt->bind_param('sii', $name,$marks, $id);
        return $this->executePrepared($stmt);
    }

    public function getQuestionData($quiz, $qno)
    {
        $stmt = $this->prepare("select * from teacher_question where quiz_id = ? and number = ?");
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
        $sql = "select teacher_question.id, teacher_question.number, teacher_question.description from teacher_question where quiz_id = $id order by teacher_question.number";
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
        $sql = "select number from teacher_question where quiz_id = $quizId order by number desc limit 1";
        $res = $this->executeQuery($sql);
        if ($res->num_rows > 0) {
            return $res->fetch_row()[0];
        } else {
            return 0;
        }
    }

    public function getLastAnswerNo($questionId)
    {
        $stmt = $this->prepare("select number from teacher_answer where teacher_question_id = ? order by number desc limit 1");
        $stmt->bind_param('i', $questionId);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return $res[0];
        } else {
            return 0;
        }
    }

    public function insertQuestion($quizNo, $quesNo, $question, $img)
    {
        $stmt = $this->prepare("INSERT INTO teacher_question(number, description, quiz_id, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isis', $quesNo, $question, $quizNo, $img);
        // print_r($img);
        // $sql = "insert into question(number, description, quiz_id, image) values ($quesNo, '$question', $quizNo, '$img')";
        return $stmt->execute();
    }

    public function isQuizExists($quiz, $question = null)
    {
        if ($question == null) {
            $stmt = $this->prepare("select id from teacher_quiz where id = ?");
            $stmt->bind_param('i', $quiz);
        } else {
            $stmt = $this->prepare("select id from teacher_question where quiz_id = ? and number = ?");
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
        $stmt = $this->prepare("select id from teacher_question where quiz_id=? and number=?");
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
        $stmt = $this->prepare("insert into teacher_answer(number, description, correctness, question_id, image) values (?,?,?,?,?)");
        $stmt->bind_param('isiis', $number, $desc, $correct, $qid, $img);
        return $stmt->execute();
    }

    public function getAnswers($quiz, $ques_id)
    {
        $stmt = $this->prepare("select teacher_answer.id, teacher_answer.number, teacher_answer.description, teacher_answer.correctness, teacher_answer.image from teacher_answer inner join teacher_question on teacher_question.id = teacher_answer.question_id where teacher_answer.question_id = ? and teacher_question.quiz_id = ?");
        $stmt->bind_param('ii', $ques_id, $quiz);
        return $this->fetchAll($stmt);
    }

    public function deleteQuestion($question)
    {
        $stmt1 = $this->prepare("delete from teacher_question where teacher_question.id = ?");
        $stmt1 ->bind_param('i', $question);
        $stmt2 = $this->prepare("delete from teacher_answer where teacher_answer.question_id = ?");
        $stmt2 ->bind_param('i',$question);
        return ($stmt1 ->execute() and $stmt2->execute());
    }

    public function getAnswerData($question, $answer)
    {
        $stmt = $this->prepare("select * from teacher_answer where teacher_answer.question_id = ? and teacher_answer.id = ?");
        $stmt->bind_param('ii', $question, $answer);
        return $this->fetchOne($stmt);
    }
    public function updateAnswer($des, $corr, $img, $ans)
    {
        $stmt = $this->prepare("update teacher_answer set teacher_answer.description=?, teacher_answer.correctness=?, teacher_answer.image=?  where answer.id = ?");
        $stmt->bind_param('sibi', $des, $corr, $img, $ans);
        return $stmt->execute();
    }

    private function addResource($id, $cid, $file, $type,$creator)
    {
        $sql1 = "insert into private_resource values ($id ,'$type', '$file')";
        if (empty($file)) {
            $sql1 = "insert into private_resource(id, type) values ($id ,'$type')";
        }
        $sql2 = "insert into teacher_class_resources values ($id ,$cid ,$creator)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }
    
    public function validateQuiz($qid, $cid)
    {
        $stmt = $this->prepare("SELECT * FROM teacher_class_resources WHERE teacher_class_resources.rs_id =? AND teacher_class_resources.class_id =?");
        $stmt->bind_param('ii', $qid, $cid);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return true;
        } else {
            return false;
        }
    }

    public function verifyAndQuizId($qid, $cid)
    {
        $stmt = $this->prepare("SELECT teacher_class_resources.rs_id FROM teacher_class_resources WHERE teacher_class_resources.rs_id =? AND teacher_class_resources.class_id =?");
        $stmt->bind_param('ii', $qid, $cid);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return $res[0];
        } else {
            return 0;
        }
    }

    public function getQuestion($quizId,$ordNo){
        $stmt = $this->prepare("SELECT * FROM teacher_question where quiz_id = ? order by number limit 1 offset ?");
        $stmt->bind_param('ii',$quizId, $ordNo);
        return $this->fetchOne($stmt);
    }

    public function countQuestions($quizId){
        $stmt = $this->prepare("SELECT count(id) FROM teacher_question WHERE quiz_id = ?");
        $stmt->bind_param('i', $quizId);
        return $this->fetchOne($stmt);
    }

}
