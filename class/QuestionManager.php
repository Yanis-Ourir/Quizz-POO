<?php 

class QuestionManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create(Question $question) {
        $pdoRequest = $this->pdo->prepare("INSERT INTO question (title, image, answer, scoreGranted, timer, idQuizz) VALUES (:title, :image, :answer, :scoreGranted, :timer, :idQuizz)");

        $pdoRequest->bindValue(':title', $question->getTitle());
        $pdoRequest->bindValue(':image', $question->getImage());
        $pdoRequest->bindValue(':answer', $question->getAnswer());
        $pdoRequest->bindValue(':scoreGranted', $question->getScoreGranted());
        $pdoRequest->bindValue(':timer', $question->getTimer());
        $pdoRequest->bindValue(':idQuizz', $question->getIdQuizz());

        var_dump($pdoRequest->execute());
    }

    public function findAllByQuizzId($idQuizz) {
        $pdoRequest = $this->pdo->prepare("SELECT * FROM question WHERE idQuizz = $idQuizz");
        $pdoRequest->execute();
        $questions = $pdoRequest->fetchAll();
        var_dump($questions);
        return $questions;
    }

    public function delete($id) {
        $pdoRequest = $this->pdo->prepare("DELETE FROM question WHERE id = $id");
        $pdoRequest->execute();
        echo "La question à bien été supprimé";
    }


}


?>