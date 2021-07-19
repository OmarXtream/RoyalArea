-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 27 يونيو 2017 الساعة 19:34
-- Server version: 5.5.55-0+deb8u1
-- PHP Version: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `RAA`
--

-- --------------------------------------------------------

--
-- بنية الجدول `clans`
--

CREATE TABLE IF NOT EXISTS `clans` (
  `id` int(11) unsigned NOT NULL,
  `clanname` varchar(70) NOT NULL,
  `smallname` varchar(40) NOT NULL,
  `owdb` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `specer` int(11) NOT NULL,
  `afk` int(11) NOT NULL,
  `wlc` int(11) NOT NULL,
  `sgroup` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `clans`
--

INSERT INTO `clans` (`id`, `clanname`, `smallname`, `owdb`, `creation_date`, `specer`, `afk`, `wlc`, `sgroup`, `status`) VALUES
(0, 'mrgalh', 'mg', 24, '2017-06-20 17:29:56', 2428, 2435, 2429, 1080, 1);

-- --------------------------------------------------------

--
-- بنية الجدول `cods`
--

CREATE TABLE IF NOT EXISTS `cods` (
  `id` int(11) unsigned NOT NULL,
  `code` varchar(70) NOT NULL,
  `endtime` text NOT NULL,
  `sgid` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `dbid` int(11) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `coins`
--

CREATE TABLE IF NOT EXISTS `coins` (
  `id` int(11) unsigned NOT NULL,
  `dbid` int(11) NOT NULL,
  `coins` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `coins`
--

INSERT INTO `coins` (`id`, `dbid`, `coins`, `time`) VALUES
(0, 19, 140, 169677),
(0, 20, 1000000, 68860),
(0, 131, 20, 1038),
(0, 1151, 50, 6808),
(0, 24, 1070, 87567),
(0, 1235, 20, 49),
(0, 1220, 20, 11705),
(0, 23, 20, 2041),
(0, 46, 50, 97688),
(0, 1103, 50, 7464),
(0, 86, 20, 5089),
(0, 259, 50, 2881),
(0, 39, 80, 3611),
(0, 1255, 50, 1802),
(0, 1256, 50, 1810);

-- --------------------------------------------------------

--
-- بنية الجدول `insta`
--

CREATE TABLE IF NOT EXISTS `insta` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(70) NOT NULL,
  `img` longtext NOT NULL,
  `cdb` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `follow` int(11) NOT NULL,
  `sgroup` int(11) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `insta`
--

INSERT INTO `insta` (`id`, `name`, `img`, `cdb`, `creation_date`, `follow`, `sgroup`, `username`) VALUES
(1, 'ib6z', 'https://scontent-ams3-1.cdninstagram.com/t51.2885-19/s150x150/14547602_296154520771000_5373857802240393216_a.jpg', 1209, '2017-06-08 13:27:23', 7205, 904, 'Khaled l Dmar'),
(2, 'm0.m22', 'https://scontent-ams3-1.cdninstagram.com/t51.2885-19/s150x150/18812318_1498921126814264_8785980534594469888_a.jpg', 1178, '2017-06-10 13:12:55', 2326, 903, ''),
(3, 'hidlbe', 'https://scontent-ams3-1.cdninstagram.com/t51.2885-19/s150x150/18513442_1425076027531223_2666519180022382592_a.jpg', 803, '2017-06-19 11:10:24', 1660, 903, 'Hamza Idlbe'),
(4, 'omar.kool', 'https://scontent-ams3-1.cdninstagram.com/t51.2885-19/929234_1493478120911605_443296396_a.jpg', 24, '2017-06-24 15:12:45', 14, 903, 'Mr.omar');

-- --------------------------------------------------------

--
-- بنية الجدول `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(70) NOT NULL,
  `cdb` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `chid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- بنية الجدول `tweat`
--

CREATE TABLE IF NOT EXISTS `tweat` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(70) NOT NULL,
  `img` longtext NOT NULL,
  `cdb` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `follow` int(11) NOT NULL,
  `sgroup` int(11) NOT NULL,
  `username` varchar(40) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `tweat`
--

INSERT INTO `tweat` (`id`, `name`, `img`, `cdb`, `creation_date`, `follow`, `sgroup`, `username`) VALUES
(1, '3lbhh', 'https://pbs.twimg.com/profile_images/854926274581626880/Oc_zU7P8_normal.jpg', 24, '2017-06-25 23:24:59', 15, 916, '#Mr.omar');

-- --------------------------------------------------------

--
-- بنية الجدول `youtube`
--

CREATE TABLE IF NOT EXISTS `youtube` (
`id` int(11) unsigned NOT NULL,
  `name` varchar(70) NOT NULL,
  `img` longtext NOT NULL,
  `cdb` int(11) NOT NULL,
  `creation_date` datetime NOT NULL,
  `publishedAt` datetime NOT NULL,
  `sub` int(11) NOT NULL,
  `views` int(11) NOT NULL,
  `videos` int(11) NOT NULL,
  `sgroup` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `YTID` longtext NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- إرجاع أو استيراد بيانات الجدول `youtube`
--

INSERT INTO `youtube` (`id`, `name`, `img`, `cdb`, `creation_date`, `publishedAt`, `sub`, `views`, `videos`, `sgroup`, `CID`, `YTID`) VALUES
(7, '#Mr. omar', 'https://yt3.ggpht.com/-TJnCTR5hMbY/AAAAAAAAAAI/AAAAAAAAAAA/ZUvGk0bRrMU/s240-c-k-no-mo-rj-c0xffffff/photo.jpg', 24, '2017-06-20 17:05:41', '2013-02-03 15:59:02', 481, 255156, 6, 57, 2426, 'UCB6I7ge63C4h3F5fU4R-qiQ'),
(8, 'FlO0', 'https://yt3.ggpht.com/-Zmzx6507zPE/AAAAAAAAAAI/AAAAAAAAAAA/hyMz3_8vqLA/s240-c-k-no-mo-rj-c0xffffff/photo.jpg', 1233, '2017-06-20 19:51:23', '2014-07-03 11:38:04', 1017, 49457, 46, 57, 2437, 'UCBs9yhvUGyxnbK2wgHvKsag'),
(9, 'RiTzClan', 'https://yt3.ggpht.com/-AqKMrQ0_jsI/AAAAAAAAAAI/AAAAAAAAAAA/Vj-tzfFX1Q0/s240-c-k-no-mo-rj-c0xffffff/photo.jpg', 1220, '2017-06-25 13:10:13', '2016-01-09 14:05:52', 1013, 1107, 8, 57, 2444, 'UCXZexJtYNbkDQ-22Hsd9YSw'),
(10, 'PRQ Han', 'https://yt3.ggpht.com/-IuExe6d5hrY/AAAAAAAAAAI/AAAAAAAAAAA/-GMX5QAIRvk/s240-c-k-no-mo-rj-c0xffffff/photo.jpg', 39, '2017-06-27 19:04:31', '2015-07-07 17:30:39', 1216, 231051, 30, 57, 2448, 'UCPeQT589gHnnv4FMsWaFXfw');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `insta`
--
ALTER TABLE `insta`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweat`
--
ALTER TABLE `tweat`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youtube`
--
ALTER TABLE `youtube`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `insta`
--
ALTER TABLE `insta`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tweat`
--
ALTER TABLE `tweat`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `youtube`
--
ALTER TABLE `youtube`
MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
