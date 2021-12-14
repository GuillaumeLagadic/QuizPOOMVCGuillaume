
    <div class="container">
    
    <?php if ($viewVars['quizByTag'] != null) : ?>
    <?php foreach ($viewVars['quizByTag'] as $quiz) : ?>
        
        <div class="card">
            
                <h3 class="card-title"><?= $quiz->getTitle() ?></h3>
                <p class="card-text"><?= $quiz->getDescription() ?></p>
                <a href="quizQuestions?id=<?= $quiz->getId() ?>" class="card-link">Voir ce quiz</a>
        </div>
    <?php endforeach; ?>
    <?php endif; ?>
    </div>

