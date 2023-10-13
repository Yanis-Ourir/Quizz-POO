<?php

require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

$quizzManager = new QuizzManager($pdo);
$allQuizz = $quizzManager->findAll();

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

    <div class='container'>
        <div class='row'>
            <?php 
            foreach ($allQuizz as $quizz) {
                echo " <div class='col-4 mt-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src=". $quizz['image'] . " alt='miniature-quizz' />
                        <div class='card-body'>
                            <h5 class='card-title'>" . $quizz['name'] . "</h5>
                            <p class='card-text'>" . $quizz['theme'] . "</p>
                            <a href='./quizz-details.php?id=". $quizz['id'] ."' class='btn btn-primary'>Quizz !</a>
                            <a href='./quizz-delete.php?id=". $quizz['id'] ."' class='btn btn-danger'>Supprimer</a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>

    <?php

    echo date('m/d/Y h:i:s a', time());

    ?>

    <?php include('./partials/Footer.php') ?>
</body>

</html>