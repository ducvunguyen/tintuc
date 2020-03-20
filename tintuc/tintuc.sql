-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.6-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             10.3.0.5771
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping structure for table tintuc.admins
CREATE TABLE IF NOT EXISTS `admins` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=DYNAMIC;

-- Dumping data for table tintuc.admins: ~3 rows (approximately)
DELETE FROM `admins`;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` (`id`, `name`, `avatar`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'nguyen', NULL, NULL, 'nguyen@gmail.com', NULL, '$2y$10$ppQgG1.ztUov5LquKqQ45u1wCldR94UM2oihzdL9FkqaVJsHuChnq', 'NmhwZuxjFvHoL2csyoWQfk4DKf4eryhB0xlGnP1rhiPCvmjGDewDr4kg83Em', 0, 0, '2020-03-11 15:34:08', '2020-03-13 07:02:08'),
	(8, 'tran ngoc hieu', NULL, NULL, 'vu97kt@gmail.com', NULL, '$2y$10$ylRTp3lvSL9xSjljdoZgCe3kul8uhC./7BKCBBWOExDLP2WqnKqy2', 'kaNPTSVoUs0OG6YGIko4PEPTlj68hWpSuRMtyYhvrLNjB9se8rP3ZWoA6YjH', 0, 0, '2020-03-11 17:10:57', '2020-03-14 04:11:13'),
	(32, 'nguyennd', NULL, NULL, 'nguyennd@gmail.com', NULL, '$2y$10$1tzCGqt2FrK95rNxJpJPKezOHgpyHHpRWP2t55SqdJYrB8C.VRVXO', 'vR6ezWcKcFZ7EAmCJtyJHpiY1HSfPgBVkKfgmwheJJS2RIZBibHjj0vhHoQI', 0, 0, '2020-03-13 07:01:20', '2020-03-13 07:01:20');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;

-- Dumping structure for table tintuc.banners
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.banners: ~3 rows (approximately)
DELETE FROM `banners`;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `name_url`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(65, 'TC__6685.png', 8, 8, NULL, NULL),
	(66, 'TV truoc dieu trị.jpg', 8, 8, NULL, NULL),
	(67, 'Theo doi sau dieu tri.jpg', 8, 8, NULL, NULL);
/*!40000 ALTER TABLE `banners` ENABLE KEYS */;

-- Dumping structure for table tintuc.categpries
CREATE TABLE IF NOT EXISTS `categpries` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_cat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.categpries: ~4 rows (approximately)
DELETE FROM `categpries`;
/*!40000 ALTER TABLE `categpries` DISABLE KEYS */;
INSERT INTO `categpries` (`id`, `name_cat`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(9, 'Tin ICT', 8, 8, NULL, NULL),
	(15, 'App-Games222222', 8, 8, NULL, NULL),
	(20, 'Thể thao', 8, 8, NULL, NULL),
	(21, 'Internet', 8, 8, NULL, NULL),
	(22, '5', 8, 8, NULL, NULL);
/*!40000 ALTER TABLE `categpries` ENABLE KEYS */;

-- Dumping structure for table tintuc.comments
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.comments: ~0 rows (approximately)
DELETE FROM `comments`;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;

-- Dumping structure for table tintuc.comment_posts
CREATE TABLE IF NOT EXISTS `comment_posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.comment_posts: ~0 rows (approximately)
DELETE FROM `comment_posts`;
/*!40000 ALTER TABLE `comment_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `comment_posts` ENABLE KEYS */;

-- Dumping structure for table tintuc.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.migrations: ~11 rows (approximately)
DELETE FROM `migrations`;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2020_03_10_195759_create_roles_table', 1),
	(4, '2020_03_10_200139_create_role_users_table', 1),
	(5, '2020_03_11_030526_create_banners_table', 1),
	(6, '2020_03_11_030801_create_categories_table', 1),
	(7, '2020_03_11_030900_create_posts_table', 1),
	(8, '2020_03_11_031059_create_comment_posts_table', 1),
	(9, '2020_03_11_031402_create_comments_table', 1),
	(10, '2020_03_11_100328_create_permissions_table', 1),
	(11, '2020_03_11_100551_create_permission_role_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table tintuc.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.password_resets: ~0 rows (approximately)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table tintuc.permissions
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_permission` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.permissions: ~8 rows (approximately)
DELETE FROM `permissions`;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` (`id`, `name_permission`, `display_permission`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'user-list', 'Danh sach user', 1, 1, NULL, NULL),
	(2, 'user-add', 'Them user', 2, 2, NULL, NULL),
	(3, 'user-edit', 'Sua user', 3, 3, NULL, NULL),
	(4, 'user-delete', 'xoa user', 4, 4, NULL, NULL),
	(5, 'role-list', 'danh sach role', 5, 5, NULL, NULL),
	(6, 'role-add', 'them role', 6, 6, NULL, NULL),
	(7, 'role-edit', 'sua role', 7, 7, NULL, NULL),
	(8, 'role-delete', 'xoa role', 8, 8, NULL, NULL);
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;

-- Dumping structure for table tintuc.permission_role
CREATE TABLE IF NOT EXISTS `permission_role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=169 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.permission_role: ~26 rows (approximately)
DELETE FROM `permission_role`;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` (`id`, `permission_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 1, 8, 18, 18, '2020-03-12 10:57:44', '2020-03-12 10:57:44'),
	(120, 1, 8, 1, 1, '2020-03-13 02:31:58', '2020-03-13 02:31:58'),
	(121, 2, 8, 1, 1, '2020-03-13 02:31:58', '2020-03-13 02:31:58'),
	(122, 3, 8, 1, 1, '2020-03-13 02:31:58', '2020-03-13 02:31:58'),
	(123, 4, 8, 1, 1, '2020-03-13 02:31:58', '2020-03-13 02:31:58'),
	(124, 5, 8, 1, 1, '2020-03-13 02:31:58', '2020-03-13 02:31:58'),
	(125, 1, 8, 1, 1, '2020-03-13 02:36:05', '2020-03-13 02:36:05'),
	(126, 2, 8, 1, 1, '2020-03-13 02:36:05', '2020-03-13 02:36:05'),
	(127, 1, 8, 1, 1, '2020-03-13 02:38:20', '2020-03-13 02:38:20'),
	(128, 2, 8, 1, 1, '2020-03-13 02:38:20', '2020-03-13 02:38:20'),
	(129, 1, 8, 1, 1, '2020-03-13 02:39:27', '2020-03-13 02:39:27'),
	(130, 2, 8, 1, 1, '2020-03-13 02:39:27', '2020-03-13 02:39:27'),
	(137, 2, 1, 1, 1, '2020-03-13 02:41:20', '2020-03-13 02:41:20'),
	(138, 3, 1, 1, 1, '2020-03-13 02:41:20', '2020-03-13 02:41:20'),
	(140, 2, 1, 1, 1, '2020-03-13 02:41:37', '2020-03-13 02:41:37'),
	(155, 4, 1, 1, 1, '2020-03-13 03:34:52', '2020-03-13 03:34:52'),
	(157, 6, 1, 1, 1, '2020-03-13 03:34:52', '2020-03-13 03:34:52'),
	(158, 7, 1, 1, 1, '2020-03-13 03:34:52', '2020-03-13 03:34:52'),
	(159, 8, 1, 1, 1, '2020-03-13 03:34:52', '2020-03-13 03:34:52'),
	(160, 1, 2, 1, 1, '2020-03-13 04:04:34', '2020-03-13 04:04:34'),
	(161, 1, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(162, 2, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(163, 3, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(164, 4, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(166, 5, 1, 1, 1, '2020-03-13 08:50:36', '2020-03-13 08:50:36'),
	(168, 1, 1, 1, 1, '2020-03-14 02:42:40', '2020-03-14 02:42:40');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table tintuc.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.posts: ~4 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `title`, `avatar`, `content`, `category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(8, 'UK', '2.4 Y hoc thay the (banner).jpg', '<p>dkjnsdkjasdfdfsdf</p>', 9, 8, 8, NULL, NULL),
	(10, 'BỆNH VIỆN ĐẠI HỌC TEIKYO - NHẬT BẢN', '2.2.1 Tieu duong (2).jpg', '<p>slksadkalsdkmasd</p>', 20, 8, 8, NULL, NULL),
	(11, 'BỆNH VIỆN ĐẠI HỌC TEIKYO', '2.4.2 Lieu phap oxy (2).jpg', '<p>Khi chạy n&oacute;, c&aacute;c bạn sẽ thấy thư viện của ch&uacute;ng ta sẽ thực hiện &ldquo;X&aacute;c thực&rdquo; (Validate) khi ch&uacute;ng ta nhấn v&agrave;o n&uacute;t &ldquo;Submit&rdquo; th&igrave; ở đ&acirc;y n&oacute; ch&iacute;nh l&agrave; n&uacute;t &ldquo;Gửi&rdquo;. Hoặc c&aacute;c bạn c&oacute; thể g&otilde; v&agrave;i d&ograve;ng chữ v&agrave;o v&agrave; nhận ra sự kh&aacute;c biệt khi x&oacute;a đi. Đ&oacute; ch&iacute;nh l&agrave; những đoạn th&ocirc;ng b&aacute;o nhỏ như sau:</p>\n\n<p><a href="https://thienanblog.com/wp-content/uploads/2015/06/3.-Form-Validate-Simple.png" title=""><img alt="Form Validate - Simple" src="https://thienanblog.com/wp-content/uploads/2015/06/3.-Form-Validate-Simple.png" style="height:126px; width:607px" /></a></p>\n\n<p>Rất l&agrave; đẹp mắt phải kh&ocirc;ng c&aacute;c bạn? Nhưng thật ra để được vậy th&igrave; c&aacute;c bạn phải c&oacute; CSS v&agrave;o nữa đấy chứ thật ra Form n&agrave;y khi kh&ocirc;ng c&oacute; CSS th&igrave; c&aacute;c bạn sẽ thấy n&oacute; chạy lung tung.</p>\n\n<p>T&ocirc;i sẽ giải th&iacute;ch một t&iacute; về đoạn script m&agrave; ch&uacute;ng ta viết:</p>\n\n<ol>\n	<li>Phương thức &quot;<strong>validate()</strong>&quot; chấp nhận 1 đối số l&agrave;&nbsp;<strong>một đối tượng</strong>&nbsp;c&oacute;&nbsp;<strong>2 thuộc t&iacute;nh</strong>&nbsp;ch&iacute;nh l&agrave; &ldquo;<strong>rules</strong>&rdquo; v&agrave; &ldquo;<strong>messages</strong>&rdquo;.</li>\n	<li>Trong đ&oacute;, &ldquo;<strong>rules</strong>&rdquo; đại diện cho điều kiện x&aacute;c thực như &ldquo;<strong>required</strong>&rdquo;(Kh&ocirc;ng bỏ trống), &ldquo;<strong>minlength</strong>&rdquo;(Độ d&agrave;i tối thiểu)&hellip;v&agrave; &ldquo;<strong>messages</strong>&rdquo; đại diện cho c&aacute;c th&ocirc;ng b&aacute;o lỗi m&agrave; ch&uacute;ng ta đ&atilde; thấy ở v&iacute; dụ tr&ecirc;n.</li>\n	<li>V&agrave; thuộc t&iacute;nh &ldquo;<strong>rules</strong>&rdquo; của ch&uacute;ng ta sẽ lại bao gồm c&aacute;c phần tử con cũng l&agrave;&nbsp;<strong>một đối tượng</strong>&nbsp;với c&aacute;c thuộc t&iacute;nh b&ecirc;n trong n&oacute; ch&iacute;nh l&agrave; thuộc t&iacute;nh &ldquo;<strong>name</strong>&rdquo; b&ecirc;n trong c&aacute;c thẻ &ldquo;<strong>input</strong>&rdquo; của ch&uacute;ng ta. C&aacute;c bạn c&oacute; thể xem qua h&igrave;nh ảnh sau:</li>\n</ol>\n\n<p><a href="https://thienanblog.com/wp-content/uploads/2015/06/4.-So-sanh-HTML-va-Code.png" title=""><img alt="So sanh HTML va Code" src="https://thienanblog.com/wp-content/uploads/2015/06/4.-So-sanh-HTML-va-Code.png" style="height:286px; width:594px" /></a></p>\n\n<ol start="4">\n	<li>Rất đơn giản phải kh&ocirc;ng n&agrave;o? &ldquo;<strong>messages</strong>&rdquo; cũng sẽ&nbsp;<strong>tương tự</strong>&nbsp;&ldquo;<strong>rules</strong>&rdquo; v&agrave; nếu bạn tinh &yacute; sẽ nhận ra l&agrave; kể cả điều kiện b&ecirc;n trong n&oacute; như &ldquo;<strong>required</strong>&rdquo;, &ldquo;<strong>minlength</strong>&rdquo; cũng sẽ tương đồng với b&ecirc;n &ldquo;<strong>messages</strong>&rdquo;. Hai c&aacute;i chỉ kh&aacute;c nhau về c&ocirc;ng việc m&agrave; th&ocirc;i.</li>\n	<li>Như vậy, ch&uacute;ng ta đ&atilde; ho&agrave;n tất được c&ocirc;ng việc &ldquo;Validate&rdquo; rồi đấy.</li>\n</ol>', 21, 8, 8, NULL, NULL),
	(12, 'Cuộc tình các CEO', '2.1 Nang cao suc khoe.jpg', '<p>fksnfdkjsdszdfhbjsd<img alt="" src="/ckfinder/userfiles/images/iconfinder_589_Drugs_medicine_pills_tablets_4212201.png" style="height:40px; width:40px" />dhbjhsbdjfhsbjdfhbsjdfsdfvdfvs<img alt="" src="/ckfinder/userfiles/images/2_1%20Nang%20cao%20suc%20khoe%20(banner).jpg" style="height:250px; width:850px" /></p>', 9, 8, 8, NULL, NULL);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;

-- Dumping structure for table tintuc.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.roles: ~4 rows (approximately)
DELETE FROM `roles`;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` (`id`, `name_role`, `display_role`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(1, 'admin', 'Quản lý', 1, 1, NULL, '2020-03-13 03:34:52'),
	(2, 'content', 'Soạn nội dung', 1, 1, NULL, '2020-03-13 04:04:34'),
	(3, 'writer', 'Writer', 1, 1, NULL, '2020-03-13 04:05:12');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;

-- Dumping structure for table tintuc.role_user
CREATE TABLE IF NOT EXISTS `role_user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.role_user: ~3 rows (approximately)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(16, 25, 3, 18, 18, '2020-03-12 08:52:08', '2020-03-12 08:52:08'),
	(33, 1, 1, 1, 1, '2020-03-13 04:06:00', '2020-03-13 04:06:00'),
	(35, 8, 1, 1, 1, '2020-03-14 04:09:42', '2020-03-14 04:09:42');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;

-- Dumping structure for table tintuc.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.users: ~2 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `avatar`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'nguyen', NULL, NULL, 'nguyen@gmail.com', NULL, '$2y$10$ppQgG1.ztUov5LquKqQ45u1wCldR94UM2oihzdL9FkqaVJsHuChnq', 'L7cudY04XVtgA58IY1orcFJW0gquaGpHdExRylTJlqr1ZdQ3SAcLiYctmm2l', 0, 0, '2020-03-11 15:34:08', '2020-03-13 07:02:08'),
	(8, 'tran ngoc hieu', NULL, NULL, 'vu97kt@gmail.com', NULL, '$2y$10$ylRTp3lvSL9xSjljdoZgCe3kul8uhC./7BKCBBWOExDLP2WqnKqy2', 'IVKIIMNYXTlhju031TEWKt3euGGHfSW4UcEA3KjM6zjuGwEDuMTjmYSxW2Un', 0, 0, '2020-03-11 17:10:57', '2020-03-14 04:11:13'),
	(32, 'nguyennd', NULL, NULL, 'nguyennd@gmail.com', NULL, '$2y$10$1tzCGqt2FrK95rNxJpJPKezOHgpyHHpRWP2t55SqdJYrB8C.VRVXO', 'vR6ezWcKcFZ7EAmCJtyJHpiY1HSfPgBVkKfgmwheJJS2RIZBibHjj0vhHoQI', 0, 0, '2020-03-13 07:01:20', '2020-03-13 07:01:20');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
