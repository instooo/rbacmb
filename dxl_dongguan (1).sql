-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2017-09-11 17:21:33
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
-- 表的结构 `youzhan_article`
--

CREATE TABLE IF NOT EXISTS `youzhan_article` (
  `aid` int(7) NOT NULL,
  `title` varchar(55) NOT NULL,
  `keywords` varchar(55) DEFAULT NULL COMMENT '关键字',
  `weight` int(6) NOT NULL DEFAULT '0' COMMENT '权重',
  `description` varchar(255) NOT NULL,
  `addtime` int(15) NOT NULL COMMENT '创建日期',
  `updatetime` int(15) NOT NULL COMMENT '发布日期',
  `imgurl` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `typeid` int(3) NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `webconfig_id` int(2) NOT NULL COMMENT '所属站点(webconfig)'
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_article`
--

INSERT INTO `youzhan_article` (`aid`, `title`, `keywords`, `weight`, `description`, `addtime`, `updatetime`, `imgurl`, `content`, `typeid`, `status`, `webconfig_id`) VALUES
(37, '人居|木结构改变城市建筑生态，激发园林城市主义潜能', '', 0, '人居|木结构改变城市建筑生态，激发园林城市主义潜能', 1501742575, 1501742297, '/muwu_admin/Public/ueditor/php/upload/47531501742574.png', '<p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;">导语：优化城市布局，建造园林城市不仅为人们营造了舒适健康的居住环境，也将推动周边地区功能和经济的发展。</span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/40151501742563.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:457px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-family:宋体;font-size:18px;"> &nbsp; &nbsp;</span><span style="font-size:18px;"><span style="font-family:宋体;">近些年来，随着中国城市发展规模不断扩大，高度集中的资源和功能已经难以辐射到整个城市，中心城区也因为人口大量聚集而不堪重负，交通拥堵、环境污染等问题随之而来。中国社会科学院发布的《城市蓝皮书：中国城市发展报告No.8》中指出：中国“亚健康”城市已达九成以上。</span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/46391501742564.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:443px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/43831501742566.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:446px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-family:宋体;font-size:18px;"> &nbsp; &nbsp;</span><span style="font-size:18px;"><span style="font-family:宋体;">随着住建部评选出第一批“国家生态园林城市”，为改善城市坏境指明了方向，园林城市主义正渐渐兴起。拓展生活空间，营造生态健康的居住空间需要合理分配城区功能与资源，增加园林和绿地面积在城市中所占比重；也需要合理进行棚户区改造，拓展城市郊区功能，科学地对城乡结合部进行规划。</span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/38181501742569.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:393px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/27151501742570.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:437px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-family:宋体;font-size:18px;"> &nbsp; &nbsp;</span><span style="font-size:18px;"><span style="font-family:宋体;">建设生态园林城市以人、社会与自然的和谐为核心。随着城市建设规划政策的收紧，大兴土木的现象逐渐减少，木结构作为装配式建筑，受到国家政策的支持，对改变城市建筑的单一性、平衡城市建筑生态具有重要意义；作为绿色建筑，木结构的主体为可再生建材，低碳环保的搭建方式可以有效降低施工污染、净化城市环境；作为文化景观，木结构不仅继承传统建筑精髓，也具有现代风格和功能，可以自然的融入城市环境并提供公共服务。良好的城市布局不仅为人们提供舒适健康的居住环境，也将平衡城市功能和资源的分配，可谓一举两得。</span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/35591501742572.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:394px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><span style="font-family:宋体;"><img src="/muwu_admin/Public/ueditor/php/upload/47531501742574.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;height:386px;width:700px;" /></span></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-family:宋体;font-size:18px;"> &nbsp; &nbsp;</span><span style="font-size:18px;"><span style="font-family:宋体;">随着新城市城郊一体化工作的需求，以木结构为代表的绿色建筑/装配式建筑将更多的被纳入城市功能规划中，在营造宜居环境的同时为人们提供便利服务，在推动环保健康理念发展的同时促进都市生态景观建设；联众将继续坚持技术创新，完善服务体系，以低碳环保的木屋产品助力城市可持续发展。</span></span></p><p><br /></p>', 25, 0, 110),
(38, '以木屋，创造生活的想象', '', 0, '', 1501742635, 1501742604, '/muwu_admin/Public/ueditor/php/upload/60941501747434.jpg', '<p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;">想象比真实更有力量！很多生活的乏味，只源于失去了想象的勇气。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp; 那些看起来很自由的生活，那些看起来很困难的事情，只要去做了就会发现，其实并没那么难；只要肯尝试就会发现，其实并没那么遥不可及。</span></p><p style="text-align:center"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/61941501747420.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;float:none;width:500px;height:289px;" width="500" height="289" border="0" hspace="10" vspace="10" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp;</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;">“家越远，心越近。”旅行的路上，你不是旅人，而是归客！远方的家，就是每个人记忆深处的家。——这就是“远方的家”存在的意义。</span><br /></p><p style="text-align:center"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/53931501747423.png" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;float:none;width:500px;height:342px;" width="500" height="342" border="0" hspace="10" vspace="10" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp; </span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp;“远方的家”休闲农庄位于中国第一个国家森林公园——张家界，距张家界市区仅二十分钟车程，是一个典型的土家院落。从青山绿水到翘檐飞角，从木楼小院到土墙栏杆，从青石板路到乡村美食……</span><br /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/42351501747424.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:500px;height:333px;" width="500" height="333" border="0" hspace="10" vspace="10" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><br /></p><p style="text-align:center"><br /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp; </span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp;院子里到处是勾起记忆的旧事物，比如石磨、土灶等，土墙上挂满了各种农具，让人恍惚回到了曾经的土家村落。这里的建筑完全采用木质结构，墙面上木纹流转，与自然融为一体，阳台、小院、树荫、蝉叫、蝶飞......一切那么自然，皆见主人的用心。</span><br /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/33311501747428.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:337px;" width="600" height="337" border="0" hspace="10" vspace="10" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; </span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; 湘西的山水气韵透现出一种匪夷所思的险峻，一种震撼人心的野性张狂。正是这种大自然的天籁神气，陶冶出湘西人“纵死犹闻侠骨香”的侠胆义肠。爽朗的湘西妹子，质朴的土家大叔，以及侠骨仁心的农庄主人</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><br /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/1271501747430.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:500px;height:667px;" width="500" height="667" border="0" hspace="0" vspace="0" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp; </span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp;“远方的家”既是旅人的家，也是瞿姓族人的家，这里做饭的大叔、端茶的小妹多为瞿姓族人，山庄的主人自然也姓瞿，就连这山庄也是在瞿家裕旧址上建立的。在这里，你能看到三两个操着湘西方言，在树荫下话家常的土家族大姐，也能在日暮时分，听到响彻山涧的土家歌谣。恍惚间，心似回到了那个最淳静的时光里。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/26061501747432.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:500px;height:281px;" width="500" height="281" border="0" hspace="0" vspace="0" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp; </span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;">“为了更好的生活条件，多数村民要到外面打工。现在有了这个农庄，村民在“家”工作就可以了，会种地的管理农作物，会做饭的就去厨房，会手工制品的就去教游客，大学毕业的娃娃也可以回来管理农庄。我是瞿家裕的人，自然有责任守护好它的幸福”，山庄主人用实际行动创造着他对生活的想象。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><br /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/881501747433.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:375px;height:500px;" width="375" height="500" border="0" hspace="0" vspace="0" /></span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; &nbsp;</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"> &nbsp; &nbsp; 日暮倾斜，树荫下一条土狗半咪双眼打着盹，藤椅上的旅人慵懒地翻着书页，厨房里淳朴的大叔正码着一片片腊肉，草地上孩童追着五色的蝴蝶奔跑，廊下土家族母女闲聊着生活的趣闻，山涧里回荡着一声声笑语。这里，实现了每个人对于生活的想象。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><span style="font-size:18px;"><img src="/muwu_admin/Public/ueditor/php/upload/60941501747434.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:400px;" width="600" height="400" border="0" hspace="0" vspace="0" /></span></p><p><br /></p>', 25, 0, 110),
(39, '慢生活丨木屋带来的减压方式', '', 0, '随着社会飞速发展，我们正在进入一个“焦虑时代”，无论是生活还是工作，都处于快节奏', 1501742677, 1501742655, '/muwu_admin/Public/ueditor/php/upload/25841501742668.jpg', '<p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:14px;">随着社会飞速发展，我们正在进入一个“焦虑时代”，无论是生活还是工作，都处于快节奏，高紧绷的状态，就连孩子，周末的时间都被补习挤得满满的。越来越快的生活节奏、越来越大的压力，对人们的身心健康已经造成的影响愈加明显。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><img src="/muwu_admin/Public/ueditor/php/upload/82201501742666.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:442px;" /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:14px;">越来越多的人意识到：只有拥有健康的生活状态才能享受更美好的人生，并开始积极调整生活、工作状态，为休养和思考留下时间。这种慢生活的状态并不是懒惰或者拖延时间，而是一种生活态度，是一种健康的心态，是对人生节奏的掌控。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><img src="/muwu_admin/Public/ueditor/php/upload/48941501742666.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:399px;" /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><img src="/muwu_admin/Public/ueditor/php/upload/65671501742667.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:464px;" /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:14px;">追求慢生活最重要的是要顺应自然。想象一个场景：在经历了长时间的束缚和压力后，驾车远离城市的喧嚣，落脚在树林边的小木屋，煮一杯茶，捧一本书，静坐一下午，思考人生的真谛和方向；然后看夕阳缓缓的拖着光芒隐匿于山后，呼吸着清新的空气，将身体内的负能量全部排空。</span></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><img src="/muwu_admin/Public/ueditor/php/upload/87321501742667.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:450px;" /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><img src="/muwu_admin/Public/ueditor/php/upload/76431501742668.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:400px;" /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;text-align:center;margin-top:0px;margin-bottom:0px;"><img src="/muwu_admin/Public/ueditor/php/upload/25841501742668.jpg" style="margin:0px;padding:0px;border:none;display:inline-block;vertical-align:middle;width:600px;height:398px;" /></p><p style="padding:0px;color:#6e6e6e;font-family:微软雅黑;font-size:12px;background-color:#ffffff;margin-top:0px;margin-bottom:0px;"><span style="font-size:14px;">人生是一场旅途，重要的不是终点，而是路上的风景。体味生活，回归自然，一起来木屋中享受安静闲适的时光吧。</span></p><p><br /></p>', 25, 0, 110);

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
(3, '新闻资讯', '新闻资讯', 0, 110, 1, ''),
(4, '客户案例', '客户案例', 0, 110, 0, ''),
(6, '黄铜带', '', 2, 110, 0, ''),
(7, '紫铜带', '紫铜带阿萨德飞洒', 2, 110, 0, ''),
(8, '青铜', '青铜', 2, 0, 2, '');

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `youzhan_model`
--

INSERT INTO `youzhan_model` (`id`, `name`, `class`, `form`, `status`) VALUES
(1, '文章模型', 'article', 'article', 1),
(2, '图片模型', 'picture', 'picture', 0),
(0, '单页模型', 'page', 'page', 1);

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
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8;

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
(77, '/Content/cate_list', '栏目管理', 1, NULL, 0, 76, 1, 0, 0, 1);

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
(4, '媒介专员', 0, NULL, 1, NULL, NULL, NULL, 1503571248, 1503645172),
(5, '推广专员', 0, NULL, 1, NULL, NULL, NULL, 1504056647, 1504056647),
(6, '推广主管', 0, NULL, 1, NULL, NULL, NULL, 1504057016, 1504057016);

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
(1, '68'),
(5, '81');

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
(68, 'admin', '管理员', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '', 1505145047, '127.0.0.1', 164, NULL, '', '', 1467963560, 1467963560, 1, 0, '/portrait/57be642fb50eb.png'),
(81, 'tg01', '江建平', 'tg01', 'e10adc3949ba59abbe56e057f20f883e', '', 1504063716, NULL, 3, NULL, 'tg01@7477.com', '', 1504056666, 1504056666, 1, 0, '');

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
(110, '深圳市联众贝尔木业有限公司', 'http://www.dongguan.me', '深圳市联众贝尔木业有限公司', '深圳市联众贝尔木业有限公司', '待添加'),
(111, 'asdgsa', 'sadg', 'asdgsa', 'asdgsa', 'asdg');

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `youzhan_article`
--
ALTER TABLE `youzhan_article`
  MODIFY `aid` int(7) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `youzhan_cate`
--
ALTER TABLE `youzhan_cate`
  MODIFY `typeid` mediumint(5) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `youzhan_model`
--
ALTER TABLE `youzhan_model`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `youzhan_node`
--
ALTER TABLE `youzhan_node`
  MODIFY `id` smallint(6) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=78;
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
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
