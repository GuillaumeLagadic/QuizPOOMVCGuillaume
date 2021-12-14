<!-- </?php

$dsn = 'mysql:host=localhost;dbname=quiz';

$user = 'root';

$pass='';

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

$pdo = new PDO($dsn, $user, $pass, $options);

$errors = [];

$sql = '
    SELECT questions.answers_id
    FROM questions
    ';

$queryAnswers = $this->$pdo->query($sql);

$answers = $queryAnswers->fetchAll(PDO::FETCH_ASSOC);

if(isset($_POST['answer']) && !empty($_POST['answer'])) {
    foreach($answers as $answer) {
        // $answer = $_POST['id'];
        

    }   

    header('Location: quizAnswers');
} else {
    header('Location: quizAnswers');
    $errors[] = "Vous n'avez donné aucune réponse";
    var_dump($errors);
} -->