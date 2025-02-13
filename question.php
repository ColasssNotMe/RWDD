<?php
require "connection.php";

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/question.css" />
</head>

<body>
    <?php include_once './components/header.php' ?>
    <div class='content'>
        <div id='quiz'>
            <button name='backBtn'>
                <a href="select-subject.php"><</a>
            </button>
            <h2></h2>
            <button name='startBtn'
            class='start-now' onclick=startQuiz()>
            Start Now</button>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>