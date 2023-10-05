<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Baca Cerita</title>
    <script src="js/jquery-3.7.0.js"></script>
</head>
<body>
    <?php
        if (isset($_SESSION["iduser"])) {
            $iduser = $_SESSION["iduser"];
        }

        echo $iduser;
        
        if (isset($_GET["txtjudul"])) {
            $judul = $_GET["txtjudul"];
        } else {
            $judul = "";
        }
        echo "<h1>Selamat datang</h1>";
        echo "<form action='homepage.php' method='GET'>";
        echo "<p>";
        echo "<label>Cari Judul: &nbsp; &nbsp;</label>";
        echo "<input type='text' name='txtjudul', value='$judul'> &nbsp; &nbsp; ";
        echo "<input type='submit' name='btncari' value='Cari'>";
        echo "</p>";
        echo "</form>";
        echo "<br>";
        echo "<form action='cerita_baru.php' method='POST'>";
        echo "<input type='submit' value='Buat Cerita Baru' name='btnbaru'>";
        echo "<input type='hidden' value='".$iduser."' name='iduser'>";
        echo "</form>";
    ?>
</body>
</html>