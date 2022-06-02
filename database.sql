-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 20, 2021 lúc 01:02 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `database`
--
CREATE DATABASE IF NOT EXISTS `database` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `database`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'img/avatar/avatar.png',
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sodu` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ngaysinh` date NOT NULL,
  `phanquyen` int(1) NOT NULL DEFAULT 2,
  `activated` bit(1) DEFAULT b'0',
  `activate_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `avatar`, `username`, `firstname`, `lastname`, `password`, `sodu`, `email`, `ngaysinh`, `phanquyen`, `activated`, `activate_token`) VALUES
(5, 'img/avatar/avatar.png', 'duydev', 'Nguyen', 'Duy', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 470000, 'nguyenduy01645@gmail.com', '2001-05-10', 1, b'1', ''),
(9, 'img/avatar/avatar.png', 'duyuser', 'Nguyen', 'Duy', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'duyuser@gmail.com', '2001-05-10', 2, b'1', ''),
(7, 'img/avatar/avatar.png', 'Facebook', 'Facebook', 'team', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'fb@gmail.com', '1976-05-10', 1, b'1', ''),
(8, 'img/avatar/avatar.png', 'Garena', 'Garena', 'Ga ran', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'Ga@gmail.com', '1998-05-10', 1, b'1', ''),
(6, 'img/avatar/avatar.png', 'Google LLC', 'Google', 'LLC', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'gg@gmail.com', '1985-05-10', 1, b'1', ''),
(4, 'img/avatar/avatar.png', 'haudev', 'Tran', 'Hau', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'hautranfriends2506@gmail.com', '2001-06-25', 1, b'1', ''),
(10, 'img/avatar/avatar.png', 'hauuser', 'Tran', 'Hau', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'hauuser@gmail.com', '2001-06-25', 2, b'1', ''),
(11, 'img/avatar/avatar.png', 'hunguser', 'Nguyen', 'Hung', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'hunguser@gmail.com', '2000-09-22', 2, b'1', ''),
(2, 'img/avatar/avatar.png', 'thaiad', 'Phan', 'Thai', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'thaijangad@gmail.com', '2000-02-16', 0, b'1', ''),
(1, 'img/avatar/avatar.png', 'thaidev', 'Phan', 'Thai', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'thaijang@gmail.com', '1994-06-28', 1, b'1', ''),
(3, 'img/avatar/avatar.png', 'thaiuser', 'Phan', 'Thai', '$2y$10$UA6d8dqFhh5T1WWWNZGeDetmVrMw8rGwndxxQijdKfBdte8z4l9wm', 0, 'thaijanguser@gmail.com', '2001-12-19', 2, b'1', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `apps`
--

CREATE TABLE `apps` (
  `id` int(11) NOT NULL,
  `tenapp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maloai` bit(1) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phienban` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `danhgia` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `theloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhaphattrien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `luottai` int(11) DEFAULT 0,
  `phi` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `traphiud` int(11) NOT NULL,
  `namph` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `apps`
--

INSERT INTO `apps` (`id`, `tenapp`, `hinhanh`, `maloai`, `link`, `phienban`, `danhgia`, `mota`, `theloai`, `nhaphattrien`, `luottai`, `phi`, `traphiud`, `namph`) VALUES
(1, 'Facebook', 'img/apps/facebook.png', b'0', 'Facebook.zip', '316.116', '3.9 star', 'Cập nhật thông tin từ bạn bè nhanh chóng hơn bao giờ hết. Chia sẻ cập nhật, ảnh và video. Nhận thông báo khi bạn bè thích và bình luận về bài viết của bạn.', 'social', 'Facebook', 57542, 'Miễn phí', 0, '2007'),
(2, 'Youtube', 'img/apps/youtube.png', b'0', 'YouTube.zip', '16.16', '4.2 star', 'Tải ứng dụng YouTube chính thức trên điện thoại và máy tính bảng Android. Xem mọi người đang xem gì - từ video ca nhạc hấp dẫn nhất đến nội dung phổ biến trong trò chơi, thời trang, làm đẹp, tin tức, học tập và hơn thế nữa.', 'media', 'Google LLC', 17532, 'Miễn phí', 0, '2010'),
(3, 'Zalo', 'img/apps/zalo.png', b'0', 'Zalo.zip', '21.0', '4.8 star', 'Zalo là ứng dụng nhắn tin kiểu mới và kết nối cộng đồng hàng đầu cho người dùng di động Việt. Tốc độ gửi tin nhắn cực nhanh, bạn luôn nhận được thông báo khi có tin nhắn mới kể cả khi không mở ứng dụng. Thể hiện cảm xúc với emoticon và hình động vui nhộn.', 'social', 'thaidev', 11230, 'Miễn phí', 0, '2014'),
(4, 'Cut The Rope', 'img/games/Cut-The-Rope-Magic.png', b'1', 'Rope.zip', '1.16', '4.5 star', 'ĐIỂM NỔI BẬT MỚI THÚ VỊ\r\nMột thế giới ma thuật với đồ họa, âm thanh và lối chơi hoàn toàn mới.\r\n6 cách để biến Om Nom thành các sinh vật ma thuật trên hành trình của chú.\r\nCác cấp độ của trùm phức tạp sẽ thách thức các kỹ năng cắt dây.', 'puzzle', 'duydev', 7545, 'Miễn phí', 0, '2015'),
(5, 'Genshin Impact', 'img/games/genshin.png', b'1', 'Genshin.zip', '1.25', '4.3 star', 'Genshin Impact là một game nhập vai phiêu lưu thế giới mở mới được phát triển bởi miHoYo. Bạn sẽ khám phá một thế giới giả tưởng có tên là \"Lục địa Teyvat\" trong trò chơi. Lục địa Teyvat rộng lớn, nơi vô số sinh vật sinh sôi và hội tụ.', 'adventure and survival', 'thaidev', 13245, 'Tính phí', 15000, '2019'),
(6, 'Temple Run 2', 'img/games/templerun.png', b'1', 'Temple Run.zip', '1.76', '4.0 star', 'Điều hướng vách đá nguy hiểm, dòng zip, hầm mỏ và rừng như bạn cố gắng trốn thoát với các thần tượng bị nguyền rủa. Làm thế nào đến nay bạn có thể chạy ?!', 'role playing', 'thaidev', 3301, 'Tính phí', 30000, '2017'),
(7, 'Subway Surfers', 'img/games/subway.png', b'1', 'Subway.zip', '1.25', '4.7 star', 'Giúp Jake, Tricky & Fresh thoát khỏi Thanh tra khó tính và con chó của anh ta.\r\nXay xe lửa với phi hành đoàn tuyệt vời của bạn! Đồ họa HD đầy màu sắc và sống động !', 'role playing', 'duydev', 8800, 'Miễn phí', 0, '2016'),
(8, 'Hungry Shark', 'img/games/hungrysharkworld-icon.png', b'1', 'Shark.zip', ' 8.5', '4.2 star', 'Hãy điều khiển một con Cá Mập Đói và đi vào một cuộc tấn công điên cuồng trên đại dương, sống sót càng lâu càng tốt bằng cách ăn mọi thứ và mọi người theo cách của bạn !\r\n', 'causual', 'Garena', 5100, 'Miễn phí', 0, '2018'),
(9, 'LMHT Tốc Chiến', 'img/games/wildrift.png', b'1', 'LMHT.zip', '2.25', '4.3 star', 'Hãy hòa mình vào Tốc Chiến: trải nghiệm MOBA 5 đấu 5 thuần kỹ năng và chiến thuật trong Liên Minh Huyền Thoại của Riot Games, nay được tái xây dựng hoàn toàn dành cho thiết bị di động. Với hệ thống điều khiển trơn tru và lối chơi siêu tốc.\r\n', 'adventure and survival', 'Garena', 2800, 'Miễn phí', 0, '2020'),
(10, 'Liên Quân Mobile', 'img/games/lienquan.png', b'1', 'Liên Quân.zip', '1.40', '3.8 star', 'Hãy khẳng định bản thân, sát cánh đồng đội và thách đấu hàng triệu người chơi khác qua vô số những cuộc chiến 5v5 cực hay trên đấu trường huyền thoại MOBA Esports 5v5 của Garena Liên Quân Mobile – thắng bại tại kỹ năng! Tham gia ngay nào !', 'adventure and survival', 'Garena', 6900, 'Miễn phí', 0, '2017'),
(11, 'Baemin', 'img/apps/baemin.png', b'0', 'BAEMIN.zip', '0.78', '4.6 star', 'Cả nhà thân mến,\r\nBAEMIN đã tới Sài Gòn để giúp bạn \"thưởng thức món ngon ở nơi mình thích\". Hãy cùng BAEMIN ăn ngon mỗi ngày một cách tiện lợi, nhanh chóng và tràn ngập niềm vui!\r\nỨng dụng BAEMIN có rất nhiều điều thú vị, bạn đã thử chưa?', 'shopping', 'Facebook', 3546, 'Miễn phí', 0, '2019'),
(12, 'Gmail', 'img/apps/gmail.png', b'0', 'Gmail.zip', '2021.04', '4.5 star\r\n', 'Gmail là một dễ dàng để sử dụng ứng dụng email giúp bạn tiết kiệm thời gian và giữ tin nhắn của bạn an toàn. Nhận tin nhắn của bạn ngay lập tức thông qua các thông báo đẩy, đọc và trả lời trực tuyến và ngoại tuyến.', 'communication', 'Google LLC', 25987, 'Miễn phí', 0, '2010'),
(13, 'Gojek', 'img/apps/gojek.png', b'0', 'Gojek.zip', '4.18', '4.0 star', 'Một ngày suôn sẻ không thể thiếu Gojek:\r\nMột thoáng GoRide: Đưa bạn đi khắp phố phường với mức giá yêu thương.\r\nMột vài GoFood: Tận hưởng món ngon mọi lúc mọi nơi.\r\nMột chút GoSend: Sẵn sàng giao hàng giúp bạn bất kỳ lúc nào', 'maps and navigation ', 'haudev', 4231, 'Miễn phí', 0, '2020'),
(14, 'Free Fire', 'img/games/freefire.png', b'1', 'Free Fire.zip', '5.14', '4.2 star', 'Free Fire là tựa game bắn súng sinh tồn hot nhất trên mobile. Không mất quá nhiều thời gian cho người chơi, mỗi 10 phút bạn có thể chiến đấu với 49 người chơi khác, tất cả vì mục tiêu tồn tại đến cuối cùng. ', 'adventure and survival', 'Garena', 9863, 'Miễn phí', 0, '2017'),
(15, 'Instagram', 'img/apps/instagram.png', b'0', 'Instagram.zip', '0.36', '4.1 star', 'Đưa bạn đến gần mọi người và những gì mình yêu thích. — Instagram from Facebook. Kết nối với bạn bè, chia sẻ những việc bạn đang làm hoặc xem tin tức mới của những người khác trên khắp thế giới.', 'social', 'Facebook', 12462, 'Miễn phí', 0, '2012'),
(16, 'Messenger', 'img/apps/messenger.png', b'0', 'Messenger.zip', '0.20', '3.9 star', 'Tụ họp bên nhau mọi lúc bằng ứng dụng giao tiếp đa năng, miễn phí* của chúng tôi, hoàn chỉnh với các tính năng nhắn tin, gọi thoại, gọi video và nhóm chat video không giới hạn. Dễ dàng đồng bộ tin nhắn và danh bạ với điện thoại Android.', 'social', 'Facebook', 15896, 'Miễn phí', 0, '2014'),
(17, 'NhacCuaTui', 'img/apps/NhacCuaTui.png', b'0', 'NhacCuaTui.zip', '6.3', '4.2 star', '\"NhacCuaTui (Nhạc Của Tui) là ứng dụng nghe nhạc mp3 online và offline với kho nhạc phong phú, đầy đủ các thể loại âm nhạc. Thỏa sức thưởng thức kho nhạc bản quyền, xem lyrics, tạo playlist cá nhân. Hãy tải về ngay !\r\n', 'music and audio', 'haudev', 5421, 'Miễn phí', 0, '2010'),
(18, 'TikTok', 'img/apps/tiktok.png', b'0', 'TikTok.zip', '17.8', '4.4 star', 'TikTok là mạng xã hội cực HOT về video nơi mọi người chia sẻ các clip ngắn được truyền cảm hứng bằng âm nhạc. Bất kể là nhảy, múa, phong cách tự do hay biểu diễn tài năng, người dùng được khuyến khích để cho trí tưởng tượng bay cao bay xa.', 'media', 'Facebook', 8752, 'Miễn phí', 0, '2017'),
(19, 'Shopee', 'img/apps/shoppe.png', b'0', 'Shopee.zip', '2.7', '4.2 star', 'Chào mừng đến SHOPEE - điểm đến cho mọi nhu cầu mua sắm, bán hàng và giải trí. Ứng dụng được cải tiến liên tục để mang đến cho bạn trải nghiệm mua bán vui vẻ nhất.\r\nMUA SẮM ONLINE NHANH CHÓNG MỌI LÚC, MỌI NƠI\r\n\r\n\r\n', 'shopping', 'Google LLC', 14230, 'Miễn phí', 0, '2015'),
(20, 'Twitter', 'img/apps/twitter.png', b'0', 'Twitter.zip', '8.91', '3.9 star', 'Mở rộng mạng xã hội của bạn và cập nhật những gì đang thịnh hành hiện nay. Tweet lại, đăng trên một chủ đề, lan truyền hoặc chỉ cuộn qua dòng thời gian Twitter để cập nhật những gì đang xảy ra.', 'social', 'Google LLC', 10213, 'Miễn phí', 0, '2010'),
(21, 'Ball Pit Ball', 'img/games/ball.png', b'1', 'ball.zip', '1.0', '4.4 star', 'Thưởng thức trò chơi Word 2021 - Trò chơi 2D ngoại tuyến miễn phí để mang lại niềm vui tuyệt vời nhất .\r\nDễ dàng chơi trò chơi này, mục tiêu quy tắc của Trò chơi chữ 2021 này là Vui vẻ và đầy thử thách.\r\n', 'causual', 'haudev', 8354, 'Miễn phí', 0, '2021'),
(22, 'Realm Defense', 'img/games/Realm-Defense.png', b'1', 'Realm.zip', '2.65', '4.0 star', 'Hậu vệ! Bạn sẽ chú ý đến lời kêu gọi bảo vệ vương quốc chứ? Bạn đã sẵn sàng tham gia trò chơi phòng thủ tháp hoành tráng nhất và trở thành vua của các anh hùng mà vương quốc cần chưa? Vô số anh hùng và tòa tháp đang chờ đợi sức mạnh chiến lược của bạn.', 'causual', 'haudev', 6532, 'Tính phí', 20000, '2021'),
(23, 'Snake Worm Zone', 'img/games/snake.png', b'1', 'Snake.zip', '1.01', '4.3 star', 'Snake Worm Zone Rivals iO 2021 là một trò chơi tuyệt vời. Trải nghiệm cách trườn mới cùng với vùng sâu Snake io yêu thích của bạn. Snake Worm Zone Rivals iO là trò chơi phổ biến nhất hiện nay và được chơi rộng rãi ở nhiều nơi trên thế giới.\r\n', 'causual', 'thaidev', 8525, 'Tính phí', 10000, '2021'),
(24, 'Spotify', 'img/apps/spotify.png', b'0', 'Spotify.zip', '8.6', '4.6 star', 'Nghe nhạc thả phanh cùng Spotify, dịch vụ truyền phát nhạc trực tuyến miễn phí hàng đầu thế giới, để thăng hoa tâm hồn không giới hạn.\r\nSpotify đáp ứng mọi nhu cầu nhạc, vào mọi nơi, mọi lúc.\r\n', 'music and audio', 'Facebook', 9863, 'Tính phí', 65000, '2018'),
(25, 'Money Lover', 'img/apps/moneylover.png', b'0', 'Money.zip', '19.0', '4.1 star', 'Money Lover sẽ giúp bạn bằng việc theo dõi các khoản thu chi hàng ngày, lập kế hoạch chi tiêu hợp lý với tính năng ngân sách, theo dõi các khoản tiết kiệm, vay nợ với chỉ một ứng dụng đơn giản, trực quan trên điện thoại. ', 'education', 'haudev', 1986, 'Tính phí ', 15000, '2021'),
(26, 'YmeetMe', 'img/apps/ymeetme.png', b'0', 'YmeetMe.zip', '7.6', '3.7 star', 'Là ứng dụng hẹn hò hiệu quả và nghiêm túc đầu tiên dành riêng cho người độc thân, cùng với hơn 2,500,000 thành viên và hàng trăm nghìn người dùng thường xuyên mỗi ngày, đây sẽ là cơ hội tuyệt vời để bạn có thể kết bạn mới, làm quen, chat và hẹn hò.', 'social', 'haudev', 1532, 'Miễn phí', 0, '2021'),
(27, 'Ok Cupid', 'img/apps/okcupid.png', b'0', 'OkCupid.zip', '52.3', '3.5 star', 'Những cuộc hẹn hò tuyệt vời đến từ những kết nối tuyệt vời - đó là lý do tại sao OkCool thể hiện bạn là ai ngoài một bức ảnh. Tìm tình yêu dựa trên những gì làm cho bạn, tốt, bạn - bởi vì bạn xứng đáng với nó.\r\n', 'social', 'thaidev', 1230, 'Miễn phí', 0, '2021'),
(29, 'Hangouts', 'img/apps/hangout.png', b'0', 'Hangouts.zip', '37.0', '4.2 star', 'Sử dụng Hangouts để giữ liên lạc. Tin liên lạc, bắt đầu video hoặc cuộc gọi thoại miễn phí, và nhảy vào một cuộc trò chuyện với một người hoặc một nhóm. Bao gồm tất cả các địa chỉ liên lạc của bạn với cuộc trò chuyện nhóm lên đến 150 người.\r\n', 'communication', 'Google LLC', 15634, 'Miễn phí', 0, '2013'),
(30, 'Skype', 'img/apps/skype.png', b'0', 'Skype.zip', '8.71', '4.5 star', 'Sử dụng Skype để gửi tin nhắn SMS đến điện thoại di động trên toàn thế giới và với kết nối SMS, giờ đây bạn cũng có thể đọc và trả lời tin nhắn SMS trên điện thoại ngay từ máy tính của mình. Kết nối SMS sẽ được phát hành dần.\r\n', 'communication', 'Google LLC', 11248, 'Miễn phí', 0, '2010'),
(31, 'Duolingo', 'img/apps/dulingo.png', b'0', 'Duolingo.zip', '5.7', '4.7 star', '\"Vượt xa cả những ứng dụng học tập ngoại ngữ miễn phí tốt nhất\".\r\n\"Duolingo có thể nắm giữ bí mật hướng tới tương lai của nền giáo dục.\"\r\n\"Giữa vô số các ứng dụng học tập hoặc thực hành ngôn ngữ, bạn chẳng thể nào đánh bại Duolingo\".', 'education', 'duydev', 5893, 'Miễn phí', 0, '2021'),
(32, 'Onluyen', 'img/apps/onluyen.png', b'0', 'Onluyen.zip', '2.3', '4.6 star', 'Onluyen.vn cung cấp chế độ luyện tập phù hợp cho mọi đối tượng học sinh:\r\n- Chinh phục 9 -10 với ngân hàng câu hỏi vận dụng – vận dụng cao dành cho các bạn khá giỏi\r\n- Nâng cao năng lực với bài tập tổng hợp dành cho các bạn trung bình - khá', 'education', 'duydev', 3214, 'Miễn phí', 0, '2021'),
(33, 'vnEdu', 'img/apps/vnedu.png', b'0', 'vnEdu.zip', '2.5', '4.4 star', 'vnEdu Connect là ứng dụng tiện ích dành cho Phụ huynh Học sinh trên Hệ sinh thái Mạng Giáo dục Việt Nam vnEdu, giúp kết nối giữa Phụ huynh Học sinh và nhà trường. Ứng dụng cho phép Phụ huynh cập nhật tức thời thông tin của con em mình tại nhà trường.\r\n', 'education', 'duydev', 2514, 'Miễn phí', 0, '2021'),
(36, 'Google Maps', 'img/apps/bando.png', b'0', 'Maps.zip', '10.67', '4.3 star', 'Tìm đường nhanh hơn và dễ dàng hơn bằng Google Maps. Hơn 220 quốc gia và vùng lãnh thổ được lập bản đồ cũng như hàng trăm triệu doanh nghiệp và địa điểm đã có mặt trên bản đồ. Xem thông tin đường đi qua GPS, thông tin về tình hình giao thông.', 'maps and navigation ', 'Google LLC', 19231, 'Miễn phí', 0, '2010'),
(37, 'Grab', 'img/apps/grab.png', b'0', 'Grab.zip', '5.14', '4.5 star', 'Grab là ứng dụng đặt xe số 1 Đông Nam Á, dịch vụ đồ ăn, hàng tạp hóa, mua sắm, giao hàng và giải pháp thanh toán tiền điện tử không tiền mặt. Với ứng dụng Grab mới, bạn sẽ có dịch vụ đặt xe riêng và taxi thuận tiện nhất từ ​​cộng đồng tài xế.', 'maps and navigation ', 'Google LLC', 12752, 'Miễn phí', 0, '2018'),
(38, 'Be', 'img/apps/be.png', b'0', 'be.zip', '2.59', '4.1 star', 'Be cung cấp dịch vụ đặt xe máy, xe hơi, mua vé xe khách, giao hàng nhanh... với chất lượng vượt trội, đội ngũ Tài xế vui vẻ, chu đáo và chuyên nghiệp với chương trình đào tạo bài bản.\r\nDịch vụ của Be :\r\nBe Ride Hailing và BeFinancial\r\n', 'maps and navigation ', 'Google LLC', 5478, 'Miễn phí', 0, '2019'),
(39, 'Zing Mp3', 'img/apps/zing.png', b'0', 'Zing.zip', '20.1', '3.9 star', 'Các tính năng nổi bật:\r\n- Chơi được hầu hết các định dạng nhạc phổ biến, hỗ trợ cả nhạc lossless.\r\n- Có widget, music controller ở thanh thông báo và cả ở màn hình khóa.', 'music and audio', 'Google LLC', 7452, 'Miễn phí', 0, '2014'),
(40, 'Music Player MP3 ', 'img/apps/musicplayer.png', b'0', 'Music.zip', '2.56', '4.1 star', 'Trình phát nhạc là trình phát nhạc tốt nhất cho Android . Với bộ cân bằng tuyệt đẹp, tất cả các định dạng được hỗ trợ và giao diện người dùng phong cách, Trình phát nhạc cung cấp trải nghiệm âm nhạc tốt nhất cho bạn. ', 'music and audio', 'Facebook', 5422, 'Miễn phí', 0, '2018'),
(41, 'Amazon', 'img/apps/amazon.png', b'0', 'Amazon.zip', '22.7', '4.4 star', 'Khách hàng có thể mua sắm hàng triệu sản phẩm trên bất kỳ trang web nào của Amazon trên khắp thế giới từ một ứng dụng duy nhất. Sử dụng Alexa để giúp bạn mua sắm — chỉ cần sử dụng giọng nói của bạn để tìm kiếm sản phẩm trên Amazon.', 'shopping', 'Google LLC', 8546, 'Miễn phí', 0, '2014'),
(42, 'Tiki', 'img/apps/tiki.png', b'0', 'Tiki.zip', '4.7', '4.3 star', 'Giá tốt khỏi lo nghĩ từ các nhà bán hàng uy tín, từ đồ điện tử, vật dụng hằng ngày, hàng tiêu dùng, tất cả đều có.\r\nGiao nhanh vô đối: Chọn lựa hàng trăm ngàn sản phẩm giao trong 2 tiếng/trong ngày, lại còn được xem hàng trước khi trả tiền.', 'shopping', 'Facebook', 9546, 'Miễn phí', 0, '2015'),
(43, 'Brain Out', 'img/games/brainout.png', b'1', 'Brain.zip', '1.65', '4.7 star', 'Các câu hỏi vô cùng hại não với những lời giải cực sốc.\r\nGame thách thức đầy vui nhộn và làm xáo trộn trí tưởng tượng của bạn.\r\nSự kết hợp thử thách hoàn hảo giữa IQ và tư duy logic, phản xạ, trí nhớ và khả năng sáng tạo.\r\n', 'puzzle', 'duydev', 6545, 'Miễn phí', 0, '2020'),
(44, 'Sudoku', 'img/games/sudoku.png', b'1', 'Sudoku.zip', '3.4', '4.4 star', 'Trò chơi giải đố Sudoku miễn phí là một trò chơi giải đố Brain Sudoku được chào đón và gây nghiện trên Google Play. Bạn có thể tải xuống ứng dụng Sudoku miễn phí cho điện thoại và máy tính bảng Android của mình. ', 'puzzle', 'Garena', 7452, 'Miễn phí', 0, '2017'),
(45, 'AFK Arena', 'img/games/apkarena.png', b'1', 'AFK.zip', '1.62', '4.8 star', 'Một game nhập vai cổ điển với vẻ đẹp nghệ thuật tuyệt vời. Hãy quay trở lại và tận hưởng nó!\r\nVừa chơi vừa thư giãn\r\nHãy chiến lược hóa! Kết hợp các anh hùng, kỹ năng và tiền thưởng phe phái để vượt qua kẻ thù của bạn !\r\n', 'role playing', 'Garena', 9987, 'Miễn phí', 0, '2019'),
(46, 'Lord of Heroes', 'img/games/lordofheroes.png', b'1', 'Heroes.zip', '1.1', '4.9 star', 'Trò chơi có thể chỉ đơn thuần là thứ bạn thích khi buồn chán hoặc có thời gian để giết, nhưng chúng cũng có thể truyền cảm hứng và ảnh hưởng đến bạn theo những cách mà sách, TV, video trực tuyến và các phương tiện khác không làm được.\r\n', 'role playing', 'Garena', 12313, 'Miễn phí', 0, '2018'),
(47, 'VivaVideo', 'img/apps/vivavideo.png', b'0', 'VivaVideo.zip', '8.85', '4.1 star', 'Ứng dụng chỉnh sửa video chuyên nghiệp\r\nVivaVideo là ứng dụng Trình chỉnh sửa video mạnh mẽ cho ứng dụng Android dành cho Android được trao tặng bởi các blogger Android hàng đầu.\r\n\r\n', 'media', 'Garena', 9722, 'Miễn phí', 0, '2018'),
(48, 'Adobe Premiere Rush', 'img/apps/Ru.png', b'0', 'Rush.zip', '1.56', '4.2 star', 'Quay, chỉnh sửa và chia sẻ video trực tuyến ở mọi nơi. Cung cấp cho các kênh của bạn một luồng ổn định tuyệt vời với Adobe Premiere Rush, trình chỉnh sửa video đa thiết bị, tất cả trong một.  ', 'media', 'Facebook', 6429, 'Miễn phí', 0, '2016');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `theloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `app` bit(1) NOT NULL,
  `game` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`theloai`, `ten`, `app`, `game`) VALUES
('adventure and survival', 'Phiêu lưu và sinh tồn', b'0', b'1'),
('causual', 'Thông thường', b'0', b'1'),
('communication', 'Liên lạc', b'1', b'0'),
('education', 'Giáo dục', b'1', b'0'),
('maps and navigation ', 'Bản đồ và dẫn đường', b'1', b'0'),
('media', 'Xem và sửa vieo', b'1', b'0'),
('music and audio', 'Nhạc và Âm thanh', b'1', b'0'),
('puzzle', 'Câu đố', b'0', b'1'),
('role playing', 'Nhập vai', b'0', b'1'),
('shopping', 'Mua sắm', b'1', b'0'),
('social', 'Mạng xã hội', b'1', b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `down_apps`
--

CREATE TABLE `down_apps` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maapp` int(11) NOT NULL,
  `tenapp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `down_apps`
--

INSERT INTO `down_apps` (`id`, `username`, `maapp`, `tenapp`, `hinhanh`) VALUES
(1, 'thaidev', 1, 'Facebook', 'img/apps/facebook.png'),
(2, 'thaidev', 46, 'Lord of Heroes', 'img/games/lordofheroes.png'),
(3, 'duydev', 6, 'Temple Run 2', 'img/games/templerun.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `item_rating`
--

CREATE TABLE `item_rating` (
  `ratingId` int(11) NOT NULL,
  `itemId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ratingNumber` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comments` text COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = Block, 0 = Unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `item_rating`
--

INSERT INTO `item_rating` (`ratingId`, `itemId`, `userId`, `ratingNumber`, `title`, `comments`, `created`, `modified`, `status`) VALUES
(49, 2, 6, 5, 'Video', 'Ứng dụng Youtube thật tuyệt vời', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(54, 1, 1, 3, 'Facebook', 'Ứng dụng Facebook hơi lag', '2021-05-14 12:41:31', '2021-05-14 12:41:31', 1),
(61, 1, 5, 5, 'Facebook', 'Ứng dụng Facebook quá tuyệt vời', '2021-05-14 12:41:31', '2021-05-14 12:41:31', 1),
(62, 2, 7, 5, 'Video', 'Ứng dụng Youtube thật hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(63, 1, 4, 3, 'Facebook', 'Không thể mở lại tài khoản bị khóa của tôi', '2021-05-14 12:41:31', '2021-05-14 12:41:31', 1),
(64, 2, 8, 5, 'Video', 'Ứng dụng Youtube bổ sung', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(65, 3, 9, 5, 'Mạng xã hội', 'Ứng dụng Zalo rất tiện ích', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(66, 3, 10, 5, 'Mạng xã hội', 'Ứng dụng Zalo rất hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(67, 3, 11, 5, 'Mạng xã hội', 'Ứng dụng Zalo tiện lợi', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(68, 4, 3, 5, 'Game', 'Game rất bổ ích', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(69, 4, 7, 5, 'Game', 'Game rất vui ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(70, 4, 4, 5, 'Game', 'Game hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(71, 5, 11, 5, 'Game ', 'Game sinh động', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(72, 5, 8, 4, 'Game ', 'Game lôi cuốn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(73, 5, 6, 5, 'Game ', 'Game đồ họa đẹp', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(74, 6, 10, 5, 'Game ', 'Game nhập vai lôi cuốn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(75, 6, 11, 4, 'Game ', 'Game hơi lag', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(76, 6, 3, 5, 'Game ', 'Game trẻ em rất thích', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(77, 7, 4, 5, 'Game ', 'Game tuổi thơ của tôi', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(78, 7, 5, 5, 'Game ', 'Game vui nhộn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(79, 7, 6, 5, 'Game ', 'Game đơn giản dễ chơi', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(80, 8, 7, 5, 'Game ', 'Game hơi nặng dung lượng', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(81, 8, 8, 5, 'Game ', 'Game rất hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(82, 8, 9, 5, 'Game ', 'Game đồ họa ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(83, 9, 10, 5, 'Game ', 'Game hot', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(84, 9, 11, 5, 'Game ', 'Game rất hay\r\n', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(85, 9, 3, 4, 'Game ', 'Game dung lượng cao', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(86, 9, 4, 5, 'Game ', 'Game hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(87, 10, 5, 5, 'Game ', 'Game cực kỳ hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(88, 10, 6, 5, 'Game ', 'Game được ưa chuộng\r\n', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(89, 10, 7, 4, 'Game ', 'Game chiếm dung lượng cao', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(90, 11, 8, 5, 'Đồ ăn ', 'Shipper giao hàng nhanh', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(91, 11, 9, 5, 'Đồ ăn ', 'Shipper thân thiện', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(92, 11, 10, 5, 'Đồ ăn ', 'Hãy tuyển nhiều shipper đẹp trai thêm', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(93, 12, 11, 5, 'Gmail', 'Gửi email nhanh chóng', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(94, 12, 3, 5, 'Gmail', 'Rất tiện ích', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(95, 12, 4, 5, 'Gmail', 'Mọi người hãy tải gmail nha', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(96, 13, 5, 5, 'Gojeck', 'Bắt xe nhanh chóng', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(97, 13, 6, 5, 'Gojeck', 'Nhiều voucher hấp dẫn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(98, 13, 7, 4, 'Gojeck', 'Tôi muốn book được tài xế đẹp trai !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(99, 14, 8, 4, 'Game', 'Game nặng làm điện thoại lag', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(100, 14, 9, 5, 'Game', 'Game lôi cuốn !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(101, 14, 10, 5, 'Game', 'Game cuốn hút', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(102, 15, 11, 5, 'Instagram', 'Nhiều filter rất ảo, tôi rất thích !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(103, 15, 3, 5, 'Instagram', 'Tôi follow nhiều trai đẹp nhờ instagram !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(104, 15, 4, 5, 'Instagram', 'Mọi người follow IG của tôi nhé !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(105, 16, 5, 5, 'Messenger', 'Tôi nhắn tin hằng ngày với bạn bè nhờ app này !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(106, 16, 6, 5, 'Messenger', 'Nhiều nhãn dán đẹp', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(107, 16, 7, 4, 'Messenger', 'Tôi block kẻ không thích tôi rồi ! =))', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(108, 17, 8, 5, 'NCT', 'Nhiều bài nhạc rất hay !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(109, 17, 9, 4, 'NCT', 'Quảng cáo nhiều', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(110, 17, 10, 5, 'NCT', 'Ứng dụng nghe nhạc hàng đầu !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(111, 18, 11, 5, 'Tiktok', 'Nhiều trend trên này rất thú vị !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(112, 18, 4, 5, 'Tiktok', 'Nhiều trai đẹp trên này !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(113, 18, 3, 5, 'Tiktok', 'Coi giải trí rất thích hợp !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(114, 19, 5, 5, 'Shopee', 'Mua gì cũng có, mua hết tại shopee !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(115, 19, 6, 5, 'Shopee', 'Nhiều vouncher hấp dẫn !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(116, 19, 7, 5, 'Shopee', 'Đồ rất hợp giá tiền !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(117, 20, 8, 5, 'Twitter', 'Đọc tin tức cũng ổn !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(118, 20, 9, 5, 'Twitter', 'Dùng xem các video hot rất tuyệt vời ! :))', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(119, 20, 10, 5, 'Twitter', 'Tôi là thành viên của onlyfans !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(120, 21, 11, 5, 'Game', 'Game dễ chơi', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(121, 21, 8, 5, 'Game', 'Game hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(122, 21, 3, 4, 'Game', 'Game đơn giản', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(123, 22, 4, 5, 'Game', 'Game chiến thuật rất hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(124, 22, 5, 5, 'Game', 'Game đồ họa khá đẹp', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(125, 22, 6, 4, 'Game', 'Phải đợi để ra ải mới !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(126, 23, 7, 5, 'Game', 'Game thật căng thẳng đấu tranh', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(127, 23, 8, 4, 'Game', 'Game đơn giản', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(128, 23, 9, 5, 'Game', 'Game vui', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(129, 24, 10, 5, 'Spotify', 'App nghe nhạc hàng đầu ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(130, 24, 11, 5, 'Spotify', 'Nghe những bản nhạc ở chất lượng cao\r\n', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(131, 24, 3, 4, 'Spotify', 'Không có tiền mua tài khoản ! :((\r\n', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(132, 25, 4, 4, 'App', 'Ủng hộ dev Việt Nam', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(133, 25, 5, 5, 'App', 'App giúp bạn quản lí chi tiêu', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(134, 25, 6, 5, 'App', 'Mới tải về, chưa sử dụng', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(135, 26, 7, 5, 'Dating', 'Hãy thử hẹn hò trên app này', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(136, 26, 8, 4, 'Dating', 'Không có nhiều người để match', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(137, 26, 9, 5, 'Dating', 'Tôi đã có người yêu nhờ app này !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(138, 27, 10, 5, 'Dating', 'Muốn có bồ hãy tải app này về dùng', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(139, 27, 11, 4, 'Dating', 'Cũng ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(140, 27, 4, 5, 'Dating', 'Match được một số bạn trên này để tìm hiểu', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(141, 29, 3, 5, 'Message\r\n', 'Dùng tốt để liên lạc ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(142, 29, 5, 4, 'Message\r\n', 'Một số chức năng chưa như mong muốn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(143, 29, 6, 5, 'Message\r\n', 'Dùng tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(144, 30, 7, 5, 'Message\r\n', 'App dùng để nhắn tin tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(145, 30, 8, 4, 'Message\r\n', 'App còn một số lỗi khi sử dụng', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(146, 30, 9, 5, 'Message\r\n', 'Dùng rất ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(147, 31, 10, 5, 'Education', 'App học tiếng anh rất tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(148, 31, 11, 5, 'Education', 'Học từ cơ bản đến nâng cao rất là hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(149, 31, 5, 5, 'Education', 'Bạn nào cần học tốt tiếng anh hãy tải về nha !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(150, 32, 3, 5, 'Education', 'App ôn tập cho các bạn THPT rất tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(151, 32, 4, 4, 'Education', 'Có bài app không giải được', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(152, 32, 6, 5, 'Education', 'Sử dụng cảm thấy khá tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(153, 33, 7, 5, 'Education', 'Theo dõi kết quá học tập của học sinh rất tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(154, 33, 8, 5, 'Education', 'Báo điểm về cho phụ huynh theo dõi quá trình học tập của học sinh', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(155, 33, 9, 4, 'Education', 'Nơi hạnh phúc gia đình tan vỡ khi hệ thống báo điểm về tin nhắn điện thoại', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(156, 36, 10, 5, 'Map', 'Tra cứu đường đi tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(157, 36, 11, 5, 'Map', 'Định vị tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(158, 36, 3, 4, 'Map', 'Nhiều lúc đi lạc do coi google map chỉ đường', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(159, 37, 4, 5, 'Grab', 'Nhiều chức năng như đặt xe, giao hàng ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(160, 37, 5, 4, 'Grab', 'Đặt đồ ăn nhanh', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(161, 37, 6, 5, 'Grab', 'Mong muốn có nhiều tài xế đẹp trai hơn !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(162, 38, 7, 5, 'Be', 'Giá rẻ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(163, 38, 8, 5, 'Be', 'Tiện nghi', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(164, 38, 9, 4, 'Be', 'Khá tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(165, 39, 10, 5, 'Zing mp3', 'Nghe nhạc ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(166, 39, 11, 4, 'Zing mp3', 'Nhiều quảng cáo', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(167, 39, 3, 5, 'Zing mp3', 'Dùng tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(168, 40, 4, 5, 'GG music', 'Dùng khá tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(169, 40, 5, 4, 'GG music', 'Nhiều bài không có trên ứng dụng này', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(170, 40, 6, 5, 'GG music', 'Dùng cũng khá ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(171, 41, 7, 5, 'Amazon', 'Mua nhiều món hàng chất lượng tốt trên đây', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(172, 41, 8, 5, 'Amazon', 'Dùng tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(173, 41, 9, 4, 'Amazon', 'Không có tiền mua hàng ! :((', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(174, 42, 10, 5, 'Tiki', 'Đặt hàng giao nhanh', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(175, 42, 11, 5, 'Tiki', 'Sản phẩm chất lượng ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(176, 42, 3, 4, 'Tiki', 'Nhiều sản phẩm giao bị lỗi', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(177, 43, 4, 5, 'Game', 'Game khiến mình động não rất tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(178, 43, 5, 4, 'Game', 'Không quá xuất sắc', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(179, 43, 6, 5, 'Game', 'Game chơi vui', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(180, 44, 7, 5, 'Game', 'Game thử thách trí thông minh ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(181, 44, 8, 5, 'Game', 'Game chơi vui', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(182, 44, 9, 4, 'Game', 'Game chơi khá ổn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(183, 45, 10, 4, 'Game', 'Game chơi khá hay', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(184, 45, 11, 5, 'Game', 'Đồ họa đẹp', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(185, 45, 7, 5, 'Game', 'Chơi hấp dẫn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(186, 46, 8, 5, 'Game', 'Chơi lôi cuốn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(187, 46, 5, 4, 'Game', 'Dung lượng cao', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(188, 46, 11, 4, 'Game', 'Cần ra nhiều nhân vật hơn', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(189, 47, 5, 5, 'Edit video', 'Edit video rất tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(190, 47, 1, 5, 'Edit video', 'Nhiều clip nóng bỏng được ra đời nhờ app chỉnh video này !', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(191, 47, 4, 4, 'Edit video', 'Dùng khá tốt', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(192, 48, 11, 5, 'Edit video', 'Edit video mượt mà', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(193, 48, 5, 5, 'Edit video', 'Dùng rất dễ', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(194, 48, 4, 4, 'Edit video', 'Dùng trên điện thoại hơi khó', '2021-05-12 13:53:01', '2021-05-12 13:53:01', 1),
(195, 5, 9, 3, 'Game nặng', 'Đồ họa không thực sự đẹp trên máy tôi', '2021-05-16 09:15:26', '2021-05-16 09:15:26', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(11) DEFAULT NULL,
  `active` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Bản nháp',
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `theloai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tggui` date DEFAULT '2021-05-18',
  `apk` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nhaphattrien` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'thaidev'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `type`, `name`, `price`, `active`, `description`, `image`, `theloai`, `tggui`, `apk`, `nhaphattrien`) VALUES
(1, 'Trò chơi', 'Magic Tiles 3', 0, 'Đang chờ duyệt', 'Đu đưa không phải là hư, đu đưa là để lắc lư cho đỡ buồn. Lắc lư luyện ngón ngay với Magic Tiles 3 nhé cùng 30 ngày chơi thử MIỄN PHÍ những bài hát HOT nhất trên Magic Tiles 3!', 'img/games/magic.png', 'Thông thường', '2021-05-18', 'Magic.zip', 'thaidev'),
(2, 'Trò chơi', 'Memory Game', 0, 'Đang chờ duyệt', 'Mỗi trò chơi sẽ giúp trẻ em xử lý thông tin và thực hành bộ nhớ nhận thức của trẻ thông qua các bài tập dễ dàng và vui vẻ.', 'img/games/Memory.png', 'Thông thường', '2021-05-18', 'Memory.zip', 'thaidev'),
(3, 'Ứng dụng', 'Facebook', 0, 'Đã được duyệt', 'Cập nhật thông tin từ bạn bè nhanh chóng hơn bao giờ hết. Chia sẻ cập nhật, ảnh và video. Nhận thông báo khi bạn bè thích và bình luận về bài viết của bạn.', 'img/apps/facebook.png', 'Mạng xã hội', '2021-05-18', 'Facebook.zip', 'Facebook'),
(4, 'Ứng dụng', 'Youtube', 0, 'Đã được duyệt', 'Tải ứng dụng YouTube chính thức trên điện thoại và máy tính bảng Android. Xem mọi người đang xem gì - từ video ca nhạc hấp dẫn nhất đến nội dung phổ biến trong trò chơi, thời trang, làm đẹp, tin tức, học tập và hơn thế nữa.', 'img/apps/youtube.png', 'Xem và sửa vieo', '2021-05-18', 'YouTube.zip', 'Google LLC'),
(5, 'Ứng dụng', 'Zalo', 0, 'Đã được duyệt', 'Zalo là ứng dụng nhắn tin kiểu mới và kết nối cộng đồng hàng đầu cho người dùng di động Việt. Tốc độ gửi tin nhắn cực nhanh, bạn luôn nhận được thông báo khi có tin nhắn mới kể cả khi không mở ứng dụng. Thể hiện cảm xúc với emoticon và hình động vui nhộn.', 'img/apps/zalo.png', 'Mạng xã hội', '2021-05-18', 'Zalo.zip', 'thaidev'),
(6, 'Trò chơi', 'Cut The Rope', 0, 'Đã được duyệt', 'ĐIỂM NỔI BẬT MỚI THÚ VỊ\r\nMột thế giới ma thuật với đồ họa, âm thanh và lối chơi hoàn toàn mới.\r\n6 cách để biến Om Nom thành các sinh vật ma thuật trên hành trình của chú.\r\nCác cấp độ của trùm phức tạp sẽ thách thức các kỹ năng cắt dây.', 'img/games/Cut-The-Rope-Magic.png', 'Câu đố', '2021-05-18', 'Rope.zip', 'duydev'),
(7, 'Trò chơi', 'Genshin Impact', 15000, 'Đã được duyệt', 'Genshin Impact là một game nhập vai phiêu lưu thế giới mở mới được phát triển bởi miHoYo. Bạn sẽ khám phá một thế giới giả tưởng có tên là \"Lục địa Teyvat\" trong trò chơi. Lục địa Teyvat rộng lớn, nơi vô số sinh vật sinh sôi và hội tụ.', 'img/games/genshin.png', 'Phiêu lưu và sinh tồn', '2021-05-18', 'Genshin.zip', 'thaidev'),
(8, 'Trò chơi', 'Temple Run 2', 30000, 'Đã được duyệt', 'Điều hướng vách đá nguy hiểm, dòng zip, hầm mỏ và rừng như bạn cố gắng trốn thoát với các thần tượng bị nguyền rủa. Làm thế nào đến nay bạn có thể chạy ?!', 'img/games/templerun.png', 'Nhập vai', '2021-05-18', 'Temple Run.zip', 'thaidev'),
(10, 'Trò chơi', 'Subway Surfers', 0, 'Đã được duyệt', 'Giúp Jake, Tricky & Fresh thoát khỏi Thanh tra khó tính và con chó của anh ta. Xay xe lửa với phi hành đoàn tuyệt vời của bạn! Đồ họa HD đầy màu sắc và sống động!', 'img/games/subway.png', 'Nhập vai', '2021-05-18', 'Subway.zip', 'duydev'),
(11, 'Trò chơi', 'Hungry Shark', 0, 'Đã được duyệt', 'Hãy điều khiển một con Cá Mập Đói và đi vào một cuộc tấn công điên cuồng trên đại dương, sống sót càng lâu càng tốt bằng cách ăn mọi thứ và mọi người theo cách của bạn !', 'img/games/hungrysharkworld-icon.png', 'Thông thường', '2021-05-18', 'Shark.zip', 'Garena'),
(12, 'Trò chơi', 'LMHT Tốc Chiến', 0, 'Đã được duyệt', 'Hãy hòa mình vào Tốc Chiến: trải nghiệm MOBA 5 đấu 5 thuần kỹ năng và chiến thuật trong Liên Minh Huyền Thoại của Riot Games, nay được tái xây dựng hoàn toàn dành cho thiết bị di động. Với hệ thống điều khiển trơn tru và lối chơi siêu tốc.\r\n', 'img/games/wildrift.png', 'Phiêu lưu và sinh tồn', '2021-05-18', 'LMHT.zip', 'Garena'),
(13, 'Trò chơi', 'Liên Quân Mobile', 0, 'Đã được duyệt', 'Hãy khẳng định bản thân, sát cánh đồng đội và thách đấu hàng triệu người chơi khác qua vô số những cuộc chiến 5v5 cực hay trên đấu trường huyền thoại MOBA Esports 5v5 của Garena Liên Quân Mobile – thắng bại tại kỹ năng! Tham gia ngay nào !', 'img/games/lienquan.png', 'Phiêu lưu và sinh tồn', '2021-05-18', 'Liên Quân.zip', 'Garena'),
(14, 'Ứng dụng', 'Baemin', 0, 'Đã được duyệt', 'Cả nhà thân mến,\r\nBAEMIN đã tới Sài Gòn để giúp bạn \"thưởng thức món ngon ở nơi mình thích\". Hãy cùng BAEMIN ăn ngon mỗi ngày một cách tiện lợi, nhanh chóng và tràn ngập niềm vui!\r\nỨng dụng BAEMIN có rất nhiều điều thú vị, bạn đã thử chưa?', 'img/apps/baemin.png', 'Mua sắm', '2021-05-18', 'BAEMIN.zip', 'Facebook'),
(15, 'Ứng dụng', 'Gmail', 0, 'Đã được duyệt', 'Gmail là một dễ dàng để sử dụng ứng dụng email giúp bạn tiết kiệm thời gian và giữ tin nhắn của bạn an toàn. Nhận tin nhắn của bạn ngay lập tức thông qua các thông báo đẩy, đọc và trả lời trực tuyến và ngoại tuyến.', 'img/apps/gmail.png', 'Liên lạc', '2021-05-18', 'Gmail.zip', 'Google LLC'),
(16, 'Ứng dụng', 'Gojek', 0, 'Đã được duyệt', 'Một ngày suôn sẻ không thể thiếu Gojek:\r\nMột thoáng GoRide: Đưa bạn đi khắp phố phường với mức giá yêu thương.\r\nMột vài GoFood: Tận hưởng món ngon mọi lúc mọi nơi.\r\nMột chút GoSend: Sẵn sàng giao hàng giúp bạn bất kỳ lúc nào', 'img/apps/gojek.png', 'Bản đồ và dẫn đường ', '2021-05-18', 'Gojek.zip', 'haudev'),
(17, 'Trò chơi', 'Free Fire', 0, 'Đã được duyệt', 'Free Fire là tựa game bắn súng sinh tồn hot nhất trên mobile. Không mất quá nhiều thời gian cho người chơi, mỗi 10 phút bạn có thể chiến đấu với 49 người chơi khác, tất cả vì mục tiêu tồn tại đến cuối cùng. ', 'img/games/freefire.png', 'Phiêu lưu và sinh tồn', '2021-05-18', 'Free Fire.zip', 'Garena'),
(18, 'Ứng dụng', 'Instagram', 0, 'Đã được duyệt', 'Đưa bạn đến gần mọi người và những gì mình yêu thích. — Instagram from Facebook. Kết nối với bạn bè, chia sẻ những việc bạn đang làm hoặc xem tin tức mới của những người khác trên khắp thế giới.', 'img/apps/instagram.png', 'Mạng xã hội', '2021-05-18', 'Instagram.zip', 'Facebook'),
(19, 'Ứng dụng', 'Messenger', 0, 'Đã được duyệt', 'Tụ họp bên nhau mọi lúc bằng ứng dụng giao tiếp đa năng, miễn phí* của chúng tôi, hoàn chỉnh với các tính năng nhắn tin, gọi thoại, gọi video và nhóm chat video không giới hạn. Dễ dàng đồng bộ tin nhắn và danh bạ với điện thoại Android.', 'img/apps/messenger.png', 'Mạng xã hội', '2021-05-18', 'Messenger.zip', 'thaidevaFacebook'),
(20, 'Ứng dụng', 'NhacCuaTui', 0, 'Đã được duyệt', '\"NhacCuaTui (Nhạc Của Tui) là ứng dụng nghe nhạc mp3 online và offline với kho nhạc phong phú, đầy đủ các thể loại âm nhạc. Thỏa sức thưởng thức kho nhạc bản quyền, xem lyrics, tạo playlist cá nhân. Hãy tải về ngay !\r\n', 'img/apps/NhacCuaTui.png', 'Nhạc và Âm thanh', '2021-05-18', 'NhacCuaTui.zip', 'haudev'),
(21, 'Ứng dụng', 'TikTok', 0, 'Đã được duyệt', 'TikTok là mạng xã hội cực HOT về video nơi mọi người chia sẻ các clip ngắn được truyền cảm hứng bằng âm nhạc. Bất kể là nhảy, múa, phong cách tự do hay biểu diễn tài năng, người dùng được khuyến khích để cho trí tưởng tượng bay cao bay xa.', 'img/apps/tiktok.png', 'Xem và sửa vieo', '2021-05-18', 'TikTok.zip', 'Facebook'),
(22, 'Ứng dụng', 'Shopee', 0, 'Đã được duyệt', 'Chào mừng đến SHOPEE - điểm đến cho mọi nhu cầu mua sắm, bán hàng và giải trí. Ứng dụng được cải tiến liên tục để mang đến cho bạn trải nghiệm mua bán vui vẻ nhất.\r\nMUA SẮM ONLINE NHANH CHÓNG MỌI LÚC, MỌI NƠI\r\n\r\n\r\n', 'img/apps/shoppe.png', 'Mua sắm', '2021-05-18', 'Shopee.zip', 'Google LLC'),
(23, 'Ứng dụng', 'Twitter', 0, 'Đã được duyệt', 'Mở rộng mạng xã hội của bạn và cập nhật những gì đang thịnh hành hiện nay. Tweet lại, đăng trên một chủ đề, lan truyền hoặc chỉ cuộn qua dòng thời gian Twitter để cập nhật những gì đang xảy ra.', 'img/apps/twitter.png', 'Mạng xã hội', '2021-05-18', 'Twitter.zip', 'Google LLC'),
(24, 'Trò chơi', 'Ball Pit Ball', 0, 'Đã được duyệt', 'Thưởng thức trò chơi Word 2021 - Trò chơi 2D ngoại tuyến miễn phí để mang lại niềm vui tuyệt vời nhất .\r\nDễ dàng chơi trò chơi này, mục tiêu quy tắc của Trò chơi chữ 2021 này là Vui vẻ và đầy thử thách.\r\n', 'img/games/ball.png', 'Thông thường', '2021-05-18', 'ball.zip', 'haudev'),
(25, 'Trò chơi', 'Realm Defense', 20000, 'Đã được duyệt', 'Hậu vệ! Bạn sẽ chú ý đến lời kêu gọi bảo vệ vương quốc chứ? Bạn đã sẵn sàng tham gia trò chơi phòng thủ tháp hoành tráng nhất và trở thành vua của các anh hùng mà vương quốc cần chưa? Vô số anh hùng và tòa tháp đang chờ đợi sức mạnh chiến lược của bạn.', 'img/games/Realm-Defense.png', 'Thông thường', '2021-05-18', 'Realm.zip', 'haudev'),
(26, 'Trò chơi', 'Snake Worm Zone', 10000, 'Đã được duyệt', 'Snake Worm Zone Rivals iO 2021 là một trò chơi tuy...', 'img/games/snake.png', 'Thông thường', '2021-05-18', 'Snake.zip', 'thaidev'),
(27, 'Ứng dụng', 'Spotify', 65000, 'Đã được duyệt', 'Nghe nhạc thả phanh cùng Spotify, dịch vụ truyền phát nhạc trực tuyến miễn phí hàng đầu thế giới, để thăng hoa tâm hồn không giới hạn.\r\nSpotify đáp ứng mọi nhu cầu nhạc, vào mọi nơi, mọi lúc.\r\n', 'img/apps/spotify.png', 'Nhạc và Âm thanh', '2021-05-18', 'Spotify.zip', 'Facebook'),
(28, 'Ứng dụng', 'Money Lover', 15000, 'Đã được duyệt', 'Money Lover sẽ giúp bạn bằng việc theo dõi các khoản thu chi hàng ngày, lập kế hoạch chi tiêu hợp lý với tính năng ngân sách, theo dõi các khoản tiết kiệm, vay nợ với chỉ một ứng dụng đơn giản, trực quan trên điện thoại. ', 'img/apps/moneylover.png', 'Giáo dục', '2021-05-18', 'Money.zip', 'haudev'),
(29, 'Ứng dụng', 'YmeetMe', 0, 'Đã được duyệt', 'Là ứng dụng hẹn hò hiệu quả và nghiêm túc đầu tiên dành riêng cho người độc thân, cùng với hơn 2,500,000 thành viên và hàng trăm nghìn người dùng thường xuyên mỗi ngày, đây sẽ là cơ hội tuyệt vời để bạn có thể kết bạn mới, làm quen, chat và hẹn hò.', 'img/apps/ymeetme.png', 'Mạng xã hội', '2021-05-18', 'YmeetMe.zip', 'haudev'),
(30, 'Ứng dụng', 'Ok Cupid', 0, 'Đã được duyệt', 'Những cuộc hẹn hò tuyệt vời đến từ những kết nối tuyệt vời - đó là lý do tại sao OkCool thể hiện bạn là ai ngoài một bức ảnh. Tìm tình yêu dựa trên những gì làm cho bạn, tốt, bạn - bởi vì bạn xứng đáng với nó.\r\n', 'img/apps/okcupid.png', 'Mạng xã hội', '2021-05-18', 'OkCupid.zip', 'thaidev\r\n'),
(31, 'Ứng dụng', 'Hangouts', 0, 'Đã được duyệt', 'Sử dụng Hangouts để giữ liên lạc. Tin liên lạc, bắt đầu video hoặc cuộc gọi thoại miễn phí, và nhảy vào một cuộc trò chuyện với một người hoặc một nhóm. Bao gồm tất cả các địa chỉ liên lạc của bạn với cuộc trò chuyện nhóm lên đến 150 người.\r\n', 'img/apps/hangout.png', 'Liên lạc\r\n', '2021-05-18', 'Hangouts.zip', 'Google LLC'),
(32, 'Ứng dụng', 'Skype', 0, 'Đã được duyệt', 'Sử dụng Skype để gửi tin nhắn SMS đến điện thoại di động trên toàn thế giới và với kết nối SMS, giờ đây bạn cũng có thể đọc và trả lời tin nhắn SMS trên điện thoại ngay từ máy tính của mình. Kết nối SMS sẽ được phát hành dần.\r\n', 'img/apps/skype.png', 'Liên lạc\r\n', '2021-05-18', 'Skype.zip', 'Google LLC'),
(33, 'Ứng dụng', 'Duolingo', 0, 'Đã được duyệt', '\"Vượt xa cả những ứng dụng học tập ngoại ngữ miễn phí tốt nhất\".\r\n\"Duolingo có thể nắm giữ bí mật hướng tới tương lai của nền giáo dục.\"\r\n\"Giữa vô số các ứng dụng học tập hoặc thực hành ngôn ngữ, bạn chẳng thể nào đánh bại Duolingo\".', 'img/apps/dulingo.png', 'Giáo dục', '2021-05-18', 'Duolingo.zip', 'duydev'),
(34, 'Ứng dụng', 'Onluyen', 0, 'Đã được duyệt', 'Onluyen.vn cung cấp chế độ luyện tập phù hợp cho mọi đối tượng học sinh:\r\n- Chinh phục 9 -10 với ngân hàng câu hỏi vận dụng – vận dụng cao dành cho các bạn khá giỏi\r\n- Nâng cao năng lực với bài tập tổng hợp dành cho các bạn trung bình - khá', 'img/apps/onluyen.png', 'Giáo dục', '2021-05-18', 'Onluyen.zip', 'duydev'),
(35, 'Ứng dụng', 'vnEdu', 0, 'Đã được duyệt', 'vnEdu Connect là ứng dụng tiện ích dành cho Phụ huynh Học sinh trên Hệ sinh thái Mạng Giáo dục Việt Nam vnEdu, giúp kết nối giữa Phụ huynh Học sinh và nhà trường. Ứng dụng cho phép Phụ huynh cập nhật tức thời thông tin của con em mình tại nhà trường.\r\n', 'img/apps/vnedu.png', 'Giáo dục', '2021-05-18', 'vnEdu.zip', 'duydev'),
(36, 'Ứng dụng', 'Google Maps', 0, 'Đã được duyệt', 'Tìm đường nhanh hơn và dễ dàng hơn bằng Google Maps. Hơn 220 quốc gia và vùng lãnh thổ được lập bản đồ cũng như hàng trăm triệu doanh nghiệp và địa điểm đã có mặt trên bản đồ. Xem thông tin đường đi qua GPS, thông tin về tình hình giao thông.', 'img/apps/bando.png', 'Bản đồ và dẫn đường', '2021-05-18', 'Maps.zip', 'Google LLC'),
(37, 'Ứng dụng', 'Grab', 0, 'Đã được duyệt', 'Grab là ứng dụng đặt xe số 1 Đông Nam Á, dịch vụ đồ ăn, hàng tạp hóa, mua sắm, giao hàng và giải pháp thanh toán tiền điện tử không tiền mặt. Với ứng dụng Grab mới, bạn sẽ có dịch vụ đặt xe riêng và taxi thuận tiện nhất từ ​​cộng đồng tài xế.', 'img/apps/grab.png', 'Bản đồ và dẫn đường', '2021-05-18', 'Grab.zip', 'Google LLC'),
(38, 'Ứng dụng', 'Be', 0, 'Đã được duyệt', 'Be cung cấp dịch vụ đặt xe máy, xe hơi, mua vé xe khách, giao hàng nhanh... với chất lượng vượt trội, đội ngũ Tài xế vui vẻ, chu đáo và chuyên nghiệp với chương trình đào tạo bài bản.\r\nDịch vụ của Be :\r\nBe Ride Hailing và BeFinancial\r\n', 'img/apps/be.png', 'Bản đồ và dẫn đường', '2021-05-18', 'be.zip', 'Google LLC'),
(39, 'Ứng dụng', 'Zing Mp3', 0, 'Đã được duyệt', 'Các tính năng nổi bật:\r\n- Chơi được hầu hết các định dạng nhạc phổ biến, hỗ trợ cả nhạc lossless.\r\n- Có widget, music controller ở thanh thông báo và cả ở màn hình khóa.', 'img/apps/zing.png', 'Nhạc và âm thanh', '2021-05-18', 'Zing.zip', 'Google LLC'),
(40, 'Ứng dụng', 'Music Player MP3 ', 0, 'Đã được duyệt', 'Trình phát nhạc là trình phát nhạc tốt nhất cho Android . Với bộ cân bằng tuyệt đẹp, tất cả các định dạng được hỗ trợ và giao diện người dùng phong cách, Trình phát nhạc cung cấp trải nghiệm âm nhạc tốt nhất cho bạn. ', 'img/apps/musicplayer.png', 'Nhạc và âm thanh', '2021-05-18', 'Music.zip', 'Facebook'),
(41, 'Ứng dụng', 'Amazon', 0, 'Đã được duyệt', 'Khách hàng có thể mua sắm hàng triệu sản phẩm trên bất kỳ trang web nào của Amazon trên khắp thế giới từ một ứng dụng duy nhất. Sử dụng Alexa để giúp bạn mua sắm — chỉ cần sử dụng giọng nói của bạn để tìm kiếm sản phẩm trên Amazon.', 'img/apps/amazon.png', 'Mua sắm', '2021-05-18', 'Amazon.zip', 'Google LLC'),
(42, 'Ứng dụng', 'Tiki', 0, 'Đã được duyệt', 'Giá tốt khỏi lo nghĩ từ các nhà bán hàng uy tín, từ đồ điện tử, vật dụng hằng ngày, hàng tiêu dùng, tất cả đều có.\r\nGiao nhanh vô đối: Chọn lựa hàng trăm ngàn sản phẩm giao trong 2 tiếng/trong ngày, lại còn được xem hàng trước khi trả tiền.', 'img/apps/tiki.png', 'Mua sắm', '2021-05-18', 'Tiki.zip', 'Facebook'),
(43, 'Trò chơi', 'Brain Out', 0, 'Đã được duyệt', 'Các câu hỏi vô cùng hại não với những lời giải cực sốc.\r\nGame thách thức đầy vui nhộn và làm xáo trộn trí tưởng tượng của bạn.\r\nSự kết hợp thử thách hoàn hảo giữa IQ và tư duy logic, phản xạ, trí nhớ và khả năng sáng tạo.\r\n', 'img/games/brainout.png', 'Câu đố\r\n\r\n', '2021-05-18', 'Brain.zip', 'duydev'),
(44, 'Trò chơi', 'Sudoku', 0, 'Đã được duyệt', 'Trò chơi giải đố Sudoku miễn phí là một trò chơi giải đố Brain Sudoku được chào đón và gây nghiện trên Google Play. Bạn có thể tải xuống ứng dụng Sudoku miễn phí cho điện thoại và máy tính bảng Android của mình. ', 'img/games/sudoku.png', 'Câu đố\r\n\r\n', '2021-05-18', 'Sudoku.zip', 'Garena'),
(45, 'Trò chơi', 'AFK Arena', 0, 'Đã được duyệt', 'Một game nhập vai cổ điển với vẻ đẹp nghệ thuật tuyệt vời. Hãy quay trở lại và tận hưởng nó!\r\nVừa chơi vừa thư giãn\r\nHãy chiến lược hóa! Kết hợp các anh hùng, kỹ năng và tiền thưởng phe phái để vượt qua kẻ thù của bạn !\r\n', 'img/games/apkarena.png', 'Nhập vai\r\n\r\n', '2021-05-18', 'AFK.zip', 'Garena'),
(46, 'Trò chơi', 'Lord of Heroes', 0, 'Đã được duyệt', 'Trò chơi có thể chỉ đơn thuần là thứ bạn thích khi buồn chán hoặc có thời gian để giết, nhưng chúng cũng có thể truyền cảm hứng và ảnh hưởng đến bạn theo những cách mà sách, TV, video trực tuyến và các phương tiện khác không làm được.\r\n', 'img/games/lordofheroes.png', 'Nhập vai\r\n\r\n', '2021-05-18', 'Heroes.zip', 'Garena'),
(47, 'Ứng dụng', 'VivaVideo', 0, 'Đã được duyệt', 'Ứng dụng chỉnh sửa video chuyên nghiệp\r\nVivaVideo là ứng dụng Trình chỉnh sửa video mạnh mẽ cho ứng dụng Android dành cho Android được trao tặng bởi các blogger Android hàng đầu.\r\n\r\n', 'img/apps/vivavideo.png', 'Xem và sửa vieo', '2021-05-18', 'VivaVideo.zip', 'Garena'),
(48, 'Ứng dụng', 'Adobe Premiere Rush', 0, 'Đã được duyệt', 'Quay, chỉnh sửa và chia sẻ video trực tuyến ở mọi nơi. Cung cấp cho các kênh của bạn một luồng ổn định tuyệt vời với Adobe Premiere Rush, trình chỉnh sửa video đa thiết bị, tất cả trong một.  ', 'img/apps/Ru.png', 'Xem và sửa vieo', '2021-05-18', 'Rush.zip', 'Facebook');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `recharge_card`
--

CREATE TABLE `recharge_card` (
  `menhgia` int(11) NOT NULL,
  `mathe` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `series` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `recharge_card`
--

INSERT INTO `recharge_card` (`menhgia`, `mathe`, `series`, `trangthai`) VALUES
(50000, '023456789015', '203456789012', b'0'),
(100000, '123456789010', '223456789011', b'0'),
(200000, '123456789012', '223456789012', b'0'),
(500000, '123456789015', '223456789015', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reset_token`
--

CREATE TABLE `reset_token` (
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `expire_on` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `reset_token`
--

INSERT INTO `reset_token` (`email`, `token`, `expire_on`) VALUES
('thaijang@gmail.com', '', 0),
('thaijangad@gmail.com', '', 0),
('thaijanguser@gmail.com', '', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction_history`
--

CREATE TABLE `transaction_history` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `menhgia` int(11) NOT NULL,
  `magiaodich` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lichsunap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Chỉ mục cho bảng `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenapp` (`tenapp`) USING BTREE,
  ADD KEY `theloai` (`theloai`),
  ADD KEY `nhaphattrien` (`nhaphattrien`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`theloai`);

--
-- Chỉ mục cho bảng `down_apps`
--
ALTER TABLE `down_apps`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`);

--
-- Chỉ mục cho bảng `item_rating`
--
ALTER TABLE `item_rating`
  ADD PRIMARY KEY (`ratingId`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `recharge_card`
--
ALTER TABLE `recharge_card`
  ADD PRIMARY KEY (`mathe`);

--
-- Chỉ mục cho bảng `reset_token`
--
ALTER TABLE `reset_token`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `magiaodich` (`magiaodich`),
  ADD KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT cho bảng `down_apps`
--
ALTER TABLE `down_apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `item_rating`
--
ALTER TABLE `item_rating`
  MODIFY `ratingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=196;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `transaction_history`
--
ALTER TABLE `transaction_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `apps`
--
ALTER TABLE `apps`
  ADD CONSTRAINT `apps_ibfk_1` FOREIGN KEY (`theloai`) REFERENCES `categories` (`theloai`),
  ADD CONSTRAINT `apps_ibfk_2` FOREIGN KEY (`nhaphattrien`) REFERENCES `account` (`username`);

--
-- Các ràng buộc cho bảng `down_apps`
--
ALTER TABLE `down_apps`
  ADD CONSTRAINT `down_apps_ibfk_1` FOREIGN KEY (`username`) REFERENCES `account` (`username`);

--
-- Các ràng buộc cho bảng `transaction_history`
--
ALTER TABLE `transaction_history`
  ADD CONSTRAINT `transaction_history_ibfk_1` FOREIGN KEY (`magiaodich`) REFERENCES `recharge_card` (`mathe`),
  ADD CONSTRAINT `transaction_history_ibfk_2` FOREIGN KEY (`username`) REFERENCES `account` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
