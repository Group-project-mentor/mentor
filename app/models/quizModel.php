<?php

class quizModel extends Model
{
    public function createQuiz($name, $marks, $id, $grade, $subject)
    {
        if ($id != null) {
            $stmt = $this->prepare("insert into quiz(id, name, marks) values (?,?,?)");
            $stmt->bind_param('isi', $id, $name, $marks);
        } else {
            $stmt = $this->prepare("insert into quiz(name, marks) values (?,?)");
            $stmt->bind_param('si', $name, $marks);
        }
        return ($this->addResource($id, $grade, $subject, null, 'quiz') && $stmt->execute());
    }

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

    public function insertQuestion($quizNo, $quesNo, $question, $img)
    {
        $stmt = $this->prepare("INSERT INTO question(number, description, quiz_id, image) VALUES (?, ?, ?, ?)");
        $stmt->bind_param('isis', $quesNo, $question, $quizNo, $img);
        // print_r($img);
        // $sql = "insert into question(number, description, quiz_id, image) values ($quesNo, '$question', $quizNo, '$img')";
        return $stmt->execute();
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
        $stmt->bind_param('isiib', $number, $desc, $correct, $qid, $img);
        return $stmt->execute();
    }

    public function getAnswers($quiz, $ques_id)
    {
        $stmt = $this->prepare("select answer.id, answer.number, answer.description, answer.correctness from answer inner join question on question.id = answer.question_id where answer.question_id = ? and question.quiz_id = ?");
        $stmt->bind_param('ii', $ques_id, $quiz);
        return $this->fetchAll($stmt);
    }

    public function deleteQuestion($question)
    {
        $stmt = $this->prepare("delete from question where question.id = ?");
        $stmt->bind_param('i', $question);
        return $stmt->execute();
    }

    public function getAnswerData($question, $answer)
    {
        $stmt = $this->prepare("select * from answer where answer.question_id = ? and answer.id = ?");
        $stmt->bind_param('ii', $question, $answer);
        return $this->fetchOne($stmt);
    }
    public function updateAnswer($des, $corr, $img, $ans)
    {
        $stmt = $this->prepare("update answer set answer.description=?, answer.correctness=?, answer.image=?  where answer.id = ?");
        $stmt->bind_param('sibi', $des, $corr, $img, $ans);
        return $stmt->execute();
    }

    private function addResource($id, $grade, $subject, $file, $type)
    {
        $sql1 = "insert into public_resource values ($id ,'$type', '$file')";
        if (empty($file)) {
            $sql1 = "insert into public_resource(id, type) values ($id ,'$type')";
        }
        $sql2 = "insert into rs_subject_grade values ($id ,$subject ,$grade)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function validateQuiz($qid, $grade, $subject)
    {
        $stmt = $this->prepare("SELECT * FROM rs_subject_grade WHERE rs_subject_grade.rsrc_id =? AND rs_subject_grade.grade_id =? AND rs_subject_grade.grade_id =?");
        $stmt->bind_param('iii', $qid, $grade, $subject);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return true;
        } else {
            return false;
        }
    }

}
