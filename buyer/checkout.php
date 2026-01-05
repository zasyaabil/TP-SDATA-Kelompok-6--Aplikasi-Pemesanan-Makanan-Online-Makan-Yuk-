<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: ../auth/login.php?msg=login");
    exit;
}
?>
