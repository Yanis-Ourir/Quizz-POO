<?php

class UserManager {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function create(User $user) {
        $pdoRequest = $this->pdo->prepare("INSERT INTO user (pseudo, email, password, createdAt) VALUES (:pseudo, :email, :password, :createdAt)");

        $pdoRequest->bindValue(':pseudo', $user->getPseudo());
        $pdoRequest->bindValue(':email', $user->getEmail());
        $pdoRequest->bindValue(':password', $user->getPassword());
        $pdoRequest->bindValue(':createdAt', $user->getCreatedAt());
        $pdoRequest->execute();
    }

    public function findOneById(int $id) {
        $findUser = $this->pdo->prepare("SELECT * FROM user WHERE id = $id");
        var_dump($findUser->execute());
    }

    public function findAll() {
        $pdoRequest = $this->pdo->prepare("SELECT * FROM user");
        $pdoRequest->execute();
        $users = $pdoRequest->fetchAll();

        foreach ($users as $user) {
            echo "<p>" . $user['pseudo'] . "</p>";
        }
    }
}

?>