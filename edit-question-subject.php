<?php
include 'session.php';
include 'connection.php';

$_SESSION['subject'] = "";

if (isset($_GET['subject'])) {
    $_SESSION['subject'] = $_GET['subject'];
    header("Location:edit-question-select.php");
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="./style/edit-question.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <title>Select Subject</title>
</head>

<body>
    <?php include_once './components/header.php' ?>
    <div class="content">
        <h1 class="title">
            <span id="important-text">Form > Select Subject</span>
        </h1>
        <form  method="get">
            <div id="button-div">
                <button
                    class="secondary-button"
                    id="return">
                    <a href="edit-question-form.php">
                        <i class="zmdi zmdi-long-arrow-return"></i>
                    </a>
                </button>
                <button
                    type="submit"
                    class="confirmation-button"
                    id="start-now">
                    <i class="zmdi zmdi-play"></i>
                </button>
            </div>


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


        </form>
    </div>
    <?php include_once 'components/footer.php' ?>
    <script src="script.js"></script>
</body>

</html>