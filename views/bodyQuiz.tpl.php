
    <main>
    <?php if (current($viewVars['questions'])->getQuiz() != null) : ?>
        <p>Sujets liés : 
                    <?php foreach ($viewVars['tags'] as $tag) : ?>
                        <?= $tag->getName() ?>, 
                        <?php endforeach; ?>
        </p>
        
        <div class="level-container">
            <div class="card">
                <h3><?= current($viewVars['questions'])->getQuiz()->getTitle() ?></h3>
                <?php if ($viewVars['quiz']->getId() != null) : ?>
                <p><?= $viewVars['quiz']->getDescription() ?></p>
                <?php else : ?>
                <p class="card-text">Aucune description ne correspond à ce quiz</p>
                <?php endif; ?>
            </div>
            
            <div class="question-level">
                
                <div class="level">
                    <?php foreach ($viewVars['questions'] as $questions) : ?>
                    <p><span class="span-level">Question <?= current($questions) ?> : </span><?= $questions->getLevel() ?></p>
                    <?php endforeach; ?>
                </div>
                <?php if ($viewVars['quiz']->getId() != null) : ?>
                <button type="submit" id="btn_question_level"><a href="quizQuestions?id=<?= $viewVars['quiz']->getId() ?>">Commencer le quiz</a></button>
                <?php endif; ?>
            </div>
        </div>
        
        <?php else : ?>
            <p class="card-text">Aucun quiz ne correspond à votre recherche</p>
        <?php endif; ?> 
    </main>