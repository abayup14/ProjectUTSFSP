<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Website</title>
    <script src="js/jquery-3.7.0.js"></script>
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