

    <div class="container"> 
    <?php foreach ($viewVars['tags'] as $tag) : ?>
        <div class="card">
            
                <h3 class="card-title"><?= $tag->getName() ?></h3>
                <a href="tag?id=<?= $tag->getId() ?>" class="card-link">Voir ce sujet</a>
        </div>
        <?php endforeach; ?>
    
    </div>

