<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MakanYuk Order Makanan Online</title>
    <!--Font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">    <!--CSS-->
    <link rel="stylesheet" href="css/style.css">
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
        <a href="contact.html" class="nav-link">Kontak</a>
        <a href="testimoni.php" class="nav-link">Testimoni</a>
        </nav>

        <div class="nav-right">
    <a href="cart.php" class="cart-link">
        Cart (<span id="cart-count">0</span>)
    </a>

    <?php if(isset($_SESSION['user'])): ?>
    <span style="margin-right:10px">
        Hi, <b><?= htmlspecialchars($_SESSION['user']); ?></b>
    </span>
    <a href="auth/logout.php">Logout</a>
<?php else: ?>
    <a href="auth/login.php">Sign In</a>
<?php endif; ?>

</div>


    </header>

    <main>
    <!-- HERO -->
    <section class="hero">
        <div class="hero-text">
            <h1>Makan Enak, <span>Tanpa Ribet</span></h1>
            <p>Platform online shop makanan favoritmu. Cepat, hangat, dan langsung ke rumah.</p>
            <a href="#lineup" class="btn-order big">Order Now</a>
            </div>

        <div class="hero-img">
            <img src="images/nasgor.jpg" alt="Makanan">
        </div>
    </section>

    <!-- OUTLET -->
    <section class="outlet">
            <h2>Tersedia di Berbagai Outlet</h2>
            <p>MakanYuk hadir di berbagai kota besar di Indonesia</p>

        <div class="outlet-grid">
        <div class="outlet-card">
            <img src="images/outlet.jpg" alt="Outlet">
            <h4>Jakarta</h4>
        </div>
            <div class="outlet-card">
            <img src="images/outet1.png" alt="Outlet">
            <h4>Bandung</h4>
        </div>
            <div class="outlet-card">
            <img src="images/outlet3.png" alt="Outlet">
            <h4>Yogyakarta</h4>
        </div>
        </div>

    </section>

    <!--MENU-->
    <section class="menu" id="lineup">
            <div class="container">
                <h2>Menu Makan Yuk</h2>
                <div class="menu-grid">
                    <div class="menu-item">
                        <img src="images/nasgor.jpg" alt="Nasi Goreng">
                        <h3>Nasi Goreng</h3>
                        <p>Nasi Goreng lezat dengan bumbu khas dengan cita rasa gurih dan nikmat disetiap suapan.</p>
                        <div class="price">Rp 23.000</div>
                        <?php if(isset($_SESSION['user'])): ?>
                        <button class="add-to-cart" data-id="1" data-name="Nasi Goreng" data-price="23000">Tambah ke Keranjang</button>
                        <?php else: ?>
                        <button class="add-to-cart" onclick="alert('⚠️ Silakan login terlebih dahulu!')"> Tambah ke Keranjang </button>
                        <?php endif; ?>
                        

                    </div>
                    <div class="menu-item">
                        <img src="images/kwetiau.png" alt="Kwetiau">
                        <h3>Kwetiau Goreng</h3>
                        <p>Kwetiau goreng yang nikmat dengan aroma wangi yang bikin nagih.</p>
                        <div class="price">Rp 20.000</div>
                        <?php if(isset($_SESSION['user'])): ?>
                        <button class="add-to-cart" data-id="2" data-name="Kwetiau" data-price="20000">Tambah ke Keranjang</button>
                        <?php else: ?>
                        <button class="add-to-cart" onclick="alert('⚠️ Silakan login terlebih dahulu!')">Tambah ke Keranjang</button>
                        <?php endif; ?>
                    </div>

                    <div class="menu-item">
                        <img src="images/ayam.png" alt="Ayam Goreng">
                        <h3>Ayam Goreng Spesial</h3>
                        <p>Ayam Goreng renyah di luar juicy di dalam.</p>
                        <div class="price">Rp 18.000</div>
                        <?php if(isset($_SESSION['user'])): ?>
                        <button class="add-to-cart" data-id="3" data-name="Ayam Goreng Spesial" data-price="18000">Tambah ke Keranjang</button>
                        <?php else: ?>
                        <button class="add-to-cart" onclick="alert('⚠️ Silakan login terlebih dahulu!')">Tambah ke Keranjang</button>
                        <?php endif; ?>
                    </div>
                    <div class="menu-item">
                        <img src="images/esteh.png" alt="Es Teh">
                        <h3>Es Teh</h3>
                        <p>Es Teh manis, dingin dan menyegarkan.</p>
                        <div class="price">Rp 7.000</div>
                        <?php if(isset($_SESSION['user'])): ?>
                        <button class="add-to-cart" data-id="4" data-name="Es Teh" data-price="7000">Tambah ke Keranjang</button>
                        <?php else: ?>
                        <button class="add-to-cart" onclick="alert('⚠️ Silakan login terlebih dahulu!')">Tambah ke Keranjang</button>
                        <?php endif; ?>
                    </div>
                    <div class="menu-item">
                        <img src="images/cincau.png" alt="Cincau">
                        <h3>Capuccino Cincau</h3>
                        <p>Es Capuccino segar dengan rasa creamy dan manis pas.</p>
                        <div class="price">Rp 12.000</div>
                        <?php if(isset($_SESSION['user'])): ?>
                        <button class="add-to-cart" data-id="5" data-name="Capuccino Cincau" data-price="12000">Tambah ke Keranjang</button>
                        <?php else: ?>
                        <button class="add-to-cart" onclick="alert('⚠️ Silakan login terlebih dahulu!')">Tambah ke Keranjang</button>
                        <?php endif; ?>
                    </div>
                    <div class="menu-item">
                        <img src="images/esjeruk.png" alt="esjeruk">
                        <h3>Es Jeruk</h3>
                        <p>Es Jeruk segar dengan perasan jeruk pilihan.</p>
                        <div class="price">Rp 9.000</div>
                        <?php if(isset($_SESSION['user'])): ?>
                        <button class="add-to-cart" data-id="6" data-name="Es Jeruk" data-price="9000">Tambah ke Keranjang</button>
                        <?php else: ?>
                        <button class="add-to-cart"onclick="alert('⚠️ Silakan login terlebih dahulu!')">Tambah ke Keranjang</button>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="testimoni">
            <div class="container">
                <h2>Testimoni Pelanggan</h2>
                <div class="testimonial-wrapper">
                    <?php
                    $file = "testimoni.txt";
                    if (file_exists($file)) {
                        $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
                        $latest = array_slice($lines, -3); // Ambil 3 terakhir
                        foreach ($latest as $line) {
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
                    ?>
                </div>
                <a href='testimoni.php' class='lihat-semua'>Lihat Semua Testimoni ↪</a>
            </div>
        </section>

       
    </main>

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

    <!-- JS -->
    <script src="js/cart.js"></script>
    <script src="js/main.js"></script>


</body>
</html>