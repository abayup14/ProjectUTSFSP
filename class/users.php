<?php 
    require_once("koneksi.php");

    class Users extends Koneksi {
        public function __construct() {
            parent::__construct();
        }

        public function insertUser($iduser="", $nama="", $pass="", $salt="") {
            $status = false;

            $sql = "INSERT into users VALUES(?, ?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ssss", $iduser, $nama, $pass, $salt);
            $stmt->execute();

            if (!($stmt->error)) {
                $status = true;
            }

            return $status;
        }

        public function getUser($iduser = "") {
            $sql = "SELECT * FROM users WHERE iduser = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $iduser);
            $stmt->execute();
            $res = $stmt->get_result();

            return $res;
        }
    }
?>