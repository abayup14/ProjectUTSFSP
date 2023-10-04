<?php 
    require_once("class/users.php");

    if (isset($_POST["username"])) {
        $iduser = "'".$_POST["txtusername"]."'";
    } else {
        $iduser = "";
    }

    if (isset($_POST["password"])) {
        $password = $_POST["txtpassword"];
    } else {
        $password = "";
    }

    $users = new Users();
    $res = $users->getUser($iduser);

    $row = $res->fetch_assoc();
    echo $row["iduser"];
    echo $row["nama"];
?>