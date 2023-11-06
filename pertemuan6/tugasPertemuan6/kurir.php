<?php
// Koneksi ke database
include('koneksi.php');

// Fungsi untuk menambah kurir
if (isset($_POST['tambah_kurir'])) {
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    $sql = "INSERT INTO kurir (nama, no_hp) VALUES ('$nama', '$no_hp')";
    mysqli_query($conn, $sql);
}

// Fungsi untuk mengedit kurir
if (isset($_POST['edit_kurir'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $no_hp = $_POST['no_hp'];

    $sql = "UPDATE kurir SET nama='$nama', no_hp='$no_hp' WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Fungsi untuk menghapus kurir
if (isset($_GET['hapus_kurir'])) {
    $id = $_GET['hapus_kurir'];

    $sql = "DELETE FROM kurir WHERE id=$id";
    mysqli_query($conn, $sql);
}

// Query untuk mengambil data kurir
$query = "SELECT * FROM kurir";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Kurir</title>
</head>
<body>
    <h1>CRUD Tabel Kurir</h1>

    <h2>Tambah Kurir</h2>
    <form method="post">
        <input type="text" name="nama" placeholder="Nama Kurir" required>
        <input type="text" name="no_hp" placeholder="no HP" required>
        <button type="submit" name="tambah_kurir">Tambah</button>
    </form>

    <h2>Daftar Kurir</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nama Kurir</th>
            <th>no HP</th>
            <th>Aksi</th>
        </tr>
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama'] . "</td>";
            echo "<td>" . $row['no_hp'] . "</td>";
            echo "<td><a href='kurir.php?edit_kurir=" . $row['id'] . "'>Edit</a> | <a href='kurir.php?hapus_kurir=" . $row['id'] . "'>Hapus</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

    <?php
    if (isset($_GET['edit_kurir'])) {
        $id = $_GET['edit_kurir'];
        $query = "SELECT * FROM kurir WHERE id=$id";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    ?>
    <h2>Edit Kurir</h2>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>
        <input type="text" name="no_hp" value="<?php echo $row['no_hp']; ?>" required>
        <button type="submit" name="edit_kurir">Simpan Perubahan</button>
    </form>
    <?php
    }
    ?>
</body>
</html>
