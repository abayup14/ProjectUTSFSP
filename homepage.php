<?php 
    session_start();
    require_once("class/users.php");
    require_once("class/cerita.php");

    if (isset($_SESSION)) {
        $iduser = $_SESSION["iduser"];
        $nama = $_SESSION["nama"];
    } else {

    }

    if(isset($_GET["judul"])){
        $judul = $_GET["judul"];
    }
    else{
        $judul = "";
    }

    if (isset($_GET["judul"])) {
        $search = "%".$_GET["judul"]."%";
    } else {
        $search = "%";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kumpulan Cerita</title>
    <script src='js/jquery-3.7.0.js'></script>
</head>
<style>
    li {
            display: inline-block;
            width: 50px;
        }
</style>
<body>
    <h1>Selamat datang, <?php echo $nama; ?></h1>
    <form action="homepage.php" method="GET">
        <p>
            <label>Cari Judul: &nbsp; &nbsp;</label>
            <input type='text' name='judul' value='<?php echo $judul; ?>'> &nbsp; &nbsp; 
            <input type='submit' name='btncari' value='Cari'>
        </p>
    </form>
    <form action="cerita_baru.php" method="GET">
        <p><input type="submit" value="Buat Cerita Baru" name="btnbaru"></p>
    </form>
    
    <?php
        $conn = new mysqli("localhost", "root", "", "project_uts_fsp");

        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Judul</th><th>Pembuat Awal</th><th>Aksi</th>";
        echo "</tr>";

        $cerita = new Cerita();
        $result = $cerita->getCerita($search);

        $perpage = 3;
        $total_data = $result->num_rows;
        $jumlah_page = ceil($total_data / $perpage);

        if(isset($_GET["p"])){
            $p = $_GET["p"];
        }
        else{
            $p = 1;
        }

        if(!is_numeric($p)) $p = 1; 

        echo "<ul>";
        echo "<li><a href='homepage.php?p=1&judul=$judul'>First</li>";

        if ($p != 1){
            $x = $p-1;
            echo "<li><a href='homepage.php?p=$x&judul=$judul'>Prev</li>";
        }
        
        for($i=1;$i<=$jumlah_page;$i++){
            echo "<li><a href='homepage.php?p=$i&judul=$judul'>$i</li>";
        }

        if ($p != $jumlah_page){
            $x = $p+1;
            echo "<li><a href='homepage.php?p=$x&judul=$judul'>Next</li>";
        }
        
        echo "<li><a href='homepage.php?p=$jumlah_page&judul=$judul'>Last</li>";
        echo "</ul>";

        $start = ($p-1) * $perpage;
        $result = $cerita->getCeritaLimit($search, $start, $perpage);
    
        while ($row = $result->fetch_assoc()) {
            $id_cerita = $row["idcerita"];
            echo "<tr>";
            echo "<td>".$row["judul"]."</td>";
            echo "<td>".$row["nama"]."</td>";
            echo "<td><a href='lihat_cerita.php?idcerita=$id_cerita'>Lihat Cerita</a></td>";
            echo "</tr>";
        }

        echo "</table>";

        $conn->close();
    ?>
    <p><a href="logout.php">Logout dari Website</a></p>
</body>
</html>