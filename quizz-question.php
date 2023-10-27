<?php
require_once './partials/Connexion_Db.php';
require_once './partials/Autoloader.php';

$idQuestion = $_GET['idQuestion'];
$idQuizz = $_GET['idQuizz'];

$questionManager = new QuestionManager($pdo);

$question = $questionManager->findOneByQuizzId($idQuestion);

$countQuestion = $questionManager->countByQuizzId($idQuizz);
$numberOfQuestion = $countQuestion['COUNT(*)'];

$timer = $question['timer'];
$answer = $question['answer'];

$pastAnswer = $_POST['pastAnswer'];
var_dump($pastAnswer);


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

    <div class="d-flex flex-column align-items-center m-4 p-4">
        <div>
            <p id="timer" class=""><?= $timer ?></p>

        </div>
        <div>
            <?php if ($question['image'] === null) {
                echo "<img src='./assets/images/quizz.jpg' alt='quizz'>";
            } else {
                echo "<img src=" . $question['image'] . " alt='question-image'>";
            }
            ?>

            <?php echo "<h3 class='mt-4'>" . $question['title'] . "</h3>"; ?>
        </div>

        <form id="answer-form" method="post" action="./quizz-question.php?idQuizz=<?= $idQuizz ?>&idQuestion=<?= $idQuestion + 1 ?>">
            <label for="pastAnswer">Votre réponse :</label>
            <input type="text" name="pastAnswer" id="pastAnswer">
        </form>
    </div>

    <div class="progress m-4">
        <div class="progress-bar progress-bar-striped progress-bar-animated" id="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
    </div>





    <?php include('./partials/Footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <script>
        let questionTime = <?= $timer ?>;
        const answer = "<?= $answer ?>";
        const chronoTime = document.querySelector('#timer');
        let progressBar = document.querySelector('#progress-bar');
        const reduceProgressBar = parseInt(progressBar.style.width) / questionTime;
        const idQuestion = <?= $idQuestion ?>;
        const numberOfQuestion = <?= $numberOfQuestion ?>;
        const answerForm = document.querySelector('#answer-form');
        console.log(answerForm);


        const timer = setInterval(function() {
            questionTime -= 1;
            chronoTime.innerHTML = questionTime;
            progressBar.style.width = parseInt(progressBar.style.width) - reduceProgressBar + '%';
            console.log(progressBar);
            if (questionTime <= 0) {
                if (idQuestion >= numberOfQuestion) {
                    window.location.href = "./quizz-end.php";
                } else {
                    answerForm.submit();
                    window.location.href = "./quizz-question.php?idQuizz=<?= $idQuizz ?>&idQuestion=<?= $idQuestion + 1 ?>";
                    return;
                }
            }
        }, 1000);
    </script>
</body>

</html>