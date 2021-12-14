<!-- <?php

    echo '<pre>';
            var_dump($_POST);
            // var_dump($viewVars['questions']);
            echo '<pre>';
    ?> -->
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
        
        <?php 
            $goodAnswers = [];
            $arrayAnswers = [];
            $score = 0;
        
            foreach ($viewVars['goodAnswers'] as $key => $goodAnswer) {
                $goodAnswers[$key]['good'] = $goodAnswer['answers_id'];
                // var_dump($key);
            }

            foreach ($_POST['answer'] as $key => $submitted_answer) {
                $arrayAnswers[] = $submitted_answer; 
            }

            foreach($arrayAnswers as $key => $answers) {
                $goodAnswers[$key]['post'] = $answers;
                // var_dump($arrayAnswers);
            }
        ?>
        
        <?php foreach ($goodAnswers as $submitted_answer) : ?>
            
                <?php if($submitted_answer['post'] == $submitted_answer['good']) : ?>
                    <?php $score ++; ?> 
                <p>Bonne réponse</p>                
                <?php else : ?>                    
                    <p>Mauvaise réponse</p>
                <?php endif; ?>
            <?php endforeach; ?>
            <p> Score :
            <?php echo $score; ?>
            / 10</p>
        
        

        
    <?php else : ?>
        <p class="card-text">Aucun quiz ne correspond à votre recherche</p>
    <?php endif; ?>
        </div>
    </main>