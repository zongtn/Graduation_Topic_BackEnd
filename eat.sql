-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1:3306
-- 產生時間： 2021-12-23 08:28:31
-- 伺服器版本： 5.7.31
-- PHP 版本： 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `eat`
--

-- --------------------------------------------------------

--
-- 資料表結構 `all_additive`
--

DROP TABLE IF EXISTS `all_additive`;
CREATE TABLE IF NOT EXISTS `all_additive` (
  `additive_id` int(30) NOT NULL AUTO_INCREMENT,
  `additive_name` varchar(30) NOT NULL,
  PRIMARY KEY (`additive_id`),
  UNIQUE KEY `additive_name` (`additive_name`)
) ENGINE=InnoDB AUTO_INCREMENT=437 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `all_additive`
--

INSERT INTO `all_additive` (`additive_id`, `additive_name`) VALUES
(378, ''),
(424, '101'),
(427, '3'),
(428, '33'),
(425, '8'),
(385, '乳化劑'),
(395, '乳酸鈣'),
(368, '偏磷酸鈉'),
(367, '偏磷酸鉀'),
(419, '咖啡因'),
(408, '品質改良劑'),
(366, '多磷酸鈉'),
(405, '小蘇打'),
(365, '己二烯酸鉀'),
(418, '抗壞血酸鈉'),
(382, '檸檬酸'),
(381, '檸檬酸鉀'),
(388, '次黃嘌呤核苷磷酸'),
(370, '焦磷酸鈉'),
(394, '焦糖色素'),
(390, '甜味劑'),
(1, '瘦肉精'),
(376, '碳酸氫鈉'),
(371, '結蘭膠'),
(396, '脂肪酸甘油脂'),
(384, '酸性焦磷酸鈉'),
(429, '防腐劑測試'),
(364, '食用色素六號'),
(389, '鳥嘌呤核苷磷酸'),
(397, '鹿角菜膠');

-- --------------------------------------------------------

--
-- 資料表結構 `all_ingredient`
--

DROP TABLE IF EXISTS `all_ingredient`;
CREATE TABLE IF NOT EXISTS `all_ingredient` (
  `ingredient_id` int(30) NOT NULL AUTO_INCREMENT,
  `ingredient_name` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  PRIMARY KEY (`ingredient_id`),
  UNIQUE KEY `ingredient_name` (`ingredient_name`)
) ENGINE=InnoDB AUTO_INCREMENT=168 DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `all_ingredient`
--

INSERT INTO `all_ingredient` (`ingredient_id`, `ingredient_name`) VALUES
(83, ''),
(95, '0'),
(150, '11'),
(151, '12'),
(152, '13'),
(153, '14'),
(156, '2'),
(157, '22'),
(154, '6'),
(106, '乳粉'),
(117, '咖啡粉'),
(94, '奶精'),
(141, '小蘇打'),
(140, '抹茶'),
(99, '昆布原汁'),
(97, '果糖'),
(107, '椰子油'),
(90, '檸檬濃縮汁'),
(69, '水'),
(139, '焙茶'),
(133, '燕麥'),
(112, '生乳'),
(66, '糖'),
(122, '脫脂奶粉'),
(86, '自然礦物質'),
(71, '芭樂原汁'),
(96, '花瓜'),
(92, '花生'),
(89, '茶葉萃取物'),
(70, '蔗糖'),
(78, '薄荷香料'),
(65, '豬肉'),
(158, '越南測試'),
(67, '醬油'),
(77, '青草茶葉'),
(127, '香料'),
(88, '高果糖糖漿'),
(68, '鹽');

-- --------------------------------------------------------

--
-- 資料表結構 `batch`
--

DROP TABLE IF EXISTS `batch`;
CREATE TABLE IF NOT EXISTS `batch` (
  `batch_id` int(30) NOT NULL AUTO_INCREMENT,
  `produce_id` int(30) NOT NULL,
  `batch_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`batch_id`),
  KEY `fk_b_pid` (`produce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=latin1;

--
-- 傾印資料表的資料 `batch`
--

INSERT INTO `batch` (`batch_id`, `produce_id`, `batch_time`) VALUES
(12, 87, '2021-10-17 11:49:39'),
(14, 3, '2021-10-28 06:18:54'),
(16, 88, '2021-10-28 06:25:12'),
(19, 89, '2021-10-28 06:33:58'),
(20, 90, '2021-10-28 06:38:38'),
(23, 92, '2021-10-28 06:49:18'),
(24, 91, '2021-10-28 06:50:40'),
(26, 93, '2021-10-28 06:57:09'),
(28, 94, '2021-10-28 06:59:39'),
(30, 95, '2021-10-28 07:01:59'),
(34, 96, '2021-10-28 08:24:13'),
(35, 96, '2021-10-28 08:28:37'),
(36, 90, '2021-11-13 08:18:42'),
(37, 98, '2021-11-13 08:26:17'),
(38, 90, '2021-11-19 07:59:47'),
(39, 99, '2021-11-24 12:09:07'),
(40, 90, '2021-11-25 06:17:59'),
(41, 90, '2021-11-25 06:18:02'),
(45, 102, '2021-12-16 06:24:59'),
(46, 103, '2021-12-17 13:15:02'),
(47, 90, '2021-12-23 03:31:44'),
(48, 104, '2021-12-23 04:42:46'),
(49, 105, '2021-12-23 04:42:47'),
(50, 106, '2021-12-23 04:42:49'),
(51, 107, '2021-12-23 04:42:51'),
(52, 108, '2021-12-23 04:46:50');

-- --------------------------------------------------------

--
-- 資料表結構 `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(30) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(30) NOT NULL,
  `company_account` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `company_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `company_email` varchar(30) NOT NULL,
  `company_phone` varchar(30) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `company_account`, `company_password`, `company_email`, `company_phone`) VALUES
(3, '味丹企業股份有限公司', 'vedan', 'vedan', 'test@yahoo.com.tw', '0426622111'),
(4, '愛之味股份有限公司', 'agv', 'agv', 'real@gmail.com', '052211521'),
(7, '唯一行食業股份有限公司', 'onlyfoodacc', 'onlyfoodpass', 'onlyfoodgmail.com', '0222988817'),
(8, '統一企業股份有限公司', 'pecos', 'pecos', 'pecos@gmail.com', '062532121');

-- --------------------------------------------------------

--
-- 資料表結構 `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `message_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `produce_id` int(30) NOT NULL,
  `message_con` text NOT NULL,
  `message_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`message_id`),
  KEY `user_id` (`user_id`),
  KEY `produce_id` (`produce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `message`
--

INSERT INTO `message` (`message_id`, `user_id`, `produce_id`, `message_con`, `message_time`) VALUES
(2, 3, 3, '普通', '2021-08-26 03:22:19'),
(5, 2, 3, '好油', '2021-10-18 14:57:21'),
(6, 2, 3, '好吃', '2021-10-18 14:57:30'),
(7, 1, 92, '從小吃到大的食物', '2021-10-31 10:26:51'),
(8, 4, 92, '配粥更好吃', '2021-11-03 00:06:42'),
(10, 2, 95, '不錯喝 不過太苦了一點', '2021-11-14 09:28:16'),
(11, 2, 95, '我覺得奶味不夠重', '2021-11-14 09:28:37'),
(12, 2, 95, '我覺得很好喝！', '2021-11-14 09:29:10'),
(13, 6, 96, 'so sweet', '2021-11-19 07:53:27'),
(14, 2, 90, '好喝～', '2021-11-21 07:14:54'),
(20, 7, 99, '好喝', '2021-11-25 06:15:02');

-- --------------------------------------------------------

--
-- 資料表結構 `nut_other`
--

DROP TABLE IF EXISTS `nut_other`;
CREATE TABLE IF NOT EXISTS `nut_other` (
  `nut_other_id` int(30) NOT NULL AUTO_INCREMENT,
  `nut_other_name` varchar(30) NOT NULL,
  PRIMARY KEY (`nut_other_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `nut_other`
--

INSERT INTO `nut_other` (`nut_other_id`, `nut_other_name`) VALUES
(1, '礦物質');

-- --------------------------------------------------------

--
-- 資料表結構 `produce`
--

DROP TABLE IF EXISTS `produce`;
CREATE TABLE IF NOT EXISTS `produce` (
  `produce_id` int(30) NOT NULL AUTO_INCREMENT,
  `company_id` int(30) NOT NULL,
  `produce_name` varchar(30) NOT NULL,
  `produce_origin` varchar(30) NOT NULL,
  `produce_weight` varchar(30) NOT NULL,
  `batch_id` int(30) NOT NULL,
  `total_search` int(30) NOT NULL,
  PRIMARY KEY (`produce_id`),
  KEY `company_id` (`company_id`),
  KEY `fk_nut` (`produce_weight`)
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `produce`
--

INSERT INTO `produce` (`produce_id`, `company_id`, `produce_name`, `produce_origin`, `produce_weight`, `batch_id`, `total_search`) VALUES
(3, 3, '味丹芭樂汁', '台灣', '980', 14, 0),
(87, 7, '唯一傳統香烤蜜味豬肉乾', '台灣', '125', 12, 32),
(88, 3, '味丹青草茶', '台灣', '475', 16, 0),
(89, 3, '多喝水竹炭水', '台灣', '700', 19, 0),
(90, 4, '雀巢檸檬茶', '台灣', '550', 47, 30),
(91, 4, '愛之味牛奶花生', '台灣', '340', 24, 0),
(92, 4, '愛之味鮮味脆瓜', '台灣', '180', 23, 90),
(93, 8, '統一布丁', '台灣', '180', 26, 0),
(94, 8, '瑞穗鮮乳', '台灣', '1858', 28, 0),
(95, 8, '左岸咖啡館拿鐵咖啡', '台灣', '240', 30, 0),
(96, 4, '愛之味甜八寶', '台灣', '260', 35, 0),
(98, 4, '愛之味純濃燕麥', '台灣', '290', 37, 0),
(99, 4, '原萃日式焙茶', '台灣', '580', 39, 0),
(102, 8, '1', '3', '2', 45, 0),
(103, 4, '愛滋味測試', '台北', '100', 46, 0),
(104, 4, 'test', 'taiwan', '200', 48, 0),
(105, 4, 'test', 'taiwan', '200', 49, 0),
(106, 4, 'test', 'taiwan', '200', 50, 0),
(107, 4, 'test', 'taiwan', '200', 51, 0),
(108, 4, 't', 't', '6', 52, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `produce_additive`
--

DROP TABLE IF EXISTS `produce_additive`;
CREATE TABLE IF NOT EXISTS `produce_additive` (
  `pro_additive_id` int(30) NOT NULL AUTO_INCREMENT,
  `additive_id` int(30) NOT NULL,
  `batch_id` int(30) NOT NULL,
  PRIMARY KEY (`pro_additive_id`),
  KEY `fk_all_add` (`additive_id`),
  KEY `fk_add_pro` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=364 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `produce_additive`
--

INSERT INTO `produce_additive` (`pro_additive_id`, `additive_id`, `batch_id`) VALUES
(291, 364, 12),
(292, 365, 12),
(293, 366, 12),
(294, 367, 12),
(299, 368, 14),
(300, 366, 14),
(301, 370, 14),
(302, 371, 14),
(304, 376, 16),
(307, 378, 19),
(308, 381, 20),
(309, 382, 20),
(314, 382, 23),
(315, 388, 23),
(316, 389, 23),
(317, 390, 23),
(318, 370, 24),
(319, 384, 24),
(320, 385, 24),
(325, 394, 26),
(326, 395, 26),
(327, 396, 26),
(328, 397, 26),
(330, 378, 28),
(333, 385, 30),
(334, 405, 30),
(338, 408, 34),
(339, 408, 35),
(340, 381, 36),
(341, 382, 36),
(342, 378, 37),
(343, 381, 38),
(344, 382, 38),
(345, 418, 39),
(346, 419, 39),
(347, 381, 40),
(348, 382, 40),
(349, 381, 41),
(350, 382, 41),
(354, 427, 45),
(355, 428, 45),
(356, 429, 46),
(357, 381, 47),
(358, 382, 47),
(359, 378, 48),
(360, 378, 49),
(361, 378, 50),
(362, 378, 51),
(363, 378, 52);

-- --------------------------------------------------------

--
-- 資料表結構 `produce_ingredient`
--

DROP TABLE IF EXISTS `produce_ingredient`;
CREATE TABLE IF NOT EXISTS `produce_ingredient` (
  `pro_ingredient_id` int(30) NOT NULL AUTO_INCREMENT,
  `ingredient_id` int(30) NOT NULL,
  `batch_id` int(30) NOT NULL,
  PRIMARY KEY (`pro_ingredient_id`),
  KEY `fk_add_ing` (`ingredient_id`),
  KEY `fk_all_ing` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=163 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `produce_ingredient`
--

INSERT INTO `produce_ingredient` (`pro_ingredient_id`, `ingredient_id`, `batch_id`) VALUES
(60, 65, 12),
(61, 66, 12),
(62, 67, 12),
(63, 68, 12),
(67, 69, 14),
(68, 70, 14),
(69, 71, 14),
(74, 69, 16),
(75, 70, 16),
(76, 77, 16),
(77, 78, 16),
(80, 69, 19),
(81, 86, 19),
(82, 69, 20),
(83, 88, 20),
(84, 89, 20),
(85, 90, 20),
(91, 96, 23),
(92, 97, 23),
(93, 67, 23),
(94, 99, 23),
(95, 69, 24),
(96, 92, 24),
(97, 66, 24),
(98, 94, 24),
(103, 69, 26),
(104, 70, 26),
(105, 106, 26),
(106, 107, 26),
(108, 112, 28),
(113, 69, 30),
(114, 70, 30),
(115, 106, 30),
(116, 117, 30),
(120, 122, 34),
(121, 122, 35),
(122, 127, 35),
(123, 69, 36),
(124, 88, 36),
(125, 89, 36),
(126, 90, 36),
(127, 69, 37),
(128, 133, 37),
(129, 69, 38),
(130, 88, 38),
(131, 89, 38),
(132, 90, 38),
(133, 69, 39),
(134, 139, 39),
(135, 140, 39),
(136, 141, 39),
(137, 69, 40),
(138, 88, 40),
(139, 89, 40),
(140, 90, 40),
(141, 69, 41),
(142, 88, 41),
(143, 89, 41),
(144, 90, 41),
(151, 156, 45),
(152, 157, 45),
(153, 158, 46),
(154, 69, 47),
(155, 88, 47),
(156, 89, 47),
(157, 90, 47),
(158, 83, 48),
(159, 83, 49),
(160, 83, 50),
(161, 83, 51),
(162, 83, 52);

-- --------------------------------------------------------

--
-- 資料表結構 `produce_nutrition`
--

DROP TABLE IF EXISTS `produce_nutrition`;
CREATE TABLE IF NOT EXISTS `produce_nutrition` (
  `nutrition_id` int(30) NOT NULL AUTO_INCREMENT,
  `batch_id` int(30) NOT NULL,
  `nutrition_weight` float NOT NULL DEFAULT '100',
  `nutrition_quantity` float NOT NULL,
  `nutrition_calories` float NOT NULL,
  `nutrition_protein` float NOT NULL,
  `nutrition_fat-interview` float NOT NULL,
  `nutrition_saturated-fat-interview` float NOT NULL,
  `nutrition_trans-lipid-interview` float NOT NULL,
  `nutrition_sugar` float NOT NULL,
  `nutrition_na` float NOT NULL,
  PRIMARY KEY (`nutrition_id`),
  KEY `fk_pid` (`batch_id`)
) ENGINE=InnoDB AUTO_INCREMENT=117 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `produce_nutrition`
--

INSERT INTO `produce_nutrition` (`nutrition_id`, `batch_id`, `nutrition_weight`, `nutrition_quantity`, `nutrition_calories`, `nutrition_protein`, `nutrition_fat-interview`, `nutrition_saturated-fat-interview`, `nutrition_trans-lipid-interview`, `nutrition_sugar`, `nutrition_na`) VALUES
(76, 12, 25, 5, 78, 6, 1.4, 0.4, 0, 6.9, 207),
(78, 14, 100, 9, 97.2, 0, 0, 0, 0, 21.4, 82.6),
(80, 16, 237.5, 2, 46, 0, 0, 0, 0, 10.7, 9.5),
(83, 19, 100, 7, 0, 0, 0, 0, 0, 0, 0),
(84, 20, 265, 2, 88, 0, 0, 0, 0, 22, 16),
(87, 23, 60, 3, 53.3, 0.9, 0.1, 0, 0, 11.7, 918),
(88, 24, 170, 2, 208.5, 6.5, 12.8, 2.4, 0, 12.9, 56),
(90, 26, 180, 1, 205, 3.6, 5, 4.5, 0, 32.6, 108),
(92, 28, 371.6, 5, 243, 11.9, 13.7, 9.7, 0, 17.8, 156),
(94, 30, 240, 1, 173, 4.6, 7.4, 5.5, 0, 21.8, 180),
(98, 34, 100, 1, 2, 1, 1, 1, 1, 1, 1),
(99, 35, 100, 2.6, 75.1, 1.6, 0.3, 0, 0, 1, 5.7),
(100, 36, 265, 2, 88, 0, 0, 0, 0, 22, 16),
(101, 37, 290, 1, 131.3, 4.1, 2.9, 0.6, 0, 12.8, 58),
(102, 38, 265, 3, 88, 0, 0, 0, 0, 22, 16),
(103, 39, 580, 290, 0, 0, 0, 0, 0, 0, 35),
(104, 40, 265, 3, 88, 0, 0, 0, 0, 22, 16),
(105, 41, 265, 3, 88, 0, 0, 0, 0, 22, 16),
(109, 45, 4, 5, 6, 7, 8, 12, 2, 3, 4),
(110, 46, 100, 2, 300, 25, 25, 6, 3, 6, 6),
(111, 47, 265, 3, 88, 0, 0, 0, 0, 22, 16),
(112, 48, 120, 1, 1, 1, 2, 2, 3, 3, 3),
(113, 49, 120, 1, 1, 1, 2, 2, 3, 3, 3),
(114, 50, 120, 1, 1, 1, 2, 2, 3, 3, 3),
(115, 51, 120, 1, 1, 1, 2, 2, 3, 3, 3),
(116, 52, 2, 2, 2, 2, 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `produce_other`
--

DROP TABLE IF EXISTS `produce_other`;
CREATE TABLE IF NOT EXISTS `produce_other` (
  `pro_other_id` int(30) NOT NULL AUTO_INCREMENT,
  `nut_other_id` int(30) NOT NULL,
  `produce_id` int(30) NOT NULL,
  PRIMARY KEY (`pro_other_id`),
  KEY `fk_nut_other` (`nut_other_id`),
  KEY `fk_pro` (`produce_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_account` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_password` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `user_email` varchar(30) NOT NULL,
  `user_phone` varchar(30) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`user_id`, `user_account`, `user_password`, `user_email`, `user_phone`, `user_name`) VALUES
(1, 'mikeacc', 'mikepass', 'mike@gmail.com', '0998878575', 'mike'),
(2, 'a', 'a', 'a', '0965559854', 'a'),
(3, 'testacc', 'testpass', 'test@yahoo.com', '0966678979', 'test'),
(4, 'zxc', 'zxc', 'abc@yahoo.com', '656', 'zxc'),
(5, 'shaoyx2000', '123456789', 's1071638@gm.pu.edu.tw', '0912345678', 'shaoyx2000'),
(6, 'bow5047', 'bowobw', 'bow5047@yahoo.com.tw', '0965298467', 'a'),
(7, 'testuser', '12345', 'test@gmail.com', '0912345678', 'testuser'),
(8, 'jackylol520014', 's43198755123', 'jackylol', '0903655271', 'rr');

-- --------------------------------------------------------

--
-- 資料表結構 `user_follow`
--

DROP TABLE IF EXISTS `user_follow`;
CREATE TABLE IF NOT EXISTS `user_follow` (
  `follow_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `produce_id` int(30) NOT NULL,
  `follow_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`follow_id`),
  KEY `fk_user_follow` (`user_id`),
  KEY `fk_user_pro` (`produce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_follow`
--

INSERT INTO `user_follow` (`follow_id`, `user_id`, `produce_id`, `follow_time`) VALUES
(33, 3, 3, '2021-08-12 10:40:05'),
(60, 1, 3, '2021-10-12 07:18:06'),
(66, 4, 89, '2021-11-03 00:05:12'),
(73, 2, 92, '2021-11-13 08:09:43'),
(82, 2, 91, '2021-11-21 07:15:59'),
(84, 2, 96, '2021-11-22 04:36:09'),
(86, 7, 90, '2021-11-25 06:15:36'),
(89, 7, 95, '2021-11-26 06:01:04'),
(91, 8, 103, '2021-12-23 03:04:05'),
(92, 7, 92, '2021-12-23 03:08:57'),
(95, 2, 99, '2021-12-23 04:52:57'),
(96, 7, 99, '2021-12-23 06:06:00');

-- --------------------------------------------------------

--
-- 資料表結構 `user_history`
--

DROP TABLE IF EXISTS `user_history`;
CREATE TABLE IF NOT EXISTS `user_history` (
  `history_id` int(30) NOT NULL AUTO_INCREMENT,
  `user_id` int(30) NOT NULL,
  `produce_id` int(30) NOT NULL,
  `history_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`history_id`),
  KEY `fk_user_history` (`user_id`),
  KEY `fk_pro_history` (`produce_id`)
) ENGINE=InnoDB AUTO_INCREMENT=244 DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `user_history`
--

INSERT INTO `user_history` (`history_id`, `user_id`, `produce_id`, `history_time`) VALUES
(7, 2, 3, '2021-11-29 03:35:10'),
(95, 4, 89, '2021-11-03 00:05:05'),
(96, 4, 92, '2021-11-03 00:05:28'),
(97, 2, 96, '2021-11-22 04:36:07'),
(106, 2, 87, '2021-11-18 06:41:34'),
(107, 2, 94, '2021-11-21 04:50:12'),
(117, 2, 92, '2021-11-18 06:41:41'),
(118, 2, 89, '2021-11-21 04:50:36'),
(119, 2, 88, '2021-11-10 04:46:51'),
(129, 2, 95, '2021-12-16 06:22:38'),
(152, 2, 91, '2021-11-29 03:35:13'),
(163, 2, 98, '2021-12-16 06:22:32'),
(164, 2, 93, '2021-11-21 04:49:49'),
(173, 2, 90, '2021-12-23 01:37:53'),
(176, 6, 96, '2021-11-19 07:53:14'),
(177, 6, 98, '2021-11-19 07:47:18'),
(178, 6, 93, '2021-11-19 07:47:36'),
(179, 6, 90, '2021-11-19 07:47:51'),
(184, 7, 92, '2021-12-23 03:14:22'),
(185, 7, 95, '2021-11-26 06:01:20'),
(194, 7, 99, '2021-12-23 06:05:58'),
(197, 7, 88, '2021-11-25 06:14:15'),
(198, 7, 90, '2021-12-23 04:37:39'),
(204, 2, 99, '2021-12-23 04:52:48'),
(205, 2, 103, '2021-12-17 13:16:32'),
(225, 8, 103, '2021-12-23 03:04:26');

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `batch`
--
ALTER TABLE `batch`
  ADD CONSTRAINT `fk_b_pid` FOREIGN KEY (`produce_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_m_pid` FOREIGN KEY (`produce_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_m_uid` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `produce`
--
ALTER TABLE `produce`
  ADD CONSTRAINT `fk_company` FOREIGN KEY (`company_id`) REFERENCES `company` (`company_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `produce_additive`
--
ALTER TABLE `produce_additive`
  ADD CONSTRAINT `fk_all_add` FOREIGN KEY (`additive_id`) REFERENCES `all_additive` (`additive_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pro_add_bid` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `produce_ingredient`
--
ALTER TABLE `produce_ingredient`
  ADD CONSTRAINT `fk_add_ing` FOREIGN KEY (`ingredient_id`) REFERENCES `all_ingredient` (`ingredient_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_all_ing` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `produce_nutrition`
--
ALTER TABLE `produce_nutrition`
  ADD CONSTRAINT `fk_bid` FOREIGN KEY (`batch_id`) REFERENCES `batch` (`batch_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `produce_other`
--
ALTER TABLE `produce_other`
  ADD CONSTRAINT `fk_nut_other` FOREIGN KEY (`nut_other_id`) REFERENCES `nut_other` (`nut_other_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pro` FOREIGN KEY (`produce_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `user_follow`
--
ALTER TABLE `user_follow`
  ADD CONSTRAINT `fk_user_follow` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_pro` FOREIGN KEY (`produce_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- 資料表的限制式 `user_history`
--
ALTER TABLE `user_history`
  ADD CONSTRAINT `fk_pro_history` FOREIGN KEY (`produce_id`) REFERENCES `produce` (`produce_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_history` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
