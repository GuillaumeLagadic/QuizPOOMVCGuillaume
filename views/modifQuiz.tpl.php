<?php
    // include 'inc/adminLogin.tpl.php';
    if (isset($_SESSION['admin'])) : 
        
    ?>
    <main class="modif">
        <h1 class="titre">Modifier un quiz</h1>

        <div id="content-modif">
            
            <h3 class="nbreprojet">Quiz 1 : <?=$viewVars['quiz']->getTitle() ?></h3>
            <p>Nouveau titre : <input type="text" name="new" id="modif-quiz"></p>
            <button type="submit" id="btn_modif">Valider</button>
            
    </main>

<?php 
endif; 
?>