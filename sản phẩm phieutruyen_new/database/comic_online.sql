-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2021 lúc 04:39 PM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `comic_online`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chapter`
--

CREATE TABLE `chapter` (
  `id` int(11) NOT NULL,
  `id_comic` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_page` int(11) DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL CHECK (`status` in ('Chờ duyệt','Đã duyệt')),
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chapter`
--

INSERT INTO `chapter` (`id`, `id_comic`, `index`, `name`, `total_page`, `status`, `created_at`, `updated_at`) VALUES
(1, 6, 1, 'Vũ trụ phiêu lưu ký', 0, 'Đã duyệt', '2021-11-24 20:14:51', '2021-11-24 20:14:51'),
(2, 6, 2, 'Cách tạo ra trái đất', 0, 'Đã duyệt', '2021-11-24 20:14:51', '2021-11-24 20:14:51'),
(12, 6, 3, 'aaaaaaaaaaaaaa', 0, 'Chờ duyệt', '2021-11-28 01:47:06', '2021-12-01 19:49:29'),
(82, 18, 1, 'oooooooooo', 0, 'Chờ duyệt', '2021-12-01 19:51:09', '2021-12-01 19:51:09'),
(84, 18, 3, 'uuuuuuuuuuuuu', 0, 'Chờ duyệt', '2021-12-01 19:51:09', '2021-12-01 19:51:09'),
(85, 6, 4, 'chuong moi', 0, 'Chờ duyệt', '2021-12-06 09:10:13', '2021-12-06 09:10:13'),
(89, 18, 4, 'ad', 0, 'Chờ duyệt', '2021-12-06 09:51:19', '2021-12-06 09:51:19'),
(90, 20, 1, 'aaaaaaaaaaaaa', 0, 'Đã duyệt', '2021-12-06 09:53:15', '2021-12-06 09:53:15'),
(92, 21, 1, 'chuong moi', 0, 'Chờ duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(93, 21, 2, 'chuong tiep', 0, 'Chờ duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01');

INSERT INTO `chapter` (`id`, `id_comic`, `index`, `name`, `total_page`, `status`, `created_at`, `updated_at`) VALUES
(92, 21, 1, 'chuong moi', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(93, 21, 2, 'chuong tiep', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(94, 21, 3, 'chuong tiep', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(95, 21, 4, 'chuong tiep', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(96, 21, 5, 'chuong tiep', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(97, 21, 6, 'chuong tiep', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(98, 21, 7, 'chuong tiep', 0, 'Đã duyệt', '2021-12-06 10:43:01', '2021-12-06 10:43:01');
UPDATE `chapter` SET `status`='Đã duyệt'
--
-- Bẫy `chapter`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_chapter` BEFORE INSERT ON `chapter` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
    SET NEW.status = 'Chờ duyệt';
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `up_af_chapter` AFTER UPDATE ON `chapter` FOR EACH ROW BEGIN
	DECLARE _id_comic INT DEFAULT 0;
	DECLARE _status VARCHAR(30);
    DECLARE _sochap INT DEFAULT 0;

    SET _id_comic = NEW.id_comic;
    SET _status = NEW.status;
    
    IF _status = 'Đã duyệt' THEN
        SELECT COUNT(*) INTO _sochap FROM chapter chap WHERE chap.id_comic = _id_comic and chap.status='Đã duyệt';
        UPDATE comic SET total_chapter = _sochap, updated_at = NOW() WHERE id = _id_comic;
    END IF;
    
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `codeconfim`
--

CREATE TABLE `codeconfim` (
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Bẫy `codeconfim`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_ccf` BEFORE INSERT ON `codeconfim` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comic`
--

CREATE TABLE `comic` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL CHECK (`status` in ('Đã hoàn thành','Đang tiến hành','Tạm ngưng','Chờ duyệt')),
  `coverphoto` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_view` int(11) DEFAULT NULL,
  `id_country` int(11) DEFAULT NULL,
  `total_chapter` int(11) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `detail` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comic`
--

INSERT INTO `comic` (`id`, `name`, `author`, `id_user`, `status`, `coverphoto`, `total_view`, `id_country`, `total_chapter`, `rating`, `detail`, `created_at`, `updated_at`) VALUES
(1, 'Onepunch Man', 'Không rõ', '2', 'Đã hoàn thành', './upload/comic/coverphoto/Onepunch_Man_1638722754.jpg', 0, 3, 0, 0, 'Nhân vật chính trong Onepunch-man là Saitama, một con người mà nhìn đâu cũng thấy “tầm thường”, từ khuôn mặt vô hồn, cái đầu trọc lóc, cho tới thể hình long tong. Tuy nhiên, con người nhìn thì tầm thường này lại chuyên giải quyết những vấn đề hết sức bất thường. Anh thực chất chính là một siêu anh hùng luôn tìm kiếm cho mình một đối thủ mạnh. Vấn đề là, cứ mỗi lần bắt gặp một đối thủ tiềm năng, thì đối thủ nào cũng như đối thủ nào, chỉ ăn một đấm của anh là… chết luôn. Liệu rằng Onepunch-Man Saitaman có thể tìm được cho mình một kẻ ác dữ dằn đủ sức đấu với anh? Hãy theo bước Saitama trên con đường một đấm tìm đối cực kỳ hài hước của anh!!', '2021-11-18 11:40:49', '2021-12-05 23:45:54'),
(2, 'One Piece', 'Không rõ', '3', 'Đang tiến hành', './upload/comic/coverphoto/One_Piece_1638722455.jpg', 0, 2, 0, 0, 'One Piece là câu truyện kể về Luffy và các thuyền viên của mình. Khi còn nhỏ, Luffy ước mơ trở thành Vua Hải Tặc. Cuộc sống của cậu bé thay đổi khi cậu vô tình có được sức mạnh có thể co dãn như cao su, nhưng đổi lại, cậu không bao giờ có thể bơi được nữa. Giờ đây, Luffy cùng những người bạn hải tặc của mình ra khơi tìm kiếm kho báu One Piece, kho báu vĩ đại nhất trên thế giới. Trong One Piece, mỗi nhân vật trong đều mang một nét cá tính đặc sắc kết hợp cùng các tình huống kịch tính, lối dẫn truyện hấp dẫn chứa đầy các bước ngoặt bất ngờ và cũng vô cùng hài hước đã biến One Piece trở thành một trong những bộ truyện nổi tiếng nhất không thể bỏ qua. Hãy đọc One Piece để hòa mình vào một thế giới của những hải tặc rộng lớn, đầy màu sắc, sống động và thú vị, cùng đắm chìm với những nhân vật yêu tự do, trên hành trình đi tìm ước mơ của mình.', '2021-11-18 11:40:49', '2021-12-05 23:40:55'),
(3, 'Kimetsu No Yaiba', 'Không rõ', '2', 'Tạm ngưng', './upload/comic/coverphoto/Kimetsu_No_Yaiba_1638722167.jpg', 0, 4, 0, 0, 'Tanjirou là con cả của gia đình vừa mất cha. Một ngày nọ, Tanjirou đến thăm thị trấn khác để bán than, khi đêm về cậu ở nghỉ tại nhà người khác thay vì về nhà vì lời đồn thổi về ác quỷ luôn rình mò gần núi vào buổi tối. Khi cậu về nhà vào ngày hôm sau, bị kịch đang đợi chờ cậu ...', '2021-11-18 11:43:19', '2021-12-05 23:36:07'),
(4, 'Thám tử lừng danh conan', 'Không rõ', '3', 'Đã hoàn thành', './upload/comic/coverphoto/Thám_tử_lừng_danh_conan_1638722255.jpg', 0, 3, 0, 0, 'Kudo Shinichi, 17 tuổi, là một thám tử học sinh trung học phổ thông rất nổi tiếng, thường xuyên giúp cảnh sát phá các vụ án khó khăn. Trong một lần khi đang theo dõi một vụ tống tiền, cậu đã bị thành viên của Tổ chức Áo đen bí ẩn phát hiện. Chúng đánh gục Shinichi, làm cậu bất tỉnh và ép cậu uống loại thuốc độc APTX-4869 mà Tổ chức vừa điều chế nhằm bịt đầu mối. Tuy vậy, thứ thuốc ấy không giết chết cậu mà lại gây ra tác dụng phụ khiến cậu teo nhỏ thành một đứa trẻ khoảng 6 tuổi. Sau đó, cậu tự xưng là Edogawa Conan và được Mori Ran - bạn gái của cậu khi còn là Kudo Shinichi - nhận nuôi và mang về văn phòng thám tử của bố cô là Mori Kogoro. Xuyên suốt series, Conan đã âm thầm hỗ trợ ông Mori phá các vụ án. Đồng thời cậu cũng phải nhập học lớp 1 Tiểu học, nhờ đó mà kết thân với nhiều người và lập ra Đội thám tử nhí.', '2021-11-18 11:43:19', '2021-12-05 23:37:35'),
(5, 'Bảy viên ngọc rồng', 'Không rõ', '2', 'Đang tiến hành', './upload/comic/coverphoto/Bảy_viên_ngọc_rồng_1638711195.jpg', 0, 5, 0, 0, 'Một cậu bé có đuôi khỉ được tìm thấy bởi một ông lão sống một mình trong rừng, ông đặt tên là Son Goku và xem đứa bé như là cháu của mình. Một ngày nọ Goku tình cờ gặp một cô gái tên là Bulma trên đường đi bắt cá về, Goku và Bulma đã cùng nhau truy tìm bảy viên ngọc rồng. Các viên ngọc rồng này chứa đựng một bí mật có thể triệu hồi một con rồng và ban điều ước cho ai sở hữu chúng. Trên cuộc hành trình dài đi tìm những viên ngọc rồng, họ gặp những người bạn (Yamcha, Krillin,Yajirobe, Thiên, Giáo tử, Oolong,...) và những đấu sĩ huyền thoại cũng như nhiều ác quỷ. Họ trải qua những khó khăn và học hỏi các chiêu thức võ thuật đặc biệt để tham gia thi đấu trong đại hội võ thuật thế giới được tổ chức hằng năm. Ngoài các sự kiện đại hội võ thuật, Goku và các bạn còn phải đối phó với các thế lực độc ác như Đại vương Pilaf, Quân đoàn khăn đỏ của Độc nhãn tướng quân, Đại ma vương Picollo và những đứa con của hắn. Chiến binh người Saiya: Radiz, Hoàng tử Saiya Vegeta cùng tên cận vệ Nappa. Rồi họ đi đến Namek, gặp rồng thần của Namek; chạm trán Frieza, khi trở về Trái Đất đụng độ Nhóm android sát thủ (các Android 16, 17, 18,19, 20) và sau đó là quái vật từ tương lai Cell, Kẻ thù từ vũ trụ Majin Buu, thần hủy diệt Beerus, các đối thủ từ các vũ trụ song song, Đối thủ mạnh nhất với Goku là Jiren (đến từ vũ trụ 11).', '2021-11-18 11:45:43', '2021-12-05 20:33:15'),
(6, 'Doraemon', 'Không rõcgvb', '3', 'Đang tiến hành', './upload/comic/coverphoto/609395371290-iZgELVcX.png', 139, 1, 2, 0, 'Doraemon (ドラえもん (銅鑼衛門) (Đồng La Vệ Môn)? tên cũ tại Việt Nam là Đôrêmon) là nhân vật chính hư cấu trong loạt Manga cùng tên của họa sĩ Fujiko F. Fujio. Trong truyện lấy bối cảnh ở thế kỷ 22, Doraemon là chú mèo robot của tương lai do xưởng Matsushiba — công xưởng chuyên sản xuất robot vốn dĩ nhằm mục đích chăm sóc trẻ nhỏ. Ban đầu, chú mèo vốn dĩ thuộc sở hữu của cậu bé Sewashi, là con cháu năm đời sau của Nobita nhưng về sau Sewashi gửi lại cho ông Nobita của mình nhằm cải thiện cuộc sống của ông mình do Nobita là người hậu đậu, vụng về, luôn gặp trắc trở trong cuộc sống mà dẫn đến các thế hệ con cháu sau này phải sống trong cảnh nghèo khổ trong đó có Sewashi. Doraemon có một chiếc túi thần kì nhỏ trước bụng mà bên trong chứa vô vàn bảo bối tiện ích của tương lai chính vì vậy mà thường xuyên bị Nobita vòi vĩnh mượn.', '2021-11-18 11:45:43', '2021-12-06 09:08:22'),
(18, 'Thần đồng đất việt - trang ti', 'Lê linh', '3', 'Chờ duyệt', './upload/comic/coverphoto/Thần_đồng_đất_việt_1638363069.jpg', 0, NULL, 0, 0, 'ttttttttttttttttttttttttttttttttttttttttttttttttttttt', '2021-12-01 19:51:09', '2021-12-06 09:50:49'),
(20, 'xcvbnb', 'Không rõcgvb', '3', 'Đang tiến hành', './upload/comic/coverphoto/xcvbnb_1638759195.jpg', 1, NULL, 1, 0, 'aaaaaaaaaaaaaaaaaaaa', '2021-12-06 09:53:15', '2021-12-06 09:59:16'),
(21, 'Tý Quậy', 'Không rõcgvb', '3', 'Chờ duyệt', './upload/comic/coverphoto/Tý_Quậy_1638762181.png', 0, NULL, 0, 0, 'asADSDFGFTHGYJUJKLIKUJYHGDFSD', '2021-12-06 10:43:01', '2021-12-06 10:43:01');
UPDATE comic set `status`= 'Chờ duyệt'
UPDATE comic set `status`= 'Đang tiến hành' WHERE id=24;
UPDATE chapter set `status`= 'Đã duyệt'


--
-- Bẫy `comic`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_comic` BEFORE INSERT ON `comic` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
    SET NEW.status = 'Chờ duyệt';
    SET NEW.total_view = 0;
    SET NEW.rating = 0.0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `id_reply` int(11) DEFAULT NULL,
  `id_comic` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `id_reply`, `id_comic`, `id_user`, `type`, `content`, `created_at`, `updated_at`) VALUES
(1, NULL, 6, 3, NULL, 'Cx tam on!! Khong hay nhu tuong tuong', '2021-11-24 22:14:55', '2021-11-24 22:14:55'),
(2, 1, 6, 3, NULL, 'That vay ha? Tuong hay lam cho\r\nTon thoi gian tim hieu vai', '2021-11-24 22:16:33', '2021-11-24 22:16:33'),
(3, NULL, 6, 3, NULL, 'Cx binh thuong. Cap nhat hoi lau', '2021-11-24 22:16:33', '2021-11-24 22:16:33'),
(4, NULL, 6, 3, 'Bình luận truyện', 'ewwwwwwwwwwwwwwwwwwwwwww', '2021-11-25 00:35:21', '2021-11-25 00:35:21'),
(5, NULL, 6, 3, 'Bình luận truyện', 'ewwwwwwwwwwwwwwwwwwwwwww', '2021-11-25 00:37:56', '2021-11-25 00:37:56'),
(6, NULL, 6, 3, 'Bình luận truyện', 'ewwwwwwwwwwwwwwwwwwwwwww', '2021-11-25 00:38:02', '2021-11-25 00:38:02'),
(7, NULL, 6, 3, 'Bình luận truyện', 'Khong hay lam. moi nguoi dung phi thoi gian', '2021-11-25 00:38:44', '2021-11-25 00:38:44'),
(8, 5, 6, 3, 'Bình luận truyện', 'Spam a con di', '2021-11-25 00:46:49', '2021-11-25 00:46:49'),
(9, 8, 6, 3, 'Bình luận truyện', 'khong he nhag', '2021-11-25 00:47:23', '2021-11-25 00:47:23'),
(10, 8, 6, 3, 'Bình luận truyện', 'hu hu', '2021-11-25 00:47:37', '2021-11-25 00:47:37'),
(11, 7, 6, 2, 'Bình luận truyện', 'ua di lun ha', '2021-11-25 00:50:36', '2021-11-25 00:50:36'),
(12, 3, 6, 2, 'Bình luận truyện', 'tui thay nhah ma', '2021-11-25 00:52:06', '2021-11-25 00:52:06'),
(14, 12, 6, 3, 'Bình luận truyện', 'asdfds', '2021-11-25 10:14:12', '2021-11-25 10:14:12'),
(15, 12, 6, 3, 'Bình luận truyện', 'assdfg asdfghgfdsa asdfghfds asdfbvcxz', '2021-11-25 10:19:32', '2021-11-25 10:19:32'),
(16, NULL, 1, 2, 'Bình luận truyện', 'hello', '2021-11-25 10:30:50', '2021-11-25 10:30:50'),
(17, 8, 6, 2, 'Bình luận truyện', 'kakakakakakaka', '2021-11-25 10:31:14', '2021-11-25 10:31:14'),
(18, 10, 6, 2, 'Bình luận truyện', 'khoc cai thu gi ha', '2021-11-25 10:31:33', '2021-11-25 10:31:33'),
(19, 15, 6, 2, 'Bình luận truyện', '?????????????????????', '2021-11-25 10:31:54', '2021-11-25 10:31:54'),
(20, 16, 1, 3, 'Bình luận truyện', 'hi', '2021-11-25 10:41:43', '2021-11-25 10:41:43'),
(21, 16, 1, 3, 'Bình luận truyện', 'hi hi', '2021-11-25 10:42:52', '2021-11-25 10:42:52'),
(22, 16, 1, 3, 'Bình luận truyện', 'hi hi hi', '2021-11-25 10:44:29', '2021-11-25 10:44:29'),
(23, NULL, 1, 3, 'Bình luận truyện', 'alo alo', '2021-11-25 10:45:13', '2021-11-25 10:45:13'),
(24, NULL, 6, 3, 'Bình luận truyện', 'hahaha', '2021-11-26 09:45:57', '2021-11-26 09:45:57'),
(25, NULL, 6, 3, 'Bình luận truyện', 'hkljvjhkgcjugjkvljbn', '2021-11-26 09:56:19', '2021-11-26 09:56:19'),
(26, NULL, 6, 3, 'Bình luận truyện', 'jhvgcfxdszxfhjhmngcbfd', '2021-11-26 09:56:49', '2021-11-26 09:56:49'),
(27, NULL, 6, 3, 'Bình luận truyện', 'sdfghgfdsadfg sdfghngfdsdfgb', '2021-11-26 10:36:15', '2021-11-26 10:36:15'),
(28, NULL, 6, 3, 'Bình luận truyện', 'alablaalabla', '2021-11-26 10:42:29', '2021-11-26 10:42:29'),
(29, NULL, 6, 3, 'Bình luận truyện', 'dfghfdsa', '2021-11-26 10:43:58', '2021-11-26 10:43:58'),
(30, NULL, 6, 3, 'Bình luận truyện', 'dfghjnkmjhg', '2021-11-26 11:47:25', '2021-11-26 11:47:25'),
(31, NULL, 6, 3, 'Bình luận truyện', '123456789098765432q', '2021-11-26 12:04:56', '2021-11-26 12:04:56'),
(32, 24, 6, 3, 'Bình luận truyện', 'dfghjkl;lkjhgfdghj', '2021-11-26 12:17:40', '2021-11-26 12:17:40'),
(33, NULL, 4, 3, 'Bình luận truyện', 'ahihi', '2021-11-26 12:19:38', '2021-11-26 12:19:38'),
(34, NULL, 6, 3, 'Bình luận truyện', 'hbwalkfwaknw', '2021-11-26 12:54:51', '2021-11-26 12:54:51'),
(35, 29, 6, 3, 'Bình luận truyện', 'sdfgfds', '2021-11-26 12:55:54', '2021-11-26 12:55:54'),
(36, NULL, 2, 3, 'Bình luận truyện', 'szdxfcgfdsa', '2021-11-26 12:57:36', '2021-11-26 12:57:36'),
(37, NULL, 6, 3, 'Bình luận truyện', 'SZDXFCGFDSA', '2021-11-26 12:58:01', '2021-11-26 12:58:01'),
(38, NULL, 6, 3, 'Bình luận truyện', 'adxfcgdszdfcgv', '2021-11-26 12:59:25', '2021-11-26 12:59:25'),
(39, NULL, 6, 3, 'Bình luận truyện', 'cvbhjnkmjbhvgcfxcvb', '2021-11-26 13:00:32', '2021-11-26 13:00:32'),
(40, NULL, 2, 3, 'Bình luận truyện', 'Sdzfgfdcxzc', '2021-11-26 13:07:10', '2021-11-26 13:07:10'),
(41, NULL, 2, 3, 'Bình luận truyện', 'kjhgfdfghmnb vc', '2021-11-26 13:08:18', '2021-11-26 13:08:18'),
(42, 40, 2, 3, 'Bình luận truyện', 'zdxfcghjgfds', '2021-11-26 13:09:36', '2021-11-26 13:09:36'),
(43, NULL, 2, 3, 'Bình luận truyện', '45654321345', '2021-11-26 13:09:46', '2021-11-26 13:09:46'),
(44, NULL, 3, 3, 'Bình luận truyện', 'alo', '2021-11-26 13:20:08', '2021-11-26 13:20:08'),
(45, NULL, 6, 2, 'Bình luận truyện', 'gfcmcyhvujbi\r\n', '2021-12-01 19:55:44', '2021-12-01 19:55:44');

--
-- Bẫy `comment`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_comment` BEFORE INSERT ON `comment` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Việt Nam'),
(2, 'Nhật Bản'),
(3, 'Trung Quốc'),
(4, 'Châu Âu'),
(5, 'Hàn Quốc');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `type`, `title`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'tonvanhiepdragon@gmail.com', 'Lỗi ảnh truyện', 'ssss ', 'ss sss ss sss ss sss ss sss ss sss ss sss ss sss ss sss ss sss', '0', '2021-11-20 15:03:28', '2021-11-20 15:03:28'),
(2, 'tonvanhiepdragon@gmail.com', 'Lỗi trang web', 'adddddddddddd dddddddddd', ' aaaaaaaaaaaaaaaaaaaa ffffffffffffffffffff f               r     eeeeeeeeeeeeeee gggggg ', 'Đã xóa', '2021-11-20 15:04:08', '2021-11-20 15:04:08'),
(3, 'tonvanhiepdragon@gmail.com', 'Lỗi ảnh truyện', 'asdfghjgfdsa', 'asdfgh34rtew sdcfngfder', '1', '2021-11-22 17:36:42', '2021-11-22 17:36:42'),
(4, 'tonvanhiepdragon@gmail.com', 'Lỗi trang web', 'ko co gi', 'ko co giko co giko co giko co giko co giko co giko co giko co giko co gi', '1', '2021-12-06 08:30:29', '2021-12-06 08:30:29'),
(5, 'tonvanhiepdragon@gmail.com', 'Báo cáo vi phạm', 'aaaaaaaaaaaaaaaaaaa', 'rrrrrrrrrrrrrrrrrrrrrrr', 'Đã xóa', '2021-12-06 09:48:04', '2021-12-06 09:48:04'),
(6, 'tonvanhiepdragon@gmail.com', 'Lỗi ảnh truyện', 'asdf', 'sfdg sdfg', '0', '2021-12-06 10:39:53', '2021-12-06 10:39:53');

--
-- Bẫy `feedback`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_feedback` BEFORE INSERT ON `feedback` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
    SET NEW.status = '0';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `follow`
--

CREATE TABLE `follow` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_comic` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `follow`
--

INSERT INTO `follow` (`id`, `id_user`, `id_comic`, `created_at`) VALUES
(6, 2, 4, '2021-11-23 12:20:36'),
(8, 6, 6, '2021-11-23 12:27:58'),
(9, 1, 4, '2021-11-23 12:27:58'),
(15, 2, 6, '2021-11-25 22:05:34'),
(16, 2, 1, '2021-11-25 22:06:21'),
(18, 2, 2, '2021-11-25 22:06:36'),
(21, 3, 1, '2021-11-26 13:20:17'),
(26, 2, 3, '2021-11-26 20:37:21');

--
-- Bẫy `follow`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_follow` BEFORE INSERT ON `follow` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `like_comment`
--

CREATE TABLE `like_comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `like_comment`
--

INSERT INTO `like_comment` (`id_comment`, `id_user`, `created_at`) VALUES
(11, 0, '2021-11-25 23:34:05'),
(11, 3, '2021-11-26 00:40:26'),
(19, 3, '2021-11-26 00:43:06'),
(9, 2, '2021-11-26 00:43:33'),
(3, 2, '2021-11-26 00:43:36'),
(37, 3, '2021-11-26 12:59:09'),
(17, 3, '2021-11-26 20:30:19');

--
-- Bẫy `like_comment`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_like_comment` BEFORE INSERT ON `like_comment` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `login`
--

CREATE TABLE `login` (
  `id_user` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isadmin` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `login`
--

INSERT INTO `login` (`id_user`, `username`, `password`, `isadmin`, `created_at`, `updated_at`) VALUES
(1, 'hiepton', '123456', 0, '2021-11-18 11:32:05', '2021-11-18 11:32:05'),
(2, 'tonvanhiep', '123456', 0, '2021-11-18 11:32:05', '2021-11-18 11:32:05'),
(3, 'hieptv', '123456123456', 0, '2021-11-18 11:32:39', '2021-11-18 13:46:19'),
(6, 'tonvanhiepabc', 'tonvanhiepabc', 1, '2021-11-20 18:18:22', '2021-11-20 18:18:22');

--
-- Bẫy `login`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_login` BEFORE INSERT ON `login` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
    SET NEW.isadmin = 0;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT '#',
  `status` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `notification`
--

INSERT INTO `notification` (`id`, `id_user`, `type`, `content`, `link`, `status`, `created_at`) VALUES
(1, 3, 'tra loi binh luan', 'khong co', '#', 'Đã đọc', '2021-11-18 11:50:03'),
(2, 3, 'Duyet truyen', 'Truyen DFGHJKJHGFGH da duoc duyet', '#', 'Đã đọc', '2021-11-18 11:50:03'),
(3, 3, NULL, 'Sao ko ai tra loi tui da', '#', 'Đã đọc', '2021-11-18 11:50:32'),
(4, 3, NULL, 'sdfghjhgfdsdfg', '#', 'Đã đọc', '2021-11-18 11:50:32'),
(5, 2, 'sjgahnfdsdfg', 'sjgahnfdsdfg', '#', 'Đã đọc', '2021-11-18 11:51:20'),
(6, 1, NULL, 'SET NEW.updated_at = NOW();', '#', 'Đã đọc', '2021-11-18 11:51:20'),
(8, 2, 'Trả lời bình luận truyện', 'hieptvh đã trả lời bình luận của bạn.', '#', 'Đã đọc', '2021-11-25 10:19:32'),
(9, 3, 'Trả lời bình luận truyện', 'tonvanhiep đã trả lời bình luận của bạn.', '#', 'Đã đọc', '2021-11-25 10:31:14'),
(10, 3, 'Trả lời bình luận truyện', 'tonvanhiep đã trả lời bình luận của bạn.', '#', 'Đã đọc', '2021-11-25 10:31:33'),
(11, 3, 'Trả lời bình luận truyện', 'tonvanhiep đã trả lời bình luận của bạn.', '#', 'Đã đọc', '2021-11-25 10:31:54'),
(12, 2, 'Trả lời bình luận truyện', 'hieptvh đã trả lời bình luận của bạn.', './comic.php?comic=1', 'Đã đọc', '2021-11-25 10:44:29'),
(13, 2, NULL, 'szdxfghjvgcfdsdzxfcghgfdsdfgh', 'https://www.facebook.com/photo?fbid=2978017465744304&set=pcb.1900196950188972', 'Đã đọc', '2021-11-25 19:50:36'),
(14, 3, 'Theo dõi truyện', 'tonvanhiep đang theo dõi truyện Doraemon', '#', 'Đã đọc', '2021-11-25 22:05:34'),
(15, 2, 'Theo dõi truyện', 'tonvanhiep đang theo dõi truyện Onepunch Man', '#', 'Đã đọc', '2021-11-25 22:06:21'),
(16, 3, 'Theo dõi truyện', 'tonvanhiep đang theo dõi truyện One Piece', '#', 'Đã đọc', '2021-11-25 22:06:32'),
(17, 3, 'Theo dõi truyện', 'tonvanhiep đang theo dõi truyện One Piece', '#', 'Đã đọc', '2021-11-25 22:06:36'),
(18, 3, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện Doraemon', '#', 'Đã đọc', '2021-11-25 22:37:41'),
(19, 3, 'Thích bình luận', 'hieptvh đã thích bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 00:42:09'),
(20, 2, 'Thích bình luận', 'hieptvh đã thích bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 00:43:06'),
(21, 3, 'Thích bình luận', 'tonvanhiep đã thích bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 00:43:33'),
(22, 3, 'Thích bình luận', 'tonvanhiep đã thích bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 00:43:36'),
(23, 2, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện Onepunch Man', '#', 'Đã đọc', '2021-11-26 09:37:33'),
(24, 3, 'Bình luận truyện', ' đã bình luận truyện của bạn.', '', 'Đã đọc', '2021-11-26 10:36:15'),
(25, 3, 'Bình luận truyện', ' đã bình luận truyện của bạn.', '', 'Đã đọc', '2021-11-26 10:42:29'),
(27, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 11:47:25'),
(28, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:04:56'),
(29, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:17:40'),
(30, 3, 'Trả lời bình luận truyện', 'hieptvh đã trả lời bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:17:40'),
(31, 3, 'Trả lời bình luận truyện', 'hieptvh đã trả lời bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:55:54'),
(32, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:58:01'),
(33, 3, 'Thích bình luận', 'hieptvh đã thích bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:59:09'),
(34, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 12:59:25'),
(35, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 13:00:32'),
(36, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=2', 'Đã đọc', '2021-11-26 13:08:18'),
(37, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=2', 'Đã đọc', '2021-11-26 13:09:36'),
(38, 3, 'Trả lời bình luận truyện', 'hieptvh đã trả lời bình luận của bạn.', './comic.php?comic=2', 'Đã đọc', '2021-11-26 13:09:36'),
(39, 3, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=2', 'Đã đọc', '2021-11-26 13:09:46'),
(40, 2, 'Bình luận truyện', 'hieptvh đã bình luận truyện của bạn.', './comic.php?comic=3', 'Đã đọc', '2021-11-26 13:20:08'),
(41, 2, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện Onepunch Man', '#', 'Đã đọc', '2021-11-26 13:20:18'),
(42, 3, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện Thám tử lừng danh conan', '#', 'Đã đọc', '2021-11-26 13:20:22'),
(43, 2, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện Kimetsu No Yaiba', '#', 'Đã đọc', '2021-11-26 13:20:26'),
(44, 3, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện One Piece', '#', 'Đã đọc', '2021-11-26 20:18:01'),
(45, 3, 'Theo dõi truyện', 'hieptvh đang theo dõi truyện Doraemon', '#', 'Đã đọc', '2021-11-26 20:18:14'),
(46, 2, 'Thích bình luận', 'hieptvh đã thích bình luận của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-11-26 20:30:19'),
(47, 2, 'Theo dõi truyện', 'tonvanhiep đang theo dõi truyện Kimetsu No Yaiba', '#', 'Đã đọc', '2021-11-26 20:37:21'),
(48, 3, 'Bình luận truyện', 'tonvanhiep đã bình luận truyện của bạn.', './comic.php?comic=6', 'Đã đọc', '2021-12-01 19:55:44'),
(49, 3, 'Theo dõi truyện', 'hieptv đang theo dõi truyện Doraemon', '#', 'Đã đọc', '2021-12-13 21:21:30'),
(50, 2, 'Theo dõi truyện', 'hieptv đang theo dõi truyện Kimetsu No Yaiba', '#', 'Chưa đọc', '2021-12-13 21:32:32'),
(51, 3, 'Theo dõi truyện', 'hieptv đang theo dõi truyện Doraemon', '#', 'Đã đọc', '2021-12-13 22:09:45');

--
-- Bẫy `notification`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_notification` BEFORE INSERT ON `notification` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.status = 'Chưa đọc';
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `other_name_comic`
--

CREATE TABLE `other_name_comic` (
  `id_comic` int(11) NOT NULL,
  `other_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `other_name_comic`
--

INSERT INTO `other_name_comic` (`id_comic`, `other_name`) VALUES
(6, 'chu meo may den tu tuong lai'),
(18, 'Trạng tí'),
(20, 'cvvbnbn'),
(21, 'xdfgf');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `id_chapter` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `link_page` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `page`
--

INSERT INTO `page` (`id`, `id_chapter`, `index`, `link_page`, `created_at`, `updated_at`) VALUES
(64, 13, 1, './upload/comic/pagecomic/doremon_chap_20_giac_mo_lam_dai_ca_003.jpg', '2021-11-28 09:41:08', '2021-11-28 09:41:08'),
(65, 13, 2, './upload/comic/pagecomic/doremon_chap_20_giac_mo_lam_dai_ca_004.jpg', '2021-11-28 09:41:08', '2021-11-28 09:41:08'),
(66, 14, 1, './upload/comic/pagecomic/doremon_chap_20_giac_mo_lam_dai_ca_001.jpg', '2021-11-28 09:41:08', '2021-11-28 09:41:08'),
(67, 14, 2, './upload/comic/pagecomic/doremon_chap_20_giac_mo_lam_dai_ca_002.jpg', '2021-11-28 09:41:08', '2021-11-28 09:41:08'),
(68, 15, 1, './upload/comic/pagecomic/doremon_chap_20_giac_mo_lam_dai_ca_005.jpg', '2021-11-28 09:41:08', '2021-11-28 09:41:08'),
(74, 18, 1, './upload/comic/pagecomic/Thần_đồng_đất_việt_Bài_học_làm_quan_0_1638068733.jpg', '2021-11-28 10:05:33', '2021-11-28 10:05:33'),
(80, 67, 1, './upload/comic/pagecomic/Tý_Quậy_zxcvbnm,_0_1638175949.jpg', '2021-11-29 15:52:29', '2021-11-29 15:52:29'),
(81, 67, 2, './upload/comic/pagecomic/Tý_Quậy_zxcvbnm,_1_1638175949.jpg', '2021-11-29 15:52:29', '2021-11-29 15:52:29'),
(95, 70, 1, './upload/comic/pagecomic/Thần_đồng_đất_việt_chuong_moi_0_1638285133.jpg', '2021-11-30 22:12:13', '2021-11-30 22:12:13'),
(96, 70, 3, './upload/comic/pagecomic/Thần_đồng_đất_việt_chuong_moi_0_1638285133.jpg_1638285133', '2021-11-30 22:12:14', '2021-11-30 22:12:14'),
(97, 72, 1, './upload/comic/pagecomic/Thần_đồng_đất_việt_chuong_8_0_1638285134.jpg', '2021-11-30 22:12:14', '2021-11-30 22:12:14'),
(98, 73, 1, './upload/comic/pagecomic/Thần_đồng_đất_việt_nguyen_thi_kieu_oanh_0_1638285567.jpg', '2021-11-30 22:19:27', '2021-11-30 22:19:27'),
(99, 73, 2, './upload/comic/pagecomic/Thần_đồng_đất_việt_nguyen_thi_kieu_oanh_1_1638285567.jpg', '2021-11-30 22:19:27', '2021-11-30 22:19:27'),
(100, 73, 3, './upload/comic/pagecomic/Thần_đồng_đất_việt_nguyen_thi_kieu_oanh_2_1638285567.jpg', '2021-11-30 22:19:27', '2021-11-30 22:19:27'),
(101, 73, 5, './upload/comic/pagecomic/Thần_đồng_đất_việt_nguyen_thi_kieu_oanh_0_1638285567.jpg_1638285567', '2021-11-30 22:19:27', '2021-11-30 22:19:27'),
(102, 73, 7, './upload/comic/pagecomic/Thần_đồng_đất_việt_nguyen_thi_kieu_oanh_0_1638285567.jpg_1638285567', '2021-11-30 22:19:27', '2021-11-30 22:19:27'),
(163, 1, 1, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_1_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(164, 1, 2, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_2_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(165, 1, 3, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_3_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(166, 1, 4, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_4_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(167, 1, 5, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_5_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(168, 1, 6, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_6_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(169, 1, 7, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_7_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(170, 1, 8, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_8_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(171, 1, 9, './upload/comic/pagecomic/Doraemon_Vũ_trụ_phiêu_lưu_ký_9_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(174, 12, 1, './upload/comic/pagecomic/Doraemon_Giac_mo_lam_giang_ho_1_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(175, 12, 2, './upload/comic/pagecomic/Doraemon_Giac_mo_lam_giang_ho_2_1638329509.jpg', '2021-12-01 10:31:49', '2021-12-01 10:31:49'),
(187, 2, 1, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_1_1638619120.jpg', '2021-12-04 18:58:40', '2021-12-04 18:58:40'),
(188, 2, 2, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_2_1638619120.jpg', '2021-12-04 18:58:40', '2021-12-04 18:58:40'),
(189, 2, 3, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_3_1638619120.jpg', '2021-12-04 18:58:41', '2021-12-04 18:58:41'),
(190, 2, 4, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_4_1638619121.jpg', '2021-12-04 18:58:41', '2021-12-04 18:58:41'),
(191, 2, 5, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_5_1638619121.jpg', '2021-12-04 18:58:41', '2021-12-04 18:58:41'),
(192, 2, 6, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_6_1638619121.jpg', '2021-12-04 18:58:41', '2021-12-04 18:58:41'),
(193, 2, 7, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_7_1638619121.jpg', '2021-12-04 18:58:41', '2021-12-04 18:58:41'),
(194, 2, 8, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_8_1638619121.jpg', '2021-12-04 18:58:41', '2021-12-04 18:58:41'),
(196, 12, 3, './upload/comic/pagecomic/Doraemon_aaaaaaaaaaaaaa_3_1638756613.jpg', '2021-12-06 09:10:13', '2021-12-06 09:10:13'),
(197, 2, 9, './upload/comic/pagecomic/Doraemon_Cách_tạo_ra_trái_đất_9_1638756650.jpg', '2021-12-06 09:10:50', '2021-12-06 09:10:50'),
(198, 87, 1, './upload/comic/pagecomic/Tý_Quậy_vvvvvvvvv_1_1638756720.jpg', '2021-12-06 09:12:00', '2021-12-06 09:12:00'),
(199, 90, 1, './upload/comic/pagecomic/xcvbnb_aaaaaaaaaaaaa_1_1638759195.jpg', '2021-12-06 09:53:15', '2021-12-06 09:53:15'),
(200, 90, 2, './upload/comic/pagecomic/xcvbnb_aaaaaaaaaaaaa_2_1638759195.jpg', '2021-12-06 09:53:15', '2021-12-06 09:53:15'),
(201, 92, 1, './upload/comic/pagecomic/Tý_Quậy_chuong_moi_1_1638762181.jpg', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(202, 92, 2, './upload/comic/pagecomic/Tý_Quậy_chuong_moi_2_1638762181.jpg', '2021-12-06 10:43:01', '2021-12-06 10:43:01'),
(203, 92, 3, './upload/comic/pagecomic/Tý_Quậy_chuong_moi_3_1638762181.jpg', '2021-12-06 10:43:01', '2021-12-06 10:43:01');

--
-- Bẫy `page`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_page` BEFORE INSERT ON `page` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `readed`
--

CREATE TABLE `readed` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_chapter` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `readed`
--

INSERT INTO `readed` (`id`, `id_user`, `id_chapter`, `created_at`, `updated_at`) VALUES
(9, 3, 1, '2021-11-26 17:49:13', '2021-11-26 17:49:13'),
(10, 3, 2, '2021-11-26 17:49:31', '2021-11-26 17:49:31'),
(11, 3, 2, '2021-11-26 17:49:42', '2021-11-26 17:49:42'),
(12, 3, 2, '2021-11-26 17:50:02', '2021-11-26 17:50:02'),
(13, 3, 2, '2021-11-26 17:50:05', '2021-11-26 17:50:05'),
(14, 3, 2, '2021-11-26 17:50:08', '2021-11-26 17:50:08'),
(15, 3, 1, '2021-11-26 17:50:13', '2021-11-26 17:50:13'),
(16, 3, 1, '2021-11-26 17:52:41', '2021-11-26 17:52:41'),
(17, 3, 1, '2021-11-26 17:52:54', '2021-11-26 17:52:54'),
(18, 3, 1, '2021-11-26 18:04:33', '2021-11-26 18:04:33'),
(19, 3, 1, '2021-11-26 18:11:51', '2021-11-26 18:11:51'),
(20, 3, 2, '2021-11-26 18:12:05', '2021-11-26 18:12:05'),
(21, 3, 1, '2021-11-26 18:12:07', '2021-11-26 18:12:07'),
(22, 3, 2, '2021-11-26 18:12:09', '2021-11-26 18:12:09'),
(23, 3, 1, '2021-11-26 18:12:10', '2021-11-26 18:12:10'),
(24, 3, 1, '2021-11-26 18:13:46', '2021-11-26 18:13:46'),
(25, 3, 2, '2021-11-26 18:13:52', '2021-11-26 18:13:52'),
(26, 3, 1, '2021-11-26 18:13:55', '2021-11-26 18:13:55'),
(27, 3, 1, '2021-11-26 18:14:22', '2021-11-26 18:14:22'),
(28, 3, 1, '2021-11-26 18:14:37', '2021-11-26 18:14:37'),
(29, 3, 1, '2021-11-26 18:14:50', '2021-11-26 18:14:50'),
(30, 3, 1, '2021-11-26 18:17:08', '2021-11-26 18:17:08'),
(31, 3, 1, '2021-11-26 18:17:24', '2021-11-26 18:17:24'),
(32, 3, 2, '2021-11-26 20:30:12', '2021-11-26 20:30:12'),
(33, 3, 1, '2021-11-26 20:30:43', '2021-11-26 20:30:43'),
(34, 3, 1, '2021-11-26 20:31:39', '2021-11-26 20:31:39'),
(35, 2, 1, '2021-11-26 20:36:55', '2021-11-26 20:36:55'),
(36, 3, 1, '2021-12-01 10:22:51', '2021-12-01 10:22:51'),
(37, 3, 1, '2021-12-01 19:51:35', '2021-12-01 19:51:35'),
(38, 3, 2, '2021-12-01 19:51:52', '2021-12-01 19:51:52'),
(39, 3, 12, '2021-12-01 19:51:58', '2021-12-01 19:51:58'),
(40, 3, 1, '2021-12-01 19:52:02', '2021-12-01 19:52:02'),
(41, 3, 2, '2021-12-01 19:52:03', '2021-12-01 19:52:03'),
(42, 3, 12, '2021-12-01 19:52:04', '2021-12-01 19:52:04'),
(43, 3, 2, '2021-12-01 19:52:05', '2021-12-01 19:52:05'),
(44, 3, 1, '2021-12-01 20:11:47', '2021-12-01 20:11:47'),
(45, 3, 1, '2021-12-04 16:05:51', '2021-12-04 16:05:51'),
(46, 3, 1, '2021-12-04 16:07:04', '2021-12-04 16:07:04'),
(47, 3, 1, '2021-12-04 16:10:21', '2021-12-04 16:10:21'),
(48, 3, 1, '2021-12-04 16:10:52', '2021-12-04 16:10:52'),
(49, 3, 1, '2021-12-04 16:11:00', '2021-12-04 16:11:00'),
(50, 3, 1, '2021-12-04 16:11:13', '2021-12-04 16:11:13'),
(51, 3, 1, '2021-12-04 16:11:43', '2021-12-04 16:11:43'),
(52, 3, 1, '2021-12-04 16:12:03', '2021-12-04 16:12:03'),
(53, 3, 1, '2021-12-04 16:12:08', '2021-12-04 16:12:08'),
(54, 3, 1, '2021-12-04 16:33:08', '2021-12-04 16:33:08'),
(55, 3, 1, '2021-12-04 16:33:13', '2021-12-04 16:33:13'),
(56, 3, 1, '2021-12-04 16:37:00', '2021-12-04 16:37:00'),
(57, 3, 2, '2021-12-04 16:37:03', '2021-12-04 16:37:03'),
(58, 3, 12, '2021-12-04 16:37:06', '2021-12-04 16:37:06'),
(59, 3, 2, '2021-12-04 16:39:04', '2021-12-04 16:39:04'),
(60, 3, 1, '2021-12-04 16:39:06', '2021-12-04 16:39:06'),
(61, 3, 1, '2021-12-04 16:40:20', '2021-12-04 16:40:20'),
(62, 3, 2, '2021-12-04 16:40:24', '2021-12-04 16:40:24'),
(63, 3, 1, '2021-12-04 16:40:25', '2021-12-04 16:40:25'),
(64, 3, 2, '2021-12-04 16:56:22', '2021-12-04 16:56:22'),
(65, 3, 2, '2021-12-04 17:29:01', '2021-12-04 17:29:01'),
(66, 3, 2, '2021-12-04 18:24:57', '2021-12-04 18:24:57'),
(67, 3, 2, '2021-12-04 18:28:04', '2021-12-04 18:28:04'),
(68, 3, 2, '2021-12-04 18:28:22', '2021-12-04 18:28:22'),
(69, 3, 1, '2021-12-04 18:28:37', '2021-12-04 18:28:37'),
(70, 3, 2, '2021-12-04 18:28:39', '2021-12-04 18:28:39'),
(71, 3, 1, '2021-12-04 18:28:41', '2021-12-04 18:28:41'),
(72, 3, 1, '2021-12-04 18:44:27', '2021-12-04 18:44:27'),
(73, 3, 1, '2021-12-04 18:45:11', '2021-12-04 18:45:11'),
(74, 3, 1, '2021-12-04 18:45:19', '2021-12-04 18:45:19'),
(75, 3, 1, '2021-12-04 18:46:19', '2021-12-04 18:46:19'),
(76, 3, 1, '2021-12-04 18:46:46', '2021-12-04 18:46:46'),
(77, 3, 1, '2021-12-04 18:48:46', '2021-12-04 18:48:46'),
(78, 3, 1, '2021-12-04 18:49:26', '2021-12-04 18:49:26'),
(79, 3, 2, '2021-12-04 18:49:35', '2021-12-04 18:49:35'),
(80, 3, 1, '2021-12-04 18:49:40', '2021-12-04 18:49:40'),
(81, 3, 1, '2021-12-04 18:50:31', '2021-12-04 18:50:31'),
(82, 3, 1, '2021-12-04 18:51:01', '2021-12-04 18:51:01'),
(83, 3, 1, '2021-12-04 18:52:05', '2021-12-04 18:52:05'),
(84, 3, 1, '2021-12-04 18:52:25', '2021-12-04 18:52:25'),
(85, 3, 1, '2021-12-04 18:52:52', '2021-12-04 18:52:52'),
(86, 3, 1, '2021-12-04 18:53:12', '2021-12-04 18:53:12'),
(87, 3, 1, '2021-12-04 18:53:43', '2021-12-04 18:53:43'),
(88, 3, 2, '2021-12-04 18:54:05', '2021-12-04 18:54:05'),
(89, 3, 1, '2021-12-04 18:54:06', '2021-12-04 18:54:06'),
(90, 3, 2, '2021-12-04 18:55:18', '2021-12-04 18:55:18'),
(91, 3, 2, '2021-12-04 18:55:24', '2021-12-04 18:55:24'),
(92, 3, 2, '2021-12-04 18:57:51', '2021-12-04 18:57:51'),
(93, 3, 2, '2021-12-04 18:58:53', '2021-12-04 18:58:53'),
(94, 3, 1, '2021-12-06 08:14:52', '2021-12-06 08:14:52'),
(95, 3, 12, '2021-12-06 08:15:00', '2021-12-06 08:15:00'),
(96, 3, 2, '2021-12-06 08:49:33', '2021-12-06 08:49:33'),
(97, 3, 12, '2021-12-06 08:51:22', '2021-12-06 08:51:22'),
(98, 3, 12, '2021-12-06 08:58:23', '2021-12-06 08:58:23'),
(99, 3, 1, '2021-12-13 21:21:33', '2021-12-13 21:21:33'),
(100, 3, 12, '2021-12-13 21:42:52', '2021-12-13 21:42:52'),
(101, 3, 12, '2021-12-13 21:56:08', '2021-12-13 21:56:08'),
(102, 3, 1, '2021-12-13 22:17:58', '2021-12-13 22:17:58');

--
-- Bẫy `readed`
--
DELIMITER $$
CREATE TRIGGER `ins_bf_readed` BEFORE INSERT ON `readed` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag`
--

INSERT INTO `tag` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Comedy'),
(4, 'Detective'),
(5, 'Demon'),
(6, 'Drama'),
(7, 'Fantasy'),
(8, 'Harem'),
(9, 'Mafia'),
(10, 'Magic'),
(11, 'Romance'),
(12, 'School life'),
(13, 'Shounen'),
(14, 'Sport');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tag_comic`
--

CREATE TABLE `tag_comic` (
  `id_comic` int(11) NOT NULL,
  `id_tag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tag_comic`
--

INSERT INTO `tag_comic` (`id_comic`, `id_tag`) VALUES
(1, 1),
(1, 6),
(2, 6),
(3, 3),
(3, 4),
(3, 6),
(3, 7),
(3, 10),
(3, 12),
(4, 8),
(4, 10),
(5, 11),
(5, 12),
(6, 1),
(6, 4),
(6, 9),
(18, 1),
(18, 4),
(18, 6),
(20, 6),
(21, 6);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `account_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sex` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL CHECK (`sex` in ('Nam','Nữ','Khác')),
  `facebook` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id`, `account_name`, `email`, `sex`, `facebook`, `avatar`, `dateofbirth`, `created_at`, `updated_at`) VALUES
(0, 'None', NULL, NULL, NULL, NULL, NULL, '2021-12-13 22:36:51', '2021-12-13 22:36:51'),
(1, 'hiepton', 'asdfghjklllllll@gmail.com', 'Nam', 'https://tapchianhdep.com/wp-content/uploads/2020/01/tong-hop-hinh-anh-dep-va-de-thuong-cua-pikachu.jpg', 'https://tapchianhdep.com/wp-content/uploads/2020/01/tong-hop-hinh-anh-dep-va-de-thuong-cua-pikachu.jpg', '2021-11-16', '2021-11-18 11:29:14', '2021-11-18 11:29:14'),
(2, 'tonvanhiep', 'qwertyuiop@gmail.com', 'Nam', NULL, 'https://cdn.24h.com.vn/upload/2-2019/images/2019-05-25/1558802221-860-vi-dau-sieu-pham-hoat-hinh-he-doraemon-vua-quen-vua-la-unnamed--8--1558666578-width739height559.png', '2021-11-02', '2021-11-18 11:29:14', '2021-11-18 11:29:14'),
(3, 'hieptv', 'dragon@gmail.com', 'Nam', 'https://www.facebook.com/', './upload/avatar/arduino_engineer.jpg', '2014-08-14', '2021-11-18 11:30:51', '2021-11-18 11:30:51'),
(6, 'tonvanhiepabc', 'tonvanhiepabc@gmail.com', 'Nam', '', './upload/avatar/36495.jpg', '2021-08-06', '2021-11-20 18:18:22', '2021-11-20 18:18:22'),
(9, 'account_name', 'account_name@gmail.com', 'Nam', NULL, NULL, '2021-10-13', '2021-12-06 10:22:52', '2021-12-06 10:22:52');

--
-- Bẫy `user`
--
DELIMITER $$
CREATE TRIGGER `dl_bf_user` BEFORE DELETE ON `user` FOR EACH ROW BEGIN
    DELETE FROM `comment` WHERE id_user = OLD.id;
    DELETE FROM follow WHERE id_user = OLD.id;
    DELETE FROM like_comment WHERE id_user = OLD.id;
    DELETE FROM login WHERE id_user = OLD.id;
    DELETE FROM readed WHERE id_user = OLD.id;
    
    UPDATE comic SET id_user = 0, updated_at = NOW() WHERE id_user = OLD.id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_bf_user` BEFORE INSERT ON `user` FOR EACH ROW BEGIN
    SET NEW.created_at = NOW();
    SET NEW.updated_at = NOW();
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chapter`
--
ALTER TABLE `chapter`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_chap_id` (`id_comic`,`index`);

--
-- Chỉ mục cho bảng `comic`
--
ALTER TABLE `comic`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `login`
--
ALTER TABLE `login`
  ADD UNIQUE KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `other_name_comic`
--
ALTER TABLE `other_name_comic`
  ADD PRIMARY KEY (`id_comic`,`other_name`);

--
-- Chỉ mục cho bảng `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_page_id` (`id_chapter`,`index`);

--
-- Chỉ mục cho bảng `readed`
--
ALTER TABLE `readed`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tag_comic`
--
ALTER TABLE `tag_comic`
  ADD PRIMARY KEY (`id_comic`,`id_tag`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chapter`
--
ALTER TABLE `chapter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT cho bảng `comic`
--
ALTER TABLE `comic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT cho bảng `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `follow`
--
ALTER TABLE `follow`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT cho bảng `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT cho bảng `readed`
--
ALTER TABLE `readed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT cho bảng `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `other_name_comic`
--
ALTER TABLE `other_name_comic`
  ADD CONSTRAINT `other_name_comic_ibfk_1` FOREIGN KEY (`id_comic`) REFERENCES `comic` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
