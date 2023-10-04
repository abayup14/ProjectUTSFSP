<?php 
    class Koneksi {
        protected $conn;

        public function __construct() {
            $this->conn = new mysqli("localhost", "root", "", "project_uts_fsp");
        }

        public function __destruct() {
            $this->conn->close();
        }
    }
?>