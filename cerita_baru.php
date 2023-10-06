<?php 
    session_start();
    require_once("class/users.php");
    require_once("class/cerita.php");

    $iduser = "";

    if (isset($_SESSION["iduser"])) {
        $iduser = $_SESSION["iduser"];
    } else {
        
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Cerita Baru</title>
    <script src='js/jquery-3.7.0.js'></script>
</head>
<body>
    <form action='cerita_baru.php' method='POST'>
        <p><label>Judul: <input type='text' name='txtjudul' required></label></p>
        <p><label>Paragraf 1 : <textarea name="txtparagraf1" id="" cols="30" rows="10"></textarea></label></p>
        <p><input type='submit' name='btnsimpan' value='Simpan'></p>
    </form>
    <a href="homepage.php">Kembali ke Halaman Awal</a>
    <?php 
        if (isset($_POST["btnsimpan"])) {
            $conn = new mysqli("localhost", "root", "", "project_uts_fsp");

            $judul = htmlentities(strip_tags($_POST["txtjudul"]));
            $paragraf1 = htmlentities(strip_tags($_POST["txtparagraf1"]));

            $cerita = new Cerita();
            $id_cerita = $cerita->insertCerita($judul, $iduser);

            $teks_alert = "";

            if ($id_cerita > 0) {
                $add_paragraf = $cerita->insertParagraf($iduser, $id_cerita, $paragraf1);

                if ($add_paragraf == true) {
                    echo "<script>alert('Berhasil menambah cerita dan berhasil menambah paragraf')</script>";
                } else {
                    echo "<script>alert('Berhasil menambah cerita namun gagal menambah paragraf')</script>";
                }
            } else {
                echo "<script>alert('Gagal menambah cerita')</script>";
            }

            $conn->close();
        }
    ?>
</body>
</html>
