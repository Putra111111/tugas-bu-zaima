<?php
$conn = mysqli_connect("localhost","root","","stok");

if(!$conn){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}


if (isset($_GET['id_inventory'])) {
    $id_inventory = $_GET['id_inventory'];

    $sql = "SELECT * FROM inventory WHERE id_inventory = '$id_inventory'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); 
    } else {
        echo "Data tidak ditemukan!";
        exit;
    }
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_inventory = $_POST['id_inventory'];
    $Nama_barang = $_POST['Nama_barang'];
    $Jenis_barang = $_POST['Jenis_barang'];
    $Kuantitas_stoK = $_POST['kuantitas_stok'];
    $Lokasi = $_POST['Lokasi_gudang'];

    $sql_update = "UPDATE inventory SET Nama_barang='$Nama_barang', Jenis_barang='$Jenis_barang', Kuantitas_stok='$Kuantitas_stok', Lokasi_gudang='$lokasi' WHERE id_inventory='$id_inventory'";

    if ($conn->query($sql_update) === TRUE) {
        header("Location: inventory.php"); 
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
        <form action="update_inventory.php" method="POST">
            <input type="hidden" name="id_inventory" value="<?php echo $row['id_inventory']; ?>">
            <label>Nama Barang :</label>
            <input type="text" name="Nama_barang" value="<?php echo $row['Nama_barang']; ?>" required>
            <label>Jenis Barang :</label>
            <input type="text" name="Jenis_barang" value="<?php echo $row['Jenis_barang']; ?>" required>
            <label>Kuantitas Stok :</label>
            <input type="number" name="Kuantitas_stok" value="<?php echo $row['Kuantitas_stok']; ?>" required>
            <label>Lokasi :</label>
            <input type="text" name="Lokasi_gudang" value="<?php echo $row['Lokasi_gudang']; ?>" required> 
            <label>Serial_number :</label>
            <input type="text" name="Serial_number" value="<?php echo $row['Serial_number']; ?>" required> 
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>