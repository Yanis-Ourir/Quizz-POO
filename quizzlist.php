<?php

require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quizz - PDO</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php') ?>
    <?php $quizzManager = new QuizzManager($pdo);
    $quizzManager->findAll();
    ?>

    <?php

    echo date('m/d/Y h:i:s a', time());

    ?>

    <?php include('./partials/Footer.php') ?>
</body>

</html>