<?php
include 'session.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./style/account.css">
    <title>profile</title>
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <div class="content">
        <div>profile picture div</div>
        <div>Email: </div>
        <div>Password:</div>
        <div class="button-div">
            <button class="secondary-button">Edit</button>
            <button class="primary-button" id="delete-button">Delete</button>
        </div>
    </div>
    <?php require_once 'components/footer.php'; ?>
</body>

</html>