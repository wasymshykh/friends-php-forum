-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2020 at 10:54 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


-- Database: `forum`
--
CREATE DATABASE IF NOT EXISTS `forum` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `forum`;


-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(535) DEFAULT NULL,
  `created_on` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `created_on`) VALUES
(1, 'Residence', 'any description', '2017-09-22 14:25:08'),
(2, 'Mess', 'description about the category', '2017-09-22 14:26:22');

-- --------------------------------------------------------

--
-- Table structure for table `login_log`
--

CREATE TABLE `login_log` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_ip` varchar(255) NOT NULL,
  `login_date` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_log`
--

INSERT INTO `login_log` (`id`, `user_id`, `user_ip`, `login_date`) VALUES
(1, 1, '::1', '2017-09-17 16:19:35'),
(2, 1, '::1', '2017-09-17 16:29:29'),
(3, 1, '::1', '2017-09-17 16:32:51'),
(4, 1, '::1', '2017-09-17 16:33:20'),
(5, 1, '::1', '2017-09-22 16:16:06'),
(6, 1, '::1', '2017-09-22 19:58:45'),
(7, 1, '::1', '2017-09-22 20:00:12'),
(8, 1, '::1', '2017-09-22 20:00:29'),
(9, 1, '::1', '2017-09-24 19:54:09'),
(10, 1, '::1', '2017-09-24 21:29:11'),
(11, 1, '::1', '2017-09-25 04:55:20'),
(12, 1, '::1', '2017-09-25 05:07:54'),
(13, 1, '::1', '2017-09-25 08:16:59'),
(14, 1, '::1', '2017-10-08 06:56:33'),
(15, 1, '::1', '2017-10-12 06:02:06'),
(16, 1, '::1', '2017-10-14 08:28:28'),
(17, 1, '::1', '2017-10-14 08:39:09'),
(18, 1, '::1', '2017-10-16 19:41:14'),
(19, 3, '::1', '2017-10-16 20:10:04'),
(20, 1, '::1', '2017-10-16 21:23:28'),
(21, 3, '::1', '2017-10-16 21:23:45'),
(22, 1, '::1', '2017-10-20 13:21:29'),
(23, 3, '127.0.0.1', '2017-10-22 08:49:50'),
(24, 1, '::1', '2017-10-22 08:54:28'),
(25, 1, '::1', '2017-10-22 08:56:08'),
(26, 1, '::1', '2017-11-06 12:49:03'),
(27, 3, '::1', '2017-11-06 12:50:33'),
(28, 3, '::1', '2017-11-06 12:57:30'),
(29, 1, '::1', '2017-11-06 13:44:11'),
(30, 1, '::1', '2017-11-06 13:44:37'),
(31, 3, '::1', '2017-11-06 13:44:50'),
(32, 1, '::1', '2017-11-07 02:31:11'),
(33, 3, '::1', '2017-11-07 02:32:00'),
(34, 3, '::1', '2017-11-07 21:31:50'),
(35, 3, '::1', '2017-11-07 22:21:59'),
(36, 1, '::1', '2017-11-07 22:31:52'),
(37, 3, '::1', '2017-11-08 02:28:51'),
(38, 3, '::1', '2017-11-08 02:40:46'),
(39, 1, '127.0.0.1', '2019-06-13 20:18:20'),
(40, 1, '127.0.0.1', '2019-06-13 20:18:58'),
(41, 3, '127.0.0.1', '2019-06-13 20:19:55'),
(42, 3, '::1', '2019-06-17 00:30:43');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `thread_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `created_on` timestamp NOT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `is_reported` int(11) DEFAULT '0',
  `is_deleted` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `user_id`, `thread_id`, `topic_id`, `content`, `created_on`, `updated_on`, `is_reported`, `is_deleted`) VALUES
(1, 2, 1, 1, 'Hellosdfsdf sfsdf&lt;br&gt;', '2017-09-22 17:19:01', '2017-11-07 23:12:45', 0, 0),
(2, 1, 1, 1, 'I&#039;m replying to yuo :)', '2017-09-22 18:53:48', NULL, 0, 0),
(3, 3, 1, 1, 'Woahhhh!', '2017-09-22 19:14:07', NULL, 0, 0),
(4, 1, 4, 1, 'Lool', '2017-09-22 19:27:38', NULL, 0, 0),
(5, 1, 4, 1, 'testing', '2017-09-24 19:54:18', NULL, 0, 0),
(6, 3, 4, 1, 'Hold', '2017-09-24 19:54:27', NULL, 0, 0),
(7, 1, 3, 1, 'yfgdfg', '2017-09-24 19:59:15', NULL, 0, 0),
(8, 1, 8, 1, 'gdfgdfg dhd sfddsf&lt;br&gt;', '2017-09-24 21:19:33', '2017-11-07 23:08:55', 0, 0),
(9, 1, 1, 1, 'jjjjj', '2017-09-25 05:00:48', NULL, 0, 0),
(10, 1, 5, 2, 'Hello', '2017-10-08 06:57:16', NULL, 0, 0),
(11, 3, 8, 1, 'Good to see you', '2017-10-16 20:10:41', NULL, 0, 0),
(12, 1, 8, 1, 'Yes, you&#039;re right', '2017-10-16 20:13:23', NULL, 0, 0),
(13, 3, 8, 1, 'I&#039;m always right', '2017-10-16 20:13:42', NULL, 0, 0),
(14, 3, 8, 1, 'Yo!', '2017-10-16 20:19:10', NULL, 0, 0),
(15, 1, 11, 3, 'klsjkfjkafs solutiom', '2017-10-20 13:22:31', NULL, 0, 0),
(16, 3, 1, 1, 'Helodfgdg', '2017-11-07 23:10:15', '2017-11-07 23:14:52', 0, 1),
(17, 3, 1, 1, 'Hello', '2017-11-07 23:40:17', NULL, 0, 1),
(18, 3, 1, 1, 'AAA', '2017-11-07 23:40:25', NULL, 0, 1),
(19, 3, 1, 1, 'sdf', '2019-06-17 00:33:33', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` int(11) NOT NULL,
  `reply_id` int(11) DEFAULT NULL,
  `thread_id` int(11) DEFAULT NULL,
  `reason` varchar(535) NOT NULL,
  `reported_by` int(11) NOT NULL,
  `reported_on` timestamp NOT NULL,
  `noticed` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reset_request`
--

CREATE TABLE `reset_request` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `is_used` int(11) NOT NULL DEFAULT '0',
  `request_date` timestamp NOT NULL,
  `used_on` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reset_request`
--

INSERT INTO `reset_request` (`id`, `email`, `code`, `is_used`, `request_date`, `used_on`) VALUES
(1, 'zabuy@vipepe.com', 'f0e25f94672522d4124d880ca565704f', 2, '2017-09-17 13:52:59', NULL),
(2, 'zabuy@vipepe.com', '4a37fe7d8f1b168b27b08fdc655b526e', 2, '2017-09-17 14:08:08', '2017-09-17 16:01:50'),
(3, 'zabuy@vipepe.com', '54bf3470fc6fba4be0203b4aef99c662', 2, '2017-09-17 16:13:11', '2017-09-17 16:13:32'),
(4, 'zabuy@vipepe.com', '7465bbd1a12e501a5e881cb1a9b02d55', 1, '2017-09-22 19:48:25', '2017-09-22 19:53:15'),
(5, 'endme007@gmail.com', 'bfde2354d5b4bc2cb684628153eb8eac', 0, '2017-11-08 02:40:27', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(535) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `value`) VALUES
(1, 'site_url', 'http://localhost/forum'),
(2, 'site_title', 'Friends Discussion Forum'),
(3, 'image_accepted', 'jpeg,jpg,png'),
(4, 'default_usergroup', '4'),
(5, 'default_confirmed', '0');

-- --------------------------------------------------------

--
-- Table structure for table `threads`
--

CREATE TABLE `threads` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `is_deleted` int(11) DEFAULT '0',
  `created_on` timestamp NOT NULL,
  `updated_on` timestamp NULL DEFAULT NULL,
  `last_reply` timestamp NULL DEFAULT NULL,
  `is_reported` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threads`
--

INSERT INTO `threads` (`id`, `topic_id`, `cat_id`, `status`, `title`, `content`, `views`, `user_id`, `is_deleted`, `created_on`, `updated_on`, `last_reply`, `is_reported`) VALUES
(1, 1, 1, 1, 'I have a problem', 'Hello,\r\nPlease slv my problem &lt;img src=&quot;emoticons/sad.png&quot; data-sceditor-emoticon=&quot;:(&quot; alt=&quot;:(&quot; title=&quot;:(&quot;&gt;\r\nI you have to solve it &lt;br&gt;&lt;b&gt;dsf&lt;/b&gt;&lt;br&gt;', 107, 1, 0, '2017-09-22 16:32:33', '2017-11-07 23:12:27', '2019-06-17 00:33:33', 0),
(2, 1, 1, 0, 'the post', '&lt;p&gt;Hei&lt;br&gt;this is the &lt;b&gt;next &lt;/b&gt;post&lt;br&gt;sss&lt;br&gt;&lt;/p&gt;', 1, 1, 0, '2017-09-22 16:39:26', NULL, '2017-09-22 16:39:26', 0),
(3, 1, 1, 2, 'op Hle', '&lt;p&gt;dsfsdfs sdffdfdsfd sfsdfsdf sdfsdfsdf sfsdf sfdf&lt;br&gt;&lt;/p&gt;', 31, 1, 0, '2017-09-22 18:12:00', '2017-11-07 22:50:09', '2017-09-24 19:59:15', 0),
(4, 1, 1, 0, 'Hellos', '&lt;p&gt;sgsgsdgsdg&lt;br&gt;&lt;/p&gt;', 30, 1, 0, '2017-09-22 18:12:10', NULL, '2017-09-24 19:54:27', 0),
(5, 2, 1, 0, 'Hello new suggesstion', '&lt;p&gt;sddsaassdljasdld&lt;/p&gt;&lt;p&gt;sdasdkjsakldjksajkdlasd&lt;/p&gt;&lt;p&gt;sadksdhsdhksdad&lt;/p&gt;&lt;p&gt;sdsdjsdlkasjdlasdada addssdaasdasdasd&lt;br&gt;&lt;/p&gt;', 17, 1, 1, '2017-09-24 20:09:49', NULL, '2017-10-08 06:57:16', 0),
(6, 1, 1, 1, 'testing', 'testst&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 36, 1, 1, '2017-09-24 20:44:28', NULL, '2017-09-24 20:44:28', 0),
(7, 1, 1, 0, 'tss', '&lt;p&gt;sts&lt;br&gt;&lt;/p&gt;', 1, 1, 0, '2017-09-24 20:44:34', NULL, '2017-09-24 20:44:34', 0),
(8, 1, 1, 1, 'op ha', '&lt;p&gt;dsfsdfs sdffdfdsfd sfsdfsdf sdfsdfsdf sfsdf sfdf&lt;br&gt;&lt;/p&gt;', 103, 1, 0, '2017-09-24 20:44:41', '2017-11-07 22:52:28', '2017-10-16 20:19:10', 0),
(9, 3, 2, 0, 'Helo', 'Hsllsllsf Wahat is up?&lt;br&gt;&lt;br&gt;&lt;b&gt;Text is bold&lt;/b&gt;&lt;br&gt;&lt;p&gt;&lt;br&gt;&lt;/p&gt;', 6, 1, 0, '2017-10-16 20:43:29', NULL, '2017-10-16 20:43:29', 0),
(10, 2, 1, 0, 'I&#039;m posting', '&lt;p&gt;This is thre&lt;br&gt;&lt;/p&gt;', 12, 3, 0, '2017-10-16 21:09:46', NULL, '2017-10-16 21:09:46', 0),
(11, 3, 2, 0, 'sfdsdfsdf', '&lt;p&gt;sdfsd&lt;br&gt;&lt;/p&gt;', 5, 1, 0, '2017-10-20 13:22:12', NULL, '2017-10-20 13:22:31', 0),
(12, 1, 1, 0, 'This is new Threa', '&lt;p&gt;ssdfsfsdf sfsdfsfsfd&lt;br&gt;&lt;/p&gt;', 1, 3, 1, '2017-11-07 23:41:46', NULL, '2017-11-07 23:41:46', 0),
(13, 4, 2, 0, 'Any Thead her', '&lt;p&gt;safafsasf&lt;/p&gt;&lt;p&gt;dgdsdsgsdg&lt;br&gt;&lt;/p&gt;', 2, 3, 0, '2017-11-08 01:34:34', NULL, '2017-11-08 01:34:34', 0);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(535) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `created_on` timestamp NOT NULL,
  `updated_on` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`, `icon`, `cat_id`, `created_on`, `updated_on`) VALUES
(1, 'Problems &amp; Complaints', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi tenetur cum ab, natus sapiente hic repellat, dolores vero cupiditate, omnis eligendi sequi beatae amet error. Quas quia deserunt quaerat unde.', '_1506092634.png', 1, '2017-09-22 15:03:53', NULL),
(2, 'Suggestions &amp; Feedbacks', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi tenetur cum ab, natus sapiente hic repellat, dolores vero cupiditate, omnis eligendi sequi beatae amet error. Quas quia deserunt quaerat unde.', '_1506092681.png', 1, '2017-09-22 15:04:41', NULL),
(3, 'Problems &amp; Complaints', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi tenetur cum ab, natus sapiente hic repellat, dolores vero cupiditate, omnis eligendi sequi beatae amet error. Quas quia deserunt quaerat unde.', '_1506092707.png', 2, '2017-09-22 15:05:07', NULL),
(4, 'Suggestions &amp; Feedbacks', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quasi tenetur cum ab, natus sapiente hic repellat, dolores vero cupiditate, omnis eligendi sequi beatae amet error. Quas quia deserunt quaerat unde.', '_1506092730.png', 2, '2017-09-22 15:05:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_groups`
--

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL,
  `group_key` int(11) NOT NULL,
  `group_name` varchar(255) NOT NULL,
  `badge_bg` varchar(255) NOT NULL,
  `badge_text` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_groups`
--

INSERT INTO `user_groups` (`id`, `group_key`, `group_name`, `badge_bg`, `badge_text`) VALUES
(1, 0, 'Civilian', '393a37', 'FFFFFF'),
(2, 1, 'Jawan', '98bc3c', 'FFFFFF'),
(3, 2, 'Moderator', '143d3d', 'FFFFFF'),
(4, 3, 'Administrator', 'b22d2d', 'FFFFFF'),
(6, 5, 'Helo', 'DSF', 'dfsfsfa');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `m_name` varchar(255) DEFAULT NULL,
  `l_name` varchar(255) NOT NULL,
  `cast` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `posting_place` varchar(255) NOT NULL,
  `reg_date` timestamp NOT NULL,
  `reg_ip` varchar(255) NOT NULL,
  `confirmed` varchar(255) NOT NULL,
  `p_number` varchar(255) DEFAULT NULL,
  `m_number` varchar(255) NOT NULL,
  `o_number` varchar(255) DEFAULT NULL,
  `present_add` varchar(535) NOT NULL,
  `permanent_add` varchar(535) NOT NULL,
  `user_group` int(11) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `is_banned` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `f_name`, `m_name`, `l_name`, `cast`, `designation`, `posting_place`, `reg_date`, `reg_ip`, `confirmed`, `p_number`, `m_number`, `o_number`, `present_add`, `permanent_add`, `user_group`, `profile_picture`, `is_banned`) VALUES
(1, 'test', '$2y$10$AVpCIJUiyQKonSRUyWaE6.LQ3TUsDl3/mE3fm5VY6iLTzzyroMGqO', 'azeemtester@gmail.com', 'test', '', 'testing', 'test', 'design', 'karachi', '2017-09-17 12:27:29', '::1', '1', '424545', '0302277545', '', 'My address is here', 'prerminss erre', 0, 'author-img_1505651249.jpg', 0),
(2, 'testing', '$2y$10$xsexElMxSfGCMCwDmOTjzelPR8jivvhb3RVc7nCwzEgk9PVnpDCqu', 'zabuy@vipepe.com', 'testing', 'test', 'errere', 'cat', 'design', 'rererere', '2017-09-17 12:43:32', '::1', '0', '', '030227754500', '454554545', 'My address is here', 'prerminss sadasdsdasdasad', 2, 'logo_1505652213.png', 0),
(3, 'test3', '$2y$10$9fUIU7KdLo0xzJjs6A0EAuPRQfevfAB2.IrprZN7TdP0qTlLekFfO', 'admin@opticaldot.com', 'testing', '', 'errere', 'rerere', 'design', 'rererere', '2017-09-17 13:21:52', '::1', '1', '', '0302277545', '454554545', 'My address is here', 'prerminss erre', 3, 'close-icon_1505654513.png', 0),
(4, 'unique', '$2y$10$9lVEmDd6JD4FYwbgj7GZiOjPhHMasCcgnuo.5HFFA3wYDyhCKyK8i', 'email@gmail.com', 'Hello', 'Middle', 'Last', 'any', 'none', 'no', '2017-09-22 19:55:13', '::1', '0', '012111001', '0302277545', '', 'none', 'none', 4, 'gears_1506110113.png', 0),
(5, 'tesla', '$2y$10$qcpMh6cvoDpi1iVYNGrYPOkyl6IqshMSYePkysyjtJkyFVFNzy5fG', 'endme007@gmail.com', 'Ahmed', 'Ali', 'Aj', 'Nah', 'Accounts', 'Mirpur', '2017-11-08 02:21:55', '::1', '1', '02125552022', '0325420120', '03454120110', 'Addres is not available ag', 'Aggress is not avai sdsf', 4, 'mans(1)_1510107715.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_log`
--
ALTER TABLE `login_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_request`
--
ALTER TABLE `reset_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threads`
--
ALTER TABLE `threads`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_groups`
--
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login_log`
--
ALTER TABLE `login_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reset_request`
--
ALTER TABLE `reset_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `threads`
--
ALTER TABLE `threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_groups`
--
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
