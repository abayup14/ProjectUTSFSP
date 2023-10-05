<?php 
    require_once("koneksi.php");

    class Cerita extends Koneksi {
        public function __construct() {
            parent::__construct();
        }

        public function getCerita($search="%") {
            $sql = "";
        }

        public function getCeritaLimit($search="%", $start=0, $perpage=10) {
            $sql = "";
        }
    }
?>