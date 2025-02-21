// const darkButton = document.getElementById("dark-mode-button");
// const themeIcon = document.getElementById("themeIcon");
const html = document.documentElement;
const body = document.body;
const profileIcon = document.getElementById("profile-icon");
const selectedForm = document.getElementsByClassName("form-button");
const confirmSelectionButton = document.querySelector(".confirmation-button");
const menuDropdown = document.querySelector(".menu-dropdown");
const menu = document.querySelector(".menu");
const svgElement = document.querySelector(".menu-dropdown svg");

const returnButton = document.getElementById("#return");

var formSelected;
var lastFormSelected;
// var deviceTheme;
// var theme;
var subjectSelected;
var lastSubjectSelected;
var numQuestion = 10;
// updateIcons();

function previewImage(event) {
    const image = document.getElementById('questionImage');
    const file = event.target.files[0];
    
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            image.src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
}

// function updateIcons() {
//   const isDarkMode = html.classList.contains("dark-mode");
//   if (isDarkMode) {
//     themeIcon.src = "./res/img/sun.png";
//     logoWithName.src = "./res/img/Quizzation-white.png";
//     profileIcon.src = "./res/img/userlight.png";
//     middleLogo.src = "./res/img/Quizzation-white.png";
//     themeIcon.src = "./res/img/sun.png";
//     logoWithName.src = "./res/img/Quizzation-white.png";
//     profileIcon.src = "./res/img/userlight.png";
//     middleLogo.src = "./res/img/Quizzation-white.png";
//     svgElement.setAttribute("fill", "#ffffff");
//   } else {
//     themeIcon.src = "./res/img/moon.png";
//     logoWithName.src = "./res/img/Quizzation.png";
//     profileIcon.src = "./res/img/user.png";
//     middleLogo.src = "./res/img/Quizzation.png";
//     themeIcon.src = "./res/img/moon.png";
//     logoWithName.src = "./res/img/Quizzation.png";
//     profileIcon.src = "./res/img/user.png";
//     middleLogo.src = "./res/img/Quizzation.png";
//     svgElement.setAttribute("fill", "#000000");
//   }
// }

function toggleMenu() {
  menu.classList.toggle("change");
  menuDropdown.classList.toggle("change");
}

/* function switchTheme() {
//   html.classList.toggle("dark-mode");
//   const isDarkMode = html.classList.contains("dark-mode");
//   theme = isDarkMode ? "dark" : "light";
//   localStorage.setItem("theme", isDarkMode ? "dark" : "light");
//   if (theme == "dark") {
//     themeIcon.src = "./res/img/sun.png";
//     logoWithName.src = "./res/img/Quizzation-white.png";
//     profileIcon.src = "./res/img/userlight.png";
//     middleLogo.src = "./res/img/Quizzation-white.png";
//     themeIcon.src = "./res/img/sun.png";
//     logoWithName.src = "./res/img/Quizzation-white.png";
//     profileIcon.src = "./res/img/userlight.png";
//     middleLogo.src = "./res/img/Quizzation-white.png";
//     svgElement.setAttribute("fill", "#ffffff");
//   } else {
//     themeIcon.src = "./res/img/moon.png";
//     logoWithName.src = "./res/img/Quizzation.png";
//     profileIcon.src = "./res/img/user.png";
//     middleLogo.src = "./res/img/Quizzation.png";
//     themeIcon.src = "./res/img/moon.png";
//     logoWithName.src = "./res/img/Quizzation.png";
//     profileIcon.src = "./res/img/user.png";
//     middleLogo.src = "./res/img/Quizzation.png";
//     svgElement.setAttribute("fill", "#000000");
//   }
// }
*/

// function startQuiz() {
//   window.location.href = "question-page.php";
// }
