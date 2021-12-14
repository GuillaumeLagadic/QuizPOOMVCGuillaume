<?php

class HomeController extends MainController
{
    public function index()
    {
        $DBCon = new DBData();

        $quizList = $DBCon->getAllQuizzes();

        return $this->show('body', [
            'quizzes' => $quizList
        ]);
        // echo '<pre>';
        // var_dump($articleList);
        // echo '<pre>';
    }
}