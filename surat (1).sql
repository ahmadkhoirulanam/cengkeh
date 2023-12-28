-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jul 2022 pada 14.41
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_skd`
--

CREATE TABLE `data_request_skd` (
  `id_request_skd` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'DOMISILI',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_skd`
--

INSERT INTO `data_request_skd` (`id_request_skd`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(21, '1111111111111111', '2021-10-18 06:46:28', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Administrasi Bank', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2021-10-18'),
(22, '12345678', '2022-07-02 04:37:24', '12345678_.jpg', '12345678_.jpg', 'sekolah', 'Surat dicetak, bisa diambil!', 'DOMISILI', 3, '2022-07-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_skp`
--

CREATE TABLE `data_request_skp` (
  `id_request_skp` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'LAINNYA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_skp`
--

INSERT INTO `data_request_skp` (`id_request_skp`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(13, '12345678', '2022-07-09 17:44:00', '12345678_.jpg', '12345678_.jpg', 'rt', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 0, '0000-00-00'),
(14, '12345678', '2022-07-09 17:45:30', '12345678_.jpg', '12345678_.jpg', 'k', 'Data sedang diperiksa oleh Staf', 'LAINNYA', 0, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_sktm`
--

CREATE TABLE `data_request_sktm` (
  `id_request_sktm` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `request` varchar(20) NOT NULL DEFAULT 'TIDAK MAMPU',
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_sktm`
--

INSERT INTO `data_request_sktm` (`id_request_sktm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `request`, `keterangan`, `status`, `acc`) VALUES
(50, '1111111111111111', '2021-10-17 10:06:35', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Beasiswa Sekolah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2021-10-17'),
(51, '12345678', '2022-06-16 06:35:52', '12345678_.jpg', '12345678_.jpg', 'beasiswa', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '2022-06-17'),
(52, '12345678', '2022-06-22 11:46:36', '12345678_.jpg', '12345678_.jpg', 'kjgk', 'TIDAK MAMPU', 'Surat sedang dalam proses cetak', 2, '2022-06-23'),
(53, '12345678', '2022-07-04 11:38:42', '12345678_.jpg', '12345678_.jpg', 'keringanan sekolah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2022-07-06'),
(54, '12345678', '2022-07-04 13:27:18', '12345678_.jpg', '12345678_.jpg', 'Ingin Mendaftar Sekolah', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2022-07-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_request_sku`
--

CREATE TABLE `data_request_sku` (
  `id_request_sku` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `tanggal_request` timestamp NOT NULL DEFAULT current_timestamp(),
  `scan_ktp` text NOT NULL,
  `scan_kk` text NOT NULL,
  `usaha` varchar(30) NOT NULL,
  `keperluan` varchar(30) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT 'Data sedang diperiksa oleh Staf',
  `request` varchar(20) NOT NULL DEFAULT 'USAHA',
  `status` int(11) NOT NULL DEFAULT 0,
  `acc` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_request_sku`
--

INSERT INTO `data_request_sku` (`id_request_sku`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `usaha`, `keperluan`, `keterangan`, `request`, `status`, `acc`) VALUES
(9, '1111111111111111', '2021-10-17 10:37:58', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', '1111111111111111 - Fachri Shofiyyuddin Ahmad_.jpg', 'Warung Kopi', 'Bantuan UMKM', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2021-10-17'),
(10, '12345678', '2022-06-22 08:48:56', '12345678_.jpg', '12345678_.jpg', 'anam', 'sss', 'Data sedang diperiksa oleh Staf', 'USAHA', 1, '0000-00-00'),
(11, '12345678', '2022-07-04 11:41:22', '12345678_.jpg', '12345678_.jpg', 'suka jaya', 'membuat usaha', 'Surat dicetak, bisa diambil!', 'USAHA', 3, '2022-07-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_user`
--

CREATE TABLE `data_user` (
  `nik` varchar(16) NOT NULL,
  `password` varchar(225) NOT NULL,
  `hak_akses` varchar(225) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `tempat_lahir` varchar(30) NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `status_warga` varchar(30) NOT NULL,
  `rt` varchar(50) DEFAULT NULL,
  `rw` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_user`
--

INSERT INTO `data_user` (`nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`, `rt`, `rw`, `username`) VALUES
('009908', 'kjnkjn', 'Pemohon', 'NJBKJBH', '2021-12-11', 'kjnkj', 'Laki-Laki', '', 'kjnhkjn', '', 'Kerja', NULL, NULL, NULL),
('1', '1', 'Lurah', 'coba', '2021-10-20', 'coba', 'Laki-Laki', '', 'coba', '', 'Kerja', NULL, NULL, 'lurah'),
('1111111111111111', '12345', 'Pemohon', 'Fachri Shofiyyuddin Ahmad', '2021-10-17', 'Jakarta', 'Laki-Laki', 'Islam', '        Jakarta RT 01/RW 07', '087897315639', 'Sekolah', NULL, NULL, NULL),
('12345678', 'anam', 'Pemohon', 'Ahmad khoirul anam', '2022-06-30', 'pati', 'Laki-Laki', 'Islam', ' ivibobm', '97979', 'Belum Bekerja', '5', NULL, NULL),
('2', '2', 'Rt', 'coba', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', 'Kerja', NULL, NULL, NULL),
('321', 'riki', 'Rt2', 'riki', '2022-07-19', 'blora', 'Laki-Laki', '', 'ds', '', 'Kerja', NULL, NULL, NULL),
('768', 'adit', 'Rt3', 'adit', '2022-07-14', 'l', 'Laki-Laki', '', 'k', '', 'Kerja', NULL, NULL, NULL),
('777', '12345', 'Pemohon', 'a', '2021-10-20', 'oke', 'Laki-Laki', '', 'x', '', 'Sekolah', NULL, NULL, NULL),
('888', '12345', 'Pemohon', 'cobalagi', '2021-10-20', 'cobalagi', 'Perempuan', '', 'coba', '', 'Sekolah', NULL, NULL, NULL),
('8923478923789489', 'tes', 'Pemohon', 'coba', '2022-05-22', 'kudus', 'Laki-Laki', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `kode` int(11) NOT NULL,
  `keterangan` varchar(300) NOT NULL,
  `tgl` date NOT NULL,
  `jumlah` int(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `keluar` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`kode`, `keterangan`, `tgl`, `jumlah`, `jenis`, `keluar`) VALUES
(44, 'dari pak camat', '2022-07-04', 20000, 'masuk', 0),
(222, 'dana pjm', '2022-07-08', 200000, 'masuk', 0),
(233, 'pemerintah', '2022-07-06', 200000, 'masuk', 0),
(322, 'beli sepatu', '2022-07-15', 0, 'keluar', 25000),
(344, 'beli hp', '2022-07-15', 0, 'keluar', 30000),
(1165, 'test keluar', '2018-08-19', 0, 'keluar', 25000),
(2165, 'test masuk', '2018-08-19', 50000, 'masuk', 0),
(2166, 'test masuk 2', '2018-08-19', 30000, 'masuk', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD PRIMARY KEY (`id_request_skp`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD PRIMARY KEY (`id_request_sktm`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indeks untuk tabel `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `data_request_skp`
--
ALTER TABLE `data_request_skp`
  MODIFY `id_request_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  MODIFY `id_request_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT untuk tabel `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2169;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD CONSTRAINT `data_request_skp_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD CONSTRAINT `data_request_sktm_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD CONSTRAINT `data_request_sku_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
