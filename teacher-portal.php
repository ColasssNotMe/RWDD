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
    <form action="" method="POST">
      <div class="title">
        <h1>Teacher's Portal</h1>
        <h3>Login as Teacher</h3>
        <h4>
            Don't have an account?
            <i><u><a href="./teacher-register.php">Register Now</a></u></i>
        </h4>
      </div>

      <div class="forms-item">
        <label for="username">Username</label>
        <br />
        <input type="text" name="username" id="username" />
        <br />
        <label for="password">Password</label>
        <br />
        <input type="password" name="password" id="password" />
      </div>
      <button class="primary-button" type="submit" name="login">Login</button>
    </form>
  </div>
  <?php require_once 'components/footer.php' ?>
  <script src="/script.js"></script>
</body>

</html>