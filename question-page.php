<?php
include 'session.php';
include 'connection.php';
$currentQuestion = $_SESSION['currentQuestion'];

function nextQuestion()
{
    $_SESSION['currentQuestionNum'] += 1;
    $questionList = $_SESSION['listOfQuestion'];
    $_SESSION['currentQuestion'] = $questionList[$_SESSION['currentQuestionNum']];
};

function prevQuestion()
{
    $_SESSION['currentQuestionNum'] -= 1;
    $questionList = $_SESSION['listOfQuestion'];
    $_SESSION['currentQuestion'] = $questionList[$_SESSION['currentQuestionNum']];
};
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/question.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <title>Question <?php echo $_SESSION['currentQuestionNum'] ?>/10</title>
</head>

<body>
    <?php require_once 'components/header.php'; ?>

    <div class='question'>

        <div class='question_area'>

            <form action="" method="get">
                <div class="button_field">
                    <button type='submit' class="secondary-button" id="back-button">
                        <i class="zmdi zmdi-arrow-left"></i>
                    </button>
                    <h1 class="quiz_title">
                        <?php
                        echo $currentQuestion['question_title'] ?>
                    </h1>
                    <button type="submit" name="nextBtn" id="back-button" class='primary-button' type="submit">
                        <i class="zmdi zmdi-arrow-right"></i>
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
</body>

</html>