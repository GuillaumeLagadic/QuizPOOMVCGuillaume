
    
    <main class="connect_user">
    <!-- <?php foreach($viewVars['errors'] as $error) {
                echo "<p>$error</p>";
            }
        ?> -->
        <?php
        if(isset($logoutMsg)) {
            echo "<div>$logoutMsg</div>";
        }
    ?>
        <h1>Connexion Administrateur</h1>
        <form action="postLoginAdmin" method="POST">
            <p>Nom : <input class="inscri_nom" type="text" name="name" id="name" placeholder="Nom" ></p>
            <p>Email : <input class="connect_email" type="mail" name="mail" id="mail" placeholder="Email" ></p>
            <p>Mot de passe : <input class="connect_pass" type="password" name="password" id="password" placeholder="Mot de passe" ></p>
            <button type="submit" id="btn_connect_user">Connexion</button>
        </form>

        
        
    </main>

    <?php
        include 'views/footer.tpl.php';
    ?>