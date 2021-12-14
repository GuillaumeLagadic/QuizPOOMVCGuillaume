<?php

class QuizController extends MainController
{
    public function index()
    {
        $DBCon = new DBData();
        if (isset($_GET['id'])) {
            $singleQuiz = $DBCon->getQuizDetails($_GET['id']);
            $quizQuestions = $DBCon->getQuestionsByQuiz($_GET['id']);
            $singleQuizTags = $DBCon->getTagsByQuiz($_GET['id']);
        } else {
            $singleQuiz = null;
            $quizQuestions = null;
            $singleQuizTags = null;
        }
        
        return $this->show('bodyQuiz', [
            'quiz' => $singleQuiz,
            'questions' => $quizQuestions,
            'tags' => $singleQuizTags
        ]);
    }

    public function quizByTag()
    {
        $DBCon = new DBData();
        if (isset($_GET['id'])) {
            $quizByTag = $DBCon-> getQuizzesByTag($_GET['id']);
        } else {
            $quizByTag = null;
        }

        return $this->show('bodyTag', [
            'quizByTag' => $quizByTag
        ]);
    }

    public function questionsByQuiz()
    {
        $DBCon = new DBData();
        if (isset($_GET['id'])) {
            $quizQuestions = $DBCon->getQuestionsByQuiz($_GET['id']);
            $singleQuizTags = $DBCon->getTagsByQuiz($_GET['id']);
        } else {
            $quizQuestions = null;
            $singleQuizTags = null;
        }
        
        return $this->show('bodyQuestionQuiz', [
            'questions' => $quizQuestions,
            'tags' => $singleQuizTags
        ]);
    }

    // public function answersByQuiz()
    // {
    //     $DBCon = new DBData();
    //     if (isset($_GET['id'])) {
    //         $quizQuestions = $DBCon->getQuestionsByQuiz($_GET['id']);
    //         $singleQuizTags = $DBCon->getTagsByQuiz($_GET['id']);
    //         $quizAnswers = $DBCon->getAnswersByQuestion($_GET['id']);
    //     } else {
    //         $quizAnswers = null;
    //         $quizQuestions = null;
    //         $singleQuizTags = null;
    //     }
        

    // }

    public function GoodAnswersByQuiz()
    {
        $DBCon = new DBData();

        if (isset($_GET['id'])) {
            $quizQuestions = $DBCon->getQuestionsByQuiz($_GET['id']);
            $singleQuizTags = $DBCon->getTagsByQuiz($_GET['id']);
            $quizAnswers = $DBCon->getAnswersByQuestion($_GET['id']);
            $goodAnswers = $DBCon->getGoodAnswers($_GET['id']);   
        } else {
            $quizAnswers = null;
            $quizQuestions = null;
            $singleQuizTags = null;
        }
        
           
        
        if (isset($_POST['answer']) || !is_null($_POST['answer']) || !empty($_POST['answer'])) {      
            return $this->show('bodyAnswer', [
                'answers' => $quizAnswers,
                'questions' => $quizQuestions,
                'tags' => $singleQuizTags,
                'goodAnswers' => $goodAnswers
            ]);
            
        } else if(!isset($_POST['answer']) || empty($_POST['answer']) || is_null($_POST['answer'])) {
            return $this->show('bodyAnswer', [
                'answers' => $quizAnswers,
                'questions' => $quizQuestions,
                'tags' => $singleQuizTags,
                'errors' => "Vous n'avez donné aucune réponse"
            ]);
        }

        return $this->show('bodyAnswer', [
            'answers' => $quizAnswers,
            'questions' => $quizQuestions,
            'tags' => $singleQuizTags
        ]);
    }

    public function Admin()
    {
        if(isset($_SESSION['admin'])) {
            $DBCon = new DBData();
        
            $quizList = $DBCon->getAllQuizzes();
            $quizQuestions = $DBCon->getAllQuestions();
            $singleTags = $DBCon->getAllTags();
        
        
        return $this->show('profilAdmin', [
            'quizzes' => $quizList,
            'questions' => $quizQuestions,
            'tags' => $singleTags        
            ]);
        } else {
            header('location: adminForm.php');
        }
        
    }

    public function QuizModification()
    {
        $DBCon = new DBData();
        
            $quiz = $DBCon->getQuizDetails($_GET['id']);
        
        return $this->show('modifQuiz', [
            'quiz' => $quiz

        ]);
    }

    public function TagModification()
    {
        $DBCon = new DBData();
        
            $tag = $DBCon->getTagDetails($_GET['id']);
        
        return $this->show('modifTag', [
            'tag' => $tag

        ]);
    }

    public function QuestionModification()
    {
        $DBCon = new DBData();
            $question = $DBCon->getQuestionDetails($_GET['id']);
            
        return $this->show('modifQuestion', [
            'question' => $question    

        ]);
    }
}