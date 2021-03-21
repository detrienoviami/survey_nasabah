-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 02 Mar 2021 pada 16.30
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_survey`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_atribut`
--

CREATE TABLE `t_atribut` (
  `id_atribut` int(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_data_keputusan`
--

CREATE TABLE `t_data_keputusan` (
  `id_data_keputusan` int(10) NOT NULL,
  `id_jawaban` int(10) NOT NULL,
  `bagian` enum('Teller','CSO','','') NOT NULL,
  `nilai_waktu` int(5) NOT NULL,
  `nilai_fokus` int(5) NOT NULL,
  `nilai_akurat` int(5) NOT NULL,
  `nilai_layanan` int(5) NOT NULL,
  `nilai_solusi` int(5) NOT NULL,
  `id_rule_c45` int(10) NOT NULL,
  `keputusan_c45` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_data_penentu_keputusan`
--

CREATE TABLE `t_data_penentu_keputusan` (
  `id_data_penentu_keputusan` int(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_iterasi_c45`
--

CREATE TABLE `t_iterasi_c45` (
  `id_atribut` int(10) NOT NULL,
  `iterasi` varchar(3) NOT NULL,
  `atribut_gain_ratio_max` varchar(50) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL,
  `jml_kasus_total` int(5) NOT NULL,
  `jml_kasus_puas` int(5) NOT NULL,
  `jml_kasus_tidak_puas` int(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_jawaban`
--

CREATE TABLE `t_jawaban` (
  `id_jawaban` int(10) NOT NULL,
  `id_kuisioner` int(10) NOT NULL,
  `jawaban` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karyawan`
--

CREATE TABLE `t_karyawan` (
  `id_user` varchar(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `agama` enum('Islam','Kristen','Katolik','Budha','Hindu') NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kuisioner`
--

CREATE TABLE `t_kuisioner` (
  `id_kuisioner` int(10) NOT NULL,
  `kuisioner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_kuisioner`
--

INSERT INTO `t_kuisioner` (`id_kuisioner`, `kuisioner`) VALUES
(1, 'Bagaimana');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_mining_c45`
--

CREATE TABLE `t_mining_c45` (
  `id_atribut` int(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL,
  `jml_kasus_total` int(5) NOT NULL,
  `jml_kasus_puas` int(5) NOT NULL,
  `jml_kasus_tidakpuas` int(5) NOT NULL,
  `entropy` varchar(10) NOT NULL,
  `inf_gain` varchar(10) NOT NULL,
  `inf_gain_temp` varchar(10) NOT NULL,
  `split_info` varchar(10) NOT NULL,
  `split_info_temp` varchar(10) NOT NULL,
  `gain_ratio` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pohon_keputusan_c45`
--

CREATE TABLE `t_pohon_keputusan_c45` (
  `id_atribut` int(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL,
  `id_parent` char(3) NOT NULL,
  `inf_kasus_puas` varchar(5) NOT NULL,
  `inf_kasus_tidak_puas` varchar(5) NOT NULL,
  `keputusan` varchar(100) NOT NULL,
  `diproses` varchar(10) NOT NULL,
  `kondisi_atribut` varchar(150) NOT NULL,
  `looping_kondisi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rule_c45`
--

CREATE TABLE `t_rule_c45` (
  `id_c45` int(10) NOT NULL,
  `id_parent` int(5) NOT NULL,
  `rule` varchar(150) NOT NULL,
  `keputusan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_rule_penentu_keputusan`
--

CREATE TABLE `t_rule_penentu_keputusan` (
  `id_atribut` int(10) NOT NULL,
  `id_rule_c45` int(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL,
  `keputusan` varchar(25) NOT NULL,
  `cocok` varchar(15) NOT NULL,
  `pohon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` int(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `level` enum('KLO','Pimpinan','Teller','CSO') NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('aktif','tidak aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `nama`, `username`, `level`, `password`, `status`) VALUES
(1, 'admin', 'admin', 'KLO', '$2y$10$8oQ.FvtRzAKYqRWXrjBj9eRI1tkSvGdKcwZaD8idpPWPVgmvXuw6O', 'aktif'),
(2, 'olip', 'oliiiiiipppp', 'KLO', '$2y$10$sizOiXB2uCrWGKZQ9/H6MeGZVZJ3XEhpUgXEtphm2L9G7SphZKSoC', 'aktif'),
(3, 'aaa', 'aaa', 'KLO', '$2y$10$Er0/gMVuEnrfSgWKT3Zs0eorgyURkR3akq8yS404RSI2q8XXtOQ.i', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_atribut`
--
ALTER TABLE `t_atribut`
  ADD PRIMARY KEY (`id_atribut`) USING BTREE;

--
-- Indeks untuk tabel `t_data_keputusan`
--
ALTER TABLE `t_data_keputusan`
  ADD PRIMARY KEY (`id_data_keputusan`),
  ADD KEY `id_jawaban` (`id_jawaban`);

--
-- Indeks untuk tabel `t_data_penentu_keputusan`
--
ALTER TABLE `t_data_penentu_keputusan`
  ADD PRIMARY KEY (`id_data_penentu_keputusan`);

--
-- Indeks untuk tabel `t_iterasi_c45`
--
ALTER TABLE `t_iterasi_c45`
  ADD KEY `id_atribut` (`id_atribut`);

--
-- Indeks untuk tabel `t_jawaban`
--
ALTER TABLE `t_jawaban`
  ADD PRIMARY KEY (`id_jawaban`),
  ADD KEY `id_kuisioner` (`id_kuisioner`);

--
-- Indeks untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `t_kuisioner`
--
ALTER TABLE `t_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indeks untuk tabel `t_mining_c45`
--
ALTER TABLE `t_mining_c45`
  ADD UNIQUE KEY `id_atribut` (`id_atribut`);

--
-- Indeks untuk tabel `t_pohon_keputusan_c45`
--
ALTER TABLE `t_pohon_keputusan_c45`
  ADD KEY `id_atribut` (`id_atribut`);

--
-- Indeks untuk tabel `t_rule_c45`
--
ALTER TABLE `t_rule_c45`
  ADD PRIMARY KEY (`id_c45`);

--
-- Indeks untuk tabel `t_rule_penentu_keputusan`
--
ALTER TABLE `t_rule_penentu_keputusan`
  ADD KEY `id_atribut` (`id_atribut`),
  ADD KEY `id_rule-c45` (`id_rule_c45`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_kuisioner`
--
ALTER TABLE `t_kuisioner`
  MODIFY `id_kuisioner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
