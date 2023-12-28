-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:38 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `desa`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrasi`
--

CREATE TABLE `administrasi` (
  `id_administrasi` int(4) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `id_jenis_administrasi` int(5) NOT NULL,
  `foto` text NOT NULL,
  `link` varchar(255) NOT NULL,
  `periode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrasi`
--

INSERT INTO `administrasi` (`id_administrasi`, `nama`, `keterangan`, `id_jenis_administrasi`, `foto`, `link`, `periode`) VALUES
(10, 'Buku Peraturan Desa', 'Buku yang ditetapkan oleh Kepala Desa dengan persetujuan Badan Permusayawaratn Desa yang mengikat seluruh Warga Masyarakat Desa', 14, '737-sedang_1659931243_LOGO PERKAL_page-0001.jpg', 'https://kembang-kulonprogo.desa.id', '2023'),
(11, 'Buku keputusan kepala desa', 'Keputusan Kepala Desa adalah penetapan yang bersifat konkrit, individual, dan final.', 14, '467-208d64fe21ef4951636d4b9ca5074b34.jpg', 'https://github.com/OpenSID/OpenSID/issues/522', '2023'),
(12, 'Buku tanah desa', 'kepemilikan tanah menurut Peraturan Pemerintah Nomor 24 Tahun 1997 tentang pendaftaran tanah, untuk memperoleh suatu hak atas tanah dalam melakukan pendaftaran atas tanah dimana tanah-tanah tersebut sebagai tanah-tanah yang tunduk terhadap hukum adat.', 14, '554-IMG-20200604-WA0008.jpg', 'https://tangerangonline.id/2020/06/04/forum-pemuda-pantura-masih-ada-pejabat-desa-belum-menyerahkan-buku-tanah-desa/', '2023'),
(13, 'Buku Lembaran Desa dan Buku Berita Desa', 'Buku pencatatan data dan informasi mengenai kegiatan pemerintahan desa pada buku administrasi umum', 0, '861-download (1).jpg', 'https://drive.google.com/file/d/19is_kqoGv3xB-rx0mw8F4QuJoTnRVZMh/view', '2023'),
(14, 'Buku Lembaran & Berita Desa', 'pencatatan data dan informasi mengenai kegiatan pemerintahan desa pada buku administrasi umum', 14, '734-download (1).jpg', 'https://drive.google.com/file/d/19is_kqoGv3xB-rx0mw8F4QuJoTnRVZMh/view', '2023');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skd`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_request_skp`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sktm`
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
-- Dumping data for table `data_request_sktm`
--

INSERT INTO `data_request_sktm` (`id_request_sktm`, `nik`, `tanggal_request`, `scan_ktp`, `scan_kk`, `keperluan`, `request`, `keterangan`, `status`, `acc`) VALUES
(56, '12345678', '2022-08-10 13:24:28', '12345678_.jpg', '12345678_.jpg', 'daftar beasiswa', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2022-08-10'),
(57, '12345678', '2023-06-24 09:58:09', '12345678_.jpg', '12345678_.jpg', 'ddddddddd', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 3, '2023-06-24'),
(58, '12345678', '2023-07-03 04:57:53', '12345678_.jpg', '12345678_.jpg', 'tes alamay', 'TIDAK MAMPU', 'Surat dicetak, bisa diambil!', 2, '2023-07-03'),
(59, '12345678', '2023-07-04 01:21:30', '12345678_.jpg', '12345678_.jpg', 'Tes Blackbox', 'TIDAK MAMPU', 'Data sedang diperiksa oleh Staf', 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `data_request_sku`
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

-- --------------------------------------------------------

--
-- Table structure for table `data_user`
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
-- Dumping data for table `data_user`
--

INSERT INTO `data_user` (`nik`, `password`, `hak_akses`, `nama`, `tanggal_lahir`, `tempat_lahir`, `jekel`, `agama`, `alamat`, `telepon`, `status_warga`, `rt`, `rw`, `username`) VALUES
('009908', 'kjnkjn', 'Pemohon', 'NJBKJBH', '2021-12-11', 'kjnkj', 'Laki-Laki', '', 'kjnhkjn', '', 'Kerja', NULL, NULL, NULL),
('1', '1', 'Lurah', 'coba', '2021-10-20', 'coba', 'Laki-Laki', '', 'coba', '', 'Kerja', NULL, NULL, 'lurah'),
('1111111111111111', '12345', 'Pemohon', 'Fachri Shofiyyuddin Ahmad', '2021-10-17', 'Jakarta', 'Laki-Laki', 'Islam', '        Jakarta RT 01/RW 07', '087897315639', 'Sekolah', NULL, NULL, NULL),
('12345678', 'anam', 'Pemohon', 'Ahmad khoirul anam', '2022-06-30', 'pati', 'Laki-Laki', 'Islam', ' ivibobm', '97979', 'Belum Bekerja', '5', NULL, NULL),
('2', '2', 'Rt', 'coba', '2021-10-20', 'coba', 'Perempuan', '', 'coba', '', 'Kerja', NULL, NULL, NULL),
('321', 'riki', 'Rt2', 'riki', '2022-07-19', 'blora', 'Laki-Laki', '', 'ds', '', 'Kerja', NULL, NULL, NULL),
('3453211', 'sekdes', 'Rt', 'Anshori', '1992-06-09', 'Pati', 'Laki-Laki', '', 'Pati', '', 'Kerja', NULL, NULL, 'sekdes'),
('768', 'adit', 'Rt3', 'adit', '2022-07-14', 'l', 'Laki-Laki', '', 'k', '', 'Kerja', NULL, NULL, NULL),
('777', '12345', 'Pemohon', 'a', '2021-10-20', 'oke', 'Laki-Laki', '', 'x', '', 'Sekolah', NULL, NULL, NULL),
('888', '12345', 'Pemohon', 'cobalagi', '2021-10-20', 'cobalagi', 'Perempuan', '', 'coba', '', 'Sekolah', NULL, NULL, NULL),
('8923478923789489', 'tes', 'Pemohon', 'coba', '2022-05-22', 'kudus', 'Laki-Laki', '', '', '', '', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_administrasi`
--

CREATE TABLE `jenis_administrasi` (
  `id_jenis_administrasi` int(5) NOT NULL,
  `nama_jenis` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_administrasi`
--

INSERT INTO `jenis_administrasi` (`id_jenis_administrasi`, `nama_jenis`) VALUES
(14, 'Administrasi Umum'),
(15, 'Administrasi Desa'),
(16, 'Administrasi Pembangunan'),
(17, 'Administrasi Kelembagaan');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_produk_unggulan`
--

CREATE TABLE `jenis_produk_unggulan` (
  `id_jenis_unggulan` int(5) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama_produk` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `gambar_produk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama_produk`, `deskripsi`, `harga_beli`, `harga_jual`, `gambar_produk`) VALUES
(16, 'anam', 't', 3, 4, '731-ika alumni informatika.png');

-- --------------------------------------------------------

--
-- Table structure for table `produk_unggulan`
--

CREATE TABLE `produk_unggulan` (
  `id_produk_unggulan` int(5) NOT NULL,
  `nama_unggulan` varchar(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_unggulan`
--

INSERT INTO `produk_unggulan` (`id_produk_unggulan`, `nama_unggulan`, `keterangan`, `foto`) VALUES
(2, 'adit', 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam', '359-ika alumni informatika.png'),
(4, 'ssss', 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam', '257-sa-Page-1.drawio (3).png'),
(5, 'ds', 'Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diamww', '438-7.png'),
(6, 'Jahe instan', 'Jahe instan, temu lawak instan, dan sirup jahe produk unggulan KWT An-Nisa', '711-images.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `profil_desa`
--

CREATE TABLE `profil_desa` (
  `id_desa` int(5) NOT NULL,
  `nama_desa` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profil_desa`
--

INSERT INTO `profil_desa` (`id_desa`, `nama_desa`, `alamat`) VALUES
(1, 'Kedumulyo', 'kecamatan Sukolilo, Pati, Jawa Tengah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrasi`
--
ALTER TABLE `administrasi`
  ADD PRIMARY KEY (`id_administrasi`);

--
-- Indexes for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD PRIMARY KEY (`id_request_skd`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD PRIMARY KEY (`id_request_skp`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD PRIMARY KEY (`id_request_sktm`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD PRIMARY KEY (`id_request_sku`),
  ADD KEY `id_pemohon` (`nik`);

--
-- Indexes for table `data_user`
--
ALTER TABLE `data_user`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `jenis_administrasi`
--
ALTER TABLE `jenis_administrasi`
  ADD PRIMARY KEY (`id_jenis_administrasi`);

--
-- Indexes for table `jenis_produk_unggulan`
--
ALTER TABLE `jenis_produk_unggulan`
  ADD PRIMARY KEY (`id_jenis_unggulan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk_unggulan`
--
ALTER TABLE `produk_unggulan`
  ADD PRIMARY KEY (`id_produk_unggulan`);

--
-- Indexes for table `profil_desa`
--
ALTER TABLE `profil_desa`
  ADD PRIMARY KEY (`id_desa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrasi`
--
ALTER TABLE `administrasi`
  MODIFY `id_administrasi` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  MODIFY `id_request_skd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  MODIFY `id_request_skp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  MODIFY `id_request_sktm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  MODIFY `id_request_sku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `jenis_administrasi`
--
ALTER TABLE `jenis_administrasi`
  MODIFY `id_jenis_administrasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jenis_produk_unggulan`
--
ALTER TABLE `jenis_produk_unggulan`
  MODIFY `id_jenis_unggulan` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `produk_unggulan`
--
ALTER TABLE `produk_unggulan`
  MODIFY `id_produk_unggulan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `profil_desa`
--
ALTER TABLE `profil_desa`
  MODIFY `id_desa` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_request_skd`
--
ALTER TABLE `data_request_skd`
  ADD CONSTRAINT `data_request_skd_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_skp`
--
ALTER TABLE `data_request_skp`
  ADD CONSTRAINT `data_request_skp_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_sktm`
--
ALTER TABLE `data_request_sktm`
  ADD CONSTRAINT `data_request_sktm_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `data_request_sku`
--
ALTER TABLE `data_request_sku`
  ADD CONSTRAINT `data_request_sku_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `data_user` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
