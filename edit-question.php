<?php
include 'session.php';
include 'connection.php';

$currentLoginUser = $_SESSION['currentLoginUser'];
if ($currentLoginUser['user_role'] !== 'teacher') {
    echo "<script>alert('Access denied! Only teachers can add questions.'); window.location.href='index.php';</script>";
    exit();
}

if (isset($_GET) ){
    # code...
}

if (isset($_POST['submit'])) {
    $choices = array_filter([
        $_POST['choice1'] ?? '',
        $_POST['choice2'] ?? '',
        $_POST['choice3'] ?? '',
        $_POST['choice4'] ?? ''
    ], fn($choice) => !empty($choice));

    // Encode choices to JSON format
    $choiceString = json_encode($choices, JSON_UNESCAPED_UNICODE);

    // Handle image upload
    $questionImage = uploadPicture($_FILES['question_image'], NULL, 'uploads/question/', 'addQuestion.php');

    // Validate answer index to avoid errors
    $answerIndex = $_POST['answer'] ?? null;
    $answer = isset($choices[$answerIndex]) ? $choices[$answerIndex] : null;

    if ($answer === null) {
        echo "<script>alert('Please select a valid answer!'); window.location.href='addQuestion.php';</script>";
        exit();
    }
    // Insert question into the database
    addQuestion(
        $connection,
        $_POST['form'],
        $_POST['subject'],
        $questionImage,
        $_POST['title'],
        $choiceString,
        $answer
    );
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/insert.css">
    <title>Add Question</title>
</head>

<body>
    <?php include_once 'components/header.php'; ?>
    <div class="form-container">
        <div class="form_area">
            <h1>Edit Question</h1>
            <form method="post" action="#" enctype="multipart/form-data">
                <div class="content">
                    <div class="upper">
                        <h2><b>Question Title</b></h2>
                        <input placeholder="Enter question's title" class="form_style" type="text" name="title" required>
                        <hr>
                            <h2><b>Picture (optional)</b></h2>
                        <img id="questionImage" 
                            src="<?php echo htmlspecialchars($_FILES['question_image'] ?? 'res/img/addImage.jpg'); ?>" 
                            alt="Question Picture" class="question-pic">
                        <input type="file" name="question_image" class="form_style" accept="image/*" onchange="previewImage(event)">
                        <button type="button" onclick="removeImage()"class="secondary-button" id="remove">Remove Picture</button>
                        <hr>
                        <h2><b>Enter Choices</b></h2>
                        <label class="form_sub_title" for="choice1">Choice 1</label>
                        <input placeholder="Enter choice 1" class="form_style" type="text" name="choice1">
                        <label class="form_sub_title" for="choice2">Choice 2</label>
                        <input placeholder="Enter choice 2" class="form_style" type="text" name="choice2">
                        <label class="form_sub_title" for="choice">Choice 3</label>
                        <input placeholder="Enter choice 3" class="form_style" type="text" name="choice3">
                        <label class="form_sub_title" for="choice">Choice 4</label>
                        <input placeholder="Enter choice 4" class="form_style" type="text" name="choice4">
                        <hr>
                        <h2><b>Select the answer</b></h2>
                        <div class="answer">
                            <input type="radio" name="answer" value="1" id="choice1">
                            <label for="choice1">Choice 1</label>
                            <input type="radio" name="answer" value="2" id="choice2">
                            <label for="choice2">Choice 2</label>
                            <input type="radio" name="answer" value="3" id="choice3">
                            <label for="choice3">Choice 3</label>
                            <input type="radio" name="answer" value='4' id="choice4">
                            <label for="choice4">Choice 4</label>
                        </div>
                    </div>
                    <div class="lower">
                        <h2><b>Form</b></h2>
                        <div class="selection">
                            <input type="radio" name="form" value="1" id="form1" />
                            <label for="form1">
                                Form 1
                            </label>
                            <input type="radio" name="form" value="2" id="form2" />
                            <label for="form2">
                                Form 2
                            </label>
                            <input type="radio" name="form" value="3" id="form3" />
                            <label for="form3">
                                Form 3
                            </label>
                            <input type="radio" name="form" value="4" id="form4" />
                            <label for="form4">
                                Form 4
                            </label>
                            <input type="radio" name="form" value="5" id="form5" />
                            <label for="form5">
                                Form 5
                            </label>
                        </div>
                            <h2><b>Subject</b></h2>
                        <div class="selection">
                            <input type="radio" name="subject" value="english" id="english" />
                            <label for="english">
                                English
                            </label>
                            <input type="radio" name="subject" value="chinese" id="chinese" />
                            <label for="chinese">
                                Chinese
                            </label>
                            <input type="radio" name="subject" value="history" id="history" />
                            <label for="history">
                                History
                            </label>
                            <input type="radio" name="subject" value="addmath" id="addmath" />
                            <label for="addmath">
                                Add Math
                            </label>
                            <input type="radio" name="subject" value="malay" id="malay" />
                            <label for="malay">
                                Malay
                            </label>
                            <input type="radio" name="subject" value="science" id="science" />
                            <label for="science">
                                Science
                            </label>
                            <input type="radio" name="subject" value="math" id="math" />
                            <label for="math">
                                Math
                            </label>
                            <input type="radio" name="subject" value="physics" id="physics" />
                            <label for="physics">
                                Physics
                            </label>
                            <input type="radio" name="subject" value="moral" id="moral" />
                            <label for="moral">
                                Moral
                            </label>
                            <input type="radio" name="subject" value="economy" id="economy" />
                            <label for="economy">
                                Economy
                            </label>
                            <input type="radio" name="subject" value="account" id="account" />
                            <label for="account">
                                Account
                            </label>
                        </div>
                    </div>
                </div>

                <button type="submit" name="submit" class="primary-button" id="submit">Add Question</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
    <?php include_once 'components/footer.php'; ?>
</body>

</html>