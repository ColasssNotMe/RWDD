<?php
require 'session.php';
require 'connection.php';
require_once 'navigation.php';

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/account.css">
</head>

<body>
    <?php require_once 'components/header.php'; ?>

    <div class="account-container">
        <h1>My Account</h1>

        <div class="profile-section">
            <img src="<?php echo htmlspecialchars($user['profile_pic'] ?? 'https://cdn-icons-png.flaticon.com/128/1144/1144760.png'); ?>"
                alt="Profile Picture" class="profile-pic">
            <p><strong>User ID:</strong> <?php echo htmlspecialchars($user['id']); ?></p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></p>
            <a href="editAccount.php" class="edit-btn">Edit Profile</a>
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>

    <?php require_once 'components/footer.php'; ?>
</body>

</html>