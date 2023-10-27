<?php
require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

session_start();

$quizz = new QuizzManager($pdo);

$currentQuizz = $quizz->findOneById($_GET['idQuizz']);


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
    <form action="/process/update_quizz.php?id=<?=$currentQuizz['id']?>" method="post" enctype="multipart/form-data" class="p-4 m-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nom de votre quizz</label>
            <input type="text" class="form-control" name="name" value="<?= $currentQuizz['name'] ?>">
        </div>
        <div class="mb-3">
            <label for="theme" class="form-label">Thème de votre quizz</label>
            <input type="text" class="form-control" name="theme" value="<?= $currentQuizz['theme'] ?>">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label"><img src="<?= $currentQuizz['image'] ?>" alt="quizz"></label>
            <input type="file" class="form-control" name="image">
        </div>
        <button type="submit" class="btn btn-primary">Créer un quizz</button>
    </form>



    <?php include('./partials/Footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>