<?php
include "connection.php";
$registrationMessage = ""; // Initialize variable
if (isset($_POST['submit'])) {
    $registrationMessage = addUser($connection, $_POST['name'], $_POST['password'], $_POST['email'], "student");
}
if (!empty($registrationMessage)) {
    echo "<script>alert('$registrationMessage');</script>";
    if ($registrationMessage == "Account registered successful") {
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/login-register.css " />
    <script src="theme.js"></script>
</head>

<body>
    <?php require_once 'components/header.php' ?>
    <div class="form-container">
        <div class="form_area">
            <p class="form_title">SIGN UP</p>
            <form action="" method="post">
                <div class="form_group">
                    <label class="form_sub_title" for="name">Name</label>
                    <input placeholder="Enter your full name" name="name" class="form_style" type="text">
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="email">Email</label>
                    <input placeholder="Enter your email" name="email" class="form_style" type="email">
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="password">Password</label>
                    <input placeholder="Enter your password" name="password" class="form_style" type="password">
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="password">Re-enter Password</label>
                    <input placeholder="Re-Enter your password" name="repassword" class="form_style" type="password">
                </div>
                <div>
                    <button class="form_btn" name="submit">SIGN UP</button>
                    <p>Have an Account?
                        <a class="form_link" href="login.php">Login Here!</a>
                    </p>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <script src="./script.js"></script>
    <?php require_once 'components/footer.php' ?>
</body>

</html>