//TODO: update dark mode reference

const darkButton = document.getElementById("dark-mode-button");
const themeIcon = document.getElementById("themeIcon");
const html = document.documentElement;
const body = document.body;
const logoWithName = document.getElementById("logo-with-name");
const middleLogo = document.getElementById("logo-middle-sm");
const profileIcon = document.getElementById("profile-icon");

var currentTheme;
var deviceTheme;
var form;
initTheme();

function initTheme() {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme == "dark") {
    currentTheme = "dark";
    // body.classList.add("dark-mode");
  } else {
    currentTheme = "light";
  }
  if (currentTheme == "dark") {
    themeIcon.src = "/res/img/sun.png";
    logoWithName.src = "/res/img/Quizzation-white.png";
    profileIcon.src = "/res/img/userlight.png";
    middleLogo.src = "/res/img/Quizzation-white.png";
  } else {
    themeIcon.src = "/res/img/moon.png";
    logoWithName.src = "/res/img/Quizzation.png";
    profileIcon.src = "/res/img/user.png";
    middleLogo.src = "/res/img/Quizzation.png";
  }
}

function toggleMenu(x) {
  x.classList.toggle("change");
}

function switchTheme() {
  if (root.classList.contains("light")) {
    currentTheme = "dark";
    console.log("switched to dark");
  } else {
    currentTheme = "light";
    console.log("switched to light");
  }

  // const isDarkMode = body.classList.contains("dark-mode");
  localStorage.setItem("theme", currentTheme);
  if (currentTheme == "dark") {
    themeIcon.src = "/res/img/sun.png";
    logoWithName.src = "/res/img/Quizzation-white.png";
    profileIcon.src = "/res/img/userlight.png";
    middleLogo.src = "/res/img/Quizzation-white.png";
  } else {
    themeIcon.src = "/res/img/moon.png";
    logoWithName.src = "/res/img/Quizzation.png";
    profileIcon.src = "/res/img/user.png";
    middleLogo.src = "/res/img/Quizzation.png";
  }

  console.log("Theme switched to:", currentTheme);
  console.log(localStorage.getItem("theme"));
}

function setForm(int) {
  form = int;
}

// darkButton.addEventListener("click", switchTheme);
