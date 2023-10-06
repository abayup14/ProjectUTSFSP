<?php
    session_start();
    require_once("class/users.php");
    require_once("class/cerita.php");
    
    $conn = new mysqli("localhost", "root", "", "project_uts_fsp");

    $iduser = "";
    $id_cerita = "";
    $judul = 0;

    if (isset($_SESSION["iduser"])) {
        $iduser = $_SESSION["iduser"];
    }

    if (isset($_GET["idcerita"])) {
        $id_cerita = $_GET["idcerita"];
    }

    $cerita = new Cerita();
    $result = $cerita->getJudul($id_cerita);

    if ($row = $result->fetch_assoc()) {
        $judul = $row["judul"];
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca <?php echo $judul; ?></title>
    <script src='js/jquery-3.7.0.js'></script>
</head>
<body>
    <?php 
        $result = $cerita->getAllParagraf($id_cerita);

        echo "<h1>$judul</h1>";
        while ($row = $result->fetch_assoc()) {
            echo "<p>".$row["isi_paragraf"]."</p>";
        }
    ?>
    <p>Tambah Paragraf:</p>
    <form action="lihat_cerita.php" method="post">
        <p><textarea name="txttambahparagraf" id="" cols="30" rows="10"></textarea></p>
        <input type="hidden" name="id_cerita_baru" value="<?php echo $id_cerita; ?>">
        <p><input type="submit" value="Simpan" name="btnsimpan"></p>
    </form>
    <?php 
        if (isset($_POST["btnsimpan"])) {
            $paragraf_baru = htmlentities(strip_tags($_POST["txttambahparagraf"]));
            $id_cerita_baru = $_POST["id_cerita_baru"];

            $add_paragraf = $cerita->insertParagraf($iduser, $id_cerita_baru, $paragraf_baru);

            if ($add_paragraf == true) {
                header("location: lihat_cerita.php?idcerita=$id_cerita_baru");
            } else {
                echo "<script>alert('Gagal menambahkan paragraf')</script>";
            }
        }
    ?>
    <p><a href="homepage.php">Kembali ke Halaman Awal</a></p>
</body>
</html>