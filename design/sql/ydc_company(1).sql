-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2013 年 12 月 02 日 12:07
-- 服务器版本: 5.6.12
-- PHP 版本: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- 数据库: `ydc_company`
--
CREATE DATABASE IF NOT EXISTS `ydc_company` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `ydc_company`;

-- --------------------------------------------------------

--
-- 表的结构 `ydc_administrator_had`
--

CREATE TABLE IF NOT EXISTS `ydc_administrator_had` (
  `h_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户表主id',
  `h_name` varchar(255) NOT NULL COMMENT '用户名',
  `h_password` varchar(255) NOT NULL COMMENT '密码',
  `add_by` int(11) NOT NULL COMMENT '添加人',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_by` int(11) NOT NULL COMMENT '修改人',
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `power` varchar(255) NOT NULL COMMENT '权限',
  `parent_id` int(11) NOT NULL COMMENT '隶属于',
  PRIMARY KEY (`h_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='管理员表' AUTO_INCREMENT=5 ;

--
-- 转存表中的数据 `ydc_administrator_had`
--

INSERT INTO `ydc_administrator_had` (`h_id`, `h_name`, `h_password`, `add_by`, `add_time`, `edit_by`, `edit_time`, `power`, `parent_id`) VALUES
(1, 'admin', '6d173ba896cd4a1b3a68f52139e2046e', 0, '2012-06-07 10:54:49', 0, '2013-11-26 07:16:38', '0', 0),
(2, 'ydc', '6d173ba896cd4a1b3a68f52139e2046e', 1, '2013-11-26 00:00:00', 1, '2013-11-26 07:13:47', '2', 1),
(3, 'brandor', '6d173ba896cd4a1b3a68f52139e2046e', 1, '2013-11-26 00:00:00', 1, '2013-11-26 07:13:49', '3', 1),
(4, 'brandorart', '6d173ba896cd4a1b3a68f52139e2046e', 1, '2013-11-26 00:00:00', 1, '2013-11-26 07:13:50', '4', 1);

-- --------------------------------------------------------

--
-- 表的结构 `ydc_article`
--

CREATE TABLE IF NOT EXISTS `ydc_article` (
  `art_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `type` varchar(255) NOT NULL COMMENT '类型',
  `cat_id` int(11) NOT NULL,
  `order_by` int(11) NOT NULL COMMENT '排序',
  `add_by` int(11) NOT NULL COMMENT '添加人',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_by` int(11) NOT NULL COMMENT '修改人',
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`art_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- 转存表中的数据 `ydc_article`
--

INSERT INTO `ydc_article` (`art_id`, `type`, `cat_id`, `order_by`, `add_by`, `add_time`, `edit_by`, `edit_time`) VALUES
(19, 'A', 0, 0, 1, '2013-09-04 18:58:07', 1, '2013-10-23 18:00:01'),
(18, 'A', 0, 50, 1, '2013-09-04 15:18:19', 1, '2013-09-03 23:18:19');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_article_i8n`
--

CREATE TABLE IF NOT EXISTS `ydc_article_i8n` (
  `art_i8n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '文章多语言id',
  `art_id` int(11) NOT NULL COMMENT '文章主id',
  `art_name` varchar(255) NOT NULL COMMENT '文章名称',
  `art_overview` text NOT NULL COMMENT '简略描述',
  `art_detail` text NOT NULL COMMENT '详细内容',
  `i8n` varchar(255) NOT NULL COMMENT '多语言参数',
  PRIMARY KEY (`art_i8n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='文章多于言表' AUTO_INCREMENT=41 ;

--
-- 转存表中的数据 `ydc_article_i8n`
--

INSERT INTO `ydc_article_i8n` (`art_i8n_id`, `art_id`, `art_name`, `art_overview`, `art_detail`, `i8n`) VALUES
(40, 19, 'contact', '', '+ 86 21 6075 1051\r\n123123":;"+ 86 21 6075 1035":;"info@iaidesign.com":;"<p>Suite 207, Building 11, 600 N. Shanxi Road, Shanghai, PRC 200041</p>', 'zh_tw'),
(37, 18, 'about', '', '商务礼品定制服务，采用高档礼盒包装，于细节处彰显品质与用心，尽显品味与尊贵，满足您的馈赠需求。\n在产品包装让融入品牌LOGO与相关信息，实现品牌有效宣传。如有其它设计要求，在可实现的范围内，我们将以最佳方案解决定制需要。\n可供团体采购，根据采购数量，享受不同折扣。同时，公司将在不同的节气与佳节推出相应礼品供节庆采购，更多详情欢迎来电咨询或面谈。\n":;"立足香港、深圳、广州、上海等各大艺术商品销售店，实现华南地区，华东区销售一体化。\n除了实体店铺可供选购外，公司还拥有官方网购平台及淘宝直营店实现在线购买，方便、快捷、安全。\n\n":;"凡认同公司文化，诚信经营，具备一定的从业经验及经营能力，履行合同条款，严格遵守公司商业机密者，经公司审核，即可签订经销商合作协议，成为经销商。更多详情欢迎来电咨询或面谈。":;"<p>深圳市博朗狮文化传播有限公司<br />\n深圳市罗湖区罗沙路兰亭国际大厦二栋9D<br />\nRoom9D,2th Tower Langting International Building, Luo sha Rood,<br />\nLuohu District,Shenzhen,China 518004<br />\nT 0755 2220 4866&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <br />\nE brandor@qq.com<br />\nF 0755 2220 4866-808<br />\nwww.brandor.net<br />\n&nbsp;</p>', 'zh_tw');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_category`
--

CREATE TABLE IF NOT EXISTS `ydc_category` (
  `cat_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类主id',
  `parent_id` int(11) NOT NULL COMMENT '父id',
  `type` varchar(255) NOT NULL COMMENT '类别',
  `sub_type` varchar(255) NOT NULL,
  `mod` varchar(255) NOT NULL,
  `is_show` int(11) NOT NULL COMMENT '是否显示',
  `order_by` int(11) NOT NULL COMMENT '排序',
  `add_by` int(11) NOT NULL COMMENT '添加人',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_by` int(11) NOT NULL COMMENT '修改人',
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='re分类表' AUTO_INCREMENT=27 ;

--
-- 转存表中的数据 `ydc_category`
--

INSERT INTO `ydc_category` (`cat_id`, `parent_id`, `type`, `sub_type`, `mod`, `is_show`, `order_by`, `add_by`, `add_time`, `edit_by`, `edit_time`) VALUES
(2, 0, '', '', '', 1, 2, 1, '2013-10-22 16:54:23', 1, '2013-11-26 00:55:07'),
(1, 0, '', '', '', 1, 1, 1, '2013-10-22 16:54:05', 1, '2013-12-01 05:50:10'),
(3, 0, '', '', '', 1, 3, 1, '2013-10-22 16:54:23', 1, '2013-12-01 05:51:55'),
(4, 0, '', '', '', 1, 4, 1, '2013-10-22 16:54:23', 1, '2013-12-01 05:52:00'),
(5, 0, '', '', '', 1, 5, 1, '2013-10-22 16:54:23', 1, '2013-12-01 05:52:09'),
(6, 0, '', '', '', 1, 6, 1, '2013-10-22 16:54:23', 1, '2013-12-01 05:52:13'),
(7, 0, '', '', '', 1, 7, 1, '2013-10-22 16:54:23', 1, '2013-12-01 05:52:17'),
(8, 0, '', '', '', 1, 8, 1, '2013-10-22 16:54:23', 1, '2013-12-01 05:52:20'),
(9, 0, '', '', '', 1, 9, 1, '2013-10-22 16:54:23', 1, '2013-12-02 05:56:20');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_category_i8n`
--

CREATE TABLE IF NOT EXISTS `ydc_category_i8n` (
  `cat_i8n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '分类多语言id',
  `cat_id` int(11) NOT NULL COMMENT '分类主id',
  `cat_name` varchar(255) NOT NULL COMMENT '分类名',
  `cat_overview` text NOT NULL COMMENT '分类简略描述',
  `cat_detail` text NOT NULL,
  `i8n` varchar(255) NOT NULL COMMENT '多语言变量',
  PRIMARY KEY (`cat_i8n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- 转存表中的数据 `ydc_category_i8n`
--

INSERT INTO `ydc_category_i8n` (`cat_i8n_id`, `cat_id`, `cat_name`, `cat_overview`, `cat_detail`, `i8n`) VALUES
(67, 1, 'Project', '', '', 'zh_tw'),
(71, 4, 'Thoughts', '', '', 'zh_tw'),
(70, 5, 'Thoughts', '', '', 'zh_tw'),
(72, 6, 'Thoughts', '', '', 'zh_tw'),
(73, 7, 'Thoughts', '', '', 'zh_tw'),
(74, 8, 'Thoughts', '', '', 'zh_tw'),
(75, 2, 'Thoughts', '', '', 'zh_tw'),
(76, 3, 'Thoughts', '', '', 'zh_tw'),
(77, 9, 'Thoughts', '', '', 'zh_tw');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_config`
--

CREATE TABLE IF NOT EXISTS `ydc_config` (
  `con_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'config_id',
  `con_name` varchar(255) NOT NULL COMMENT '参数名称',
  `con_value` varchar(255) NOT NULL COMMENT '参数内容',
  `type` varchar(255) NOT NULL COMMENT '参数类型',
  `order_by` int(11) NOT NULL COMMENT '排序',
  PRIMARY KEY (`con_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='系统参数表用于单独的设置视情况使用多语言功能' AUTO_INCREMENT=9 ;

--
-- 转存表中的数据 `ydc_config`
--

INSERT INTO `ydc_config` (`con_id`, `con_name`, `con_value`, `type`, `order_by`) VALUES
(1, 'company_name', 'Fillmore', '1', 1),
(2, 'company_email', 'shu@bewaterdesign.com', '1', 2),
(3, 'shipping_fee', 'Free', '1', 50),
(4, 'out_put_email', 'sleo1109@gmail.com', '1', 50),
(5, 'out_put_password', 'songhaiting', '1', 50),
(6, 'url_rewrite', 'true', '1', 0),
(7, 'home_background', 'img', '1', 50),
(8, 'home_flash', 'img', '1', 50);

-- --------------------------------------------------------

--
-- 表的结构 `ydc_goods`
--

CREATE TABLE IF NOT EXISTS `ydc_goods` (
  `goods_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goods_sn` varchar(255) NOT NULL COMMENT '货号',
  `cat_id` int(11) NOT NULL COMMENT '分类id',
  `brand_id` int(11) NOT NULL COMMENT '品牌id',
  `length` varchar(255) NOT NULL COMMENT '长',
  `width` varchar(255) NOT NULL COMMENT '宽',
  `height` varchar(255) NOT NULL COMMENT '高',
  `inventory` int(11) NOT NULL,
  `type` varchar(255) NOT NULL COMMENT '类型',
  `is_show` int(11) NOT NULL COMMENT '是否显示',
  `order_by` int(11) NOT NULL COMMENT '排序',
  `click_count` int(11) NOT NULL COMMENT '点击数',
  `add_by` int(11) NOT NULL COMMENT '添加人',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_by` int(11) NOT NULL COMMENT '最后更新人',
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '最后更新时间',
  PRIMARY KEY (`goods_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品主表' AUTO_INCREMENT=34 ;

--
-- 转存表中的数据 `ydc_goods`
--

INSERT INTO `ydc_goods` (`goods_id`, `goods_sn`, `cat_id`, `brand_id`, `length`, `width`, `height`, `inventory`, `type`, `is_show`, `order_by`, `click_count`, `add_by`, `add_time`, `edit_by`, `edit_time`) VALUES
(15, '', 24, 0, 'red1', '', '0', 0, '', 1, 1, 0, 1, '2013-09-11 15:05:44', 1, '2013-11-18 20:01:57'),
(16, '', 24, 0, 'red1', '', '0', 0, '', 1, 1, 0, 1, '2013-09-11 15:18:20', 1, '2013-11-18 19:05:04'),
(17, '', 24, 0, 'red1', '', '0', 0, '', 1, 3, 0, 1, '2013-10-21 14:08:20', 1, '2013-11-16 00:23:39'),
(18, '', 24, 0, 'red1', '', '0', 0, '', 1, 2, 0, 1, '2013-10-21 14:08:39', 1, '2013-11-16 00:23:37'),
(19, '', 24, 0, 'red1', '', '0', 0, '', 1, 5, 0, 1, '2013-10-21 14:09:07', 1, '2013-10-22 00:55:26'),
(20, '', 24, 0, 'red1', '', '0', 0, '', 1, 7, 0, 1, '2013-10-21 14:09:22', 1, '2013-10-22 00:55:26'),
(21, '', 24, 0, 'red1', '', '0', 0, '', 1, 6, 0, 1, '2013-10-21 14:10:16', 1, '2013-10-22 00:55:26'),
(22, '', 24, 0, 'red1', '', '0', 0, '', 1, 8, 0, 1, '2013-10-21 14:12:23', 1, '2013-11-18 20:01:58'),
(23, '', 24, 0, 'red1', '', '0', 0, '', 1, 4, 0, 1, '2013-10-21 14:13:29', 1, '2013-10-29 02:55:38'),
(24, '', 24, 0, 'red1', '', '0', 0, '', 1, 10, 0, 1, '2013-10-21 14:14:15', 1, '2013-10-22 00:55:26'),
(25, '', 25, 0, 'red1', '', '0', 0, '', 1, 50, 0, 1, '2013-10-22 18:11:52', 1, '2013-11-17 21:40:40'),
(26, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-22 18:21:20', 1, '2013-10-22 02:21:20'),
(27, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-31 15:35:19', 1, '2013-10-30 23:35:19'),
(28, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-31 15:35:55', 1, '2013-10-30 23:35:55'),
(29, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-31 15:36:42', 1, '2013-10-30 23:36:42'),
(30, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-31 15:37:13', 1, '2013-10-30 23:37:13'),
(31, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-31 15:37:45', 1, '2013-10-30 23:37:45'),
(32, '', 25, 0, 'red1', '', '0', 0, '', 1, 0, 0, 1, '2013-10-31 15:38:56', 1, '2013-10-30 23:38:56'),
(33, '', 24, 0, '', '', '', 0, '', 0, 50, 0, 1, '2013-11-19 11:11:08', 1, '2013-11-18 19:11:08');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_goods_i8n`
--

CREATE TABLE IF NOT EXISTS `ydc_goods_i8n` (
  `goods_i8n_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品多语言表id',
  `goods_id` int(11) NOT NULL COMMENT '商品主表id',
  `goods_name` varchar(255) NOT NULL COMMENT '商品名称',
  `goods_overview` text NOT NULL COMMENT '商品简略描述',
  `goods_detail` text NOT NULL COMMENT '详细描述',
  `series` varchar(255) NOT NULL COMMENT '系列SERIES',
  `structure` text NOT NULL COMMENT '产品结构PRODUCT STRUCTURE',
  `i8n` varchar(255) NOT NULL COMMENT '语言参数',
  PRIMARY KEY (`goods_i8n_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='商品多语言表' AUTO_INCREMENT=93 ;

--
-- 转存表中的数据 `ydc_goods_i8n`
--

INSERT INTO `ydc_goods_i8n` (`goods_i8n_id`, `goods_id`, `goods_name`, `goods_overview`, `goods_detail`, `series`, `structure`, `i8n`) VALUES
(37, 15, 'Record #09', '123', '<p>Join us for a tour of the latest club in Shenyang. </p>', '', '', 'en_us'),
(38, 15, 'Record #09', '', '<p>Join us for a tour of the latest club in Shenyang. </p>', '', '', 'zh_cn'),
(39, 15, 'Record #09', '', '<p>Join us for a tour of the latest club in Shenyang.&nbsp;</p>', '', '', 'zh_tw'),
(40, 16, '1', 'title', '<p>Astor House Hotel, Shanghai <br />\r\nTake a peep into one of the most significant antiques of Shanghai.</p>', '', '', 'en_us'),
(41, 16, '01', '123', '<p>Astor House Hotel, Shanghai <br />\r\nTake a peep into one of the most significant antiques of Shanghai.</p>', '', '', 'zh_cn'),
(42, 16, 'Record #02', '', '<p>Astor House Hotel, Shanghai <br />\r\nTake a peep into one of the most significant antiques of Shanghai.</p>', '', '', 'zh_tw'),
(43, 17, 'Record #03', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'en_us'),
(44, 17, 'Record #03', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_cn'),
(45, 17, 'Record #03', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_tw'),
(46, 18, 'Record #02', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'en_us'),
(47, 18, 'Record #02', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_cn'),
(48, 18, 'Record #02', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_tw'),
(49, 19, 'Record #05', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'en_us'),
(50, 19, 'Record #05', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_cn'),
(51, 19, 'Record #05', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_tw'),
(52, 20, 'Record #07', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'en_us'),
(53, 20, 'Record #07', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_cn'),
(54, 20, 'Record #07', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_tw'),
(55, 21, 'Record #06', '', '<p>InNiu is ready for a new venture into China.&nbsp;</p>', '', '', 'en_us'),
(56, 21, 'Record #06', '', '<p>InNiu is ready for a new venture into China.&nbsp;</p>', '', '', 'zh_cn'),
(57, 21, 'Record #06', '', '<p>InNiu is ready for a new venture into China.&nbsp;</p>', '', '', 'zh_tw'),
(58, 22, 'Record #08', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'en_us'),
(59, 22, 'Record #08', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_cn'),
(60, 22, 'Record #08', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_tw'),
(61, 23, 'Record #04', '', '<p>Join us for a tour of the latest club in Shenyang.&nbsp;</p>', '', '', 'en_us'),
(62, 23, 'Record #04', '', '<p>Join us for a tour of the latest club in Shenyang.&nbsp;</p>', '', '', 'zh_cn'),
(63, 23, 'Record #04', '', '<p>Join us for a tour of the latest club in Shenyang.&nbsp;</p>', '', '', 'zh_tw'),
(64, 24, 'Record #10', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'en_us'),
(65, 24, 'Record #10', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_cn'),
(66, 24, 'Record #10', '', '<p>History and Pride, Revisited&nbsp; <br />\r\nTake a peep into one of the most important antiques of Shanghai.&nbsp;</p>', '', '', 'zh_tw'),
(67, 25, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'en_us'),
(68, 25, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'zh_cn'),
(69, 25, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'zh_tw'),
(70, 26, 'Best Boutique Hotel in Dali ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'en_us'),
(71, 26, 'Best Boutique Hotel in Dali ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'zh_cn'),
(72, 26, 'Best Boutique Hotel in Dali ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'zh_tw'),
(73, 27, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'en_us'),
(74, 27, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'zh_cn'),
(75, 27, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'zh_tw'),
(76, 28, 'Phase 3 of Qinghai Monastry ', '', '<p>After two years of hard work by the volunteer team, phase 3 of the Qinghai Monastry is ... </p>', '', '', 'en_us'),
(77, 28, 'Phase 3 of Qinghai Monastry ', '', '<p>After two years of hard work by the volunteer team, phase 3 of the Qinghai Monastry is ... </p>', '', '', 'zh_cn'),
(78, 28, 'Phase 3 of Qinghai Monastry ', '', '<p>After two years of hard work by the volunteer team, phase 3 of the Qinghai Monastry is ... </p>', '', '', 'zh_tw'),
(79, 29, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'en_us'),
(80, 29, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'zh_cn'),
(81, 29, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies...</p>', '', '', 'zh_tw'),
(82, 30, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies... </p>', '', '', 'en_us'),
(83, 30, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies... </p>', '', '', 'zh_cn'),
(84, 30, 'Sakura of Kyoto  ', '', '<p>Cherry Blossom is one of the most beautiful flowers in Japan. It signifies... </p>', '', '', 'zh_tw'),
(85, 31, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'en_us'),
(86, 31, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'zh_cn'),
(87, 31, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'zh_tw'),
(88, 32, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'en_us'),
(89, 32, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'zh_cn'),
(90, 32, 'Business Owners’ Worst Headache   ', '', '<p>Train or not train? When faced with the lack of capable human resources... </p>', '', '', 'zh_tw'),
(91, 33, '11', 'test', 'testinfo ', '', '', 'en_us'),
(92, 33, '', '', '', '', '', 'zh_cn');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_img`
--

CREATE TABLE IF NOT EXISTS `ydc_img` (
  `img_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '图片id',
  `type_id` int(11) NOT NULL COMMENT '类别id',
  `type` varchar(255) NOT NULL COMMENT '类别',
  `point` varchar(255) NOT NULL DEFAULT '0',
  `img_title` varchar(255) NOT NULL COMMENT '图片标题',
  `is_show` int(11) DEFAULT '1',
  `original_src` varchar(255) NOT NULL COMMENT '原图',
  `original_link` varchar(255) NOT NULL COMMENT '原图链接',
  `big_src` varchar(255) NOT NULL COMMENT '原图路径',
  `big_link` varchar(255) NOT NULL COMMENT '原图链接',
  `middle_src` varchar(255) NOT NULL COMMENT '中图路径',
  `middle_link` varchar(255) NOT NULL COMMENT '中图链接',
  `small_src` varchar(255) NOT NULL COMMENT '小图路径',
  `small_link` varchar(255) NOT NULL COMMENT '小图链接',
  `order_by` int(11) NOT NULL COMMENT '排序',
  `add_by` int(11) NOT NULL COMMENT '添加人',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_by` int(11) NOT NULL COMMENT '修改人',
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  `i8n` varchar(255) NOT NULL COMMENT '语言参数',
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=182 ;

--
-- 转存表中的数据 `ydc_img`
--

INSERT INTO `ydc_img` (`img_id`, `type_id`, `type`, `point`, `img_title`, `is_show`, `original_src`, `original_link`, `big_src`, `big_link`, `middle_src`, `middle_link`, `small_src`, `small_link`, `order_by`, `add_by`, `add_time`, `edit_by`, `edit_time`, `i8n`) VALUES
(138, 30, 'P', '0', '', 1, '/data/product_doc/201310318200.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-31 15:37:13', 1, '2013-12-02 06:17:25', 'zh_tw'),
(139, 31, 'P', '0', '', 1, '/data/product_doc/201310313884.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-31 15:37:45', 1, '2013-12-02 06:17:25', 'zh_tw'),
(116, 15, 'P', '1', 'The Prestigious Hideaway   ', 1, '/data/product_doc/201310214957.jpg', '', '', '', '', '', '', '', 50, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(115, 16, 'P', '0', 'History and Pride, Revisited ', 1, '/data/product_doc/201311188425.jpg', '', '', '', '', '', '', '', 0, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(146, 7, 'CON', '0', '', 1, '/data/config_doc/201311123893.jpg', '', '', '', '', '', '', '', 0, 1, '2013-11-12 12:17:53', 1, '2013-12-02 06:17:25', 'zh_tw'),
(147, 18, 'A', '0', '', 1, '/data/news_doc/201311128699.jpg', '', '', '', '', '', '', '', 0, 1, '2013-09-04 15:18:19', 1, '2013-12-02 06:17:13', 'zh_tw'),
(80, 18, 'A', '0', '', 1, '/data/news_doc/201311141050.jpg', '', '', '', '', '', '', '', 0, 1, '2013-09-04 15:18:19', 1, '2013-12-02 06:17:25', 'zh_tw'),
(148, 19, 'A', '0', '', 1, '/data/news_doc/201311148553.png', '', '', '', '', '', '', '', 50, 1, '2013-11-13 18:04:53', 1, '2013-12-02 06:17:25', 'zh_tw'),
(122, 1, 'C', '1', '', 1, '/data/category_doc/201312029080.jpg', '', '', '', '', '', '', '', 1, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:32:00', 'zh_tw'),
(152, 1, 'C', '1', '', 1, '/data/category_doc/201312024860.jpg', '', '', '', '', '', '', '', 2, 1, '2013-11-14 17:00:58', 1, '2013-12-02 06:31:06', 'zh_tw'),
(149, 19, 'A', '0', '', 1, '/data/news_doc/201311142939.png', '', '', '', '', '', '', '', 50, 1, '2013-11-13 18:05:39', 1, '2013-12-02 06:17:25', 'zh_tw'),
(150, 19, 'A', '1', '', 1, '/data/news_doc/201311141975.jpg', '', '', '', '', '', '', '', 50, 1, '2013-11-13 18:04:53', 1, '2013-12-02 06:17:25', 'zh_tw'),
(151, 19, 'A', '1', '', 1, '/data/news_doc/201311146837.jpg', '', '', '', '', '', '', '', 50, 1, '2013-11-13 18:05:39', 1, '2013-12-02 06:17:25', 'zh_tw'),
(141, 32, 'P', '0', '', 1, '/data/product_doc/201310314930.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-31 15:38:56', 1, '2013-12-02 06:17:25', 'zh_tw'),
(140, 29, 'P', '0', '', 1, '/data/product_doc/201310311396.jpg', '', '', '', '', '', '', '', 50, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(136, 28, 'P', '0', '', 1, '/data/product_doc/201310318226.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-31 15:35:55', 1, '2013-12-02 06:17:25', 'zh_tw'),
(128, 25, 'P', '1', '', 1, '/data/product_doc/201310223340.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-22 18:11:52', 1, '2013-12-02 06:17:25', 'zh_tw'),
(124, 1, 'C', '1', '', 1, '/data/category_doc/201312021469.jpg', '', '', '', '', '', '', '', 3, 1, '2013-10-22 16:54:23', 1, '2013-12-02 06:31:07', 'zh_tw'),
(125, 1, 'C', '1', '', 1, '/data/category_doc/201312023949.jpg', '', '', '', '', '', '', '', 4, 1, '2013-10-22 16:54:23', 1, '2013-12-02 06:31:08', 'zh_tw'),
(133, 25, 'P', '0', '', 1, '/data/product_doc/201310319159.jpg', '', '', '', '', '', '', '', 50, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(127, 25, 'P', '1', '', 1, '/data/product_doc/201310225555.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-22 18:11:52', 1, '2013-12-02 06:17:25', 'zh_tw'),
(135, 27, 'P', '0', '', 1, '/data/product_doc/201310317492.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-31 15:35:19', 1, '2013-12-02 06:17:25', 'zh_tw'),
(132, 26, 'P', '1', '', 1, '/data/product_doc/201310226963.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-22 18:21:20', 1, '2013-12-02 06:17:25', 'zh_tw'),
(131, 26, 'P', '1', '', 1, '/data/product_doc/201310224171.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-22 18:21:20', 1, '2013-12-02 06:17:25', 'zh_tw'),
(130, 26, 'P', '1', '', 1, '/data/product_doc/201310226313.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-22 18:21:20', 1, '2013-12-02 06:17:25', 'zh_tw'),
(134, 26, 'P', '0', '', 1, '/data/product_doc/201310315350.jpg', '', '', '', '', '', '', '', 50, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(123, 1, 'C', '1', '', 1, '/data/category_doc/201312023557.jpg', '', '', '', '', '', '', '', 5, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:09', 'zh_tw'),
(117, 21, 'P', '0', 'Chic and Sleek   ', 1, '/data/product_doc/201310219105.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-21 14:10:16', 1, '2013-12-02 06:17:25', 'zh_tw'),
(118, 23, 'P', '0', 'The Prestigious Hideaway   ', 1, '/data/product_doc/201310218732.jpg', '', '', '', '', '', '', '', 50, 1, '2013-10-21 14:13:29', 1, '2013-12-02 06:17:25', 'zh_tw'),
(119, 16, 'P', '1', '', 0, '/data/product_doc/201311185620.jpg', '', '', '', '', '', '', '', 111, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(120, 16, 'P', '1', '', 0, '/data/product_doc/201311196549.jpg', '', '', '', '', '', '', '', 111, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(121, 16, 'P', '1', '', 0, '/data/product_doc/201311194201.jpg', '', '', '', '', '', '', '', 50, 1, '0000-00-00 00:00:00', 1, '2013-12-02 06:17:25', 'zh_tw'),
(160, 15, 'P', '0', '', 0, '/data/product_doc/201311191066.png', '', '', '', '', '', '', '', 0, 1, '2013-11-19 11:19:16', 1, '2013-12-02 06:17:25', 'zh_tw'),
(158, 16, 'P', '1', '', 1, '/data/product_doc/201311185456.jpg', '', '', '', '', '', '', '', 50, 1, '2013-11-18 21:23:50', 1, '2013-12-02 06:17:25', 'zh_tw'),
(159, 33, 'P', '1', '', 1, '/data/product_doc/201311191612.jpg', '', '', '', '', '', '', '', 123, 1, '2013-11-19 11:11:08', 1, '2013-12-02 06:17:25', 'zh_tw'),
(161, 1, 'C', '1', '', 1, '/data/category_doc/201312029733.jpg', '', '', '', '', '', '', '', 6, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:10', 'zh_tw'),
(162, 9, 'C', '1', '', 1, '/data/category_doc/201312027772.jpg', '', '', '', '', '', '', '', 1, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:14', 'zh_tw'),
(163, 9, 'C', '1', '', 1, '/data/category_doc/201312023513.jpg', '', '', '', '', '', '', '', 2, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:16', 'zh_tw'),
(164, 9, 'C', '1', '', 1, '/data/category_doc/201312021889.jpg', '', '', '', '', '', '', '', 3, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:17', 'zh_tw'),
(165, 9, 'C', '1', '', 1, '/data/category_doc/201312028805.jpg', '', '', '', '', '', '', '', 4, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:18', 'zh_tw'),
(166, 9, 'C', '1', '', 1, '/data/category_doc/201312023811.jpg', '', '', '', '', '', '', '', 5, 1, '2013-10-22 16:54:05', 1, '2013-12-02 06:31:19', 'zh_tw'),
(167, 9, 'C', '1', '', 1, '/data/category_doc/201312021616.jpg', '', '', '', '', '', '', '', 6, 1, '2013-10-22 16:54:05', 1, '2013-12-02 09:44:51', 'zh_tw'),
(168, 5, 'C', '0', '', 1, '/data/category_doc/201312025228.jpg', '', '', '', '', '', '', '', 1, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(169, 5, 'C', '1', '', 1, '/data/category_doc/201312026165.jpg', '', '', '', '', '', '', '', 1, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(170, 5, 'C', '1', '', 1, '/data/category_doc/201312027733.jpg', '', '', '', '', '', '', '', 2, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(171, 5, 'C', '1', '', 1, '/data/category_doc/201312027824.jpg', '', '', '', '', '', '', '', 3, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(172, 5, 'C', '1', '', 1, '/data/category_doc/201312027266.jpg', '', '', '', '', '', '', '', 4, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(173, 5, 'C', '1', '', 1, '/data/category_doc/201312027636.jpg', '', '', '', '', '', '', '', 5, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(174, 5, 'C', '1', '', 1, '/data/category_doc/201312029558.jpg', '', '', '', '', '', '', '', 6, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:41', 'zh_tw'),
(175, 6, 'C', '0', '', 1, '/data/category_doc/201312021312.jpg', '', '', '', '', '', '', '', 1, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw'),
(176, 6, 'C', '1', '', 1, '/data/category_doc/201312024777.jpg', '', '', '', '', '', '', '', 1, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw'),
(177, 6, 'C', '1', '', 1, '/data/category_doc/201312022474.jpg', '', '', '', '', '', '', '', 2, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw'),
(178, 6, 'C', '1', '', 1, '/data/category_doc/201312021966.jpg', '', '', '', '', '', '', '', 3, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw'),
(179, 6, 'C', '1', '', 1, '/data/category_doc/201312023492.jpg', '', '', '', '', '', '', '', 4, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw'),
(180, 6, 'C', '1', '', 1, '/data/category_doc/201312021310.jpg', '', '', '', '', '', '', '', 5, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw'),
(181, 6, 'C', '1', '', 1, '/data/category_doc/201312024316.jpg', '', '', '', '', '', '', '', 6, 1, '2013-10-22 16:54:05', 1, '2013-12-02 08:46:06', 'zh_tw');

-- --------------------------------------------------------

--
-- 表的结构 `ydc_message`
--

CREATE TABLE IF NOT EXISTS `ydc_message` (
  `mes_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '留言主id',
  `type_id` int(11) NOT NULL COMMENT '关联id',
  `type` varchar(255) NOT NULL COMMENT '类型',
  `mes_title` varchar(255) NOT NULL COMMENT '标题',
  `mes_detail` text NOT NULL COMMENT '详细',
  `user_id` int(11) NOT NULL COMMENT '用户id',
  `add_by` int(11) NOT NULL COMMENT '添加者',
  `add_time` datetime NOT NULL COMMENT '添加时间',
  `edit_by` int(11) NOT NULL COMMENT '修改者',
  `edit_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '修改时间',
  PRIMARY KEY (`mes_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
