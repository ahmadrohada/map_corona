-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 02:27 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_corona`
--

-- --------------------------------------------------------

--
-- Table structure for table `corona`
--

CREATE TABLE `corona` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(70) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lon` decimal(11,8) NOT NULL,
  `rad` int(11) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `corona`
--

INSERT INTO `corona` (`id`, `nama_lokasi`, `kecamatan`, `lat`, `lon`, `rad`, `notes`, `created_at`) VALUES
(1, 'Perum Tirai Mas', 'Kosambi', '-6.35597200', '107.37388900', 5000, 'Tes notes', '2017-12-08 05:48:41'),
(2, 'Cibungur Sari', '', '-6.30641700', '107.31922200', 2000, '', '2017-11-29 22:32:19'),
(3, 'Adiarsa Barat', '', '-6.32097200', '107.30969400', 2000, '', '2017-12-08 05:48:41'),
(4, 'Ciantra_Cikarang Selatan', '', '-6.34541700', '107.10472200', 2000, '', '2020-04-02 17:47:07'),
(5, 'Ds Sukadanau_Cikarang Barat', '', '-6.28316700', '107.10386100', 2000, '', '2020-04-02 17:47:58'),
(6, 'Karangsatria_Tambun Utara', '', '-6.22255600', '107.04144400', 2000, '', '2020-04-02 17:48:28'),
(7, 'Jatilmulya_Tambun Selatan', '', '-6.26438900', '107.02816700', 2000, '', '2020-04-02 17:49:09'),
(8, 'Lambangsari_Tambun Selatan', '', '-6.27977800', '107.03913900', 2000, '', '2020-04-02 17:50:12'),
(9, 'Mekarsari_Tambung Selatan', '', '-6.25677800', '107.06363900', 2000, '', '2020-04-02 17:52:49'),
(10, 'Mangunjaya_Tambun Selatan ', '', '-6.23713900', '107.05702800', 2000, '', '2020-04-02 17:53:26'),
(11, 'Lambang jaya_Tambung Selatan', '', '-6.29122200', '107.05186100', 2000, '', '2020-04-02 17:54:02'),
(12, 'Wanasari_Cibitung', '', '-6.24813900', '107.08844400', 2000, '', '2020-04-02 17:54:37'),
(13, 'Ds Telaga Murni_Cikarang Barat', '', '-6.25925000', '107.11772200', 2000, '', '2020-04-02 17:47:58'),
(14, 'Sumber jaya_Tambun Selatan', '', '-6.22511100', '107.07680600', 2000, '', '2020-04-02 17:50:12'),
(16, 'Rengas Dengklok', '', '-6.15775600', '107.29399700', 2000, '', '2020-04-03 03:10:16'),
(17, 'Rawamerta', '', '-6.23279300', '107.34749300', 2000, '', '2020-04-03 03:12:42'),
(18, 'Karawang Barat 1', '', '-6.28683100', '107.28355700', 2000, '', '2020-04-03 03:14:52'),
(19, 'Karawang Barat 2', '', '-6.32911600', '107.29184000', 2000, '', '2020-04-03 03:14:52'),
(20, 'Karawang Barat 3', '', '-6.30857600', '107.32266900', 2000, '', '2020-04-03 03:14:52'),
(21, 'Klari', '', '-6.37507500', '107.37238200', 2000, '', '2020-04-03 03:16:57'),
(22, 'Kotabaru', '', '-6.39718400', '107.48419300', 2000, '', '2020-04-03 03:17:29'),
(23, 'Rawamerta', '', '-6.28976800', '107.44697700', 2000, '', '2020-04-03 03:18:07'),
(24, 'Cilebar', '', '-6.22366000', '107.62976300', 2000, '', '2020-04-03 03:18:44'),
(27, 'Cilamaya Kulon', 'Cilamaya Kulon', '-6.21223406', '107.51684189', 2000, 'tes', '2020-04-03 03:25:10');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `nama_pegawai` varchar(70) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `dept` enum('FO','FOC','CONDUCTOR','OFFICE') NOT NULL,
  `lat` decimal(10,8) NOT NULL,
  `lon` decimal(11,8) NOT NULL,
  `notes` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `nama_pegawai`, `nik`, `dept`, `lat`, `lon`, `notes`, `created_at`) VALUES
(1, 'M Yusuf', '', 'FO', '-6.30895900', '107.31845500', '', '2020-04-02 17:22:12'),
(2, 'Ahmad Rohada', '20180041', 'FO', '-6.30380616', '107.31796721', '', '2020-04-02 17:25:59'),
(3, 'Hadied', '', 'FO', '-6.35594400', '107.34292400', '', '2020-04-02 17:35:35'),
(4, 'Ramadika Gustina', '', 'FO', '-6.31111400', '107.32054100', '', '2020-04-02 17:36:38'),
(5, 'Iyan yan', '872154', 'FO', '-6.44742649', '107.38577843', 'Rumah Orang Tua', '2020-04-02 17:38:38'),
(6, 'Ary Satya', '', 'FO', '-6.33021600', '107.31091400', '', '2020-04-02 17:39:29'),
(7, 'Irpan Zipni', '', 'FO', '-6.12831100', '107.32197600', '', '2020-04-02 17:40:24'),
(8, 'Rahmat Yulianto', '', 'FO', '-6.36965000', '107.36468500', '', '2020-04-02 17:41:19'),
(9, 'Galih', '', 'FO', '-6.37084900', '107.39729800', '', '2020-04-02 17:44:41'),
(10, 'Fery Ferdiansyah', '', 'FO', '-6.30921200', '107.28655800', '', '2020-04-02 18:13:48'),
(11, 'Aji Maulanan', '', 'FO', '-6.31007500', '107.30017200', '', '2020-04-02 22:21:43'),
(12, 'Imam Saja Sang SPV', '', 'FO', '-6.33006700', '107.30849800', '', '2020-04-02 22:21:43'),
(13, 'Rahmadi', '', 'FO', '-6.38918100', '107.36139200', '', '2020-04-02 22:22:41'),
(14, 'Ujang Wahyudin', '', 'FO', '-6.44865400', '107.35550200', '', '2020-04-02 22:22:41'),
(15, 'Maulana Yusuf LF', '', 'FO', '-6.38818100', '107.41420800', '', '2020-04-02 22:31:21'),
(16, 'Jaenal Abidin', '', 'FO', '-6.45026800', '107.38473300', '', '2020-04-02 22:35:30'),
(17, 'Wahyu Sutanto', '', 'FO', '-6.24788800', '107.07170500', '', '2020-04-02 22:41:14'),
(18, 'Maulana Yusup', '', 'FO', '-6.32148000', '107.33003000', '', '2020-04-02 22:49:02'),
(19, 'Fawaz', '', 'FO', '-6.28662100', '107.28623200', '', '2020-04-02 22:49:48'),
(20, 'Nana Ruhyana', '', 'FO', '-6.22733900', '107.36988700', '', '2020-04-02 22:50:29'),
(21, 'Muhqmad Ridwan Darmawan', '', 'FO', '-6.40530700', '107.45782200', '', '2020-04-02 22:56:40'),
(22, 'Eka Aji', '', 'FO', '-6.29927100', '107.29829900', '', '2020-04-02 23:02:33'),
(23, 'Rahmat Fauji', '', 'FO', '-6.37325600', '107.38721400', '', '2020-04-02 23:10:08'),
(24, 'Najat', '', 'FO', '-6.41433900', '107.35254500', '', '2020-04-03 00:37:02'),
(25, 'Irman Maulana', '', 'FO', '-6.36775800', '107.52109900', '', '2020-04-03 00:37:31'),
(26, 'Fikri', '', 'FO', '-6.33787000', '107.34081300', '', '2020-04-03 00:38:01'),
(27, 'Yasin', '', 'FO', '-6.40413100', '107.37254900', '', '2020-04-03 00:38:21'),
(28, 'Ivan', '', 'FO', '-6.31858100', '107.30915800', '', '2020-04-03 00:39:24'),
(29, 'Hakim', '', 'FO', '-6.37104000', '107.36796100', '', '2020-04-03 00:40:17'),
(30, 'Ahmad AZIZ', '', 'FO', '-6.31280300', '107.30289800', '', '2020-04-03 00:41:42'),
(31, 'Opik Hermansyah', '', 'FO', '-6.43324300', '107.36465700', '', '2020-04-03 00:43:11'),
(32, 'Usu', '', 'FO', '-6.42481200', '107.37042000', '', '2020-04-03 00:47:24'),
(33, 'Aep Saepudin', '', 'FO', '-6.27397400', '107.33172300', '', '2020-04-03 00:47:54'),
(34, 'Ibnu Khasbuloh', '', 'FO', '-6.33856300', '107.31021300', '', '2020-04-03 00:48:21'),
(35, 'Ahmad Rifai', '', 'FO', '-6.31992900', '107.30739600', '', '2020-04-03 00:49:16'),
(36, 'M Rizky Maulana', '', 'FO', '-6.40554000', '107.46134300', '', '2020-04-03 00:52:46'),
(37, 'Enjah', '', 'FO', '-6.45715200', '107.35253700', '', '2020-04-03 00:52:46'),
(38, 'Budi Mulyana', '', 'FO', '-6.42053600', '107.36732800', '', '2020-04-03 01:35:33'),
(39, 'Firmansyah M', '', 'FO', '-6.37109400', '107.36817800', '', '2020-04-03 01:36:56'),
(40, 'Wandi Hermawan', '', 'FO', '-6.42555700', '107.37103400', '', '2020-04-03 01:37:44'),
(41, 'Ahmad Jamaludin', '', 'FO', '-6.30500000', '107.44088300', '', '2020-04-03 01:51:08'),
(42, 'Andrian Muhamad', '', 'FO', '-6.31663900', '107.38738000', '', '2020-04-03 02:25:19'),
(43, 'Rendy Andika', '', 'FO', '-6.33873600', '107.34350600', '', '2020-04-03 02:25:19'),
(44, 'Angga Restiana', '', 'FO', '-6.40089900', '107.35021700', '', '2020-04-03 02:26:16'),
(45, 'Rendi Sukmana', '', 'FO', '-6.30774900', '107.31374600', '', '2020-04-03 02:26:16'),
(46, 'Rochmanudin', '', 'FO', '-6.45859500', '107.34848000', '', '2020-04-03 02:26:49'),
(47, 'Nurhasan', '', 'FO', '-6.40932600', '107.48526400', '', '2020-04-03 02:29:30'),
(48, 'Candra Gunawan', '', 'FO', '-6.35799700', '107.44793400', '', '2020-04-03 02:32:37'),
(49, 'Aji Permana', '', 'FO', '-6.32046700', '107.37699600', '', '2020-04-03 02:33:48'),
(50, 'Erik Sardiana', '', 'FO', '-6.10753700', '107.37208200', '', '2020-04-03 02:35:59'),
(51, 'Feri Andri Kurniawan', '', 'FO', '-6.33240500', '107.31236000', '', '2020-04-03 02:37:52'),
(52, 'Syam Winarko', '', 'FO', '-6.29515200', '107.29169600', '', '2020-04-03 02:56:15'),
(53, 'Nunu Nugraha', '', 'FO', '-6.41652300', '107.35861000', '', '2020-04-03 03:01:17'),
(54, 'Yoga Tirtana', '', 'FO', '-6.34322500', '107.37183700', '', '2020-04-03 03:05:35'),
(55, 'Syahrudin', '', 'FO', '-6.28146900', '107.43235400', '', '2020-04-03 03:05:56'),
(56, 'M Ridwan / drawing', '', 'FO', '-6.30619100', '107.28792800', '', '2020-04-03 03:07:05'),
(57, 'Ivan ', '', 'FO', '-6.34728400', '107.37070600', '', '2020-04-03 03:07:56'),
(58, 'Dedi Winarto', '', 'FO', '-6.41014500', '107.48324200', '', '2020-04-03 03:08:22'),
(59, 'Rizky Sobary', '', 'FO', '-6.31049200', '107.29416000', '', '2020-04-03 03:22:21'),
(60, 'Fachri', '', 'FO', '-6.36248900', '107.18374000', '', '2020-04-03 03:23:19'),
(61, 'Syahrul', '', 'FO', '-6.52851000', '107.23383200', '', '2020-04-03 03:26:52'),
(62, 'Sandra Sonjaya', '', 'FO', '-6.20911300', '107.36014700', '', '2020-04-03 03:29:03'),
(63, 'Rohatim', '', 'FO', '-6.24601300', '107.35827600', '', '2020-04-03 03:34:53'),
(64, 'Ahmad Hidayat', '', 'FO', '-6.51155300', '107.21098400', '', '2020-04-03 03:35:18'),
(65, 'M Rizki Nugraha', '', 'FO', '-6.33171800', '107.28220800', '', '2020-04-03 03:39:48'),
(67, 'Nugraha', '', 'FO', '-6.37122600', '107.36803100', '', '2020-04-03 03:54:16'),
(68, 'Panggih', '', 'FO', '-6.34188500', '107.38625600', '', '2020-04-03 06:05:22'),
(69, 'Yasin', '', 'FO', '-6.40415000', '107.37264400', '', '2020-04-03 06:05:51'),
(70, 'Ivan Brammasta', '', 'FO', '-6.39191700', '107.48565400', '', '2020-04-03 06:10:22'),
(72, 'Yosep', '', 'FO', '-6.33990400', '107.34719800', '', '2020-04-03 07:42:16'),
(76, 'Ichsan', '', 'CONDUCTOR', '-6.33542400', '107.31013900', '', '0000-00-00 00:00:00'),
(77, 'Arifin', '', 'CONDUCTOR', '-6.35045800', '107.30709500', '', '0000-00-00 00:00:00'),
(78, 'Rofik Safudin', '', 'CONDUCTOR', '-6.41075400', '107.36611000', '', '0000-00-00 00:00:00'),
(79, 'Ayub Abudllah', '', 'CONDUCTOR', '-6.43394500', '107.38741700', '', '0000-00-00 00:00:00'),
(80, 'Bagus Yulianto', '', 'CONDUCTOR', '-6.37965200', '107.39774100', '', '0000-00-00 00:00:00'),
(81, 'Amir Hidayat', '', 'CONDUCTOR', '-6.33217500', '107.31115300', '', '0000-00-00 00:00:00'),
(82, 'Rizky Ahmad Maulana', '', 'CONDUCTOR', '-6.33899800', '107.38345900', '', '0000-00-00 00:00:00'),
(83, 'Dani Hidayat', '', 'CONDUCTOR', '-6.36889500', '107.36922500', '', '0000-00-00 00:00:00'),
(84, 'Teguh Gumilang', '', 'CONDUCTOR', '-6.38258200', '107.51105900', '', '0000-00-00 00:00:00'),
(85, 'Ardiansyah Mulyana Putra', '', 'CONDUCTOR', '-6.40261200', '107.45708700', '', '0000-00-00 00:00:00'),
(86, 'Irfan regi', '', 'CONDUCTOR', '-6.30423200', '107.32537600', '', '0000-00-00 00:00:00'),
(87, 'Sidiq', '', 'CONDUCTOR', '-6.33081000', '107.31046700', '', '0000-00-00 00:00:00'),
(88, 'Abbil Fazrian', '', 'CONDUCTOR', '-6.27657000', '107.34707900', '', '0000-00-00 00:00:00'),
(89, 'Aridho', '', 'CONDUCTOR', '-6.34645300', '107.37593300', '', '0000-00-00 00:00:00'),
(90, 'Malikul Mulki', '', 'CONDUCTOR', '-6.39126300', '107.36153500', '', '0000-00-00 00:00:00'),
(91, 'Haidar', '', 'CONDUCTOR', '-6.37475200', '107.37013900', '', '0000-00-00 00:00:00'),
(92, 'Dicky Setiawan', '', 'CONDUCTOR', '-6.40060300', '107.34772400', '', '0000-00-00 00:00:00'),
(93, 'Aji Prasetyo', '', 'CONDUCTOR', '-6.40876500', '107.35619000', '', '0000-00-00 00:00:00'),
(94, 'Iman', '', 'CONDUCTOR', '-6.31703000', '107.34484200', '', '0000-00-00 00:00:00'),
(95, 'Jastari', '', 'CONDUCTOR', '-6.41484800', '107.36954400', '', '0000-00-00 00:00:00'),
(96, 'Deny Purnama', '', 'CONDUCTOR', '-6.11870600', '107.35444500', '', '0000-00-00 00:00:00'),
(97, 'Wendy', '', 'CONDUCTOR', '-6.31444400', '107.35085600', '', '0000-00-00 00:00:00'),
(98, 'Heri', '', 'CONDUCTOR', '-6.34932800', '107.31046500', '', '0000-00-00 00:00:00'),
(99, 'Abu Rokchan Muslim', '', 'CONDUCTOR', '-6.34195600', '107.37230000', '', '0000-00-00 00:00:00'),
(100, 'Syawaldi', '', 'CONDUCTOR', '-6.35114100', '107.30709500', '', '0000-00-00 00:00:00'),
(101, 'Andika', '', 'FOC', '-6.33006700', '107.34915500', '', '0000-00-00 00:00:00'),
(102, 'Rizky N', '', 'FOC', '-6.33565000', '107.34920000', '', '0000-00-00 00:00:00'),
(103, 'Joe Juanda', '', 'FOC', '-6.33650700', '107.34902000', '', '0000-00-00 00:00:00'),
(104, 'Fedian Ghoziel', '', 'FOC', '-6.28560100', '107.38523100', '', '0000-00-00 00:00:00'),
(105, 'Ari Nazullah', '', 'FOC', '-6.31185900', '107.29258500', '', '0000-00-00 00:00:00'),
(106, 'Raden Rizky', '', 'FOC', '-6.35111600', '107.34202500', '', '0000-00-00 00:00:00'),
(107, 'Adnan', '', 'FOC', '-6.31176600', '107.29292400', '', '0000-00-00 00:00:00'),
(108, 'Upu', '', 'FOC', '-6.32442600', '107.29682400', '', '0000-00-00 00:00:00'),
(109, 'Ahmad P', '', 'FOC', '-6.36449400', '107.33368800', '', '0000-00-00 00:00:00'),
(110, 'Hoerul Saleh', '', 'FOC', '-6.38918300', '107.37702000', '', '0000-00-00 00:00:00'),
(111, 'Mohammad Abghia', '', 'FOC', '-6.36331100', '107.38672300', '', '0000-00-00 00:00:00'),
(112, 'Dadan', '', 'FOC', '-6.35791300', '107.37241200', '', '0000-00-00 00:00:00'),
(113, 'M. Sopandi', '', 'FOC', '-6.32374000', '107.34987000', '', '0000-00-00 00:00:00'),
(114, 'Obay', '', 'FOC', '-6.29111600', '107.40453500', '', '0000-00-00 00:00:00'),
(115, 'Asep', '', 'FOC', '-6.32229700', '107.34308600', '', '0000-00-00 00:00:00'),
(116, 'Agus Sugianto', '', 'FOC', '-6.42086800', '107.36806300', '', '0000-00-00 00:00:00'),
(117, 'Aan', '', 'FOC', '-6.27088000', '107.27320400', '', '0000-00-00 00:00:00'),
(118, 'Azrul', '', 'FOC', '-6.45568400', '107.81735900', '', '0000-00-00 00:00:00'),
(119, 'Abdul Rasa', '', 'FOC', '-6.22596800', '107.35704700', '', '0000-00-00 00:00:00'),
(120, 'Dwi', '', 'FOC', '-6.39384100', '107.36195600', '', '0000-00-00 00:00:00'),
(121, 'Ayub', '', 'FOC', '-6.41709700', '107.35745400', '', '0000-00-00 00:00:00'),
(122, 'Irfan Maulana', '', 'FOC', '-6.35054100', '107.54568400', '', '0000-00-00 00:00:00'),
(123, 'Deden', '', 'FOC', '-6.34270600', '107.38322000', '', '0000-00-00 00:00:00'),
(124, 'Daud', '', 'FOC', '-6.26861700', '107.48857300', '', '0000-00-00 00:00:00'),
(125, 'Edwin', '', 'FOC', '-6.27843300', '107.33455100', '', '0000-00-00 00:00:00'),
(126, 'Rizky  ', '', 'FOC', '-6.33033400', '107.34746200', '', '0000-00-00 00:00:00'),
(127, 'Arman', '', 'FOC', '-6.40890500', '107.35744600', '', '0000-00-00 00:00:00'),
(128, 'Lingga', '', 'FOC', '-6.40850500', '107.53691700', '', '0000-00-00 00:00:00'),
(129, 'Dhean Fernanda', '', 'FOC', '-6.31929200', '107.32760500', '', '0000-00-00 00:00:00'),
(136, 'Derry', '', 'CONDUCTOR', '-6.41600000', '107.46575500', '', '0000-00-00 00:00:00'),
(137, 'Riyan hakiki', '', 'CONDUCTOR', '-6.27200000', '107.54494600', '', '0000-00-00 00:00:00'),
(138, 'Fajar Hatami', '', 'CONDUCTOR', '-6.43000000', '107.35580200', '', '0000-00-00 00:00:00'),
(139, 'Ari handoyo', '', 'CONDUCTOR', '-6.34200000', '107.37479300', '', '0000-00-00 00:00:00'),
(140, 'Aditya Muhammad', '', 'CONDUCTOR', '-6.28200000', '107.38897400', '', '0000-00-00 00:00:00'),
(141, 'Fajar', '', 'CONDUCTOR', '-6.38300000', '107.42355900', '', '0000-00-00 00:00:00'),
(142, 'Huda', '', 'CONDUCTOR', '-6.41400000', '107.45136500', '', '0000-00-00 00:00:00'),
(143, 'Mulyana', '', 'CONDUCTOR', '-6.37600000', '107.37129500', '', '0000-00-00 00:00:00'),
(144, 'Tian Sutiawan', '', 'CONDUCTOR', '-6.30600000', '107.30179000', '', '0000-00-00 00:00:00'),
(145, 'TAufik Kurochman', '', 'CONDUCTOR', '-6.27200000', '107.31226000', '', '0000-00-00 00:00:00'),
(146, 'sumanto', '', 'CONDUCTOR', '-6.33400000', '107.37440900', '', '0000-00-00 00:00:00'),
(147, 'Tessa yuridis', '', 'CONDUCTOR', '-6.38500000', '107.45469100', '', '0000-00-00 00:00:00'),
(148, 'Yoga Prasdika', '', 'CONDUCTOR', '-6.37900000', '107.50946800', '', '0000-00-00 00:00:00'),
(149, 'Hadeni septian', '', 'CONDUCTOR', '-6.48800000', '107.40317500', '', '0000-00-00 00:00:00'),
(150, 'Hermawan Wicaksono', '', 'CONDUCTOR', '-6.17400000', '107.30398000', '', '0000-00-00 00:00:00'),
(151, 'M. Syarifudin', '', 'CONDUCTOR', '-6.29500000', '107.15856300', '', '0000-00-00 00:00:00'),
(152, 'M. Istayamul hasan', '', 'CONDUCTOR', '-6.33300000', '107.31229400', '', '0000-00-00 00:00:00'),
(153, 'M. haidar', '', 'CONDUCTOR', '-6.39300000', '107.45316600', '', '0000-00-00 00:00:00'),
(154, 'Mifah', '', 'CONDUCTOR', '-6.33700000', '107.54566200', '', '0000-00-00 00:00:00'),
(155, 'mulyana', '', 'CONDUCTOR', '-6.37600000', '107.37084200', '', '0000-00-00 00:00:00'),
(156, 'Openra S', '', 'CONDUCTOR', '-6.30400000', '107.33262900', '', '0000-00-00 00:00:00'),
(157, 'Tessa Yuridis', '', 'CONDUCTOR', '-6.38600000', '107.45415000', '', '0000-00-00 00:00:00'),
(158, 'Yoga Prasdika', '', 'CONDUCTOR', '-6.37900000', '107.50878100', '', '0000-00-00 00:00:00'),
(159, 'Aldiansyah', '', 'CONDUCTOR', '-6.30400000', '107.32454200', '', '0000-00-00 00:00:00'),
(160, 'Dadang Irawan', '', 'CONDUCTOR', '-6.44300000', '107.36420600', '', '0000-00-00 00:00:00'),
(161, 'Hendra Komara', '', 'CONDUCTOR', '-6.24700000', '107.18259000', '', '0000-00-00 00:00:00'),
(162, 'Robby Suparwoko', '', 'CONDUCTOR', '-6.41100000', '107.36654600', '', '0000-00-00 00:00:00'),
(163, 'Suherlan', '', 'CONDUCTOR', '-6.26900000', '107.43129600', '', '0000-00-00 00:00:00'),
(164, 'M . fayaz', '', 'CONDUCTOR', '-6.36300000', '107.36457700', '', '0000-00-00 00:00:00'),
(165, 'Mirat Sutisna', '', 'CONDUCTOR', '-6.35000000', '107.30709500', '', '0000-00-00 00:00:00'),
(166, 'M. Genta', '', 'CONDUCTOR', '-6.39100000', '107.36273400', '', '0000-00-00 00:00:00'),
(167, 'Awang Hermawan', '', 'CONDUCTOR', '-6.35000000', '107.30640800', '', '0000-00-00 00:00:00'),
(168, 'Hasdi', '', 'CONDUCTOR', '-6.40600000', '107.35084000', '', '0000-00-00 00:00:00'),
(169, 'Ahmad Rizky', '', 'CONDUCTOR', '-6.25700000', '107.29377400', '', '0000-00-00 00:00:00'),
(170, 'Agus Zaenal Mutakin', '', 'CONDUCTOR', '-6.32200000', '107.27659400', '', '0000-00-00 00:00:00'),
(171, 'Ferdi J', '', 'CONDUCTOR', '-6.38500000', '107.49436900', '', '0000-00-00 00:00:00'),
(201, 'Biyan', '', 'FOC', '-6.34742100', '107.34452600', '', '0000-00-00 00:00:00'),
(202, 'Indra ', '', 'FOC', '-6.32733700', '107.29662200', '', '0000-00-00 00:00:00'),
(203, 'Abi', '', 'FOC', '-6.28827800', '107.38211800', '', '0000-00-00 00:00:00'),
(204, 'Imar', '', 'FOC', '-6.41406000', '107.45668400', '', '0000-00-00 00:00:00'),
(205, 'Aev Burhanudin', '', 'FOC', '-6.40807100', '107.35456900', '', '0000-00-00 00:00:00'),
(206, 'Fatahilla', '', 'FOC', '-6.34243000', '107.30744700', '', '0000-00-00 00:00:00'),
(207, 'Rizky S', '', 'FOC', '-6.34001400', '107.30445600', '', '0000-00-00 00:00:00'),
(208, 'Aldi Aditya', '', 'FOC', '-6.38635200', '999.99999999', '', '0000-00-00 00:00:00'),
(209, 'Afdal', '', 'FOC', '-6.29949000', '107.32365300', '', '0000-00-00 00:00:00'),
(210, 'Agung', '', 'FOC', '-6.35052200', '107.36998400', '', '0000-00-00 00:00:00'),
(211, 'Wijaya', '', 'FOC', '-6.40112400', '107.33938200', '', '0000-00-00 00:00:00'),
(212, 'Yunijar', '', 'FOC', '-6.33910000', '107.33860000', '', '0000-00-00 00:00:00'),
(213, 'Irfan Pristyo', '', 'FOC', '-6.24405600', '106.99347900', '', '0000-00-00 00:00:00'),
(214, 'Fikri Adnan', '', 'FOC', '-6.15263500', '107.29340000', '', '0000-00-00 00:00:00'),
(215, 'Anggi Sopyan', '', 'FOC', '-6.35840700', '107.37213200', '', '0000-00-00 00:00:00'),
(216, 'Afrizal', '', 'FOC', '-6.10797500', '107.37361100', '', '0000-00-00 00:00:00'),
(217, 'Y.Joenadi', '', 'FOC', '-6.30988800', '107.05191300', '', '0000-00-00 00:00:00'),
(218, 'Ramdani', '', 'FOC', '-6.41899800', '107.36787100', '', '0000-00-00 00:00:00'),
(219, 'Abi Lahab', '', 'FOC', '-6.28710200', '107.38155800', '', '0000-00-00 00:00:00'),
(220, 'Aldi Reynaldi', '', 'FOC', '-6.31750000', '107.29508100', '', '0000-00-00 00:00:00'),
(221, 'Pauji', '', 'FOC', '-6.33726400', '107.28941400', '', '0000-00-00 00:00:00'),
(222, 'Angga Ridwanto', '', 'FOC', '-6.33513300', '107.30102700', '', '0000-00-00 00:00:00'),
(223, 'Ricky Setiawan', '', 'FOC', '-6.36525400', '107.40581600', '', '0000-00-00 00:00:00'),
(224, 'Proyoga', '', 'FOC', '-6.36118500', '107.37875000', '', '0000-00-00 00:00:00'),
(225, 'Adji', '', 'FOC', '-6.35004600', '107.32335000', '', '0000-00-00 00:00:00'),
(226, 'YayaPermana', '', 'FOC', '-6.45470900', '107.38474600', '', '0000-00-00 00:00:00'),
(227, 'Nur Cahyo', '', 'FOC', '-6.38857700', '107.36148700', '', '0000-00-00 00:00:00'),
(228, 'Bachtiar Rifai', '', 'FOC', '-6.39996300', '107.45485000', '', '0000-00-00 00:00:00'),
(229, 'Chandra Firmansyah', '', 'FOC', '-6.32504300', '107.32492600', '', '0000-00-00 00:00:00'),
(289, 'Muntakad ', '', 'FOC', '-6.32738800', '107.30194900', '', '0000-00-00 00:00:00'),
(290, 'Muthi', '', 'FOC', '-6.28064700', '107.33377900', '', '0000-00-00 00:00:00'),
(291, 'Agus', '', 'FOC', '-6.33357900', '107.28870200', '', '0000-00-00 00:00:00'),
(292, 'Fajar', '', 'FOC', '-6.35540700', '107.31079000', '', '0000-00-00 00:00:00'),
(293, 'Simon', '', 'FOC', '-6.34805100', '107.38638700', '', '0000-00-00 00:00:00'),
(294, 'Dede ', '', 'FOC', '-6.28608600', '107.28258500', '', '0000-00-00 00:00:00'),
(295, 'Deni Imam', '', 'FOC', '-6.33881100', '107.31317400', '', '0000-00-00 00:00:00'),
(296, 'Sakum', '2019', 'FO', '-6.37833100', '107.23214600', '', '2020-04-05 04:37:08'),
(297, 'Kadaris', '', 'CONDUCTOR', '-6.38007300', '107.37227800', '', '2020-04-05 07:17:59'),
(298, 'Ibnu Hisam', '', 'CONDUCTOR', '-6.35362100', '107.30828300', '', '2020-04-05 07:17:59'),
(299, 'Alsyaf', '', 'CONDUCTOR', '-6.33559100', '107.34926400', '', '2020-04-05 07:17:59'),
(300, 'wahyudin', '', 'CONDUCTOR', '-6.35134200', '107.36946100', '', '2020-04-05 07:17:59'),
(301, 'lilik', '', 'CONDUCTOR', '-6.27000700', '107.33388400', '', '2020-04-05 07:17:59'),
(302, 'tito', '', 'CONDUCTOR', '-6.33069400', '999.99999999', '', '2020-04-05 07:17:59'),
(303, 'Adi', '', 'CONDUCTOR', '-6.30462900', '107.29737900', '', '2020-04-05 07:17:59'),
(304, 'Mudasir', '', 'CONDUCTOR', '-6.33994300', '107.34789400', '', '2020-04-05 07:17:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `corona`
--
ALTER TABLE `corona`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lat` (`lat`,`lon`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lat` (`lat`,`lon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `corona`
--
ALTER TABLE `corona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=305;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;