<?php
require 'navigation.php';
?>

<link rel="stylesheet" href="style/header.css">

<header>
    <div>
        <a href="<?php echo $root ?>">
            <!-- add the logo img with name -->
            <img
                id="logo"
                src="./res/img/Quizzation.png"
                alt="logo-with-name" />
        </a>
    </div>
    <div class="menu">
        <button onclick="toggleMenu()">
            <div class="bar1"></div>
            <div class="bar2"></div>
            <div class="bar3"></div>
        </button>
    </div>
    <div class="menu-dropdown">
        <button class="close" onclick="toggleMenu()">
            <div class="cross1"></div>
            <div class="cross2"></div>
        </button>
        <?php if (isset($_SESSION["currentLoginUser"])) {
            if ($_SESSION['currentLoginUser']['user_role'] == "teacher") { ?>
                <a href="<?php echo $addQuestion ?>">Add New Question</a>
                <a href="<?php echo $editQuestion ?>">Edit Question</a>
            <?php
            } else { ?>
                <a href="<?php echo $select_form ?>">Start Now</a>
            <?php } ?>
        <?php
        } ?>
        <a href="<?php echo $about ?>">About</a>
        <a href="<?php echo $privacy ?>">Privacy Policy</a>
        <a href="<?php echo $tns ?>">Terms and Services</a>

        <?php if (isset($_SESSION["currentLoginUser"])) {
            if ($_SESSION['currentLoginUser']['user_role'] == "student") { ?>
                <a href="<?php echo $account ?>">Account</a>
            <?php
            } else { ?>
                <a href="<?php echo $teacher_dashboard ?>">Account</a>
            <?php }
        } else {
            ?>
            <a href="<?php echo $login ?>">Login</a>
        <?php
        } ?>




    </div>
    <div id="nav-button">
        <ul>
            <li>
                <a href="./" class="header-button">Home</a>
            </li>
            <li>
                <a href="<?php echo $about ?>" class="header-button">About Us</a>
            </li>
            <li>
                <?php if (isset($_SESSION["currentLoginUser"])) {
                    if ($_SESSION['currentLoginUser']['user_role'] == "teacher") { ?>
                        <a class="header-button" href="<?php echo $addQuestion ?>">Add Questions</a>
                    <?php
                    } else { ?>
                        <a class="header-button" href="<?php echo $select_form ?>" class="header-button">Get Started</a>
                    <?php }
                } else {
                    ?>
                    <a href="<?php echo $select_form ?>" class="header-button">Get Started</a>
                <?php
                } ?>

            </li>
            <?php if (isset($_SESSION["currentLoginUser"])) {
                if ($_SESSION['currentLoginUser']['user_role'] == "teacher") { ?>
                    <li>
                        <a class="header-button" href="<?php echo $editQuestion ?>">Edit Questions</a>
                    </li>
            <?php
                }
            } ?>



            <li>
                <?php if (isset($_SESSION["currentLoginUser"])) {
                ?>
                    <a href="<?php if ($_SESSION["currentLoginUser"]['user_role'] == "student") {
                                    echo $account;
                                } else {
                                    echo $teacher_dashboard;
                                } ?>" class="header-button" id="profile-a">
                        <img
                            id="headerProfilePic"
                            src="<?php echo htmlspecialchars($_SESSION["currentLoginUser"]['user_profile'] ?? 'https://cdn-icons-png.flaticon.com/128/1144/1144760.png'); ?>"
                            alt="Profile Picture"
                            class="header-profile-pic">
                    </a>
                <?php
                } else {
                ?>
                    <a href="<?php echo $login ?>" class="header-button" id="profile-a">
                        <img
                            src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png"
                            alt="profile"
                            class="icon"
                            id=" profile-icon" />
                    </a>
                    <!-- close the else statement -->
                <?php
                } ?>
            </li>
        </ul>
    </div>
</header>