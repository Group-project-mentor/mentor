<?php

class quizModel extends Model
{
    public function createQuiz($name, $marks, $id, $grade, $subject,$creator)
    {
        if ($id != null) {
            $stmt = $this->prepare("insert into quiz(id, name, marks) values (?,?,?)");
            $stmt->bind_param('isi', $id, $name, $marks);
        } else {
            $stmt = $this->prepare("insert into quiz(name, marks) values (?,?)");
            $stmt->bind_param('si', $name, $marks);
        }
        return ($this->addResource($id, $grade, $subject, null, 'quiz',$creator) && $stmt->execute());
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

    public function getQuiz( $id, $grade, $subject)
    {
        $stmt = $this->prepare("SELECT quiz.id, quiz.name, quiz.marks, quiz.questions FROM quiz,public_resource WHERE quiz.id = public_resource.id AND quiz.id = ? and 
                public_resource.id IN (SELECT rsrc_id FROM `rs_subject_grade` WHERE subject_id= ? AND grade_id= ?)");
        $stmt->bind_param('iii',$id,$subject, $grade);
        return $this->fetchOneObj($stmt);
    }
    public function editQuiz( $id, $name, $marks)
    {
        $stmt = $this->prepare("UPDATE quiz SET quiz.name=? , quiz.marks=? WHERE quiz.id = ? ");
        $stmt->bind_param('sii', $name,$marks, $id);
        return $this->executePrepared($stmt);
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
    public function getQuestionDataByID($qid)
    {
        $stmt = $this->prepare("select * from question where id = ?");
        $stmt->bind_param('i', $qid);
        return $this->fetchOneObj($stmt);
    }

    public function getQuizState($user_id,$quiz_id)
    {
        $q = "SELECT * FROM `quizresults` WHERE quiz_id = ? AND user_id = ? ;";
        $stmt = $this->prepare($q);
        $stmt->bind_param('ii',$quiz_id,$user_id);
        $res = $this->fetchOneObj($stmt);
        return $res;
        // if ( $res-> > 0) {
        //     return $res;
        // } else {
        //     return array();
        // }
    }

    public function getQuestions($id)
    {
        $sql = "select question.id, question.number, question.description, question.image from question where quiz_id = $id order by question.number";
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

    public function insertQuestion($quizNo, $quesNo, $question, $img = null)
    {
        if (empty($img)) {
            $stmt = $this->prepare("INSERT INTO question(number, description, quiz_id) VALUES (?, ?, ?)");
            $stmt->bind_param('isi', $quesNo, $question, $quizNo);
        }else{
            $stmt = $this->prepare("INSERT INTO question(number, description, quiz_id, image) VALUES (?, ?, ?, ?)");
            $stmt->bind_param('isis', $quesNo, $question, $quizNo, $img);
        }
        return $stmt->execute();
    }

    public function isQuizExists($quiz, $question = null)
    {
        if (empty($question)) {
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

    public function saveAnswer($number, $qid, $desc, $correct, $img = null)
    {
        if (empty($img)) {
            $stmt = $this->prepare("insert into answer(number, description, correctness, question_id) values (?,?,?,?)");
            $stmt->bind_param('isii', $number, $desc, $correct, $qid);
        }else{
            $stmt = $this->prepare("insert into answer(number, description, correctness, question_id, image) values (?,?,?,?,?)");
            $stmt->bind_param('isiis', $number, $desc, $correct, $qid, $img);
        }
        return $stmt->execute();
    }

    public function getAnswers($quiz, $ques_id)
    {
        $stmt = $this->prepare("select answer.id, answer.number, answer.description, answer.correctness, answer.image from answer inner join question on question.id = answer.question_id where answer.question_id = ? and question.quiz_id = ?");
        $stmt->bind_param('ii', $ques_id, $quiz);
        return $this->fetchAll($stmt);
    }

    public function deleteQuestion($question)
    {
        $stmt1 = $this->prepare("delete from question where question.id = ?");
        $stmt1 ->bind_param('i', $question);
        $stmt2 = $this->prepare("delete from answer where answer.question_id = ?");
        $stmt2 ->bind_param('i',$question);
        return ($stmt1 ->execute() and $stmt2->execute());
    }


    public function getAnswerData($question, $answer)
    {
        $stmt = $this->prepare("select * from answer where answer.question_id = ? and answer.id = ?");
        $stmt->bind_param('ii', $question, $answer);
        return $this->fetchOne($stmt);
    }

    public function delAnswer($answer)
    {
        $stmt = $this->prepare("delete from answer where answer.id = ?");
        $stmt->bind_param('i', $answer);
        return $stmt->execute();
    }

    public function updateAnswer($des, $corr, $img, $ans)
    {
        $stmt = $this->prepare("update answer set answer.description=?, answer.correctness=?, answer.image=?  where answer.id = ?");
        $stmt->bind_param('sisi', $des, $corr, $img, $ans);
        return $stmt->execute();
    }

    private function addResource($id, $grade, $subject, $file, $type,$creator)
    {
        $sql1 = "insert into public_resource values ($id ,'$type', '$file',NULL,NULL)";
        if (empty($file)) {
            $sql1 = "insert into public_resource(id, type) values ($id ,'$type')";
        }
        $sql2 = "insert into rs_subject_grade values ($id ,$subject ,$grade,$creator)";
        return ($this->executeQuery($sql1) && $this->executeQuery($sql2));
    }

    public function validateQuiz($qid, $grade, $subject)
    {
        $stmt = $this->prepare("SELECT * FROM rs_subject_grade WHERE rs_subject_grade.rsrc_id =? AND rs_subject_grade.grade_id =? AND rs_subject_grade.subject_id =?");
        $stmt->bind_param('iii', $qid, $grade, $subject);
        $res = $this->fetchOne($stmt);
        if (!empty($res)) {
            return true;
        } else {
            return false;
        }
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

    public function updateQuestionResult($quizId, $user_id, $user_score,$current_q, $status){
        $stmt = $this->prepare("UPDATE quizresults SET quizresults.current_q = ? , quizresults.score = ?, quizresults.status = 1 WHERE quizresults.user_id = ? AND quizresults.quiz_id = ?;");
        $stmt->bind_param('iiii',$current_q, $user_score, $user_id, $quizId);
        return $this->executePrepared($stmt);
    }

    public function getQuestionByOrd($quizId,$ordNo){
        if($this->countQuestions($quizId)[0] == 1){
            $stmt = $this->prepare("SELECT * FROM question where quiz_id = ? LIMIT 1");
            $stmt->bind_param('i',$quizId);
        }else{
            $stmt = $this->prepare("SELECT * FROM question where quiz_id = ? order by number limit 1 , ?");
            $stmt->bind_param('ii',$quizId, $ordNo);
        }
        return $this->fetchOne($stmt);
    }

    public function get_question($quizId,$question){
        $stmt = $this->prepare("SELECT * FROM question where quiz_id = ? and id = ?");
        $stmt->bind_param('ii',$quizId, $question);
        return $this->fetchOne($stmt);
    }

    public function countQuestions($quizId){
        $stmt = $this->prepare("SELECT count(id) FROM question WHERE quiz_id = ?");
        $stmt->bind_param('i', $quizId);
        return $this->fetchOne($stmt);
    }

    public function updateQuestion($id, $desc, $img){
        $stmt = $this->prepare("UPDATE question SET description = ?, image = ? WHERE id = ?");
        $stmt->bind_param('ssi', $desc, $img, $id);
        return $this->executePrepared($stmt);
    }

    public function markAllWrong($question){
        $stmt = $this->prepare('UPDATE answer SET answer.correctness = 0 WHERE answer.question_id = ?');
        $stmt->bind_param('i',$question);
        return $this->executePrepared($stmt);
    }

    public function markCorrectness($answer){
        $stmt = $this->prepare('UPDATE answer SET answer.correctness = 1 WHERE answer.id = ?');
        $stmt->bind_param('i', $answer);
        return $this->executePrepared($stmt);
    }




}
