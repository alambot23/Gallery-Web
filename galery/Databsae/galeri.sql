-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Apr 2024 pada 10.06
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `galeri`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `album`
--

CREATE TABLE `album` (
  `albumId` int(11) NOT NULL,
  `NamaAlbum` varchar(255) NOT NULL,
  `Deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `album`
--

INSERT INTO `album` (`albumId`, `NamaAlbum`, `Deskripsi`, `tanggal`, `userId`) VALUES
(9, 'Voluptates accusamus', 'Sint saepe qui id su', '2024-04-19', 7),
(10, 'Istri Alam', 'Foto Semua Istri Alam', '2024-04-19', 1),
(13, 'istri alam', 'kumpulan istri alam edit', '2024-04-19', 11);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `fotoId` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `albumId` int(11) NOT NULL,
  `userId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`fotoId`, `judul`, `deskripsi`, `tanggal`, `lokasi`, `albumId`, `userId`) VALUES
(17, 'Istri Alam 1', 'Istri Alam yang ke-4499', '2024-04-19', '6621d9ea6beee.jpg', 9, 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `komentarId` int(11) NOT NULL,
  `fotoId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`komentarId`, `fotoId`, `userId`, `komentar`, `tanggal`) VALUES
(9, 17, 8, 'istrinya sangat amat cantik ya lam', '2024-04-19'),
(13, 17, 7, 'test komentar saya\r\n', '2024-04-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `likefoto`
--

CREATE TABLE `likefoto` (
  `likeId` int(11) NOT NULL,
  `fotoId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `likefoto`
--

INSERT INTO `likefoto` (`likeId`, `fotoId`, `userId`, `tanggal`) VALUES
(6, 17, 7, '2024-04-19'),
(14, 17, 1, '2024-04-19'),
(20, 17, 11, '2024-04-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `userId` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`userId`, `username`, `password`, `Email`, `fullName`, `alamat`) VALUES
(1, 'alam', '133f19cfffb569f6447ebf073084a417', 'alam@alam', 'alam', 'alam'),
(2, 'motacy', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'sosyrykiwy@mailinator.com', 'Tyrone Conway', 'Expedita itaque dese'),
(3, 'motacy', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'sosyrykiwy@mailinator.com', 'Tyrone Conway', 'Expedita itaque dese'),
(4, 'xifyh', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'lyfucefuny@mailinator.com', 'Nomlanga Santiago', 'Obcaecati et at comm'),
(5, 'hatek', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'wemirovag@mailinator.com', 'Lani Compton', 'Labore in qui facere'),
(6, 'myjemewe', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'vofozumuz@mailinator.com', 'Teagan Randall', 'Culpa soluta autem i'),
(7, 'dayat', '1855c11f044cc8944e8cdac9cae5def8', 'daytat@dayat', 'dayat', 'dayat'),
(8, 'denius', '56b741cc359b040a26a3b213bfbead88', 'denius@denius', 'denius art', 'medan'),
(9, 'vyruj', 'f3ed11bbdb94fd9ebdefbaf646ab94d3', 'pige@mailinator.com', 'Felicia Conner', 'Nam aut quidem quo m'),
(10, 'hariri', '7815696ecbf1c96e6894b779456d330e', 'hariri@ha', 'hyy', 'hyy'),
(11, 'panji', 'd6b16b990a41b83f81a58d38ad7265f1', 'telup@mailinator.com', 'Virginia Holloway', 'Distinctio Numquam ');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`albumId`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`fotoId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `albumId` (`albumId`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`komentarId`),
  ADD KEY `fotoId` (`fotoId`),
  ADD KEY `userId` (`userId`);

--
-- Indeks untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD PRIMARY KEY (`likeId`),
  ADD KEY `fotoId` (`fotoId`),
  ADD KEY `userId` (`userId`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `album`
--
ALTER TABLE `album`
  MODIFY `albumId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `fotoId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `komentarId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  MODIFY `likeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `album`
--
ALTER TABLE `album`
  ADD CONSTRAINT `album_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `foto_ibfk_2` FOREIGN KEY (`albumId`) REFERENCES `album` (`albumId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD CONSTRAINT `komentar_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_ibfk_2` FOREIGN KEY (`fotoId`) REFERENCES `foto` (`fotoId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `likefoto`
--
ALTER TABLE `likefoto`
  ADD CONSTRAINT `likefoto_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likefoto_ibfk_2` FOREIGN KEY (`fotoId`) REFERENCES `foto` (`fotoId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
