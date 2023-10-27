<?php

require_once '../partials/Autoloader.php';
require_once '../partials/Connexion_Db.php';
session_start();

$quizzManager = new QuizzManager($pdo);
$idQuizz = $_GET['id'];
$findUpdatedQuizz = $quizzManager->findOneById($idQuizz);
$updatedAt = date('Y-m-d H:i:s', time());
var_dump($findUpdatedQuizz);

if(isset($_POST['name']) || isset($_POST['theme'])) {
    if ($findUpdatedQuizz) {
        $quizzManager->update($_POST['name'], $_POST['theme'], $updatedAt, $idQuizz);
        header('Location: user-quizz.php');
    } 
}


    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    Votre quizz n'a pas pu être modifier 
</body>
</html>




