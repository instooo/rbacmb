-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-22 19:02:45
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
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_article`
--

INSERT INTO `youzhan_article` (`aid`, `title`, `weight`, `description`, `addtime`, `updatetime`, `imgurl`, `img_duo`, `content`, `typeid`, `status`, `webconfig_id`) VALUES
(49, '精彩纷呈！东关·拾悦城-CCTV少儿艺术人才选拔深圳总决赛圆满落幕！', 0, '8月6日，2017中央电视台少儿艺术人才选拔大赛》深圳赛区总决赛在东关·拾悦城体验中心拉开华丽帷幕。本次活动 吸引了深圳众多才华横溢的小朋友前来一试身手，他们在舞台上尽情演绎自我，展现出新一代青少年的独特精神风貌和强烈 的文化气息。', '1505894002', '2017-09-20 15:37:48', '', '', '<p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px; font-family: 微软雅黑; white-space: normal;">8月6日，2017中央电视台少儿艺术人才选拔大赛》深圳赛区总决赛在东关·拾悦城体验中心拉开华丽帷幕。本次活动 吸引了深圳众多才华横溢的小朋友前来一试身手，他们在舞台上尽情演绎自我，展现出新一代青少年的独特精神风貌和强烈 的文化气息。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px; font-family: 微软雅黑; white-space: normal; text-align: center;"><img src="/uploads/20170920/1505893970104674.jpg" title="1505893970104674.jpg" alt="2.jpg"/></p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px; font-family: 微软雅黑; white-space: normal;">深圳的孩子们本就多才多艺，而参加此次大赛的更是个中翘楚。在东关·拾悦城总决赛的大舞台上，他们落落大方，台风稳健， 才艺表演精彩绝伦。而场下则是掌声不断，喝彩连连！</p><p><br/></p>', 13, 1, 1),
(50, '拾悦城世界湾价值高峰论坛暨体验中心开放', 1, '017年6月18日，东关·拾悦城体验中心盛大开放，“世界的湾 生活的城”世界湾价值高峰论坛也于项目现场揭幕。深圳主流地产媒体、业界众多大咖齐聚一堂。', '1505983981', '2017-09-21 16:51:47', '', '', '<p>017年6月18日，东关·拾悦城体验中心盛大开放，“世界的湾 生活的城”世界湾价值高峰论坛也于项目现场揭幕。深圳主流地产媒体、业界众多大咖齐聚一堂。</p>', 13, 1, 1),
(51, '东关·拾悦城封顶', 0, '8月6日，2017中央电视台少儿艺术人才选拔大赛》深圳赛区总决赛在东关·拾悦城体验中心拉开华丽帷幕。本次活动 吸引了深圳众多才华横溢的小朋友前来一试身手，他们在舞台上尽情演绎自我，展现出新一代青少年的独特精神风貌和强烈 的文化气息。', '1505994557', '2017-09-21 19:48:20', '', '', '<p><span style="color: rgb(152, 152, 152); font-family: 微软雅黑; font-size: 12px;">深圳的孩子们本就多才多艺，而参加此次大赛的更是个中翘楚。在东关·拾悦城总决赛的大舞台上，他们落落大方，台风稳健， 才艺表演精彩绝伦。而场下则是掌声不断，喝彩连连！</span></p><ul style="list-style-type: none;" class=" list-paddingleft-2"><li><p><a href="file:///C:/Users/asus/Desktop/dongguan/news-content.html" style="padding: 0px; border: 0px; margin: 0px; list-style-type: none; color: rgb(71, 69, 69); text-decoration-line: none; font-size: 18px;">东关·拾悦城封顶</a></p><p>发布者：东关集团</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; line-height: 24px;"><a href="file:///C:/Users/asus/Desktop/dongguan/news-content.html" style="padding: 0px; border: 0px; margin: 0px; list-style-type: none; color: rgb(152, 152, 152); text-decoration-line: none; font-size: 12px;">2017年7月20日，由深圳市东关投资集团有限公司开发的城市西部力作——拾悦城，如期封顶。</a></p></li><li><p><a href="file:///C:/Users/asus/Desktop/dongguan/news-content.html" style="padding: 0px; border: 0px; margin: 0px; list-style-type: none; color: rgb(71, 69, 69); text-decoration-line: none; font-size: 18px;">拾悦城世界湾价值高峰论坛暨体验中心开放</a></p><p>发布者：东关集团</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; line-height: 24px;"><a href="file:///C:/Users/asus/Desktop/dongguan/news-content.html" style="padding: 0px; border: 0px; margin: 0px; list-style-type: none; color: rgb(152, 152, 152); text-decoration-line: none; font-size: 12px;">017年6月18日，东关·拾悦城体验中心盛大开放，“世界的湾 生活的城”世界湾价值高峰论坛也于项目现场揭幕。深圳主流地产媒体、业界众多大咖齐聚一堂。</a></p></li><li><p><a href="file:///C:/Users/asus/Desktop/dongguan/news-content.html" style="padding: 0px; border: 0px; margin: 0px; list-style-type: none; color: rgb(71, 69, 69); text-decoration-line: none; font-size: 18px;">集团与建设银行深圳分行达成战略合作，获20亿元人民币授信额度</a></p><p>发布者：东关集团</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; line-height: 24px;"><a href="file:///C:/Users/asus/Desktop/dongguan/news-content.html" style="padding: 0px; border: 0px; margin: 0px; list-style-type: none; color: rgb(152, 152, 152); text-decoration-line: none; font-size: 12px;">2013年，东关集团投资有限公司（以下简称东关集团）与建设银行深圳分行在深圳签署战略合作协议，东关集团获20亿元人民币授信额度。</a></p></li></ul><p>JUL 20,2017</p><p>精彩纷呈！东关·拾悦城-CCTV少儿艺术人才选拔深圳总决赛圆满落幕！</p><p>发布者：东关集团 2017年7月20日</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px;">8月6日，2017中央电视台少儿艺术人才选拔大赛》深圳赛区总决赛在东关·拾悦城体验中心拉开华丽帷幕。本次活动 吸引了深圳众多才华横溢的小朋友前来一试身手，他们在舞台上尽情演绎自我，展现出新一代青少年的独特精神风貌和强烈 的文化气息。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px; text-align: center;"><img src="/Public/ueditor/themes/default/images/spacer.gif"/></p><p><br/></p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px;">深圳的孩子们本就多才多艺，而参加此次大赛的更是个中翘楚。在东关·拾悦城总决赛的大舞台上，他们落落大方，台风稳健， 才艺表演精彩绝伦。而场下则是掌声不断，喝彩连连！</p><p><br/></p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px; text-align: center;">孩子在获奖受表扬的同时，家长们更是自豪满满。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px; text-align: center;"><img src="/Public/ueditor/themes/default/images/spacer.gif"/></p><p><br/></p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px;">活动精彩时刻</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px;">showtime</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; color: rgb(152, 152, 152); font-size: 12px; line-height: 24px;">活动现场的参赛者们各施绝技，表演形式多种多样——独唱、街舞、维族舞蹈、拉丁伦巴、印度独舞等。精彩表演持续不断， 为现场的观众带来了一场难得的视听盛宴。</p><p><br/></p>', 13, 1, 1),
(52, '测试新闻', 10, '测试新闻', '1505996683', '2017-09-21 20:24:30', '', '', '<p>测试新闻</p>', 13, 1, 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_cate`
--

INSERT INTO `youzhan_cate` (`typeid`, `typename`, `description`, `pid`, `web_id`, `m_id`, `content`) VALUES
(13, '集团新闻', '', 31, 0, 1, ''),
(24, '企业年志', '企业年志', 27, 0, 10, ''),
(15, '房地产开发', '房地产开发', 30, 0, 0, '<p>集团房地产开发团队善于发现客户需求，从关怀人性、关注生活本源为根本出发点，凝萃二十余载开发智慧，专注于精品物业的设计与生活氛围营造。团队对每个细节都精益求精，致力于将产品做到极致，从项目规划、建筑、景观、户型研究到交付，只为品质一步到位，打造世人期待的理想家园。</p>'),
(19, '置业投资', '在置业投资领域，集金融与房地产开发前期运营策划，土地包装及推广，通过商业运营，收购物业进行资产重组，激活置业投资产业链，携手合作伙伴共赢未来。', 30, 0, 2, ''),
(20, '物业服务', '', 30, 0, 0, '<p>集团二十余年来不断洞悉客户需求，更将客户视为终生服务与关注的对象，不仅在房地产开发层面以品质致胜，还要致力使客户能全方位享受到高品质人居体验。&nbsp;</p><p>万家好物业服务有限公司秉承“贴心服务，永无止境”的服务理念，以服务集团地产项目为主，为客户提供专业化、智能化、一站式的物业管理服务，使住户始终能享有安全、优美、和谐的居住环境与生活氛围。</p>'),
(21, '社会公益', '社会公益', 0, 0, 0, '<h3>弘英明德 止于至善</h3><p>慈善是一份责任。</p><p>集团在企业健康发展的同时，也持续践行企业社会责任，并设立深圳明英慈善基金会，与全体员工携手积极投身社会公益事业与慈善事业回馈社会。</p><p>深圳市明英慈善基金会以“关注慈善，回报社会，扶贫济困，促进和谐”为使命，关注范围涵括扶贫、教育、赈灾、环保及文化事业等领域。</p>'),
(22, '人在关东', '人在关东', 32, 0, 2, ''),
(23, '东关招聘', '东关招聘', 32, 0, 12, ''),
(25, '企业荣誉', '企业荣誉', 27, 0, 2, ''),
(26, '合作伙伴', '合作伙伴', 27, 0, 2, ''),
(27, '走进东关', '走进东关', 0, 0, 0, '<p>走进东关</p>'),
(28, '企业理念', '企业理念', 27, 0, 2, ''),
(29, '城市更新', '土地的二次利用和开发，将是未来中国地产行业的重大机遇！\n      2014年，东关集团紧抓城市规划改革契机，组建城市更新专业团队拓展城市更新版图，在满足城市价值重塑与居民生活品质提升的前提下，通过科学、系统和有效的质量保证体系，将完善的配套与丰富功能融入项目设计中，使每个更新项目成为拉动区域腾飞的核心力量！', 30, 0, 2, ''),
(30, '集团产业', '集团产业', 0, 0, 0, '<p>集团产业</p>'),
(31, '新闻中心', '', 0, 0, 0, ''),
(32, '加入我们', '', 0, 0, 0, ''),
(33, '热销项目', '热销项目', 15, 0, 9, ''),
(34, '在建项目', '在建项目', 15, 0, 9, ''),
(35, '已建项目', '已建项目', 15, 0, 9, ''),
(36, '企业介绍--东关集团', '东关集团成立于1995年，经过二十余年的发展，成为以房地产开发与城市更新为主力、同时集合置业投资、物业服务于一体的专业房地产集团。', 27, 0, 0, '<p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 30px; list-style-type: none; font-size: 14px; color: rgb(101, 101, 101); line-height: 30px; font-family: 微软雅黑; white-space: normal;">东关集团成立于1995年，经过二十余年的发展，成为以房地产开发与城市更新为主力、同时集合置业投资、物业服务于一体的专业房地产集团。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 30px; list-style-type: none; font-size: 14px; color: rgb(101, 101, 101); line-height: 30px; font-family: 微软雅黑; white-space: normal;">集团以务实、多元的发展策略，聚焦深圳、汕尾两地房地产开发市场，已开发项目建筑面积超100万平方米。在业绩持续增长的同时，建立起“精工创享生活”的品牌形象。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 30px; list-style-type: none; font-size: 14px; color: rgb(101, 101, 101); line-height: 30px; font-family: 微软雅黑; white-space: normal;">2014年起，集团拓展城市更新版图，致力于配合政府城市发展规划、改善社区环境、提高居民生活品质，稳固了“东关集团”在业界的知名度。与此同时，集团通过商业运营，收购物业进行资产重组，激活置业投资全产业链。集团物业服务以 “万家好物业”为主体展开。万家好物业以服务集团地产项目为主，为客户提供专业化、智能化、一站式的物业管理服务。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 30px; list-style-type: none; font-size: 14px; color: rgb(101, 101, 101); line-height: 30px; font-family: 微软雅黑; white-space: normal;">未来，东关集团将继续秉承&quot;品质筑建未来&quot;的品牌理念，凭借战略规划的高效实施和良好的经营能力，打造属于东关人的百年基业!</p><p><br/></p>'),
(37, '企业介绍--集团掌舵人', '集团掌舵人', 27, 0, 0, '<h3 style="padding: 0px; border: 0px; margin: 0px 0px 30px; list-style-type: none; color: rgb(102, 100, 100); font-size: 28px; font-weight: normal; font-family: 微软雅黑; white-space: normal;">温坚生</h3><p style="padding: 0px; border: 0px; margin-top: 0px; list-style-type: none; font-size: 14px; color: rgb(101, 101, 101); line-height: 30px; letter-spacing: 2px; font-family: 微软雅黑; white-space: normal;">温坚生先生，早年毕业于深圳大学，后攻读于上海交通大学管理学院，获工商管理硕士学位。扎根企业管理与房地产开发近三十年。</p><p style="padding: 0px; border: 0px; margin-top: 0px; list-style-type: none; font-size: 14px; color: rgb(101, 101, 101); line-height: 30px; letter-spacing: 2px; font-family: 微软雅黑; white-space: normal;">1987年，时年25岁的温坚生先生大型国有企业任命为总经理。1992年温坚生先生被深圳市政府派往美国宾州部第安纳大学进修高级管理理论； 1995年创办深圳市东关集团公司，他以高深的管理理论造诣和丰富的管理实践经验，引领东关精英团队将一家小企业扩展成为大型集团式公司，获得较好的经济效益和社会效益。</p><p><br/></p>'),
(38, '城市更新--栏目介绍', '城市更新--栏目介绍', 29, 0, 0, '<p>&nbsp;&nbsp;&nbsp;&nbsp;土地的二次利用和开发，将是未来中国地产行业的重大机遇！\n &nbsp; &nbsp; &nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;2014年，东关集团紧抓城市规划改革契机，组建城市更新专业团队拓展城市更新版图，在满足城市价值重塑与居民生活品质提升的前提下，通过科学、系统和有效的质量保证体系，将完善的配套与丰富功能融入项目设计中，使每个更新项目成为拉动区域腾飞的核心力量！</p>'),
(39, '置业投资--栏目介绍', '置业投资--栏目介绍', 19, 0, 0, '<p>在置业投资领域，集金融与房地产开发前期运营策划，土地包装及推广，通过商业运营，收购物业进行资产重组，激活置业投资产业链，携手合作伙伴共赢未来。</p>'),
(40, '物业服务--头部图片切换', '物业服务--头部图片切换', 20, 0, 2, ''),
(41, '物业服务--底部图片切换', '', 20, 0, 2, ''),
(42, '社会公益--慈善行动', '社会公益--慈善行动', 21, 0, 2, '');

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_jobs`
--

CREATE TABLE IF NOT EXISTS `youzhan_jobs` (
  `aid` int(7) NOT NULL,
  `title` varchar(55) NOT NULL,
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `addtime` varchar(60) NOT NULL COMMENT '创建日期',
  `english` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `typeid` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_jobs`
--

INSERT INTO `youzhan_jobs` (`aid`, `title`, `weight`, `addtime`, `english`, `content`, `typeid`) VALUES
(1, '市场营销专员', 0, '1506077909', 'Marketing specialist ', '<p>1、负责公司产品的销售及推广；&nbsp;</p><p>2、根据市场营销计划，完成部门销售指标；</p><p>&nbsp;3、开拓新市场,发展新客户,增加产品销售范围；&nbsp;</p><p>4、负责辖区市场信息的收集及竞争对手的分析；</p><p>&nbsp;5、负责销售区域内销售活动的策划和执行，完成销售任务；</p><p>&nbsp;6、本科及以上学历，营销策划、计算机应用、电子商务类专业优先考虑。</p>', 23),
(2, '中心主任助理', 0, '1506077999', 'Central director assistant', '<p>岗位职责：</p><p>&nbsp;1、全面主持项目物业服务工作；&nbsp;</p><p>2、培训、督导、考评项目物业服务中心人员；</p><p>&nbsp;3、建立健全现场物业管理工作 ；</p><p>&nbsp;4、协助物业中心主任对各项目的工作进行监督与管理。</p><p><br/></p><p>&nbsp;任职要求：&nbsp;</p><p>1、大专（含）以上学历，物业管理等相关专业；</p><p>&nbsp;2、三年以上物业公司管理工作经验，良好的服务意识；</p><p>&nbsp;3、具备较强的计划与监督执行能力，客户关系管理能力，学习能力，人际沟通能力，团队组织、建设能力，综合安全运营能力及突发事件应急处理能力等，较强的服务意识和服务技巧；&nbsp;</p><p>4、有良好的心理素质、一定的抗压能力，优质的服务态度；\n5、持物业管理相关资格证者优先。</p>', 23);

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
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_model`
--

INSERT INTO `youzhan_model` (`id`, `name`, `class`, `form`, `status`) VALUES
(1, '文章模型', 'article', 'article', 1),
(2, '图片模型', 'picture', 'picture', 0),
(0, '单页模型', 'page', 'page', 1),
(9, '项目模型', 'xiangmu', 'xiangmu', 0),
(10, '企业年志', 'nianzhi', 'nianzhi', 0),
(12, '招聘模型', 'jobs', 'jobs', 0);

-- --------------------------------------------------------

--
-- 表的结构 `youzhan_nianzhi`
--

CREATE TABLE IF NOT EXISTS `youzhan_nianzhi` (
  `aid` int(7) NOT NULL,
  `title` varchar(55) NOT NULL,
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `addtime` varchar(60) NOT NULL COMMENT '创建日期',
  `htime` varchar(255) NOT NULL,
  `des` text NOT NULL,
  `typeid` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_nianzhi`
--

INSERT INTO `youzhan_nianzhi` (`aid`, `title`, `weight`, `addtime`, `htime`, `des`, `typeid`) VALUES
(1, '成立深圳市东关投资集团有限公司', 0, '1505987958', '', '成立深圳市东关投资集团有限公司', 24),
(2, '投资并开发深圳市福田区“花里林居”项目', 2, '1505987994', '', '投资并开发深圳市福田区“花里林居”项目', 24),
(3, '成立中共深圳市东关投资发展有限公司党支部', 3, '1505988011', '', '成立中共深圳市东关投资发展有限公司党支部', 24),
(4, '投资并开发深圳市龙岗区“非凡空间阁”项目', 4, '1505988032', '', '投资并开发深圳市龙岗区“非凡空间阁”项目', 24),
(5, '创立深圳市万家好物业服务有限公司  为非凡空间阁、岸上林居、拾悦城提供物业服务', 5, '1505988046', '', '创立深圳市万家好物业服务有限公司 \n为非凡空间阁、岸上林居、拾悦城提供物业服务', 24),
(6, '投资建立深圳市南头城同乐投资发展有限公司 开发深圳市南山区“乐尚林居”项目', 6, '1505988060', '', '投资建立深圳市南头城同乐投资发展有限公司\n开发深圳市南山区“乐尚林居”项目', 24),
(7, '合资成立深圳市东跃投资有限公司', 7, '1505988074', '', '合资成立深圳市东跃投资有限公司', 24),
(8, '集团与建设银行深圳分行签订战略合作协议 获得20亿元人民币授信额度', 8, '1505988096', '', '集团与建设银行深圳分行签订战略合作协议\n获得20亿元人民币授信额度', 24),
(9, '投资并更新开发深圳市坪山新区江边片区项目', 9, '1505988169', '', '投资并更新开发深圳市坪山新区江边片区项目', 24),
(10, '投资并更新开发梅林美视地块项目', 10, '1505988183', '', '投资并更新开发梅林美视地块项目', 24),
(11, '东关·拾悦城封顶', 11, '1505988196', '', '东关·拾悦城封顶', 24);

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
  `des` text NOT NULL,
  `img_duo` varchar(255) NOT NULL,
  `typeid` int(3) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_picture`
--

INSERT INTO `youzhan_picture` (`aid`, `title`, `weight`, `addtime`, `des`, `img_duo`, `typeid`) VALUES
(4, '敬业', 3, '1505986356', '', '/uploads/2017-09-21/59c3872411b9f.jpg', 28),
(5, '卓越', 2, '1505986389', '', '/uploads/2017-09-21/59c387740ecbf.jpg', 28),
(6, '2011年', 0, '1505990213', '荣获“深圳市福田区教育系统2011年先进基层党组织”', '/uploads/2017-09-21/59c396435886f.jpg', 25),
(7, '2015年', 1, '1505990351', '东关·岸上林居荣获“2015中国宜居示范楼盘”', '/uploads/2017-09-21/59c396ce4193f.jpg', 25),
(8, '2015年', 3, '1505990423', '东关·岸上林居荣获“2015中国房产风云榜最具影响力楼盘”', '/uploads/2017-09-21/59c397166f79f.jpg', 25),
(9, '2015年', 4, '1505990444', '荣获“汕尾市2015年度扶贫济困突出贡献”', '/uploads/2017-09-21/59c3972863837.jpg', 25),
(10, '2016年', 5, '1505990562', '成为“深圳市城市更新开发企业协会会员单位”', '/uploads/2017-09-21/59c397a160957.jpg', 25),
(11, '中国建设银行', 0, '1505990889', '中国建设银行', '/uploads/2017-09-21/59c398e74d0d7.jpg', 26),
(12, '兴业银行', 1, '1505990915', '兴业银行', '/uploads/2017-09-21/59c398f08d047.jpg', 26),
(13, '上海银行', 2, '1505990932', '上海银行', '/uploads/2017-09-21/59c3990a238c7.jpg', 26),
(14, '平安银行', 3, '1505990949', '平安银行', '/uploads/2017-09-21/59c3991ac1fef.jpg', 26),
(15, '坪山·江岭广场片区城市更新项目', 0, '1506056323', '截止目前，集团未来在深圳的土地及旧改项目储备土地约50万平方米，建筑面积约250万平方米，按照4万元/平方米的销售价格，未来房地产开发销售额将达到近1000亿元！', '/uploads/2017-09-22/59c4988208b17.jpg', 29),
(16, '测试', 0, '1506056984', '测试', '/uploads/2017-09-22/59c49b13dc5cf.png', 19),
(17, '测试2', 0, '1506057066', '测试2', '/uploads/2017-09-22/59c49b6718ce7.jpg', 19),
(18, '头部图片1', 0, '1506059509', '头部图片1', '/uploads/2017-09-22/59c4a4e945ba7.jpg', 40),
(19, '底部图片1', 0, '1506059630', '底部图片1', '/uploads/2017-09-22/59c4a5654a9c7.jpg', 41),
(20, '活动1', 0, '1506061346', '活动1', '/uploads/2017-09-22/59c4ac170872f.jpg', 42),
(21, '加入我们', 0, '1506077180', '加入我们', '/uploads/2017-09-22/59c4e9e22b5c7.jpg', 22);

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
(68, 'admin', '管理员', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 1506077057, '127.0.0.1', 173, NULL, '', '', 1467963560, 1467963560, 1, 0, '/portrait/57be642fb50eb.png');

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
(1, '东关集团', 'http://www.dongguan.me', '东关集团', '东关集团', '东关集团'),
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
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_xiangmu`
--

INSERT INTO `youzhan_xiangmu` (`aid`, `title`, `zdmianji`, `jzmianji`, `rongji`, `count`, `weight`, `addtime`, `img_duo`, `typeid`, `webconfig_id`, `content`) VALUES
(1, '项目好擦查获擦汗', '1231', '123131', '1231321', '123131', 0, '1505643012', '|', 16, 1, '<p>大法师asafa</p>'),
(2, '岸上林居', '12', '16654', '3.0', '748', 0, '1505991889', '||/uploads/2017-09-21/59c3a5864c137.jpg|/uploads/2017-09-21/59c3a5865c307.png|/uploads/2017-09-21/59c3a5866c4d7.jpg', 33, 1, '<p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; font-size: 12px; color: rgb(122, 112, 112); line-height: 22px; text-indent: 2em; font-family: 微软雅黑; white-space: normal;">岸上林居位于龙岗中心城CBD核心区，东关集团从项目的整体规划布局到建筑细节品质，倾尽全力，精益求精。依托大体量集中式的超级商业配套，立体式的城市交通路网，丰沛的生态森林资源，全屋品牌精装，为深圳东缔造中心宜居标杆。</p><p style="padding: 0px; border: 0px; margin-top: 0px; margin-bottom: 0px; list-style-type: none; font-size: 12px; color: rgb(122, 112, 112); line-height: 22px; text-indent: 2em; font-family: 微软雅黑; white-space: normal;">项目凭借新自然风情和休闲生态绿谷、景观生态家园的非凡设计理念，获得了2014年全国人居经典方案环境金奖。</p><p><br/></p>');

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
-- Indexes for table `youzhan_jobs`
--
ALTER TABLE `youzhan_jobs`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `youzhan_model`
--
ALTER TABLE `youzhan_model`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `youzhan_nianzhi`
--
ALTER TABLE `youzhan_nianzhi`
  ADD PRIMARY KEY (`aid`);

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
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `youzhan_cate`
--
ALTER TABLE `youzhan_cate`
  MODIFY `typeid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `youzhan_jobs`
--
ALTER TABLE `youzhan_jobs`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `youzhan_model`
--
ALTER TABLE `youzhan_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `youzhan_nianzhi`
--
ALTER TABLE `youzhan_nianzhi`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `youzhan_node`
--
ALTER TABLE `youzhan_node`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=79;
--
-- AUTO_INCREMENT for table `youzhan_picture`
--
ALTER TABLE `youzhan_picture`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
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
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
