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
  if (form.length == null) {
    confirmSelectionButton.href = "";
  } else {
    confirmSelectionButton.href = "./select-subject.php";
  }
  console.log(form.length);
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
    lastFormSelected.classList.toggle("selected");
    button.classList.toggle("selected");
    lastFormSelected = button;
  }
  checkUserSelection();
  console.log(form);
}

function setSubject(event, subject) {
  const target = event.target;
  if (subjectSelected == null) {
    subjectSelected = subject;
    target.classList.toggle("selected");
    lastSubjectSelected = target;
  } else {
    // toggle off the last subject selected
    lastSubjectSelected.classList.toggle("selected");
    //toggle on current selected subject
    target.classList.toggle("selected");
    lastSubjectSelected = target;
  }
}

// function getReq() {
//   $.ajax({
//     type: "GET",
//     data: { form: selectedForm, subject: subjectSelected },
//   });
// }

// TODO: test this function
function getAllQuestion(subjectID, form, numQuestion) {
  try {
    const url = `connection.php?subject=${subjectID}&form=${form}&numQuestion=${numQuestion}`;
    fetch(url)
      .then((response) => {
        if (response.ok) {
          alert("Fetched");
        } else {
          throw new Error("Network response was not ok.");
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
  getAllQuestion(subjectSelected, form, numQuestion);
}
