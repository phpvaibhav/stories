-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 27, 2019 at 03:24 PM
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
(1, 'Admin', 'admin@admin.com', '$2y$10$RTG0LIJMlWZc0/0bGSvD..LO2SAIA9FAE7CwffXp9ztNA1Wlbcmey', 1, 'jq4Y1OcsdhNF9KIJ.png', '(111) 111-1111', 1, 'dfa8f3b9f03bfccae3ef9acc2ff65af1dc37db9f', 'e5309a9e62031ca2acfe429e2930c5a2a90dcf1d', '2019-08-01 13:15:47', '2019-09-26 15:39:54');

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
  `title` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `comments` text CHARACTER SET utf8mb4 NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1:Active',
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `upd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 'About us', 'aboutus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'fa fa-eye', '<h2>What is Lorem Ipsum?</h2>\r\n\r\n<p style=\"text-align:justify\"><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&#39;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 1, 1, '2019-09-26 15:47:51', '2019-09-26 15:47:51'),
(2, 'Contact us', 'contactus', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', 'fa fa-envelope', '<h2>Where does it come from?</h2>\r\n\r\n<p style=\"text-align:justify\">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32.</p>\r\n', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. ', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. ', 1, 1, '2019-09-26 15:49:53', '2019-09-26 15:49:53'),
(3, 'Term & Conditions', 'termConditions', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'fa fa-time', '<h2>Where can I get some?</h2>\r\n\r\n<p style=\"text-align:justify\">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don&#39;t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn&#39;t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</p>\r\n\r\n<form action=\"https://www.lipsum.com/feed/html\" method=\"post\">\r\n<table style=\"border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px; width:436px\">\r\n	<tbody>\r\n		<tr>\r\n			<td rowspan=\"2\" style=\"text-align:center; vertical-align:middle\"><input name=\"amount\" size=\"3\" style=\"border-style:solid; border-width:1px; margin:3px 6px; width:30px\" type=\"text\" value=\"5\" /></td>\r\n			<td rowspan=\"2\" style=\"text-align:center; vertical-align:middle\">\r\n			<table style=\"border-collapse:collapse; border-spacing:0px; border:0px; margin:0px; padding:0px; text-align:left\">\r\n				<tbody>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input checked=\"checked\" name=\"what\" type=\"radio\" value=\"paras\" /></td>\r\n						<td style=\"vertical-align:middle\">paragraphs</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input name=\"what\" type=\"radio\" value=\"words\" /></td>\r\n						<td style=\"vertical-align:middle\">words</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input name=\"what\" type=\"radio\" value=\"bytes\" /></td>\r\n						<td style=\"vertical-align:middle\">bytes</td>\r\n					</tr>\r\n					<tr>\r\n						<td style=\"vertical-align:middle; width:20px\"><input name=\"what\" type=\"radio\" value=\"lists\" /></td>\r\n						<td style=\"vertical-align:middle\">lists</td>\r\n					</tr>\r\n				</tbody>\r\n			</table>\r\n			</td>\r\n			<td style=\"text-align:center; vertical-align:middle; width:20px\"><input checked=\"checked\" name=\"start\" type=\"checkbox\" value=\"yes\" /></td>\r\n			<td style=\"vertical-align:middle\">Start with &#39;Lorem<br />\r\n			ipsum dolor sit amet...&#39;</td>\r\n		</tr>\r\n		<tr>\r\n			<td style=\"text-align:center; vertical-align:middle\">&nbsp;</td>\r\n			<td style=\"vertical-align:middle\"><input name=\"generate\" style=\"border-style:solid; border-width:1px; margin:10px 0px 0px\" type=\"submit\" value=\"Generate Lorem Ipsum\" /></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n</form>\r\n', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', 1, 1, '2019-09-26 15:51:23', '2019-09-26 15:51:23'),
(4, 'Privacy Policy', 'privacyPolicy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'fa fa-close', '<h3>The standard Lorem Ipsum passage, used since the 1500s</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.&quot;</p>\r\n\r\n<h3>Section 1.10.32 of &quot;de Finibus Bonorum et Malorum&quot;, written by Cicero in 45 BC</h3>\r\n\r\n<p style=\"text-align:justify\">&quot;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?&quot;</p>\r\n', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.', 1, 1, '2019-09-26 15:52:59', '2019-09-26 15:52:59');

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
(11, 9, 4, '------------------------------------1569522972-lojanlo', 'कहानी : कैसे आया जूता', '', '<p>एक बार की बात है एक राजा था। उसका एक बड़ा-सा राज्य था। एक दिन उसे देश घूमने का विचार आया और उसने देश भ्रमण की योजना बनाई और घूमने निकल पड़ा। जब वह यात्रा से लौट कर अपने महल आया। उसने अपने मंत्रियों से पैरों में दर्द होने की शिकायत की। राजा का कहना था कि मार्ग में जो कंकड़ पत्थर थे वे मेरे पैरों में चुभ गए और इसके लिए कुछ इंतजाम करना चाहिए।</p>\r\n\r\n<p>कुछ देर विचार करने के बाद उसने अपने सैनिकों व मंत्रियों को आदेश दिया कि देश की संपूर्ण सड़कें चमड़े से ढंक दी जाएं। राजा का ऐसा आदेश सुनकर सब सकते में आ गए। लेकिन किसी ने भी मना करने की हिम्मत नहीं दिखाई। यह तो निश्चित ही था कि इस काम के लिए बहुत सारे रुपए की जरूरत थी। लेकिन फिर भी किसी ने कुछ नहीं कहा। कुछ देर बाद राजा के एक बुद्घिमान मंत्री ने एक युक्ति निकाली। उसने राजा के पास जाकर डरते हुए कहा कि मैं आपको एक सुझाव देना चाहता हूँ।<br />\r\nअगर आप इतने रुपयों को अनावश्यक रूप से बर्बाद न करना चाहें तो एक अच्छी तरकीब मेरे पास है। जिससे आपका काम भी हो जाएगा और अनावश्यक रुपयों की बर्बादी भी बच जाएगी। राजा आश्चर्यचकित था क्योंकि पहली बार किसी ने उसकी आज्ञा न मानने की बात कही थी। उसने कहा बताओ क्या सुझाव है। मंत्री ने कहा कि पूरे देश की सड़कों को चमड़े से ढंकने के बजाय आप चमड़े के एक टुकड़े का उपयोग कर अपने पैरों को ही क्यों नहीं ढंक लेते। राजा ने अचरज की दृष्टि से मंत्री को देखा और उसके सुझाव को मानते हुए अपने लिए जूता बनवाने का आदेश दे दिया।<br />\r\nयह कहानी हमें एक महत्वपूर्ण पाठ सिखाती है कि हमेशा ऐसे हल के बारे में सोचना चाहिए जो ज्यादा उपयोगी हो। जल्दबाजी में अप्रायोगिक हल सोचना बुद्धिमानी नहीं है। दूसरों के साथ बातचीत से भी अच्छे हल निकाले जा सकते हैं।</p>\r\n', 'lojanlo-15695229725d8d051c45351.png', 'amanomus', 1, 1, 1, 1, '1970-01-01 00:00:00', '2019-09-26 18:36:13', '2019-09-26 19:12:17'),
(12, 10, 5, '----------------------------------------------------------------1569525409-lojanlo', 'चांदनी जैसे निर्मल लेखक', '', '<p>प्रेमचंद आम आदमी तक अपने विचार पहुंचाकर उनकी सेवा करना चाहते थे। इसी मंशा से उन्होंने 1934 में अजंता सिनेटोन नामक फिल्म कंपनी से समझौता करके फिल्म- संसार में प्रवेश किया। वे बम्बई पहुंचे और &#39;शेर दिल औरत&#39; और &#39;मिल मजदूर&#39; नामक दो कहानियां लिखीं। &#39;सेवा सदन&#39; को भी पर्दे पर दिखाया गया। लेकिन प्रेमचंद मूलतः निष्कपट व्यक्ति थे।<br />\r\n<br />\r\nफिल्म निर्माताओं का मुख्य उद्देश्य जनता का पैसा लूटना था। उनका यह ध्येय नहीं था कि वे जनजीवन में परिवर्तन करें। इस वजह से प्रेमचंद को सिनेजगत से अरुचि हो गई और वे 8 हजार रुपए वार्षिक आय को तिलांजलि देकर बम्बई से काशी आ गए। फिल्म संसार से क्या मिला? इस सवाल के जवाब में प्रेमचंद लिखते हैं कि अंतिम समय उनके पास 1400 रुपए थे।<br />\r\n<strong><u>साहित्य का आदर्श</u></strong><br />\r\nसाहित्य की बात करते हुए प्रेमचंद लिखते हैं- &#39;जो धन और संपत्ति चाहते हैं, साहित्य में उनके लिए स्थान नहीं है। केवल वे, जो यह विश्वास करते हैं कि सेवामय जीवन ही श्रेष्ठ जीवन है, जो साहित्य के भक्त हैं और जिन्होंने अपने हृदय को समाज की पीड़ा और प्रेम की शक्ति से भर लिया है, उन्हीं के लिए साहित्य में स्थान है। वे ही समाज के ध्वज को लेकर आगे बढ़ने वाले सैनिक हैं।&#39;<br />\r\n<strong><u>साहित्य व देश सबसे ऊपर</u></strong><br />\r\nपंडित बनारसीदास चतुर्वेदी को लिखे पत्र में प्रेमचंद ने कहा था- &#39;हमारी और कोई इच्छा नहीं है। इस समय यही अभिलाषा है कि स्वराज की लड़ाई में हमें जीतना चाहिए। मैं प्रसिद्धि या सौभाग्य की लालसा के पीछे नहीं हूं। मैं किसी भी प्रकार से जिंदगी गुजार सकता हूं।<br />\r\n<br />\r\nमुझे कार और बंगले की कामना नहीं है लेकिन मैं तीन-चार अच्छी पुस्तकें लिखना चाहता हूं, जिनमें स्वराज प्राप्ति की इच्छा का प्रतिपादन हो सके। मैं आलसी नहीं बन सकता। मैं साहित्य और अपने देश के लिए कुछ करने की आशा रखता हूं।&#39;<br />\r\n<strong><u>चांदनी जैसा निर्मल व्यक्तित्व</u></strong><br />\r\nप्रेमचंद ने अपने जीवन में देशभक्ति, प्रामाणिकता और समाज सुधार का प्रचार न केवल अपनी लेखनी से किया, बल्कि वे जीवन में स्वयं उस पर चलते भी रहे। देश की जनता के लिए उन्होंने ताउम्र लिखा और जनता के लिए ही जिये। प्रेमचंद का व्यक्तित्व चांदनी के समान निर्मल था। यह निर्मलता उनके शैशव से ही झलकती थी।<br />\r\n<strong><u>हिन्दू-मुस्लिम सांस्कृतिक एकता</u></strong><br />\r\nवाराणसी के निकट लमही नामक ग्राम में उनका जन्म हुआ। यहां का श्रीवास्तव परिवार लेखकों के लिए प्रसिद्ध था। इस परिवार के लोगों ने प्रायः मुगल-कचहरियों में बाबू का काम किया था। प्रेमचंद के पिता भी डाकघर में मुंशी यानी बाबू थे। स्वभावतः मुगल-सभ्यता की छाप इनके परिवार पर पड़ी थी। श्रीवास्तव परिवार इस्लामी सभ्यता की बहुत सी बातों से प्रभावित हुआ था- जैसे पहनावे का ढंग। यह परिवार हिन्दू-मुस्लिम सांस्कृतिक समन्वय का उत्कृष्ठ उदाहरण था।<br />\r\n<strong><u>दरिद्रता में बीता बचपन</u></strong><br />\r\nप्रेमचंद संयुक्त परिवार में रहते थे। उनका बचपन दरिद्रता में बीता। पिता का मासिक वेतन महज 20 रुपए था। इतने कम वेतन में वे किस प्रकार अपने बच्चों को अच्छा भोजन और अच्छे वस्त्र दे सकते थे। प्रेमचंद लिखते हैं- &#39;मेरे पास पतंग खरीदकर उड़ाने के लिए भी पैसे नहीं रहते थे। यदि किसी की पतंग का धागा कट जाता था तो मैं पतंग के पीछे दौड़ता और उसे पकड़ता था।&#39;<br />\r\n<strong><u>आम आदमी की भाषा का साहित्य</u></strong><br />\r\nजब आज भी साहित्य में प्रेमचंद जिंदा हैं तो उनकी रचनाएं भी प्रासंगिक होंगी ही। कितने रचनाकार हुए लेकिन जितना याद प्रेमचंद को किया जाता है और किसी को नहीं। उनका साहित्य शाश्वत मूल्य है। जब तक राष्ट्रीय समस्याएं जैसे गरीबी, भुखमरी, बेरोजगारी आदि रहेंगी तब तक प्रेमचंद का साहित्य रहेगा।<br />\r\nजब तक अभावों का साम्राज्य रहेगा तब तक साहित्य रहेगा और जब तक आम आदमी का जीवन एकदम परिवर्तित नहीं हो जाता तब तक प्रेमचंद का साहित्य प्रासंगिक रहेगा। प्रेमचंद आम आदमी के चितेरे थे। उनकी रचनाओं में आम आदमी की भाषा है।<br />\r\n<br />\r\nप्रेमचंद ने निम्न और मध्य वर्ग के यथार्थ को अपने साहित्य का हिस्सा बनाया। जो उन्होंने लिखा उसे जीया भी। अगर उन्होंने विधवा विवाह का समर्थन किया तो खुद भी विधवा विवाह किया। प्रेमचंद का साहित्य ऐसा यथार्थ है, जिससे लोगों को वितृष्णा नहीं होती।</p>\r\n', 'lojanlo-15695254095d8d0ea1ecc8b.png', 'मुंशी प्रेमचंद', 1, 1, 1, 1, '1970-01-01 00:00:00', '2019-09-26 19:16:50', '2019-09-26 19:16:50');

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
  `ip` text NOT NULL,
  `agent` text NOT NULL,
  `crd` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  MODIFY `commentId` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `pageId` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `visitorId` bigint(20) NOT NULL AUTO_INCREMENT;

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
