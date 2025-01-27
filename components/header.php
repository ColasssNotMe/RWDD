<?php
require 'navigation.php';
?>

<link rel="stylesheet" href="style/header.css">

<header>
    <div class="left-side">
        <div id="align-left-sm">
            <div>
                <a href="<?php echo $root ?>">
                    <!-- add the logo img with name -->
                    <img
                        id="logo-with-name"
                        src="./res/img/Quizzation.png"
                        alt="logo-with-name" />
                </a>
            </div>
            <div id="toggleDarkMode">
                <button
                    type="button"
                    class="no-style-button header-button"
                    id="dark-mode-button"
                    onclick="switchTheme()">
                    <img
                        src="./res/img/moon.png"
                        alt="toggle dark mode"
                        class="icon"
                        id="themeIcon" />
                </button>
            </div>
        </div>
        <div id="temp-middle-logo">
            <a href=<?php echo $root ?>>
                <img
                    id="logo-middle-sm"
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
            <div class="menu-dropdown">
                <a href="<?php echo $about ?>">About</a>
                <a href="<?php echo $privacy ?>">Privacy Policy</a>
                <a href="<?php echo $tns ?>">Terms and Services</a>
                <!-- TODO:DELETE if user is logged in -->
                <a href="<?php echo $login ?>">Login</a>
            </div>
        </div>
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
                <a href="<?php echo $select_form ?>" class="header-button">Get Started</a>
            </li>
            <li>
                <?php if (isset($_SESSION["currentLoginUser"])) {
                ?>
                    <a href="<?php echo $account ?>" class="header-button" id="profile-a">
                        <img
                            src="https://cdn-icons-png.flaticon.com/128/1144/1144760.png"
                            alt="profile"
                            class="icon"
                            id="profile-icon" />
                    </a>;
                    ?>
                    <!-- close  the if statement -->
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