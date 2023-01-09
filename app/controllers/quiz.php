<?php

class Quiz extends Controller
{
    public function __construct()
    {
        session_start();
    }

    public function index()
    {
        header("location:" . BASEURL . "quiz/create"); // for default quiz route
    }

    public function create($msg = null)
    {
        $this->view('quizModule/rc/createQuiz', $msg);
    }

    public function createAction()
    {
        $id = $this->model('quizModel')->getLastId('quiz')[0] + 1;
        if ($this->model('quizModel')->createQuiz($_POST['quiz_name'], $_POST['tot_mark'], $id)) {
//            $_SESSION['quiz'] = $id;
            header("location:" . BASEURL . "quiz/questions/$id");
        } else {
            header("location:" . BASEURL . "quiz/create/error");
        }

    }

    public function questions($quiz, $msg = null)
    {
        if ($this->model('quizModel')->isQuizExists($quiz)) {
            $quizData = $this->model('quizModel')->getQuizData($quiz);
            $result = $this->model('quizModel')->getQuestions($quiz);
            $resCount = !empty($result) ? $result->num_rows : 0;
            $this->view('quizModule/rc/questions', array($result, $quizData, $resCount, $msg, $quiz));
        } else {
            header("location:" . BASEURL . "quiz/create/error");
        }

    }

    public function addQuestion($num, $msg = null)
    {
        $this->view('quizModule/rc/newQuestion', array($num, $msg));
    }

    public function saveQuestion($num)
    {
//        if(isset($_POST['submit'])){
        if (!empty($_POST['question'])) {
            if ($this->model('quizModel')->isQuizExists($num)) {
                $result = $this->model('quizModel')->getLastQuestionNo($num);
                $result++;
                $result2 = $this->model('quizModel')->insertQuestion($num, $result, $_POST['question'], $_POST['ques_img']);
                header("location:" . BASEURL . "quiz/addAnswers/$num/$result/success");
            } else {
                header("location:" . BASEURL . "quiz/addQuestion/$num/invalid_operation");
            }
        } else {
            header("location:" . BASEURL . "quiz/addQuestion/$num/err");
        }
//        }else{
//            header("location:".BASEURL."quiz/addQuestion/$num");
//        }
    }

    public function addAnswers($num, $question, $msg = null)
    {
        if ($this->model('quizModel')->isQuizExists($num, $question)) {
            $questionData = $this->model('quizModel')->getQuestionData($num, $question);
            $answersData = $this->model('quizModel')->getAnswers($num, $questionData[0]);
            $this->view('quizModule/rc/addAnswers', array($num, $question, $questionData, $msg, $answersData));
        } else {
            header("location:" . BASEURL . "quiz/");
        }
    }

    public function answer($num, $question, $msg = null)
    {
        $this->view('quizModule/rc/answer', array($num, $question, $msg));
    }

    public function saveAnswer($num, $question)
    {
        $qid = $this->model('quizModel')->getQuestionId($num, $question);
        if ($qid != 0) {
            $ansNumber = $this->model('quizModel')->getLastAnswerNo($qid);
            $ansNumber++;
            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if ($this->model('quizModel')->saveAnswer($ansNumber, $qid, $_POST['answer'], $correctness, $_POST['ansImg'])) {
                header('location:' . BASEURL . "quiz/addAnswers/$num/$question/AnsAdded");
            } else {
                header('location:' . BASEURL . "quiz/answer/$num/$question/error");
            }
        } else {
            header("location:" . BASEURL . "quiz/");
        }
    }

    public function delQuestion($quiz_id, $question_no, $msg = null)
    {
        $qid = $this->model('quizModel')->getQuestionId($quiz_id, $question_no);
        if ($qid != 0) {
            if ($this->model('quizModel')->deleteQuestion($qid)) {
                header('location:' . BASEURL . "quiz/questions/$quiz_id");
            } else {
                header('location:' . BASEURL . "quiz/question/$quiz_id/delErr");
            }
//            print_r($qid);
        } else {
            header("location:" . BASEURL . "quiz/");
        }
    }

    public function editAnswer($num, $question, $answer, $msg = null)
    {
        $qid = $this->model('quizModel')->getQuestionId($num, $question);
        if ($qid != 0) {
            $answerData = $this->model('quizModel')->getAnswerData($qid, $answer);
            $this->view('quizModule/rc/editAnswer', array($num, $answerData, $question, $msg));
        } else {
            header('location:' . BASEURL . "quiz/addAnswers/$num/$question/err");
        }
    }

    public function editAnswerAction($num, $question, $answer)
    {
        $qid = $this->model('quizModel')->getQuestionId($num, $question);
        if ($qid != 0) {
            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if ($this->model('quizModel')->updateAnswer($_POST['answer'], $correctness, $_POST['ansImg'], $answer)) {
                header('location:' . BASEURL . "quiz/addAnswers/$num/$question/AnsUpdated");
            } else {
                header('location:' . BASEURL . "quiz/editAnswer/$num/$question/$answer/err");
            }
        } else {
            header('location:' . BASEURL . "quiz/editAnswer/$num/$question/$answer/err");
        }
    }
}
