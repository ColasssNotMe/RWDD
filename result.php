<!-- filepath: /c:/wamp64/www/Assignment/RWDD/result.php -->
<?php
include 'session.php';
include 'connection.php';
include 'navigation.php';

$i = 0;
$correctAnsCount = 0;
foreach ($_SESSION['userAnsData'] as $choice) {
    if ($choice == $_SESSION['listOfQuestion'][$i]['question_answer']) {
        $correctAnsCount++;
    }
    $i++;
}

$percentage = $correctAnsCount / 10 * 100;
$circumference = 2 * pi() * 62; // Calculate circumference
$offset = $circumference - ($percentage / 100 * $circumference); // Calculate offset
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
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
                <div class="outer-circle">
                    <div class="inner-circle">
                        <h2 id="percentage">
                            <?php echo $percentage ?>%
                        </h2>
                    </div>
                    <svg width="100%" height="100%" viewBox="0 0 150 150">
                        <circle r="62" cx="75" cy="75" fill="transparent" stroke="black" stroke-width="25" stroke-dasharray="<?php echo $circumference; ?>" stroke-dashoffset="<?php echo $offset; ?>" />
                    </svg>
                </div>

                <p><strong>Correct Answer:</strong>
                    <br>
                    <?php echo $correctAnsCount ?> / 10
                </p>
                <p><strong>Time Taken:</strong> </p>
            </div>
            <div class="button-div">
                <button class="secondary-button">
                    Save as collection
                </button>
                <button class="primary-button" id="return-home">
                    <a href=<?php echo $root ?> id="return-button">Return to home</a>
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
                        $j = 1;
                        foreach ($_SESSION['listOfQuestion'] as $question) {
                        ?>
                            <tr class=<?php if ($question['question_answer'] == $_SESSION['userAnsData'][$j]) {
                                            echo "right-ans";
                                        } else {
                                            echo "wrong-ans";
                                        }
                                        ?>>
                                <td><?php echo $j; ?></td>
                                <td><?php echo $question['question_title'] ?></td>
                                <td><?php echo $question['question_answer'] ?></td>
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

    <script src="script.js"></script>
    <?php require_once 'components/footer.php'; ?>
</body>

</html>