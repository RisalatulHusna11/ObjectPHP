-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Waktu pembuatan: 08 Bulan Mei 2024 pada 04.43
-- Versi server: 10.4.27-MariaDB
-- Versi PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_tokokerudung`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(60) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `nim`, `email`, `password`, `remember_token`, `updated_at`, `created_at`, `is_admin`) VALUES
(5, 'Risalatul Husna', '2110131120008', 'husna@gmail.com', '$2y$10$Toj1h1T.bpr/A61K0HBqEuRyAA2RtcyKMYYv2PY.ZoSw2qznPpwFC', 'Vygr9SQqCEHOMnHz4sT4GKpgI8Z6gZfbQUHeGk0qk5iS5NS3zsloJcIgJ4D8', '2023-04-06 19:53:36', '2023-04-06 19:53:36', 1),
(7, 'Alfika Nurfadia', '2110131120009', 'alfika@gmail.com', '$2y$10$bFg4NgrigBbZBT7z5GBfCutGxFMVDSXcwxYORt5kgndvheygQ8i8u', NULL, '2023-10-05 23:34:53', '2023-10-05 23:34:53', 0),
(9, 'Julita Hasanah', '2110131120005', 'julita@gmail.com', '$2y$10$1NvxnvBrtl/FOPeRyA70YeDENZ6NHSlxpN4TLaZXwxxcHpWRIjcxu', NULL, '2023-11-09 14:30:29', '2023-11-09 14:30:29', 0),
(22, 'Sesilia Miranda', '2110131120009', 'semil@gmail.com', 'semil123', NULL, NULL, NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
