<!DOCTYPE html>
<html lang="en">

<head>
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
            <p class="form_title">SIGN IN </p>
            <form action="">
                <div class="form_group">
                    <label class="form_sub_title" for="username">Username</label>
                    <input placeholder="Enter your username" class="form_style" type="text">
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="password">Password</label>
                    <input placeholder="Enter your password" id="password" class="form_style" type="password">
                </div>
                <div>
                    <button class="form_btn">SIGN UP</button>
                    <p>Don't have an account?
                        <a class="form_link" href="register.php">Register Here!</a>
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