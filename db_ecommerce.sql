-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 06:22 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `session_id`, `product_id`, `product_name`, `image`, `price`, `amount`, `created_at`, `updated_at`) VALUES
(15, NULL, 'AhZ65ElPZmGjI4Ef4BTq8AitR1Vf3oT8CCdCIux2', 1, 'Ốp lưng cặp đôi 01', 'op-lung-cap-5-ver-2-1-510x510.jpg', 200000, 6, '2022-04-19 11:10:57', '2022-04-19 11:11:26'),
(42, NULL, 'Tl0fFMVjicKQxeLbLZAdo9OuQkC47pST2IhwxWYQ', 2, 'Ốp lưng cặp đôi 02', 'op-lung-cap-7-ver-2-1-510x510.jpg', 200000, 1, '2022-04-24 05:56:44', '2022-04-24 05:56:44'),
(44, NULL, 'xpSy18rU7MhXsaf4HOv2HyimyhKLYNlf796sSt9E', 1, 'Ốp lưng cặp đôi 01', 'op-lung-cap-5-ver-2-1-510x510.jpg', 200000, 1, '2022-04-25 14:39:28', '2022-04-25 14:39:28'),
(46, NULL, 'xpSy18rU7MhXsaf4HOv2HyimyhKLYNlf796sSt9E', 3, 'Ốp lưng cặp đôi 03', 'op-lung-cap-8-510x510.jpg', 200000, 1, '2022-04-25 16:20:57', '2022-04-25 16:20:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cate_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`, `created_at`, `updated_at`) VALUES
(1, 'Ốp lưng in tên', '2022-04-16 12:15:16', '2022-04-16 12:15:16'),
(2, 'Ốp lưng cặp đôi', '2022-04-16 12:15:20', '2022-04-16 12:15:20'),
(3, 'Ốp lưng in hình cá nhân', '2022-04-16 12:15:22', '2022-04-16 12:15:22'),
(4, 'Ốp lưng in hình vẽ phác họa', '2022-04-16 12:15:25', '2022-04-16 12:15:25'),
(5, 'Ốp lưng in hình vẽ chibi', '2022-04-16 12:15:28', '2022-04-16 12:15:28'),
(6, 'Ốp lưng in logo công ty', '2022-04-16 12:15:29', '2022-04-16 12:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `status`, `created_at`, `updated_at`) VALUES
(14, 'Nhan Do', 'dotrongnhan20112003@gmail.com', '0383687458', '123', 0, '2022-04-27 13:07:57', '2022-04-27 13:07:57'),
(15, 'Nhan Do', 'dotrongnhan20112003@gmail.com', '0383687458', '123', 0, '2022-04-27 13:08:16', '2022-04-27 13:08:16'),
(16, 'Nhan Do', 'dotrongnhan20112003@gmail.com', '0383687458', 'hihi', 0, '2022-05-04 07:40:31', '2022-05-04 07:40:31'),
(17, 'Nhan Do', 'dotrongnhan20112003@gmail.com', '0383687458', '123123', 0, '2022-05-04 09:49:50', '2022-05-04 09:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_04_10_073004_create_contact_table', 1),
(6, '2022_04_10_073116_create_categories_table', 1),
(7, '2022_04_10_073257_create_products_table', 1),
(8, '2022_04_16_190708_create_cart_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cate` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Tất cả dòng điện thoại',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `view` int(11) DEFAULT 0,
  `status` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `id_cate`, `product_name`, `description`, `image`, `price`, `amount`, `view`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Ốp lưng cặp đôi 01', 'Tất cả dòng điện thoại', 'op-lung-cap-5-ver-2-1-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:15:56', '2022-04-16 12:15:56'),
(2, 2, 'Ốp lưng cặp đôi 02', 'Tất cả dòng điện thoại', 'op-lung-cap-7-ver-2-1-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:16:05', '2022-04-16 12:16:05'),
(3, 2, 'Ốp lưng cặp đôi 03', 'Tất cả dòng điện thoại', 'op-lung-cap-8-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:16:14', '2022-04-16 12:16:14'),
(4, 2, 'Ốp lưng cặp đôi 04', 'Tất cả dòng điện thoại', 'op-lung-couple_danhmai-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:16:22', '2022-04-16 12:16:22'),
(5, 2, 'Ốp lưng cặp đôi 05', 'Tất cả dòng điện thoại', 'op-lung-couple_khanh-Nhu.jpg', 200000, 100, 0, 0, '2022-04-16 12:16:32', '2022-04-16 12:16:32'),
(6, 2, 'Ốp lưng cặp đôi 06', 'Tất cả dòng điện thoại', 'op-lung-couple_thuy-linh-dang-huy-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:16:42', '2022-04-16 12:16:42'),
(7, 2, 'Ốp lưng cặp đôi 07', 'Tất cả dòng điện thoại', 'op-lung-couple_thuy-tram-nhat-cuong-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:16:56', '2022-04-16 12:16:56'),
(8, 2, 'Ốp lưng cặp đôi 08', 'Tất cả dòng điện thoại', 'op-lung-couple_tuan-nhi-510x510.jpg', 200000, 100, 0, 0, '2022-04-16 12:17:04', '2022-04-16 12:17:04'),
(9, 1, 'Ốp lưng in tên 01', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-29.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:17:25', '2022-04-16 12:17:25'),
(10, 1, 'Ốp lưng in tên 02', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-30.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:17:33', '2022-04-16 12:17:33'),
(11, 1, 'Ốp lưng in tên 03', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-31.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:17:44', '2022-04-16 12:17:44'),
(12, 1, 'Ốp lưng in tên 04', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-32.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:17:54', '2022-04-16 12:17:54'),
(13, 1, 'Ốp lưng in tên 05', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-33.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:18:03', '2022-04-16 12:18:03'),
(14, 1, 'Ốp lưng in tên 06', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-34.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:18:14', '2022-04-16 12:18:14'),
(15, 1, 'Ốp lưng in tên 07', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-35.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:18:24', '2022-04-16 12:18:24'),
(16, 1, 'Ốp lưng in tên 08', 'Tất cả dòng điện thoại', 'op-lung-dien-thoai-in-ten-36.1-510x510.jpg', 150000, 100, 0, 0, '2022-04-16 12:18:34', '2022-04-16 12:18:34');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(4) DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `image`, `address`, `phone`, `role`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$ackheHcisommlfiUOMdSR.W0JUpppg3obRZPQTSxG9v00SwDFHZ62', '87668970_182219799861707_3223210051833430016_n.jpg', 'Mỹ Tho, Tiền Giang', '0123456789', 1, NULL, NULL, '2022-04-18 11:18:39', '2022-04-18 11:18:39'),
(2, 'Đỗ Trọng Nhân', 'dotrongnhan15102000@gmail.com', '$2y$10$aO.ZKWdDGC1n17Wdk8k/xuBKYPunZT6L4CqqRhw3xjb0oacbapbSC', 'khởi nghiệp.jpg', 'QUAN 9', '0123456789', 0, NULL, NULL, '2022-04-18 11:21:52', '2022-04-18 11:21:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
