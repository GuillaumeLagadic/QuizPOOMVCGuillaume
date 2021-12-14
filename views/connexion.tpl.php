
    <main class="connect_user">
    <?php foreach($viewVars['errors'] as $error) {
                echo "<p>$error</p>";
            }
        ?>
        <?php
        if(isset($logoutMsg)) {
            echo "<div>$logoutMsg</div>";
        }
        ?>
        <h1>Connexion</h1>
        <form action="postLogin" method="POST">
            <p>Email : <input class="connect_email" name="mail" type="mail" id="mail" placeholder="Email" ></p>
            <p>Mot de passe : <input class="connect_pass" name="password" type="password" id="mdp" placeholder="Mot de passe" ></p>
            <button type="submit" id="btn_connect_user">Connexion</button>
        </form>
        <p class="pas_inscrit">Pas encore inscrit,
        <a href="inscription.php" id="connect_user">inscrivez-vous</a></p>
    </main>
