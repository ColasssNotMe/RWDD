<?php
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Select Form</title>
    <link rel="stylesheet" href="./style/selection.css" />
    <link rel="stylesheet" href="./style/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
    <script src="theme.js"></script>
</head>

<body>
    <div>
        <?php include_once 'components/header.php' ?>
        <div class="content">
                <h1 class="title">
                    <span id="important-text">Choose a form</span>
                </h1>
            <div id="button-div">
                <button class="secondary-button confirmation-button"><i class="zmdi zmdi-long-arrow-return"></i></button>
                <button onclick="sendFormGetReq()" class="primary-button confirmation-button"><i class="zmdi zmdi-arrow-right"></i></button>
            </div>

            <div class="selection">
                <button class="secondary-button form-button" onclick="addForm(event,1)">Form 1</button>
                <button class="secondary-button form-button" onclick="addForm(event,2)">Form 2</button>
                <button class="secondary-button form-button" onclick="addForm(event,3)">Form 3</button>
                <button class="secondary-button form-button" onclick="addForm(event,4)">Form 4</button>
                <button class="secondary-button form-button" onclick="addForm(event,5)">Form 5</button>
                <button class="secondary-button form-button" onclick="addForm(event,0)">All Form</button>
            </div>
        </div>
    </div>

    <script src="./script.js"></script>
</body>

</html>