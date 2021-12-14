<?php
    // include 'inc/adminLogin.php';
    if (isset($_SESSION['admin'])) : 
    ?>
    <main class="modif">
        <h1 class="titre">Modifier une question</h1>

        <div id="content-modif">
            <h3 class="nbreprojet">Question 1 : <?=$viewVars['question']->getQuestion() ?></h3>
            <p>Nouvelle question : <input type="text" name="new" id="modif-question"></p>
            <button type="submit" id="btn_modif">Valider</button>
    </main>
<?php 
endif; 
?>