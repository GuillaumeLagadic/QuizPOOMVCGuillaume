
    <?php
    include 'views/header.tpl.php';
?>
<main class="inscription_user">
        <?php foreach($errors as $error) {
                echo "<p>$error</p>";
            }
        ?>
        <h1>Inscription</h1>
        <form method="POST">
            <p>Nom : <input class="inscri_nom" type="text" name="nom" id="nom" placeholder="Nom" ></p>
            <p>Prénom : <input class="inscri_prenom" type="text" name="prenom" id="prenom" placeholder="Prénom" ></p>
            <p>Email : <input class="inscri_email" type="mail" name="mail" id="mail" placeholder="Email" ></p>
            <p>Mot de passe : <input class="inscri_pass" type="password" name="password" id="mdp" placeholder="Mot de passe" ></p>
            <button type="submit" name="sessionInscription" id="btn_inscription_user">S'inscrire</button>
            
        </form>
        <p class="deja_inscrit">Déjà inscrit,
        <a href="connexion.tpl.php" id="connect_user">connectez-vous</a></p>
    </main>

    <?php
    include 'views/footer.tpl.php';
?>