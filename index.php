<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Website</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    h1 {
        color: #333;
    }

    form {
        background: #fff;
        max-width: 300px;
        margin: 0 auto;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }
    
    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px 0px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        border-radius: 5px; */
    }

    input[type="submit"] {
        background: #007BFF;
        color: #fff;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background: #0056b3;
    }

    a {
        text-decoration: none;
        color: #007BFF;
    }

    a:hover {
        color: #0056b3;
    }
    </style>

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