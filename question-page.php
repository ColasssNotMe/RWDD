<!-- TODO: add a new array to store the answer and select the radio accordingly -->
<!--lastQuestionNum, currentQuestionNum array starts at index 1  -->

<?php
include 'session.php';
include 'connection.php';

if (isset($_GET['question'])) {
    $_SESSION['lastQuestionNum'] = $_SESSION['currentQuestionNum'];
    $_SESSION['currentQuestionNum'] = $_GET['question'];

    // Update currentQuestion based on the new question number
    $_SESSION['currentQuestion'] = $_SESSION['listOfQuestion'][$_SESSION['currentQuestionNum'] - 1];
    if (!isset($_SESSION['userAns'])) {
        $_SESSION['userAns'] = array();
    }

    if (!isset($_SESSION['userAnsData'])) {
        $_SESSION['userAnsData'] = array();
    }
    if (!isset($_SESSION['currentQuestionChoice'])) {
        $_SESSION['currentQuestionChoice'] = null;
    }

    // init the session var
    if (!isset($_GET['answer'])) {
        $_SESSION['userAns'][$_SESSION['lastQuestionNum']] = 0;
        $_SESSION['userAnsData'][$_SESSION['lastQuestionNum']] = "not answered";
    }
    if (isset($_GET['answer'])) {
        $_SESSION['userAns'][$_SESSION['lastQuestionNum']] = $_GET['answer'];
        if (isset($_SESSION['currentQuestionChoice'][$_GET['answer']])) {
            $_SESSION['userAnsData'][$_SESSION['lastQuestionNum']] = $_SESSION['currentQuestionChoice'][$_GET['answer']];
        }
    }
}

if (isset($_GET['result'])) {
    if (isset($_GET['answer'])) {
        $_SESSION['userAns'][10] = $_GET['answer'];
        $_SESSION['userAnsData'][10] = $_SESSION['currentQuestionChoice'][$_GET['answer'] - 1];
    } else {
        $_SESSION['userAns'][10] = 0;
        $_SESSION['userAnsData'][10] = "not answered";
    }
    $confirm_message = "You have reached the end of this quiz. Submit?";
    $_SESSION['endTime'] = time();
    echo "<script>
        if (confirm('$confirm_message')) {
            window.location.href = 'result.php';
        }
    </script>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
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

            <form method="get">
                <div class="button_field">
                    <?php
                    $prevQuestionNum = max(1, $_SESSION['currentQuestionNum'] - 1); // Ensure it doesn't go below 1
                    ?>
                    <button type='submit' name="question" value="<?php echo $prevQuestionNum; ?>" class="secondary-button" id="back-button">
                        <i class="zmdi zmdi-arrow-left"></i>
                    </button>
                    <h1>Question
                        <?php
                        echo $_SESSION['currentQuestionNum']; ?>

                    </h1>
                    <?php
                    $nextQuestionNum = min(10, $_SESSION['currentQuestionNum'] + 1); // Ensure it doesn't exceed 10
                    if ($_SESSION['currentQuestionNum'] == 10) {
                    ?>
                        <button type="submit" name="result" id="back-button" class='primary-button' type="submit">
                            <i class="zmdi zmdi-arrow-right"></i>
                        </button>
                    <?php
                    } else {
                    ?>
                        <button type="submit" name="question" value="<?php echo  $nextQuestionNum ?>" id="back-button" class='primary-button' type="submit">
                            <i class="zmdi zmdi-arrow-right"></i>
                        </button>
                    <?php
                    }
                    ?>

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
                        <?php echo isset($_SESSION['currentQuestion']['question_title']) ? $_SESSION['currentQuestion']['question_title'] : 'no question title found'; ?>
                    </h2>
                    <div class="choice-section">
                        <?php
                        if (isset($_SESSION['currentQuestion']['question_choice'])) {
                            $choices = $_SESSION['currentQuestion']['question_choice'];
                            $i = 1;
                            foreach ($choices as $choice) {
                                $_SESSION['currentQuestionChoice'][$i - 1] = $choice;
                        ?>

                                <input type='radio' name='answer' id='selection<?php echo $i ?>' value='<?php echo $i ?>'
                                    <?php
                                    $temp = $_SESSION['currentQuestionNum'];
                                    if (isset($_SESSION['userAns'][$temp])) {
                                        if ($i == $_SESSION['userAns'][$temp]) {
                                            echo "checked";
                                        }
                                    }

                                    ?> />
                                <label class="choices" for="selection<?php echo $i ?>"><?php echo $choice ?></label>

                        <?php
                                $i++;
                            }
                        }
                        ?>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>