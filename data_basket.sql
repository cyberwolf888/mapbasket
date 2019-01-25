-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 25 Jan 2019 pada 05.53
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
  `pelatih` varchar(255) DEFAULT NULL,
  `iuran` int(11) DEFAULT NULL,
  `type_iuran` tinyint(1) DEFAULT NULL,
  `jml_anggota` int(11) DEFAULT NULL,
  `recruitment` tinyint(1) DEFAULT NULL,
  `difable` tinyint(1) NOT NULL DEFAULT '0',
  `keterangan` text NOT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `club`
--

INSERT INTO `club` (`id`, `id_user`, `nama`, `telp`, `alamat`, `lat`, `long`, `pelatih`, `iuran`, `type_iuran`, `jml_anggota`, `recruitment`, `difable`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'Setia Budi United', '082245469678', 'Jl. Setia Budi No.54, Pemecutan Kaja, Denpasar Utara, Kota Denpasar, Bali 80111, Indonesia', '-8.648643', '115.209099', NULL, 50000, 1, 500, 1, 1, 'adsa asd as sad\r\nas\r\nsa\r\nsa\r\n5555\r\nasdasd', 1, '2018-10-13 04:32:36', '2019-01-25 04:53:04'),
(2, 5, 'Satria Muda', '084453736223', 'Jl. Blambangan No.271A, Dauh Puri Kaja, Denpasar Utara, Kota Denpasar, Bali 80361, Indonesia', '-8.636084', '115.209014', 'Bung Doel', 300000, 1, 51, 1, 0, 'Satria Muda Pertamina adalah klub bola basket profesional yang bermain pada Liga Bola Basket Indonesia yang berasal dari Jakarta.\r\n\r\nAwalnya dikenal sebagai Satria Muda Mahaka (Mahaka merupakan yayasan menjadi sponsor awal), dan mengikuti Liga basket pertama Kobatama pada tahun 1993. Satria Muda Mahaka memenangkan gelar Kobatama lima tahun kemudian.\r\n\r\nSatria Muda kemudian bermain di Indonesian Basketball League pada tahun 2003. Setahun kemudian, Bank Rakyat Indonesia, melalui merek BritAma, menjadi sponsor utama tim ini, dan sejak itu identitas tim berubah menjadi Satria Muda BritAma. Kemudian pada 2015, Pertamina, menjadi sponsor utama tim, dan nama tim kembali mengalami perubahan yaitu menjadi Satria Muda Pertamina.\r\n\r\nSatria Muda telah memenangkan empat gelar domestik (2004, 2006, 2008 dan 2009) dan juga memenangkan Piala SEABA Champions pada tahun 2008 setelah mengalahkan Harbour Centre Batang Pier dari Asean Basket Powerhouse Filipina.', 1, '2018-11-29 08:15:26', '2018-11-29 08:15:26'),
(3, 6, 'Garuda Denpasar', '081332456876', 'Jl. Cekomaria No.3, Peguyangan Kangin, Denpasar Utara, Kota Denpasar, Bali 80155, Indonesia', '-8.605279', '115.225322', 'Luis Milla', 150000, 1, 100, 0, 0, 'Garuda Kukar Bandung adalah salah satu klub basket Indonesia yang bertanding di kompetisi NBL (National Basketball League).[1] Pada tahun 2008, untuk pertama kalinya, Garuda Bandung melaju ke final NBL, walaupun akhirnya dikalahkan oleh Satria Muda Britama di final.[1] Sejak tahun 1994, klub ini telah beberapa kali mengalami perubahan nama karena adanya perubahan sponsor.[2] Mulai dari bernama Hadtex (ketika masih bertanding di kompetisi Kobatama), kemudian menjadi Panasia Indosyntex, Panasia Senatama, Garuda Bandung, dan terakhir Garuda Flexi Bandung.[2]', 1, '2018-11-29 08:25:57', '2018-11-29 08:27:30'),
(4, 7, 'Aspac', '089765234987', 'Jalan Tunon, Kerobokan Kelod, Kuta Utara, Kabupaten Badung, Bali 80361, Indonesia', '-8.667649', '115.150305', 'Bung Astec', 200000, 2, 50, 0, 0, 'W88 news stapac adalah klub bola basket profesional Liga Bola Basket Nasional Indonesia (IBL Indonesia) dari kota Jakarta. Klub bola basket ini didirikan pada tahun 1986. Di pentas kompetisi basket tertinggi di Indonesia, sejak 1987, stapac selalu memelihara tradisi masuk putaran final four.', 1, '2018-11-29 08:30:21', '2018-11-29 08:30:21'),
(5, 8, 'Pelita Jaya Denpasar', '089765123465', 'JL. Seroja, No. 72 A, Tonja, Denpasar Utara, Kota Denpasar, Bali 80235, Indonesia', '-8.634471', '115.229742', 'Bang Aris', 0, 1, 20, 1, 1, 'Di dirikan pada tahun 1988 oleh BAKRIE & BROTHERS\r\npada tahun 1999 tim bergabung dengan Citra Satria untuk membentuk Citra Satria Pelita (CSP). Tim baru memasuki milenium dengan nama baru, Bali Jeff CSP. Namun, gagal masuk ke tiga besar di tahun-tahun awal dekade ini. \r\nPada tahun 2002, tim ini berganti nama Kalila Jakarta. \r\nDua tahun kemudian, ia bergabung dengan PB. Mitra untuk membentuk tim baru yang dikenal sebagai Mitra Kalila. \r\nNamun, pada tahun 2005, tim meninggalkan nama Mitra\r\npada tahun 2008, itu kembali ke nama lama dari Pelita Jaya.\r\nmemasuki 2009 dengan nama baru: Pelita Jaya Esia.', 1, '2018-11-29 08:33:54', '2018-11-29 08:33:54'),
(6, 9, 'Hangtuah Basketball', '085469785642', 'Jl. Raya Sesetan No.154, Sesetan, Denpasar Sel., Kota Denpasar, Bali 80225, Indonesia', '-8.692425', '115.218455', 'Bang Bagus', 0, 1, 50, 1, 1, 'angtuah Sumsel adalah klub binaan dan dibentuk atas inisiatif dari H Alex Noerdin ketika masih menjabat Bupati Muba, dengan nama Muba Hangtuah, \r\nHangtuah yang kerap tampil membawa nama Muba dan Sumsel khususnya,kemudian berubah nama menjadi HangTuah Sumsel Indonesia Muda', 1, '2018-11-29 08:38:10', '2018-11-29 08:38:10');

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
(7, 1, '055fa1fe61d8994f879152055a9405d4.jpg', '2018-10-20 10:40:46', '2018-10-20 10:40:46'),
(8, 2, 'f98f6ee884bea8f9801cdf2a47fe6906.jpg', '2018-11-29 08:16:54', '2018-11-29 08:16:54'),
(9, 2, 'aaceef98aa796fb1478334849c3a15a1.jpg', '2018-11-29 08:17:08', '2018-11-29 08:17:08'),
(10, 2, 'f550b64912f447fc7582ba741ddfcd07.jpg', '2018-11-29 08:17:25', '2018-11-29 08:17:25'),
(11, 3, 'a25e9e8a6a075ce1a5ba5ca6e1decbb5.jpg', '2018-11-29 08:26:32', '2018-11-29 08:26:32'),
(12, 3, '889b519cba0d3c6771298f8075ba5b72.jpg', '2018-11-29 08:26:39', '2018-11-29 08:26:39'),
(13, 3, '5fef30f97cb4eef98347c57749a882c8.jpg', '2018-11-29 08:26:44', '2018-11-29 08:26:44'),
(14, 4, '9b85af184ec939730ba89b882c166fb8.jpg', '2018-11-29 08:31:05', '2018-11-29 08:31:05'),
(15, 4, '42caaf7da2b6d7d19e5d0794fcc74437.jpg', '2018-11-29 08:31:11', '2018-11-29 08:31:11'),
(16, 4, '9868cc43319b57ed6bd541f90aac2a5f.jpg', '2018-11-29 08:31:21', '2018-11-29 08:31:21'),
(17, 5, 'b89ef86490fd52e4d481ab25d8811c26.jpg', '2018-11-29 08:34:34', '2018-11-29 08:34:34'),
(18, 5, '07d8db9423c1758df5082e6cd14b2971.jpg', '2018-11-29 08:34:40', '2018-11-29 08:34:40'),
(19, 5, '857c44c81efb9492c48d7e7c345f44bc.jpg', '2018-11-29 08:34:50', '2018-11-29 08:34:50'),
(20, 6, '51bc74c2bfe8361f4fa8bfc1d93df9ca.jpg', '2018-11-29 08:38:48', '2018-11-29 08:38:48'),
(21, 6, '5c0e8f699a6a6033e6441cd441258e95.jpg', '2018-11-29 08:39:04', '2018-11-29 08:39:04'),
(22, 6, '7b0fef10642ce46cfff02c726cbbd9af.jpg', '2018-11-29 08:40:01', '2018-11-29 08:40:01');

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
  `luas` varchar(12) NOT NULL,
  `keterangan` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lapangan`
--

INSERT INTO `lapangan` (`id`, `nama`, `alamat`, `lat`, `long`, `luas`, `keterangan`, `status`, `created_at`, `updated_at`) VALUES
(1, 'GOR Lila Bhuana', 'Jl. WR Supratman No.1b, Dangin Puri Kangin', '-8.649321', '115.223004', '500', 'asdsa \r\nas\r\nds\r\nd\r\nas\r\nd\r\n\r\n\r\nasdasdasd', 1, '2018-10-12 00:39:35', '2018-11-26 08:08:59'),
(2, 'Lapangan Bola', 'KEBUN ARY, Jl. Kecubung, Sumerta Kaja, Denpasar Tim., Kota Denpasar, Bali 80236, Indonesia', '-8.654455', '115.229785', '250', 'asdasd\r\nas\r\ndas\r\nd\r\nasd\r\n\r\n\r\nasdasdasdasd\r\nasdsa', 1, '2018-10-13 04:29:52', '2018-11-26 08:07:21');

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
(2, 1, 'ada berita kecelakaan di renon. sorang wanita tewas tercebur ke got. dan akhirnya ada yang menolongnya', 1, '2018-10-22 08:24:45', '2018-10-22 08:24:45'),
(3, 2, 'Siap siap latiha nanti kita ada lomba kejuaraan baru', 1, '2018-11-29 14:21:17', '2018-11-29 14:21:17'),
(4, 3, 'asdas das as das as dsad', 1, '2018-11-29 14:27:15', '2018-11-29 14:27:15');

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
-- Struktur dari tabel `prestasi_club`
--

CREATE TABLE `prestasi_club` (
  `id` int(11) NOT NULL,
  `id_club` int(11) DEFAULT NULL,
  `prestasi` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prestasi_club`
--

INSERT INTO `prestasi_club` (`id`, `id_club`, `prestasi`, `created_at`, `updated_at`) VALUES
(2, 1, 'Juara 1 Lomba Mancing', '2018-11-26 08:33:38', '2018-11-26 08:33:38'),
(4, 1, 'Jura Harapan Lomba Basket', '2018-11-26 08:35:01', '2018-11-26 08:35:01'),
(5, 2, 'Juara IBL 2003', '2018-11-29 08:18:03', '2018-11-29 08:18:03'),
(6, 2, 'Juara IBL 2005', '2018-11-29 08:18:14', '2018-11-29 08:18:14'),
(8, 2, 'Juara NBL 2010-2011', '2018-11-29 08:19:36', '2018-11-29 08:19:36'),
(9, 3, 'Juara NBL 2012-2013', '2018-11-29 08:27:12', '2018-11-29 08:27:12');

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
(1, 1, 3, 5, 'Lapangan yang bagus. banyak lendir berserakan. malem-malem banyak orang suka esek esek disini.', 1, '2018-10-20 08:36:09', '2018-10-26 17:14:07'),
(2, 1, 1, 3, 'asdsad', 1, '2018-10-20 09:14:29', '2018-10-26 17:14:03'),
(3, 1, 4, 5, 'qwewqeasd', 1, '2018-10-20 09:14:37', '2018-10-26 17:13:49'),
(4, 2, 1, 5, 'banyak spot buat esek esek', 1, '2018-10-20 10:29:29', '2018-10-20 10:29:29'),
(5, 2, 4, 3, 'lapangan jelek', 1, '2018-10-20 10:29:29', '2018-10-20 10:29:29');

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
(5, 1, 1, '2018-10-20', '14:00:00', '17:30:00', NULL, 1, '2018-10-17 07:52:37', '2018-11-29 14:19:07'),
(6, 1, 1, '2018-10-24', '00:30:00', '08:00:00', NULL, 1, '2018-10-22 08:09:11', '2018-10-22 08:09:11'),
(7, 2, 2, '2018-12-13', '15:30:00', '18:30:00', NULL, 1, '2018-11-29 14:20:06', '2018-11-29 14:21:59'),
(8, 1, 2, '2018-12-19', '13:30:00', '16:00:00', NULL, 1, '2018-11-29 14:20:22', '2018-11-29 14:21:56'),
(9, 2, 2, '2018-12-24', '10:30:00', '13:00:00', NULL, 1, '2018-11-29 14:20:41', '2018-11-29 14:21:53'),
(10, 2, 2, '2018-12-27', '10:30:00', '13:30:00', NULL, 1, '2018-11-29 14:21:00', '2018-11-29 14:21:50'),
(11, 1, 3, '2018-12-09', '12:30:00', '17:00:00', NULL, 1, '2018-11-29 14:25:52', '2018-11-29 14:25:52'),
(12, 2, 3, '2018-12-12', '12:00:00', '16:00:00', NULL, 1, '2018-11-29 14:26:05', '2018-11-29 14:26:05'),
(13, 1, 3, '2018-12-13', '16:00:00', '22:00:00', NULL, 1, '2018-11-29 14:26:17', '2018-11-29 14:26:17'),
(14, 1, 3, '2018-12-20', '16:00:00', '21:30:00', NULL, 1, '2018-11-29 14:26:28', '2018-11-29 14:26:28'),
(15, 1, 3, '2018-12-21', '10:30:00', '17:30:00', NULL, 1, '2018-11-29 14:26:51', '2018-11-29 14:26:51'),
(16, 2, 3, '2018-12-23', '12:00:00', '16:00:00', NULL, 1, '2018-11-29 14:27:05', '2018-11-29 14:27:05'),
(17, 1, 4, '2018-12-25', '08:30:00', '12:00:00', NULL, 1, '2018-11-29 14:27:42', '2018-11-29 14:27:42'),
(18, 2, 4, '2018-12-26', '08:30:00', '09:30:00', NULL, 1, '2018-11-29 14:27:52', '2018-11-29 14:27:52'),
(19, 1, 4, '2018-12-27', '05:00:00', '08:00:00', NULL, 1, '2018-11-29 14:28:02', '2018-11-29 14:28:02'),
(20, 1, 4, '2018-12-28', '07:30:00', '12:30:00', NULL, 1, '2018-11-29 14:29:14', '2018-11-29 14:29:14');

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
(1, 'admin', 'admin@mail.com', '$2y$10$rX1O9zLjWPx32FbQVXhO6u5CEybOqa.UdQ157NOSuBUdqs7iRzFT2', 1, 1, '127.0.0.1', '2019-01-25 04:42:54', '2018-10-10 21:28:22', '2019-01-25 04:42:54'),
(3, 'Setia Budi United', 'club@mail.com', '$2y$10$rOnNWeipS4dfi/RC6cSYOOsPrUMGq4VirltZMlyNg5pzo83JwXKou', 1, 2, '127.0.0.1', '2019-01-25 04:50:21', '2018-10-13 04:32:36', '2019-01-25 04:50:21'),
(4, 'asdasd', 'asdasd@mail.com', '$2y$10$5PUElgPI.kry3TKMYSVQPuV.OUSe9lyXx7BhheCz9oWr7kj8Fi6dm', 1, 1, NULL, NULL, '2018-10-14 23:02:26', '2018-10-14 23:20:15'),
(5, 'Satria Muda', 'satriamuda@gmail.com', '$2y$10$v9DD8k5p/X1Aet9cqhu.1eHjlEd.k56Vn1Q3v18U/1zM6WfkOZ5Yq', 1, 2, 'localhost', '2018-11-29 14:19:45', '2018-11-29 08:15:26', '2018-11-29 14:19:45'),
(6, 'Garuda Denpasar', 'garudadenpasar@gmail.com', '$2y$10$024FMH3zSJI8NNGvUrpei..h5T0OPKzjMVCaL1hE/JptmNwdtScLi', 1, 2, 'localhost', '2018-11-29 14:25:36', '2018-11-29 08:25:57', '2018-11-29 14:25:36'),
(7, 'Aspac', 'aspac@gmail.com', '$2y$10$WMHqnh42hYIdCtbfDWgvruWwXPyZoqLs4H0yjkPkYHshCMRRwEjQu', 1, 2, 'localhost', '2018-11-29 14:27:29', '2018-11-29 08:30:21', '2018-11-29 14:27:29'),
(8, 'Pelita Jaya Denpasar', 'pelita@gmail.com', '$2y$10$Rs99mtZw6mka17UR5m9K7.Qoc/JEG09IyRyHdS74JNdVutVy6PGDu', 1, 2, NULL, NULL, '2018-11-29 08:33:54', '2018-11-29 08:33:54'),
(9, 'Hangtuah Basketball', 'hangtuah@gmail.com', '$2y$10$ZOCTC3mEwXsDo74Iq3uPQ.0BWTp6i7B5TkpiWxGhh5m5A3wlpdYnu', 1, 2, NULL, NULL, '2018-11-29 08:38:10', '2018-11-29 08:38:10');

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
-- Indexes for table `prestasi_club`
--
ALTER TABLE `prestasi_club`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `foto_club`
--
ALTER TABLE `foto_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prestasi_club`
--
ALTER TABLE `prestasi_club`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
