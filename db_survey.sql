-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jun 2021 pada 08.14
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
  `id_atribut` varchar(10) NOT NULL,
  `atribut` varchar(50) NOT NULL,
  `nilai_atribut` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_atribut`
--

INSERT INTO `t_atribut` (`id_atribut`, `atribut`, `nilai_atribut`) VALUES
('ATR01', 'Sangat Tidak Puas', 1),
('ATR02', 'Tidak Puas', 2),
('ATR03', 'Cukup Puas', 3),
('ATR04', 'Puas', 4),
('ATR05', 'Sangat Puas', 5),
('ATR06', 'Ya', 1),
('ATR07', 'Tidak', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_datamining`
--

CREATE TABLE `t_datamining` (
  `id_datamining` int(10) NOT NULL,
  `id_atribut` int(10) NOT NULL,
  `jml_jawaban` int(5) NOT NULL,
  `entrophy` int(11) NOT NULL,
  `gain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_karyawan`
--

CREATE TABLE `t_karyawan` (
  `id_user` int(10) NOT NULL,
  `nip` int(10) NOT NULL,
  `nama` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `agama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `status` enum('Aktif','Tidak Aktif','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_karyawan`
--

INSERT INTO `t_karyawan` (`id_user`, `nip`, `nama`, `tgl_lahir`, `email`, `agama`, `alamat`, `no_hp`, `status`) VALUES
(9, 123456, 'Iis Wijaya', '2021-06-15', 'bumiperkasa@gmail.co', 'Islam', 'Jl Melati mantan', '085711177524', 'Aktif'),
(2, 80644791, '', '0000-00-00', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kuisioner`
--

CREATE TABLE `t_kuisioner` (
  `id_kuisioner` int(10) NOT NULL,
  `kuisioner` text NOT NULL,
  `atribut` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_kuisioner`
--

INSERT INTO `t_kuisioner` (`id_kuisioner`, `kuisioner`, `atribut`) VALUES
(1, 'Waktu yang dibutuhkan Teller untuk menangani transaksi atau pertanyaan Bapak/Ibu.', 'Waktu'),
(2, 'Dari awal Teller menyelesaikan transaksi dengan teliti dan benar.', 'Akurat'),
(3, 'Teller melayani dengan ramah, sopan dan perhatian.', 'Fokus'),
(4, 'Tingkat Kepuasan Bapak/Ibu terhadap Layanan Teller.', 'Kepuasan'),
(5, 'Apakah Bapak/Ibu/Saudara/i Sangat Puas dengan Layanan di Teller?', 'Layanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kuisioner_result`
--

CREATE TABLE `t_kuisioner_result` (
  `id_kuisioner_result` int(11) NOT NULL,
  `kode_survey` varchar(100) NOT NULL,
  `no_kuisioner` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` enum('Laki-laki','Perempuan','','') NOT NULL,
  `nohp` int(11) NOT NULL,
  `id_kuisioner` int(10) NOT NULL,
  `jawaban` int(5) NOT NULL,
  `nama_karyawan` varchar(50) NOT NULL,
  `tgl_jawaban` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_kuisioner_result`
--

INSERT INTO `t_kuisioner_result` (`id_kuisioner_result`, `kode_survey`, `no_kuisioner`, `nama`, `jk`, `nohp`, `id_kuisioner`, `jawaban`, `nama_karyawan`, `tgl_jawaban`) VALUES
(48, 'SRVY0001', '1', 'Anzar', 'Laki-laki', 924829, 1, 1, 'detri', '2021-06-07'),
(49, 'SRVY0001', '2', 'Anzar', 'Laki-laki', 924829, 2, 3, 'detri', '2021-06-07'),
(50, 'SRVY0001', '3', 'Anzar', 'Laki-laki', 924829, 3, 4, 'detri', '2021-06-07'),
(51, 'SRVY0001', '4', 'Anzar', 'Laki-laki', 924829, 4, 4, 'detri', '2021-06-07'),
(52, 'SRVY0001', '5', 'Anzar', 'Laki-laki', 924829, 5, 5, 'detri', '2021-06-07'),
(53, 'SRVY0053', '1', 'Kiki', 'Perempuan', 2147483647, 1, 5, 'detri', '2021-06-07'),
(54, 'SRVY0053', '2', 'Kiki', 'Perempuan', 2147483647, 2, 5, 'detri', '2021-06-07'),
(55, 'SRVY0053', '3', 'Kiki', 'Perempuan', 2147483647, 3, 5, 'detri', '2021-06-07'),
(56, 'SRVY0053', '4', 'Kiki', 'Perempuan', 2147483647, 4, 5, 'detri', '2021-06-07'),
(57, 'SRVY0053', '5', 'Kiki', 'Perempuan', 2147483647, 5, 5, 'detri', '2021-06-07'),
(58, 'SRVY0058', '1', 'Zaenal', 'Laki-laki', 2147483647, 1, 2, 'detri', '2021-06-07'),
(59, 'SRVY0058', '2', 'Zaenal', 'Laki-laki', 2147483647, 2, 3, 'detri', '2021-06-07'),
(60, 'SRVY0058', '3', 'Zaenal', 'Laki-laki', 2147483647, 3, 3, 'detri', '2021-06-07'),
(61, 'SRVY0058', '4', 'Zaenal', 'Laki-laki', 2147483647, 4, 5, 'detri', '2021-06-07'),
(62, 'SRVY0058', '5', 'Zaenal', 'Laki-laki', 2147483647, 5, 1, 'detri', '2021-06-07'),
(63, 'SRVY0063', '1', 'Iqbal', 'Laki-laki', 2147483647, 1, 5, 'detri', '2021-06-09'),
(64, 'SRVY0063', '2', 'Iqbal', 'Laki-laki', 2147483647, 2, 5, 'detri', '2021-06-09'),
(65, 'SRVY0063', '3', 'Iqbal', 'Laki-laki', 2147483647, 3, 5, 'detri', '2021-06-09'),
(66, 'SRVY0063', '4', 'Iqbal', 'Laki-laki', 2147483647, 4, 5, 'detri', '2021-06-09'),
(67, 'SRVY0063', '5', 'Iqbal', 'Laki-laki', 2147483647, 5, 5, 'detri', '2021-06-09'),
(68, 'SRVY0068', '1', 'Andri Mulyadi', 'Laki-laki', 2147483647, 1, 5, 'detri', '2021-06-09'),
(69, 'SRVY0068', '2', 'Andri Mulyadi', 'Laki-laki', 2147483647, 2, 5, 'detri', '2021-06-09'),
(70, 'SRVY0068', '3', 'Andri Mulyadi', 'Laki-laki', 2147483647, 3, 5, 'detri', '2021-06-09'),
(71, 'SRVY0068', '4', 'Andri Mulyadi', 'Laki-laki', 2147483647, 4, 5, 'detri', '2021-06-09'),
(72, 'SRVY0068', '5', 'Andri Mulyadi', 'Laki-laki', 2147483647, 5, 5, 'detri', '2021-06-09'),
(73, 'SRVY0073', '1', 'Iqbal', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(74, 'SRVY0073', '2', 'Iqbal', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(75, 'SRVY0073', '3', 'Iqbal', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(76, 'SRVY0073', '4', 'Iqbal', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(77, 'SRVY0073', '5', 'Iqbal', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(78, 'SRVY0078', '1', 'Andri', 'Laki-laki', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(79, 'SRVY0078', '2', 'Andri', 'Laki-laki', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(80, 'SRVY0078', '3', 'Andri', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(81, 'SRVY0078', '4', 'Andri', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(82, 'SRVY0078', '5', 'Andri', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(83, 'SRVY0083', '1', 'Yustika', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(84, 'SRVY0083', '2', 'Yustika', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(85, 'SRVY0083', '3', 'Yustika', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(86, 'SRVY0083', '4', 'Yustika', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(87, 'SRVY0083', '5', 'Yustika', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(88, 'SRVY0088', '1', 'Malik', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(89, 'SRVY0088', '2', 'Malik', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(90, 'SRVY0088', '3', 'Malik', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(91, 'SRVY0088', '4', 'Malik', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(92, 'SRVY0088', '5', 'Malik', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(93, 'SRVY0093', '1', 'Tria', 'Perempuan', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(94, 'SRVY0093', '2', 'Tria', 'Perempuan', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(95, 'SRVY0093', '3', 'Tria', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(96, 'SRVY0093', '4', 'Tria', 'Perempuan', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(97, 'SRVY0093', '5', 'Tria', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(98, 'SRVY0098', '1', 'Yustina', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(99, 'SRVY0098', '2', 'Yustina', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(100, 'SRVY0098', '3', 'Yustina', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(101, 'SRVY0098', '4', 'Yustina', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(102, 'SRVY0098', '5', 'Yustina', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(103, 'SRVY0100', '1', 'Kusnadi', 'Laki-laki', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(104, 'SRVY0100', '2', 'Kusnadi', 'Laki-laki', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(105, 'SRVY0100', '3', 'Kusnadi', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(106, 'SRVY0100', '4', 'Kusnadi', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(107, 'SRVY0100', '5', 'Kusnadi', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(108, 'SRVY0100', '1', 'Laela', 'Perempuan', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(109, 'SRVY0100', '2', 'Laela', 'Perempuan', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(110, 'SRVY0100', '3', 'Laela', 'Perempuan', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(111, 'SRVY0100', '4', 'Laela', 'Perempuan', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(112, 'SRVY0100', '5', 'Laela', 'Perempuan', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(113, 'SRVY0100', '1', 'Villz', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(114, 'SRVY0100', '2', 'Villz', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(115, 'SRVY0100', '3', 'Villz', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(116, 'SRVY0100', '4', 'Villz', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(117, 'SRVY0100', '5', 'Villz', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(118, 'SRVY0100', '1', 'Asfar', 'Perempuan', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(119, 'SRVY0100', '2', 'Asfar', 'Perempuan', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(120, 'SRVY0100', '3', 'Asfar', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(121, 'SRVY0100', '4', 'Asfar', 'Perempuan', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(122, 'SRVY0100', '5', 'Asfar', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(123, 'SRVY0100', '1', 'Fariz', 'Laki-laki', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(124, 'SRVY0100', '2', 'Fariz', 'Laki-laki', 2147483647, 2, 3, 'Cecep ', '2021-06-10'),
(125, 'SRVY0100', '3', 'Fariz', 'Laki-laki', 2147483647, 3, 2, 'Cecep ', '2021-06-10'),
(126, 'SRVY0100', '4', 'Fariz', 'Laki-laki', 2147483647, 4, 3, 'Cecep ', '2021-06-10'),
(127, 'SRVY0100', '5', 'Fariz', 'Laki-laki', 2147483647, 5, 1, 'Cecep ', '2021-06-10'),
(128, 'SRVY0100', '1', 'Alif', 'Laki-laki', 2147483647, 1, 2, 'Aulia', '2021-06-10'),
(129, 'SRVY0100', '2', 'Alif', 'Laki-laki', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(130, 'SRVY0100', '3', 'Alif', 'Laki-laki', 2147483647, 3, 3, 'Aulia', '2021-06-10'),
(131, 'SRVY0100', '4', 'Alif', 'Laki-laki', 2147483647, 4, 2, 'Aulia', '2021-06-10'),
(132, 'SRVY0100', '5', 'Alif', 'Laki-laki', 2147483647, 5, 1, 'Aulia', '2021-06-10'),
(133, 'SRVY0100', '1', 'Syahrul', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(134, 'SRVY0100', '2', 'Syahrul', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(135, 'SRVY0100', '3', 'Syahrul', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(136, 'SRVY0100', '4', 'Syahrul', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(137, 'SRVY0100', '5', 'Syahrul', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(138, 'SRVY0100', '1', 'Rian', 'Laki-laki', 2147483647, 1, 4, 'Aulia', '2021-06-10'),
(139, 'SRVY0100', '2', 'Rian', 'Laki-laki', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(140, 'SRVY0100', '3', 'Rian', 'Laki-laki', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(141, 'SRVY0100', '4', 'Rian', 'Laki-laki', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(142, 'SRVY0100', '5', 'Rian', 'Laki-laki', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(143, 'SRVY0100', '1', 'Hilmy', 'Laki-laki', 2147483647, 1, 4, 'Detri', '2021-06-10'),
(144, 'SRVY0100', '2', 'Hilmy', 'Laki-laki', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(145, 'SRVY0100', '3', 'Hilmy', 'Laki-laki', 2147483647, 3, 4, 'Detri', '2021-06-10'),
(146, 'SRVY0100', '4', 'Hilmy', 'Laki-laki', 2147483647, 4, 4, 'Detri', '2021-06-10'),
(147, 'SRVY0100', '5', 'Hilmy', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(148, 'SRVY0100', '1', 'Nurika', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(149, 'SRVY0100', '2', 'Nurika', 'Perempuan', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(150, 'SRVY0100', '3', 'Nurika', 'Perempuan', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(151, 'SRVY0100', '4', 'Nurika', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(152, 'SRVY0100', '5', 'Nurika', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(153, 'SRVY0100', '1', 'Sisca', 'Perempuan', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(154, 'SRVY0100', '2', 'Sisca', 'Perempuan', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(155, 'SRVY0100', '3', 'Sisca', 'Perempuan', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(156, 'SRVY0100', '4', 'Sisca', 'Perempuan', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(157, 'SRVY0100', '5', 'Sisca', 'Perempuan', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(158, 'SRVY0100', '1', 'Suhendro', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(159, 'SRVY0100', '2', 'Suhendro', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(160, 'SRVY0100', '3', 'Suhendro', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(161, 'SRVY0100', '4', 'Suhendro', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(162, 'SRVY0100', '5', 'Suhendro', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(163, 'SRVY0100', '1', 'Wahyu', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(164, 'SRVY0100', '2', 'Wahyu', 'Laki-laki', 2147483647, 2, 3, 'Janes', '2021-06-10'),
(165, 'SRVY0100', '3', 'Wahyu', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(166, 'SRVY0100', '4', 'Wahyu', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(167, 'SRVY0100', '5', 'Wahyu', 'Laki-laki', 2147483647, 5, 1, 'Janes', '2021-06-10'),
(168, 'SRVY0100', '1', 'Suhendi', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(169, 'SRVY0100', '2', 'Suhendi', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(170, 'SRVY0100', '3', 'Suhendi', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(171, 'SRVY0100', '4', 'Suhendi', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(172, 'SRVY0100', '5', 'Suhendi', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(173, 'SRVY0100', '1', 'Timah', 'Perempuan', 2147483647, 1, 4, 'Aulia', '2021-06-10'),
(174, 'SRVY0100', '2', 'Timah', 'Perempuan', 2147483647, 2, 3, 'Aulia', '2021-06-10'),
(175, 'SRVY0100', '3', 'Timah', 'Perempuan', 2147483647, 3, 2, 'Aulia', '2021-06-10'),
(176, 'SRVY0100', '4', 'Timah', 'Perempuan', 2147483647, 4, 3, 'Aulia', '2021-06-10'),
(177, 'SRVY0100', '5', 'Timah', 'Perempuan', 2147483647, 5, 1, 'Aulia', '2021-06-10'),
(178, 'SRVY0100', '1', 'Sutardi', 'Perempuan', 2147483647, 1, 4, 'Detri', '2021-06-10'),
(179, 'SRVY0100', '2', 'Sutardi', 'Perempuan', 2147483647, 2, 1, 'Detri', '2021-06-10'),
(180, 'SRVY0100', '3', 'Sutardi', 'Perempuan', 2147483647, 3, 3, 'Detri', '2021-06-10'),
(181, 'SRVY0100', '4', 'Sutardi', 'Perempuan', 2147483647, 4, 4, 'Detri', '2021-06-10'),
(182, 'SRVY0100', '5', 'Sutardi', 'Perempuan', 2147483647, 5, 1, 'Detri', '2021-06-10'),
(183, 'SRVY0100', '1', 'Isni', 'Perempuan', 2147483647, 1, 1, 'Cecep ', '2021-06-10'),
(184, 'SRVY0100', '2', 'Isni', 'Perempuan', 2147483647, 2, 3, 'Cecep ', '2021-06-10'),
(185, 'SRVY0100', '3', 'Isni', 'Perempuan', 2147483647, 3, 2, 'Cecep ', '2021-06-10'),
(186, 'SRVY0100', '4', 'Isni', 'Perempuan', 2147483647, 4, 2, 'Cecep ', '2021-06-10'),
(187, 'SRVY0100', '5', 'Isni', 'Perempuan', 2147483647, 5, 1, 'Cecep ', '2021-06-10'),
(188, 'SRVY0100', '1', 'Rani', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(189, 'SRVY0100', '2', 'Rani', 'Perempuan', 2147483647, 2, 3, 'Aulia', '2021-06-10'),
(190, 'SRVY0100', '3', 'Rani', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(191, 'SRVY0100', '4', 'Rani', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(192, 'SRVY0100', '5', 'Rani', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(193, 'SRVY0100', '1', 'Ulfa', 'Perempuan', 2147483647, 1, 4, 'Janes', '2021-06-10'),
(194, 'SRVY0100', '2', 'Ulfa', 'Perempuan', 2147483647, 2, 2, 'Janes', '2021-06-10'),
(195, 'SRVY0100', '3', 'Ulfa', 'Perempuan', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(196, 'SRVY0100', '4', 'Ulfa', 'Perempuan', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(197, 'SRVY0100', '5', 'Ulfa', 'Perempuan', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(198, 'SRVY0100', '1', 'Aprilia Putri', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(199, 'SRVY0100', '2', 'Aprilia Putri', 'Perempuan', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(200, 'SRVY0100', '3', 'Aprilia Putri', 'Perempuan', 2147483647, 3, 3, 'Cecep ', '2021-06-10'),
(201, 'SRVY0100', '4', 'Aprilia Putri', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(202, 'SRVY0100', '5', 'Aprilia Putri', 'Perempuan', 2147483647, 5, 1, 'Cecep ', '2021-06-10'),
(203, 'SRVY0100', '1', 'Ahmad Sahrul', 'Laki-laki', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(204, 'SRVY0100', '2', 'Ahmad Sahrul', 'Laki-laki', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(205, 'SRVY0100', '3', 'Ahmad Sahrul', 'Laki-laki', 2147483647, 3, 3, 'Aulia', '2021-06-10'),
(206, 'SRVY0100', '4', 'Ahmad Sahrul', 'Laki-laki', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(207, 'SRVY0100', '5', 'Ahmad Sahrul', 'Laki-laki', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(208, 'SRVY0100', '1', 'Chandra', 'Perempuan', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(209, 'SRVY0100', '2', 'Chandra', 'Perempuan', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(210, 'SRVY0100', '3', 'Chandra', 'Perempuan', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(211, 'SRVY0100', '4', 'Chandra', 'Perempuan', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(212, 'SRVY0100', '5', 'Chandra', 'Perempuan', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(213, 'SRVY0100', '1', 'Bisri', 'Laki-laki', 2147483647, 1, 4, 'Cecep ', '2021-06-10'),
(214, 'SRVY0100', '2', 'Bisri', 'Laki-laki', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(215, 'SRVY0100', '3', 'Bisri', 'Laki-laki', 2147483647, 3, 4, 'Cecep ', '2021-06-10'),
(216, 'SRVY0100', '4', 'Bisri', 'Laki-laki', 2147483647, 4, 4, 'Cecep ', '2021-06-10'),
(217, 'SRVY0100', '5', 'Bisri', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(218, 'SRVY0100', '1', 'Mamang', 'Perempuan', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(219, 'SRVY0100', '2', 'Mamang', 'Perempuan', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(220, 'SRVY0100', '3', 'Mamang', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(221, 'SRVY0100', '4', 'Mamang', 'Perempuan', 2147483647, 4, 1, 'Detri', '2021-06-10'),
(222, 'SRVY0100', '5', 'Mamang', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(223, 'SRVY0100', '1', 'Sri Intan', 'Perempuan', 2147483647, 1, 4, 'Detri', '2021-06-10'),
(224, 'SRVY0100', '2', 'Sri Intan', 'Perempuan', 2147483647, 2, 3, 'Detri', '2021-06-10'),
(225, 'SRVY0100', '3', 'Sri Intan', 'Perempuan', 2147483647, 3, 4, 'Detri', '2021-06-10'),
(226, 'SRVY0100', '4', 'Sri Intan', 'Perempuan', 2147483647, 4, 3, 'Detri', '2021-06-10'),
(227, 'SRVY0100', '5', 'Sri Intan', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(228, 'SRVY0100', '1', 'Iceu', 'Perempuan', 2147483647, 1, 4, 'Aulia', '2021-06-10'),
(229, 'SRVY0100', '2', 'Iceu', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(230, 'SRVY0100', '3', 'Iceu', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(231, 'SRVY0100', '4', 'Iceu', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(232, 'SRVY0100', '5', 'Iceu', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(233, 'SRVY0100', '1', 'Alan', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(234, 'SRVY0100', '2', 'Alan', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(235, 'SRVY0100', '3', 'Alan', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(236, 'SRVY0100', '4', 'Alan', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(237, 'SRVY0100', '5', 'Alan', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(238, 'SRVY0100', '1', 'Cuparsa', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(239, 'SRVY0100', '2', 'Cuparsa', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(240, 'SRVY0100', '3', 'Cuparsa', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(241, 'SRVY0100', '4', 'Cuparsa', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(242, 'SRVY0100', '5', 'Cuparsa', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(243, 'SRVY0100', '1', 'Putri', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(244, 'SRVY0100', '2', 'Putri', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(245, 'SRVY0100', '3', 'Putri', 'Perempuan', 2147483647, 3, 4, 'Aulia', '2021-06-10'),
(246, 'SRVY0100', '4', 'Putri', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(247, 'SRVY0100', '5', 'Putri', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(248, 'SRVY0100', '1', 'Anza', 'Laki-laki', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(249, 'SRVY0100', '2', 'Anza', 'Laki-laki', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(250, 'SRVY0100', '3', 'Anza', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(251, 'SRVY0100', '4', 'Anza', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(252, 'SRVY0100', '5', 'Anza', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(253, 'SRVY0100', '1', 'Apit', 'Laki-laki', 2147483647, 1, 4, 'Janes', '2021-06-10'),
(254, 'SRVY0100', '2', 'Apit', 'Laki-laki', 2147483647, 2, 4, 'Janes', '2021-06-10'),
(255, 'SRVY0100', '3', 'Apit', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(256, 'SRVY0100', '4', 'Apit', 'Laki-laki', 2147483647, 4, 4, 'Janes', '2021-06-10'),
(257, 'SRVY0100', '5', 'Apit', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(258, 'SRVY0100', '1', 'Hana', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(259, 'SRVY0100', '2', 'Hana', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(260, 'SRVY0100', '3', 'Hana', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(261, 'SRVY0100', '4', 'Hana', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(262, 'SRVY0100', '5', 'Hana', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(263, 'SRVY0100', '1', 'Ferdian', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(264, 'SRVY0100', '2', 'Ferdian', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(265, 'SRVY0100', '3', 'Ferdian', 'Laki-laki', 2147483647, 3, 2, 'Janes', '2021-06-10'),
(266, 'SRVY0100', '4', 'Ferdian', 'Laki-laki', 2147483647, 4, 2, 'Janes', '2021-06-10'),
(267, 'SRVY0100', '5', 'Ferdian', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(268, 'SRVY0100', '1', 'Dika', 'Perempuan', 2147483647, 1, 3, 'Detri', '2021-06-10'),
(269, 'SRVY0100', '2', 'Dika', 'Perempuan', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(270, 'SRVY0100', '3', 'Dika', 'Perempuan', 2147483647, 3, 4, 'Detri', '2021-06-10'),
(271, 'SRVY0100', '4', 'Dika', 'Perempuan', 2147483647, 4, 3, 'Detri', '2021-06-10'),
(272, 'SRVY0100', '5', 'Dika', 'Perempuan', 2147483647, 5, 1, 'Detri', '2021-06-10'),
(273, 'SRVY0100', '1', 'Anggun', 'Perempuan', 2147483647, 1, 4, 'Janes', '2021-06-10'),
(274, 'SRVY0100', '2', 'Anggun', 'Perempuan', 2147483647, 2, 4, 'Janes', '2021-06-10'),
(275, 'SRVY0100', '3', 'Anggun', 'Perempuan', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(276, 'SRVY0100', '4', 'Anggun', 'Perempuan', 2147483647, 4, 4, 'Janes', '2021-06-10'),
(277, 'SRVY0100', '5', 'Anggun', 'Perempuan', 2147483647, 5, 1, 'Janes', '2021-06-10'),
(278, 'SRVY0100', '1', 'Helmy', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(279, 'SRVY0100', '2', 'Helmy', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(280, 'SRVY0100', '3', 'Helmy', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(281, 'SRVY0100', '4', 'Helmy', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(282, 'SRVY0100', '5', 'Helmy', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(283, 'SRVY0100', '1', 'Galuh', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(284, 'SRVY0100', '2', 'Galuh', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(285, 'SRVY0100', '3', 'Galuh', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(286, 'SRVY0100', '4', 'Galuh', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(287, 'SRVY0100', '5', 'Galuh', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(288, 'SRVY0100', '1', 'Mita', 'Perempuan', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(289, 'SRVY0100', '2', 'Mita', 'Perempuan', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(290, 'SRVY0100', '3', 'Mita', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(291, 'SRVY0100', '4', 'Mita', 'Perempuan', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(292, 'SRVY0100', '5', 'Mita', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(293, 'SRVY0100', '1', 'Vira', 'Perempuan', 2147483647, 1, 3, 'Aulia', '2021-06-10'),
(294, 'SRVY0100', '2', 'Vira', 'Perempuan', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(295, 'SRVY0100', '3', 'Vira', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(296, 'SRVY0100', '4', 'Vira', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(297, 'SRVY0100', '5', 'Vira', 'Perempuan', 2147483647, 5, 1, 'Aulia', '2021-06-10'),
(298, 'SRVY0100', '1', 'Pebiola', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(299, 'SRVY0100', '2', 'Pebiola', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(300, 'SRVY0100', '3', 'Pebiola', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(301, 'SRVY0100', '4', 'Pebiola', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(302, 'SRVY0100', '5', 'Pebiola', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(303, 'SRVY0100', '1', 'Haikal', 'Laki-laki', 2147483647, 1, 4, 'Detri', '2021-06-10'),
(304, 'SRVY0100', '2', 'Haikal', 'Laki-laki', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(305, 'SRVY0100', '3', 'Haikal', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(306, 'SRVY0100', '4', 'Haikal', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(307, 'SRVY0100', '5', 'Haikal', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(308, 'SRVY0100', '1', 'Muhlisin', 'Laki-laki', 2147483647, 1, 1, 'Cecep ', '2021-06-10'),
(309, 'SRVY0100', '2', 'Muhlisin', 'Laki-laki', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(310, 'SRVY0100', '3', 'Muhlisin', 'Laki-laki', 2147483647, 3, 3, 'Cecep ', '2021-06-10'),
(311, 'SRVY0100', '4', 'Muhlisin', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(312, 'SRVY0100', '5', 'Muhlisin', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(313, 'SRVY0100', '1', 'Johanes', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(314, 'SRVY0100', '2', 'Johanes', 'Laki-laki', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(315, 'SRVY0100', '3', 'Johanes', 'Laki-laki', 2147483647, 3, 4, 'Detri', '2021-06-10'),
(316, 'SRVY0100', '4', 'Johanes', 'Laki-laki', 2147483647, 4, 4, 'Detri', '2021-06-10'),
(317, 'SRVY0100', '5', 'Johanes', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(318, 'SRVY0100', '1', 'Dino', 'Laki-laki', 2147483647, 1, 4, 'Janes', '2021-06-10'),
(319, 'SRVY0100', '2', 'Dino', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(320, 'SRVY0100', '3', 'Dino', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(321, 'SRVY0100', '4', 'Dino', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(322, 'SRVY0100', '5', 'Dino', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(323, 'SRVY0100', '1', 'Iis', 'Perempuan', 2147483647, 1, 3, '', '2021-06-10'),
(324, 'SRVY0100', '2', 'Iis', 'Perempuan', 2147483647, 2, 3, '', '2021-06-10'),
(325, 'SRVY0100', '3', 'Iis', 'Perempuan', 2147483647, 3, 4, '', '2021-06-10'),
(326, 'SRVY0100', '4', 'Iis', 'Perempuan', 2147483647, 4, 3, '', '2021-06-10'),
(327, 'SRVY0100', '5', 'Iis', 'Perempuan', 2147483647, 5, 5, '', '2021-06-10'),
(328, 'SRVY0100', '1', 'Dony', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(329, 'SRVY0100', '2', 'Dony', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(330, 'SRVY0100', '3', 'Dony', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(331, 'SRVY0100', '4', 'Dony', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(332, 'SRVY0100', '5', 'Dony', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(333, 'SRVY0100', '1', 'Aziz', 'Laki-laki', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(334, 'SRVY0100', '2', 'Aziz', 'Laki-laki', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(335, 'SRVY0100', '3', 'Aziz', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(336, 'SRVY0100', '4', 'Aziz', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(337, 'SRVY0100', '5', 'Aziz', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(338, 'SRVY0100', '1', 'Ida', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(339, 'SRVY0100', '2', 'Ida', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(340, 'SRVY0100', '3', 'Ida', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(341, 'SRVY0100', '4', 'Ida', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(342, 'SRVY0100', '5', 'Ida', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(343, 'SRVY0100', '1', 'Eni', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(344, 'SRVY0100', '2', 'Eni', 'Perempuan', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(345, 'SRVY0100', '3', 'Eni', 'Perempuan', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(346, 'SRVY0100', '4', 'Eni', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(347, 'SRVY0100', '5', 'Eni', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(348, 'SRVY0100', '1', 'Reza', 'Laki-laki', 2147483647, 1, 4, 'Janes', '2021-06-10'),
(349, 'SRVY0100', '2', 'Reza', 'Laki-laki', 2147483647, 2, 3, 'Janes', '2021-06-10'),
(350, 'SRVY0100', '3', 'Reza', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(351, 'SRVY0100', '4', 'Reza', 'Laki-laki', 2147483647, 4, 4, 'Janes', '2021-06-10'),
(352, 'SRVY0100', '5', 'Reza', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(353, 'SRVY0100', '1', 'Jihan', 'Perempuan', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(354, 'SRVY0100', '2', 'Jihan', 'Perempuan', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(355, 'SRVY0100', '3', 'Jihan', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(356, 'SRVY0100', '4', 'Jihan', 'Perempuan', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(357, 'SRVY0100', '5', 'Jihan', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(358, 'SRVY0100', '1', 'Wini', 'Perempuan', 2147483647, 1, 3, 'Janes', '2021-06-10'),
(359, 'SRVY0100', '2', 'Wini', 'Perempuan', 2147483647, 2, 3, 'Janes', '2021-06-10'),
(360, 'SRVY0100', '3', 'Wini', 'Perempuan', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(361, 'SRVY0100', '4', 'Wini', 'Perempuan', 2147483647, 4, 4, 'Janes', '2021-06-10'),
(362, 'SRVY0100', '5', 'Wini', 'Perempuan', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(363, 'SRVY0100', '1', 'Nina', 'Perempuan', 2147483647, 1, 3, 'Detri', '2021-06-10'),
(364, 'SRVY0100', '2', 'Nina', 'Perempuan', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(365, 'SRVY0100', '3', 'Nina', 'Perempuan', 2147483647, 3, 3, 'Detri', '2021-06-10'),
(366, 'SRVY0100', '4', 'Nina', 'Perempuan', 2147483647, 4, 3, 'Detri', '2021-06-10'),
(367, 'SRVY0100', '5', 'Nina', 'Perempuan', 2147483647, 5, 1, 'Detri', '2021-06-10'),
(368, 'SRVY0100', '1', 'Kosasih', 'Laki-laki', 2147483647, 1, 3, 'Janes', '2021-06-10'),
(369, 'SRVY0100', '2', 'Kosasih', 'Laki-laki', 2147483647, 2, 4, 'Janes', '2021-06-10'),
(370, 'SRVY0100', '3', 'Kosasih', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(371, 'SRVY0100', '4', 'Kosasih', 'Laki-laki', 2147483647, 4, 3, 'Janes', '2021-06-10'),
(372, 'SRVY0100', '5', 'Kosasih', 'Laki-laki', 2147483647, 5, 1, 'Janes', '2021-06-10'),
(373, 'SRVY0100', '1', 'M Najib', 'Laki-laki', 2147483647, 1, 3, 'Detri', '2021-06-10'),
(374, 'SRVY0100', '2', 'M Najib', 'Laki-laki', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(375, 'SRVY0100', '3', 'M Najib', 'Laki-laki', 2147483647, 3, 4, 'Detri', '2021-06-10'),
(376, 'SRVY0100', '4', 'M Najib', 'Laki-laki', 2147483647, 4, 4, 'Detri', '2021-06-10'),
(377, 'SRVY0100', '5', 'M Najib', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(378, 'SRVY0100', '1', 'Bahrul Alam', 'Laki-laki', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(379, 'SRVY0100', '2', 'Bahrul Alam', 'Laki-laki', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(380, 'SRVY0100', '3', 'Bahrul Alam', 'Laki-laki', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(381, 'SRVY0100', '4', 'Bahrul Alam', 'Laki-laki', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(382, 'SRVY0100', '5', 'Bahrul Alam', 'Laki-laki', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(383, 'SRVY0100', '1', 'Uci', 'Perempuan', 2147483647, 1, 3, 'Janes', '2021-06-10'),
(384, 'SRVY0100', '2', 'Uci', 'Perempuan', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(385, 'SRVY0100', '3', 'Uci', 'Perempuan', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(386, 'SRVY0100', '4', 'Uci', 'Perempuan', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(387, 'SRVY0100', '5', 'Uci', 'Perempuan', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(388, 'SRVY0100', '1', 'Sony', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(389, 'SRVY0100', '2', 'Sony', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(390, 'SRVY0100', '3', 'Sony', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(391, 'SRVY0100', '4', 'Sony', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(392, 'SRVY0100', '5', 'Sony', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(393, 'SRVY0100', '1', 'Nendar', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(394, 'SRVY0100', '2', 'Nendar', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(395, 'SRVY0100', '3', 'Nendar', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(396, 'SRVY0100', '4', 'Nendar', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(397, 'SRVY0100', '5', 'Nendar', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(398, 'SRVY0100', '1', 'Entis', 'Laki-laki', 2147483647, 1, 3, 'Janes', '2021-06-10'),
(399, 'SRVY0100', '2', 'Entis', 'Laki-laki', 2147483647, 2, 4, 'Janes', '2021-06-10'),
(400, 'SRVY0100', '3', 'Entis', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(401, 'SRVY0100', '4', 'Entis', 'Laki-laki', 2147483647, 4, 4, 'Janes', '2021-06-10'),
(402, 'SRVY0100', '5', 'Entis', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(403, 'SRVY0100', '1', 'Erlita', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(404, 'SRVY0100', '2', 'Erlita', 'Perempuan', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(405, 'SRVY0100', '3', 'Erlita', 'Perempuan', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(406, 'SRVY0100', '4', 'Erlita', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(407, 'SRVY0100', '5', 'Erlita', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(408, 'SRVY0100', '1', 'Muthia', 'Perempuan', 2147483647, 1, 3, 'Cecep ', '2021-06-10'),
(409, 'SRVY0100', '2', 'Muthia', 'Perempuan', 2147483647, 2, 3, 'Cecep ', '2021-06-10'),
(410, 'SRVY0100', '3', 'Muthia', 'Perempuan', 2147483647, 3, 4, 'Cecep ', '2021-06-10'),
(411, 'SRVY0100', '4', 'Muthia', 'Perempuan', 2147483647, 4, 4, 'Cecep ', '2021-06-10'),
(412, 'SRVY0100', '5', 'Muthia', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(413, 'SRVY0100', '1', 'Rudiansyah', 'Laki-laki', 2147483647, 1, 4, 'Cecep ', '2021-06-10'),
(414, 'SRVY0100', '2', 'Rudiansyah', 'Laki-laki', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(415, 'SRVY0100', '3', 'Rudiansyah', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(416, 'SRVY0100', '4', 'Rudiansyah', 'Laki-laki', 2147483647, 4, 4, 'Cecep ', '2021-06-10'),
(417, 'SRVY0100', '5', 'Rudiansyah', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(418, 'SRVY0100', '1', 'Astri', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(419, 'SRVY0100', '2', 'Astri', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(420, 'SRVY0100', '3', 'Astri', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(421, 'SRVY0100', '4', 'Astri', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(422, 'SRVY0100', '5', 'Astri', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(423, 'SRVY0100', '1', 'Hatami', 'Laki-laki', 2147483647, 1, 4, 'Aulia', '2021-06-10'),
(424, 'SRVY0100', '2', 'Hatami', 'Laki-laki', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(425, 'SRVY0100', '3', 'Hatami', 'Laki-laki', 2147483647, 3, 4, 'Aulia', '2021-06-10'),
(426, 'SRVY0100', '4', 'Hatami', 'Laki-laki', 2147483647, 4, 4, 'Aulia', '2021-06-10'),
(427, 'SRVY0100', '5', 'Hatami', 'Laki-laki', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(428, 'SRVY0100', '1', 'Shinta', 'Perempuan', 2147483647, 1, 1, 'Detri', '2021-06-10'),
(429, 'SRVY0100', '2', 'Shinta', 'Perempuan', 2147483647, 2, 1, 'Detri', '2021-06-10'),
(430, 'SRVY0100', '3', 'Shinta', 'Perempuan', 2147483647, 3, 2, 'Detri', '2021-06-10'),
(431, 'SRVY0100', '4', 'Shinta', 'Perempuan', 2147483647, 4, 2, 'Detri', '2021-06-10'),
(432, 'SRVY0100', '5', 'Shinta', 'Perempuan', 2147483647, 5, 1, 'Detri', '2021-06-10'),
(433, 'SRVY0100', '1', 'Amink', 'Laki-laki', 2147483647, 1, 4, 'Cecep ', '2021-06-10'),
(434, 'SRVY0100', '2', 'Amink', 'Laki-laki', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(435, 'SRVY0100', '3', 'Amink', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(436, 'SRVY0100', '4', 'Amink', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(437, 'SRVY0100', '5', 'Amink', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(438, 'SRVY0100', '1', 'Awaljan', 'Laki-laki', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(439, 'SRVY0100', '2', 'Awaljan', 'Laki-laki', 2147483647, 2, 4, 'Detri', '2021-06-10'),
(440, 'SRVY0100', '3', 'Awaljan', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(441, 'SRVY0100', '4', 'Awaljan', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(442, 'SRVY0100', '5', 'Awaljan', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(443, 'SRVY0100', '1', 'Suhe', 'Laki-laki', 2147483647, 1, 2, '', '2021-06-10'),
(444, 'SRVY0100', '2', 'Suhe', 'Laki-laki', 2147483647, 2, 4, '', '2021-06-10'),
(445, 'SRVY0100', '3', 'Suhe', 'Laki-laki', 2147483647, 3, 3, '', '2021-06-10'),
(446, 'SRVY0100', '4', 'Suhe', 'Laki-laki', 2147483647, 4, 1, '', '2021-06-10'),
(447, 'SRVY0100', '5', 'Suhe', 'Laki-laki', 2147483647, 5, 1, '', '2021-06-10'),
(448, 'SRVY0100', '1', 'Vinka', 'Perempuan', 2147483647, 1, 3, 'Aulia', '2021-06-10'),
(449, 'SRVY0100', '2', 'Vinka', 'Perempuan', 2147483647, 2, 2, 'Aulia', '2021-06-10'),
(450, 'SRVY0100', '3', 'Vinka', 'Perempuan', 2147483647, 3, 2, 'Aulia', '2021-06-10'),
(451, 'SRVY0100', '4', 'Vinka', 'Perempuan', 2147483647, 4, 2, 'Aulia', '2021-06-10'),
(452, 'SRVY0100', '5', 'Vinka', 'Perempuan', 2147483647, 5, 1, 'Aulia', '2021-06-10'),
(453, 'SRVY0100', '1', 'Faisal', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(454, 'SRVY0100', '2', 'Faisal', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(455, 'SRVY0100', '3', 'Faisal', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(456, 'SRVY0100', '4', 'Faisal', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(457, 'SRVY0100', '5', 'Faisal', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(458, 'SRVY0100', '1', 'Reny', 'Laki-laki', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(459, 'SRVY0100', '2', 'Reny', 'Laki-laki', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(460, 'SRVY0100', '3', 'Reny', 'Laki-laki', 2147483647, 3, 3, 'Aulia', '2021-06-10'),
(461, 'SRVY0100', '4', 'Reny', 'Laki-laki', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(462, 'SRVY0100', '5', 'Reny', 'Laki-laki', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(463, 'SRVY0100', '1', 'Agnes', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(464, 'SRVY0100', '2', 'Agnes', 'Perempuan', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(465, 'SRVY0100', '3', 'Agnes', 'Perempuan', 2147483647, 3, 4, 'Cecep ', '2021-06-10'),
(466, 'SRVY0100', '4', 'Agnes', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(467, 'SRVY0100', '5', 'Agnes', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(468, 'SRVY0100', '1', 'Dian', 'Perempuan', 2147483647, 1, 5, 'Detri', '2021-06-10'),
(469, 'SRVY0100', '2', 'Dian', 'Perempuan', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(470, 'SRVY0100', '3', 'Dian', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(471, 'SRVY0100', '4', 'Dian', 'Perempuan', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(472, 'SRVY0100', '5', 'Dian', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(473, 'SRVY0100', '1', 'Arifin', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(474, 'SRVY0100', '2', 'Arifin', 'Perempuan', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(475, 'SRVY0100', '3', 'Arifin', 'Perempuan', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(476, 'SRVY0100', '4', 'Arifin', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(477, 'SRVY0100', '5', 'Arifin', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(478, 'SRVY0100', '1', 'Adi', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(479, 'SRVY0100', '2', 'Adi', 'Laki-laki', 2147483647, 2, 4, 'Janes', '2021-06-10'),
(480, 'SRVY0100', '3', 'Adi', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(481, 'SRVY0100', '4', 'Adi', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(482, 'SRVY0100', '5', 'Adi', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(483, 'SRVY0100', '1', 'Adi Bachtiar', 'Laki-laki', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(484, 'SRVY0100', '2', 'Adi Bachtiar', 'Laki-laki', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(485, 'SRVY0100', '3', 'Adi Bachtiar', 'Laki-laki', 2147483647, 3, 4, 'Aulia', '2021-06-10'),
(486, 'SRVY0100', '4', 'Adi Bachtiar', 'Laki-laki', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(487, 'SRVY0100', '5', 'Adi Bachtiar', 'Laki-laki', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(488, 'SRVY0100', '1', 'Yessy', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(489, 'SRVY0100', '2', 'Yessy', 'Perempuan', 2147483647, 2, 4, 'Cecep ', '2021-06-10'),
(490, 'SRVY0100', '3', 'Yessy', 'Perempuan', 2147483647, 3, 4, 'Cecep ', '2021-06-10'),
(491, 'SRVY0100', '4', 'Yessy', 'Perempuan', 2147483647, 4, 4, 'Cecep ', '2021-06-10'),
(492, 'SRVY0100', '5', 'Yessy', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(493, 'SRVY0100', '1', 'Anggraeni', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(494, 'SRVY0100', '2', 'Anggraeni', 'Perempuan', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(495, 'SRVY0100', '3', 'Anggraeni', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(496, 'SRVY0100', '4', 'Anggraeni', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(497, 'SRVY0100', '5', 'Anggraeni', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(498, 'SRVY0100', '1', 'Asep Hidayat', 'Laki-laki', 2147483647, 1, 4, 'Detri', '2021-06-10'),
(499, 'SRVY0100', '2', 'Asep Hidayat', 'Laki-laki', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(500, 'SRVY0100', '3', 'Asep Hidayat', 'Laki-laki', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(501, 'SRVY0100', '4', 'Asep Hidayat', 'Laki-laki', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(502, 'SRVY0100', '5', 'Asep Hidayat', 'Laki-laki', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(503, 'SRVY0100', '1', 'Herlina Wati', 'Perempuan', 2147483647, 1, 3, 'Detri', '2021-06-10'),
(504, 'SRVY0100', '2', 'Herlina Wati', 'Perempuan', 2147483647, 2, 5, 'Detri', '2021-06-10'),
(505, 'SRVY0100', '3', 'Herlina Wati', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(506, 'SRVY0100', '4', 'Herlina Wati', 'Perempuan', 2147483647, 4, 5, 'Detri', '2021-06-10'),
(507, 'SRVY0100', '5', 'Herlina Wati', 'Perempuan', 2147483647, 5, 5, 'Detri', '2021-06-10'),
(508, 'SRVY0100', '1', 'Iqbal Munajat', 'Laki-laki', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(509, 'SRVY0100', '2', 'Iqbal Munajat', 'Laki-laki', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(510, 'SRVY0100', '3', 'Iqbal Munajat', 'Laki-laki', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(511, 'SRVY0100', '4', 'Iqbal Munajat', 'Laki-laki', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(512, 'SRVY0100', '5', 'Iqbal Munajat', 'Laki-laki', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(513, 'SRVY0100', '1', 'Puput', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(514, 'SRVY0100', '2', 'Puput', 'Perempuan', 2147483647, 2, 5, 'Aulia', '2021-06-10'),
(515, 'SRVY0100', '3', 'Puput', 'Perempuan', 2147483647, 3, 5, 'Aulia', '2021-06-10'),
(516, 'SRVY0100', '4', 'Puput', 'Perempuan', 2147483647, 4, 5, 'Aulia', '2021-06-10'),
(517, 'SRVY0100', '5', 'Puput', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(518, 'SRVY0100', '1', 'Raka', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(519, 'SRVY0100', '2', 'Raka', 'Laki-laki', 2147483647, 2, 4, 'Janes', '2021-06-10'),
(520, 'SRVY0100', '3', 'Raka', 'Laki-laki', 2147483647, 3, 4, 'Janes', '2021-06-10'),
(521, 'SRVY0100', '4', 'Raka', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(522, 'SRVY0100', '5', 'Raka', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(523, 'SRVY0100', '1', 'Siti Nur', 'Perempuan', 2147483647, 1, 5, 'Cecep ', '2021-06-10'),
(524, 'SRVY0100', '2', 'Siti Nur', 'Perempuan', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(525, 'SRVY0100', '3', 'Siti Nur', 'Perempuan', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(526, 'SRVY0100', '4', 'Siti Nur', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(527, 'SRVY0100', '5', 'Siti Nur', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(528, 'SRVY0100', '1', 'Ela Wati', 'Perempuan', 2147483647, 1, 4, 'Detri', '2021-06-10'),
(529, 'SRVY0100', '2', 'Ela Wati', 'Perempuan', 2147483647, 2, 3, 'Detri', '2021-06-10'),
(530, 'SRVY0100', '3', 'Ela Wati', 'Perempuan', 2147483647, 3, 5, 'Detri', '2021-06-10'),
(531, 'SRVY0100', '4', 'Ela Wati', 'Perempuan', 2147483647, 4, 3, 'Detri', '2021-06-10'),
(532, 'SRVY0100', '5', 'Ela Wati', 'Perempuan', 2147483647, 5, 1, 'Detri', '2021-06-10'),
(533, 'SRVY0100', '1', 'Annisa', 'Perempuan', 2147483647, 1, 5, 'Aulia', '2021-06-10'),
(534, 'SRVY0100', '2', 'Annisa', 'Perempuan', 2147483647, 2, 4, 'Aulia', '2021-06-10'),
(535, 'SRVY0100', '3', 'Annisa', 'Perempuan', 2147483647, 3, 3, 'Aulia', '2021-06-10'),
(536, 'SRVY0100', '4', 'Annisa', 'Perempuan', 2147483647, 4, 4, 'Aulia', '2021-06-10'),
(537, 'SRVY0100', '5', 'Annisa', 'Perempuan', 2147483647, 5, 5, 'Aulia', '2021-06-10'),
(538, 'SRVY0100', '1', 'Kiki Maulana', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(539, 'SRVY0100', '2', 'Kiki Maulana', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(540, 'SRVY0100', '3', 'Kiki Maulana', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(541, 'SRVY0100', '4', 'Kiki Maulana', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(542, 'SRVY0100', '5', 'Kiki Maulana', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10'),
(543, 'SRVY0100', '1', 'Hizkia', 'Perempuan', 2147483647, 1, 4, 'Cecep ', '2021-06-10'),
(544, 'SRVY0100', '2', 'Hizkia', 'Perempuan', 2147483647, 2, 5, 'Cecep ', '2021-06-10'),
(545, 'SRVY0100', '3', 'Hizkia', 'Perempuan', 2147483647, 3, 5, 'Cecep ', '2021-06-10'),
(546, 'SRVY0100', '4', 'Hizkia', 'Perempuan', 2147483647, 4, 5, 'Cecep ', '2021-06-10'),
(547, 'SRVY0100', '5', 'Hizkia', 'Perempuan', 2147483647, 5, 5, 'Cecep ', '2021-06-10'),
(548, 'SRVY0100', '1', 'Sutisna', 'Laki-laki', 2147483647, 1, 5, 'Janes', '2021-06-10'),
(549, 'SRVY0100', '2', 'Sutisna', 'Laki-laki', 2147483647, 2, 5, 'Janes', '2021-06-10'),
(550, 'SRVY0100', '3', 'Sutisna', 'Laki-laki', 2147483647, 3, 5, 'Janes', '2021-06-10'),
(551, 'SRVY0100', '4', 'Sutisna', 'Laki-laki', 2147483647, 4, 5, 'Janes', '2021-06-10'),
(552, 'SRVY0100', '5', 'Sutisna', 'Laki-laki', 2147483647, 5, 5, 'Janes', '2021-06-10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_total`
--

CREATE TABLE `t_total` (
  `id_total` int(100) NOT NULL,
  `id_kuisioner` int(10) NOT NULL,
  `stp` int(5) NOT NULL,
  `tp` int(5) NOT NULL,
  `cp` int(5) NOT NULL,
  `p` int(5) NOT NULL,
  `sp` int(5) NOT NULL,
  `entrophy` int(20) NOT NULL,
  `gain` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `t_total`
--

INSERT INTO `t_total` (`id_total`, `id_kuisioner`, `stp`, `tp`, `cp`, `p`, `sp`, `entrophy`, `gain`) VALUES
(1, 1, 0, 0, 0, 0, 0, 0, 0),
(2, 2, 0, 0, 0, 0, 0, 0, 0),
(3, 3, 0, 0, 0, 0, 0, 0, 0),
(4, 4, 0, 0, 0, 0, 0, 0, 0),
(5, 5, 0, 0, 0, 0, 0, 0, 0);

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
(1, 'admin', 'klo', 'KLO', 'admin123', 'aktif'),
(2, 'Detri', 'Detri', 'Teller', '$2y$10$YhBew6Uyb.aqaPfB8hjVDuc9QvfS9Ad35bKdseDJMm9tf99vmwJMG', 'aktif'),
(3, 'ade', 'ade', 'KLO', '$2y$10$XjcAB9FJuLdZE0TZFB04iOx1ieduoZg7hU9BXhG7m94EAc7rt3z2C', 'aktif'),
(4, 'Cecep ', 'Cecep', 'Teller', 'cecep', 'aktif'),
(5, 'Aulia', 'Aulia', 'Teller', 'Aulia', 'aktif'),
(6, 'Janes', 'Janes', 'Teller', 'Janes', 'aktif'),
(9, 'Iis', 'Iis', 'KLO', '$2y$10$/rkk3waB9A/biWdhhr9YKu65CIzuyJyNGncuDvYZ..tYW5qe7cQbq', 'aktif'),
(10, 'Arjun', 'Arjun', 'KLO', '$2y$10$PS9c.BTCszgcQYoltldc.eSCMq5LwH7Dn.dlzd1AGwbUVogluedoK', 'aktif');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_atribut`
--
ALTER TABLE `t_atribut`
  ADD PRIMARY KEY (`id_atribut`) USING BTREE;

--
-- Indeks untuk tabel `t_datamining`
--
ALTER TABLE `t_datamining`
  ADD PRIMARY KEY (`id_datamining`),
  ADD KEY `id_atribut` (`id_atribut`);

--
-- Indeks untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD PRIMARY KEY (`nip`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `t_kuisioner`
--
ALTER TABLE `t_kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indeks untuk tabel `t_kuisioner_result`
--
ALTER TABLE `t_kuisioner_result`
  ADD KEY `id_kuisioner` (`id_kuisioner`) USING BTREE,
  ADD KEY `id_kuisioner_result` (`id_kuisioner_result`) USING BTREE;

--
-- Indeks untuk tabel `t_total`
--
ALTER TABLE `t_total`
  ADD PRIMARY KEY (`id_total`),
  ADD UNIQUE KEY `id_total` (`id_kuisioner`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_datamining`
--
ALTER TABLE `t_datamining`
  MODIFY `id_datamining` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `t_kuisioner`
--
ALTER TABLE `t_kuisioner`
  MODIFY `id_kuisioner` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_kuisioner_result`
--
ALTER TABLE `t_kuisioner_result`
  MODIFY `id_kuisioner_result` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT untuk tabel `t_total`
--
ALTER TABLE `t_total`
  MODIFY `id_total` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `t_karyawan`
--
ALTER TABLE `t_karyawan`
  ADD CONSTRAINT `t_karyawan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `t_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_kuisioner_result`
--
ALTER TABLE `t_kuisioner_result`
  ADD CONSTRAINT `t_kuisioner_result_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `t_kuisioner` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_total`
--
ALTER TABLE `t_total`
  ADD CONSTRAINT `t_total_ibfk_1` FOREIGN KEY (`id_kuisioner`) REFERENCES `t_kuisioner_result` (`id_kuisioner`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
