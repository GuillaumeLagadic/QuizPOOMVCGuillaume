<?php
var_dump($_SESSION);?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/body.css">
    <title>Quiz</title>
</head>
<body>
    <header>
        <nav>
            <ul>
                <li class="home_tag">
                    <a href="index.php">Accueil</a>
                </li>
                <li class="home_tag">
                    <a href="tags">Tags</a>
                </li><?php
                if (isset($_SESSION['user'])) {
                echo "
                <li class='connect_profil'>
                    <a href='profil'>Mon Compte</a>
                    <a href='./logout.php'>Déconnexion</a>
                </li>";
                } elseif (isset($_SESSION['admin'])) {
                    echo "
                    <li class='connect_profil'>
                        <a href='profiladmin'>Mon Compte</a>
                        <a href='./logout.php'>Déconnexion</a>
                    </li>";
                } else {
                    echo "<li>
                    <a href='inscription.php'>Inscription</a>
                </li>
                <li class='inscription_connexion'>/</li>
                <li>
                    <a href='login'>Connexion</a>
                </li>";
                }
                
                ?>
            </ul>
        </nav>
    </header>