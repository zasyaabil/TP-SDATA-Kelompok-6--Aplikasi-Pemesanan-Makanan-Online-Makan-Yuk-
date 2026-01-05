<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register - MakanYuk</title>
    <link rel="stylesheet" href="../css/auth.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>
<body>

<div class="auth-container">
    <h2 style="font-family: 'Playfair Display', serif;">MakanYuk</h2>
    
    <div id="alertBox"></div>

    <form id="registerForm">
        <div class="input-group">
            <input type="text" name="username" placeholder="Username" required>
        </div>

        <div class="input-group">
            <input type="email" name="email" placeholder="Email Aktif" required>
        </div>

        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Password" required>
        </div>

        <div class="input-group">
            <input type="password" name="confirm_password" id="confirm_password" placeholder="Konfirmasi Password" required>
        </div>

        <button type="submit" id="btnDaftar">Daftar Sekarang</button>
    </form>

    <p>Sudah punya akun? <a href="login.php">Login Sekarang</a></p>
</div>

<script>
document.getElementById("registerForm").addEventListener("submit", function(e){
    e.preventDefault();
    
    const alertBox = document.getElementById("alertBox");
    const btn = document.getElementById("btnDaftar");
    const pass = document.getElementById("password").value;
    const confirm = document.getElementById("confirm_password").value;

    if(pass !== confirm) {
        alertBox.innerHTML = '<div class="alert error">Password tidak cocok!</div>';
        return;
    }

    // Tambahkan class loading dari CSS kamu
    btn.classList.add('loading');
    btn.innerText = "Memproses...";

    fetch("process_register.php", {
        method: "POST",
        body: new FormData(this)
    })
    .then(res => res.text())
    .then(data => {
        data = data.trim();
        btn.classList.remove('loading');
        btn.innerText = "Daftar Sekarang";

        if (data === "success") {
            alertBox.innerHTML = '<div class="alert success">Registrasi Berhasil! Mengalihkan...</div>';
            setTimeout(() => window.location.href = "login.php", 2000);
        } else if (data === "used") {
            alertBox.innerHTML = '<div class="alert error">Username atau Email sudah ada!</div>';
        } else {
            alertBox.innerHTML = '<div class="alert error">Data tidak valid!</div>';
        }
    });
});
</script>

</body>
</html>