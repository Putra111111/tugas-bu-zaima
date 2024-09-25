<?php
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "stok");

if(!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}

$result = mysqli_query($conn, "SELECT * FROM inventory");
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
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Kuantitas Stock</th>
        <th>Lokasi Gudang</th>
        <th>Serial Number</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id_inventory']; ?></td>
        <td><?php echo $row['Nama_barang']; ?></td>
        <td><?php echo $row['Jenis_barang']; ?></td>
        <td><?php echo $row['Kuantitas_stok']; ?></td>
        <td><?php echo $row['Lokasi_gudang']; ?></td>
        <td><?php echo $row['Serial_number']; ?></td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
<?php
include 'footer.php';
?>