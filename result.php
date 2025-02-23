<?php
session_start();
include 'connection.php';
include 'navigation.php';

// Ensure start and end time exist before calculating time taken
$timeTaken = isset($_SESSION['startTime'], $_SESSION['endTime']) ? $_SESSION['endTime'] - $_SESSION['startTime'] : 0;
$timeFormatted = gmdate("H:i:s", $timeTaken);

$correctAnsCount = 0;
$totalQuestions = count($_SESSION['listOfQuestion'] ?? []);

$a = 0;

var_dump($_SESSION['userAnsData']);
var_dump($_SESSION['listOfQuestion']);
if ($totalQuestions > 0) {
    foreach ($_SESSION['userAnsData'] as $userAns) {
        $realAns = $_SESSION['listOfQuestion'][$a];
        if ($userAns == $realAns['question_answer']) {
            $correctAnsCount++;
        }
        $a++;
    }
}
$percentage = ($totalQuestions > 0) ? ($correctAnsCount / $totalQuestions) * 100 : 0.0;

// Insert record if user is logged in and it hasn't been recorded already
if (isset($_SESSION['currentLoginUser']) && !isset($_SESSION['recordAdded'])) {
    $userID = $_SESSION['currentLoginUser']['user_id'];
    $dateTaken = date("Y-m-d");

    // Insert record into `record` table
    $recordID = addRecord($connection, $userID, $correctAnsCount, $timeFormatted, $dateTaken);

    if ($recordID) {
        foreach ($_SESSION['listOfQuestion'] as $index => $question) {
            saveUserAnswer($connection, $recordID, $question['question_id'], $_SESSION['userAnsData'][$index] ?? "No Answer");
        }
    }
    $_SESSION['recordAdded'] = true;
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php'; ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/result.css">
    <title>Result</title>
</head>

<body>
    <?php require_once 'components/header.php'; ?>

    <div class="content">
        <div class="result-section">
            <h1>Result</h1>
            <div>
                <div class="percentage-circle">
                    <?php echo number_format($percentage, 2); ?>%
                </div>
                <p><strong>Correct Answer:</strong>
                    <br>
                    <?php echo $correctAnsCount ?> / 10
                </p>
                <p><strong>Time Taken:</strong>
                    <br>
                    <?php echo $timeTaken ?> Seconds
                </p>
            </div>
            <div class="button-div">
                <button class="secondary-button" id="save-collection" onclick="window.location.href='select-form.php'">
                    Retry
                </button>
                <button class="primary-button" id="return-home">
                    <a href="<?php echo $root; ?>" id="return-button">Return to home</a>
                </button>
            </div>

            <div class="record-section">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Question</th>
                            <th>Answer</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $j = 0;
                        foreach ($_SESSION['listOfQuestion'] as $question) {
                            $userAnswer = $_SESSION['userAnsData'][$j] ?? "No Answer";
                            $isCorrect = ($userAnswer == $question['question_answer']);
                        ?>
                            <tr class="<?php echo $isCorrect ? 'right-ans' : 'wrong-ans'; ?>">
                                <td><?php echo ($j + 1); ?></td>
                                <td><?php echo htmlspecialchars($question['question_title']); ?></td>
                                <td><?php echo htmlspecialchars($question['question_answer']); ?></td>
                            </tr>
                        <?php
                            $j++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php require_once 'components/footer.php'; ?>
</body>

</html>