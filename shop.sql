-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2018 at 05:57 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `productID` int(10) UNSIGNED NOT NULL,
  `moreDescription` varchar(200) DEFAULT NULL,
  `image` text,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` text,
  `quantity` decimal(10,0) DEFAULT NULL,
  `unitprice` decimal(10,0) DEFAULT NULL,
  `image` text NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `quantity`, `unitprice`, `image`, `created`, `modified`) VALUES
(1, 'Macbook', 'The best laptop in the world.', '200', '1000', 'linkbookmarking.com_high_quality_wallpaper_HD_1080_IDS_1099470.jpg', '2018-12-09 00:33:51', '2018-12-09 11:38:37'),
(2, 'Macbook', 'The best laptop in the world.', '200', '1000', 'main_photo_-_crystal_2048x2048.jpg', '2018-12-09 00:33:51', '2018-12-09 12:43:31'),
(3, 'Macbook', 'The best laptop in the world.dsfdsdsf', '200', '1000', 'glowing_lion-wallpaper-1920x1080.jpg', '2018-12-09 00:33:51', '2018-12-09 11:44:15'),
(6, 'dfdsjfjsdjsfjslj', 'dsjjsksjsjfdsjflsjfsdfjl', '222', '2222', 'linkbookmarking.com_high_quality_wallpaper_HD_1080_IDS_1099470.jpg', '2018-12-09 08:32:25', '2018-12-09 11:44:39'),
(7, 'sjsjjfjfdsjlfdsf', 'jfjjfsjffffjfjlsfljslfjslfjlkflsfjlkfjewfjwnc ouwcoi', '23', '33', 'download.jpg', '2018-12-09 08:35:36', '2018-12-09 12:43:16'),
(8, 'Testoo1', 'fsjlfjjljdjldjldsjldsjffs', '3', '500', '0006975_iphonex-34lineup-gb-en-screenjpg.jpeg', '2018-12-09 08:37:54', '2018-12-09 11:51:35'),
(9, 'aaaaaaaaaaaaaaaaaaaaaaa', 'fdsafsaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaafsafdsa', '333333333', '342433', 'glowing_lion-wallpaper-1920x1080.jpg', '2018-12-09 10:11:56', '2018-12-09 11:29:25'),
(10, 'fffff', 'dddddddddddddddddddddddddd', '3', '34', 'linkbookmarking.com_high_quality_wallpaper_HD_1080_IDS_1099470.jpg', '2018-12-09 10:13:18', '2018-12-09 11:45:03'),
(11, 'Testoo1', '33de', NULL, '333', 'linkbookmarking.com_high_quality_wallpaper_HD_1080_IDS_1099470.jpg', '2018-12-09 10:14:50', '2018-12-09 10:14:50'),
(12, 'dsfdsf', 'dsfdsdsfdfdss', '2', '3', 'linkbookmarking.com_high_quality_wallpaper_HD_1080_IDS_1099470.jpg', '2018-12-09 10:31:34', '2018-12-09 11:45:16'),
(13, 'hghjgjhj', 'rtrtgffgffffffffffffffffffffffff', '11', '11', '0006975_iphonex-34lineup-gb-en-screenjpg.jpeg', '2018-12-09 11:49:08', '2018-12-09 11:49:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `productID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
