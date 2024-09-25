<?php
$conn = mysqli_connect("localhost","root","","stok");

if(!$conn){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}


if (isset($_GET['id_storage'])) {
    $id_storage = $_GET['id_storage'];

    $sql = "SELECT * FROM storage WHERE id_storage = '$id_storage'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_storage = $_POST['id_storage'];
    $Nama_gudang = $_POST['Nama_gudang'];
    $Lokasi = $_POST['Lokasi'];
   

    $sql_update = "UPDATE storage SET Nama_gudang='$Nama_gudang', Lokasi='$Lokasi' WHERE id_storage='$id_storage'";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: storage.php"); 
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="CRUD.css">
</head>
<body>
    <div class="update-container">
        <h2>Update Inventory</h2>
        <form action="update_storage.php" method="POST">
            <input type="hidden" name="id_storage" value="<?php echo $row['id_storage']; ?>">
            <label>Nama Barang :</label>
            <input type="text" name="Nama_gudang" value="<?php echo $row['Nama_gudang']; ?>" required>
            <label>Jenis Barang :</label>
            <input type="text" name="Lokasi" value="<?php echo $row['Lokasi']; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>