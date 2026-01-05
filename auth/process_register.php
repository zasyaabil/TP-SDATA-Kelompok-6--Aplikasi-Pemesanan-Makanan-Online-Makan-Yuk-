<?php
$file = __DIR__ . "/users.txt";

$username = trim($_POST['username'] ?? '');
$email    = trim($_POST['email'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '' || $email === '') {
    echo "invalid";
    exit;
}

if (!file_exists($file)) {
    file_put_contents($file, "");
}

$users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($users as $user) {
    $data = explode("|", $user);
    // Cek username (index 0) atau email (index 1)
    if ($data[0] === $username || (isset($data[1]) && $data[1] === $email)) {
        echo "used";
        exit;
    }
}

$hashed = password_hash($password, PASSWORD_DEFAULT);
// Simpan dengan format: username|email|password
file_put_contents($file, "$username|$email|$hashed\n", FILE_APPEND);

echo "success";