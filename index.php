<?php

session_start();

/*
Le fichier .htaccess permet de rediriger toutes les requêtes HTTP vers le fichier index.php ce qui nous de permet de n'avoir qu'un seul point d'entrée
index.php est le FrontController
*/
require __DIR__ . '/model/Quiz.php';
require __DIR__ . '/model/Tag.php';
require __DIR__ . '/model/Question.php';
require __DIR__ . '/model/Answer.php';

require __DIR__ . '/inc/DBData.php';


require __DIR__ . '/controller/MainController.php';
require __DIR__ . '/controller/HomeController.php';
require __DIR__ . '/controller/QuizController.php';
require __DIR__ . '/controller/TagController.php';
require __DIR__ . '/controller/LoginController.php';


$homeController = new HomeController();
$quizController = new QuizController();
$tagController = new TagController();
$loginController = new LoginController();


if (isset($_GET['_url'])) {
    $url = $_GET['_url'];
} else {
    $url = '/';
}

/*
Router / Dispatcher : il appelle la bonne méthode de controller en fonction de l'URL qui est appelée.
Le Dispatcher compare l'URL virtuelle appelée avec des routes. Les routes sont les URLs prévues par notre application, les URLs que notre application saura gérer.
*/
if ($url === '/' || $url === '/accueil') { // Accueil
    $homeController->index();
} else if ($url === '/quiz') {
    $quizController->index();
} else if ($url === '/quizQuestions') {
    $quizController->questionsByQuiz();
} else if ($url === '/quizAnswers') {
    $quizController->GoodAnswersByQuiz();
}  else if ($url === '/tags') {
    $tagController->index();
} else if ($url === '/tag') {
    $quizController->quizByTag();
} else if ($url === '/profil') {
    $loginController->Profil();
} else if ($url === '/profiladmin') {
    $loginController->ProfilAdmin();
} else if ($url === '/postLogin') {
    $loginController->login();
} else if ($url === '/postLoginAdmin') {
    $loginController->loginAdmin();
} else if ($url === '/login') {
    $loginController->index();
} else if ($url === '/loginAdmin') {
    $loginController->indexAdmin();
} else if ($url === '/admin') {
    $quizController->Admin();
} else if ($url === '/modif-formQuiz') {
    if(isset($_SESSION['admin'])) {
    $quizController->QuizModification();
    } else {
        header('location: accueil');
    }
} else if ($url === '/modif-formTag') {
    if(isset($_SESSION['admin'])) {
    $quizController->TagModification();
    } else {
        header('location: accueil');
    }
} else if ($url === '/modif-formQuestion') {
    if(isset($_SESSION['admin'])) {
    $quizController->QuestionModification();
    } else {
        header('location: accueil');
    }
} else {
    /*
    Si aucune ne route ne correspond à l'URL définie dans la requête HTTP, nous envoyons une erreur 404 (Not Found)
    https://www.php.net/manual/fr/function.http-response-code.php
    */
    http_response_code(404);
    // $controller->page404();
}