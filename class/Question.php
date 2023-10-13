<?php
class Question {
    private $title;
    private $image;
    private $answer;
    private $scoreGranted;
    private $timer;
    private $idQuizz;
    
    public function __construct(array $data) {
        $this->setTitle($data['title']);
        $this->setImage($data['image']);
        $this->setAnswer($data['answer']);
        $this->setScoreGranted($data['scoreGranted']);
        $this->setTimer($data['timer']);
        $this->setIdQuizz($data['idQuizz']);
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getImage() {
        return $this->image;
    }

    public function setImage($image) {
        $this->image = $image;
    }

    public function getAnswer() {
        return $this->answer;
    }

    public function setAnswer($answer) {
        $this->answer = $answer;
    }

    public function getScoreGranted() {
        return $this->scoreGranted;
    }

    public function setScoreGranted($scoreGranted) {
        $this->scoreGranted = $scoreGranted;
    }

    public function getTimer() {
        return $this->timer;
    }

    public function setTimer($timer) {
        $this->timer = $timer;
    }

    public function getIdQuizz() {
        return $this->idQuizz;
    }

    public function setIdQuizz($idQuizz) {
        $this->idQuizz = $idQuizz;
    }
}




?>