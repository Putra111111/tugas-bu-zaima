<?php
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "stok");

if(!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM storage");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
<h1>Inventory</h1>
<table>
    <tr>
        <th>ID</th>
        <th>Nama gudang</th>
        <th>Lokasi</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id_storage']; ?></td>
        <td><?php echo $row['Nama_gudang']; ?></td>
        <td><?php echo $row['Lokasi']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
<?php
include 'footer.php';
?>