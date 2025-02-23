<?php
session_start();
require "connection.php";


// Check if form and subject are set in the session
if ($_SESSION['subject'] == "" || !isset($_SESSION['subject'])) {
    echo "<script>alert('Error: Subject not selected.');window.location.href='select-subject.php'</script>";
    exit();
}

// if (isset($_GET['question'])) {
//     header("Location:question-page.php");
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Question</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/question.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
</head>

<body>
    <?php include_once './components/header.php' ?>
    <div class='question'>
        <div class='question_area'>
            <!-- <div class="background-div"> -->
            <form action="question-page.php" method="get">
                <div class="button_field">
                    <button class="secondary-button" id="back-button">
                        <a class="back-button-a" href="select-subject.php">
                            <i class="zmdi zmdi-long-arrow-return"></i>
                        </a>
                    </button>
                    <h1 class="quiz_title">
                        <?php echo $_SESSION['subject'] ?>
                    </h1>
                    <input type="text" style="display: none; " name="answer" value="0">
                    <input type="text" style="display: none; " name="start_time" value=<?php $_SESSION['startTime'] = time() ?>>
                    <button name='question' value="1"
                        class='primary-button ' type="submit" id="start-now">
                        GO!
                    </button>
                </div>
                <div class="describe_field">
                    <div class="describe_box">
                        <h2>Quiz Details:</h2>
                        <ul>
                            <li>
                                <div><b>10 questions</b></div>
                            </li>
                            <li>
                                <div><b>ONLY INCLUDE</b> the form selected</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <?php include_once './components/footer.php' ?>
</body>

</html>