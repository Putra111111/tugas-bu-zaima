<?php
$conn = mysqli_connect("localhost","root","","stok");

if(!$conn){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id_inventory']) || empty($_POST['Nama_barang']) || empty($_POST['Jenis_barang']) || empty($_POST['Kuantitas_stok']) || empty($_POST['Lokasi_gudang']) || empty($_POST['Serial_number'])) {
    } else {
        $id_inventory = $_POST['id_inventory'];
        $Nama_barang = $_POST['Nama_barang'];
        $Jenis_barang = $_POST['Jenis_barang'];
        $Kuantitas_stok = $_POST['Kuantitas_stok'];
        $Lokasi_gudang = $_POST['Lokasi_gudang'];
        $Serial_number = $_POST['Serial_number'];

        $sql_check = "SELECT * FROM inventory WHERE id_inventory='$id_inventory'";
        $result_check = $conn->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            echo "No Seri sudah ada, gunakan yang lain.";
        } else {
            $sql = "INSERT INTO inventory (id_inventory, Nama_barang, Jenis_barang, Kuantitas_stok, Lokasi_gudang, Serial_number)
                    VALUES ('$id_inventory', '$Nama_barang', '$Jenis_barang', '$Kuantitas_stok','$Lokasi_gudang', '$Serial_number')";

            if ($conn->query($sql) === TRUE) {
                header("Location: inventory.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
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
    <div class="create-container">
        <h2>Create inventory</h2>
        <form action="create_inventory.php" method="POST">
            <label>No inventory :</label>
            <input type="text" name="id_inventory" required>
            <label>Nama barang</label>
            <input type="text" name="Nama_barang" required>
            <label>jenis barang :</label>
            <input type="text" name="Jenis_barang" required>
            <label>kuantitas stok :</label>
            <input type="text" name="Kuantitas_stok" required>
            <label>lokasi gudang:</label>
            <input type="text" name="Lokasi_gudang" required>
            <label>serial number :</label>
            <input type="text" name="Serial_number" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
