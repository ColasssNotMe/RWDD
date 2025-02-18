<?php
$server = "localhost";
$user     = 'root';
$password = '';
$database = 'quizzation'; // insert database name
$_SESSION['listOfQuestion'] = array();
// $_SESSION['subject'] = 'math';
// $_SESSION['form'] = '1';



// TODO: change "table" in the query to db table name
//use a _GET to know when the button is pressed and then generate things -> replace the $var and then it should update on the question-page?

// create connection
$connection = mysqli_connect($server, $user, $password, $database);
switch ($connection) {
    case false:
        break;
}


if (isset($_GET['form'])) {
    $_SESSION['form'] = $_GET['form'];
    header("Location:select-subject.php");
}

if (isset($_GET['subject'])) {
    $_SESSION['subject'] = $_GET['subject'];
    $_SESSION['questionList'] = getQuestion($connection);
    $_SESSION['currentQuestionNum'] = 1;
}

// get random request question
function getQuestion($connection)
{
    $query  = "SELECT * from question where question_form = '{$_SESSION['form']}' AND question_subject = '{$_SESSION['subject']}' ORDER BY RAND() LIMIT 10";
    $result = mysqli_query($connection, $query);
    $numRow = mysqli_fetch_row($result);
    $row = mysqli_fetch_array($result);
    var_dump($result);
    $listOfQuestion = array();
    $i = 0;
    if ($numRow > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $listOfQuestion[$i] = $row;
            $i++;
        }
        // var_dump($listOfQuestion);
        $_SESSION['listOfQuestion'] = $listOfQuestion;
        $_SESSION['currentQuestion'] = $listOfQuestion[0];
        // var_dump($_SESSION['currentQuestion']);
    } else {
        echo 'No question returned';
    }
}


// used for validate the login user + store the logged in user credential
function validateStudentCredential($connection, $email, $password)
{
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $query  = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password' AND user_role='student'";
    $result = mysqli_query(
        $connection,
        $query
    );
    $row = mysqli_fetch_array($result);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $_SESSION['currentLoginUser'] = $row;
        return "Login successful";
    } else {
        return "User not found";
    }
}

function validateTeacherCredential($connection, $email, $password)
{
    $email = mysqli_real_escape_string($connection, $email);
    $password = mysqli_real_escape_string($connection, $password);
    $query  = "SELECT * FROM user WHERE user_email='$email' AND user_password='$password' AND user_role='teacher'";
    $result = mysqli_query(
        $connection,
        $query
    );
    $row = mysqli_fetch_array($result);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
        $_SESSION['currentLoginUser'] = $row;
        return "Login successful";
    } else {
        return "User not found";
    }
}

function addRecord($connection, $score, $timeTaken, $userID, $quizID)
{
    $query = "INSERT INTO record (score,time_taken,user_id,quiz_id) VALUES ($score,$timeTaken,$userID,$quizID)";
    if (!mysqli_query($connection, $query)) {
        echo "<script>alert('Error when inserting record')</script>";
    } else {
        header("Location: result.php");
    }
}

function deleteRecord($connection, $recordID)
{
    $query = "DELETE FROM record WHERE record_id = $recordID";
    if (!mysqli_query($connection, $query)) {
        echo "<script>alert('Error when deleting record')</script>";
    } else {
        header("Location: result.php");
    }
}

function addUser($connection, $username, $password, $email, $role)
{
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $email = mysqli_real_escape_string($connection, $email);
    $query = "INSERT INTO user (user_name,user_password,user_email, user_role) VALUES ('$username','$password','$email','$role')";
    if (!mysqli_query($connection, $query)) {
        return "Error when registering user";
    } else {
        return "Account registered successful. Login now to get full access of website";
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
