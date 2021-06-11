-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jun 2021 pada 06.15
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek3`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admins`
--

CREATE TABLE `admins` (
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admins`
--

INSERT INTO `admins` (`username`, `password`, `created_at`, `updated_at`) VALUES
('Admin', 'eyJpdiI6IkhweHQvQndXNW1LcUswa1VUSnJDeHc9PSIsInZhbHVlIjoiMk5DQnB5aFRVVGF6NVVPMWw3OTJwQT09IiwibWFjIjoiNWE1MTZlMTBhYmEyNzg5Mzc4MGI5NjRmMjQwOGI2MmUxNGU1NDVkNDEyYmUyNTIwYWE1M2UyMDNjYWY5MmM2OCJ9', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kontaks`
--

CREATE TABLE `kontaks` (
  `id_kontak` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamarans`
--

CREATE TABLE `lamarans` (
  `id_lamaran` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lamarans`
--

INSERT INTO `lamarans` (`id_lamaran`, `nik`, `id_lowongan`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, '2222266666456789', 7, '2129313435.pdf', 'Dalam Proses', NULL, NULL),
(2, '3212186202010004', 7, '1054140401.pdf', 'Diterima', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lowongans`
--

CREATE TABLE `lowongans` (
  `id_lowongan` int(10) UNSIGNED NOT NULL,
  `id_perusahaan` int(11) NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_kerja` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_kerja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gaji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `lowongans`
--

INSERT INTO `lowongans` (`id_lowongan`, `id_perusahaan`, `nama`, `jenis_kerja`, `deskripsi_kerja`, `lokasi_kerja`, `gaji`, `kontak`, `status`, `created_at`, `updated_at`) VALUES
(7, 1805032, 'Admin', 'Kontak', 'Admin Akan ditugaskan sebagai ....', 'Indamayu', '1500000', '086123456789', 'Diterima\r\n', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `masyarakats`
--

CREATE TABLE `masyarakats` (
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan_terakhir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `masyarakats`
--

INSERT INTO `masyarakats` (`nik`, `password`, `nama`, `jk`, `no_hp`, `pendidikan_terakhir`, `alamat`, `foto`, `status`, `created_at`, `updated_at`) VALUES
('1234567890123453', 'eyJpdiI6Ik00WDJaYVBTd1A0clZpb3dUemZqUUE9PSIsInZhbHVlIjoiSjE0Rmc2MmdvVGdHZ2lkZGZNcU9xQT09IiwibWFjIjoiNjhjMGEzMGU0NDJmN2ZlOWMxMThlMWIxNTNhOTU5YTQ2MDhkMjg0Njg0OWNhOGU0ZTQ2MmE0YzU0ZTc5OGQyMCJ9', 'Afjsdkfjsdkajf', 'Laki-laki', '082295073165', 'SMA/SMK/MA/Sederajat', 'Indramayu', '518819273.jpg', 'Dalam Proses', NULL, NULL),
('2222266666456789', 'eyJpdiI6ImZJdkNlWU1kYkhSV0o3T3VtQWNTMkE9PSIsInZhbHVlIjoiWlhKUHRYbnRWTUlZVUVUTTVSWTRnZz09IiwibWFjIjoiZTdmNDhlYmFkYmU2MzM5NjMwMDY5MjFjYjYyMTM0NDJjZjJjMzI5YjdhMTAwMjdhOWNkNzFiYTE0MDNmNDBhOSJ9', 'Aliyah', 'Perempuan', '082295073165', 'SMA/SMK/MA/Sederajat', 'Subang', '1002008272.jpg', 'Dalam Proses', NULL, NULL),
('3212186202010004', 'eyJpdiI6IlJhbHFSQVBTWUJYUXh3a08wWCt3dmc9PSIsInZhbHVlIjoiT05ZZlI0ZURteEhEeXl5c3hTbWJWdz09IiwibWFjIjoiYmQxODNkMTYwYzAwYzkzYmY2OGEzMWRlYjU0NTIwZjE1MDNkZTVlNWFjMTk1ZGNiMmNhMWRlMGQyNzEwMzMxMCJ9', 'Lailatul Ulwi', 'Perempuan', '089617711002', 'D4', 'Losarang', '410879997.jpg', 'Dalam Proses', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_16_174504_create_admins_table', 1),
(5, '2021_04_16_175010_create_perusahaans_table', 1),
(6, '2021_04_16_175123_create_masyarakats_table', 1),
(7, '2021_04_16_175155_create_pelatihans_table', 1),
(8, '2021_04_16_175212_create_lowongans_table', 1),
(9, '2021_04_16_175300_create_lamarans_table', 1),
(10, '2021_04_16_175343_create_pendaftar__pelatihans_table', 1),
(11, '2021_05_10_040838_create_kontaks_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelatihans`
--

CREATE TABLE `pelatihans` (
  `id_pelatihan` int(10) UNSIGNED NOT NULL,
  `bidang_kejuruan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `persyaratan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kuota` int(11) NOT NULL,
  `waktu` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pelatihans`
--

INSERT INTO `pelatihans` (`id_pelatihan`, `bidang_kejuruan`, `deskripsi`, `persyaratan`, `kuota`, `waktu`, `created_at`, `updated_at`) VALUES
(6, 'Komputer', 'Pelatihan Komputer diharapkan dapat .....', '1. KTP\r\n2. KK', 20, 12, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftar_pelatihans`
--

CREATE TABLE `pendaftar_pelatihans` (
  `id_pen_pelatihan` int(10) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_pelatihan` int(10) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pendaftar_pelatihans`
--

INSERT INTO `pendaftar_pelatihans` (`id_pen_pelatihan`, `nik`, `id_pelatihan`, `file`, `status`, `created_at`, `updated_at`) VALUES
(9, '2222266666456789', 6, '778768717.pdf', 'Diterima', NULL, NULL),
(10, '3212186202010004', 6, '1066077039.pdf', 'Diterima', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaans`
--

CREATE TABLE `perusahaans` (
  `id_perusahaan` int(11) NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `perusahaans`
--

INSERT INTO `perusahaans` (`id_perusahaan`, `password`, `nama`, `logo`, `email`, `website`, `alamat`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1805032, 'eyJpdiI6IjBLQ0s1UUJMOXhaNUlyQUExMTY2TFE9PSIsInZhbHVlIjoiSWdubEFYUnRTV2IxSFova2tFYUVqQT09IiwibWFjIjoiODJiYzAzZThhMWYzY2UwMWE0NWUzYmU1OGZmOWM2YzRiODQwNDljMmU4NjRiZDhjMTMzYWIwMGY1NjgyY2ZiMCJ9', 'PT. Mencari Cinta Sejati', '1628125891.jpg', 'mcs@gmail.com', 'www.mcs.com', 'Indramayu', 'PT Mencari Cita Sejati adalah salah satu PT yang bergerak dalam penawaran produk Makanan', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `kontaks`
--
ALTER TABLE `kontaks`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `lamarans`
--
ALTER TABLE `lamarans`
  ADD PRIMARY KEY (`id_lamaran`),
  ADD KEY `lamarans_id_lowongan_foreign` (`id_lowongan`),
  ADD KEY `lamarans_nik_index` (`nik`);

--
-- Indeks untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  ADD PRIMARY KEY (`id_lowongan`),
  ADD KEY `lowongans_id_perusahaan_foreign` (`id_perusahaan`);

--
-- Indeks untuk tabel `masyarakats`
--
ALTER TABLE `masyarakats`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  ADD PRIMARY KEY (`id_pelatihan`);

--
-- Indeks untuk tabel `pendaftar_pelatihans`
--
ALTER TABLE `pendaftar_pelatihans`
  ADD PRIMARY KEY (`id_pen_pelatihan`),
  ADD KEY `pendaftar_pelatihans_id_pelatihan_foreign` (`id_pelatihan`),
  ADD KEY `pendaftar_pelatihans_nik_index` (`nik`);

--
-- Indeks untuk tabel `perusahaans`
--
ALTER TABLE `perusahaans`
  ADD PRIMARY KEY (`id_perusahaan`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kontaks`
--
ALTER TABLE `kontaks`
  MODIFY `id_kontak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `lamarans`
--
ALTER TABLE `lamarans`
  MODIFY `id_lamaran` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  MODIFY `id_lowongan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pelatihans`
--
ALTER TABLE `pelatihans`
  MODIFY `id_pelatihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pendaftar_pelatihans`
--
ALTER TABLE `pendaftar_pelatihans`
  MODIFY `id_pen_pelatihan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `lamarans`
--
ALTER TABLE `lamarans`
  ADD CONSTRAINT `lamarans_id_lowongan_foreign` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongans` (`id_lowongan`),
  ADD CONSTRAINT `lamarans_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `masyarakats` (`nik`);

--
-- Ketidakleluasaan untuk tabel `lowongans`
--
ALTER TABLE `lowongans`
  ADD CONSTRAINT `lowongans_id_perusahaan_foreign` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaans` (`id_perusahaan`);

--
-- Ketidakleluasaan untuk tabel `pendaftar_pelatihans`
--
ALTER TABLE `pendaftar_pelatihans`
  ADD CONSTRAINT `pendaftar_pelatihans_id_pelatihan_foreign` FOREIGN KEY (`id_pelatihan`) REFERENCES `pelatihans` (`id_pelatihan`),
  ADD CONSTRAINT `pendaftar_pelatihans_nik_foreign` FOREIGN KEY (`nik`) REFERENCES `masyarakats` (`nik`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
