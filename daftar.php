<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Website</title>
    <script src="js/jquery-3.7.0.js"></script>
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
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
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
</head>
<body>
    <h1>Daftarkan Akun Anda Disini</h1>
    <form action="daftar.php" method="post">
        <p><label for="">Username: <input type="text" name="username" id="" required></label></p>
        <p><label for="">Nama: <input type="text" name="nama" id="" required></label></p>
        <p><label for="">Password: <input type="password" name="pass" id="" required></label></p>
        <p><label for="">Konfirmasi Password: <input type="password" name="konfpass" id="" required></label></p>
        <p><input type="submit" value="DAFTAR" name="btndaftar"></p>
    </form>
    <p><a href="index.php">Login Akun Anda</a></p>
    <?php
        if (isset($_POST["btndaftar"])) {
            $conn = new mysqli("localhost", "root", "", "project_uts_fsp");

            require_once("class/users.php");

            $iduser = htmlentities(strip_tags($_POST["username"]));
            $nama = htmlentities(strip_tags($_POST["nama"]));
            $pass = $_POST["pass"];
            $konfpass = $_POST["konfpass"];

            if ($pass === $konfpass) {
                $salt = str_shuffle("HdnPrkStvI");
                $md5pass = md5($pass);
                $combinepass = $md5pass.$salt;
                $finalpass = md5($combinepass);

                $user = new Users();
                $can_insert = $user->insertUser($iduser, $nama, $finalpass, $salt);

                if ($can_insert == true) {
                    echo "<script>alert('Berhasil tambah data. Silahkan login menggunakan username dan password.')</script>";
                } else {
                    echo "<script>alert('Gagal tambah data. Gunakan username lain.')</script>";
                }
            } else {
                echo "<script>alert('Konfirmasi password tidak sama dengan password. Ulangi lagi.')</script>";
            }

            $conn->close();
        }
    ?>
</body>
</html>