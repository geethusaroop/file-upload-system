-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 27, 2023 at 07:07 AM
-- Server version: 8.0.31
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_upload_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log`
--

DROP TABLE IF EXISTS `tbl_log`;
CREATE TABLE IF NOT EXISTS `tbl_log` (
  `log_id` int NOT NULL AUTO_INCREMENT,
  `log_user_id_fk` int NOT NULL,
  `log_ip_address` varchar(50) NOT NULL,
  `log_filename` varchar(100) NOT NULL,
  `log_time` timestamp NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_log`
--

INSERT INTO `tbl_log` (`log_id`, `log_user_id_fk`, `log_ip_address`, `log_filename`, `log_time`) VALUES
(1, 4, '::1', 'dummy.pdf', '2023-11-27 04:36:58'),
(2, 4, '::1', 'About2.jpg', '2023-11-27 04:38:30'),
(3, 4, '127.0.0.1', 'demo.docx', '2023-11-27 05:15:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_uploads`
--

DROP TABLE IF EXISTS `tbl_uploads`;
CREATE TABLE IF NOT EXISTS `tbl_uploads` (
  `upload_id` int NOT NULL AUTO_INCREMENT,
  `user_id_fk` int NOT NULL,
  `upload_filename` varchar(100) NOT NULL,
  `upload_status` int NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`upload_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_uploads`
--

INSERT INTO `tbl_uploads` (`upload_id`, `user_id_fk`, `upload_filename`, `upload_status`, `created_at`, `updated_at`) VALUES
(1, 4, 'dummy.pdf', 1, '2023-11-27 10:06:58', '0000-00-00 00:00:00'),
(2, 4, 'About2.jpg', 1, '2023-11-27 10:08:30', '0000-00-00 00:00:00'),
(3, 4, 'demo.docx', 1, '2023-11-27 10:45:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE IF NOT EXISTS `tbl_users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `phone` varchar(80) NOT NULL,
  `email` varchar(80) NOT NULL,
  `user_name` varchar(80) NOT NULL,
  `user_password` varchar(250) NOT NULL,
  `user_type` int NOT NULL COMMENT '1-admin,2-user',
  `user_status` int NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `name`, `phone`, `email`, `user_name`, `user_password`, `user_type`, `user_status`, `created_at`, `updated_at`) VALUES
(4, 'Geethu Krishnan', '9562414825', 'geethu.thachirethu@gmail.com', 'geethu999', '$2y$10$.HQhWC1YkmTrH.CwoJ3IpuATFp2nAJsOij/jzHmyT5PCmDY7fwbFy', 2, 1, '2023-11-27 10:21:04', '0000-00-00 00:00:00'),
(3, 'admin', '', 'admin@gmail.com', 'admin', '$2y$10$QttuHkJI1ckDDquw5TX6POQK1S6SnZ5gqVGoDQQjsxsv4b9YbBhCy', 1, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
