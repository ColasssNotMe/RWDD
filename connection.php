<?php
session_start(); // Single session start at the beginning
$server   = 'localhost';
$user     = 'root';
$password = '';
$database = 'quizzation';

// create connection
$connection = mysqli_connect($server, $user, $password, $database);
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Getting and storing form in the session
if (isset($_GET['form'])) {
    $_SESSION['form'] = $_GET['form'];
}

// getting the url param from script.js
if (isset($_GET['submit'])) {
    $subject = $_GET['subject'];
    $form = $_GET['form'];
    $numQuestion = $_GET['numQuestion'];
    getQuestion($connection, $form, $subject, $numQuestion);
    header("Location: question.php");
    exit();
}

// search for login user
if (isset($_GET['login'])) {
    validateUserCredential($connection, $_GET['username'], $_GET['password']);
}

// get random request question
function getQuestion($connection, $form, $subject, $numQuestion)
{
    $stmt = $connection->prepare("SELECT * FROM question WHERE form = ? AND subject = ? ORDER BY RAND() LIMIT ?");
    $stmt->bind_param("iii", $form, $subject, $numQuestion);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['questions'] = $result->fetch_all(MYSQLI_ASSOC);
    } else {
        $_SESSION['error'] = 'No questions found for the selected criteria';
    }
}

// used for validate the login user + store the logged in user credential
function validateUserCredential($connection, $username, $password)
{
    $stmt = $connection->prepare("SELECT * FROM user WHERE user_name = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $_SESSION['currentLoginUser'] = $result->fetch_assoc(); // Store user data as associative array
        header("Location: index.php");
        exit();
    } else {
        echo "<script>alert('Invalid username or password')</script>";
    }
}

function addRecord($connection, $score, $timeTaken, $userID, $quizID)
{
    $stmt = $connection->prepare("INSERT INTO record (score, time_taken, user_id, quiz_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiii", $score, $timeTaken, $userID, $quizID);
    
    if (!$stmt->execute()) {
        echo "Error inserting data";
    } else {
        header("Location: result.php");
        exit();
    }
}

function deleteRecord($connection, $recordID)
{
    $stmt = $connection->prepare("DELETE FROM record WHERE record_id = ?");
    $stmt->bind_param("i", $recordID);
    
    if (!$stmt->execute()) {
        echo "Error deleting data";
    } else {
        header("Location: result.php");
        exit();
    }
}

function addUser($connection, $username, $password, $role)
{
    $stmt = $connection->prepare("INSERT INTO user (user_name, password, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password, $role);
    
    if (!$stmt->execute()) {
        echo "Error adding user";
    } else {
        header("Location: index.php");
        exit();
    }
}

function deleteUser($connection, $userID)
{
    $stmt = $connection->prepare("DELETE FROM user WHERE user_id = ?");
    $stmt->bind_param("i", $userID);
    
    if (!$stmt->execute()) {
        echo "Error deleting user";
    } else {
        header("Location: index.php");
        exit();
    }
}

function addQuestion($connection, $form, $subject, $picture, $question, $choice, $answer)
{
    $stmt = $connection->prepare("INSERT INTO question 
        (question_form, question_subject, question_picture, question, question_choice, question_answer) 
        VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("iissss", $form, $subject, $picture, $question, $choice, $answer);
    
    if (!$stmt->execute()) {
        echo "Error adding question";
    } else {
        header("Location: index.php");
        exit();
    }
}

function deleteQuestion($connection, $questionID)
{
    $stmt = $connection->prepare("DELETE FROM question WHERE question_id = ?");
    $stmt->bind_param("i", $questionID);
    
    if (!$stmt->execute()) {
        echo "Error deleting question";
    } else {
        header("Location: index.php");
        exit();
    }
}
