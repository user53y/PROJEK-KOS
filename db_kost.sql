-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 26 Des 2024 pada 22.11
-- Versi server: 8.0.40
-- Versi PHP: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kost`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('0facaa64a17abd675490e508bbf31844', 'i:1;', 1735210648),
('0facaa64a17abd675490e508bbf31844:timer', 'i:1735210648;', 1735210648),
('2f384b686f3d6a81d8495e98b9a8ea8d', 'i:2;', 1735007476),
('2f384b686f3d6a81d8495e98b9a8ea8d:timer', 'i:1735007476;', 1735007476),
('55c81968aab375f1e2dbb4e17aa1821f', 'i:1;', 1735219165),
('55c81968aab375f1e2dbb4e17aa1821f:timer', 'i:1735219165;', 1735219165),
('dc9538d5b7465ee8d433b84e1a15ea15', 'i:1;', 1735219023),
('dc9538d5b7465ee8d433b84e1a15ea15:timer', 'i:1735219023;', 1735219023),
('fec863f45ffaa166cf8f312d416803f6', 'i:1;', 1735207463),
('fec863f45ffaa166cf8f312d416803f6:timer', 'i:1735207463;', 1735207463);

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakamar`
--

CREATE TABLE `datakamar` (
  `id` bigint UNSIGNED NOT NULL,
  `no_kamar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `luas` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lantai` int NOT NULL,
  `kapasitas` int NOT NULL,
  `harga_bulanan` decimal(10,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datakamar`
--

INSERT INTO `datakamar` (`id`, `no_kamar`, `tipe`, `luas`, `lantai`, `kapasitas`, `harga_bulanan`, `status`, `gambar`, `created_at`, `updated_at`) VALUES
(15, 'Kamar no 1', 'Kamar Standard', '3m x 4m', 1, 1, 500000.00, 'Disewa', '1735208026.jpg', '2024-12-26 03:07:51', '2024-12-26 05:24:02'),
(16, 'Kamar no 2', 'Kamar Keluarga', '4m x 5m', 1, 2, 700000.00, 'Tersedia', '1735207710.jpg', '2024-12-26 03:08:30', '2024-12-26 03:37:49'),
(17, 'Kamar no 3', 'Kamar Standard', '3m x 5m', 1, 1, 600000.00, 'Tersedia', '1735207766.jpg', '2024-12-26 03:09:26', '2024-12-26 03:09:26'),
(18, 'Kamar no 5', 'Kamar Standard', '3m x 4m', 1, 1, 500000.00, 'Tersedia', '1735207801.jpg', '2024-12-26 03:10:01', '2024-12-26 03:10:01'),
(19, 'Kamar no 4', 'Kamar Standard', '3m x 4m', 1, 1, 500000.00, 'Disewa', '1735207840.jpg', '2024-12-26 03:10:40', '2024-12-26 06:17:04'),
(20, 'Kamar no 6', 'Kamar Standard', '4m x 5m', 1, 2, 700000.00, 'Tersedia', '1735207892.jpg', '2024-12-26 03:11:32', '2024-12-26 03:11:32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datakos`
--

CREATE TABLE `datakos` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_kost` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_kamar` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datakos`
--

INSERT INTO `datakos` (`id`, `nama_kost`, `pemilik`, `alamat`, `jumlah_kamar`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'Kos Bu Tik', 'Bu Tik', 'Jl. Margo Tani, Sukorame, Kec. Mojoroto, Kota Kediri, Jawa Timur 64114', '6', '4', NULL, '2024-12-23 17:42:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapemasukan`
--

CREATE TABLE `datapemasukan` (
  `id` bigint UNSIGNED NOT NULL,
  `penghuni_id` bigint UNSIGNED NOT NULL,
  `jumlah` decimal(10,2) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datapemasukan`
--

INSERT INTO `datapemasukan` (`id`, `penghuni_id`, `jumlah`, `tanggal`, `created_at`, `updated_at`) VALUES
(14, 55, 500000.00, '2024-12-26', '2024-12-26 05:24:02', '2024-12-26 05:24:02'),
(15, 58, 500000.00, '2024-12-26', '2024-12-26 06:17:04', '2024-12-26 06:17:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapengeluaran`
--

CREATE TABLE `datapengeluaran` (
  `id` bigint UNSIGNED NOT NULL,
  `jenis_id` bigint UNSIGNED NOT NULL,
  `deskripsi_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pengeluaran` decimal(15,2) NOT NULL,
  `tanggal_pengeluaran` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kamar_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datapengeluaran`
--

INSERT INTO `datapengeluaran` (`id`, `jenis_id`, `deskripsi_pengeluaran`, `jumlah_pengeluaran`, `tanggal_pengeluaran`, `created_at`, `updated_at`, `kamar_id`) VALUES
(3, 2, '-', 95000.00, '2024-12-25', '2024-12-23 19:39:38', '2024-12-26 06:31:38', NULL),
(4, 4, 'Menyewa petugas kebersihan', 100000.00, '2024-12-26', '2024-12-26 06:35:48', '2024-12-26 06:35:48', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `datapenghuni`
--

CREATE TABLE `datapenghuni` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `datakamar_id` bigint UNSIGNED NOT NULL,
  `foto_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_masuk` date NOT NULL,
  `tanggal_keluar` date DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Belum Lunas',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `datapenghuni`
--

INSERT INTO `datapenghuni` (`id`, `user_id`, `datakamar_id`, `foto_ktp`, `tanggal_masuk`, `tanggal_keluar`, `status`, `created_at`, `updated_at`, `bukti_pembayaran`) VALUES
(55, 8, 15, NULL, '2024-12-26', '2025-01-26', 'Lunas', '2024-12-26 04:56:47', '2024-12-26 05:24:02', '1735215212_struk.jpg'),
(56, 7, 16, '1735218759.png', '2024-12-26', '2025-01-25', 'Belum Lunas', '2024-12-26 06:12:39', '2024-12-26 06:12:39', NULL),
(57, 6, 17, '1735218830.png', '2024-12-26', '2025-01-25', 'Menunggu Konfirmasi', '2024-12-26 06:13:50', '2024-12-26 06:18:52', '1735219132_struk.jpg'),
(58, 2, 19, '1735218867.png', '2024-12-26', '2025-01-25', 'Lunas', '2024-12-26 06:14:27', '2024-12-26 06:17:04', '1735218992_struk.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenispengeluaran`
--

CREATE TABLE `jenispengeluaran` (
  `id` bigint UNSIGNED NOT NULL,
  `kategori_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_pengeluaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenispengeluaran`
--

INSERT INTO `jenispengeluaran` (`id`, `kategori_pengeluaran`, `nama_pengeluaran`, `created_at`, `updated_at`) VALUES
(1, 'Pajak', 'Pajak Bumi Bangunan', '2024-12-23 03:12:05', '2024-12-23 03:12:06'),
(2, 'Biaya Operasional', 'Listrik (PLN)', '2024-12-23 03:14:48', '2024-12-23 03:14:48'),
(3, 'Biaya Operasional', 'Air (PDAM)', '2024-12-23 03:15:39', '2024-12-23 03:15:39'),
(4, 'Biaya Pemeliharaan', 'Kebersihan', '2024-12-23 03:16:40', '2024-12-23 03:16:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_16_122103_buat_table_datakos', 2),
(5, '2024_12_16_144454_buat_table_datakamar', 3),
(6, '2024_12_16_155727_buat_table_datapenghuni', 4),
(7, '2024_12_16_170223_buat_table_datapenghuni', 5),
(8, '2024_12_16_173135_buat_table_datapenghuni', 6),
(9, '2024_12_16_225402_add_default_value_to_status_in_datapenghuni_table', 7),
(10, '2024_12_17_224939_add_default_value_to_status_in_datapenghuni_table', 8),
(11, '2024_12_17_231959_buat_table_jenispengeluaran', 9),
(12, '2024_12_17_232408_buat_table_datapengeluaran', 10),
(13, '2024_12_18_015745_buat_table_datapemasukan', 11),
(14, '2024_12_18_035536_buat_table_datapengeluaran', 12),
(15, '2024_12_18_061422_add_default_value_to_status_in_datapenghuni_table', 13),
(16, '2024_12_23_145939_create_notifications_table', 14),
(17, '2024_12_23_171209_add_bukti_pembayaran_to_datapenghuni_table', 15),
(18, '2024_12_23_215704_add_tablepemasukan', 16);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('02ee8f3a-84aa-4e15-b45a-56e9ed5a50d6', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 2 membutuhkan persetujuan.\",\"penghuni_id\":48,\"payment_proof\":\"1735010186_p2.png\"}', '2024-12-23 20:16:51', '2024-12-23 20:16:27', '2024-12-23 20:16:51'),
('07f17328-47c3-4251-bcc1-d0061c3ed5c1', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":50,\"payment_proof\":\"1735211027_struk.jpg\"}', '2024-12-26 04:13:03', '2024-12-26 04:03:48', '2024-12-26 04:13:03'),
('0c6a400e-a788-466c-bd46-c3735d57ade2', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 4 membutuhkan persetujuan.\",\"penghuni_id\":58,\"payment_proof\":\"1735218992_struk.jpg\"}', '2024-12-26 06:17:04', '2024-12-26 06:16:32', '2024-12-26 06:17:04'),
('18b2f301-8132-4140-8d7f-40f1c720f2e7', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":55,\"payment_proof\":\"struk.jpg\"}', '2024-12-26 05:13:58', '2024-12-26 05:05:27', '2024-12-26 05:13:58'),
('257b3a19-7bef-45d9-afc4-9bb043d496cf', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Diana Restu telah memesan Kamar no 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/55\"}', '2024-12-26 05:03:03', '2024-12-26 04:56:47', '2024-12-26 05:03:03'),
('264a9835-7cfc-4435-824f-dcb360062331', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 2 membutuhkan persetujuan.\",\"penghuni_id\":45,\"payment_proof\":\"1735008775_Snipaste_2024-12-24_09-35-47.png\"}', '2024-12-23 20:15:59', '2024-12-23 19:52:55', '2024-12-23 20:15:59'),
('2723465d-e04e-46a2-9c5e-ec4e40d9b64e', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":55,\"payment_proof\":\"struk.jpg\"}', '2024-12-26 05:14:01', '2024-12-26 05:03:31', '2024-12-26 05:14:01'),
('285f2e7b-f719-456c-bc84-ca7665892ced', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":55,\"payment_proof\":\"1735215212_struk.jpg\"}', '2024-12-26 05:24:02', '2024-12-26 05:13:32', '2024-12-26 05:24:02'),
('40e3bb62-f176-4e1a-8db5-06731553a3f7', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":50,\"payment_proof\":\"1735211027_struk.jpg\"}', '2024-12-26 04:13:00', '2024-12-26 04:10:41', '2024-12-26 04:13:00'),
('4b6eb805-c097-43d2-ba61-88427d7473fb', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":50,\"payment_proof\":\"1735211027_struk.jpg\"}', '2024-12-26 04:12:56', '2024-12-26 04:08:41', '2024-12-26 04:12:56'),
('58e50129-d4d9-4fca-901b-2dc7e9b75d6c', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":44,\"payment_proof\":\"1735002085_Snipaste_2024-12-23_05-46-57.png\"}', '2024-12-23 18:01:43', '2024-12-23 18:01:25', '2024-12-23 18:01:43'),
('61e0f75a-1079-4e04-9fe4-6daef95c2bcc', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":49,\"payment_proof\":\"1735010433_PEMASUK4.png\"}', '2024-12-23 20:21:07', '2024-12-23 20:20:33', '2024-12-23 20:21:07'),
('7388c4f2-0f97-4d30-931c-4341e45fd7ee', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Diana Restu telah memesan kamar No Kamar no 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/52\"}', '2024-12-26 03:56:48', '2024-12-26 03:38:08', '2024-12-26 03:56:48'),
('74760497-a9ee-4294-b0df-ba7b964838f7', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":50,\"payment_proof\":\"1735210367_struk.jpg\"}', '2024-12-26 04:13:06', '2024-12-26 03:52:47', '2024-12-26 04:13:06'),
('784a22cd-ae8a-4935-8da1-457af9af93e6', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Diana Restu telah memesan kamar No Kamar no 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/50\"}', '2024-12-26 03:56:37', '2024-12-26 03:18:11', '2024-12-26 03:56:37'),
('7ae25bf0-ab9f-4eea-bcc7-6c981926ba06', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 2 membutuhkan persetujuan.\",\"penghuni_id\":41,\"payment_proof\":\"1734994004_Snipaste_2024-12-23_05-56-16.png\"}', '2024-12-23 15:47:08', '2024-12-23 15:46:45', '2024-12-23 15:47:08'),
('7d611398-9672-4052-bc54-bf98bd2df1a8', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Reny Safarida telah memesan kamar No Kamar no 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/47\"}', '2024-12-23 20:15:51', '2024-12-23 20:13:56', '2024-12-23 20:15:51'),
('85c856f5-41f7-4328-8b83-3e249cab0e55', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Marinda Cahya Putri telah memesan kamar No Kamar no 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/43\"}', '2024-12-23 17:39:14', '2024-12-23 17:24:56', '2024-12-23 17:39:14'),
('8bab4cec-4f5f-4fea-9f29-a0e696022cb1', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Diana Restu telah memesan kamar No Kamar no 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/53\"}', '2024-12-26 03:56:52', '2024-12-26 03:43:03', '2024-12-26 03:56:52'),
('965642cd-1650-49e6-8341-d57b7fd98cc4', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Diana Restu telah memesan kamar No Kamar no 1\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/54\"}', '2024-12-26 04:56:03', '2024-12-26 04:55:11', '2024-12-26 04:56:03'),
('a050c709-d207-4a8b-9695-d67d038174af', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Marinda Cahya Putri telah memesan kamar No Kamar no 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/41\"}', '2024-12-23 17:39:07', '2024-12-23 14:20:22', '2024-12-23 17:39:07'),
('abb077da-1291-4e44-9e1d-e95ca5ca420a', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":55,\"payment_proof\":null}', '2024-12-26 05:02:53', '2024-12-26 05:00:47', '2024-12-26 05:02:53'),
('b1d3083e-3c14-44c3-bf48-c7949f745bfd', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Reny Safarida telah memesan kamar No Kamar no 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/48\"}', '2024-12-23 20:15:48', '2024-12-23 20:15:20', '2024-12-23 20:15:48'),
('b4ac2f7d-e7ec-449a-9473-926f5304ddaf', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 3 membutuhkan persetujuan.\",\"penghuni_id\":57,\"payment_proof\":\"1735219132_struk.jpg\"}', NULL, '2024-12-26 06:18:52', '2024-12-26 06:18:52'),
('b5d016c3-51f2-4f1a-8d7a-689a9606f9ab', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":37}', '2024-12-23 13:14:39', '2024-12-23 13:09:14', '2024-12-23 13:14:39'),
('bc3a33d0-6ad2-4415-8482-03e28453895e', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 2 membutuhkan persetujuan.\",\"penghuni_id\":43,\"payment_proof\":\"1734999919_Snipaste_2024-12-19_23-27-15.png\"}', '2024-12-23 17:25:37', '2024-12-23 17:25:19', '2024-12-23 17:25:37'),
('c163e3f1-aec4-44a7-9801-c9161b12d81f', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Diana Restu telah memesan kamar No Kamar no 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan?51\"}', '2024-12-26 03:56:45', '2024-12-26 03:35:34', '2024-12-26 03:56:45'),
('ca52b9b5-b5c7-4567-b501-996d47295439', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran kamar No. Kamar no 2 membutuhkan persetujuan.\",\"penghuni_id\":41,\"payment_proof\":\"1734994002_Snipaste_2024-12-23_05-56-16.png\"}', '2024-12-23 17:39:11', '2024-12-23 15:46:44', '2024-12-23 17:39:11'),
('dc80d9cf-0455-4eb6-8e34-dc3616bf919f', 'App\\Notifications\\PaymentApprovalNotification', 'App\\Models\\User', 1, '{\"message\":\"Pembayaran  Kamar no 1 membutuhkan persetujuan.\",\"penghuni_id\":50,\"payment_proof\":\"1735211027_struk.jpg\"}', '2024-12-26 04:20:49', '2024-12-26 04:13:36', '2024-12-26 04:20:49'),
('e0a212dd-4c1f-42d2-aa62-d4b26e68c452', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Marinda Cahya Putri telah memesan kamar No Kamar no 2\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/45\"}', '2024-12-23 20:16:02', '2024-12-23 19:52:37', '2024-12-23 20:16:02'),
('e7c023ac-d190-48b0-ac40-3fd60928c031', 'App\\Notifications\\PesananBaruNotification', 'App\\Models\\User', 1, '{\"message\":\"Penghuni Reny Safarida telah memesan kamar No Kamar no 4\",\"url\":\"http:\\/\\/127.0.0.1:8000\\/detail-pemesanan\\/46\"}', '2024-12-23 20:15:55', '2024-12-23 20:13:33', '2024-12-23 20:15:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('LwYyhu4IUE4jzpPGAR8HdhBqBx5UsQnWdWK7XaDP', 8, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUTRTaVRSb3dKOUhkbk04TnBMeTREWHJ5S29GZGFIQXFJQW03TDJKNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZWstcGVtYmF5YXJhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjg7fQ==', 1735215212),
('SblGaqbbK1CajjwQA7pBZG9RZDEex2ZAqn2Fzy96', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVkVHVTBoUWZneVNSMUtBenFRWVBXSWZTOWk4VkwybG1UMmFIb0RCcCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZWstcGVtYmF5YXJhbiI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1735218993),
('XDwOJs03D6RSDKhF3mMHe3ndTzD6NRxkuO4h4f0k', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUXVJUWlzOUdZN0Z6SGNkSjlVUXhhZUY5T1pxRjloSHhyS1FWdlFLNCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxO30=', 1735221958),
('XYK3wQYjFWi1oXasc5Hd0eS1QUfqvxxE5vAnF0Vd', 6, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSFVZWEZqNExMWEd3bnZwVUpURHlXVlF4UHZyU2t2NXB2ZG9TOTdEUSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzY6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9jZWstcGVtYmF5YXJhbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjY7fQ==', 1735219132);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_ktp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `alamat`, `no_hp`, `foto`, `no_ktp`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bu Tik', 'pemilik', 'sstaykostid@gmail.com', '2024-12-16 05:10:10', NULL, NULL, 'pemilik.png', NULL, '$2y$12$/AgpVkCobFHUwYCJTT3E/OJQ7d50Nxv2O1qDJZ7x2/In3oDxSt5PS', NULL, '2024-12-16 04:19:23', '2024-12-16 05:10:10'),
(2, 'Reny Safarida', 'penghuni', 'reny@gmail.com', '2024-12-16 05:14:57', 'jl.lesti 2', '0813462167812', 'penghuni2.png', '2331730040', '$2y$12$HlfvnqVfnpZg5Zce9b7ChuMel8i67m2yVjvwTo6I7ee9UWYXAL21G', NULL, '2024-12-16 05:13:52', '2024-12-16 05:14:57'),
(6, 'Marinda Cahya Putri', 'penghuni', 'rinda@gmail.com', '2024-12-24 02:55:53', NULL, NULL, NULL, NULL, '$2y$12$nv34lNVGLB0uDMlWuFoi4ekrbxY9/PVoS2b/HQ05LMtPG0HfhmHcC', NULL, '2024-12-23 19:44:00', '2024-12-23 19:44:00'),
(7, 'Andara artahusna', 'penghuni', 'andara@gmail.com', '2024-12-26 09:56:17', NULL, NULL, NULL, NULL, '$2y$12$fxshZJRBH9cutuCp80ukWOJ2rSqOD3NnSTty6ishE7dsqFWlMg0Vq', NULL, '2024-12-26 02:52:16', '2024-12-26 02:52:16'),
(8, 'Diana Restu', 'penghuni', 'dianarestu@gmail.com', '2024-12-26 09:58:39', NULL, NULL, NULL, NULL, '$2y$12$gP26HJ8o.bHN25m7Qnrak.X1a0G6P0TcOjEM8cLFDfAreJHyA5imG', NULL, '2024-12-26 02:58:12', '2024-12-26 02:58:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indeks untuk tabel `datakamar`
--
ALTER TABLE `datakamar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datakos`
--
ALTER TABLE `datakos`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `datapemasukan`
--
ALTER TABLE `datapemasukan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datapemasukan_penghuni_id_foreign` (`penghuni_id`);

--
-- Indeks untuk tabel `datapengeluaran`
--
ALTER TABLE `datapengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datapengeluaran_jenis_id_foreign` (`jenis_id`),
  ADD KEY `datapengeluaran_kamar_id_foreign` (`kamar_id`);

--
-- Indeks untuk tabel `datapenghuni`
--
ALTER TABLE `datapenghuni`
  ADD PRIMARY KEY (`id`),
  ADD KEY `datapenghuni_user_id_foreign` (`user_id`),
  ADD KEY `datapenghuni_datakamar_id_foreign` (`datakamar_id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `jenispengeluaran`
--
ALTER TABLE `jenispengeluaran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT untuk tabel `datakamar`
--
ALTER TABLE `datakamar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `datakos`
--
ALTER TABLE `datakos`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `datapemasukan`
--
ALTER TABLE `datapemasukan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `datapengeluaran`
--
ALTER TABLE `datapengeluaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `datapenghuni`
--
ALTER TABLE `datapenghuni`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `jenispengeluaran`
--
ALTER TABLE `jenispengeluaran`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `datapemasukan`
--
ALTER TABLE `datapemasukan`
  ADD CONSTRAINT `datapemasukan_penghuni_id_foreign` FOREIGN KEY (`penghuni_id`) REFERENCES `datapenghuni` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `datapengeluaran`
--
ALTER TABLE `datapengeluaran`
  ADD CONSTRAINT `datapengeluaran_jenis_id_foreign` FOREIGN KEY (`jenis_id`) REFERENCES `jenispengeluaran` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `datapengeluaran_kamar_id_foreign` FOREIGN KEY (`kamar_id`) REFERENCES `datakamar` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `datapenghuni`
--
ALTER TABLE `datapenghuni`
  ADD CONSTRAINT `datapenghuni_datakamar_id_foreign` FOREIGN KEY (`datakamar_id`) REFERENCES `datakamar` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `datapenghuni_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
