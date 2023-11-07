<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
</head>
<body>
    <h1>Hallo <?php echo $_SESSION['username']; ?>👋!</h1>
    <h2>Selamat Datang Di Halaman Latihan Belajar Session dan User Authentication!</h2>
    <p>Password anda adalah <?php echo $_SESSION['password']?></p>
</body>
</html>