<?php

class TQuiz extends Controller
{
    private $user = "tch";
    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user);
        flashMessage();
        
    }

    public function index()
    {
        header("location:" . BASEURL . "TQuiz/create"); // for default quiz route
    }

    public function create($msg = null)
    {
        echo $_SESSION['cid'];
        echo $_SESSION['id'];
        $this->view('quizModule/teacher/createQuiz', $msg);
    }

    public function createAction()
    {
        $id = $this->model('TchResourceModel')->getLastId() + 1;
        //        echo $id." ".$_POST['quiz_name']." ".$_POST['tot_mark'] ;
        if ($this->model('TquizModel')->createQuiz($_POST['quiz_name'], $_POST['tot_mark'], $id, $_SESSION['cid'], $_SESSION['id'])) {
            header("location:" . BASEURL . "TQuiz/questions/$id");
        } else {
            header("location:" . BASEURL . "TQuiz/create/error");
        }
    }

    public function editQuiz($quizId)
    {
        $res = $this->model('TquizModel')->getQuiz($quizId, $_SESSION['cid']);
        $this->view("quizModule/teacher/editQuizInfo", array($quizId, $res));
    }

    public function editAction($quizId)
    {
        if($this->model('TquizModel')->validateQuiz($quizId,$_SESSION['cid'])){
            if($this->model('TquizModel')->editQuiz($quizId, $_POST['quiz_name'], $_POST['tot_mark'])){
                flashMessage("done");
            }else{
                flashMessage("failed");
            }
            header("location:".BASEURL."TQuiz/editQuiz/$quizId");
        }else{
            flashMessage("unauthorized");
//            header("location:".BASEURL."rcResources/quizzes/".$_SESSION['gid']."/".$_SESSION['sid']);
            header("location:".BASEURL."TQuiz/editQuiz/$quizId");
        }
    }

    public function questions($quiz, $msg = null)
    {
        if ($this->model('TquizModel')->isQuizExists($quiz)) {
            $quizData = $this->model('TquizModel')->getQuizData($quiz);
            $result = $this->model('TquizModel')->getQuestions($quiz);
            $resCount = !empty($result) ? $result->num_rows : 0;
            $this->view('quizModule/teacher/questions', array($result, $quizData, $resCount, $msg, $quiz));
        } else {
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
        }
    }

    public function addQuestion($quizId, $msg = null)
    {
        $this->view('quizModule/teacher/newQuestion', array($quizId, $msg));
    }

    public function saveQuestion($quizId)
    {
        //        if(isset($_POST['submit'])){
        if (!empty($_POST['question'])) {
            if ($this->model('TquizModel')->isQuizExists($quizId) and  $this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid']) ) {
                $image_data = $_POST['ques_img'];
                $result = $this->model('TquizModel')->getLastQuestionNo($quizId);
                $result++;
                $result2 = $this->model('TquizModel')->insertQuestion($quizId, $result, $_POST['question'], $image_data);
                header("location:" . BASEURL . "TQuiz/addAnswers/$quizId/$result/success");
            } else {
                header("location:" . BASEURL . "TQuiz/addQuestion/$quizId/invalid_operation");
            }
        } else {
            header("location:" . BASEURL . "TQuiz/addQuestion/$quizId/err");
        }
        //        }else{
        //            header("location:".BASEURL."quiz/addQuestion/$quizId");
        //        }
    }

    public function addAnswers($quizId, $question, $msg = null)
    {
        if ($this->model('TquizModel')->isQuizExists($quizId, $question) and  $this->model('quizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $questionData = $this->model('TquizModel')->getQuestionData($quizId, $question);
            $answersData = $this->model('TquizModel')->getAnswers($quizId, $questionData[0]);

            $this->view('quizModule/teacher/addAnswers', array($quizId, $question, $questionData, $msg, $answersData));
        } else {
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
        }
    }

    public function answer($quizId, $question, $msg = null)
    {

        if ($this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $this->view('quizModule/teacher/answer', array($quizId, $question, $msg));
        } else {
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
        }
    }

    public function saveAnswer($quizId, $question)
    {
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $ansNumber = $this->model('TquizModel')->getLastAnswerNo($qid);
            $ansNumber++;
            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if ($this->model('TquizModel')->saveAnswer($ansNumber, $qid, $_POST['answer'], $correctness, $_POST['ansImg'])) {
                header('location:' . BASEURL . "TQuiz/addAnswers/$quizId/$question/AnsAdded");
            } else {
                header('location:' . BASEURL . "TQuiz/answer/$quizId/$question/error");
            }
        } else {
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
        }
    }

    public function delQuestion($quizId, $question_no, $msg = null)
    {
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question_no);
        if ($qid != 0) {
            if ($this->model('TquizModel')->deleteQuestion($qid)) {
                header('location:' . BASEURL . "TQuiz/questions/$quizId");
            } else {
                header('location:' . BASEURL . "TQuiz/question/$quizId/delErr");
            }
            //            print_r($qid);
        } else {
            header("location:" . BASEURL . "TResources/quizzes/" .  $_SESSION['cid'] . "/dper");
        }
    }

    public function editAnswer($quizId, $question, $answer, $msg = null)
    {
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $answerData = $this->model('TquizModel')->getAnswerData($qid, $answer);
            $this->view('quizModule/teacher/editAnswer', array($quizId, $answerData, $question, $msg));
        } else {
            header('location:' . BASEURL . "TQuiz/addAnswers/$quizId/$question/err");
        }
    }

    public function editAnswerAction($quizId, $question, $answer)
    {
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if ($this->model('TquizModel')->updateAnswer($_POST['answer'], $correctness, $_POST['ansImg'], $answer)) {
                header('location:' . BASEURL . "TQuiz/addAnswers/$quizId/$question/AnsUpdated");
            } else {
                header('location:' . BASEURL . "TQuiz/editAnswer/$quizId/$question/$answer/err");
            }
        } else {
            header('location:' . BASEURL . "TQuiz/editAnswer/$quizId/$question/$answer/err");
        }
    }
}
