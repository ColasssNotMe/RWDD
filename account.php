<?php
require 'session.php';
require 'connection.php';
require_once 'navigation.php';

// if (!isset($_SESSION['user'])) {
//     header("Location: login.php");
//     exit();
// }

$currentLoginUser = $_SESSION['currentLoginUser'];
$userId = $currentLoginUser['user_id'];

$query = "SELECT 
            r.record_id, 
            r.score, 
            r.time_taken,
            q.question_form,
            q.question_subject,
            r.date_taken
          FROM record r
          JOIN question q ON r.question_id = q.question_id
          WHERE r.user_id = '$userId'";

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
            <h1>MY ACCOUNT</h1>
            <img src="<?php echo htmlspecialchars($currentLoginUser['user_profile'] ?? 'https://cdn-icons-png.flaticon.com/128/1144/1144760.png'); ?>"
                alt="Profile Picture" class="profile-pic">
            <p><strong>Username:</strong> <?php echo htmlspecialchars($currentLoginUser['user_name']); ?></p>
            <p><strong>Email:</strong> <?php echo htmlspecialchars($currentLoginUser['user_email']); ?></p>
            <div class="button-div">
                <button class="secondary-button" onclick="window.location.href='editAccount.php'">
                    Edit Profile
                </button>
                <button class="secondary-button" id="delete-button">
                    <a href=<?php echo $logout ?> id="logout-btn">Logout</a>
                </button>
            </div>
        </div>

        <div class="record-section">
            <h2>Quiz Records</h2>
            <div class="scrollable-table">
                <table>
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Form</th>
                            <th>Subject</th>
                            <th>Score</th>
                            <th>Date Taken</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_array($result)) {
                        ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td><?php
                                        if ($row['question_form'] == "0") {
                                            echo "All Form";
                                        } else {
                                            echo htmlspecialchars($row['question_form']);
                                        }
                                        ?></td>
                                    <td><?php echo htmlspecialchars($row['question_subject']); ?></td>
                                    <td><?php echo htmlspecialchars($row['score']); ?></td>
                                    <td><?php echo htmlspecialchars($row['date_taken']); ?></td>
                                </tr>
                            <?php
                                $count++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">No results found</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php require_once 'components/footer.php'; ?>
    <script src="script.js"></script>
</body>

</html>