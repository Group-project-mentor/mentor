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
        $this->model('TchResourceModel')->transaction();
        $id = $this->model('TchResourceModel')->getLastId() + 1;
        //        echo $id." ".$_POST['quiz_name']." ".$_POST['tot_mark'] ;
        if ($this->model('TquizModel')->createQuiz(sanitizeText($_POST['quiz_name']), isNumber($_POST['tot_mark'], 100), $id, $_SESSION['cid'], $_SESSION['id'])) {
            header("location:" . BASEURL . "Tquiz/questions/$id");
            $this->model('TchResourceModel')->commit();
        } else {
            header("location:" . BASEURL . "Tquiz/create/error");
            $this->model('TchResourceModel')->commit();
        }
    }

    public function editQuiz($quizId)
    {
        $res = $this->model('TquizModel')->getQuiz($quizId, $_SESSION['cid']);
        $this->view("quizModule/teacher/editQuizInfo", array($quizId, $res));
    }

    public function editAction($quizId)
    {
        if ($this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            if ($this->model('TquizModel')->editQuiz($quizId, sanitizeText($_POST['quiz_name']), $_POST['tot_mark'])) {
                flashMessage("done");
            } else {
                flashMessage("failed");
            }
            header("location:" . BASEURL . "Tquiz/editQuiz/$quizId");
        } else {
            flashMessage("unauthorized");
            header("location:" . BASEURL . "Tquiz/editQuiz/$quizId");
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
        if (!empty($_POST['question'])) {

            $this->model('TquizModel')->transaction();
            if ($this->model('TquizModel')->isQuizExists($quizId) and $this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
                $result = $this->model('TquizModel')->getLastQuestionNo($quizId);
                $result++;

                if (isset($_FILES["questionImg"]) && $_FILES["questionImg"]["error"] == 0) {

                    $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg");
                    $fileData = array(
                        "name" => $_FILES["questionImg"]["name"],
                        "type" => $_FILES["questionImg"]["type"],
                        "size" => $_FILES["questionImg"]["size"]
                    );
                    $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);

                    if (in_array($fileData['type'], $typeArray)) {

                        $newFileName = uniqid() . $result . "." . $extention;
                        if (TsaveFile($_FILES["questionImg"]["tmp_name"], $newFileName, "quizzes/questions",  $_SESSION['cid'])) {
                            if ($this->model('TquizModel')->insertQuestion($quizId, $result, sanitizeText($_POST['question']), $newFileName)) {
                                $this->model('TquizModel')->commit();
                                flashMessage("success");
                                header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$result");
                            }
                        }
                    }
                }
            }
        }
    }

    public function addAnswers($quizId, $question, $msg = null)
    {
        if ($this->model('TquizModel')->isQuizExists($quizId, $question) and  $this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $questionData = $this->model('TquizModel')->getQuestionData($quizId, $question);
            $answersData = $this->model('TquizModel')->getAnswers($quizId, $questionData[0]);

            $this->view('quizModule/teacher/addAnswers', array($quizId, $question, $questionData, $msg, $answersData));
        } else {
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
        }
    }

    public function answer($quizId, $question, $msg = null)
    {

        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        $answers = $this->model('TquizModel')->getAnswers($quizId, $qid);
        if (count($answers) < 5) {
            if ($this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
                $this->view('TquizModule/teacher/answer', array($quizId, $question, $msg));
            } else {
                header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
            }
        } else {
            flashMessage('max_answers');
            header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$question");
        }
    }

    public function saveAnswer($quizId, $question)
    {
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        $correctness = 0;
        $answers = $this->model('TquizModel')->getAnswers($quizId, $qid);
        if (count($answers) < 5) {
            if (empty($answers)) {
                $correctness = 1;
            }
            if ($qid != 0 and $this->model('TquizModel')->validateQuiz($quizId, $_SESSION['sid'])) {
                $this->model('TquizModel')->transaction();
                $ansNumber = $this->model('TquizModel')->getLastAnswerNo($qid);
                $ansNumber++;
                //            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
                if (isset($_FILES["ansImg"]) && $_FILES["ansImg"]["error"] == 0) {
                    $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp");
                    $fileData = array(
                        "name" => $_FILES["ansImg"]["name"],
                        "type" => $_FILES["ansImg"]["type"],
                        "size" => $_FILES["ansImg"]["size"]
                    );
                    $extention = pathinfo($fileData["name"], PATHINFO_EXTENSION);

                    if (in_array($fileData['type'], $typeArray)) {
                        $newFileName = uniqid() . $ansNumber . "." . $extention;
                        if (TsaveFile($_FILES["ansImg"]["tmp_name"], $newFileName, "quizzes/answers",  $_SESSION['cid'])) {
                            if ($this->model('TquizModel')->saveAnswer($ansNumber, $qid, sanitizeText($_POST['answer']), $correctness, $newFileName)) {
                                $this->model('TquizModel')->commit();
                                flashMessage("success");
                                header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$question");
                            } else {
                                flashMessage("failed");
                                $this->model('TquizModel')->rollBack();
                                header('location:' . BASEURL . "Tquiz/answer/$quizId/$question");
                            }
                        } else {
                            flashMessage("failed");
                            $this->model('TquizModel')->rollBack();
                            header('location:' . BASEURL . "Tquiz/answer/$quizId/$question");
                        }
                    } else {
                        flashMessage("failed");
                        $this->model('TquizModel')->rollBack();
                        header('location:' . BASEURL . "Tquiz/answer/$quizId/$question");
                    }
                } else {
                    if ($this->model('TquizModel')->saveAnswer($ansNumber, $qid, sanitizeText($_POST['answer']), $correctness)) {
                        $this->model('TquizModel')->commit();
                        flashMessage("success");
                        header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$question");
                    } else {
                        flashMessage("failed");
                        $this->model('TquizModel')->rollBack();
                        header('location:' . BASEURL . "Tquiz/answer/$quizId/$question");
                    }
                }
            } else {
                flashMessage("invalid");
                header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid']);
            }
        } else {
            flashMessage("max_answers");
            header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$question");
        }
    }

    public function delQuestion($quizId, $question_no)
    {
        $qData = $this->model('TquizModel')->getQuestionData($quizId, $question_no);
        if (!empty($qData)) {
            $ansSet = $this->model('TquizModel')->getAnswers($quizId, $qData[0]);
            if ($this->model('TquizModel')->deleteQuestion($qData[0])) {
                if (!empty($ansSet)) {
                    foreach ($ansSet as $ans) {
                        deleteFile($ans[4], "quizzes/answers", $_SESSION['cid']);
                    }
                }
                if (!empty($qData[4])) {
                    deleteFile($qData[4], "quizzes/questions",  $_SESSION['cid']);
                }
                flashMessage("success");
                header('location:' . BASEURL . "Tquiz/questions/$quizId");
            } else {
                flashMessage("failed");
                header('location:' . BASEURL . "Tquiz/questions/$quizId");
            }
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['cid'] . "/dper");
        }
    }

    public function delAnswer($quizId, $questionNo, $ans)
    {
        $qData = $this->model('TquizModel')->getQuestionData($quizId, $questionNo);
        $aData = $this->model('TquizModel')->getAnswerData($qData[0], $ans);
        if (!empty($aData) or !empty($qData)) {
            if ($this->model('TquizModel')->delAnswer($aData[0])) {
                if (!empty($aData[5])) {
                    deleteFile($aData[5], "quizzes/answers",  $_SESSION['cid']);
                }
                flashMessage("success");
            } else {
                flashMessage("failed");
            }
            header('location:' . BASEURL . "Tquiz/addAnswers/$quizId/$questionNo");
        } else {
            flashMessage("failed");
            header("location:" . BASEURL . "TResources/quizzes/"  . $_SESSION['cid'] . "/dper");
        }
    }

    public function editAnswer($quizId, $question, $answer, $msg = null)
    {
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $answerData = $this->model('TquizModel')->getAnswerData($qid, $answer);
            $this->view('quizModule/teacher/editAnswer', array($quizId, $answerData, $question, $msg));
        } else {
            flashMessage("invalid");
            header('location:' . BASEURL . "Tquiz/addAnswers/$quizId/$question/err");
        }
    }

    public function editAnswerAction($quizId, $question, $answer)
    {
        $this->model('TquizModel')->transaction();
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $question);
        if ($qid != 0 and $this->model('TquizModel')->validateQuiz($quizId,  $_SESSION['cid'])) {
            $answerData = $this->model('TquizModel')->getAnswerData($qid, $answer);
            $answerImage = $answerData[5];
            //            $correctness = ($_POST['correct'] == 'correct') ? 1 : 0;
            if (isset($_FILES["ansImg"]) && $_FILES["ansImg"]["error"] == 0) {
                $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp");
                $fileData = array(
                    "name" => $_FILES["ansImg"]["name"],
                    "type" => $_FILES["ansImg"]["type"],
                    "size" => $_FILES["ansImg"]["size"],
                    "extension" => pathinfo($_FILES["ansImg"]["name"], PATHINFO_EXTENSION)
                );

                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . $answer . "." . $fileData['extension'];
                    if (updateFile($_FILES["ansImg"]["tmp_name"], $newFileName, $answerImage, "quizzes/answers",  $_SESSION['cid'])) {
                        if ($this->model('TquizModel')->updateAnswer(sanitizeText($_POST['answer']), $answerData[3], $newFileName, $answer)) {
                            $this->model('TquizModel')->commit();
                            flashMessage("success");
                            header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$question");
                        } else {
                            flashMessage("failed");
                            $this->model('TquizModel')->rollBack();
                            header('location:' . BASEURL . "Tquiz/editAnswer/$quizId/$question/$answer");
                        }
                    } else {
                        flashMessage("failed");
                        $this->model('TquizModel')->rollBack();
                        header('location:' . BASEURL . "Tquiz/editAnswer/$quizId/$question/$answer");
                    }
                } else {
                    flashMessage("failed");
                    $this->model('TquizModel')->rollBack();
                    header('location:' . BASEURL . "Tquiz/editAnswer/$quizId/$question/$answer");
                }
            } else {
                if ($this->model('TquizModel')->updateAnswer(sanitizeText($_POST['answer']), $answerData[3], $answerImage, $answer)) {
                    $this->model('TquizModel')->commit();
                    flashMessage("success");
                    header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$question");
                } else {
                    flashMessage("failed");
                    $this->model('TquizModel')->rollBack();
                    header('location:' . BASEURL . "Tquiz/editAnswer/$quizId/$question/$answer");
                }
            }
        } else {
            $this->model('TquizModel')->rollBack();
            header('location:' . BASEURL . "Tquiz/editAnswer/$quizId/$question/$answer/err");
        }
    }

    public function editQuestion($quiz, $question)
    {
        $res = $this->model("TquizModel")->getQuestionByOrd($quiz, $question);
        $this->view('quizModule/teacher/editQuestion', array($quiz, $question, $res));
    }

    public function editQuestionAction($quizId, $questionOrdNo, $hh = 0)
    {
        $this->model('TquizModel')->transaction();
        $qid = $this->model('TquizModel')->getQuestionId($quizId, $questionOrdNo);
        if ($qid != 0 and $this->model('TquizModel')->validateQuiz($quizId, $_SESSION['cid'])) {
            $questionImage = $this->model('TquizModel')->getQuestionDataByID($qid)->image;
            if (isset($_FILES["questionImage"]) && $_FILES["questionImage"]["error"] == 0) {
                $typeArray = array("png" => "image/png", "jpg" => "image/jpg", "jpeg" => "image/jpeg", "webp" => "image/webp");
                $fileData = array(
                    "name" => $_FILES["questionImage"]["name"],
                    "type" => $_FILES["questionImage"]["type"],
                    "size" => $_FILES["questionImage"]["size"],
                    "extension" => pathinfo($_FILES["questionImage"]["name"], PATHINFO_EXTENSION)
                );

                if (in_array($fileData['type'], $typeArray)) {
                    $newFileName = uniqid() . $qid . "." . $fileData['extension'];
                    //                    if(checkFileDest("quizzes/questions", $_SESSION['gid'], $_SESSION['sid'], $questionImage)){
                    if (updateFile($_FILES["questionImage"]["tmp_name"], $newFileName, $questionImage, "quizzes/questions", $_SESSION['cid'])) {
                        if ($this->model('TquizModel')->updateQuestion($qid, sanitizeText($_POST['question']), $newFileName)) {
                            $this->model('TquizModel')->commit();
                            flashMessage("success");
                            header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$questionOrdNo");
                        } else {
                            flashMessage("failed");
                            $this->model('TquizModel')->rollBack();
                            header('location:' . BASEURL . "Tquiz/editQuestion/$quizId/$questionOrdNo/1");
                        }
                    } else {
                        flashMessage("failed");
                        $this->model('TquizModel')->rollBack();
                        header('location:' . BASEURL . "Tquiz/editQuestion/$quizId/$questionOrdNo/2");
                    }
                    //                    }
                } else {
                    flashMessage("failed");
                    $this->model('TquizModel')->rollBack();
                    header('location:' . BASEURL . "Tquiz/editQuestion/$quizId/$questionOrdNo/3");
                }
            } else {
                if ($this->model('TquizModel')->updateQuestion($qid, sanitizeText($_POST['question']), $questionImage)) {
                    $this->model('TquizModel')->commit();
                    flashMessage("success");
                    header("location:" . BASEURL . "Tquiz/addAnswers/$quizId/$questionOrdNo/4");
                } else {
                    flashMessage("failed");
                    $this->model('TquizModel')->rollBack();
                    header('location:' . BASEURL . "Tquiz/editQuestion/$quizId/$questionOrdNo/5");
                }
            }
        } else {
            flashMessage("invalid");
            $this->model('TquizModel')->rollBack();
            header("location:" . BASEURL . "TResources/quizzes/" . $_SESSION['gid'] . "/" . $_SESSION['sid']);
        }
    }

    public function markCorrectness($quesID, $ansID)
    {
        $res1 = $this->model('TquizModel')->markAllWrong($quesID);
        $res2 = $this->model('TquizModel')->markCorrectness($ansID);
        if ($res1 and $res2) {
            echo json_encode(array("status" => "success"));
        } else {
            echo json_encode(array("status" => "failed"));
        }
    }
}
