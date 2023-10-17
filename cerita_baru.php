<?php 
    session_start();
    require_once("class/users.php");
    require_once("class/cerita.php");

    $iduser = "";

    if (!isset($_SESSION["iduser"])) {
        $domain= $_SERVER['HTTP_HOST'];
        $uri = $_SERVER['REQUEST_URI']; 
        $url = "http://".$domain.$uri;
        header("location: index.php?redirect=$url");
    } else {
        $iduser = $_SESSION["iduser"];
    }

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Cerita Baru</title>
    <script src='js/jquery-3.7.0.js'></script>
    <style>
        body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
        margin: 0;
        padding: 0;
    }

    form {
        background: #fff;
        max-width: 500px;
        margin: 0 auto 10px auto;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"], textarea {
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
    <form action='cerita_baru.php' method='POST'>
        <label for="judul">Judul</label>
        <p><input type='text' name='txtjudul' required id="judul"></p>
        <label for="paragraf">Paragraf 1</label>
        <p><textarea name="txtparagraf1" id="paragraf" cols="30" rows="10"></textarea></p>
        <p><input type='submit' name='btnsimpan' value='Simpan'></p>
    </form>
    <a href="homepage.php">Kembali ke Halaman Awal</a>
</body>
</html>
