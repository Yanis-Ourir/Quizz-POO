<?php

class User {
    private ?int $id;
    private ?string $pseudo;
    private ?string $email;
    private ?string $password;
    private ?string $createdAt;

    public function __construct(array $data) {
        $this->setPseudo($data['pseudo']);
        $this->setEmail($data['email']);
        $this->setPassword($data['password']);
        $this->setCreatedAt();
    }

    public function getId() {
        return $this->id;
    }

    public function getPseudo() {
        return $this->pseudo;
    }

    public function setPseudo($pseudo) {
        $this->pseudo = $pseudo;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    // A RETIRER PAR LA SUITE
    public function getPassword() {
        return $this->password;
    }

    public function setPassword($password) {
        $this->password = $password;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt() {
        $this->createdAt = date('Y-m-d H:i:s', time());
    }
}



?>