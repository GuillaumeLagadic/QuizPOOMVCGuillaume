
    <div class="container"> 
        <?php if (isset($_SESSION['user'])) : ?>
        <div><h2>Bienvenue <?= $_SESSION['user'] ?></h2></div>
        <?php elseif (isset($_SESSION['admin'])) : ?>
        <div><h2>Bienvenue <?= $_SESSION['admin'] ?></h2></div>
        <?php else : ?>
        <?php endif; ?>
        
            <?php foreach ($viewVars['quizzes'] as $quiz) : ?>
            <div class="card">
                    <h3 class="card-title"><?= $quiz->getTitle() ?></h3>
                    <p class="card-text"><?= $quiz->getDescription() ?></p>
                    <p class="card-text">Crée le <?= $quiz->getCreatedAt() ?></p>
                    <p class="card-text">Par <?= $quiz->getUser() ?></p>   
                    <a href="quiz?id=<?= $quiz->getId() ?>" class="card-link">Voir ce quiz</a>
            </div>
            <?php endforeach; ?>
        
    </div>

