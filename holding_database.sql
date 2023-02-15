-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Feb 2023 pada 16.25
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `holding_database`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `db_kampus`
--

CREATE TABLE `db_kampus` (
  `id_kampus` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `lat` double NOT NULL,
  `lon` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `db_kampus`
--

INSERT INTO `db_kampus` (`id_kampus`, `keterangan`, `lat`, `lon`) VALUES
(1, 'Kampus 1', -7.951774601837539, 112.60744550307471),
(2, 'Kampus 2', -7.9065642516316625, 112.57827697252293),
(3, 'Kampus 3', -7.921936802882444, 112.54748557846389);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bisnis`
--

CREATE TABLE `tb_bisnis` (
  `id_bisnis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenispelayanan` int(11) NOT NULL,
  `jenis_kerjasama` int(11) NOT NULL,
  `nilai_kerjasama` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bisnis`
--

INSERT INTO `tb_bisnis` (`id_bisnis`, `id_user`, `id_jenispelayanan`, `jenis_kerjasama`, `nilai_kerjasama`, `date`) VALUES
(1, 17, 19, 1, 64000000, '2023-02-10 14:18:45'),
(2, 18, 19, 1, 32000000, '2023-02-10 14:19:16'),
(3, 19, 19, 1, 35000000, '2023-02-10 14:19:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jeniskerjasama`
--

CREATE TABLE `tb_jeniskerjasama` (
  `id_kerjasama` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jeniskerjasama`
--

INSERT INTO `tb_jeniskerjasama` (`id_kerjasama`, `keterangan`) VALUES
(1, 'Penuh'),
(2, 'Kontrak'),
(6, 'Tidak Penuh');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenislayanan`
--

CREATE TABLE `tb_jenislayanan` (
  `id_layanan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `jenis_layanan` varchar(50) NOT NULL,
  `lat` double DEFAULT NULL,
  `lon` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenislayanan`
--

INSERT INTO `tb_jenislayanan` (`id_layanan`, `id_kategori`, `jenis_layanan`, `lat`, `lon`) VALUES
(1, 1, 'Sertifikasi Halal', -7.906373514558228, 112.57933760481485),
(2, 1, 'Sertifikasi Auditor Halal', -7.906195514793395, 112.57894332011543),
(3, 1, 'Pelatihan Halal', -7.906195514793357, 112.57894332011678),
(4, 1, 'Uji Lab Halal', NULL, NULL),
(5, 2, 'UIN Kantin', NULL, NULL),
(6, 2, 'UIN Mart', NULL, NULL),
(7, 2, 'UIN Press', NULL, NULL),
(8, 2, 'UIN Transport', NULL, NULL),
(9, 2, 'UIN Travel', NULL, NULL),
(10, 2, 'UIN  Merchandise', NULL, NULL),
(11, 2, 'UIN Catering', NULL, NULL),
(12, 2, 'UIN Training', NULL, NULL),
(13, 2, 'UIN Building', NULL, NULL),
(14, 2, 'UIN Laundry', NULL, NULL),
(15, 3, 'UB Fasum', NULL, NULL),
(16, 3, 'UB Fasor', NULL, NULL),
(17, 3, 'UB Ma\'had', NULL, NULL),
(18, 3, 'UB Hotel', NULL, NULL),
(19, 3, 'UB Land', NULL, NULL),
(20, 3, 'UB Lab', NULL, NULL),
(21, 4, 'Medical Check', NULL, NULL),
(22, 4, 'Medical Lab', NULL, NULL),
(23, 4, 'Apotik', NULL, NULL),
(24, 4, 'Akupuntur', NULL, NULL),
(27, 2, 'Fotocopy', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kategoribisnis`
--

CREATE TABLE `tb_kategoribisnis` (
  `id_kategori` int(11) NOT NULL,
  `kategori_bisnis` varchar(50) NOT NULL,
  `target_capaian` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kategoribisnis`
--

INSERT INTO `tb_kategoribisnis` (`id_kategori`, `kategori_bisnis`, `target_capaian`) VALUES
(1, 'Halal Industri', 400000000),
(2, 'Service and Retail', 300000000),
(3, 'Property', 200000000),
(4, 'Medical Center', 350000000),
(5, 'Bisnis Akademik', 500000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_role`
--

CREATE TABLE `tb_role` (
  `id_role` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_role`
--

INSERT INTO `tb_role` (`id_role`, `keterangan`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `password` varchar(225) NOT NULL,
  `role` int(11) NOT NULL,
  `session_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `email`, `password`, `role`, `session_id`) VALUES
(13, 'admin', 'admin@gmail.com', '$2y$10$8ql1WZHpCwgIIqbp8e1OAejggQaLnVFKGWBRzQ47ll8znDChMmk8S', 1, 'vpe6kdktl2fo0kl000pe5oesqi'),
(14, 'sadad', 'sadad279@gmail.com', '$2y$10$xJZP5eD1AvIdPdX/wqRdleyNN5qv6WhBiScTVqrDbfy99gF51baoO', 2, 'frf9tks6i76efrb5spp38njs54'),
(15, 'jhon', 'krisna@gmail.com', '$2y$10$wRz84GdAFIx.TF6cvpTj4.YvhWsd72Ctg5o3DMbiVlYJYuu/lfXn.', 2, '56cs94mocv3e0buv7ap4mtbicj'),
(16, 'vobas', 'cobacoba@gmail.com', '$2y$10$UeKgT5qSA8.yNkuVDBqJx.3xQ11LCg5k17PtqLdu1En1gx43EJnJ6', 2, 'f4p63qdvg3v8up1khr7s5rhrko'),
(17, 'Suwandi', 'Holding@gmail.com', '$2y$10$SWm1ogTzpImKcHmT6W4E/udrhmjCSNsEcXt/ofu41aee6434iy0Eq', 2, 'v5d30om44ro30rkocpaf1gau4k'),
(18, 'Kariadi', 'Holding@gmail.com', '$2y$10$1ksY29ia2t/FlBvm0d6qh.a0GP7ASaUb0XnePqIaWSWGxnxiWpPFy', 2, 'c1c9udh7gkd9gc4cbr4ajncq49'),
(19, 'Adi Sastra W', 'Holding@gmail.com', '$2y$10$DPDkipTPsyZ5dlORerTzKu.lilUVEBHbebriaymK4G7hvvkqJ60xK', 2, 'nffuet2u30lqaf79lip9ov3usk'),
(20, 'PT.MAC', 'Holding@gmail.com', '$2y$10$2xZti8TAfasS0CTCfx3oMuQPo8W4KNAQrw9uB8oo3JZZF0k35Tlqe', 2, '5358v31r415efblerhk3idvk05'),
(21, 'BNI', 'Holding@gmail.com', '$2y$10$EMY1NbeKXdOaAZPRTTlI5ecNzaMVTePDzStjrePKRHipGdy1gBcdC', 2, 'iuck1orks1n02iq784q6f3lkg7'),
(22, 'BRI', 'Holding@gmail.com', '$2y$10$SS34kotO1tKvjViCxJ4vJOQLWftmTk4sexulq0rdd4gfpvhjtjrui', 2, 'cfttv2p4kabqnsr20ervk7scio'),
(23, 'Kopma', 'Holding@gmail.com', '$2y$10$gT7.yd85ze68p/LLzv8lBOY6VM.0L/q56qUD46IwFUgwnnPJnROqa', 2, 'jave69qf8hr5tn2v142r5cjird'),
(24, 'KOPKAR', 'Holding@gmail.com', '$2y$10$of2CiRCLX7E7AfDmmbtYLe0iPoooH5g4qVV8OaSjWMT6WUh0g8XbS', 2, 'n6pp03pmjieu2cr6ef7dhi8lqc'),
(25, 'UIN MART', 'Holding@gmail.com', '$2y$10$ZPMh.tWFNR4TKCpXfchhBeAQzUdkM0kwttgpBYt13hD1YQE.Onhsa', 2, '2tak520jr8ot027tesdhkvh60o');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_userbisnisprofile`
--

CREATE TABLE `tb_userbisnisprofile` (
  `id_profilebisnis` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `proposal_bisnis` text NOT NULL,
  `cash_flow` text NOT NULL,
  `pojek_kerjasama` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `tindakan` enum('Disetujui','Belum Disetujui') NOT NULL DEFAULT 'Belum Disetujui'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_userbisnisprofile`
--

INSERT INTO `tb_userbisnisprofile` (`id_profilebisnis`, `id_user`, `proposal_bisnis`, `cash_flow`, `pojek_kerjasama`, `date`, `tindakan`) VALUES
(2, 15, 'file-pb/63e4762a52f6c3.41669649.pdf', 'file-cf/63e4762a530523.09924747.pdf', 'kerjasama dengan uin holding', '2023-02-09 11:29:16', 'Disetujui'),
(3, 16, 'file-pb/63e5e38b660226.75067401.pdf', 'file-cf/63e5e38b661496.62780871.pdf', 'sdada', '2023-02-10 13:34:25', 'Disetujui'),
(4, 17, 'file-pb/63e5eb427b9729.03157727.pdf', 'file-cf/63e5eb427ba517.77221976.pdf', 'Sewa Lahan Kampus 3', '2023-02-10 14:18:45', 'Disetujui'),
(5, 18, 'file-pb/63e5eb92b4cb56.51293552.pdf', 'file-cf/63e5eb92b4cbd8.20430775.pdf', 'Sewa Lahan Kampus 3', '2023-02-10 14:19:16', 'Disetujui'),
(6, 19, 'file-pb/63e5ec466597a9.71914956.pdf', 'file-cf/63e5ec466597f7.10423888.pdf', 'Sewa Kampus 3\r\n', '2023-02-10 14:19:51', 'Disetujui'),
(7, 20, 'file-pb/63e5ec9dd94d21.22662833.pdf', 'file-cf/63e5ec9dd94d65.75393624.pdf', 'Menara', '2023-02-10 14:05:01', 'Belum Disetujui'),
(8, 21, 'file-pb/63e5ece0615ab4.43937240.pdf', 'file-cf/63e5ece0615b04.73495405.pdf', 'ATM', '2023-02-10 14:06:08', 'Belum Disetujui'),
(9, 22, 'file-pb/63e5edcf8f3640.37616626.pdf', 'file-cf/63e5edcf8f36a4.26271132.pdf', 'ATM', '2023-02-10 14:10:07', 'Belum Disetujui'),
(10, 23, 'file-pb/63e5ee05744496.79705408.pdf', 'file-cf/63e5ee05744501.49600739.pdf', 'Sewa Gedung Perkantoran', '2023-02-10 14:11:01', 'Belum Disetujui'),
(11, 24, 'file-pb/63e5ee6e8ccd89.41278809.pdf', 'file-cf/63e5ee6e8ccdd1.92623533.pdf', 'Sewa Gedung (Perkantoran)', '2023-02-10 14:12:46', 'Belum Disetujui'),
(12, 25, 'file-pb/63e5ef78022a03.78574520.pdf', 'file-cf/63e5ef78022a81.53080422.pdf', 'Sewa Gedung (Perkantoran)', '2023-02-10 14:17:12', 'Belum Disetujui');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `db_kampus`
--
ALTER TABLE `db_kampus`
  ADD PRIMARY KEY (`id_kampus`);

--
-- Indeks untuk tabel `tb_bisnis`
--
ALTER TABLE `tb_bisnis`
  ADD PRIMARY KEY (`id_bisnis`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_jenispelayanan` (`id_jenispelayanan`),
  ADD KEY `jenis_kerjasama` (`jenis_kerjasama`),
  ADD KEY `nilai_kerjasama` (`nilai_kerjasama`);

--
-- Indeks untuk tabel `tb_jeniskerjasama`
--
ALTER TABLE `tb_jeniskerjasama`
  ADD PRIMARY KEY (`id_kerjasama`);

--
-- Indeks untuk tabel `tb_jenislayanan`
--
ALTER TABLE `tb_jenislayanan`
  ADD PRIMARY KEY (`id_layanan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `tb_kategoribisnis`
--
ALTER TABLE `tb_kategoribisnis`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `tb_userbisnisprofile`
--
ALTER TABLE `tb_userbisnisprofile`
  ADD PRIMARY KEY (`id_profilebisnis`) USING BTREE,
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `db_kampus`
--
ALTER TABLE `db_kampus`
  MODIFY `id_kampus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_bisnis`
--
ALTER TABLE `tb_bisnis`
  MODIFY `id_bisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_jeniskerjasama`
--
ALTER TABLE `tb_jeniskerjasama`
  MODIFY `id_kerjasama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_jenislayanan`
--
ALTER TABLE `tb_jenislayanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_kategoribisnis`
--
ALTER TABLE `tb_kategoribisnis`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_role`
--
ALTER TABLE `tb_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tb_userbisnisprofile`
--
ALTER TABLE `tb_userbisnisprofile`
  MODIFY `id_profilebisnis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_bisnis`
--
ALTER TABLE `tb_bisnis`
  ADD CONSTRAINT `tb_bisnis_ibfk_1` FOREIGN KEY (`jenis_kerjasama`) REFERENCES `tb_jeniskerjasama` (`id_kerjasama`),
  ADD CONSTRAINT `tb_bisnis_ibfk_2` FOREIGN KEY (`id_jenispelayanan`) REFERENCES `tb_jenislayanan` (`id_layanan`),
  ADD CONSTRAINT `tb_bisnis_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tb_jenislayanan`
--
ALTER TABLE `tb_jenislayanan`
  ADD CONSTRAINT `tb_jenislayanan_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `tb_kategoribisnis` (`id_kategori`);

--
-- Ketidakleluasaan untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `tb_role` (`id_role`);

--
-- Ketidakleluasaan untuk tabel `tb_userbisnisprofile`
--
ALTER TABLE `tb_userbisnisprofile`
  ADD CONSTRAINT `tb_userbisnisprofile_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
