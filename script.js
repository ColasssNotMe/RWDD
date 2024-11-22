//TODO: update dark mode reference

const darkButton = document.getElementById("dark-mode-button");
const themeIcon = document.getElementById("themeIcon");
const html = document.documentElement;
const body = document.body;
const logoWithName = document.getElementById("logo-with-name");
const middleLogo = document.getElementById("logo-middle-sm");
const profileIcon = document.getElementById("profile-icon");
const selectedForm = document.getElementsByClassName("form-button");

var form = [];
var deviceTheme;
var theme;
var subjectSelected;
initTheme();

function initTheme() {
  const savedTheme = localStorage.getItem("theme");
  if (savedTheme === "dark") {
    body.classList.add("dark-mode");
  }
  if (savedTheme == "dark") {
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
  body.classList.toggle("dark-mode");
  const isDarkMode = body.classList.contains("dark-mode");
  theme = isDarkMode ? "dark" : "light";
  localStorage.setItem("theme", isDarkMode ? "dark" : "light");
  if (theme == "dark") {
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

  console.log("Theme switched to:", isDarkMode ? "dark" : "light");
}

function addForm(event, formSelected) {
  const button = event.target;
  index = form.indexOf(formSelected);
  if (index !== -1) {
    form.splice(index, 1);
  } else {
    form.push(formSelected);
  }
  console.log(form);
  button.classList.toggle("selected");
}
function setSubject(subject) {
  subjectSelected = subject;
}

// darkButton.addEventListener("click", switchTheme);
