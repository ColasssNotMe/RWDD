<?php
include 'session.php';
include 'connection.php';

if (isset($_POST['submit'])) {
  $registrationMessage = addUser($connection, $_POST['name'], $_POST['password'], $_POST['email'], "teacher");
}
if (!empty($registrationMessage)) {
  echo "<script>alert('$registrationMessage');</script>";
  if ($registrationMessage == "Account registered successful") {
    echo "<script>window.location.href = 'index.php';</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Teacher's Portal</title>
  <link rel="stylesheet" href="style/style.css" />
  <link rel="stylesheet" href="style/login-register.css " />
  <script src="theme.js"></script>
</head>

<body>
  <?php require_once 'components/header.php' ?>
  <div class="form-container">
    <div class="form_area">
      <h3 class="form_title">
        <span style="font-size: 2rem;">Teacher's Portal</span>
        <br>
        <p>Register as a Teacher</p>
      </h3>
      <form action="" method="post">
        <div class="form_group">
          <label class="form_sub_title" for="name">Name</label>
          <input placeholder="Enter your full name" class="form_style" type="text">
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="email">Email</label>
          <input placeholder="Enter your email" id="email" class="form_style" type="email">
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="password">Password</label>
          <input placeholder="Enter your password" id="password" class="form_style" type="password">
        </div>
        <div>
          <button class="form_btn" name="submit" type="submit">SIGN UP</button>
          <p>Already have account?
            <a class="form_link" href="teacher-portal.php">Log in here!</a>
          </p>
          <br>
        </div>
      </form>
    </div>
  </div>
  <script src="./script.js"></script>
  <?php require_once 'components/footer.php' ?>
</body>

</html>