-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-19 16:58:14
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
-- 表的结构 `youzhan_access`
--

CREATE TABLE IF NOT EXISTS `youzhan_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_access`
--

INSERT INTO `youzhan_access` (`role_id`, `node_id`, `level`, `pid`, `module`) VALUES
(4, 53, 0, 0, NULL),
(4, 52, 0, 0, NULL),
(4, 51, 0, 0, NULL),
(4, 50, 0, 0, NULL),
(4, 49, 0, 0, NULL),
(4, 44, 0, 0, NULL),
(4, 54, 0, 0, NULL),
(4, 55, 0, 0, NULL),
(4, 56, 0, 0, NULL),
(4, 57, 0, 0, NULL),
(4, 45, 0, 0, NULL),
(4, 58, 0, 0, NULL),
(5, 63, 0, 0, NULL),
(5, 62, 0, 0, NULL),
(5, 61, 0, 0, NULL),
(5, 60, 0, 0, NULL),
(5, 59, 0, 0, NULL),
(5, 46, 0, 0, NULL),
(6, 78, 0, 0, NULL),
(6, 77, 0, 0, NULL),
(6, 76, 0, 0, NULL),
(6, 73, 0, 0, NULL),
(6, 72, 0, 0, NULL),
(6, 71, 0, 0, NULL),
(6, 69, 0, 0, NULL),
(6, 68, 0, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_article`
--

CREATE TABLE IF NOT EXISTS `youzhan_article` (
  `aid` int(7) NOT NULL,
  `title` varchar(55) NOT NULL,
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `description` varchar(255) NOT NULL,
  `addtime` varchar(60) NOT NULL COMMENT '创建日期',
  `updatetime` varchar(60) NOT NULL COMMENT '发布日期',
  `imgurl` varchar(255) NOT NULL,
  `img_duo` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `typeid` int(3) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `webconfig_id` int(2) NOT NULL DEFAULT '1' COMMENT '所属站点(webconfig)'
) ENGINE=MyISAM AUTO_INCREMENT=49 DEFAULT CHARSET=utf8;

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
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_cate`
--

INSERT INTO `youzhan_cate` (`typeid`, `typename`, `description`, `pid`, `web_id`, `m_id`, `content`) VALUES
(13, '集团新闻', '', 0, 0, 1, ''),
(24, '企业年志', '企业年志', 0, 0, 10, ''),
(15, '房地产开发', '房地产开发', 0, 0, 0, ''),
(16, '在建项目', '在建项目', 15, 0, 9, ''),
(17, '已建项目', '已建项目', 15, 0, 9, ''),
(18, '热销项目', '热销项目', 15, 0, 9, ''),
(19, '置业投资', '置业投资', 0, 0, 2, ''),
(20, '物业服务', '物业服务', 0, 0, 2, ''),
(21, '社会公益', '社会公益', 0, 0, 2, ''),
(22, '人在关东', '人在关东', 0, 0, 2, ''),
(23, '东关招聘', '东关招聘', 0, 0, 2, ''),
(25, '企业荣誉', '企业荣誉', 0, 0, 2, ''),
(26, '合作伙伴', '合作伙伴', 0, 0, 2, '');

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_model`
--

CREATE TABLE IF NOT EXISTS `youzhan_model` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL COMMENT '模型名称',
  `class` varchar(255) NOT NULL,
  `form` varchar(255) NOT NULL COMMENT '数据表名',
  `status` int(1) NOT NULL COMMENT '状态'
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_model`
--

INSERT INTO `youzhan_model` (`id`, `name`, `class`, `form`, `status`) VALUES
(1, '文章模型', 'article', 'article', 1),
(2, '图片模型', 'picture', 'picture', 0),
(0, '单页模型', 'page', 'page', 1),
(9, '项目模型', 'xiangmu', 'xiangmu', 0),
(10, '企业年志', 'nianzhi', 'nianzhi', 0);

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_node`
--

CREATE TABLE IF NOT EXISTS `youzhan_node` (
  `id` smallint(6) unsigned NOT NULL,
  `name` varchar(64) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '0',
  `remark` varchar(255) DEFAULT NULL,
  `sort` smallint(6) unsigned DEFAULT NULL,
  `pid` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) unsigned NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  `group_id` tinyint(3) unsigned DEFAULT '0',
  `ismenu` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM AUTO_INCREMENT=79 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_node`
--

INSERT INTO `youzhan_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `type`, `group_id`, `ismenu`) VALUES
(1, '/', '权限管理', 1, NULL, 0, 0, 0, 0, 0, 1),
(2, '/Permission/nodeList', '节点列表', 1, NULL, 0, 1, 1, 0, 0, 1),
(3, '/Permission/roleList', '角色列表', 1, NULL, 0, 1, 1, 0, 0, 1),
(4, '/Permission/memberList', '用户列表', 1, NULL, 0, 1, 1, 0, 0, 1),
(70, '/System/model_list', '模型管理', 1, NULL, 0, 68, 1, 0, 0, 1),
(68, '/', '系统设置', 1, NULL, 0, 0, 0, 0, 0, 1),
(69, '/System/web_list', '站点基本信息', 1, NULL, 0, 68, 1, 0, 0, 1),
(14, '/Permission/memberEdit', '编辑用户', 1, NULL, 0, 1, 1, 0, 0, 0),
(15, '/Permission/memberAdd', '添加用户', 1, NULL, 0, 1, 1, 0, 0, 0),
(16, '/Permission/memberDelete', '删除用户', 1, NULL, 0, 1, 1, 0, 0, 0),
(71, '/System/web_add', '站点添加', 1, NULL, 0, 68, 1, 0, 0, 0),
(18, '/Permission/roleAdd', '添加角色', 1, NULL, 0, 1, 1, 0, 0, 0),
(19, '/Permission/roleDelete', '删除角色', 1, NULL, 0, 1, 1, 0, 0, 0),
(72, '/System/web_upd', '站点编辑', 1, NULL, 0, 68, 1, 0, 0, 0),
(21, '/Permission/roleEdit', '编辑角色', 1, NULL, 0, 1, 1, 0, 0, 0),
(22, '/Permission/addAccess', '分配权限', 1, NULL, 0, 1, 1, 0, 0, 0),
(73, '/System/web_info', '站点查看', 1, NULL, 0, 68, 1, 0, 0, 0),
(76, '/', '内容管理', 1, NULL, 0, 0, 0, 0, 0, 1),
(77, '/Content/cate_list', '栏目管理', 1, NULL, 0, 76, 1, 0, 0, 1),
(78, '/Content/content_list', '内容管理', 1, NULL, 0, 76, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_picture`
--

CREATE TABLE IF NOT EXISTS `youzhan_picture` (
  `aid` int(7) NOT NULL,
  `title` varchar(55) NOT NULL,
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `addtime` varchar(60) NOT NULL COMMENT '创建日期',
  `img_duo` varchar(255) NOT NULL,
  `typeid` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_role`
--

CREATE TABLE IF NOT EXISTS `youzhan_role` (
  `id` smallint(6) unsigned NOT NULL,
  `name` varchar(20) NOT NULL,
  `num` int(4) DEFAULT '0',
  `pid` smallint(6) DEFAULT NULL,
  `status` tinyint(1) unsigned DEFAULT NULL,
  `role_aoth` varchar(50) DEFAULT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `ename` varchar(5) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_role`
--

INSERT INTO `youzhan_role` (`id`, `name`, `num`, `pid`, `status`, `role_aoth`, `remark`, `ename`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 0, NULL, 1, NULL, NULL, NULL, 1483429525, 1483429525),
(6, '内容管理员', 0, NULL, 1, NULL, NULL, NULL, 1504057016, 1505640236);

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_role_user`
--

CREATE TABLE IF NOT EXISTS `youzhan_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_role_user`
--

INSERT INTO `youzhan_role_user` (`role_id`, `user_id`) VALUES
(1, '68');

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_user`
--

CREATE TABLE IF NOT EXISTS `youzhan_user` (
  `id` smallint(5) unsigned NOT NULL,
  `username` varchar(64) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `realname` varchar(30) DEFAULT NULL,
  `password` char(32) NOT NULL,
  `bind_account` varchar(50) NOT NULL,
  `last_login_time` int(11) unsigned DEFAULT '0',
  `last_login_ip` varchar(40) DEFAULT NULL,
  `login_count` mediumint(8) unsigned DEFAULT '0',
  `verify` varchar(32) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `remark` varchar(255) NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `type_id` tinyint(2) unsigned DEFAULT '0',
  `info` text NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=83 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_user`
--

INSERT INTO `youzhan_user` (`id`, `username`, `nickname`, `realname`, `password`, `bind_account`, `last_login_time`, `last_login_ip`, `login_count`, `verify`, `email`, `remark`, `create_time`, `update_time`, `status`, `type_id`, `info`) VALUES
(68, 'admin', '管理员', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 1505835688, '127.0.0.1', 169, NULL, '', '', 1467963560, 1467963560, 1, 0, '/portrait/57be642fb50eb.png');

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_webconfig`
--

CREATE TABLE IF NOT EXISTS `youzhan_webconfig` (
  `id` int(11) NOT NULL COMMENT 'id',
  `sitename` varchar(30) NOT NULL COMMENT '站点名称',
  `domain` varchar(35) NOT NULL COMMENT '网站域名',
  `keywords` varchar(200) NOT NULL COMMENT '关键词',
  `descriptions` varchar(200) NOT NULL COMMENT '网站描述',
  `beian` varchar(50) DEFAULT NULL COMMENT '备案号'
) ENGINE=MyISAM AUTO_INCREMENT=112 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_webconfig`
--

INSERT INTO `youzhan_webconfig` (`id`, `sitename`, `domain`, `keywords`, `descriptions`, `beian`) VALUES
(1, '深圳市联众贝尔木业有限公司', 'http://www.dongguan.me', '深圳市联众贝尔木业有限公司', '深圳市联众贝尔木业有限公司', '待添加'),
(2, 'asdgsa', 'sadg', 'asdgsa', 'asdgsa', 'asdg');

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
-- Indexes for table `youzhan_access`
--
ALTER TABLE `youzhan_access`
  ADD KEY `groupId` (`role_id`),
  ADD KEY `nodeId` (`node_id`);

--
-- Indexes for table `youzhan_article`
--
ALTER TABLE `youzhan_article`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `youzhan_cate`
--
ALTER TABLE `youzhan_cate`
  ADD PRIMARY KEY (`typeid`);

--
-- Indexes for table `youzhan_model`
--
ALTER TABLE `youzhan_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `youzhan_node`
--
ALTER TABLE `youzhan_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `youzhan_picture`
--
ALTER TABLE `youzhan_picture`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `youzhan_role`
--
ALTER TABLE `youzhan_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`pid`),
  ADD KEY `ename` (`ename`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `youzhan_role_user`
--
ALTER TABLE `youzhan_role_user`
  ADD KEY `group_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `youzhan_user`
--
ALTER TABLE `youzhan_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`username`);

--
-- Indexes for table `youzhan_webconfig`
--
ALTER TABLE `youzhan_webconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `youzhan_xiangmu`
--
ALTER TABLE `youzhan_xiangmu`
  ADD PRIMARY KEY (`aid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `youzhan_article`
--
ALTER TABLE `youzhan_article`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `youzhan_cate`
--
ALTER TABLE `youzhan_cate`
  MODIFY `typeid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `youzhan_model`
--
ALTER TABLE `youzhan_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `youzhan_node`
--
ALTER TABLE `youzhan_node`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `youzhan_picture`
--
ALTER TABLE `youzhan_picture`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `youzhan_role`
--
ALTER TABLE `youzhan_role`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `youzhan_user`
--
ALTER TABLE `youzhan_user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `youzhan_webconfig`
--
ALTER TABLE `youzhan_webconfig`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'id',AUTO_INCREMENT=112;
--
-- AUTO_INCREMENT for table `youzhan_xiangmu`
--
ALTER TABLE `youzhan_xiangmu`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
