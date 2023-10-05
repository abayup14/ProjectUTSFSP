<?php 
    session_start();
    require_once("class/users.php");
    require_once("class/cerita.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulan Cerita</title>
    <script src='js/jquery-3.7.0.js'></script>
</head>
<body>
    <?php
        if (isset($_SESSION["iduser"])) {
            $iduser = $_SESSION["iduser"];
        }

        echo $iduser;
        
        if (isset($_GET["judul"])) {
            $judul = $_GET["judul"];
        } else {
            $judul = "";
        }

        echo "<h1>Selamat datang</h1>";
        echo "<form action='homepage.php' method='GET'>";
        echo "<p>";
        echo "<label>Cari Judul: &nbsp; &nbsp;</label>";
        echo "<input type='text' name='judul', value='$judul'> &nbsp; &nbsp; ";
        echo "<input type='submit' name='btncari' value='Cari'>";
        echo "</p>";
        echo "<p><input type='submit' value='Buat Cerita Baru' name='btnbaru'></p>";
        echo "</form>";

        echo "<br>";
        
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Judul</th><th>Pembuat Awal</th><th>Aksi</th>";
        echo "</tr>";
        echo "</table>";
    ?>
</body>
</html>