<?php 
    session_start();
    require_once("class/users.php");
    require_once("class/cerita.php");

    if (isset($_SESSION)) {
        $iduser = $_SESSION["iduser"];
        $nama = $_SESSION["nama"];
    } else {
        // Handle when session is not set
        // Redirect to login page or perform other actions
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
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        text-align: center;
        margin: 0;
        padding: 0;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        gap: 5px;
    }

    h1 {
        color: #333;
    }

    form {
        background: #fff;
        max-width: 300px;
        margin: 0 auto 10px auto;
        padding: 10px;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    label {
        display: block;
        margin-bottom: 10px;
    }

    input[type="text"] {
        width: 100%;
        padding: 10px 0;
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

    ul {
        list-style-type: none;
        margin: 0;
        padding: 0;
    }

    li {
        display: inline-block;
        background: #0056b3;
        padding: 10px 15px;
        border-radius: 50px;
        margin-right: 5px;
        cursor: pointer;
    }
    li.active{
        background: #007BFF;
        color: #fff;
    }
    
    table {
        width: 70%;
        border-collapse: collapse;
        border: 1px solid #ccc;
        justify-content: center;
    }

    th, td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #ccc;
    }

    th {
        background-color: #007BFF;
        color: #fff;
    }

    .page {
        text-decoration: none;
        color: #fff;
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
    <h1>Selamat datang, <?php echo $nama; ?></h1>
    <form action="homepage.php" method="GET">
        <p>
            <label>Cari Judul</label>
            <input type='text' name='judul' value='<?php echo $judul; ?>'>
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
        echo "<li" . ($p == 1 ? " class='active'" : "") . "><a class='page' href='homepage.php?p=1&judul=$judul'>First</a></li>";

        if ($p != 1){
            $x = $p-1;
            echo "<li><a class='page' href='homepage.php?p=$x&judul=$judul'>Prev</a></li>";
        }
        
        for($i=1;$i<=$jumlah_page;$i++){
            echo "<li" . ($p == $i ? " class='active'" : "") . "><a class='page' href='homepage.php?p=$i&judul=$judul'>$i</a></li>";
        }

        if ($p != $jumlah_page){
            $x = $p+1;
            echo "<li><a class='page' href='homepage.php?p=$x&judul=$judul'>Next</a></li>";
        }
        
        echo "<li" . ($p == $jumlah_page ? " class='active'" : "") . "><a class='page' href='homepage.php?p=$jumlah_page&judul=$judul'>Last</a></li>";
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

