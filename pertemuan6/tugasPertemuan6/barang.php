<?php
include('koneksi.php');

// Fungsi untuk menambah barang
if (isset($_POST['tambah_barang'])) {
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $sql = "INSERT INTO barang (nama, harga) VALUES ('$nama', '$harga')";
    mysqli_query($conn, $sql);
}

// Fungsi untuk mengedit barang
if (isset($_POST['edit_barang'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $harga = $_POST['harga'];

    $sql = "UPDATE barang SET nama='$nama', harga='$harga' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Fungsi untuk menghapus barang
if (isset($_GET['hapus_barang'])) {
    $id = $_GET['hapus_barang'];

    $sql = "DELETE FROM barang WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Query untuk mengambil data barang
$query = "SELECT * FROM barang";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Barang</title>
</head>
<body>
    <h1>CRUD Tabel Barang</h1>

    <h2>Tambah Barang</h2>
    <form method="post">
        <input type="text" name="nama" placeholder="Nama Barang" required>
        <input type="text" name="harga" placeholder="Harga Barang" required>
        <button type="submit" name="tambah_barang">Tambah</button>
    </form>

    <h2>Daftar Barang</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td><a href='barang.php?edit_barang=" . $row['id'] . "'>Edit</a> | <a href='barang.php?hapus_barang=" . $row['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    if (isset($_GET['edit_barang'])) {
        $id = $_GET['edit_barang'];
        $query = "SELECT * FROM barang WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
    <h2>Edit Barang</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
        <input type="text" name="harga" value="<?php echo $row['harga']; ?>" required>
        <button type="submit" name="edit_barang">Simpan Perubahan</button>
    </form>
    <?php
    }
    ?>
</body>
</html>
