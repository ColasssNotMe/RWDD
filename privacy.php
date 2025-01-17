<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Privacy Policy</title>
  <link rel="stylesheet" href="./style/style.css" />
  <link rel="stylesheet" href="./style/footer-item.css" />
  <script src="theme.js"></script>
</head>

<body>
  <header>
    <div class="left-side">
      <div id="align-left-sm">
        <div>
          <a href="<?php $root ?>">
            <!-- add the logo img with name -->
            <img
              id="logo-with-name"
              src="./res/img/Quizzation.png"
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
              src="./res/img/moon.png"
              alt="toggle dark mode"
              class="icon"
              id="themeIcon" />
          </button>
        </div>
      </div>
      <div id="temp-middle-logo">
        <a href=<?php $root ?>>
          <img
            id="logo-middle-sm"
            src="./res/img/Quizzation.png"
            alt="logo-with-name" />
        </a>
      </div>
      <div class="menu">
        <button onclick="toggleMenu()">
          <div class="bar1"></div>
          <div class="bar2"></div>
          <div class="bar3"></div>
        </button>
        <div class="menu-dropdown">
          <div class="svg" onclick="toggleMenu()">
            <svg
              fill="#ffffff"
              height="30px"
              width="30px"
              version="1.1"
              id="Capa_1"
              xmlns="http://www.w3.org/2000/svg"
              xmlns:xlink="http://www.w3.org/1999/xlink"
              viewBox="0 0 460.775 460.775"
              xml:space="preserve">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g
                id="SVGRepo_tracerCarrier"
                stroke-linecap="round"
                stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <path
                  d="M285.08,230.397L456.218,59.27c6.076-6.077,6.076-15.911,0-21.986L423.511,4.565c-2.913-2.911-6.866-4.55-10.992-4.55 c-4.127,0-8.08,1.639-10.993,4.55l-171.138,171.14L59.25,4.565c-2.913-2.911-6.866-4.55-10.993-4.55 c-4.126,0-8.08,1.639-10.992,4.55L4.558,37.284c-6.077,6.075-6.077,15.909,0,21.986l171.138,171.128L4.575,401.505 c-6.074,6.077-6.074,15.911,0,21.986l32.709,32.719c2.911,2.911,6.865,4.55,10.992,4.55c4.127,0,8.08-1.639,10.994-4.55 l171.117-171.12l171.118,171.12c2.913,2.911,6.866,4.55,10.993,4.55c4.128,0,8.081-1.639,10.992-4.55l32.709-32.719 c6.074-6.075,6.074-15.909,0-21.986L285.08,230.397z"></path>
              </g>
            </svg>
          </div>
          <a href="<?php echo $about ?>">About</a>
          <a href="<?php echo $privacy ?>">Privacy Policy</a>
          <a href="<?php echo $tns ?>">Terms and Services</a>
          <!-- TODO:DELETE if user is logged in  -->
          <a href="<?php echo $login ?>">Login</a>
        </div>
      </div>
    </div>
    <div id="nav-button">
      <ul>
        <li>
          <a href="./" class="header-button">Home</a>
        </li>
        <li>
          <a href="<?php echo $about ?>" class="header-button">About Us</a>
        </li>
        <li>
          <a href="<?php echo $select_form ?>" class="header-button">Get Started</a>
        </li>
        <li>
          <a href="<?php echo $account ?>" class="header-button" id="profile-a">
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
  <div class="content">
    <div class="center-container">
      <h1 class="title">Privacy Policy</h1>
      <div class="description">
        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Sit quis
        nemo laboriosam fuga aliquid velit deserunt fugit, corporis libero
        placeat voluptates exercitationem officia quibusdam asperiores minus
        vel. Amet, suscipit impedit!
      </div>
    </div>
    <script src="/script.js"></script>
    <footer>
      <img
        src="/res/img/generate_a_logo_that_are_related_to_quiz_webapp_-removebg.png"
        alt="logo"
        id="logo" />
      <ul id="footer-list">
        <li><a href="/teacher-portal.php">Teacher's Portal</a></li>
        <li><a href="" <?php $about ?>"">About Us</a></li>
        <li><a href="/tns.php">Terms and Services</a></li>
        <li><a href="/privacy.php">Privacy Policy</a></li>
      </ul>
    </footer>
  </div>
</body>

</html>