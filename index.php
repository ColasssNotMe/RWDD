<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quizzation</title>
  <link rel="shortcut icon" href="./favicon/icon.ico" type="image/x-icon" />
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/index.css" />
  <script src="theme.js"></script>
</head>

<body>
  <div class="container">
    <?php require_once "components/header.php" ?>

    <div class="content">
      <div id="small-container">
        <div id="website-name">
          <h1>Welcome to Quizzation</h1>
          <div class="description" id="index_paragraph">
            <p>Test your knowledge with our engaging and interactive quizzes.</p>
            <br />
            <b id="start-learning-today">Start learning today!</b>
          </div>
        </div>
        <div id="box-center">
          <a href="<?php echo $select_form ?>" class="large-button primary-button">Get Started</a>
          <button
            onclick="document.getElementById('how-it-works').scrollIntoView()"
            class="large-button secondary-button">
            Learn More
          </button>
        </div>
      </div>
    </div>
  </div>
  <div class="fullSize">
    <div id="how-it-works">
      <div class="paragraph">
        <div id="how-it-works-title"><b>
            <h1>How It Works?</h1>
          </b></div>
        <div>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iure,
            totam enim facilis in perferendis deserunt, et quasi dolores animi
            consectetur possimus, maxime corporis. Ratione vel itaque numquam
            impedit ex dicta.
          </p>
        </div>
      </div>
    </div>
  </div>
  <?php require_once 'components/footer.php' ?>
  <script src="script.js"></script>
</body>

</html>