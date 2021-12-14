<?php
    // include 'inc/adminLogin.tpl.php';
    if (isset($_SESSION['admin'])) : 
    ?>
    <main class="modif">
        <h1 class="titre">Modifier un sujet/tag</h1>

        <div id="content-modif">
            <h3 class="nbreprojet">Sujet 1 : <?=$viewVars['tag']->getName() ?></h3>
            <p>Nouveau titre : <input type="text" name="new" id="modif-tag"></p>
            <button type="submit" id="btn_modif">Valider</button>
    </main>

<?php 
endif; 
?>