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

        p {
            margin: 10px 0;
        }

        form {
            background: #fff;
            max-width: 500px;
            margin: 0 auto;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        textarea {
            width: 80%;
            padding: 10px;
            margin: 10px 0;
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