-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jun 2023 pada 15.09
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teh_poci`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `splash` varchar(255) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `recomended` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `nama`, `splash`, `thumbnail`, `recomended`) VALUES
(3, 'original', 'original-splash.png', 'original-list.png', 'yes'),
(4, 'guava', 'guava-splash.png', 'guava-list.png', 'no'),
(5, 'thai', 'thai-splash.png', 'thai-list.png', 'no'),
(7, 'coklat', 'coklat-splash.png', 'coklat-list.png', 'yes'),
(8, 'honey', 'honey-splash.png', 'honey-list.png', 'no'),
(9, 'capucino', 'capucino-splash.png', 'capucino-list.png', 'yes'),
(10, 'leci', 'leci-splash.png', 'leci-list.png', 'no'),
(11, 'jasmine', 'jasmine-splash.png', 'jasmine-list.png', 'no'),
(14, 'hilo_avocado', 'hilo_avocado-splash.png', 'hilo_avocado-list.png', 'yes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscription`
--

CREATE TABLE `subscription` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nomor` varchar(15) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `paket` varchar(10) NOT NULL,
  `status` enum('pending','proses','approved','canceled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscription`
--

INSERT INTO `subscription` (`id`, `nama`, `email`, `nomor`, `alamat`, `paket`, `status`) VALUES
(12, 'Naufal', 'test1@gmail.com', '086383002', 'jln.prof.moh yamin gang rambutan jakarta timur', 'p-besar', 'approved');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(55) NOT NULL,
  `status` enum('admin','operator') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `password`, `status`) VALUES
(4, 'Riezky Fauji', 'operator1@gmail.com', '1234', 'operator'),
(5, 'Virgiawan Sanria', 'admin@gmail.com', '1', 'admin'),
(6, 'Alfian Nursahbani', 'operator2@gmail.com', '1', 'operator'),
(7, 'muflih', 'operator3@gmail.com', '1', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `subscription`
--
ALTER TABLE `subscription`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `subscription`
--
ALTER TABLE `subscription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
