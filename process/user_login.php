<?php
session_start();
require_once '../partials/Connexion_Db.php';

if (isset($_POST['email']) && isset($_POST['password'])) {
   $email = $_POST['email'];
   $password = $_POST['password']; 
   $login = $pdo->prepare('SELECT * FROM user WHERE email = ? AND password = ?');
   $login->execute([$email,$password]);
   $user = $login->fetchAll();

   $_SESSION['logged'] = true;
   $_SESSION['pseudo'] = $user[0]['pseudo'];
   $_SESSION['id'] = $user[0]['id'];


   header('Location: ../index.php');
} else {
    echo "Il y a une erreur de pseudo ou de mot de passe";
}




?>