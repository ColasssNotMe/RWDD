<?php
session_start();
$server   = 'localhost';
$user     = 'root';
$password = '';
$database = 'quizzation'; // insert database name
$listOfQuestion;

// TODO: change "table" in the query to db table name
//use a _GET to know when the button is pressed and then generate things -> replace the $var and then it should update on the question-page?

// create session

// create connection
$connection = mysqli_connect($server, $user, $password, $database);
switch ($connection) {
    case false:
        break;
}



// Getting and storing form in the session
if (isset($_GET['form'])) {
    $_SESSION['form'] = $_GET['form'];
}

// getting the url param from script.js
if (isset($_GET['login'])) {
    echo 'isset running';
    $subject = $_GET['subject'];
    $form = $_GET['form'];
    $numQuestion = $_GET['numQuestion'];
    getQuestion($connection, $form, $subject, $numQuestion);
    header("Location: question.php");
}

// search for login user
if (isset($_GET['login'])) {
    echo "login";
}


// get random request question
function getQuestion($connection, $form, $subject, $numQuestion)
{
    $query  = "SELECT * from question where form =$_GET[$form] AND subject =$_GET[$subject] ORDER BY RAND() LIMIT $_GET[$numQuestion]";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        echo  'num of row >0';
    } else {
        echo 'Error occured at getting question';
    }
}

/* if (isset($_GET['subject'])) {
    $query = "SELECT * from table where form =$_GET[$form] AND subject =$_GET[$subject] ORDER BY RAND() LIMIT $_GET[$numQuestion]";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
    } else {
        echo 'Error occured at getting question';
    }
} */

// used for validate the login user + return the logged in user credential
function validateUserCredential($connection, $username, $password)
{
    $query  = "SELECT * FROM user where user_name=$username AND password=$password";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        echo 'User found';
        $currentLoginUser = mysqli_num_rows($result);
        return $currentLoginUser;
    } else {
        echo "<script>alert('User not found')</script>";
    }
}

function addRecord($connection, $score, $timeTaken, $userID, $quizID)
{
    $query = "INSERT INTO record (score,time_taken,user_id,quiz_id) VALUES ($score,$timeTaken,$userID,$quizID)";
    if (!mysqli_query($connection, $query)) {
        echo "Error inserting data";
    } else {
        header("Location: result.php");
    }
}

function deleteRecord($connection, $recordID)
{
    $query = "DELETE FROM record WHERE record_id = $recordID";
    if (!mysqli_query($connection, $query)) {
        echo "Error deleting data";
    } else {
        header("Location: result.php");
    }
}

function addUser($connection, $username, $password, $role)
{
    $query = "INSERT INTO user (user_name,password,role) VALUES ($username,$password,$role)";
    if (!mysqli_query($connection, $query)) {
        echo "Error adding user";
    } else {
        header("Location: index.php");
    }
}

function deleteUser($connection, $userID)
{
    $query = "DELETE FROM user WHERE user_id = $userID";
    if (!mysqli_query($connection, $query)) {
        echo "Error adding user";
    } else {
        header("Location: index.php");
    }
}


function addQuestion($connection, $form, $subject, $picture, $question, $choice, $answer)
{
    $query = "INSERT INTO question 
    (question_form,question_subject,question_picture,question,question_choice,question_answer) 
    VALUES 
   ($form, $subject, $picture,$question,$choice,$answer)";
    if (!mysqli_query($connection, $query)) {
        echo "Error adding user";
    } else {
        header("Location:index.php");
    }
}

function deleteQuestion($connection, $questionID)
{
    $query = "DELETE FROM question where question_id =$questionID";
    if (!mysqli_query($connection, $query)) {
        echo "Error adding user";
    } else {
        header("Location:index.php");
    }
}
