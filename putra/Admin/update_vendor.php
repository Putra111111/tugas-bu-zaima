<?php
$conn = mysqli_connect("localhost","root","","stok");

if(!$conn){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}


if (isset($_GET['id_vendor'])) {
    $id_vendor = $_GET['id_vendor'];

    $sql = "SELECT * FROM vendor WHERE id_vendor = '$id_vendor'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_vendor = $_POST['id_vendor'];
    $Nama = $_POST['Nama'];
    $Kontak = $_POST['Kontak'];
    $Nama_barang = $_POST['Nama_barang'];
   

    $sql_update = "UPDATE vendor SET Nama='$Nama', Kontak='$Kontak', Nama_barang='$Nama_barang' WHERE id_vendor='$id_vendor'";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: vendor.php"); 
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
        <h2>Update vendor</h2>
        <form action="update_vendor.php" method="POST">
            <input type="hidden" name="id_vendor" value="<?php echo $row['id_vendor']; ?>" >
            <label>Nama :</label>
            <input type="text" name="Nama" value="<?php echo $row['Nama']; ?>" required>
            <label>Kontak :</label>
            <input type="text" name="Kontak" value="<?php echo $row['Kontak']; ?>" required>
            <label>Nama_barang :</label>
            <input type="text" name="Nama_barang" value="<?php echo $row['Nama_barang']; ?>" required>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>