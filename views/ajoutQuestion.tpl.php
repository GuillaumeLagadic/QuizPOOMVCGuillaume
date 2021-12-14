<?php
    // include 'inc/adminLogin.tpl.php';
    if (isset($_SESSION['admin'])) : 
    ?>

    <main class="modif">
        <h1 class="titre">Ajouter une question</h1>

        <div class="select-quiz">
            <label for="choose-quiz">Choisissez un quiz:</label>
            <select name="quiz" id="quiz-select">
                <option value="">Quiz</option>
                <option value="1">quiz 1</option>
                <option value="2">quiz 2</option>
                <option value="3">quiz 3</option>
                <option value="4">quiz 4</option>
                <option value="5">quiz 5</option>
                <option value="6">quiz 6</option>
            </select>
        </div>

        <div id="content-ajout">
            <p>Titre de la question : <input type="text" id="ajout-question"></p>
            <div id="ajout-reponse">
                    <p>Réponse 1 : <input type="text"></p>
                    <p>Réponse 2 : <input type="text"></p>
                    <p>Réponse 3 : <input type="text"></p>
                    <p>Réponse 4 : <input type="text"></p>
                    <p>Réponse 5 : <input type="text"></p>
            </div>
            <button type="submit" onclick="modif_projet()" id="btn_modif">Valider</button>
        </div>

    </main>

<?php 
endif; 
?>