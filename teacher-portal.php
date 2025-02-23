<?php
session_start();
include 'connection.php';

if (isset($_SESSION['currentLoginUser'])) {
  echo "<script>alert('You are already logged in. Please log out before signing in again.');</script>";
  echo "<script>window.location.href = 'index.php';</script>"; // Redirect to homepage or dashboard
  exit();
}

if (isset($_POST['signinBtn'])) {
  $loginMessage = validateTeacherCredential($connection, $_POST['email'], $_POST['password']);
}

if (!empty($loginMessage)) {
  // echo $loginMessage;
  if ($loginMessage == "Login successful") {
    // echo $_SESSION['currentLoginUser'];
    echo "<script>alert('$loginMessage');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once 'extrahead.php' ?>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teacher's Portal</title>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/login-register.css " />
  <script src="theme.js"></script>
</head>

<body>
  <?php require_once "components/header.php" ?>
  <!-- From Uiverse.io by mi-series -->
  <div class="form-container">
    <div class="form_area">
      <h3 class="form_title">
        <span style="font-size: 2rem;">Teacher's Portal</span>
        <br>
        <p>Login as a Teacher</p>
      </h3>
      <form method="post">
        <div class="form_group">
          <label class="form_sub_title" for="username">Email</label>
          <input placeholder="Enter your username" name="email" class="form_style" type="text" required>
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="password">Password</label>
          <input placeholder="Enter your password" name="password" id="password" class="form_style" type="password" required>
        </div>
        <div>
          <button class="form_btn" name="signinBtn" type="submit">LOG IN</button>
          <p>Don't have an account?
            <a class="form_link" href="teacher-register.php">Register Here!</a>
          </p>
          <br>
        </div>
      </form>
    </div>
  </div>
  <script src="script.js"></script>
  <?php require_once "components/footer.php" ?>
</body>

</html>