<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'temp'; // insert database name
$listOfQuestion;
//use a _GET to know when the button is pressed and then generate things -> replace the $var and then it should update on the question-page?

$connection = mysqli_connect($server, $user, $password, $database);
switch ($connection) {
    case false:
        break;
}

if (isset($_GET['subject'])) {
    $getReq = $_GET[''];
    $query = 'SELECT * from table where form = $form and subject = $subject';
    $result = mysqli_query($connection, $query);
}
