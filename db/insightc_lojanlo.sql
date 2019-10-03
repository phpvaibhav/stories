-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 03, 2019 at 12:47 PM
-- Server version: 5.7.27
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `insightc_lojanlo`
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
(1, 'Admin', 'admin@admin.com', '$2y$10$RTG0LIJMlWZc0/0bGSvD..LO2SAIA9FAE7CwffXp9ztNA1Wlbcmey', 1, 'jq4Y1OcsdhNF9KIJ.png', '(111) 111-1111', 1, 'cf7d8aa94c8140a5bd27bf3bfb3d27dc52ef15e6', 'e5309a9e62031ca2acfe429e2930c5a2a90dcf1d', '2019-08-01 13:15:47', '2019-09-29 17:32:46');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` bigint(20) NOT NULL,
  `category` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `pageUrl` text CHARACTER SET utf8mb4 NOT NULL,
  `showMenu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Yes,0:No',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 0:Inactive',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `category`, `pageUrl`, `showMenu`, `status`, `crd`, `upd`) VALUES
(9, 'Category 1', 'Category-1-lojanlo', 1, 1, '2019-09-26 10:18:20', '2019-09-26 16:27:22'),
(10, 'Category 2', 'Category-2-lojanlo', 1, 1, '2019-09-26 10:18:37', '2019-09-26 16:27:14');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentId` bigint(20) NOT NULL,
  `storyId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) NOT NULL,
  `comments` text CHARACTER SET utf8mb4 NOT NULL,
  `parentId` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`commentId`, `storyId`, `userId`, `name`, `email`, `comments`, `parentId`, `status`, `crd`, `upd`) VALUES
(1, 11, 0, 'aishwary singh', 'Aishwarysingh2405@gmail.com', 'good story', 0, 1, '2019-09-29 17:41:37', '2019-09-29 17:41:37'),
(2, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'so good', 0, 1, '2019-09-29 17:42:40', '2019-09-29 17:42:40'),
(3, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'nice', 0, 1, '2019-09-29 17:52:12', '2019-09-29 17:52:12'),
(4, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'yes', 3, 1, '2019-09-29 17:52:30', '2019-09-29 17:52:30'),
(5, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'ha ha ha', 0, 1, '2019-09-29 17:57:27', '2019-09-29 17:57:27'),
(6, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'Hii', 4, 1, '2019-09-30 18:22:06', '2019-09-30 18:22:06'),
(7, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'Hii', 6, 1, '2019-09-30 18:22:14', '2019-09-30 18:22:14'),
(8, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'Hii', 7, 1, '2019-09-30 18:22:21', '2019-09-30 18:22:21'),
(9, 11, 0, 'Anonymous', 'anonymous@lojanlo.com', 'Hii', 8, 1, '2019-09-30 18:22:29', '2019-09-30 18:22:29'),
(10, 10, 0, 'Anonymous', 'anonymous@lojanlo.com', 'cz', 0, 1, '2019-09-30 19:16:12', '2019-09-30 19:16:12'),
(11, 10, 0, 'Anonymous', 'anonymous@lojanlo.com', 'zdxvdxg', 10, 1, '2019-09-30 19:16:21', '2019-09-30 19:16:21');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactId` bigint(20) NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `subject` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `message` text CHARACTER SET utf8mb4 NOT NULL,
  `reply` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:yes',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactId`, `fullName`, `email`, `contact`, `subject`, `message`, `reply`, `status`, `crd`, `upd`) VALUES
(3, 'Vaibhav Sharma', 'vaibhav@gmail.com', '88383843828', 'Test', 'Hii successfully completed', 0, 1, '2019-09-26 09:52:30', '2019-09-26 09:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `likeStory`
--

CREATE TABLE `likeStory` (
  `likeId` bigint(20) NOT NULL,
  `storyId` bigint(20) NOT NULL,
  `userId` bigint(20) NOT NULL,
  `isLike` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Like',
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likeStory`
--

INSERT INTO `likeStory` (`likeId`, `storyId`, `userId`, `isLike`, `status`, `crd`, `upd`) VALUES
(2, 11, 10894453918, 1, 1, '2019-09-30 13:33:40', '2019-09-30 13:33:40'),
(3, 12, 17502807574, 1, 1, '2019-09-30 13:43:19', '2019-09-30 13:43:19'),
(4, 10, 17502807574, 1, 1, '2019-09-30 13:43:40', '2019-09-30 13:43:40'),
(5, 9, 17502807574, 1, 1, '2019-09-30 14:03:56', '2019-09-30 14:03:56'),
(6, 11, 17502807574, 1, 1, '2019-09-30 14:15:17', '2019-09-30 14:15:17'),
(7, 11, 60172892260, 1, 1, '2019-09-30 18:20:58', '2019-09-30 19:37:58'),
(8, 11, 68548752249, 1, 1, '2019-09-30 18:21:38', '2019-09-30 18:21:38'),
(9, 12, 27750124488, 1, 1, '2019-09-30 18:24:20', '2019-09-30 18:24:20'),
(10, 0, 27750124488, 1, 1, '2019-09-30 18:24:27', '2019-09-30 18:24:27'),
(11, 12, 68548752249, 1, 1, '2019-09-30 18:29:24', '2019-09-30 18:29:24'),
(12, 10, 27750124488, 1, 1, '2019-09-30 18:31:36', '2019-09-30 19:11:43'),
(13, 10, 16856695884, 0, 1, '2019-09-30 19:15:19', '2019-09-30 19:34:08'),
(14, 0, 16856695884, 1, 1, '2019-09-30 19:23:26', '2019-09-30 19:35:41'),
(15, 11, 16856695884, 0, 1, '2019-09-30 19:34:38', '2019-09-30 19:35:28'),
(16, 11, 98235176570, 1, 1, '2019-09-30 19:39:17', '2019-09-30 19:39:56'),
(17, 11, 11661229192, 1, 1, '2019-10-01 15:39:47', '2019-10-01 15:40:08'),
(18, 12, 52379810730, 1, 1, '2019-10-01 17:27:43', '2019-10-01 17:28:05'),
(19, 11, 38622841814, 1, 1, '2019-10-01 19:28:24', '2019-10-01 19:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `pageId` bigint(20) NOT NULL,
  `title` text CHARACTER SET utf8mb4 NOT NULL,
  `pageUrl` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `subTitle` text CHARACTER SET utf8mb4 NOT NULL,
  `icon` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `metaTitle` text CHARACTER SET utf8mb4 NOT NULL,
  `metaKeyword` text CHARACTER SET utf8mb4 NOT NULL,
  `metaDescription` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `showMenu` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1:Yes ,0:No',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`pageId`, `title`, `pageUrl`, `subTitle`, `icon`, `description`, `metaTitle`, `metaKeyword`, `metaDescription`, `status`, `showMenu`, `crd`, `upd`) VALUES
(1, 'About us', 'aboutus', 'Knowledge is Power’', 'fa fa-info', '<h2><strong>Knowledge is Power&rsquo;</strong></h2>\r\n\r\n<p><strong>&lsquo;Knowledge is the key to success&rsquo;</strong></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Knowledge is the fuel that drives human life, gaining knowledge is deemed the most primary activity that prepares man for a long and successful life.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Man has the power to judge situations, decide between what is good and what is bad and make decisions voluntarily.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Without knowledge, one cannot be successful in life. To grow in one&rsquo;s career, gaining as much knowledge as possible is important. Knowledge does not pertain to science and technology and the fields we study in books.</span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Lojanlo believe it is important that we make the best use of the gift of knowledge and share to as many as possible so that we achieve great feats and heights in every domain of our life.&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Lojanlo is a sharing blog, we share stories, news and articles.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Lojanlo is here to share the knowledge in the form of facts,stories, articles, blogs,biography and many more.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">It is good to have knowledge but having incomplete information is more dangerous than not having any knowledge. We hereby come with an idea to share the true facts and information that can be shared with as many people and by anyone who wants to share. We are here to provide media to people where they can share information and interested users can read the articles, blogs and facts.</span></p>\r\n\r\n<div>&nbsp;</div>\r\n', 'Lojanlo about us : Knowledge is the key to success', 'Lojanlo about us : Knowledge is the key to success, facts,stories, articles, blogs and many more,Knowledge ,kahani, biography,jeevanee', 'Lojanlo believe it is important that we make the best use of the gift of knowledge and share to as many as possible so that we achieve great feats and heights in every domain of our life. \r\nLojanlo is a sharing blog, we share stories, news and articles.\r\nLojanlo is here to share the knowledge in the form of facts,stories, articles, blogs,biography and many more.\r\n', 1, 1, '2019-09-26 15:47:51', '2019-09-28 17:55:10'),
(2, 'Contact us', 'contactus', 'Want to get in touch? We\'d love to hear from you. Here\'s how you can reach us…', 'fa fa-envelope', '<h2><strong>Want to get in touch? </strong></h2>\r\n\r\n<h2><span style=\"font-size:14px\"><strong>We&#39;d love to hear from you. Here&#39;s how you can reach us&hellip;</strong></span></h2>\r\n\r\n<p style=\"text-align:justify\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Want to find out how to share information or your blog on Lojanlo. Need to share any suggestions? </span><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:12pt\">Whether you have a question our team is ready to answer all your questions. Please feel free to reach us.</span></p>\r\n', 'Lojanlo : Want to get in touch? We\'d love to hear from you. Here\'s how you can reach us…', 'Lojanlo contactus : Knowledge is the key to success,contactus , facts,stories, articles, blogs and many more,Knowledge ,kahani, biography,jeevanee', 'Want to find out how to share information or your blog on Lojanlo. Need to share any suggestions? Whether you have a question our team is ready to answer all your questions. Please feel free to reach us.', 1, 1, '2019-09-26 15:49:53', '2019-09-28 17:53:37'),
(3, 'Term & Conditions', 'termConditions', 'T&C', 'fa fa-cogs', '<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">These Terms of Service govern your access to and use of our services that link to these Terms, and any information, text, links, graphics, photos, audio, videos, or other materials or arrangements of materials uploaded, downloaded or appearing on the website. By using the services you agree to be bound by these Terms.</span></p>\r\n\r\n<p style=\"margin-right:48pt\"> </p>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"margin-right:48pt\"><strong>Who May Use the Services</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"margin-right:48pt\"><span style=\"color:rgb(0, 0, 0); font-size:12pt\"> </span><strong>Privacy</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"margin-right:48pt\"><span style=\"color:rgb(0, 0, 0); font-size:12pt\"> </span><strong>Content on the Services</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"margin-right:48pt\"><span style=\"color:rgb(0, 0, 0); font-size:12pt\"> </span><strong>Using the Services</strong></p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\" style=\"margin-right:48pt\"><span style=\"color:rgb(0, 0, 0); font-size:12pt\"> </span><strong>General</strong></p>\r\n	</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\"><strong>1. Who May Use the Services</strong></h3>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You may use the Services only if you agree to form a binding contract with Lojanlo and are not a person barred from receiving services under the laws of the applicable jurisdiction. If you are accepting these Terms and using the Services on behalf of a company, organization, government, or other legal entity, you represent and warrant that you are authorized to do so and have the authority to bind such entity to these Terms, in which case the words “you” and “your” as used in these Terms shall refer to such entity.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\"> </span></p>\r\n\r\n<h3 dir=\"ltr\"><strong>2. Privacy</strong></h3>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">Our Privacy Policy describes how we handle the information you provide to us when you use our services. You understand that through your use of the services you consent to the collection and use of this information, including the transfer of this information, for storage, processing and use by Lojanlo and its affiliates.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\"> </span></p>\r\n\r\n<h3 dir=\"ltr\"><strong>3. Content on the Services</strong></h3>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You are responsible for your use of the services and for any content you provide, including compliance with applicable laws, rules, and regulations. You should only provide content that you are comfortable sharing with others.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">Any use or reliance on any content or materials posted via the services or obtained by you through the Services is at your own risk. We do not endorse, support, represent or guarantee the completeness, truthfulness, accuracy, or reliability of any content or communications posted via the services or endorse any opinions expressed via the services. All content is the sole responsibility of the person who originated such content. We may not monitor or control the content posted via the services and, we cannot take responsibility for such content.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">We reserve the right to remove content that violates the User Agreement, including for example, copyright or trademark violations, impersonation, unlawful conduct, or harassment.</span></p>\r\n\r\n<p dir=\"ltr\"> </p>\r\n\r\n<h1 dir=\"ltr\"><strong>Your Rights and Grant of Rights in the Content</strong></h1>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You retain your rights to any content you submit, post or display on or through the services. What’s yours is yours — you own your content.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">By submitting, posting or displaying content on or through the Services, you grant us a worldwide, non-exclusive, royalty-free license (with the right to sublicense) to use, copy, reproduce, process, adapt, modify, publish, transmit, display and distribute such content in any and all media or distribution methods. This license authorizes us to make your content available to the rest of the world and to let others do the same. You agree that this license includes the right for Lojanlo to provide, promote, and improve the services and to make content submitted to or through the services available to other companies, organizations or individuals for the syndication, broadcast, distribution, promotion or publication of such content on other media and services, subject to our terms and conditions for such content use. </span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">Lojanlo has an evolving set of rules for how partners can interact with your content on the services. These rules exist to enable an open ecosystem with your rights in mind. You understand that we may modify or adapt your content as it is distributed, syndicated, published, or broadcast by us and our partners and/or make changes to your content in order to adapt the content to different media.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You represent and warrant that you have, or have obtained, all rights, licenses, consents, permissions, power and/or authority necessary to grant the rights granted herein for any content that you submit, post or display on or through the services. You agree that such content will not contain material subject to copyright or other proprietary rights, unless you have the necessary permission or are otherwise legally entitled to post the material and to grant Lojanlo the license described above.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\"> </span></p>\r\n\r\n<h3 dir=\"ltr\"><strong>4. Using the Services</strong></h3>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">Please review the Lojanlo Rules and Policies, which are part of the User Agreement and outline what is prohibited on the services. You may use the Services only in compliance with these Terms and all applicable laws, rules and regulations.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">Our Services evolve constantly. As such, the Services may change from time to time, at our discretion. We may stop (permanently or temporarily) providing the Services or any features within the Services to you or to users generally. We also retain the right to create limits on use and storage at our sole discretion at any time. We may also remove or refuse to distribute any content on the Services, suspend or terminate users, and reclaim usernames without liability to you.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">In consideration for Lojanlo granting you access to and use of the Services, you agree that Lojanlo and its third-party providers and partners may place advertising on the Services or in connection with the display of content or information from the Services whether submitted by you or others. You also agree not to misuse our Services, for example, by interfering with them or accessing them using a method other than the interface and the instructions that we provide. You may not do any of the following while accessing or using the Services: (i) access, tamper with, or use non-public areas of the Services, Lojanlo’s computer systems, or the technical delivery systems of Lojanlo’s providers; (ii) probe, scan, or test the vulnerability of any system or network or breach or circumvent any security or authentication measures; (iii) access or search or attempt to access or search the Services by any means (automated or otherwise) other than through our currently available, published interfaces that are provided by Lojanlo, unless you have been specifically allowed to do so in a separate agreement with Lojanlo; (iv) forge any TCP/IP packet header or any part of the header information in any email or posting, or in any way use the Services to send altered, deceptive or false source-identifying information; or (v) interfere with, or disrupt, (or attempt to do so), the access of any user, host or network, including, without limitation, sending a virus, overloading, flooding, spamming, mail-bombing the Services, or by scripting the creation of content in such a manner as to interfere with or create an undue burden on the Services. We also reserve the right to access, read, preserve, and disclose any information as we reasonably believe is necessary to (i) satisfy any applicable law, regulation, legal process or governmental request, (ii) enforce the Terms, including investigation of potential violations hereof, (iii) detect, prevent, or otherwise address fraud, security or technical issues, (iv) respond to user support requests, or (v) protect the rights, property or safety of Lojanlo, its users and the public. Lojanlo does not disclose personally-identifying information to third parties except in accordance with our Privacy Policy.</span></p>\r\n\r\n<h1 dir=\"ltr\"><strong>Your Account</strong></h1>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You may need to create an account to use some of our services. You are responsible for safeguarding your account, so use a strong password and limit its use to this account. We cannot and will not be liable for any loss or damage arising from your failure to comply with the above.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You can control most communications from the services. We may need to provide you with certain communications, such as service announcements and administrative messages. These communications are considered part of the services and your account, and you may not be able to opt-out from receiving them. If you added your phone number to your account and you later change or deactivate that phone number, you must update your account information to help prevent us from communicating with anyone who acquires your old number.</span></p>\r\n\r\n<p dir=\"ltr\"> </p>\r\n\r\n<h1 dir=\"ltr\"><strong>Your License to Use the Services</strong></h1>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">Lojanlo gives you a personal, worldwide, royalty-free, non-assignable and non-exclusive license to use the software provided to you as part of the Services. This license has the sole purpose of enabling you to use and enjoy the benefit of the Services as provided by Lojanlo, in the manner permitted by these Terms.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">The Services are protected by copyright, trademark, and other laws of both the United States and foreign countries. Nothing in the Terms gives you a right to use the Lojanlo name or any of the Lojanlo trademarks, logos, domain names, and other distinctive brand features. All right, title, and interest in and to the services (excluding content provided by users) are and will remain the exclusive property of Lojanlo and its licensors. Any feedback, comments, or suggestions you may provide regarding Lojanlo, or the services is entirely voluntary and we will be free to use such feedback, comments or suggestions as we see fit and without any obligation to you.</span></p>\r\n\r\n<h4 dir=\"ltr\"> </h4>\r\n\r\n<h4 dir=\"ltr\"><strong>Ending These Terms</strong></h4>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">You may end your legal agreement with Lojanlo at any time by deactivating your accounts and discontinuing your use of the Services. </span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">We may suspend or terminate your account or cease providing you with all or part of the services at any time for any or no reason, including, but not limited to, if we reasonably believe: (i) you have violated these Terms or the Lojanlo Rules and Policies, (ii) you create risk or possible legal exposure for us; (iii) your account should be removed due to unlawful conduct, (iv) your account should be removed due to prolonged inactivity; or (v) our provision of the services to you is no longer commercially viable. We will make reasonable efforts to notify you by the email address associated with your account or the next time you attempt to access your account, depending on the circumstances. In all such cases, the Terms shall terminate, including, without limitation, your license to use the Services, except that the following sections shall continue to apply: II, III, V, and VI. If you believe your account was terminated in error you can file an appeal through Contact us.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(0, 0, 0); font-family:arial; font-size:12pt\"> </span></p>\r\n\r\n<p dir=\"ltr\"> </p>\r\n\r\n<h3 dir=\"ltr\"><strong>5. General</strong></h3>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">We may revise these Terms from time to time. The changes will not be retroactive, and the most current version of the Terms will govern our relationship with you. Other than for changes addressing new functions or made for legal reasons, we will notify you 30 days in advance of making effective changes to these Terms that impact the rights or obligations of any party to these Terms, for example via a service notification or an email to the email associated with your account. By continuing to access or use the Services after those revisions become effective, you agree to be bound by the revised Terms.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">In the event that any provision of these Terms is held to be invalid or unenforceable, then that provision will be limited or eliminated to the minimum extent necessary, and the remaining provisions of these Terms will remain in full force and effect. Lojanlo’s failure to enforce any right or provision of these Terms will not be deemed a waiver of such right or provision.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"color:rgb(20, 23, 26); font-family:arial; font-size:12pt\">If you have any questions about these Terms, please contact us.</span></p>\r\n\r\n<div> </div>\r\n', 'Term & Conditions', 'Lojanlo : Term & Conditions', 'These Terms of Service govern your access to and use of our services that link to these Terms, and any information, text, links, graphics, photos, audio, videos, or other materials or arrangements of materials uploaded, downloaded or appearing on the website. By using the services you agree to be bound by these Terms.\r\n\r\n1. Who May Use the Services\r\n 2. Privacy\r\n 3. Content on the Services\r\n 4. Using the Services\r\n 5. General', 1, 1, '2019-09-26 15:51:23', '2019-09-29 18:06:28'),
(4, 'Privacy Policy', 'privacyPolicy', 'P&P', 'fa fa-lock', '<p dir=\"ltr\"><strong>Lojanlo Privacy Policy</strong></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">We believe you should always know what data we collect from you and how we use it, and that you should have meaningful control over both. We want to empower you to make the best decisions about the information that you share with us. That&rsquo;s the purpose of this Privacy Policy.&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">You should read this policy in full, but here are a few key things we hope you take away from it:&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">● Lojanlo is public and articles or blogs posted by your name are viewable and accessible by anyone around the world.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">● When you use Lojanlo, even if you&rsquo;re just looking at blogs, we receive some personal information from you like the type of device you&rsquo;re using and your IP address. You can choose to share additional information with us like your email address, phone number, address book contacts, and a public profile. We use this information for things like keeping your account secure and showing you more relevant articles and blogs.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">● We give you control through your settings to limit the data we collect from you and how we use it, and to control things like account security</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">● In addition to the information you share with us, we use your blogs, content you&rsquo;ve read, and other information to determine what topics you&rsquo;re interested in, your age, the languages you speak, and other signals to show you more relevant content. We give you transparency into that information, and you can modify or correct it at any time.</span></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">● If you have questions about this policy, how we collect or process your personal data, or anything else related to our privacy practices, we want to hear from you. You can contact us at any time.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Information You Share With Us</strong></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">We require certain information to provide our services to you. For example, you must have an account in order to upload or share content on Lojanlo. When you choose to share the information below with us, we collect and use it to operate our services.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Basic Account Information:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> You don&rsquo;t have to create an account to use some of our service features, such as reading and viewing public articles, stories and facts. If you do choose to create an account, you must provide us with some personal data so that we can provide our services to you. On Lojanlo this includes a display name, a username, a password, and an email address or phone number. Your display name and username are always public, but you can use either your real name or a pseudonym.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Public Information:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> Most activity on Lojanlo is public, including your profile information, your time zone and language, when you created your account, and your blogs and certain information about your posts like the date, time, and application and version of Lojanlo. You are responsible for your blogs and other information you provide through our services, and you should think carefully about what you make public, especially if it is sensitive information. In addition to providing your public information to the world directly on Lojanlo, we also use technology like application programming interfaces (APIs) and embeds to make that information available to websites, apps, and others for their use - for example, displaying blogs on website. We have standard terms that govern how this data can be used, and a compliance program to enforce these terms. But these individuals and companies are not affiliated with Lojanlo, and their offerings may not reflect updates you make on Lojanlo. For more information about how we make public data on Lojanlo available to the world, you may reach out to us through Contact us.&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Contact Information and Address Books:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> We use your contact information, such as your email address or phone number, to authenticate your account and keep it - and our services - secure, and to help prevent spam, fraud, and abuse. We also use the contact information to personalize our services, enable certain account features (for example, for login verification), and to send you information about our services. If you provide us with your phone number, you agree to receive text messages from Lojanlo to that number as your country&rsquo;s laws allow. If you email us, we will keep the content of your message, your email address, and your contact information to respond to your request.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Information We Share and Disclose</strong></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">As noted above, Lojanlo is designed to broadly and instantly disseminate information you share publicly through our services. In the limited circumstances where we disclose your private personal data, we do so subject to your control, because it&rsquo;s necessary to operate our services, or because it&rsquo;s required by law.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Sharing You Control:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> We share or disclose your personal data with your consent or at your direction, such as when you authorize a third-party web client or application to access your account or when you direct us to share your feedback with a business.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Service Providers:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> We engage service providers to perform functions and provide services to us all over the world. For example, we use a variety of third-party services to help operate our services, such as hosting our various blogs and to help us understand the use of our services. We may share your private personal data with such service providers subject to obligations consistent with this Privacy Policy and any other appropriate confidentiality and security measures, and on the condition that the third parties use your private personal data only on our behalf and pursuant to our instructions.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Law, Harm, and the Public Interest:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> Notwithstanding anything to the contrary in this Privacy Policy or controls we may otherwise offer to you, we may preserve, use, or disclose your personal data if we believe that it is reasonably necessary to comply with a law, regulation, legal process, or governmental request; to protect the safety of any person; to protect the safety or integrity of our platform, including to help prevent spam, abuse, or malicious actors on our services, or to explain why we have removed content or accounts from our services; to address fraud, security, or technical issues; or to protect our rights or property or the rights or property of those who use our services. However, nothing in this Privacy Policy is intended to limit any legal defenses or objections that you may have to a third party&rsquo;s, including a government&rsquo;s, request to disclose your personal data.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Affiliates and Change of Ownership:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> In the event that we are involved in a merger, acquisition, reorganization, or sale of assets, your personal data may be sold or transferred as part of that transaction. This Privacy Policy will apply to your personal data as transferred to the new entity. We may also disclose personal data about you to our corporate affiliates in order to help operate our services and our affiliates&rsquo; services, including the delivery of ads.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Managing Your Personal Information with Us</strong></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">You control the personal data you share with us. You can access or rectify this data at any time. You can also deactivate your account. We also provide you tools to object, restrict, or withdraw consent where applicable for the use of data you have provided to Lojanlo. And we make the data you shared through our services portable and provide easy ways for you to contact us.&nbsp;</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Accessing or Rectifying Your Personal Data:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> If you have registered an account on Lojanlo, we provide you with tools and account settings to access, correct, delete, or modify the personal data you provided to us and associated with your account.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Object, Restrict, or Withdraw Consent:</strong><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\"> When you are logged into your Lojanlo account, you can manage your privacy settings and other account features here at any time.</span></p>\r\n\r\n<p dir=\"ltr\"><strong>Our Global Operations and Privacy Shield</strong></p>\r\n\r\n<p dir=\"ltr\"><span style=\"background-color:transparent; color:rgb(0, 0, 0); font-family:arial; font-size:11pt\">To bring you our services, we operate globally. Where the laws of your country allow you to do so, you authorize us to transfer, store, and use your data in any country where we operate. In some of the countries to which we transfer personal data, the privacy and data protection laws and rules regarding when government authorities may access data may vary from those of your country.</span></p>\r\n\r\n<div>&nbsp;</div>\r\n', 'Lojanlo  : Privacy Policy', 'Lojanlo  : Knowledge is the key to success, facts,stories, articles, blogs and many more,Knowledge ,kahani, biography,jeevanee', 'We believe you should always know what data we collect from you and how we use it, and that you should have meaningful control over both. We want to empower you to make the best decisions about the information that you share with us. That’s the purpose of this Privacy Policy.....', 1, 1, '2019-09-26 15:52:59', '2019-09-29 18:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `site_log`
--

CREATE TABLE `site_log` (
  `site_log_id` bigint(20) UNSIGNED NOT NULL,
  `no_of_visits` tinyint(3) UNSIGNED NOT NULL DEFAULT '1',
  `ip_address` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `requested_url` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `referer_page` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `page_name` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `query_string` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `user_agent` tinytext CHARACTER SET utf8mb4 NOT NULL,
  `is_unique` tinyint(1) NOT NULL DEFAULT '0',
  `visits_count` bigint(20) NOT NULL,
  `access_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_log`
--

INSERT INTO `site_log` (`site_log_id`, `no_of_visits`, `ip_address`, `requested_url`, `referer_page`, `page_name`, `query_string`, `user_agent`, `is_unique`, `visits_count`, `access_date`) VALUES
(1, 1, '122.170.199.35', '/lojanlo-story/कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', 'https://lojanlo.com/', 'home/singleCategory', '', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', 0, 0, '2019-10-03 07:12:40'),
(2, 1, '122.170.199.35', '/home/getComment', 'https://lojanlo.com/lojanlo-story/कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', 'home/getComment', '', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', 0, 0, '2019-10-03 07:12:41'),
(3, 1, '122.170.199.35', '/home/item/sideItem', 'https://lojanlo.com/lojanlo-story/कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', 'item/sideItem', 'Item', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', 0, 0, '2019-10-03 07:12:41'),
(4, 1, '122.170.199.35', '/home/item/similarStory', 'https://lojanlo.com/lojanlo-story/कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', 'item/similarStory', 'tory', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', 0, 0, '2019-10-03 07:12:41'),
(5, 1, '122.170.199.35', '/favicon.ico', 'https://lojanlo.com/lojanlo-story/कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '/index', '.ico', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', 0, 0, '2019-10-03 07:12:42');

-- --------------------------------------------------------

--
-- Table structure for table `stories`
--

CREATE TABLE `stories` (
  `storyId` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `subcategoryId` bigint(20) NOT NULL,
  `storyUrl` text CHARACTER SET utf8mb4 NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `tag` text CHARACTER SET utf8mb4 NOT NULL,
  `description` text CHARACTER SET utf8mb4 NOT NULL,
  `featuredImage` text NOT NULL,
  `authorBy` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
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

INSERT INTO `stories` (`storyId`, `categoryId`, `subcategoryId`, `storyUrl`, `title`, `tag`, `description`, `featuredImage`, `authorBy`, `postedBy`, `postedById`, `isFeatured`, `status`, `storyDate`, `crd`, `upd`) VALUES
(9, 9, 3, 'What-is-Lorem-Ipsum--1569514305-lojanlo', 'What is Lorem Ipsum?', '', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure?&quot;</p>\r\n\r\n<h3>Section 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus. Temporibus autem quibusdam et aut officiis debitis aut rerum necessitatibus saepe eveniet ut et voluptates repudiandae sint et molestiae non recusandae. Itaque earum rerum hic tenetur a sapiente delectus, ut aut reiciendis voluptatibus maiores alias consequatur aut perferendis doloribus asperiores repellat.&quot;</p>\r\n\r\n<h3>1914 translation by H. Rackham</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail in their duty through weakness of will, which is the same as saying through shrinking from toil and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our power of choice is untrammelled and when nothing prevents our being able to do what we like best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and owing to the claims of duty or the obligations of business it will frequently occur that pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in these matters to this principle of selection: he rejects pleasures to secure other greater pleasures, or else he endures pains to avoid worse pains.&quot;</p>\r\n', 'lojanlo-15695143055d8ce34193aef.png', 'Lorem ', 1, 2, 1, 1, '1970-01-01 00:00:00', '2019-09-26 16:11:46', '2019-09-26 16:11:46'),
(10, 10, 5, 'Where-can-I-get-some--1569514591-lojanlo', 'Where can I get some?', '', '<h2>Where can I get some?</h2>\r\n\r\n<p style=\"text-align:justify\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<form action=\"https://www.lipsum.com/feed/html\" method=\"post\">\r\n<table style=\"border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px; width:436px\">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\" style=\"text-align:center; vertical-align:middle\"><input name=\"amount\" size=\"3\" style=\"border-style:solid; border-width:1px; margin:3px 6px; width:30px\" type=\"text\" value=\"5\" /></td>\r\n			<td rowspan=\"2\" style=\"text-align:center; vertical-align:middle\">\r\n			<table style=\"border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px; text-align:left\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input checked=\"checked\" name=\"what\" type=\"radio\" value=\"paras\" /></td>\r\n						<td style=\"vertical-align:middle\">paragraphs</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input name=\"what\" type=\"radio\" value=\"words\" /></td>\r\n						<td style=\"vertical-align:middle\">words</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input name=\"what\" type=\"radio\" value=\"bytes\" /></td>\r\n						<td style=\"vertical-align:middle\">bytes</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input name=\"what\" type=\"radio\" value=\"lists\" /></td>\r\n						<td style=\"vertical-align:middle\">lists</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td style=\"text-align:center; vertical-align:middle; width:20px\"><input checked=\"checked\" name=\"start\" type=\"checkbox\" value=\"yes\" /></td>\r\n			<td style=\"vertical-align:middle\">Start with &#39;Lorem<br />\r\n			ipsum dolor sit amet...&#39;</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</form>\r\n', 'lojanlo-15695145915d8ce45fea698.png', ' simply dummy', 1, 1, 1, 1, '1970-01-01 00:00:00', '2019-09-26 16:16:32', '2019-09-26 16:16:32'),
(11, 9, 4, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', 'कहानी : कैसे आया जूता', '', '<p>एक बार की बात है एक राजा था। उसका एक बड़ा-सा राज्य था। एक दिन उसे देश घूमने का विचार आया और उसने देश भ्रमण की योजना बनाई और घूमने निकल पड़ा। जब वह यात्रा से लौट कर अपने महल आया। उसने अपने मंत्रियों से पैरों में दर्द होने की शिकायत की। राजा का कहना था कि मार्ग में जो कंकड़ पत्थर थे वे मेरे पैरों में चुभ गए और इसके लिए कुछ इंतजाम करना चाहिए।</p>\r\n\r\n<p>कुछ देर विचार करने के बाद उसने अपने सैनिकों व मंत्रियों को आदेश दिया कि देश की संपूर्ण सड़कें चमड़े से ढंक दी जाएं। राजा का ऐसा आदेश सुनकर सब सकते में आ गए। लेकिन किसी ने भी मना करने की हिम्मत नहीं दिखाई। यह तो निश्चित ही था कि इस काम के लिए बहुत सारे रुपए की जरूरत थी। लेकिन फिर भी किसी ने कुछ नहीं कहा। कुछ देर बाद राजा के एक बुद्घिमान मंत्री ने एक युक्ति निकाली। उसने राजा के पास जाकर डरते हुए कहा कि मैं आपको एक सुझाव देना चाहता हूँ।<br />\r\nअगर आप इतने रुपयों को अनावश्यक रूप से बर्बाद न करना चाहें तो एक अच्छी तरकीब मेरे पास है। जिससे आपका काम भी हो जाएगा और अनावश्यक रुपयों की बर्बादी भी बच जाएगी। राजा आश्चर्यचकित था क्योंकि पहली बार किसी ने उसकी आज्ञा न मानने की बात कही थी। उसने कहा बताओ क्या सुझाव है। मंत्री ने कहा कि पूरे देश की सड़कों को चमड़े से ढंकने के बजाय आप चमड़े के एक टुकड़े का उपयोग कर अपने पैरों को ही क्यों नहीं ढंक लेते। राजा ने अचरज की दृष्टि से मंत्री को देखा और उसके सुझाव को मानते हुए अपने लिए जूता बनवाने का आदेश दे दिया।<br />\r\nयह कहानी हमें एक महत्वपूर्ण पाठ सिखाती है कि हमेशा ऐसे हल के बारे में सोचना चाहिए जो ज्यादा उपयोगी हो। जल्दबाजी में अप्रायोगिक हल सोचना बुद्धिमानी नहीं है। दूसरों के साथ बातचीत से भी अच्छे हल निकाले जा सकते हैं।</p>\r\n', 'lojanlo-15695229725d8d051c45351.png', 'amanomus', 1, 1, 1, 1, '1970-01-01 00:00:00', '2019-09-26 18:36:13', '2019-09-29 17:33:22'),
(12, 10, 5, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', 'चांदनी जैसे निर्मल लेखक', '', '<p>प्रेमचंद आम आदमी तक अपने विचार पहुंचाकर उनकी सेवा करना चाहते थे। इसी मंशा से उन्होंने 1934 में अजंता सिनेटोन नामक फिल्म कंपनी से समझौता करके फिल्म- संसार में प्रवेश किया। वे बम्बई पहुंचे और &#39;शेर दिल औरत&#39; और &#39;मिल मजदूर&#39; नामक दो कहानियां लिखीं। &#39;सेवा सदन&#39; को भी पर्दे पर दिखाया गया। लेकिन प्रेमचंद मूलतः निष्कपट व्यक्ति थे।<br />\r\n<br />\r\nफिल्म निर्माताओं का मुख्य उद्देश्य जनता का पैसा लूटना था। उनका यह ध्येय नहीं था कि वे जनजीवन में परिवर्तन करें। इस वजह से प्रेमचंद को सिनेजगत से अरुचि हो गई और वे 8 हजार रुपए वार्षिक आय को तिलांजलि देकर बम्बई से काशी आ गए। फिल्म संसार से क्या मिला? इस सवाल के जवाब में प्रेमचंद लिखते हैं कि अंतिम समय उनके पास 1400 रुपए थे।<br />\r\n<strong><u>साहित्य का आदर्श</u></strong><br />\r\nसाहित्य की बात करते हुए प्रेमचंद लिखते हैं- &#39;जो धन और संपत्ति चाहते हैं, साहित्य में उनके लिए स्थान नहीं है। केवल वे, जो यह विश्वास करते हैं कि सेवामय जीवन ही श्रेष्ठ जीवन है, जो साहित्य के भक्त हैं और जिन्होंने अपने हृदय को समाज की पीड़ा और प्रेम की शक्ति से भर लिया है, उन्हीं के लिए साहित्य में स्थान है। वे ही समाज के ध्वज को लेकर आगे बढ़ने वाले सैनिक हैं।&#39;<br />\r\n<strong><u>साहित्य व देश सबसे ऊपर</u></strong><br />\r\nपंडित बनारसीदास चतुर्वेदी को लिखे पत्र में प्रेमचंद ने कहा था- &#39;हमारी और कोई इच्छा नहीं है। इस समय यही अभिलाषा है कि स्वराज की लड़ाई में हमें जीतना चाहिए। मैं प्रसिद्धि या सौभाग्य की लालसा के पीछे नहीं हूं। मैं किसी भी प्रकार से जिंदगी गुजार सकता हूं।<br />\r\n<br />\r\nमुझे कार और बंगले की कामना नहीं है लेकिन मैं तीन-चार अच्छी पुस्तकें लिखना चाहता हूं, जिनमें स्वराज प्राप्ति की इच्छा का प्रतिपादन हो सके। मैं आलसी नहीं बन सकता। मैं साहित्य और अपने देश के लिए कुछ करने की आशा रखता हूं।&#39;<br />\r\n<strong><u>चांदनी जैसा निर्मल व्यक्तित्व</u></strong><br />\r\nप्रेमचंद ने अपने जीवन में देशभक्ति, प्रामाणिकता और समाज सुधार का प्रचार न केवल अपनी लेखनी से किया, बल्कि वे जीवन में स्वयं उस पर चलते भी रहे। देश की जनता के लिए उन्होंने ताउम्र लिखा और जनता के लिए ही जिये। प्रेमचंद का व्यक्तित्व चांदनी के समान निर्मल था। यह निर्मलता उनके शैशव से ही झलकती थी।<br />\r\n<strong><u>हिन्दू-मुस्लिम सांस्कृतिक एकता</u></strong><br />\r\nवाराणसी के निकट लमही नामक ग्राम में उनका जन्म हुआ। यहां का श्रीवास्तव परिवार लेखकों के लिए प्रसिद्ध था। इस परिवार के लोगों ने प्रायः मुगल-कचहरियों में बाबू का काम किया था। प्रेमचंद के पिता भी डाकघर में मुंशी यानी बाबू थे। स्वभावतः मुगल-सभ्यता की छाप इनके परिवार पर पड़ी थी। श्रीवास्तव परिवार इस्लामी सभ्यता की बहुत सी बातों से प्रभावित हुआ था- जैसे पहनावे का ढंग। यह परिवार हिन्दू-मुस्लिम सांस्कृतिक समन्वय का उत्कृष्ठ उदाहरण था।<br />\r\n<strong><u>दरिद्रता में बीता बचपन</u></strong><br />\r\nप्रेमचंद संयुक्त परिवार में रहते थे। उनका बचपन दरिद्रता में बीता। पिता का मासिक वेतन महज 20 रुपए था। इतने कम वेतन में वे किस प्रकार अपने बच्चों को अच्छा भोजन और अच्छे वस्त्र दे सकते थे। प्रेमचंद लिखते हैं- &#39;मेरे पास पतंग खरीदकर उड़ाने के लिए भी पैसे नहीं रहते थे। यदि किसी की पतंग का धागा कट जाता था तो मैं पतंग के पीछे दौड़ता और उसे पकड़ता था।&#39;<br />\r\n<strong><u>आम आदमी की भाषा का साहित्य</u></strong><br />\r\nजब आज भी साहित्य में प्रेमचंद जिंदा हैं तो उनकी रचनाएं भी प्रासंगिक होंगी ही। कितने रचनाकार हुए लेकिन जितना याद प्रेमचंद को किया जाता है और किसी को नहीं। उनका साहित्य शाश्वत मूल्य है। जब तक राष्ट्रीय समस्याएं जैसे गरीबी, भुखमरी, बेरोजगारी आदि रहेंगी तब तक प्रेमचंद का साहित्य रहेगा।<br />\r\nजब तक अभावों का साम्राज्य रहेगा तब तक साहित्य रहेगा और जब तक आम आदमी का जीवन एकदम परिवर्तित नहीं हो जाता तब तक प्रेमचंद का साहित्य प्रासंगिक रहेगा। प्रेमचंद आम आदमी के चितेरे थे। उनकी रचनाओं में आम आदमी की भाषा है।<br />\r\n<br />\r\nप्रेमचंद ने निम्न और मध्य वर्ग के यथार्थ को अपने साहित्य का हिस्सा बनाया। जो उन्होंने लिखा उसे जीया भी। अगर उन्होंने विधवा विवाह का समर्थन किया तो खुद भी विधवा विवाह किया। प्रेमचंद का साहित्य ऐसा यथार्थ है, जिससे लोगों को वितृष्णा नहीं होती।</p>\r\n', 'lojanlo-15695254095d8d0ea1ecc8b.png', 'मुंशी प्रेमचंद', 1, 1, 1, 1, '1970-01-01 00:00:00', '2019-09-26 19:16:50', '2019-09-29 17:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `subCategory`
--

CREATE TABLE `subCategory` (
  `subCategoryId` bigint(20) NOT NULL,
  `categoryId` bigint(20) NOT NULL,
  `subCategory` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `pageUrl` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1: Active, 0:Inactive',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subCategory`
--

INSERT INTO `subCategory` (`subCategoryId`, `categoryId`, `subCategory`, `pageUrl`, `status`, `crd`, `upd`) VALUES
(3, 9, 'Sub tag1', '', 1, '2019-09-26 10:19:38', '2019-09-26 10:19:38'),
(4, 9, 'Tag2', '', 1, '2019-09-26 10:19:59', '2019-09-26 10:19:59'),
(5, 10, 'Tag3', '', 1, '2019-09-26 10:21:33', '2019-09-26 10:21:33'),
(6, 10, 'Tag4', '', 1, '2019-09-26 10:21:54', '2019-09-26 10:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `fullName` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
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
(1, 'Admn', 'a@admin.com', '123456', '', '43536466', 1, 1, 1, '', '', 0, '', 0, '2019-09-05 13:07:15', '2019-09-05 13:07:15'),
(2, 'Love k', 'm@gmail.com', '$2y$10$itWxWhKQ.fRAlkabGu.w8.M3yVQMfI.xGRygkyMeVxcsLp4S/QmSi', '', '(666) 373-7377', 1, 0, 1, 'c4874ef04c4588cdcdb363a14abd5a19b272ab36', 'fe2211fd0b46c1625317611e6bff4a0914552187', 0, '', 0, '2019-09-26 10:29:59', '2019-09-26 10:52:39');

-- --------------------------------------------------------

--
-- Table structure for table `visitors`
--

CREATE TABLE `visitors` (
  `visitorId` bigint(20) NOT NULL,
  `storyId` text CHARACTER SET utf8mb4 NOT NULL,
  `ip` text NOT NULL,
  `anonymous` varchar(255) NOT NULL,
  `agent` text CHARACTER SET utf8mb4 NOT NULL,
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitors`
--

INSERT INTO `visitors` (`visitorId`, `storyId`, `ip`, `anonymous`, `agent`, `crd`) VALUES
(1, '------------------------------------1569522972-lojanlo', '122.175.140.247', '10540593157', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-29 17:32:21'),
(2, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.140.247', '10540593157', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-29 17:34:58'),
(3, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '122.175.140.247', '10540593157', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-29 17:35:07'),
(4, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '47.247.70.9', '51570525305', 'Mozilla/5.0 (Linux; Android 9; SM-J600GF) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-29 17:35:32'),
(5, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.140.247', '31910071658', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-G900S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-29 17:36:48'),
(6, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '122.175.140.247', '51570525305', 'Mozilla/5.0 (Linux; Android 9; SM-J600GF) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-29 17:37:39'),
(7, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo>', '122.175.140.247', '10540593157', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-29 17:43:23'),
(8, 'What-is-Lorem-Ipsum--1569514305-lojanlo', '104.236.158.24', '96417654589', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '2019-09-29 18:38:13'),
(9, 'Where-can-I-get-some--1569514591-lojanlo', '104.236.158.24', '37451052231', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '2019-09-29 18:38:14'),
(10, 'What-is-Lorem-Ipsum--1569514305-lojanlo', '104.236.158.24', '42854327175', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '2019-09-29 18:38:32'),
(11, 'Where-can-I-get-some--1569514591-lojanlo', '104.236.158.24', '31649193024', 'Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36', '2019-09-29 18:38:32'),
(12, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '182.70.241.142', '46312580098', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 05:11:20'),
(13, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.232.105', '17502807574', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 12:40:50'),
(14, 'What-is-Lorem-Ipsum--1569514305-lojanlo', '122.175.232.105', '17502807574', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 12:44:48'),
(15, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '122.175.232.105', '17502807574', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 13:42:56'),
(16, 'Where-can-I-get-some--1569514591-lojanlo', '122.175.232.105', '17502807574', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 13:43:34'),
(17, '------------------------------------1569522972-lojanlo', '2a03:2880:10ff:12::face:b00c', '33543712064', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-09-30 14:11:23'),
(18, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.140.247', '60172892260', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '2019-09-30 18:20:25'),
(19, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:49f:5ace::275:30a4', '68548752249', 'Mozilla/5.0 (Linux; Android 9; SM-J600GF) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 18:21:31'),
(20, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '122.175.140.247', '27750124488', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 18:22:38'),
(21, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:49f:5ace::275:30a4', '68548752249', 'Mozilla/5.0 (Linux; Android 9; SM-J600GF) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 18:29:19'),
(22, 'Where-can-I-get-some--1569514591-lojanlo', '122.175.140.247', '27750124488', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 18:31:31'),
(23, 'Where-can-I-get-some--1569514591-lojanlo', '122.175.140.247', '94831921582', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 19:14:15'),
(24, 'Where-can-I-get-some--1569514591-lojanlo', '122.175.140.247', '36663078090', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 19:14:15'),
(25, 'Where-can-I-get-some--1569514591-lojanlo', '122.175.140.247', '60172892260', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '2019-09-30 19:15:06'),
(26, 'Where-can-I-get-some--1569514591-lojanlo', '122.175.140.247', '16856695884', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 19:17:14'),
(27, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.140.247', '16856695884', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-09-30 19:34:32'),
(28, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.140.247', '98235176570', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-09-30 19:39:04'),
(29, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:49f:5ace::275:30a4', '77374688206', 'Mozilla/5.0 (Linux; Android 9; SM-J600GF) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-01 03:49:48'),
(30, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.130.148', '32883451521', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-01 12:16:15'),
(31, 'What-is-Lorem-Ipsum--1569514305-lojanlo', '2409:4043:697:ef4e:d1f5:9b6a:9d54:a8a3', '99247640756', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-01 14:15:33'),
(32, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:697:ef4e:d1f5:9b6a:9d54:a8a3', '99247640756', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-01 14:16:17'),
(33, '------------------------------------1569522972-lojanlo', '2a03:2880:10ff::face:b00c', '56039728288', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 14:44:32'),
(34, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '11661229192', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-01 15:39:43'),
(35, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '122.175.229.118', '52379810730', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36', '2019-10-01 17:27:36'),
(36, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:b::face:b00c', '23904506420', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:42:17'),
(37, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:b::face:b00c', '56485445760', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:42:17'),
(38, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:9::face:b00c', '31687372453', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:42:20'),
(39, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:1::face:b00c', '37873098837', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:42:35'),
(40, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:3::face:b00c', '74844588837', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:42:36'),
(41, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:ff:18::face:b00c', '13317846940', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.2 Mobile/15E148 Safari/604.1', '2019-10-01 17:43:04'),
(42, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:a::face:b00c', '26009073596', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:48:11'),
(43, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:a::face:b00c', '73037989082', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:48:11'),
(44, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:3::face:b00c', '31759137707', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:57:06'),
(45, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:15::face:b00c', '78086136159', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 17:57:06'),
(46, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:19::face:b00c', '84293832237', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 18:02:10'),
(47, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '66.249.69.119', '36426954287', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2019-10-01 18:04:39'),
(48, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '66.249.69.121', '59676001477', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2019-10-01 18:07:03'),
(49, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:c::face:b00c', '31872574996', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 18:21:59'),
(50, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:a::face:b00c', '90717901594', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 18:21:59'),
(51, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:a::face:b00c', '36539101992', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 18:59:06'),
(52, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:30ff:10::face:b00c', '72957553131', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 18:59:06'),
(53, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '38622841814', 'Mozilla/5.0 (Linux; Android 9; SM-J600GF) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-01 19:17:06'),
(54, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '36465635884', 'WhatsApp/2.19.258 A', '2019-10-01 19:21:03'),
(55, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '95334133678', 'WhatsApp/2.19.258 A', '2019-10-01 19:21:04'),
(56, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '85803240479', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-G900S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-01 19:21:53'),
(57, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:30ff:1::face:b00c', '50920516031', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 19:22:15'),
(58, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:30ff:7::face:b00c', '62829895408', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 19:22:15'),
(59, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:30ff:1::face:b00c', '26883774737', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-01 19:22:18'),
(60, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '144.2.2.50', '50320773256', 'LinkedInBot/1.0 (compatible; Mozilla/5.0; Apache-HttpClient +http://www.linkedin.com)', '2019-10-01 19:23:29'),
(61, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '144.2.2.50', '59849686283', 'LinkedInBot/1.0 (compatible; Mozilla/5.0; Apache-HttpClient +http://www.linkedin.com)', '2019-10-01 19:24:01'),
(62, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '23992986753', 'Mozilla/5.0 (Linux; Android 6.0.1; SM-G900S) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-02 03:58:42'),
(63, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '66.249.69.58', '14009547245', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2019-10-02 09:18:13'),
(64, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '66.249.69.58', '99504187380', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 5X Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2272.96 Mobile Safari/537.36 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2019-10-02 09:18:13'),
(65, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:10ff:11::face:b00c', '84288627590', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 14:07:21'),
(66, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.175.229.118', '87206936088', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '2019-10-02 17:59:00'),
(67, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:16::face:b00c', '11167456282', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:04'),
(68, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:5::face:b00c', '11551519480', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:05'),
(69, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:1a::face:b00c', '69949040294', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:26'),
(70, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:11ff:1d::face:b00c', '70340081927', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:26'),
(71, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:20::face:b00c', '85882548464', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:26'),
(72, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:1c::face:b00c', '63699159364', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:27'),
(73, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:e::face:b00c', '22499853890', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:27'),
(74, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:e::face:b00c', '84744366845', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 17:59:27'),
(75, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:21ff:1b::face:b00c', '60675917923', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', '2019-10-02 17:59:32'),
(76, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:11ff:19::face:b00c', '90509369847', 'Mozilla/5.0 (iPhone; CPU iPhone OS 13_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/13.0.1 Mobile/15E148 Safari/604.1', '2019-10-02 18:00:36'),
(77, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '66.249.69.41', '44869219673', 'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)', '2019-10-02 18:03:30'),
(78, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:17::face:b00c', '15774854760', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:11:33'),
(79, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:d::face:b00c', '16588581866', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:11:33'),
(80, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:9::face:b00c', '89869198155', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:11:33'),
(81, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:33::face:b00c', '79595859733', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:11:33'),
(82, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:a::face:b00c', '90579428961', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/18.17763', '2019-10-02 18:11:41'),
(83, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:31ff:f::face:b00c', '60993573463', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/534+ (KHTML, like Gecko) BingPreview/1.0b', '2019-10-02 18:11:41'),
(84, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:10ff:e::face:b00c', '93429559942', 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_4_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/12.1.2 Mobile/15E148 Safari/604.1', '2019-10-02 18:11:41'),
(85, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:10ff:f::face:b00c', '84685341913', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 6P Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2019-10-02 18:12:08'),
(86, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:10ff:11::face:b00c', '29030704607', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 6P Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2019-10-02 18:12:12'),
(87, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:22::face:b00c', '23406945574', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 6P Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2019-10-02 18:12:14'),
(88, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:21ff:21::face:b00c', '33502272710', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/64.0.3282.140 Safari/537.36 Edge/18.17763', '2019-10-02 18:12:40'),
(89, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:21ff:13::face:b00c', '42303865728', 'Mozilla/5.0 (Linux; Android 6.0.1; Nexus 6P Build/MMB29P) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.83 Mobile Safari/537.36', '2019-10-02 18:13:11'),
(90, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff:26::face:b00c', '65354588688', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:37:32'),
(91, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:20ff::face:b00c', '46585204684', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:37:32'),
(92, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '122.175.229.118', '87206936088', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64; rv:69.0) Gecko/20100101 Firefox/69.0', '2019-10-02 18:38:13'),
(93, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:20ff:2::face:b00c', '27900770067', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:38:17'),
(94, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:20ff:32::face:b00c', '51859798697', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:38:17'),
(95, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:20ff:17::face:b00c', '81826395330', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:38:29'),
(96, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:20ff:17::face:b00c', '52969285680', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:38:29'),
(97, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:20ff:17::face:b00c', '16646994036', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:38:29'),
(98, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2a03:2880:20ff:22::face:b00c', '38167090030', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 18:38:30'),
(99, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:310:9eb4::1c7a:b0a4', '79728559022', 'WhatsApp/2.19.258 A', '2019-10-02 19:29:35'),
(100, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:310:9eb4::1c7a:b0a4', '88422681497', 'WhatsApp/2.19.258 A', '2019-10-02 19:29:35'),
(101, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2a03:2880:21ff:22::face:b00c', '90732473475', 'facebookexternalhit/1.1 (+http://www.facebook.com/externalhit_uatext.php)', '2019-10-02 19:30:13'),
(102, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '25142468656', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-02 19:30:17'),
(103, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '18682636007', 'WhatsApp/2.19.258 A', '2019-10-02 19:30:26'),
(104, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '32708823543', 'WhatsApp/2.19.258 A', '2019-10-02 19:30:26'),
(105, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '90873860469', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-02 19:37:52'),
(106, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '90873860469', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-02 19:40:47'),
(107, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '82475840060', 'WhatsApp/2.19.258 A', '2019-10-02 19:41:10'),
(108, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '64318497177', 'WhatsApp/2.19.258 A', '2019-10-02 19:41:10'),
(109, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '91509762995', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-02 19:52:31'),
(110, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '55628395152', 'WhatsApp/2.19.258 A', '2019-10-02 19:52:38'),
(111, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '57283128261', 'WhatsApp/2.19.258 A', '2019-10-02 19:52:38'),
(112, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '75562413270', 'WhatsApp/2.19.258 A', '2019-10-02 19:52:52'),
(113, 'चांदनी-जैसे-निर्मल-लेखक-1569778389-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '39259347141', 'WhatsApp/2.19.258 A', '2019-10-02 19:52:52'),
(114, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '2409:4043:697:ef4e:29aa:4dcf:f07e:2edf', '13902767537', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-02 19:56:15'),
(115, 'कहानी-:-कैसे-आया-जूता-1569778402-lojanlo', '122.170.199.35', '23031139040', 'Mozilla/5.0 (Linux; Android 9; Mi A1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36', '2019-10-03 06:46:15');

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
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactId`);

--
-- Indexes for table `likeStory`
--
ALTER TABLE `likeStory`
  ADD PRIMARY KEY (`likeId`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`pageId`);

--
-- Indexes for table `site_log`
--
ALTER TABLE `site_log`
  ADD PRIMARY KEY (`site_log_id`);

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
-- Indexes for table `visitors`
--
ALTER TABLE `visitors`
  ADD PRIMARY KEY (`visitorId`);

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
  MODIFY `categoryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `likeStory`
--
ALTER TABLE `likeStory`
  MODIFY `likeId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `site_log`
--
ALTER TABLE `site_log`
  MODIFY `site_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stories`
--
ALTER TABLE `stories`
  MODIFY `storyId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `subCategory`
--
ALTER TABLE `subCategory`
  MODIFY `subCategoryId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitors`
--
ALTER TABLE `visitors`
  MODIFY `visitorId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

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
