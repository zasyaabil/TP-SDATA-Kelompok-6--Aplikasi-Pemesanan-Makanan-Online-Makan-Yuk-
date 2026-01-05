<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: auth/login.php?msg=login");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart - MakanYuk</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
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
            <a href="index.php">Home</a>
            <a href="contact.html">Kontak</a>
            <a href="testimoni.php">Testimoni</a>
        </nav>

        <div class="nav-right">
        <a href="cart.php" class="cart-link">Cart (<span id="cart-count">0</span>)</a></li>
        </div>

    </header>

    <main>
      <section class="cart">
        <div class="container">
          <h2>Keranjang Belanja</h2>
          <div class="cart-items">
            <table>
              <thead>
                <tr>
                  <th>Produk</th>
                  <th>Harga</th>
                  <th>Jumlah</th>
                  <th>Subtotal</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody id="cart-table-body">
                <!-- Cart items will be inserted here by JavaScript -->
              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3" class="total-label">Total</td>
                  <td colspan="2" class="total-price" id="cart-total">Rp 0</td>
                </tr>
              </tfoot>
            </table>
          </div>
          <div class="cart-actions">
            <a href="index.php" class="btn">Lanjut Belanja</a>
            <a href="checkout.html" class="btn btn-primary" id="checkout-btn"
              >Checkout</a
            >
          </div>
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


    <script src="js/main.js"></script>
    <script src="js/cart.js"></script>
  </body>
</html>