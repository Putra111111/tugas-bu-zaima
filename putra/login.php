<?php
session_start();
include 'koneksi.php'; 

if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM login WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        if ($row['level'] == 'admin') {
            header("Location: ./Admin/dashboard.php");
        } elseif ($row['level'] == 'user') {
            header("Location: ./Userr/dashboard.php");
        }
        exit();
    } else {
        echo "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="container">
        <h2>login</h2>
        <form action="login.php" method="post">
            <label for="username" type="username" class="lab">Username :</label>
            <input type="text" name="username" for="username" placeholder="Example : Putra" require>
            <label for="password" type="password" class="lab">Password :</label>
            <input type="password" name="password" for="username" placeholder="Example : ******" require>
            <input type="submit" value="login">
        </form>
    </div>
</body>
</html>