<?php

class Quiz extends Controller
{
    private $user1 = "rc";
    public function __construct()
    {
        sessionValidator();
        $this->userValidate($this->user1);
        flashMessage();
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
        $id = $this->model('resourceModel')->getLastId() + 1;
//        echo $id." ".$_POST['quiz_name']." ".$_POST['tot_mark'] ;
        if ($this->model('quizModel')->createQuiz($_POST['quiz_name'], $_POST['tot_mark'], $id, $_SESSION['gid'], $_SESSION['sid'])) {
            header("location:" . BASEURL . "quiz/questions/$id");
        } else {
            header("location:" . BASEURL . "quiz/create/error");
        }
    }

    public function editQuiz($quizId){
        $res = $this->model('quizModel')->getQuiz($quizId, $_SESSION['gid'], $_SESSION['sid']);
        $this->view("quizModule/rc/editQuizInfo", array($quizId,$res));
    }

    public function editAction($quizId){
        if($this->model('quizModel')->validateQuiz($quizId,$_SESSION['gid'],$_SESSION['sid'])){
            if($this->model('quizModel')->editQuiz($quizId, $_POST['quiz_name'], $_POST['tot_mark'])){
                flashMessage("done");
            }else{
                flashMessage("failed");
            }
            header("location:".BASEURL."quiz/editQuiz/$quizId");
        }else{
            flashMessage("unauthorized");
//            header("location:".BASEURL."rcResources/quizzes/".$_SESSION['gid']."/".$_SESSION['sid']);
            header("location:".BASEURL."quiz/editQuiz/$quizId");
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
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
        }
    }

    public function addQuestion($quizId, $msg = null)
    {
        $this->view('quizModule/rc/newQuestion', array($quizId, $msg));
    }

    public function saveQuestion($quizId)
    {
//        if(isset($_POST['submit'])){
        if (!empty($_POST['question'])) {
            if ($this->model('quizModel')->isQuizExists($quizId) and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
                $image_data = $_POST['ques_img'];
                $result = $this->model('quizModel')->getLastQuestionNo($quizId);
                $result++;
                $result2 = $this->model('quizModel')->insertQuestion($quizId, $result, $_POST['question'], $image_data);
                    header("location:" . BASEURL . "quiz/addAnswers/$quizId/$result/success");
            } else {
                header("location:" . BASEURL . "quiz/addQuestion/$quizId/invalid_operation");
            }
        } else {
            header("location:" . BASEURL . "quiz/addQuestion/$quizId/err");
        }
//        }else{
//            header("location:".BASEURL."quiz/addQuestion/$quizId");
//        }
    }

    public function addAnswers($quizId, $question, $msg = null)
    {
        if ($this->model('quizModel')->isQuizExists($quizId, $question) and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $questionData = $this->model('quizModel')->getQuestionData($quizId, $question);
            $answersData = $this->model('quizModel')->getAnswers($quizId, $questionData[0]);

            $this->view('quizModule/rc/addAnswers', array($quizId, $question, $questionData, $msg, $answersData));
        } else {
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
        }
    }

    public function answer($quizId, $question, $msg = null)
    {
        if ($this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $this->view('quizModule/rc/answer', array($quizId, $question, $msg));
        } else {
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
        }
    }

    public function saveAnswer($quizId, $question)
    {
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $ansNumber = $this->model('quizModel')->getLastAnswerNo($qid);
            $ansNumber++;
            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if ($this->model('quizModel')->saveAnswer($ansNumber, $qid, $_POST['answer'], $correctness, $_POST['ansImg'])) {
                header('location:' . BASEURL . "quiz/addAnswers/$quizId/$question/AnsAdded");
            } else {
                header('location:' . BASEURL . "quiz/answer/$quizId/$question/error");
            }
        } else {
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
        }
    }

    public function delQuestion($quizId, $question_no, $msg = null)
    {
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question_no);
        if ($qid != 0) {
            if ($this->model('quizModel')->deleteQuestion($qid)) {
                header('location:' . BASEURL . "quiz/questions/$quizId");
            } else {
                header('location:' . BASEURL . "quiz/question/$quizId/delErr");
            }
//            print_r($qid);
        } else {
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
        }
    }

    public function editAnswer($quizId, $question, $answer, $msg = null)
    {
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $answerData = $this->model('quizModel')->getAnswerData($qid, $answer);
            $this->view('quizModule/rc/editAnswer', array($quizId, $answerData, $question, $msg));
        } else {
            header('location:' . BASEURL . "quiz/addAnswers/$quizId/$question/err");
        }
    }

    public function editAnswerAction($quizId, $question, $answer)
    {
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if ($this->model('quizModel')->updateAnswer($_POST['answer'], $correctness, $_POST['ansImg'], $answer)) {
                header('location:' . BASEURL . "quiz/addAnswers/$quizId/$question/AnsUpdated");
            } else {
                header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer/err");
            }
        } else {
            header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer/err");
        }
    }
}
