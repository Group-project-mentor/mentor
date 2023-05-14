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
        $this->model('resourceModel')->transaction();
        $id = $this->model('resourceModel')->getLastId() + 1;
//        echo $id." ".$_POST['quiz_name']." ".$_POST['tot_mark'] ;
        if ($this->model('quizModel')->createQuiz(sanitizeText($_POST['quiz_name']), isNumber($_POST['tot_mark'],100), $id, $_SESSION['gid'], $_SESSION['sid'],$_SESSION['id'])) {
            header("location:" . BASEURL . "quiz/questions/$id");
            $this->model('resourceModel')->commit();
        } else {
            header("location:" . BASEURL . "quiz/create/error");
            $this->model('resourceModel')->commit();
        }
    }

    public function editQuiz($quizId){
        $res = $this->model('quizModel')->getQuiz($quizId, $_SESSION['gid'], $_SESSION['sid']);
        $this->view("quizModule/rc/editQuizInfo", array($quizId,$res));
    }

    public function editAction($quizId){
        if($this->model('quizModel')->validateQuiz($quizId,$_SESSION['gid'],$_SESSION['sid'])){
            if($this->model('quizModel')->editQuiz($quizId, sanitizeText($_POST['quiz_name']), $_POST['tot_mark'])){
                flashMessage("done");
            }else{
                flashMessage("failed");
            }
            header("location:".BASEURL."quiz/editQuiz/$quizId");
        }else{
            flashMessage("unauthorized");
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
        if (!empty($_POST['question'])) {

            $this->model('quizModel')->transaction();
            if ($this->model('quizModel')->isQuizExists($quizId) and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
                $result = $this->model('quizModel')->getLastQuestionNo($quizId);
                $result++;

                if (isset($_FILES["questionImg"]) && $_FILES["questionImg"]["error"] == 0) {

                    $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp" );
                    $fileData = array("name" => $_FILES["questionImg"]["name"],
                            "type" => $_FILES["questionImg"]["type"],
                            "size" => $_FILES["questionImg"]["size"]);
                    $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);

                   if (in_array($fileData['type'], $typeArray)) {

                        $newFileName = uniqid() . $result . "." . $extention;
                        if (saveFile($_FILES["questionImg"]["tmp_name"],$newFileName,"quizzes/questions",$_SESSION['gid'],$_SESSION['sid'])) {
                            if($this->model('quizModel')->insertQuestion($quizId, $result, sanitizeText($_POST['question']), $newFileName)){
                                $this->model('quizModel')->commit();
                                flashMessage("success");
                                header("location:" . BASEURL . "quiz/addAnswers/$quizId/$result");
                            }else{
                                flashMessage("failed");
                                $this->model('quizModel')->rollBack();
                                header("location:" . BASEURL . "quiz/addQuestion/$quizId");
                            }
                        } else {
                            flashMessage("failed");
                            $this->model('quizModel')->rollBack();
                            header("location:" . BASEURL . "quiz/addQuestion/$quizId");
                        }
                    }else{
                        flashMessage("invalidType");
                        $this->model('quizModel')->rollBack();
                        header("location:" . BASEURL . "quiz/addQuestion/$quizId");
                    }
                }else{
                    $this->model('quizModel')->insertQuestion($quizId, $result, sanitizeText($_POST['question']));
                    $this->model('quizModel')->commit();
                    flashMessage("success");
                    header("location:" . BASEURL . "quiz/addAnswers/$quizId/$result");
                }
            } else {
                $this->model('quizModel')->rollBack();
                flashMessage("failed");
                header("location:" . BASEURL . "quiz/addQuestion/$quizId");
            }
       } else {
           $this->model('quizModel')->rollBack();
           flashMessage("failed");
           header("location:" . BASEURL . "quiz/addQuestion/$quizId");
       }

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
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question);
        $answers = $this->model('quizModel')->getAnswers($quizId, $qid);
        if (count($answers) < 5){
            if ($this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
                $this->view('quizModule/rc/answer', array($quizId, $question, $msg));
            } else {
                header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
            }
        }else{
            flashMessage('max_answers');
            header("location:" . BASEURL . "quiz/addAnswers/$quizId/$question");
        }

    }

    public function saveAnswer($quizId, $question)
    {
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question);
        $correctness = 0;
        $answers = $this->model('quizModel')->getAnswers($quizId, $qid);
        if (count($answers) < 5){
            if(empty($answers)){
                $correctness = 1;
            }
            if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
                $this->model('quizModel')->transaction();
                $ansNumber = $this->model('quizModel')->getLastAnswerNo($qid);
                $ansNumber++;
//            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
                if (isset($_FILES["ansImg"]) && $_FILES["ansImg"]["error"] == 0) {
                    $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp");
                    $fileData = array("name" => $_FILES["ansImg"]["name"],
                        "type" => $_FILES["ansImg"]["type"],
                        "size" => $_FILES["ansImg"]["size"]);
                    $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);

                    if (in_array($fileData['type'], $typeArray)) {
                        $newFileName = uniqid() . $ansNumber . "." . $extention;
                        if (saveFile($_FILES["ansImg"]["tmp_name"], $newFileName, "quizzes/answers", $_SESSION['gid'], $_SESSION['sid'])) {
                            if ($this->model('quizModel')->saveAnswer($ansNumber, $qid, sanitizeText($_POST['answer']), $correctness ,$newFileName)) {
                                $this->model('quizModel')->commit();
                                flashMessage("success");
                                header("location:" . BASEURL . "quiz/addAnswers/$quizId/$question");
                            } else {
                                flashMessage("failed");
                                $this->model('quizModel')->rollBack();
                                header('location:' . BASEURL . "quiz/answer/$quizId/$question");
                            }
                        } else {
                            flashMessage("failed");
                            $this->model('quizModel')->rollBack();
                            header('location:' . BASEURL . "quiz/answer/$quizId/$question");
                        }
                    }else{
                        flashMessage("failed");
                        $this->model('quizModel')->rollBack();
                        header('location:' . BASEURL . "quiz/answer/$quizId/$question");
                    }
                }else{
                    if ($this->model('quizModel')->saveAnswer($ansNumber, $qid, sanitizeText($_POST['answer']),$correctness)) {
                        $this->model('quizModel')->commit();
                        flashMessage("success");
                        header("location:" . BASEURL . "quiz/addAnswers/$quizId/$question");
                    } else {
                        flashMessage("failed");
                        $this->model('quizModel')->rollBack();
                        header('location:' . BASEURL . "quiz/answer/$quizId/$question");
                    }
                }
            } else {
                flashMessage("invalid");
                header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid']);
            }
        }else{
            flashMessage("max_answers");
            header("location:" . BASEURL . "quiz/addAnswers/$quizId/$question");
        }

    }

    public function delQuestion($quizId, $question_no)
    {
        $qData = $this->model('quizModel')->getQuestionData($quizId, $question_no);
        if (!empty($qData)) {
            $ansSet = $this->model('quizModel')->getAnswers($quizId, $qData[0]);
            if ($this->model('quizModel')->deleteQuestion($qData[0])) {
                if (!empty($ansSet)){
                    foreach ($ansSet as $ans){
                        deleteFile($ans[4],"quizzes/answers",$_SESSION['gid'],$_SESSION['sid']);
                    }
                }
                if(!empty($qData[4])){
                    deleteFile($qData[4], "quizzes/questions", $_SESSION['gid'], $_SESSION['sid']);
                }
                flashMessage("success");
                header('location:' . BASEURL . "quiz/questions/$quizId");
            } else {
                flashMessage("failed");
                header('location:' . BASEURL . "quiz/questions/$quizId");
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid'] . "/dper");
        }
    }

    public function delAnswer($quizId, $questionNo, $ans)
    {
        $qData = $this->model('quizModel')->getQuestionData($quizId, $questionNo);
        $aData = $this->model('quizModel')->getAnswerData($qData[0], $ans);
        if (!empty($aData) or !empty($qData)) {
            if ($this->model('quizModel')->delAnswer($aData[0])) {
                if(!empty($aData[5])){
                    deleteFile($aData[5], "quizzes/answers", $_SESSION['gid'], $_SESSION['sid']);
                }
                flashMessage("success");
            } else {
                flashMessage("failed");
            }
            header('location:' . BASEURL . "quiz/addAnswers/$quizId/$questionNo");
        } else {
            flashMessage("failed");
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
            flashMessage("invalid");
            header('location:' . BASEURL . "quiz/addAnswers/$quizId/$question/err");
        }
    }

    public function editAnswerAction($quizId, $question, $answer)
    {
        $this->model('quizModel')->transaction();
        $qid = $this->model('quizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $answerData = $this->model('quizModel')->getAnswerData($qid, $answer);
            $answerImage = $answerData[5];
//            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if (isset($_FILES["ansImg"]) && $_FILES["ansImg"]["error"] == 0) {
                $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp");
                $fileData = array("name" => $_FILES["ansImg"]["name"],
                    "type" => $_FILES["ansImg"]["type"],
                    "size" => $_FILES["ansImg"]["size"],
                    "extension" => pathinfo($_FILES["ansImg"]["name"], PATHINFO_EXTENSION) );  

                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . $answer . "." . $fileData['extension'];
                    if (updateFile($_FILES["ansImg"]["tmp_name"], $newFileName, $answerImage, "quizzes/answers", $_SESSION['gid'], $_SESSION['sid'])) {
                        if ($this->model('quizModel')->updateAnswer(sanitizeText($_POST['answer']), $answerData[3], $newFileName, $answer)) {
                            $this->model('quizModel')->commit();
                            flashMessage("success");
                            header("location:" . BASEURL . "quiz/addAnswers/$quizId/$question");
                        } else {
                            flashMessage("failed");
                            $this->model('quizModel')->rollBack();
                            header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer");
                        }
                    } else {
                        flashMessage("failed");
                        $this->model('quizModel')->rollBack();
                        header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer");
                    }
                } else {
                    flashMessage("failed");
                    $this->model('quizModel')->rollBack();
                    header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer");
                }
            } else {
                if ($this->model('quizModel')->updateAnswer(sanitizeText($_POST['answer']), $answerData[3] , $answerImage, $answer)) {
                    $this->model('quizModel')->commit();
                    flashMessage("success");
                    header("location:" . BASEURL . "quiz/addAnswers/$quizId/$question");
                } else {
                    flashMessage("failed");
                    $this->model('quizModel')->rollBack();
                    header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer");
                }
            }

        } else {
            $this->model('quizModel')->rollBack();
            header('location:' . BASEURL . "quiz/editAnswer/$quizId/$question/$answer/err");
        }
    }

    public function editQuestion($quiz, $question){
        $res = $this->model("quizModel")->getQuestionByOrd($quiz, $question);
        $this->view('quizModule/rc/editQuestion',array($quiz, $question, $res));
    }

    public function editQuestionAction($quizId, $questionOrdNo,$hh=0){
        $this->model('quizModel')->transaction();
        $qid = $this->model('quizModel')->getQuestionId($quizId, $questionOrdNo);
        if ($qid != 0 and $this->model('quizModel')->validateQuiz($quizId, $_SESSION['gid'], $_SESSION['sid'])) {
            $questionImage = $this->model('quizModel')->getQuestionDataByID($qid)->image;
            if (isset($_FILES["questionImage"]) && $_FILES["questionImage"]["error"] == 0) {
                $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp");
                $fileData = array("name" => $_FILES["questionImage"]["name"],
                    "type" => $_FILES["questionImage"]["type"],
                    "size" => $_FILES["questionImage"]["size"],
                    "extension" => pathinfo($_FILES["questionImage"]["name"], PATHINFO_EXTENSION) );

                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . $qid . "." . $fileData['extension'];
//                    if(checkFileDest("quizzes/questions", $_SESSION['gid'], $_SESSION['sid'], $questionImage)){
                        if (updateFile($_FILES["questionImage"]["tmp_name"], $newFileName, $questionImage, "quizzes/questions", $_SESSION['gid'], $_SESSION['sid'])) {
                            if ($this->model('quizModel')->updateQuestion($qid, sanitizeText($_POST['question']), $newFileName)) {
                                $this->model('quizModel')->commit();
                                flashMessage("success");
                                header("location:" . BASEURL . "quiz/addAnswers/$quizId/$questionOrdNo");
                            } else {
                                flashMessage("failed");
                                $this->model('quizModel')->rollBack();
                                header('location:' . BASEURL . "quiz/editQuestion/$quizId/$questionOrdNo/1");
                            }
                        } else {
                            flashMessage("failed");
                            $this->model('quizModel')->rollBack();
                            header('location:' . BASEURL . "quiz/editQuestion/$quizId/$questionOrdNo/2");
                        }
//                    }
                } else {
                    flashMessage("failed");
                    $this->model('quizModel')->rollBack();
                    header('location:' . BASEURL . "quiz/editQuestion/$quizId/$questionOrdNo/3");
                }
            } else {
                if ($this->model('quizModel')->updateQuestion($qid, sanitizeText($_POST['question']), $questionImage)) {
                    $this->model('quizModel')->commit();
                    flashMessage("success");
                    header("location:" . BASEURL . "quiz/addAnswers/$quizId/$questionOrdNo/4");
                } else {
                    flashMessage("failed");
                    $this->model('quizModel')->rollBack();
                    header('location:' . BASEURL . "quiz/editQuestion/$quizId/$questionOrdNo/5");
                }
            }

        } else {
            flashMessage("invalid");
            $this->model('quizModel')->rollBack();
            header("location:" . BASEURL . "rcResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid']);
        }

    }

    public function markCorrectness($quesID, $ansID){
        $res1 = $this->model('quizModel')->markAllWrong($quesID);
        $res2 = $this->model('quizModel')->markCorrectness($ansID);
        if ($res1 and $res2){
            echo json_encode(array("status"=>"success"));
        }else{
            echo json_encode(array("status"=>"failed"));
        }
    }
}
