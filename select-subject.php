<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/style/style.css" />
    <link rel="stylesheet" href="/style/selection.css" />
    <title>Select Subject</title>
    <script src="theme.js"></script>
  </head>
  <body>
    <header>
      <div class="left-side">
        <div id="align-left-sm">
          <div>
            <a href="/index.html">
              <!-- add the logo img with name -->
              <img
                id="logo-with-name"
                src="/res/img/Quizzation.png"
                alt="logo-with-name"
              />
            </a>
          </div>
          <div id="toggleDarkMode">
            <button
              type="button"
              class="no-style-button header-button"
              id="dark-mode-button"
              onclick="switchTheme()"
            >
              <img
                src="/res/img/moon.png"
                alt="toggle dark mode"
                class="icon"
                id="themeIcon"
              />
            </button>
          </div>
        </div>
        <div id="temp-middle-logo">
          <a href="/index.html">
            <img
              id="logo-middle-sm"
              src="/res/img/Quizzation.png"
              alt="logo-with-name"
            />
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
            <a href="/about.html" class="header-button">About Us</a>
          </li>
          <li>
            <a href="/register.html" class="header-button">Get Started</a>
          </li>
          <li>
            <a href="/account.html" class="header-button" id="profile-a">
              <img
                src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png"
                alt="profile"
                class="icon"
                id="profile-icon"
              />
            </a>
          </li>
        </ul>
      </div>
    </header>
    <div class="content">
      <div id="button-div">
        <a
          href="/select-subject.html"
          class="confirmation-button"
          id="start-now"
        >
          Start Now
        </a>
      </div>
      <div class="selection">
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(1)"
        >
          English
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(2)"
        >
          Chinese
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(3)"
        >
          Malay
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(4)"
        >
          Science
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(5)"
        >
          Math
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          Add Math
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          Biology
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          History
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          Physic
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          Moral
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          Economy
        </button>
        <button
          href="/select-subject.html"
          class="subject-button"
          onclick="setSubject(0)"
        >
          Account
        </button>
      </div>
    </div>
    <script src="/script.js"></script>
  </body>
</html>
