<?php
// Koneksi ke database
include('koneksi.php');

// Fungsi untuk menambah pembeli
if (isset($_POST['tambah_pembeli'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $sql = "INSERT INTO pembeli (nama, no_hp, alamat) VALUES ('$nama', '$no_hp', '$alamat')";
    mysqli_query($conn, $sql);
}

// Fungsi untuk mengedit pembeli
if (isset($_POST['edit_pembeli'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    $sql = "UPDATE pembeli SET nama='$nama', no_hp='$no_hp', alamat='$alamat' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Fungsi untuk menghapus pembeli
if (isset($_GET['hapus_pembeli'])) {
    $id = $_GET['hapus_pembeli'];

    $sql = "DELETE FROM pembeli WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Query untuk mengambil data pembeli
$query = "SELECT * FROM pembeli";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Pembeli</title>
</head>
<body>
    <h1>CRUD Tabel Pembeli</h1>

    <h2>Tambah Pembeli</h2>
    <form method="post">
        <input type="text" name="nama" placeholder="Nama Pembeli" required>
        <input type="text" name="no_hp" placeholder="no HP" required>
        <input type="text" name="alamat" placeholder="Alamat" required>
        <button type="submit" name="tambah_pembeli">Tambah</button>
    </form>

    <h2>Daftar Pembeli</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Pembeli</th>
            <th>No HP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td>" . $row['alamat'] . "</td>";
            echo "<td><a href='pembeli.php?edit_pembeli=" . $row['id'] . "'>Edit</a> | <a href='pembeli.php?hapus_pembeli=" . $row['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    if (isset($_GET['edit_pembeli'])) {
        $id = $_GET['edit_pembeli'];
        $query = "SELECT * FROM pembeli WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
    <h2>Edit Pembeli</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
        <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
        <input type="text" name="alamat" value="<?php echo $row['alamat']; ?>" required>
        <button type="submit" name="edit_pembeli">Simpan Perubahan</button>
    </form>
    <?php
    }
    ?>
</body>
</html>
