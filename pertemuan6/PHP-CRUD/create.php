<?php 
if(isset($_POST["Submit"]))
{
    $username = $_POST["username"];
    $password = $_POST["password"];
    include("koneksi.php");

    $result = mysqli_query($koneksi, "INSERT INTO pengguna(username, password) VALUES('$username', '$password')"); 

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create/Add</title>
</head>
<body>
<h1>Memasukan Data pada Database</h1>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"></td>
            </tr>
            <tr><td><input type="submit" name="Submit"></td></tr>
        </table>
    </form>
</body>
</html>