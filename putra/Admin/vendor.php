<?php
include 'header.php';
$conn = mysqli_connect("localhost", "root", "", "stok");

if(!$conn) {
    die ("Connection failed: " . mysqli_connect_error());
}


if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $delete_query = "DELETE FROM vendor WHERE id_vendor='$id'";
    mysqli_query($conn, $delete_query);
    header("Location: vendor.php");
    exit();
}

$result = mysqli_query($conn, "SELECT * FROM vendor");
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
<a href="create_vendor.php">Create</a>
<table border="1" class="gup">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Kontak</th>
        <th>Nama barang</th>
        <th>Action</th>
    </tr>
    <?php while($row = mysqli_fetch_assoc($result)): ?>
    <tr>
        <td><?php echo $row['id_vendor']; ?></td>
        <td><?php echo $row['Nama']; ?></td>
        <td><?php echo $row['Kontak']; ?></td>
        <td><?php echo $row['Nama_barang']; ?></td>
        <td>
            <a href="update_vendor.php?id_vendor=<?php echo $row['id_vendor']; ?>">Update</a>
            <a href="vendor.php?delete=<?php echo $row['id_vendor']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>
</table>
</body>
</html>
<?php
include 'footer.php';
?>