<?php
session_start();

$_SESSION['username'] = "user1";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Percobaan 1</title>
</head>
<body>
    <h1>Kirim data sesion ke halaman 2</h1>
    <?php
    echo "<h2>Username session di Halaman 1: </h2>";
    echo $_SESSION['username'];
    echo "<br><br>";
    ?>
    <a href="halaman2.php">Ke Halaman 2</a>
</body>
</html>