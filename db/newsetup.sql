-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 06, 2019 at 03:31 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsetup`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(20) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Admin',
  `profileImage` varchar(255) NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `authToken` text NOT NULL,
  `passToken` text NOT NULL,
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullName`, `email`, `password`, `userType`, `profileImage`, `contactNumber`, `status`, `authToken`, `passToken`, `crd`, `upd`) VALUES
(1, 'Admin', 'admin@admin.com', '$2y$10$RTG0LIJMlWZc0/0bGSvD..LO2SAIA9FAE7CwffXp9ztNA1Wlbcmey', 1, '', '(111) 111-1111', 1, '8a3782c4fe7cb355ef5bc64d91704c75b258f2d1', 'e5309a9e62031ca2acfe429e2930c5a2a90dcf1d', '2019-08-01 13:15:47', '2019-09-06 13:08:50');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` bigint(20) NOT NULL,
  `category` varchar(255) NOT NULL,
  `showMenu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Yes,0:No',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 0:Inactive',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category`, `showMenu`, `status`, `crd`, `upd`) VALUES
(1, 'd', 0, 1, '2019-08-29 13:30:26', '2019-08-29 13:30:26'),
(2, 'test', 0, 1, '2019-08-29 13:32:06', '2019-08-29 13:32:06'),
(3, 'xszcfz', 0, 1, '2019-08-29 13:36:33', '2019-08-29 13:36:33'),
(4, 'fsdff', 1, 1, '2019-08-29 13:39:08', '2019-09-03 13:19:50'),
(5, 'testc', 1, 1, '2019-09-03 13:15:11', '2019-09-03 13:15:11'),
(6, 'testcfdsfds', 1, 1, '2019-09-03 13:15:52', '2019-09-03 13:15:52'),
(7, 'fdsfssfs', 1, 1, '2019-09-03 13:18:28', '2019-09-03 13:19:39');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` bigint(20) NOT NULL,
  `storyId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageId` bigint(20) NOT NULL,
  `title` text NOT NULL,
  `pageUrl` varchar(255) NOT NULL,
  `subTitle` text NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `metaTitle` text NOT NULL,
  `metaKeyword` text NOT NULL,
  `metaDescription` text NOT NULL,
  `status` text NOT NULL COMMENT '1:Active',
  `showMenu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Yes ,0:No',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `storyId` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `subcategoryId` bigint(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `tag` text NOT NULL,
  `description` text NOT NULL,
  `featuredImage` text NOT NULL,
  `authorBy` varchar(255) NOT NULL,
  `postedBy` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Admin,2:User,3:Anonymous',
  `postedById` bigint(20) NOT NULL,
  `isFeatured` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1: isFeatured',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 :Active ,0 :inactive',
  `storyDate` datetime NOT NULL,
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stories`
--

INSERT INTO `stories` (`storyId`, `categoryId`, `subcategoryId`, `title`, `tag`, `description`, `featuredImage`, `authorBy`, `postedBy`, `postedById`, `isFeatured`, `status`, `storyDate`, `crd`, `upd`) VALUES
(1, 2, 1, 'Test', '', '<p>fdsfsfgdgd</p>\r\n', '', '1', 1, 0, 0, 1, '1970-01-01 00:00:00', '2019-09-05 13:09:51', '2019-09-05 13:09:51');

-- --------------------------------------------------------

--
-- Table structure for table `subCategory`
--

CREATE TABLE `subCategory` (
  `subCategoryId` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `subCategory` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 0:Inactive',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subCategory`
--

INSERT INTO `subCategory` (`subCategoryId`, `categoryId`, `subCategory`, `status`, `crd`, `upd`) VALUES
(1, 2, 'resrtsdf', 1, '2019-09-04 09:10:48', '2019-09-04 09:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profileImage` text NOT NULL,
  `contactNumber` varchar(255) NOT NULL,
  `userType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Customer :0:Anonymous',
  `createdBy` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Admin,2:User,3:Anonymous',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active ,0:Inactive',
  `authToken` text NOT NULL,
  `passToken` text NOT NULL,
  `deviceType` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0:Web,1:Android,2:IOS',
  `deviceToken` text NOT NULL,
  `verifyEmail` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Verify',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `email`, `password`, `profileImage`, `contactNumber`, `userType`, `createdBy`, `status`, `authToken`, `passToken`, `deviceType`, `deviceToken`, `verifyEmail`, `crd`, `upd`) VALUES
(1, 'Admn', 'a@admin.com', '123456', '', '43536466', 1, 1, 1, '', '', 0, '', 0, '2019-09-05 13:07:15', '2019-09-05 13:07:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `storyId` (`storyId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `stories`
--
ALTER TABLE `stories`
  ADD PRIMARY KEY (`storyId`),
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `subcategoryId` (`subcategoryId`);

--
-- Indexes for table `subCategory`
--
ALTER TABLE `subCategory`
  ADD PRIMARY KEY (`subCategoryId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subCategory`
--
ALTER TABLE `subCategory`
  MODIFY `subCategoryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`storyId`) REFERENCES `stories` (`storyId`) ON DELETE CASCADE;

--
-- Constraints for table `stories`
--
ALTER TABLE `stories`
  ADD CONSTRAINT `stories_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE,
  ADD CONSTRAINT `stories_ibfk_2` FOREIGN KEY (`subcategoryId`) REFERENCES `subCategory` (`subCategoryId`) ON DELETE CASCADE;

--
-- Constraints for table `subCategory`
--
ALTER TABLE `subCategory`
  ADD CONSTRAINT `subCategory_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
