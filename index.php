<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Website</title>
</head>
<body>
    <h1>Login Untuk Membaca Cerita</h1>
    <form action="index.php" method="POST" enctype="multipart/form-data">
        <p><label>Username : <input type="text" name="username" id="username"></label></p>
        <p><label>Password : <input type="password" name="password" id="password"></label></p>
        <p><input type="submit" value="LOGIN" name="btnsub" id="submit"></p>
    </form>
</body>
<script src="js/jquery-3.7.0.js"></script>
<?php
    if (isset($_POST["btnsub"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        if ($username == "bayu" && $password == "1234") {
            echo "<script>alert('Login Berhasil')</script>";
            header("location: home.php");
        } else {
            echo "<script>alert('Login gagal')</script>";
        }
    }
?>
</html>