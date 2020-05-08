-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 08, 2020 at 07:03 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dwp`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `jenis_berita_id` int(11) NOT NULL,
  `isi_berita` longtext NOT NULL,
  `file_lampiran` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id`, `judul`, `jenis_berita_id`, `isi_berita`, `file_lampiran`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(35, 'sdfsd', 3, 'Surabaya - Crazy rich Surabaya membagikan sembako dan uang di Surabaya bertujuan untuk membantu warga dan pekerja yang terdampak COVID-19. Selain itu, ia juga ingin merespons video viral di Bandung terkait YouTuber yang membuat konten prank bagi-bagi sembako isi sampah.\r\n\"Itu konten yang tidak mendidik. Seharusnya sebagai YouTuber kita harus membuat konten yang bermanfaat,\" kata salah satu pria di video, Tomli Wafa, kepada detikcom, Rabu (6/5/2020).\r\n\r\nWafa yang juga seorang YouTuber menilai membuat konten prank dengan mengecewakan orang lain apalagi saat musim pandemi COVID-19 sangat tidak mendidik.', 'ABSEN BARU.docx', 1588751506, 1588751506, NULL, NULL),
(36, 'sdfsd2', 3, 'Wafa menjelaskan dirinya memang tidak membawa banyak bantuan sembako. Ia hanya membawa 6 kardus mi instan, 6 karung beras 5 kg, dan sejumlah uang yang dimasukkan di dalam kardus mi instan tersebut.\r\n\r\n\"Kami berikan kepada 6 orang. Masing-masing kami kasih beras, mi instan sama uangnya yang ada di dalam kardusnya. Murni bantuan dari saya pribadi,\" pungkas Wafa.', 'aula perpus.docx', 1588753029, 1588753029, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(191) NOT NULL,
  `keterangan` text,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `keterangan`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(3, 'Horor', 'ada hantu', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `berita_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `isi_komentar` text NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `komentar`
--

INSERT INTO `komentar` (`id`, `berita_id`, `nama`, `email`, `isi_komentar`, `created_at`) VALUES
(3, 35, 'johan', 'johan@gmail.com', 'asdasdasdasdasda', 1588751857),
(5, 36, 'koko', 'koko@gmail.com', 'komentaarr aja lah', 1588753056),
(6, 36, 'bidu', 'bidu@gmail.com', 'Mantul Keren bnget ni berita', 1588863773),
(21, 36, '', '', 'Mantul Keren bnget ni beritadsa', 1588866026),
(22, 35, '', '', 'padahhashdas', 1588866060),
(23, 35, '', '', 'dasdasdsfdf', 1588866816),
(24, 35, '', '', 'dasdasdsfdftgtg', 1588866822),
(25, 35, '', '', 'dasdasdsfdftgtgyyyyy', 1588866849),
(26, 35, '', '', 'ttttt', 1588866882),
(27, 35, '', '', 'tttttsss', 1588938870);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `verification_token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `verification_token`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(2, 'budikdddd', 'johan2', 'NZIgPpoQvHQ-do_xOXPKLgUBqYS_JaD0', '$2y$13$7ZK/y.rfXKbXQKAhbNQFYuffgEW5faVOouJKbOF8/JbNxKpq2P1B.', NULL, 'johanfilm99@gmail.com', 10, 'eVKlIJdeJatAwna6HsKLr8ZikfubC4Cg_1588662674', 1588662674, 1588662674, NULL, NULL),
(11, NULL, 'budieeee', 'R5FYu5R4fdrEk1g00zHEnMCXw4LBFAnP', '$2y$13$6yQuw2hgdgxA9q6QNW.Os.Wj1HjjxdsrEVz.EKHszhV9/X5GQ8/VK', NULL, 'johaneeeee@gmail.com', 10, 'fYpO5w5Q4h1M2FGF-HDsZ_6xPHT6o_Qs_1588746222', 1588746222, 1588746222, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`),
  ADD KEY `jenis_berita_id` (`jenis_berita_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `created_by` (`created_by`),
  ADD KEY `updated_by` (`updated_by`);

--
-- Indexes for table `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `berita_id` (`berita_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `berita_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `berita_ibfk_3` FOREIGN KEY (`jenis_berita_id`) REFERENCES `kategori` (`id`);

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_ibfk_1` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `kategori_ibfk_2` FOREIGN KEY (`updated_by`) REFERENCES `user` (`id`);

--
-- Constraints for table `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`berita_id`) REFERENCES `berita` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
