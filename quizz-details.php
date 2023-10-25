<?php

require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

$idQuizz = $_GET['id'];

$quizzManager = new QuizzManager($pdo);
$questionManager = new QuestionManager($pdo);

$quizz = $quizzManager->findOneById($idQuizz);
$countQuestion = $questionManager->countByQuizzId($idQuizz);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tous les quizz - PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php') ?>
        <div>
            <p><?php echo $quizz['name'] ?></p>
            <p><?php echo $quizz['theme'] ?></p>
            <img src='<?php echo $quizz['image'] ?>'/>
        </div>
    
     
        <div>
            <p>
                Ce quizz contient
            <?php
            if($countQuestion['COUNT(*)'] > 1) {
                echo $countQuestion['COUNT(*)'] . " questions";
            } else {
                echo $countQuestion['COUNT(*)'] . " question";
            }
            ?>
            </p>

        </div>

        <a href="./quizz-question.php?idQuizz=<?= $idQuizz ?>&idQuestion=1">Commencer !</a>

    <?php include('./partials/Footer.php') ?>
</body>

</html>