<?php
  require_once(__DIR__ . '/config.php');
  require_once(__DIR__ . '/Quiz.php');
  $quiz = new MyApp\Quiz();
  if(!$quiz->isFinished()) {
    $data = $quiz->getCurrentQuiz();
    shuffle($data['a']);
  }
  
  
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>クイズアプリ</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body>
  <?php if ($quiz->isFinished()): ?>
    <a href="">finished</a>
    <?php $quiz->reset(); ?>
  <?php else: ?>
  <div id="container">
    <h1>Q. <?= h($data['q']); ?></h1>
    <ul>
      <?php foreach($data['a'] as $a): ?>
      <li class="answer"><?= h($a); ?></li>
     <?php endforeach; ?>
    </ul>
    <div id="btn" class="disabled">次の質問へ</div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="quiz.js"></script>
  <?php endif; ?>
</body>
</html>