<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login - MakanYuk</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">
</head>
<body>

<div class="auth-container">
    <h2 style="font-family: 'Playfair Display', serif;">MakanYuk</h2>
    
    <div id="alertBox">
        <?php if (isset($_GET['msg']) && $_GET['msg'] === 'login'): ?>
            <div class="alert error">⚠️ Silakan login terlebih dahulu!</div>
        <?php endif; ?>
    </div>

    <form id="loginForm">
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>
        
        <div class="input-group">
            <input type="password" name="password" placeholder="Password" required>
        </div>

        <div class="remember-me">
            <input type="checkbox" id="remember" name="remember">
            <label for="remember">Ingat Saya</label>
        </div>

        <button type="submit" id="btnLogin">Masuk</button>
    </form>


    <p>Belum punya akun? <a href="register.php">Daftar Sekarang</a></p>
</div>

<script>
document.getElementById("loginForm").addEventListener("submit", function(e){
    e.preventDefault();
    const alertBox = document.getElementById("alertBox");
    const btn = document.getElementById("btnLogin");

    btn.classList.add('loading');
    btn.innerText = "Mengecek...";

    fetch("process_login.php", {
        method: "POST",
        body: new FormData(this)
    })
    .then(res => res.text())
    .then(data => {
        data = data.trim();
        btn.classList.remove('loading');
        btn.innerText = "Masuk";

        if (data === "success") {
            alertBox.innerHTML = '<div class="alert success">Login Berhasil! Selamat datang.</div>';
            setTimeout(() => { window.location.href = "../index.php"; }, 1500);
        } else {
            alertBox.innerHTML = '<div class="alert error">Username atau password salah!</div>';
        }
    });
});
</script>

</body>
</html>