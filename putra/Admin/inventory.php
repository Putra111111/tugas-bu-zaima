<?php
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "stok");

if(!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query = "DELETE FROM inventory WHERE id_inventory='$id'";
    mysqli_query($conn, $delete_query);
    header("Location: inventory.php");
    exit();
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
<h1>Inventory </h1>
<a href="create_inventory.php">Create</a>
<table border="1" class="gup">
    <tr>
        <th>ID</th>
        <th>Nama Barang</th>
        <th>Jenis Barang</th>
        <th>Kuantitas Stock</th>
        <th>Lokasi Gudang</th>
        <th>Serial Number</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id_inventory']; ?></td>
        <td><?php echo $row['Nama_barang']; ?></td>
        <td><?php echo $row['Jenis_barang']; ?></td>
        <td><?php echo $row['Kuantitas_stok']; ?></td>
        <td><?php echo $row['Lokasi_gudang']; ?></td>
        <td><?php echo $row['Serial_number']; ?></td>
        <td>
            <a href="update_inventory.php?id_inventory=<?php echo $row['id_inventory']; ?>">Update</a>
            <a href="index.php?delete=<?php echo $row['id_inventory']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>  
    <?php endwhile; ?>
</table>
</body>
</html>
<?php
include 'footer.php';
?>