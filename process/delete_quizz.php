<?php
require_once '../partials/Connexion_Db.php';
require_once '../partials/Autoloader.php';

$idQuizz = $_GET['id'];
$quizzManager = new QuizzManager($pdo);


if ($idQuizz) {
    $quizzManager->delete($idQuizz);
    header('Location: ../edit-quizz.php');
} 

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer quizz</title>
</head>

<body>
     <h1>Il n'est pas possible de supprimer ce quizz</h1>
</body>

</html>