-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Jul 2023 pada 18.35
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
(6, 'qwerty', '$2y$10$iTa4cLwURDDiXcifoG8c4usjN3uEkanqUi/K1ezoE7Se7V.MnMGzK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(10) NOT NULL,
  `nama_artikel` varchar(100) NOT NULL,
  `gambar_artikel` varchar(255) NOT NULL,
  `isi_artikel` text NOT NULL,
  `komentar_aktif` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `nama_artikel`, `gambar_artikel`, `isi_artikel`, `komentar_aktif`) VALUES
(71, '150-Year-Old Butter ', '175-1.jpg', '\"It really doesn\'t have much of a smell anymore,\" claims curator Bill Cantine about the block of butter recovered by archaeologists from the wreck of the steamboat Bertrand, which sank in 1865.', 0),
(72, 'The Bertrand Sank in 1865 in the Missouri River', '869-2.jpg', 'The steamboat Bertrand was carrying passengers and cargo up the Missouri River to the mining towns in Montana Territory when it hit a snag in the river 30 miles north of Omaha and sank on April 1, 1865. ', 1),
(73, 'The Forgotten Ship Was Found Buried in a Corn Field', '200-3.jpeg', 'Two Omaha men, Jesse Pursell and Sam Corbino, began a search in 1967 that led to the discovery of the Steamboat Bertrand. The Missouri River had changed course over time, leaving the forgotten wreck in the middle of a Nebraska cornfield. Operating under a Federal contract, the pair successfully completed the excavation of the boat and its cargo in 1969. Much of the material is on display in the visitor center of DeSoto National Wildlife Refuge maintained by the U.S. Fish and Wildlife Service.', 0),
(74, 'Even fabrics were recovered fairly intact from Bertrand', '671-5.jpg', 'Sixteen ladies\' capes were recovered from Bertrand, including triangular knitted capes of pinkish violet with tasseled ties at the neck, very typical of the time. ', 0),
(75, 'Hundreds of bottles with an astonishing range of contents', '346-6.jpeg', 'The Bertrand\'s cargo provides a extraordinary time-capsule from the Civil War era, with Underwood\'s \"Tomatoe Katsup,\" brandied peaches from Boston, fruit jellies from Baltimore, pickles from Delaware, pepper sauce from St. Louis, and clover honey from Philadelphia.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_artikel` int(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komentar` datetime NOT NULL,
  `status_hide` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_artikel`, `nama`, `email`, `komentar`, `tanggal_komentar`, `status_hide`) VALUES
(94, 74, 'Sienna ', 'Sienna@gmail.com', 'Faucibus justo mi dignissim dictum integer rutrum aliquet suscipit. Scelerisque tincidunt taciti orci facilisi accumsan natoque Sit, ipsum gravida lorem egestas dapibus velit enim elementum nullam et, litora torquent dignissim massa quis pellentesque. Aliquam, mattis, quam blandit posuere aliquam mollis tortor potenti inceptos lacus tellus sapien cum. Sit volutpat purus congue molestie consequat leo. Ligula vel lacus feugiat inceptos nulla.', '2023-07-24 19:19:40', 0),
(95, 74, 'Sienna ', 'Sienna@gmail.com', 'Faucibus justo mi dignissim dictum integer rutrum aliquet suscipit. Scelerisque tincidunt taciti orci facilisi accumsan natoque Sit, ipsum gravida lorem egestas dapibus velit enim elementum nullam et, litora torquent dignissim massa quis pellentesque. Aliquam, mattis, quam blandit posuere aliquam mollis tortor potenti inceptos lacus tellus sapien cum. Sit volutpat purus congue molestie consequat leo. Ligula vel lacus feugiat inceptos nulla.', '2023-07-24 19:19:50', 0),
(96, 71, 'Test', 'Test', 'Test', '2023-07-24 19:21:08', 0),
(97, 72, 'Test', 'Test', 'Test', '2023-07-24 19:21:14', 0),
(98, 73, 'Test', 'Test', 'Test', '2023-07-24 19:21:19', 0),
(99, 75, 'Test', 'Test', 'Test', '2023-07-24 19:21:28', 0),
(100, 72, 'Eaton Marks', 'tellus.eu.augue@yahoo.org', 'odio tristique pharetra. Quisque ac libero nec ligula consectetuer rhoncus. Nullam velit dui, semper et, lacinia vitae, sodales at, velit. Pellentesque ultricies dignissim lacus. Aliquam rutrum lorem ac risus. Morbi metus. Vivamus euismod urna. Nullam lobortis quam a felis ullamcorper viverra. Maecenas iaculis aliquet diam. Sed diam lorem, auctor\"\r\n', '2023-07-24 19:27:00', 0),
(101, 72, 'Sonia Massey', 'tristique.senectus@icloud.com', 'dui quis accumsan convallis, ante lectus convallis est, vitae sodales nisi magna sed dui. Fusce aliquam, enim nec tempus scelerisque, lorem ipsum sodales purus, in molestie tortor nibh sit amet orci. Ut sagittis lobortis mauris. Suspendisse aliquet molestie tellus. Aenean egestas hendrerit neque. In ornare sagittis felis. Donec tempor,\"\r\n', '2023-07-24 19:27:31', 0),
(103, 71, 'Akeem Morales', 'tellus.eu@outlook.com', 'risus. Duis a mi fringilla mi lacinia mattis. Integer eu lacus. Quisque imperdiet, erat nonummy ultricies ornare, elit elit fermentum risus, at fringilla purus mauris a nunc. In at pede. Cras vulputate velit eu sem. Pellentesque ut ipsum ac mi eleifend egestas. Sed pharetra, felis eget varius ultrices, mauris\"\r\n', '2023-07-24 19:28:01', 0),
(104, 71, 'Ursa Church', 'ornare.egestas@protonmail.net', 'vulputate dui, nec tempus mauris erat eget ipsum. Suspendisse sagittis. Nullam vitae diam. Proin dolor. Nulla semper tellus id nunc interdum feugiat. Sed nec metus facilisis lorem tristique aliquet. Phasellus fermentum convallis ligula. Donec luctus aliquet odio. Etiam ligula tortor, dictum eu, placerat eget, venenatis a, magna. Lorem ipsum\"\r\n', '2023-07-24 19:28:14', 0),
(105, 73, 'Portia Diaz', 'sed.congue@protonmail.com', 'semper pretium neque. Morbi quis urna. Nunc quis arcu vel quam dignissim pharetra. Nam ac nulla. In tincidunt congue turpis. In condimentum. Donec at arcu. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Donec tincidunt. Donec vitae erat vel pede blandit congue. In scelerisque\"\r\n', '2023-07-24 19:28:30', 0),
(106, 75, 'Stephen Dotson', 'in.hendrerit.consectetuer@google.ca', 'eu dolor egestas rhoncus. Proin nisl sem, consequat nec, mollis vitae, posuere at, velit. Cras lorem lorem, luctus ut, pellentesque eget, dictum placerat, augue. Sed molestie. Sed id risus quis diam luctus lobortis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Mauris ut quam\"\r\n', '2023-07-24 19:28:59', 0),
(107, 71, 'test hide 1', 'test hide 1', 'test hide 1 test hide 1test hide 1 test hide 1', '2023-07-24 22:10:05', 0),
(108, 72, 'Test komentar 3', 'ianwfia', 'Warning: Undefined variable $result_comments in C:xampphtdocsLSPPagesUserarticle.php on line 103\r\n\r\nFatal error: Uncaught TypeError: mysqli_num_rows(): Argument #1 ($result) must be of type mysqli_result, null given in C:xampphtdocsLSPPagesUserarticle.php:103 Stack trace: #0 C:xampphtdocsLSPPagesUserarticle.php(103): mysqli_num_rows(NULL) #1 {main} thrown in C:xampphtdocsLSPPagesUserarticle.php on line 103', '2023-07-24 23:24:31', 0);

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
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
