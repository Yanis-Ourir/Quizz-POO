<?php

require_once './partials/Autoloader.php';
require_once './partials/Connexion_Db.php';

session_start();

$quizzManager = new QuizzManager($pdo);

$allUserQuizz = $quizzManager->findAllByUserId($_SESSION['id']);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter question - POO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php') ?>
    <form action="/process/create_question.php" method="post" enctype="multipart/form-data" class="p-4">
        <div class="mb-3">
            <label for="title" class="form-label">Votre question</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="theme" class="form-label">La réponse attendu à votre question</label>
            <input type="text" class="form-control" name="answer">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Image pour votre question si nécessaire</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="mb-3">
            <label for="scoreGranted" class="form-label">Combien de point(s) pour cette question ? (entre 1 et 5 points)</label>
            <input type="number" class="form-control" name="scoreGranted" min="1" max="5" value="1">
        </div>
        <div class="mb-3">
            <label for="timer" class="form-label">Combien de temps pour cette question ? (entre 10 et 30 secondes)</label>
            <input type="number" class="form-control" name="timer" min="10" max="30" value="10">
        </div>
        <div class="mb-3">
            <label for="quizz" class="form-label">à quelle quizz cette question appartient-elle ?</label>
            <select id="select" class="form-select" name="idQuizz">
                <?php
                foreach ($allUserQuizz as $quizz) {
                    echo "<option value='" . $quizz['id'] . "' >" . $quizz['name'] . "</option>";
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer une question</button>
    </form>
    <?php include('./partials/Footer.php') ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>