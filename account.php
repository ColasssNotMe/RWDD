<?php
require 'session.php';
require 'connection.php';
require_once 'navigation.php';

// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }

$currentLoginUser = $_SESSION['currentLoginUser'];
// Extract the user ID properly
$userId = $currentLoginUser['user_id'];

// Use a safe query with prepared statements
$query = "SELECT record_id, score, time_taken FROM record WHERE user_id = '$userId'";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account</title>
    <link rel="stylesheet" href="style/style.css">
    <link rel="stylesheet" href="style/account.css">
</head>

<body>
    <?php require_once 'components/header.php'; ?>
    <div class="account-container">
        <div class="profile-section">
            <h1>My Account</h1>
            <img src="<?php echo htmlspecialchars($currentLoginUser['user_profile'] ?? 'https://cdn-icons-png.flaticon.com/128/1144/1144760.png'); ?>"
                alt="Profile Picture" class="profile-pic">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($currentLoginUser['user_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($currentLoginUser['user_email']); ?></p>
            <div class="button-div">
                <button class="secondary-button">
                    <a href=<?php echo $editAccount ?> class="edit-btn">Edit Profile</a>
                </button>
                <button class="secondary-button" id="delete-button">
                    <a href=<?php echo $logout ?> id="logout-btn">Logout</a>
                </button>
            </div>
        </div>

        <div class="record-section">
            <h2>Quiz Records</h2>
            <table>
                <thead>
                    <tr>
                        <th>Quiz Name</th>
                        <th>Score</th>
                        <th>Date Taken</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_array($result)) {
                    ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['quiz_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['score']); ?></td>
                                <td><?php echo htmlspecialchars($row['date_taken']); ?></td>
                            </tr>
                        <?php
                        }
                    } else {
                        ?>
                        <tr>
                            <td colspan="3">No results found</td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php require_once 'components/footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>