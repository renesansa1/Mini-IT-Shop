-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2019 at 11:34 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini it shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontakt_telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `ime`, `email`, `password`, `kontakt_telefon`, `grad`, `adresa`) VALUES
(4, 'Miloš Stevanović', 'test_proba@gmail.com', 'test_proba12', '0115546551', 'Beograd', 'Bulevar Mihajla Pupina 52'),
(5, 'Petar Petrović', 'proba_test@gmail.com', 'test_proba1', '0116549873', 'Kragujevac', 'Stevana Sremca 14');

-- --------------------------------------------------------

--
-- Table structure for table `korisnicka_korpa`
--

CREATE TABLE `korisnicka_korpa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `status` enum('Ubaceno u korpu','Kupljeno') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnicka_korpa`
--

INSERT INTO `korisnicka_korpa` (`id`, `user_id`, `proizvod_id`, `status`) VALUES
(7, 3, 3, ''),
(8, 3, 4, ''),
(9, 3, 5, ''),
(10, 3, 11, ''),
(11, 1, 9, ''),
(12, 1, 2, ''),
(13, 1, 8, ''),
(53, 4, 1, 'Kupljeno'),
(54, 4, 3, 'Kupljeno'),
(55, 4, 7, 'Kupljeno'),
(56, 4, 9, 'Kupljeno');

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `ime_proizvoda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `ime_proizvoda`, `cena`) VALUES
(1, 'Dell S2719H', 39500),
(2, 'Asus Swift PG278QE', 42000),
(3, 'LG 34UC79G-B', 50000),
(4, 'Samsung LS27H', 28000),
(5, 'RTX 2070 Gigabyte', 88400),
(6, 'Thermaltake C35', 21550),
(7, 'Ryzen 2970WX', 92600),
(8, 'Samsung 860 EVO', 25000),
(9, 'Logitech G903', 18990),
(10, 'Logitech Z625', 20800),
(11, 'Logitech BRIO 4K', 22100),
(12, 'Razer Huntsman Elite', 12400);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnicka_korpa`
--
ALTER TABLE `korisnicka_korpa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`proizvod_id`),
  ADD KEY `item_id` (`proizvod_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `korisnicka_korpa`
--
ALTER TABLE `korisnicka_korpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
