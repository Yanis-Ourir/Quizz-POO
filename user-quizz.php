<?php
require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

session_start();

$quizz = new QuizzManager($pdo);
$quizzOwner = $quizz->findAllByUserId($_SESSION['id']);


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier vos quizz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php'); ?>
    <div class='container'>
        <div class='row'>
            <?php
            foreach ($quizzOwner as $quizz) {
                echo " <div class='col-4 mt-4'>
                    <div class='card' style='width: 18rem;'>
                        <img src=" . $quizz['image'] . " alt='miniature-quizz' />
                        <div class='card-body'>
                            <h5 class='card-title'>" . $quizz['name'] . "</h5>
                            <p class='card-text'>" . $quizz['theme'] . "</p>
                            <a href='./edit-quizz.php?idQuizz=" . $quizz['id'] . "' class='btn btn-primary'>Modifier</a>
                            <a href='./process/delete_quizz.php?id=" . $quizz['id'] . "' class='btn btn-danger'>Supprimer</a>
                        </div>
                    </div>
                </div>";
            }
            ?>
        </div>
    </div>



            <?php include('./partials/Footer.php'); ?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>