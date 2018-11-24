-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Okt 2018 pada 18.31
-- Versi Server: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `data_basket`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `club`
--

CREATE TABLE `club` (
  `id` int(11) NOT NULL,
  `id_user` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `club`
--

INSERT INTO `club` (`id`, `id_user`, `nama`, `telp`, `alamat`, `lat`, `long`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Setia Budi United', '082245469678', 'Jl. Setia Budi No.54, Pemecutan Kaja, Denpasar Utara, Kota Denpasar, Bali 80111, Indonesia', '-8.648643', '115.209099', 'adsa asd as sad\r\nas\r\nsa\r\nsa\r\n5555\r\nasdasd', 1, '2018-10-13 04:32:36', '2018-10-19 15:25:38');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_club`
--

CREATE TABLE `foto_club` (
  `id` int(11) NOT NULL,
  `id_club` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_club`
--

INSERT INTO `foto_club` (`id`, `id_club`, `file`, `created_at`, `updated_at`) VALUES
(5, 1, '60261b5c350e5a943a76cfdf6de7dbb0.jpg', '2018-10-16 10:36:04', '2018-10-16 10:36:04'),
(6, 1, '1a8293dca1000ae6143b6dd8e04f0ee9.jpg', '2018-10-16 10:36:41', '2018-10-16 10:36:41'),
(7, 1, '055fa1fe61d8994f879152055a9405d4.jpg', '2018-10-20 10:40:46', '2018-10-20 10:40:46');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_lapangan`
--

CREATE TABLE `foto_lapangan` (
  `id` int(11) NOT NULL,
  `id_lapangan` int(11) DEFAULT NULL,
  `file` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_lapangan`
--

INSERT INTO `foto_lapangan` (`id`, `id_lapangan`, `file`, `created_at`, `updated_at`) VALUES
(2, 2, 'b07aa3e30bb5a9799d9b077fa0e78f41.jpg', '2018-10-20 10:42:25', '2018-10-20 10:42:25'),
(3, 2, '13de6da3597e4ff6d7afd3959c084457.jpg', '2018-10-20 10:42:31', '2018-10-20 10:42:31'),
(4, 2, 'ed6798c57d057c009b3600c14b3f4a44.jpg', '2018-10-20 10:42:39', '2018-10-20 10:42:39'),
(5, 2, '52534c3a41fa5e1b733f6bc0b662eafe.jpg', '2018-10-20 10:42:49', '2018-10-20 10:42:49'),
(14, 1, '79aa7eb0f47830e08970ee612baa489a.jpg', '2018-10-20 10:49:44', '2018-10-20 10:49:44'),
(15, 1, 'd8e1157e94dfba9f5707b3b74fbad683.jpg', '2018-10-20 10:49:52', '2018-10-20 10:49:52'),
(16, 1, '3852a5d4bd8a23d342c0db722a66f19f.jpg', '2018-10-20 10:49:57', '2018-10-20 10:49:57'),
(17, 1, '7b0d97f3c2344582e5fc0081b5ec146a.jpg', '2018-10-20 10:50:02', '2018-10-20 10:50:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lapangan`
--

CREATE TABLE `lapangan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama`, `alamat`, `lat`, `long`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GOR Lila Bhuana', 'Jl. WR Supratman No.1b, Dangin Puri Kangin', '-8.649321', '115.223004', 'asdsa \r\nas\r\nds\r\nd\r\nas\r\nd\r\n\r\n\r\nasdasdasd', 1, '2018-10-12 00:39:35', '2018-10-12 01:10:02'),
(2, 'Lapangan Bola', 'KEBUN ARY, Jl. Kecubung, Sumerta Kaja, Denpasar Tim., Kota Denpasar, Bali 80236, Indonesia', '-8.654455', '115.229785', 'asdasd\r\nas\r\ndas\r\nd\r\nasd\r\n\r\n\r\nasdasdasdasd\r\nasdsa', 1, '2018-10-13 04:29:52', '2018-10-13 04:29:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `news`
--

INSERT INTO `news` (`id`, `id_club`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'ada anak ayam nyebrang mati 1 tinggal induknya.', 1, '2018-10-22 08:21:32', '2018-10-22 08:25:59'),
(2, 1, 'ada berita kecelakaan di renon. sorang wanita tewas tercebur ke got. dan akhirnya ada yang menolongnya', 1, '2018-10-22 08:24:45', '2018-10-22 08:24:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(11) NOT NULL,
  `id_club` int(11) DEFAULT NULL,
  `keterangan` text,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `review`
--

INSERT INTO `review` (`id`, `id_lapangan`, `id_club`, `rating`, `review`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5, 'Lapangan yang bagus. banyak lendir berserakan. malem-malem banyak orang suka esek esek disini.', 1, '2018-10-20 08:36:09', '2018-10-20 08:36:09'),
(2, 1, 1, 3, 'asdsad', 1, '2018-10-20 09:14:29', '2018-10-20 09:14:29'),
(3, 1, 1, 5, 'qwewqeasd', 1, '2018-10-20 09:14:37', '2018-10-20 09:14:37'),
(4, 2, 1, 5, 'banyak spot buat esek esek', 1, '2018-10-20 10:29:29', '2018-10-20 10:29:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `id_lapangan` int(11) NOT NULL,
  `id_club` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `keterangan` text,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `schedule`
--

INSERT INTO `schedule` (`id`, `id_lapangan`, `id_club`, `tgl`, `start`, `end`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2018-10-21', '14:30:00', '17:00:00', NULL, 1, '2018-10-16 10:16:17', '2018-10-17 07:45:07'),
(2, 1, 1, '2018-10-20', '13:00:00', '16:00:00', NULL, 1, '2018-10-17 07:49:43', '2018-10-17 07:50:09'),
(3, 2, 1, '2018-10-21', '13:00:00', '16:00:00', NULL, 1, '2018-10-17 07:50:42', '2018-10-17 07:50:55'),
(4, 2, 1, '2018-10-18', '13:00:00', '15:30:00', 'bentrok dengan jadwal club lain', 0, '2018-10-17 07:52:01', '2018-10-17 07:52:11'),
(5, 1, 1, '2018-10-20', '14:00:00', '17:30:00', 'terlalu banyak kau punya jadwal', 0, '2018-10-17 07:52:37', '2018-10-17 08:02:11'),
(6, 1, 1, '2018-10-24', '00:30:00', '08:00:00', NULL, 1, '2018-10-22 08:09:11', '2018-10-22 08:09:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `last_login_ip` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `isActive`, `type`, `last_login_ip`, `last_login_at`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@mail.com', '$2y$10$rX1O9zLjWPx32FbQVXhO6u5CEybOqa.UdQ157NOSuBUdqs7iRzFT2', 1, 1, 'localhost', '2018-10-24 10:00:42', '2018-10-10 21:28:22', '2018-10-24 10:00:42'),
(3, 'Setia Budi United', 'club@mail.com', '$2y$10$rOnNWeipS4dfi/RC6cSYOOsPrUMGq4VirltZMlyNg5pzo83JwXKou', 1, 2, 'localhost', '2018-10-22 08:07:08', '2018-10-13 04:32:36', '2018-10-22 08:07:08'),
(4, 'asdasd', 'asdasd@mail.com', '$2y$10$5PUElgPI.kry3TKMYSVQPuV.OUSe9lyXx7BhheCz9oWr7kj8Fi6dm', 1, 1, NULL, NULL, '2018-10-14 23:02:26', '2018-10-14 23:20:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `club`
--
ALTER TABLE `club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_club`
--
ALTER TABLE `foto_club`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foto_lapangan`
--
ALTER TABLE `foto_lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lapangan`
--
ALTER TABLE `lapangan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `club`
--
ALTER TABLE `club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `foto_club`
--
ALTER TABLE `foto_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `foto_lapangan`
--
ALTER TABLE `foto_lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `lapangan`
--
ALTER TABLE `lapangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
