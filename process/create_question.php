<?php

require_once '../partials/Autoloader.php';
require_once '../partials/Connexion_Db.php';

session_start();

$questionManager = new QuestionManager($pdo);

if (isset($_POST['title']) && isset ($_POST['answer']) && isset ($_POST['scoreGranted']) && isset($_POST['timer']) && isset ($_POST['idQuizz'])) {
    if (isset($_FILES['image']) and !empty($_FILES['image']['name'])) {
        $imageSize = 2097152;
        $extensions = ['jpg', 'png', 'jpeg'];

        if ($_FILES['image']['size'] <= $imageSize) {
            $extensionUpload = strtolower(substr(strrchr($_FILES['image']['name'], '.'), 1));
            if (in_array($extensionUpload, $extensions)) {
                $pathImage = "../images_question/" . $_SESSION['id'] . "-" . $_FILES['image']['name'];
                $uploadToPath = move_uploaded_file($_FILES['image']['tmp_name'], $pathImage);
                if ($uploadToPath) {
                    $question = new Question([
                        'title' => $_POST['title'],
                        'image' => $pathImage,
                        'answer' => $_POST['answer'],
                        'scoreGranted' => $_POST['scoreGranted'],
                        'timer' => $_POST['timer'],
                        'idQuizz' => $_POST['idQuizz'],
                    ]);
                } else {
                    $error = "Votre image n'a pas pu être uploadé";
                }
            } else {
                $error = "Votre image n'est pas un jpg ou un png";
            }
        } else {
            $error = "Votre image est trop volumineuse";
        }


    $question = new Question([
        'title' => $_POST['title'],
        'answer' => $_POST['answer'],
        'scoreGranted' => $_POST['scoreGranted'],
        'timer' => $_POST['timer'],
        'idQuizz' => $_POST['idQuizz'],
    ]);

    var_dump($question);

    $questionManager->create($question);

    header('Location: ../add-question.php?success=question bien ajoutée');
} else {
    header('Location: ../add-question.php?error=IlmanqueDesInformations');
    
}

}
?>