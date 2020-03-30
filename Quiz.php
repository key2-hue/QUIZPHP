<?php

namespace MyApp;

class Quiz {
  private $_quizSet = [];

  public function __construct() {
    $this->_setup();
    if(!isset($_SESSION['current_num'])) {
      $_SESSION['current_num'] = 0;
    }
  }


  private function _setup() {
    $this->_quizSet[] = [
      'q' => 'Aの答えは?',
      'a' => ['A0', 'A1', 'A2', 'A3']
    ];
    $this->_quizSet[] = [
      'q' => 'Bの答えは?',
      'a' => ['B0', 'B1', 'B2', 'B3']
    ];
    $this->_quizSet[] = [
      'q' => 'Cの答えは?',
      'a' => ['C0', 'C1', 'C2', 'C3']
    ];
  }

  public function getCurrentQuiz() {
    return $this->_quizSet[$_SESSION['current_num']];
  }

  public function checkAnswer() {
    $correctAnswer = $this->_quizSet[$_SESSION['current_num']]['a'][0];
    $_SESSION['current_num']++;
    return $correctAnswer;
  }

  public function isFinished() {
    return count($this->_quizSet) === $_SESSION['current_num'];
  }

  public function reset() {
    $_SESSION['current_num'] = 0;
  }

}

?>