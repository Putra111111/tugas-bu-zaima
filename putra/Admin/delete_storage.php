<?php
include "koneksi.php";
    $id_storage = $_GET['id'];

    $sql = "DELETE FROM storage WHERE id_storage='$id_storage'";
    
    if ($konn ->query($sql) === TRUE) {
        echo "Data Berhasil Dihapus";
        header("Location: dashboard.php");
    } else {
        echo "Error updating record: " . $kon->error;
    }

    $kon->close();
?>

