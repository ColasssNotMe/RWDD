<?php
session_start();
include 'connection.php';

// Ensure user is logged in
if (!isset($_SESSION['currentLoginUser'])) {
    header("Location: login.php");
    exit();
}

$currentLoginUser = $_SESSION['currentLoginUser'];
$userId = $currentLoginUser['user_id'];

$name = mysqli_real_escape_string($connection, $_POST['name']);
$email = mysqli_real_escape_string($connection, $_POST['email']);
$profile_picture = $currentLoginUser['user_profile'];

// Profile picture upload
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] !== UPLOAD_ERR_NO_FILE) {
        // Handle any upload errors
        if ($_FILES['profile_picture']['error'] !== UPLOAD_ERR_OK) {
            echo "<script>alert('Upload error! Please try again.'); window.location.href='editAccount.php';</script>";
            exit();
        }

        // Process the upload
        $profile_picture = uploadPicture($_FILES['profile_picture'], $currentLoginUser['user_profile'], 'uploads/profile/', 'editAccount.php');

        $updateQuery = "UPDATE user SET user_name = '$name', user_email = '$email', user_profile = '$profile_picture' WHERE user_id = '$userId'";
        if (mysqli_query($connection, $updateQuery)) {
            $_SESSION['currentLoginUser']['user_name'] = $name;
            $_SESSION['currentLoginUser']['user_email'] = $email;
            $_SESSION['currentLoginUser']['user_profile'] = $profile_picture;
            echo "<script>alert('Profile updated successfully!'); window.location.href='account.php';</script>";
        } else {
            echo "<script>alert('Error updating profile. Please try again.'); window.location.href='editAccount.php';</script>";
        }
        exit();
    }

    if (!empty($_POST['currentPassword']) && !empty($_POST['newPassword']) && !empty($_POST['rePassword'])) {
        changeUserPassword($connection, $userId, $_POST['currentPassword'], $_POST['newPassword'], $_POST['rePassword']);
    }
}


echo "<script>alert('No changes made.'); window.location.href='Account.php';</script>";
exit();
