-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 08, 2021 at 03:48 PM
-- Server version: 5.7.18-log
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `netflix_clone`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`fear`@`%` PROCEDURE `update_user_token` (`userID` BIGINT(100), `token` VARCHAR(50))  BEGIN
	UPDATE users SET account_key = token where id = userID;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `casts`
--

CREATE TABLE `casts` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0' COMMENT '0=actor,1=director,2=producer',
  `description` longtext COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `casts`
--

INSERT INTO `casts` (`id`, `name`, `avatar`, `role`, `description`) VALUES
(1, 'Anna', 'assets/default/cast/1.jpg', '0', 'this is description'),
(2, 'Robert', 'assets/default/cast/1.jpg', '0', 'this is just a description about the actor and stuff');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` bigint(20) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `message` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `message`, `status`) VALUES
(1, '', 'fear126@live.com', '', 'this is just a message', '1'),
(2, 'fear', 'fear126@live.com', '9878695378', 'this is just a message to check stuff', '1');

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `trailer` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` json NOT NULL,
  `IMDB` float NOT NULL,
  `guidelines` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `summary` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cast` json NOT NULL,
  `tags` json NOT NULL,
  `views` bigint(20) NOT NULL DEFAULT '0',
  `featured` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `isMovie` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1',
  `subscribed` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`id`, `name`, `thumbnail`, `background`, `trailer`, `genre`, `IMDB`, `guidelines`, `summary`, `cast`, `tags`, `views`, `featured`, `isMovie`, `subscribed`) VALUES
(1, 'The Express', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"1\", \"2\"]', 4.8, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0, '0', '1', '0'),
(2, 'The Express 2', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"1\", \"2\"]', 5.6, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0, '0', '1', '1'),
(3, 'The Express 3', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=n2u81Ujc93g', '[\"1\", \"2\"]', 8, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0, '1', '1', '1'),
(4, 'The Express 4', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"3\", \"2\"]', 8.1, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0, '1', '1', '1'),
(5, 'The Express 5\r\n', 'assets/entities/1/thumb/asset-1.jpg', 'assets/entities/1/back/asset-1.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"3\", \"4\"]', 8.2, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0, '1', '1', '1'),
(6, 'The Show 1\r\n', 'assets/entities/6/thumb/asset-2.jpg', 'assets/entities/6/back/asset-2.jpg', 'https://www.youtube.com/watch?v=LXb3EKWsInQ', '[\"3\", \"4\"]', 8.2, 'PG-14', 'thi is long stuff about the movie or a tv show or who know what else and stuiff', '[\"1\", \"2\"]', '[\"1\", \"2\"]', 0, '1', '0', '1');

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` bigint(20) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Annimation'),
(3, 'Mystery'),
(4, 'Family');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) NOT NULL,
  `slug` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `headerID` bigint(20) NOT NULL,
  `isLoggedIn` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `slug`, `title`, `content`, `headerID`, `isLoggedIn`, `status`) VALUES
(1, 'privacy-policy', 'Privacy Policy', '\r\nPrivacy Policy for Company Name\r\n\r\nAt Website Name, accessible at Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Website Name and how we use it.\r\n\r\nIf you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at Email@Website.com\r\n\r\nThis privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Website Name. This policy is not applicable to any information collected offline or via channels other than this website.\r\n\r\nConsent\r\n\r\nBy using our website, you hereby consent to our Privacy Policy and agree to its terms.\r\n\r\nInformation we collect\r\n\r\nThe personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.\r\n\r\nIf you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.\r\n\r\nWhen you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.\r\n\r\nHow we use your information\r\n\r\nWe use the information we collect in various ways, including to:\r\n\r\n    Provide, operate, and maintain our website\r\n    Improve, personalize, and expand our website\r\n    Understand and analyze how you use our website\r\n    Develop new products, services, features, and functionality\r\n    Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes\r\n    Send you emails\r\n    Find and prevent fraud\r\n\r\nLog Files\r\n\r\nWebsite Name follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.\r\nCookies and Web Beacons\r\n\r\nLike any other website, Website Name uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.\r\nDoubleClick DART Cookie\r\n\r\nGoogle is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads.\r\n\r\nSome of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.\r\n\r\n    Google\r\n\r\n    https://policies.google.com/technologies/ads\r\n\r\nAdvertising Partners Privacy Policies\r\n\r\nYou may consult this list to find the Privacy Policy for each of the advertising partners of Website Name.\r\n\r\nThird-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.\r\n\r\nNote that Website Name has no access to or control over these cookies that are used by third-party advertisers.\r\n\r\nThird-Party Privacy Policies\r\n\r\nWebsite Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.\r\n\r\nYou can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?\r\n\r\nCCPA Privacy Policy (Do Not Sell My Personal Information)\r\n\r\nUnder the CCPA, among other rights, California consumers have the right to:\r\n\r\nRequest that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.\r\n\r\nRequest that a business delete any personal data about the consumer that a business has collected.\r\n\r\nRequest that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nGDPR Privacy Policy (Data Protection Rights)\r\n\r\nWe would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:\r\n\r\nThe right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.\r\n\r\nThe right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.\r\n\r\nThe right to erasure – You have the right to request that we erase your personal data, under certain conditions.\r\n\r\nThe right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.\r\n\r\nThe right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.\r\n\r\nThe right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nChildren\'s Information\r\n\r\nAnother part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.\r\n\r\nWebsite Name does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.\r\n', 1, '0', '1'),
(2, 'terms-of-service', 'Terms Of Service', '\r\nPrivacy Policy for Company Name\r\n\r\nAt Website Name, accessible at Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Website Name and how we use it.\r\n\r\nIf you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at Email@Website.com\r\n\r\nThis privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Website Name. This policy is not applicable to any information collected offline or via channels other than this website.\r\n\r\nConsent\r\n\r\nBy using our website, you hereby consent to our Privacy Policy and agree to its terms.\r\n\r\nInformation we collect\r\n\r\nThe personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.\r\n\r\nIf you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.\r\n\r\nWhen you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.\r\n\r\nHow we use your information\r\n\r\nWe use the information we collect in various ways, including to:\r\n\r\n    Provide, operate, and maintain our website\r\n    Improve, personalize, and expand our website\r\n    Understand and analyze how you use our website\r\n    Develop new products, services, features, and functionality\r\n    Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes\r\n    Send you emails\r\n    Find and prevent fraud\r\n\r\nLog Files\r\n\r\nWebsite Name follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.\r\nCookies and Web Beacons\r\n\r\nLike any other website, Website Name uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.\r\nDoubleClick DART Cookie\r\n\r\nGoogle is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads.\r\n\r\nSome of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.\r\n\r\n    Google\r\n\r\n    https://policies.google.com/technologies/ads\r\n\r\nAdvertising Partners Privacy Policies\r\n\r\nYou may consult this list to find the Privacy Policy for each of the advertising partners of Website Name.\r\n\r\nThird-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.\r\n\r\nNote that Website Name has no access to or control over these cookies that are used by third-party advertisers.\r\n\r\nThird-Party Privacy Policies\r\n\r\nWebsite Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.\r\n\r\nYou can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?\r\n\r\nCCPA Privacy Policy (Do Not Sell My Personal Information)\r\n\r\nUnder the CCPA, among other rights, California consumers have the right to:\r\n\r\nRequest that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.\r\n\r\nRequest that a business delete any personal data about the consumer that a business has collected.\r\n\r\nRequest that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nGDPR Privacy Policy (Data Protection Rights)\r\n\r\nWe would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:\r\n\r\nThe right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.\r\n\r\nThe right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.\r\n\r\nThe right to erasure – You have the right to request that we erase your personal data, under certain conditions.\r\n\r\nThe right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.\r\n\r\nThe right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.\r\n\r\nThe right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nChildren\'s Information\r\n\r\nAnother part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.\r\n\r\nWebsite Name does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.\r\n', 1, '1', '1'),
(3, 'discount', 'Discount', '\r\nPrivacy Policy for Company Name\r\n\r\nAt Website Name, accessible at Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Website Name and how we use it.\r\n\r\nIf you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at Email@Website.com\r\n\r\nThis privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Website Name. This policy is not applicable to any information collected offline or via channels other than this website.\r\n\r\nConsent\r\n\r\nBy using our website, you hereby consent to our Privacy Policy and agree to its terms.\r\n\r\nInformation we collect\r\n\r\nThe personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.\r\n\r\nIf you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.\r\n\r\nWhen you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.\r\n\r\nHow we use your information\r\n\r\nWe use the information we collect in various ways, including to:\r\n\r\n    Provide, operate, and maintain our website\r\n    Improve, personalize, and expand our website\r\n    Understand and analyze how you use our website\r\n    Develop new products, services, features, and functionality\r\n    Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes\r\n    Send you emails\r\n    Find and prevent fraud\r\n\r\nLog Files\r\n\r\nWebsite Name follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.\r\nCookies and Web Beacons\r\n\r\nLike any other website, Website Name uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.\r\nDoubleClick DART Cookie\r\n\r\nGoogle is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads.\r\n\r\nSome of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.\r\n\r\n    Google\r\n\r\n    https://policies.google.com/technologies/ads\r\n\r\nAdvertising Partners Privacy Policies\r\n\r\nYou may consult this list to find the Privacy Policy for each of the advertising partners of Website Name.\r\n\r\nThird-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.\r\n\r\nNote that Website Name has no access to or control over these cookies that are used by third-party advertisers.\r\n\r\nThird-Party Privacy Policies\r\n\r\nWebsite Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.\r\n\r\nYou can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?\r\n\r\nCCPA Privacy Policy (Do Not Sell My Personal Information)\r\n\r\nUnder the CCPA, among other rights, California consumers have the right to:\r\n\r\nRequest that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.\r\n\r\nRequest that a business delete any personal data about the consumer that a business has collected.\r\n\r\nRequest that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nGDPR Privacy Policy (Data Protection Rights)\r\n\r\nWe would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:\r\n\r\nThe right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.\r\n\r\nThe right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.\r\n\r\nThe right to erasure – You have the right to request that we erase your personal data, under certain conditions.\r\n\r\nThe right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.\r\n\r\nThe right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.\r\n\r\nThe right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nChildren\'s Information\r\n\r\nAnother part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.\r\n\r\nWebsite Name does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.\r\n', 2, '0', '1'),
(4, 'abc', 'ABC', '\r\nPrivacy Policy for Company Name\r\n\r\nAt Website Name, accessible at Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Website Name and how we use it.\r\n\r\nIf you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at Email@Website.com\r\n\r\nThis privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Website Name. This policy is not applicable to any information collected offline or via channels other than this website.\r\n\r\nConsent\r\n\r\nBy using our website, you hereby consent to our Privacy Policy and agree to its terms.\r\n\r\nInformation we collect\r\n\r\nThe personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.\r\n\r\nIf you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.\r\n\r\nWhen you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.\r\n\r\nHow we use your information\r\n\r\nWe use the information we collect in various ways, including to:\r\n\r\n    Provide, operate, and maintain our website\r\n    Improve, personalize, and expand our website\r\n    Understand and analyze how you use our website\r\n    Develop new products, services, features, and functionality\r\n    Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes\r\n    Send you emails\r\n    Find and prevent fraud\r\n\r\nLog Files\r\n\r\nWebsite Name follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.\r\nCookies and Web Beacons\r\n\r\nLike any other website, Website Name uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.\r\nDoubleClick DART Cookie\r\n\r\nGoogle is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads.\r\n\r\nSome of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.\r\n\r\n    Google\r\n\r\n    https://policies.google.com/technologies/ads\r\n\r\nAdvertising Partners Privacy Policies\r\n\r\nYou may consult this list to find the Privacy Policy for each of the advertising partners of Website Name.\r\n\r\nThird-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.\r\n\r\nNote that Website Name has no access to or control over these cookies that are used by third-party advertisers.\r\n\r\nThird-Party Privacy Policies\r\n\r\nWebsite Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.\r\n\r\nYou can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?\r\n\r\nCCPA Privacy Policy (Do Not Sell My Personal Information)\r\n\r\nUnder the CCPA, among other rights, California consumers have the right to:\r\n\r\nRequest that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.\r\n\r\nRequest that a business delete any personal data about the consumer that a business has collected.\r\n\r\nRequest that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nGDPR Privacy Policy (Data Protection Rights)\r\n\r\nWe would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:\r\n\r\nThe right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.\r\n\r\nThe right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.\r\n\r\nThe right to erasure – You have the right to request that we erase your personal data, under certain conditions.\r\n\r\nThe right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.\r\n\r\nThe right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.\r\n\r\nThe right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nChildren\'s Information\r\n\r\nAnother part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.\r\n\r\nWebsite Name does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.\r\n', 2, '0', '1'),
(5, 'abcd', 'ABCD', '\r\nPrivacy Policy for Company Name\r\n\r\nAt Website Name, accessible at Website.com, one of our main priorities is the privacy of our visitors. This Privacy Policy document contains types of information that is collected and recorded by Website Name and how we use it.\r\n\r\nIf you have additional questions or require more information about our Privacy Policy, do not hesitate to contact us through email at Email@Website.com\r\n\r\nThis privacy policy applies only to our online activities and is valid for visitors to our website with regards to the information that they shared and/or collect in Website Name. This policy is not applicable to any information collected offline or via channels other than this website.\r\n\r\nConsent\r\n\r\nBy using our website, you hereby consent to our Privacy Policy and agree to its terms.\r\n\r\nInformation we collect\r\n\r\nThe personal information that you are asked to provide, and the reasons why you are asked to provide it, will be made clear to you at the point we ask you to provide your personal information.\r\n\r\nIf you contact us directly, we may receive additional information about you such as your name, email address, phone number, the contents of the message and/or attachments you may send us, and any other information you may choose to provide.\r\n\r\nWhen you register for an Account, we may ask for your contact information, including items such as name, company name, address, email address, and telephone number.\r\n\r\nHow we use your information\r\n\r\nWe use the information we collect in various ways, including to:\r\n\r\n    Provide, operate, and maintain our website\r\n    Improve, personalize, and expand our website\r\n    Understand and analyze how you use our website\r\n    Develop new products, services, features, and functionality\r\n    Communicate with you, either directly or through one of our partners, including for customer service, to provide you with updates and other information relating to the website, and for marketing and promotional purposes\r\n    Send you emails\r\n    Find and prevent fraud\r\n\r\nLog Files\r\n\r\nWebsite Name follows a standard procedure of using log files. These files log visitors when they visit websites. All hosting companies do this and a part of hosting services\' analytics. The information collected by log files include internet protocol (IP) addresses, browser type, Internet Service Provider (ISP), date and time stamp, referring/exit pages, and possibly the number of clicks. These are not linked to any information that is personally identifiable. The purpose of the information is for analyzing trends, administering the site, tracking users\' movement on the website, and gathering demographic information.\r\nCookies and Web Beacons\r\n\r\nLike any other website, Website Name uses ‘cookies\'. These cookies are used to store information including visitors\' preferences, and the pages on the website that the visitor accessed or visited. The information is used to optimize the users\' experience by customizing our web page content based on visitors\' browser type and/or other information.\r\nDoubleClick DART Cookie\r\n\r\nGoogle is one of a third-party vendor on our site. It also uses cookies, known as DART cookies, to serve ads to our site visitors based upon their visit to www.website.com and other sites on the internet. However, visitors may choose to decline the use of DART cookies by visiting the Google ad and content network Privacy Policy at the following URL – https://policies.google.com/technologies/ads.\r\n\r\nSome of advertisers on our site may use cookies and web beacons. Our advertising partners are listed below. Each of our advertising partners has their own Privacy Policy for their policies on user data. For easier access, we hyperlinked to their Privacy Policies below.\r\n\r\n    Google\r\n\r\n    https://policies.google.com/technologies/ads\r\n\r\nAdvertising Partners Privacy Policies\r\n\r\nYou may consult this list to find the Privacy Policy for each of the advertising partners of Website Name.\r\n\r\nThird-party ad servers or ad networks uses technologies like cookies, JavaScript, or Web Beacons that are used in their respective advertisements and links that appear on Website Name, which are sent directly to users\' browser. They automatically receive your IP address when this occurs. These technologies are used to measure the effectiveness of their advertising campaigns and/or to personalize the advertising content that you see on websites that you visit.\r\n\r\nNote that Website Name has no access to or control over these cookies that are used by third-party advertisers.\r\n\r\nThird-Party Privacy Policies\r\n\r\nWebsite Name\'s Privacy Policy does not apply to other advertisers or websites. Thus, we are advising you to consult the respective Privacy Policies of these third-party ad servers for more detailed information. It may include their practices and instructions about how to opt-out of certain options. You may find a complete list of these Privacy Policies and their links here: Privacy Policy Links.\r\n\r\nYou can choose to disable cookies through your individual browser options. To know more detailed information about cookie management with specific web browsers, it can be found at the browsers\' respective websites. What Are Cookies?\r\n\r\nCCPA Privacy Policy (Do Not Sell My Personal Information)\r\n\r\nUnder the CCPA, among other rights, California consumers have the right to:\r\n\r\nRequest that a business that collects a consumer\'s personal data disclose the categories and specific pieces of personal data that a business has collected about consumers.\r\n\r\nRequest that a business delete any personal data about the consumer that a business has collected.\r\n\r\nRequest that a business that sells a consumer\'s personal data, not sell the consumer\'s personal data.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nGDPR Privacy Policy (Data Protection Rights)\r\n\r\nWe would like to make sure you are fully aware of all of your data protection rights. Every user is entitled to the following:\r\n\r\nThe right to access – You have the right to request copies of your personal data. We may charge you a small fee for this service.\r\n\r\nThe right to rectification – You have the right to request that we correct any information you believe is inaccurate. You also have the right to request that we complete the information you believe is incomplete.\r\n\r\nThe right to erasure – You have the right to request that we erase your personal data, under certain conditions.\r\n\r\nThe right to restrict processing – You have the right to request that we restrict the processing of your personal data, under certain conditions.\r\n\r\nThe right to object to processing – You have the right to object to our processing of your personal data, under certain conditions.\r\n\r\nThe right to data portability – You have the right to request that we transfer the data that we have collected to another organization, or directly to you, under certain conditions.\r\n\r\nIf you make a request, we have one month to respond to you. If you would like to exercise any of these rights, please contact us.\r\n\r\nChildren\'s Information\r\n\r\nAnother part of our priority is adding protection for children while using the internet. We encourage parents and guardians to observe, participate in, and/or monitor and guide their online activity.\r\n\r\nWebsite Name does not knowingly collect any Personal Identifiable Information from children under the age of 13. If you think that your child provided this kind of information on our website, we strongly encourage you to contact us immediately and we will do our best efforts to promptly remove such information from our records.\r\n', 2, '1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `page_headers`
--

CREATE TABLE `page_headers` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `page_headers`
--

INSERT INTO `page_headers` (`id`, `name`) VALUES
(1, 'Company'),
(2, 'Navigation');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `description`, `status`) VALUES
(1, 'app.version', '1.0.0', 'Current application version', 1),
(2, 'app.name', 'Stream', 'Application name', 1),
(3, 'app.description', 'Online streaming app', 'Application description', 1),
(4, 'app.theme', 'default', 'Application themes', 1),
(5, 'mail.host', 'mail.tweekersnut.in', 'SMTP mail host', 1),
(6, 'mail.username', 'hosting@tweekersnut.in', 'SMTP mail username', 1),
(7, 'mail.password', 'mElf(69y?N-j', 'SMTP mail password', 1),
(8, 'mail.enc', 'ssl', 'SMTP encryption', 1),
(9, 'mail.port', '465', 'SMTP port', 1),
(10, 'admin.email', 'hosting@tweekersnut.in', 'Admin email', 1),
(11, 'app.logo', 'images/logo-1.png', 'application logo', 1),
(12, 'contact.email', 'admin@tweekersnut.com', 'contact email', 1),
(13, 'contact.phone', '+91 9988066776', 'contact phone number', 1),
(14, 'contact.location', 'Tweekersnut network, Phase-6 IND. Area', 'contact location address', 1),
(15, 'contact.map', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13718.33363343875!2d76.7092702!3d30.7301099!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xc2418f4ab36a780!2sTweekersNut%20Network!5e0!3m2!1sen!2sin!4v1625470829485!5m2!1sen!2sin', 'map', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `name`) VALUES
(1, '4K'),
(2, 'Hero'),
(3, 'King'),
(4, 'Dubbing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `avatar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `account_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_subscribed` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `role` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `ip` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `first_name`, `last_name`, `password`, `created_at`, `avatar`, `last_login`, `account_key`, `is_subscribed`, `role`, `ip`, `status`) VALUES
(3, 'fear126', 'fear126@live.com', 'Fear', 'Fear', 'c2RBbDgwSjNFbmkrUlI2UG1JMGh6dz09', '2021-06-23 11:43:11', 'http://netflix.local//assets/default/images/avatars/default.png', '2021-07-05 13:17:58', '60e70203de4e6', '0', '0', '127.0.0.1', '1');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `title` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `filePath` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `uploadDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `releaseDate` date NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `season` int(11) DEFAULT '0',
  `episode` int(11) DEFAULT '0',
  `language` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `audio_languages` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `entityId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `title`, `filePath`, `uploadDate`, `releaseDate`, `views`, `season`, `episode`, `language`, `audio_languages`, `entityId`) VALUES
(1, 'The Express', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 5, 0, 0, 'English', 'English', 1),
(2, 'The Express 2', '/assets/videos/2/2.mp4', '2021-06-30 12:21:46', '2021-06-09', 7, 0, 0, 'English', 'English', 2),
(3, 'The Express 3', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 4, 0, 0, 'English', 'English', 3),
(4, 'The Express 4', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 1, 0, 0, 'English', 'English', 4),
(5, 'The Express 5', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 1, 0, 0, 'English', 'English', 5),
(6, 'pika', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 9, 1, 1, 'English', 'English', 6),
(7, 'chu', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 9, 1, 2, 'English', 'English', 6),
(8, 'ash', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 9, 2, 1, 'English', 'English', 6),
(9, 'dina', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 9, 2, 2, 'English', 'English', 6),
(10, 'saur', '/assets/videos/1/1.mp4', '2021-06-30 12:21:46', '2021-06-09', 9, 2, 3, 'English', 'English', 6),
(11, 'omg', '/assets/videos/2/2.mp4', '2021-06-30 12:21:46', '2021-06-09', 9, 3, 1, 'English', 'English', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `casts`
--
ALTER TABLE `casts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entities`
--
ALTER TABLE `entities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_headers`
--
ALTER TABLE `page_headers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `entityId` (`entityId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `casts`
--
ALTER TABLE `casts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `entities`
--
ALTER TABLE `entities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `page_headers`
--
ALTER TABLE `page_headers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
