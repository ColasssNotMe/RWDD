<?php
include 'session.php';
include 'connection.php';

if (isset($_POST['submit'])) {
    $choices = array(
        $_POST['choice1'],
        $_POST['choice2'],
        $_POST['choice3'],
        $_POST['choice4']
    );

    $choiceString = implode(",", $choices);

    $answer = $choices[$_POST['answer']];


    addQuestion(
        $connection,
        $_POST['form'],
        $_POST['subject'],
        $_POST['picture'],
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
            <h1>Add Question</h1>
            <form method="post" action="#">
                <label class="form_sub_title" for="title">Question Title</label>
                <input placeholder="Enter question's title" class="form_style" type="text" name="title" required>

                <label class="form_sub_title" for="form">Form</label>
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

                <label class="form_sub_title" for="subject">Subject</label>
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

                <label class="form_sub_title" for="photo">Picture (optional)</label>
                <input placeholder="Enter target subject" class="form_style" type="text" name="subject">

                <h3>Enter Choices</h1>
                    <label class="form_sub_title" for="choice1">Choice 1</label>
                    <input placeholder="Enter choice 1" class="form_style" type="text" name="choice1">
                    <label class="form_sub_title" for="choice2">Choice 2</label>
                    <input placeholder="Enter choice 2" class="form_style" type="text" name="choice2">
                    <label class="form_sub_title" for="choice">Choice 3</label>
                    <input placeholder="Enter choice 3" class="form_style" type="text" name="choice3">
                    <label class="form_sub_title" for="choice">Choice 4</label>
                    <input placeholder="Enter choice 4" class="form_style" type="text" name="choice4">

                    <h3>Select the answer for the question</h3>
                    <label class="form_sub_title" for="answer">Choice 1</label>
                    <input type="radio" name="answer" value="1">
                    <label class="form_sub_title" for="answer">Choice 2</label>
                    <input type="radio" name="answer" value="2">
                    <label class="form_sub_title" for="answer">Choice 3</label>
                    <input type="radio" name="answer" value="3">
                    <label class="form_sub_title" for="answer">Choice 4</label>
                    <input type="radio" name="answer" value='4'>

                    <button type="submit" name="submit">Add Question</button>
            </form>
        </div>
    </div>

    <?php include_once 'components/footer.php'; ?>
</body>

</html>