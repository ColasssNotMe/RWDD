<?php
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Form</title>
    <style>
        .root {
            display: flex;
            flex-direction: row;
        }

        .container {
            padding: 0 10px;
        }

        form {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>

<body>
    <div class="root">
        <div class="container">
            <form method="get">
                <label for="username">
                    Username: <input type="text" name="username">
                </label>
                <label for="password">
                    Password: <input type="password" name="password">
                </label>
                <button type="submit" name="login">Login</button>
            </form>
        </div>

        <div class="container">
            <form method="post">
                <label for="username">
                    Username: <input type="text" name="username">
                </label>
                <label for="password">
                    Password: <input type="password" name="password">
                </label>
                <label for="repassword">
                    Password: <input type="password" name="repassword">
                </label>
                <button type="submit" name="register">Register</button>
            </form>
        </div>
    </div>
</body>

</html>