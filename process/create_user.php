<?php

require_once '../partials/Autoloader.php';
require_once '../partials/Connexion_Db.php';

$userManager = new UserManager($pdo);

if(isset($_POST['pseudo']) 
&& isset($_POST['email']) 
&& isset($_POST['password'])
) {
    $user = new User([
        "pseudo" => $_POST['pseudo'],
        "email" => $_POST['email'],
        "password" => $_POST['password']
    ]);

    $userManager->create($user);
    

    header('Location: ../userlist.php?user=gg');
} else {
    header('Location: ../userlist.php?error=il manque des informations à l\'utilisateur');
}


?>