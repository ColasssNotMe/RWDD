<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'temp'; // insert database name
$listOfQuestion;

// TODO: change "table" in the query to db table name
//use a _GET to know when the button is pressed and then generate things -> replace the $var and then it should update on the question-page?

// create connection
$connection = mysqli_connect($server, $user, $password, $database);
switch ($connection) {
    case false:
        break;
}


// get random request question
function getQuestion($connection, $form, $subject, $numQuestion)
{
    $query = "SELECT * from table where form =$_GET[$form] AND subject =$_GET[$subject] ORDER BY RAND() LIMIT $_GET[$numQuestion]";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
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
    $query = "SELECT * FROM table where username=$username AND password=$password";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) > 0) {
        echo 'User found';
        $currentLoginUser = mysqli_num_rows($result);
        return $currentLoginUser;
    }
}
