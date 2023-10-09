<?php

require_once '../partials/Autoloader.php';
require_once '../partials/Connexion_Db.php';

$quizzManager = new QuizzManager($pdo);

session_start();


if(isset($_POST['name']) && isset($_POST['theme'])) {
    if(isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
        $imageSize = 2097152;
        $extensions = ['jpg', 'png', 'jpeg'];

        if($_FILES['image']['size'] <= $imageSize) {
          $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
          if(in_array($extensionUpload, $extensions)) {
            $pathImage = "../images_quizz/" . $_SESSION['id'] . "-" . $_FILES['image']['name'];
            $uploadToPath = move_uploaded_file($_FILES['image']['tmp_name'], $pathImage);
                if($uploadToPath) {
                   $quizz = new Quizz([
                    "name" => $_POST['name'],
                    "theme" => $_POST['theme'],
                    "image" => $pathImage
                ]); 
                } else {
                    $error = "Votre image n'a pas pu être uploadé";
                }
                
            } else {
                $error = "Votre image n'est pas un jpg ou un png";
            }

        } else {
            $error = "Votre image est trop volumineuse";
        }
        
    } else {
        $quizz = new Quizz([
            "name" => $_POST['name'],
            "theme" => $_POST['theme']
        ]);
    }

    $quizzManager->create($quizz);

    header('Location: ../quizzlist.php');
} else {
    header('Location: ../quizzlist.php?error=il manque des informations à votre quizz');
}

?>