<?php

class LoginController extends MainController
{
    public function index()
    {
        $DBCon = new DBData();

        $login = $DBCon->Login();

        return $this->show('connexion', [
            'errors' => $login
        ]);
    }

    public function loginAdmin()
    {
        $DBCon = new DBData();

        $loginAdmin = $DBCon->LoginAdmin();

        return $this->show('adminForm', [
            'errors' => $loginAdmin
        ]);
    }

    public function indexAdmin()
    {
        return $this->show('adminForm');
    }

    public function login()
    {
        $DBCon = new DBData();

        $DBCon->Login();
    }

    public function Profil()
    {
        return $this->show('profil');
    }

    public function ProfilAdmin()
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
            header('location: adminForm');
        }
        
    }

    
}