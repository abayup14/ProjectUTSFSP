-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: project_uts_fsp
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cerita`
--

DROP TABLE IF EXISTS `cerita`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cerita` (
  `idcerita` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(100) DEFAULT NULL,
  `iduser_pembuat_awal` varchar(40) NOT NULL,
  PRIMARY KEY (`idcerita`),
  KEY `fk_cerita_users_idx` (`iduser_pembuat_awal`),
  CONSTRAINT `fk_cerita_users` FOREIGN KEY (`iduser_pembuat_awal`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cerita`
--

LOCK TABLES `cerita` WRITE;
/*!40000 ALTER TABLE `cerita` DISABLE KEYS */;
INSERT INTO `cerita` VALUES (1,'Rahasia di Bawah Cahaya Rembulan','160421001'),(2,'Jejak-jejak Harapan','160421058'),(3,'Bayangan di Balik Senyuman','160421072'),(4,'Melodi Senja di Antara Jingga','160421001'),(5,'Bayang-Bayang Waktu di Kota Terlupakan','160421058'),(6,'Serenade Bintang di Negeri Awan','160421072');
/*!40000 ALTER TABLE `cerita` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paragraf`
--

DROP TABLE IF EXISTS `paragraf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paragraf` (
  `idparagraf` int(11) NOT NULL AUTO_INCREMENT,
  `iduser` varchar(40) NOT NULL,
  `idcerita` int(11) NOT NULL,
  `isi_paragraf` varchar(1000) DEFAULT NULL,
  `tanggal_buat` timestamp NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idparagraf`),
  KEY `fk_paragraf_users1_idx` (`iduser`),
  KEY `fk_paragraf_cerita1_idx` (`idcerita`),
  CONSTRAINT `fk_paragraf_cerita1` FOREIGN KEY (`idcerita`) REFERENCES `cerita` (`idcerita`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_paragraf_users1` FOREIGN KEY (`iduser`) REFERENCES `users` (`iduser`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paragraf`
--

LOCK TABLES `paragraf` WRITE;
/*!40000 ALTER TABLE `paragraf` DISABLE KEYS */;
INSERT INTO `paragraf` VALUES (1,'160421001',1,'Di sebuah kota pelabuhan tua yang dikelilingi oleh cerita-cerita mistis, hiduplah Damar, seorang pemuda yang penuh rasa penasaran. Ketika malam datang, bulan purnama menerangi kota dengan cahayanya yang lembut, dan di bawah cahaya rembulan itulah tersembunyi rahasia-rahasia kuno yang melibatkan keluarga Damar. Dalam pencariannya untuk mengungkap misteri yang melingkupi keluarganya, Damar merenungi legenda-legenda setempat, mitos-mitos kuno, dan perjumpaan-perjumpaan tak terduga yang membawanya ke dalam dunia yang gelap dan menarik. Akankah Damar berhasil mengungkap rahasia di bawah cahaya rembulan yang misterius tersebut?','2023-10-14 06:55:35'),(2,'160421058',2,'Di desa kecil yang dikepung oleh perbukitan hijau, tinggal lah Rani, seorang gadis desa yang bercita-cita tinggi. Di dalam hatinya terdapat jejak-jejak harapan yang tumbuh subur, meskipun desa itu sendiri terpuruk dalam kemiskinan dan keterbatasan. Rani memiliki impian untuk merubah takdir desanya melalui kecerdasan dan tekadnya yang bulat. Namun, apakah harapan-harapan itu dapat bertahan di tengah kerasnya realitas dan rintangan hidup di desa yang penuh dengan kejutan tak terduga?','2023-10-14 06:59:49'),(3,'160421058',1,'Damar terus menyusuri lorong-lorong kota pelabuhan yang penuh misteri, menemui petunjuk-petunjuk tersembunyi di antara riwayat keluarganya. Setiap langkah membawanya lebih dalam ke dalam pusaran rahasia, dan Damar menyadari bahwa kebenaran sering kali lebih kompleks daripada yang terlihat di permukaan. Di bawah cahaya rembulan yang mengambang, Damar menemukan konspirasi kuno yang melibatkan keluarganya dan menyadari bahwa ia harus memilih antara memutuskan warisan keluarganya atau mengejar nasibnya yang sendiri.','2023-10-14 07:00:02'),(4,'160421072',3,'Di tengah hiruk-pikuk kota Jakarta yang gemerlap, terselip cerita tentang Maya, seorang wanita muda dengan senyumnya yang selalu berseri. Namun, di balik kebahagiaan yang terpancar dari wajahnya, Maya menyimpan bayangan yang kelam. Kehidupannya yang tampak sempurna tergores oleh rahasia kelam dari masa lalu yang ingin ia kubur. Kini, perjalanan hidupnya menjadi seperti perburuan bayangan, dan senyumnya menjadi tirai yang menutupi kisah kelamnya. Apakah Maya akan berhasil menghadapi bayangan di balik senyumnya dan menemukan cahaya kebenaran?','2023-10-14 07:01:03'),(5,'160421072',2,'Rani terus berusaha menggapai harapannya, namun desa yang terisolasi membawa tantangan besar. Dia memutuskan untuk memimpin perubahan dengan membangun jembatan antara desa dan dunia luar. Dalam perjalanannya, Rani menghadapi perlawanan keras dari orang-orang yang takut akan perubahan. Namun, dengan tekadnya yang kuat dan dukungan dari teman-temannya, Rani mulai merajut jejak-jejak harapan yang memungkinkan desanya untuk bersinar dalam sinar kemajuan.','2023-10-14 07:01:16'),(6,'160421001',3,'Maya merasa beban bayangan masa lalu semakin berat, dan dia memutuskan untuk menyelusuri jejak-jejak yang terkubur dalam ingatannya. Perjalanan itu membawanya ke kisah-kisah kelam yang perlahan terungkap, memaksa Maya untuk menghadapi kebenaran yang sulit diterima. Dalam perjalanan pencarian diri ini, Maya menemui pertemanan yang tak terduga dan membangun kekuatan untuk mengatasi bayang-bayang yang selama ini menghantuinya.','2023-10-14 07:01:42'),(7,'160421001',4,'Di desa terpencil di perbukitan, hidup seorang seniman bernama Arya yang terobsesi dengan melodi senja yang terdengar di antara dedaunan jingga. Ia berkelana melintasi hutan dan sungai, mencari sumber melodi misterius itu yang dianggapnya sebagai kunci kebahagiaan sejati. Namun, semakin dekat Arya mendekati tujuannya, semakin jauh melodi itu bersembunyi. Dalam perjalanan pencariannya, Arya menemui pertemuan yang tak terduga dan menemukan makna sejati dari melodi senja yang selama ini memikat hatinya.','2023-10-14 07:03:13'),(8,'160421001',4,'Meski melodi senja masih menggantung di udara, Arya terus menjelajah tanah-tanah yang belum dijelajahi, berharap menemukan sumber keajaiban yang menginspirasinya. Setiap langkah yang diambilnya membawanya lebih dekat pada rahasia melodi yang menuntunnya ke dalam keindahan yang tak terduga. Di ujung perjalanan, Arya menemukan bahwa melodi sejati yang dicarinya tidak hanya terletak dalam suara, tetapi juga dalam kehidupan sehari-hari yang penuh warna dan kebahagiaan.','2023-10-14 07:03:29'),(9,'160421058',5,'Kota tua yang telah dilupakan oleh sejarah menyimpan bayang-bayang waktu yang terlupakan. Di tengah reruntuhan bangunan bersejarah, hidup seorang arkeolog bernama Maya yang tertarik pada misteri kota tersebut. Ditemani oleh catatan-catatan kuno dan petunjuk-petunjuk yang terlupakan, Maya berusaha menggali dan memahami kisah-kisah yang telah terkubur. Namun, semakin dalam ia menyelidiki, semakin jelas bahwa bayang-bayang waktu membawa cerita yang tak terduga dan membingungkan.','2023-10-14 07:04:08'),(10,'160421058',5,'Maya terus menggali lapisan waktu yang lama terlupakan, mengungkap rahasia dan kisah-kisah yang telah terkubur di bawah debu sejarah. Dalam setiap serpihan arsitektur yang retak, ia menemukan serpihan cerita hidup yang menggugah dan meresapi jiwa. Meski banyak yang mencoba melupakan kota tersebut, Maya berhasil membawa kembali citra dan memori kota terlupakan, memberikan suara pada orang-orang yang telah lama hilang dalam bayang-bayang waktu.','2023-10-14 07:04:29'),(11,'160421072',6,'Di negeri yang tersembunyi di antara awan, hidup seorang pemuda bernama Rama yang memiliki mimpi untuk mencapai serenade bintang yang legendaris. Berbekal peta kuno dan tekad yang kuat, Rama memulai perjalanan melintasi pegunungan tinggi dan lembah-lembah misterius. Di sepanjang perjalanan, ia menemui makhluk-makhluk ajaib dan menghadapi ujian-ujian tak terduga. Serenade bintang yang ia cari bukan hanya tentang melodi yang indah, tetapi juga tentang pertumbuhan diri dan keajaiban yang ada di sepanjang perjalanan hidupnya.','2023-10-14 07:05:02'),(12,'160421072',6,'Rama melanjutkan perjalanannya melalui negeri awan yang menyimpan kejutan dan keindahan di setiap tikungan. Di tengah cahaya bintang yang berserakan di langit malam, ia menemukan bahwa serenade yang dicari bukan hanya milik bintang, tetapi juga milik hati yang terbuka pada keajaiban dunia. Dengan harapan yang membimbingnya, Rama menemukan bahwa petualangan sejati adalah tentang menghargai keindahan kecil di sepanjang perjalanan, dan bahwa serenade bintang sejati ada dalam setiap langkah yang diambil menuju impian.','2023-10-14 07:05:16');
/*!40000 ALTER TABLE `paragraf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `iduser` varchar(40) NOT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`iduser`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES ('160421001','Steven','01cc2e4c4ce86aa35b57157d300a034b','PvIndHrtSk'),('160421058','Bayu','4e7fed3cff76dd5c7b54d512c8af5a32','HPInStdrkv'),('160421072','Vincent','76229e1e196c4a26916f45d5b2076811','PSnrtdvIHk');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-15 11:24:15
