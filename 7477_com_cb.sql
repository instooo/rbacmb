-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-05 20:36:31
-- 服务器版本： 5.6.24
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `7477_com_cb`
--

-- --------------------------------------------------------

--
-- 表的结构 `mygame_access`
--

CREATE TABLE IF NOT EXISTS `mygame_access` (
  `role_id` smallint(6) unsigned NOT NULL,
  `node_id` smallint(6) unsigned NOT NULL,
  `level` tinyint(1) NOT NULL,
  `pid` smallint(6) NOT NULL,
  `module` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_access`
--

INSERT INTO `mygame_access` (`role_id`, `node_id`, `level`, `pid`, `module`) VALUES
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
(6, 46, 0, 0, NULL),
(6, 59, 0, 0, NULL),
(6, 60, 0, 0, NULL),
(6, 61, 0, 0, NULL),
(6, 62, 0, 0, NULL),
(6, 47, 0, 0, NULL),
(6, 48, 0, 0, NULL),
(6, 63, 0, 0, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `mygame_cb`
--

CREATE TABLE IF NOT EXISTS `mygame_cb` (
  `id` int(10) unsigned NOT NULL,
  `m_id` int(11) NOT NULL,
  `agreetment` varchar(255) NOT NULL,
  `des` varchar(255) NOT NULL,
  `s_time` varchar(60) NOT NULL,
  `e_time` varchar(60) NOT NULL,
  `total_money` int(11) NOT NULL,
  `cost_money` int(11) NOT NULL,
  `have_money` int(11) NOT NULL,
  `ht_pic` varchar(255) NOT NULL COMMENT '合同图片',
  `fp_pic` varchar(255) NOT NULL COMMENT '发票图片',
  `status` int(11) NOT NULL DEFAULT '0' COMMENT '1:已付款 0：未付款',
  `hz_type` int(11) NOT NULL COMMENT '合作方式',
  `type` int(11) NOT NULL COMMENT '类型:测试和正式',
  `fk_time` int(11) NOT NULL,
  `add_time` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_cb`
--

INSERT INTO `mygame_cb` (`id`, `m_id`, `agreetment`, `des`, `s_time`, `e_time`, `total_money`, `cost_money`, `have_money`, `ht_pic`, `fp_pic`, `status`, `hz_type`, `type`, `fk_time`, `add_time`) VALUES
(1, 5, '测试合同1', '头部位置', '1503892800', '1503892800', 10000, 0, 10000, '/Public/uploads/2017-08-28/59a3ee28d1790.jpg|/Public/uploads/2017-08-28/59a3ee28d2730.jpg', '/Public/uploads/2017-08-28/59a3eb8a38658.png|/Public/uploads/2017-08-28/59a3eb8a38e28.png', 1, 2, 1, 1503914266, 1503914255),
(2, 35, 'asdgsa', 'asd', '1503892800', '1503892800', 0, 0, 0, '', '0', 1, 1, 0, 1503917197, 1503915622),
(3, 35, '阿迪飞洒', '阿斯顿发生', '1503892800', '1503892800', 0, 0, 0, '', '0', 1, 1, 0, 1503917199, 1503916870),
(8, 14, '测试2', '阿达', '1503936000', '1504022399', 100000, 40000, 60000, '', '0', 0, 1, 1, 0, 1503989172),
(7, 10, '测试合同', '测试合同', '1503936000', '1504022399', 100000, 0, 100000, '', '0', 0, 2, 1, 0, 1503985788),
(9, 14, '是风飒飒大', '阿达', '1503936000', '1504022399', 5, 5, 0, '', '0', 0, 1, 1, 0, 1503995522),
(10, 38, '龙管家返网费', '龙管家返网费', '1504195200', '1506787199', 93600, 0, 93600, '', '0', 0, 1, 0, 0, 1504059691),
(11, 38, '龙管家微端', '龙管家微端-桌标', '1503676800', '1503935999', 30000, 10000, 20000, '', '0', 1, 2, 1, 1504059950, 1504059820),
(12, 35, '顺网', '网吧影音', '1504108800', '1506700799', 200000, 0, 200000, '', '0', 0, 1, 0, 0, 1504062359),
(13, 35, '顺网', '效果宝', '1503504000', '1504281599', 10000, 0, 10000, '', '0', 0, 1, 0, 0, 1504062436);

-- --------------------------------------------------------

--
-- 表的结构 `mygame_hz_type`
--

CREATE TABLE IF NOT EXISTS `mygame_hz_type` (
  `id` int(11) unsigned NOT NULL,
  `typename` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_hz_type`
--

INSERT INTO `mygame_hz_type` (`id`, `typename`) VALUES
(1, 'CPA'),
(2, '包年');

-- --------------------------------------------------------

--
-- 表的结构 `mygame_node`
--

CREATE TABLE IF NOT EXISTS `mygame_node` (
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
) ENGINE=MyISAM AUTO_INCREMENT=68 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_node`
--

INSERT INTO `mygame_node` (`id`, `name`, `title`, `status`, `remark`, `sort`, `pid`, `level`, `type`, `group_id`, `ismenu`) VALUES
(1, '/', '权限管理', 1, NULL, 0, 0, 0, 0, 0, 1),
(2, '/Permission/nodeList', '节点列表', 1, NULL, 0, 1, 1, 0, 0, 1),
(3, '/Permission/roleList', '角色列表', 1, NULL, 0, 1, 1, 0, 0, 1),
(4, '/Permission/memberList', '用户列表', 1, NULL, 0, 1, 1, 0, 0, 1),
(47, '/System/userChannel', '用户媒体赋权', 1, NULL, 0, 46, 1, 0, 0, 1),
(46, '/', '推广消耗管理', 1, NULL, 0, 0, 0, 0, 0, 1),
(44, '/', '媒体管理', 1, NULL, 0, 0, 0, 0, 0, 1),
(45, '/cost/index', '媒体合同管理', 1, NULL, 0, 44, 1, 0, 0, 1),
(14, '/Permission/memberEdit', '编辑用户', 1, NULL, 0, 1, 1, 0, 0, 0),
(15, '/Permission/memberAdd', '添加用户', 1, NULL, 0, 1, 1, 0, 0, 0),
(16, '/Permission/memberDelete', '删除用户', 1, NULL, 0, 1, 1, 0, 0, 0),
(48, '/System/doEditUserChannel', '编辑用户媒体', 1, NULL, 0, 46, 1, 0, 0, 0),
(18, '/Permission/roleAdd', '添加角色', 1, NULL, 0, 1, 1, 0, 0, 0),
(19, '/Permission/roleDelete', '删除角色', 1, NULL, 0, 1, 1, 0, 0, 0),
(49, '/Media/medium_info', '媒体管理', 1, NULL, 0, 44, 1, 0, 0, 1),
(21, '/Permission/roleEdit', '编辑角色', 1, NULL, 0, 1, 1, 0, 0, 0),
(22, '/Permission/addAccess', '分配权限', 1, NULL, 0, 1, 1, 0, 0, 0),
(50, '/Media/medium_add', '推广媒体添加', 1, NULL, 0, 44, 1, 0, 0, 0),
(51, '/Media/medium_upd', '推广媒体修改', 1, NULL, 0, 44, 1, 0, 0, 0),
(52, '/Media/medium_upzy', '推广媒体转移', 1, NULL, 0, 44, 1, 0, 0, 0),
(53, '/Media/medium_del', '推广媒体删除', 1, NULL, 0, 44, 1, 0, 0, 0),
(54, '/cost/add', '添加成本', 1, NULL, 0, 44, 1, 0, 0, 0),
(55, '/cost/fukuan', '付款', 1, NULL, 0, 44, 1, 0, 0, 0),
(56, '/cost/files_pic', '添加附件', 1, NULL, 0, 44, 1, 0, 0, 0),
(57, '/cost/edit', '修改合同', 1, NULL, 0, 44, 1, 0, 0, 0),
(58, '/cost/getdetail', '查看明细', 1, NULL, 0, 44, 1, 0, 0, 0),
(59, '/Spend/index', '消耗管理', 1, NULL, 0, 46, 1, 0, 0, 1),
(60, '/Spend/add', '添加消耗', 1, NULL, 0, 46, 1, 0, 0, 0),
(61, '/Spend/delete', '删除消耗', 1, NULL, 0, 46, 1, 0, 0, 0),
(62, '/spend/shenghe', '审核消耗', 1, NULL, 0, 46, 1, 0, 0, 0),
(63, '/spend/get_ht', '获得可选媒体', 1, NULL, 0, 46, 1, 0, 0, 0),
(64, '/report/index', '数据分析', 1, NULL, 0, 0, 0, 0, 0, 1),
(65, '/report/spend_all', 'CPS用户收入汇总', 1, NULL, 0, 64, 1, 0, 0, 1),
(66, '/report/spend_now', 'cps月度当月cps汇总', 1, NULL, 0, 64, 1, 0, 0, 1),
(67, '/report/cb_data', '媒体成本汇总', 1, NULL, 0, 64, 1, 0, 0, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mygame_role`
--

CREATE TABLE IF NOT EXISTS `mygame_role` (
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
-- 转存表中的数据 `mygame_role`
--

INSERT INTO `mygame_role` (`id`, `name`, `num`, `pid`, `status`, `role_aoth`, `remark`, `ename`, `create_time`, `update_time`) VALUES
(1, '超级管理员', 0, NULL, 1, NULL, NULL, NULL, 1483429525, 1483429525),
(4, '媒介专员', 0, NULL, 1, NULL, NULL, NULL, 1503571248, 1503645172),
(5, '推广专员', 0, NULL, 1, NULL, NULL, NULL, 1504056647, 1504056647),
(6, '推广主管', 0, NULL, 1, NULL, NULL, NULL, 1504057016, 1504057016);

-- --------------------------------------------------------

--
-- 表的结构 `mygame_role_user`
--

CREATE TABLE IF NOT EXISTS `mygame_role_user` (
  `role_id` mediumint(9) unsigned DEFAULT NULL,
  `user_id` char(32) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_role_user`
--

INSERT INTO `mygame_role_user` (`role_id`, `user_id`) VALUES
(1, '68'),
(4, '79'),
(4, '80'),
(5, '81'),
(5, '82');

-- --------------------------------------------------------

--
-- 表的结构 `mygame_spend`
--

CREATE TABLE IF NOT EXISTS `mygame_spend` (
  `id` int(11) NOT NULL,
  `m_id` int(11) NOT NULL,
  `cps_id` int(11) NOT NULL,
  `gid` int(11) NOT NULL,
  `ht_id` int(11) NOT NULL,
  `money` int(11) NOT NULL,
  `des` varchar(255) DEFAULT NULL,
  `date` varchar(60) NOT NULL COMMENT '消耗时间',
  `spend_time` int(11) NOT NULL,
  `addtime` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` tinyint(2) DEFAULT '0'
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_spend`
--

INSERT INTO `mygame_spend` (`id`, `m_id`, `cps_id`, `gid`, `ht_id`, `money`, `des`, `date`, `spend_time`, `addtime`, `user_id`, `status`) VALUES
(11, 14, 4838757, 83, 8, 10000, '撒旦飞洒', '20170829', 1503979200, 1504006958, 68, 1),
(12, 14, 4838757, 82, 8, 30000, '撒范德萨', '20170829', 1503979200, 1504007114, 68, 1),
(13, 38, 4845151, 84, 11, 10000, '鞍山师范萨芬', '20170829', 1503892800, 1504064279, 81, 1),
(14, 14, 4838757, 84, 8, 5000, '撒旦飞洒', '20170829', 1503979200, 1504006958, 68, 1),
(15, 14, 4838757, 84, 8, 10000, '撒旦飞洒', '20170830', 1503979200, 1504006958, 68, 1),
(16, 14, 4838757, 84, 8, 10000, '撒旦飞洒', '20170830', 1503979200, 1504006958, 68, 1),
(17, 14, 4838757, 84, 8, 10000, '撒旦飞洒', '20170830', 1503979200, 1504006958, 68, 1),
(18, 14, 4838757, 84, 8, 10000, '撒旦飞洒', '20170830', 1503979200, 1504006958, 68, 1);

-- --------------------------------------------------------

--
-- 表的结构 `mygame_user`
--

CREATE TABLE IF NOT EXISTS `mygame_user` (
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
-- 转存表中的数据 `mygame_user`
--

INSERT INTO `mygame_user` (`id`, `username`, `nickname`, `realname`, `password`, `bind_account`, `last_login_time`, `last_login_ip`, `login_count`, `verify`, `email`, `remark`, `create_time`, `update_time`, `status`, `type_id`, `info`) VALUES
(68, 'admin', '管理员', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 1504578191, '127.0.0.1', 159, NULL, '', '', 1467963560, 1467963560, 1, 0, '/portrait/57be642fb50eb.png'),
(79, 'mj01', '刘洋洋', 'mj01', 'e10adc3949ba59abbe56e057f20f883e', '', 1504072437, NULL, 12, NULL, 'mj01@7477.com', '', 1503645209, 1503645209, 1, 0, ''),
(80, 'mj02', '向响', 'mj02', 'e10adc3949ba59abbe56e057f20f883e', '', 1503915484, NULL, 3, NULL, 'mj02@7477.com', '', 1503646335, 1503646335, 1, 0, ''),
(81, 'tg01', '江建平', 'tg01', 'e10adc3949ba59abbe56e057f20f883e', '', 1504063716, NULL, 3, NULL, 'tg01@7477.com', '', 1504056666, 1504056666, 1, 0, ''),
(82, 'tg02', '甘雨', 'tg02', 'e10adc3949ba59abbe56e057f20f883e', '', 1504056693, NULL, 0, NULL, 'tg02@7477.com', '', 1504056693, 1504056693, 1, 0, '');

-- --------------------------------------------------------

--
-- 表的结构 `mygame_user_channel`
--

CREATE TABLE IF NOT EXISTS `mygame_user_channel` (
  `user_id` smallint(5) NOT NULL,
  `cid` int(11) NOT NULL,
  `cps_name` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_user_channel`
--

INSERT INTO `mygame_user_channel` (`user_id`, `cid`, `cps_name`) VALUES
(68, 5176122, 'sptg_cps'),
(68, 5176120, 'sem_cps'),
(68, 5176119, 'txdfz_cps'),
(68, 5176117, 'ygmt_cps'),
(68, 5175012, 'sdw_cps'),
(68, 5173204, 'xllm_cps'),
(68, 5173117, 'daqingwang_cps'),
(68, 5171777, '7979u_cps'),
(68, 5170286, '5336_cps'),
(68, 5170282, '323G_cps'),
(68, 5170279, '2114_cps'),
(68, 5161580, '4q5q_cps'),
(68, 5155197, 'mstx_cps'),
(68, 5117613, 'v1_cps'),
(68, 5109022, 'sinatg_cps'),
(68, 5108751, 'sgtg_cps'),
(68, 5092447, 'dxl_cps'),
(68, 5092439, '7477_cps'),
(68, 5092430, 'yxkj_cps'),
(68, 5009008, 'dayuwang_cps'),
(68, 4997822, 'dqw_cps'),
(68, 4990063, 'jy_cps'),
(68, 4990054, 'hao123_cps'),
(68, 4978363, 'dzw_cps'),
(68, 4978362, 'dsw_cps'),
(68, 4978361, 'dcw_cps'),
(68, 4969415, 'tjw_cps'),
(68, 4940162, 'vonwey'),
(68, 4937892, 'pcdd_cps'),
(68, 4887412, 'kd100_cps'),
(68, 4885319, 'wd_cps'),
(68, 4875102, 'bf_cps'),
(68, 4873542, 'dyw_cps'),
(68, 4870102, 'kp_cps'),
(68, 4866102, '114la_cps'),
(68, 4860151, '07073_cps'),
(68, 4857841, '56_cps'),
(68, 4846767, 'shsp_cps'),
(68, 4846736, 'xl_cps'),
(68, 4845151, 'bdtg_cps'),
(68, 4845011, 'pptv_cps'),
(68, 4839171, 'lt_cps'),
(68, 4838777, 'juxia_cps'),
(81, 4845151, 'bdtg_cps'),
(81, 4845011, 'pptv_cps'),
(81, 4839171, 'lt_cps'),
(79, 4838754, '40407_cps'),
(81, 4838777, 'juxia_cps'),
(81, 4838776, '9k9k_cps'),
(81, 4838757, '265G_cps'),
(81, 4838754, '40407_cps'),
(68, 4838776, '9k9k_cps'),
(68, 4838757, '265G_cps'),
(68, 4838754, '40407_cps'),
(68, 5177117, 'wps_cps'),
(68, 5178131, 'i1758_cps'),
(68, 5189034, 'mp_cps'),
(68, 5210897, 'qlw_cps'),
(68, 5227976, '52pk_cps'),
(68, 5228068, 'cjw_cps'),
(68, 5230355, 'zgxww_cps'),
(68, 5230561, 'dwbs_cps'),
(68, 5246601, 'zhw_cps'),
(68, 5314787, 'sohu_cps'),
(68, 5332191, 'tengx_cps');

-- --------------------------------------------------------

--
-- 表的结构 `mygame_user_meidium`
--

CREATE TABLE IF NOT EXISTS `mygame_user_meidium` (
  `user_id` smallint(5) NOT NULL,
  `m_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `mygame_user_meidium`
--

INSERT INTO `mygame_user_meidium` (`user_id`, `m_id`) VALUES
(68, 31),
(79, 33),
(68, 6),
(79, 34),
(79, 4),
(79, 35),
(79, 5),
(79, 36),
(79, 38);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mygame_access`
--
ALTER TABLE `mygame_access`
  ADD KEY `groupId` (`role_id`),
  ADD KEY `nodeId` (`node_id`);

--
-- Indexes for table `mygame_cb`
--
ALTER TABLE `mygame_cb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `cost_money` (`cost_money`),
  ADD KEY `status` (`status`),
  ADD KEY `hz_type` (`hz_type`),
  ADD KEY `type` (`type`),
  ADD KEY `have_money` (`have_money`);

--
-- Indexes for table `mygame_hz_type`
--
ALTER TABLE `mygame_hz_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mygame_node`
--
ALTER TABLE `mygame_node`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`),
  ADD KEY `pid` (`pid`),
  ADD KEY `status` (`status`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `mygame_role`
--
ALTER TABLE `mygame_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parentId` (`pid`),
  ADD KEY `ename` (`ename`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `mygame_role_user`
--
ALTER TABLE `mygame_role_user`
  ADD KEY `group_id` (`role_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `mygame_spend`
--
ALTER TABLE `mygame_spend`
  ADD PRIMARY KEY (`id`),
  ADD KEY `m_id` (`m_id`),
  ADD KEY `gid` (`gid`),
  ADD KEY `cps_id` (`cps_id`);

--
-- Indexes for table `mygame_user`
--
ALTER TABLE `mygame_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `account` (`username`);

--
-- Indexes for table `mygame_user_channel`
--
ALTER TABLE `mygame_user_channel`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cid` (`cid`),
  ADD KEY `cps_name` (`cps_name`);

--
-- Indexes for table `mygame_user_meidium`
--
ALTER TABLE `mygame_user_meidium`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `cid` (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `mygame_cb`
--
ALTER TABLE `mygame_cb`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `mygame_node`
--
ALTER TABLE `mygame_node`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `mygame_role`
--
ALTER TABLE `mygame_role`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mygame_spend`
--
ALTER TABLE `mygame_spend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `mygame_user`
--
ALTER TABLE `mygame_user`
  MODIFY `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=83;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
