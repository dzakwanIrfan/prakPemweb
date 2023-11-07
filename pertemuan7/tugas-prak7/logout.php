<?php
session_start();
session_destroy();

echo '<script>alert("Anda telah berhasil logout.");</script>';
echo '<script>setTimeout(function(){window.location.href="login.php";}, 10000);</script>';
?>
