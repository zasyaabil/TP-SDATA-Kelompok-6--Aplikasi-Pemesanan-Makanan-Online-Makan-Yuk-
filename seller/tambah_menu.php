<?php
session_start();
if (!isset($_SESSION['login']) || $_SESSION['role'] !== 'seller') {
    header("Location: ../auth/login.php");
    exit;
}

if ($_POST) {
    file_put_contents("../menu.txt", $_POST['menu']."\n", FILE_APPEND);
}
?>

<h2>Tambah Menu</h2>

<form method="post">
    <input type="text" name="menu" placeholder="Nama menu">
    <button>Tambah</button>
</form>
