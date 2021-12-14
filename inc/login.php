<!-- < ?php

if(isset($_GET['logout'])) {
    $logoutMsg ='Vous avez été déconnecté';
}


$dsn = 'mysql:host=localhost;dbname=quiz';

$user = 'root';

$pass='';

$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING];

$pdo = new PDO($dsn, $user, $pass, $options);

$errors = [];

//Connexion

$sql = '
    SELECT *
    FROM app_users';

$queryConnect = $pdo->query($sql);

$login = $queryConnect->fetchAll(PDO::FETCH_ASSOC);

foreach($login as $user) {
    if(isset($_POST['mail']) && isset($_POST['password'])) {

    $prenom = $user['firstname'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

        if(($_POST['mail'] == $user['email']) && ($_POST['password'] == $user['password'])){
                
            if ($user['email'] == $mail && $user['password'] == $password) {
                $_SESSION['user'] = $prenom;
                header('Location: profil.php');
            } else {
                $errors[] = "L'adresse mail ou le mot de passe présente une erreur";
            }
    
        } else {
            $errors[] = "Cet utilisateur n'existe pas";
        }
    }
}



?> -->