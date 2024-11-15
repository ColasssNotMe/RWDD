//TODO: update dark mode reference

const darkButton = document.getElementById("dark-mode-button");
const themeIcon = document.getElementById("themeIcon");
const html = document.documentElement;
const body = document.body;

var deviceTheme;
var theme;
initTheme();

function initTheme() {
  const savedTheme = localStorage.getItem("theme");
  themeIcon.src =
    savedTheme == "dark" ? "/res/img/sun.png" : "/res/img/moon.png";
  if (savedTheme === "dark") {
    body.classList.add("dark-mode");
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
  themeIcon.src = theme == "dark" ? "/res/img/sun.png" : "/res/img/moon.png";

  console.log("Theme switched to:", isDarkMode ? "dark" : "light");
}

// darkButton.addEventListener("click", switchTheme);
