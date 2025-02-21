<?php

include 'session.php';
include "connection.php";
require_once 'navigation.php';

$currentLoginUser = $_SESSION['currentLoginUser'];
$userId = $currentLoginUser['user_id'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once 'extrahead.php' ?>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>EditAccount</title>
    <link rel="stylesheet" href="style/style.css" />
    <link rel="stylesheet" href="style/login-register.css " />
    <script src="theme.js"></script>
</head>

<body>
    <?php require_once 'components/header.php' ?>
    <div class="form-container">
        <div class="form_area">
            <p class="form_title">EDIT DETAILS</p>
        <form action="updateAccount.php" method="post" enctype="multipart/form-data">
            <img id="profilePreview" 
                src="<?php echo htmlspecialchars($currentLoginUser['user_profile'] ?? 'https://cdn-icons-png.flaticon.com/128/1144/1144760.png'); ?>" 
                alt="Profile Picture" class="profile-pic">
            <div class="form_group profile-group">
                <input type="file" name="profilePreview" class="form_style" accept="image/*" onchange="previewImage(event)">
            </div>
                <div class="form_group">
                    <label class="form_sub_title" for="name">Name</label>
                    <input value="<?php echo htmlspecialchars($currentLoginUser['user_name'] ?? ''); ?>" name="name" class="form_style" type="text" required>
                </div>
                <div class="form_group">
                    <label class="form_sub_title" for="email">Email</label>
                    <input value="<?php echo htmlspecialchars($currentLoginUser['user_email']); ?>" name="email" class="form_style" type="email" required>
                </div>
                <div class="form_group checkbox-group">
                    <input type="checkbox" id="changePasswordCheckbox" onclick="togglePasswordFields()">
                    <label for="changePasswordCheckbox">Change Password?</label>
                </div>

                <div id="passwordFields" style="display: none;">
                    <div class="form_group">
                        <label class="form_sub_title" for="currentPassword">Current Password</label>
                        <input placeholder="Enter your current password" name="currentPassword" class="form_style" type="password">
                    </div>
                    <div class="form_group">
                        <label class="form_sub_title" for="newPassword">New Password</label>
                        <input placeholder="Enter your new password" name="newPassword" class="form_style" type="password">
                    </div>
                    <div class="form_group">
                        <label class="form_sub_title" for="rePassword">Re-enter New Password</label>
                        <input placeholder="Re-Enter your password" name="rePassword" class="form_style" type="password">
                    </div>
                </div>
                <div>
                    <button class="form_btn" name="update">DONE</button>
                    <br>
                </div>
            </form>
        </div>
    </div>
    <script src="./script.js"></script>
    <?php require_once 'components/footer.php' ?>
    
    <script>
    function togglePasswordFields() {
        var passwordFields = document.getElementById("passwordFields");
        var checkbox = document.getElementById("changePasswordCheckbox");
        var inputs = passwordFields.querySelectorAll("input");

        if (checkbox.checked) {
            passwordFields.style.display = "block";
            inputs.forEach(input => input.setAttribute("required", "true"));
        } else {
            passwordFields.style.display = "none";
            inputs.forEach(input => input.removeAttribute("required")); 
            inputs.forEach(input => input.value = ""); 
        }
    }

    function previewImage(event) {
        const image = document.getElementById('profilePreview');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                image.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    }

    </script>
</body>

</html>