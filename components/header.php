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
        <a href="<?php echo $about ?>">About</a>
        <a href="<?php echo $privacy ?>">Privacy Policy</a>
        <a href="<?php echo $tns ?>">Terms and Services</a>
        <!-- TODO:DELETE if user is logged in -->
        <a href="<?php echo $login ?>">Login</a>
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
                            src="https://images.pexels.com/photos/19526811/pexels-photo-19526811/free-photo-of-cake-on-white-background.jpeg?auto=compress&cs=tinysrgb&w=600&lazy=load"
                            alt="profile"
                            class="icon"
                            id="profile-icon" />
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