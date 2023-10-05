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
    <title>Buat Cerita Baru</title>
    <script src='js/jquery-3.7.0.js'></script>
</head>
<body>
    <?php
        if (isset($_SESSION["iduser"])) {
            $iduser = $_SESSION["iduser"];
        } 
        echo $iduser;

        echo "<form action='homepage.php' method='POST'>";
        echo "<p><label>Judul: </label>";
        echo "<input type='text' name='txtjudul'><br>";
        echo "</p>";
        echo "<p>";
        echo "<label>Paragraf 1 : </label>";
        echo "<input type='textarea' name='txtparagraf1'>";
        echo "</p>";
        echo "<p>";
        echo "<input type='submit' name='btnsimpan' value='Simpan'>";
        echo "</form>";
        echo "</p>";
    ?>
</body>
</html>
