<?php

class Quizz {
    private ?string $name;
    private ?string $theme;
    private ?string $image;
    private ?int $userScore;
    private ?string $createdAt;
    private ?string $updatedAt;
    private ?int $idUser;

    public function __construct(array $data) {
        $this->setName($data['name']);
        $this->setTheme($data['theme']);
        $this->setImage($data['image']);
        $this->setIdUser($_SESSION['id']);
        $this->setCreatedAt();
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getTheme() {
        return $this->theme;
    }

    public function setTheme($theme) {
        $this->theme = $theme;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getUserScore() {
        return $this->userScore;
    }

    public function setUserScore($userScore) {
        $this->userScore = $userScore;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt() {
        $this->createdAt = date('Y-m-d H:i:s', time());
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setUpdatedAt() {
      $this->updatedAt = date('Y-m-d H:i:s', time());
    }

    public function getIdUser() {
        return $this->idUser;
    }

    public function setIdUser($idUser) {
        $this->idUser = $idUser;
    }
}





?>