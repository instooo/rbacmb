-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-08 20:27:43
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.20

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
-- 表的结构 `youzhan_cate`
--

CREATE TABLE IF NOT EXISTS `youzhan_cate` (
  `typeid` mediumint(5) unsigned NOT NULL,
  `typename` varchar(20) NOT NULL,
  `description` longtext NOT NULL,
  `pid` mediumint(5) unsigned NOT NULL,
  `web_id` int(2) NOT NULL DEFAULT '0' COMMENT '所属站点(webconfig)',
  `m_id` int(11) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_cate`
--

INSERT INTO `youzhan_cate` (`typeid`, `typename`, `description`, `pid`, `web_id`, `m_id`, `content`) VALUES
(1, '关于我们', '关于我们', 0, 110, 0, ''),
(2, '产品中心', '产品中心的风飒飒', 0, 110, 0, '<p>撒旦飞洒</p>'),
(3, '新闻资讯', '新闻资讯', 0, 110, 0, ''),
(4, '客户案例', '客户案例', 0, 110, 0, ''),
(6, '黄铜带', '', 2, 110, 0, ''),
(7, '紫铜带', '紫铜带阿萨德飞洒', 2, 110, 0, ''),
(8, '青铜', '青铜', 2, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `youzhan_cate`
--
ALTER TABLE `youzhan_cate`
  ADD PRIMARY KEY (`typeid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `youzhan_cate`
--
ALTER TABLE `youzhan_cate`
  MODIFY `typeid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


INSERT INTO `youzhan_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `type`, `group_id`, `ismenu`) VALUES (68, '/', '内容管理', 1, NULL, 0, 0, 0, 0, 0, 1),
(69, '/Content/cate_list', '栏目管理', 1, NULL, 0, 68, 1, 0, 0, 1)
