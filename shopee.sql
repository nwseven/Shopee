-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 20 Jun 2017 pada 03.40
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shopee`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `preferred_seller`
--

CREATE TABLE IF NOT EXISTS `preferred_seller` (
  `preferred_seller_id` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `KTP_number` varchar(20) NOT NULL,
  `user_photo` varchar(100) NOT NULL,
  `KTP_photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `preferred_seller`
--

INSERT INTO `preferred_seller` (`preferred_seller_id`, `username`, `KTP_number`, `user_photo`, `KTP_photo`) VALUES
('0', 'tes123', '1234567890123456', '229369_340.jpg', 'img_1798.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
('0', 'tes123', 'tes@email.com', '$1$ZOXWAyvD$zjX5ZbQzYidjDnh3RObQn/');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `preferred_seller`
--
ALTER TABLE `preferred_seller`
 ADD PRIMARY KEY (`preferred_seller_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
