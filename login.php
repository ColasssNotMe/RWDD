<?php
include 'session.php';
include 'connection.php';

if (isset($_POST['signinBtn'])) {
    $loginMessage = validateStudentCredential($connection, $_POST['email'], $_POST['password']);
}

if (!empty($loginMessage)) {
    // echo $loginMessage;
    if ($loginMessage == "Login successful") {
        // echo $_SESSION['currentLoginUser'];
        echo "<script>alert('$loginMessage');</script>";
        echo "<script>window.location.href = 'index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/login-register.css " />
    <script src="theme.js"></script>
</head>

<body>
    <?php require_once 'components/header.php' ?>
    <!-- From Uiverse.io by mi-series -->
    <div class="form-container">
        <div class="form_area">
            <h1 class="form_title">SIGN IN </h1>
            <form action="" method="post">
                <div class="form_group">
                    <label class="form_sub_title" for="email">Email</label>
                    <input placeholder="Enter your email" class="form_style" type="email" name="email" required>
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="password">Password</label>
                    <input placeholder="Enter your password" id="password" class="form_style" name="password" type="password" required>
                </div>
                <div>
                    <button class="form_btn" type="submit" name="signinBtn">LOG IN</button>
                    <p>Don't have an account?
                        <a class="form_link" href="register.php">Register Here!</a>
                    </p>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
    <?php require_once 'components/footer.php' ?>
</body>

</html>