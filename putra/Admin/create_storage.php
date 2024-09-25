<?php
$conn = mysqli_connect("localhost","root","","stok");

if(!$conn){
    die ("koneksi gagal". mysqli_connect_error(). mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST['id_storage']) || empty($_POST['Nama_gudang']) || empty($_POST['Lokasi'])) {
    } else {
        $id_storage = $_POST['id_storage'];
        $Nama_gudang = $_POST['Nama_gudang'];
        $Lokasi = $_POST['Lokasi'];

        $sql_check = "SELECT * FROM storage WHERE id_storage='$id_storage'";
        $result_check = $conn->query($sql_check);
        
        if ($result_check->num_rows > 0) {
            echo "No Seri sudah ada, gunakan yang lain.";
        } else {
            $sql = "INSERT INTO storage (id_storage, Nama_gudang, Lokasi)
                    VALUES ('$id_storage', '$Nama_gudang', '$Lokasi')";

            if ($conn->query($sql) === TRUE) {
                header("Location: storage.php");
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
        <h2>Create Storage</h2>
        <form action="create_storage.php" method="POST">
            <label>No Gudang :</label>
            <input type="text" name="id_storage" required>
            <label>Nama Gudang :</label>
            <input type="text" name="Nama_gudang" required>
            <label>Lokasi Gudang :</label>
            <input type="text" name="Lokasi" required>
            <button type="submit">Create</button>
        </form>
    </div>
</body>
</html>
