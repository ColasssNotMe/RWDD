<?php
include "session.php";
session_destroy();

echo "<script>window.location.href='./'</script>";
