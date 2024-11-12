const darkButton = document.getElementById("dark-mode-button");
const themeIcon = document.getElementById("themeIcon");
const html = document.documentElement;

var deviceTheme;
var theme;
initTheme();
console.log(deviceTheme);

function initTheme() {
  if (!localStorage.getItem(theme)) {
    if (window.matchMedia("(prefers-color-scheme: dark)").matches) {
      deviceTheme = "dark";
      html.setAttribute("data-theme", "dark");
      themeIcon.src = "res/img/sun.png";
    } else {
      deviceTheme = "light";
      html.setAttribute("data-theme", "light");
      themeIcon.src = "res/img/moon.png";
    }
  }
}

function toggleMenu(x) {
  x.classList.toggle("change");
}

function switchTheme() {
  let currentTheme = html.getAttribute("data-theme");
  let newTheme = currentTheme === "light" ? "dark" : "light";
  html.setAttribute("data-theme", newTheme);
  themeIcon.src = newTheme === "dark" ? "res/img/sun.png" : "res/img/moon.png";
  localStorage.setItem("theme", newTheme);
}
