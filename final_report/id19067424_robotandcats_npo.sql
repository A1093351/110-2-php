-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- 主機： localhost:3306
-- 產生時間： 2022 年 06 月 16 日 04:20
-- 伺服器版本： 10.5.12-MariaDB
-- PHP 版本： 7.3.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `id19067424_robotandcats_npo`
--

-- --------------------------------------------------------

--
-- 資料表結構 `comment`
--

CREATE TABLE `comment` (
  `cid` int(10) NOT NULL,
  `mid` int(11) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `replyto` int(10) DEFAULT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- 資料表結構 `feedback`
--

CREATE TABLE `feedback` (
  `fid` smallint(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `feedback`
--

INSERT INTO `feedback` (`fid`, `name`, `email`, `feedback`) VALUES
(1, '黃欣如', 'a1093305@mail.nuk.edu.tw', 'test');

-- --------------------------------------------------------

--
-- 資料表結構 `goods`
--

CREATE TABLE `goods` (
  `gid` int(2) NOT NULL,
  `path` varchar(50) NOT NULL,
  `name` varchar(20) NOT NULL,
  `price` int(3) NOT NULL,
  `intro` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `besold` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `goods`
--

INSERT INTO `goods` (`gid`, `path`, `name`, `price`, `intro`, `link`, `besold`) VALUES
(1, 'img/emoticon.png', '機咪與恩波-日常篇　表情貼', 30, '機咪是個機器人，但是情感豐沛（大概）。\n恩波呢，就是隻貓。\n機咪與恩波承包你日常會用的實用表情!', 'https://store.line.me/emojishop/product/624e8088a2192f3c1dafb340/', 1),
(2, '/img/NPO_1.png', '測試用abc', 0, '可愛恩波，你值得擁有', 'https://robotandcats-npo.000webhostapp.com/index.php', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `account` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `tribe` varchar(7) NOT NULL DEFAULT '無',
  `tribeVisible` tinyint(1) NOT NULL DEFAULT 1,
  `verification` tinyint(1) NOT NULL DEFAULT 0,
  `activated` tinyint(1) NOT NULL DEFAULT 1,
  `admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- 傾印資料表的資料 `members`
--

INSERT INTO `members` (`id`, `account`, `password`, `username`, `email`, `tribe`, `tribeVisible`, `verification`, `activated`, `admin`) VALUES
(1, 'gn02994106 ', '123456', 'Ruby', 'gn02994106@gmail.com', '陽光灑落的社區', 1, 1, 1, 1),
(3, 'A1093351', '123456', 'A1093351', 'a1093351@mail.nuk.edu.tw', '琴聲繚繞的市集', 0, 1, 1, 1),
(4, 'liangll', 'liangll', 'liangll', 'liangll@gmail.com', '無', 1, 0, 1, 1),
(6, 'lili01', '123456', 'lili', 'eateat.yummy@gmail.com', '琴聲繚繞的市集', 1, 1, 1, 1),
(7, 'a1093305', '123456', 'a1093305', 'a1093305@mail.nuk.edu.tw', '無', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- 資料表結構 `NPOpCat`
--

CREATE TABLE `NPOpCat` (
  `clicks` int(10) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `NPOpCat`
--

INSERT INTO `NPOpCat` (`clicks`) VALUES
(1620);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `replyto` (`replyto`),
  ADD KEY `mid` (`mid`);

--
-- 資料表索引 `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- 資料表索引 `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`gid`);

--
-- 資料表索引 `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`account`),
  ADD UNIQUE KEY `account_2` (`account`,`username`,`email`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `comment`
--
ALTER TABLE `comment`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `goods`
--
ALTER TABLE `goods`
  MODIFY `gid` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`replyto`) REFERENCES `comment` (`cid`) ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `members` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
