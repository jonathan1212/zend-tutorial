-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 30, 2015 at 08:40 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `gdi_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `h_product`
--

CREATE TABLE IF NOT EXISTS `h_product` (
  `jurisdiction_product_id` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `input_product_tab`
--

CREATE TABLE IF NOT EXISTS `input_product_tab` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `control_no` varchar(50) NOT NULL,
  `tab_no` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `market_product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_branch`
--

CREATE TABLE IF NOT EXISTS `m_branch` (
  `branch_id` int(11) NOT NULL AUTO_INCREMENT,
  `branch_name` varchar(30) NOT NULL,
  `branch_abbr` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`branch_id`),
  UNIQUE KEY `branch_name` (`branch_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_game_category`
--

CREATE TABLE IF NOT EXISTS `m_game_category` (
  `game_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_category_name` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`game_category_id`),
  UNIQUE KEY `game_category_name` (`game_category_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_game_group`
--

CREATE TABLE IF NOT EXISTS `m_game_group` (
  `game_group_id` int(11) NOT NULL AUTO_INCREMENT,
  `game_group_name` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`game_group_id`),
  UNIQUE KEY `game_group_name` (`game_group_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_jurisdiction`
--

CREATE TABLE IF NOT EXISTS `m_jurisdiction` (
  `jurisdiction_id` int(11) NOT NULL AUTO_INCREMENT,
  `jurisdiction_name` varchar(30) NOT NULL,
  `jurisdiction_abbr` varchar(4) NOT NULL,
  `is_regulator` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`jurisdiction_id`),
  UNIQUE KEY `jurisdiction_name` (`jurisdiction_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_language`
--

CREATE TABLE IF NOT EXISTS `m_language` (
  `language_id` int(11) NOT NULL AUTO_INCREMENT,
  `name_en` varchar(30) NOT NULL,
  `name_native` varchar(30) NOT NULL,
  `code` varchar(5) NOT NULL,
  `resource` varchar(5) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`language_id`),
  UNIQUE KEY `name_en` (`name_en`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_market`
--

CREATE TABLE IF NOT EXISTS `m_market` (
  `market_id` int(11) NOT NULL AUTO_INCREMENT,
  `market_name` varchar(30) NOT NULL,
  `market_abbr` varchar(30) NOT NULL,
  `criterion_jurisdiction_id` varchar(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`market_id`),
  UNIQUE KEY `market_name` (`market_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_page`
--

CREATE TABLE IF NOT EXISTS `m_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`),
  UNIQUE KEY `page_name` (`page_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_platform`
--

CREATE TABLE IF NOT EXISTS `m_platform` (
  `platform_id` int(11) NOT NULL AUTO_INCREMENT,
  `platform_name` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`platform_id`),
  UNIQUE KEY `platform_name` (`platform_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_role`
--

CREATE TABLE IF NOT EXISTS `m_role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role_name` (`role_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_session`
--

CREATE TABLE IF NOT EXISTS `m_session` (
  `id` varchar(32) NOT NULL DEFAULT '',
  `name` varchar(32) NOT NULL DEFAULT '',
  `modified` int(11) DEFAULT NULL,
  `lifetime` int(11) DEFAULT NULL,
  `data` text NOT NULL,
  PRIMARY KEY (`id`,`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `m_status`
--

CREATE TABLE IF NOT EXISTS `m_status` (
  `status_id` int(11) NOT NULL AUTO_INCREMENT,
  `status_name` varchar(30) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`status_id`),
  UNIQUE KEY `status_name` (`status_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Table structure for table `m_user`
--

CREATE TABLE IF NOT EXISTS `m_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `branch_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `pw_error_count` tinyint(4) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_address` (`email_address`),
  KEY `m_user_fi1` (`branch_id`),
  KEY `m_user_fi2` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `r_market_jurisdiction`
--

CREATE TABLE IF NOT EXISTS `r_market_jurisdiction` (
  `market_id` int(11) NOT NULL,
  `jurisdiction_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `r_market_jurisdiction_fi1` (`market_id`),
  KEY `r_market_jurisdiction_fi2` (`jurisdiction_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `r_role_page`
--

CREATE TABLE IF NOT EXISTS `r_role_page` (
  `role_id` int(11) NOT NULL,
  `page_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `r_role_pagefi1` (`role_id`),
  KEY `r_role_pagefi2` (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `r_user_role`
--

CREATE TABLE IF NOT EXISTS `r_user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`),
  KEY `r_user_role_fi1` (`user_id`),
  KEY `r_user_role_fi2` (`role_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_jurisdiction_product`
--

CREATE TABLE IF NOT EXISTS `t_jurisdiction_product` (
  `jurisdiction_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `market_product_id` int(11) NOT NULL COMMENT 'Parent Market Product ID',
  `jurisdiction_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `e_submission_date` date DEFAULT NULL COMMENT 'Estimated Submission Date',
  `r_submission_date` date DEFAULT NULL COMMENT 'Result Submission Date',
  `e_regulator_date` date DEFAULT NULL COMMENT 'Estimated Regulator Date',
  `r_regulator_date` date DEFAULT NULL COMMENT 'Result Regulator Date',
  `e_approval_date` date DEFAULT NULL,
  `r_approval_date` date DEFAULT NULL,
  `e_release_date` date DEFAULT NULL COMMENT 'Estimated Master Release Date',
  `r_release_date` date DEFAULT NULL COMMENT 'Result Master Release Date',
  `e_launch_date` date DEFAULT NULL,
  `r_launch_date` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`jurisdiction_product_id`),
  KEY `t_jurisdiction_product_fi1` (`market_product_id`),
  KEY `t_jurisdiction_product_fi2` (`jurisdiction_id`),
  KEY `t_jurisdiction_product_fi3` (`status_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=118 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_market_product`
--

CREATE TABLE IF NOT EXISTS `t_market_product` (
  `market_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `gvn` varchar(30) DEFAULT NULL COMMENT 'Game Version No.',
  `title` varchar(100) DEFAULT NULL COMMENT 'Game Title',
  `platform_id` int(11) DEFAULT NULL COMMENT 'Game Platform ID',
  `branch_id` int(11) DEFAULT NULL COMMENT 'Developed Branch ID',
  `market_id` int(11) NOT NULL,
  `game_category_id` int(11) DEFAULT NULL,
  `game_group_id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  `overview` varchar(200) DEFAULT NULL COMMENT 'Game Overview',
  `characteristics` varchar(200) DEFAULT NULL COMMENT 'Game Characteristics',
  `remarks` text,
  `e_dev_start_date` date DEFAULT NULL COMMENT 'Estimated Development Start Date',
  `r_dev_start_date` date DEFAULT NULL COMMENT 'Result Development Start Date',
  `e_dev_finish_date` date DEFAULT NULL COMMENT 'Estimated Development Finish Date',
  `r_dev_finish_date` date DEFAULT NULL COMMENT 'Result Development Finish Date',
  `is_active` tinyint(1) DEFAULT '0',
  `is_deleted` tinyint(1) DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `jurisdiction_product_id` int(11) DEFAULT '0',
  PRIMARY KEY (`market_product_id`),
  KEY `t_market_product_fi1` (`product_id`),
  KEY `t_market_product_fi2` (`platform_id`),
  KEY `t_market_product_fi3` (`branch_id`),
  KEY `t_market_product_fi4` (`market_id`),
  KEY `t_market_product_fi5` (`game_category_id`),
  KEY `t_market_product_fi6` (`game_group_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `t_product`
--

CREATE TABLE IF NOT EXISTS `t_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `control_id` varchar(20) DEFAULT NULL,
  `e_artwork_sp_date` date DEFAULT NULL COMMENT 'Estimated Artwork (Sales Promotion) Upload Date',
  `r_artwork_sp_date` date DEFAULT NULL COMMENT 'Result Artwork (Sales Promotion) Upload Date',
  `e_gslick_date` date DEFAULT NULL COMMENT 'Estimated G-Slick Upload Date',
  `r_gslick_date` date DEFAULT NULL COMMENT 'Result G-Slick Upload Date',
  `e_demo_date` date DEFAULT NULL COMMENT 'Estimated Demo Software Upload Date',
  `r_demo_date` date DEFAULT NULL COMMENT 'Result Demo Software Upload Date',
  `e_movie_date` date DEFAULT NULL COMMENT 'Estimated Movie Upload Date',
  `r_movie_date` date DEFAULT NULL COMMENT 'Result Movie Upload Date',
  `e_artwork_tr_date` date DEFAULT NULL COMMENT 'Estimated Artwork (Training) Upload Date',
  `r_artwork_tr_date` date DEFAULT NULL COMMENT 'Result Artwork (Training) Upload Date',
  `e_website_date` date DEFAULT NULL COMMENT 'Estimated Website Upload Date',
  `r_website_date` date DEFAULT NULL COMMENT 'Result Website Upload Date',
  `is_return_demo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Return Demo Software',
  `game_image_pass` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `control_id` (`control_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=54 ;

-- --------------------------------------------------------

--
-- Table structure for table `w_jurisdiction_product`
--

CREATE TABLE IF NOT EXISTS `w_jurisdiction_product` (
  `jurisdiction_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `market_product_id` int(11) NOT NULL COMMENT 'Parent Market Product ID',
  `jurisdiction_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `e_submission_date` date DEFAULT NULL COMMENT 'Estimated Submission Date',
  `r_submission_date` date DEFAULT NULL COMMENT 'Result Submission Date',
  `e_regulator_date` date DEFAULT NULL COMMENT 'Estimated Regulator Date',
  `r_regulator_date` date DEFAULT NULL COMMENT 'Result Regulator Date',
  `e_approval_date` date DEFAULT NULL,
  `r_approval_date` date DEFAULT NULL,
  `e_release_date` date DEFAULT NULL COMMENT 'Estimated Master Release Date',
  `r_release_date` date DEFAULT NULL COMMENT 'Result Master Release Date',
  `e_launch_date` date DEFAULT NULL,
  `r_launch_date` date DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`jurisdiction_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `w_market_product`
--

CREATE TABLE IF NOT EXISTS `w_market_product` (
  `market_product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `gvn` varchar(30) DEFAULT NULL COMMENT 'Game Version No.',
  `title` varchar(100) DEFAULT NULL COMMENT 'Game Title',
  `platform_id` int(11) DEFAULT NULL COMMENT 'Game Platform ID',
  `branch_id` int(11) DEFAULT NULL COMMENT 'Developed Branch ID',
  `market_id` int(11) NOT NULL,
  `game_category_id` int(11) DEFAULT NULL,
  `game_group_id` int(11) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `target` varchar(100) DEFAULT NULL,
  `overview` varchar(200) DEFAULT NULL COMMENT 'Game Overview',
  `character` varchar(200) DEFAULT NULL COMMENT 'Game Characteristics',
  `remarks` text,
  `e_dev_start_date` date DEFAULT NULL COMMENT 'Estimated Development Start Date',
  `r_dev_start_date` date DEFAULT NULL COMMENT 'Result Development Start Date',
  `e_dev_finish_date` date DEFAULT NULL COMMENT 'Estimated Development Finish Date',
  `r_dev_finish_date` date DEFAULT NULL COMMENT 'Result Development Finish Date',
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`market_product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `w_product`
--

CREATE TABLE IF NOT EXISTS `w_product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `control_id` varchar(20) NOT NULL,
  `e_artwork_sp_date` date DEFAULT NULL COMMENT 'Estimated Artwork (Sales Promotion) Upload Date',
  `r_artwork_sp_date` date DEFAULT NULL COMMENT 'Result Artwork (Sales Promotion) Upload Date',
  `e_gslick_date` date DEFAULT NULL COMMENT 'Estimated G-Slick Upload Date',
  `r_gslick_date` date DEFAULT NULL COMMENT 'Result G-Slick Upload Date',
  `e_demo_date` date DEFAULT NULL COMMENT 'Estimated Demo Software Upload Date',
  `r_demo_date` date DEFAULT NULL COMMENT 'Result Demo Software Upload Date',
  `e_movie_date` date DEFAULT NULL COMMENT 'Estimated Movie Upload Date',
  `r_movie_date` date DEFAULT NULL COMMENT 'Result Movie Upload Date',
  `e_artwork_tr_date` date DEFAULT NULL COMMENT 'Estimated Artwork (Training) Upload Date',
  `r_artwork_tr_date` date DEFAULT NULL COMMENT 'Result Artwork (Training) Upload Date',
  `e_website_date` date DEFAULT NULL COMMENT 'Estimated Website Upload Date',
  `r_website_date` date DEFAULT NULL COMMENT 'Result Website Upload Date',
  `is_return_demo` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Return Demo Software',
  `game_image_pass` varchar(100) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  `create_user_id` int(11) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_user_id` int(11) NOT NULL,
  `update_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`product_id`),
  UNIQUE KEY `control_id` (`control_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
