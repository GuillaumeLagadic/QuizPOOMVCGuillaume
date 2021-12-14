<?php
    
    // if (isset($_SESSION['admin'])) : 
    ?>
    <main>
        <h2>Bienvenue <?= $_SESSION['admin'] ?></h2>
        <div class="profil-admin-container">

            <div class="list-container">
                <h4>Liste des sujets/tags</h4>
                <div class="tags-quiz-question">
                    <?php foreach ($viewVars['tags'] as $tag) : ?>
                    <div class="flex-list" id="list1" value="1">
                        <div class="list">
                            <p>Sujet 1 : <?= $tag->getName()?></p>
                        </div>
                        <img src="./assets/img/supp.png"  id="2" class="deletelist" alt="Image suppression" width="50px">
                        <a href="modif-formTag?id=<?= $tag->getId() ?>" ><img src="./assets/img/modif.png" id="modif" alt="Image modification"></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <img src="./assets/img/ajouter.png" onclick="ajouter()" class="ajout" alt="Image ajouter" width="40px">
            </div>

            <div class="list-container">
                <h4>Liste des quiz</h4>
                <div class="tags-quiz-question">
                <?php foreach ($viewVars['quizzes'] as $quiz) : ?>
                    <div class="flex-list" id="list1" value="1">
                        <div class="list">
                            <p>Quiz 1 : <?= $quiz->getTitle()?></p>
                        </div>
                        <img src="./assets/img/supp.png"  id="2" class="deletelist" alt="Image suppression" width="50px">
                        <a href="modif-formQuiz?id=<?= $quiz->getId() ?>" ><img src="./assets/img/modif.png" id="modif" alt="Image modification"></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <img src="./assets/img/ajouter.png" onclick="ajouter()" class="ajout" alt="Image ajouter" width="40px">
            </div>
            
            <div class="list-container">
                <h4>Liste des questions</h4>
                <div class="tags-quiz-question">
                <?php foreach ($viewVars['questions'] as $question) : ?>
                    <div class="flex-list" id="list1" value="1">
                        <div class="list">
                            <p>Question <?= current($question) ?> : <?= $question->getQuestion()?></p>
                        </div>
                        <img src="./assets/img/supp.png"  id="2" class="deletelist" alt="Image suppression" width="50px">
                        <a href="modif-formQuestion?id=<?= $question->getId() ?>"><img src="./assets/img/modif.png" id="modif" alt="Image modification"></a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <img src="./assets/img/ajouter.png" onclick="ajouter()" class="ajout" alt="Image ajouter" width="40px">
            </div>
        </div>
        
    </main>
<?php 
// endif; 
?>