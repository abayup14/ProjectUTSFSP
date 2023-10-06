<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Website</title>
    <script src="js/jquery-3.7.0.js"></script>
</head>
<body>
    <h1>Login Untuk Membaca Cerita</h1>
    <form action="index.php" method="POST">
        <p><label>Username : </label><input type="text" name="txtusername" id="username" required></p>
        <p><label>Password : </label><input type="password" name="txtpassword" id="password" required></p>
        <p><input type="submit" value="LOGIN" name="btnlogin" id="login"></p>
    </form>
    <p><a href="daftar.php">Daftarkan Akun Anda</a></p>
    <?php
        require_once("class/users.php");

        if (isset($_GET["code"])) {
            $action = $_GET["code"];
        } else {
            $action = "";
        }

        if ($action === "logout") {
            echo "<script>alert('Logout berhasil')</script>";
        }

        if (isset($_POST["btnlogin"])) {
            $conn = new mysqli("localhost", "root", "", "project_uts_fsp");

            $iduser = htmlentities(strip_tags($_POST["txtusername"]));
            $password = $_POST["txtpassword"];

            $users = new Users();
            $result = $users->getUser($iduser);

            if ($row = $result->fetch_assoc()) {
                $salt = $row["salt"];
                $md5pass = md5($password);
                $combinedpass = $md5pass.$salt;
                $finalpass = md5($combinedpass);

                if ($row["password"] === $finalpass) {
                    $_SESSION["iduser"] = $row["iduser"];
                    $_SESSION["nama"] = $row["nama"];
                    header("location: homepage.php");
                } else {
                    echo "<script>alert('Password Salah. Masukkan password yang benar')</script>";
                }
            } else {
                echo "<script>alert('Gagal Login. Masukkan username dan password yang benar')</script>";
            }

            $conn->close();
        }
    ?>
</body>
</html>