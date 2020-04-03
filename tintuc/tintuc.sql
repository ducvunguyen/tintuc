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
  `user_id` int(11) DEFAULT 0,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.banners: ~3 rows (approximately)
DELETE FROM `banners`;
/*!40000 ALTER TABLE `banners` DISABLE KEYS */;
INSERT INTO `banners` (`id`, `name_url`, `user_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(69, '20200330044015pm2.2.2 Suy tim (4).jpg', 1, 1, 1, NULL, NULL);
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

-- Dumping data for table tintuc.categpries: ~5 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.permissions: ~11 rows (approximately)
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
	(8, 'role-delete', 'xoa role', 8, 8, NULL, NULL),
	(10, 'add-post', 'Người viết được thêm', 1, 1, '2020-04-02 08:47:50', '2020-04-02 08:47:50'),
	(13, 'edit-post', 'Cho phép được sửa bài viết', 1, 1, '2020-04-02 08:52:46', '2020-04-02 08:52:46'),
	(14, 'delete-post', 'Cho phép xóa bài viết', 1, 1, '2020-04-02 08:54:16', '2020-04-02 08:54:16'),
	(15, 'show-post', 'Người dùng xem bài viết', 1, 1, '2020-04-03 04:22:53', '2020-04-03 04:22:53'),
	(16, 'index-post', 'Bạn được xem danh sách', 8, 8, '2020-04-03 04:32:20', '2020-04-03 04:32:20');
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
) ENGINE=InnoDB AUTO_INCREMENT=187 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.permission_role: ~31 rows (approximately)
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
	(161, 1, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(162, 2, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(163, 3, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(164, 4, 3, 1, 1, '2020-03-13 04:05:12', '2020-03-13 04:05:12'),
	(166, 5, 1, 1, 1, '2020-03-13 08:50:36', '2020-03-13 08:50:36'),
	(168, 1, 1, 1, 1, '2020-03-14 02:42:40', '2020-03-14 02:42:40'),
	(171, 10, 1, 1, 1, NULL, NULL),
	(172, 10, 2, 1, 1, NULL, NULL),
	(173, 13, 1, 1, 1, NULL, NULL),
	(175, 14, 1, 1, 1, NULL, NULL),
	(179, 16, 1, 8, 8, NULL, NULL),
	(180, 16, 2, 1, 1, '2020-04-03 04:36:21', '2020-04-03 04:36:21'),
	(181, 13, 2, 1, 1, '2020-04-03 04:37:44', '2020-04-03 04:37:44'),
	(182, 14, 2, 1, 1, '2020-04-03 04:38:19', '2020-04-03 04:38:19'),
	(183, 15, 1, 1, 1, '2020-04-03 04:41:07', '2020-04-03 04:41:07');
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;

-- Dumping structure for table tintuc.posts
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT 0,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL DEFAULT 0,
  `updated_by` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.posts: ~2 rows (approximately)
DELETE FROM `posts`;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` (`id`, `user_id`, `title`, `avatar`, `content`, `category_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(16, 8, 'Cuộc tình các CEO', '20200330075134am2.2.2 Suy tim (3).jpg', '<p>Cuộc diễn tập nhằm ứng ph&oacute; khẩn với một ổ dịch bệnh lạ giả định của H&agrave;n Quốc hồi th&aacute;ng 12/2019 th&agrave;nh hiện thực sau gần một th&aacute;ng.</p>\n\n<p>Theo một t&agrave;i liệu của ch&iacute;nh phủ H&agrave;n Quốc, ng&agrave;y 17/12/2019, khoảng 20 chuy&ecirc;n gia h&agrave;ng đầu về bệnh truyền nhiễm của H&agrave;n Quốc đ&atilde; họp b&agrave;n để giải quyết một t&igrave;nh huống giả định: Một gia đ&igrave;nh H&agrave;n Quốc mắc vi&ecirc;m phổi sau chuyến đi Trung Quốc, kh&ocirc;ng đề cụ thể nơi ph&aacute;t sinh ca nhiễm.</p>\n\n<p>Căn bệnh c&ograve;n được giả định l&acirc;y lan trong đồng nghiệp của c&aacute;c th&agrave;nh vi&ecirc;n gia đ&igrave;nh, c&aacute;c nh&acirc;n vi&ecirc;n y tế đ&atilde; điều trị cho gia đ&igrave;nh n&agrave;y. Nh&oacute;m chuy&ecirc;n gia tại Trung t&acirc;m kiểm so&aacute;t v&agrave; ph&ograve;ng ngừa dịch bệnh H&agrave;n Quốc (KCDC) đ&atilde; nghi&ecirc;n cứu nhằm ph&aacute;t hiện mầm bệnh, nguồn gốc v&agrave; c&aacute;c kỹ thuật x&eacute;t nghiệm. Tất cả những biện ph&aacute;p n&agrave;y sau đ&oacute; được ứng dụng v&agrave;o hiện thực Covid-19 ở H&agrave;n Quốc, sau khi một bệnh nh&acirc;n bị nghi nhiễm nCoV đầu ti&ecirc;n được ph&aacute;t hiện ng&agrave;y 20/1, t&agrave;i liệu cho hay.</p>\n\n<table align="center" border="0" cellpadding="3" cellspacing="0">\n	<tbody>\n		<tr>\n			<td><img alt="Binh sĩ Hàn Quốc mặc đồ bảo hộ đi khử trùng các tòa nhà hôm 15/3. Ảnh: Reuters." src="https://i-vnexpress.vnecdn.net/2020/03/30/korea-6176-1585550171.jpg" /></td>\n		</tr>\n		<tr>\n			<td>\n			<p>Binh sĩ H&agrave;n Quốc mặc đồ bảo hộ đi khử tr&ugrave;ng c&aacute;c t&ograve;a nh&agrave; h&ocirc;m 15/3. Ảnh:&nbsp;<em>Reuters.</em></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&quot;Nh&igrave;n lại trong 20 năm qua, con người bị tấn c&ocirc;ng nặng nề nhất bởi c&uacute;m hoặc virus corona, ch&uacute;ng ta đ&atilde; ứng ph&oacute; tương đối tốt với bệnh c&uacute;m nhưng lại lo lắng về khả năng b&ugrave;ng ph&aacute;t một loại virus corona mới&quot;, chuy&ecirc;n gia KCDC Lee Sang-won, một trong những người l&atilde;nh đạo cuộc diễn tập hồi th&aacute;ng 12 năm ngo&aacute;i của H&agrave;n Quốc, n&oacute;i.</p>\n\n<p>&quot;Đ&oacute; l&agrave; một dạng may mắn, ch&uacute;ng t&ocirc;i kh&ocirc;ng n&oacute;i n&ecirc;n lời khi thấy kịch bản đ&oacute; trở th&agrave;nh hiện thực&quot;, Lee n&oacute;i th&ecirc;m. &quot;Nhưng ch&iacute;nh cuộc diễn tập đ&atilde; gi&uacute;p ch&uacute;ng t&ocirc;i tiết kiệm thời gian để ph&aacute;t triển phương ph&aacute;p x&eacute;t nghiệm, x&aacute;c định c&aacute;c ca nhiễm Covid-19&quot;, &ocirc;ng n&oacute;i. Lee cho hay ngay sau cuộc diễn tập tr&ecirc;n, dịch Covid-19 đ&atilde; bắt đầu xuất hiện ở Vũ H&aacute;n, Trung Quốc v&agrave; trước khi Bắc Kinh c&ocirc;ng bố dịch bệnh, nh&oacute;m chuy&ecirc;n gia KCDC đ&atilde; sẵn s&agrave;ng cho việc x&eacute;t nghiệm.</p>\n\n<p>C&aacute;c chuy&ecirc;n gia đ&aacute;nh gi&aacute; cuộc diễn tập đ&oacute;ng một vai tr&ograve; quan trọng trong kiềm chế dịch bệnh l&acirc;y lan ở H&agrave;n Quốc. Ngay sau khi dịch bệnh b&ugrave;ng ph&aacute;t, H&agrave;n Quốc đ&atilde; tiến h&agrave;nh x&eacute;t nghiệm diện rộng trong v&agrave;i ng&agrave;y, r&agrave; so&aacute;t cả những người kh&ocirc;ng c&oacute; triệu chứng nhưng c&oacute; nguy cơ l&acirc;y nhiễm cho người kh&aacute;c, c&aacute;ch ly c&aacute;c bệnh nh&acirc;n đ&atilde; được x&aacute;c nhận mắc nhiễm v&agrave; theo d&otilde;i lịch sử li&ecirc;n lạc của họ.</p>\n\n<p>&quot;Ch&uacute;ng t&ocirc;i đ&atilde; l&agrave;m tốt chưa? T&ocirc;i kh&ocirc;ng biết nữa. Nhưng ch&uacute;ng t&ocirc;i kh&ocirc;ng muốn lặp lại những g&igrave; ch&uacute;ng t&ocirc;i từng trải qua năm 2015, phương ch&acirc;m của ch&uacute;ng t&ocirc;i l&agrave; &#39;kh&ocirc;ng bao giờ&#39;&quot;, Lee n&oacute;i, đề cập đến Hội chứng H&ocirc; hấp cấp Trung Đ&ocirc;ng (MERS) năm 2015.</p>', 9, 8, 8, NULL, NULL),
	(17, 8, 'BỆNH VIỆN ĐẠI HỌC TEIKYO', '20200330075147am2.2.2 Suy tim (banner).jpg', '<p>Cuộc diễn tập nhằm ứng ph&oacute; khẩn với một ổ dịch bệnh lạ giả định của H&agrave;n Quốc hồi th&aacute;ng 12/2019 th&agrave;nh hiện thực sau gần một th&aacute;ng.</p>\n\n<p>Theo một t&agrave;i liệu của ch&iacute;nh phủ H&agrave;n Quốc, ng&agrave;y 17/12/2019, khoảng 20 chuy&ecirc;n gia h&agrave;ng đầu về bệnh truyền nhiễm của H&agrave;n Quốc đ&atilde; họp b&agrave;n để giải quyết một t&igrave;nh huống giả định: Một gia đ&igrave;nh H&agrave;n Quốc mắc vi&ecirc;m phổi sau chuyến đi Trung Quốc, kh&ocirc;ng đề cụ thể nơi ph&aacute;t sinh ca nhiễm.</p>\n\n<p>Căn bệnh c&ograve;n được giả định l&acirc;y lan trong đồng nghiệp của c&aacute;c th&agrave;nh vi&ecirc;n gia đ&igrave;nh, c&aacute;c nh&acirc;n vi&ecirc;n y tế đ&atilde; điều trị cho gia đ&igrave;nh n&agrave;y. Nh&oacute;m chuy&ecirc;n gia tại Trung t&acirc;m kiểm so&aacute;t v&agrave; ph&ograve;ng ngừa dịch bệnh H&agrave;n Quốc (KCDC) đ&atilde; nghi&ecirc;n cứu nhằm ph&aacute;t hiện mầm bệnh, nguồn gốc v&agrave; c&aacute;c kỹ thuật x&eacute;t nghiệm. Tất cả những biện ph&aacute;p n&agrave;y sau đ&oacute; được ứng dụng v&agrave;o hiện thực Covid-19 ở H&agrave;n Quốc, sau khi một bệnh nh&acirc;n bị nghi nhiễm nCoV đầu ti&ecirc;n được ph&aacute;t hiện ng&agrave;y 20/1, t&agrave;i liệu cho hay.</p>\n\n<table align="center" border="0" cellpadding="3" cellspacing="0">\n	<tbody>\n		<tr>\n			<td><img alt="Binh sĩ Hàn Quốc mặc đồ bảo hộ đi khử trùng các tòa nhà hôm 15/3. Ảnh: Reuters." src="https://i-vnexpress.vnecdn.net/2020/03/30/korea-6176-1585550171.jpg" /></td>\n		</tr>\n		<tr>\n			<td>\n			<p>Binh sĩ H&agrave;n Quốc mặc đồ bảo hộ đi khử tr&ugrave;ng c&aacute;c t&ograve;a nh&agrave; h&ocirc;m 15/3. Ảnh:&nbsp;<em>Reuters.</em></p>\n			</td>\n		</tr>\n	</tbody>\n</table>\n\n<p>&quot;Nh&igrave;n lại trong 20 năm qua, con người bị tấn c&ocirc;ng nặng nề nhất bởi c&uacute;m hoặc virus corona, ch&uacute;ng ta đ&atilde; ứng ph&oacute; tương đối tốt với bệnh c&uacute;m nhưng lại lo lắng về khả năng b&ugrave;ng ph&aacute;t một loại virus corona mới&quot;, chuy&ecirc;n gia KCDC Lee Sang-won, một trong những người l&atilde;nh đạo cuộc diễn tập hồi th&aacute;ng 12 năm ngo&aacute;i của H&agrave;n Quốc, n&oacute;i.</p>\n\n<p>&quot;Đ&oacute; l&agrave; một dạng may mắn, ch&uacute;ng t&ocirc;i kh&ocirc;ng n&oacute;i n&ecirc;n lời khi thấy kịch bản đ&oacute; trở th&agrave;nh hiện thực&quot;, Lee n&oacute;i th&ecirc;m. &quot;Nhưng ch&iacute;nh cuộc diễn tập đ&atilde; gi&uacute;p ch&uacute;ng t&ocirc;i tiết kiệm thời gian để ph&aacute;t triển phương ph&aacute;p x&eacute;t nghiệm, x&aacute;c định c&aacute;c ca nhiễm Covid-19&quot;, &ocirc;ng n&oacute;i. Lee cho hay ngay sau cuộc diễn tập tr&ecirc;n, dịch Covid-19 đ&atilde; bắt đầu xuất hiện ở Vũ H&aacute;n, Trung Quốc v&agrave; trước khi Bắc Kinh c&ocirc;ng bố dịch bệnh, nh&oacute;m chuy&ecirc;n gia KCDC đ&atilde; sẵn s&agrave;ng cho việc x&eacute;t nghiệm.</p>\n\n<p>C&aacute;c chuy&ecirc;n gia đ&aacute;nh gi&aacute; cuộc diễn tập đ&oacute;ng một vai tr&ograve; quan trọng trong kiềm chế dịch bệnh l&acirc;y lan ở H&agrave;n Quốc. Ngay sau khi dịch bệnh b&ugrave;ng ph&aacute;t, H&agrave;n Quốc đ&atilde; tiến h&agrave;nh x&eacute;t nghiệm diện rộng trong v&agrave;i ng&agrave;y, r&agrave; so&aacute;t cả những người kh&ocirc;ng c&oacute; triệu chứng nhưng c&oacute; nguy cơ l&acirc;y nhiễm cho người kh&aacute;c, c&aacute;ch ly c&aacute;c bệnh nh&acirc;n đ&atilde; được x&aacute;c nhận mắc nhiễm v&agrave; theo d&otilde;i lịch sử li&ecirc;n lạc của họ.</p>\n\n<p>&quot;Ch&uacute;ng t&ocirc;i đ&atilde; l&agrave;m tốt chưa? T&ocirc;i kh&ocirc;ng biết nữa. Nhưng ch&uacute;ng t&ocirc;i kh&ocirc;ng muốn lặp lại những g&igrave; ch&uacute;ng t&ocirc;i từng trải qua năm 2015, phương ch&acirc;m của ch&uacute;ng t&ocirc;i l&agrave; &#39;kh&ocirc;ng bao giờ&#39;&quot;, Lee n&oacute;i, đề cập đến Hội chứng H&ocirc; hấp cấp Trung Đ&ocirc;ng (MERS) năm 2015.</p>', 9, 8, 8, NULL, NULL),
	(18, 1, 'BỆNH VIỆN ĐẠI HỌC TEIKYO', '20200403024217am2.2.4 Tac nghen phoi man tinh.jpg', '<p>dgfhjyghdfghsdfg vvvvvvvvvv</p>', 9, 1, 8, NULL, NULL);
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

-- Dumping data for table tintuc.roles: ~3 rows (approximately)
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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table tintuc.role_user: ~4 rows (approximately)
DELETE FROM `role_user`;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` (`id`, `user_id`, `role_id`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
	(16, 25, 3, 18, 18, '2020-03-12 08:52:08', '2020-03-12 08:52:08'),
	(33, 1, 1, 1, 1, '2020-03-13 04:06:00', '2020-03-13 04:06:00'),
	(36, 32, 3, 8, 8, '2020-03-29 14:49:07', '2020-03-29 14:49:07'),
	(38, 1, 2, 1, 1, '2020-04-03 03:54:39', '2020-04-03 03:54:39'),
	(39, 8, 1, 1, 1, '2020-04-03 04:54:20', '2020-04-03 04:54:20');
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

-- Dumping data for table tintuc.users: ~3 rows (approximately)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `avatar`, `username`, `email`, `email_verified_at`, `password`, `remember_token`, `updated_by`, `created_by`, `created_at`, `updated_at`) VALUES
	(1, 'nguyen', NULL, NULL, 'nguyen@gmail.com', NULL, '$2y$10$RDx2HUa/Fx7yoxHp6oStcu02Ts4.Wd/MxKtIau9jVBnnnE590TJBq', '353ZH1vkvICENzKly2zFWFtrL8AkQPbenIHZs7lI91mKJaip9MeEcDSWhZAz', 0, 0, '2020-03-11 15:34:08', '2020-03-30 02:21:16'),
	(8, 'tran ngoc hieu', NULL, NULL, 'vu97kt@gmail.com', NULL, '$2y$10$gNFP5rthtkqLlVsjYHFAa.aUseuS2rEI2a8M77E2Jw9IGxNAJMLeS', 'Rof6QhopduJLfdLDXhgDOUCjXEI7acukFF0YYfbmdQi1a9w3C4KlZmYBiQgS', 0, 0, '2020-03-11 17:10:57', '2020-03-30 09:47:56'),
	(32, 'nguyennd', NULL, NULL, 'nguyennd@gmail.com', NULL, '$2y$10$t.Adjqp86/AQgC0rXOhz7uvDUVflcgV9ye7uPfzHnz/mFDtNtgCC2', 'vR6ezWcKcFZ7EAmCJtyJHpiY1HSfPgBVkKfgmwheJJS2RIZBibHjj0vhHoQI', 0, 0, '2020-03-13 07:01:20', '2020-03-29 14:49:07');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
