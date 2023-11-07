<?php
    include("koneksi.php");
    session_start();
    
    $nama=$_POST['username'];
    $pass=$_POST['password'];
    $konfirmasi=$_POST['konfirmasi'];
    $submit=$_POST['submit'];

    if(isset($_POST['submit'])){
        if($pass==$konfirmasi){
            $sql="INSERT INTO user (username,password) VALUES ('$nama','$pass')";
            $query=mysqli_query($koneksi,$sql);
            if($query){
                echo "<script>alert('Berhasil Mendaftar!')</script>";
                header("Location: login.php");
            }else{
                echo "<script>alert('Gagal Mendaftar!')</script>";
            }
        }else{
            echo "<script>alert('Password tidak sama!')</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Halaman Registrasi Akun Mahasiswa</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <ul>
            <li><label for="username">Username</label></li>
            <input type="text" name="username" id="username">
            <li><label for="password">Password</label></li>
            <input type="password" name="password" id="password">
            <li><label for="konfirmasi">Konfirmasi Password</label></li>
            <input type="password" name="konfirmasi" id="konfirmasi">
            <li><input type="submit" name="submit" value="Register!"></li>
        </ul>
    </form>
    <a href="login.php">Sudah memiliki akun?</a>
</body>
</html>