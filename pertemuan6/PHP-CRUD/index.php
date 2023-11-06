<?php 
    include("koneksi.php");
    $read = mysqli_query($koneksi,"SELECT * FROM pengguna ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>BELAJAR CRUD</title>
</head>
<body>
    <h1>Menampilkan data dari databse!</h1>
    <a href="create.php"><button>Tambah Data</button></a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Operasi</th>
        </tr>
        <?php 
        while ($row = mysqli_fetch_array($read)) {
            echo "<tr>";
            echo "<td>".$row['id']."</td>";
            echo "<td>".$row["username"]."</td>";
            echo "<td>".$row["password"]."</td>";
            echo "<td><a href='update.php?id=$row[id]'>Edit</a> | <a href='delete.php?id=$row[id]'>Delete</a></td></tr>";
        }
        ?>
    </table>
</body>
</html>