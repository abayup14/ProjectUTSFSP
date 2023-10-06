<?php 
    require_once("koneksi.php");

    class Cerita extends Koneksi {
        public function __construct() {
            parent::__construct();
        }

        public function insertCerita($judul="", $iduser_pembuat_awal="") {
            $id_cerita = 0;

            $sql = "INSERT INTO cerita(judul, iduser_pembuat_awal) VALUES (?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("ss", $judul, $iduser_pembuat_awal);
            $stmt->execute();

            if (!($stmt->error)) {
                $id_cerita = $stmt->insert_id;
            }

            return $id_cerita;
        }

        public function insertParagraf($iduser="", $idcerita="", $paragraf="") {
            $status = false;

            $sql = "INSERT INTO paragraf(iduser, idcerita, isi_paragraf) VALUES(?, ?, ?)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sis", $iduser, $idcerita, $paragraf);
            $stmt->execute();

            if (!($stmt->error)) {
                $status = true;
            }

            return $status;
        }

        public function getCerita($search="%") {
            $sql = "SELECT * FROM cerita c INNER JOIN users u ON c.iduser_pembuat_awal=u.iduser WHERE judul LIKE ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("s", $search);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

        public function getCeritaLimit($search="%", $start=0, $perpage=10) {
            $sql = "SELECT * FROM cerita c INNER JOIN users u ON c.iduser_pembuat_awal=u.iduser WHERE judul LIKE ? LIMIT ?, ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("sii", $search, $start, $perpage);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

        public function getJudul($iduser="") {
            $sql = "SELECT judul FROM cerita where idcerita = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $iduser);
            $stmt->execute();
            $result = $stmt->get_result();

            return $result;
        }

        public function getAllParagraf($id_cerita="") {
            $sql = "SELECT * from paragraf p WHERE p.idcerita = ?";
            $stmt = $this->conn->prepare($sql);
            $stmt->bind_param("i", $id_cerita);
            $stmt->execute();
            $res = $stmt->get_result();

            return $res;
        }
    }
?>