<!DOCTYPE html>
<html>
<head>
    <title>Halaman Login</title>
</head>
<body>
    <h2>Silakan Login</h2>
    <form id="loginForm" action="login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br><br>
        <input type="submit" value="Login">
    </form><br>
    Belum punya akun? <a href="register.php">Register!</a>

    <?php
    session_start();

    // Array yang menyimpan username dan password (contoh sederhana, gantilah dengan database)
    $users = [
        'user1' => 'password1',
        'user2' => 'password2',
        'user3' => 'password3',
    ];

    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if (array_key_exists($username, $users) && $users[$username] == $password) {
            // Login berhasil
            $_SESSION['username'] = $username;
            header('Location: index.php');
        } else {
            // Login gagal
            echo '<script>alert("Login gagal. Periksa kembali username dan password!");</script>';
            echo '<script>setTimeout(function(){window.location.href="login.php";}, 0);</script>';
        }
    }
    ?>
</body>
</html>
