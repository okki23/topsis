-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2021 at 06:52 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spk_topsis`
--

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(2, 'Direktur'),
(3, 'SPV');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` char(8) NOT NULL,
  `nama_kriteria` varchar(25) NOT NULL,
  `bobot` int(10) NOT NULL,
  `atribut` enum('K','B') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`, `bobot`, `atribut`) VALUES
('K-0001', 'Kejujuran', 0, 'K'),
('K-0002', 'Taat Peraturan', 0, 'K'),
('K-0003', 'Alfa/Absen', 0, 'B'),
('K-0004', 'Kedisiplinan', 0, 'K'),
('K-0005', 'Tanggung Jawab', 0, 'K'),
('K-0006', 'Kebersihan', 5, 'K'),
('K-0007', 'Kerajinan', 0, 'K'),
('K-0008', 'Kreatifitas', 0, 'K'),
('K-0009', 'Kerjasama', 0, 'K'),
('K-0010', 'Senyuman', 5, 'K');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `no_pegawai` char(8) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jekel` enum('L','P') NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `status_perkawinan` varchar(15) NOT NULL,
  `no_telp` char(13) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `tgl_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`no_pegawai`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jekel`, `id_jabatan`, `agama`, `status_perkawinan`, `no_telp`, `alamat`, `tgl_masuk`) VALUES
('P-0003', 'Mei ', 'Sleman', '1989-05-15', 'P', 3, 'Islam', 'Belum kawin', '089765432199', 'Kalasan Sleman Yogyakarta', '2012-11-10'),
('P-0004', 'Rafiq', 'Bantul ', '1996-06-13', 'L', 0, 'Islam', 'Belum kawin', '085678901234', 'Jalan Imogiri Barat km 7 Bantul', '2015-07-20'),
('P-0005', 'Riri', 'Bantul', '1996-02-03', 'P', 0, 'Islam', 'Belum kawin', '085137677011', 'Sewon Bantul Yogyakarta', '2015-10-10'),
('P-0006', 'Fahmi', 'Sleman', '1989-02-10', 'L', 0, 'Islam', 'Kawin', '098765432199', 'Sleman Yogyakarta', '2010-03-12'),
('P-0007', 'Rahmad', 'Bantul', '1992-03-12', 'L', 0, 'Islam', 'Kawin', '081327677015', 'Bantul Yogyakarta', '2010-10-12'),
('P-0008', 'Linda', 'Yogyakarta', '1996-11-12', 'P', 0, 'Islam', 'Belum kawin', '082137788977', 'Jalan Kusumanegara', '2012-01-25'),
('P-0009', 'Febri', 'Bantul', '1995-03-10', 'L', 0, 'Islam', 'Belum kawin', '087677577877', 'Kalasan Sleman', '2014-05-02'),
('P-0010', 'Khoir', 'Kulon Progo', '1991-01-01', 'P', 0, 'Islam', 'Kawin', '087977899001', 'Jalan Tamansiswa Yogyakarta', '2016-09-10'),
('P-0011', 'Rohma', 'Bantul', '1990-08-09', 'P', 0, 'Islam', 'Kawin', '087654321000', 'Bantul Yogyakarta', '2010-10-20'),
('P-0012', 'Kartika', 'Yogyakarta', '1992-01-12', 'L', 0, 'Islam', 'Kawin', '089765432111', 'Jalan Abu Bakar Yogyakarta', '2011-02-10'),
('P-0013', 'Yuyun', 'Sleman', '1988-10-11', 'P', 0, 'Islam', 'Kawin', '089765432188', 'Sleman Yogyakarta', '2012-11-10'),
('P-0014', 'Puput', 'Gunungkidul', '1990-10-20', 'P', 0, 'Islam', 'Belum kawin', '087654123321', 'Piyungan Bantul Yogyakarta', '2015-07-02'),
('P-0015', 'Meida', 'Yogyakarta', '1992-03-03', 'P', 0, 'Islam', 'Kawin', '087654321444', 'Jalan Sultan Agung Yogyakarta', '2016-10-10'),
('P-0016', 'Sigit', 'Sleman', '1988-12-27', 'L', 0, 'Islam', 'Kawin', '086543217877', 'Sleman Yogyakarta', '2009-03-10'),
('P-0017', 'Ika', 'Bantul', '1993-03-10', 'P', 0, 'Islam', 'Belum kawin', '089765432100', 'Bantul Yogyakarta', '2010-07-27'),
('P-0018', 'Aldo', 'Gunungkidul', '1990-07-20', 'L', 0, 'Islam', 'Belum kawin', '087654123900', 'Gunungkidul Yogyakarta', '2013-01-21'),
('P-0019', 'Irman', 'Bantul', '1989-09-09', 'L', 0, 'Islam', 'Kawin', '089765432199', 'Bantul Yogyakarta', '2015-11-02'),
('P-0020', 'Laily', 'Yogyakarta', '1996-11-10', 'P', 0, 'Islam', 'Belum kawin', '087654399877', 'Bantul Yogyakarta', '2015-12-02'),
('P-0021', 'Nia', 'Cilacap', '1989-11-20', 'P', 0, 'Islam', 'Kawin', '081234567890', 'Kalasan Sleman', '2009-04-12'),
('P-0022', 'Iwan ', 'Lampung', '1991-11-12', 'L', 0, 'Islam', 'Belum kawin', '085643789654', 'Yogyakarta', '2010-12-10'),
('P-0023', 'Listia', 'Bantul', '1994-08-09', 'P', 0, 'Islam', 'Belum kawin', '089765432188', 'Bantul Yogyakarta', '2011-05-01'),
('P-0024', 'Tata', 'Yogyakarta', '1990-08-08', 'P', 0, 'Islam', 'Belum kawin', '082234567789', 'Yogyakarta', '2014-10-02'),
('P-0025', 'Syamsul', 'Sleman', '1989-12-10', 'L', 0, 'Islam', 'Kawin', '089456789987', 'Sleman', '2014-11-20'),
('P-0026', 'Ibnu', 'Bantul', '1988-09-09', 'L', 0, 'Islam', 'Kawin', '089765876500', 'Bantul Yogyakarta', '2010-10-20'),
('P-0027', 'Ifah', 'Yogyakarta', '1992-09-10', 'P', 0, 'Islam', 'Belum kawin', '087890098765', 'Sleman Yogyakarta', '2011-02-10'),
('P-0028', 'Joko', 'Kulon Progo', '1990-08-07', 'L', 0, 'Islam', 'Kawin', '087654123900', 'Bantul Yogyakarta', '2012-11-10'),
('P-0029', 'Affa', 'Sleman', '1995-08-03', 'P', 0, 'Islam', 'Belum kawin', '087654321900', 'Yogyakarta', '2015-02-02'),
('P-0030', 'Rina', 'Bantul', '1997-07-07', 'P', 0, 'Islam', 'Belum kawin', '086543123444', 'Bantul Yogyakarta', '2015-07-07'),
('P-0031', 'Iput', 'Sleman', '1990-10-12', 'P', 0, 'Islam', 'Belum kawin', '085678987665', 'Sleman Yogyakarta', '2009-02-21'),
('P-0032', 'Fitri', 'Bantul', '1989-01-30', 'P', 0, 'Islam', 'Kawin', '089789654123', 'Bantul Yogyakarta', '2011-09-10'),
('P-0033', 'Ukon', 'Yogyakarta', '1990-09-09', 'L', 0, 'Islam', 'Belum kawin', '087654332221', 'Kulon Progo', '2011-10-11'),
('P-0034', 'Ivan ', 'Gunungkidul', '1991-03-06', 'L', 0, 'Islam', 'Belum kawin', '089765432123', 'Bantul Yogyakarta', '2011-10-11'),
('P-0035', 'Ridwan', 'Yogyakarta', '1990-08-17', 'L', 0, 'Islam', 'Belum kawin', '087654123890', 'Bantul Yogyakarta', '2013-08-25'),
('P-0036', 'Ulil', 'Bantul', '1990-09-17', 'L', 0, 'Islam', 'Belum kawin', '089765432100', 'Bantul Yogyakarta', '2009-05-12'),
('P-0037', 'Minan', 'Yogyakarta', '1991-09-03', 'L', 0, 'Islam', 'Belum kawin', '089001234567', 'Yogyakarta', '2010-12-10'),
('P-0038', 'Agus', 'Sleman', '1992-07-08', 'L', 0, 'Islam', 'Belum kawin', '087690012344', 'Sleman', '2011-11-11'),
('P-0039', 'Dwi', 'Cilacap', '1991-10-09', 'L', 0, 'Islam', 'Kawin', '087654234100', 'Yogyakarta', '2012-08-05'),
('P-0040', 'Nursahid', 'Semarang', '1994-08-02', 'L', 0, 'Islam', 'Belum kawin', '082345678900', 'Bantul Yogyakarta', '2012-08-05'),
('P-0041', 'Agustian', 'Jakarta', '1989-09-08', 'L', 0, 'Islam', 'Kawin', '087654321123', 'Jalan Mataram Yogyakarta', '2010-01-20'),
('P-0042', 'Rini', 'Bantul', '1994-05-27', 'P', 0, 'Islam', 'Belum kawin', '087654321777', 'Jalan Bantul', '2011-02-10'),
('P-0043', 'Jono', 'Yogyakarta', '1990-06-23', 'L', 0, 'Islam', 'Kawin', '087690087700', 'Jalan Kusumanegawa', '2012-11-10'),
('P-0044', 'Endang', 'Sleman', '1992-10-03', '', 0, 'Islam', 'Belum kawin', '083987098890', 'Jalan Tajem Yogyakarta', '2015-07-02'),
('P-0045', 'Riswan', 'Semarang', '1991-09-04', 'L', 0, 'Islam', 'Kawin', '084567890098', 'Jalan Kaliurang Yogyakarta', '2016-09-10'),
('P-0046', 'Arimbi', 'Bantul', '1990-07-07', 'P', 0, 'Islam', 'Belum kawin', '087654321000', 'Jalan Bantul', '2009-08-17'),
('P-0047', 'Pratiwi', 'Yogyakarta', '1990-08-09', 'P', 0, 'Islam', 'Kawin', '087654890001', 'Jalan Kusumadewi Yogyakarta', '2011-09-07'),
('P-0048', 'Galih', 'Sleman', '1991-07-09', 'L', 0, 'Islam', 'Belum kawin', '087654321900', 'Mutihan Bantul', '2011-09-09'),
('P-0049', 'Reza', 'Magelang', '1992-06-03', 'L', 0, 'Islam', 'Belum kawin', '087659001234', 'Jalan Parangtritis', '2013-05-10'),
('P-0050', 'Kiki', 'Sleman', '1991-09-08', 'L', 0, 'Islam', 'Belum kawin', '087654321999', 'Sleman Yogyakarta', '2014-09-04'),
('P-0051', 'Roro', 'Bantul', '1990-09-06', 'P', 0, 'Islam', 'Belum kawin', '087654321999', 'Bantul Yogyakarta', '2010-05-21'),
('P-0052', 'Ari', 'Yogyakarta', '1990-08-09', 'P', 0, 'Islam', 'Kawin', '089765430009', 'Jalan Cendana Yogyakarta', '2010-06-05'),
('P-0053', 'Lifah', 'Sleman', '1995-05-25', '', 0, 'Islam', 'Kawin', '087654321098', 'Jalan Godean', '2010-06-05'),
('P-0054', 'Surya', 'Surabaya', '1992-10-07', 'L', 0, 'Islam', 'Belum kawin', '087908812333', 'Sleman Yogyakarta', '2013-09-10'),
('P-0055', 'Andi', 'Semarang', '1990-09-09', 'L', 0, 'Islam', 'Belum kawin', '089098765890', 'Jalan Wonosari', '2015-09-05'),
('P-0056', 'Fadila', 'Bantul', '1989-06-06', '', 0, 'Islam', 'Belum kawin', '087909876567', 'Jalan Sultan Agung', '2009-12-11'),
('P-0057', 'Husni', 'Kulon Progo', '1990-10-06', 'L', 0, 'Islam', 'Belum kawin', '089909789987', 'Jalan Samas Bantul', '2010-10-05'),
('P-0058', 'Tiwi', 'Jakarta', '1991-10-07', 'P', 0, 'Islam', 'Belum kawin', '089765567123', 'Jalan Wonosari Km 5', '2010-10-05'),
('P-0059', 'Farril', 'Bima', '1992-09-10', 'L', 0, 'Islam', 'Belum kawin', '087906541231', 'Jalan Batikan Yogyakarta', '2014-04-04'),
('P-0060', 'Andika', 'Bandung', '1992-10-08', 'L', 0, 'Islam', 'Belum kawin', '081234567891', 'Jalan Diponegoro Yogyakarta', '2016-04-04'),
('P-0061', 'Andin', 'Yogyakarta', '1990-10-20', 'P', 0, 'Islam', 'Belum kawin', '087987789001', 'Jalan Kapas Yogyakarta', '2009-06-21'),
('P-0062', 'Sarah', 'Bantul', '1995-04-03', 'P', 0, 'Islam', 'Belum kawin', '083456789123', 'Bantul Yogyakarta', '2010-08-20'),
('P-0063', 'Tora', 'Jakarta', '1992-07-05', 'L', 0, 'Islam', 'Belum kawin', '086543213456', 'Jalan Magelang Yogyakarta', '2010-08-20'),
('P-0064', 'Adit', 'Sleman', '1994-10-09', 'L', 0, 'Islam', 'Belum kawin', '082123456777', 'Bantul Yogyakarta', '2013-09-21'),
('P-0065', 'Sanum', 'Yogyakarta', '1992-03-02', 'P', 0, 'Islam', 'Belum kawin', '087654321876', 'Jalan Godean Yogyakarta', '2015-10-02'),
('P-0066', 'Bambang', 'Bantul', '1989-06-06', 'L', 0, 'Islam', 'Kawin', '085678876999', 'Jalan Muja Muju', '2010-11-10'),
('P-0067', 'Riski', 'Sleman', '1990-05-02', 'L', 0, 'Islam', 'Belum kawin', '086543123333', 'Sleman Yogyakarta', '2011-11-10'),
('P-0068', 'Risal', 'Bantul', '1995-02-09', 'L', 0, 'Islam', 'Belum kawin', '089000123000', 'Jalan Imogiri Barat Bantul', '2011-12-10'),
('P-0069', 'Rista', 'Yogyakarta', '1994-04-04', 'P', 0, 'Islam', 'Belum kawin', '081234567800', 'Jalan A. Yani', '2011-12-10'),
('P-0070', 'Lusiana ', 'Bantul', '1995-05-05', 'P', 0, 'Islam', 'Belum kawin', '087654123456', 'Jalan Bantul', '2012-12-12'),
('P-0071', 'Susi', 'Surabaya', '1989-08-07', 'P', 0, 'Islam', 'Belum kawin', '083456789000', 'Jalan Manunggal Yogyakarta', '2011-09-10'),
('P-0072', 'Rara', 'Bantul', '1990-10-02', 'P', 0, 'Islam', 'Belum kawin', '087654321900', 'Jalan Bantul', '2012-09-10'),
('P-0073', 'Dwika', 'Bandung', '1990-08-18', 'L', 0, 'Islam', 'Kawin', '081234567800', 'Jalan Bandungan Yogyakarta', '2012-10-11'),
('P-0074', 'Oki', 'Sleman', '1992-07-13', 'P', 0, 'Islam', 'Kawin', '087658900888', 'Sleman Yogyakarta', '2012-10-11'),
('P-0075', 'Andre', 'Kulon Progo', '1996-06-21', 'L', 0, 'Islam', 'Belum kawin', '087654321000', 'Bantul Yogyakarta', '2015-09-04'),
('P-0076', 'Riris', 'Bantul', '1989-12-30', 'P', 0, 'Islam', 'Kawin', '087654890111', 'Bantul Yogyakarta', '2011-05-05'),
('P-0077', 'Aris', 'Yogyakarta', '1989-12-08', 'L', 0, 'Islam', 'Belum kawin', '087999888777', 'Jalan Abu Bakar Bantul', '2012-06-05'),
('P-0078', 'Likah', 'Sleman', '1992-11-08', 'P', 0, 'Islam', 'Belum kawin', '087990011222', 'Bantul Yogyakarta', '2012-06-05'),
('P-0079', 'Yanto', 'Semarang', '1990-12-19', 'L', 0, 'Islam', 'Belum kawin', '087900100111', 'Sleman, Yogyakarta', '2014-07-07'),
('P-0080', 'Andang', 'Sleman', '1995-05-05', 'L', 0, 'Islam', 'Belum kawin', '087699223311', 'Sleman Yogyakarta', '2014-08-07'),
('P-0081', 'Riska', 'Yogyakarta', '1990-09-09', 'P', 0, 'Islam', 'Belum kawin', '087999666777', 'Jalan Gejayan  S', '2010-06-26'),
('P-0082', 'Iin', 'Bantul', '1991-05-09', 'P', 0, 'Islam', 'Belum kawin', '087654567888', 'Jalan Samas', '2012-07-26'),
('P-0083', 'Edi', 'Sleman', '1990-07-04', 'L', 0, 'Islam', 'Kawin', '089087657777', 'Sleman Yogyakarta', '2012-07-26'),
('P-0084', 'Anas', 'Bima', '1990-10-10', 'L', 0, 'Islam', 'Belum kawin', '085678987789', 'Kalasan Sleman', '2014-09-05'),
('P-0085', 'Fera', 'Bantul', '1992-02-05', 'P', 0, 'Islam', 'Belum kawin', '085643213456', 'Jalan Pleret Bantul', '2014-09-05'),
('P-0086', 'Sarita', 'Bandung', '1989-12-09', 'P', 0, 'Islam', 'Kawin', '089765432100', 'Jalan Imogiti Timur ', '2008-12-25'),
('P-0087', 'Tia', 'Jakarta', '1990-09-29', 'P', 0, 'Islam', 'Belum kawin', '087654890111', 'Bantul Yogyakarta', '2010-01-02'),
('P-0088', 'Pamungkas', 'Kulon Progo', '1990-02-08', 'L', 0, 'Islam', 'Kawin', '089091234567', 'Kalasan Sleman', '2010-02-03'),
('P-0089', 'Ragil', 'Sleman', '1989-11-05', 'P', 0, 'Islam', 'Kawin', '087654789000', 'Sleman Yogyakarta', '2010-02-03'),
('P-0090', 'Roni', 'Bantul', '1990-11-05', 'L', 0, 'Islam', 'Belum kawin', '089768654123', 'Jalan Sultan Agung', '2014-08-31'),
('P-0091', 'Soraya', 'Bantul', '1990-12-05', 'P', 0, 'Islam', 'Belum kawin', '087909654269', 'Kasihan Bantul', '2009-12-05'),
('P-0092', 'Niken', 'Yogyakarta', '1990-11-05', 'P', 0, 'Islam', 'Belum kawin', '084787541234', 'Jalan Mangkubumi', '2010-11-05'),
('P-0093', 'Ajeng', 'Bantul', '1994-10-10', 'P', 0, 'Islam', 'Belum kawin', '089583169005', 'Jetis Bantul', '2011-07-06'),
('P-0094', 'Asti', 'Ambon', '1995-10-06', 'P', 0, 'Islam', 'Belum kawin', '089184703580', 'Jetis Bantul', '2011-07-08'),
('P-0095', 'Sasa', 'Bantul', '1990-09-07', 'P', 0, 'Islam', 'Belum kawin', '087296190411', 'Bantul Yogyakarta', '2011-07-08'),
('P-0096', 'Susan', 'Bantul', '1990-07-03', 'P', 0, 'Islam', 'Belum kawin', '087654890123', 'Bantul Yogyakarta', '2010-03-25'),
('P-0097', 'Tio', 'Bogor', '1990-10-06', 'L', 0, 'Islam', 'Belum kawin', '089012348712', 'Sleman Yogyakarta', '2010-03-26'),
('P-0098', 'Ririn', 'Sleman', '1992-12-05', 'P', 0, 'Islam', 'Belum kawin', '087182747900', 'Sleman Yogyakarta', '2011-07-02'),
('P-0099', 'Fadli', 'Gunungkidul', '1991-08-23', 'L', 0, 'Islam', 'Belum kawin', '081743985772', 'Jalan Wonosari', '2011-07-02'),
('P-0100', 'Dika', 'Bantul', '1990-12-04', 'L', 0, 'Islam', 'Belum kawin', '082601583910', 'Piyungan Bantul', '2011-11-05'),
('P-0101', 'Aza', 'Bantul', '1990-02-01', 'P', 0, 'Islam', 'Belum kawin', '085180268791', 'Jalan Parangtritis', '2009-06-05'),
('P-0102', 'Falan ', 'Cilacap', '1991-09-07', 'P', 0, 'Islam', 'Belum kawin', '081284147940', 'Jalan Bantul', '2010-07-05'),
('P-0103', 'Fahri', 'Jakarta', '1990-09-08', 'L', 0, 'Islam', 'Belum kawin', '085184823279', 'Sleman Yogyakarta', '2010-07-25'),
('P-0104', 'Azam', 'Semarang', '1992-10-09', 'L', 0, 'Islam', 'Belum kawin', '083287342999', 'Jalan Imam Bonjol', '2011-10-10'),
('P-0105', 'Alma', 'Yogyakarta', '1991-01-01', 'P', 0, 'Islam', 'Belum kawin', '089765437687', 'Jalan Kyai Mojo', '2011-10-11'),
('P-0106', 'Joni', 'Gunungkidul', '1989-09-23', 'L', 0, 'Islam', 'Kawin', '087268927665', 'Jalan Wonosari', '2010-12-12'),
('P-0107', 'Anjani', 'Bantul', '1990-07-06', 'P', 0, 'Islam', 'Belum kawin', '089642457800', 'Jalan Giwangan', '2011-11-12'),
('P-0108', 'Dewi', 'Bantul', '1994-07-07', 'P', 0, 'Islam', 'Belum kawin', '086546788975', 'Jalan Pramuka ', '2011-11-12'),
('P-0109', 'Soni', 'Kulon Progo', '1990-06-23', 'L', 0, 'Islam', 'Belum kawin', '086564567871', 'Sewon Bantul', '2012-04-24'),
('P-0110', 'Ana', 'Sleman', '1992-06-03', 'P', 0, 'Islam', 'Belum kawin', '086753628273', 'Moyudan Sleman', '2012-05-25'),
('P-0111', 'Farah', 'Bantul', '1990-05-03', 'P', 0, 'Islam', 'Belum kawin', '086546789766', 'Bantul Yogyakarta', '2009-05-15'),
('P-0112', 'Lila', 'Cilacap', '1990-05-03', 'P', 0, 'Islam', 'Belum kawin', '085678976541', 'Jalan Imogiri Barat', '2010-05-15'),
('P-0113', 'Zahra', 'Sleman', '1991-10-04', 'L', 0, 'Islam', 'Belum kawin', '089223565761', 'Jalan Solo ', '2011-06-16'),
('P-0114', 'Ozi', 'Purworejo', '1991-07-12', 'L', 0, 'Islam', 'Belum kawin', '087213567843', 'Jalan Mataram', '2011-07-20'),
('P-0115', 'Yogo', 'Sleman', '1990-12-05', 'L', 0, 'Islam', 'Belum kawin', '089625621361', 'Jalan Affandi', '2012-08-21'),
('P-0116', 'Nada ', 'Bantul', '1990-07-03', 'P', 0, 'Islam', 'Belum kawin', '087646788854', 'Jalan Ahmad Dahlan', '2010-10-06'),
('P-0117', 'Lia', 'Bantul', '1990-08-06', 'P', 0, 'Islam', 'Belum kawin', '089655755412', 'Jalan Kusumadewi', '2011-07-07'),
('P-0118', 'Siska', 'Yogyakarta', '1991-10-06', 'P', 0, 'Islam', 'Belum kawin', '089645798765', 'Jalan Sudirman', '2012-07-08'),
('P-0119', 'Koko', 'Bantul', '1990-07-04', 'L', 0, 'Islam', 'Belum kawin', '089765465432', 'Jalan Kyai Mojo', '2012-09-09'),
('P-0120', 'Ali', 'Sleman', '1992-11-05', 'L', 0, 'Islam', 'Belum kawin', '089754567851', 'Jalan Jogja - Solo', '2013-10-09'),
('P-0121', 'Sulistio', 'Yogyakarta', '1972-03-19', 'L', 0, 'Islam', 'Kawin', '082244413456', 'Yogyakarta', '1998-05-12'),
('P-0122', 'Wildan', 'Sleman', '1984-08-01', 'L', 0, 'Islam', 'Kawin', '081234567800', 'Sleman', '2012-12-12'),
('P-0123', 'Okki Setyawan', 'Jakarta', '1993-10-01', 'L', 0, 'Islam', 'Kawin', '0219834845', 'kokoko', '2021-02-23'),
('P-0124', 'Joni Super', 'Jakarta', '2021-02-01', 'L', 2, 'Islam', 'Kawin', '021122', 'dfdad', '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `no_pegawai` char(10) NOT NULL,
  `id_kriteria` varchar(25) NOT NULL,
  `nilai` int(11) NOT NULL,
  `tgl_penilaian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `no_pegawai`, `id_kriteria`, `nilai`, `tgl_penilaian`) VALUES
(1, 'P-0007', 'K-0007', 9, '2021-02-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_name` varchar(25) NOT NULL,
  `password` varchar(15) NOT NULL,
  `hak_akses` int(1) DEFAULT NULL,
  `id_pegawai` char(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_name`, `password`, `hak_akses`, `id_pegawai`) VALUES
('admin', 'admin', 0, NULL),
('tt', '', 4, 'P-0005'),
('Wildan', 'wildan', 1, 'P-0122');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`no_pegawai`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD KEY `FK_user_pegawai` (`id_pegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_user_pegawai` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`no_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
