<?php
require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

$idQuizz = $_GET['idQuizz'];
$idQuestion = $_GET['idQuestion'];

$questionManager = new QuestionManager($pdo);

$question = $questionManager->findOneByQuizzId($idQuizz, $idQuestion);

var_dump($question);

$timer = $question['timer'];




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php include('./partials/Navbar.php'); ?>

    <div>
        <p id="timer">15</p>
    </div>
    <div>
        <img src="<?=$question['image'] ?>" alt="question-image">
    <?php echo "<p>" . $question['title'] . "</p>"; ?>
    </div>

    <form method="post" action="">
        <label for="answer">Votre réponse :</label>
        <input type="text" name="answer" id="answer">
    </form>






    <?php include('./partials/Footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        let questionTime = <?= $timer ?>;
        const chronoTime = document.querySelector('#timer');
        console.log(questionTime);
        const timer = setInterval(function() {
            questionTime -= 1;
            chronoTime.innerHTML = questionTime;
            console.log(questionTime);
            if (questionTime === 0) {
                window.location.href = "./quizz-question.php?idQuizz=<?= $idQuizz ?>&idQuestion=<?= $idQuestion + 1 ?>";
                return;
            }
        }, 1000);
    </script>
</body>

</html>