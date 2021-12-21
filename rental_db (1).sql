-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 21, 2021 at 05:33 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rental_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad_admin`
--

CREATE TABLE `ad_admin` (
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `simple_password` text NOT NULL,
  `salt_password` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_admin`
--

INSERT INTO `ad_admin` (`user_id`, `email`, `simple_password`, `salt_password`, `updated_at`) VALUES
(1, 'admin@rentalapp.com', 'NllsR05rZ2VxRzNoMnlSQjBadW1yUT09', '5114073246946515', '2021-12-09 05:14:27');

-- --------------------------------------------------------

--
-- Table structure for table `ad_categories`
--

CREATE TABLE `ad_categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_categories`
--

INSERT INTO `ad_categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(3, 'Tamekah Lindsay', '2021-12-15 13:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `ad_cms`
--

CREATE TABLE `ad_cms` (
  `cms_id` int(11) NOT NULL,
  `page_name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_cms`
--

INSERT INTO `ad_cms` (`cms_id`, `page_name`, `content`, `updated_at`) VALUES
(1, 'terms and conditions', '<p>Assumenda velit non .</p>\n', '2021-12-14 16:00:34'),
(2, 'terms and conditions', '<p>Assumenda velit non .</p>\n', '2021-12-14 16:01:10'),
(3, 'faqs', '<p><img style=\"width: 279px;\" data-filename=\"11.jpg\" src=\"/admin/images/cms/faqs/16394979380.png\">Ipsam architecto com.</p>\n', '2021-12-14 16:05:38'),
(4, 'about us', '<p><span style=\'font-family: \"Open Sans\", Arial, sans-serif; font-size: 14px; text-align: justify;\'>It is a long established fact that a <b>reader </b>will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</span><br></p>\n', '2021-12-15 14:50:39');

-- --------------------------------------------------------

--
-- Table structure for table `ad_cms_banners`
--

CREATE TABLE `ad_cms_banners` (
  `banner_id` int(11) NOT NULL,
  `cms_id` int(11) NOT NULL,
  `banner` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_cms_banners`
--

INSERT INTO `ad_cms_banners` (`banner_id`, `cms_id`, `banner`) VALUES
(1, 2, '163949767011.png'),
(2, 3, 'E:\\xampp\\htdocs\\rental-app\\public\\admin/images/cms/faqs\\163949793882.jpg'),
(3, 4, 'admin/images/cms/about us/163957984026.jpg'),
(4, 4, 'admin/images/cms/about us/163957984085.jpg'),
(5, 4, 'admin/images/cms/about us/163957984030.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ad_email_templates`
--

CREATE TABLE `ad_email_templates` (
  `etemp_id` int(11) NOT NULL,
  `etemp_name` varchar(250) NOT NULL,
  `etemp_subject` varchar(500) NOT NULL,
  `etemp_data` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ad_email_templates`
--

INSERT INTO `ad_email_templates` (`etemp_id`, `etemp_name`, `etemp_subject`, `etemp_data`, `updated_at`) VALUES
(1, 'New Registration Email to user', 'New Registration Email to user', '<p>\n	Hi {USERNAME},</p>\n<p>\n	Hello, and welcome to Tailem.com</p>\n<p>\n	To begin, please sign in using your email address and password associated to your account:</p>\n<p>\n	<a href=\"https://www.tailem.com/sign-in\"> https://www.tailem.com/sign-in </a></p>\n<p>\n	For assistance with signing in or if you have any other concerns, please send us a message at info@tailem.com and we will respond as soon as possible.</p>\n<p>\n	Thank you once again for becoming a member of Tailem.com</p>\n<p>\n	Warmest regards,<br>\n	Team at Tailem.com</p>', '2021-12-14 10:16:08'),
(2, 'Forget Password Email to user', 'Password Recovery from Tailem.com', '<p>\n	Hi <strong>{USERNAME}</strong>,</p>\n<p>\n	A request has been submitted to recover a lost password from Tailem.com</p>\n<p>\n	To complete the password change, please visit the following link and enter the requested info:</p>\n<p>\n	<strong>{LINK}</strong></p>\n<p>\n	Passwords must be alphanumeric and be at least 6 characters long.</p>\n<p>\n	If you did not specifically request this password change, please disregard this notice.</p>\n<p>\n	If you have any questions or concerns, please send us a message at info@tailem.com and we will respond as soon as possible.</p>\n<p>\n	&nbsp;</p>\n<p>\n	Warmest regards,<br />\n	Team at Tailem.com</p>\n<p>\n	&nbsp;</p>', '2021-12-14 10:16:08'),
(3, 'Review post alert email to admin', 'New Review Post', 'New Review Post', '2021-12-14 10:16:08'),
(4, 'Review approval email to the user', 'Review approval', 'Review approval', '2021-12-14 10:16:08'),
(5, 'Report Comment Admin Mail Alert', 'Report Comment ', 'Report Comment', '2021-12-14 10:16:08'),
(6, 'Contact US Admin Email Alert', 'Contact US', '<p>\n	Hi {ADMIN},</p>\n<p>\n	{USER} has sent you a message from Tailem.com. Below is the details.</p>\n<p>\n	Email: {EMAIL}</p>\n<p>\n	{MESSAGE}</p>\n<p>\n	&nbsp;</p>', '2021-12-14 10:16:08'),
(7, 'Account Block email To User', 'Account Block email', '<p>\n	Hi {USERNAME},</p>\n<p>\n	Your Account at Tailem.com is blocked.&nbsp;</p>\n<p>\n	{MESSAGE}</p>\n<p>\n	Password: {PASSWORD}</p>\n<p>\n	Best Regards,</p>\n<p>\n	&nbsp;</p>\n<p>\n	reviewsite.com Team</p>', '2021-12-14 10:16:08'),
(9, 'Olivia Carter', 'Olivia Carter', '<a href=\"http://test\" target=\"_blank\">Distinctio. Excep</a>tur.', '2021-12-15 09:46:49'),
(10, 'Scott Meadows', 'Scott Meadows', '<h3><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Email Test Title</span></h3><p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><b><u>There are</u></b> many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem <a href=\"http://link\" target=\"_blank\">Ipsum generators on the Internet </a>tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.</span></p>', '2021-12-15 09:49:36');

-- --------------------------------------------------------

--
-- Table structure for table `ad_reviews`
--

CREATE TABLE `ad_reviews` (
  `review_id` int(11) NOT NULL,
  `review_user_id` int(11) NOT NULL,
  `review_description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_reviews`
--

INSERT INTO `ad_reviews` (`review_id`, `review_user_id`, `review_description`, `created_at`) VALUES
(1, 2, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially changed', '2021-12-15 06:49:16');

-- --------------------------------------------------------

--
-- Table structure for table `ad_users`
--

CREATE TABLE `ad_users` (
  `user_id` int(11) NOT NULL,
  `email` text NOT NULL,
  `user_type` enum('Host','Guest') NOT NULL,
  `profile` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad_users`
--

INSERT INTO `ad_users` (`user_id`, `email`, `user_type`, `profile`, `created_at`) VALUES
(1, 'userone@gmail.com', 'Host', '', '2021-12-10 10:09:50'),
(2, 'usertwo@gmail.com', 'Host', '', '2021-12-10 10:09:50'),
(3, 'userthree@gmail.com', 'Guest', '', '2021-12-10 10:09:50'),
(4, 'admin@test.com', 'Host', '', '2021-12-10 11:05:53'),
(5, 'admin@test1.com', 'Host', '', '2021-12-10 11:16:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad_admin`
--
ALTER TABLE `ad_admin`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `ad_categories`
--
ALTER TABLE `ad_categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ad_cms`
--
ALTER TABLE `ad_cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `ad_cms_banners`
--
ALTER TABLE `ad_cms_banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `ad_email_templates`
--
ALTER TABLE `ad_email_templates`
  ADD PRIMARY KEY (`etemp_id`);

--
-- Indexes for table `ad_reviews`
--
ALTER TABLE `ad_reviews`
  ADD PRIMARY KEY (`review_id`);

--
-- Indexes for table `ad_users`
--
ALTER TABLE `ad_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ad_admin`
--
ALTER TABLE `ad_admin`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ad_categories`
--
ALTER TABLE `ad_categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ad_cms`
--
ALTER TABLE `ad_cms`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `ad_cms_banners`
--
ALTER TABLE `ad_cms_banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ad_email_templates`
--
ALTER TABLE `ad_email_templates`
  MODIFY `etemp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ad_reviews`
--
ALTER TABLE `ad_reviews`
  MODIFY `review_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ad_users`
--
ALTER TABLE `ad_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
