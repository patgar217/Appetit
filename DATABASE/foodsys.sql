-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 05:18 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`categoryid` int(11) NOT NULL,
  `catname` varchar(30) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryid`, `catname`) VALUES
(4, 'BREAKFAST'),
(5, 'LUNCH'),
(6, 'DINNER'),
(7, 'BEVERAGES');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
`productid` int(11) NOT NULL,
  `categoryid` int(1) NOT NULL,
  `productname` varchar(50) NOT NULL,
  `productdes` varchar(200) NOT NULL,
  `price` double NOT NULL,
  `photo` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productid`, `categoryid`, `productname`, `productdes`,`price`, `photo`) VALUES
(14, 4, 'Pancake Tacos with Cheese & Bacon', 'Can’t decide whether to have fluffy pancakes or bacon and eggs? Introducing pancake tacos with bacon and eggs—aka “pacos.” ',400, 'upload/pancake-breakfast-tacos.jpg'),
(15, 4, 'Egg Baked In Tomatoes','Tired of your boring breakfast omelet? It’s time to consider this tomato recipe for eggs baked in tomatoes. ', 310, 'upload/eggs-in-tomatoes.jpeg'),
(16, 5, 'Beef & Broccoli Stir-Fry','Want to satisfy your Chinese food cravings? Order our classic dish of beef sauteed with fresh broccoli florets and coated in a savory sauce. ', 360, 'upload/brocolli-beef.jpg'),
(17, 5, 'Spaghetti','Feeling Italian today? The satisfaction brought from eating a spaghetti might be the best answer yet.', 400, 'upload/spaghetti.png'),
(18, 7, 'Mojito', 'Need a little bit of alcohol? Perfumed bergamot zest and juice are combined with rum, mint, lime and sugar to make a twist on the standard Mojito.',200, 'upload/mojito.jpg'),
(19, 7, 'Sex On The Beach','Missing the summer vibe? Sex on the Beach is the perfect drink for you. Its light Vodka based cocktail that makes you more relaxed and refreshed.', 250, 'upload/sex-on-the-beach.jpg'),
(20, 6, 'Slow Cooker Orange Chicken', 'Do you love oranges and chicken? Orange chicken is one of those dishes that is universally loved, there’s just something about that breaded chicken coated in orange sauce! ',450, 'upload/slow-cooker-chicken.jpg'),
(21, 4, 'Eggs in a Basket', 'Tired of your basic eggs and toasts? The crispy toasted bread with a gooey egg center always hits the spot for anyone in the morning.',375, 'upload/egg-in-a-hole.jpg'),
(22, 4, 'Full English Breakfast','Want to feel like royal? Have a taste of the full English Breakfast that traces back to old British breakfast traditions. ', 600, 'upload/full-english-breakfast.jpg'),
(23, 7, 'Coca-Cola', 'A classic drink? Coca-cola is the classic drink that is for everybody for any occasion. ',80, 'upload/coca-cola.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `purchase`
--

CREATE TABLE IF NOT EXISTS `purchase` (
  `purchaseid` int(11) NOT NULL,
  `customer` varchar(50) NOT NULL,
  `orderType` varchar(10) NOT NULL,
  `payment` varchar(20) NOT NULL,
  `total` double NOT NULL,
  `date_purchase` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase`
--

INSERT INTO `purchase` (`purchaseid`, `customer`, `orderType`,`payment`,`total`, `date_purchase`) VALUES
(8, 'Neovic', 'Dine-In', 'Cash', 1820, '2017-12-06 15:29:00'),
(9, 'demo',  'Take-Out', 'Credit Card', 930, '2018-10-09 20:19:43');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_detail`
--

CREATE TABLE IF NOT EXISTS `purchase_detail` (
`pdid` int(11) NOT NULL,
  `purchaseid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_detail`
--

INSERT INTO `purchase_detail` (`pdid`, `purchaseid`, `productid`, `quantity`) VALUES
(13, 8, 15, 2),
(14, 8, 17, 2),
(15, 8, 18, 2),
(16, 9, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
`adminid`varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `age` int(2) NOT NULL,
  `contact` bigint(12) NOT NULL,
  `hiredate` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminid`, `password`,`fname`,`lname`,`age`,`contact`,`hiredate`) VALUES
('admin', 'admin123','Patricia Marie','Garcia','21','09166367590','2017-12-06 15:29:00');

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`categoryid`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`productid`);

--
-- Indexes for table `purchase`
--
ALTER TABLE `purchase`
 ADD PRIMARY KEY (`purchaseid`);

--
-- Indexes for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
 ADD PRIMARY KEY (`pdid`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`adminid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `purchase`
--
ALTER TABLE `purchase`
MODIFY `purchaseid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `purchase_detail`
--
ALTER TABLE `purchase_detail`
MODIFY `pdid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
