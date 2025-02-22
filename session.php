<?php
session_start();

if (!isset($_SESSION['currentLoginUser'])) {
    header("Location: login.php");
    exit();
}
?>