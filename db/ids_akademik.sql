-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.5053
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for ids_akademik
CREATE DATABASE IF NOT EXISTS `ids_akademik` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `ids_akademik`;

-- Dumping structure for table ids_akademik.dosen
CREATE TABLE IF NOT EXISTS `dosen` (
  `NIP` varchar(50) NOT NULL,
  `Nama_Dosen` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  PRIMARY KEY (`NIP`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.dosen: ~2 rows (approximately)
/*!40000 ALTER TABLE `dosen` DISABLE KEYS */;
INSERT INTO `dosen` (`NIP`, `Nama_Dosen`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`) VALUES
	('098980', 'Derry', '2017-03-15', 'L', '2324', 'aasdad'),
	('DS003', 'Iksan Derry S', '2017-03-14', 'L', '0897761', 'Cimahi');
/*!40000 ALTER TABLE `dosen` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.jadwal
CREATE TABLE IF NOT EXISTS `jadwal` (
  `Id_Jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `Kode_Matakuliah_Jadwal` varchar(50) NOT NULL,
  `NIP_Jadwal` varchar(50) NOT NULL,
  `Kode_Ruangan_Jadwal` varchar(50) NOT NULL,
  `Kode_Jurusan_Jadwal` varchar(50) NOT NULL,
  `Hari` varchar(50) NOT NULL,
  `Jam` varchar(11) NOT NULL,
  PRIMARY KEY (`Id_Jadwal`),
  KEY `FK_jadwal_dosen` (`NIP_Jadwal`),
  KEY `FK_jadwal_ruangan` (`Kode_Ruangan_Jadwal`),
  KEY `FK_jadwal_matakuliah` (`Kode_Matakuliah_Jadwal`),
  KEY `FK_jadwal_jurusan` (`Kode_Jurusan_Jadwal`),
  CONSTRAINT `FK_jadwal_dosen` FOREIGN KEY (`NIP_Jadwal`) REFERENCES `dosen` (`NIP`),
  CONSTRAINT `FK_jadwal_jurusan` FOREIGN KEY (`Kode_Jurusan_Jadwal`) REFERENCES `jurusan` (`Kode_Jurusan`),
  CONSTRAINT `FK_jadwal_matakuliah` FOREIGN KEY (`Kode_Matakuliah_Jadwal`) REFERENCES `matakuliah` (`Kode_Matakuliah`),
  CONSTRAINT `FK_jadwal_ruangan` FOREIGN KEY (`Kode_Ruangan_Jadwal`) REFERENCES `ruangan` (`Kode_Ruangan`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.jadwal: ~2 rows (approximately)
/*!40000 ALTER TABLE `jadwal` DISABLE KEYS */;
INSERT INTO `jadwal` (`Id_Jadwal`, `Kode_Matakuliah_Jadwal`, `NIP_Jadwal`, `Kode_Ruangan_Jadwal`, `Kode_Jurusan_Jadwal`, `Hari`, `Jam`) VALUES
	(13, 'W01', 'DS003', 'R03', 'TIS1', 'Jumat', '05:10-09:10'),
	(14, 'MK02', 'DS003', 'R02', 'TIS1', 'Jumat', '12:30-13:30');
/*!40000 ALTER TABLE `jadwal` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.jenjang
CREATE TABLE IF NOT EXISTS `jenjang` (
  `Kode_Jenjang` varchar(50) NOT NULL,
  `Nama_Jenjang` varchar(50) NOT NULL,
  PRIMARY KEY (`Kode_Jenjang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.jenjang: ~5 rows (approximately)
/*!40000 ALTER TABLE `jenjang` DISABLE KEYS */;
INSERT INTO `jenjang` (`Kode_Jenjang`, `Nama_Jenjang`) VALUES
	('D1', 'Diploma I'),
	('D3', 'Diploma III'),
	('S1', 'Sarjana'),
	('S2', 'Magister'),
	('S3', 'Doktor');
/*!40000 ALTER TABLE `jenjang` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.jurusan
CREATE TABLE IF NOT EXISTS `jurusan` (
  `Kode_Jurusan` varchar(50) NOT NULL,
  `Nama_Jurusan` varchar(50) NOT NULL,
  `Kode_Jenjang_Jrs` varchar(50) NOT NULL,
  PRIMARY KEY (`Kode_Jurusan`),
  KEY `FK_jurusan_jenjang` (`Kode_Jenjang_Jrs`),
  CONSTRAINT `FK_jurusan_jenjang` FOREIGN KEY (`Kode_Jenjang_Jrs`) REFERENCES `jenjang` (`Kode_Jenjang`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.jurusan: ~5 rows (approximately)
/*!40000 ALTER TABLE `jurusan` DISABLE KEYS */;
INSERT INTO `jurusan` (`Kode_Jurusan`, `Nama_Jurusan`, `Kode_Jenjang_Jrs`) VALUES
	('KIS1', 'Kimia', 'D3'),
	('SID3', 'Sistem Informasi', 'D3'),
	('TIS1', 'Teknik Informatika', 'S1'),
	('TKD3', 'Teknik Komputer', 'D3');
/*!40000 ALTER TABLE `jurusan` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.mahasiswa
CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `NIM` varchar(50) NOT NULL,
  `Nama_Mahasiswa` varchar(50) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `JK` enum('L','P') NOT NULL,
  `No_Telp` varchar(50) NOT NULL,
  `Alamat` varchar(150) NOT NULL,
  `Kode_Jurusan_Mhs` varchar(50) NOT NULL,
  PRIMARY KEY (`NIM`),
  KEY `FK_mahasiswa_jurusan` (`Kode_Jurusan_Mhs`),
  CONSTRAINT `FK_mahasiswa_jurusan` FOREIGN KEY (`Kode_Jurusan_Mhs`) REFERENCES `jurusan` (`Kode_Jurusan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.mahasiswa: ~2 rows (approximately)
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` (`NIM`, `Nama_Mahasiswa`, `Tanggal_Lahir`, `JK`, `No_Telp`, `Alamat`, `Kode_Jurusan_Mhs`) VALUES
	('D980098', 'Ikhsan', '2017-03-15', 'L', '0989809', 'Bandung', 'TIS1'),
	('D980980', 'Deerry', '2017-03-15', 'L', '234234', 'Cimahi', 'KIS1');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.matakuliah
CREATE TABLE IF NOT EXISTS `matakuliah` (
  `Kode_Matakuliah` varchar(50) NOT NULL,
  `Nama_Matakuliah` varchar(50) NOT NULL,
  `SKS` int(11) NOT NULL,
  PRIMARY KEY (`Kode_Matakuliah`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.matakuliah: ~3 rows (approximately)
/*!40000 ALTER TABLE `matakuliah` DISABLE KEYS */;
INSERT INTO `matakuliah` (`Kode_Matakuliah`, `Nama_Matakuliah`, `SKS`) VALUES
	('MK01', 'Database', 2),
	('MK02', 'MTQ', 3),
	('W01', 'Web Programming', 4);
/*!40000 ALTER TABLE `matakuliah` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.nilai
CREATE TABLE IF NOT EXISTS `nilai` (
  `Id_Nilai` int(11) NOT NULL AUTO_INCREMENT,
  `NIM_Nilai` varchar(50) NOT NULL,
  `Kode_Matakuliah_Nilai` varchar(50) NOT NULL,
  `Nilai` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Nilai`),
  KEY `FK_nilai_mahasiswa` (`NIM_Nilai`),
  KEY `FK_nilai_matakuliah` (`Kode_Matakuliah_Nilai`),
  CONSTRAINT `FK_nilai_mahasiswa` FOREIGN KEY (`NIM_Nilai`) REFERENCES `mahasiswa` (`nim`),
  CONSTRAINT `FK_nilai_matakuliah` FOREIGN KEY (`Kode_Matakuliah_Nilai`) REFERENCES `matakuliah` (`kode_matakuliah`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.nilai: ~3 rows (approximately)
/*!40000 ALTER TABLE `nilai` DISABLE KEYS */;
INSERT INTO `nilai` (`Id_Nilai`, `NIM_Nilai`, `Kode_Matakuliah_Nilai`, `Nilai`) VALUES
	(2, 'D980980', 'W01', 'C'),
	(4, 'D980098', 'MK01', 'A'),
	(5, 'D980980', 'MK02', 'C');
/*!40000 ALTER TABLE `nilai` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.ruangan
CREATE TABLE IF NOT EXISTS `ruangan` (
  `Kode_Ruangan` varchar(50) NOT NULL,
  `Nama_Ruangan` varchar(50) NOT NULL,
  PRIMARY KEY (`Kode_Ruangan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.ruangan: ~3 rows (approximately)
/*!40000 ALTER TABLE `ruangan` DISABLE KEYS */;
INSERT INTO `ruangan` (`Kode_Ruangan`, `Nama_Ruangan`) VALUES
	('R01', 'Ruangan 1'),
	('R02', 'Ruangan 2'),
	('R03', 'Ruangan 3');
/*!40000 ALTER TABLE `ruangan` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.user
CREATE TABLE IF NOT EXISTS `user` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `Id_Usergroup_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Foto` varchar(150) NOT NULL DEFAULT 'ids.jpg',
  PRIMARY KEY (`Id_User`),
  KEY `FK_user_usergroup` (`Id_Usergroup_User`),
  CONSTRAINT `FK_user_usergroup` FOREIGN KEY (`Id_Usergroup_User`) REFERENCES `usergroup` (`Id_Usergroup`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.user: ~3 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `Username`, `Password`, `Foto`) VALUES
	(1, 1, 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma', 'ids.jpg'),
	(18, 2, '098980', '$2y$10$25GSpBPnHynFHGafwjdyUeuwy6kF/6/pKLBSVdxk61suyPf5Tsugu', 'ids.jpg'),
	(19, 3, 'D980098', '$2y$10$EEvgrytjn7UkxTXtefDx0ux60r.6jGwmo3pYS.2VybRApkvm97rGi', 'ids.jpg');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

-- Dumping structure for table ids_akademik.usergroup
CREATE TABLE IF NOT EXISTS `usergroup` (
  `Id_Usergroup` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Usergroup` varchar(50) NOT NULL,
  PRIMARY KEY (`Id_Usergroup`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table ids_akademik.usergroup: ~3 rows (approximately)
/*!40000 ALTER TABLE `usergroup` DISABLE KEYS */;
INSERT INTO `usergroup` (`Id_Usergroup`, `Nama_Usergroup`) VALUES
	(1, 'Administrator'),
	(2, 'Dosen'),
	(3, 'Mahasiswa');
/*!40000 ALTER TABLE `usergroup` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
