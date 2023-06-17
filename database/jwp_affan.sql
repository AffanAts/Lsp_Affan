-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2023 pada 13.37
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
-- Database: `jwp_affan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin_login`
--

INSERT INTO `admin_login` (`id`, `username`, `password`) VALUES
(6, 'qwerty', '$2y$10$iTa4cLwURDDiXcifoG8c4usjN3uEkanqUi/K1ezoE7Se7V.MnMGzK'),
(7, 'affanpc', '$2y$10$cq5y9qWRhmjBpr50hAdrhuC8y8AdvmU9Pz.abHlqXUKP/kqp8alFC'),
(8, 'Affanhp', '$2y$10$OIkSR4xyRvWKFStQzoozsuX.EdU.32mlDmwAVSWWBjaOAjfBEmfo2'),
(9, 'afwafaw', '$2y$10$/T6E8sPDcf9WR4osPkc6N.4nYJgX64/XcfJoOjMxZmOo/a7i286Yy'),
(10, 'test1', '$2y$10$WpZyiJ5j88RUEoQra4rIou51es/ZNyy0u/vC4CryhUDnFG6lV8G6.'),
(11, 'Affantest', '$2y$10$bwPugtLEMzaGq7PIuVoppuDRTKjmu0pbLrfRZbVWEXl16Msl//G1C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(10) NOT NULL,
  `nama_artikel` varchar(100) NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `nama_artikel`, `gambar_artikel`, `isi_artikel`) VALUES
(71, '150-Year-Old Butter ', '175-1.jpg', '\"It really doesn\'t have much of a smell anymore,\" claims curator Bill Cantine about the block of butter recovered by archaeologists from the wreck of the steamboat Bertrand, which sank in 1865.'),
(72, 'The Bertrand Sank in 1865 in the Missouri River', '869-2.jpg', 'The steamboat Bertrand was carrying passengers and cargo up the Missouri River to the mining towns in Montana Territory when it hit a snag in the river 30 miles north of Omaha and sank on April 1, 1865. '),
(73, 'The Forgotten Ship Was Found Buried in a Corn Field', '200-3.jpeg', 'Two Omaha men, Jesse Pursell and Sam Corbino, began a search in 1967 that led to the discovery of the Steamboat Bertrand. The Missouri River had changed course over time, leaving the forgotten wreck in the middle of a Nebraska cornfield. Operating under a Federal contract, the pair successfully completed the excavation of the boat and its cargo in 1969. Much of the material is on display in the visitor center of DeSoto National Wildlife Refuge maintained by the U.S. Fish and Wildlife Service.'),
(74, 'Even fabrics were recovered fairly intact from Bertrand', '671-5.jpg', 'Sixteen ladies\' capes were recovered from Bertrand, including triangular knitted capes of pinkish violet with tasseled ties at the neck, very typical of the time. '),
(75, 'Hundreds of bottles with an astonishing range of contents', '346-6.jpeg', 'The Bertrand\'s cargo provides a extraordinary time-capsule from the Civil War era, with Underwood\'s \"Tomatoe Katsup,\" brandied peaches from Boston, fruit jellies from Baltimore, pickles from Delaware, pepper sauce from St. Louis, and clover honey from Philadelphia.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `nama`, `email`, `komentar`) VALUES
(45, 73, 'Maida Chan', 'receiver2080@protonmail.com', ' Haskell is a standardized, general-purpose purely functional programming language, with non-strict semantics and strong static typing.\",\r\n'),
(46, 73, 'Sol Wilkinson', 'elite2024@duck.com', 'They are written as strings of consecutive alphanumeric characters, the first character being lowercase.'),
(47, 73, 'Hilario Wilkins', 'about1897@duck.com', '    Tuples are containers for a fixed number of Erlang data types.\r\n'),
(48, 73, 'Wendie Reeves', 'actress1872@live.com', '    I don\'t even care.\r\n'),
(49, 73, 'Dane Mcclain', 'pencil1901@yahoo.com', '    Ports are created with\' the built-in function open_port.\r\n'),
(50, 71, 'test', 'test', 'test'),
(51, 71, 'Guadalupe Farrell', 'zen1992@duck.com', '    Atoms are used within a program to denote distinguished values.\r\n'),
(52, 71, 'Darby Rollins', 'economy1859@protonmail.com', '    The sequential subset of Erlang supports eager evaluation, single assignment, and dynamic typing.\r\n'),
(53, 71, 'Lawrence Bradford', 'director1858@protonmail.com', '    The Galactic Empire is nearing completion of the Death Star, a space station with the power to destroy entire planets.\r\n'),
(54, 72, 'test', 'test', 'test'),
(55, 72, 'Burt Walter', 'arguments1891@duck.com', '    He looked inquisitively at his keyboard and wrote another sentence.\r\n'),
(56, 72, 'Marketta Mcdowell', 'mystery1887@example.org', '    I don\'t even care.\r\n'),
(57, 74, 'test', 'test', 'test'),
(58, 74, 'Bruno Wallace', 'lunch1957@yandex.com', '    Where are my pants?\r\n'),
(59, 74, 'Ward Tran', 'likes1896@duck.com', '    Atoms are used within a program to denote distinguished values.\r\n'),
(60, 75, 'test', 'test', 'test'),
(61, 75, 'Grisel Strong', 'origin2012@outlook.com', '    The sequential subset of Erlang supports eager evaluation, single assignment, and dynamic typing.\r\n'),
(62, 72, 'afaw', 'awfaw', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `id_artikel` (`id_artikel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `id_artikel` FOREIGN KEY (`id_artikel`) REFERENCES `artikel` (`id_artikel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
