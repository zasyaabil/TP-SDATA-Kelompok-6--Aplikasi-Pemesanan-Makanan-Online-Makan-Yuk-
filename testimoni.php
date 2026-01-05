<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Semua Testimoni - MakanYuk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!--NAVBAR-->
    <header class="navbar">
        <div class="nav-left">
            <span class="logo-text">Makan</span>
            <img src="images/logo.png" alt="MakanYuk" class="logo-img">
            <span class="logo-text">Yuk</span>
        </div>

        <nav class="nav-center">
            <a href="index.php">Home</a>
            <a href="contact.html">Kontak</a>
            <a href="testimoni.php">Testimoni</a>
        </nav>

        <div class="nav-right">
        <a href="cart.php" class="cart-link">Cart (<span id="cart-count">0</span>)</a></li>
        </div>

    </header>

    <section class="lihat_testimoni">
        <div class="container">
            <h2>Semua Testimoni Pelanggan</h2>

            <?php
            $file = "testimoni.txt";
            if (file_exists($file)) {
                $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                if (count($lines) > 0) {
                    foreach ($lines as $line) {
                        list($nama, $isi, $rating) = explode('|', $line);
                        echo "<div class='testimonial'>";
                        echo "<p>\"$isi\"</p>";
                        echo "<h4>$nama</h4>";
                        echo "<div class='rating'>" . str_repeat("★", $rating) . str_repeat("☆", 5 - $rating) . "</div>";
                        echo "</div>";
                    }
                } else {
                    echo "<p>Belum ada testimoni.</p>";
                }

            } else {
                echo "<p>File testimoni tidak ditemukan.</p>";
            }
            ?>

            <div class="back-link">
                <a href="index.php">↩ Kembali ke Beranda</a>
            </div>
        </div>
    </section>
    
    <!-- FOOTER -->
    <footer class="footer">
        <div class="footer-content">
            <div>
                <h3>MakanYuk</h3>
                <p>Solusi pesan makanan online dengan rasa terbaik dan pelayanan cepat.</p>
            </div>

            <div>
                <h4>Menu</h4>
                <a href="#">Makanan</a>
                <a href="#">Minuman</a>
                <a href="#">Paket Hemat</a>
            </div>

            <div>
                <h4>Info</h4>
                <a href="#">Tentang Kami</a>
                <a href="#">Karir</a>
                <a href="#">Bantuan</a>
            </div>

            <div>
                <h4>Contact</h4>
                <p>Email: makanyuk@gmail.com</p>
                <p>Phone: 0812-6692-3354</p>
            </div>
        </div>

        <div class="footer-bottom">
            © 2025 MakanYuk. All rights reserved.
        </div>
    </footer>

    <script src="js/cart.js"></script>

</body>
</html>