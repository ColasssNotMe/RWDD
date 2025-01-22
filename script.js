const darkButton = document.getElementById("dark-mode-button");
const themeIcon = document.getElementById("themeIcon");
const html = document.documentElement;
const body = document.body;
const logoWithName = document.getElementById("logo-with-name");
const middleLogo = document.getElementById("logo-middle-sm");
const profileIcon = document.getElementById("profile-icon");
const selectedForm = document.getElementsByClassName("form-button");
const confirmSelectionButton = document.querySelector(".confirmation-button");
const menuDropdown = document.querySelector(".menu-dropdown");
const menu = document.querySelector(".menu");
const svgElement = document.querySelector(".menu-dropdown svg");

var formSelected;
var lastFormSelected;
var deviceTheme;
var theme;
var subjectSelected;
var lastSubjectSelected;
var numQuestion = 10;
updateIcons();

function updateIcons() {
  const isDarkMode = html.classList.contains("dark-mode");
  if (isDarkMode) {
    themeIcon.src = "./res/img/sun.png";
    logoWithName.src = "./res/img/Quizzation-white.png";
    profileIcon.src = "./res/img/userlight.png";
    middleLogo.src = "./res/img/Quizzation-white.png";
    themeIcon.src = "./res/img/sun.png";
    logoWithName.src = "./res/img/Quizzation-white.png";
    profileIcon.src = "./res/img/userlight.png";
    middleLogo.src = "./res/img/Quizzation-white.png";
    svgElement.setAttribute("fill", "#ffffff");
  } else {
    themeIcon.src = "./res/img/moon.png";
    logoWithName.src = "./res/img/Quizzation.png";
    profileIcon.src = "./res/img/user.png";
    middleLogo.src = "./res/img/Quizzation.png";
    themeIcon.src = "./res/img/moon.png";
    logoWithName.src = "./res/img/Quizzation.png";
    profileIcon.src = "./res/img/user.png";
    middleLogo.src = "./res/img/Quizzation.png";
    svgElement.setAttribute("fill", "#000000");
  }
}

function checkUserSelection() {
  if (formSelected == null) {
    confirmSelectionButton.href = "";
  } else {
    confirmSelectionButton.href = "./select-subject.php";
  }
}

function toggleMenu() {
  menu.classList.toggle("change");
  menuDropdown.classList.toggle("change");
}

function switchTheme() {
  html.classList.toggle("dark-mode");
  const isDarkMode = html.classList.contains("dark-mode");
  theme = isDarkMode ? "dark" : "light";
  localStorage.setItem("theme", isDarkMode ? "dark" : "light");
  if (theme == "dark") {
    themeIcon.src = "./res/img/sun.png";
    logoWithName.src = "./res/img/Quizzation-white.png";
    profileIcon.src = "./res/img/userlight.png";
    middleLogo.src = "./res/img/Quizzation-white.png";
    themeIcon.src = "./res/img/sun.png";
    logoWithName.src = "./res/img/Quizzation-white.png";
    profileIcon.src = "./res/img/userlight.png";
    middleLogo.src = "./res/img/Quizzation-white.png";
    svgElement.setAttribute("fill", "#ffffff");
  } else {
    themeIcon.src = "./res/img/moon.png";
    logoWithName.src = "./res/img/Quizzation.png";
    profileIcon.src = "./res/img/user.png";
    middleLogo.src = "./res/img/Quizzation.png";
    themeIcon.src = "./res/img/moon.png";
    logoWithName.src = "./res/img/Quizzation.png";
    profileIcon.src = "./res/img/user.png";
    middleLogo.src = "./res/img/Quizzation.png";
    svgElement.setAttribute("fill", "#000000");
  }
}

function addForm(event, form) {
  const button = event.target;
  if (formSelected == null) {
    formSelected = form;
    lastFormSelected = button;
    button.classList.toggle("selected");
  } else {
    formSelected = form;
    lastFormSelected.classList.toggle("selected");
    lastFormSelected = button;
    button.classList.toggle("selected");
  }
  checkUserSelection();
  console.log(formSelected);
}

function setSubject(event, subject) {
  const target = event.target;
  if (subjectSelected == null) {
    subjectSelected = subject;
    target.classList.toggle("selected");
    lastSubjectSelected = target;
  } else {
    subjectSelected = subject;
    // toggle off the last subject selected
    lastSubjectSelected.classList.toggle("selected");
    //toggle on current selected subject
    target.classList.toggle("selected");
    lastSubjectSelected = target;
  }
}

// TODO: redirect user to the quiz preparation page
function getAllQuestion(subjectID, form, numQuestion) {
  try {
    const url = `connection.php?subject=${subjectID}&form=${form}&numQuestion=${numQuestion}`;
    fetch(url)
      .then((response) => {
        if (response.ok) {
          window.location.href = "start-quiz.php";
        } else {
          throw new Error("Error: fetch request not successful.");
        }
      })
      .catch((error) => {
        console.error("Error when fetching:", error);
      });
  } catch (error) {
    "Error: ", error;
  }
}

// TODO: find a way to ask user about how many question they want to answer
function startQuiz() {
  getAllQuestion(subjectSelected, formSelected, numQuestion);
}

// just for storing value of form in connection.php
function sendFormGetReq() {
  if (formSelected != null) {
    try {
      const url = `connection.php?form=${formSelected}`;
      fetch(url)
        .then((response) => {
          if (response.ok) {
            window.location.href = "select-subject.php";
          } else {
            throw new Error("Error sending form");
          }
        })
        .catch((error) => {
          "Error when fetching:", error;
        });
    } catch (error) {
      alert("catch statement:", error);
    }
  } else {
    alert("Please choose one of the selection.");
  }
}
