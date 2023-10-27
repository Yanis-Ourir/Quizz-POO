<?php

require_once './partials/Autoloader.php';
session_start();
if ($_SESSION['logged'] != true) {
    header('Location: connexion.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz - POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php') ?>
    <h1 class="text-center m-4">BIENVENU <?php echo $_SESSION['pseudo'];
                                            echo $_SESSION['id'] ?></h1>


    <div class="d-flex justify-content-center">
        <div class="card m-4" style="width: 18rem;">
            <img src="./assets/images/quizz.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Nouveau quizz</h5>
                <p class="card-text">Ajouter un nouveau quizz avec un thème de votre choix !</p>
                <a href="./quizz.php" class="btn btn-primary">Créer un quizz</a>
            </div>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <img src="./assets/images/quizz.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Ajouter des questions</h5>
                <p class="card-text">Ajouter des questions à vos quizz déjà existant</p>
                <a href="./add-question.php" class="btn btn-primary">Nouvelle question</a>
            </div>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <img src="./assets/images/quizz.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Vos quizz</h5>
                <p class="card-text">Supprimer/Modifier contempler vos quizz</p>
                <a href="./user-quizz.php" class="btn btn-primary">Modifier un quizz</a>
            </div>
        </div>

        <div class="card m-4" style="width: 18rem;">
            <img src="./assets/images/quizz.jpg" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">Participer à des quizz</h5>
                <p class="card-text">Répondez à des quizz réaliser par la communauté !</p>
                <a href="./quizzlist.php" class="btn btn-primary">Commencer</a>
            </div>
        </div>
    </div>



    <?php include('./partials/Footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>