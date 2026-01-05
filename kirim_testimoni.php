<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = htmlspecialchars(trim($_POST["nama"]));
        $isi = htmlspecialchars(trim($_POST["isi"]));
        $rating = intval($_POST["rating"]);

        if ($nama && $isi && $rating >= 1 && $rating <= 5) {
            $baris = "$nama|$isi|$rating" . PHP_EOL;
            file_put_contents("testimoni.txt", $baris, FILE_APPEND);
            header("Location: contact.html?success=1");
        } else {
            header("Location: contact.html?error=1");
        }
    } else {
        header("Location: contact.html");
    }
?>