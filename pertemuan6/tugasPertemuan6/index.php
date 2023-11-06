<?php
// Koneksi ke database
include('koneksi.php');

// Query untuk mengambil data COD
$query = "SELECT barang.id AS id_barang, pembeli.id AS id_pembeli, kurir.id AS id_kurir
          FROM barang
          JOIN pembeli ON barang.id = pembeli.id
          JOIN kurir ON barang.id = kurir.id";

$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Index</title>
</head>
<body>
    <h1>Halaman Index</h1>

    <h2>Data COD</h2>
    <table border="1">
        <tr>
            <th>ID Barang</th>
            <th>ID Pembeli</th>
            <th>ID Kurir</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_barang'] . "</td>";
            echo "<td>" . $row['id_pembeli'] . "</td>";
            echo "<td>" . $row['id_kurir'] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
