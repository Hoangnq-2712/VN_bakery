-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2019 lúc 05:45 AM
-- Phiên bản máy phục vụ: 10.1.39-MariaDB
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `vnbakery`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `name`, `slug`, `image`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bánh kem dâu', 'banh-kem-dau', '/photos/1/Banner/banner1.jpg', 1, '2019-04-22 20:43:56', '2019-04-22 20:43:56'),
(3, 'Banner Chocolate', 'banner-chocolate', '/photos/1/Banner/banner2.jpg', 1, '2019-04-22 20:44:21', '2019-04-22 20:44:21'),
(4, 'Bánh kem sô cô la', 'banh-kem-so-co-la', '/photos/1/Banner/banner3.jpg', 1, '2019-04-22 20:44:38', '2019-04-22 20:44:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `slug` varchar(200) NOT NULL,
  `parent` int(10) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `parent`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Bánh Caramen', 'banh-caramen', 0, 1, '2019-04-03 07:12:25', '2019-04-03 07:12:25'),
(2, 'Bánh ngọt', 'banh-ngot', 0, 1, '2019-04-03 07:13:51', '2019-05-06 03:13:49'),
(4, 'Bánh cổ truyển', 'banh-co-truyen', 0, 1, '2019-04-03 08:03:44', '2019-05-06 08:11:15'),
(6, 'Bánh gato kem nen', 'banh-gato', 0, 1, '2019-04-03 08:04:22', '2019-04-03 13:12:06'),
(12, 'Bánh kem', 'banh-kem', 0, 1, '2019-04-03 20:04:49', '2019-05-06 08:11:28'),
(13, 'Bánh bông lan', 'banh-bong-lan', 0, 1, '2019-04-03 20:05:30', '2019-05-06 08:11:32');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `requested` varchar(200) NOT NULL,
  `status` tinyint(10) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `address`, `requested`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Quốc Hoàng', 'quochoang2712@gmail.com', '0313161325', 'Liêm Tuyền-Phủ Lý-Hà Nam', 'tôi muốn xin việc tại nhà hàng', 0, '2019-05-09 06:12:15', '2019-05-09 06:12:15'),
(2, 'Hoangnq', 'vanhop@gmail.com', '0313161324', 'Liêm Tuyền,Phủ Lý,Hà Nam', 'tôi muốn xin việc tại nhà hàng', 0, '2019-05-09 08:07:57', '2019-05-09 08:07:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` int(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `phone`, `address`, `email`, `note`, `created_at`, `updated_at`) VALUES
(12, 'Nguyễn Quốc Hoàng', 343161325, 'Liêm Tuyền-Phủ Lý-Hà Nam', 'quochoang2712@gmail.com', 'Giao hàng sớm nhất cho tôi!', '2019-05-09 04:53:04', '2019-05-10 02:55:56'),
(13, 'Hợp le', 313161324, 'Liêm Tuyền-Phủ Lý-Hà Nam', 'thainguyen@gmail.com', 'giao hàng nhanh', '2019-05-10 20:09:02', '2019-05-10 20:09:02'),
(14, 'Hợp le', 313161324, 'Liêm Tuyền-Phủ Lý-Hà Nam', 'thainguyen@gmail.com', 'giao hàng nhanh', '2019-05-10 20:14:43', '2019-05-10 20:14:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) NOT NULL,
  `customer_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `total` int(100) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `payment` int(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `customer_id`, `amount`, `total`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(10, 12, 2, 475000, 0, 0, '2019-05-08 17:00:00', '2019-05-10 04:03:58'),
(11, 13, 0, 0, 0, 0, '2019-05-10 17:00:00', '2019-05-10 20:09:02'),
(12, 14, 0, 0, 0, 0, '2019-05-10 17:00:00', '2019-05-10 20:14:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(10) NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(10, 10, 7, 1, 395000, '2019-05-09 04:53:04', '2019-05-09 04:53:04'),
(11, 10, 6, 1, 80000, '2019-05-09 04:53:04', '2019-05-09 04:53:04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `post`
--

CREATE TABLE `post` (
  `id` int(10) NOT NULL,
  `title` varchar(200) NOT NULL,
  `creator` varchar(100) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(200) NOT NULL,
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `post`
--

INSERT INTO `post` (`id`, `title`, `creator`, `content`, `slug`, `image`, `body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NHỮNG ĐỒ ĂN TƯỞNG BÉO MÀ LẠI TỐT CHO SỨC KHỎE', 'Mr.Sói Tuyết', '<p>Nếu ăn đ&uacute;ng c&aacute;ch, pizza, kem hay cappuccino sẽ kh&ocirc;ng c&ograve;n l&agrave; m&oacute;n g&acirc;y tăng c&acirc;n nữa teen nh&eacute;.</p>', 'nhung-do-an-tuong-beo-ma-lai-tot-cho-suc-khoe', '/photos/1/Post/new_01.jpg', '<p>Nếu ăn đ&uacute;ng c&aacute;ch, pizza, kem hay cappuccino sẽ kh&ocirc;ng c&ograve;n l&agrave; m&oacute;n g&acirc;y tăng c&acirc;n nữa teen nh&eacute;.</p>\r\n<p class=\"Normal\"><strong>1. Pizza</strong></p>\r\n<p class=\"Normal\">C&oacute; hai c&aacute;ch chế biến pizza: một l&agrave; kh&ocirc;ng c&oacute; lợi cho sức khỏe (với rất nhiều thịt, ph&ocirc;-mai v&agrave; bơ), hai l&agrave; tốt cho sức khỏe với nhiều rau.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a1-2983-1419585124.jpg\" /><br />Trung b&igrave;nh, một miếng pizza bao gồm 285 calo. C&ugrave;ng với một ch&uacute;t salad, một &iacute;t hoa quả, bạn đ&atilde; c&oacute; bữa trưa đầy đủ dinh dưỡng. Đặc biệt, thực đơn tr&ecirc;n c&ograve;n cung cấp khoảng 20% lượng canxi, protein cần thiết cho cả ng&agrave;y. Tuy nhi&ecirc;n, pizza vẫn l&agrave; lựa chọn nhiều chất b&eacute;o, teen hạn chế chỉ n&ecirc;n ăn 1 lần/tuần th&ocirc;i nh&eacute; v&agrave; n&ecirc;n d&ugrave;ng với rau xanh.<br /><br />\r\n<p class=\"Normal\"><strong>2. Kem</strong></p>\r\n<p class=\"Normal\">Bạn lo lắng về lượng calo giữa c&aacute;c m&oacute;n m&igrave;nh ăn mỗi ng&agrave;y? Vậy h&atilde;y so s&aacute;nh giữa kem v&agrave; sữa chua để lạnh nh&eacute;! Sự kh&aacute;c nhau kh&ocirc;ng qu&aacute; c&aacute;ch biệt, chủ yếu dựa tr&ecirc;n lượng chất b&eacute;o va đường. Kem b&eacute;o hơn, tuy nhi&ecirc;n sữa chua lại nhiều đường hơn.</p>\r\n<div>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a2-2298-1419585124_9c4d2176-5fa1-4d27-4f47-d38b682252c7.jpg\" /></div>\r\n<br /><br />Vậy teen n&ecirc;n ăn kem như thế n&agrave;o? N&ecirc;n giảm một nửa số lượng như mong muốn v&agrave; kh&ocirc;ng cho th&ecirc;m những &ldquo;phụ kiện&rdquo; si&ecirc;u ngọt đi k&egrave;m. Ngo&agrave;i ra, bạn để &yacute; chọn thương hiệu kem l&agrave;m từ c&agrave;ng &iacute;t nguy&ecirc;n liệu c&agrave;ng tốt.<br /><br />\r\n<p class=\"Normal\"><strong>3. Khoai t&acirc;y</strong></p>\r\n<p class=\"Normal\">Khoai t&acirc;y thường bị hiểu lầm xếp đồng hạng với những thực phẩm trắng kh&aacute;c như c&aacute;c loại ngũ cốc. Tr&ecirc;n thực tế khoai t&acirc;y gi&agrave;u dinh dưỡng cần thiết như vitamin C (cung cấp 70% lượng vitamin C cần thiết mỗi ng&agrave;y), kali v&agrave; magie, gi&uacute;p ổn định huyết &aacute;p, giảm chứng đầy bụng v&agrave; hỗ trợ hoạt động cơ bắp.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a3-2750-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><br />Điều đ&aacute;ng n&oacute;i l&agrave; teen n&ecirc;n chọn c&aacute;ch chế biến nướng khoai t&acirc;y, hơn l&agrave; chi&ecirc;n để giảm tối đa lượng dầu mỡ, chất b&eacute;o.<br /><strong>4. Chocolate<br /><br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a4-9222-1419585125.jpg\" /></div>\r\n<p class=\"Normal\">&nbsp;</p>\r\n<p class=\"Normal\">C&oacute; v&ocirc; v&agrave;n l&yacute; do để teen chọn chocolate, v&igrave; gi&agrave;u chất flavanoids, chất chống &ocirc;-xy h&oacute;a bảo vệ tế b&agrave;o khỏi bị hủy hoại, th&uacute;c đẩy hệ miễn dịch. Hơn nữa, c&oacute; nghi&ecirc;n cứu khoa học đ&atilde; chỉ ra rằng, chocolate c&ograve;n gi&uacute;p hạ chỉ số cơ thể, hạn chế việc tăng c&acirc;n do ăn những m&oacute;n c&oacute; lượng calo cao. Teen lưu &yacute; chọn loại chocolate c&oacute; lượng cacao &iacute;t nhất l&agrave; 65% để mang lại lợi &iacute;ch lớn nhất cho sức khỏe.</p>\r\n<p class=\"Normal\"><strong>5. Cappuccino<br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a5-6171-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><strong><br /><br />Cappuccino thường bị gắn m&aacute;c l&agrave; đồ uống g&acirc;y tăng c&acirc;n v&igrave; chứa nhiều calo v&agrave; đường. Tuy nhi&ecirc;n, nếu d&ugrave;ng đ&uacute;ng c&aacute;ch, đ&oacute; l&agrave; lựa chọn tốt cho sức khỏe. Cụ thể, phần bọt ở tr&ecirc;n n&ecirc;n cắt giảm lượng sữa, nếu kh&ocirc;ng chỉ 340 gram cappuccino đ&atilde; chứa tới 110 calo.</strong></p>\r\n</div>\r\n</div>', 1, '2019-04-18 06:13:29', '2019-04-18 08:10:47'),
(3, 'Shushi và những lợi ích bất ngờ', 'Mr.Sói_Rừng', '<p>Sushi l&agrave; một m&oacute;n ăn truyền thống của người Nhật v&agrave; đ&atilde; được phổ biến ở rất nhiều quốc gia tr&ecirc;n thế giới. Nhờ v&agrave;o nguồn dinh dưỡng phong ph&uacute;, tốt cho sức khỏe, hương vị hấp dẫn, c&aacute;ch tr&igrave;nh b&agrave;y đẹp mắt, m&oacute;n ăn n&agrave;y đ&atilde;&nbsp;</p>', 'shushi-va-nhung-loi-ich-bat-ngo', '/photos/1/Post/new_04.jpg', '<p>Nếu ăn đ&uacute;ng c&aacute;ch, pizza, kem hay cappuccino sẽ kh&ocirc;ng c&ograve;n l&agrave; m&oacute;n g&acirc;y tăng c&acirc;n nữa teen nh&eacute;.</p>\r\n<p class=\"Normal\"><strong>1. Pizza</strong></p>\r\n<p class=\"Normal\">C&oacute; hai c&aacute;ch chế biến pizza: một l&agrave; kh&ocirc;ng c&oacute; lợi cho sức khỏe (với rất nhiều thịt, ph&ocirc;-mai v&agrave; bơ), hai l&agrave; tốt cho sức khỏe với nhiều rau.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a1-2983-1419585124.jpg\" /><br />Trung b&igrave;nh, một miếng pizza bao gồm 285 calo. C&ugrave;ng với một ch&uacute;t salad, một &iacute;t hoa quả, bạn đ&atilde; c&oacute; bữa trưa đầy đủ dinh dưỡng. Đặc biệt, thực đơn tr&ecirc;n c&ograve;n cung cấp khoảng 20% lượng canxi, protein cần thiết cho cả ng&agrave;y. Tuy nhi&ecirc;n, pizza vẫn l&agrave; lựa chọn nhiều chất b&eacute;o, teen hạn chế chỉ n&ecirc;n ăn 1 lần/tuần th&ocirc;i nh&eacute; v&agrave; n&ecirc;n d&ugrave;ng với rau xanh.<br /><br />\r\n<p class=\"Normal\"><strong>2. Kem</strong></p>\r\n<p class=\"Normal\">Bạn lo lắng về lượng calo giữa c&aacute;c m&oacute;n m&igrave;nh ăn mỗi ng&agrave;y? Vậy h&atilde;y so s&aacute;nh giữa kem v&agrave; sữa chua để lạnh nh&eacute;! Sự kh&aacute;c nhau kh&ocirc;ng qu&aacute; c&aacute;ch biệt, chủ yếu dựa tr&ecirc;n lượng chất b&eacute;o va đường. Kem b&eacute;o hơn, tuy nhi&ecirc;n sữa chua lại nhiều đường hơn.</p>\r\n<div>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a2-2298-1419585124_9c4d2176-5fa1-4d27-4f47-d38b682252c7.jpg\" /></div>\r\n<br /><br />Vậy teen n&ecirc;n ăn kem như thế n&agrave;o? N&ecirc;n giảm một nửa số lượng như mong muốn v&agrave; kh&ocirc;ng cho th&ecirc;m những &ldquo;phụ kiện&rdquo; si&ecirc;u ngọt đi k&egrave;m. Ngo&agrave;i ra, bạn để &yacute; chọn thương hiệu kem l&agrave;m từ c&agrave;ng &iacute;t nguy&ecirc;n liệu c&agrave;ng tốt.<br /><br />\r\n<p class=\"Normal\"><strong>3. Khoai t&acirc;y</strong></p>\r\n<p class=\"Normal\">Khoai t&acirc;y thường bị hiểu lầm xếp đồng hạng với những thực phẩm trắng kh&aacute;c như c&aacute;c loại ngũ cốc. Tr&ecirc;n thực tế khoai t&acirc;y gi&agrave;u dinh dưỡng cần thiết như vitamin C (cung cấp 70% lượng vitamin C cần thiết mỗi ng&agrave;y), kali v&agrave; magie, gi&uacute;p ổn định huyết &aacute;p, giảm chứng đầy bụng v&agrave; hỗ trợ hoạt động cơ bắp.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a3-2750-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><br />Điều đ&aacute;ng n&oacute;i l&agrave; teen n&ecirc;n chọn c&aacute;ch chế biến nướng khoai t&acirc;y, hơn l&agrave; chi&ecirc;n để giảm tối đa lượng dầu mỡ, chất b&eacute;o.<br /><strong>4. Chocolate<br /><br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a4-9222-1419585125.jpg\" /></div>\r\n<p class=\"Normal\">&nbsp;</p>\r\n<p class=\"Normal\">C&oacute; v&ocirc; v&agrave;n l&yacute; do để teen chọn chocolate, v&igrave; gi&agrave;u chất flavanoids, chất chống &ocirc;-xy h&oacute;a bảo vệ tế b&agrave;o khỏi bị hủy hoại, th&uacute;c đẩy hệ miễn dịch. Hơn nữa, c&oacute; nghi&ecirc;n cứu khoa học đ&atilde; chỉ ra rằng, chocolate c&ograve;n gi&uacute;p hạ chỉ số cơ thể, hạn chế việc tăng c&acirc;n do ăn những m&oacute;n c&oacute; lượng calo cao. Teen lưu &yacute; chọn loại chocolate c&oacute; lượng cacao &iacute;t nhất l&agrave; 65% để mang lại lợi &iacute;ch lớn nhất cho sức khỏe.</p>\r\n<p class=\"Normal\"><strong>5. Cappuccino<br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a5-6171-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><strong><br /><br />Cappuccino thường bị gắn m&aacute;c l&agrave; đồ uống g&acirc;y tăng c&acirc;n v&igrave; chứa nhiều calo v&agrave; đường. Tuy nhi&ecirc;n, nếu d&ugrave;ng đ&uacute;ng c&aacute;ch, đ&oacute; l&agrave; lựa chọn tốt cho sức khỏe. Cụ thể, phần bọt ở tr&ecirc;n n&ecirc;n cắt giảm lượng sữa, nếu kh&ocirc;ng chỉ 340 gram cappuccino đ&atilde; chứa tới 110 calo.</strong></p>\r\n</div>\r\n</div>', 1, '2019-04-18 07:06:05', '2019-04-18 15:26:39'),
(4, 'Những món ăn đốn tim du khách tại hội chợ lâu đời nhất', 'Kha\'zix', '<p>Chợ nằm ở điểm giao của c&aacute;c con phố Trần Ph&uacute;, Bạch Đằng v&agrave; Nguyễn Th&aacute;i Học, ngay trung t&acirc;m phố cổ. Bạn chỉ mất v&agrave;i ph&uacute;t tản bộ l&agrave; c&oacute; thể đến với khu chợ n&agrave;y v&agrave; thưởng thức những m&oacute;n ăn đường phố đặc trưng&nbsp;</p>', 'nhung-mon-an-don-tim-du-khach-tai-hoi-cho-lau-doi-nhat', '/photos/1/Post/new_05.jpg', '<p>Nếu ăn đ&uacute;ng c&aacute;ch, pizza, kem hay cappuccino sẽ kh&ocirc;ng c&ograve;n l&agrave; m&oacute;n g&acirc;y tăng c&acirc;n nữa teen nh&eacute;.</p>\r\n<p class=\"Normal\"><strong>1. Pizza</strong></p>\r\n<p class=\"Normal\">C&oacute; hai c&aacute;ch chế biến pizza: một l&agrave; kh&ocirc;ng c&oacute; lợi cho sức khỏe (với rất nhiều thịt, ph&ocirc;-mai v&agrave; bơ), hai l&agrave; tốt cho sức khỏe với nhiều rau.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a1-2983-1419585124.jpg\" /><br />Trung b&igrave;nh, một miếng pizza bao gồm 285 calo. C&ugrave;ng với một ch&uacute;t salad, một &iacute;t hoa quả, bạn đ&atilde; c&oacute; bữa trưa đầy đủ dinh dưỡng. Đặc biệt, thực đơn tr&ecirc;n c&ograve;n cung cấp khoảng 20% lượng canxi, protein cần thiết cho cả ng&agrave;y. Tuy nhi&ecirc;n, pizza vẫn l&agrave; lựa chọn nhiều chất b&eacute;o, teen hạn chế chỉ n&ecirc;n ăn 1 lần/tuần th&ocirc;i nh&eacute; v&agrave; n&ecirc;n d&ugrave;ng với rau xanh.<br /><br />\r\n<p class=\"Normal\"><strong>2. Kem</strong></p>\r\n<p class=\"Normal\">Bạn lo lắng về lượng calo giữa c&aacute;c m&oacute;n m&igrave;nh ăn mỗi ng&agrave;y? Vậy h&atilde;y so s&aacute;nh giữa kem v&agrave; sữa chua để lạnh nh&eacute;! Sự kh&aacute;c nhau kh&ocirc;ng qu&aacute; c&aacute;ch biệt, chủ yếu dựa tr&ecirc;n lượng chất b&eacute;o va đường. Kem b&eacute;o hơn, tuy nhi&ecirc;n sữa chua lại nhiều đường hơn.</p>\r\n<div>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a2-2298-1419585124_9c4d2176-5fa1-4d27-4f47-d38b682252c7.jpg\" /></div>\r\n<br /><br />Vậy teen n&ecirc;n ăn kem như thế n&agrave;o? N&ecirc;n giảm một nửa số lượng như mong muốn v&agrave; kh&ocirc;ng cho th&ecirc;m những &ldquo;phụ kiện&rdquo; si&ecirc;u ngọt đi k&egrave;m. Ngo&agrave;i ra, bạn để &yacute; chọn thương hiệu kem l&agrave;m từ c&agrave;ng &iacute;t nguy&ecirc;n liệu c&agrave;ng tốt.<br /><br />\r\n<p class=\"Normal\"><strong>3. Khoai t&acirc;y</strong></p>\r\n<p class=\"Normal\">Khoai t&acirc;y thường bị hiểu lầm xếp đồng hạng với những thực phẩm trắng kh&aacute;c như c&aacute;c loại ngũ cốc. Tr&ecirc;n thực tế khoai t&acirc;y gi&agrave;u dinh dưỡng cần thiết như vitamin C (cung cấp 70% lượng vitamin C cần thiết mỗi ng&agrave;y), kali v&agrave; magie, gi&uacute;p ổn định huyết &aacute;p, giảm chứng đầy bụng v&agrave; hỗ trợ hoạt động cơ bắp.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a3-2750-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><br />Điều đ&aacute;ng n&oacute;i l&agrave; teen n&ecirc;n chọn c&aacute;ch chế biến nướng khoai t&acirc;y, hơn l&agrave; chi&ecirc;n để giảm tối đa lượng dầu mỡ, chất b&eacute;o.<br /><strong>4. Chocolate<br /><br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a4-9222-1419585125.jpg\" /></div>\r\n<p class=\"Normal\">&nbsp;</p>\r\n<p class=\"Normal\">C&oacute; v&ocirc; v&agrave;n l&yacute; do để teen chọn chocolate, v&igrave; gi&agrave;u chất flavanoids, chất chống &ocirc;-xy h&oacute;a bảo vệ tế b&agrave;o khỏi bị hủy hoại, th&uacute;c đẩy hệ miễn dịch. Hơn nữa, c&oacute; nghi&ecirc;n cứu khoa học đ&atilde; chỉ ra rằng, chocolate c&ograve;n gi&uacute;p hạ chỉ số cơ thể, hạn chế việc tăng c&acirc;n do ăn những m&oacute;n c&oacute; lượng calo cao. Teen lưu &yacute; chọn loại chocolate c&oacute; lượng cacao &iacute;t nhất l&agrave; 65% để mang lại lợi &iacute;ch lớn nhất cho sức khỏe.</p>\r\n<p class=\"Normal\"><strong>5. Cappuccino<br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a5-6171-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><strong><br /><br />Cappuccino thường bị gắn m&aacute;c l&agrave; đồ uống g&acirc;y tăng c&acirc;n v&igrave; chứa nhiều calo v&agrave; đường. Tuy nhi&ecirc;n, nếu d&ugrave;ng đ&uacute;ng c&aacute;ch, đ&oacute; l&agrave; lựa chọn tốt cho sức khỏe. Cụ thể, phần bọt ở tr&ecirc;n n&ecirc;n cắt giảm lượng sữa, nếu kh&ocirc;ng chỉ 340 gram cappuccino đ&atilde; chứa tới 110 calo.</strong></p>\r\n</div>\r\n</div>', 1, '2019-04-18 07:12:20', '2019-04-18 15:27:43'),
(5, 'Tìm hiểu về những điều thú vị của Cappuchino', 'LeeSin', '<p>Cappuccino l&agrave; g&igrave;? Cappcuccino l&agrave; loại caf&eacute; đ&atilde; qu&aacute; quen thuộc với người d&acirc;n to&agrave;n thế giới. Vậy bạn c&oacute; biết Cappuccino xuất xứ từ đ&acirc;u, được pha chế như thế n&agrave;o v&agrave; v&igrave; sao c&oacute; thể chinh phục cả thế giới?</p>', 'tim-hieu-ve-nhung-dieu-thu-vi-cua-cappuchino', '/photos/1/Post/1530581874new_08.jpeg', '<p>Nếu ăn đ&uacute;ng c&aacute;ch, pizza, kem hay cappuccino sẽ kh&ocirc;ng c&ograve;n l&agrave; m&oacute;n g&acirc;y tăng c&acirc;n nữa teen nh&eacute;.</p>\r\n<p class=\"Normal\"><strong>1. Pizza</strong></p>\r\n<p class=\"Normal\">C&oacute; hai c&aacute;ch chế biến pizza: một l&agrave; kh&ocirc;ng c&oacute; lợi cho sức khỏe (với rất nhiều thịt, ph&ocirc;-mai v&agrave; bơ), hai l&agrave; tốt cho sức khỏe với nhiều rau.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a1-2983-1419585124.jpg\" /><br />Trung b&igrave;nh, một miếng pizza bao gồm 285 calo. C&ugrave;ng với một ch&uacute;t salad, một &iacute;t hoa quả, bạn đ&atilde; c&oacute; bữa trưa đầy đủ dinh dưỡng. Đặc biệt, thực đơn tr&ecirc;n c&ograve;n cung cấp khoảng 20% lượng canxi, protein cần thiết cho cả ng&agrave;y. Tuy nhi&ecirc;n, pizza vẫn l&agrave; lựa chọn nhiều chất b&eacute;o, teen hạn chế chỉ n&ecirc;n ăn 1 lần/tuần th&ocirc;i nh&eacute; v&agrave; n&ecirc;n d&ugrave;ng với rau xanh.<br /><br />\r\n<p class=\"Normal\"><strong>2. Kem</strong></p>\r\n<p class=\"Normal\">Bạn lo lắng về lượng calo giữa c&aacute;c m&oacute;n m&igrave;nh ăn mỗi ng&agrave;y? Vậy h&atilde;y so s&aacute;nh giữa kem v&agrave; sữa chua để lạnh nh&eacute;! Sự kh&aacute;c nhau kh&ocirc;ng qu&aacute; c&aacute;ch biệt, chủ yếu dựa tr&ecirc;n lượng chất b&eacute;o va đường. Kem b&eacute;o hơn, tuy nhi&ecirc;n sữa chua lại nhiều đường hơn.</p>\r\n<div>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a2-2298-1419585124_9c4d2176-5fa1-4d27-4f47-d38b682252c7.jpg\" /></div>\r\n<br /><br />Vậy teen n&ecirc;n ăn kem như thế n&agrave;o? N&ecirc;n giảm một nửa số lượng như mong muốn v&agrave; kh&ocirc;ng cho th&ecirc;m những &ldquo;phụ kiện&rdquo; si&ecirc;u ngọt đi k&egrave;m. Ngo&agrave;i ra, bạn để &yacute; chọn thương hiệu kem l&agrave;m từ c&agrave;ng &iacute;t nguy&ecirc;n liệu c&agrave;ng tốt.<br /><br />\r\n<p class=\"Normal\"><strong>3. Khoai t&acirc;y</strong></p>\r\n<p class=\"Normal\">Khoai t&acirc;y thường bị hiểu lầm xếp đồng hạng với những thực phẩm trắng kh&aacute;c như c&aacute;c loại ngũ cốc. Tr&ecirc;n thực tế khoai t&acirc;y gi&agrave;u dinh dưỡng cần thiết như vitamin C (cung cấp 70% lượng vitamin C cần thiết mỗi ng&agrave;y), kali v&agrave; magie, gi&uacute;p ổn định huyết &aacute;p, giảm chứng đầy bụng v&agrave; hỗ trợ hoạt động cơ bắp.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a3-2750-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><br />Điều đ&aacute;ng n&oacute;i l&agrave; teen n&ecirc;n chọn c&aacute;ch chế biến nướng khoai t&acirc;y, hơn l&agrave; chi&ecirc;n để giảm tối đa lượng dầu mỡ, chất b&eacute;o.<br /><strong>4. Chocolate<br /><br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a4-9222-1419585125.jpg\" /></div>\r\n<p class=\"Normal\">&nbsp;</p>\r\n<p class=\"Normal\">C&oacute; v&ocirc; v&agrave;n l&yacute; do để teen chọn chocolate, v&igrave; gi&agrave;u chất flavanoids, chất chống &ocirc;-xy h&oacute;a bảo vệ tế b&agrave;o khỏi bị hủy hoại, th&uacute;c đẩy hệ miễn dịch. Hơn nữa, c&oacute; nghi&ecirc;n cứu khoa học đ&atilde; chỉ ra rằng, chocolate c&ograve;n gi&uacute;p hạ chỉ số cơ thể, hạn chế việc tăng c&acirc;n do ăn những m&oacute;n c&oacute; lượng calo cao. Teen lưu &yacute; chọn loại chocolate c&oacute; lượng cacao &iacute;t nhất l&agrave; 65% để mang lại lợi &iacute;ch lớn nhất cho sức khỏe.</p>\r\n<p class=\"Normal\"><strong>5. Cappuccino<br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a5-6171-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><strong><br /><br />Cappuccino thường bị gắn m&aacute;c l&agrave; đồ uống g&acirc;y tăng c&acirc;n v&igrave; chứa nhiều calo v&agrave; đường. Tuy nhi&ecirc;n, nếu d&ugrave;ng đ&uacute;ng c&aacute;ch, đ&oacute; l&agrave; lựa chọn tốt cho sức khỏe. Cụ thể, phần bọt ở tr&ecirc;n n&ecirc;n cắt giảm lượng sữa, nếu kh&ocirc;ng chỉ 340 gram cappuccino đ&atilde; chứa tới 110 calo.</strong></p>\r\n</div>\r\n</div>', 1, '2019-04-18 07:15:09', '2019-04-18 15:27:15'),
(6, '8 món ăn vặt giải nhiệt cho mùa hè Hà Nội', 'Malphite', '<p>Điểm danh những m&oacute;n ăn vặt được giới trẻ H&agrave; th&agrave;nh ưu chuộng trong những ng&agrave;y h&egrave; n&oacute;ng bức. Bạn th&iacute;ch m&oacute;n n&agrave;o nhất?</p>', '8-mon-an-vat-giai-nhiet-cho-mua-he-ha-noi', '/photos/1/Post/1.3.jpg', '<p>Nếu ăn đ&uacute;ng c&aacute;ch, pizza, kem hay cappuccino sẽ kh&ocirc;ng c&ograve;n l&agrave; m&oacute;n g&acirc;y tăng c&acirc;n nữa teen nh&eacute;.</p>\r\n<p class=\"Normal\"><strong>1. Pizza</strong></p>\r\n<p class=\"Normal\">C&oacute; hai c&aacute;ch chế biến pizza: một l&agrave; kh&ocirc;ng c&oacute; lợi cho sức khỏe (với rất nhiều thịt, ph&ocirc;-mai v&agrave; bơ), hai l&agrave; tốt cho sức khỏe với nhiều rau.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a1-2983-1419585124.jpg\" /><br />Trung b&igrave;nh, một miếng pizza bao gồm 285 calo. C&ugrave;ng với một ch&uacute;t salad, một &iacute;t hoa quả, bạn đ&atilde; c&oacute; bữa trưa đầy đủ dinh dưỡng. Đặc biệt, thực đơn tr&ecirc;n c&ograve;n cung cấp khoảng 20% lượng canxi, protein cần thiết cho cả ng&agrave;y. Tuy nhi&ecirc;n, pizza vẫn l&agrave; lựa chọn nhiều chất b&eacute;o, teen hạn chế chỉ n&ecirc;n ăn 1 lần/tuần th&ocirc;i nh&eacute; v&agrave; n&ecirc;n d&ugrave;ng với rau xanh.<br /><br />\r\n<p class=\"Normal\"><strong>2. Kem</strong></p>\r\n<p class=\"Normal\">Bạn lo lắng về lượng calo giữa c&aacute;c m&oacute;n m&igrave;nh ăn mỗi ng&agrave;y? Vậy h&atilde;y so s&aacute;nh giữa kem v&agrave; sữa chua để lạnh nh&eacute;! Sự kh&aacute;c nhau kh&ocirc;ng qu&aacute; c&aacute;ch biệt, chủ yếu dựa tr&ecirc;n lượng chất b&eacute;o va đường. Kem b&eacute;o hơn, tuy nhi&ecirc;n sữa chua lại nhiều đường hơn.</p>\r\n<div>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a2-2298-1419585124_9c4d2176-5fa1-4d27-4f47-d38b682252c7.jpg\" /></div>\r\n<br /><br />Vậy teen n&ecirc;n ăn kem như thế n&agrave;o? N&ecirc;n giảm một nửa số lượng như mong muốn v&agrave; kh&ocirc;ng cho th&ecirc;m những &ldquo;phụ kiện&rdquo; si&ecirc;u ngọt đi k&egrave;m. Ngo&agrave;i ra, bạn để &yacute; chọn thương hiệu kem l&agrave;m từ c&agrave;ng &iacute;t nguy&ecirc;n liệu c&agrave;ng tốt.<br /><br />\r\n<p class=\"Normal\"><strong>3. Khoai t&acirc;y</strong></p>\r\n<p class=\"Normal\">Khoai t&acirc;y thường bị hiểu lầm xếp đồng hạng với những thực phẩm trắng kh&aacute;c như c&aacute;c loại ngũ cốc. Tr&ecirc;n thực tế khoai t&acirc;y gi&agrave;u dinh dưỡng cần thiết như vitamin C (cung cấp 70% lượng vitamin C cần thiết mỗi ng&agrave;y), kali v&agrave; magie, gi&uacute;p ổn định huyết &aacute;p, giảm chứng đầy bụng v&agrave; hỗ trợ hoạt động cơ bắp.</p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a3-2750-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><br />Điều đ&aacute;ng n&oacute;i l&agrave; teen n&ecirc;n chọn c&aacute;ch chế biến nướng khoai t&acirc;y, hơn l&agrave; chi&ecirc;n để giảm tối đa lượng dầu mỡ, chất b&eacute;o.<br /><strong>4. Chocolate<br /><br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a4-9222-1419585125.jpg\" /></div>\r\n<p class=\"Normal\">&nbsp;</p>\r\n<p class=\"Normal\">C&oacute; v&ocirc; v&agrave;n l&yacute; do để teen chọn chocolate, v&igrave; gi&agrave;u chất flavanoids, chất chống &ocirc;-xy h&oacute;a bảo vệ tế b&agrave;o khỏi bị hủy hoại, th&uacute;c đẩy hệ miễn dịch. Hơn nữa, c&oacute; nghi&ecirc;n cứu khoa học đ&atilde; chỉ ra rằng, chocolate c&ograve;n gi&uacute;p hạ chỉ số cơ thể, hạn chế việc tăng c&acirc;n do ăn những m&oacute;n c&oacute; lượng calo cao. Teen lưu &yacute; chọn loại chocolate c&oacute; lượng cacao &iacute;t nhất l&agrave; 65% để mang lại lợi &iacute;ch lớn nhất cho sức khỏe.</p>\r\n<p class=\"Normal\"><strong>5. Cappuccino<br /></strong></p>\r\n<div><img src=\"https://hstatic.net/911/1000036911/10/2015/9-10/a5-6171-1419585125.jpg\" /></div>\r\n<p class=\"Normal\"><strong><br /><br /></strong>Cappuccino thường bị gắn m&aacute;c l&agrave; đồ uống g&acirc;y tăng c&acirc;n v&igrave; chứa nhiều calo v&agrave; đường. Tuy nhi&ecirc;n, nếu d&ugrave;ng đ&uacute;ng c&aacute;ch, đ&oacute; l&agrave; lựa chọn tốt cho sức khỏe. Cụ thể, phần bọt ở tr&ecirc;n n&ecirc;n cắt giảm lượng sữa, nếu kh&ocirc;ng chỉ 340 gram cappuccino đ&atilde; chứa tới 110 calo.</p>\r\n</div>\r\n</div>', 1, '2019-04-18 07:18:20', '2019-04-18 15:28:13');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `slug` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `category_id` int(10) NOT NULL,
  `price` int(20) NOT NULL,
  `sale_price` int(20) NOT NULL,
  `description` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `slug`, `category_id`, `price`, `sale_price`, `description`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Bánh gato', '/photos/1/Product/2.4.jpg', 'banh-gato', 2, 120000, 90000, '<p>Gi&aacute; rẻ hợp l&yacute; chất lượng đảm bảo,quy tr&igrave;nh sản xuất hợp vệ sinh an to&agrave;n thực phẩm!</p>', 1, '2019-05-02 18:26:56', '2019-05-03 14:32:40'),
(3, 'Kem lạnh', '/photos/1/Product/bbq.5.jpeg', 'kem-lanh', 12, 120000, 100000, '<p>kem lạnh ăn ngon tuyệt vời chất lượng đảm bảo vệ sinh an to&agrave;n thực phẩm!</p>', 1, '2019-05-02 18:33:28', '2019-05-03 14:40:26'),
(4, 'capuchino', '/photos/1/Product/1530581874new_08.jpeg', 'capuchino', 2, 120000, 0, '<p>gi&aacute; rẻ bất ngờ!</p>', 1, '2019-05-03 07:14:56', '2019-05-03 07:14:56'),
(5, 'Nước ép trái cây', '/photos/1/Product/3.1.png', 'nuoc-ep-trai-cay', 2, 120000, 80000, '<p>gi&aacute; rẻ!</p>', 1, '2019-05-03 08:08:38', '2019-05-03 08:08:38'),
(6, 'Bánh bơ chiên', '/photos/1/Product/4.2.jpeg', 'banh-bo-chien', 2, 120000, 80000, '<p>H&atilde;y đến v&agrave; lựa chọn ngay để mua được những sản phẩm giảm gi&aacute; tốt nhất!</p>', 2, '2019-05-05 02:49:03', '2019-05-05 02:49:03'),
(7, 'Bánh bông lan', '/photos/1/Product/noodle.6.jpeg', 'banh-bong-lan', 2, 500000, 395000, '<p>Sản phẩm của VN CAKE tập trung v&agrave;o chất lượng!</p>', 1, '2019-05-05 03:04:55', '2019-05-05 03:04:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productimage`
--

CREATE TABLE `productimage` (
  `id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `productimage`
--

INSERT INTO `productimage` (`id`, `product_id`, `link`, `created_at`, `updated_at`) VALUES
(1, 1, '/photos/1/Product/1.1.jpg', '2019-05-02 09:08:00', '2019-05-02 09:08:00'),
(2, 1, '/photos/1/Product/1.1.jpg', '2019-05-02 09:08:00', '2019-05-02 09:08:00'),
(3, 1, '/photos/1/Product/1.2.jpg', '2019-05-02 09:08:00', '2019-05-02 09:08:00'),
(4, 1, '/photos/1/Product/2.1.jpeg', '2019-05-02 09:08:01', '2019-05-02 09:08:01'),
(5, 1, '/photos/1/Product/1530581874new_08.jpeg', '2019-05-02 09:08:01', '2019-05-02 09:08:01'),
(6, 2, '/photos/1/Product/2.1.jpeg', '2019-05-03 01:26:56', '2019-05-03 01:26:56'),
(7, 2, '/photos/1/Product/4.4.jpeg', '2019-05-03 01:26:56', '2019-05-03 01:26:56'),
(8, 2, '/photos/1/Product/bbq.1.jpeg', '2019-05-03 01:26:56', '2019-05-03 01:26:56'),
(9, 2, '/photos/1/Product/2.2.png', '2019-05-03 01:26:56', '2019-05-03 01:26:56'),
(10, 2, '/photos/1/Product/4.4.jpeg', '2019-05-03 01:26:56', '2019-05-03 01:26:56'),
(11, 3, '/photos/1/Product/3.jpg', '2019-05-03 01:33:28', '2019-05-03 01:33:28'),
(12, 3, '/photos/1/Product/1.3.jpg', '2019-05-03 01:33:28', '2019-05-03 01:33:28'),
(13, 3, '/photos/1/Product/bbq.4.jpeg', '2019-05-03 01:33:28', '2019-05-03 01:33:28'),
(14, 3, '/photos/1/Product/kimchi-fried-rice-fried-rice-rice-korean-53121.jpeg', '2019-05-03 01:33:28', '2019-05-03 01:33:28'),
(15, 3, '/photos/1/Product/3.2.png', '2019-05-03 01:33:28', '2019-05-03 01:33:28'),
(16, 4, '/photos/1/Product/1.3.jpg', '2019-05-03 14:14:56', '2019-05-03 14:14:56'),
(17, 4, '/photos/1/Product/2.jpg', '2019-05-03 14:14:56', '2019-05-03 14:14:56'),
(18, 4, '/photos/1/Product/3.4.png', '2019-05-03 14:14:56', '2019-05-03 14:14:56'),
(19, 4, '/photos/1/Product/3.jpg', '2019-05-03 14:14:56', '2019-05-03 14:14:56'),
(20, 4, '/photos/1/Product/pexels-photo-1003711.jpeg', '2019-05-03 14:14:56', '2019-05-03 14:14:56'),
(21, 5, '/photos/1/Product/2.jpg', '2019-05-03 15:08:38', '2019-05-03 15:08:38'),
(22, 5, '/photos/1/Product/3.4.png', '2019-05-03 15:08:38', '2019-05-03 15:08:38'),
(23, 5, '/photos/1/Product/3.3.png', '2019-05-03 15:08:38', '2019-05-03 15:08:38'),
(24, 5, '/photos/1/Product/3.jpg', '2019-05-03 15:08:38', '2019-05-03 15:08:38'),
(25, 5, '/photos/1/Product/alcohol-bar-drinks-party.jpg', '2019-05-03 15:08:38', '2019-05-03 15:08:38'),
(26, 6, '/photos/1/Product/3.jpg', '2019-05-05 09:49:03', '2019-05-05 09:49:03'),
(27, 6, '/photos/1/Product/2.4.jpg', '2019-05-05 09:49:04', '2019-05-05 09:49:04'),
(28, 6, '/photos/1/Product/4.1.jpeg', '2019-05-05 09:49:04', '2019-05-05 09:49:04'),
(29, 6, '/photos/1/Product/bbq.1.jpeg', '2019-05-05 09:49:04', '2019-05-05 09:49:04'),
(30, 6, '/photos/1/Product/pexels-photo-323682.jpeg', '2019-05-05 09:49:04', '2019-05-05 09:49:04'),
(31, 7, '/photos/1/Product/tea-cake-cafe-desserts-162827.jpeg', '2019-05-05 10:04:55', '2019-05-05 10:04:55'),
(32, 7, '/photos/1/Product/pexels-photo-921367.jpeg', '2019-05-05 10:04:55', '2019-05-05 10:04:55'),
(33, 7, '/photos/1/Product/pexels-photo-684965.jpeg', '2019-05-05 10:04:55', '2019-05-05 10:04:55'),
(34, 7, '/photos/1/Product/pexels-photo-675951.jpeg', '2019-05-05 10:04:56', '2019-05-05 10:04:56'),
(35, 7, '/photos/1/Product/pexels-photo-552056.jpeg', '2019-05-05 10:04:56', '2019-05-05 10:04:56');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '0',
  `phone` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT '1',
  `birthday` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `level`, `phone`, `gender`, `birthday`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hoangnq', 'quochoang2712@gmail.com', '$2y$10$Nv8MBm3/8O3E1ChWY9OXDORfJr/WybaW5.Usiu9KW5RKM1tC6x4qu', 1, '313161325', 1, '2019-04-18 07:00:00', 'cxgDs2ZPl5sldmUEz4jabdQ8B9jw8vfFuSkvwm0aOuMU8ZVlLFqj12uIZWI9', '2019-04-12 11:13:06', '2019-04-12 17:19:07'),
(2, 'hungtran', 'admin@gmail.com', '$2y$10$ZC8zGnDojRBs42wPEPmBGu2OeYA41k3xfxoh87ldC.jvJ2cmzg54q', 1, '313161324', 1, '2019-04-17 07:00:00', 'bP0sw2NnPFZQQymFGuIMl76ISAeXMEIzb4iWEMe1ijuoQe91yP90uuIXcxcg', '2019-04-12 11:31:19', '2019-04-12 17:02:38'),
(4, 'MaiLoan', 'mailoan96pl@gmail.com', '$2y$10$RD2KCst8eXijP3h2/iwJ1uv9HoRg1WuphHPg.VkFwSejXVnU2mAbC', 0, '0343161325', 0, '2019-04-02 07:00:00', NULL, '2019-04-12 16:36:19', '2019-04-16 23:21:46'),
(5, 'HungTQ', 'thainguyen@gmail.com', '$2y$10$koBWsSO7d4z169thWy.yvOWwcsthyuUMp4Dcpb3lIO2cShlzkvO0m', 1, NULL, 1, '2019-04-10 07:00:00', NULL, '2019-04-12 16:52:40', '2019-04-12 16:52:40'),
(6, 'Hợp le', 'vanhop@gmail.com', '$2y$10$/3e4Q9cQJg53oila3yXUL.Le1Wc7dWqJhtEtuIG0D49inxqrgxq0a', 0, NULL, 1, '2019-04-10 07:00:00', '1kzR2nxq1erpNMPdz35OR91nQQeMxjROQw5JIOf6aebPULhDjQKKnyR7gsSF', '2019-04-15 12:21:40', '2019-04-15 12:21:40');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `video`
--

CREATE TABLE `video` (
  `id` int(10) NOT NULL,
  `category_id` int(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `video`
--

INSERT INTO `video` (`id`, `category_id`, `name`, `link`, `status`, `created_at`, `updated_at`) VALUES
(4, 12, 'Bánh crep sầu riêng', 'https://www.youtube.com/embed/qtl9XbUW-3U', 1, '2019-04-15 02:33:57', '2019-04-15 02:33:57'),
(5, 2, 'Bánh flan cafe', 'https://www.youtube.com/embed/oc8trWdTfYc', 1, '2019-04-15 02:43:57', '2019-04-15 02:44:39'),
(6, 2, 'Bánh gato phủ socola', 'https://www.youtube.com/embed/3H5UQ7TQenc', 1, '2019-04-15 02:47:04', '2019-04-15 02:47:04');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `productimage`
--
ALTER TABLE `productimage`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `post`
--
ALTER TABLE `post`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `productimage`
--
ALTER TABLE `productimage`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `video`
--
ALTER TABLE `video`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `orderdetail_ibfk_3` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
