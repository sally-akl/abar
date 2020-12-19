-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2020 at 07:48 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abar`
--

-- --------------------------------------------------------

--
-- Table structure for table `bannerads`
--

CREATE TABLE `bannerads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `banner_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enable` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bannerads`
--

INSERT INTO `bannerads` (`id`, `title`, `link`, `banner_img`, `banner_size`, `is_enable`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'لافتة رقم 1', 'https://www.google.com/', '/img/banner/de1be8e3d583b338ebf3e1f445b53c69.jpg', '200x200', 1, 9, '2020-11-25 15:04:01', '2020-11-25 15:12:14');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `publish_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `blog_img` varchar(150) NOT NULL,
  `blog_title` varchar(150) NOT NULL,
  `blog_desc` text NOT NULL,
  `is_active` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `category_name`, `publish_date`, `blog_img`, `blog_title`, `blog_desc`, `is_active`, `updated_at`, `created_at`) VALUES
(2, 'المساجد', '2020-12-13 22:00:00', '/img/project/eba2bc82e0c84c548f98e23cb85a4563.jpeg', 'مسجد اندونيسيا', 'مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير مسجد كبير', 1, '2020-12-14 17:04:24', '2020-12-14 17:04:24');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment_text` text NOT NULL,
  `is_published` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `name`, `email`, `comment_text`, `is_published`, `updated_at`, `created_at`, `blog_id`) VALUES
(1, 'احمد محمد', 'aa@yahoo.com', 'تعليقات تعليقات تعليقات تعليقات تعليقات تعليقات ر تعليقات تعليقات تعليقات تعليقات تعليقات ر ر تعليقات تعليقات', 1, '2020-12-14 17:42:49', '2020-12-14 19:37:35', 2),
(2, 'احمد احمد', '', 'هذا تعليقى', 1, '2020-12-15 10:42:21', '2020-12-15 10:42:05', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_pdf_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `begin_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `request_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `contract_signiture` mediumblob DEFAULT NULL,
  `contract_signiture_two` mediumblob DEFAULT NULL,
  `send_to_customer` int(11) NOT NULL DEFAULT 0,
  `customer_is_sign` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `created_at`, `updated_at`) VALUES
(13, 'مصر', '2020-11-07 12:34:11', '2020-11-07 12:34:11'),
(14, 'اليمن', '2020-11-08 16:21:34', '2020-11-08 16:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `customers_oponions`
--

CREATE TABLE `customers_oponions` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(250) NOT NULL,
  `country_name` varchar(100) DEFAULT NULL,
  `cutomer_opionion` varchar(250) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers_oponions`
--

INSERT INTO `customers_oponions` (`id`, `customer_name`, `country_name`, `cutomer_opionion`, `updated_at`, `created_at`) VALUES
(2, 'محمد احمد', 'اندونيسيا', 'تم العمل معهم بنجاح', '2020-12-14 19:07:37', '2020-12-14 19:07:37'),
(3, 'محمد محمد', 'غانا', 'شركة محترمة وتم العمل بنجاح', '2020-12-14 19:08:16', '2020-12-14 19:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `region_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `title`, `region_id`, `created_at`, `updated_at`) VALUES
(3, 'الحى1', 2, '2020-11-08 15:34:06', '2020-11-08 15:34:06');

-- --------------------------------------------------------

--
-- Table structure for table `extra_fields`
--

CREATE TABLE `extra_fields` (
  `id` int(10) UNSIGNED NOT NULL,
  `field_label_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_form_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field_form_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_require` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `project_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `governate`
--

CREATE TABLE `governate` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `governate`
--

INSERT INTO `governate` (`id`, `title`, `country_id`, `created_at`, `updated_at`) VALUES
(2, 'القاهرة', 13, '2020-11-07 17:35:12', '2020-11-07 17:35:12');

-- --------------------------------------------------------

--
-- Table structure for table `linkads`
--

CREATE TABLE `linkads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enable` int(11) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `linkads`
--

INSERT INTO `linkads` (`id`, `title`, `link`, `link_title`, `is_enable`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'رابط اولى', 'https://www.google.com/', 'اضغط هنا', 1, 9, '2020-11-25 15:44:47', '2020-11-25 15:44:47');

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
(3, '2020_11_04_174221_countries', 1),
(4, '2020_11_04_174412_governate', 1),
(5, '2020_11_04_174650_regions', 2),
(6, '2020_11_04_174754_districts', 2),
(7, '2020_11_04_175006_projects', 3),
(8, '2020_11_04_180214_extra_fields', 4),
(9, '2020_11_04_180439_project_extra_field', 4),
(10, '2020_11_04_182408_specialize', 5),
(11, '2020_11_04_192309_roles', 6),
(12, '2020_11_04_192534_add_role_to_users', 7),
(13, '2020_11_04_212948_add_project_category_in_extra_field', 8),
(14, '2020_11_08_212736_add_identification_num_and_mobile_to_users_table', 9),
(15, '2020_11_09_132126_add_requests_table', 10),
(16, '2020_11_09_140650_add_contracts_table', 11),
(17, '2020_11_09_152827_add_request_num_in_requests', 12),
(19, '2020_11_10_173827_add_contract_send_user_is_sign_table', 14),
(20, '2020_11_11_124659_add_project_status_to_request_table', 15),
(21, '2020_11_11_160649_projects_user_favorate', 16),
(22, '2020_11_17_112823_add_request_status_to_requests', 17),
(23, '2020_11_17_113922_add_board_name_to_request', 18),
(24, '2020_11_09_153603_add_transactions_table', 19),
(25, '2020_11_17_122022_add_request_media', 20),
(26, '2020_11_17_122323_add_customer_visits_request', 20),
(27, '2020_11_17_182704_add_location_requests_with_location', 21),
(28, '2020_11_17_193514_add_deep_area_from_to_period', 22),
(30, '2020_11_17_194110_add_details_to_projects', 23),
(31, '2020_11_17_194013_add_project_multi_prices', 24),
(32, '2020_11_23_221313_add_link_ads_marketing', 25),
(33, '2020_11_23_221616_add_banner_ads_marketing', 25),
(34, '2020_11_23_221756_add_text_ads_marketing', 25),
(35, '2020_11_23_222015_add_vedio_ads_marketing', 25);

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
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_require_for_request` tinyint(1) NOT NULL DEFAULT 0,
  `add_to_store` tinyint(1) NOT NULL DEFAULT 0,
  `first_price` double(8,2) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `gov_id` int(10) UNSIGNED DEFAULT NULL,
  `region_id` int(10) UNSIGNED DEFAULT NULL,
  `district_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deep` varchar(250) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` int(11) NOT NULL,
  `to` int(11) NOT NULL,
  `period_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_num`, `project_name`, `project_photo`, `project_status`, `project_category`, `is_require_for_request`, `add_to_store`, `first_price`, `category_id`, `gov_id`, `region_id`, `district_id`, `created_at`, `updated_at`, `deep`, `from`, `to`, `period_type`, `details`) VALUES
(1, 'sFX5lvi3do', 'حفر بئرا جديدا', '/img/project/e541356fa6085e9dc9e27f40ef5c2e37.jpg', 'مفعل', 'ابار', 1, 1, 100.00, 13, 2, 2, 3, NULL, '2020-12-15 05:59:05', '10-17', 3, 6, 'اشهر', NULL),
(3, 'ye6b9cSJm2', 'بئر سطحى بالدلو', '/img/project/33fde366eff6e62242564bfe827b6044.jpeg', 'مفعل', 'ابار', 1, 1, 3500.00, 14, NULL, NULL, NULL, '2020-11-21 14:31:02', '2020-12-15 18:57:26', '10-17', 10, 15, 'ايام', NULL),
(7, 'pRxDqPYeIq', 'مسجد', '/img/project/ced9c7e40d0b13231051af26f7df3647.jpeg', 'مفعل', 'مساجد', 1, 1, NULL, 13, NULL, NULL, NULL, '2020-11-22 16:15:51', '2020-12-15 16:06:00', NULL, 6, 12, 'اشهر', 'مسجد'),
(8, 'sV6STF4pEK', 'مدرسة جديدة', '/img/project/5009ec217aec709c4ad232b00632b10a.jpeg', 'مفعل', 'مراكز ومدارس', 1, 1, 2000.00, 13, NULL, NULL, NULL, '2020-12-15 15:59:09', '2020-12-15 15:59:09', NULL, 3, 6, 'اشهر', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `project_extra_field`
--

CREATE TABLE `project_extra_field` (
  `id` int(10) UNSIGNED NOT NULL,
  `extra_id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_multi_prices`
--

CREATE TABLE `project_multi_prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `project_details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prayer_num` int(11) NOT NULL,
  `ceil_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` int(11) NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_multi_prices`
--

INSERT INTO `project_multi_prices` (`id`, `project_id`, `project_details`, `prayer_num`, `ceil_type`, `area`, `price`, `created_at`, `updated_at`) VALUES
(6, 7, 'مسجد صغير', 90, 'زنك', 60, 2200.00, '2020-12-15 16:06:00', '2020-12-15 16:06:00'),
(7, 7, 'مسجد متوسط', 120, 'زنك', 100, 33000.00, '2020-12-15 16:06:00', '2020-12-15 16:06:00'),
(8, 7, 'مسجد كبير', 450, 'زنك', 225, 50000.00, '2020-12-15 16:06:00', '2020-12-15 16:06:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_user_fav`
--

CREATE TABLE `project_user_fav` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_user_fav`
--

INSERT INTO `project_user_fav` (`id`, `project_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 3, 3, '2020-12-16 16:04:00', '2020-12-16 16:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `regions`
--

CREATE TABLE `regions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gov_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `regions`
--

INSERT INTO `regions` (`id`, `title`, `gov_id`, `created_at`, `updated_at`) VALUES
(2, 'مصر الجديدة', 2, '2020-11-07 18:34:44', '2020-11-07 19:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `how_know_me` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `request_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `request_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_status` int(11) NOT NULL DEFAULT 0,
  `request_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `location_request` tinyint(1) NOT NULL DEFAULT 0,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_project` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `user_id`, `project_id`, `how_know_me`, `request_date`, `created_at`, `updated_at`, `request_num`, `project_status`, `request_status`, `board_name`, `location_request`, `location`, `sub_project`) VALUES
(1, 3, 1, 'google', '2020-11-23 17:13:38', NULL, '2020-11-23 15:13:38', 'kjdjfkdjg', 2, 'حجز', 'board 1', 1, '16.734623882642484,50.05448593750001', NULL),
(2, 11, 7, '', '2020-12-16 22:00:00', '2020-12-17 10:58:46', '2020-12-17 10:58:46', '11_yCJHe6sbwJ', 1, 'طلب', 'احمد احمد محمد', 0, NULL, 6),
(3, 11, 3, '', '2020-12-16 22:00:00', '2020-12-17 11:26:22', '2020-12-17 11:26:22', '11_wKSaghu19Q', 1, 'طلب', 'احمد احمد محمد', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `request_media`
--

CREATE TABLE `request_media` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `vedio` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `media_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `request_media`
--

INSERT INTO `request_media` (`id`, `title`, `request_id`, `image`, `vedio`, `media_type`, `created_at`, `updated_at`) VALUES
(1, 'صورة جديدة لسير المشروع', 1, '/img/media/f05c852b49651974436d8f516a5f2cb5.jpg', NULL, 'image', '2020-11-17 14:44:07', '2020-11-17 14:44:07'),
(3, 'فيديو جديد للمشروع', 1, NULL, 'https://www.youtube.com/embed/CQqkyZdMFGc', 'vedio', '2020-11-17 15:25:51', '2020-11-17 15:25:51');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'customer', NULL, NULL),
(3, 'marketer', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `header_text` text NOT NULL,
  `done_projects_num` varchar(250) NOT NULL,
  `customer_num` varchar(250) NOT NULL,
  `countries_num` varchar(250) NOT NULL,
  `befend_num` varchar(250) NOT NULL,
  `phone` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `instegrame` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `address` varchar(150) NOT NULL,
  `vedio_intro` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `header_text`, `done_projects_num`, `customer_num`, `countries_num`, `befend_num`, `phone`, `email`, `facebook`, `youtube`, `instegrame`, `twitter`, `updated_at`, `created_at`, `address`, `vedio_intro`) VALUES
(1, 'أحفر بئراً أو أبني مسجداً لدى جهة رسمية و مرخصة تُتقدر قيمة مشروعك', '700', '500', '8', '50,000', '+0553006174', 'info@yahoo.com', 'https://www.facebook.com/100647691526982', 'https://www.youtube.com/channel/UCk8zYF_K_uf9pxuiWBpxBHA', 'https://www.instagram.com/abar.alseqaya', 'https://twitter.com/abar66041292', '2020-12-15 06:37:15', '2020-12-14 15:49:15', 'جده – حي الفيحاء – شارع عبدالله السليمان – بجوار جامع الحمودي', 'https://www.youtube.com/watch?v=F6mvChPzuV8');

-- --------------------------------------------------------

--
-- Table structure for table `specialize`
--

CREATE TABLE `specialize` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `spec_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialize`
--

INSERT INTO `specialize` (`id`, `title`, `spec_type`, `project_id`, `created_at`, `updated_at`) VALUES
(31, 'صالح للشرب والاستخدام الادامى', 'character', 1, '2020-12-15 05:59:06', '2020-12-15 05:59:06'),
(34, 'مدرسة  كبيرة', 'character', 8, '2020-12-15 15:59:09', '2020-12-15 15:59:09'),
(35, 'سور كبير', 'character', 8, '2020-12-15 15:59:09', '2020-12-15 15:59:09'),
(36, 'فصول متعددة', 'character', 8, '2020-12-15 15:59:09', '2020-12-15 15:59:09'),
(37, 'صالح للشرب والاستخدام الادامى', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26'),
(38, 'محمى من الاتربة', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26'),
(39, 'محمى من الاتربة', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26'),
(40, 'محمى من الاتربة', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26'),
(41, 'محمى من الاتربة', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26'),
(42, 'محمى من الاتربة', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26'),
(43, 'محمى من الاتربة', 'character', 3, '2020-12-15 18:57:26', '2020-12-15 18:57:26');

-- --------------------------------------------------------

--
-- Table structure for table `textads`
--

CREATE TABLE `textads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enable` int(11) NOT NULL,
  `border_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `textads`
--

INSERT INTO `textads` (`id`, `title`, `link`, `content`, `is_enable`, `border_color`, `text_size`, `text_color`, `background_color`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'xxxxx', 'https://www.google.com/', 'ccccccccccccccccccccccccccc', 1, 'rgb(39, 176, 191)', '20', 'rgb(0, 255, 144)', 'rgb(0, 65, 255)', 9, '2020-11-25 17:52:29', '2020-11-25 17:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `transaction_num` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(10) UNSIGNED DEFAULT NULL,
  `request_id` int(10) UNSIGNED DEFAULT NULL,
  `transfer_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_payable` int(11) NOT NULL,
  `transfer_payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paymentToken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paymentId` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ibn` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_num`, `project_id`, `request_id`, `transfer_date`, `is_payable`, `transfer_payment_type`, `paymentToken`, `paymentId`, `amount`, `created_at`, `updated_at`, `bank_name`, `bank_account_number`, `bank_ibn`) VALUES
(1, '#try_88575mj', 1, 1, '2020-12-18 08:15:55', 0, 'حوالة بنكية', '', '', 200.00, NULL, NULL, 'مصرف الانماء ', ' 68202442131000 ', ' SA3705000068202442131000'),
(2, '#AXGvhaGqsL', 7, 2, '2020-12-16 22:00:00', 0, 'حوالة بنكية', NULL, NULL, 22000.00, '2020-12-17 10:58:46', '2020-12-17 10:58:46', 'مصرف الانماء ', ' 68202442131000 ', ' SA3705000068202442131000'),
(3, '#Y5sF0mm8CP', 3, 3, '2020-12-16 22:00:00', 0, 'حوالة بنكية', NULL, NULL, 3500.00, '2020-12-17 11:26:22', '2020-12-17 11:26:22', 'البنك الاهلى ', ' 12600000352800 ', ' SA9210000012600000352800');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `identity_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role_id`, `identity_num`, `mobile`) VALUES
(2, 'admin', 'admin@admin.com', NULL, '$2y$10$T1HpU833cwqKxqHTr0nXCOvQLMs0w19Z.Vg0I6WZzSEut//qQX7z2', NULL, '2020-11-05 14:06:33', '2020-11-05 14:06:33', 1, NULL, NULL),
(3, 'customer1', 'customer@yahoo.com', NULL, '$2y$10$.XAPL924rhMXsUsy4kQyFuCEdRw7eZFp/.ZBZfj2twPK/lDOYhSNC', NULL, '2020-11-05 20:01:09', '2020-11-09 08:15:06', 2, '12345678465', '01009875647'),
(5, 'customer2', 'customer2@yahoo.com', NULL, '$2y$10$MfWhrIop0/RfYcm4cpF8MODIXUbCTlur1r3EhVbktCvm8KV3NZJZG', NULL, '2020-11-09 08:26:48', '2020-11-09 08:26:48', 2, '12345678465', '01009876543'),
(9, 'المسوق1', 'marketer1@yahoo.com', NULL, '$2y$10$6/UnkMQhcrukKA.Z1wopIOLmwZyss4.ZGqCeaYV1MvvBwLq0kGMJy', NULL, '2020-11-09 09:55:05', '2020-11-09 09:55:05', 3, '12345678465', '01007654345'),
(11, 'احمد احمد محمد', 'customer3@yahoo.com', NULL, '$2y$10$DUMPYXv/GT/vvdt5NgPwEecYH5FDZxtmTXH5/WjSJdIRo.l.DN51W', NULL, '2020-12-17 10:53:39', '2020-12-17 10:53:39', 2, '66426476247624', '7384782648264');

-- --------------------------------------------------------

--
-- Table structure for table `vedioads`
--

CREATE TABLE `vedioads` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vedio_link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_enable` int(11) NOT NULL,
  `width` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_txt` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vedioads`
--

INSERT INTO `vedioads` (`id`, `title`, `link`, `vedio_link`, `is_enable`, `width`, `height`, `button_txt`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'فيديو 1', 'https://www.google.com/', 'https://www.youtube.com/watch?v=bg6vYLs5DKg', 1, '200', '200', 'اضغط المزيد', 9, '2020-11-25 16:30:08', '2020-11-25 16:30:08');

-- --------------------------------------------------------

--
-- Table structure for table `visits_requests`
--

CREATE TABLE `visits_requests` (
  `id` int(10) UNSIGNED NOT NULL,
  `request_id` int(10) UNSIGNED NOT NULL,
  `visit_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visit_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visit_time_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `visite_admin_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visits_requests`
--

INSERT INTO `visits_requests` (`id`, `request_id`, `visit_date`, `visit_time`, `visit_time_type`, `visite_admin_status`, `reason`, `created_at`, `updated_at`) VALUES
(2, 1, '2020-11-19 15:52:03', '10', 'am', '1', 'ءءءءءءءءءءءءءءءءء', '2020-11-19 13:19:05', '2020-11-19 13:52:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bannerads`
--
ALTER TABLE `bannerads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bannerads_user_id_foreign` (`user_id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_blog` (`blog_id`);

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contracts_request_id_foreign` (`request_id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers_oponions`
--
ALTER TABLE `customers_oponions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_region_id_foreign` (`region_id`);

--
-- Indexes for table `extra_fields`
--
ALTER TABLE `extra_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `governate`
--
ALTER TABLE `governate`
  ADD PRIMARY KEY (`id`),
  ADD KEY `governate_country_id_foreign` (`country_id`);

--
-- Indexes for table `linkads`
--
ALTER TABLE `linkads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `linkads_user_id_foreign` (`user_id`);

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
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `projects_project_num_unique` (`project_num`),
  ADD KEY `projects_category_id_foreign` (`category_id`),
  ADD KEY `projects_gov_id_foreign` (`gov_id`),
  ADD KEY `projects_region_id_foreign` (`region_id`),
  ADD KEY `projects_district_id_foreign` (`district_id`);

--
-- Indexes for table `project_extra_field`
--
ALTER TABLE `project_extra_field`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_extra_field_extra_id_foreign` (`extra_id`),
  ADD KEY `project_extra_field_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_multi_prices`
--
ALTER TABLE `project_multi_prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_multi_prices_project_id_foreign` (`project_id`);

--
-- Indexes for table `project_user_fav`
--
ALTER TABLE `project_user_fav`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_user_fav_project_id_foreign` (`project_id`),
  ADD KEY `project_user_fav_user_id_foreign` (`user_id`);

--
-- Indexes for table `regions`
--
ALTER TABLE `regions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `regions_gov_id_foreign` (`gov_id`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requests_user_id_foreign` (`user_id`),
  ADD KEY `requests_project_id_foreign` (`project_id`);

--
-- Indexes for table `request_media`
--
ALTER TABLE `request_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_media_request_id_foreign` (`request_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialize`
--
ALTER TABLE `specialize`
  ADD PRIMARY KEY (`id`),
  ADD KEY `specialize_project_id_foreign` (`project_id`);

--
-- Indexes for table `textads`
--
ALTER TABLE `textads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `textads_user_id_foreign` (`user_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_project_id_foreign` (`project_id`),
  ADD KEY `transactions_request_id_foreign` (`request_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `vedioads`
--
ALTER TABLE `vedioads`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vedioads_user_id_foreign` (`user_id`);

--
-- Indexes for table `visits_requests`
--
ALTER TABLE `visits_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `visits_requests_request_id_foreign` (`request_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bannerads`
--
ALTER TABLE `bannerads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contracts`
--
ALTER TABLE `contracts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers_oponions`
--
ALTER TABLE `customers_oponions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `extra_fields`
--
ALTER TABLE `extra_fields`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `governate`
--
ALTER TABLE `governate`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `linkads`
--
ALTER TABLE `linkads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_extra_field`
--
ALTER TABLE `project_extra_field`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_multi_prices`
--
ALTER TABLE `project_multi_prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `project_user_fav`
--
ALTER TABLE `project_user_fav`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `regions`
--
ALTER TABLE `regions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `request_media`
--
ALTER TABLE `request_media`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialize`
--
ALTER TABLE `specialize`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `textads`
--
ALTER TABLE `textads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `vedioads`
--
ALTER TABLE `vedioads`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visits_requests`
--
ALTER TABLE `visits_requests`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bannerads`
--
ALTER TABLE `bannerads`
  ADD CONSTRAINT `bannerads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD CONSTRAINT `fk_blog` FOREIGN KEY (`blog_id`) REFERENCES `blog` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `contracts_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `governate`
--
ALTER TABLE `governate`
  ADD CONSTRAINT `governate_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `linkads`
--
ALTER TABLE `linkads`
  ADD CONSTRAINT `linkads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `projects`
--
ALTER TABLE `projects`
  ADD CONSTRAINT `projects_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_gov_id_foreign` FOREIGN KEY (`gov_id`) REFERENCES `governate` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `projects_region_id_foreign` FOREIGN KEY (`region_id`) REFERENCES `regions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_extra_field`
--
ALTER TABLE `project_extra_field`
  ADD CONSTRAINT `project_extra_field_extra_id_foreign` FOREIGN KEY (`extra_id`) REFERENCES `extra_fields` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_extra_field_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_multi_prices`
--
ALTER TABLE `project_multi_prices`
  ADD CONSTRAINT `project_multi_prices_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `project_user_fav`
--
ALTER TABLE `project_user_fav`
  ADD CONSTRAINT `project_user_fav_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `project_user_fav_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `regions`
--
ALTER TABLE `regions`
  ADD CONSTRAINT `regions_gov_id_foreign` FOREIGN KEY (`gov_id`) REFERENCES `governate` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `requests`
--
ALTER TABLE `requests`
  ADD CONSTRAINT `requests_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `requests_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `request_media`
--
ALTER TABLE `request_media`
  ADD CONSTRAINT `request_media_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `specialize`
--
ALTER TABLE `specialize`
  ADD CONSTRAINT `specialize_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `textads`
--
ALTER TABLE `textads`
  ADD CONSTRAINT `textads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_project_id_foreign` FOREIGN KEY (`project_id`) REFERENCES `projects` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `transactions_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `vedioads`
--
ALTER TABLE `vedioads`
  ADD CONSTRAINT `vedioads_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `visits_requests`
--
ALTER TABLE `visits_requests`
  ADD CONSTRAINT `visits_requests_request_id_foreign` FOREIGN KEY (`request_id`) REFERENCES `requests` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
