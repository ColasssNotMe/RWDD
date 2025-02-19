<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'extrahead.php' ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quiz</title>
  <script src="theme.js"></script>
  <link rel="stylesheet" href="./style/style.css" />
</head>

<body>
  <?php require_once 'components/header.php' ?>
  <script src="/script.js"></script>

  <div class="content">
    <h1 class="title">Title</h1>
    <h3>Description of Quiz</h3>
    <img src="" alt="quiz-image" id="quiz-image">
    <div class="description">
      Lorem ipsum dolor sit, amet consectetur adipisicing elit. Perferendis sed tempora deserunt non quae iusto ab ex explicabo ut exercitationem repudiandae dolores harum, quas voluptatem, incidunt enim ipsum obcaecati odit?
    </div>
  </div>

  <div class="button-div">
    <button onclick="startQuiz()" class="start-button">Start Quiz</button>
    <button onclick="window.location.href='select-subject.php'" class="back-button">
      << /button>
  </div>
  <script src="script.js"></script>
</body>

</html>