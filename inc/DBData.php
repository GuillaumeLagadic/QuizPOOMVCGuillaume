<?php

/**
 * Classe permettant de retourner des données stockées dans la base de données
 */
class DBData
{
    /** @var PDO */
    private $dbh;

    /**
     * Constructeur se connectant à la base de données à partir des informations du fichier de configuration
     */
    public function __construct()
    {
        // Récupération des données du fichier de config
        //   la fonction parse_ini_file parse le fichier et retourne un array associatif
        // Attention, "config.conf" ne doit pas être versionné,
        //   on versionnera plutôt un fichier d'exemple "config.dist.conf" ne contenant aucune valeur
        $configData = parse_ini_file(__DIR__ . '/../config.conf');

        try {
            $this->dbh = new PDO(
                "mysql:host={$configData['DB_HOST']};dbname={$configData['DB_NAME']};charset=utf8",
                $configData['DB_USERNAME'],
                $configData['DB_PASSWORD'],
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING) // Affiche les erreurs SQL à l'écran
            );
        } catch (\Exception $exception) {
            echo 'Erreur de connexion...<br>';
            echo $exception->getMessage() . '<br>';
            echo '<pre>';
            echo $exception->getTraceAsString();
            echo '</pre>';
            exit;
        }
    }

    public function Login()
    {
        $errors = [];

        //Connexion

        $sql = '
    SELECT *
    FROM app_users';

        $queryConnect = $this->dbh->query($sql);

        $login = $queryConnect->fetchAll(PDO::FETCH_ASSOC);

        foreach ($login as $user) {
            if (isset($_POST['mail']) && isset($_POST['password'])) {

                $prenom = $user['firstname'];
                $mail = $_POST['mail'];
                $password = $_POST['password'];

                if (($_POST['mail'] == $user['email']) && ($_POST['password'] == $user['password'])) {

                    if ($user['email'] == $mail && $user['password'] == $password) {
                        $_SESSION['user'] = $prenom;
                        header('Location: profil');
                    } else {
                        $errors[] = "L'adresse mail ou le mot de passe présente une erreur";
                    }
                } else {
                    $errors[] = "Cet utilisateur n'existe pas";
                }
            }
        }

        return $errors;
    }

    public function LoginAdmin()
    {
        $errors = [];

        include 'admin.php';
        
        if (isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['password'])) {

            $adminName = $_POST['name'];
            $mail = $_POST['mail'];
            $password = $_POST['password'];


            if (isset($admins[$adminName])) {

                if ($admins[$adminName]['mail'] == $mail) {

                    if ($admins[$adminName]['password'] == $password) {
                        $_SESSION['admin'] = $adminName;

                        header('Location: profiladmin');
                    } else {
                        $errors[] = "Mauvais mot de passe";
                    }
                } else {
                    $errors[] = "Cet e-mail n'existe pas";
                }
            } else {
                $errors[] = "Cet utilisateur n'existe pas";
            }
        }
    }

    /**
     * Méthode permettant de retourner les quizzes de la BD
     *
     * @return Quiz[]
     */
    public function getAllQuizzes()
    {
        $sql = '
        SELECT quizzes.id, quizzes.title, quizzes.description, quizzes.status, quizzes.created_at, quizzes.updated_at,
        app_users.firstname as firstName, app_users.lastname as lastName, app_users.email as email, app_users.password as password
        FROM quizzes
        JOIN app_users ON quizzes.app_users_id = app_users.id
        ';

        $quizzesList = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($quizzesList as $quizzes) {
            $quizzesObject[] = new Quiz(
                $quizzes['id'],
                $quizzes['title'],
                $quizzes['description'],
                $quizzes['status'],
                $quizzes['created_at'],
                $quizzes['updated_at'],
                $quizzes['firstName'],
                $quizzes['lastName'],
                $quizzes['email'],
                $quizzes['password'],
            );
        }

        return $quizzesObject;
    }

    /**
     * Méthode permettant de retourner les quizzes de la BD
     *
     * @return Tag[]
     */
    public function getAllTags()
    {
        $sql = '
        SELECT tags.id, tags.name, tags.status, tags.created_at, tags.updated_at
        FROM tags
        ';

        $tagsList = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tagsList as $tags) {
            $tagsObject[] = new Tag(
                $tags['id'],
                $tags['name'],
                $tags['status'],
                $tags['created_at'],
                $tags['updated_at'],
            );
        }

        return $tagsObject;
    }


    /**
     * Méthode permettant de retourner les données sur un tag donné
     *
     * @param int $tagId
     * @return Tag
     */
    public function getTagDetails($tagId)
    {
        $sql = '
        SELECT tags.id, tags.name, tags.status, tags.created_at, tags.updated_at
        FROM tags
        WHERE tags.id = ' . $tagId . '
        ';

        $tag = $this->dbh->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($tag) {
            $tagObject = new Tag(
                $tag['id'],
                $tag['name'],
                $tag['status'],
                $tag['created_at'],
                $tag['updated_at'],
            );
        } else {
            $tagObject = null;
        }

        return $tagObject;
    }

    /**
     * Méthode permettant de retourner les données sur un quiz donné
     *
     * @param int $quizId
     * @return Quiz
     */
    public function getQuizDetails($quizId)
    {
        $sql = '
        SELECT
            quizzes.id,
            quizzes.title,
            quizzes.description,
            quizzes.status,
            quizzes.created_at,
            quizzes.updated_at,
            app_users.firstname as firstName,
            app_users.lastname as lastName,
            app_users.email as email,
            app_users.password as password
        FROM quizzes
        JOIN app_users ON quizzes.app_users_id = app_users.id
        WHERE quizzes.id = ' . $quizId . '
        ';

        $singleQuiz = $this->dbh->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($singleQuiz) {
            $singleQuizObject = new Quiz(
                $singleQuiz['id'],
                $singleQuiz['title'],
                $singleQuiz['description'],
                $singleQuiz['status'],
                $singleQuiz['created_at'],
                $singleQuiz['updated_at'],
                $singleQuiz['firstName'],
                $singleQuiz['lastName'],
                $singleQuiz['email'],
                $singleQuiz['password'],
            );
        } else {
            $singleQuizObject = null;
        }

        // echo '<pre>';
        // var_dump($singleQuizObject);
        // echo '<pre>';
        return $singleQuizObject;
    }




    /**
     * Méthode permettant de retourner les données sur un tag donné
     *
     * @param int $tagId
     * @return quizByTag
     */
    public function getQuizzesByTag($quizTagId)
    {
        $sql = '
        SELECT
            quizzes_has_tags.quizzes_id as quiz_id,
            quizzes.title as quiz_title,
            quizzes.description as quiz_description,
            quizzes.status as quiz_status,
            quizzes.created_at as quiz_creation_date,
            quizzes.updated_at as quiz_last_update,
            quizzes_has_tags.tags_id as tags_id,
            tags.name as tag_name,
            tags.status as tag_status,
            tags.created_at as tag_creation_date,
            tags.updated_at as tag_last_update        
        FROM quizzes_has_tags
        JOIN quizzes ON quizzes_has_tags.quizzes_id = quizzes.id
        JOIN tags ON  quizzes_has_tags.tags_id = tags.id
        WHERE quizzes_has_tags.tags_id = ' . $quizTagId . '
        ';

        $quizByTag = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($quizByTag as $quizByTag) {
            $quizObject[] = new Quiz(
                $quizByTag['quiz_id'],
                $quizByTag['quiz_title'],
                $quizByTag['quiz_description'],
                $quizByTag['quiz_status'],
                $quizByTag['quiz_creation_date'],
                $quizByTag['quiz_last_update'],
                new Tag($quizByTag['tags_id'], $quizByTag['tag_name'], $quizByTag['tag_status'], $quizByTag['tag_creation_date'], $quizByTag['tag_last_update'])
            );
        }

        return $quizObject;
    }

    /**
     * Méthode permettant de retourner les données des questions sur un quiz donné
     *
     * @param int $quizId
     * @return Question
     */
    public function getAllQuestions()
    {
        $sql = '
        SELECT *
        FROM questions
        ';

        $questions = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if ($questions) {
            foreach ($questions as $question) {
                $questionObject[] = new Question(
                    $question['id'],
                    $question['question'],
                    $question['anecdote'],
                    $question['wiki'],
                    $question['status'],
                    $question['created_at'],
                    $question['updated_at'],
                    $question['levels_id'],
                    $question['answers_id'],
                    $question['quizzes_id'],
                );
            }
        } else {
            $questionObject = null;
        }

        // echo '<pre>';
        // var_dump($questionObject);
        // echo '<pre>';
        return $questionObject;
    }

    /**
     * Méthode permettant de retourner les données des questions sur un quiz donné
     *
     * @param int $questionId
     * @return Question
     */
    public function getQuestionDetails($questionId)
    {
        $sql = '
        SELECT questions.id, questions.question, questions.anecdote, questions.wiki, questions.status, questions.created_at, questions.updated_at, questions.levels_id as level, questions.answers_id as answer, questions.quizzes_id as quiz
        FROM questions
        WHERE questions.id = ' . $questionId . '
        ';

        $question = $this->dbh->query($sql)->fetch(PDO::FETCH_ASSOC);

        if ($question) {
            $questionObject = new Question(
                $question['id'],
                $question['question'],
                $question['anecdote'],
                $question['wiki'],
                $question['status'],
                $question['created_at'],
                $question['updated_at'],
                $question['level'],
                $question['answer'],
                $question['quiz']

            );
        } else {
            $questionObject = null;
        }

        // echo '<pre>';
        // var_dump($questionObject);
        // echo '<pre>';
        return $questionObject;
    }

    /**
     * Méthode permettant de retourner les données des questions sur un quiz donné
     *
     * @param int $quizId
     * @return Question
     */
    public function getQuestionsByQuiz($questionQuizId)
    {
        $sql = '
        SELECT
            questions.id,
            questions.question,
            questions.anecdote,
            questions.wiki,
            questions.status,
            questions.created_at,
            questions.updated_at,
            levels.name as LVLName,
            answers.description as answers_desc,
            quizzes.id as quiz_id,
            quizzes.title as quiz_title,
            quizzes.description as quiz_desc,
            quizzes.status as quiz_status,
            quizzes.created_at as quiz_creation_date,
            quizzes.updated_at as quiz_last_update,
            quizzes.app_users_id as quiz_user
        FROM questions
        JOIN quizzes ON questions.quizzes_id = quizzes.id
        JOIN answers ON questions.answers_id = answers.id
        JOIN levels ON questions.levels_id = levels.id
        WHERE quizzes.id = ' . $questionQuizId . '
        ';

        $quizQuestions = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if ($quizQuestions) {
            foreach ($quizQuestions as $questions) {
                $questionObject[] = new Question(
                    $questions['id'],
                    $questions['question'],
                    $questions['anecdote'],
                    $questions['wiki'],
                    $questions['status'],
                    $questions['created_at'],
                    $questions['updated_at'],
                    $questions['LVLName'],
                    $this->getAnswersByQuestion($questions['id']),
                    new Quiz(
                        $questions['quiz_id'],
                        $questions['quiz_title'],
                        $questions['quiz_desc'],
                        $questions['quiz_status'],
                        $questions['quiz_creation_date'],
                        $questions['quiz_last_update'],
                        $questions['quiz_user'],
                    )
                );
            }
        } else {
            $questionObject = null;
        }

        // echo '<pre>';
        // var_dump($questionObject);
        // echo '<pre>';
        return $questionObject;
    }


    /**
     * Méthode permettant de retourner les données des questions sur un quiz donné
     *
     * @param int $questionId
     * @return Question
     */
    public function getGoodAnswers($questionQuizId)
    {

        $sql = '
            SELECT questions.answers_id
            FROM questions
            JOIN quizzes ON questions.quizzes_id = quizzes.id
            WHERE quizzes.id = ' . $questionQuizId . '
        ';

        $queryAnswers = $this->dbh->query($sql);

        $answers = $queryAnswers->fetchAll(PDO::FETCH_ASSOC);

        return $answers;
    }

    /**
     * Méthode permettant de retourner les données des questions sur un quiz donné
     *
     * @param int $questionId
     * @return Question
     */
    public function getAnswersByQuestion($questionId)
    {
        $sql = '
        SELECT
            *
        FROM answers
        WHERE answers.questions_id = ' . $questionId . '
        ';

        $quizAnswers = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        if ($quizAnswers) {
            foreach ($quizAnswers as $answers) {
                $answerObject[] = new Answer(
                    $answers['id'],
                    $answers['description']
                );
            }
        } else {
            $answerObject = null;
        }

        // echo '<pre>';
        // var_dump($answerObject);
        // echo '<pre>';
        return $answerObject;
    }


    /**
     * Méthode permettant de retourner les données sur un tag donné
     *
     * @param int $tagId
     * @return singleQuizTags
     */
    public function getTagsByQuiz($quizId)
    {
        $sql = '
        SELECT
            quizzes_has_tags.quizzes_id as quiz_id,
            tags.* 
        FROM quizzes_has_tags
        JOIN tags ON  quizzes_has_tags.tags_id = tags.id
        WHERE quizzes_has_tags.quizzes_id = ' . $quizId . '
        ';

        $singleQuizTags = $this->dbh->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        foreach ($singleQuizTags as $singleQuizTags) {
            $tagObject[] = new Tag(
                $singleQuizTags['id'],
                $singleQuizTags['name'],
                $singleQuizTags['status'],
                $singleQuizTags['created_at'],
                $singleQuizTags['updated_at']
            );
        }

        // echo '<pre>';
        // var_dump($tagObject);
        // echo '<pre>';
        return $tagObject;
    }
}
