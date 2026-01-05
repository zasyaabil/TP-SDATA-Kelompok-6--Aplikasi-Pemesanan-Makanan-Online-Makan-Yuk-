<?php
session_start();
$file = __DIR__ . "/users.txt";

$username = trim($_POST['username'] ?? '');
$password = trim($_POST['password'] ?? '');

if ($username === '' || $password === '') {
    echo "invalid";
    exit;
}

if (!file_exists($file)) {
    echo "fail";
    exit;
}

$users = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

foreach ($users as $user) {
    // explode menjadi 3 bagian: [0]username, [1]email, [2]password
    $data = explode("|", $user);
    
    if (count($data) >= 3) {
        $storedUser = $data[0];
        $storedPass = $data[2]; // Password ada di kolom ke-3 (index 2)

        if ($storedUser === $username && password_verify($password, $storedPass)) {
            $_SESSION['user'] = $username;
            echo "success";
            exit;
        }
    }
}

echo "fail";