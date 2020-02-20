-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Okt 2019 pada 09.05
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pinder`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_assessment`
--

CREATE TABLE `tb_assessment` (
  `assessment_id` bigint(20) NOT NULL,
  `assessment_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `body_balance` int(11) NOT NULL,
  `leap` int(11) NOT NULL,
  `running_speed` int(11) NOT NULL,
  `agility` int(11) NOT NULL,
  `stamina` int(11) NOT NULL,
  `dribble` int(11) NOT NULL,
  `shooting_accuracy` int(11) NOT NULL,
  `passing_accuracy` int(11) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `player_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_assessment`
--

INSERT INTO `tb_assessment` (`assessment_id`, `assessment_date`, `body_balance`, `leap`, `running_speed`, `agility`, `stamina`, `dribble`, `shooting_accuracy`, `passing_accuracy`, `user_id`, `player_id`) VALUES
(37, '2019-08-09 10:38:45', 12, 90, 17, 28, 3380, 8, 10, 45, 5, 39),
(38, '2019-08-09 10:39:22', 22, 152, 18, 28, 3390, 9, 20, 42, 5, 41),
(41, '2019-08-09 10:44:22', 21, 156, 17, 27, 3360, 8, 18, 40, 3, 28),
(42, '2019-08-09 10:45:14', 14, 90, 15, 27, 3370, 9, 14, 35, 3, 33),
(43, '2019-08-09 10:46:08', 18, 122, 15, 17, 3350, 6, 9, 22, 3, 34),
(44, '2019-08-09 10:46:58', 14, 130, 15, 27, 3280, 7, 18, 32, 3, 35),
(45, '2019-08-09 10:47:41', 24, 164, 8, 12, 2500, 5, 9, 21, 3, 38),
(46, '2019-08-09 11:58:22', 23, 155, 8, 13, 2219, 5, 9, 24, 5, 42),
(47, '2019-08-09 12:02:05', 12, 90, 25, 28, 3365, 10, 9, 45, 5, 53);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_criteria`
--

CREATE TABLE `tb_criteria` (
  `criteria_id` int(11) NOT NULL,
  `body_balance` enum('1','2','3','4','5') NOT NULL,
  `leap` enum('1','2','3','4','5') NOT NULL,
  `running_speed` enum('1','2','3','4','5') NOT NULL,
  `agility` enum('1','2','3','4','5') NOT NULL,
  `stamina` enum('1','2','3','4','5') NOT NULL,
  `dribble` enum('1','2','3','4','5') NOT NULL,
  `shooting_accuracy` enum('1','2','3','4','5') NOT NULL,
  `passing_accuracy` enum('1','2','3','4','5') NOT NULL,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_criteria`
--

INSERT INTO `tb_criteria` (`criteria_id`, `body_balance`, `leap`, `running_speed`, `agility`, `stamina`, `dribble`, `shooting_accuracy`, `passing_accuracy`, `last_updated`) VALUES
(1, '4', '5', '4', '3', '3', '3', '4', '4', '2019-08-07 16:46:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_player`
--

CREATE TABLE `tb_player` (
  `player_id` bigint(20) NOT NULL,
  `periode` year(4) NOT NULL,
  `player_fullname` varchar(50) NOT NULL,
  `player_gender` enum('M','F') NOT NULL,
  `born` varchar(30) NOT NULL,
  `player_origin` varchar(50) NOT NULL,
  `player_weight` double NOT NULL,
  `player_height` double NOT NULL,
  `player_avatar` text NOT NULL,
  `player_card` text NOT NULL,
  `birth_certificate` text NOT NULL,
  `player_note` text NOT NULL,
  `player_status` enum('Belum Dikonfirmasi','diterima','ditolak') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_player`
--

INSERT INTO `tb_player` (`player_id`, `periode`, `player_fullname`, `player_gender`, `born`, `player_origin`, `player_weight`, `player_height`, `player_avatar`, `player_card`, `birth_certificate`, `player_note`, `player_status`) VALUES
(28, 2019, 'M. Rafel A.A\r\n', 'M', '2004-02-04', 'SMAN 7 Malang', 90, 186, '20a6cad2-4bbf-4640-bbcd-c748eabcd6a3.jpg', '85e4d196-b1d0-4bc8-9ba7-6a7092a4a005.jpg', '90a87d54-2cfe-4b46-a922-d5bf3007b9d6.jpg', '', 'diterima'),
(33, 2019, 'Caesar Nafiansyah P.\r\n', 'M', '2003-10-31', 'SMAN 7 MALANG', 65, 179, 'd40723b1-d705-4935-a426-1a5128eefb63.jpg', '6bdd224e-6864-4c53-aeed-c165f604c007.jpg', '54d231bc-5648-4fa3-944c-0789a509c80f.jpg', '', 'diterima'),
(34, 2019, 'Niko Candra A', 'M', '2001-11-18', 'SMAN 7 Malang', 67, 177, '4e761c02-2a74-4b6b-b5f0-527556f5b5f2.jpg', '1560841736233.jpg', '54d231bc-5648-4fa3-944c-0789a509c80f.jp', '', 'diterima'),
(35, 2019, 'Razzan Wiragani A.', 'M', '2001-12-28', 'SMAN 8 Malang', 65, 180, '8f594bef-8d35-4643-bb22-f6017936f460.jpg', '907435f7-c366-4e6b-8fe2-c925ba649806.jpg', 'a1a83353-addf-45c3-9c71-67de48074b05.jpg', '', 'diterima'),
(38, 2019, '	\r\nPatrick M.P.L.P', 'M', '2002-06-09', 'SMAN 8 Malang', 63, 178, 'IMG-20190610-WA00081.jpg', 'IMG-20190610-WA0009.jpg', 'IMG-20190610-WA0004.jpg', '', 'diterima'),
(39, 2019, 'Airlangga Daniswara', 'M', '2019-08-01', 'SMAN 9 Malang', 90, 190, 'IMG-20190610-WA00081.jpg', 'IMG-20190610-WA00124.jpg', 'IMG-20190610-WA0004.jpg', '', 'diterima'),
(41, 2019, 'Muhammad Fadhil Arfinza Fawwazi', 'M', '2002-12-12', 'SMAN 8 Malang', 80, 190, 'IMG-20190610-WA00062.jpg', 'IMG-20190610-WA00135.jpg', 'IMG-20190610-WA00126.jpg', '', 'diterima'),
(42, 2019, 'Ryan Mahardika A.R', 'M', '2001-12-12', 'SMAN 9 Malang', 50, 150, '	\r\nIMG-20190610-WA0031.jpg', 'IMG-20190610-WA00128.jpg', 'IMG-20190610-WA00127.jpg', 'lanjutkan', 'diterima'),
(53, 2019, 'Dimas Adi Pratama', 'M', '2002-08-12', 'SMAN 9 Malang', 167, 56, 'IMG-20190610-WA0029.jpg', 'IMG-20190610-WA0032.jpg', 'IMG-20190610-WA00282.jpg', '', 'diterima'),
(55, 2019, 'Muhammad Ilham Hilmi', 'M', '2002-12-28', 'SMAN 5 Malang', 67, 170, 'a2.jpg', 'IMG-20190618-WA00041.jpg', '1560842852481.jpg\r\n', '', 'Belum Dikonfirmasi'),
(56, 2019, 'Muhammad Rifqi Alhusaini', 'M', '2002-06-28', 'SMAN 5 Malang', 65, 169, 'IMG-20190610-WA00026.jpg', 'IMG-20190610-WA00016.jpg', 'IMG-20190610-WA00281.jpg', '', ''),
(57, 2019, 'Matius Herenda Madi', 'M', '2002-05-27', 'SMAN 5 Malang', 56, 170, 'IMG-20190610-WA00332.jpg', 'IMG-20190610-WA00052.jpg', 'IMG-20190610-WA00151.jpg', '', 'diterima'),
(58, 2019, 'Muhammad Zain Fathani', 'M', '2003-05-24', 'SMAN 5 Malang', 60, 176, '111111.jpg', 'IMG-20190610-WA00273.jpg', '1560838719826.jpg', '', 'Belum Dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_result`
--

CREATE TABLE `tb_result` (
  `result_id` bigint(20) NOT NULL,
  `result_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `result_point` int(11) NOT NULL,
  `result_position` enum('PG','SG','SF','PF','C') NOT NULL,
  `result_confirmation` enum('N','Y') NOT NULL DEFAULT 'N',
  `assessment_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_result`
--

INSERT INTO `tb_result` (`result_id`, `result_date`, `result_point`, `result_position`, `result_confirmation`, `assessment_id`) VALUES
(56, '2019-08-09 10:38:45', 0, 'PG', 'N', 37),
(57, '2019-08-09 10:39:22', 6, 'PG', 'N', 38),
(58, '2019-08-09 10:39:22', 7, 'SG', 'N', 38),
(59, '2019-08-09 10:39:22', 7, 'SF', 'N', 38),
(60, '2019-08-09 11:09:40', 12, 'PF', 'Y', 38),
(61, '2019-08-09 10:39:22', 15, 'C', 'N', 38),
(64, '2019-08-09 10:44:22', 6, 'PG', 'N', 41),
(65, '2019-08-09 10:44:22', 7, 'SG', 'N', 41),
(66, '2019-08-09 10:44:22', 7, 'SF', 'N', 41),
(67, '2019-08-09 11:09:42', 12, 'PF', 'Y', 41),
(68, '2019-08-09 10:44:22', 15, 'C', 'N', 41),
(69, '2019-08-09 10:45:14', 0, 'SG', 'N', 42),
(70, '2019-08-09 10:46:08', 0, 'PF', 'N', 43),
(71, '2019-08-09 10:46:58', 0, 'SF', 'N', 44),
(72, '2019-08-09 10:47:41', 0, 'C', 'N', 45),
(73, '2019-08-09 11:58:22', 0, 'C', 'N', 46),
(74, '2019-08-09 12:02:05', 0, 'PG', 'N', 47);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_setting`
--

CREATE TABLE `tb_setting` (
  `setting_id` int(11) NOT NULL,
  `setting_name` varchar(30) NOT NULL,
  `setting_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_setting`
--

INSERT INTO `tb_setting` (`setting_id`, `setting_name`, `setting_value`) VALUES
(1, 'assessment_status', 'false');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `user_id` bigint(20) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_title` varchar(25) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_role` enum('0','1','2') NOT NULL DEFAULT '0',
  `user_registered` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_avatar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`user_id`, `user_fullname`, `user_title`, `user_email`, `user_password`, `user_role`, `user_registered`, `user_avatar`) VALUES
(1, 'Administrator', 'Administrator', 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', '2018-10-19 01:13:24', ''),
(2, 'Ryan Firdaus', 'SMAN 8 Malang', 'smarihasta@gmail.com', '4f45b4420a4ae1ed81d1762be42b9cd2', '1', '2018-10-25 19:21:28', ''),
(3, 'SMAN7', 'SMAN 7 MALANG', 'sabhatansa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2018-10-25 19:23:17', ''),
(4, 'Perbasi', 'Pelatih Kota', 'perbasimalang@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2', '2018-11-19 13:47:31', ''),
(5, 'SMAN9', 'SMAN 9 Malang', 'smanawa@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2018-12-10 15:47:45', ''),
(6, 'SMAN5', 'SMAN 5 Malang', 'smala@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2019-06-18 13:23:16', ''),
(7, 'sabilillah', 'sabilillah', 'ryan@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '1', '2019-08-02 07:01:39', '');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_assessment`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_assessment` (
`assessment_id` bigint(20)
,`assessment_date` datetime
,`body_balance` int(11)
,`leap` int(11)
,`running_speed` int(11)
,`agility` int(11)
,`stamina` int(11)
,`dribble` int(11)
,`shooting_accuracy` int(11)
,`passing_accuracy` int(11)
,`user_id` bigint(20)
,`player_id` bigint(20)
,`player_fullname` varchar(50)
,`player_gender` enum('M','F')
,`player_origin` varchar(50)
,`player_weight` double
,`player_height` double
,`player_avatar` text
,`player_note` text
,`born` varchar(30)
,`player_status` enum('Belum Dikonfirmasi','diterima','ditolak')
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_result`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_result` (
`result_id` bigint(20)
,`result_date` datetime
,`result_point` int(11)
,`result_position` enum('PG','SG','SF','PF','C')
,`result_confirmation` enum('N','Y')
,`assessment_id` bigint(20)
,`assessment_date` datetime
,`body_balance` int(11)
,`leap` int(11)
,`running_speed` int(11)
,`agility` int(11)
,`stamina` int(11)
,`dribble` int(11)
,`shooting_accuracy` int(11)
,`passing_accuracy` int(11)
,`user_id` bigint(20)
,`player_id` bigint(20)
,`player_fullname` varchar(50)
,`player_gender` enum('M','F')
,`player_origin` varchar(50)
,`player_weight` double
,`player_height` double
,`player_avatar` text
,`player_note` text
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_assessment`
--
DROP TABLE IF EXISTS `v_assessment`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_assessment`  AS  select `a`.`assessment_id` AS `assessment_id`,`a`.`assessment_date` AS `assessment_date`,`a`.`body_balance` AS `body_balance`,`a`.`leap` AS `leap`,`a`.`running_speed` AS `running_speed`,`a`.`agility` AS `agility`,`a`.`stamina` AS `stamina`,`a`.`dribble` AS `dribble`,`a`.`shooting_accuracy` AS `shooting_accuracy`,`a`.`passing_accuracy` AS `passing_accuracy`,`a`.`user_id` AS `user_id`,`p`.`player_id` AS `player_id`,`p`.`player_fullname` AS `player_fullname`,`p`.`player_gender` AS `player_gender`,`p`.`player_origin` AS `player_origin`,`p`.`player_weight` AS `player_weight`,`p`.`player_height` AS `player_height`,`p`.`player_avatar` AS `player_avatar`,`p`.`player_note` AS `player_note`,`p`.`born` AS `born`,`p`.`player_status` AS `player_status` from (`tb_assessment` `a` join `tb_player` `p`) where (`a`.`player_id` = `p`.`player_id`) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_result`
--
DROP TABLE IF EXISTS `v_result`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_result`  AS  select `r`.`result_id` AS `result_id`,`r`.`result_date` AS `result_date`,`r`.`result_point` AS `result_point`,`r`.`result_position` AS `result_position`,`r`.`result_confirmation` AS `result_confirmation`,`a`.`assessment_id` AS `assessment_id`,`a`.`assessment_date` AS `assessment_date`,`a`.`body_balance` AS `body_balance`,`a`.`leap` AS `leap`,`a`.`running_speed` AS `running_speed`,`a`.`agility` AS `agility`,`a`.`stamina` AS `stamina`,`a`.`dribble` AS `dribble`,`a`.`shooting_accuracy` AS `shooting_accuracy`,`a`.`passing_accuracy` AS `passing_accuracy`,`a`.`user_id` AS `user_id`,`p`.`player_id` AS `player_id`,`p`.`player_fullname` AS `player_fullname`,`p`.`player_gender` AS `player_gender`,`p`.`player_origin` AS `player_origin`,`p`.`player_weight` AS `player_weight`,`p`.`player_height` AS `player_height`,`p`.`player_avatar` AS `player_avatar`,`p`.`player_note` AS `player_note` from ((`tb_assessment` `a` join `tb_player` `p`) join `tb_result` `r`) where ((`r`.`result_confirmation` = 'Y') and (`r`.`assessment_id` = `a`.`assessment_id`) and (`a`.`player_id` = `p`.`player_id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_assessment`
--
ALTER TABLE `tb_assessment`
  ADD PRIMARY KEY (`assessment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `player_id` (`player_id`);

--
-- Indeks untuk tabel `tb_criteria`
--
ALTER TABLE `tb_criteria`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indeks untuk tabel `tb_player`
--
ALTER TABLE `tb_player`
  ADD PRIMARY KEY (`player_id`);

--
-- Indeks untuk tabel `tb_result`
--
ALTER TABLE `tb_result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `assessment_id` (`assessment_id`);

--
-- Indeks untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_assessment`
--
ALTER TABLE `tb_assessment`
  MODIFY `assessment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT untuk tabel `tb_criteria`
--
ALTER TABLE `tb_criteria`
  MODIFY `criteria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_player`
--
ALTER TABLE `tb_player`
  MODIFY `player_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `tb_result`
--
ALTER TABLE `tb_result`
  MODIFY `result_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `tb_setting`
--
ALTER TABLE `tb_setting`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `user_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_assessment`
--
ALTER TABLE `tb_assessment`
  ADD CONSTRAINT `tb_assessment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tb_user` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tb_assessment_ibfk_2` FOREIGN KEY (`player_id`) REFERENCES `tb_player` (`player_id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_result`
--
ALTER TABLE `tb_result`
  ADD CONSTRAINT `tb_result_ibfk_1` FOREIGN KEY (`assessment_id`) REFERENCES `tb_assessment` (`assessment_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
