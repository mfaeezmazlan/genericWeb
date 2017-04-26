-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2017 at 08:36 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `genericweb`
--
CREATE DATABASE IF NOT EXISTS `genericweb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `genericweb`;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `menu_txt` varchar(50) NOT NULL,
  `menu_loc` varchar(50) NOT NULL,
  `menu_parent_id` int(11) DEFAULT NULL,
  `module_ind` int(11) DEFAULT NULL,
  `default_menu` int(11) DEFAULT NULL,
  `target_win` varchar(50) DEFAULT NULL,
  `hide_ind` int(11) DEFAULT NULL,
  `icon_name` varchar(50) DEFAULT NULL,
  `sort` int(11) UNSIGNED DEFAULT NULL,
  `isDeleted` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `menu_txt`, `menu_loc`, `menu_parent_id`, `module_ind`, `default_menu`, `target_win`, `hide_ind`, `icon_name`, `sort`, `isDeleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'Configuration', '', NULL, 1, 1, '', 0, 'icon-cog', 9, '0', '2017-03-17 00:09:23', 2, '2017-03-21 23:12:02', 2, NULL, NULL),
(2, 'Manage Menu', 'menu', 1, 0, 0, '', 0, '', NULL, '0', '2017-03-17 00:15:37', 2, '2017-03-17 16:34:41', 2, NULL, NULL),
(3, 'Manage References', 'ref', 1, 0, 0, '', NULL, '', NULL, '0', '2017-03-17 01:12:38', 2, '2017-03-17 16:34:50', 2, NULL, NULL),
(4, 'Manage User', 'user', 1, 0, 0, '', 0, '', NULL, '0', '2017-03-17 10:46:58', 2, '2017-03-17 16:35:00', 2, NULL, NULL),
(5, 'CMS Administrator', '', NULL, 1, 1, '', 0, 'icon-file', 8, '0', '2017-03-17 14:30:00', 2, '2017-03-21 23:21:14', 2, NULL, NULL),
(6, 'Manage Role Mapping', 'role-mapping', 1, 0, 0, '', 0, '', NULL, '0', '2017-03-17 15:50:32', 3, '2017-03-17 16:35:13', 2, NULL, NULL),
(7, 'Recycle Bin', 'recycle-bin', NULL, 1, 1, '', 0, 'icon-trash', 100, '0', '2017-03-22 00:03:59', 2, '2017-03-30 17:28:30', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `recycle_bin`
--

CREATE TABLE `recycle_bin` (
  `id` int(11) NOT NULL,
  `table_name` varchar(100) NOT NULL,
  `trash_count` int(11) NOT NULL,
  `isDeleted` char(1) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_at` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `deleted_at` datetime NOT NULL,
  `deleted_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recycle_bin`
--

INSERT INTO `recycle_bin` (`id`, `table_name`, `trash_count`, `isDeleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(62, 'menu', 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(63, 'ref', 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(64, 'role_mapping', 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(65, 'template', 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(66, 'user', 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(67, 'usr_access', 0, '0', '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ref`
--

CREATE TABLE `ref` (
  `id` int(11) UNSIGNED NOT NULL,
  `cat` varchar(30) NOT NULL,
  `code` varchar(30) NOT NULL,
  `descr` varchar(50) NOT NULL,
  `param1` varchar(50) DEFAULT NULL,
  `param2` varchar(50) DEFAULT NULL,
  `sort` int(11) UNSIGNED DEFAULT NULL,
  `isDeleted` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ref`
--

INSERT INTO `ref` (`id`, `cat`, `code`, `descr`, `param1`, `param2`, `sort`, `isDeleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, 'role', '1', 'Administrator', '', '', NULL, '', '2017-03-17 15:52:02', 3, '2017-03-17 15:52:02', 3, NULL, NULL),
(2, 'role', '2', 'CMS Administrator', '', '', NULL, '', '2017-03-17 15:52:30', 3, '2017-03-17 15:52:30', 3, NULL, NULL),
(3, 'fa-icon', 'icon-pencil', 'Pencil <i class=\"icon-pencil\"></i>', '', '', NULL, '0', NULL, NULL, '2017-03-21 23:18:34', 2, NULL, NULL),
(4, 'fa-icon', 'icon-recycle', 'Recycle <i class=\"icon-recycle\"></i>', '', '', NULL, '0', NULL, NULL, '2017-03-21 23:19:26', 2, NULL, NULL),
(5, 'fa-icon', 'icon-phone', 'Phone <i class=\"icon-phone\"></i>', '', '', NULL, '0', NULL, NULL, '2017-03-21 23:19:51', 2, NULL, NULL),
(6, 'fa-icon', 'icon-refresh', 'Refresh <i class=\"icon-refresh\"></i>', '', '', NULL, '0', NULL, NULL, '2017-03-21 23:20:32', 2, NULL, NULL),
(7, 'fa-icon', 'icon-file', 'File <i class=\"fa fa-remove\"></i>', '', '', NULL, '0', NULL, NULL, '2017-03-21 23:20:59', 2, NULL, NULL),
(8, 'fa-icon', 'fa fa-send', 'Send <i class=\"fa fa-send\"></i>', '', '', NULL, '0', NULL, NULL, '2017-03-17 18:10:22', 2, NULL, NULL),
(9, 'fa-icon', 'icon-cog', 'Cog', '', '', NULL, '', '2017-03-17 19:08:36', 2, '2017-03-21 17:58:02', 2, NULL, NULL),
(10, 'fa-icon', 'icon-trash', 'Icon Trash', '', '', NULL, '', '2017-03-30 17:28:21', 2, '2017-03-30 17:28:21', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_mapping`
--

CREATE TABLE `role_mapping` (
  `id` int(11) UNSIGNED NOT NULL,
  `role_code` varchar(50) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `isDeleted` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role_mapping`
--

INSERT INTO `role_mapping` (`id`, `role_code`, `menu_id`, `isDeleted`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`) VALUES
(1, '1', 1, '0', '2017-03-17 15:59:46', 3, '2017-03-17 15:59:46', 3, NULL, NULL),
(2, '1', 5, '0', '2017-03-17 15:59:55', 3, '2017-03-17 15:59:55', 3, NULL, NULL),
(3, '2', 5, '0', '2017-03-17 16:00:07', 3, '2017-03-17 16:00:07', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `template`
--

CREATE TABLE `template` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `template_content` longtext,
  `status` char(1) NOT NULL,
  `isDeleted` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `password_reset_token` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `auth_key` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `isDeleted` char(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password_hash`, `password`, `password_reset_token`, `email`, `auth_key`, `status`, `created_at`, `created_by`, `updated_at`, `updated_by`, `deleted_at`, `deleted_by`, `isDeleted`) VALUES
(2, 'admin', '$2y$13$cOmbRDsWRi6fETdARPwgAOfGAQMkJ97AV99yb2P1rH9rgaD/V4PvW', 'updated', '', 'epaljr@gmail.com', 'pikj8di0rqIRwgB_O3O5kN1I29SaUrOa', 10, '2017-03-16 15:37:20', 0, '2017-03-17 19:16:05', 2, NULL, NULL, '0'),
(5, 'faeez93', '$2y$13$av82yhSPObnNYdh/YZJ0JOR.AcQyJ2LNt1quqFC3aThVQE0.0YYvK', '', NULL, 'test_2@mail.net', 'jAaTMbx5CPahzHJSXklAf-4lRVJST4vg', 10, '2017-04-05 18:26:55', 0, '2017-04-05 18:26:55', 0, NULL, NULL, '0');

-- --------------------------------------------------------

--
-- Table structure for table `usr_access`
--

CREATE TABLE `usr_access` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_code` varchar(50) NOT NULL,
  `isDeleted` char(1) DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `created_by` int(11) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `updated_by` int(11) UNSIGNED DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `deleted_by` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recycle_bin`
--
ALTER TABLE `recycle_bin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ref`
--
ALTER TABLE `ref`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_mapping`
--
ALTER TABLE `role_mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usr_access`
--
ALTER TABLE `usr_access`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `recycle_bin`
--
ALTER TABLE `recycle_bin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `ref`
--
ALTER TABLE `ref`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `role_mapping`
--
ALTER TABLE `role_mapping`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `template`
--
ALTER TABLE `template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usr_access`
--
ALTER TABLE `usr_access`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
