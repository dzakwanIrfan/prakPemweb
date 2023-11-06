<?php 
    include("koneksi.php");
    $read = mysqli_query($koneksi,"SELECT * FROM posts ORDER BY id ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>LATIHAN CRUD</title>
</head>
<body style="width: 75%; margin: auto">
        
    <h1>Post News Ter-Update!</h1>
    <a href="create.php"><button style="color: white; background-color: blue; width: 120px; height: 40px; border-radius: 6px">Tambah Post</button></a><br>

    <?php 
        while ($row = mysqli_fetch_array($read)) {
            echo "<h2>".$row['id'].". ".$row['judul']."</h2>";
            echo "<a href='update.php?id=$row[id]' style='color: black; background-color: yellow; padding: 4px 8px; border-radius: 6px;'>Edit</a> | <a href='delete.php?id=$row[id]' style='color: black; background-color: red; padding: 4px 8px; border-radius: 6px;'>Delete</a>";
            echo "<p style='text-align: justify'>".$row['konten']."</p>";
            echo "<hr>";
            echo "<br>";
        }
    ?>
    
</body>
</html>