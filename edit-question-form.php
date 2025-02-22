<?php
include 'session.php';
include 'connection.php';


if (isset($_GET['form'])) {
    $_SESSION['form'] = $_GET['form'];
    header("Location:edit-question-subject.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Form</title>
    <link rel="stylesheet" href="./style/edit-question.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="theme.js"></script>
</head>

<body>
    <?php include_once 'components/header.php' ?>
    <div class="content">
        <h1 class="title">
            <span id="important-text">Select form</span>
        </h1>
        <form method="get">
            <div id="button-div">
                <button class="secondary-button" id="return" onclick="window.location.href='./index.php';return false">
                    <i class="zmdi zmdi-long-arrow-return"></i>
                </button>
                <button type="submit" class="primary-button confirmation-button">
                    <i class="zmdi zmdi-arrow-right"></i>
                </button>
            </div>
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

                <input type="radio" name="form" value="0" id="form0" />
                <label for="form0">
                    All Form
                </label>
            </div>
        </form>

    </div>
    <?php include_once 'components/footer.php' ?>

    <script src="./script.js"></script>
</body>

</html>