<?php
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "stok");

if(!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query = "DELETE FROM storage WHERE id_storage='$id'";
    mysqli_query($conn, $delete_query);
    header("Location: storage.php");
    exit();
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
<a href="create_storage.php">Create</a>
<table border="1" class="gup">
    <tr>
        <th>ID</th>
        <th>Nama gudang</th>
        <th>Lokasi</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id_storage']; ?></td>
        <td><?php echo $row['Nama_gudang']; ?></td>
        <td><?php echo $row['Lokasi']; ?></td>
       
        <td>
            <a href="update_storage.php?id_storage=<?php echo $row['id_storage']; ?>">Update</a>
            <a href="vendor.php?delete=<?php echo $row['id_storage']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
<?php
include 'footer.php';
?>