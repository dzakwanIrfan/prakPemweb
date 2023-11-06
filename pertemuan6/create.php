<?php 
if(isset($_POST["Submit"]))
{
    $judul = $_POST["judul"];
    $konten = $_POST["konten"];
    include("koneksi.php");

    $result = mysqli_query($koneksi, "INSERT INTO posts(judul, konten) VALUES('$judul', '$konten')"); 

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Create/Add</title>
</head>
<body>
<h1>Memasukan Data pada Postingan</h1>
    <form action="create.php" method="post">
        <table>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>konten</td>
                <td><textarea name="konten" id="konten" name="konten" cols="100" rows="10"></textarea></td>
            </tr>
            <tr><td><input type="submit" name="Submit"></td></tr>
        </table>
    </form>
</body>
</html>