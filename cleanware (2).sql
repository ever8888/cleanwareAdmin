-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 25, 2022 at 10:53 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cleanware`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adm_id` int(11) NOT NULL,
  `adm_mail` varchar(255) NOT NULL,
  `adm_pw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adm_id`, `adm_mail`, `adm_pw`) VALUES
(7, 'cw2022@cleanware.com.my', '$2y$10$k.HL8U7E6TUB2jzeSQqYb.lMOEFkncoVCqvSArPtKr1eYPdckfUj6');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` int(11) NOT NULL,
  `banner_img` varchar(255) NOT NULL,
  `banner_desc` varchar(255) NOT NULL,
  `banner_link` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `pos` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `banner_img`, `banner_desc`, `banner_link`, `date_added`, `pos`) VALUES
(54, 'bg2.png', 'abbb holiday only h', 'https://shop.safetyware.com.my/?_ga=2.149303670.1736396890.1641192003-1137409983.1641192003', '2022-01-28', 2),
(55, 'HW_Shopify.jpg', 'ab', 'product.php', '2022-01-28', 3),
(56, 'template.png', 'ab', 'about.php', '2022-01-28', 5),
(60, 'templatee.jpg', 'abc', 'index.php', '2022-02-14', 1),
(62, 'template.jpg', 'ab', 'product.php', '2022-02-21', 6),
(63, 'template.png', 'a', 'product.php', '2022-02-21', 7),
(64, '500ml-1a.png', 'a', 'product.php', '2022-02-23', 4);

-- --------------------------------------------------------

--
-- Table structure for table `prdesc`
--

CREATE TABLE `prdesc` (
  `prdesc_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `pr_format` int(11) NOT NULL,
  `pr_ldesc` varchar(12000) NOT NULL,
  `pr_code` varchar(255) NOT NULL,
  `pr_cdesc` varchar(255) NOT NULL,
  `pr_type` varchar(255) NOT NULL,
  `pr_pack` varchar(255) NOT NULL,
  `pr_unit` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prdesc`
--

INSERT INTO `prdesc` (`prdesc_id`, `p_id`, `p_name`, `pr_format`, `pr_ldesc`, `pr_code`, `pr_cdesc`, `pr_type`, `pr_pack`, `pr_unit`, `date_added`) VALUES
(26, 34, 'qqqqq', 1, 'aaaahhhhhhhhhhhhhhhhhhhhhhhh\r\naskksaks\r\nkd;lsakddddddkd;lsakddddddkd;lsakddddddkd;lsakddddddkd;lsakdddddd\r\naskdlaskdl;askd;lsakdddddd\r\nkd;lsakddddddkd;lsakdddddd', '', '', '', '', '', '2022-01-28'),
(27, 28, 'abc wq', 1, 'ssss', '', '', '', '', '', '2022-01-28'),
(28, 31, 'afetyware green house e', 2, '', 'a', 'b', 'd', 'e', 'a', '2022-01-28'),
(29, 31, 'afetyware green house e', 2, '', 'b', 'b', 'b', 'b', 'b', '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `prlist`
--

CREATE TABLE `prlist` (
  `prlist_id` int(11) NOT NULL,
  `pr_img` varchar(255) NOT NULL,
  `pr_sdesc` varchar(255) NOT NULL,
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `pos` int(11) NOT NULL DEFAULT 0,
  `date_added` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prlist`
--

INSERT INTO `prlist` (`prlist_id`, `pr_img`, `pr_sdesc`, `p_id`, `p_name`, `pos`, `date_added`) VALUES
(13, '5L.png', 'abcqq', 28, 'abc wq', 4, '2022-01-24'),
(14, '20L-2b.png', '222qq', 28, 'abc wq', 3, '2022-01-24'),
(16, '500ml-1b.png', 'ff', 29, 'safetyware godly', 1, '2022-01-24'),
(17, '500ML&100ML.jpg', 'ab', 28, 'abc wq', 1, '2022-01-24'),
(18, '500ml-2a.png', 'dd', 28, 'abc wq', 2, '2022-01-24'),
(19, '500ml-2b.png', 'ab', 28, 'abc wq', 0, '2022-01-24'),
(20, '1000ml_back.jpg', 'hh', 28, 'abc wq', 0, '2022-01-24'),
(21, '100ml-2b.png', 'a', 28, 'abc wq', 0, '2022-01-24'),
(24, '500ml-1c.jpg', 'abbbbb', 31, 'afetyware green house e', 2, '2022-01-28'),
(25, '20L-1c.JPG', 'bttt', 31, 'afetyware green house e', 1, '2022-01-28');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `p_id` int(11) NOT NULL,
  `p_img` varchar(255) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `p_sdesc` varchar(255) NOT NULL,
  `p_link` varchar(255) NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `pos` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`p_id`, `p_img`, `p_name`, `p_sdesc`, `p_link`, `date_added`, `pos`) VALUES
(26, '20L-1b.png', 'cleanware effect twin', 'godlyaa', 'aaaaav', '2022-01-21', 3),
(27, '5L(N).png', '[Promo Set]ab', 'ab', 'ab', '2022-01-21', 7),
(28, '5L(N).png', 'abc wq 222', 'abcabcabcabcabcabcabcabcabcabcabcabcabcabcabcababc', 'https://shop.safetyware.com.my/?_ga=2.149303670.1736396890.1641192003-1137409983.1641192003', '2022-01-21', 2),
(29, '20L-3a.jpg', 'safetyware godly', 'abc', 'https://shop.safetyware.com.my/?_ga=2.149303670.1736396890.1641192003-1137409983.1641192003', '2022-01-21', 4),
(31, '50ml-2a.png', 'afetyware green house e', 'aa hah cutie abosycol araog\r\ntype:bootle:\r\n50ml,100ml, 250 ml \r\nsanitizer good \r\nhaha', 'https://shop.safetyware.com.my/?_ga=2.149303670.1736396890.1641192003-1137409983.1641192003', '2022-01-25', 1),
(32, 'Sanitising Wipes-01.jpg', 'abc', 'abccc', 'oren', '2022-01-28', 8),
(33, '100ml-1a.png', 'cuteranaa', 'aaqq', 'aaqq', '2022-01-28', 5),
(34, '500ml-1d.jpg', 'qqqqq', 'qqqqq', 'qqqqq', '2022-01-28', 6);

-- --------------------------------------------------------

--
-- Table structure for table `set_email`
--

CREATE TABLE `set_email` (
  `set_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `em_selected` int(11) NOT NULL DEFAULT 0,
  `verify` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `set_email`
--

INSERT INTO `set_email` (`set_id`, `email`, `em_selected`, `verify`) VALUES
(46, 'dleo22222@gmail.comj', 1, 1),
(56, 'gcunnkhai@gmail.com', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `testing`
--

CREATE TABLE `testing` (
  `id` int(11) NOT NULL,
  `content` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testing`
--

INSERT INTO `testing` (`id`, `content`) VALUES
(56, '<p>This is my textarea to be replaced with HTML editor.</p><p>aabc</p>');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `web_id` int(11) NOT NULL,
  `count` int(11) DEFAULT 0,
  `month` int(11) NOT NULL,
  `year` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`web_id`, `count`, `month`, `year`) VALUES
(4, 498, 1, 2022),
(6, 2542, 2, 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adm_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `prdesc`
--
ALTER TABLE `prdesc`
  ADD PRIMARY KEY (`prdesc_id`);

--
-- Indexes for table `prlist`
--
ALTER TABLE `prlist`
  ADD PRIMARY KEY (`prlist_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `set_email`
--
ALTER TABLE `set_email`
  ADD PRIMARY KEY (`set_id`);

--
-- Indexes for table `testing`
--
ALTER TABLE `testing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`web_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `prdesc`
--
ALTER TABLE `prdesc`
  MODIFY `prdesc_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `prlist`
--
ALTER TABLE `prlist`
  MODIFY `prlist_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `set_email`
--
ALTER TABLE `set_email`
  MODIFY `set_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `testing`
--
ALTER TABLE `testing`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `web_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
