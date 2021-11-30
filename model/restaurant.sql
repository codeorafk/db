-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Nov 29, 2021 at 09:28 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(4, 'Pizza', 'Food_Category_619.jpg', 'Yes', 'No'),
(5, 'Burger', 'Food_Category_344.jpg', 'Yes', 'Yes'),
(6, 'MoMo', 'Food_Category_77.jpg', 'Yes', 'Yes'),
(13, 'Chicken', 'Food_Category_377.jpg', 'Yes', 'No'),
(15, 'Beef steak', 'Food_Category_612.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` text NOT NULL,
  `full_name` text NOT NULL,
  `guess_id` int(10) UNSIGNED DEFAULT NULL,
  `news_id` int(10) UNSIGNED NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `email`, `full_name`, `guess_id`, `news_id`, `comment`) VALUES
(1, 'luu@luu.com', 'another luu', 9, 1, 'bai nay rat hay do xem di moi nguoi'),
(2, 'uy@gmial.co', 'Uy nef', NULL, 1, 'hay lam do xem di moi nguoi\r\nalo alo'),
(3, 'uy@gmial.co', 'Uy nef', NULL, 1, 'hay lam do xem di moi nguoi\r\nalo alo'),
(4, 'Uy', 'Nguyen', 1, 1, 'oke'),
(5, 'test@gmail.com', 'Uy', NULL, 1, 'hello world'),
(6, 'luu@luu.com', 'another luu', 9, 1, 'test comment from login');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_food` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_food` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(5, 'Best chicken', 'Best Firewood Pizza in Town.', '6.00', 'Food-Name-943.jpg', 13, 'No', 'No'),
(6, 'Sadeko Momo', 'Best Spicy Momo for Winter', '6.00', 'Food-Name-7387.jpg', 8, 'Yes', 'Yes'),
(7, 'Mixed Pizza', 'Pizza with chicken, Ham, Buff, Mushroom and Vegetables', '10.00', 'Food-Name-7833.jpg', 4, 'Yes', 'No'),
(9, 'chicken wing', 'ngon, giòn, béo', '12.00', 'Food-Name-830.jpg', 13, 'Yes', 'No'),
(24, 'Chicken', 'ngon', '10.00', 'Food_Name_756.tmp', 13, 'Yes', 'No'),
(25, 'Chicken', 'ngon', '10.00', 'Food_Name_331.tmp', 13, 'Yes', 'No'),
(26, 'Chicken', 'ngon', '10.00', 'Food_Name_28.tmp', 13, 'Yes', 'No'),
(27, 'Chicken', 'ngon', '10.00', 'Food_Name_16.tmp', 13, 'Yes', 'No'),
(28, 'Chicken', 'ngon', '10.00', 'Food_Name_866.tmp', 13, 'Yes', 'No'),
(29, 'Chicken', 'ngon', '10.00', 'Food_Name_76.tmp', 13, 'Yes', 'No'),
(30, 'Chicken', 'ngon', '10.00', 'Food_Name_640.tmp', 13, 'Yes', 'No'),
(31, 'Chicken', 'ngon', '10.00', 'Food_Name_308.tmp', 13, 'Yes', 'No'),
(32, 'Chicken', 'ngon', '10.00', 'Food_Name_415.tmp', 13, 'Yes', 'No'),
(33, 'Chicken', 'ngon', '10.00', 'Food_Name_266.tmp', 13, 'Yes', 'No'),
(34, 'Chicken', 'ngon', '10.00', 'Food_Name_998.tmp', 13, 'Yes', 'No'),
(35, 'Chicken', 'ngon', '10.00', 'Food_Name_988.tmp', 13, 'Yes', 'No'),
(36, 'Chicken', 'ngon', '10.00', 'Food_Name_27.tmp', 13, 'Yes', 'No'),
(37, 'Chicken', 'ngon', '10.00', 'Food_Name_280.tmp', 13, 'Yes', 'No'),
(38, 'Chicken', 'ngon', '10.00', 'Food_Name_928.tmp', 13, 'Yes', 'No'),
(39, 'Chicken', 'ngon', '10.00', 'Food_Name_608.tmp', 13, 'Yes', 'No'),
(40, 'Chicken', 'ngon', '10.00', 'Food_Name_915.tmp', 13, 'Yes', 'No'),
(41, 'Chicken', 'ngon', '10.00', 'Food_Name_850.tmp', 13, 'Yes', 'No'),
(42, 'Chicken', 'ngon', '10.00', 'Food_Name_261.tmp', 13, 'Yes', 'No'),
(43, 'Chicken', 'ngon', '10.00', 'Food_Name_539.tmp', 13, 'Yes', 'No'),
(44, 'Best sell Beef steak', 'ngon như Uy', '1.00', 'default.jpg', 15, 'Yes', 'Yes'),
(45, 'uydeptrai', 'uy la deptrai nhat', '12.00', 'default.jpg', 15, 'Yes', 'Yes'),
(46, 'beef', 'beo ngon', '12.00', 'Food_Name_959.tmp', 15, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food_in_order`
--

CREATE TABLE `tbl_food_in_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `quantity` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_food_in_order`
--

INSERT INTO `tbl_food_in_order` (`id`, `food_id`, `order_id`, `quantity`) VALUES
(1, 5, 8, 2),
(2, 7, 8, 2),
(3, 4, 8, 2),
(4, 3, 8, 1),
(5, 5, 9, 2),
(6, 7, 9, 2),
(7, 4, 9, 2),
(8, 3, 9, 1),
(9, 5, 10, 3),
(10, 7, 10, 3),
(11, 4, 10, 2),
(12, 3, 10, 1),
(13, 5, 11, 1),
(14, 5, 12, 1),
(15, 3, 12, 1),
(16, 4, 12, 1),
(17, 7, 12, 1),
(18, 6, 12, 1),
(19, 5, 13, 1),
(20, 3, 13, 2),
(21, 4, 13, 1),
(22, 7, 13, 1),
(23, 6, 13, 1),
(24, 5, 14, 1),
(25, 3, 14, 3),
(26, 4, 14, 2),
(27, 7, 14, 2),
(28, 6, 14, 1),
(29, 3, 15, 2),
(30, 6, 15, 1),
(31, 7, 15, 1),
(32, 4, 15, 1),
(33, 3, 16, 2),
(34, 6, 16, 1),
(35, 7, 16, 1),
(36, 4, 16, 1),
(37, 3, 17, 2),
(38, 6, 17, 1),
(39, 7, 17, 1),
(40, 4, 17, 1),
(41, 3, 18, 2),
(42, 6, 18, 1),
(43, 7, 18, 1),
(44, 4, 18, 1),
(45, 6, 19, 1),
(46, 3, 19, 1),
(47, 6, 20, 1),
(48, 3, 20, 1),
(49, 7, 21, 1),
(50, 6, 22, 1),
(51, 7, 22, 1),
(52, 24, 22, 1),
(53, 9, 22, 1),
(54, 9, 23, 3),
(55, 24, 23, 3),
(56, 6, 24, 1),
(57, 9, 24, 1),
(58, 6, 25, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_guess`
--

CREATE TABLE `tbl_guess` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `email` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `username` varchar(150) CHARACTER SET armscii8 NOT NULL,
  `address` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `password` varchar(255) CHARACTER SET armscii8 NOT NULL,
  `phone` varchar(20) CHARACTER SET armscii8 NOT NULL,
  `status` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_guess`
--

INSERT INTO `tbl_guess` (`id`, `full_name`, `email`, `username`, `address`, `password`, `phone`, `status`) VALUES
(1, 'Nguyen', 'Uy', 'uy', 'Uowy', '21232f297a57a5a743894a0e4a801fc3', '0708035130', 'Sleeping'),
(2, 'Luan', 'luan@bk.co', 'luan', 'Luan\'s address', 'dd960d42bb47da21af3b3b0c31684540', '0708050102', 'Sleeping'),
(3, 'Luu', 'luu@bk.co', 'luu', 'luwu @ uwu ', 'b082b04c7a891a7f67d2400c2688fa06', '0123456789', 'Sleeping'),
(4, 'Khoa', 'khoa@bk.co', 'khoa', 'khoa khooa khhoa kkhoa khoaa', 'e8ed38edd226e6d0bb0f65e07d8f3f55', '0123452785', 'Sleeping'),
(7, 'Another Uy', 'uy@gma.com', 'uy1', '06 Quang Trung P Binh Dinh', '28a91aaba26255e090f348abc10f0890', '0123456789', 'Sleeping');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `description` longtext NOT NULL,
  `title` text NOT NULL,
  `image_name` text NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`id`, `description`, `title`, `image_name`, `status`) VALUES
(1, 'Some things in this world are largely disappointing, i.e. the supermarket being sold out of special-edition sweets, ice cream falling on the ground, spaghetti sauce on a white shirt. And Im sorry to trigger that disappointment once again. Get this: Taco Bell, the iconic fast food haven, is CLOSED on Thanksgiving Day. That means if you want to eat delicious tacos and nachos on Thanksgiving, you will have to make them yourself. Yeah, that is a scary thought. Seriously though, we’ll need a minute to gather ourselves. After all, Taco Bell has been there for us through thick and thin, drunk eats and nacho cravings galore. And now, burritos and tacos are deserting us in our moment of need. Because let’s face it: We’ll inevitably overcook the Thanksgiving turkey. Sigh. But everyone deserves a day off, especially the angels who craft Doritos Locos Tacos. Tears aside, not all hope should be lost. While the chain is traditionally closed for Thanksgiving (double check with your local store to see if its hours are different—it is also a good idea to check in re: their most up-to-date COVID-19 safety protocols), the restaurant will open its doors once again starting on Black Friday. You know where to find us on November 26 (...at the Taco Bell drive-thru in case that was not clear)', 'Taco Bell For Thanksgiving Is A Major Mood-But Is It Open?', 'news1.jpg', 'Active'),
(2, 'You know what happens to the best-laid plans, right? They go awry. Meaning that Thanksgiving shopping list you triple-checked actually had something missing—and you probably will not notice it until the morning of the holiday. Luckily, a whole slew of supermarket chains have bet on the fact that you will do just that, and they are keeping their doors open for last-minute purchases. Hours are subject to change regionally, especially given the ongoing COVID-19 pandemic, so be sure to call your closest location before running out. Here is a general guide to the grocery stores you can count on come Thanksgiving day—and the ones that will not be open, including some that are closing down for the holiday for the first time in years. P.S. Not up for cooking this year? These fast food joints will stay open on Thanksgiving, and you can sit down for a meal at these restaurants on Turkey Day, too.', 'All The Grocery Stores Open On Thanksgiving Day, Because You Know You are Going To Forget Something', 'new2.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, '18.00', '2020-11-30 03:49:48', 'Completed', 'Bradley Farrell', '+1 (576) 504-4657', 'zuhafiq@mailinator.com', 'Duis aliqua Qui lor'),
(2, '16.00', '2020-11-30 03:52:43', 'Completed', 'Kelly Dillard', '+1 (908) 914-3106', 'fexekihor@mailinator.com', 'Incidunt ipsum ad d'),
(3, '20.00', '2020-11-30 04:07:17', 'Completed', 'Jana Bush', '+1 (562) 101-2028', 'tydujy@mailinator.com', 'Minima iure ducimus'),
(4, '0.00', '0000-00-00 00:00:00', 'Completed', 'Uy', '0708035130', 'uy.nguyen.this@hcmut.edu.vn', '06 Quang Trung'),
(5, '0.00', '0000-00-00 00:00:00', 'Completed', 'Uy', '0708035130', 'uy.nguyen.this@hcmut.edu.vn', '06 Quang Trung'),
(6, '0.00', '2021-11-28 10:25:42', 'Completed', 'Uy', '0708035130', 'uy.nguyen.this@hcmut.edu.vn', '06 Quang Trung'),
(7, '0.00', '2021-11-28 10:43:15', 'Completed', 'Uy', '0708035130', 'uy.nguyen.this@hcmut.edu.vn', '06 Quang Trung'),
(8, '45.00', '2021-11-28 10:48:27', 'Completed', 'Uy', '0708035130', 'uy.nguyen.this@hcmut.edu.vn', '06 Quang Trung'),
(9, '45.00', '2021-11-28 10:50:51', 'Completed', 'Uy', '0708035130', 'uy.nguyen.this@hcmut.edu.vn', '06 Quang Trung'),
(10, '61.00', '2021-11-28 01:47:49', 'Completed', 'Nguyen Tran Quoc Uy', '0708035130', 'uy@g.c', 'okeoke'),
(11, '6.00', '2021-11-28 01:50:14', 'Completed', 'Uy', '0777', 'fdf@dfadsf.daf', 'fadsfasdfasdf'),
(12, '31.00', '2021-11-28 01:55:57', 'Completed', 'aa', '222', 'afa@fad.com', '123546'),
(13, '36.00', '2021-11-28 01:59:52', 'Completed', 'dfasdf', '0123', 'adfadf@gmil.co', 'fadsfadf'),
(14, '55.00', '2021-11-28 02:03:08', 'Completed', 'adfda', '021', 'dfadsf@dfad.c', 'fadfadsf'),
(15, '30.00', '2021-11-28 02:04:26', 'Completed', 'dfadsfasd', '1321231', 'fdafad@fadf.fadf', 'fadfadsf'),
(16, '30.00', '2021-11-28 02:06:16', 'Completed', 'dfadsfasd', '1321231', 'fdafad@fadf.fadf', 'fadfadsf'),
(17, '30.00', '2021-11-28 02:14:31', 'Completed', 'dfadsfasd', '1321231', 'fdafad@fadf.fadf', 'fadfadsf'),
(18, '30.00', '2021-11-28 02:17:16', 'Completed', 'fad', '123', 'fd@dfasf.com', 'fadsfasdfasd'),
(19, '11.00', '2021-11-28 02:18:00', 'Completed', 'fdfads', '012321312', 'dfadsfasdf@gmai.com', 'sdfadsfasd'),
(20, '11.00', '2021-11-28 02:18:34', 'Completed', 'dfadsf', '012', 'fads@ggf.com', 'dfasdfasd'),
(21, '10.00', '2021-11-28 07:51:11', 'Completed', 'Nguyen', '0708035130', 'Uy@gm.c', 'Uowy'),
(22, '38.00', '2021-11-28 10:45:21', 'Completed', 'another luu', '0123456789', 'luu@luu.com', '06 Quang Trung P Binh Dinh'),
(23, '66.00', '2021-11-29 05:12:15', 'Completed', 'another luu', '0123456789', 'luu@luu.com', '06 Quang Trung P Binh Dinh'),
(24, '18.00', '2021-11-29 08:23:02', 'Completed', 'Nguyen', '0708035130', 'Uy@gmial.com', 'Uowy'),
(25, '12.00', '2021-11-29 09:06:12', 'Completed', 'another luu', '0123456789', 'luu@luu.com', '06 Quang Trung P Binh Dinh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food_in_order`
--
ALTER TABLE `tbl_food_in_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_guess`
--
ALTER TABLE `tbl_guess`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_food_in_order`
--
ALTER TABLE `tbl_food_in_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `tbl_guess`
--
ALTER TABLE `tbl_guess`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
