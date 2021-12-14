<?php


$dsn = 'mysql:host=localhost;dbname=quiz';

$user = 'root';

$pass='';

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

$pdo = new PDO($dsn, $user, $pass, $options);

$errors = [];

// Inscription

if(isset($_POST['sessionInscription'])) {
    if(!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['mail']) && !empty($_POST['password'])) {

        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $mail = $_POST['mail'];
        $password = $_POST['password'];

        $sql = "
                INSERT INTO app_users (email, password, firstname, lastname)
                VALUES ('{$mail}','{$password}','{$prenom}','{$nom}')
                ";

                $queryRegister = $pdo->query($sql);
                $inscription = $queryRegister->fetchAll(PDO::FETCH_ASSOC);
        
                $_SESSION['user'] = $prenom;

                header('Location: /coursphp1/projet-quiz-GuillaumeLagadic/');
    }else{
        $errors[] = "Une information est manquante";
    }
}



