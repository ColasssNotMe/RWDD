<!-- TODO: add a new array to store the answer and select the radio accordingly -->
<!--lastQuestionNum, currentQuestionNum array starts at index 1  -->

<?php
session_start();
include 'connection.php';

// Ensure question list exists
if (empty($_SESSION['listOfQuestion'])) {
    echo '<script>alert("There\'s no question for the selected subject"); window.location.href="select-form.php"</script>';
    exit();
}

// Set question data
$_SESSION['lastQuestionNum'] = $_SESSION['currentQuestionNum'] ?? 1;
$_SESSION['currentQuestionNum'] = $_GET['question'] ?? 1;
$_SESSION['currentQuestion'] = $_SESSION['listOfQuestion'][$_SESSION['currentQuestionNum'] - 1];

// Fetch choices from the database
$currentQuestionId = $_SESSION['currentQuestion']['question_id'];
$query = "SELECT question_choice FROM question WHERE question_id = $currentQuestionId";
$result = mysqli_query($connection, $query);

if ($row = mysqli_fetch_assoc($result)) {
    $_SESSION['currentQuestionChoice'] = json_decode($row['question_choice'], true);
}

// Debugging: Show choices fetched from DB
echo "<pre>Fetched Choices: " . print_r($_SESSION['currentQuestionChoice'], true) . "</pre>";

// Handle answer selection
if (isset($_GET['answer'])) {
    $_SESSION['userAns'][$_SESSION['lastQuestionNum']] = $_GET['answer'];
    $_SESSION['userAnsData'][$_SESSION['lastQuestionNum']] = $_SESSION['currentQuestionChoice'][$_GET['answer']] ?? "Invalid choice";
} else {
    $_SESSION['userAns'][$_SESSION['lastQuestionNum']] = 0;
    $_SESSION['userAnsData'][$_SESSION['lastQuestionNum']] = "not answered";
}

// Check if it's the last question
$totalQuestions = count($_SESSION['listOfQuestion']);
if ($_SESSION['currentQuestionNum'] == $totalQuestions && isset($_GET['answer'])) {
    // Store the final answer
    $_SESSION['userAns'][$_SESSION['currentQuestionNum']] = $_GET['answer'];
    $_SESSION['userAnsData'][$_SESSION['currentQuestionNum']] = $_SESSION['currentQuestionChoice'][$_GET['answer']] ?? "Invalid choice";

    // Redirect to result page
    echo "<script>
        alert('Quiz completed! Redirecting to results...');
        window.location.href = 'result.php';
    </script>";
    exit();
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
                    <h1>Question <?php echo $_SESSION['currentQuestionNum']; ?></h1>

                    <?php
                    $nextQuestionNum = $_SESSION['currentQuestionNum'] + 1;
                    if ($_SESSION['currentQuestionNum'] == $totalQuestions) {
                    ?>
                        <!-- Show Submit button on last question -->
                        <button type="submit" name="submit_quiz" id="submit-button" class='primary-button'>
                            <i class="zmdi zmdi-check"></i> Submit
                        </button>
                    <?php
                    } else {
                    ?>
                        <!-- Show Next button for other questions -->
                        <button type="submit" name="question" value="<?php echo $nextQuestionNum; ?>" id="next-button" class='primary-button'>
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
                        if (!empty($_SESSION['currentQuestionChoice'])) {
                            $i = 1; // Choice index starts at 1
                            foreach ($_SESSION['currentQuestionChoice'] as $choice) {
                                $isChecked = (isset($_SESSION['userAns'][$_SESSION['currentQuestionNum']]) && 
                                            $_SESSION['userAns'][$_SESSION['currentQuestionNum']] == $i) ? "checked" : "";
                        ?>
                                <input type="radio" name="answer" id="selection<?php echo $i; ?>" value="<?php echo $i; ?>" <?php echo $isChecked; ?> />
                                <label class="choices" for="selection<?php echo $i; ?>">
                                    <?php echo htmlspecialchars($choice); ?>
                                </label>
                        <?php
                                $i++;
                            }
                        } else {
                            echo "<p>No choices available for this question.</p>";
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