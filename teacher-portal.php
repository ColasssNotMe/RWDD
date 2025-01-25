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
  <header>
    <div class="left-side">
      <div id="align-left-sm">
        <div>
          <a href="/index.php">
            <!-- add the logo img with name -->
            <img
              id="logo-with-name"
              src="/res/img/Quizzation.png"
              alt="logo-with-name" />
          </a>
        </div>
        <div id="toggleDarkMode">
          <button
            type="button"
            class="no-style-button header-button"
            id="dark-mode-button"
            onclick="switchTheme()">
            <img
              src="/res/img/moon.png"
              alt="toggle dark mode"
              class="icon"
              id="themeIcon" />
          </button>
        </div>
      </div>
      <div id="temp-middle-logo">
        <a href="/index.php">
          <img
            id="logo-middle-sm"
            src="/res/img/Quizzation.png"
            alt="logo-with-name" />
        </a>
      </div>
      <div class="menu" onclick="toggleMenu(this)">
        <div class="bar1"></div>
        <div class="bar2"></div>
        <div class="bar3"></div>
      </div>
    </div>
    <div id="nav-button">
      <ul>
        <li>
          <a href="/" class="header-button">Home</a>
        </li>
        <li>
          <a href="" <?php $about ?>"" class="header-button">About Us</a>
        </li>
        <li>
          <a href="/select-form.php" class="header-button">Get Started</a>
        </li>
        <li>
          <a href="account.php" class="header-button" id="profile-a">
            <img
              src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png"
              alt="profile"
              class="icon"
              id="profile-icon" />
          </a>
        </li>
      </ul>
    </div>
  </header>

  <div class="form-container">
    <form action="" method="POST">
      <div class="title">
        <h1>Teacher's Portal</h1>
        <h3>Login as Teacher</h3>
      </div>

      <div class="forms-item">
        <label for="username">Username</label>
        <br />
        <input type="text" name="username" id="username" />
        <br />
        <label for="">Password</label>
        <br />
        <input type="password" name="password" id="password" />
      </div>
    </form>
  </div>
  <script src="/script.js"></script>
</body>

</html>