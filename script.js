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
    } else {
      deviceTheme = "light";
      html.setAttribute("data-theme", "light");
    }
  }
}

function toggleMenu(x) {
  x.classList.toggle("change");
}

function switchTheme() {
  html.getAttribute("data-theme") == "light"
    ? (html.setAttribute("data-theme", "dark"),
      (themeIcon.src = "res/img/sun.png"),
      console.log(html.getAttribute("data-themes")))
    : (html.setAttribute("data-theme", "light"),
      (themeIcon.src = "res/img/moon.png"),
      console.log(html.getAttribute("data-themes")));
}
