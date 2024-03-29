-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 17, 2020 lúc 12:30 PM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `recordsmanagement`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `citizen`
--

CREATE TABLE `citizen` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_hoso` int(11) NOT NULL,
  `status_online` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `citizen`
--

INSERT INTO `citizen` (`id`, `username`, `password`, `name`, `date_of_birth`, `phone`, `email`, `address`, `reason`, `file`, `block`, `id_hoso`, `status_online`, `updated_at`, `created_at`) VALUES
(1, 'vuductien', '123456', 'Vũ Đức Tiến', NULL, '01234567', 'tien@gmail.com', 'Hải Phòng', 'Thích Nộp', 'Không có', 'No', 1, 'offline', '2020-08-15 20:13:16', NULL),
(2, 'phamhungmanh', '123456', 'Phạm Hùng Mạnh', NULL, '01234567', 'manh@gmail.com', 'Thanh Hóa', 'Thích Nộp', 'Không có', 'No', 2, 'offline', NULL, NULL),
(3, 'vuthanhthien', '123456', 'Phạm Thanh Thiên', NULL, '01234567', 'thien@gmail.com', 'Hưng Yên', 'Thích Nộp', 'Không có', 'No', 3, 'offline', NULL, NULL),
(4, 'nguyenbahiep', '123456', 'Nguyễn Bá Hiệp', NULL, '01234567', 'hiep@gmail.com', 'Thái Bình', 'Thích Nộp', 'Không có', 'No', 4, 'offline', NULL, NULL),
(5, 'nguyenduchieu', '123456', 'Nguyễn Đức Hiếu', NULL, '01234567', 'hieu@gmail.com', 'Thanh Hóa', 'Thích Nộp', 'Không có', 'No', 5, 'offline', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoso`
--

CREATE TABLE `hoso` (
  `id` int(10) UNSIGNED NOT NULL,
  `namecitizen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mathutuc` int(11) NOT NULL,
  `id_hoso` int(11) NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoso`
--

INSERT INTO `hoso` (`id`, `namecitizen`, `date_of_birth`, `phone`, `email`, `address`, `reason`, `file`, `status`, `id_mathutuc`, `id_hoso`, `note`, `updated_at`, `created_at`) VALUES
(1, 'Vũ Đức Tiến', NULL, '01234567', 'tien@gmail.com', 'Hải Phòng', 'Thích Nộp', 'Không có', 'Đã Trả Kết Quả', 1, 1, 'pp-pp', '2020-08-17 03:27:55', NULL),
(2, 'Phạm Hùng Mạnh', NULL, '01234567', 'manh@gmail.com', 'Thanh Hóa', 'Thích Nộp', 'banphim.png', 'Đang xử Lý', 2, 2, 'hồ sơ chưa có file đính kèm', '2020-08-17 03:18:15', NULL),
(3, 'Phạm Thanh Thiên', NULL, '01234567', 'thien@gmail.com', 'Hưng Yên', 'Thích Nộp', 'Không có', 'Đã Trả Kết Quả', 3, 3, NULL, '2020-08-15 02:11:09', NULL),
(4, 'Nguyễn Bá Hiệp', NULL, '01234567', 'hiep@gmail.com', 'Thái Bình', 'Thích Nộp', 'Không có', 'Chưa xử Lý', 4, 4, NULL, NULL, NULL),
(5, 'Nguyễn Đức Hiếu', NULL, '01234567', 'hieu@gmail.com', 'Thanh Hóa', 'Thích Nộp', 'Không có', 'Chưa xử Lý', 5, 5, NULL, NULL, NULL),
(6, 'Phạm Hùng Mạnh', NULL, '0999999', 'manh@gmail.com', 'THanh Hóa', 'cần gấp', 'banphim.png', 'Đã Trả Kết Quả', 1, 6, 'hồ sơ mới chỉ có ảnh', '2020-08-17 02:57:22', '2020-08-14 19:28:43'),
(7, 'Vũ Đức Tiến', NULL, '099999', 'tien@gmail.com', 'Hải Phòng', 'cần nộp', 'banphim.png', 'Đã Trả Kết Quả', 2, 7, NULL, '2020-08-17 03:26:52', '2020-08-15 00:39:48'),
(8, 'Vũ Đức Tiến', NULL, '088888', 'tien@gmail.com', 'Hải Phòng', 'Cần', 'banphim.png', 'Đã Trả Kết Quả', 3, 8, NULL, '2020-08-15 02:11:36', '2020-08-15 00:56:26'),
(9, 'Vũ Đức Tiến', NULL, '099999', 'tien@gmail.com', 'Hải Phòng', 'cần', 'banphim.png', 'Đã Trả Kết Quả', 4, 9, 'hồ sơ vớ va vớ vẩn', '2020-08-17 03:27:08', '2020-08-15 01:02:56'),
(10, 'Phạm Hùng Mạnh', NULL, '11111', 'manh@gmail.com', 'thanh hóa', 'cần', 'banphim.png', 'Chưa xử Lý', 3, 10, NULL, '2020-08-15 02:13:34', '2020-08-15 02:13:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `linhvuc`
--

CREATE TABLE `linhvuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `namelinhvuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_malinhvuc` int(11) NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `linhvuc`
--

INSERT INTO `linhvuc` (`id`, `namelinhvuc`, `id_malinhvuc`, `updated_at`, `created_at`) VALUES
(1, 'Bất động sản', 1, NULL, NULL),
(2, 'Giáo dục', 2, NULL, NULL),
(3, 'Y tế', 3, NULL, NULL),
(4, 'Giao thông', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `manager`
--

CREATE TABLE `manager` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_birth` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `block` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mathutuc` int(11) NOT NULL,
  `status_online` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `name`, `date_of_birth`, `phone`, `email`, `address`, `type`, `block`, `id_mathutuc`, `status_online`, `updated_at`, `created_at`) VALUES
(1, 'phamduclong', '123456', 'Phạm Đức Long', NULL, '01234567', 'long@gmail.com', 'Hà Nội', 'NoAdmin', 'No', 1, 'offline', '2020-08-15 23:41:28', NULL),
(2, 'admin', '123456', 'Admin', NULL, '01234567', 'admin@gmail.com', 'Hà Nội', 'Admin', 'No', 2, 'online', '2020-08-15 23:42:07', NULL),
(3, 'admin1', '123456', 'Admin1', NULL, '01234567', 'admin1@gmail.com', 'Hà Nội', 'Admin', 'No', 3, 'offline', '2020-08-15 23:41:48', NULL),
(4, NULL, NULL, 'HIếu', NULL, '1111', 'hieu@gmail.com', 'ha noi', 'NoAdmin', 'No', 4, NULL, '2020-08-15 01:08:38', '2020-08-15 01:08:38');

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
(129, '2014_10_12_000000_create_users_table', 1),
(130, '2014_10_12_100000_create_password_resets_table', 1),
(131, '2019_08_19_000000_create_failed_jobs_table', 1),
(132, '2020_07_29_014112_manager', 1),
(133, '2020_07_29_014420_citizen', 1),
(134, '2020_07_29_014515_ho_so', 1),
(135, '2020_07_29_014545_linh_vuc', 1),
(136, '2020_07_29_014656_thu_tuc', 1);

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
-- Cấu trúc bảng cho bảng `thutuc`
--

CREATE TABLE `thutuc` (
  `id` int(10) UNSIGNED NOT NULL,
  `namethutuc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_mathutuc` int(11) NOT NULL,
  `mucdo` int(11) NOT NULL,
  `id_malinhvuc` int(11) NOT NULL,
  `linkform` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thutuc`
--

INSERT INTO `thutuc` (`id`, `namethutuc`, `id_mathutuc`, `mucdo`, `id_malinhvuc`, `linkform`, `updated_at`, `created_at`) VALUES
(1, 'Cấp giấy tờ nhà đất', 1, 1, 1, 'citizen.listform.formcapgiayto', NULL, NULL),
(2, 'Xin giấy phép mở trường học', 2, 2, 2, 'citizen.listform.formxinphepmo', NULL, NULL),
(3, 'Xin Trang bị thêm trang thiết bị', 3, 3, 3, 'citizen.listform.formxintrangbi', NULL, NULL),
(4, 'Xây dựng cột đèn giao thông', 4, 4, 4, 'citizen.listform.formxaydung', NULL, NULL);

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
-- Chỉ mục cho bảng `citizen`
--
ALTER TABLE `citizen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoso`
--
ALTER TABLE `hoso`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

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
-- Chỉ mục cho bảng `thutuc`
--
ALTER TABLE `thutuc`
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
-- AUTO_INCREMENT cho bảng `citizen`
--
ALTER TABLE `citizen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `hoso`
--
ALTER TABLE `hoso`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `linhvuc`
--
ALTER TABLE `linhvuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT cho bảng `thutuc`
--
ALTER TABLE `thutuc`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
