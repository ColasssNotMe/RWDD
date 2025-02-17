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
    <h1 class="title">
      <span id="important-text">Choose a subject</span>
    </h1>
    <form action="question.php" method="get">
      <div id="button-div">
        <button
          class="secondary-button"
          id="return">
          <a href="select-form.php">
            <i class="zmdi zmdi-long-arrow-return"></i>
          </a>
        </button>
        <button
          type="submit"
          class="confirmation-button"
          id="start-now">
          <i class="zmdi zmdi-play"></i>
        </button>
      </div>


      <div class="selection">
        <label for="english" class="secondary-button form-button">
          <input type="radio" name="english" value="English">
          English
          </input>
        </label>
      </div>


    </form>
  </div>
  <script src="script.js"></script>
</body>

</html>