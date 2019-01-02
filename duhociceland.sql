-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th1 02, 2019 lúc 10:43 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duhociceland`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_items`
--

CREATE TABLE `category_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '1',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_id` int(10) UNSIGNED DEFAULT NULL,
  `locale_id` int(10) UNSIGNED NOT NULL,
  `translation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_items`
--

INSERT INTO `category_items` (`id`, `name`, `path`, `description`, `content`, `image`, `image_mobile`, `level`, `parent_id`, `type`, `order`, `is_active`, `created_at`, `updated_at`, `seo_id`, `locale_id`, `translation_id`) VALUES
(1, 'Trang Chủ_Top', 'trang-chutop', '<p>\r\n	Trang Chủ_Top\r\n</p>', NULL, 'images/uploads/images/tintuc/flag-402_633273.png', NULL, 0, NULL, 0, 1, 1, '2018-12-31 09:06:18', '2019-01-01 03:36:28', NULL, 1, 1),
(2, 'Home_top', 'hometop', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, '2019-01-01 03:41:03', '2019-01-01 03:41:03', NULL, 2, 1),
(3, 'Chào Mừng Tới S.E.A.A. (StudyEurAmAus)', 'chao-mung-toi-seaa-studyeuramaus', '<p>\r\n	Được thành lập vào năm 2017 kết hợp bởi một luật sư Việt Nam có uy tín và hai người nước ngoài với tổng cộng 20 năm kinh nghiệm với vai trò là các nhà giáo dục ở Đông Nam Á. Chúng tôi giúp đưa nền giáo dục tốt ở phương Tây đến các sinh viên sinh sống tại Việt Nam và có cơ hội học tập ở nước ngoài tại các cơ sở đại học hàng đầu được công nhận ở Ireland, cũng như ở Anh, Mỹ, Canada, Úc, New Zealand\r\n</p>', NULL, 'http://localhost:8080/duhociceland/http://localhost:8080/duhocicelan', NULL, 0, NULL, 0, 1, 1, '2019-01-01 04:20:09', '2019-01-01 04:35:50', NULL, 1, 5),
(4, 'Welcome to S.E.A.A. (StudyEurAmAus)', 'welcome-to-seaa-studyeuramaus', '<p>\r\n	Founded in 2017 by a respected Vietnamese attorney and two foreign nationals with a total of twenty years&rsquo; combined experience as educators in Southeast Asia.&nbsp; This agency promotes Western higher education to students residing in Vietnam and the opportunity to study overseas at accredited postsecondary institutions primarily in Ireland, but also in the UK, the USA, Canada, Australia, New Zealand.\r\n</p>', NULL, 'http://localhost:8080/duhociceland', NULL, 0, NULL, 0, 1, 1, '2019-01-01 04:27:08', '2019-01-01 04:30:44', NULL, 2, 5),
(5, 'Tại Sao Chọn Chúng Tôi', 'tai-sao-chon-chung-toi', '<p>\r\n	Đây là những lý do tại sao học sinh của bạn nên chọn Ailen:\r\n</p>', NULL, NULL, NULL, 0, NULL, 0, 1, 1, '2019-01-01 11:57:53', '2019-01-01 11:57:53', NULL, 1, 9),
(6, 'Why Choose Us', 'why-choose-us', 'Here are the reasons why your students should choose Ireland', NULL, NULL, NULL, 0, NULL, 0, 1, 1, '2019-01-01 11:58:33', '2019-01-01 11:58:33', NULL, 2, 9),
(7, 'Tin Tức Mới Nhất Của Chúng Tôi', 'tin-tuc-moi-nhat-cua-chung-toi', NULL, NULL, 'http://localhost:8080/duhociceland', NULL, 0, NULL, 0, 1, 1, '2019-01-01 12:47:06', '2019-01-01 12:47:27', NULL, 1, 19),
(8, 'Our Latest Blogs', 'our-latest-blogs', NULL, NULL, 'http://localhost:8080/duhociceland', NULL, 0, NULL, 0, 1, 1, '2019-01-01 12:47:22', '2019-01-01 12:47:30', NULL, 2, 19),
(9, 'Dịch Vụ Của Chúng Tôi', 'dich-vu-cua-chung-toi', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, '2019-01-01 15:10:03', '2019-01-01 15:10:03', NULL, 1, 23),
(10, 'Our Services', 'our-services', NULL, NULL, NULL, NULL, 0, NULL, 0, 1, 1, '2019-01-01 15:10:20', '2019-01-01 15:10:20', NULL, 2, 23);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_many`
--

CREATE TABLE `category_many` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `item_id` int(10) UNSIGNED NOT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_many`
--

INSERT INTO `category_many` (`category_id`, `item_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 0, '2018-12-31 13:01:16', '2019-01-01 03:39:33'),
(1, 3, 0, '2019-01-01 03:43:13', '2019-01-01 03:43:13'),
(1, 5, 0, '2019-01-01 03:47:43', '2019-01-01 03:47:43'),
(2, 2, 0, '2019-01-01 03:41:32', '2019-01-01 03:41:32'),
(2, 4, 0, '2019-01-01 03:47:02', '2019-01-01 03:47:02'),
(2, 6, 0, '2019-01-01 03:48:09', '2019-01-01 03:48:09'),
(3, 7, 0, '2019-01-01 04:44:58', '2019-01-01 04:44:58'),
(3, 9, 0, '2019-01-01 05:07:13', '2019-01-01 11:54:49'),
(4, 8, 0, '2019-01-01 04:45:58', '2019-01-01 04:45:58'),
(4, 10, 0, '2019-01-01 05:07:42', '2019-01-01 11:54:27'),
(5, 11, 0, '2019-01-01 12:01:24', '2019-01-01 12:04:33'),
(5, 13, 0, '2019-01-01 12:05:47', '2019-01-01 12:05:47'),
(5, 15, 0, '2019-01-01 12:07:24', '2019-01-01 12:07:24'),
(5, 17, 0, '2019-01-01 12:09:05', '2019-01-01 12:09:05'),
(5, 19, 0, '2019-01-01 12:10:16', '2019-01-01 12:10:16'),
(5, 21, 0, '2019-01-01 12:11:51', '2019-01-01 12:11:51'),
(5, 23, 0, '2019-01-01 12:12:56', '2019-01-01 12:12:56'),
(5, 25, 0, '2019-01-01 12:14:03', '2019-01-01 12:14:03'),
(5, 27, 0, '2019-01-01 12:14:56', '2019-01-01 12:14:56'),
(6, 12, 0, '2019-01-01 12:03:52', '2019-01-01 14:35:05'),
(6, 14, 0, '2019-01-01 12:06:29', '2019-01-01 12:06:29'),
(6, 16, 0, '2019-01-01 12:08:12', '2019-01-01 12:08:12'),
(6, 18, 0, '2019-01-01 12:09:30', '2019-01-01 12:09:30'),
(6, 20, 0, '2019-01-01 12:10:43', '2019-01-01 12:10:43'),
(6, 22, 0, '2019-01-01 12:12:24', '2019-01-01 12:12:24'),
(6, 24, 0, '2019-01-01 12:13:28', '2019-01-01 12:13:28'),
(6, 26, 0, '2019-01-01 12:14:23', '2019-01-01 12:14:23'),
(6, 28, 0, '2019-01-01 12:15:35', '2019-01-01 12:15:35'),
(7, 29, 0, '2019-01-01 12:49:10', '2019-01-01 12:56:07'),
(7, 31, 0, '2019-01-01 12:55:09', '2019-01-01 13:14:46'),
(7, 33, 0, '2019-01-01 13:15:34', '2019-01-01 13:15:34'),
(8, 30, 0, '2019-01-01 12:49:49', '2019-01-01 12:56:26'),
(8, 32, 0, '2019-01-01 13:14:40', '2019-01-01 13:14:40'),
(8, 34, 0, '2019-01-01 13:17:11', '2019-01-01 13:17:11'),
(9, 35, 0, '2019-01-01 15:15:37', '2019-01-01 15:15:37'),
(9, 37, 0, '2019-01-01 15:21:55', '2019-01-01 15:25:26'),
(10, 36, 0, '2019-01-01 15:18:00', '2019-01-01 15:18:00'),
(10, 38, 0, '2019-01-01 15:24:20', '2019-01-01 15:25:17');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_permissions`
--

CREATE TABLE `category_permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_permissions`
--

INSERT INTO `category_permissions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Role', '2018-03-14 07:31:28', '2018-03-14 07:31:28'),
(2, 'User', '2018-03-14 07:31:28', '2018-03-14 07:31:28'),
(3, 'Menu', '2018-03-14 07:31:28', '2018-03-14 07:31:28'),
(4, 'Page', '2018-03-14 07:31:29', '2018-03-14 07:31:29'),
(5, 'Post', '2018-03-14 07:31:29', '2018-03-14 07:31:29'),
(7, 'Product', '2018-03-27 03:05:29', '2018-03-27 03:05:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `configs`
--

INSERT INTO `configs` (`id`, `name`, `content`, `description`, `order`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'config-contact', '<p>\r\n	Lô B-13, QL13, Golden A, TX Bến Cát, tỉnh Bình Dương\r\n</p>', NULL, NULL, 1, NULL, '2018-10-05 03:33:34'),
(3, 'config-company-name', 'Công ty CP DVTM và xây dựng địa ốc KIM OANH', NULL, NULL, 1, NULL, '2018-10-05 03:33:34'),
(4, 'config-phone', '0917503788', NULL, NULL, 1, NULL, '2018-10-05 02:16:14'),
(5, 'config-email', NULL, NULL, NULL, 1, NULL, NULL),
(6, 'config-seo-keywords', NULL, NULL, NULL, 1, NULL, NULL),
(7, 'config-seo-title', NULL, NULL, NULL, 1, NULL, NULL),
(8, 'config-seo-description', NULL, NULL, NULL, 1, NULL, NULL),
(9, 'config-seo-image', NULL, NULL, NULL, 1, NULL, NULL),
(10, 'email-receive', 'trangnh.sml@gmail.com', NULL, NULL, 1, NULL, '2018-10-04 08:48:40'),
(11, 'email-sender-subject', 'Bất Động Sản Kim Oanh Đã Nhận Được Mail Của Bạn', NULL, NULL, 1, NULL, '2018-10-04 08:48:40'),
(12, 'email-sender-from', 'Bất Động Sản Kim Oanh', NULL, NULL, 1, NULL, '2018-10-04 08:48:40'),
(13, 'email-receive-subject', 'Thông Tin Liên Hệ Mới Từ Khách Hàng', NULL, NULL, 1, NULL, '2018-10-04 08:48:40'),
(14, 'email-receive-from', 'Bất Động Sản Kim Oanh', NULL, NULL, 1, NULL, '2018-10-04 08:48:40'),
(15, 'email-sender-content', '<p>\r\n	Dear, Quý Khách,<br>\r\n	Bất động sản kim oanh&nbsp;đã nhận được mail của quý khách, chúng tôi sẽ phản hồi trong vòng 24h, xin cảm ơn.<br>\r\n	Trân trọng\r\n</p>', NULL, NULL, 1, NULL, '2018-10-04 08:48:40'),
(16, 'email-signatures', NULL, NULL, NULL, 1, NULL, NULL),
(17, 'script-js-header', NULL, NULL, NULL, 1, NULL, '2018-09-19 08:58:22'),
(18, 'script-js-body', NULL, NULL, NULL, 1, NULL, NULL),
(19, 'config-phone-1', '0917 503 788', NULL, NULL, 1, NULL, '2018-10-05 03:33:34'),
(20, 'config-phone-2', '098 2324 578', NULL, NULL, 1, NULL, '2018-10-05 03:33:34'),
(21, 'logo-config', '', NULL, NULL, 1, NULL, '2018-10-05 03:33:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `locales`
--

CREATE TABLE `locales` (
  `id` int(10) UNSIGNED NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `locales`
--

INSERT INTO `locales` (`id`, `icon`, `name`, `short`, `sort`, `created_at`, `updated_at`) VALUES
(1, 'images/uploads/images/ngonngu/flag-400_278478.png', 'Tiếng Việt', 'vi', 1, '2018-12-31 08:40:54', '2018-12-31 08:40:54'),
(2, 'images/uploads/images/ngonngu/flag-401_976873.png', 'English', 'en', 2, '2018-12-31 08:42:27', '2018-12-31 08:42:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 'content.menu_home', '/', '_self', NULL, '#000000', NULL, 1, '2018-09-14 04:10:33', '2019-01-01 13:43:28', NULL, ''),
(2, 'content.menu_services', 'services.html', '_self', NULL, '#000000', NULL, 2, '2018-09-14 04:48:02', '2019-01-01 15:04:06', NULL, ''),
(4, 'content.menu_blog', 'blogs.html', '_self', NULL, '#000000', NULL, 3, '2019-01-01 13:44:59', '2019-01-01 15:04:02', NULL, ''),
(5, 'content.menu_contact', 'contact.html', '_self', NULL, '#000000', NULL, 4, '2019-01-01 13:45:19', '2019-01-01 15:04:02', NULL, ''),
(6, 'content.menu_aboutus', 'about-us.html', '_self', NULL, '#000000', NULL, 5, '2019-01-01 13:45:42', '2019-01-01 15:04:02', NULL, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_03_14_140923_create_entrust_setup_tables', 1),
(4, '2018_07_12_085612_create_seos_table', 2),
(5, '2018_07_12_090313_add_seo_id_to_posts_table', 3),
(6, '2018_07_12_091007_add_seo_id_to_products_table', 4),
(7, '2018_07_12_091116_add_seo_id_to_category_items_table', 5),
(8, '2018_07_17_084914_create_category_many_table', 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_permission_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `description`, `category_permission_id`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'Xem Danh Sách Quyền', 'Được Xem Danh Sách Quyền', 1, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(2, 'role-create', 'Tạo Quyền Mới', 'Được Tạo Quyền Mới', 1, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(3, 'role-edit', 'Cập Nhật Quyền', 'Được Cập Nhật Quyền', 1, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(4, 'role-delete', 'Xóa Quyền', 'Được Xóa Quyền', 1, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(5, 'user-list', 'Xem Danh Sách Users', 'Được Xem Danh Sách Users', 2, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(6, 'user-create', 'Tạo User', 'Được Tạo User Mới', 2, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(7, 'user-edit', 'Cập Nhật User', 'Được Cập Nhật User', 2, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(8, 'user-delete', 'Xóa user', 'Được Xóa User', 2, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(9, 'menu-list', 'Toàn Quyền Menu', 'Được Toàn Quyền Menu', 3, '2018-03-14 07:32:41', '2018-03-14 07:32:41'),
(10, 'menu-create', 'Thêm Mới Menu', 'Được Thêm Mới Menu', 3, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(11, 'menu-edit', 'Cập Nhật Menu', 'Được Cập Nhật Menu', 3, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(12, 'menu-delete', 'Xóa Menu', 'Được Xóa Menu', 3, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(13, 'page-list', 'Toàn Quyền Trang', 'Được Toàn Quyền Trang', 4, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(14, 'page-create', 'Thêm Mới Trang', 'Được Thêm Mới Trang', 4, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(15, 'page-edit', 'Cập Nhật Trang', 'Được Cập Nhật Trang', 4, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(16, 'page-delete', 'Xóa Trang', 'Được Xóa Trang', 4, '2018-03-14 07:32:42', '2018-03-14 07:32:42'),
(17, 'post-list', 'Toàn Quyền Bài Viết', 'Được Toàn Quyền Bài Viết', 5, '2018-03-14 07:54:54', '2018-03-14 07:54:54'),
(18, 'post-create', 'Thêm Mới Bài Viết', 'Được Thêm Mới Bài Viết', 5, '2018-03-14 07:54:54', '2018-03-14 07:54:54'),
(19, 'post-edit', 'Cập Nhật Bài Viết', 'Được Cập Nhật Bài Viết', 5, '2018-03-14 07:54:54', '2018-03-14 07:54:54'),
(20, 'post-delete', 'Xóa Bài Viết', 'Được Xóa Bài Viết', 5, '2018-03-14 07:54:54', '2018-03-14 07:54:54'),
(21, 'product-list', 'Toàn Quyền Sản Phẩm', 'Được Toàn Quyền Sản Phẩm', 7, '2018-03-27 03:06:34', '2018-03-27 03:06:34'),
(22, 'product-create', 'Thêm Mới Sản Phẩm', 'Được Thêm Mới Sản Phẩm', 7, '2018-03-27 03:06:34', '2018-03-27 03:06:34'),
(23, 'product-edit', 'Cập Nhật Sản Phẩm', 'Được Cập Nhật Sản Phẩm', 7, '2018-03-27 03:06:34', '2018-03-27 03:06:34'),
(24, 'product-delete', 'Xóa Sản Phẩm', 'Được Xóa Sản Phẩm', 7, '2018-03-27 03:06:34', '2018-03-27 03:06:34');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_type` tinyint(3) UNSIGNED NOT NULL DEFAULT '0',
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_id` int(10) UNSIGNED DEFAULT NULL,
  `locale_id` int(10) UNSIGNED NOT NULL,
  `translation_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `title`, `path`, `description`, `content`, `image`, `post_type`, `is_active`, `user_id`, `created_at`, `updated_at`, `seo_id`, `locale_id`, `translation_id`) VALUES
(1, 'Chương Trình Học Mới', 'chuong-trinh-hoc-moi', '<p>\r\n	Giới Thiệu Chương Trình Học Mới\r\n</p>', NULL, 'images/uploads/images/home/icon1_782023.png', 1, 1, 1, '2018-12-31 13:01:16', '2019-01-01 03:39:33', NULL, 1, 2),
(2, 'New Programs', 'new-programs', '<p>\r\n	Introduce&nbsp;New Programs\r\n</p>', NULL, 'images/uploads/images/home/icon1_782023.png', 1, 1, 1, '2019-01-01 03:41:32', '2019-01-01 03:41:32', NULL, 2, 2),
(3, 'Chuyên Gia Giáo Dục', 'chuyen-gia-giao-duc', '<p>\r\n	Giới Thiệu&nbsp;Chuyên Gia Giáo Dục\r\n</p>', NULL, 'images/uploads/images/home/icon2_356632.png', 1, 1, 1, '2019-01-01 03:43:13', '2019-01-01 03:43:13', NULL, 1, 3),
(4, 'expert teachers', 'expert-teachers', '<p>\r\n	Introduce Expert Teachers\r\n</p>', NULL, 'images/uploads/images/home/icon2_356632.png', 1, 1, 1, '2019-01-01 03:47:02', '2019-01-01 03:47:02', NULL, 2, 3),
(5, 'Hệ Thống Giáo Dục', 'he-thong-giao-duc', '<p>\r\n	Giới Thiệu&nbsp;Hệ Thống Giáo Dục\r\n</p>', NULL, 'images/uploads/images/home/icon3_519469.png', 1, 1, 1, '2019-01-01 03:47:43', '2019-01-01 03:47:43', NULL, 1, 4),
(6, 'education system', 'education-system', '<p>\r\n	Introduce&nbsp;education system\r\n</p>', NULL, 'images/uploads/images/home/icon3_519469.png', 1, 1, 1, '2019-01-01 03:48:09', '2019-01-01 03:48:09', NULL, 2, 4),
(7, 'Nền Giáo Dục Tại Ireland', 'nen-giao-duc-tai-ireland', '<p>\r\n	Học tập trong một trong những hệ thống giáo dục tốt nhất trên thế giới về thành tích giáo dục đại học\r\n</p>', NULL, 'images/uploads/images/home/irelandeducation_276494.jpg', 1, 1, 1, '2019-01-01 04:44:58', '2019-01-01 04:44:58', NULL, 1, 6),
(8, 'Ireland Education', 'ireland-education', 'Study in one of the best education systems in the world for higher education achievements', NULL, 'images/uploads/images/home/irelandeducation_276494.jpg', 1, 1, 1, '2019-01-01 04:45:58', '2019-01-01 04:45:58', NULL, 2, 6),
(9, 'Thủ Tục Xin Visa Du Học Ireland', 'thu-tuc-xin-visa-du-hoc-ireland', '<p>\r\n	<span break-word=\"\" style=\"display: inline !important; float: none; background-color: transparent; color: rgb(51, 51, 51); cursor: text; font-family: sans-serif,Arial,Verdana,\">Chúng tôi cung cấp dịch vụ làm visa du học ireland nhanh chóng và dễ dàng</span>\r\n</p>', NULL, 'images/uploads/images/home/1531909544evisa_724324.jpg', 1, 1, 1, '2019-01-01 05:07:13', '2019-01-01 11:54:48', NULL, 1, 8),
(10, 'Visas for International Students in Ireland', 'visas-for-international-students-in-ireland', '<p>\r\n	<span break-word=\"\" style=\"display: inline !important; float: none; background-color: transparent; color: rgb(51, 51, 51); cursor: text; font-family: sans-serif,Arial,Verdana,\">We offer ireland quick and easy student visa services</span>\r\n</p>', NULL, 'images/uploads/images/home/1531909544evisa_724324.jpg', 1, 1, 1, '2019-01-01 05:07:42', '2019-01-01 11:54:27', NULL, 2, 8),
(11, 'Sống ở nước nói tiếng Anh', 'song-o-nuoc-noi-tieng-anh', NULL, NULL, 'images/uploads/images/home/themify-edit-file_258172.png', 1, 1, 1, '2019-01-01 12:01:24', '2019-01-01 12:04:33', NULL, 1, 10),
(12, 'Live in an English speaking country', 'live-in-an-english-speaking-country', NULL, NULL, 'images/uploads/images/home/themify-edit-file_258172.png', 1, 1, 1, '2019-01-01 12:03:52', '2019-01-01 14:35:05', NULL, 2, 10),
(13, 'Tiếp cận với các cơ hội nghề nghiệp với các công ty hàng đầu thế giới đặt tại Ireland như Apple, Google, Facebook và Pfizer và nhiều, nhiều khác.', 'tiep-can-voi-cac-co-hoi-nghe-nghiep-voi-cac-cong-ty-hang-dau-the-gioi-dat-tai-ireland-nhu-apple-google-facebook-va-pfizer-va-nhieu-nhieu-khac', NULL, NULL, 'images/uploads/images/home/themify-file_289739.png', 1, 1, 1, '2019-01-01 12:05:47', '2019-01-01 12:05:47', NULL, 1, 11),
(14, 'Connect with career opportunities with leading global companies located in Ireland such as Apple, Google, Facebook and Pfizer and many, many others.', 'connect-with-career-opportunities-with-leading-global-companies-located-in-ireland-such-as-apple-google-facebook-and-pfizer-and-many-many-others', NULL, NULL, 'images/uploads/images/home/themify-file_289739.png', 1, 1, 1, '2019-01-01 12:06:29', '2019-01-01 12:06:29', NULL, 2, 11),
(15, 'Học tập trong một trong những hệ thống giáo dục tốt nhất trên thế giới về thành tích giáo dục đại học', 'hoc-tap-trong-mot-trong-nhung-he-thong-giao-duc-tot-nhat-tren-the-gioi-ve-thanh-tich-giao-duc-dai-hoc', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:07:24', '2019-01-01 12:07:24', NULL, 1, 12),
(16, 'Study in one of the best education systems in the world for higher education achievements', 'study-in-one-of-the-best-education-systems-in-the-world-for-higher-education-achievements', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:08:12', '2019-01-01 12:08:12', NULL, 2, 12),
(17, 'Được hưởng từ đầu tư của Ailen vào hệ thống giáo dục', 'duoc-huong-tu-dau-tu-cua-ailen-vao-he-thong-giao-duc', NULL, NULL, 'images/uploads/images/home/themify-user_205775.png', 1, 1, 1, '2019-01-01 12:09:05', '2019-01-01 12:09:05', NULL, 1, 13),
(18, 'Benefit from Ireland\'s investment in the education system', 'benefit-from-irelands-investment-in-the-education-system', NULL, NULL, 'images/uploads/images/home/themify-user_205775.png', 1, 1, 1, '2019-01-01 12:09:30', '2019-01-01 12:09:30', NULL, 2, 13),
(19, 'Lựa chọn hơn 5000 bằng cấp quốc tế được công nhận', 'lua-chon-hon-5000-bang-cap-quoc-te-duoc-cong-nhan', NULL, NULL, 'images/uploads/images/home/themify-gift_168802.png', 1, 1, 1, '2019-01-01 12:10:16', '2019-01-01 12:10:16', NULL, 1, 14),
(20, 'Choose  from over 5000 internationally recognised qualifications', 'choose-from-over-5000-internationally-recognised-qualifications', NULL, NULL, 'images/uploads/images/home/themify-gift_168802.png', 1, 1, 1, '2019-01-01 12:10:43', '2019-01-01 12:10:43', NULL, 2, 14),
(21, 'Cơ hội nghiên cứu tầm cỡ thế giới trong các chương trình hàng đầu thế giới', 'co-hoi-nghien-cuu-tam-co-the-gioi-trong-cac-chuong-trinh-hang-dau-the-gioi', NULL, NULL, 'images/uploads/images/home/themify-mic_672773.png', 1, 1, 1, '2019-01-01 12:11:51', '2019-01-01 12:11:51', NULL, 1, 15),
(22, 'Access world-class research opportunities in world-leading programmes', 'access-world-class-research-opportunities-in-world-leading-programmes', NULL, NULL, 'images/uploads/images/home/themify-mic_672773.png', 1, 1, 1, '2019-01-01 12:12:24', '2019-01-01 12:12:24', NULL, 2, 15),
(23, 'Đạt được tham vọng của bạn ở quốc gia kinh doanh nhất châu Âu', 'dat-duoc-tham-vong-cua-ban-o-quoc-gia-kinh-doanh-nhat-chau-au', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:12:56', '2019-01-01 12:12:56', NULL, 1, 16),
(24, 'Achieve your ambitions in Europe\'s most entrepreneurial country', 'achieve-your-ambitions-in-europes-most-entrepreneurial-country', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:13:28', '2019-01-01 12:13:28', NULL, 2, 16),
(25, 'Tham dự với 35.000 sinh viên quốc tế đến từ 161 quốc gia hưởng thụ nền văn hóa sôi động của Ai Len', 'tham-du-voi-35000-sinh-vien-quoc-te-den-tu-161-quoc-gia-huong-thu-nen-van-hoa-soi-dong-cua-ai-len', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:14:03', '2019-01-01 12:14:03', NULL, 1, 17),
(26, 'Join the 35,000 international students from 161 countries enjoying Ireland\'s vibrant culture', 'join-the-35000-international-students-from-161-countries-enjoying-irelands-vibrant-culture', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:14:23', '2019-01-01 12:14:23', NULL, 2, 17),
(27, 'Trải nghiệm sống trong một trong những quốc gia thân thiện và an toàn nhất trên thế giới', 'trai-nghiem-song-trong-mot-trong-nhung-quoc-gia-than-thien-va-an-toan-nhat-tren-the-gioi', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:14:56', '2019-01-01 12:14:56', NULL, 1, 18),
(28, 'Experience living in one of the friendliest and safest countries in the world', 'experience-living-in-one-of-the-friendliest-and-safest-countries-in-the-world', NULL, NULL, 'images/uploads/images/home/themify-desktop_158711.png', 1, 1, 1, '2019-01-01 12:15:35', '2019-01-01 12:15:35', NULL, 2, 18),
(29, 'Bài Viết Chuyên Ngành 1', 'bai-viet-chuyen-nganh-1', '<p>\r\n	Mô Tả Cho Bài Viết Chuyên Ngành 1\r\n</p>', '<p>\r\n	Nội Dung Cho<b> </b>Bài Viết Chuyên Ngành 1\r\n</p>', 'images/uploads/images/home/feature2_558461.jpg', 1, 1, 1, '2019-01-01 12:49:10', '2019-01-01 12:56:07', NULL, 1, 20),
(30, 'News 1', 'news-1', '<p>\r\n	Description For News 1\r\n</p>', '<p>\r\n	Content For News 1\r\n</p>', 'images/uploads/images/home/feature2_558461.jpg', 1, 1, 1, '2019-01-01 12:49:49', '2019-01-01 12:56:26', NULL, 2, 20),
(31, 'Bài Viết Chuyên Ngành 2', 'bai-viet-chuyen-nganh-2', '<p>\r\n	Mô tả cho bài viết chuyên ngành 2\r\n</p>', '<p>\r\n	Nội dung bài viết chuyên ngành 2\r\n</p>', 'images/uploads/images/home/feature2_558461.jpg', 1, 1, 1, '2019-01-01 12:55:09', '2019-01-01 12:55:09', NULL, 1, 21),
(32, 'News 2', 'news-2', '<p>\r\n	Description for News 2\r\n</p>', '<p>\r\n	Content for News 2\r\n</p>', 'images/uploads/images/home/feature2_558461.jpg', 1, 1, 1, '2019-01-01 13:14:40', '2019-01-01 13:14:40', NULL, 2, 21),
(33, 'Bài Viết Chuyên Ngành 3', 'bai-viet-chuyen-nganh-3', '<p>\r\n	Mọ Tả Cho Bài Viết Chuyên Ngành 3\r\n</p>', '<p>\r\n	Nội Dung Cho Bài Viết CHuyên Ngành 3\r\n</p>', 'images/uploads/images/home/feature2_558461.jpg', 1, 1, 1, '2019-01-01 13:15:34', '2019-01-01 13:15:34', NULL, 1, 22),
(34, 'News 3', 'news-3', '<p>\r\n	Description for News 3\r\n</p>', '<p>\r\n	<span style=\"display: inline !important; float: none; background-color: transparent; color: rgb(51, 51, 51); cursor: text; font-family: sans-serif,Arial,Verdana,&quot;Trebuchet MS&quot;; font-size: 13px; font-style: normal; font-variant: normal; font-weight: 400; letter-spacing: normal; line-height: 20.8px; orphans: 2; text-align: left; text-decoration: none; text-indent: 0px; text-transform: none; -webkit-text-stroke-width: 0px; white-space: normal; word-spacing: 0px; word-wrap: break-word;\">Content for News 3</span>\r\n</p>', 'images/uploads/images/home/feature2_558461.jpg', 1, 1, 1, '2019-01-01 13:17:11', '2019-01-01 13:17:11', NULL, 2, 22),
(35, 'Tư Vấn Du Học Ireland', 'tu-van-du-hoc-ireland', '<p>\r\n	Tư Vấn Về Giáo Dục Cho Sinh Viên Việt Nam Có Kế Hoạch Học Tập Tại Nước Ngoài\r\n</p>', NULL, 'images/uploads/images/home/edusite-class-320x287_394560.jpg', 1, 1, 1, '2019-01-01 15:15:37', '2019-01-01 15:15:37', NULL, 1, 24),
(36, 'Studying Abroad In Ireland', 'studying-abroad-in-ireland', '<p>\r\n	Provides educational advice to Vietnamese students who plan to study overseas\r\n</p>', NULL, 'images/uploads/images/home/edusite-class-320x287_394560.jpg', 1, 1, 1, '2019-01-01 15:18:00', '2019-01-01 15:18:00', NULL, 2, 24),
(37, 'Visa Du Học Tại Ireland', 'visa-du-hoc-tai-ireland', '<p>\r\n	Để có thể theo học tại Ireland thì điều đầu tiên là nắm vững các thủ thục xin visa du học Ireland 2019 mới nhất để có một khởi đầu thuận lợi\r\n</p>', NULL, 'images/uploads/images/home/edusite-class-320x287_394560.jpg', 1, 1, 1, '2019-01-01 15:21:55', '2019-01-01 15:25:25', NULL, 1, 25),
(38, 'Applying For A Student Visa', 'applying-for-a-student-visa', '<p>\r\n	To be able to study in Ireland, the first thing is to master the latest procedures for applying for a 2019 Irish student visa to get a good start.\r\n</p>', NULL, 'images/uploads/images/home/edusite-class-320x287_394560.jpg', 1, 1, 1, '2019-01-01 15:24:20', '2019-01-01 15:25:17', NULL, 2, 25),
(39, 'Giới Thiệu', 'gioi-thieu', '<p>\r\n	Giới Thiệu\r\n</p>', '<p>\r\n	Giới Thiệu\r\n</p>', NULL, 0, 1, 1, '2019-01-02 09:30:30', '2019-01-02 09:30:30', NULL, 1, 30),
(40, 'About Us', 'about-us', '<p>\r\n	About Us\r\n</p>', '<p>\r\n	About Us\r\n</p>', NULL, 0, 1, 1, '2019-01-02 09:36:25', '2019-01-02 09:36:25', NULL, 2, 30);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_image` longtext COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `sale` int(11) DEFAULT NULL,
  `final_price` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  `is_in_stock` tinyint(1) NOT NULL DEFAULT '1',
  `order` int(11) NOT NULL DEFAULT '1',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `seo_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'administer the website and manage users', '2018-03-14 07:23:50', '2018-03-14 07:23:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `seos`
--

CREATE TABLE `seos` (
  `id` int(10) UNSIGNED NOT NULL,
  `seo_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_keywords` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `seo_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `seos`
--

INSERT INTO `seos` (`id`, `seo_title`, `seo_description`, `seo_keywords`, `seo_image`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Giới Thiệu', NULL, NULL, '2019-01-02 09:17:38', '2019-01-02 09:17:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `is_active` tinyint(1) DEFAULT '0',
  `type` tinyint(1) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `translations`
--

INSERT INTO `translations` (`id`, `is_active`, `type`, `created_at`, `updated_at`) VALUES
(1, 1, 6, '2018-12-31 09:06:18', '2018-12-31 09:06:18'),
(2, 1, 0, '2018-12-31 13:01:16', '2018-12-31 13:01:16'),
(3, 1, 0, '2019-01-01 03:43:13', '2019-01-01 03:43:13'),
(4, 1, 0, '2019-01-01 03:47:43', '2019-01-01 03:47:43'),
(5, 1, 6, '2019-01-01 04:20:09', '2019-01-01 04:20:09'),
(6, 1, 0, '2019-01-01 04:44:58', '2019-01-01 04:44:58'),
(8, 1, 0, '2019-01-01 05:07:13', '2019-01-01 05:07:13'),
(9, 1, 6, '2019-01-01 11:57:53', '2019-01-01 11:57:53'),
(10, 1, 0, '2019-01-01 12:01:24', '2019-01-01 12:01:24'),
(11, 1, 0, '2019-01-01 12:05:47', '2019-01-01 12:05:47'),
(12, 1, 0, '2019-01-01 12:07:24', '2019-01-01 12:07:24'),
(13, 1, 0, '2019-01-01 12:09:05', '2019-01-01 12:09:05'),
(14, 1, 0, '2019-01-01 12:10:16', '2019-01-01 12:10:16'),
(15, 1, 0, '2019-01-01 12:11:51', '2019-01-01 12:11:51'),
(16, 1, 0, '2019-01-01 12:12:56', '2019-01-01 12:12:56'),
(17, 1, 0, '2019-01-01 12:14:03', '2019-01-01 12:14:03'),
(18, 1, 0, '2019-01-01 12:14:56', '2019-01-01 12:14:56'),
(19, 1, 6, '2019-01-01 12:47:06', '2019-01-01 12:47:06'),
(20, 1, 0, '2019-01-01 12:49:10', '2019-01-01 12:49:10'),
(21, 1, 0, '2019-01-01 12:55:09', '2019-01-01 12:55:09'),
(22, 1, 0, '2019-01-01 13:15:34', '2019-01-01 13:15:34'),
(23, 1, 6, '2019-01-01 15:10:03', '2019-01-01 15:10:03'),
(24, 1, 0, '2019-01-01 15:15:36', '2019-01-01 15:15:36'),
(25, 1, 0, '2019-01-01 15:21:55', '2019-01-01 15:21:55'),
(30, 1, 2, '2019-01-02 09:30:30', '2019-01-02 09:30:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'nnduyquang', 'nnduyquang@gmail.com', '$2y$10$mStg572JFNI89/0Cg7TOGOUkACFaBl/nsNeOvx8zglr1qyJPA0tj6', NULL, '2018-03-14 07:24:10', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category_items`
--
ALTER TABLE `category_items`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_items_translation_id_locale_id_unique` (`translation_id`,`locale_id`),
  ADD KEY `category_items_seo_id_foreign` (`seo_id`),
  ADD KEY `category_items_locale_id_foreign` (`locale_id`);

--
-- Chỉ mục cho bảng `category_many`
--
ALTER TABLE `category_many`
  ADD PRIMARY KEY (`category_id`,`item_id`);

--
-- Chỉ mục cho bảng `category_permissions`
--
ALTER TABLE `category_permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category_permissions_name_unique` (`name`);

--
-- Chỉ mục cho bảng `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configs_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `locales`
--
ALTER TABLE `locales`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
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
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`),
  ADD KEY `permissions_category_permission_id_foreign` (`category_permission_id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_translation_id_locale_id_unique` (`translation_id`,`locale_id`),
  ADD KEY `posts_user_id_foreign` (`user_id`),
  ADD KEY `posts_seo_id_foreign` (`seo_id`),
  ADD KEY `posts_locale_id_foreign` (`locale_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_user_id_foreign` (`user_id`),
  ADD KEY `products_seo_id_foreign` (`seo_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Chỉ mục cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Chỉ mục cho bảng `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `translations`
--
ALTER TABLE `translations`
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
-- AUTO_INCREMENT cho bảng `category_items`
--
ALTER TABLE `category_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `category_permissions`
--
ALTER TABLE `category_permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `locales`
--
ALTER TABLE `locales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `seos`
--
ALTER TABLE `seos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `category_items`
--
ALTER TABLE `category_items`
  ADD CONSTRAINT `category_items_locale_id_foreign` FOREIGN KEY (`locale_id`) REFERENCES `locales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_items_seo_id_foreign` FOREIGN KEY (`seo_id`) REFERENCES `seos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `category_items_translation_id_foreign` FOREIGN KEY (`translation_id`) REFERENCES `translations` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `configs`
--
ALTER TABLE `configs`
  ADD CONSTRAINT `configs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_category_permission_id_foreign` FOREIGN KEY (`category_permission_id`) REFERENCES `category_permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_seo_id_foreign` FOREIGN KEY (`seo_id`) REFERENCES `seos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
