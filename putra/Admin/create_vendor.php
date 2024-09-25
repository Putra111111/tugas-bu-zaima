<?php
$conn = mysqli_connect("localhost","root","","stok");

if(!$conn){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id_vendor']) || empty($_POST['Nama']) || empty($_POST['Kontak']) || empty($_POST['Nama_barang'])) {
    } else {
        $id_vendor = $_POST['id_vendor'];
        $Nama = $_POST['Nama'];
        $Kontak = $_POST['Kontak'];
        $Nama_barang = $_POST['Nama_barang'];

        $sql_check = "SELECT * FROM vendor WHERE id_vendor='$id_vendor'";
        $result_check = $conn->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            echo "No Seri sudah ada, gunakan yang lain.";
        } else {
            $sql = "INSERT INTO vendor (id_vendor, Nama, Kontak, Nama_barang)
                    VALUES ('$id_vendor', '$Nama', '$Kontak', '$Nama_barang')";

            if ($conn->query($sql) === TRUE) {
                header("Location: vendor.php");
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
        <h2>Create Vendor</h2>
        <form action="create_vendor.php" method="POST">
            <label>No Vendor :</label>
            <input type="text" name="id_vendor" required>
            <label>Nama :</label>
            <input type="text" name="Nama" required>
            <label>Kontak :</label>
            <input type="text" name="Kontak" required>
            <label>Nama_barang :</label>
            <input type="text" name="Nama_barang" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
