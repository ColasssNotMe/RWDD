<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/login-register.css " />
    <script src="theme.js"></script>
</head>
<body>
    <?php require_once 'components/header.php'?>
    
    <div class='form-container'>
        <form action="" method="POST">
            <div class='tittle'>
                <h1>Login</h1>
            </div>

            <div class='form_item'>
                <label for="username">Username</label>
                <br />
                <input type="text" name="username" id="username" />
                <br />
                <input type="password" name="password" id="password" />
            </div>
        </form>
    </div>
    <?php require_once 'components/footers.php'?>
    <script src="/script.js"></script>
</body>
</html>