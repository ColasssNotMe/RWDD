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
    <?php
        $sql="SELECT question from question";
        if(!mysqli_query($connection, $sql)){
            die('Error: ' . mysqli_error($con));
        } else {
            $result = mysqli_query($connection, $sql);
            while ($row = mysqli_fetch_array($result)){
            echo '<h2 class="question_tittle">'.$row["question"].'</h2>';
        }
        }
    ?>
    <div class='question'>
        <div class='question_area'>
                <a href="select-subject.php">
                    <button name='backBtn'>
                        <
                    </button>
                </a>
            <button name='startBtn'
            class='start-now' onclick=startQuiz()>
            Start Now</button>
        </div>
    </div>
    <script src="script.js"></script>
    <?php include_once './components/footer.php' ?>
</body>

</html>