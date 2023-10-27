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

    public function update($name, $theme, $updatedAt, $id) {
        $pdoRequest = $this->pdo->prepare("UPDATE quizz SET name = '$name', theme = '$theme', updatedAt = '$updatedAt' WHERE id = $id");
        $pdoRequest->execute();
    }

    public function findOneById($id) {
        $pdoRequest = $this->pdo->prepare("SELECT * FROM quizz WHERE id = $id");
        $pdoRequest->execute();
        $quizz = $pdoRequest->fetch();
        return $quizz;
    }

    public function findAllByUserId($idUser) {
        $pdoRequest = $this->pdo->prepare("SELECT * FROM quizz WHERE idUser = $idUser");
        $pdoRequest->execute();
        $allUserQuizz = $pdoRequest->fetchAll();
        return $allUserQuizz;
    }

    public function findAll() {
        $pdoRequest = $this->pdo->prepare("SELECT * FROM quizz");
        $pdoRequest->execute();
        $allQuizz = $pdoRequest->fetchAll();
        return $allQuizz;
    }

    public function delete($id) {
        $pdoRequest = $this->pdo->prepare("DELETE FROM quizz WHERE id = $id");
        var_dump($pdoRequest);
        $pdoRequest->execute();
        echo "Le quizz a bien été supprimé";        
    }
}


?>