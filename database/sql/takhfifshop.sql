-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 07, 2022 at 11:05 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `takhfifshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('short_top','long_top','bottom') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blacklists`
--

CREATE TABLE `blacklists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `text` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `image_id`, `created_at`, `updated_at`) VALUES
(9, 'KACON/KASYS', 'kaconkasys', 134, '2021-10-14 09:24:42', '2021-10-14 09:24:42'),
(10, 'KOINO', 'koino', 185, '2021-10-19 15:52:14', '2021-10-19 15:52:14');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` bigint(20) UNSIGNED DEFAULT NULL,
  `level` enum('1','2','3') COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `parent_id`, `level`, `image_id`, `created_at`, `updated_at`) VALUES
(22, 'KACON/KASYS', 'kaconkasys', NULL, '1', 135, '2021-10-14 09:25:10', '2021-10-14 09:25:10'),
(23, 'انواع رله و سوکت', 'انواع-رله-و-سوکت', 22, '2', 136, '2021-10-14 09:28:30', '2021-10-14 09:28:30'),
(24, 'رله دوکنتاکت 8پایه 5آمپر K705-2PL', 'رله-دوکنتاکت-8پایه-5آمپر-k705-2pl', 23, '3', 138, '2021-10-14 16:50:05', '2021-10-15 15:41:37'),
(25, 'رله چهار کنتاکت 14پایه 3آمپر K705-4PL', 'رله-چهار-کنتاکت-14پایه-3آمپر-k705-4pl', 23, '3', 139, '2021-10-14 17:00:47', '2021-10-15 15:41:17'),
(26, 'رله کتابی 2کنتاکت K706-2PLT', 'رله-کتابی-2کنتاکت-k706-2plt', 23, '3', 140, '2021-10-14 17:10:24', '2021-10-15 15:33:02'),
(27, 'رله PLC وسوکت', 'رله-plc-وسوکت', 23, '3', NULL, '2021-10-14 18:11:36', '2021-10-14 18:11:36'),
(28, 'رله دوکنتاکت 8پایه 10آمپر K707-2PL', 'رله-دوکنتاکت-8پایه-10آمپر-k707-2pl', 23, '3', 149, '2021-10-15 15:19:35', '2021-10-15 15:31:53'),
(29, 'رله سه کنتاکت 11پایه 10آمپر K707-3PL', 'رله-سه-کنتاکت-11پایه-10آمپر-k707-3pl', 23, '3', 151, '2021-10-15 15:42:13', '2021-10-15 15:42:13'),
(30, 'رله دوکنتاکت 8پایه 10آمپر K710-2PL', 'رله-دوکنتاکت-8پایه-10آمپر-k710-2pl', 23, '3', 152, '2021-10-15 15:45:35', '2021-10-15 15:45:35'),
(31, 'سوکت 8پایه و 11پایه تایمر', 'سوکت-8پایه-و-11پایه-تایمر', 23, '3', 154, '2021-10-15 15:58:19', '2021-10-15 15:58:19'),
(32, 'لیمیت سوئیچ', 'لیمیت-سوئیچ', 22, '2', 179, '2021-10-15 16:01:54', '2021-10-16 05:28:50'),
(33, 'لیمیت سوئیچ سری KLM', 'لیمیت-سوئیچ-سری-klm', 32, '3', NULL, '2021-10-15 16:02:56', '2021-10-15 16:02:56'),
(34, 'لیمیت سوئیچ سری KLS', 'لیمیت-سوئیچ-سری-kls', 32, '3', NULL, '2021-10-15 16:03:23', '2021-10-15 16:03:23'),
(35, 'لیمیت سوئیچ سری ZXM', 'لیمیت-سوئیچ-سری-zxm', 32, '3', NULL, '2021-10-15 16:03:53', '2021-10-15 16:03:53'),
(36, 'لیمیت سوئیچ سری ZXL', 'لیمیت-سوئیچ-سری-zxl', 32, '3', NULL, '2021-10-15 16:04:12', '2021-10-15 16:04:12'),
(37, 'میکروسوئیچ', 'میکروسوئیچ', 22, '2', 180, '2021-10-15 16:04:41', '2021-10-16 05:30:12'),
(38, 'سری V15', 'سری-v15', 37, '3', NULL, '2021-10-15 16:05:04', '2021-10-15 16:05:59'),
(39, 'سری Z15', 'سری-z15', 37, '3', NULL, '2021-10-15 16:05:35', '2021-10-15 16:05:35'),
(40, 'رله حالت جامد SSR', 'رله-حالت-جامد-ssr', 22, '2', 181, '2021-10-15 16:19:16', '2021-10-16 05:30:57'),
(41, 'تکفاز KMSR-DS IN:DC OUT:480V AC', 'تکفاز-kmsr-ds-indc-out480v-ac', 40, '3', NULL, '2021-10-15 16:21:02', '2021-10-15 16:21:02'),
(42, 'سه فاز KMSR-DT IN:DC OUT:480V AC', 'سه-فاز-kmsr-dt-indc-out480v-ac', 40, '3', NULL, '2021-10-15 16:21:45', '2021-10-15 16:21:45'),
(43, 'سه فاز KMSR-AT IN:DC OUT:480V AC', 'سه-فاز-kmsr-at-indc-out480v-ac', 40, '3', NULL, '2021-10-15 16:21:57', '2021-10-15 16:21:57'),
(44, 'سوکت سری KMY جهت رله K705', 'سوکت-سری-kmy-جهت-رله-k705', 23, '3', NULL, '2021-10-15 16:34:30', '2021-10-15 16:34:30'),
(45, 'سوکت KPX', 'سوکت-kpx', 23, '3', NULL, '2021-10-15 20:43:30', '2021-10-15 20:43:30'),
(46, 'پدال Foot Switch', 'پدال-foot-switch', 22, '2', 182, '2021-10-15 20:54:52', '2021-10-16 05:33:19'),
(47, 'سری HRF', 'سری-hrf', 46, '3', NULL, '2021-10-15 20:55:12', '2021-10-15 20:55:12'),
(48, 'KOINO', 'koino', NULL, '1', 184, '2021-10-19 14:33:07', '2021-10-19 14:33:07'),
(49, 'سنسورهای القایی', 'سنسورهای-القایی', 48, '2', NULL, '2021-10-19 14:34:48', '2021-10-19 14:34:48'),
(50, 'سنسورهای خازنی', 'سنسورهای-خازنی', 48, '2', NULL, '2021-10-19 14:35:11', '2021-10-19 14:35:11'),
(51, 'سنسورهای نوری', 'سنسورهای-نوری', 48, '2', NULL, '2021-10-19 14:35:30', '2021-10-19 14:35:30'),
(52, 'کنترلر سنسور', 'کنترلر-سنسور', 48, '2', NULL, '2021-10-19 14:35:59', '2021-10-19 14:35:59'),
(53, 'تایمرها', 'تایمرها', 48, '2', NULL, '2021-10-19 14:36:27', '2021-10-19 14:36:27'),
(54, 'کابل کانکتورها', 'کابل-کانکتورها', 48, '2', NULL, '2021-10-19 14:37:07', '2021-10-19 14:37:07'),
(55, 'شستی ها و سلکتور سوئیچ ها', 'شستی-ها-و-سلکتور-سوئیچ-ها', 48, '2', NULL, '2021-10-19 14:37:51', '2021-10-19 14:37:51'),
(56, 'بیزر قطر 22', 'بیزر-قطر-22', 48, '2', NULL, '2021-10-19 14:38:10', '2021-10-19 14:38:10'),
(57, 'کلید جرثقیل امرجنسی دار', 'کلید-جرثقیل-امرجنسی-دار', 48, '2', NULL, '2021-10-19 14:38:52', '2021-10-19 14:38:52'),
(58, 'رله کنترل سطح الکترودی', 'رله-کنترل-سطح-الکترودی', 48, '2', NULL, '2021-10-19 14:39:25', '2021-10-19 14:39:25'),
(59, 'IPX/KPX', 'ipxkpx', 49, '3', NULL, '2021-10-19 14:40:34', '2021-10-19 14:40:34'),
(60, 'CPX', 'cpx', 50, '3', NULL, '2021-10-19 14:40:50', '2021-10-19 14:40:50'),
(61, 'مکعبی خروجی رله ضدآب KPS-AL', 'مکعبی-خروجی-رله-ضدآب-kps-al', 51, '3', NULL, '2021-10-19 14:43:02', '2021-10-19 14:43:02'),
(62, 'مکعبی خروجی رله KPS-AR', 'مکعبی-خروجی-رله-kps-ar', 51, '3', NULL, '2021-10-19 14:43:48', '2021-10-19 14:43:48'),
(63, 'رفلکتور یدکی', 'رفلکتور-یدکی', 51, '3', NULL, '2021-10-19 14:44:21', '2021-10-19 14:44:21'),
(64, 'چشم U کوچک 5 میلیمتر KPS-M', 'چشم-u-کوچک-5-میلیمتر-kps-m', 51, '3', NULL, '2021-10-19 14:45:32', '2021-10-19 14:45:32'),
(65, 'مکعبی کوچک خروجی ترانزیستوری KPS-Z', 'مکعبی-کوچک-خروجی-ترانزیستوری-kps-z', 51, '3', NULL, '2021-10-19 14:46:27', '2021-10-19 14:46:27'),
(66, 'مکعبی بسیار کوچک مقابل هم KPS-C', 'مکعبی-بسیار-کوچک-مقابل-هم-kps-c', 51, '3', NULL, '2021-10-19 14:47:16', '2021-10-19 14:47:16'),
(67, 'چشم قطر 18 KPS-O', 'چشم-قطر-18-kps-o', 51, '3', NULL, '2021-10-19 14:47:51', '2021-10-19 14:47:51'),
(68, 'KPS-C', 'kps-c', 52, '3', NULL, '2021-10-19 14:48:51', '2021-10-19 14:48:51'),
(69, 'KTM', 'ktm', 53, '3', NULL, '2021-10-19 14:49:40', '2021-10-19 14:49:40'),
(70, 'D6SW', 'd6sw', 54, '3', NULL, '2021-10-19 14:50:01', '2021-10-19 14:50:01'),
(71, 'شستی استارت استپ NS22-PM', 'شستی-استارت-استپ-ns22-pm', 55, '3', NULL, '2021-10-19 14:52:07', '2021-10-19 14:52:07'),
(72, 'شستی چراغدار NS22-BM', 'شستی-چراغدار-ns22-bm', 55, '3', NULL, '2021-10-19 14:53:26', '2021-10-19 14:53:26'),
(73, 'شستی قفل شو NS22-PA', 'شستی-قفل-شو-ns22-pa', 55, '3', NULL, '2021-10-19 14:54:01', '2021-10-19 14:54:01'),
(74, 'شستی قارچی NS22-PEM', 'شستی-قارچی-ns22-pem', 55, '3', NULL, '2021-10-19 14:54:32', '2021-10-19 14:54:32'),
(75, 'شستی دوبل NS22-DM', 'شستی-دوبل-ns22-dm', 55, '3', NULL, '2021-10-19 14:55:01', '2021-10-19 14:55:01'),
(76, 'سلکتور یک طرفه و دوطرفه NS22-S', 'سلکتور-یک-طرفه-و-دوطرفه-ns22-s', 55, '3', NULL, '2021-10-19 14:56:09', '2021-10-19 14:56:09'),
(77, 'سلکتور یک طرفه و دوطرفه برگشتی  NS22-SA', 'سلکتور-یک-طرفه-و-دوطرفه-برگشتی-ns22-sa', 55, '3', NULL, '2021-10-19 14:58:58', '2021-10-19 14:58:58'),
(78, 'سلکتور یک طرفه چراغدار NS22-S2-L', 'سلکتور-یک-طرفه-چراغدار-ns22-s2-l', 55, '3', NULL, '2021-10-19 14:59:47', '2021-10-19 14:59:47'),
(79, 'سلکتور یک طرفه و دوطرفه کلیددار NS22-K', 'سلکتور-یک-طرفه-و-دوطرفه-کلیددار-ns22-k', 55, '3', NULL, '2021-10-19 15:00:29', '2021-10-19 15:00:29'),
(80, 'سلکتور یک طرفه کلیددار برگشتی NS22-KA', 'سلکتور-یک-طرفه-کلیددار-برگشتی-ns22-ka', 55, '3', NULL, '2021-10-19 15:01:34', '2021-10-19 15:01:34'),
(81, 'کنتاکت کمکی باز و بسته', 'کنتاکت-کمکی-باز-و-بسته', 55, '3', NULL, '2021-10-19 15:02:10', '2021-10-19 15:02:10'),
(82, 'پلاک شستی', 'پلاک-شستی', 55, '3', NULL, '2021-10-19 15:02:29', '2021-10-19 15:02:29'),
(83, 'LED یدکی', 'led-یدکی', 55, '3', NULL, '2021-10-19 15:02:49', '2021-10-19 15:02:49'),
(84, 'امرجنسی قفل شو', 'امرجنسی-قفل-شو', 55, '3', NULL, '2021-10-19 15:03:15', '2021-10-19 15:03:15'),
(85, 'BUZZER KH-4022 | 24VAC/DC', 'buzzer-kh-4022-24vacdc', 56, '3', NULL, '2021-10-19 15:07:21', '2021-10-19 15:07:21'),
(86, 'KH-7 SERIES', 'kh-7-series', 57, '3', NULL, '2021-10-19 15:09:43', '2021-10-19 15:09:43'),
(87, 'KFS SERIES', 'kfs-series', 58, '3', NULL, '2021-10-19 15:10:05', '2021-10-19 15:10:05'),
(88, 'SENSYS', 'sensys', NULL, '1', 237, '2021-10-21 07:03:45', '2021-10-21 07:03:45');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `province_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'تبريز', NULL, NULL),
(2, 1, 'كندوان', NULL, NULL),
(3, 1, 'بندر شرفخانه', NULL, NULL),
(4, 1, 'مراغه', NULL, NULL),
(5, 1, 'ميانه', NULL, NULL),
(6, 1, 'شبستر', NULL, NULL),
(7, 1, 'مرند', NULL, NULL),
(8, 1, 'جلفا', NULL, NULL),
(9, 1, 'سراب', NULL, NULL),
(10, 1, 'هاديشهر', NULL, NULL),
(11, 1, 'بناب', NULL, NULL),
(12, 1, 'كليبر', NULL, NULL),
(13, 1, 'تسوج', NULL, NULL),
(14, 1, 'اهر', NULL, NULL),
(15, 1, 'هريس', NULL, NULL),
(16, 1, 'عجبشير', NULL, NULL),
(17, 1, 'هشترود', NULL, NULL),
(18, 1, 'ملكان', NULL, NULL),
(19, 1, 'بستان آباد', NULL, NULL),
(20, 1, 'ورزقان', NULL, NULL),
(21, 1, 'اسكو', NULL, NULL),
(22, 1, 'آذر شهر', NULL, NULL),
(23, 1, 'قره آغاج', NULL, NULL),
(24, 1, 'ممقان', NULL, NULL),
(25, 1, 'صوفیان', NULL, NULL),
(26, 1, 'ایلخچی', NULL, NULL),
(27, 1, 'خسروشهر', NULL, NULL),
(28, 1, 'باسمنج', NULL, NULL),
(29, 1, 'سهند', NULL, NULL),
(30, 2, 'اروميه', NULL, NULL),
(31, 2, 'نقده', NULL, NULL),
(32, 2, 'ماكو', NULL, NULL),
(33, 2, 'تكاب', NULL, NULL),
(34, 2, 'خوي', NULL, NULL),
(35, 2, 'مهاباد', NULL, NULL),
(36, 2, 'سر دشت', NULL, NULL),
(37, 2, 'چالدران', NULL, NULL),
(38, 2, 'بوكان', NULL, NULL),
(39, 2, 'مياندوآب', NULL, NULL),
(40, 2, 'سلماس', NULL, NULL),
(41, 2, 'شاهين دژ', NULL, NULL),
(42, 2, 'پيرانشهر', NULL, NULL),
(43, 2, 'سيه چشمه', NULL, NULL),
(44, 2, 'اشنويه', NULL, NULL),
(45, 2, 'چایپاره', NULL, NULL),
(46, 2, 'پلدشت', NULL, NULL),
(47, 2, 'شوط', NULL, NULL),
(48, 3, 'اردبيل', NULL, NULL),
(49, 3, 'سرعين', NULL, NULL),
(50, 3, 'بيله سوار', NULL, NULL),
(51, 3, 'پارس آباد', NULL, NULL),
(52, 3, 'خلخال', NULL, NULL),
(53, 3, 'مشگين شهر', NULL, NULL),
(54, 3, 'مغان', NULL, NULL),
(55, 3, 'نمين', NULL, NULL),
(56, 3, 'نير', NULL, NULL),
(57, 3, 'كوثر', NULL, NULL),
(58, 3, 'كيوي', NULL, NULL),
(59, 3, 'گرمي', NULL, NULL),
(60, 4, 'اصفهان', NULL, NULL),
(61, 4, 'فريدن', NULL, NULL),
(62, 4, 'فريدون شهر', NULL, NULL),
(63, 4, 'فلاورجان', NULL, NULL),
(64, 4, 'گلپايگان', NULL, NULL),
(65, 4, 'دهاقان', NULL, NULL),
(66, 4, 'نطنز', NULL, NULL),
(67, 4, 'نايين', NULL, NULL),
(68, 4, 'تيران', NULL, NULL),
(69, 4, 'كاشان', NULL, NULL),
(70, 4, 'فولاد شهر', NULL, NULL),
(71, 4, 'اردستان', NULL, NULL),
(72, 4, 'سميرم', NULL, NULL),
(73, 4, 'درچه', NULL, NULL),
(74, 4, 'کوهپایه', NULL, NULL),
(75, 4, 'مباركه', NULL, NULL),
(76, 4, 'شهرضا', NULL, NULL),
(77, 4, 'خميني شهر', NULL, NULL),
(78, 4, 'شاهين شهر', NULL, NULL),
(79, 4, 'نجف آباد', NULL, NULL),
(80, 4, 'دولت آباد', NULL, NULL),
(81, 4, 'زرين شهر', NULL, NULL),
(82, 4, 'آران و بيدگل', NULL, NULL),
(83, 4, 'باغ بهادران', NULL, NULL),
(84, 4, 'خوانسار', NULL, NULL),
(85, 4, 'مهردشت', NULL, NULL),
(86, 4, 'علويجه', NULL, NULL),
(87, 4, 'عسگران', NULL, NULL),
(88, 4, 'نهضت آباد', NULL, NULL),
(89, 4, 'حاجي آباد', NULL, NULL),
(90, 4, 'تودشک', NULL, NULL),
(91, 4, 'ورزنه', NULL, NULL),
(92, 6, 'ايلام', NULL, NULL),
(93, 6, 'مهران', NULL, NULL),
(94, 6, 'دهلران', NULL, NULL),
(95, 6, 'آبدانان', NULL, NULL),
(96, 6, 'شيروان چرداول', NULL, NULL),
(97, 6, 'دره شهر', NULL, NULL),
(98, 6, 'ايوان', NULL, NULL),
(99, 6, 'سرابله', NULL, NULL),
(100, 7, 'بوشهر', NULL, NULL),
(101, 7, 'تنگستان', NULL, NULL),
(102, 7, 'دشتستان', NULL, NULL),
(103, 7, 'دير', NULL, NULL),
(104, 7, 'ديلم', NULL, NULL),
(105, 7, 'كنگان', NULL, NULL),
(106, 7, 'گناوه', NULL, NULL),
(107, 7, 'ريشهر', NULL, NULL),
(108, 7, 'دشتي', NULL, NULL),
(109, 7, 'خورموج', NULL, NULL),
(110, 7, 'اهرم', NULL, NULL),
(111, 7, 'برازجان', NULL, NULL),
(112, 7, 'خارك', NULL, NULL),
(113, 7, 'جم', NULL, NULL),
(114, 7, 'کاکی', NULL, NULL),
(115, 7, 'عسلویه', NULL, NULL),
(116, 7, 'بردخون', NULL, NULL),
(117, 8, 'تهران', NULL, NULL),
(118, 8, 'ورامين', NULL, NULL),
(119, 8, 'فيروزكوه', NULL, NULL),
(120, 8, 'ري', NULL, NULL),
(121, 8, 'دماوند', NULL, NULL),
(122, 8, 'اسلامشهر', NULL, NULL),
(123, 8, 'رودهن', NULL, NULL),
(124, 8, 'لواسان', NULL, NULL),
(125, 8, 'بومهن', NULL, NULL),
(126, 8, 'تجريش', NULL, NULL),
(127, 8, 'فشم', NULL, NULL),
(128, 8, 'كهريزك', NULL, NULL),
(129, 8, 'پاكدشت', NULL, NULL),
(130, 8, 'چهاردانگه', NULL, NULL),
(131, 8, 'شريف آباد', NULL, NULL),
(132, 8, 'قرچك', NULL, NULL),
(133, 8, 'باقرشهر', NULL, NULL),
(134, 8, 'شهريار', NULL, NULL),
(135, 8, 'رباط كريم', NULL, NULL),
(136, 8, 'قدس', NULL, NULL),
(137, 8, 'ملارد', NULL, NULL),
(138, 9, 'شهركرد', NULL, NULL),
(139, 9, 'فارسان', NULL, NULL),
(140, 9, 'بروجن', NULL, NULL),
(141, 9, 'چلگرد', NULL, NULL),
(142, 9, 'اردل', NULL, NULL),
(143, 9, 'لردگان', NULL, NULL),
(144, 9, 'سامان', NULL, NULL),
(145, 10, 'قائن', NULL, NULL),
(146, 10, 'فردوس', NULL, NULL),
(147, 10, 'بيرجند', NULL, NULL),
(148, 10, 'نهبندان', NULL, NULL),
(149, 10, 'سربيشه', NULL, NULL),
(150, 10, 'طبس مسینا', NULL, NULL),
(151, 10, 'قهستان', NULL, NULL),
(152, 10, 'درمیان', NULL, NULL),
(153, 11, 'مشهد', NULL, NULL),
(154, 11, 'نيشابور', NULL, NULL),
(155, 11, 'سبزوار', NULL, NULL),
(156, 11, 'كاشمر', NULL, NULL),
(157, 11, 'گناباد', NULL, NULL),
(158, 11, 'طبس', NULL, NULL),
(159, 11, 'تربت حيدريه', NULL, NULL),
(160, 11, 'خواف', NULL, NULL),
(161, 11, 'تربت جام', NULL, NULL),
(162, 11, 'تايباد', NULL, NULL),
(163, 11, 'قوچان', NULL, NULL),
(164, 11, 'سرخس', NULL, NULL),
(165, 11, 'بردسكن', NULL, NULL),
(166, 11, 'فريمان', NULL, NULL),
(167, 11, 'چناران', NULL, NULL),
(168, 11, 'درگز', NULL, NULL),
(169, 11, 'كلات', NULL, NULL),
(170, 11, 'طرقبه', NULL, NULL),
(171, 11, 'سر ولایت', NULL, NULL),
(172, 12, 'بجنورد', NULL, NULL),
(173, 12, 'اسفراين', NULL, NULL),
(174, 12, 'جاجرم', NULL, NULL),
(175, 12, 'شيروان', NULL, NULL),
(176, 12, 'آشخانه', NULL, NULL),
(177, 12, 'گرمه', NULL, NULL),
(178, 12, 'ساروج', NULL, NULL),
(179, 13, 'اهواز', NULL, NULL),
(180, 13, 'ايرانشهر', NULL, NULL),
(181, 13, 'شوش', NULL, NULL),
(182, 13, 'آبادان', NULL, NULL),
(183, 13, 'خرمشهر', NULL, NULL),
(184, 13, 'مسجد سليمان', NULL, NULL),
(185, 13, 'ايذه', NULL, NULL),
(186, 13, 'شوشتر', NULL, NULL),
(187, 13, 'انديمشك', NULL, NULL),
(188, 13, 'سوسنگرد', NULL, NULL),
(189, 13, 'هويزه', NULL, NULL),
(190, 13, 'دزفول', NULL, NULL),
(191, 13, 'شادگان', NULL, NULL),
(192, 13, 'بندر ماهشهر', NULL, NULL),
(193, 13, 'بندر امام خميني', NULL, NULL),
(194, 13, 'اميديه', NULL, NULL),
(195, 13, 'بهبهان', NULL, NULL),
(196, 13, 'رامهرمز', NULL, NULL),
(197, 13, 'باغ ملك', NULL, NULL),
(198, 13, 'هنديجان', NULL, NULL),
(199, 13, 'لالي', NULL, NULL),
(200, 13, 'رامشیر', NULL, NULL),
(201, 13, 'حمیدیه', NULL, NULL),
(202, 13, 'دغاغله', NULL, NULL),
(203, 13, 'ملاثانی', NULL, NULL),
(204, 13, 'شادگان', NULL, NULL),
(205, 13, 'ویسی', NULL, NULL),
(206, 14, 'زنجان', NULL, NULL),
(207, 14, 'ابهر', NULL, NULL),
(208, 14, 'خدابنده', NULL, NULL),
(209, 14, 'كارم', NULL, NULL),
(210, 14, 'ماهنشان', NULL, NULL),
(211, 14, 'خرمدره', NULL, NULL),
(212, 14, 'ايجرود', NULL, NULL),
(213, 14, 'زرين آباد', NULL, NULL),
(214, 14, 'آب بر', NULL, NULL),
(215, 14, 'قيدار', NULL, NULL),
(216, 15, 'سمنان', NULL, NULL),
(217, 15, 'شاهرود', NULL, NULL),
(218, 15, 'گرمسار', NULL, NULL),
(219, 15, 'ايوانكي', NULL, NULL),
(220, 15, 'دامغان', NULL, NULL),
(221, 15, 'بسطام', NULL, NULL),
(222, 16, 'زاهدان', NULL, NULL),
(223, 16, 'چابهار', NULL, NULL),
(224, 16, 'خاش', NULL, NULL),
(225, 16, 'سراوان', NULL, NULL),
(226, 16, 'زابل', NULL, NULL),
(227, 16, 'سرباز', NULL, NULL),
(228, 16, 'نيكشهر', NULL, NULL),
(229, 16, 'ايرانشهر', NULL, NULL),
(230, 16, 'راسك', NULL, NULL),
(231, 16, 'ميرجاوه', NULL, NULL),
(232, 17, 'شيراز', NULL, NULL),
(233, 17, 'اقليد', NULL, NULL),
(234, 17, 'داراب', NULL, NULL),
(235, 17, 'فسا', NULL, NULL),
(236, 17, 'مرودشت', NULL, NULL),
(237, 17, 'خرم بيد', NULL, NULL),
(238, 17, 'آباده', NULL, NULL),
(239, 17, 'كازرون', NULL, NULL),
(240, 17, 'ممسني', NULL, NULL),
(241, 17, 'سپيدان', NULL, NULL),
(242, 17, 'لار', NULL, NULL),
(243, 17, 'فيروز آباد', NULL, NULL),
(244, 17, 'جهرم', NULL, NULL),
(245, 17, 'ني ريز', NULL, NULL),
(246, 17, 'استهبان', NULL, NULL),
(247, 17, 'لامرد', NULL, NULL),
(248, 17, 'مهر', NULL, NULL),
(249, 17, 'حاجي آباد', NULL, NULL),
(250, 17, 'نورآباد', NULL, NULL),
(251, 17, 'اردكان', NULL, NULL),
(252, 17, 'صفاشهر', NULL, NULL),
(253, 17, 'ارسنجان', NULL, NULL),
(254, 17, 'قيروكارزين', NULL, NULL),
(255, 17, 'سوريان', NULL, NULL),
(256, 17, 'فراشبند', NULL, NULL),
(257, 17, 'سروستان', NULL, NULL),
(258, 17, 'ارژن', NULL, NULL),
(259, 17, 'گويم', NULL, NULL),
(260, 17, 'داريون', NULL, NULL),
(261, 17, 'زرقان', NULL, NULL),
(262, 17, 'خان زنیان', NULL, NULL),
(263, 17, 'کوار', NULL, NULL),
(264, 17, 'ده بید', NULL, NULL),
(265, 17, 'باب انار/خفر', NULL, NULL),
(266, 17, 'بوانات', NULL, NULL),
(267, 17, 'خرامه', NULL, NULL),
(268, 17, 'خنج', NULL, NULL),
(269, 17, 'سیاخ دارنگون', NULL, NULL),
(270, 18, 'قزوين', NULL, NULL),
(271, 18, 'تاكستان', NULL, NULL),
(272, 18, 'آبيك', NULL, NULL),
(273, 18, 'بوئين زهرا', NULL, NULL),
(274, 19, 'قم', NULL, NULL),
(275, 5, 'طالقان', NULL, NULL),
(276, 5, 'نظرآباد', NULL, NULL),
(277, 5, 'اشتهارد', NULL, NULL),
(278, 5, 'هشتگرد', NULL, NULL),
(279, 5, 'كن', NULL, NULL),
(280, 5, 'آسارا', NULL, NULL),
(281, 5, 'شهرک گلستان', NULL, NULL),
(282, 5, 'اندیشه', NULL, NULL),
(283, 5, 'كرج', NULL, NULL),
(284, 5, 'نظر آباد', NULL, NULL),
(285, 5, 'گوهردشت', NULL, NULL),
(286, 5, 'ماهدشت', NULL, NULL),
(287, 5, 'مشکین دشت', NULL, NULL),
(288, 20, 'سنندج', NULL, NULL),
(289, 20, 'ديواندره', NULL, NULL),
(290, 20, 'بانه', NULL, NULL),
(291, 20, 'بيجار', NULL, NULL),
(292, 20, 'سقز', NULL, NULL),
(293, 20, 'كامياران', NULL, NULL),
(294, 20, 'قروه', NULL, NULL),
(295, 20, 'مريوان', NULL, NULL),
(296, 20, 'صلوات آباد', NULL, NULL),
(297, 20, 'حسن آباد', NULL, NULL),
(298, 21, 'كرمان', NULL, NULL),
(299, 21, 'راور', NULL, NULL),
(300, 21, 'بابك', NULL, NULL),
(301, 21, 'انار', NULL, NULL),
(302, 21, 'کوهبنان', NULL, NULL),
(303, 21, 'رفسنجان', NULL, NULL),
(304, 21, 'بافت', NULL, NULL),
(305, 21, 'سيرجان', NULL, NULL),
(306, 21, 'كهنوج', NULL, NULL),
(307, 21, 'زرند', NULL, NULL),
(308, 21, 'بم', NULL, NULL),
(309, 21, 'جيرفت', NULL, NULL),
(310, 21, 'بردسير', NULL, NULL),
(311, 22, 'كرمانشاه', NULL, NULL),
(312, 22, 'اسلام آباد غرب', NULL, NULL),
(313, 22, 'سر پل ذهاب', NULL, NULL),
(314, 22, 'كنگاور', NULL, NULL),
(315, 22, 'سنقر', NULL, NULL),
(316, 22, 'قصر شيرين', NULL, NULL),
(317, 22, 'گيلان غرب', NULL, NULL),
(318, 22, 'هرسين', NULL, NULL),
(319, 22, 'صحنه', NULL, NULL),
(320, 22, 'پاوه', NULL, NULL),
(321, 22, 'جوانرود', NULL, NULL),
(322, 22, 'شاهو', NULL, NULL),
(323, 23, 'ياسوج', NULL, NULL),
(324, 23, 'گچساران', NULL, NULL),
(325, 23, 'دنا', NULL, NULL),
(326, 23, 'دوگنبدان', NULL, NULL),
(327, 23, 'سي سخت', NULL, NULL),
(328, 23, 'دهدشت', NULL, NULL),
(329, 23, 'ليكك', NULL, NULL),
(330, 24, 'گرگان', NULL, NULL),
(331, 24, 'آق قلا', NULL, NULL),
(332, 24, 'گنبد كاووس', NULL, NULL),
(333, 24, 'علي آباد كتول', NULL, NULL),
(334, 24, 'مينو دشت', NULL, NULL),
(335, 24, 'تركمن', NULL, NULL),
(336, 24, 'كردكوي', NULL, NULL),
(337, 24, 'بندر گز', NULL, NULL),
(338, 24, 'كلاله', NULL, NULL),
(339, 24, 'آزاد شهر', NULL, NULL),
(340, 24, 'راميان', NULL, NULL),
(341, 25, 'رشت', NULL, NULL),
(342, 25, 'منجيل', NULL, NULL),
(343, 25, 'لنگرود', NULL, NULL),
(344, 25, 'رود سر', NULL, NULL),
(345, 25, 'تالش', NULL, NULL),
(346, 25, 'آستارا', NULL, NULL),
(347, 25, 'ماسوله', NULL, NULL),
(348, 25, 'آستانه اشرفيه', NULL, NULL),
(349, 25, 'رودبار', NULL, NULL),
(350, 25, 'فومن', NULL, NULL),
(351, 25, 'صومعه سرا', NULL, NULL),
(352, 25, 'بندرانزلي', NULL, NULL),
(353, 25, 'كلاچاي', NULL, NULL),
(354, 25, 'هشتپر', NULL, NULL),
(355, 25, 'رضوان شهر', NULL, NULL),
(356, 25, 'ماسال', NULL, NULL),
(357, 25, 'شفت', NULL, NULL),
(358, 25, 'سياهكل', NULL, NULL),
(359, 25, 'املش', NULL, NULL),
(360, 25, 'لاهیجان', NULL, NULL),
(361, 25, 'خشک بيجار', NULL, NULL),
(362, 25, 'خمام', NULL, NULL),
(363, 25, 'لشت نشا', NULL, NULL),
(364, 25, 'بندر کياشهر', NULL, NULL),
(365, 26, 'خرم آباد', NULL, NULL),
(366, 26, 'ماهشهر', NULL, NULL),
(367, 26, 'دزفول', NULL, NULL),
(368, 26, 'بروجرد', NULL, NULL),
(369, 26, 'دورود', NULL, NULL),
(370, 26, 'اليگودرز', NULL, NULL),
(371, 26, 'ازنا', NULL, NULL),
(372, 26, 'نور آباد', NULL, NULL),
(373, 26, 'كوهدشت', NULL, NULL),
(374, 26, 'الشتر', NULL, NULL),
(375, 26, 'پلدختر', NULL, NULL),
(376, 27, 'ساري', NULL, NULL),
(377, 27, 'آمل', NULL, NULL),
(378, 27, 'بابل', NULL, NULL),
(379, 27, 'بابلسر', NULL, NULL),
(380, 27, 'بهشهر', NULL, NULL),
(381, 27, 'تنكابن', NULL, NULL),
(382, 27, 'جويبار', NULL, NULL),
(383, 27, 'چالوس', NULL, NULL),
(384, 27, 'رامسر', NULL, NULL),
(385, 27, 'سواد كوه', NULL, NULL),
(386, 27, 'قائم شهر', NULL, NULL),
(387, 27, 'نكا', NULL, NULL),
(388, 27, 'نور', NULL, NULL),
(389, 27, 'بلده', NULL, NULL),
(390, 27, 'نوشهر', NULL, NULL),
(391, 27, 'پل سفيد', NULL, NULL),
(392, 27, 'محمود آباد', NULL, NULL),
(393, 27, 'فريدون كنار', NULL, NULL),
(394, 28, 'اراك', NULL, NULL),
(395, 28, 'آشتيان', NULL, NULL),
(396, 28, 'تفرش', NULL, NULL),
(397, 28, 'خمين', NULL, NULL),
(398, 28, 'دليجان', NULL, NULL),
(399, 28, 'ساوه', NULL, NULL),
(400, 28, 'سربند', NULL, NULL),
(401, 28, 'محلات', NULL, NULL),
(402, 28, 'شازند', NULL, NULL),
(403, 29, 'بندرعباس', NULL, NULL),
(404, 29, 'قشم', NULL, NULL),
(405, 29, 'كيش', NULL, NULL),
(406, 29, 'بندر لنگه', NULL, NULL),
(407, 29, 'بستك', NULL, NULL),
(408, 29, 'حاجي آباد', NULL, NULL),
(409, 29, 'دهبارز', NULL, NULL),
(410, 29, 'انگهران', NULL, NULL),
(411, 29, 'ميناب', NULL, NULL),
(412, 29, 'ابوموسي', NULL, NULL),
(413, 29, 'بندر جاسك', NULL, NULL),
(414, 29, 'تنب بزرگ', NULL, NULL),
(415, 29, 'بندر خمیر', NULL, NULL),
(416, 29, 'پارسیان', NULL, NULL),
(417, 29, 'قشم', NULL, NULL),
(418, 30, 'همدان', NULL, NULL),
(419, 30, 'ملاير', NULL, NULL),
(420, 30, 'تويسركان', NULL, NULL),
(421, 30, 'نهاوند', NULL, NULL),
(422, 30, 'كبودر اهنگ', NULL, NULL),
(423, 30, 'رزن', NULL, NULL),
(424, 30, 'اسدآباد', NULL, NULL),
(425, 30, 'بهار', NULL, NULL),
(426, 31, 'يزد', NULL, NULL),
(427, 31, 'تفت', NULL, NULL),
(428, 31, 'اردكان', NULL, NULL),
(429, 31, 'ابركوه', NULL, NULL),
(430, 31, 'ميبد', NULL, NULL),
(431, 31, 'طبس', NULL, NULL),
(432, 31, 'بافق', NULL, NULL),
(433, 31, 'مهريز', NULL, NULL),
(434, 31, 'اشكذر', NULL, NULL),
(435, 31, 'هرات', NULL, NULL),
(436, 31, 'خضرآباد', NULL, NULL),
(437, 31, 'شاهديه', NULL, NULL),
(438, 31, 'حمیدیه شهر', NULL, NULL),
(439, 31, 'سید میرزا', NULL, NULL),
(440, 31, 'زارچ', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `excel_media`
--

CREATE TABLE `excel_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `excel_media`
--

INSERT INTO `excel_media` (`id`, `name`, `media_id`, `created_at`, `updated_at`) VALUES
(7, 'کاکن k705', 137, '2021-10-14 16:44:50', '2021-10-14 16:44:50'),
(8, 'رله K706', 141, '2021-10-14 18:00:56', '2021-10-14 18:00:56'),
(9, 'pdf', 142, '2021-10-14 18:16:34', '2021-10-14 18:16:34'),
(10, 'K707', 150, '2021-10-15 15:34:03', '2021-10-15 15:34:03'),
(11, 'K710', 153, '2021-10-15 15:49:46', '2021-10-15 15:49:46'),
(12, 'KF083', 155, '2021-10-15 15:59:48', '2021-10-15 15:59:48'),
(13, 'KLM-A-L3', 156, '2021-10-15 16:08:11', '2021-10-15 16:10:03'),
(14, 'KLM-A-L4', 157, '2021-10-15 16:09:43', '2021-10-15 16:09:43'),
(15, 'kls-a-l2', 158, '2021-10-15 16:11:24', '2021-10-15 16:11:24'),
(16, 'KLS-A-P2', 159, '2021-10-15 16:15:41', '2021-10-15 16:15:41'),
(17, 'KMSR-DT', 160, '2021-10-15 16:25:32', '2021-10-15 16:25:32'),
(18, 'KMSR-DS', 161, '2021-10-15 16:27:08', '2021-10-15 16:27:08'),
(19, 'KMY2Q', 162, '2021-10-15 16:38:18', '2021-10-15 16:38:18'),
(20, 'KMY4Q', 163, '2021-10-15 20:34:09', '2021-10-15 20:34:09'),
(21, 'KMY4S', 164, '2021-10-15 20:35:32', '2021-10-15 20:35:32'),
(22, 'KPX12', 165, '2021-10-15 20:38:31', '2021-10-15 20:38:31'),
(23, 'KLY2', 166, '2021-10-15 20:41:53', '2021-10-15 20:41:53'),
(24, 'TF-1C-24VDC', 167, '2021-10-15 20:46:17', '2021-10-15 20:46:17'),
(25, 'RXT-F01', 168, '2021-10-15 20:46:38', '2021-10-15 20:46:38'),
(26, 'RXT-QS', 169, '2021-10-15 20:51:00', '2021-10-15 20:51:00'),
(27, 'V15', 170, '2021-10-15 20:58:47', '2021-10-15 20:58:47'),
(28, 'Z15G030B', 171, '2021-10-15 21:04:07', '2021-10-15 21:04:07'),
(29, 'Z15G052B', 172, '2021-10-15 21:05:12', '2021-10-15 21:05:12'),
(30, 'Z15G062B', 173, '2021-10-15 21:06:01', '2021-10-15 21:06:01'),
(31, 'Z15G63', 174, '2021-10-15 21:08:15', '2021-10-15 21:08:15'),
(32, 'KXM-301', 175, '2021-10-15 21:10:40', '2021-10-15 21:10:40'),
(33, 'ZXM-302 (KXM-302)', 176, '2021-10-15 21:13:23', '2021-10-15 21:13:23'),
(34, 'ZXM-312', 177, '2021-10-15 21:15:42', '2021-10-15 21:15:42'),
(37, 'CH-9S-LED-220V-G', 189, '2021-10-20 20:37:40', '2021-10-20 20:37:40'),
(38, 'CH-9S-LED-220V-R', 190, '2021-10-20 20:37:55', '2021-10-20 20:37:55'),
(39, 'CPX-C18', 191, '2021-10-20 20:39:05', '2021-10-20 20:39:05'),
(40, 'CPX-C30', 192, '2021-10-20 20:39:35', '2021-10-20 20:39:35'),
(41, 'CPX-D18', 193, '2021-10-20 20:40:01', '2021-10-20 20:40:01'),
(42, 'CPX-D30', 194, '2021-10-20 20:40:21', '2021-10-20 20:40:21'),
(43, 'D6SW-1', 195, '2021-10-20 20:42:07', '2021-10-20 20:42:07'),
(44, 'IPX-A12-05A1N \"PR12-4AO', 196, '2021-10-20 20:53:19', '2021-10-20 20:53:19'),
(45, 'IPX-A30-15A1N \"PRL30-15AO', 197, '2021-10-20 21:00:25', '2021-10-20 21:00:25'),
(46, 'IPX-D12-02E1 \"PR12-2DN', 198, '2021-10-20 21:01:16', '2021-10-20 21:01:16'),
(47, 'IPX-D17-05E1S \"PSN17-5DN', 199, '2021-10-20 21:01:48', '2021-10-20 21:01:48'),
(48, 'IPX-D18-05E1 \"PR18-5DN', 200, '2021-10-20 21:05:36', '2021-10-20 21:05:36'),
(49, 'KFS-ES3', 201, '2021-10-20 21:08:02', '2021-10-20 21:08:02'),
(50, 'KFS-PC8 220V', 202, '2021-10-20 21:08:24', '2021-10-20 21:08:24'),
(51, 'KH-4022 24VAC/DC', 203, '2021-10-20 21:08:50', '2021-10-20 21:08:50'),
(52, 'KH-702', 204, '2021-10-20 21:09:23', '2021-10-20 21:09:23'),
(53, 'KH-704', 235, '2021-10-20 21:09:38', '2021-10-21 06:19:33'),
(54, 'KH-706', 206, '2021-10-20 21:09:48', '2021-10-20 21:09:48'),
(55, 'KPS-AL \"BEN10M-TFR', 207, '2021-10-20 21:10:32', '2021-10-20 21:10:32'),
(56, 'KPS-ALD \"BEN300-DFR', 208, '2021-10-20 21:10:44', '2021-10-20 21:10:44'),
(57, 'KPS-ALTR \"BEN5M-MFR', 209, '2021-10-20 21:10:58', '2021-10-20 21:10:58'),
(58, 'KPS-CP012-AC220V \"PA-12', 210, '2021-10-21 05:19:32', '2021-10-21 05:19:32'),
(59, 'KPS-CTVS', 211, '2021-10-21 05:21:33', '2021-10-21 05:21:33'),
(60, 'KPS-M-C \"CT-02', 212, '2021-10-21 05:27:16', '2021-10-21 05:27:16'),
(61, 'KPS-M60C \"BS5-K2M', 213, '2021-10-21 05:27:52', '2021-10-21 05:27:52'),
(62, 'KPS-M61C \"BS5-L2M', 214, '2021-10-21 05:28:02', '2021-10-21 05:28:02'),
(63, 'KPS-M62C \"BS5-T2M', 215, '2021-10-21 05:28:14', '2021-10-21 05:28:14'),
(64, 'KPS-ODN-1L \"BR400-DDT', 216, '2021-10-21 05:28:57', '2021-10-21 05:28:57'),
(65, 'KPS-ODP-1L \"BRP400-DDT-P \"BR400-DDT-P', 217, '2021-10-21 05:29:51', '2021-10-21 05:29:51'),
(66, 'KPS-R3 \"MS-2', 218, '2021-10-21 05:35:48', '2021-10-21 05:35:48'),
(67, 'KPS-Z2DN \"BJ1M-DDT', 219, '2021-10-21 05:36:25', '2021-10-21 05:36:25'),
(68, 'KPS-ZDNS \"BJ300-DDT', 220, '2021-10-21 05:48:49', '2021-10-21 05:48:49'),
(69, 'KPS-ZRN \"BJ3M-MDT', 221, '2021-10-21 05:49:36', '2021-10-21 05:49:36'),
(70, 'KPS-ZTN \"BJ15M-TDT', 222, '2021-10-21 05:50:40', '2021-10-21 05:50:40'),
(71, 'KPX-D08-01E1M \"PR08-1.5DN', 223, '2021-10-21 05:51:10', '2021-10-21 05:51:10'),
(72, 'KTM-AM8 \"AT8N', 224, '2021-10-21 05:52:21', '2021-10-21 05:52:21'),
(73, 'KTM-AMTM', 225, '2021-10-21 05:53:01', '2021-10-21 05:53:01'),
(74, 'NS22', 226, '2021-10-21 05:56:27', '2021-10-21 05:56:27'),
(75, 'NS22-BM', 227, '2021-10-21 05:56:58', '2021-10-21 05:56:58'),
(76, 'NS22-DM', 228, '2021-10-21 05:57:28', '2021-10-21 05:57:28'),
(77, 'NS22-K2', 229, '2021-10-21 05:58:25', '2021-10-21 05:58:25'),
(78, 'NS22-PEM', 230, '2021-10-21 06:00:12', '2021-10-21 06:00:12'),
(79, 'NS22-PER-R0A01B', 231, '2021-10-21 06:00:43', '2021-10-21 06:00:43'),
(80, 'NS22-S2', 232, '2021-10-21 06:03:11', '2021-10-21 06:03:11');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `excel_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `excel_id`, `created_at`, `updated_at`) VALUES
(5, 'kacon', 178, '2021-10-14 16:45:20', '2021-10-15 21:17:06'),
(6, 'KOINO', 236, '2021-10-19 15:54:42', '2021-10-21 06:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci,
  `type` enum('read','unread') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unread',
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `files` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `type` enum('image','pdf','excel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `public_folder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `private_folder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `files`, `type`, `filename`, `public_folder`, `private_folder`, `created_at`, `updated_at`) VALUES
(7, '{\"original\":\"posts\\/\\/612601e8250f6.jpg\"}', 'image', '1-3.jpg', 'posts', NULL, '2021-08-25 08:40:08', '2021-08-25 08:40:08'),
(8, '{\"original\":\"posts\\/media\\/\\/6126054b0b930.png\"}', 'image', '4.png', 'posts/media', NULL, '2021-08-25 08:54:35', '2021-08-25 08:54:35'),
(26, '{\"original\":\"posts\\/\\/612a722cba4f6.jpg\"}', 'image', '1-2.jpg', 'posts', NULL, '2021-08-28 17:28:12', '2021-08-28 17:28:12'),
(27, '{\"original\":\"posts\\/\\/612a724039a03.jpg\"}', 'image', '1-4.jpg', 'posts', NULL, '2021-08-28 17:28:32', '2021-08-28 17:28:32'),
(31, '{\"original\":\"brands\\/\\/612bcfdadfbe0.png\"}', 'image', '2.png', 'brands', NULL, '2021-08-29 18:20:10', '2021-08-29 18:20:10'),
(37, '{\"original\":\"posts\\/\\/612bd0897fb89.jpg\"}', 'image', '1-5.jpg', 'posts', NULL, '2021-08-29 18:23:05', '2021-08-29 18:23:05'),
(38, '{\"original\":\"posts\\/\\/612bd0abb052c.jpg\"}', 'image', '1-1.jpg', 'posts', NULL, '2021-08-29 18:23:39', '2021-08-29 18:23:39'),
(39, '{\"original\":\"posts\\/\\/612bd0c2a3b9b.png\"}', 'image', '4.png', 'posts', NULL, '2021-08-29 18:24:02', '2021-08-29 18:24:02'),
(43, '{\"original\":\"products\\/\\/612bd1cf87648.jpg\"}', 'image', 'deals-3.jpg', 'products', NULL, '2021-08-29 18:28:31', '2021-08-29 18:28:31'),
(44, '{\"original\":\"products\\/\\/612bd1ee20d3b.png\"}', 'image', 'deals-3.png', 'products', NULL, '2021-08-29 18:29:02', '2021-08-29 18:29:02'),
(49, '{\"original\":\"products\\/\\/612bd2f77db86.jpg\"}', 'image', 'card-4.jpg', 'products', NULL, '2021-08-29 18:33:27', '2021-08-29 18:33:27'),
(52, '{\"original\":\"products\\/\\/612bd365d10fe.jpg\"}', 'image', 'xs-4.jpg', 'products', NULL, '2021-08-29 18:35:17', '2021-08-29 18:35:17'),
(55, '{\"original\":\"sliders\\/\\/61338d4398e55.jpg\"}', 'image', 'home-v13-background.jpg', 'sliders', NULL, '2021-09-04 15:14:11', '2021-09-04 15:14:11'),
(65, '{\"original\":\"products\\/\\/615d786b1aabc.png\"}', 'image', 'partner1.png', 'products', NULL, '2021-10-06 10:20:27', '2021-10-06 10:20:27'),
(66, '{\"original\":\"products\\/\\/615f0ddb7f861.png\"}', 'image', 'laravel.png', 'products', NULL, '2021-10-07 15:10:19', '2021-10-07 15:10:19'),
(67, '{\"original\":\"categories\\/\\/6161dee361ed0.png\"}', 'image', '3.png', 'categories', NULL, '2021-10-09 18:26:43', '2021-10-09 18:26:43'),
(68, '{\"original\":\"categories\\/\\/6161e591bc0b9.png\"}', 'image', '10.png', 'categories', NULL, '2021-10-09 18:55:13', '2021-10-09 18:55:13'),
(76, '{\"original\":\"products\\/\\/6162c808b6d5d.pdf\"}', 'pdf', 'term9.pdf', 'products', NULL, '2021-10-10 11:01:28', '2021-10-10 11:01:28'),
(77, '{\"original\":\"products\\/\\/6162cb41cc670.png\"}', 'image', '2.png', 'products', NULL, '2021-10-10 11:15:13', '2021-10-10 11:15:13'),
(78, '{\"original\":\"products\\/\\/6162cb7d918a4.pdf\"}', 'pdf', 'dummy.pdf', 'products', NULL, '2021-10-10 11:16:13', '2021-10-10 11:16:13'),
(86, '{\"original\":\"products\\/\\/6162cdf447d94.png\"}', 'image', 'laravel.png', 'products', NULL, '2021-10-10 11:26:44', '2021-10-10 11:26:44'),
(87, '{\"original\":\"products\\/\\/6162cdf452102.pdf\"}', 'pdf', 'pdf-test.pdf', 'products', NULL, '2021-10-10 11:26:44', '2021-10-10 11:26:44'),
(101, '{\"original\":\"excels\\/\\/616477706e906.xlsx\"}', 'excel', '3.xlsx', 'excels', NULL, '2021-10-11 17:42:08', '2021-10-11 17:42:08'),
(102, '{\"original\":\"excels\\/test\\/616478041873b.xlsx\"}', 'excel', 'test.xlsx', 'excels', 'test', '2021-10-11 17:44:36', '2021-10-11 17:44:36'),
(103, '{\"original\":\"excels\\/test\\/616478e742bca.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 17:48:23', '2021-10-11 17:48:23'),
(104, '{\"original\":\"excels\\/test\\/6164823839d5d.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 18:28:08', '2021-10-11 18:28:08'),
(105, '{\"original\":\"excels\\/test\\/616482fa0918c.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 18:31:22', '2021-10-11 18:31:22'),
(106, '{\"original\":\"excels\\/test\\/616488a7c41c5.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 18:55:35', '2021-10-11 18:55:35'),
(107, '{\"original\":\"excels\\/test\\/61648e56f14df.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 19:19:50', '2021-10-11 19:19:50'),
(108, '{\"original\":\"excels\\/test\\/61648e91b79d3.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 19:20:49', '2021-10-11 19:20:49'),
(117, '{\"original\":\"excels\\/test\\/6164a9ab170af.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 21:16:27', '2021-10-11 21:16:27'),
(118, '{\"original\":\"excels\\/test\\/6164ab728beba.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 21:24:02', '2021-10-11 21:24:02'),
(121, '{\"original\":\"excels\\/test\\/6164b08fa52e7.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 21:45:51', '2021-10-11 21:45:51'),
(125, '{\"original\":\"excels\\/test\\/6164b4764a9bf.xlsx\"}', 'excel', '3.xlsx', 'excels', 'test', '2021-10-11 22:02:30', '2021-10-11 22:02:30'),
(131, '{\"original\":\"inquiries\\/\\/6166b86cc15e6.pdf\"}', 'pdf', 'dummy.pdf', 'inquiries', NULL, '2021-10-13 10:43:56', '2021-10-13 10:43:56'),
(132, '{\"original\":\"inquiries\\/\\/6166bdee869a5.png\"}', 'image', '1.png', 'inquiries', NULL, '2021-10-13 11:07:26', '2021-10-13 11:07:26'),
(133, '{\"original\":\"categories\\/\\/6166bea6cbfdd.png\"}', 'image', '615dbddfac9fd.png', 'categories', NULL, '2021-10-13 11:10:30', '2021-10-13 11:10:30'),
(134, '{\"original\":\"brands\\/\\/6167f75a7749c.jpg\"}', 'image', 'download.jpg', 'brands', NULL, '2021-10-14 09:24:42', '2021-10-14 09:24:42'),
(135, '{\"original\":\"categories\\/\\/6167f776c1c77.jpg\"}', 'image', 'download.jpg', 'categories', NULL, '2021-10-14 09:25:10', '2021-10-14 09:25:10'),
(136, '{\"original\":\"categories\\/\\/6167f83ed5490.jpeg\"}', 'image', '60169d5ae9ec9.jpeg', 'categories', NULL, '2021-10-14 09:28:30', '2021-10-14 09:28:30'),
(137, '{\"original\":\"excel_media\\/\\/61685e82332d0.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k705-2pl-24vdc.jpg', 'excel_media', NULL, '2021-10-14 16:44:50', '2021-10-14 16:44:50'),
(138, '{\"original\":\"categories\\/\\/61685fbd056d0.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k705-2pl-24vdc.jpg', 'categories', NULL, '2021-10-14 16:50:05', '2021-10-14 16:50:05'),
(139, '{\"original\":\"categories\\/\\/6168623fcb8f4.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k705-2pl-24vdc.jpg', 'categories', NULL, '2021-10-14 17:00:47', '2021-10-14 17:00:47'),
(140, '{\"original\":\"categories\\/\\/616864802d5f3.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k706-2plt-12vdc.jpg', 'categories', NULL, '2021-10-14 17:10:24', '2021-10-14 17:10:24'),
(141, '{\"original\":\"excel_media\\/\\/6168705802299.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k706-2plt-12vdc.jpg', 'excel_media', NULL, '2021-10-14 18:00:56', '2021-10-14 18:00:56'),
(142, '{\"original\":\"excel_media\\/\\/61687402e545a.pdf\"}', 'pdf', 'pdf-test.pdf', 'excel_media', NULL, '2021-10-14 18:16:34', '2021-10-14 18:16:34'),
(144, '{\"original\":\"excels\\/kacon\\/61687c7c6aa1b.xlsx\"}', 'excel', 'excel.xlsx', 'excels', 'kacon', '2021-10-14 18:52:44', '2021-10-14 18:52:44'),
(145, '{\"original\":\"excels\\/kacon\\/61687cac5ec7d.xlsx\"}', 'excel', 'excel.xlsx', 'excels', 'kacon', '2021-10-14 18:53:32', '2021-10-14 18:53:32'),
(147, '{\"original\":\"excels\\/kacon\\/6168857a3a127.xlsx\"}', 'excel', 'excel.xlsx', 'excels', 'kacon', '2021-10-14 19:31:06', '2021-10-14 19:31:06'),
(149, '{\"original\":\"categories\\/\\/61699ee981d74.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k707-2pl-110vac.jpg', 'categories', NULL, '2021-10-15 15:31:53', '2021-10-15 15:31:53'),
(150, '{\"original\":\"excel_media\\/\\/61699f6ba93d0.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k707-2pl-110vac.jpg', 'excel_media', NULL, '2021-10-15 15:34:03', '2021-10-15 15:34:03'),
(151, '{\"original\":\"categories\\/\\/6169a1555f35c.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k707-2pl-110vac.jpg', 'categories', NULL, '2021-10-15 15:42:13', '2021-10-15 15:42:13'),
(152, '{\"original\":\"categories\\/\\/6169a21fdbb1f.jpg\"}', 'image', 'رله-شیشه-ای-کاکن-k707-2pl-110vac.jpg', 'categories', NULL, '2021-10-15 15:45:35', '2021-10-15 15:45:35'),
(153, '{\"original\":\"excel_media\\/\\/6169a31af0d0f.jpg\"}', 'image', 'TB2tchCCN9YBuNjy0FfXXXIsVXa_!!671132466.jpg_460x460q90.jpg', 'excel_media', NULL, '2021-10-15 15:49:46', '2021-10-15 15:49:46'),
(154, '{\"original\":\"categories\\/\\/6169a51b13174.jpg\"}', 'image', 'aKF083A.jpg', 'categories', NULL, '2021-10-15 15:58:19', '2021-10-15 15:58:19'),
(155, '{\"original\":\"excel_media\\/\\/6169a57481f4d.jpg\"}', 'image', 'aKF083A.jpg', 'excel_media', NULL, '2021-10-15 15:59:48', '2021-10-15 15:59:48'),
(156, '{\"original\":\"excel_media\\/\\/6169a76b21812.jpg\"}', 'image', 'KLM.jpg', 'excel_media', NULL, '2021-10-15 16:08:11', '2021-10-15 16:08:11'),
(157, '{\"original\":\"excel_media\\/\\/6169a7c71b53e.jpg\"}', 'image', '-klm-a-l4.jpg', 'excel_media', NULL, '2021-10-15 16:09:43', '2021-10-15 16:09:43'),
(158, '{\"original\":\"excel_media\\/\\/6169a82cce958.jpg\"}', 'image', 'kls-a-l2.jpg', 'excel_media', NULL, '2021-10-15 16:11:24', '2021-10-15 16:11:24'),
(159, '{\"original\":\"excel_media\\/\\/6169a92d8fa37.jpg\"}', 'image', 'KLS-A-P2.jpg', 'excel_media', NULL, '2021-10-15 16:15:41', '2021-10-15 16:15:41'),
(160, '{\"original\":\"excel_media\\/\\/6169ab7c54f95.jpg\"}', 'image', 'kmsr-dt0254.jpg', 'excel_media', NULL, '2021-10-15 16:25:32', '2021-10-15 16:25:32'),
(161, '{\"original\":\"excel_media\\/\\/6169abdcd094b.jpg\"}', 'image', 'KMSR-DS.jpg', 'excel_media', NULL, '2021-10-15 16:27:08', '2021-10-15 16:27:08'),
(162, '{\"original\":\"excel_media\\/\\/6169ae7ab1593.jpg\"}', 'image', 'KMY2Q.jpg', 'excel_media', NULL, '2021-10-15 16:38:18', '2021-10-15 16:38:18'),
(163, '{\"original\":\"excel_media\\/\\/6169e5c11a0d5.png\"}', 'image', 'kmy4q.png', 'excel_media', NULL, '2021-10-15 20:34:09', '2021-10-15 20:34:09'),
(164, '{\"original\":\"excel_media\\/\\/6169e614220db.jpg\"}', 'image', 'KMY4S.jpg', 'excel_media', NULL, '2021-10-15 20:35:32', '2021-10-15 20:35:32'),
(165, '{\"original\":\"excel_media\\/\\/6169e6c715456.png\"}', 'image', 'KPX12.png', 'excel_media', NULL, '2021-10-15 20:38:31', '2021-10-15 20:38:31'),
(166, '{\"original\":\"excel_media\\/\\/6169e7910b338.jpg\"}', 'image', 'KLY2.jpg', 'excel_media', NULL, '2021-10-15 20:41:53', '2021-10-15 20:41:53'),
(167, '{\"original\":\"excel_media\\/\\/6169e89963371.jpg\"}', 'image', 'TF-1C.jpg', 'excel_media', NULL, '2021-10-15 20:46:17', '2021-10-15 20:46:17'),
(168, '{\"original\":\"excel_media\\/\\/6169e8ae10e72.jpg\"}', 'image', 'RXT-F01.jpg', 'excel_media', NULL, '2021-10-15 20:46:38', '2021-10-15 20:46:38'),
(169, '{\"original\":\"excel_media\\/\\/6169e9b458b6e.jpg\"}', 'image', 'RXT-QS.jpg', 'excel_media', NULL, '2021-10-15 20:51:00', '2021-10-15 20:51:00'),
(170, '{\"original\":\"excel_media\\/\\/6169eb87171fc.png\"}', 'image', 'V15.png', 'excel_media', NULL, '2021-10-15 20:58:47', '2021-10-15 20:58:47'),
(171, '{\"original\":\"excel_media\\/\\/6169ecc74c0b5.jpg\"}', 'image', 'Z15G-030B.jpg', 'excel_media', NULL, '2021-10-15 21:04:07', '2021-10-15 21:04:07'),
(172, '{\"original\":\"excel_media\\/\\/6169ed0820f9c.jpg\"}', 'image', 'Z15G052B.jpg', 'excel_media', NULL, '2021-10-15 21:05:12', '2021-10-15 21:05:12'),
(173, '{\"original\":\"excel_media\\/\\/6169ed399ee23.jpg\"}', 'image', 'Z15G062B.jpg', 'excel_media', NULL, '2021-10-15 21:06:01', '2021-10-15 21:06:01'),
(174, '{\"original\":\"excel_media\\/\\/6169edbf2fadd.png\"}', 'image', 'Z-15G063-B.png', 'excel_media', NULL, '2021-10-15 21:08:15', '2021-10-15 21:08:15'),
(175, '{\"original\":\"excel_media\\/\\/6169ee508e38a.png\"}', 'image', 'KXM-301.png', 'excel_media', NULL, '2021-10-15 21:10:40', '2021-10-15 21:10:40'),
(176, '{\"original\":\"excel_media\\/\\/6169eef3ab3b9.jpg\"}', 'image', 'ZXM-302 (KXM-302).jpg', 'excel_media', NULL, '2021-10-15 21:13:23', '2021-10-15 21:13:23'),
(177, '{\"original\":\"excel_media\\/\\/6169ef7e9f93c.jpg\"}', 'image', 'ZXM-312.jpg', 'excel_media', NULL, '2021-10-15 21:15:42', '2021-10-15 21:15:42'),
(178, '{\"original\":\"excels\\/kacon\\/6169efd1da777.xlsx\"}', 'excel', 'kacon.xlsx', 'excels', 'kacon', '2021-10-15 21:17:06', '2021-10-15 21:17:06'),
(179, '{\"original\":\"categories\\/\\/616a63123d13b.jpg\"}', 'image', 'KLS-A-L3.jpg', 'categories', NULL, '2021-10-16 05:28:50', '2021-10-16 05:28:50'),
(180, '{\"original\":\"categories\\/\\/616a6364394ac.jpg\"}', 'image', 'v15.jpg', 'categories', NULL, '2021-10-16 05:30:12', '2021-10-16 05:30:12'),
(181, '{\"original\":\"categories\\/\\/616a6391c279e.jpg\"}', 'image', 'ssr.jpg', 'categories', NULL, '2021-10-16 05:30:57', '2021-10-16 05:30:57'),
(182, '{\"original\":\"categories\\/\\/616a63f1bfe3a.jpg\"}', 'image', 'hrf.jpg', 'categories', NULL, '2021-10-16 05:32:33', '2021-10-16 05:32:33'),
(183, '{\"original\":\"inquiries\\/\\/616a76ad721d3.jpg\"}', 'image', 'v15.jpg', 'inquiries', NULL, '2021-10-16 06:52:29', '2021-10-16 06:52:29'),
(184, '{\"original\":\"categories\\/\\/616ed723385b9.png\"}', 'image', 'index.png', 'categories', NULL, '2021-10-19 14:33:07', '2021-10-19 14:33:07'),
(185, '{\"original\":\"brands\\/\\/616ee9ae26e8b.png\"}', 'image', 'index.png', 'brands', NULL, '2021-10-19 15:52:14', '2021-10-19 15:52:14'),
(188, '{\"original\":\"products\\/gallery\\/\\/6170329142a92.jpg\"}', 'image', 'download.jpg', 'products/gallery', NULL, '2021-10-20 15:15:29', '2021-10-20 15:15:29'),
(189, '{\"original\":\"excel_media\\/\\/61707e14ada57.jpg\"}', 'image', 'CH-9S-LED-220V-G.jpg', 'excel_media', NULL, '2021-10-20 20:37:40', '2021-10-20 20:37:40'),
(190, '{\"original\":\"excel_media\\/\\/61707e235260a.jpg\"}', 'image', 'CH-9S-LED-220V-R.jpg', 'excel_media', NULL, '2021-10-20 20:37:55', '2021-10-20 20:37:55'),
(191, '{\"original\":\"excel_media\\/\\/61707e692f63f.jpg\"}', 'image', 'CPX-C18.jpg', 'excel_media', NULL, '2021-10-20 20:39:05', '2021-10-20 20:39:05'),
(192, '{\"original\":\"excel_media\\/\\/61707e87a67ae.jpg\"}', 'image', 'CPX-C30.jpg', 'excel_media', NULL, '2021-10-20 20:39:35', '2021-10-20 20:39:35'),
(193, '{\"original\":\"excel_media\\/\\/61707ea11e9df.jpg\"}', 'image', 'CPX-D18.jpg', 'excel_media', NULL, '2021-10-20 20:40:01', '2021-10-20 20:40:01'),
(194, '{\"original\":\"excel_media\\/\\/61707eb579118.jpg\"}', 'image', 'CPX-D30.jpg', 'excel_media', NULL, '2021-10-20 20:40:21', '2021-10-20 20:40:21'),
(195, '{\"original\":\"excel_media\\/\\/61707f1fdb306.jpg\"}', 'image', 'IPW-D6SW-1.jpg', 'excel_media', NULL, '2021-10-20 20:42:07', '2021-10-20 20:42:07'),
(196, '{\"original\":\"excel_media\\/\\/617081bfd8562.jpg\"}', 'image', 'IPX-A12-05A1N.jpg', 'excel_media', NULL, '2021-10-20 20:53:19', '2021-10-20 20:53:19'),
(197, '{\"original\":\"excel_media\\/\\/61708369d83da.jpg\"}', 'image', 'IPX-A30-15A1N.jpg', 'excel_media', NULL, '2021-10-20 21:00:25', '2021-10-20 21:00:25'),
(198, '{\"original\":\"excel_media\\/\\/6170839c5ce63.jpg\"}', 'image', 'IPX-D12-02E1.jpg', 'excel_media', NULL, '2021-10-20 21:01:16', '2021-10-20 21:01:16'),
(199, '{\"original\":\"excel_media\\/\\/617083bc1ed70.jpg\"}', 'image', 'IPX-D17-05E1S.jpg', 'excel_media', NULL, '2021-10-20 21:01:48', '2021-10-20 21:01:48'),
(200, '{\"original\":\"excel_media\\/\\/617084a005666.jpg\"}', 'image', 'IPX-D18-05E1.jpg', 'excel_media', NULL, '2021-10-20 21:05:36', '2021-10-20 21:05:36'),
(201, '{\"original\":\"excel_media\\/\\/617085327608c.jpg\"}', 'image', 'KFS-ES3.jpg', 'excel_media', NULL, '2021-10-20 21:08:02', '2021-10-20 21:08:02'),
(202, '{\"original\":\"excel_media\\/\\/6170854896b21.jpg\"}', 'image', 'KFS-PC8 220V.jpg', 'excel_media', NULL, '2021-10-20 21:08:24', '2021-10-20 21:08:24'),
(203, '{\"original\":\"excel_media\\/\\/61708562d8a21.jpg\"}', 'image', 'KH-4022.jpg', 'excel_media', NULL, '2021-10-20 21:08:50', '2021-10-20 21:08:50'),
(204, '{\"original\":\"excel_media\\/\\/6170858351a1e.jpg\"}', 'image', 'KH-702.jpg', 'excel_media', NULL, '2021-10-20 21:09:23', '2021-10-20 21:09:23'),
(206, '{\"original\":\"excel_media\\/\\/6170859cd9fed.jpg\"}', 'image', 'KH-706.jpg', 'excel_media', NULL, '2021-10-20 21:09:48', '2021-10-20 21:09:48'),
(207, '{\"original\":\"excel_media\\/\\/617085c884e2b.jpg\"}', 'image', 'KPS-AL.jpg', 'excel_media', NULL, '2021-10-20 21:10:32', '2021-10-20 21:10:32'),
(208, '{\"original\":\"excel_media\\/\\/617085d4522af.jpg\"}', 'image', 'KPS-ALD.jpg', 'excel_media', NULL, '2021-10-20 21:10:44', '2021-10-20 21:10:44'),
(209, '{\"original\":\"excel_media\\/\\/617085e2c61dd.jpg\"}', 'image', 'KPS-ALTR.jpg', 'excel_media', NULL, '2021-10-20 21:10:58', '2021-10-20 21:10:58'),
(210, '{\"original\":\"excel_media\\/\\/6170f86418fcf.jpg\"}', 'image', 'kps-cp012.jpg', 'excel_media', NULL, '2021-10-21 05:19:32', '2021-10-21 05:19:32'),
(211, '{\"original\":\"excel_media\\/\\/6170f8dddf539.jpg\"}', 'image', 'KPS-CT.jpg', 'excel_media', NULL, '2021-10-21 05:21:33', '2021-10-21 05:21:33'),
(212, '{\"original\":\"excel_media\\/\\/6170fa3402a59.jpg\"}', 'image', 'KPS-M-C.jpg', 'excel_media', NULL, '2021-10-21 05:27:16', '2021-10-21 05:27:16'),
(213, '{\"original\":\"excel_media\\/\\/6170fa584ad78.jpg\"}', 'image', 'KPS-M60.jpg', 'excel_media', NULL, '2021-10-21 05:27:52', '2021-10-21 05:27:52'),
(214, '{\"original\":\"excel_media\\/\\/6170fa62dbc62.jpg\"}', 'image', 'KPS-M61.jpg', 'excel_media', NULL, '2021-10-21 05:28:02', '2021-10-21 05:28:02'),
(215, '{\"original\":\"excel_media\\/\\/6170fa6e56bd6.jpg\"}', 'image', 'KPS-M62.jpg', 'excel_media', NULL, '2021-10-21 05:28:14', '2021-10-21 05:28:14'),
(216, '{\"original\":\"excel_media\\/\\/6170fa993e10c.jpg\"}', 'image', 'KPS-O.jpg', 'excel_media', NULL, '2021-10-21 05:28:57', '2021-10-21 05:28:57'),
(217, '{\"original\":\"excel_media\\/\\/6170facf69e44.jpg\"}', 'image', 'KPS-ODP.jpg', 'excel_media', NULL, '2021-10-21 05:29:51', '2021-10-21 05:29:51'),
(218, '{\"original\":\"excel_media\\/\\/6170fc340d03a.jpg\"}', 'image', 'KPS-R3.jpg', 'excel_media', NULL, '2021-10-21 05:35:48', '2021-10-21 05:35:48'),
(219, '{\"original\":\"excel_media\\/\\/6170fc595edc8.jpg\"}', 'image', 'KPS-Z2DN.jpg', 'excel_media', NULL, '2021-10-21 05:36:25', '2021-10-21 05:36:25'),
(220, '{\"original\":\"excel_media\\/\\/6170ff4195191.jpg\"}', 'image', 'KPS-ZDN.jpg', 'excel_media', NULL, '2021-10-21 05:48:49', '2021-10-21 05:48:49'),
(221, '{\"original\":\"excel_media\\/\\/6170ff7021caf.jpg\"}', 'image', 'KPS-ZRN.jpg', 'excel_media', NULL, '2021-10-21 05:49:36', '2021-10-21 05:49:36'),
(222, '{\"original\":\"excel_media\\/\\/6170ffb03f878.jpg\"}', 'image', 'KPS-ZTN.jpg', 'excel_media', NULL, '2021-10-21 05:50:40', '2021-10-21 05:50:40'),
(223, '{\"original\":\"excel_media\\/\\/6170ffce04ff9.jpg\"}', 'image', 'KPX.jpg', 'excel_media', NULL, '2021-10-21 05:51:10', '2021-10-21 05:51:10'),
(224, '{\"original\":\"excel_media\\/\\/61710015b527f.jpg\"}', 'image', 'KTM-AM8.jpg', 'excel_media', NULL, '2021-10-21 05:52:21', '2021-10-21 05:52:21'),
(225, '{\"original\":\"excel_media\\/\\/6171003db8d65.jpg\"}', 'image', 'KTM-AMT.jpg', 'excel_media', NULL, '2021-10-21 05:53:01', '2021-10-21 05:53:01'),
(226, '{\"original\":\"excel_media\\/\\/6171010b223c7.jpg\"}', 'image', 'NS22-PA.jpg', 'excel_media', NULL, '2021-10-21 05:56:27', '2021-10-21 05:56:27'),
(227, '{\"original\":\"excel_media\\/\\/6171012ad446a.jpg\"}', 'image', 'NS22-BM.jpg', 'excel_media', NULL, '2021-10-21 05:56:58', '2021-10-21 05:56:58'),
(228, '{\"original\":\"excel_media\\/\\/6171014891988.jpg\"}', 'image', 'NS22-DM.jpg', 'excel_media', NULL, '2021-10-21 05:57:28', '2021-10-21 05:57:28'),
(229, '{\"original\":\"excel_media\\/\\/617101816c9ca.jpg\"}', 'image', 'NS22-K2.jpg', 'excel_media', NULL, '2021-10-21 05:58:25', '2021-10-21 05:58:25'),
(230, '{\"original\":\"excel_media\\/\\/617101ec1d55b.jpg\"}', 'image', 'NS22-PEM.jpg', 'excel_media', NULL, '2021-10-21 06:00:12', '2021-10-21 06:00:12'),
(231, '{\"original\":\"excel_media\\/\\/6171020b22a45.jpg\"}', 'image', 'NS22-PER-R0A01B.jpg', 'excel_media', NULL, '2021-10-21 06:00:43', '2021-10-21 06:00:43'),
(232, '{\"original\":\"excel_media\\/\\/6171029f39574.jpg\"}', 'image', 'NS22-S2.jpg', 'excel_media', NULL, '2021-10-21 06:03:11', '2021-10-21 06:03:11'),
(234, '{\"original\":\"products\\/\\/6171062ae5eeb.jpg\"}', 'image', 'KH-704.jpg', 'products', NULL, '2021-10-21 06:18:18', '2021-10-21 06:18:18'),
(235, '{\"original\":\"excel_media\\/\\/6171067521e35.jpg\"}', 'image', 'KH-704.jpg', 'excel_media', NULL, '2021-10-21 06:19:33', '2021-10-21 06:19:33'),
(236, '{\"original\":\"excels\\/KOINO\\/617107560d3af.xlsx\"}', 'excel', 'KOINO.xlsx', 'excels', 'KOINO', '2021-10-21 06:23:18', '2021-10-21 06:23:18'),
(237, '{\"original\":\"categories\\/\\/617110d1c12f6.jpg\"}', 'image', 'SENSYS.jpg', 'categories', NULL, '2021-10-21 07:03:45', '2021-10-21 07:03:45');

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
(1, '2012_06_05_103941_create_media_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2021_07_13_001404_create_users_codes_table', 1),
(4, '2021_08_23_143934_create_categories_table', 1),
(5, '2021_08_23_144201_create_sliders_table', 1),
(6, '2021_07_27_165840_create_blacklists_table', 2),
(7, '2021_08_25_010716_create_posts_categories_table', 3),
(8, '2021_08_25_010941_create_posts_table', 3),
(9, '2021_08_25_121600_create_posts_media_table', 3),
(10, '2021_08_25_132903_create_brands_table', 4),
(11, '2021_08_25_140909_create_products_table', 5),
(12, '2021_08_25_190151_create_products_gallery_table', 5),
(13, '2021_08_27_213426_create_products_media_table', 6),
(14, '2021_08_28_173911_create_banners_table', 7),
(15, '2021_08_29_174122_create_contact_us_table', 8),
(16, '2021_09_01_004047_create_show_categories_table', 9),
(17, '2021_09_01_231000_create_provinces_table', 10),
(18, '2021_09_01_231139_create_cities_table', 10),
(21, '2021_09_02_123522_create_orders_table', 11),
(22, '2021_09_02_123731_create_orders_items_table', 11),
(23, '2021_09_11_235401_create_transactions_table', 12),
(24, '2021_09_13_175602_create_excel_media_table', 13),
(25, '2021_08_25_140000_create_groups_table', 14),
(26, '2021_10_13_131135_create_inquiries_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `province_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) UNSIGNED NOT NULL,
  `address` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_ci,
  `status` enum('accept','pending','updated') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `type` enum('paid','unpaid') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'unpaid',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `province_id`, `city_id`, `address`, `phone`, `code`, `message`, `status`, `type`, `created_at`, `updated_at`) VALUES
(4, 1, 31, 426, 'test', '0123456789', 'MNaPAQpiry', NULL, 'accept', 'unpaid', '2021-10-07 15:18:42', '2021-10-07 15:19:07'),
(6, 1, 31, 426, 'test', '0123456789', 'DmtR190RBa', NULL, 'accept', 'unpaid', '2021-10-12 07:36:49', '2021-10-12 09:29:22'),
(9, 15, 10, 145, 'یبسشبشسب شیبس بس', '03535219910', 'aNTFyUKAVo', NULL, 'accept', 'unpaid', '2021-10-21 08:16:14', '2021-10-21 08:17:06'),
(10, 15, 4, 61, 'rueufhjb', '03535219910', 'urrtwdWQBP', NULL, 'pending', 'unpaid', '2021-10-21 09:18:55', '2021-10-21 09:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `orders_items`
--

CREATE TABLE `orders_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL,
  `status` enum('available','unavailable') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'available',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders_items`
--

INSERT INTO `orders_items` (`id`, `order_id`, `product_id`, `price`, `count`, `status`, `created_at`, `updated_at`) VALUES
(17, 9, 257, 19500, 10, 'available', '2021-10-21 08:16:14', '2021-10-21 08:16:14'),
(18, 10, 256, 19500, 5, 'available', '2021-10-21 09:18:55', '2021-10-21 09:18:55'),
(19, 10, 258, 306700, 2, 'available', '2021-10-21 09:18:55', '2021-10-21 09:18:55'),
(20, 10, 257, 19500, 1, 'available', '2021-10-21 09:18:55', '2021-10-21 09:18:55');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `name`, `slug`, `category_id`, `image_id`, `text`, `status`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test', 2, 7, '<p>test</p>', 'active', '2021-08-25 08:40:07', '2021-08-25 08:40:08'),
(2, 'test2', 'test2', 2, 26, '<p>tr</p>', 'active', '2021-08-28 17:28:12', '2021-08-28 17:28:12'),
(3, 'tedg', 'sgsg', 2, 27, '<p>fgfg</p>', 'active', '2021-08-28 17:28:32', '2021-08-28 17:28:32'),
(4, 'zgzg', 'gzgzgzg', 2, 37, '<p>gss</p>', 'active', '2021-08-29 18:23:05', '2021-08-29 18:23:05'),
(5, 'gzgzgz', 'zgzzgzgz', 2, 38, '<p>gzgz</p>', 'active', '2021-08-29 18:23:39', '2021-08-29 18:23:39'),
(6, 'zgzgaaaa', 'zgvvvaa', 2, 39, '<p>gd</p>', 'active', '2021-08-29 18:24:02', '2021-08-29 18:24:02');

-- --------------------------------------------------------

--
-- Table structure for table `posts_categories`
--

CREATE TABLE `posts_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_categories`
--

INSERT INTO `posts_categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(2, 'test', 'test', '2021-08-25 08:37:25', '2021-08-25 08:37:25');

-- --------------------------------------------------------

--
-- Table structure for table `posts_media`
--

CREATE TABLE `posts_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts_media`
--

INSERT INTO `posts_media` (`id`, `post_id`, `media_id`, `created_at`, `updated_at`) VALUES
(1, 1, 8, '2021-08-25 08:54:35', '2021-08-25 08:54:35');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pdf_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` bigint(20) UNSIGNED NOT NULL,
  `discount` int(10) UNSIGNED DEFAULT NULL,
  `text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` bigint(20) UNSIGNED NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
  `group_id` bigint(20) UNSIGNED DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `slug`, `category_id`, `brand_id`, `image_id`, `pdf_id`, `price`, `discount`, `text`, `count`, `status`, `sale`, `group_id`, `code`, `created_at`, `updated_at`) VALUES
(152, 'KT470 #TCN4S-24R', 'kt470-tcn4s-24r', NULL, NULL, NULL, NULL, 628600, NULL, 'کنترلر حرارت کاکن PID & ON-OFF Controller / Multi Input /Output Relay-SSR 48*48mm', 50, 'active', 0, 5, '1', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(153, 'KMSR-DS0104 #SR1-1410', 'kmsr-ds0104-sr1-1410', 41, 9, 161, NULL, 154800, NULL, 'تک فاز SSR IN: 4~32 DC OUT:90~480 AC 10A', 50, 'active', 0, 5, '2', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(154, 'KMSR-DS0204 #SR1-1420', 'kmsr-ds0204-sr1-1420', 41, 9, 161, NULL, 190400, NULL, 'تک فاز SSR IN: 4~32 DC OUT:90~480 AC 20A', 50, 'active', 0, 5, '3', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(155, 'KMSR-DS0254 #SR1-1425', 'kmsr-ds0254-sr1-1425', 41, 9, 161, NULL, 211700, NULL, 'تک فاز SSR IN: 4~32 DC OUT:90~480 AC 25A', 50, 'active', 0, 5, '4', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(156, 'KMSR-DS0404 #SR1-1440', 'kmsr-ds0404-sr1-1440', 41, 9, 161, NULL, 250200, NULL, 'تک فاز SSR IN: 4~32 DC OUT:90~480 AC 40A', 50, 'active', 0, 5, '5', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(157, 'KMSR-DT0104 #SSR_3P رله SSR', 'kmsr-dt0104-ssr-3p', 40, 9, 160, NULL, 610400, NULL, '<p>سه فاز SSR IN: 4~32 DC OUT:90~480 AC 10A</p>\r\n\r\n<p>رله SSR سه فاز 10 آمپر کاکن | SSR (مخفف Solid State Ralay) یک کلید تماما الکترونیکی است که به آن رله حالت جامد هم می گویند. اختراع این تجهیزات در سال 1971 میلادی گام بزرگی در صنعت تولید رله محسوب می شود. همانطور که می دانید رله های الکترومکانیکی از سیم پیچ ها، میدان های مغناطیسی، فنرها و کنتاکت های مکانیکی جهت کنترل و سوییچ کردن ولتاژ استفاده می کنند. اما در رله های اس اس آر کاکن مدل KMSR-DT0104 هیچ قسمت متحرکی وجود ندارد. در عوض این تجهیزات از خواص الکتریکی و نوری نیمه هادی ها جهت ایزوله کردن و سوییچینگ خروجی بهره می برند. ورودی رله های SSR از نوع DC است اما خروجی آن ها همانند سایر رله ها می تواند DC یا AC باشد. در این رله هم دو مدار فرمان و قدرت را داریم که توسط یک اپتوکوپلر از هم ایزوله شده اند.</p>', 50, 'active', 0, 5, '6', '2021-10-15 21:17:05', '2021-10-16 05:40:02'),
(158, 'KMSR-DT0254 #SSR_3P', 'kmsr-dt0254-ssr-3p', 42, 9, 160, NULL, 639200, NULL, 'سه فاز SSR IN: 4~32 DC OUT:90~480 AC 25A', 50, 'active', 0, 5, '7', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(159, 'KMSR-DT0404 #SSR_3P', 'kmsr-dt0404-ssr-3p', 42, 9, 160, NULL, 952500, NULL, 'سه فاز SSR IN: 4~32 DC OUT:90~480 AC 40A', 50, 'active', 0, 5, '8', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(160, 'KMSR-DT0604 #SSR_3P', 'kmsr-dt0604-ssr-3p', 42, 9, 160, NULL, 1921100, NULL, 'سه فاز SSR IN: 4~32 DC OUT:90~480 AC 60A', 50, 'active', 0, 5, '9', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(161, 'KMSR-DT1004 #SSR_3P', 'kmsr-dt1004-ssr-3p', 42, 9, 160, NULL, 2214100, NULL, 'سه فاز SSR IN: 4~32 DC OUT:90~480 AC 100A', 50, 'active', 0, 5, '10', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(162, 'KMSR-AT0104 #SSR_3P', 'kmsr-at0104-ssr-3p', 43, 9, 160, NULL, 644700, NULL, 'سه فاز SSR IN: 90~265 AC OUT:90~480 AC 10A', 50, 'active', 0, 5, '11', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(163, 'KMSR-AT0254 #SSR_3P', 'kmsr-at0254-ssr-3p', 43, 9, 160, NULL, 1021800, NULL, 'سه فاز SSR IN: 90~265 AC OUT:90~480 AC 25A', 50, 'active', 0, 5, '12', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(164, 'KMSR-AT0404 #SSR_3P', 'kmsr-at0404-ssr-3p', 43, 9, 160, NULL, 1069800, NULL, 'سه فاز SSR IN: 90~265 AC OUT:90~480 AC 40A', 50, 'active', 0, 5, '13', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(165, 'KMSR-AT0604 #SSR_3P', 'kmsr-at0604-ssr-3p', 43, 9, 160, NULL, 1907500, NULL, 'سه فاز SSR IN: 90~265 AC OUT:90~480 AC 60A', 50, 'active', 0, 5, '14', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(166, 'KMSR-AT1004 #SSR_3P', 'kmsr-at1004-ssr-3p', 43, 9, 160, NULL, 2643400, NULL, 'سه فاز SSR IN: 90~265 AC OUT:90~480 AC 100A', 50, 'active', 0, 5, '15', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(167, 'RXT-F01_for_TF-1C', 'rxt-f01-for-tf-1c', 27, 9, 168, NULL, 71600, NULL, 'سوکت برای رله TF-1C', 50, 'active', 0, 5, '16', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(168, 'RXT-QS', 'rxt-qs', 27, 9, 169, NULL, 51800, NULL, 'جامپر رله پی ال سی 20 پل', 50, 'active', 0, 5, '17', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(169, 'TF-1C-24VDC', 'tf-1c-24vdc', 27, 9, 167, NULL, 45600, NULL, 'رله پی ال سی 24VDC', 50, 'active', 0, 5, '18', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(170, 'K705-2PL-110VAC', 'k705-2pl-110vac', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '19', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(171, 'K705-2PL-12VAC', 'k705-2pl-12vac', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '20', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(172, 'K705-2PL-12VDC', 'k705-2pl-12vdc', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '21', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(173, 'K705-2PL-220VAC', 'k705-2pl-220vac', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '22', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(174, 'K705-2PL-24VAC', 'k705-2pl-24vac', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '23', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(175, 'K705-2PL-24VDC', 'k705-2pl-24vdc', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '24', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(176, 'K705-2PL-48VDC', 'k705-2pl-48vdc', 24, 9, 137, NULL, 69100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 5A', 50, 'active', 0, 5, '25', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(177, 'KMY2Q_for_K705-2PL', 'kmy2q-for-k705-2pl', 44, 9, 162, NULL, 61800, NULL, 'سوکت ترمینال فشاری برای رله K705-2PL', 50, 'active', 0, 5, '26', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(178, 'KMY2S-G_for_K705-2PL', 'kmy2s-g-for-k705-2pl', 44, 9, 162, NULL, 25700, NULL, 'سوکت برای رله K705-2PL', 50, 'active', 0, 5, '27', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(179, 'KPY22_for_K705-2PL', 'kpy22-for-k705-2pl', 44, 9, 162, NULL, 47800, NULL, 'سوکت برای رله K705-2PL', 50, 'active', 0, 5, '28', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(180, 'KPY2_for_K705-2PL', 'kpy2-for-k705-2pl', 44, 9, 162, NULL, 47800, NULL, 'سوکت برای رله K705-2PL', 50, 'active', 0, 5, '29', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(181, 'K705-4PL-110VAC', 'k705-4pl-110vac', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '30', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(182, 'K705-4PL-12VAC', 'k705-4pl-12vac', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '31', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(183, 'K705-4PL-12VDC', 'k705-4pl-12vdc', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '32', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(184, 'K705-4PL-220VAC', 'k705-4pl-220vac', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '33', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(185, 'K705-4PL-24VAC', 'k705-4pl-24vac', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '34', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(186, 'K705-4PL-24VDC', 'k705-4pl-24vdc', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '35', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(187, 'K705-4PL-48VDC', 'k705-4pl-48vdc', 25, 9, 137, NULL, 73600, NULL, 'رله 4 کنتاکت 14 پایه LED RESET 3A', 50, 'active', 0, 5, '36', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(188, 'KMY4Q_for_K705-4PL', 'kmy4q-for-k705-4pl', 44, 9, 163, NULL, 79700, NULL, 'سوکت ترمینال فشاری برای رله K705-4PL', 50, 'active', 0, 5, '37', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(189, 'KMY4S_for_K705-4PL', 'kmy4s-for-k705-4pl', 44, 9, 164, NULL, 25700, NULL, 'سوکت برای رله K705-4PL', 50, 'active', 0, 5, '38', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(190, 'K706-1PLT-12VDC', 'k706-1plt-12vdc', 26, 9, 141, NULL, 68100, NULL, 'رله کتابی 1 کنتاکت LED RESET 10A', 50, 'active', 0, 5, '39', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(191, 'K706-1PLT-220VAC', 'k706-1plt-220vac', 26, 9, 141, NULL, 79000, NULL, 'رله کتابی 1 کنتاکت LED RESET 10A', 50, 'active', 0, 5, '40', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(192, 'K706-1PLT-24VDC', 'k706-1plt-24vdc', 26, 9, 141, NULL, 68100, NULL, 'رله کتابی 1 کنتاکت LED RESET 10A', 50, 'active', 0, 5, '41', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(193, 'KPX12_for_K706-1PLT', 'kpx12-for-k706-1plt', 45, 9, 165, NULL, 37900, NULL, 'سوکت برای رله K706-1PLT', 50, 'active', 0, 5, '42', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(194, 'K706-2PLT-12VDC', 'k706-2plt-12vdc', 26, 9, 141, NULL, 69300, NULL, 'رله کتابی 2 کنتاکت LED RESET 5A', 50, 'active', 0, 5, '43', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(195, 'K706-2PLT-220VAC', 'k706-2plt-220vac', 26, 9, 141, NULL, 82300, NULL, 'رله کتابی 2 کنتاکت LED RESET 5A', 50, 'active', 0, 5, '44', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(196, 'K706-2PLT-24VDC', 'k706-2plt-24vdc', 26, 9, 141, NULL, 69300, NULL, 'رله کتابی 2 کنتاکت LED RESET 5A', 50, 'active', 0, 5, '45', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(197, 'KPX22_for_K706-2PLT', 'kpx22-for-k706-2plt', 45, 9, 165, NULL, 37900, NULL, 'سوکت برای رله K706-2PLT', 50, 'active', 0, 5, '46', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(198, 'K707-2PL-110VAC', 'k707-2pl-110vac', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '47', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(199, 'K707-2PL-12VAC', 'k707-2pl-12vac', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '48', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(200, 'K707-2PL-12VDC', 'k707-2pl-12vdc', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '49', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(201, 'K707-2PL-220VAC', 'k707-2pl-220vac', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '50', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(202, 'K707-2PL-24VAC', 'k707-2pl-24vac', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '51', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(203, 'K707-2PL-24VDC', 'k707-2pl-24vdc', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '52', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(204, 'K707-2PL-48VDC', 'k707-2pl-48vdc', 28, 9, 150, NULL, 85100, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '53', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(205, 'KF083A_for_K707-2PL', 'kf083a-for-k707-2pl', 31, 9, 155, NULL, 19700, NULL, 'سوکت 8 پایه برای رله K707-2PL', 50, 'active', 0, 5, '54', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(206, 'K707-3PL-110VAC', 'k707-3pl-110vac', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '55', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(207, 'K707-3PL-12VAC', 'k707-3pl-12vac', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '56', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(208, 'K707-3PL-12VDC', 'k707-3pl-12vdc', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '57', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(209, 'K707-3PL-220VAC', 'k707-3pl-220vac', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '58', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(210, 'K707-3PL-24VAC', 'k707-3pl-24vac', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '59', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(211, 'K707-3PL-24VDC', 'k707-3pl-24vdc', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '60', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(212, 'K707-3PL-48VDC', 'k707-3pl-48vdc', 29, 9, 150, NULL, 98200, NULL, 'رله 3 کنتاکت 11 پایه LED RESET 10A', 50, 'active', 0, 5, '61', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(213, 'KF113A_for_K707-3PL', 'kf113a-for-k707-3pl', 31, 9, 155, NULL, 25700, NULL, 'سوکت 11 پایه برای رله K707-3PL', 50, 'active', 0, 5, '62', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(214, 'K710-2PL-12VDC', 'k710-2pl-12vdc', 30, 9, 153, NULL, 73600, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '63', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(215, 'K710-2PL-220VAC', 'k710-2pl-220vac', 30, 9, 153, NULL, 73600, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '64', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(216, 'K710-2PL-24VDC', 'k710-2pl-24vdc', 30, 9, 153, NULL, 73600, NULL, 'رله 2 کنتاکت 8 پایه LED RESET 10A', 50, 'active', 0, 5, '65', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(217, 'KLY2_for_K710-2PL', 'kly2-for-k710-2pl', 30, 9, 166, NULL, 23900, NULL, 'سوکت برای رله K710-2PL', 50, 'active', 0, 5, '66', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(218, 'KF083A سوکت 8 پایه تایمر', 'kf083a-سوکت-8-پایه-تایمر', 31, 9, 155, NULL, 19700, NULL, 'سوکت 8 پایه تایمر', 50, 'active', 0, 5, '67', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(219, 'KF113A سوکت 11 پایه تایمر', 'kf113a-سوکت-11-پایه-تایمر', 31, 9, 155, NULL, 25700, NULL, 'سوکت 11 پایه تایمر', 50, 'active', 0, 5, '68', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(220, 'V15F01C', 'v15f01c', 38, 9, 170, NULL, 16300, NULL, 'Micro Switch', 50, 'active', 0, 5, '69', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(221, 'V15F06C', 'v15f06c', 38, 9, 170, NULL, 21200, NULL, 'Micro Switch', 50, 'active', 0, 5, '70', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(222, 'V15F07C', 'v15f07c', 38, 9, 170, NULL, 21200, NULL, 'Micro Switch', 50, 'active', 0, 5, '71', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(223, 'V15F09C', 'v15f09c', 38, 9, 170, NULL, 21200, NULL, 'Micro Switch', 50, 'active', 0, 5, '72', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(224, 'Z15G030B', 'z15g030b', 39, 9, 171, NULL, 109200, NULL, 'Micro Switch', 50, 'active', 0, 5, '73', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(225, 'Z15G052B', 'z15g052b', 39, 9, 172, NULL, 98100, NULL, 'Micro Switch', 50, 'active', 0, 5, '74', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(226, 'Z15G062B', 'z15g062b', 39, 9, 173, NULL, 61300, NULL, 'Micro Switch', 50, 'active', 0, 5, '75', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(227, 'Z15G063B', 'z15g063b', 39, 9, 174, NULL, 56000, NULL, 'Micro Switch', 50, 'active', 0, 5, '76', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(228, 'KLM-A-L3', 'klm-a-l3', 33, 9, 156, NULL, 248000, NULL, 'Limit Switch', 50, 'active', 0, 5, '77', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(229, 'KLM-A-L4', 'klm-a-l4', 33, 9, 157, NULL, 248000, NULL, 'Limit Switch', 50, 'active', 0, 5, '78', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(230, 'KLS-A-L2', 'kls-a-l2', 34, 9, 158, NULL, 189400, NULL, 'Limit Switch', 50, 'active', 0, 5, '79', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(231, 'KLS-A-L3', 'kls-a-l3', 34, 9, 158, NULL, 184000, NULL, 'Limit Switch', 50, 'active', 0, 5, '80', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(232, 'KLS-A-P2', 'kls-a-p2', 34, 9, 159, NULL, 189400, NULL, 'Limit Switch', 50, 'active', 0, 5, '81', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(233, 'ZXM-301 (KXM-301)', 'zxm-301-kxm-301', 35, 9, 175, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '82', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(234, 'ZXM-302 (KXM-302)', 'zxm-302-kxm-302', 35, 9, 176, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '83', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(235, 'ZXM-312 (KXM-312)', 'zxm-312-kxm-312', 35, 9, 177, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '84', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(236, 'ZXM-702 (KXM-702)', 'zxm-702-kxm-702', 35, 9, NULL, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '85', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(237, 'ZXM-703 (KXM-703)', 'zxm-703-kxm-703', 35, 9, NULL, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '86', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(238, 'ZXM-704 (KXM-704)', 'zxm-704-kxm-704', 35, 9, NULL, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '87', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(239, 'ZXM-901 (KXM-901)', 'zxm-901-kxm-901', 35, 9, NULL, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '88', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(240, 'ZXM-923 (KXM-923)', 'zxm-923-kxm-923', 35, 9, NULL, NULL, 135600, NULL, 'Limit Switch', 50, 'active', 0, 5, '89', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(241, 'ZXL-101 (KXL-101)', 'zxl-101-kxl-101', 36, 9, NULL, NULL, 117200, NULL, 'Limit Switch', 50, 'active', 0, 5, '90', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(242, 'ZXL-301 (KXL-301)', 'zxl-301-kxl-301', 36, 9, NULL, NULL, 195000, NULL, 'Limit Switch', 50, 'active', 0, 5, '91', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(243, 'ZXL-302 (KXL-302)', 'zxl-302-kxl-302', 36, 9, NULL, NULL, 195000, NULL, 'Limit Switch', 50, 'active', 0, 5, '92', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(244, 'ZXL-303 (KXL-303)', 'zxl-303-kxl-303', 36, 9, NULL, NULL, 195000, NULL, 'Limit Switch', 50, 'active', 0, 5, '93', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(245, 'ZXL-702 (KXL-702)', 'zxl-702-kxl-702', 36, 9, NULL, NULL, 195000, NULL, 'Limit Switch', 50, 'active', 0, 5, '94', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(246, 'ZXL-703 (KXL-703)', 'zxl-703-kxl-703', 36, 9, NULL, NULL, 195000, NULL, 'Limit Switch', 50, 'active', 0, 5, '95', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(247, 'ZXL-902 (KXL-902)', 'zxl-902-kxl-902', 36, 9, NULL, NULL, 195000, NULL, 'Limit Switch', 50, 'active', 0, 5, '96', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(248, 'HRF-HD3', 'hrf-hd3', 47, 9, NULL, NULL, 825600, NULL, 'KACON Foot Switch - پدال', 50, 'active', 0, 5, '97', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(249, 'HRF-HD3N', 'hrf-hd3n', 47, 9, NULL, NULL, 594200, NULL, 'KACON Foot Switch - پدال', 50, 'active', 0, 5, '98', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(250, 'HRF-M1-G', 'hrf-m1-g', 47, 9, NULL, NULL, 70200, NULL, 'KACON Foot Switch - پدال', 50, 'active', 0, 5, '99', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(251, 'HRF-M3 ( HRF-MD3 )', 'hrf-m3-hrf-md3', 47, 9, NULL, NULL, 119900, NULL, 'KACON Foot Switch - پدال', 50, 'active', 0, 5, '100', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(252, 'HRF-M52-Y', 'hrf-m52-y', 47, 9, NULL, NULL, 756300, NULL, 'KACON Foot Switch - پدال', 50, 'active', 0, 5, '101', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(253, 'HRF-MX1', 'hrf-mx1', 47, 9, NULL, NULL, 102200, NULL, 'KACON Foot Switch - پدال', 50, 'active', 0, 5, '102', '2021-10-15 21:17:05', '2021-10-15 21:17:05'),
(254, 'CH-9S-LED-220V-G', 'CH-9S-LED-220V-G', 83, 10, 189, NULL, 19500, NULL, 'ال ای دی یدکی سبز LED 220VAC', 50, 'active', 0, 6, '103', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(255, 'CH-9S-LED-220V-R', 'CH-9S-LED-220V-R', 83, 10, 190, NULL, 19500, NULL, 'ال ای دی یدکی قرمز LED 220VAC', 50, 'active', 0, 6, '104', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(256, 'CH-9S-LED-24V-G', 'CH-9S-LED-24V-G', 83, 10, 189, NULL, 19500, NULL, 'ال ای دی یدکی سبز LED 24VAC/DC', 50, 'active', 0, 6, '105', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(257, 'CH-9S-LED-24V-R', 'CH-9S-LED-24V-R', 83, 10, 190, NULL, 19500, NULL, 'ال ای دی یدکی قرمز LED 24VAC/DC', 50, 'active', 0, 6, '106', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(258, 'CPX-C18-08A1N \"CR18-8AO', 'CPX-C18-08A1N \"CR18-8AO', 60, 10, 191, NULL, 306700, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '107', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(259, 'CPX-C18-08A2N \"CR18-8AC', 'CPX-C18-08A2N \"CR18-8AC', 60, 10, 191, NULL, 306700, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '108', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(260, 'CPX-C30-15A1N \"CR30-15AO', 'CPX-C30-15A1N \"CR30-15AO', 60, 10, 192, NULL, 345000, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '109', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(261, 'CPX-C30-15A2N \"CR30-15AC', 'CPX-C30-15A2N \"CR30-15AC', 60, 10, 192, NULL, 345000, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '110', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(262, 'CPX-D18-08E1N \"CR18-8DN', 'CPX-D18-08E1N \"CR18-8DN', 60, 10, 193, NULL, 297100, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '111', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(263, 'CPX-D18-08E2N \"CR18-8DN2', 'CPX-D18-08E2N \"CR18-8DN2', 60, 10, 193, NULL, 306700, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '112', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(264, 'CPX-D18-08E3N \"CR18-8DP', 'CPX-D18-08E3N \"CR18-8DP', 60, 10, 193, NULL, 297100, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '113', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(265, 'CPX-D18-08E4N \"CR18-8DP2', 'CPX-D18-08E4N \"CR18-8DP2', 60, 10, 193, NULL, 306700, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '114', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(266, 'CPX-D30-15E1N \"CR30-15DN', 'CPX-D30-15E1N \"CR30-15DN', 60, 10, 194, NULL, 358400, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '115', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(267, 'CPX-D30-15E2N \"CR30-15DN2', 'CPX-D30-15E2N \"CR30-15DN2', 60, 10, 194, NULL, 377400, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '116', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(268, 'CPX-D30-15E3N \"CR30-15DP', 'CPX-D30-15E3N \"CR30-15DP', 60, 10, 194, NULL, 358400, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '117', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(269, 'CPX-D30-15E4N \"CR30-15DP2', 'CPX-D30-15E4N \"CR30-15DP2', 60, 10, 194, NULL, 377400, NULL, 'سنسور خازنی KOINO', 50, 'active', 0, 6, '118', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(270, 'D6SW-1 \"CID3-2', 'D6SW-1 \"CID3-2', 70, 10, 195, NULL, 100600, NULL, 'کابل کانکتور 2 متری 4 رشته صاف KOINO M12 I Type', 50, 'active', 0, 6, '119', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(271, 'D6SW-2 \"CLD3-2', 'D6SW-2 \"CLD3-2', 70, 10, 195, NULL, 100600, NULL, 'کابل کانکتور 2 متری 4 رشته ال KOINO M12 L Type', 50, 'active', 0, 6, '120', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(272, 'D6SW-5 \"CIDH4-3', 'D6SW-5 \"CIDH4-3', 70, 10, 195, NULL, 161300, NULL, 'کابل کانکتور 5 متری 4 رشته KOINO M12 I Type', 50, 'active', 0, 6, '121', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(273, 'IPX-A12-05A1N \"PR12-4AO', 'IPX-A12-05A1N \"PR12-4AO', 59, 10, 196, NULL, 218500, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '122', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(274, 'IPX-A12-05A2N \"PR12-4AC', 'IPX-A12-05A2N \"PR12-4AC', 59, 10, 196, NULL, 218500, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '123', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(275, 'IPX-A18-05A1 \"PR18-5AO', 'IPX-A18-05A1 \"PR18-5AO', 59, 10, 196, NULL, 222600, NULL, 'IPX-A18-05A1 \"PR18-5AO', 50, 'active', 0, 6, '124', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(276, 'IPX-A18-05A2 \"PR18-5AC', 'IPX-A18-05A2 \"PR18-5AC', 59, 10, 196, NULL, 222600, NULL, 'IPX-A18-05A2 \"PR18-5AC', 50, 'active', 0, 6, '125', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(277, 'IPX-A18-08A1N \"PRL18-8AO', 'IPX-A18-08A1N \"PRL18-8AO', 59, 10, 196, NULL, 223700, NULL, 'IPX-A18-08A1N \"PRL18-8AO', 50, 'active', 0, 6, '126', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(278, 'IPX-A18-08A2N \"PRL18-8AC', 'IPX-A18-08A2N \"PRL18-8AC', 59, 10, 196, NULL, 223700, NULL, 'IPX-A18-08A2N \"PRL18-8AC', 50, 'active', 0, 6, '127', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(279, 'IPX-A30-15A1N \"PRL30-15AO', 'IPX-A30-15A1N \"PRL30-15AO', 59, 10, 197, NULL, 243100, NULL, 'IPX-A30-15A1N \"PRL30-15AO', 50, 'active', 0, 6, '128', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(280, 'IPX-A30-15A2N \"PRL30-15AC', 'IPX-A30-15A2N \"PRL30-15AC', 59, 10, 197, NULL, 243100, NULL, 'IPX-A30-15A2N \"PRL30-15AC', 50, 'active', 0, 6, '129', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(281, 'IPX-D12-02E1 \"PR12-2DN', 'IPX-D12-02E1 \"PR12-2DN', 59, 10, 198, NULL, 203100, NULL, 'IPX-D12-02E1 \"PR12-2DN', 50, 'active', 0, 6, '130', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(282, 'IPX-D12-02E2 \"PR12-2DN2', 'IPX-D12-02E2 \"PR12-2DN2', 59, 10, 198, NULL, 203100, NULL, 'IPX-D12-02E2 \"PR12-2DN2', 50, 'active', 0, 6, '131', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(283, 'IPX-D12-02E3 \"PR12-2DP', 'IPX-D12-02E3 \"PR12-2DP', 59, 10, 198, NULL, 203100, NULL, 'IPX-D12-02E3 \"PR12-2DP', 50, 'active', 0, 6, '132', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(284, 'IPX-D12-02E4 \"PR12-2DP2', 'IPX-D12-02E4 \"PR12-2DP2', 59, 10, 198, NULL, 203100, NULL, 'IPX-D12-02E4 \"PR12-2DP2', 50, 'active', 0, 6, '133', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(285, 'IPX-D12-05E1N \"PR12-4DN', 'IPX-D12-05E1N \"PR12-4DN', 59, 10, 198, NULL, 199100, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '134', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(286, 'IPX-D12-05E1RN \"PRCM12-4DN', 'IPX-D12-05E1RN \"PRCM12-4DN', 59, 10, 198, NULL, 226300, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '135', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(287, 'IPX-D12-05E2N \"PR12-4DN2', 'IPX-D12-05E2N \"PR12-4DN2', 59, 10, 198, NULL, 199100, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '136', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(288, 'IPX-D12-05E3N \"PR12-4DP', 'IPX-D12-05E3N \"PR12-4DP', 59, 10, 198, NULL, 199100, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '137', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(289, 'IPX-D12-05E3RN \"PRCM12-4DP', 'IPX-D12-05E3RN \"PRCM12-4DP', 59, 10, 198, NULL, 226300, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '138', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(290, 'IPX-D12-05E4N \"PR12-4DP2', 'IPX-D12-05E4N \"PR12-4DP2', 59, 10, 198, NULL, 199100, NULL, 'فاصله دید 5 میلی متر KOINO', 50, 'active', 0, 6, '139', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(291, 'IPX-D17-05E1S \"PSN17-5DN', 'IPX-D17-05E1S \"PSN17-5DN', 59, 10, 198, NULL, 147200, NULL, 'IPX-D17-05E1S \"PSN17-5DN', 50, 'active', 0, 6, '140', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(292, 'IPX-D17-05E3S \"PSN17-5DP', 'IPX-D17-05E3S \"PSN17-5DP', 59, 10, 198, NULL, 147200, NULL, 'IPX-D17-05E3S \"PSN17-5DP', 50, 'active', 0, 6, '141', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(293, 'IPX-D18-05E1 \"PR18-5DN', 'IPX-D18-05E1 \"PR18-5DN', 59, 10, 200, NULL, 203100, NULL, 'IPX-D18-05E1 \"PR18-5DN', 50, 'active', 0, 6, '142', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(294, 'IPX-D18-05E2 \"PR18-5DN2', 'IPX-D18-05E2 \"PR18-5DN2', 59, 10, 200, NULL, 203100, NULL, 'IPX-D18-05E2 \"PR18-5DN2', 50, 'active', 0, 6, '143', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(295, 'IPX-D18-05E3 \"PR18-5DP', 'IPX-D18-05E3 \"PR18-5DP', 59, 10, 200, NULL, 203100, NULL, 'IPX-D18-05E3 \"PR18-5DP', 50, 'active', 0, 6, '144', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(296, 'IPX-D18-05E4 \"PR18-5DP2', 'IPX-D18-05E4 \"PR18-5DP2', 59, 10, 200, NULL, 203100, NULL, 'IPX-D18-05E4 \"PR18-5DP2', 50, 'active', 0, 6, '145', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(297, 'IPX-D18-08E1N \'L \"PRL18-8DN', 'IPX-D18-08E1N \'L \"PRL18-8DN', 59, 10, 200, NULL, 204400, NULL, 'IPX-D18-08E1N \'L \"PRL18-8DN', 50, 'active', 0, 6, '146', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(298, 'IPX-D18-08E1RN \'L \"PRCML18-8DN', 'IPX-D18-08E1RN \'L \"PRCML18-8DN', 59, 10, 200, NULL, 230300, NULL, 'IPX-D18-08E1RN \'L \"PRCML18-8DN', 50, 'active', 0, 6, '147', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(299, 'IPX-D18-08E2N \'L \"PRL18-8DN2', 'IPX-D18-08E2N \'L \"PRL18-8DN2', 59, 10, 200, NULL, 206700, NULL, 'IPX-D18-08E2N \'L \"PRL18-8DN2', 50, 'active', 0, 6, '148', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(300, 'IPX-D18-08E3N \'L \"PRL18-8DP', 'IPX-D18-08E3N \'L \"PRL18-8DP', 59, 10, 200, NULL, 204400, NULL, 'IPX-D18-08E3N \'L \"PRL18-8DP', 50, 'active', 0, 6, '149', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(301, 'IPX-D18-08E3RN \'L \"PRCML18-8DP', 'IPX-D18-08E3RN \'L \"PRCML18-8DP', 59, 10, 200, NULL, 230300, NULL, 'IPX-D18-08E3RN \'L \"PRCML18-8DP', 50, 'active', 0, 6, '150', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(302, 'IPX-D18-08E4N \'L \"PRL18-8DP2', 'IPX-D18-08E4N \'L \"PRL18-8DP2', 59, 10, 200, NULL, 206700, NULL, 'IPX-D18-08E4N \'L \"PRL18-8DP2', 50, 'active', 0, 6, '151', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(303, 'IPX-D30-10E1S \"PSN30-10DN', 'IPX-D30-10E1S \"PSN30-10DN', 59, 10, 200, NULL, 196100, NULL, 'فاصله دید 10 میلی متر KOINO', 50, 'active', 0, 6, '152', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(304, 'IPX-D30-10E3S \"PSN30-10DP', 'IPX-D30-10E3S \"PSN30-10DP', 59, 10, 200, NULL, 196100, NULL, 'فاصله دید 10 میلی متر KOINO', 50, 'active', 0, 6, '153', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(305, 'IPX-D30-15E1N \'L \"PRL30-15DN', 'IPX-D30-15E1N \'L \"PRL30-15DN', 59, 10, 200, NULL, 229000, NULL, 'IPX-D30-15E1N \'L \"PRL30-15DN', 50, 'active', 0, 6, '154', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(306, 'IPX-D30-15E2N \'L \"PRL30-15DN2', 'IPX-D30-15E2N \'L \"PRL30-15DN2', 59, 10, 200, NULL, 232900, NULL, 'IPX-D30-15E2N \'L \"PRL30-15DN2', 50, 'active', 0, 6, '155', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(307, 'IPX-D30-15E3N \'L \"PRL30-15DP', 'IPX-D30-15E3N \'L \"PRL30-15DP', 59, 10, 200, NULL, 229000, NULL, 'IPX-D30-15E3N \'L \"PRL30-15DP', 50, 'active', 0, 6, '156', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(308, 'IPX-D30-15E4N \'L \"PRL30-15DP2', 'IPX-D30-15E4N \'L \"PRL30-15DP2', 59, 10, 200, NULL, 232900, NULL, 'IPX-D30-15E4N \'L \"PRL30-15DP2', 50, 'active', 0, 6, '157', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(309, 'IPX-D40-20E1S \"PSN40-20DN', 'IPX-D40-20E1S \"PSN40-20DN', 59, 10, 200, NULL, 229000, NULL, 'فاصله دید 20 میلی متر KOINO', 50, 'active', 0, 6, '158', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(310, 'IPX-D40-20E3S \"PSN40-20DP', 'IPX-D40-20E3S \"PSN40-20DP', 59, 10, 200, NULL, 229000, NULL, 'فاصله دید 20 میلی متر KOINO', 50, 'active', 0, 6, '159', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(311, 'KFS-ES3', 'KFS-ES3', 87, 10, 201, NULL, 79700, NULL, 'پایه نگهدارنده الکترودهای کنترل سطح', 50, 'active', 0, 6, '160', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(312, 'KFS-PC8 220V', 'KFS-PC8 220V', 87, 10, 202, NULL, 209200, NULL, 'رله کنترل سطح', 50, 'active', 0, 6, '161', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(313, 'KH-4022 24VAC/DC', 'KH-4022 24VAC/DC', 85, 10, 203, NULL, 76100, NULL, 'بیزر 24VAC/DC قطر 22', 50, 'active', 0, 6, '162', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(314, 'KH-702', 'KH-702', 86, 10, 204, NULL, 309200, NULL, 'کلید جرثقیلی 2 شستی با امرجنسی', 50, 'active', 0, 6, '163', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(315, 'KH-704', 'KH-704', 86, 10, 235, NULL, 387800, NULL, 'کلید جرثقیلی 4 شستی با امرجنسی', 50, 'active', 0, 6, '164', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(316, 'KH-706', 'KH-706', 86, 10, 206, NULL, 463700, NULL, 'کلید جرثقیلی 6 شستی با امرجنسی', 50, 'active', 0, 6, '165', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(317, 'KPS-AL \"BEN10M-TFR', 'KPS-AL \"BEN10M-TFR', 61, 10, 207, NULL, 462000, NULL, 'KOINO سنسور نوری مقابل هم 10 متر - ضد آب - بدنه کوچک', 50, 'active', 0, 6, '166', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(318, 'KPS-ALD \"BEN300-DFR', 'KPS-ALD \"BEN300-DFR', 61, 10, 208, NULL, 423900, NULL, 'KOINO سنسور نوری یک طرف 1 متر - ضد آب - بدنه کوچک', 50, 'active', 0, 6, '167', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(319, 'KPS-ALTR \"BEN5M-MFR', 'KPS-ALTR \"BEN5M-MFR', 61, 10, 209, NULL, 474100, NULL, 'KOINO سنسور نوری آینه دار 5 متر - ضد آب - بدنه کوچک', 50, 'active', 0, 6, '168', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(320, 'KPS-AR \"BEN10M-TFR', 'KPS-AR \"BEN10M-TFR', 62, 10, 209, NULL, 393900, NULL, 'KOINO سنسور نوری مقابل هم 5 متر و سری جدید 10 متر تیپ بزرگ', 50, 'active', 0, 6, '169', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(321, 'KPS-ARDR \"BEN300-DFR', 'KPS-ARDR \"BEN300-DFR', 62, 10, 209, NULL, 334000, NULL, 'KOINO سنسور نوری یک طرف 60 سانت تیپ بزرگ', 50, 'active', 0, 6, '170', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(322, 'KPS-ARTR \"BEN5M-MFR', 'KPS-ARTR \"BEN5M-MFR', 62, 10, 209, NULL, 378700, NULL, 'KOINO سنسور نوری آینه دار 5 متر تیپ بزرگ', 50, 'active', 0, 6, '171', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(323, 'KPS-CP012-AC220V \"PA-12', 'KPS-CP012-AC220V \"PA-12', 68, 10, 210, NULL, 222900, NULL, 'کنترلر سنسور KOINO', 50, 'active', 0, 6, '172', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(324, 'KPS-CTVS', 'KPS-CTVS', 66, 10, 211, NULL, 367200, NULL, 'سنسور نوری مکعبی بسیار کوچک مقابل هم 1 متر', 50, 'active', 0, 6, '173', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(325, 'KPS-M-C \"CT-02', 'KPS-M-C \"CT-02', 64, 10, 212, NULL, 85900, NULL, 'کابل کانکتور چشم یو U برای KOINO \"KPS-M BS5', 50, 'active', 0, 6, '174', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(326, 'KPS-M60C \"BS5-K2M', 'KPS-M60C \"BS5-K2M', 64, 10, 213, NULL, 99600, NULL, 'چشم KOINO U 5mm K Type', 50, 'active', 0, 6, '175', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(327, 'KPS-M61C \"BS5-L2M', 'KPS-M61C \"BS5-L2M', 64, 10, 214, NULL, 99600, NULL, 'چشم KOINO U 5mm L Type', 50, 'active', 0, 6, '176', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(328, 'KPS-M62C \"BS5-T2M', 'KPS-M62C \"BS5-T2M', 64, 10, 215, NULL, 99600, NULL, 'چشم KOINO U 5mm T Type', 50, 'active', 0, 6, '177', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(329, 'KPS-ODN-1L \"BR400-DDT', 'KPS-ODN-1L \"BR400-DDT', 67, 10, 216, NULL, 406000, NULL, 'چشم قطر 18 یکطرفه 40 سانت NPN بدنه پلاستیک', 50, 'active', 0, 6, '178', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(330, 'KPS-ODN-L \"BR100-DDT', 'KPS-ODN-L \"BR100-DDT', 67, 10, 216, NULL, 402100, NULL, 'چشم قطر 18 یکطرفه 10 سانت NPN بدنه پلاستیک', 50, 'active', 0, 6, '179', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(331, 'KPS-ODP-1L \"BRP400-DDT-P \"BR400-DDT-P', 'KPS-ODP-1L \"BRP400-DDT-P \"BR400-DDT-P', 67, 10, 217, NULL, 406000, NULL, 'چشم قطر 18 یکطرفه 40 سانت PNP بدنه پلاستیک', 50, 'active', 0, 6, '180', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(332, 'KPS-ODP-L \"BRP100-DDT-P \"BR100-DDT-P', 'KPS-ODP-L \"BRP100-DDT-P \"BR100-DDT-P', 67, 10, 217, NULL, 402100, NULL, 'چشم قطر 18 یکطرفه 10 سانت PNP بدنه پلاستیک', 50, 'active', 0, 6, '181', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(333, 'KPS-ORN-L \"BR3M-MDT', 'KPS-ORN-L \"BR3M-MDT', 67, 10, 216, NULL, 421200, NULL, 'چشم قطر 18 رفلکتوری 3 متر NPN بدنه پلاستیک', 50, 'active', 0, 6, '182', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(334, 'KPS-ORP-L \"BRP3M-MDT-P \"BR3M-MDT-P', 'KPS-ORP-L \"BRP3M-MDT-P \"BR3M-MDT-P', 67, 10, 216, NULL, 421200, NULL, 'چشم قطر 18 رفلکتوری 3 متر PNP بدنه پلاستیک', 50, 'active', 0, 6, '183', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(335, 'KPS-OTN-L \"BR15M-TDT', 'KPS-OTN-L \"BR15M-TDT', 67, 10, 216, NULL, 570900, NULL, 'چشم قطر 18 مقابل هم 15 متر NPN بدنه پلاستیک', 50, 'active', 0, 6, '184', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(336, 'KPS-OTP-L \"BRP15M-TDT-P \"BR15M-TDT-P', 'KPS-OTP-L \"BRP15M-TDT-P \"BR15M-TDT-P', 67, 10, 216, NULL, 570900, NULL, 'چشم قطر 18 مقابل هم 15 متر PNP بدنه پلاستیک', 50, 'active', 0, 6, '185', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(337, 'KPS-R3 \"MS-2', 'KPS-R3 \"MS-2', 63, 10, 218, NULL, 71600, NULL, 'رفلکتور یدکی KOINO', 50, 'active', 0, 6, '186', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(338, 'KPS-Z2DN \"BJ1M-DDT', 'KPS-Z2DN \"BJ1M-DDT', 65, 10, 219, NULL, 404600, NULL, 'چشم مکعبی ترانزیستوری - یک طرف فاصله دید 1 متر KOINO', 50, 'active', 0, 6, '187', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(339, 'KPS-Z2DP \"BJ1M-DDT-P', 'KPS-Z2DP \"BJ1M-DDT-P', 65, 10, 219, NULL, 404600, NULL, 'چشم مکعبی ترانزیستوری - یک طرف فاصله دید 1 متر KOINO', 50, 'active', 0, 6, '188', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(340, 'KPS-ZDNS \"BJ300-DDT', 'KPS-ZDNS \"BJ300-DDT', 65, 10, 220, NULL, 388300, NULL, 'چشم مکعبی ترانزیستوری - یک طرف فاصله دید 50 سانت KOINO', 50, 'active', 0, 6, '189', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(341, 'KPS-ZDPS \"BJ300-DDT-P', 'KPS-ZDPS \"BJ300-DDT-P', 65, 10, 220, NULL, 388300, NULL, 'چشم مکعبی ترانزیستوری - یک طرف فاصله دید 50 سانت KOINO', 50, 'active', 0, 6, '190', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(342, 'KPS-ZRN \"BJ3M-MDT', 'KPS-ZRN \"BJ3M-MDT', 65, 10, 221, NULL, 415600, NULL, 'چشم مکعبی ترانزیستوری - آینه دار فاصله دید 3 متر KOINO', 50, 'active', 0, 6, '191', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(343, 'KPS-ZRP \"BJ3M-MDT-P', 'KPS-ZRP \"BJ3M-MDT-P', 65, 10, 221, NULL, 415600, NULL, 'چشم مکعبی ترانزیستوری - آینه دار فاصله دید 3 متر KOINO', 50, 'active', 0, 6, '192', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(344, 'KPS-ZTN \"BJ15M-TDT', 'KPS-ZTN \"BJ15M-TDT', 65, 10, 222, NULL, 464700, NULL, 'چشم مکعبی ترانزیستوری - مقابل هم فاصله دید 15 متر KOINO', 50, 'active', 0, 6, '193', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(345, 'KPS-ZTP \"BJ15M-TDT-P', 'KPS-ZTP \"BJ15M-TDT-P', 65, 10, 222, NULL, 464700, NULL, 'چشم مکعبی ترانزیستوری - مقابل هم فاصله دید 15 متر KOINO', 50, 'active', 0, 6, '194', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(346, 'KPX-D08-01E1M \"PR08-1.5DN', 'KPX-D08-01E1M \"PR08-1.5DN', 59, 10, 223, NULL, 244600, NULL, 'فاصله دید 1 میلی متر KOINO', 50, 'active', 0, 6, '195', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(347, 'KPX-D08-01E3M \"PR08-1.5DP', 'KPX-D08-01E3M \"PR08-1.5DP', 59, 10, 223, NULL, 244600, NULL, 'فاصله دید 1 میلی متر KOINO', 50, 'active', 0, 6, '196', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(348, 'KPX-D08-02E1MN \"PR08-2DN', 'KPX-D08-02E1MN \"PR08-2DN', 59, 10, 223, NULL, 244600, NULL, 'KPX-D08-01E3M \"PR08-1.5DP', 50, 'active', 0, 6, '197', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(349, 'KPX-D08-02E3MN \"PR08-2DP', 'KPX-D08-02E3MN \"PR08-2DP', 59, 10, 223, NULL, 244600, NULL, 'KPX-D08-02E1MN \"PR08-2DN', 50, 'active', 0, 6, '198', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(350, 'KTM-AM11 \"AT11DN', 'KTM-AM11 \"AT11DN', 69, 10, 224, NULL, 239900, NULL, 'تایمر مولتی رنج تا 300 ساعت 11 پایه KOINO', 50, 'active', 0, 6, '199', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(351, 'KTM-AM8 \"AT8N', 'KTM-AM8 \"AT8N', 69, 10, 224, NULL, 225000, NULL, 'تایمر مولتی رنج تا 300 ساعت 8 پایه KOINO', 50, 'active', 0, 6, '200', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(352, 'KTM-AMTM11', 'KTM-AMTM11', 69, 10, 225, NULL, 334000, NULL, 'تایمر دو زمانه (دوقلو) KOINO', 50, 'active', 0, 6, '201', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(353, 'KTM-AMTM33', 'KTM-AMTM33', 69, 10, 225, NULL, 334000, NULL, 'تایمر دو زمانه (دوقلو) KOINO', 50, 'active', 0, 6, '202', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(354, 'NS22 A CONTACT', 'NS22 A CONTACT', 81, 10, 226, NULL, 11800, NULL, 'کنتاکت کمکی باز', 50, 'active', 0, 6, '203', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(355, 'NS22 B CONTACT', 'NS22 B CONTACT', 81, 10, 226, NULL, 11800, NULL, 'کنتاکت کمکی بسته', 50, 'active', 0, 6, '204', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(356, 'NS22-A-NP NAME PLATE', 'NS22-A-NP NAME PLATE', 82, 10, 226, NULL, 6900, NULL, 'پلاک شستی ها', 50, 'active', 0, 6, '205', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(357, 'NS22-BM-L2ALG1A0B', 'NS22-BM-L2ALG1A0B', 72, 10, 227, NULL, 109500, NULL, 'شستی استارت چراغدار سبز 220', 50, 'active', 0, 6, '206', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(358, 'NS22-BM-L2ALR0A1B', 'NS22-BM-L2ALR0A1B', 72, 10, 227, NULL, 109500, NULL, 'شستی استپ چراغدار قرمز 220 ', 50, 'active', 0, 6, '207', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(359, 'NS22-BM-L3CG1A0B', 'NS22-BM-L3CG1A0B', 72, 10, 227, NULL, 109500, NULL, 'شستی استارت چراغدار سبز 24', 50, 'active', 0, 6, '208', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(360, 'NS22-BM-L3CR0A1B', 'NS22-BM-L3CR0A1B', 72, 10, 227, NULL, 109500, NULL, 'شستی استپ چراغدار قرمز 24', 50, 'active', 0, 6, '209', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(361, 'NS22-DM-1A01B', 'NS22-DM-1A01B', 75, 10, 228, NULL, 72200, NULL, 'شستی دوبل بدون چراغ', 50, 'active', 0, 6, '210', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(362, 'NS22-DM-L2AL1A1B', 'NS22-DM-L2AL1A1B', 75, 10, 228, NULL, 98800, NULL, 'شستی دوبل چراغدار 220', 50, 'active', 0, 6, '211', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(363, 'NS22-DM-L3C1A1B', 'NS22-DM-L3C1A1B', 75, 10, 228, NULL, 106200, NULL, 'شستی دوبل چراغدار 24', 50, 'active', 0, 6, '212', '2021-10-21 06:05:48', '2021-10-21 06:23:17'),
(364, 'NS22-K2-1A00B', 'NS22-K2-1A00B', 79, 10, 229, NULL, 66700, NULL, 'سلکتور سوییچ دار یکطرفه 0-1', 50, 'active', 0, 6, '213', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(365, 'NS22-K3-1A01A', 'NS22-K3-1A01A', 79, 10, 229, NULL, 78200, NULL, 'سلکتور سوییچ دار دو طرفه 0-1-2', 50, 'active', 0, 6, '214', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(366, 'NS22-KA2-1A00B', 'NS22-KA2-1A00B', 80, 10, 229, NULL, 66400, NULL, 'سلکتور سوییچ دار یکطرفه 0-1 استارتی برگشتی', 50, 'active', 0, 6, '215', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(367, 'NS22-PA-G1A00B', 'NS22-PA-G1A00B', 73, 10, 226, NULL, 54000, NULL, 'شستی استارت قفل شو سبز', 50, 'active', 0, 6, '216', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(368, 'NS22-PA-R0A01B', 'NS22-PA-R0A01B', 73, 10, 226, NULL, 54000, NULL, 'شستی استپ قفل شو قرمز', 50, 'active', 0, 6, '217', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(369, 'NS22-PEM-G1A00B', 'NS22-PEM-G1A00B', 74, 10, 230, NULL, 54900, NULL, 'شستی قارچی استارت سبز', 50, 'active', 0, 6, '218', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(370, 'NS22-PEM-R0A01B', 'NS22-PEM-R0A01B', 74, 10, 230, NULL, 54900, NULL, 'شستی قارچی استپ قرمز', 50, 'active', 0, 6, '219', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(371, 'NS22-PER-R0A01B', 'NS22-PER-R0A01B', 84, 10, 231, NULL, 62900, NULL, 'شستی امرجنسی قفل شو', 50, 'active', 0, 6, '220', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(372, 'NS22-PM-G1A00B', 'NS22-PM-G1A00B', 71, 10, 226, NULL, 45600, NULL, 'شستی استارت سبز', 50, 'active', 0, 6, '221', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(373, 'NS22-PM-R0A01B', 'NS22-PM-R0A01B', 71, 10, 226, NULL, 45600, NULL, 'شستی استپ قرمز', 50, 'active', 0, 6, '222', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(374, 'NS22-S2-1A00B', 'NS22-S2-1A00B', 76, 10, 232, NULL, 56200, NULL, 'سلکتور 0-1 یکطرفه', 50, 'active', 0, 6, '223', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(375, 'NS22-S2-L2ALG1A0B', 'NS22-S2-L2ALG1A0B', 78, 10, 232, NULL, 98800, NULL, 'سلکتور 0-1 یکطرفه چراغدار 220', 50, 'active', 0, 6, '224', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(376, 'NS22-S2-L3CG1A0B', 'NS22-S2-L3CG1A0B', 78, 10, 232, NULL, 101600, NULL, 'سلکتور 0-1 یکطرفه چراغدار 24', 50, 'active', 0, 6, '225', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(377, 'NS22-S3-1A01A', 'NS22-S3-1A01A', 76, 10, 232, NULL, 74000, NULL, 'سلکتور 0-1-2 دو طرفه', 50, 'active', 0, 6, '226', '2021-10-21 06:05:48', '2021-10-21 06:23:18'),
(378, 'NS22-SA2-1A00B', 'NS22-SA2-1A00B', 77, 10, 232, NULL, 65500, NULL, 'سلکتور 0-1 یکطرفه استارتی برگشتی', 50, 'active', 0, 6, '227', '2021-10-21 06:05:49', '2021-10-21 06:23:18'),
(379, 'NS22-SA3-1A01A', 'NS22-SA3-1A01A', 77, 10, 232, NULL, 76700, NULL, 'سلکتور 0-1-2 دو طرفه استارتی برگشتی', 50, 'active', 0, 6, '228', '2021-10-21 06:05:49', '2021-10-21 06:23:18');

-- --------------------------------------------------------

--
-- Table structure for table `products_gallery`
--

CREATE TABLE `products_gallery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products_gallery`
--

INSERT INTO `products_gallery` (`id`, `product_id`, `image_id`, `created_at`, `updated_at`) VALUES
(3, 152, 188, '2021-10-20 15:15:29', '2021-10-20 15:15:29');

-- --------------------------------------------------------

--
-- Table structure for table `products_media`
--

CREATE TABLE `products_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `media_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'آذربايجان شرقي', NULL, NULL),
(2, 'آذربايجان غربي', NULL, NULL),
(3, 'اردبيل', NULL, NULL),
(4, 'اصفهان', NULL, NULL),
(5, 'البرز', NULL, NULL),
(6, 'ايلام', NULL, NULL),
(7, 'بوشهر', NULL, NULL),
(8, 'تهران', NULL, NULL),
(9, 'چهارمحال بختياري', NULL, NULL),
(10, 'خراسان جنوبي', NULL, NULL),
(11, 'خراسان رضوي', NULL, NULL),
(12, 'خراسان شمالي', NULL, NULL),
(13, 'خوزستان', NULL, NULL),
(14, 'زنجان', NULL, NULL),
(15, 'سمنان', NULL, NULL),
(16, 'سيستان و بلوچستان', NULL, NULL),
(17, 'فارس', NULL, NULL),
(18, 'قزوين', NULL, NULL),
(19, 'قم', NULL, NULL),
(20, 'كردستان', NULL, NULL),
(21, 'كرمان', NULL, NULL),
(22, 'كرمانشاه', NULL, NULL),
(23, 'كهكيلويه و بويراحمد', NULL, NULL),
(24, 'گلستان', NULL, NULL),
(25, 'گيلان', NULL, NULL),
(26, 'لرستان', NULL, NULL),
(27, 'مازندران', NULL, NULL),
(28, 'مركزي', NULL, NULL),
(29, 'هرمزگان', NULL, NULL),
(30, 'همدان', NULL, NULL),
(31, 'يزد', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `show_categories`
--

CREATE TABLE `show_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint(20) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_id` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `paid` int(10) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('s_success','s_fail','s_pending','s_cancel') COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('saman','sepehr') COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice_details` text COLLATE utf8mb4_unicode_ci,
  `transaction_result` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `payment_id`, `user_id`, `user_ip`, `order_id`, `paid`, `transaction_id`, `status`, `type`, `invoice_details`, `transaction_result`, `created_at`, `updated_at`) VALUES
(5, '6311823810', 15, '46.100.250.194', 9, 19500, 'Tig6Fno2K6Olb/611+AJGP90GY/L+fw0HD08XoP4GhUDgP8IQ5oAEEdlz740qPPKe5VjdXOvE7elMN1dACuCKQ', 's_fail', 'saman', 'O:25:\"Shetabit\\Multipay\\Invoice\":5:{s:7:\"\0*\0uuid\";s:36:\"6756ead0-a187-4fc7-9ffe-5d7ca32f8392\";s:9:\"\0*\0amount\";i:19500;s:16:\"\0*\0transactionId\";s:86:\"Tig6Fno2K6Olb/611+AJGP90GY/L+fw0HD08XoP4GhUDgP8IQ5oAEEdlz740qPPKe5VjdXOvE7elMN1dACuCKQ\";s:9:\"\0*\0driver\";N;s:10:\"\0*\0details\";a:0:{}}', 'a:2:{s:7:\"message\";s:59:\" تراکنش توسط خریدار کنسل شده است.\";s:4:\"code\";i:0;}', '2021-10-21 08:18:15', '2021-10-21 08:19:03'),
(6, '3657250487', 15, '46.100.250.194', 9, 19500, 'wctV9ena/gtXLGyHp5A3Ux9dPzT4BUkmvYj6KxUATUE=', 's_pending', 'sepehr', 'O:25:\"Shetabit\\Multipay\\Invoice\":5:{s:7:\"\0*\0uuid\";s:36:\"6c4b86f2-8a4d-41e9-a7c7-9bb3b80545fb\";s:9:\"\0*\0amount\";i:19500;s:16:\"\0*\0transactionId\";s:44:\"wctV9ena/gtXLGyHp5A3Ux9dPzT4BUkmvYj6KxUATUE=\";s:9:\"\0*\0driver\";N;s:10:\"\0*\0details\";a:0:{}}', NULL, '2021-10-21 08:19:12', '2021-10-21 08:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `mobile`, `password`, `status`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'فرید', 'شیشه بری', '09162154221', '$2y$10$WkJWwNXRrRkNGj2j2aAUuup6eFujTF3YKDI9FxFFrjVSRbynxGTHG', 'active', 'admin', 'zFlq77mu24LjZNeY9e0KPnLtrdKo3J0qewivSW3M7WRbfMYkfsWr0Tewj0bP', '2021-08-23 18:05:51', '2021-10-21 13:45:02'),
(3, 'علی', 'کاظمی', '09269126102', '$2y$10$tZkcg1GUWGAXcb983yLmtuW5S31pEeAMjvDjsFmaVzNNtlB6rfGxC', 'active', 'user', 'BYh2fFFZNKiRYZRVr540pQlMju9sfNBadgE4UcW38M7Qt4sVFUKnjSWBRoea', '2021-08-24 07:05:07', '2021-08-24 07:05:07'),
(4, 'سارا', 'بیات', '09399796627', '$2y$10$VkDN8HKTjfx2nFoK3DsUYO.cBCNZrN6edXfD0YAq55SOdhVXo4tRK', 'active', 'user', NULL, '2021-08-24 07:05:29', '2021-08-24 07:05:29'),
(7, 'رژان', 'نیلی', '09892595990', '$2y$10$bqyXFNXycYKCIqKtR4eIo.SOL7SClpN0hLTNqo3sS/ACOGnlAqasm', 'active', 'user', 'vjDGrM3FFAProbvPOTzxbHpHioXQIpRolXIAVytcntqtxjQqDr7TXARdNUXn', '2021-08-24 18:42:53', '2021-08-29 18:22:02'),
(8, 'میترا', 'فلکیان', '09111996579', '$2y$10$upxxdxGTXh97R/Pk1r/kUu6hgJ0nVUSarw9VbmrHxF8U9pdL.nGQm', 'active', 'user', NULL, '2021-09-27 12:47:39', '2021-09-27 12:47:39'),
(12, 'محمد', 'مهدی', '09133579042', '$2y$10$A.9aIQnnUR3wscXIm9uiEenvfwn2yfpilklZqQJ.onOK736PlhVJS', 'inactive', 'user', 'PLpNv1Lbdm4XaWio7VuhWfARALPF2dx5BDQzWNlznlOqOdYOrUxMwvL00YmQ', '2021-10-21 06:30:26', '2021-10-21 06:31:45'),
(14, 'امیرعلی', 'حسینی', '09135221815', '$2y$10$UVYake29SHIpJ0XJbqVzfuzAdKs9kScv62vFFpF.6pUSqURTS.yBy', 'active', 'user', 'e99LECq1WKFR7JAoLrAiOu1Z6LgMPwX8iBQ1ELuK8coo0GZudI0AZixygkKQ', '2021-10-21 07:54:14', '2021-10-21 07:54:39'),
(15, 'علیرضا', 'نصراللهی', '09013503030', '$2y$10$CTP7JLTZCQeRRxaKOOT8.OT3kWrkw39dSMzOsB6o3iy2hMHeHz7sW', 'active', 'user', 'CtBGnn2vSmk0aQsh64jSnU8ugNGWIx6oUtocj2NEkeZFYE3c7Gs7tFzQTBxL', '2021-10-21 08:08:21', '2021-10-21 08:10:16'),
(16, 'مهدی نصراللهی', 'نصراللهی', '09131517645', '$2y$10$CzK9EtFJ1Ojhz1PPa/7WbejxG7WmqY4ZuNp.BeVRWyNo3I.08w8dW', 'inactive', 'user', 'QWbqq6SUX6aOaRbrnWa0X4jkm79LYpW3gUM7eqRwxkIukdP2jd77HshPio5z', '2021-10-21 08:31:51', '2021-10-21 08:33:19'),
(17, 'یسبی', 'بسیبیس', '09130022004', '$2y$10$jjXBBcE.fjHD09DrwCvD7evusSkCiAJIndt5xhmq7cFZiu7KSel8i', 'inactive', 'user', '5TTZb6rhQYZy1DmRotQKYCCfnCjsMnCXXdiivIbkMQNpqOE53vcFAu4zqZLp', '2021-10-21 08:34:04', '2021-10-21 08:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `users_codes`
--

CREATE TABLE `users_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `active_code` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_active_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resend_active_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_codes`
--

INSERT INTO `users_codes` (`id`, `user_id`, `active_code`, `expire_active_code`, `resend_active_code`, `created_at`, `updated_at`) VALUES
(2, 7, '916934', '1629831623', '1629830845', '2021-08-24 18:42:54', '2021-08-24 18:45:23'),
(6, 12, '693324', '1634798726', '1634797948', '2021-10-21 06:30:26', '2021-10-21 06:30:26'),
(8, 14, '948366', '1634803754', '1634802976', '2021-10-21 07:54:14', '2021-10-21 07:54:14'),
(9, 15, '534736', '1634804601', '1634803823', '2021-10-21 08:08:21', '2021-10-21 08:08:21'),
(10, 16, '849913', '1634806011', '1634805233', '2021-10-21 08:31:51', '2021-10-21 08:31:51'),
(11, 17, '066939', '1634806144', '1634805366', '2021-10-21 08:34:04', '2021-10-21 08:34:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `banners_image_id_foreign` (`image_id`);

--
-- Indexes for table `blacklists`
--
ALTER TABLE `blacklists`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `blacklists_user_id_unique` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brands_image_id_foreign` (`image_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_parent_id_foreign` (`parent_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cities_province_id_foreign` (`province_id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `contact_us_user_id_foreign` (`user_id`);

--
-- Indexes for table `excel_media`
--
ALTER TABLE `excel_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `excel_media_media_id_foreign` (`media_id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `groups_name_unique` (`name`),
  ADD KEY `excel_id` (`excel_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `inquiries_user_id_foreign` (`user_id`),
  ADD KEY `inquiries_media_id_foreign` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_code_unique` (`code`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_province_id_foreign` (`province_id`),
  ADD KEY `orders_city_id_foreign` (`city_id`);

--
-- Indexes for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_items_order_id_foreign` (`order_id`),
  ADD KEY `orders_items_product_id_foreign` (`product_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_category_id_foreign` (`category_id`),
  ADD KEY `posts_image_id_foreign` (`image_id`);

--
-- Indexes for table `posts_categories`
--
ALTER TABLE `posts_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts_media`
--
ALTER TABLE `posts_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `posts_media_post_id_foreign` (`post_id`),
  ADD KEY `posts_media_media_id_foreign` (`media_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`),
  ADD KEY `image_id` (`image_id`),
  ADD KEY `pdf_id` (`pdf_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `products_gallery`
--
ALTER TABLE `products_gallery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_gallery_product_id_foreign` (`product_id`),
  ADD KEY `products_gallery_image_id_foreign` (`image_id`);

--
-- Indexes for table `products_media`
--
ALTER TABLE `products_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_media_product_id_foreign` (`product_id`),
  ADD KEY `products_media_media_id_foreign` (`media_id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `show_categories`
--
ALTER TABLE `show_categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `show_categories_category_id_unique` (`category_id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sliders_image_id_foreign` (`image_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transactions_payment_id_unique` (`payment_id`),
  ADD KEY `transactions_user_id_foreign` (`user_id`),
  ADD KEY `transactions_order_id_foreign` (`order_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `users_codes`
--
ALTER TABLE `users_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_codes_user_id_unique` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blacklists`
--
ALTER TABLE `blacklists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `excel_media`
--
ALTER TABLE `excel_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=238;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders_items`
--
ALTER TABLE `orders_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts_categories`
--
ALTER TABLE `posts_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts_media`
--
ALTER TABLE `posts_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `products_gallery`
--
ALTER TABLE `products_gallery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_media`
--
ALTER TABLE `products_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `show_categories`
--
ALTER TABLE `show_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `users_codes`
--
ALTER TABLE `users_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banners`
--
ALTER TABLE `banners`
  ADD CONSTRAINT `banners_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `blacklists`
--
ALTER TABLE `blacklists`
  ADD CONSTRAINT `blacklists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `brands`
--
ALTER TABLE `brands`
  ADD CONSTRAINT `brands_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `categories_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cities`
--
ALTER TABLE `cities`
  ADD CONSTRAINT `cities_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD CONSTRAINT `contact_us_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `excel_media`
--
ALTER TABLE `excel_media`
  ADD CONSTRAINT `excel_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `groups`
--
ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`excel_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD CONSTRAINT `inquiries_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inquiries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_province_id_foreign` FOREIGN KEY (`province_id`) REFERENCES `provinces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders_items`
--
ALTER TABLE `orders_items`
  ADD CONSTRAINT `orders_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `posts_categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `posts_media`
--
ALTER TABLE `posts_media`
  ADD CONSTRAINT `posts_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_media_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`pdf_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `products_gallery`
--
ALTER TABLE `products_gallery`
  ADD CONSTRAINT `products_gallery_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_gallery_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `products_media`
--
ALTER TABLE `products_media`
  ADD CONSTRAINT `products_media_media_id_foreign` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `products_media_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `show_categories`
--
ALTER TABLE `show_categories`
  ADD CONSTRAINT `show_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sliders`
--
ALTER TABLE `sliders`
  ADD CONSTRAINT `sliders_image_id_foreign` FOREIGN KEY (`image_id`) REFERENCES `media` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transactions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_codes`
--
ALTER TABLE `users_codes`
  ADD CONSTRAINT `users_codes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
