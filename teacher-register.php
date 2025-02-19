<?php
include 'session.php';
include 'connection.php';

if (isset($_POST['submit'])) {
    $registrationMessage = addUser($connection, $_POST['name'], $_POST['password'], $_POST['rePassword'], $_POST['email'], "student");
}
if (!empty($registrationMessage)) {
    echo "<script>alert('$registrationMessage');</script>";
    if ($registrationMessage == "Account registered successful. Login now to get full access of website.") {
        echo "<script>window.location.href = 'login.php';</script>";
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
          <input placeholder="Enter your full name" name="name" class="form_style" type="text" required>
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="email">Email</label>
          <input placeholder="Enter your email" id="email" name="email" class="form_style" type="email" required>
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="password">Password</label>
          <input placeholder="Enter your password" id="password" name="password" class="form_style" type="password" required>
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="password">Re-enter Password</label>
          <input placeholder="Re-Enter your password" name="rePassword" class="form_style" type="password" required>
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