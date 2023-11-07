<?php
    
    include("koneksi.php");
    session_start();

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submit = $_POST['submit'];

    if(isset($_POST['submit'])){
        $sql = "SELECT * FROM user WHERE username = '$username'";
        $query = mysqli_query($koneksi,$sql);
        $row = mysqli_fetch_array($query);

        if($row['username'] == $username){
            if($row['password'] == $password){
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                header("Location: index.php");
            }else{
                echo "<script>alert('Password salah!')</script>";
            }
        }else{
            echo "<script>alert('Username tidak terdaftar!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h1>Halaman Login User Akun Mahasiswa!</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <ul>
            <li>Username <input type="text" name="username" id="username"></li>
            <li>Password <input type="password" name="password" id="password"></li>
            <li><input type="submit" name="submit" value="Login!"></li>
        </ul>
    </form>
    <a href="register.php">Buat akun baru!</a>
</body>
</html>