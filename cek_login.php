<?php
    session_start();
    echo "<script src='js/jquery-3.7.0.js'></script>";
    require_once("class/users.php");

    if (isset($_POST["btnLogin"])) {
        $iduser = htmlentities(strip_tags($_POST["txtusername"]));
        $password = $_POST["txtpassword"];

        $users = new Users();
        $result = $users->getUser($iduser);

        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            if (isset($_SESSION["iduser"])) {
                $_SESSION["iduser"] = $user["iduser"];
            } 
            header("location: homepage.php");
        } else {
            header("location: index.php?code=false");
        }
    }

    
?>