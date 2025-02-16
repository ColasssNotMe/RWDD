<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/selection.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <title>Select Subject</title>
  <script src="./theme.js"></script>
</head>

<body>
  <?php include_once './components/header.php' ?>
  <div class="content">
    <div id="button-div">
      <button
        class="confirmation-button"
        id="start-now">
        <a href="select-form.php">
          <i class="zmdi zmdi-long-arrow-return"></i>
        </a>
      </button>
      <button
        class="confirmation-button"
        id="start-now" onclick=startQuiz()>
        <i class="zmdi zmdi-play"></i>
      </button>
    </div>
    <div class="selection">
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,1)">
        English
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,2)">
        Chinese
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,3)">
        Malay
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,4)">
        Science
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,5)">
        Math
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,6)">
        Add Math
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,7)">
        Biology
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,8)">
        History
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,9)">
        Physic
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,10)">
        Moral
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,11)">
        Economy
      </button>
      <button
        href="/select-subject.php"
        class="secondary-button form-button"
        onclick="setSubject(event,12)">
        Account
      </button>
    </div>
  </div>
  <script src="script.js"></script>
</body>

</html>