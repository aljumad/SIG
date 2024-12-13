-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 09 Nov 2020 pada 00.30
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dboleh2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `hak_akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `hak_akses`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70', 'Athifah Oleh-Oleh Khas Kendari'),
(2, 'admin', '202cb962ac59075b964b07152d234b70', 'Mete Mubaraq'),
(3, 'admin', '202cb962ac59075b964b07152d234b70', 'Brownte Kendari'),
(4, 'admin', '202cb962ac59075b964b07152d234b70', 'Administrator'),
(5, 'admin', '202cb962ac59075b964b07152d234b70', 'LeNsCake Kendari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `chat`
--

CREATE TABLE `chat` (
  `id_chat` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `chat`
--

INSERT INTO `chat` (`id_chat`, `id_toko`, `nama`, `email`, `pesan`, `waktu`) VALUES
(6, 24, 'Dilla', 'dilla@gmail.com', 'Hallo', '2020-08-14 06:06:54'),
(7, 24, 'Athifah Oleh-Oleh Khas Kendari', 'admin@gmail.com', 'Hayy..', '2020-08-14 06:07:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kab_kota`
--

CREATE TABLE `kab_kota` (
  `id_kab_kota` int(11) NOT NULL,
  `nama_kab_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kab_kota`
--

INSERT INTO `kab_kota` (`id_kab_kota`, `nama_kab_kota`) VALUES
(1, 'Kabupaten Bombana'),
(2, 'Kabupaten Buton'),
(3, 'Kabupaten Buton Selatan'),
(4, 'Kabupaten Buton Tengah'),
(5, 'Kabupaten Buton Utara'),
(6, 'Kabupaten Kolaka'),
(7, 'Kabupaten Kolaka Timur'),
(8, 'Kabupaten Kolaka Utara'),
(9, 'Kabupaten Konawe'),
(10, 'Kabupaten Konawe Kepulauan'),
(11, 'Kabupaten Konawe Selatan'),
(12, 'Kabupaten Kolaka Utara'),
(13, 'Kabupaten Muna'),
(14, 'Kabupaten Muna Barat'),
(15, 'Kabupaten Wakatobi'),
(16, 'Kota Bau-Bau'),
(17, 'Kota Kendari');

-- --------------------------------------------------------

--
-- Struktur dari tabel `katalog`
--

CREATE TABLE `katalog` (
  `id_katalog` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_oleh2` int(11) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `oleh_oleh`
--

CREATE TABLE `oleh_oleh` (
  `id_oleh2` int(11) NOT NULL,
  `nama_oleh2` varchar(100) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `ket` text NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `oleh_oleh`
--

INSERT INTO `oleh_oleh` (`id_oleh2`, `nama_oleh2`, `id_toko`, `ket`, `harga`, `stok`, `gambar`) VALUES
(1, 'Brownte (Brownies Mete)', 26, 'Kendari adalah salah satu wilayah yang cukup terkenal dengan kacang metenya. Nah, baru2 ini Kendari memiliki kuliner khas yang bisa dijadikan oleh2 nih namanya Brownte. Panganan ini sejatinya adalah sebuah Brownies, namun yang berbeda adalah dari taburan kacang metenya. Buat para penggemar kacang mete wajib banget beli kue yang satu ini nih. Rasakan sensasi makan brownies yang berbeda dengan membeli Brownte.', 35000, 25, 'Brownte-630x380.jpg'),
(2, 'Bolu Kukus Mete', 24, 'Kendari adalah surganya para pecinta kacang mete. Disini kamu bisa menemui aneka kudapan kacang mete dengan berbagai macam olahan makanan. Salah satunya ialah Bolu Kukus Mete yang menjadi salah satu oleh2 favorit khas Kendari. Bolu Kukus Mete ini juga terbilang masih baru di Kendari, namun penyukanya sudah cukup banyak. Buat para pecinta bolu kukus, wajib banget mencoba varian lain dari kacang mete ini. ', 27000, 44, 'Bolu-Kukus-Mete-630x380.jpg'),
(3, 'Cokelat Mete', 24, 'Makanan olahan mete lainnya yang bisa kamu temui di Kendari adalah Cokelat Mete. Kudapan manis ini hampir favoritnya semua orang. Makanan ini bisa menjadi cemilan yang bikin relax saat pikiran lagi stress.', 28000, 32, 'Coklat-Kurma-Mete-630x380.jpg'),
(4, 'Abon Ikan Marlin', 24, 'Jika kamu salah satu penggemar makanan abon dan ingin menyantap varian yang berbeda, cobalah untuk membeli Abon Ikan Marlin Khas Kendari ini. Kamu bisa membeli Abon Ikan Marlin ini untuk dikonsumsi sendiri atau diberikan kepada kerabat. ', 47000, 22, 'Abon-Ikan-Marlin-630x380.jpg'),
(5, 'Keripik Mete', 27, 'Berkunjung ke Kendari tanpa membawa buah tangan Keripik Mete sepertinya rugi banget. Karena cuman di Kendari kamu bisa mendapatkan kualitas Keripik Mete paling juara dengan varian rasa bermacam2 serta harga murah.', 27000, 20, 'Keripik-mete-e1563868599109-630x380.jpg'),
(6, 'Bagea', 28, 'Jika kamu ingin menikmati dan membawa kue tradisional khas Kendari pulang kerumah, Bagea adalah salah satu yang harus dibeli. Bagea adalah kue tradisional khas Kendari yang terbuat dari bahan dasar tepung sagu.\r\nTekstur dari Kue Bagea ini lumayan keras namun rasanya manis dan legit banget. Panganan ini cocok sekali untuk dijadikan teman saat bersantai bersama keluarga atau teman2 dirumah.', 15000, 60, 'Bagea-630x380.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengunjung`
--

CREATE TABLE `pengunjung` (
  `id` int(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `hits` int(11) NOT NULL,
  `online` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengunjung`
--

INSERT INTO `pengunjung` (`id`, `ip`, `tanggal`, `hits`, `online`) VALUES
(1, '::1', '2020-11-09', 2, 1604878127);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_stok` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `id_oleh2` int(11) NOT NULL,
  `nama_oleh2` varchar(100) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `toko`
--

CREATE TABLE `toko` (
  `id_toko` int(11) NOT NULL,
  `id_kab_kota` int(11) NOT NULL,
  `nama_toko` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kab_kota` varchar(50) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `hp` varchar(20) NOT NULL DEFAULT '08...'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `toko`
--

INSERT INTO `toko` (`id_toko`, `id_kab_kota`, `nama_toko`, `alamat`, `kab_kota`, `latitude`, `longitude`, `gambar`, `hp`) VALUES
(24, 17, 'Athifah Oleh-Oleh Khas Kendari', 'Jl. H. Supu Yusuf No.22, Bende, Kec. Kadia, Kota Kendari, Sulawesi Tenggara 93111', 'Kota Kendari', '-3.980309176163827', '122.51893582975059', '2018-03-04.jpg', '081346677'),
(26, 17, 'Brownte Kendari ', 'Jl. Syech Yusuf, Korumba, Kec. Mandonga, Kota Kendari, Sulawesi Tenggara 93231', 'Kota Kendari', '-3.9703523455435152', '122.52304524840882', 'brownte.png', '085241'),
(27, 17, 'Mete Mubaraq', 'Jl. By Pass, Lahundape, Kendari Bar., Kota Kendari, Sulawesi Tenggara 93121', 'Kota Kendari', '-3.9666329999999763', '122.5184563395508', 'mete mubaraq.png', '0857'),
(28, 17, 'LeNsCake Kendari', 'Jl. Teporumbua, btn griya perdana baruga B/5, Watubangga, Baruga, Watubangga, Baruga, Kendari City, South East Sulawesi 93116', 'Kota Kendari', '-4.031861493313569', '122.48905171694882', 'lensCake.png', '0811');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id_chat`),
  ADD KEY `id_toko` (`id_toko`);

--
-- Indexes for table `kab_kota`
--
ALTER TABLE `kab_kota`
  ADD PRIMARY KEY (`id_kab_kota`);

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id_katalog`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_oleh2` (`id_oleh2`);

--
-- Indexes for table `oleh_oleh`
--
ALTER TABLE `oleh_oleh`
  ADD PRIMARY KEY (`id_oleh2`);

--
-- Indexes for table `pengunjung`
--
ALTER TABLE `pengunjung`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_stok`),
  ADD KEY `id_toko` (`id_toko`),
  ADD KEY `id_oleh2` (`id_oleh2`);

--
-- Indexes for table `toko`
--
ALTER TABLE `toko`
  ADD PRIMARY KEY (`id_toko`),
  ADD KEY `id_kab_kota` (`id_kab_kota`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id_chat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `kab_kota`
--
ALTER TABLE `kab_kota`
  MODIFY `id_kab_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id_katalog` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `oleh_oleh`
--
ALTER TABLE `oleh_oleh`
  MODIFY `id_oleh2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `pengunjung`
--
ALTER TABLE `pengunjung`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id_stok` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `toko`
--
ALTER TABLE `toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `katalog_ibfk_1` FOREIGN KEY (`id_oleh2`) REFERENCES `oleh_oleh` (`id_oleh2`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `katalog_ibfk_2` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_toko`) REFERENCES `toko` (`id_toko`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_oleh2`) REFERENCES `oleh_oleh` (`id_oleh2`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `toko`
--
ALTER TABLE `toko`
  ADD CONSTRAINT `toko_ibfk_2` FOREIGN KEY (`id_kab_kota`) REFERENCES `kab_kota` (`id_kab_kota`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
