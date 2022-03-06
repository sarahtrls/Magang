-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Nov 2021 pada 02.10
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webgis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_deskripsi`
--

CREATE TABLE `m_deskripsi` (
  `id_deskripsi` int(11) NOT NULL,
  `nama_satwa` varchar(255) NOT NULL,
  `nama_lain` varchar(255) NOT NULL,
  `nama_latin` varchar(255) NOT NULL,
  `status_IUCN` varchar(255) NOT NULL,
  `rujukan_peta` varchar(225) NOT NULL,
  `kontak` varchar(255) NOT NULL,
  `file_pdf` varchar(255) NOT NULL,
  `tanggal_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_deskripsi`
--

INSERT INTO `m_deskripsi` (`id_deskripsi`, `nama_satwa`, `nama_lain`, `nama_latin`, `status_IUCN`, `rujukan_peta`, `kontak`, `file_pdf`, `tanggal_upload`) VALUES
(1, 'Harimau Sumatera', 'Panthera tigris sumatrae', 'Sumatran Tiger', 'CR', 'Hariyo T Wibisono and Wulan Pusparini. 2010. Sumatran tiger (Pantheratigris sumatrae): A review of conservation status. Integrative Zoology 2010(5):313-323', 'Hariyo T Wibisono', 'Harimau_sumatera_pusparini,beebah,2010.pdf', '0000-00-00'),
(2, 'Gajah Sumatera', 'Elephas maximus', 'Sumatran Elephant', 'EN', 'Direktorat Jenderal KSDAE. 2020. Strategi dan Rencana Aksi Konservasi Gajah Indonesia 2020-2030. Direktorat KKH-KSDAE Kementerian Lingkungan Hidup dan Kehutanan Republik Indonesia. Jakarta.', '', 'belumada.pdf', '0000-00-00'),
(3, 'Gajah di Kalimantan', 'Elephas maximus borneensis', 'Gajah Borneo', 'CR', 'Wahdi Azmi, Donny Gunaryadi. 2011. Current Status of Asian Elephants in Indonesia. Gajah 35 (2011) 55-61', 'Donny Gunaryadi', 'Gajah_kalimantan,Wahdi Azmi and Donny Gunaryadi_2011.pdf', '0000-00-00'),
(4, 'Badak Sumatera', 'Dicerorhinus sumatrensis', 'Badak Asia Bercula Dua, \nSumatran Rhino ', 'CR', 'Kementerian Lingkungan Hidup dan Kehutanan. 2018. Direktorat Jenderal Konservasi Sumber Daya Alam dan Ekosistem Rencana Aksi Darurat Penyelamatan Populasi Badak Sumatera (Dicerorhinus sumatrensis)2018-2021. Jakarta, Indonesia', 'KLHK', 'badaksumatera.pdf', '0000-00-00'),
(5, 'Badak Sumatera TNBBS', 'Dicerorhinus sumatrensis', 'Badak Asia Bercula Dua, \nSumatran Rhino ', 'CR', 'Wulan Pusparini, Hariyo T. Wibisono. 2013. Landscape-level assessment of the distribution of the Sumatran rhinoceros in Bukit Barisan Selatan National Park, Sumatra. Pachyderm  No. 53  January?June 2013 ', 'Hariyo T Wibisono', 'badak_tnbbs,Pusparini,Wibisono_2013.pdf', '0000-00-00'),
(6, 'Badak Leuser', 'Dicerorhinus sumatrensis', 'Badak Asia Bercula Dua, \nSumatran Rhino ', 'CR', 'Forum Konservasi Leuser, Dinas LHK Aceh, 2020. Laporan hasil Monitoring okupansi badak sumetera di kawasan ekosistem leuser 2017-2020. (Unpublished report)', '-', 'filediberikanberdasarkanpermintaan.pdf', '0000-00-00'),
(7, 'Badak di Kalimantan', 'Dicerorhinus sumatrensis harrissoni', 'Badak Asia Bercula Dua, \nEast Sumatran rhino', 'CR', 'Kementerian Lingkungan Hidup dan Kehutanan. 2018. Direktorat Jenderal Konservasi Sumber Daya Alam dan Ekosistem Rencana Aksi Darurat Penyelamatan Populasi Badak Sumatera (Dicerorhinus sumatrensis)2018-2021. Jakarta, Indonesia', 'KLHK', 'EAP Badak Sumatera-NA rev ade Cetak-FINAL.pdf', '0000-00-00'),
(8, 'Orangutan sumatera', 'Pongo abelii', 'Sumatran orangutan', 'CR', 'Sri Suci Utami, dkk. 2016. Final Report Orang Utan Population and Habitat Viability Assessment. Directorate General of Natural Resources and Ecosystem Conservation, Ministry of Environment and Forestry of Indonesia, Forum Ora', 'Suci Utami', 'PHVA Orangutan 2016_Final Report.pdf', '0000-00-00'),
(9, 'Orangutan Tapanuli', 'Pongo tapanuliensis', 'Tapanuli orangutan', 'CR', 'Sri Suci Utami, dkk. 2016. Final Report Orang Utan Population and Habitat Viability Assessment. Directorate General of Natural Resources and Ecosystem Conservation, Ministry of Environment and Forestry of Indonesia, Forum Ora', 'Suci Utami', 'PHVA Orangutan 2016_Final Report.pdf', '0000-00-00'),
(10, 'Kucing emas', 'Catopuma temminckii', 'golden cat, fire cat', 'NT', 'Iding Achmad Haidir, Zaneta Kaszta, Lara L Sousa, Muhammad I Lubis, David W Macdonald. Matthew Linkie. 2020. Felids, forest and farmland: identifying high priorityconservation areas in Sumatra.landscape Ecology. https://link.', 'Iding Achmad Haidir', 'Iding Haidir_Chapter-5_2020-Landscape_Ecology.pdf', '0000-00-00'),
(11, 'Macan dahan ', 'Neofelis diardi diardi', '\nclouded leopard', 'VU', 'Iding Achmad Haidir, Zaneta Kaszta, Lara L Sousa, Muhammad I Lubis, David W Macdonald. Matthew Linkie. 2020. Felids, forest and farmland: identifying high priorityconservation areas in Sumatra.landscape Ecology. https://link.', 'Iding Achmad Haidir', 'Iding Haidir_Chapter-5_2020-Landscape_Ecology.pdf', '0000-00-00'),
(12, 'Kucing batu', 'Pardofelis marmorata', 'Rock Cat', 'NT', 'Iding Achmad Haidir, Zaneta Kaszta, Lara L Sousa, Muhammad I Lubis, David W Macdonald. Matthew Linkie. 2020. Felids, forest and farmland: identifying high priorityconservation areas in Sumatra.landscape Ecology. https://link.', 'Iding Achmad Haidir', 'Iding Haidir_Chapter-5_2020-Landscape_Ecology.pdf', '0000-00-00'),
(13, 'Orangutan Kalimantan', 'Pongo pygmaeus', 'Kalimantan orangutan', 'CR', 'Sri Suci Utami, dkk. 2016. Final Report Orang Utan Population and Habitat Viability Assessment. Directorate General of Natural Resources and Ecosystem Conservation, Ministry of Environment and Forestry of Indonesia, Forum Ora', 'Suci Utami', 'PHVA Orangutan 2016_Final Report.pdf', '0000-00-00'),
(14, 'Bekantan Kalimantan', 'Nasalis larvatus', 'Proboscis monkey ', 'EN', 'Erik Meijaard, Vincent Nijman. 2000. Distribution and conservation of the proboscis monkey (Nasalis larvatus) in Kalimantan, Indonesia. Biological Conservation 92 (2000) 15-24', 'Via Darmawan Listanto', 'Bekantan, Erik Meijaard, Vincent Nijman, 2000.pdf', '0000-00-00'),
(15, 'Macan tutul jawa', 'Panthera pardus melas', 'Macan Kumbang, Javan Leopard', 'CR', 'Wibisono HT, Wahyudi HA, Wilianto E, Pinondang IMR, Primajati M, Liswanto D. 2018. Identifying priority conservation landscapes and actions for the Critically Endangered Javan leopard in Indonesia:Conserving the last large ca', 'Hariyo T Wibisono', 'Macan_tutul_jawa_Bibah_dkk_2018.pdf', '0000-00-00'),
(16, 'Komodo TNK', 'Varanus komodoensis', 'Biawak Komodo', 'VU', 'Deni Purwandana et al. 2014. Demographic status of Komodo dragons populations in Komodo National Park. Biological Conservation 171 (2014) 29?35', '', 'komodotnk.pdf', '0000-00-00'),
(17, 'Komodo Flores', 'Varanus komodoensis', 'Biawak Komodo', 'VU', 'BBKSDA NTT-KSP. 2020. Laporan kegiatan kerjasama tahunan BBKSDA NTT-KSP periode 2019/2020', 'KLHK', 'komodoflores.pdf', '0000-00-00'),
(18, 'Babi Rusa', 'Babyrousa babyrussa', 'babirusa maluku, babirusa emas, babirusa berambut ', 'VU', 'Kementerian Lingkungan Hidup dan Kehutanan. 2013. Strategi dan Rencana Aksi Konservasi Babirusa (Babyrousa babyrussa) Tahun 2013-2022', 'KLHK', 'babirusa.pdf', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_peta`
--

CREATE TABLE `m_peta` (
  `id_peta` int(11) NOT NULL,
  `nama_satwa` varchar(255) NOT NULL,
  `file_geojson` varchar(255) NOT NULL,
  `warna` varchar(30) NOT NULL,
  `tanggal_upload` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_peta`
--

INSERT INTO `m_peta` (`id_peta`, `nama_satwa`, `file_geojson`, `warna`, `tanggal_upload`) VALUES
(1, 'Harimau Sumatera', 'harimau_sumatera.geojson', '#C0B277', '0000-00-00'),
(2, 'Gajah Sumatera', 'gajah_sumatra.geojson', '#BEF407', '0000-00-00'),
(3, 'Gajah di Kalimantan', 'gajah_kalimantan.geojson', '#B84568', '0000-00-00'),
(4, 'Badak Sumatera', 'badak_sumatera_yabi.geojson', '#315173', '0000-00-00'),
(5, 'Badak Sumatera TNBBS', 'badak_sumatera_tnbbs.geojson', '#842429', '0000-00-00'),
(6, 'Badak Leuser', 'badak_sumatera_leseur.geojson', '#B27E1B', '0000-00-00'),
(7, 'Badak di Kalimantan', 'badak_kalimantan.geojson', '#A67FB6', '0000-00-00'),
(8, 'Orangutan sumatera', 'orangutan_sumatera_1.geojson', '#E9684B', '0000-00-00'),
(9, 'Orangutan Tapanuli', 'orangutan_tapanuli.geojson', '#DFAA91', '0000-00-00'),
(10, 'Kucing emas', 'kucing_emas.geojson', '#C69C73', '0000-00-00'),
(11, 'Macan dahan ', 'macan_dahan.geojson', '#B13135', '0000-00-00'),
(12, 'Kucing batu', 'kucing_batu.geojson', '#A49CA9', '0000-00-00'),
(13, 'Orangutan Kalimantan', 'orangutan_kalimantan.geojson', '#9E391A', '0000-00-00'),
(14, 'Bekantan Kalimantan', 'bekantan_kalimantan', '#E2C561', '0000-00-00'),
(15, 'Macan tutul jawa', 'macan_tutul_jawa.geojson', '#CB217C', '0000-00-00'),
(16, 'Komodo TNK', 'komodo_tnk.geojson', '#CF4200', '0000-00-00'),
(17, 'Komodo Flores', 'komodo_flores.geojson', '#EDFE09', '0000-00-00'),
(18, 'Babi Rusa', 'babirusa.geojson', '#902C3E', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_role`
--

CREATE TABLE `m_role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_role`
--

INSERT INTO `m_role` (`id_role`, `role`) VALUES
(1, 'ad'),
(2, 'me');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `status` varchar(30) DEFAULT NULL,
  `nip` varchar(50) DEFAULT NULL,
  `nama_instansi` varchar(255) DEFAULT NULL,
  `role` varchar(2) DEFAULT NULL,
  `date_created` date DEFAULT NULL,
  `is_active` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`id_user`, `username`, `password`, `email`, `status`, `nip`, `nama_instansi`, `role`, `date_created`, `is_active`) VALUES
(15, 'admin', '$2y$10$T9nFTYVEshT0KsBSOXJ4S.EnYiIwAu1x.zrRVaAEUjdN0Xke9gEpW', 'admin@gmail.com', 'admin', '123456', 'pika', '1', '0000-00-00', 1),
(16, 'user', '$2y$10$EXl.aNrLBTPyYaZCm8jx6eghXuYM/mdJIIxquGXeGmUIixy5P8Wvi', 'user@gmail.com', 'user', '1234567', 'user', '2', '0000-00-00', 1),
(17, 'sarah', '$2y$10$YTARwAKvpqaqXGyc06VgfOuAAfauVVu9d0b93IFCCZh3ACwUe8JQm', 'sarah@gmail.com', 'mahasiswa', '', 'unpak', '2', '0000-00-00', 1),
(22, 'deris', '$2y$10$9keaYkC6W4oSoNJryY9RFO5UQuUO6ygeX.51OpQ6bsjehFulG3ive', 'deris12@gmail.com', 'mahasiswa', '', '', '2', '0000-00-00', 1),
(24, 'lingga', '$2y$10$3fhZ6ubz3mttyPXNtRiTZuhQX2z5bq5.hvcnpjE/w.2NV0rRRN9am', 'bana@gmail.com', 'Mahasiswa', '', 'Unpak', '2', '0000-00-00', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `m_deskripsi`
--
ALTER TABLE `m_deskripsi`
  ADD PRIMARY KEY (`id_deskripsi`);

--
-- Indeks untuk tabel `m_peta`
--
ALTER TABLE `m_peta`
  ADD PRIMARY KEY (`id_peta`);

--
-- Indeks untuk tabel `m_role`
--
ALTER TABLE `m_role`
  ADD PRIMARY KEY (`id_role`),
  ADD KEY `role` (`role`);

--
-- Indeks untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `m_deskripsi`
--
ALTER TABLE `m_deskripsi`
  MODIFY `id_deskripsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `m_peta`
--
ALTER TABLE `m_peta`
  MODIFY `id_peta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `m_role`
--
ALTER TABLE `m_role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `m_user`
--
ALTER TABLE `m_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
