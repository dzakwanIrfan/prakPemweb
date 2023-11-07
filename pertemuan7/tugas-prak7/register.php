<!DOCTYPE html>
<html>
<head>
    <title>Halaman Registrasi</title>
</head>
<body>
    <h2>Registrasi Akun Baru</h2>
    <form id="registerForm" action="register.php" method="post">
        <label for="new_username">Username Baru:</label>
        <input type="text" id="new_username" name="new_username" required>
        <br><br>
        <label for="new_password">Password Baru:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br><br>
        <input type="submit" value="Daftar">
    </form><br>
    Sudah punya akun? <a href="login.php">Login!</a>

    <?php
    // Memproses registrasi akun baru
    if (isset($_POST['new_username']) && isset($_POST['new_password'])) {
        $newUsername = $_POST['new_username'];
        $newPassword = $_POST['new_password'];

        // Simpan username dan password ke dalam array (bisa disimpan ke database)
        $users[$newUsername] = $newPassword;

        echo '<script>alert("Registrasi berhasil. Silakan login dengan akun yang baru Anda daftarkan.");</script>';
        echo '<script>setTimeout(function(){window.location.href="login.php";}, 0);</script>';
    }
    ?>
</body>
</html>
