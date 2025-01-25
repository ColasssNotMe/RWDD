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
            <p class="form_title">SIGN UP</p>
            <form action="">
                <div class="form_group">
                    <label class="form_sub_title" for="name">Name</label>
                    <input placeholder="Enter your full name" class="form_style" type="text">
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="email">Email</label>
                    <input placeholder="Enter your email" id="email" class="form_style" type="email">
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="password">Password</label>
                    <input placeholder="Enter your password" id="password" class="form_style" type="password">
                </div>
                <div>
                    <button class="form_btn">SIGN UP</button>
                    <p>Have an Account?
                        <a class="form_link" href="">Login Here!</a>
                    </p>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <!-- <form action="" method="POST">
            <div class="title">
                <h1>Login</h1>
                <h3>
                    Don't have an account?
                    <i><u><a href="./register.php">Register Now</a></u></i>
                </h3>
            </div>

            <div class="forms-item">
                <label for="username">Username</label>
                <br />
                <input type="text" name="username" id="username" />
                <br />
                <label for="">Password</label>
                <br />
                <input type="password" name="password" id="password" />
            </div>
            <button class="primary-button" type="submit" name="login">Login</button>
        </form>-->
    <script src="./script.js"></script>
    <?php require_once 'components/footer.php' ?>
</body>

</html>