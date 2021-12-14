<!-- < ?php


if(isset($_GET['logout'])) {
    $logoutMsg ='Vous avez été déconnecté';
}


include 'admin.php';
        
$errors = [];

if(isset($_POST['name']) && isset($_POST['mail']) && isset($_POST['password'])) {

    $adminName = $_POST['name'];
    $mail = $_POST['mail'];
    $password = $_POST['password'];

    // if (strlen($mail) > 3 && strlen($password) > 3) {
        
        

        if(isset($admins[$adminName])) {

                if ($admins[$adminName]['mail'] == $mail) {

                    if ($admins[$adminName]['password'] == $password) {
                        $_SESSION['admin'] = $adminName;

                        header('Location: ./index.php');
                    } else {
                        $errors[] = "Mauvais mot de passe";
                    }
                } else {
                    $errors[] = "Cet e-mail n'existe pas";
                }
            
        } else {
            $errors[] = "Cet utilisateur n'existe pas";
        }
        
    // } else {
    //     $errors[] = "Vos identifiants doivent contenir plus de 3 caractères";
    // }

} -->
