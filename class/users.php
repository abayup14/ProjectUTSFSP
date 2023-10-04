<?php 
    require_once("koneksi.php");

    class Users extends Koneksi {
        public function __construct() {
            parent::__construct();
        }

        public function getUser($iduser = "%") {
            $sql = "SELECT * FROM users WHERE iduser LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $iduser);
            $stmt->execute();
            $res = $stmt->get_result();

            return $res;
        }
    }
?>