-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 19, 2022 at 03:31 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batch-2-cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Bootstrap'),
(2, 'Javascript'),
(3, 'Php 2 is working'),
(6, 'React'),
(24, 'CATEGORY CHANGED'),
(25, 'Elit expedita beata');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_status` varchar(100) DEFAULT NULL,
  `comment_content` text,
  `comment_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `post_id`, `user_id`, `comment_status`, `comment_content`, `comment_date`) VALUES
(2, 3, 20, 'approved', 'this is awesome', '2021-12-22'),
(3, 5, 20, 'approved', 'this is awesome', '2021-12-22'),
(7, 5, 20, 'approved', 'this is awesome', '2021-12-22'),
(11, 1, 20, 'approved', 'this is awesome', '2021-12-22'),
(12, 1, 20, 'approved', 'this is awesome', '2021-12-22'),
(13, 1, 20, 'approved', 'this is awesome', '2021-12-22'),
(14, 1, 20, 'approved', 'wow this is soo funny', '2022-01-01'),
(15, 1, 20, 'approved', 'second comment', '2022-01-01'),
(16, 1, 20, 'approved', 'second comment', '2022-01-01'),
(17, 1, 20, 'unapproved', 'Second COmment', '2022-01-01'),
(18, 1, 20, 'approved', 'ASDASD', '2022-01-01'),
(19, 1, 20, 'approved', 'happy new year', '2022-01-02'),
(20, 1, 20, 'approved', 'what a funny joke ?', '2022-01-02'),
(21, 18, 20, 'approved', 'ASDASD', '2022-01-02');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_category_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text,
  `post_content` text NOT NULL,
  `post_tags` text,
  `post_comment_count` int(11) DEFAULT NULL,
  `post_status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`) VALUES
(1, 55, 'What is Laravel', 'muzammil', '2021-11-03', '/uploads/posts/image-1.png', 'Laravel is a php framework', 'php', 0, 'publish'),
(3, 2, 'What is Laravel', 'muzammil', '2021-11-03', '/uploads/posts/image-1.png', 'Laravel is a php framework', 'php', 0, 'publish'),
(5, 2, 'What is Laravel', 'muzammil', '2021-11-03', '/uploads/posts/image-1.png', 'Laravel is a php framework', 'php', 0, 'publish'),
(7, 0, '22-Jun-2001', '13-Jun-1986', '2008-10-07', '', 'Tempora Nam est dict', '23-May-2011', NULL, 'draft'),
(8, 3, 'TITLE', 'Changed Author', '2000-03-12', '/uploads/posts/14348b9d-cce7-491d-9d64-1284d0a52f32.jpg', 'Post Content', 'php', NULL, 'draft'),
(9, 1, '15-Nov-1982', '09-Jan-1988', '1983-07-03', '', 'Provident aliqua E', '19-Mar-1978', 0, 'draft'),
(10, 3, '02-Sep-2011', '04-May-2002', '1971-09-04', 'image_5.jpg', 'Non doloribus ut et ', '08-Jul-1974', 0, 'draft'),
(11, 1, '22-Aug-2006', '04-Apr-1985', '2021-10-22', 'image_5.jpg', 'Velit duis laborios', '09-Oct-1988', 0, 'draft'),
(13, 6, '13-Oct-2004', '23-Aug-2008', '1971-12-15', 'image_5.jpg', 'Quidem officiis nisi', '30-Dec-1986', 0, 'publish'),
(14, 3, '26-Feb-1996', '31-May-1995', '1992-01-24', 'image_5.jpg', 'Quam rerum voluptate', '04-Jul-1981', 0, 'draft'),
(16, 1, '24-Jan-2018', '14-Jun-1977', '1993-06-08', 'mvc-diagram.png', 'Non eiusmod eos del', '01-May-2002', 0, 'publish'),
(17, 2, '03-Jan-2013', '16-Sep-1988', '1998-08-24', '/uploads/posts/photo1.jpg', 'Cumque fugiat nesci', '09-Mar-2020', 0, 'draft'),
(18, 2, '17-Oct-1996', '21-Dec-2002', '1989-02-27', '/uploads/posts/photo1.jpg', 'In sed eos deserunt ', '06-Jun-1975', 0, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `post_user`
--

CREATE TABLE `post_user` (
  `id` int(11) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_user`
--

INSERT INTO `post_user` (`id`, `post_id`, `user_id`) VALUES
(9, 1, 20),
(12, 8, 20),
(13, 5, 20),
(14, 18, 20);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `user_password` varchar(255) DEFAULT NULL,
  `user_firstname` varchar(255) DEFAULT NULL,
  `user_lastname` varchar(255) DEFAULT NULL,
  `user_email` varchar(255) DEFAULT NULL,
  `user_image` text,
  `user_role` varchar(255) DEFAULT NULL,
  `randSalt` varchar(255) DEFAULT '$2y$10$iusesomecrazystrings22',
  `token` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `randSalt`, `token`) VALUES
(19, 'nidazused', '$2y$10$depubdpbByB7QqRKga.Jj.3P8drnhb1rGc24Cmbm0Kxtp4jLjgVC2', 'Olivia', 'Anthony', 'lujizaqo@mailinator.com', 'images/users/f270e664-5df3-4e73-ad9b-ef4737002e3c.jpg', 'subscriber', '$2y$10$iusesomecrazystrings22', NULL),
(20, 'muzammil2', '$2y$10$llhsrIclOrkEWl0/ko1rHuErof7aElLNdeJhLgYN4IyCOFTUQCELS', 'Muzammil', 'Rafay', 'muzammil.rafay@gmail.com', '/uploads/users/f270e664-5df3-4e73-ad9b-ef4737002e3c.jpg', 'admin', '$2y$10$iusesomecrazystrings22', NULL),
(22, 'qiragig', '$2y$10$XYHc/2l/lY4FttAhnlKLze5X1A1ys63lZDdaM.c4HpmvXUwtwEV72', 'tunejof', 'mivafet', 'xulabi@mailinator.com', '/uploads/users/photo1.jpg', 'subscriber', '$2y$10$iusesomecrazystrings22', NULL),
(23, 'Muzammil1', 'admin1231', NULL, NULL, 'muzammil1.rafay@gmail.com', NULL, NULL, '$2y$10$iusesomecrazystrings22', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_user`
--
ALTER TABLE `post_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `post_user`
--
ALTER TABLE `post_user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
