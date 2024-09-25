<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="tabel.css">
</head>
<body>
   
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Kontak</th>
            <th>Nama_barang</th>
             <th>Action</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Putra</td>
            <td>089668022779</td>
            <td>Oreo</td>
             <td><a href="edit.php">EDIT</a><a href="proses_tambah_inventory.php">CREATE</a><button>Delete</button></td>
        </tr>
        <tr>
            <td>2</td>
            <td>Sigit</td>
            <td>123456789</td>
            <td>Doritos</td     >
            <td><a href="edit.php">EDIT</a><a href="edit.php">CREATE</a><button>Delete</button></td>

        </tr>
    </table>
</body>
</html>
<?php
include 'footer.php';
?>