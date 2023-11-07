<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}

echo 'Selamat datang, ' . $_SESSION['username'] . '! Anda berhasil masuk ke halaman index.';

// Logout
echo '<br><br><a href="logout.php">Logout</a>';
?>
