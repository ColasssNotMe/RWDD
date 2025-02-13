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
  <?php require_once "components/header.php" ?>
  <!-- From Uiverse.io by mi-series -->
  <div class="form-container">
    <div class="form_area">
      <h3 class="form_title">
        <span style="font-size: 2rem;">Teacher's Portal</span>
        <br>
        Login as a Teacher
      </h3>
      <form action="" method="post">
        <div class="form_group">
          <label class="form_sub_title" for="username">Username</label>
          <input placeholder="Enter your username" class="form_style" type="text">
        </div>
        <div class="form_group">
          <label class="form_sub_title" for="password">Password</label>
          <input placeholder="Enter your password" id="password" class="form_style" type="password">
        </div>
        <div>
          <button class="form_btn" type="submit">LOG IN</button>
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