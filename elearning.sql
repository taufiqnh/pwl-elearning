-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Jan 2022 pada 17.55
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elearning`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `email`) VALUES
(1, 'admin01', '81DC9BDB52D04DC20036DBD8313ED055', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nip` int(64) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama_guru`, `email`, `password`, `nama_mapel`) VALUES
(1, 1234567890, 'pak eko', 'eko@gmail.com', '81DC9BDB52D04DC20036DBD8313ED055', 'Matematika'),
(2, 11111111, 'qqqq', 'qqq@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Bahasa Indonesia'),
(4, 22222222, 'pak guru 2', 'guru@gmail.com', '080416d0fdca8d64c453f63a681bce72', 'Bahasa Inggris');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`) VALUES
(2, '7A'),
(3, '7B'),
(4, '7C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kumpultugas`
--

CREATE TABLE `kumpultugas` (
  `id_ktugas` int(11) NOT NULL,
  `id_tugas` varchar(11) NOT NULL,
  `id_siswa` varchar(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `file` varchar(128) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `tgl_kumpul` datetime NOT NULL,
  `nilai` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kumpultugas`
--

INSERT INTO `kumpultugas` (`id_ktugas`, `id_tugas`, `id_siswa`, `nama_guru`, `file`, `catatan`, `tgl_kumpul`, `nilai`) VALUES
(1, '1', '1', 'pak eko', 'tugastaufiq.jpg', 'nama taufiq, kelas 7a, no absen 1', '2022-01-14 21:51:14', 100),
(4, '2', '1', 'pak eko', 'activityDiagram.png', 'ini jawaban tugas kedua', '2022-01-14 23:33:19', 99),
(6, '1', '5', 'pak eko', 'tugas_alex.png', 'xxxx', '2022-01-18 22:26:44', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `materi`
--

CREATE TABLE `materi` (
  `id_materi` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `video` varchar(255) NOT NULL,
  `deskripsi` varchar(1024) NOT NULL,
  `kelas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `materi`
--

INSERT INTO `materi` (`id_materi`, `nama_guru`, `nama_mapel`, `video`, `deskripsi`, `kelas`) VALUES
(1, 'pak eko', 'Matematika', 'Matematika_-_Dummy_-_1.mp4', 'RG Squad, siapa yang pernah dengar kata aljabar? Ini merupakan satu cabang matematika dalam pemecahan masalah dengan menggunakan huruf-huruf untuk mewakili angka-angka. Berasal dari bahasa Arab, al-jabr yang artinya penyelesaian. Kamu tahu siapa penemunya? Ia merupakan cendikiawan bernama Al-Khawarizmi. Sekarang, mari kita simak lebih lanjut tentang definisi dan bentuk-bentuk aljabar secara lebih mendalam ya!', '7'),
(4, 'pak eko', 'Matematika', 'Matematika_-_Dummy_-_2.mp4', 'Aljabar linear adalah bidang studi matematika yang mempelajari sistem persamaan linear dan solusinya, vektor, serta transformasi linear. Matriks dan operasinya juga merupakan hal yang berkaitan erat dengan bidang aljabar linear.', '7');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `password`, `email`, `foto`) VALUES
(1, 'Taufiq', '81DC9BDB52D04DC20036DBD8313ED055', 'taufiq@gmail.com', 'xxx.jpg'),
(5, 'alex', '81dc9bdb52d04dc20036dbd8313ed055', 'alex@gmail.com', 'fotosiswa3.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tugas`
--

CREATE TABLE `tugas` (
  `id_tugas` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `nama_mapel` varchar(128) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `file` varchar(128) NOT NULL,
  `deadline` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tugas`
--

INSERT INTO `tugas` (`id_tugas`, `nama_guru`, `nama_mapel`, `deskripsi`, `file`, `deadline`) VALUES
(1, 'pak eko', 'Matematika', 'Silahkan kumpulkan sesuai instruksi', 'tugas1.pdf', '2022-01-16'),
(2, 'pak eko', 'Matematika', 'Ini tugas keduaaaa', 'amiluon_tgl_15_22.pdf', '2022-01-18');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `kumpultugas`
--
ALTER TABLE `kumpultugas`
  ADD PRIMARY KEY (`id_ktugas`);

--
-- Indeks untuk tabel `materi`
--
ALTER TABLE `materi`
  ADD PRIMARY KEY (`id_materi`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tugas`
--
ALTER TABLE `tugas`
  ADD PRIMARY KEY (`id_tugas`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kumpultugas`
--
ALTER TABLE `kumpultugas`
  MODIFY `id_ktugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `materi`
--
ALTER TABLE `materi`
  MODIFY `id_materi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tugas`
--
ALTER TABLE `tugas`
  MODIFY `id_tugas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
