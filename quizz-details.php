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
    <title>Quizz <?php echo $quizz['name'] ?> - PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php') ?>

    <div class="card text-center m-4">
        <div class="card-header">
            <?php echo $quizz['theme'] ?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><?php echo $quizz['name'] ?></h5>
            <img src='<?php echo $quizz['image'] ?>' />
            <p class="card-text m-4"> Ce quizz contient
                <?php
                if ($countQuestion['COUNT(*)'] > 1) {
                    echo $countQuestion['COUNT(*)'] . " questions";
                } else {
                    echo $countQuestion['COUNT(*)'] . " question";
                }
                ?>
            </p>
            <a href="./quizz-question.php?idQuizz=<?= $idQuizz ?>&idQuestion=1" class="btn btn-primary">Commencer !</a>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
    </div>


    <?php include('./partials/Footer.php') ?>
</body>

</html>