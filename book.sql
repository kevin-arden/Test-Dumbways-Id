-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 04:37 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `book`
--

-- --------------------------------------------------------

--
-- Table structure for table `book_tb`
--

CREATE TABLE `book_tb` (
  `id` int(6) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `category_id` int(6) DEFAULT NULL,
  `writer_id` int(6) DEFAULT NULL,
  `publication_year` year(4) DEFAULT NULL,
  `img` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `book_tb`
--

INSERT INTO `book_tb` (`id`, `name`, `category_id`, `writer_id`, `publication_year`, `img`) VALUES
(300001, 'Jubilee', 100002, 200001, 2019, '9781524761738.jpg'),
(300002, 'John Adams', 100003, 200002, 2001, '2203._SY475_.jpg'),
(300003, 'Solutions and Other Problems', 100004, 200003, 2020, '51323365.jpg'),
(300004, 'An Extraordinary Union', 100005, 200004, 2017, '30237404._SY475_.jpg'),
(300005, ' How to Win Friends and Influe', 100006, 200005, 1998, '4865._SY475_.jpg'),
(300006, 'Becoming', 100001, 200006, 2018, '38746485.jpg'),
(300007, '1984', 100007, 200007, 1961, '41aM4xOZxaL._SX277_BO1,204,203,200_.jpg'),
(300008, 'IT', 100008, 200008, 1980, 'it.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `category_tb`
--

CREATE TABLE `category_tb` (
  `id` int(6) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tb`
--

INSERT INTO `category_tb` (`id`, `name`) VALUES
(100001, 'Autobiography'),
(100002, 'Cookbook'),
(100003, 'History'),
(100004, 'Graphic novel'),
(100005, 'Romance'),
(100006, 'Self help'),
(100007, 'Humor'),
(100008, 'Horror');

-- --------------------------------------------------------

--
-- Table structure for table `writer_tb`
--

CREATE TABLE `writer_tb` (
  `id` int(6) NOT NULL,
  `name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `writer_tb`
--

INSERT INTO `writer_tb` (`id`, `name`) VALUES
(200001, 'Toni Tipton-Martin'),
(200002, 'David McCullough'),
(200003, 'Allie Brosh'),
(200004, 'Alyssa Cole'),
(200005, 'Dale Carnegie'),
(200006, 'Michelle Obama'),
(200007, 'George Orwell'),
(200008, 'Stephen King');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `writer_id` (`writer_id`);

--
-- Indexes for table `category_tb`
--
ALTER TABLE `category_tb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `writer_tb`
--
ALTER TABLE `writer_tb`
  ADD PRIMARY KEY (`id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_tb`
--
ALTER TABLE `book_tb`
  ADD CONSTRAINT `book_tb_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_tb` (`id`),
  ADD CONSTRAINT `book_tb_ibfk_2` FOREIGN KEY (`writer_id`) REFERENCES `writer_tb` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
