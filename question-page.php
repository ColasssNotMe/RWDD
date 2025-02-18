
<?php
include 'session.php';
include 'connection.php';
$currentQuestion = $_SESSION['currentQuestion'];

function nextQuestion()
{
    $_SESSION['currentQuestionNum'] += 1;
    $questionList = $_SESSION['listOfQuestion'];
     // Check if the next question exists in the array
    if (isset($questionList[$_SESSION['currentQuestionNum']])) {
        $_SESSION['currentQuestion'] = $questionList[$_SESSION['currentQuestionNum']];
    } else {
        // Handle the case where there are no more questions, possibly redirect to a results page or display a message
        echo "<script>alert('No more questions. Redirecting to results page.'); window.location.href='result.php';</script>";
        exit();
    }
    header("Location:question-page.php");
    exit();
};

function prevQuestion()
{
    $_SESSION['currentQuestionNum'] -= 1;
    $questionList = $_SESSION['listOfQuestion'];
     // Check if the previous question exists in the array
    if (isset($questionList[$_SESSION['currentQuestionNum']])) {
        $_SESSION['currentQuestion'] = $questionList[$_SESSION['currentQuestionNum']];
    } else {
        // Handle the case where there are no previous questions, possibly stay on the current question or display a message
        echo "<script>alert('This is the first question.');</script>";
        $_SESSION['currentQuestionNum'] = 0;
        $_SESSION['currentQuestion'] = $questionList[0];
    }
    header("Location:question-page.php");
    exit();
};

if (isset($_POST['nextBtn'])) {
    nextQuestion();
};

if (isset($_POST['prevBtn'])) {
    prevQuestion();
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

            <form method="post">
                <div class="button_field">
                    <button type='submit' name="prevBtn" class="secondary-button" id="back-button">
                        <i class="zmdi zmdi-arrow-left"></i>
                    </button>
                    <h1>Question
                        <?php
                        echo $_SESSION['currentQuestionNum']; ?>

                    </h1>
                    <button type="submit" name="nextBtn" id="back-button" class='primary-button' type="submit">
                        <i class="zmdi zmdi-arrow-right"></i>
                    </button>
                </div>
                <div class="describe_box">

                    <!--For question image  -->
                    <?php if (isset($_SESSION['currentQuestion']['question_picture']) && $_SESSION['currentQuestion']['question_picture']) { ?>
                        <img src=<?php echo $_SESSION['currentQuestion']['question_picture'] ?>
                            alt="image of the question">
                    <?php } else {
                        echo "<div></div>";
                    } ?>


                    <h2>
                        <?php echo isset($currentQuestion['question_title']) ? $currentQuestion['question_title'] : ''; ?>
                    </h2>
                    <p>
                        <?php
                         if (isset($currentQuestion['question_choice'])) {
                            $choices = explode(",", $currentQuestion['question_choice']);
                            foreach ($choices as $choice) {
                                echo $choice . "<br>";
                            }
                         }
                        ?>
                    </p>
                </div>
            </form>


        </div>
    </div>
</body>

</html>