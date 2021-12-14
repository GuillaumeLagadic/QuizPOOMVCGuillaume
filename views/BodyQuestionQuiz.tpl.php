
    <main>
    
    <?php if (current($viewVars['questions'])->getQuiz() != null) : ?>
        
        <div class="title-quiz">
        
            <p><?= current($viewVars['questions'])->getQuiz()->getTitle() ?></p>
            <p>Sujets liés : 
                    <?php foreach ($viewVars['tags'] as $tag) : ?>
                        <?= $tag->getName() ?>, 
                        <?php endforeach; ?>
            </p>
        </div>
        

        <div class="container-quiz">
        <?php foreach ($viewVars['questions'] as $questions) : ?>
            <div id="infos-quiz">
                <p>Question <?= current($questions) ?></p>
                <p id="info-level-question-quiz">Niveau <?= $questions->getLevel() ?></p>
            </div>
            <h4><?= $questions->getQuestion() ?></h4>
            
        
            <?php if (isset($_SESSION['user'])) : ?>
            <form action="quizAnswers?id=<?= $questions->getQuiz()->getId() ?>" method="POST">
                
                <?php foreach ($questions->getAnswer() as $answer) : ?>
                    <p id="answer<?= $questions->getId() ?>">
                    <input name="answer[<?= $questions->getId() ?>]" type="radio" value="<?= $answer->getId() ?>"><?= $answer->getDescription() ?>
                    </p>
                <?php endforeach; ?>
            
                <?php endif; ?>
        <?php endforeach; ?>
            <?php if (isset($_SESSION['user'])) : ?>
            <button type="submit" id="btn_question_quiz_next">
                Voir les résultats
            </button>
            <?php endif; ?>
            </form>        
        </div>
        
    <?php else : ?>
            <p class="card-text">Aucun quiz ne correspond à votre recherche</p>
    <?php endif; ?>
    </main>