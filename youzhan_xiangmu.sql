-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-17 16:55:14
-- 服务器版本： 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dxl_dongguan`
--

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_xiangmu`
--

CREATE TABLE IF NOT EXISTS `youzhan_xiangmu` (
  `aid` int(7) NOT NULL,
  `title` varchar(55) NOT NULL,
  `zdmianji` varchar(255) NOT NULL,
  `jzmianji` varchar(255) NOT NULL,
  `rongji` varchar(255) NOT NULL,
  `count` varchar(255) NOT NULL,
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `addtime` varchar(60) NOT NULL COMMENT '创建日期',
  `img_duo` varchar(255) NOT NULL,
  `typeid` int(3) NOT NULL,
  `webconfig_id` int(2) NOT NULL DEFAULT '1' COMMENT '所属站点(webconfig)',
  `content` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_xiangmu`
--

INSERT INTO `youzhan_xiangmu` (`aid`, `title`, `zdmianji`, `jzmianji`, `rongji`, `count`, `weight`, `addtime`, `img_duo`, `typeid`, `webconfig_id`, `content`) VALUES
(1, '项目好擦查获擦汗', '1231', '123131', '1231321', '123131', 0, '1505643012', '|', 16, 1, '<p>大法师asafa</p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `youzhan_xiangmu`
--
ALTER TABLE `youzhan_xiangmu`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `youzhan_xiangmu`
--
ALTER TABLE `youzhan_xiangmu`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
