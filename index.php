<?php
include 'session.php';
?>


<!DOCTYPE html>
<html lang="en">


<head>
  <?php include_once 'extrahead.php' ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Quizzation</title>
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/index.css" />
  <script src="theme.js"></script>
</head>

<body>
  <?php include_once "components/header.php"; ?>
  <div class="container">
    <div class="content">
      <div id="small-container">
        <div id="website-name">
          <h1><b>Welcome to
              <br>
              <span class="super-large-title" style=" color: #e99f4c;">
                Quizzation
              </span></b></h1>
          <div class="description" id="index_paragraph">
            <p>Test your knowledge with our engaging and interactive quizzes.</p>
            <br />
            <b id="start-learning-today" style="font-size:2rem; color:#ee9185;">Start learning today!</b>
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
    <section>
      <h1>What We Offer</h1>

      <div class="all-cards">
        <div class="card">
          <h2><b>Comprehensive SPM Quizzes</b></h2>
          <p>Covering all major subjects like Mathematics, Science, English, History, and more.</p>
        </div>
        <div class="card">
          <h2><b>Interactive Learning</b></h2>
          <p>Engaging quizzes, practice questions, and mock exams designed to test your knowledge and identify areas for improvement.</p>
        </div>
        <div class="card">
          <h2><b>24/7 Access</b></h2>
          <p>Learn at your own pace, anytime, anywhere, with access to our platform 24/7.</p>
        </div>
      </div>
    </section>

    <section>
      <div id="how-it-works" class="all-cards">
        <h1>How It Works?</h1>
        <div id="steps">
          <div class="detail-steps">
            <img src="res/img/usr2.png" alt="" srcset="">
            <h2><b>Step 1: Login / Register</b></h2>
            <p>Login or Register an account to keep track of your report</p>
          </div>
          <div class="detail-steps">
            <img src="res/img/check.png" alt="" srcset="">
            <h2><b>Step 2: Pick</b></h2>
            <p>Pick the form and subject you want to focus on such as Mathematics, Science, English, or History. This will determine the type of questions you'll encounter in the quiz.</p>
          </div>
          <div class="detail-steps">
            <img src="res/img/play-button.png" alt="" srcset="">
            <h2><b>Step 3: Start the Quiz!</b></h2>
            <p>Click the "Start Now" button to begin your quiz. Answer the questions carefully and track your progress. Good luck!</p>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php require_once 'components/footer.php' ?>
  <script src="script.js"></script>
</body>

</html>