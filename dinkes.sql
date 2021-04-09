-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2019 pada 03.09
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dinkes`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `nip` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `puskesmas` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_verified` varchar(255) NOT NULL DEFAULT 'belum terverifikasi',
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`nip`, `level`, `nama`, `puskesmas`, `username`, `password`, `is_verified`, `slug`, `created_at`) VALUES
('165150200111020', 'super', 'Muhammad Ilham Wibowo', NULL, '1', 'e8c3e0c227481eb67859f9fe10c048f736fd5fd733698cd9352fac0e41c55c1f', 'terverifikasi', '165150200111020', '2019-06-27 10:24:36'),
('165150200111022', 'visitasi', 'naufal fawwaz', 'PSKSMS001', 'n', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'belum terverifikasi', '165150200111022', '2019-06-27 10:24:36'),
('165150200111099', 'kesmas', 'ahmad naufal', NULL, 'a', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'terverifikasi', '165150200111021', '2019-06-27 10:24:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas_permohonan`
--

CREATE TABLE `berkas_permohonan` (
  `id_berkas` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `nik_pemohon` varchar(255) NOT NULL,
  `ktp_pemohon` varchar(255) DEFAULT NULL,
  `foto_pemohon` varchar(255) DEFAULT NULL,
  `formJS` varchar(255) DEFAULT NULL,
  `skdu` varchar(255) DEFAULT NULL,
  `denah` varchar(255) DEFAULT NULL,
  `sertifikat_pelatihan` varchar(255) DEFAULT NULL,
  `surat_tpm` varchar(255) DEFAULT NULL,
  `rekomendasi` varchar(255) DEFAULT NULL,
  `kuasa` varchar(255) DEFAULT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `ijin_pariwisata` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `id_puskesmas` varchar(255) NOT NULL,
  `tglvisitasi` date NOT NULL DEFAULT '0000-00-00',
  `tim_visit` varchar(255) NOT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` varchar(255) NOT NULL,
  `nama_kecamatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `nama_kecamatan`) VALUES
('KEC001', 'Blimbing'),
('KEC002', 'Kedungkandang'),
('KEC003', 'Klojen'),
('KEC004', 'Lowokwaru'),
('KEC005', 'Sukun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengguna`
--

CREATE TABLE `pengguna` (
  `nik_pengguna` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'diproses',
  `nama` varchar(255) NOT NULL,
  `kewarganegaraan` varchar(255) DEFAULT NULL,
  `umur` varchar(255) DEFAULT NULL,
  `nik_pemohon` varchar(255) NOT NULL,
  `alamat_rumah` varchar(255) NOT NULL,
  `notelp_pemohon` varchar(255) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `puskesmas`
--

CREATE TABLE `puskesmas` (
  `id_puskesmas` varchar(255) NOT NULL,
  `id_kecamatan` varchar(255) NOT NULL,
  `nama_puskesmas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `puskesmas`
--

INSERT INTO `puskesmas` (`id_puskesmas`, `id_kecamatan`, `nama_puskesmas`) VALUES
('PSKSMS001', 'KEC002', 'Puskesmas Kedungkandang'),
('PSKSMS002', 'KEC002', 'Puskesmas Gribig'),
('PSKSMS003', 'KEC002', 'Puskesmas Arjowinangun'),
('PSKSMS004', 'KEC005', 'Puskesmas Ciptomulyo'),
('PSKSMS005', 'KEC005', 'Puskesmas Janti'),
('PSKSMS006', 'KEC005', 'Puskesmas Mulyorejo'),
('PSKSMS007', 'KEC001', 'Puskesmas Cisadea'),
('PSKSMS008', 'KEC001', 'Puskesmas Kendalkerep'),
('PSKSMS009', 'KEC001', 'Puskesmas Pandanwangi'),
('PSKSMS010', 'KEC003', 'Puskesmas Arjuno'),
('PSKSMS011', 'KEC003', 'Puskesmas Bareng'),
('PSKSMS012', 'KEC003', 'Puskesmas Rampal Celaket'),
('PSKSMS013', 'KEC004', 'Puskesmas Dinoyo'),
('PSKSMS014', 'KEC004', 'Puskesmas Kendalsari'),
('PSKSMS015', 'KEC004', 'Puskesmas Mojolangu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekap`
--

CREATE TABLE `rekap` (
  `id_rekap` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `nik_pemohon` varchar(255) NOT NULL,
  `nip_admin` varchar(255) NOT NULL,
  `tinjauan` varchar(255) NOT NULL,
  `ujilab` varchar(255) NOT NULL,
  `keterangan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `nosertif` varchar(255) NOT NULL,
  `tglterbit` date NOT NULL,
  `batastgl` date NOT NULL,
  `tahunterbit` int(4) NOT NULL,
  `no_golongan` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(11) NOT NULL,
  `id_permohonan` int(11) NOT NULL,
  `nik_pemohon` varchar(255) NOT NULL,
  `nama_kantor` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `nama_usaha` varchar(255) NOT NULL,
  `tahun_produksi` varchar(255) DEFAULT NULL,
  `alamat_usaha` varchar(255) NOT NULL,
  `kelurahan_usaha` varchar(255) DEFAULT NULL,
  `kecamatan_usaha` varchar(255) DEFAULT NULL,
  `notelp_usaha` varchar(255) NOT NULL,
  `noHP_usaha` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`nip`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `puskesmas` (`puskesmas`),
  ADD KEY `puskesmas_2` (`puskesmas`);

--
-- Indeks untuk tabel `berkas_permohonan`
--
ALTER TABLE `berkas_permohonan`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `fk_berkas_permohonan` (`id_permohonan`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `fk_jadwal_permohonan` (`id_permohonan`),
  ADD KEY `fk_jadwal_puskesmas` (`id_puskesmas`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indeks untuk tabel `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`nik_pengguna`);

--
-- Indeks untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- Indeks untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD PRIMARY KEY (`id_puskesmas`),
  ADD KEY `id_kecamatan` (`id_kecamatan`);

--
-- Indeks untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD PRIMARY KEY (`id_rekap`),
  ADD KEY `id_permohonan` (`id_permohonan`),
  ADD KEY `fk_rekap_nip` (`nip_admin`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`),
  ADD KEY `fk_sertifikat_permohonan` (`id_permohonan`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `fk_usaha_permohonan` (`id_permohonan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berkas_permohonan`
--
ALTER TABLE `berkas_permohonan`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `permohonan`
--
ALTER TABLE `permohonan`
  MODIFY `id_permohonan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT untuk tabel `rekap`
--
ALTER TABLE `rekap`
  MODIFY `id_rekap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas_permohonan`
--
ALTER TABLE `berkas_permohonan`
  ADD CONSTRAINT `fk_berkas_permohonan` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_permohonan` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jadwal_puskesmas` FOREIGN KEY (`id_puskesmas`) REFERENCES `puskesmas` (`id_puskesmas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `puskesmas`
--
ALTER TABLE `puskesmas`
  ADD CONSTRAINT `puskesmas_ibfk_1` FOREIGN KEY (`id_kecamatan`) REFERENCES `kecamatan` (`id_kecamatan`) ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `rekap`
--
ALTER TABLE `rekap`
  ADD CONSTRAINT `fk_rekap_nip` FOREIGN KEY (`nip_admin`) REFERENCES `admin` (`nip`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rekap_permohonan` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD CONSTRAINT `fk_sertifikat_permohonan` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `fk_usaha_permohonan` FOREIGN KEY (`id_permohonan`) REFERENCES `permohonan` (`id_permohonan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
