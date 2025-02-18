<?php
include 'session.php';
require "connection.php";


// Check if form and subject are set in the session
if (!isset($_SESSION['form']) || !isset($_SESSION['subject'])) {
    echo "Error: Form or subject not selected.";
    exit;
}

// if (isset($_GET['question'])) {
//     header("Location:question-page.php");
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
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
                    <button name='question' value="1"
                        class='primary-button start-now' type="submit">
                        Start Now
                    </button>
                </div>
                <div class="describe_field">
                    <div class="describe_box">
                        <h2>You</h2>
                        <p>libxml_disable_entity_loader</p>
                    </div>
                </div>
            </form>


        </div>
    </div>
    <script src="script.js"></script>
    <?php include_once './components/footer.php' ?>
</body>

</html>