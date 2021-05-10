-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 06, 2021 lúc 05:04 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.3.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `music_app`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `albums`
--

CREATE TABLE `albums` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `albums`
--

INSERT INTO `albums` (`id`, `name`, `imageUrl`, `desc`, `year`, `created_at`, `updated_at`) VALUES
(2, 'Lofi Chill', 'image/Lofi_Chill_800_300x300_jpzj3v', 'nhạc hay', '2021', '2021-04-28 01:48:31', '2021-04-28 01:48:31'),
(4, 'Remix', 'image/bync7efyg2228ao13xtx', 'qa', '2021', '2021-04-29 01:05:20', '2021-04-29 01:05:20'),
(5, 'Nhạc Trẻ', 'image/n8vameystu8mfgtpbr2x', 'abc', '2021', '2021-05-01 05:26:03', '2021-05-01 05:26:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
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
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_14_095804_create_albums_table', 2),
(5, '2021_04_14_100235_create_songs_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `songs`
--

CREATE TABLE `songs` (
  `id` int(10) UNSIGNED NOT NULL,
  `album_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `artist` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `songUrl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `imageUrl` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `songs`
--

INSERT INTO `songs` (`id`, `album_id`, `name`, `artist`, `songUrl`, `imageUrl`, `views`, `created_at`, `updated_at`) VALUES
(3, 2, 'Tình Yêu Màu Hồng (Lofi ver.)', 'Hồ Văn Quý, Xám, Freak D', 'song/teung6gi97pyzwfbmvys', 'image/aavsmthz7so2j7oqatp7', 4, '2021-04-28 01:55:17', '2021-05-03 06:21:01'),
(4, 2, 'Dù Cho Mai Về Sau (Lofi ver.)', 'buitruonglinh, Freak D', 'song/mvoymvdvykimjjuq5xuv', 'image/qpmul1jtoyhfcvvjeov6', 8, '2021-04-28 02:00:47', '2021-05-06 01:44:27'),
(5, 2, 'Họ Yêu Ai Mất Rồi (Lofi ver.)', 'Doãn Hiếu, Mr.Paa', 'song/j8bss4w9vdjfgctvzajc', 'image/gkramclcgk6ryihvbfip', 6, '2021-04-28 02:04:36', '2021-05-06 01:50:03'),
(6, 2, 'Mình Anh Nơi Này (Lofi ver.)', 'NIT, Sing', 'song/tscms6ox6h2wpmezivl3', 'image/xrhcbg5bwbszjistpr77', 3, '2021-04-28 02:09:47', '2021-05-06 01:59:10'),
(7, 2, 'Chúng Ta Sau Này (Lofi ver.)', 'T.R.I, Freak D', 'song/u7vbjkydx6m3h6skocn8', 'image/ohtettslwt5k9cfz2dur', 7, '2021-04-28 02:13:19', '2021-05-06 01:23:54'),
(8, 5, 'matchanah', 'híu, bâu', 'song/bfvyypamxt9vujemrpzn', 'image/ouskzix19naphe6llehf', 5, '2021-04-28 02:16:37', '2021-05-06 01:54:02'),
(9, 2, 'Chúng ta của hiện tại (Lofi ver.)', 'Sơn Tùng M-TP', 'song/erembpv4z6zrfajenbtl', 'image/wl7oh8whj5spndajxhbp', 5, '2021-04-29 04:13:59', '2021-05-03 05:49:10'),
(10, 2, '3107 - 2 (Lofi ver.)', 'Dươngg, Nâu, W/N', 'song/cyqulsxtysrvdocbkkdc', 'image/qfi3p2uaejsvmtvlauma', 6, '2021-04-29 04:16:02', '2021-05-03 06:24:32'),
(11, 2, 'Nợ ai đó lời xin lỗi (Lofi ver.)', 'Bozitt, Freak D', 'song/gzm7p2hipeyheftlzubh', 'image/dg8b3cuqjtk36qn1ghpy', 1, '2021-04-29 04:26:20', '2021-05-01 19:47:20'),
(13, 5, 'Muộn rồi mà sao còn', 'Sơn Tùng M-TP', 'song/ejbpscrgqszclrc8pmi1', 'image/vlsobrko17f8jmzwilol', 11, '2021-05-01 05:26:48', '2021-05-06 02:03:47'),
(14, 4, 'Muộn rồi mà sao còn Remix', 'Sơn Tùng M-TP', 'song/whnnszyws9iiteqjroqc', 'image/fiyfqc0sm5qqqydiviw4', 4, '2021-05-03 06:11:09', '2021-05-06 02:08:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
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
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `albums`
--
ALTER TABLE `albums`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `albums`
--
ALTER TABLE `albums`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `songs`
--
ALTER TABLE `songs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
