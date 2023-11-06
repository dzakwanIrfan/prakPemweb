<?php
include("koneksi.php");
if(isset($_POST["update"]))
{
    $id = $_POST["id"];
    $judul = $_POST["judul"];
    $konten = $_POST["konten"];

    $result = mysqli_query($koneksi, "UPDATE posts SET judul='$judul', konten='$konten' WHERE id=$id");

    header("Location: index.php");
}

$id = $_GET['id'];
$result = mysqli_query($koneksi, "SELECT * FROM posts WHERE id=$id");
while($user_data = mysqli_fetch_array($result))
{
    $judul = $user_data['judul'];
    $konten = $user_data['konten'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit User Data</title>
</head>
<body>
    <h1>Post Edit</h1>
    <a href="index.php"><button style="color: white; background-color: red; width: 80px; height: 40px; border-radius: 6px">Batal</button></a><br>
    <br>
    <form action="update.php" method="post">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="Judul" value="<?= $judul ?>"></td>
            </tr>
            <tr>
                <td>Konten</td>
                <td><textarea name="konten" id="konten" name="konten" cols="100" rows="10"><?= $konten ?></textarea></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?= $_GET['id'] ?>"></td>
                <td><input type="submit" name="update" value="Update" style="color: white; background-color: green; width: 80px; height: 40px; border-radius: 6px"></td>
            </tr>
        </table>
    </form>
</body>
</html>