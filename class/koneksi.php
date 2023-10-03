<?php 
    class Koneksi {
        protected $conn;

        public function __construct($host="localhost", $user="root", $pass="", $db="") {
            $this->conn = new mysqli($host, $user, $pass,$db);
        }

        public function __destruct() {
            $this->conn->close();
        }
    }
?>