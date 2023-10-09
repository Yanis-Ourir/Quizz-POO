<?php

class QuizzManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create(Quizz $quizz) {
        $pdoRequest = $this->pdo->prepare("INSERT INTO quizz (name, theme, image, createdAt, idUser) VALUES (:name, :theme, :image, :createdAt, :idUser)");

        $pdoRequest->bindValue(':name', $quizz->getName());
        $pdoRequest->bindValue(':theme', $quizz->getTheme());
        $pdoRequest->bindValue(':image', $quizz->getImage());
        $pdoRequest->bindValue(':createdAt', $quizz->getCreatedAt());
        $pdoRequest->bindValue(':idUser', $quizz->getIdUser());
        $pdoRequest->execute();
    }

    public function findAll() {
        $pdoRequest = $this->pdo->prepare("SELECT * FROM quizz");
        $pdoRequest->execute();
        $allQuizz = $pdoRequest->fetchAll();

        foreach ($allQuizz as $quizz) {
            echo "<div> <img src=". $quizz['image'] . " alt='miniature-quizz'/> <p>" . $quizz['name'] . "</p></div>";
        }
    }
}


?>