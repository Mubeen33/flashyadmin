-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2021 at 02:59 AM
-- Server version: 10.2.34-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mejensic_flashybuy`
--

-- --------------------------------------------------------

--
-- Table structure for table `appearance_settings`
--

CREATE TABLE `appearance_settings` (
  `id` int(11) NOT NULL,
  `role` varchar(10) NOT NULL,
  `action` varchar(45) NOT NULL,
  `path` varchar(500) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appearance_settings`
--

INSERT INTO `appearance_settings` (`id`, `role`, `action`, `path`, `created_at`, `updated_at`) VALUES
(4, 'site', 'admin_logo', 'http://admin.mejensi.com/appearance/images/adminlogo/test.jpg', '2021-02-18 19:40:38', '2021-02-18 19:40:38');

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('site') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'site',
  `active_mood` tinyint(1) NOT NULL DEFAULT 1,
  `live_at` timestamp NULL DEFAULT NULL,
  `preview_mode` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `type`, `active_mood`, `live_at`, `preview_mode`, `created_at`, `updated_at`) VALUES
(1, 'site', 1, NULL, 0, NULL, '2021-02-19 07:58:22');

-- --------------------------------------------------------

--
-- Table structure for table `auth_pages`
--

CREATE TABLE `auth_pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('AdminAuth','VendorAuth') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'VendorAuth',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `auth_pages`
--

INSERT INTO `auth_pages` (`id`, `type`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'VendorAuth', 'Seller Login', 'Long-in to your seller account.', 'https://admin.mejensi.com/upload-images/auth-pages/VendorAuth-600a9a6e8908b144.jpg', '2020-09-23 13:33:47', '2021-01-22 22:28:43'),
(2, 'AdminAuth', 'Admin Login', 'Secure Login to admin panel.', 'https://admin.mejensi.com/upload-images/auth-pages/AdminAuth-600a9a9b5dc5c16529.png', '2020-09-24 07:05:33', '2021-01-22 22:27:55');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Banner',
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primary_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secondary_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `secondary_start_time` timestamp NULL DEFAULT NULL,
  `secondary_end_time` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `type`, `title`, `link`, `order_no`, `primary_image`, `secondary_image`, `secondary_title`, `secondary_link`, `secondary_start_time`, `secondary_end_time`, `created_at`, `updated_at`) VALUES
(8, 'Banners_Top_Right', 'defe', NULL, '1', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f784bd929a4217044.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f784bd929b9f16673.png', NULL, NULL, '2020-10-03 21:57:00', '2020-10-31 21:58:00', '2020-09-14 07:46:07', '2020-10-03 23:00:57'),
(9, 'Banners_Top_Right', 'Test Primary Image', NULL, '2', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f784bd929a4217044.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f784cd42f28419623.png', 'Test Secondary Image', NULL, '2020-10-03 22:05:00', '2020-10-31 22:05:00', '2020-09-14 08:07:44', '2020-10-03 23:05:08'),
(11, 'Banners_Group', NULL, NULL, '1', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f78505ca910311451.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f78505ca931b14891.png', NULL, NULL, '2020-10-04 22:19:00', '2020-10-31 22:19:00', '2020-10-03 23:20:12', NULL),
(12, 'Banners_Group', NULL, NULL, '2', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f785145ef20f15703.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f785145ef40c13992.png', NULL, NULL, '2020-10-04 22:20:00', '2020-10-31 22:20:00', '2020-10-03 23:20:48', '2020-10-03 23:24:05'),
(13, 'Banners_Group', NULL, NULL, '3', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f7850e8c735316229.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f7850e8c74d51999.png', NULL, NULL, '2020-10-04 22:22:00', '2020-10-31 22:22:00', '2020-10-03 23:22:32', NULL),
(14, 'Banner_Long', NULL, NULL, '0', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f7852376109211913.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f785237612ab17494.png', NULL, NULL, '2020-10-04 22:27:00', '2020-10-31 22:28:00', '2020-10-03 23:28:07', NULL),
(15, 'Banner_Short', NULL, NULL, '0', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f7852e8b5c1f17478.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f7852e8b5d8113459.png', NULL, NULL, '2020-10-04 22:30:00', '2020-10-31 22:31:00', '2020-10-03 23:31:04', NULL),
(16, 'Banner_Box', NULL, NULL, '0', 'http://admin.mejensi.com/upload-images/banners/primary-banner-5f78537fa73d71871.png', 'http://admin.mejensi.com/upload-images/banners/secondary-banner-5f78537fa752816491.png', NULL, NULL, '2020-10-04 22:33:00', '2020-10-31 22:33:00', '2020-10-03 23:33:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` enum('Y','N','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Y',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `image`, `active`, `created_at`, `updated_at`) VALUES
(31, 'test', 'test', 'https://admin.mejensi.com/upload-images/brands/brands-5f5a7dd000ab830091.jpg', 'N', '2020-09-10 19:26:08', '2021-02-18 08:44:32'),
(32, 'etc', 'qweeqe', 'https://admin.mejensi.com/upload-images/brands/brands-5f5b5200cd42b2181.png', 'Y', '2020-09-11 09:58:26', '2020-09-11 10:31:28'),
(33, '545455', '564646585', 'https://admin.mejensi.com/upload-images/brands/brands-602e28e8aab3010131.jpg', 'Y', '2021-02-18 08:44:24', '2021-02-18 08:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title_meta_tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homepage_order` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commission` int(11) NOT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `show_on_homepage` tinyint(1) NOT NULL DEFAULT 1,
  `show_image_nav` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `slug`, `title_meta_tag`, `description`, `keywords`, `category_order`, `homepage_order`, `commission`, `visibility`, `show_on_homepage`, `show_image_nav`, `image`, `icon`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 0, 'A', 'a', 'a', 'a', 'a', '1', '1', 1, 1, 1, 1, 'http://admin.mejensi.com/upload-images/category/category-5f59f9511a66611921.jpg', 'http://admin.mejensi.com/upload-images/category/category-5f5c7669d5cbe10461.png', 0, '2020-09-10 17:00:49', '2021-02-18 23:22:08'),
(2, 0, '1111', '1111', '1111', '1111', '1111', '1', '1', 1, 1, 1, 1, 'https://admin.mejensi.com/upload-images/category/category-5f5a771348d6f85551.jpg', 'http://admin.mejensi.com/upload-images/category/category-5f5c7669d5cbe10461.png', 0, '2020-09-11 01:57:23', '2021-02-18 10:22:45'),
(3, 0, 'CAT 1', 'CAT 1', 'CAT 1', 'CAT 1', 'CAT 1', '1', '1', 10, 1, 1, 1, 'https://admin.mejensi.com/upload-images/category/category-5f5a7bd0a898e63371.png', 'http://admin.mejensi.com/upload-images/category/category-5f5c7669d5cbe10461.png', 0, '2020-09-11 02:17:36', '2021-02-18 10:22:48'),
(4, 3, 'SUB CAT-1', 'SUB CAT-1', 'SUB CAT-1', 'SUB CAT-1', 'SUB CAT-1', '1', '1', 10, 1, 1, 1, 'https://admin.mejensi.com/upload-images/category/category-5f5a7c3bad49a99021.png', 'http://admin.mejensi.com/upload-images/category/category-5f5c7669d5cbe10461.png', 0, '2020-09-11 02:19:23', '2021-02-18 10:22:50'),
(5, 0, 'Test', 'asad-asad', 'asad-asad', 'asad-asad', 'asad-asad', '5', '5', 1, 1, 1, 1, 'http://admin.mejensi.com/upload-images/category/category-5f5c7669d506b98741.jpg', 'http://admin.mejensi.com/upload-images/category/category-5f5c7669d5cbe10461.png', 0, '2020-09-12 14:19:05', '2021-02-18 10:22:53'),
(6, 4, 'Multijunction', 'asa', 'defe', 'as', 'sa', '1', '1', 10, 1, 1, 1, 'http://admin.mejensi.com/upload-images/category/category-5fa67aa50b62d95921.png', 'http://admin.mejensi.com/upload-images/category/category-5fa67aa50b82844831.png', 0, '2020-11-07 23:44:53', '2021-02-18 10:22:55'),
(7, 6, 'spirit', 'spirit', 'spirit', 'spirit', 'spirit', '1', '1', 1, 1, 1, 1, 'http://admin.mejensi.com/upload-images/category/category-5fa67b108fd8b85331.png', 'http://admin.mejensi.com/upload-images/category/category-5fa67b108ff8689631.png', 0, '2020-11-07 23:46:40', '2021-02-18 10:22:58'),
(8, 0, 'Power Link', 'dafdsds', 'sdfsdfs', NULL, NULL, '1', '1', 1, 1, 1, 1, 'https://admin.mejensi.com/upload-images/category/category-6011bf7c476af15521.png', NULL, 0, '2021-01-28 08:31:08', '2021-02-18 10:23:00'),
(9, 8, 'Solar Cable', 'dfsdfd', 'asdfsadf', NULL, 'adsfads', '1', '1', 6, 1, 1, 1, 'https://admin.mejensi.com/upload-images/category/category-6011bfd96311010741.png', NULL, 0, '2021-01-28 08:32:41', '2021-02-18 10:23:03');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(5, 'https://admin.mejensi.com/upload-images/coupons/coupon-5f5b58f4295911.jpg', 1, '2020-09-11 18:01:08', NULL),
(6, 'https://admin.mejensi.com/upload-images/coupons/coupon-5f5be5333ce6b1.png', 1, '2020-09-12 03:59:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Customer',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(33) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(33) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `identity`, `first_name`, `last_name`, `phone`, `birthday`, `gender`, `email`, `password`, `email_verified_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(11, 'Customer', 'mubeen', 'ali', NULL, NULL, NULL, 'mubeenbaig33@gmail.com', '$2y$12$wz.0Xk3/PpYeA8dgO8uCNeesakbnMRou1/vmLKR3zBx8MuAOngoBe', NULL, NULL, '2020-09-11 13:58:34', NULL),
(12, 'Customer', 'usman', 'aftab', NULL, NULL, NULL, 'adeel@multijunction.co.za', '$2y$12$wz.0Xk3/PpYeA8dgO8uCNeesakbnMRou1/vmLKR3zBx8MuAOngoBe', NULL, NULL, '2020-09-11 20:36:26', '2020-09-11 20:39:41'),
(16, 'Customer', 'adeel', 'ahsan', NULL, NULL, NULL, 'info.multijunction@gmail.com', '$2y$10$2y97OxCiuw1pcM144w4Q1.q1uX1Wc6BehVYR4yyeV2Wd3lkqnC7aa', NULL, NULL, '2021-01-22 08:44:06', NULL),
(17, 'Customer', 'zia', 'khan', NULL, NULL, NULL, 'carehosts@gmail.com', '$2y$10$rfN5t/ZGgpnYtzEhu1rt0OwpMY8/yM5Ajit7wmQlJhAse6Spf90ly', NULL, NULL, '2021-01-22 09:38:00', NULL),
(18, 'Customer', 'spirit', 'khan', NULL, NULL, NULL, 'ali12121212@gmail.com', '$2y$10$P.oRR9c8wQlsfG2viTY5.u0o86pZb6gRlnZZwakJ49oyiGHVkYuk.', NULL, NULL, '2021-01-22 20:04:28', NULL),
(19, 'Customer', 'Mudasser', 'khan', NULL, NULL, NULL, 'Mudasserkhan@gmail.com', '$2y$10$EGDe8.CjxuPowNshXpFayefmMxC7xFfjIDvFlIkHfpvZC10m8f8Zu', NULL, NULL, '2021-01-22 20:10:12', NULL),
(20, 'Customer', 'Nadeem', 'Qamar', NULL, NULL, NULL, 'naademmeasasqmmaer@gmail.com', '$2y$10$zAab3Y96qsP4z5qA4oAwweCo2wXrGN/BgKEgtUXfd3jGDWC/gPJ1a', NULL, NULL, '2021-01-22 20:16:12', NULL),
(21, 'Customer', 'Nadeem', 'Qamar', NULL, NULL, NULL, 'naademmeasasqmmaefffdr@gmail.com', '$2y$10$d81O.JrPOMf73uAAUjIXjuWuD8e5wz2S2wM/ZK/Y4dfTLGrgWP5cm', NULL, NULL, '2021-01-22 20:18:34', NULL),
(22, 'Customer', 'Nadeem', 'Qamar', NULL, NULL, NULL, 'atifiqbal201@gmail.com', '$2y$10$I3KpG1/qQ7UWAf.VqNAd5uKsFUgp5W0o/dvL6eJS/VhkA6IgcZ/QS', NULL, NULL, '2021-01-22 20:18:49', NULL),
(23, 'Customer', 'Nadeem', 'Qamar', NULL, NULL, NULL, 'atifiqbal2assaasas01@gmail.com', '$2y$10$YYbLThJS10OQfGiwJRIVs.WTi70hIamO9xCc8gioEYwnyUxszWKRO', NULL, NULL, '2021-01-22 20:22:36', NULL),
(24, 'Customer', 'Nadeem', 'Qamar', NULL, NULL, NULL, 'atifiqbal2assaasasasas01@gmail.com', '$2y$10$YBQeKzTQwU22Ck43KIaO4uk407OjcML/Pz565HNaDfiPVPEAxpkKK', NULL, NULL, '2021-01-22 20:25:33', NULL),
(25, 'Customer', 'Mudasser', 'khan', NULL, NULL, NULL, 'devsbeta@gmail.com', '$2y$10$qgnO.LXfll2F75uUCP1cteBhkftKiOhFJBnJXOMAFrm9X5Iz6OTOq', NULL, NULL, '2021-01-22 20:26:57', NULL),
(26, 'Customer', 'Adeel', 'ahsan', NULL, NULL, NULL, 'adeel@flashybuy.com', '$2y$10$7rMWUuCXWmNsYv/RvQ1yzusOj51KFZw6UK8s.IPHeb3d01keokUsC', NULL, NULL, '2021-01-22 20:32:52', NULL),
(27, 'Customer', 'adeel', 'ahsan', NULL, NULL, NULL, '1@flashybuy.com', '$2y$10$ujKTQ8vsTL7L3hFdhKa.BOlc1z8AxwQdcxuBzMyoKpnJC/S/3fA3K', NULL, NULL, '2021-01-22 20:35:33', NULL),
(29, 'Customer', 'shafeeque', 'ahmad', NULL, NULL, NULL, 'shafeeq.ahmed541@gmail.com', '$2y$10$zI6iyh70Jg4AUjwyAqlQy.XUALzS.G8I3cQCIJ/6qik9cNh7Cm9rS', NULL, NULL, '2021-03-02 06:44:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customer_addresses`
--

CREATE TABLE `customer_addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('Personal','Business','Billing','Shipping') COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `recipient_phone_no` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `building_complex` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suburb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `province` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer_addresses`
--

INSERT INTO `customer_addresses` (`id`, `customer_id`, `type`, `recipient_name`, `recipient_phone_no`, `street_address`, `business_name`, `building_complex`, `suburb`, `city_town`, `province`, `postal_code`, `created_at`, `updated_at`) VALUES
(28, 12, 'Personal', 'Ea similique rerum c', '03125698561', 'house no.11', NULL, NULL, 'Lahore', 'Lahore', 'Lahore', '54600', '2021-02-19 16:17:47', '2021-02-25 07:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `options` longtext NOT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `category_id`, `options`, `active`, `created_at`, `updated_at`) VALUES
(2, 9, '[{\"type\":\"text\",\"label\":\"Your name\"},{\"type\":\"text\",\"label\":\"Shop name\"},{\"type\":\"text\",\"label\":\"Email\"},{\"type\":\"text\",\"label\":\"License No\"},{\"type\":\"text\",\"label\":\"Full Address\"},{\"type\":\"text\",\"label\":\"Phone Number\"},{\"type\":\"file\",\"label\":\"Tax Papers\"}]', 1, '2020-09-03 06:22:20', '2020-09-03 06:22:20'),
(3, 7, '[{\"type\":\"text\",\"label\":\"Techology\"},{\"type\":\"select\",\"label\":\"4G\",\"options\":\"[\\\"Yes\\\",\\\"No\\\"]\"},{\"type\":\"multi_select\",\"label\":\"Camera\",\"options\":\"[\\\"Front 12Mp\\\",\\\"Back 16MP\\\"]\"},{\"type\":\"radio\",\"label\":\"Bluetooth\",\"options\":\"[\\\"Yes\\\",\\\"No\\\"]\"},{\"type\":\"file\",\"label\":\"Picture\",\"options\":\"[\\\"Yes\\\",\\\"No\\\"]\"}]', 1, '2020-09-03 01:44:17', '2020-09-03 01:44:17'),
(4, 3, '[{\"type\":\"text\",\"label\":\"test\"},{\"type\":\"select\",\"label\":\"x\",\"options\":\"[\\\"yes\\\",\\\"no\\\"]\"}]', 1, '2020-09-12 03:55:24', '2020-10-03 23:48:48'),
(5, 1, '[{\"type\":\"select\",\"label\":\"adf\",\"options\":\"[\\\"asdfdsfsdafs\\\"]\"}]', 1, '2020-11-18 07:51:47', '2020-11-18 07:51:47'),
(6, 3, '[{\"type\":\"select\",\"label\":\"Age Group\",\"options\":\"[\\\"1-3\\\",\\\"3-6\\\",\\\"7-9\\\"]\"}]', 1, '2021-02-05 04:54:44', '2021-02-05 04:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`id`, `vendor_id`, `product_id`, `start_date`, `end_date`, `price`, `quantity`, `status`, `created_at`, `updated_at`) VALUES
(2, 5, 4, '2020-09-03', '2020-09-03', 100, 30, 1, '2020-08-30 10:32:49', '2020-08-30 11:44:02'),
(3, 1, 4, '2020-08-31', '2020-08-12', 222, 2222, 0, '2020-08-31 00:45:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `template` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `top_banner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_line_one` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `footer_text` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `template`, `top_banner`, `text_line_one`, `button_text`, `button_link`, `text_line_two`, `facebook_url`, `twitter_url`, `linkedin_url`, `pinterest_url`, `youtube_url`, `footer_banner`, `footer_text`, `created_at`, `updated_at`) VALUES
(1, 'Customer-Signup', 'http://localhost:8000/upload-images/email-assets/banner-5f4a6cb611a0b.png', 'Test Lines Updated', 'Go Now CBC', 'Https://www.facebook12.com', 'Text Line Two Updted Rijan', NULL, NULL, NULL, NULL, NULL, 'http://localhost:8000/upload-images/email-assets/banner-5f4a6e84d9c11.jpg', 'Footer Text CC Updated', '2020-08-29 08:54:05', '2020-08-29 09:04:56'),
(2, 'Vendor-Signup', 'http://localhost:8000/upload-images/email-assets/banner-5f4a6cb611a0b.png', 'Test Lines Updated', 'Go Now CBC', 'Https://www.facebook12.com', 'Text Line Two Updted Rijan', NULL, NULL, NULL, NULL, NULL, 'http://localhost:8000/upload-images/email-assets/banner-5f4a6e84d9c11.jpg', 'Footer Text CC Updated', '2020-08-29 08:54:05', '2020-08-29 09:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `home_categories`
--

CREATE TABLE `home_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategories` varchar(1000) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `home_categories`
--

INSERT INTO `home_categories` (`id`, `category_id`, `subcategories`, `status`, `created_at`, `updated_at`) VALUES
(13, 1, '', 1, '2021-02-18 23:22:08', '2021-02-18 23:22:08');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2019_08_19_000000_create_failed_jobs_table', 1),
(10, '2020_08_06_150835_create_categories_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `order_token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `vendor_product_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `order_price` int(11) NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `grand_total` int(11) NOT NULL,
  `payment_option` enum('EFT','Debit','Visa','Master','Ozow_ipay') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('Pending','Canceled','Completed','Inprogress') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inprogress',
  `payment` enum('pending','paid','','') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `shipped` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `special_instructions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_ship_draft` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `request_waybill` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `waybill` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confirm_shippment` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `waybill_attached` enum('Yes','No') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No',
  `courier_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_box` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `product_id`, `product_name`, `product_image`, `category_id`, `order_token`, `vendor_id`, `customer_id`, `vendor_product_id`, `qty`, `product_price`, `order_price`, `address_id`, `grand_total`, `payment_option`, `status`, `payment`, `shipped`, `special_instructions`, `order_ship_draft`, `request_waybill`, `waybill`, `confirm_shippment`, `waybill_attached`, `courier_price`, `order_box`, `created_at`, `updated_at`) VALUES
(71, '974-981-983', 14, 'testtest(Green)', 'http://seller.mejensi.com/product_images/5f76f050dfbdf1_300_3355674.jpg', 5, '14-1', 1, 11, 19, 1, 399, 399, 3, 399, 'EFT', 'Inprogress', 'paid', NULL, 'uzair was a lovely guest. He was friendly, clean and respectful of my apartment. I would welcome him back any time and highly recommend him as a guest.', 'Yes', 'Yes', NULL, 'No', 'No', NULL, NULL, '2020-10-12 19:20:11', '2021-01-05 18:54:22'),
(72, '478-945-234', 13, 'defe(gt-lg)', 'https://seller.mejensi.com/product_images/5f625a304904e1_300_product-34.png', 4, '13-1', 1, 12, 28, 1, 445, 445, 0, 645, 'EFT', 'Inprogress', 'paid', NULL, 'uzair was a lovely guest. He was friendly, clean and respectful of my apartment. I would welcome him back any time and highly recommend him as a guest.', 'Yes', 'Yes', 'http://admin.mejensi.com/order-waybill/1602787202.pdf', 'Yes', 'Yes', NULL, NULL, '2020-10-13 08:23:52', '2020-10-16 07:40:02'),
(73, '478-945-234', 13, 'defe(red-lg)', 'https://seller.mejensi.com/product_images/5f625a3033f691_300_22-100x100.png', 4, '13-1', 1, 12, 26, 1, 200, 200, 0, 645, 'EFT', 'Inprogress', 'paid', NULL, 'uzair was a lovely guest. He was friendly, clean and respectful of my apartment. I would welcome him back any time and highly recommend him as a guest.', 'Yes', 'Yes', 'http://admin.mejensi.com/order-waybill/1602787202.pdf', 'Yes', 'Yes', NULL, NULL, '2020-10-13 08:23:52', '2020-10-16 07:40:02'),
(74, '649-280-964', 13, 'defe(red-sm)', 'https://seller.mejensi.com/product_images/5f625a303ee171_300_home-v4-banner-2.jpg', 4, '13-1', 1, 12, 27, 1, 55, 55, 0, 55, 'EFT', 'Inprogress', 'paid', NULL, NULL, 'No', 'No', NULL, 'No', 'No', NULL, NULL, '2021-01-21 20:31:58', '2021-01-21 20:32:45'),
(75, '538-620-175', 11, 'test product 3', 'http://seller.mejensi.com/product_images/5f5ca00bc44461.JPG', 3, '11-1', 1, 27, 16, 1, 2450, 2450, 0, 2450, 'EFT', 'Inprogress', 'paid', NULL, NULL, 'No', 'No', NULL, 'No', 'No', NULL, NULL, '2021-01-22 20:54:36', '2021-01-22 20:54:47'),
(76, '506-706-236', 10, 'test2', 'http://seller.mejensi.com/product_images/5f5ca00bc44461.JPG', 3, '10-1', 1, 12, 15, 1, 200, 200, 5, 200, 'EFT', 'Inprogress', 'paid', NULL, NULL, 'No', 'No', NULL, 'No', 'No', NULL, NULL, '2021-01-22 22:50:26', '2021-01-22 22:51:10'),
(77, '563-274-919', 10, 'test2', 'http://seller.mejensi.com/product_images/5f5ca00bc44461.JPG', 3, '10-1', 1, 12, 15, 1, 200, 200, 5, 200, 'EFT', 'Inprogress', 'paid', NULL, NULL, 'Yes', 'Yes', NULL, 'No', 'No', NULL, NULL, '2021-01-28 23:53:42', '2021-02-13 12:25:43'),
(78, '271-187-921', 14, 'testtest(Green)', 'http://seller.mejensi.com/product_images/5f76f050dfbdf1_300_3355674.jpg', 5, '14-1', 1, 12, 19, 3, 399, 1197, 28, 1464, 'EFT', 'Inprogress', 'pending', NULL, NULL, 'No', 'No', NULL, 'No', 'No', NULL, NULL, '2021-03-02 03:14:37', '2021-03-02 03:14:37');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_title` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `keywords` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `page_type` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  `visibility` int(1) NOT NULL DEFAULT 1,
  `position` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `slug`, `content`, `meta_title`, `meta_description`, `keywords`, `meta_image`, `page_type`, `visibility`, `position`, `created_at`, `updated_at`) VALUES
(1, 'Hello Example', 'wwwhelloexamplecom', '<p><br></p><strong>My baby&nbsp;<p><u></u></p></strong><p><u>asdf asdf</u></p><p><u></u></p>', 'example', 'asdf', 'asdf', NULL, 'Q', 1, 2, '2021-01-17 18:57:32', '2021-01-20 15:36:29'),
(2, 'My World', 'myworldcom', '<p>Can you be my friend</p><p><strong>Hello All</strong><br></p>', 'myworld', 'myworld', 'myworld', NULL, 'Q', 1, 3, '2021-01-18 07:46:14', '2021-01-20 15:41:28'),
(3, 'Dancers', 'helpme', '<strong>Can you please take a visit to help other.</strong>', 'helpus', 'meta_description', 'helpus', NULL, 'Q', 1, 1, '2021-01-18 13:55:04', '2021-01-22 12:00:17'),
(4, 'Take away', 'takeawaythis', '<u>Foodie person can take away the food with him</u>', 'takeaway', 'meta_description', 'takeaway', NULL, 'Q', 1, 0, '2021-01-18 13:57:47', '2021-02-25 00:02:52'),
(5, 'asdf', 'fasdaffas', 'asdf', 'asdf', 'asdf', 'asdf', NULL, 'Q', 1, 4, '2021-01-18 14:00:42', '2021-01-20 15:41:29'),
(6, 'My first Company', 'new-company', '<em><u><strong>Say something</strong></u></em>', 'takeaway', 'meta_description', 'takeaway', NULL, 'C', 1, 1, '2021-01-18 14:31:56', '2021-01-19 16:01:29'),
(7, 'HomeAlone', 'homealone', 'homealone', 'helpus', 'helpus', 'myworld', NULL, 'C', 1, 0, '2021-01-18 14:34:28', '2021-01-20 09:16:33'),
(10, 'Policies', 'policy', '<ul><li><strong>Say something here</strong></li><li><strong>All Content</strong></li></ul>', 'policy', 'policy', 'policy', 'uploads/custom-pages/php6imEl8', 'B', 1, 1, '2021-02-12 00:12:50', '2021-02-12 00:12:50'),
(11, 'defe', 'httpmejensicom', 'CZxsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'asdf', 'asdffff', 'dfsaaaaaaaaa', 'uploads/custom-pages/phpSR7Lpv', 'B', 1, 2, '2021-02-15 18:45:26', '2021-02-15 18:45:26');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`, `updated_at`) VALUES
('mubeenbaig33@gmail.com', '5f7a3201caf8e', '2020-10-05 09:35:13', '2020-10-05 09:35:13'),
('adeel@multijunction.co.za', '5f7a3129d3f26', '2020-10-05 09:31:37', '2020-10-05 09:31:37');

-- --------------------------------------------------------

--
-- Table structure for table `popups`
--

CREATE TABLE `popups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_background` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `popup_background_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `url_list` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popups`
--

INSERT INTO `popups` (`id`, `name`, `title`, `description`, `button_text`, `button_background`, `button_text_color`, `button_link`, `popup_background_image`, `start_time`, `end_time`, `url_list`, `created_at`, `updated_at`) VALUES
(1, 'Home', 'Get 25% Discount', 'This content for you...', 'Buy NOw', '#000000', '#ffffff', NULL, 'http://localhost:8000/upload-images/popup/popup-bg-5f512ded22930.png', '2020-10-03', '2020-10-09', 'http://mejensi.com##,\r\nhttp://mejensi.com/become-a-vendor', '2020-09-03 11:02:17', '2020-10-03 23:56:55'),
(2, 'Vendor Dashboard - Vendor Profile Page Popup', 'This is vendor Dashboard & Vendor Profile Page Popup', 'This is simple text description', 'Go On', '#450778', '#f5fffd', NULL, 'http://localhost:8000/upload-images/popup/popup-bg-5f54e3bc0fbcd.png', '2020-09-05', '2020-09-22', 'http://localhost:8000/vendor/dashboard##, http://localhost:8000/vendor/profile##,', '2020-09-05 05:34:59', '2020-09-06 13:56:52'),
(3, 'Vendor Registration Page', 'Vendor Registration Popup Title', 'Vendor Registration Popup Description', 'Learn More', '#c90808', '#fffafa', NULL, 'http://localhost:8000/upload-images/popup/popup-bg-5f54e54a45681.png', '2020-09-06', '2020-09-30', 'http://localhost:8000/vendor-registration', '2020-09-06 07:34:02', NULL),
(4, 'dsfasdfdsa', 'adsfadsf', 'adsfasdf', NULL, '#000000', '#000000', NULL, 'https://admin.mejensi.com/upload-images/popup/popup-bg-5f5be4dfe0d1f1.png', '2020-10-03', '2020-10-10', 'http://mejensi.com/', '2020-09-12 03:58:07', '2020-10-03 23:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `submission_id` varchar(255) NOT NULL,
  `tsnid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `whats_in_box` varchar(255) NOT NULL,
  `weight` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `made_by` varchar(255) DEFAULT NULL,
  `what_is_it` varchar(255) DEFAULT NULL,
  `made_date` varchar(255) DEFAULT NULL,
  `renewal` varchar(255) DEFAULT NULL,
  `product_type` varchar(255) DEFAULT NULL,
  `width` varchar(255) DEFAULT NULL,
  `hieght` varchar(255) DEFAULT NULL,
  `length` varchar(255) DEFAULT NULL,
  `warranty` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `video_link` varchar(255) DEFAULT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `rejected` tinyint(1) NOT NULL DEFAULT 0,
  `disable` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `submission_id`, `tsnid`, `title`, `brand_id`, `slug`, `category_id`, `description`, `whats_in_box`, `weight`, `image_id`, `made_by`, `what_is_it`, `made_date`, `renewal`, `product_type`, `width`, `hieght`, `length`, `warranty`, `sku`, `video_link`, `approved`, `rejected`, `disable`, `created_at`, `updated_at`) VALUES
(9, 5, '', 17127806, 'sd', 0, 'sd-test', '3', 'saddddddddddddddassasdasdadasdaczcsdsdczcxcsdzcxzxcvvbvddffsdzzxcdssdvcxvs', '', 0, 133219088, 'I did', 'A finished product', '2020 - 2020', 'auto', 'digital', NULL, NULL, NULL, NULL, 'pk-test', 'assssssssssssss.com', 1, 0, 0, '2020-09-12 17:17:39', '2020-10-01 11:40:33'),
(10, 1, '', 17127806, 'test2', 0, 'test-2', '3', 'saddddddddddddddassasdasdadasdaczcsdsdczcxcsdzcxzxcvvbvddffsdzzxcdssdvcxvs', '', 0, 133219088, 'I did', 'A finished product', '2020 - 2020', 'auto', 'digital', NULL, NULL, NULL, NULL, 'pk-test', 'assssssssssssss.com', 1, 0, 0, '2020-09-12 17:17:39', '2020-09-14 05:40:32'),
(11, 1, '', 17127806, 'test product 3', 0, 'test-prdocut', '3', 'saddddddddddddddassasdasdadasdaczcsdsdczcxcsdzcxzxcvvbvddffsdzzxcdssdvcxvs', '', 0, 133219088, 'I did', 'A finished product', '2020 - 2020', 'auto', 'digital', NULL, NULL, NULL, NULL, 'pk-test', 'assssssssssssss.com', 1, 0, 0, '2020-09-12 17:17:39', '2021-02-11 10:41:23'),
(12, 1, '', 319168403, 'defe', 0, 'defe', '4', 'saxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx', '', 0, 67919318, NULL, NULL, NULL, NULL, 'physical', NULL, NULL, NULL, NULL, 'asd', 'c.com', 0, 0, 0, '2020-09-17 01:20:12', '2020-09-17 01:20:12'),
(13, 1, '', 494286174, 'defe', 0, 'defe-defe', '4', 'aaaassssssssssssssssssaaaaaaaaaaaaaaaaaaaaaaaaaaa', '', 0, 262578535, NULL, NULL, NULL, NULL, 'physical', NULL, NULL, NULL, NULL, 'asd', 'as', 1, 0, 0, '2020-09-17 01:32:16', '2020-10-03 11:11:36'),
(14, 1, '', 371523944, 'testtest', 0, 'testtest', '5', 'adsfasd as dfasdf asd asdf', '', 0, 202615884, NULL, NULL, NULL, NULL, 'physical', '20', '20', '20', NULL, '3652145874444', 'asdfasd', 1, 0, 0, '2020-10-02 16:18:07', '2020-10-02 11:31:57'),
(15, 1, '', 41072394, 'defe', 0, 'defe', '3', '<p>fdgsssssssss</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-23 12:53:10', '2021-01-23 12:53:22'),
(16, 1, '', 519652171, 'hello product', 0, 'hello-product', '3', '<p>asdf asdf asdfasdfsadfadsfsa</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-24 01:27:30', '2021-01-24 01:31:42'),
(17, 1, '', 21109994, 'dfgsdfgdsfg', 0, 'dfgsdfgdsfg', '3', '<p>dg dfgdfg dfgdg dfgfdgdfg</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-24 01:32:18', '2021-01-24 01:33:14'),
(18, 1, '', 404378168, 'sdfasfdasfs', 0, 'sdfasfdasfs', '1', '<p>gdfgdf fdgdgdfgfd</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-24 01:35:25', '2021-01-24 01:35:39'),
(19, 1, '', 649657148, 'gfdgdfgdf', 0, 'gfdgdfgdf', '2', '<p>cbcvbcv</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-24 17:44:40', '2021-01-24 17:44:46'),
(20, 1, '', 132246727, 'asdfsadfsdf', 0, 'asdfsadfsdf', '1', '<p>dfdfgfdg</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-25 01:17:08', '2021-01-25 01:17:26'),
(21, 1, '', 742324796, 'sdfsdfs', 0, 'sdfsdfs', '3', '<p>xcvzczxvcv</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-28 16:46:25', '2021-01-28 16:47:02'),
(22, 1, '', 158592604, 'xvc', 0, 'xvc', '3', '<p>sdffffffffffffff</p>', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-01-28 18:03:08', '2021-01-28 18:03:19'),
(23, 1, '', 680433392, 'test', 0, 'test', '3', '', '', 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-01 19:43:53', '2021-02-01 19:48:23'),
(24, 1, '', 530442854, 'ewwwwwwwwww', 0, 'ewwwwwwwwww-A4C403-02-2021', '8', '<p><span style=\"font-family: impact, chicago;\">zxcccccccccccccccccccccccccc<strong>ccccccccccccccccccccccccccccccccccccc<span style=\"color: #e03e2d;\">ccccccccccccccccccccccczxcczxzxzx</span></strong></span></p>', '', 0, 431215925, NULL, NULL, NULL, NULL, NULL, '2', '3', '3', NULL, '6917190581643', NULL, 0, 0, 0, '2021-02-03 18:16:24', '2021-02-03 18:20:47'),
(25, 1, '', 684060246, '564654jhgfjhg', 0, '564654jhgfjhg-C75C03-02-2021', '3', '<p>jhgfjhkgf kjh gjjkh gkjg</p>', '', 0, 713754979, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-03 18:19:18', '2021-02-03 18:19:29'),
(26, 1, '', 178344869, 'sdfgsdfg fsd sd', 0, 'sdfgsdfg-fsd-sd-BE1603-02-2021', '2', '<p>sdf asfasd sad</p>', '', 0, 139062720, NULL, NULL, NULL, NULL, NULL, '40', '20', '50', NULL, '3652145874444', NULL, 0, 0, 0, '2021-02-03 18:25:14', '2021-02-03 18:27:34'),
(27, 1, '', 71900341, 'sdfdsdf ds f', 0, 'sdfdsdf-ds-f-EC2B04-02-2021', '3', '', '', 0, 724857170, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-04 22:55:32', '2021-02-04 22:55:32'),
(28, 1, '', 26030755, 'Happy New year Deal', 31, 'happy-new-year-deal-AD4205-02-2021', '1', '', '', 0, 121325746, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-05 13:17:10', '2021-02-05 13:17:10'),
(29, 1, '', 101988065, 'Test product', 31, 'test-product-1AC405-02-2021', '3', '', '', 0, 583860464, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-05 19:13:58', '2021-02-05 19:13:58'),
(31, 1, '', 368613035, 'fasdf sadf', 31, 'fasdf-sadf-FC9405-02-2021', '2', '<p>adsf dsa fsdafdfdsf asfsd</p>', 'adsfasd fasdfasf sad fds', 0, 350396431, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-05 19:21:56', '2021-02-05 19:22:08'),
(32, 1, '', 849993161, 'asdfsad assadfdsa', 31, 'asdfsad-assadfdsa-2E7205-02-2021', '2', '<p>asdfadsf</p>', 'asdfasdf dsaf', 0, 839930905, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-05 20:47:41', '2021-02-05 20:48:54'),
(33, 1, '', 553345777, 'adsfasfdsadf sadf af', 31, 'adsfasfdsadf-sadf-af-EFB405-02-2021', '1', '<p>asdf adsf sa</p>', 'asd fsadf', 9, 460769563, NULL, NULL, NULL, NULL, NULL, '9', '9', '9', NULL, NULL, NULL, 0, 0, 0, '2021-02-05 20:53:03', '2021-02-05 20:53:42'),
(34, 1, '', 540909774, 'Happy New year Deal', 31, 'happy-new-year-deal-A24F05-02-2021', '2', '<p>hghghjhjhjjk</p>', 'bvbvbvbvbnbvbv', 8, 723280290, NULL, NULL, NULL, NULL, NULL, '6', '3', '3', NULL, '6917190581643', NULL, 0, 0, 0, '2021-02-06 00:34:00', '2021-02-06 00:39:51'),
(35, 1, '', 443460695, 'Happy New year Deal', 31, 'happy-new-year-deal-E6A008-02-2021', '8', '<p>dfvggggggggggggggggggggggggggggggggg</p>', 'dfggggggggggggggggggggggggggggggggg', 0, 303166592, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-08 15:19:01', '2021-02-08 15:19:16'),
(36, 1, '', 0, 'happy new year', 31, 'happy-new-year-083D10-02-2021', '3', '<p>sdfcgvhjnkm,cvbn m,./</p>', 'segjhkl;,', 9, 488811665, NULL, NULL, NULL, NULL, NULL, '56', '56', '45', NULL, 'fdggggggggggg', NULL, 0, 0, 0, '2021-02-10 13:41:43', '2021-02-11 11:25:37'),
(37, 1, '', 0, 'fsddfdfdfsdf', 31, 'fsddfdfdfsdf-6F9211-02-2021', '3', '<p>sddddddddddddddddddddddddddddddddd</p>', 'sdddddddddddddddddddd', 4, 554383474, NULL, NULL, NULL, NULL, NULL, '45', '43', '32', NULL, 'dfdfdf', NULL, 0, 0, 0, '2021-02-11 14:04:51', '2021-02-11 11:25:42'),
(38, 1, '', 0, 'afdssdfdfdffd', 31, 'afdssdfdfdffd-55FA13-02-2021', '0', '', '', 34, 499246522, NULL, NULL, NULL, NULL, NULL, '34', '34', '34', NULL, 'dsfdfss', NULL, 0, 0, 0, '2021-02-13 12:23:47', '2021-02-13 12:24:41'),
(39, 1, '', 0, 'erdgfretdfg', 32, 'erdgfretdfg-F5E720-02-2021', '0', '', '', 0, 423199316, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, 0, '2021-02-20 18:19:22', '2021-02-20 18:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `products_warranties`
--

CREATE TABLE `products_warranties` (
  `id` bigint(20) NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `warranty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_warranties`
--

INSERT INTO `products_warranties` (`id`, `category_id`, `warranty`, `created_at`, `updated_at`) VALUES
(3, 4, '6month,1year', '2020-09-20 09:42:35', '2020-09-20 11:44:28');

-- --------------------------------------------------------

--
-- Table structure for table `product_customfields`
--

CREATE TABLE `product_customfields` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customfields` longtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_customfields`
--

INSERT INTO `product_customfields` (`id`, `product_id`, `customfields`, `created_at`, `updated_at`) VALUES
(2, 9, '[{\"type\":\"text\",\"label\":\"test\",\"value\":\"ads\"},{\"type\":\"select\",\"label\":\"x\",\"value\":\"yes\"}]', '2020-09-12 17:17:39', '2020-09-12 17:17:39');

-- --------------------------------------------------------

--
-- Table structure for table `product_media`
--

CREATE TABLE `product_media` (
  `id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_media`
--

INSERT INTO `product_media` (`id`, `image_id`, `image`, `created_at`, `updated_at`) VALUES
(68, 8467795, 'http://seller.mejensi.com/product_images/5f5c9d19ca7991.JPG', '2020-09-12 17:04:09', '2020-09-12 17:04:09'),
(69, 8467795, 'http://seller.mejensi.com/product_images/5f5c9d1ab21f81.JPG', '2020-09-12 17:04:10', '2020-09-12 17:04:10'),
(70, 8467795, 'http://seller.mejensi.com/product_images/5f5c9d1c06f6b1.JPG', '2020-09-12 17:04:12', '2020-09-12 17:04:12'),
(71, 133219088, 'http://seller.mejensi.com/product_images/5f5ca00bc44461.JPG', '2020-09-12 17:16:43', '2020-09-12 17:16:43'),
(72, 133219088, 'http://seller.mejensi.com/product_images/5f5ca00d3652c1.JPG', '2020-09-12 17:16:45', '2020-09-12 17:16:45'),
(73, 133219088, 'http://seller.mejensi.com/product_images/5f5ca011036ce1.JPG', '2020-09-12 17:16:49', '2020-09-12 17:16:49'),
(74, 458258675, 'http://seller.mejensi.com/product_images/5f5e2e4f48e871458258675_300_1555519098_7-01.jpg', '2020-09-13 21:36:03', '2020-09-13 21:36:03'),
(75, 458258675, 'http://seller.mejensi.com/product_images/5f5e2e5438e1e1458258675_300_Untitled-4.gif', '2020-09-13 21:36:04', '2020-09-13 21:36:04'),
(76, 67919318, 'https://seller.mejensi.com/product_images/5f6256ebc1276167919318_300_Untitled-1-01.jpg', '2020-09-17 01:18:24', '2020-09-17 01:18:24'),
(77, 738672416, 'https://seller.mejensi.com/product_images/5f625790aa4401738672416_300_22-100x100.png', '2020-09-17 01:21:04', '2020-09-17 01:21:04'),
(78, 738672416, 'https://seller.mejensi.com/product_images/5f625795b0f991738672416_300_1-2.jpg', '2020-09-17 01:21:09', '2020-09-17 01:21:09'),
(79, 262578535, 'https://seller.mejensi.com/product_images/5f6259ad64b161262578535_300_1-2.jpg', '2020-09-17 01:30:05', '2020-09-17 01:30:05'),
(80, 487702272, 'http://seller.mejensi.com/product_images/5f6c34c98b77c1487702272_300_vertical-box-mockup-01.png', '2020-09-24 12:55:24', '2020-09-24 12:55:24'),
(81, 487702272, 'http://seller.mejensi.com/product_images/5f6c35095651b1487702272_300_vertical-box-mockup-01.png', '2020-09-24 12:56:26', '2020-09-24 12:56:26'),
(82, 487702272, 'http://seller.mejensi.com/product_images/5f6c355fdede31487702272_300_MockUp_1.png', '2020-09-24 12:57:53', '2020-09-24 12:57:53'),
(83, 487702272, 'http://seller.mejensi.com/product_images/5f6c356a342271487702272_300_vertical-box-mockup-01.png', '2020-09-24 12:58:03', '2020-09-24 12:58:03'),
(84, 202615884, 'http://seller.mejensi.com/product_images/5f76e3530cca71202615884_300_2020-09-11_15-42-12.jpg', '2020-10-02 15:22:45', '2020-10-02 15:22:45'),
(85, 202615884, 'http://seller.mejensi.com/product_images/5f76e363d3d1b1202615884_300_2fba308c0b4328c23af593a461f92d14_700x700.jpg', '2020-10-02 15:23:01', '2020-10-02 15:23:01'),
(86, 200746443, 'http://seller.mejensi.com/product_images/5f786369c192a1200746443_300_379.png', '2020-10-03 18:41:32', '2020-10-03 18:41:32'),
(87, 174675255, 'http://seller.mejensi.com/product_images/5fa2683415f6d1174675255_300_1589455602-7727.png', '2020-11-04 15:37:09', '2020-11-04 15:37:09'),
(88, 299605741, 'http://seller.mejensi.com/product_images/5fa3fb4918e5d1299605741_300_TvoWhDXPGX4zq6vNWZgSsVeh0BagOrZZUQswvOIe.jpeg', '2020-11-05 20:16:57', '2020-11-05 20:16:57'),
(89, 233819795, 'http://seller.mejensi.com/product_images/5fa44ece27aa81233819795_300_happy-woman-P6G8JPW.jpg', '2020-11-06 02:13:19', '2020-11-06 02:13:19'),
(90, 374040232, 'http://seller.mejensi.com/product_images/5face770707a31374040232_300_Untitled-2ddd.png', '2020-11-12 14:42:41', '2020-11-12 14:42:41'),
(91, 125933050, 'http://seller.mejensi.com/product_images/5fb41c2a7f3261125933050_300_hilal-cupkake-chocolate-12x25gms-gomart-pakistan-1834-420x420.jpg', '2020-11-18 01:53:32', '2020-11-18 01:53:32'),
(92, 125933050, 'http://seller.mejensi.com/product_images/5fb41c2d6f73e1125933050_300_ashrafi-fine-atta-5kg-gomart-pakistan-1707-420x420.jpg', '2020-11-18 01:53:33', '2020-11-18 01:53:33'),
(93, 125933050, 'http://seller.mejensi.com/product_images/5fb41c3caf6fe1125933050_300_1386625.png', '2020-11-18 01:53:48', '2020-11-18 01:53:48'),
(94, 125933050, 'http://seller.mejensi.com/product_images/5fb41c3c970a71125933050_300_happy-woman-P6G8JPW.jpg', '2020-11-18 01:53:49', '2020-11-18 01:53:49'),
(95, 387608501, 'http://seller.mejensi.com/product_images/5fb6d6e58a3db1387608501_300_dalda-banaspati-ghee-tin-2-5kg-gomart-pakistan-453-420x420.png', '2020-11-20 03:34:45', '2020-11-20 03:34:45'),
(96, 387608501, 'http://seller.mejensi.com/product_images/5fb6d6f20bae91387608501_300_happy-woman-P6G8JPW.jpg', '2020-11-20 03:34:59', '2020-11-20 03:34:59'),
(97, 731823463, 'http://seller.mejensi.com/product_images/5ff2065fafdcc1731823463_300_Untitled-1.png', '2021-01-04 01:01:05', '2021-01-04 01:01:05'),
(98, 731823463, 'http://seller.mejensi.com/product_images/5ff20665353071731823463_300_Untitled-1 (1).png', '2021-01-04 01:01:09', '2021-01-04 01:01:09'),
(99, 130415046, 'http://seller.mejensi.com/product_images/5ff44cd26308c1130415046_300_Inked-LnRJbnUtW6o_cJ8COBr_LI.jpg', '2021-01-05 18:26:12', '2021-01-05 18:26:12'),
(100, 130415046, 'http://seller.mejensi.com/product_images/5ff44cdcb4e7a1130415046_300_new_gifss.gif', '2021-01-05 18:26:20', '2021-01-05 18:26:20'),
(101, 745072126, 'http://seller.mejensi.com/product_images/5ff575d97d40f1745072126_300_Inked-LnRJbnUtW6o_cJ8COBr_LI.jpg', '2021-01-06 15:33:31', '2021-01-06 15:33:31'),
(102, 745072126, 'http://seller.mejensi.com/product_images/5ff575f02ac2d1745072126_300_new_gifss.gif', '2021-01-06 15:33:52', '2021-01-06 15:33:52'),
(103, 745072126, 'http://seller.mejensi.com/product_images/5ff5767befaec1745072126_300_400-In-1 SUP Portable Retro Video Game.jpg', '2021-01-06 15:36:12', '2021-01-06 15:36:12'),
(104, 625021709, 'http://seller.mejensi.com/product_images/600490eca34dc1625021709_300_www.YTS.LT.jpg', '2021-01-18 02:33:00', '2021-01-18 02:33:00'),
(105, 625021709, 'http://seller.mejensi.com/product_images/600490f4dbde41625021709_300_Untitled-23.png', '2021-01-18 02:33:08', '2021-01-18 02:33:08'),
(106, 115275345, 'http://seller.mejensi.com/product_images/6005627b9fe811115275345_300_71e+wUzvy8L._SL1048_.jpg', '2021-01-18 17:27:08', '2021-01-18 17:27:08'),
(107, 115275345, 'http://seller.mejensi.com/product_images/6005627f64e721115275345_300_strap face mask with filter.jpg', '2021-01-18 17:27:11', '2021-01-18 17:27:11'),
(108, 115275345, 'http://seller.mejensi.com/product_images/6005628a2f4141115275345_300_Inked-LnRJbnUtW6o_cJ8COBr_LI.jpg', '2021-01-18 17:27:22', '2021-01-18 17:27:22'),
(109, 115275345, 'http://seller.mejensi.com/product_images/6005629d012de1115275345_300_christmas-boxes-background-with-copy-black-friday-boxing-day.jpg', '2021-01-18 17:27:58', '2021-01-18 17:27:58'),
(110, 24, 'http://seller.mejensi.comproduct_images/product_24/601a873d2ef9e124image_2021_01_23T11_29_02_290Z.png', '2021-02-03 18:21:33', '2021-02-03 18:21:33'),
(111, 24, 'http://seller.mejensi.comproduct_images/product_24/601a873e6e76b124image_2021_01_23T11_29_02_290Z.png', '2021-02-03 18:21:34', '2021-02-03 18:21:34'),
(112, 24, 'http://seller.mejensi.comproduct_images/product_24/601a874ce5909124web1.jpg', '2021-02-03 18:21:49', '2021-02-03 18:21:49'),
(113, 26, 'http://seller.mejensi.comproduct_images/product_26/601a88c2379e61262021-01-21_14-54-40.jpg', '2021-02-03 18:28:02', '2021-02-03 18:28:02'),
(114, 26, 'http://seller.mejensi.comproduct_images/product_26/601a88c9a8c041262021-01-21_14-54-40.jpg', '2021-02-03 18:28:09', '2021-02-03 18:28:09'),
(115, 26, 'http://seller.mejensi.comproduct_images/product_26/601a88d09a9961263150 Arcade Games 2 Player (1).jpg', '2021-02-03 18:28:16', '2021-02-03 18:28:16'),
(116, 26, 'http://seller.mejensi.comproduct_images/product_26/601a88d39cf3d126Copy of games.jpg', '2021-02-03 18:28:19', '2021-02-03 18:28:19'),
(117, 26, 'http://seller.mejensi.comproduct_images/product_26/601a88deb6638126woman-feet-hoveboard.jpg', '2021-02-03 18:28:32', '2021-02-03 18:28:32'),
(118, 34, 'http://seller.mejensi.comproduct_images/product_34/601d82f7211e6134juicer.png', '2021-02-06 00:40:09', '2021-02-06 00:40:09'),
(119, 36, 'http://seller.mejensi.comproduct_images/product_36/60238050dc1251363.png', '2021-02-10 13:42:28', '2021-02-10 13:42:28'),
(120, 36, 'http://seller.mejensi.comproduct_images/product_36/6023805316b761361.png', '2021-02-10 13:42:28', '2021-02-10 13:42:28'),
(121, 36, 'http://seller.mejensi.comproduct_images/product_36/60238071d57fa1366.png', '2021-02-10 13:42:59', '2021-02-10 13:42:59'),
(122, 36, 'http://seller.mejensi.comproduct_images/product_36/6023807f036001366.png', '2021-02-10 13:43:12', '2021-02-10 13:43:12'),
(123, 36, 'http://seller.mejensi.comproduct_images/product_36/60238083959ba1366.png', '2021-02-10 13:43:16', '2021-02-10 13:43:16'),
(124, 37, 'http://seller.mejensi.comproduct_images/product_37/6024d73191a2b1373.png', '2021-02-11 14:05:24', '2021-02-11 14:05:24'),
(125, 37, 'http://seller.mejensi.comproduct_images/product_37/6024d733e75d01371.png', '2021-02-11 14:05:25', '2021-02-11 14:05:25'),
(126, 37, 'http://seller.mejensi.comproduct_images/product_37/6024d73c159f81375.png', '2021-02-11 14:05:33', '2021-02-11 14:05:33'),
(127, 37, 'http://seller.mejensi.comproduct_images/product_37/6024d75298f501376.png', '2021-02-11 14:05:55', '2021-02-11 14:05:55'),
(128, 37, 'http://seller.mejensi.comproduct_images/product_37/6024d75f732761376.png', '2021-02-11 14:06:08', '2021-02-11 14:06:08'),
(129, 38, 'http://seller.mejensi.comproduct_images/product_38/602762736d9571381.png', '2021-02-13 12:24:04', '2021-02-13 12:24:04'),
(130, 38, 'http://seller.mejensi.comproduct_images/product_38/6027627ab7ac8138SAREE Logo-01.jpg', '2021-02-13 12:24:11', '2021-02-13 12:24:11'),
(131, 38, 'http://seller.mejensi.comproduct_images/product_38/602762820f6ff138flashdeals fb logo-01-01-01.png', '2021-02-13 12:24:19', '2021-02-13 12:24:19'),
(132, 38, 'http://seller.mejensi.comproduct_images/product_38/602762898c984138SAREE Logo-01.jpg', '2021-02-13 12:24:26', '2021-02-13 12:24:26'),
(133, 39, 'http://seller.mejensi.comproduct_images/product_39/6030f054d0b34139processed.jpeg', '2021-02-20 18:19:49', '2021-02-20 18:19:49');

-- --------------------------------------------------------

--
-- Table structure for table `product_other_categories`
--

CREATE TABLE `product_other_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `other_categories` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`other_categories`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_other_categories`
--

INSERT INTO `product_other_categories` (`id`, `product_id`, `other_categories`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '2020-09-22 12:04:14', '2020-09-22 13:04:30'),
(2, 14, '[\"3\"]', '2020-10-02 22:39:19', '2020-10-02 22:42:12'),
(3, 13, '[\"2\",\"4\"]', '2020-10-03 23:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_reviews`
--

CREATE TABLE `product_reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `star` tinyint(4) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_variations`
--

CREATE TABLE `product_variations` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `first_variation_name` varchar(255) NOT NULL,
  `first_variation_value` varchar(255) NOT NULL,
  `second_variation_name` varchar(255) DEFAULT NULL,
  `second_variation_value` varchar(255) DEFAULT NULL,
  `sku` varchar(255) DEFAULT NULL,
  `variant_image` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_variations`
--

INSERT INTO `product_variations` (`id`, `product_id`, `first_variation_name`, `first_variation_value`, `second_variation_name`, `second_variation_value`, `sku`, `variant_image`, `active`, `created_at`, `updated_at`) VALUES
(17, 12, 'Colors', 'red', 'Size', 'l', '-red-l', 'https://seller.mejensi.com/product_images/5f62575c5a2ab1_300_bottle (1).png', 0, '2020-09-17 01:20:12', '2020-09-17 01:20:12'),
(18, 12, 'Colors', 'red', 'Size', 's', '-red-s', 'https://seller.mejensi.com/product_images/5f62575c8288c1_300_image_24157_original_X_450_white.jpg', 0, '2020-09-17 01:20:12', '2020-09-17 01:20:12'),
(19, 12, 'Colors', 'blue', 'Size', 'l', '-blue-l', 'https://seller.mejensi.com/product_images/5f62575c8f0971_300_bottle.png', 0, '2020-09-17 01:20:12', '2020-09-17 01:20:12'),
(20, 12, 'Colors', 'blue', 'Size', 's', '-blue-s', 'https://seller.mejensi.com/product_images/5f62575cb16091_300_6-100x100.png', 0, '2020-09-17 01:20:12', '2020-09-17 01:20:12'),
(21, 13, 'Colors', 'red', 'Size', 'lg', 'red-lg', 'https://seller.mejensi.com/product_images/5f625a3033f691_300_22-100x100.png', 1, '2020-09-17 01:32:16', '2020-10-03 23:59:53'),
(22, 13, 'Colors', 'red', 'Size', 'sm', 'red-sm', 'https://seller.mejensi.com/product_images/5f625a303ee171_300_home-v4-banner-2.jpg', 1, '2020-09-17 01:32:16', '2020-10-03 23:59:53'),
(23, 13, 'Colors', 'gt', 'Size', 'lg', 'gt-lg', 'https://seller.mejensi.com/product_images/5f625a304904e1_300_product-34.png', 1, '2020-09-17 01:32:16', '2020-10-03 23:59:53'),
(24, 13, 'Colors', 'gt', 'Size', 'sm', 'gt-sm', 'https://seller.mejensi.com/product_images/5f625a3064b0a1_300_Rectangle-102-copy.png', 1, '2020-09-17 01:32:16', '2020-10-03 23:59:53'),
(25, 14, 'Colors', 'Blue', NULL, NULL, 'Blue', 'http://seller.mejensi.com/product_images/5f76f04f5907b1_300_img_x500_5eea14949aeaf7-71290411-51571985.jpg', 1, '2020-10-02 16:18:08', '2020-10-02 22:39:03'),
(26, 14, 'Colors', 'Green', NULL, NULL, 'Green', 'http://seller.mejensi.com/product_images/5f76f050dfbdf1_300_3355674.jpg', 1, '2020-10-02 16:18:09', '2020-10-02 22:39:03'),
(27, 24, 'Colors', 'red', NULL, NULL, 'red', 'http://seller.mejensi.comproduct_images/product_24/variant_image/601a870fad7511IaM8kkPiNv.jpg', 0, '2021-02-03 18:20:49', '2021-02-03 18:20:49'),
(28, 24, 'Colors', 'green', NULL, NULL, 'green', 'http://seller.mejensi.comproduct_images/product_24/variant_image/601a87119da7b1online-shopping-bg.jpg', 0, '2021-02-03 18:20:49', '2021-02-03 18:20:49'),
(29, 26, 'Colors', 'White', NULL, NULL, 'White', 'http://seller.mejensi.comproduct_images/product_26/variant_image/601a88a6d4ca91Copy of games.jpg', 0, '2021-02-03 18:27:35', '2021-02-03 18:27:35'),
(30, 26, 'Colors', 'Blue', NULL, NULL, 'Blue', 'http://seller.mejensi.comproduct_images/product_26/variant_image/601a88a72e1651Untitled design.jpg', 0, '2021-02-03 18:27:35', '2021-02-03 18:27:35'),
(31, 26, 'Colors', 'Test', NULL, NULL, 'Test', 'http://seller.mejensi.comproduct_images/product_26/variant_image/601a88a7b07911Mini-Handheld-Doubles-Game-Players-Retro-Sup-Game-Box-3-0-Inch-Built-in-400-Gamescontroller-for-Child-Gift.jpg', 0, '2021-02-03 18:27:35', '2021-02-03 18:27:35'),
(34, 36, 'Colors', 'red', NULL, NULL, 'red', 'http://seller.mejensi.comproduct_images/product_36/variant_image/602386911122513.png', 0, '2021-02-10 14:09:05', '2021-02-10 14:09:05'),
(35, 36, 'Colors', 'black', NULL, NULL, 'black', 'http://seller.mejensi.comproduct_images/product_36/variant_image/60238691c664415.png', 0, '2021-02-10 14:09:08', '2021-02-10 14:09:08'),
(37, 37, 'Colors', 'red', NULL, NULL, 'red', 'http://seller.mejensi.comproduct_images/product_37/variant_image/6024d883a609112.png', 0, '2021-02-11 14:11:01', '2021-02-11 14:11:01'),
(38, 37, 'Colors', 'red', NULL, NULL, 'red', 'http://seller.mejensi.comproduct_images/product_37/variant_image/6024d88496c8c12.png', 0, '2021-02-11 14:11:02', '2021-02-11 14:11:02');

-- --------------------------------------------------------

--
-- Table structure for table `shipping_prices`
--

CREATE TABLE `shipping_prices` (
  `id` int(11) NOT NULL,
  `min_weight` varchar(255) DEFAULT NULL,
  `max_weight` varchar(255) DEFAULT NULL,
  `default_price` varchar(255) DEFAULT NULL,
  `per_kg_price` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shipping_prices`
--

INSERT INTO `shipping_prices` (`id`, `min_weight`, `max_weight`, `default_price`, `per_kg_price`, `created_at`, `updated_at`) VALUES
(4, '5', '9', '89', '20', '2020-10-22 20:19:46', '2020-11-20 09:33:50'),
(5, '10', '14', '129', '10', '2020-10-22 20:21:24', '2020-12-06 17:33:38'),
(6, '15', '19', '149', '10', '2020-10-22 20:24:25', '2020-12-06 17:33:46'),
(7, '20', '24', '169', '10', '2020-10-22 20:25:27', '2020-12-06 17:33:56'),
(8, '25', '29', '199', '10', '2020-10-22 20:26:09', '2020-12-06 17:34:11'),
(9, '30', '34', '209', '10', '2020-10-22 20:26:26', '2020-12-06 17:34:24'),
(10, '35', '39', '229', '10', '2020-10-22 20:26:42', '2020-12-06 17:34:41'),
(11, '40', '44', '249', '10', '2020-10-22 20:27:06', '2020-12-06 17:34:50'),
(12, '45', '49', '299', '10', '2020-10-22 20:27:22', '2020-12-06 17:34:59'),
(13, '50', '50000000', '299', '5', '2020-10-22 20:27:39', '2020-12-06 17:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `signup_contents`
--

CREATE TABLE `signup_contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_one` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_two` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_three` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_one_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_two_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_line_three_icon` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `signup_contents`
--

INSERT INTO `signup_contents` (`id`, `heading`, `description`, `text_line_one`, `text_line_two`, `text_line_three`, `text_line_one_icon`, `text_line_two_icon`, `text_line_three_icon`, `banner`, `created_at`, `updated_at`) VALUES
(1, 'Hdsds', 'knkjdnfmdn', 'DNNDSLNV,ZDMD', 'ds', 'ddsf', 'http://admin.mejensi.com/upload-images/signup-contents/icon-5f786250e50e91.png', 'http://admin.mejensi.com/upload-images/signup-contents/icon-5f786250e532f1.png', 'http://admin.mejensi.com/upload-images/signup-contents/icon-5f786250e54591.png', 'http://admin.mejensi.com/upload-images/signup-contents/icon-5f786250e556e1.png', '2020-10-04 00:36:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_animation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description_animation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_animation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_lg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_sm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_type` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` date DEFAULT NULL,
  `end_time` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `link`, `order_no`, `button_text`, `text_color`, `button_color`, `button_text_color`, `title_animation`, `description_animation`, `button_animation`, `image_lg`, `image_sm`, `slider_type`, `start_time`, `end_time`, `created_at`, `updated_at`) VALUES
(11, 'Happy New year Deal', 'All products available on 50% discount', NULL, '8', 'Buy Now', '#ffffff', '#ffffff', '#ff0011', 'fadeInUp', 'fadeInUp', 'fadeInUp', 'http://admin.mejensi.com/upload-images/sliders/slider-5ff54712827891.png', 'http://admin.mejensi.com/upload-images/sliders/slider-5f78564bef0ac1.png', 'Product', '2020-09-11', '2024-05-06', '2020-09-10 18:09:36', '2021-01-06 18:13:54'),
(14, NULL, NULL, NULL, NULL, NULL, '#000000', '#000000', '#000000', 'fadeInUp', 'fadeInUp', 'fadeInUp', 'http://admin.mejensi.com/upload-images/sliders/slider-5f786abf471a31.png', 'http://admin.mejensi.com/upload-images/sliders/slider-5f785601915561.png', 'Product', '2020-09-11', '2021-01-05', '2020-09-10 20:20:31', '2020-10-04 01:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `category_commission` float NOT NULL,
  `deduct_amount` float NOT NULL,
  `transfer_amount` double DEFAULT NULL,
  `vendor_order_id` varchar(255) NOT NULL,
  `order_token` varchar(255) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `user_t_amount` float NOT NULL,
  `vat_amount` double DEFAULT 0,
  `vendor_product_id` int(11) NOT NULL,
  `transaction_type` varchar(255) NOT NULL DEFAULT 'auto',
  `total_balance` float NOT NULL,
  `vendor_name` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `order_id`, `product_id`, `product_price`, `category_id`, `category_commission`, `deduct_amount`, `transfer_amount`, `vendor_order_id`, `order_token`, `vendor_id`, `user_t_amount`, `vat_amount`, `vendor_product_id`, `transaction_type`, `total_balance`, `vendor_name`, `note`, `customer_id`, `customer_name`, `created_at`, `updated_at`) VALUES
(21, 'FON-433829', 10, 400, 3, 10, 46, 0, '69', '10-1', 1, 46, 6, 15, 'Success Commission', -46, 'Lasani Enterprises', 'Success payment For CAT 1- 10% for vendorOrderId 69 and Order Token is 10-1', 11, 'mubeen ali', '2020-10-07 23:11:53', '2020-10-12 19:32:06'),
(22, 'FON-433829', 10, 400, 3, 0, 0, 400, '69', '10-1', 1, 400, 0, 15, 'vendor_payment', 354, 'Lasani Enterprises', 'vendor_payment', 11, 'mubeen ali', '2020-10-07 23:11:53', '2020-10-07 23:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vat` float NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `vat`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'adeel@multijunction.co.za', NULL, '$2y$12$wz.0Xk3/PpYeA8dgO8uCNeesakbnMRou1/vmLKR3zBx8MuAOngoBe', 1.5, NULL, '2020-08-03 01:39:13', '2020-08-03 01:39:13');

-- --------------------------------------------------------

--
-- Table structure for table `variant_option_options`
--

CREATE TABLE `variant_option_options` (
  `id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variant_option_options`
--

INSERT INTO `variant_option_options` (`id`, `option_id`, `option_name`, `active`, `created_at`, `updated_at`) VALUES
(23, 12, 'Red', 1, '2020-09-08 02:53:03', '2020-09-08 02:53:03'),
(24, 12, 'Blue', 1, '2020-09-08 02:53:03', '2020-09-08 02:53:03'),
(25, 12, 'Black', 1, '2020-09-08 02:53:03', '2020-09-08 02:53:03'),
(26, 12, 'Brown', 1, '2020-09-08 02:53:03', '2020-09-08 02:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `variations`
--

CREATE TABLE `variations` (
  `id` int(11) NOT NULL,
  `category_id` bigint(11) NOT NULL,
  `variation_name` varchar(255) NOT NULL,
  `image_approval` tinyint(1) NOT NULL,
  `sku_approval` tinyint(1) NOT NULL DEFAULT 1,
  `is_select` tinyint(1) NOT NULL DEFAULT 1,
  `is_text` tinyint(1) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variations`
--

INSERT INTO `variations` (`id`, `category_id`, `variation_name`, `image_approval`, `sku_approval`, `is_select`, `is_text`, `active`, `created_at`, `updated_at`) VALUES
(20, 6, 'Colors', 1, 1, 1, 0, 1, '2020-09-08 00:40:56', '2020-10-01 11:58:42'),
(21, 6, 'Size', 0, 1, 0, 1, 1, '2020-09-08 02:48:12', '2020-10-01 11:58:38'),
(22, 1, 'Length', 0, 1, 0, 1, 1, '2020-09-10 17:18:41', '2020-10-03 23:47:25');

-- --------------------------------------------------------

--
-- Table structure for table `variation_options`
--

CREATE TABLE `variation_options` (
  `id` int(11) NOT NULL,
  `variation_id` int(11) NOT NULL,
  `option_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variation_options`
--

INSERT INTO `variation_options` (`id`, `variation_id`, `option_name`, `active`, `created_at`, `updated_at`) VALUES
(12, 20, 'primary', 1, '2020-09-08 00:40:56', '2020-09-08 00:40:56'),
(13, 22, 'Inches', 1, '2020-09-10 17:18:41', '2020-09-10 17:18:41');

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `identity` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Vendor',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `business_information` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vat_register` varchar(33) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `director_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `additional_info` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subrub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `waddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wstreet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wcity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wstate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wsubrub` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wzip_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `wcountry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `identity`, `first_name`, `last_name`, `email`, `password`, `phone`, `mobile`, `business_information`, `vat_register`, `company_name`, `website_url`, `director_first_name`, `director_last_name`, `director_email`, `director_details`, `additional_info`, `product_type`, `account_holder`, `bank_name`, `bank_account`, `branch_name`, `branch_code`, `address`, `street`, `city`, `state`, `subrub`, `zip_code`, `country`, `waddress`, `wstreet`, `wcity`, `wstate`, `wsubrub`, `wzip_code`, `wcountry`, `active`, `email_verified_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Vendor', 'ali', 'Mubeen', 'adeel@multijunction.co.za', '$2y$12$wz.0Xk3/PpYeA8dgO8uCNeesakbnMRou1/vmLKR3zBx8MuAOngoBe', '12345678', '12345678', NULL, '0', 'Lasani Enterprises', 'm.com', 'ali', 'ddddddddf', 'mubeenbaig33@gmail.com', NULL, 'asadddddddddddddas', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-08-05 23:32:07', '2020-09-11 20:45:43'),
(5, 'Vendor', 'Rijan Khan 22', 'Ahmed', 'adeel@flashybuy.com', '$2y$12$wz.0Xk3/PpYeA8dgO8uCNeesakbnMRou1/vmLKR3zBx8MuAOngoBe', '+88 01631642287', '+88 01631642287', 'Test Business Info', 'Yes', 'Test Company Name', 'https://www.facebook.com', 'Robin', 'Hook', 'robin@yahoo.com', 'This is business director details', 'This is my additional information about my business.', NULL, 'Developer Rijan', 'City Bank', '123123123123', 'DDC. Branch', '1350', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'W House Address', '1250', 'Dhaka', 'Dhaka', '1250', '1250', 'BD', 1, NULL, NULL, '2020-08-17 02:14:29', '2020-08-20 06:52:43'),
(6, 'Vendor', 'Rijan', 'Ahamed', 'developerrijan120@gmail.com', '$2y$10$ulLAL4KPiD0q1cpPyFte8ubTAWk9KtXMXRB5Yw9X2S1YMh.VCOUoS', '01780324482', '01631642287', 'This is test business Informations', 'No', 'Test Company 1', 'http://www.facebook.com', 'Kashem', 'Mia', 'kasen_director@gmail.com', 'This is director detials', 'This is additional info', 'Digital Products', 'Rijan Ahamed Mobin', 'Yes Bank', '01720327286452', 'Delhi, 1350, YB, Bank Branch', '2560', '250/A House, 25', 'Coloni Para Steet', 'Delhi', 'Delhi', '21', '2525', 'India', 'W Address, 25', 'W Street', 'W City', 'W State', 'W Sub Rub', 'W 1250', 'W India', 1, NULL, NULL, '2020-08-17 02:16:32', '2020-08-18 03:41:00'),
(7, 'Vendor', 'Hassan', 'baig', 'Asad@gmail.com', '$2y$10$WyOIb7Yc2wBFyqKVoUJuj.bJI0hDgJK2BKcuRYEywDA6aco1eK/R.', '1234567890', '1234567890', 'asadf hsfsbvsbfdsv jsdbvdk vsmsvbjsdbca chcbabckabca casnnbcajbcksabvabc shsjsabcjsbcsjc hsvcjhsacjs', 'No', 'Farmacy', 'http://127.0.0.1:8000/add-variations-options', 'AS', 'SD', 'AS@gmail.com', 'DD', 'ZXC', 'Grouped Products', 'fcf', 'hdff', 'grdf45678', '5rytguyugygyu', 'hffgfggf43567', 'ZXC', 'X', 'ZXXCZ', 'xcvv', 'sd', 'dfs', 'd', 'assasdsad', 'dda', 'qsd', 'qa', 'qcd', 'qac', 'qsd', 1, NULL, NULL, '2020-09-04 05:56:51', NULL),
(8, 'Vendor', 'ali', 'rehman', 'alirehman@gmail.com', NULL, '1234567890', '123456789', NULL, 'Yes', 'GOODDAY', 'http://127.0.0.1:8000/vendor/add-new-product', 'Ali', 'Rehman', 'ali@gmail.com', 'dddsd', 'dsdsdsds', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-09-10 17:52:55', NULL),
(9, 'Vendor', 'M', 'W', 'test961@gmail.com', NULL, '0301343', '03013', NULL, 'Yes', 'dfdsfds', 'https://www.youtube.com/watch?v=2AI_gfMumrw', 'sdfdsfdsfds', 'dsfdsf', 'test@gmail.com', 'this', 'sdfdsf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, NULL, NULL, '2020-09-10 19:38:01', '2020-09-10 19:39:31'),
(10, 'Vendor', 'test', 'test', 'mubeenbaig33@gmail.com', '$2y$10$tfLX8.K/Wh7hPb4qJmrwnep30qqWfnXvE.0GxnT7gv15opzYJAJPO', '3245678', '56789', NULL, 'Yes', 'sa', 'https://docs.google.com/document/d/14hgzDuNKfwjIQEWU0xG3f_zJ8dYcbQbEEiGlA10PChk/edit', 'Ali', 'ali', 'Ali@gmail.com', 'dsjdssjdj', 'CDKCDDKCSJSDKJDKJNDKJDZN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-09-11 14:05:19', '2020-09-11 21:47:36'),
(12, 'Vendor', 'Mubeen', 'baig', 'mmubeen.developer@gmail.com', NULL, '1234567', '1234567', NULL, 'Yes', 'sdf', 'https://github.com/Maatwebsite/Laravel-Excel', 'sdd', 'sd', 'admin@gmail.com', 'dsf', 'dsfffffffffff', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, '2020-10-05 19:05:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_activities`
--

CREATE TABLE `vendor_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `activityName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activities` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `is_loogedIn` varchar(33) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_activities`
--

INSERT INTO `vendor_activities` (`id`, `vendor_id`, `activityName`, `activities`, `is_loogedIn`, `created_at`, `updated_at`) VALUES
(5, 5, 'Profile Update', '{\"first_name\":\"Rijan Khan 22\",\"last_name\":\"Ahmed\",\"phone\":\"+88 01631642287\",\"mobile\":\"+88 01631642287\",\"email\":\"developerrijan@gmail.com\"}', '', '2020-08-20 02:21:20', NULL),
(6, 5, 'Login', '{\"IP\":\"127.0.0.1\",\"Client Browser\":\"Chrome\",\"LoggedIn at\":\"2020-08-20T12:42:45.772114Z\"}', '', '2020-08-20 06:42:45', NULL),
(7, 5, 'Bank Details Update', '{\"account_holder\":\"Developer Rijan\",\"bank_name\":\"City Bank\",\"bank_account\":\"123123123123\",\"branch_name\":\"DDC. Branch\",\"branch_code\":\"1350\"}', '', '2020-08-20 06:43:50', NULL),
(8, 5, 'Login', '{\"IP\":\"127.0.0.1\",\"Client Browser\":\"Chrome\",\"LoggedIn at\":\"20\\/08\\/2020 13:51\"}', '', '2020-08-20 07:51:32', NULL),
(9, 1, 'Login', '{\"Time\":\"27\\/08\\/2020 09:14\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, , \"}', 'Sign out', '2020-08-27 04:14:26', '2020-08-31 01:12:12'),
(10, 1, 'Login', '{\"Time\":\"27\\/08\\/2020 12:21\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, Virginia, Ashburn\"}', 'Sign out', '2020-08-27 07:21:23', '2020-08-31 01:12:13'),
(11, 1, 'Bank Details Update', '{\"account_holder\":\"Flashybuy\",\"bank_name\":\"Mcb Lahore\",\"bank_account\":\"1234567890\",\"branch_name\":\"Lahore Model Town\",\"branch_code\":\"MC-567\"}', NULL, '2020-08-27 07:22:22', NULL),
(12, 1, 'Login', '{\"Time\":\"31\\/08\\/2020 05:33\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, Virginia, Ashburn\"}', 'Sign out', '2020-08-31 00:33:49', '2020-08-31 01:12:13'),
(13, 1, 'Login', '{\"Time\":\"31\\/08\\/2020 07:03\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, Virginia, Ashburn\"}', 'Sign out', '2020-08-31 02:03:59', '2020-09-07 05:16:50'),
(14, 1, 'Login', '{\"Time\":\"01\\/09\\/2020 05:52\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, Virginia, Ashburn\"}', 'Sign out', '2020-09-01 00:52:25', '2020-09-07 05:16:50'),
(15, 1, 'Login', '{\"Time\":\"01\\/09\\/2020 07:17\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, Virginia, Ashburn\"}', 'Sign out', '2020-09-01 02:17:07', '2020-09-07 05:16:50'),
(16, 1, 'Login', '{\"Time\":\"01\\/09\\/2020 11:53\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"United States, Virginia, Ashburn\"}', 'Sign out', '2020-09-01 06:53:12', '2020-09-07 05:16:50'),
(17, 1, 'Login', '{\"Time\":\"02\\/09\\/2020 05:13\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-02 00:13:44', '2020-09-07 05:16:50'),
(18, 1, 'Login', '{\"Time\":\"02\\/09\\/2020 09:34\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-02 04:34:02', '2020-09-07 05:16:50'),
(19, 1, 'Login', '{\"Time\":\"03\\/09\\/2020 04:53\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-02 23:53:02', '2020-09-07 05:16:50'),
(20, 1, 'Login', '{\"Time\":\"03\\/09\\/2020 06:45\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-03 01:45:37', '2020-09-07 05:16:50'),
(21, 1, 'Login', '{\"Time\":\"04\\/09\\/2020 09:14\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-04 04:14:01', '2020-09-07 05:16:50'),
(22, 1, 'Login', '{\"Time\":\"05\\/09\\/2020 08:00\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-05 03:00:24', '2020-09-07 05:16:50'),
(23, 1, 'Login', '{\"Time\":\"05\\/09\\/2020 10:16\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Unknown\"}', 'Sign out', '2020-09-05 05:16:39', '2020-09-07 05:16:50'),
(24, 1, 'Login', '{\"Time\":\"07\\/09\\/2020 09:03\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-07 04:03:09', '2020-09-07 05:16:51'),
(25, 1, 'Login', '{\"Time\":\"07\\/09\\/2020 10:25\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-07 05:25:21', '2020-09-07 05:51:06'),
(26, 1, 'Login', '{\"Time\":\"08\\/09\\/2020 05:11\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-08 00:11:32', '2020-09-10 14:28:51'),
(27, 1, 'Login', '{\"Time\":\"08\\/09\\/2020 06:54\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-08 01:54:53', '2020-09-10 14:28:51'),
(28, 1, 'Login', '{\"Time\":\"08\\/09\\/2020 07:54\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-08 02:54:43', '2020-09-10 14:28:51'),
(29, 1, 'Login', '{\"Time\":\"09\\/09\\/2020 04:44\",\"Access Via\":\"Chrome\",\"IP\":\"127.0.0.1\",\"Location\":\"Canada, Quebec, Montreal\"}', 'Sign out', '2020-09-08 23:44:22', '2020-09-10 14:28:51'),
(30, 1, 'Login', '{\"Time\":\"09\\/09\\/2020 21:03\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.105.208\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-10 04:03:53', '2020-09-10 14:28:51'),
(31, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 06:59\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.10\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-10 13:59:54', '2020-09-10 14:28:51'),
(32, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 07:08\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-10 14:08:07', '2020-09-10 14:28:51'),
(33, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 07:54\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-10 14:54:24', '2020-09-10 16:08:29'),
(34, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 09:45\",\"Access Via\":\"Chrome\",\"IP\":\"101.50.105.14\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-10 16:45:25', '2020-09-11 19:34:11'),
(35, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 12:36\",\"Access Via\":\"Chrome\",\"IP\":\"101.50.105.14\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-10 19:36:30', '2020-09-11 19:34:11'),
(36, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 12:41\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.10\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-10 19:41:20', '2020-09-11 19:34:11'),
(37, 1, 'Login', '{\"Time\":\"10\\/09\\/2020 19:08\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.105.208\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-11 02:08:37', '2020-09-11 19:34:11'),
(38, 1, 'Login', '{\"Time\":\"11\\/09\\/2020 10:43\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.191\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-11 17:43:27', '2020-09-11 19:34:11'),
(39, 1, 'Login', '{\"Time\":\"11\\/09\\/2020 11:16\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-11 18:16:17', '2020-09-11 19:34:11'),
(40, 1, 'Login', '{\"Time\":\"11\\/09\\/2020 12:11\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-11 19:11:47', '2020-09-11 19:34:11'),
(41, 1, 'Login', '{\"Time\":\"11\\/09\\/2020 13:45\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-11 20:45:54', '2020-09-11 20:46:34'),
(42, 1, 'Login', '{\"Time\":\"11\\/09\\/2020 13:46\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-11 20:46:48', '2020-09-17 01:50:12'),
(43, 10, 'Login', '{\"Time\":\"11\\/09\\/2020 14:47\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.191\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Active', '2020-09-11 21:47:47', NULL),
(44, 10, 'Login', '{\"Time\":\"11\\/09\\/2020 20:53\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.105.208\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Active', '2020-09-12 03:53:09', NULL),
(45, 10, 'Login', '{\"Time\":\"12\\/09\\/2020 06:37\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.105.208\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Active', '2020-09-12 13:37:20', NULL),
(46, 1, 'Login', '{\"Time\":\"12\\/09\\/2020 09:18\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-12 16:18:48', '2020-09-17 01:50:12'),
(47, 1, 'Login', '{\"Time\":\"12\\/09\\/2020 12:45\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-12 19:45:13', '2020-09-17 01:50:12'),
(48, 1, 'Login', '{\"Time\":\"12\\/09\\/2020 13:24\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-12 20:24:26', '2020-09-17 01:50:12'),
(49, 1, 'Login', '{\"Time\":\"12\\/09\\/2020 13:25\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-12 20:25:31', '2020-09-17 01:50:12'),
(50, 1, 'Login', '{\"Time\":\"13\\/09\\/2020 14:35\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.105.208\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-13 21:35:18', '2020-09-17 01:50:12'),
(51, 1, 'Login', '{\"Time\":\"15\\/09\\/2020 06:58\",\"Access Via\":\"Chrome\",\"IP\":\"203.99.51.72\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-15 13:58:19', '2020-09-17 01:50:12'),
(52, 1, 'Login', '{\"Time\":\"16\\/09\\/2020 18:17\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.17\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-09-17 01:17:27', '2020-09-17 01:50:12'),
(53, 1, 'Login', '{\"Time\":\"16\\/09\\/2020 18:51\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.17\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-09-17 01:51:38', '2020-09-17 01:51:53'),
(54, 1, 'Login', '{\"Time\":\"17\\/09\\/2020 19:05\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.25\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-09-18 02:05:50', '2020-09-23 16:51:24'),
(55, 1, 'Login', '{\"Time\":\"19\\/09\\/2020 06:29\",\"Access Via\":\"Chrome\",\"IP\":\"101.50.76.47\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-19 13:29:01', '2020-09-23 16:51:24'),
(56, 1, 'Login', '{\"Time\":\"23\\/09\\/2020 08:42\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.38\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-09-23 15:42:55', '2020-09-23 16:51:24'),
(57, 1, 'Login', '{\"Time\":\"24\\/09\\/2020 05:54\",\"Access Via\":\"Chrome\",\"IP\":\"101.50.76.47\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-09-24 12:54:03', '2020-09-24 14:42:14'),
(58, 1, 'Login', '{\"Time\":\"01\\/10\\/2020 11:12\",\"Access Via\":\"Chrome\",\"IP\":\"101.50.106.27\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-01 18:12:47', '2020-10-02 12:33:04'),
(59, 1, 'Login', '{\"Time\":\"02\\/10\\/2020 05:32\",\"Access Via\":\"Chrome\",\"IP\":\"115.186.181.141\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-02 12:32:36', '2020-10-02 12:33:04'),
(60, 1, 'Login', '{\"Time\":\"02\\/10\\/2020 05:34\",\"Access Via\":\"Chrome\",\"IP\":\"115.186.181.141\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-02 12:34:34', '2020-10-02 12:36:53'),
(61, 1, 'Login', '{\"Time\":\"02\\/10\\/2020 05:42\",\"Access Via\":\"Chrome\",\"IP\":\"115.186.181.141\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-02 12:42:25', '2020-10-05 17:13:05'),
(62, 1, 'Login', '{\"Time\":\"02\\/10\\/2020 07:32\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.109.199\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-02 14:32:21', '2020-10-05 17:13:05'),
(63, 1, 'Login', '{\"Time\":\"02\\/10\\/2020 09:39\",\"Access Via\":\"Chrome\",\"IP\":\"101.50.105.4\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-02 16:39:51', '2020-10-05 17:13:05'),
(64, 1, 'Login', '{\"Time\":\"03\\/10\\/2020 09:43\",\"Access Via\":\"Chrome\",\"IP\":\"115.186.181.141\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-03 16:43:37', '2020-10-05 17:13:05'),
(65, 1, 'Login', '{\"Time\":\"03\\/10\\/2020 18:39\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.99.176\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-04 01:39:08', '2020-10-05 17:13:05'),
(66, 1, 'Login', '{\"Time\":\"03\\/10\\/2020 18:47\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.32\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-04 01:47:48', '2020-10-05 17:13:05'),
(67, 1, 'Login', '{\"Time\":\"05\\/10\\/2020 10:08\",\"Access Via\":\"Chrome\",\"IP\":\"115.186.181.141\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2020-10-05 17:08:35', '2020-10-05 17:13:05'),
(68, 1, 'Login', '{\"Time\":\"05\\/10\\/2020 18:30\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.72\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-06 01:30:53', '2021-01-04 13:56:46'),
(69, 5, 'Login', '{\"Time\":\"05\\/10\\/2020 18:32\",\"Access Via\":\"Firefox\",\"IP\":\"197.185.108.72\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-06 01:32:37', '2020-10-11 17:15:46'),
(70, 1, 'Login', '{\"Time\":\"07\\/10\\/2020 08:08\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.62\",\"Location\":\", Punjab, Lahore\"}', 'Sign out', '2020-10-07 15:08:28', '2021-01-04 13:56:46'),
(71, 1, 'Login', '{\"Time\":\"07\\/10\\/2020 18:54\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.44\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-08 01:54:26', '2021-01-04 13:56:46'),
(72, 5, 'Login', '{\"Time\":\"11\\/10\\/2020 09:59\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.155\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-11 16:59:23', '2020-10-11 17:15:46'),
(73, 5, 'Login', '{\"Time\":\"11\\/10\\/2020 10:15\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.155\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-11 17:15:52', '2020-10-11 17:16:02'),
(74, 1, 'Login', '{\"Time\":\"11\\/10\\/2020 10:16\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.155\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-11 17:16:13', '2021-01-04 13:56:46'),
(75, 1, 'Login', '{\"Time\":\"12\\/10\\/2020 19:25\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.110.227\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-13 02:25:58', '2021-01-04 13:56:46'),
(76, 1, 'Login', '{\"Time\":\"14\\/10\\/2020 14:14\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.15\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-14 21:14:51', '2021-01-04 13:56:46'),
(77, 1, 'Login', '{\"Time\":\"15\\/10\\/2020 08:43\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.47\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-15 15:43:07', '2021-01-04 13:56:46'),
(78, 1, 'Login', '{\"Time\":\"15\\/10\\/2020 08:44\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.47\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-15 15:44:08', '2021-01-04 13:56:46'),
(79, 1, 'Login', '{\"Time\":\"15\\/10\\/2020 16:58\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.50\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-15 23:58:10', '2021-01-04 13:56:46'),
(80, 1, 'Login', '{\"Time\":\"16\\/10\\/2020 09:19\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.22\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-10-16 16:19:00', '2021-01-04 13:56:46'),
(81, 1, 'Login', '{\"Time\":\"28\\/10\\/2020 07:13\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.101.250\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-10-28 14:13:42', '2021-01-04 13:56:46'),
(82, 1, 'Login', '{\"Time\":\"04\\/11\\/2020 08:36\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.107.198\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-04 15:36:38', '2021-01-04 13:56:46'),
(83, 1, 'Login', '{\"Time\":\"04\\/11\\/2020 19:37\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.106.121\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-05 02:37:27', '2021-01-04 13:56:46'),
(84, 1, 'Login', '{\"Time\":\"05\\/11\\/2020 08:26\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.107.198\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-05 15:26:59', '2021-01-04 13:56:46'),
(85, 1, 'Login', '{\"Time\":\"05\\/11\\/2020 13:16\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.107.198\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-05 20:16:38', '2021-01-04 13:56:46'),
(86, 1, 'Login', '{\"Time\":\"05\\/11\\/2020 18:47\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.106.121\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-06 01:47:55', '2021-01-04 13:56:46'),
(87, 1, 'Login', '{\"Time\":\"09\\/11\\/2020 20:44\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.106.172\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-10 03:44:09', '2021-01-04 13:56:46'),
(88, 1, 'Login', '{\"Time\":\"09\\/11\\/2020 20:57\",\"Access Via\":\"Chrome\",\"IP\":\"72.255.54.163\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2020-11-10 03:57:10', '2021-01-04 13:56:46'),
(89, 1, 'Login', '{\"Time\":\"12\\/11\\/2020 07:37\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.105.205\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-12 14:37:54', '2021-01-04 13:56:46'),
(90, 1, 'Login', '{\"Time\":\"14\\/11\\/2020 19:17\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.99.242\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-15 02:17:37', '2021-01-04 13:56:46'),
(91, 1, 'Login', '{\"Time\":\"17\\/11\\/2020 18:05\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.99.242\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-18 01:05:43', '2021-01-04 13:56:46'),
(92, 1, 'Login', '{\"Time\":\"19\\/11\\/2020 20:33\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.106.165\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-20 03:33:11', '2021-01-04 13:56:46'),
(93, 1, 'Login', '{\"Time\":\"24\\/11\\/2020 09:29\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.96.84\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-24 16:29:41', '2021-01-04 13:56:46'),
(94, 1, 'Login', '{\"Time\":\"25\\/11\\/2020 17:49\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.109.92\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2020-11-26 00:49:39', '2021-01-04 13:56:46'),
(95, 1, 'Login', '{\"Time\":\"03\\/01\\/2021 17:56\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.100.244\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-04 00:56:54', '2021-01-04 13:56:46'),
(96, 1, 'Login', '{\"Time\":\"04\\/01\\/2021 06:45\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.102.217\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-04 13:45:30', '2021-01-04 13:56:46'),
(97, 1, 'Login', '{\"Time\":\"04\\/01\\/2021 06:50\",\"Access Via\":\"Chrome\",\"IP\":\"23.106.249.37\",\"Location\":\"Singapore, , Singapore\"}', 'Sign out', '2021-01-04 13:50:08', '2021-01-04 13:56:46'),
(98, 1, 'Login', '{\"Time\":\"05\\/01\\/2021 11:24\",\"Access Via\":\"Chrome\",\"IP\":\"23.106.249.53\",\"Location\":\"Singapore, , Singapore\"}', 'Sign out', '2021-01-05 18:24:02', '2021-01-05 18:29:58'),
(99, 1, 'Login', '{\"Time\":\"05\\/01\\/2021 11:24\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.102.217\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-05 18:24:09', '2021-01-05 18:29:58'),
(100, 1, 'Login', '{\"Time\":\"05\\/01\\/2021 11:30\",\"Access Via\":\"Chrome\",\"IP\":\"23.106.249.53\",\"Location\":\"Singapore, , Singapore\"}', 'Sign out', '2021-01-05 18:30:05', '2021-01-05 18:32:38'),
(101, 1, 'Login', '{\"Time\":\"05\\/01\\/2021 11:33\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.102.217\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-05 18:33:19', '2021-01-21 14:18:49'),
(102, 1, 'Login', '{\"Time\":\"06\\/01\\/2021 07:32\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.35\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2021-01-06 14:32:09', '2021-01-21 14:18:49'),
(103, 1, 'Login', '{\"Time\":\"06\\/01\\/2021 08:32\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.102.217\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-06 15:32:34', '2021-01-21 14:18:49'),
(104, 1, 'Login', '{\"Time\":\"09\\/01\\/2021 08:06\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.27\",\"Location\":\"Pakistan, Punjab, Shekhupura\"}', 'Sign out', '2021-01-09 15:06:05', '2021-01-21 14:18:49'),
(105, 1, 'Login', '{\"Time\":\"13\\/01\\/2021 07:17\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.107.122\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-13 14:17:02', '2021-01-21 14:18:49'),
(106, 1, 'Login', '{\"Time\":\"17\\/01\\/2021 19:32\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.102.134\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-18 02:32:13', '2021-01-21 14:18:49'),
(107, 1, 'Login', '{\"Time\":\"18\\/01\\/2021 10:22\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.108.82\",\"Location\":\"South Africa, Gauteng, Bryanston\"}', 'Sign out', '2021-01-18 17:22:26', '2021-01-21 14:18:49'),
(108, 1, 'Login', '{\"Time\":\"20\\/01\\/2021 21:03\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.109.249\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-21 04:03:45', '2021-01-21 14:18:49'),
(109, 1, 'Login', '{\"Time\":\"21\\/01\\/2021 07:15\",\"Access Via\":\"Chrome\",\"IP\":\"103.26.85.11\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2021-01-21 14:15:35', '2021-01-21 14:18:49'),
(110, 1, 'Login', '{\"Time\":\"21\\/01\\/2021 08:04\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.164\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-21 15:04:58', '2021-01-21 17:09:29'),
(111, 1, 'Login', '{\"Time\":\"21\\/01\\/2021 08:59\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.164\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-21 15:59:10', '2021-01-21 17:09:29'),
(112, 1, 'Login', '{\"Time\":\"21\\/01\\/2021 10:59\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.164\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-21 17:59:37', '2021-01-22 02:20:11'),
(113, 1, 'Login', '{\"Time\":\"21\\/01\\/2021 19:18\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.70\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-22 02:18:36', '2021-01-22 02:20:11'),
(114, 1, 'Login', '{\"Time\":\"21\\/01\\/2021 19:22\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.70\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-22 02:22:12', '2021-01-22 16:19:19'),
(115, 1, 'Login', '{\"Time\":\"22\\/01\\/2021 08:53\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.104.230\",\"Location\":\"South Africa, Gauteng, Pretoria\"}', 'Sign out', '2021-01-22 15:53:15', '2021-01-22 16:19:19'),
(116, 1, 'Login', '{\"Time\":\"23\\/01\\/2021 05:27\",\"Access Via\":\"Chrome\",\"IP\":\"103.26.85.11\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2021-01-23 12:27:02', '2021-01-28 18:28:28'),
(117, 1, 'Login', '{\"Time\":\"23\\/01\\/2021 18:23\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.18\",\"Location\":\"Pakistan, Punjab, Pakpattan\"}', 'Sign out', '2021-01-24 01:23:20', '2021-01-28 18:28:28'),
(118, 1, 'Login', '{\"Time\":\"23\\/01\\/2021 18:23\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.18\",\"Location\":\"Pakistan, Punjab, Pakpattan\"}', 'Sign out', '2021-01-24 01:23:20', '2021-01-28 18:28:28'),
(119, 1, 'Login', '{\"Time\":\"23\\/01\\/2021 18:24\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.97.70\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-24 01:24:25', '2021-01-28 18:28:28'),
(120, 1, 'Login', '{\"Time\":\"24\\/01\\/2021 10:44\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.103.144\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-24 17:44:25', '2021-01-28 18:28:28'),
(121, 1, 'Login', '{\"Time\":\"24\\/01\\/2021 18:15\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.110.249\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-25 01:15:28', '2021-01-28 18:28:28'),
(122, 1, 'Login', '{\"Time\":\"28\\/01\\/2021 09:43\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.98.226\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-28 16:43:54', '2021-01-28 18:28:28'),
(123, 1, 'Login', '{\"Time\":\"28\\/01\\/2021 11:01\",\"Access Via\":\"Chrome\",\"IP\":\"103.26.85.11\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2021-01-28 18:01:30', '2021-01-28 18:28:28'),
(124, 1, 'Login', '{\"Time\":\"28\\/01\\/2021 15:35\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.102.215\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-01-28 22:35:58', '2021-02-08 15:21:44'),
(125, 1, 'Login', '{\"Time\":\"01\\/02\\/2021 12:40\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.100.115\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-02-01 19:40:00', '2021-02-08 15:21:44'),
(126, 1, 'Login', '{\"Time\":\"03\\/02\\/2021 11:14\",\"Access Via\":\"Chrome\",\"IP\":\"103.26.85.11\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2021-02-03 18:14:47', '2021-02-08 15:21:44'),
(127, 1, 'Login', '{\"Time\":\"03\\/02\\/2021 11:16\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.104.245\",\"Location\":\"South Africa, Gauteng, Pretoria\"}', 'Sign out', '2021-02-03 18:16:30', '2021-02-08 15:21:44'),
(128, 1, 'Login', '{\"Time\":\"04\\/02\\/2021 15:54\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.110.186\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-02-04 22:54:59', '2021-02-08 15:21:44'),
(129, 1, 'Login', '{\"Time\":\"05\\/02\\/2021 06:10\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.1\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2021-02-05 13:10:01', '2021-02-08 15:21:44'),
(130, 1, 'Login', '{\"Time\":\"05\\/02\\/2021 11:23\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.53\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2021-02-05 18:23:19', '2021-02-08 15:21:44'),
(131, 1, 'Login', '{\"Time\":\"05\\/02\\/2021 12:13\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.96.112\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-02-05 19:13:08', '2021-02-08 15:21:44'),
(132, 1, 'Login', '{\"Time\":\"05\\/02\\/2021 17:29\",\"Access Via\":\"Chrome\",\"IP\":\"111.119.187.8\",\"Location\":\"Pakistan, Punjab, Lahore\"}', 'Sign out', '2021-02-06 00:29:27', '2021-02-08 15:21:44'),
(133, 1, 'Login', '{\"Time\":\"08\\/02\\/2021 08:18\",\"Access Via\":\"Chrome\",\"IP\":\"103.26.85.11\",\"Location\":\"Pakistan, Punjab, Faisalabad\"}', 'Sign out', '2021-02-08 15:18:17', '2021-02-08 15:21:44'),
(134, 1, 'Login', '{\"Time\":\"08\\/02\\/2021 08:18\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.107.12\",\"Location\":\"South Africa, Gauteng, Pretoria\"}', 'Sign out', '2021-02-08 15:18:26', '2021-02-08 15:21:44'),
(135, 1, 'Login', '{\"Time\":\"08\\/02\\/2021 10:59\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.107.12\",\"Location\":\"South Africa, Gauteng, Pretoria\"}', 'Sign out', '2021-02-08 17:59:03', '2021-02-11 17:16:38'),
(136, 1, 'Login', '{\"Time\":\"10\\/02\\/2021 06:38\",\"Access Via\":\"Chrome\",\"IP\":\"207.244.71.84\",\"Location\":\"United States, Massachusetts, Boston\"}', 'Sign out', '2021-02-10 13:38:35', '2021-02-11 17:16:38'),
(137, 1, 'Login', '{\"Time\":\"11\\/02\\/2021 07:03\",\"Access Via\":\"Chrome\",\"IP\":\"207.244.71.81\",\"Location\":\"United States, Massachusetts, Boston\"}', 'Sign out', '2021-02-11 14:03:59', '2021-02-11 17:16:38'),
(138, 1, 'Login', '{\"Time\":\"11\\/02\\/2021 10:16\",\"Access Via\":\"Chrome\",\"IP\":\"207.244.71.81\",\"Location\":\"United States, Massachusetts, Boston\"}', 'Sign out', '2021-02-11 17:16:19', '2021-02-11 17:16:38'),
(139, 1, 'Login', '{\"Time\":\"13\\/02\\/2021 05:23\",\"Access Via\":\"Chrome\",\"IP\":\"207.244.71.79\",\"Location\":\"United States, Massachusetts, Boston\"}', 'Sign out', '2021-02-13 12:23:01', '2021-02-13 12:26:28'),
(140, 1, 'Login', '{\"Time\":\"13\\/02\\/2021 05:26\",\"Access Via\":\"Chrome\",\"IP\":\"207.244.71.79\",\"Location\":\"United States, Massachusetts, Boston\"}', 'Sign out', '2021-02-13 12:26:34', '2021-02-13 12:26:38'),
(141, 1, 'Login', '{\"Time\":\"19\\/02\\/2021 19:19\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.110.81\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-02-20 02:19:55', '2021-02-20 18:20:31'),
(142, 1, 'Login', '{\"Time\":\"20\\/02\\/2021 11:18\",\"Access Via\":\"Chrome\",\"IP\":\"197.185.98.49\",\"Location\":\"South Africa, Gauteng, Johannesburg\"}', 'Sign out', '2021-02-20 18:18:50', '2021-02-20 18:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `vendor_bank_details_temp_data`
--

CREATE TABLE `vendor_bank_details_temp_data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `vendor_id` bigint(20) UNSIGNED NOT NULL,
  `account_holder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank_account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `branch_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_bank_details_temp_data`
--

INSERT INTO `vendor_bank_details_temp_data` (`id`, `vendor_id`, `account_holder`, `bank_name`, `bank_account`, `branch_name`, `branch_code`, `status`, `created_at`, `updated_at`) VALUES
(1, 5, 'Rijan Khan', 'AB Bank', '123123123123', 'Soft. Branch', '1250', 0, '2020-08-19 07:29:35', '2020-08-20 06:40:50'),
(2, 5, 'Developer Rijan', 'City Bank', '123123123123', 'DDC. Branch', '1350', 0, '2020-08-20 06:43:50', '2020-08-20 06:52:43'),
(3, 1, 'Flashybuy', 'Mcb Lahore', '1234567890', 'Lahore Model Town', 'MC-567', 0, '2020-08-27 07:22:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vendor_products`
--

CREATE TABLE `vendor_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ven_id` bigint(20) UNSIGNED NOT NULL,
  `prod_id` bigint(20) UNSIGNED NOT NULL,
  `variation_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `mk_price` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `dispatched_days` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vendor_products`
--

INSERT INTO `vendor_products` (`id`, `ven_id`, `prod_id`, `variation_id`, `quantity`, `mk_price`, `price`, `dispatched_days`, `active`, `comments`, `created_at`, `updated_at`) VALUES
(14, 5, 9, NULL, 10, 250, 245, 2, 1, NULL, NULL, NULL),
(15, 1, 10, NULL, 12, 255, 200, 5, 1, NULL, NULL, NULL),
(16, 1, 11, NULL, 12, 2566, 2450, 5, 1, NULL, NULL, NULL),
(17, 5, 9, NULL, 34, 45, 32, 3, 1, NULL, '2020-10-01 18:48:32', '2020-10-01 18:49:05'),
(18, 1, 14, 25, 20, 99, 0, 0, 0, NULL, NULL, '2020-10-06 01:37:52'),
(19, 1, 14, 26, 200, 999, 399, 7, 1, NULL, NULL, '2020-10-06 01:37:25'),
(26, 1, 13, 21, 5, 500, 200, 5, 1, NULL, NULL, '2020-10-16 16:58:27'),
(27, 1, 13, 22, 5, 99, 55, 4, 1, NULL, NULL, '2020-10-06 01:35:56'),
(28, 1, 13, 23, 10, 450, 445, 3, 1, NULL, NULL, '2020-10-03 18:01:41'),
(29, 1, 13, 24, 15, 540, 252, 1, 1, NULL, NULL, '2021-01-13 14:18:43'),
(31, 7, 13, 24, 16, 540, 500, 1, 1, NULL, NULL, '2020-10-03 18:01:12'),
(32, 7, 13, 23, 10, 450, 447, 3, 1, NULL, NULL, '2020-10-03 18:01:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appearance_settings`
--
ALTER TABLE `appearance_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `auth_pages`
--
ALTER TABLE `auth_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `customers_email_unique` (`email`);

--
-- Indexes for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_addresses_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `home_categories`
--
ALTER TABLE `home_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_id` (`category_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `popups`
--
ALTER TABLE `popups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `popups_name_unique` (`name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_warranties`
--
ALTER TABLE `products_warranties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_customfields`
--
ALTER TABLE `product_customfields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_media`
--
ALTER TABLE `product_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_other_categories`
--
ALTER TABLE `product_other_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_other_categories_product_id_unique` (`product_id`);

--
-- Indexes for table `product_reviews`
--
ALTER TABLE `product_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_variations`
--
ALTER TABLE `product_variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping_prices`
--
ALTER TABLE `shipping_prices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup_contents`
--
ALTER TABLE `signup_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variant_option_options`
--
ALTER TABLE `variant_option_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variations`
--
ALTER TABLE `variations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `variation_options`
--
ALTER TABLE `variation_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_activities`
--
ALTER TABLE `vendor_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_bank_details_temp_data`
--
ALTER TABLE `vendor_bank_details_temp_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor_products`
--
ALTER TABLE `vendor_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appearance_settings`
--
ALTER TABLE `appearance_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `auth_pages`
--
ALTER TABLE `auth_pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `home_categories`
--
ALTER TABLE `home_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `popups`
--
ALTER TABLE `popups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `products_warranties`
--
ALTER TABLE `products_warranties`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_customfields`
--
ALTER TABLE `product_customfields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `product_media`
--
ALTER TABLE `product_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `product_other_categories`
--
ALTER TABLE `product_other_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_reviews`
--
ALTER TABLE `product_reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `product_variations`
--
ALTER TABLE `product_variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `shipping_prices`
--
ALTER TABLE `shipping_prices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signup_contents`
--
ALTER TABLE `signup_contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `variant_option_options`
--
ALTER TABLE `variant_option_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `variations`
--
ALTER TABLE `variations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `variation_options`
--
ALTER TABLE `variation_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `vendor_activities`
--
ALTER TABLE `vendor_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `vendor_bank_details_temp_data`
--
ALTER TABLE `vendor_bank_details_temp_data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vendor_products`
--
ALTER TABLE `vendor_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_addresses`
--
ALTER TABLE `customer_addresses`
  ADD CONSTRAINT `customer_addresses_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
