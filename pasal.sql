-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2020 at 01:36 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pasal`
--

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `item_name` varchar(50) NOT NULL,
  `item_category` varchar(100) NOT NULL,
  `item_sub_category` varchar(100) NOT NULL,
  `item_price` int(11) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_image` longblob NOT NULL,
  `old_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `item_name`, `item_category`, `item_sub_category`, `item_price`, `item_quantity`, `item_image`, `old_price`) VALUES
(1, 'Parle-G', 'Food & Snacks', 'Biscuits & Cookies', 20, 500, 0x7061726c65672e6a706567, 0),
(3, 'Oreo(S)', 'Food & Snacks', 'Biscuits & Cookies', 20, 30, 0x6f72656f2e6a666966, 0),
(4, 'Oreo(L)', 'Food & Snacks', 'Biscuits & Cookies', 60, 20, 0x6f72656f4c2e6a7067, 0),
(5, 'Gooday(Butter)', 'Food & Snacks', 'Biscuits & Cookies', 50, 30, 0x676f6f6464617928627574746572292e6a7067, 60),
(6, 'Gooday(Cashew)', 'Food & Snacks', 'Biscuits & Cookies', 50, 49, 0x476f6f6464617928436173686577292e6a7067, 60),
(7, 'Gooday(Nuts Cookies)', 'Food & Snacks', 'Biscuits & Cookies', 50, 50, 0x676f6f64646179284e757473292e6a7067, 60),
(8, 'Gooday(Choco Chip)', 'Food & Snacks', 'Biscuits & Cookies', 80, 50, 0x676f6f646461792843686f636f43686970292e6a7067, 0),
(9, '20-20 Butter Cookies', 'Food & Snacks', 'Biscuits & Cookies', 30, 44, 0x3230202d2032302e6a7067, 0),
(10, 'Digestive', 'Food & Snacks', 'Biscuits & Cookies', 250, 97, 0x6469676573746976652e6a7067, 0),
(11, 'Wai Wai', 'Food & Snacks', 'Noodles, Chips & Pasta', 20, 250, 0x7761697761692e706e67, 0),
(12, 'Wai Wai(Veg)', 'Food & Snacks', 'Noodles, Chips & Pasta', 20, 250, 0x7761692077616920762e6a7067, 0),
(13, 'Preeti', 'Food & Snacks', 'Noodles, Chips & Pasta', 15, 100, 0x7072656574692e6a7067, 0),
(14, 'Rara', 'Food & Snacks', 'Noodles, Chips & Pasta', 20, 100, 0x726172612e77656270, 0),
(15, 'Bonus', 'Food & Snacks', 'Noodles, Chips & Pasta', 15, 50, 0x626f6e75732e6a7067, 0),
(17, 'Haldiram\'s Bhujia', 'Food & Snacks', 'Namkeen', 250, 20, 0x48616c646972616d4268756a69612e6a7067, 0),
(18, 'Lays(Classic)', 'Food & Snacks', 'Noodles, Chips & Pasta', 40, 40, 0x4c61797328436c6173736963292e6a7067, 0),
(19, 'Lays(Magic Masala)', 'Food & Snacks', 'Noodles, Chips & Pasta', 40, 75, 0x4c617973284d61676963204d6173616c61292e6a7067, 0),
(20, 'Lays(Flamin Hot)', 'Food & Snacks', 'Noodles, Chips & Pasta', 40, 80, 0x4c61797328466c616d696e20486f74292e706e67, 0),
(21, 'Lays(Sour Cream & Onion)', 'Food & Snacks', 'Noodles, Chips & Pasta', 40, 80, 0x4c61797328536f757220437265616d2026204f6e696f6e292e6a666966, 0),
(22, 'Lays', 'Food & Snacks', 'Noodles, Chips & Pasta', 40, 80, 0x4c6179732e6a7067, 0),
(23, 'Lays(Barbecue)', 'Food & Snacks', 'Noodles, Chips & Pasta', 40, 40, 0x4c617973284261726265637565292e6a706567, 0),
(24, 'Pringles(Original)', 'Food & Snacks', 'Noodles, Chips & Pasta', 180, 30, 0x5072696e676c6573284f726967696e616c292e6a7067, 0),
(25, 'Pringles(T. BBQ Sauce)', 'Food & Snacks', 'Noodles, Chips & Pasta', 200, 20, 0x5072696e676c657328544558415320424251205361756365292e6a7067, 0),
(26, 'Pringles(Original)(S)', 'Food & Snacks', 'Noodles, Chips & Pasta', 80, 30, 0x5072696e676c6573284f726967696e616c292853292e6a7067, 0),
(27, 'Dark Fatasy Choco Fills', 'Food & Snacks', 'Biscuits & Cookies', 150, 9, 0x53756e66656173744461726b46616e7461737943686f636f46696c6c732e706e67, 160),
(28, 'Sunfeast Pasta', 'Food & Snacks', 'Noodles, Chips & Pasta', 110, 8, 0x53756e666561737450617374612e6a7067, 0),
(29, 'Chicken Sausage', 'Frozen, Canned & Preserved', 'Meat', 280, 10, 0x436869636b656e536175736167652e6a7067, 0),
(30, 'BuffSausage', 'Frozen, Canned & Preserved', 'Meat', 230, 14, 0x42756666536175736167652e6a7067, 0),
(31, 'Frozen Momo(Chicken)', 'Frozen, Canned & Preserved', 'Meat', 120, 20, 0x46726f7a656e4d6f6d6f28436869636b656e292e77656270, 0),
(32, 'AlbacoreWildTuna', 'Frozen, Canned & Preserved', 'Fish', 250, 10, 0x416c6261636f726557696c6454756e612e6a7067, 0),
(33, 'Kukure(Masala Munch)', 'Food & Snacks', 'Namkeen', 40, 28, 0x4b75726b757265284d6173616c614d756e6368292e6a7067, 0),
(34, 'Kukure(Chilli Chatka)', 'Food & Snacks', 'Namkeen', 40, 30, 0x4b756b757265284368696c6c6920436861746b61292e6a706567, 0),
(35, 'Kurmure', 'Food & Snacks', 'Namkeen', 40, 40, 0x4b75726d7572652e6a7067, 0),
(36, 'Kurmure(Chicken)', 'Food & Snacks', 'Namkeen', 40, 40, 0x4b75726d75726528436869636b656e292e6a7067, 0),
(37, 'Diamon(Magic Masala)', 'Food & Snacks', 'Noodles, Chips & Pasta', 50, 10, 0x4469616d6f6e64284d61676963204d6173616c61292e706e67, 0),
(38, 'Diamon(Chulbule)', 'Food & Snacks', 'Noodles, Chips & Pasta', 50, 8, 0x4469616d6f6e284368756c62756c65292e6a706567, 0),
(39, 'Kwiks Cheese Balls', 'Food & Snacks', 'Namkeen', 35, 42, 0x4b77696b73204368656573652042616c6c732e6a7067, 0),
(40, 'Baskins Robins(Cotton Candy)(S)', 'Food & Snacks', 'Cakes & Icecream', 150, 9, 0x4261736b696e73526f6262696e7328436f74746f6e43616e6479292853292e77656270, 0),
(41, 'DDC Fresh Milk', 'Beverages', 'Energy Drinks & Soft Drinks', 50, 40, 0x46726573684d696c6b4444432e6a666966, 0),
(42, 'Toblerone', 'Food & Snacks', 'Chocolates', 180, 3, 0x546f626c65726f6e652e6a7067, 200),
(43, 'Real(Mixed Fruit)', 'Beverages', 'Fruit Juice', 180, 10, 0x5265616c284d69786564204672756974292e706e67, 0),
(44, 'Real(Mango)', 'Beverages', 'Fruit Juice', 150, 10, 0x5265616c284d616e676f292e6a7067, 0),
(45, 'Real(Guava)', 'Beverages', 'Fruit Juice', 150, 10, 0x5265616c284775617661292e6a7067, 0),
(46, 'Real(Litchi)', 'Beverages', 'Fruit Juice', 150, 10, 0x5265616c284c6974636869292e6a706567, 0),
(47, 'Red Bull', 'Beverages', 'Energy Drinks & Soft Drinks', 130, 15, 0x52656442756c6c2e6a7067, 0),
(48, 'Dried Meat(Buff)', 'Frozen, Canned & Preserved', 'Meat', 230, 15, 0x4472696564204d6561742842756666292e6a7067, 0),
(49, 'Tokla Gold Tea', 'Beverages', 'Tea & Coffee', 100, 20, 0x546f6b6c6120476f6c64205465612e6a7067, 0),
(50, 'Chocofun', 'Food & Snacks', 'Chocolates', 10, 388, 0x63686f636f66756e2e676966, 0),
(51, 'Red Label Tea', 'Beverages', 'Tea & Coffee', 230, 22, 0x526564204c6162656c205465612e6a7067, 0),
(52, 'Fanta', 'Beverages', 'Energy Drinks & Soft Drinks', 150, 25, 0x46616e74612e6a706567, 0),
(53, 'CocaCola', 'Beverages', 'Energy Drinks & Soft Drinks', 150, 20, 0x436f6361436f6c612e6a666966, 0),
(54, 'Sprite', 'Beverages', 'Energy Drinks & Soft Drinks', 150, 15, 0x5370726974652e706e67, 0),
(55, 'Pepsi', 'Beverages', 'Energy Drinks & Soft Drinks', 150, 15, 0x50657073692e6a7067, 0),
(56, 'Mountain Dew', 'Beverages', 'Energy Drinks & Soft Drinks', 180, 15, 0x4d6f756e7461696e204465772e706e67, 0),
(57, 'Somersby Apple Cider', 'Beverages', 'Others(Beverages)', 100, 50, 0x536f6d6572736279204170706c652043696465722e706e67, 0),
(58, 'Denver(Soap)', 'Beauty & Hygiene', 'Bath & Handwash', 80, 14, 0x44656e76657220536f61702e77656270, 0),
(59, 'Denver(Perfume)', 'Beauty & Hygiene', 'Fragnances & Deos', 500, 5, 0x44656e7665722050657266756d652e6a7067, 0),
(60, 'Fogg(Bleu Ocean)', 'Beauty & Hygiene', 'Fragnances & Deos', 280, 5, 0x466f676728426c6575204f6365616e292e6a7067, 0),
(61, 'Dettol Soap(Original)', 'Beauty & Hygiene', 'Bath & Handwash', 50, 100, 0x446574746f6c284f726967696e616c292e77656270, 0),
(62, 'Dettol Soap(Cool)', 'Beauty & Hygiene', 'Bath & Handwash', 60, 50, 0x446574746f6c20536f617028436f6f6c292e6a7067, 0),
(63, 'Dettol Soap(Skincare)', 'Beauty & Hygiene', 'Bath & Handwash', 60, 45, 0x446574746f6c20536f617028536b696e63617265292e6a7067, 0),
(64, 'Dettol Handwash(Original)', 'Beauty & Hygiene', 'Bath & Handwash', 150, 14, 0x446574746f6c2048616e6477617368284f726967696e616c292e6a706567, 0),
(65, 'Dettol Handwash(Skincare)', 'Beauty & Hygiene', 'Bath & Handwash', 170, 4, 0x446574746f6c2048616e647761736828536b696e63617265292e6a7067, 0),
(66, 'Dabur toothpaste', 'Beauty & Hygiene', 'Bath & Handwash', 180, 30, 0x446162757220746f6f746870617374652e6a7067, 0),
(67, 'Sensodyne Toothoaste(Fresh Mint)', 'Beauty & Hygiene', 'Bath & Handwash', 250, 20, 0x53656e736f64796e6520546f6f74686f61737465284672657368204d696e74292e6a7067, 0),
(68, 'Sensodyne Toothoaste(Repair & Protect)', 'Beauty & Hygiene', 'Bath & Handwash', 230, 23, 0x53656e736f64796e6520546f6f74686f617374652852657061697220262050726f74656374292e77656270, 0),
(69, 'Colgate Toothpaste', 'Beauty & Hygiene', 'Bath & Handwash', 210, 10, 0x436f6c6761746520546f6f746870617374652e6a7067, 0),
(70, 'Ariel Detergent', 'Cleaning & Household', 'Detergent & Dishwash', 250, 23, 0x417269656c20446574657267656e742e6a7067, 0),
(71, 'Surf Excel', 'Cleaning & Household', 'Detergent & Dishwash', 250, 12, 0x5375726620457863656c20446574657267656e742e6a7067, 0),
(72, 'Lighters', 'Others', 'Others', 10, 23, 0x4c696768746572732e6a666966, 15),
(73, 'Candles', 'Others', 'Others', 5, 250, 0x43616e646c65732e6a7067, 0),
(74, 'Tissue Paper', 'Cleaning & Household', 'Others(Cleaning & Household)', 120, 20, 0x5469737375652050617065722e6a7067, 130),
(75, 'Dish Scrubber', 'Cleaning & Household', 'Mops, Brushes & Scrubs', 10, 50, 0x446973682053637275626265722e6a7067, 20),
(76, 'Dustbins', 'Cleaning & Household', 'Others(Cleaning & Household)', 350, 14, 0x4475737462696e732e706e67, 550),
(77, 'Steel Dustbin(Pedal)', 'Cleaning & Household', 'Others(Cleaning & Household)', 1100, 5, 0x537465656c204475737462696e28506564616c292e77656270, 1200),
(78, 'Fruit Cake', 'Food & Snacks', 'Cakes & Icecream', 25, 13, 0x42726974616e69612043616b652e6a666966, 0),
(79, 'Odonil(Jasmine Fresh)', 'Cleaning & Household', 'Others(Cleaning & Household)', 180, 4, 0x4f646f6e696c284a61736d696e65204672657368292e6a7067, 0),
(80, 'Odonil(Lavender Mist)', 'Cleaning & Household', 'Others(Cleaning & Household)', 180, 8, 0x4f646f6e696c284c6176656e646572204d697374292e6a7067, 0),
(82, 'Nivea Men Moisturizing Face Wash', 'Beauty & Hygiene', 'Bath & Handwash', 95, 7, 0x4e69766561204d656e204d6f6973747572697a696e67204661636520576173682e6a7067, 0),
(83, 'Dabur Amla Hair Oil', 'Beauty & Hygiene', 'Hair Products', 75, 14, 0x446162757220416d6c612048616972204f696c2e6a7067, 0),
(84, 'Mop', 'Cleaning & Household', 'Mops, Brushes & Scrubs', 150, 4, 0x4d6f702e6a7067, 175),
(85, 'Candid Powder', 'Beauty & Hygiene', 'Others(Beauty & Hygiene)', 160, 5, 0x43616e64696420506f776465722e77656270, 0),
(86, 'Navratna Oil', 'Beauty & Hygiene', 'Hair Products', 160, 8, 0x4e61767261746e61204f696c2e6a7067, 0),
(87, 'Bru Coffee', 'Beverages', 'Tea & Coffee', 200, 5, 0x42727520436f666665652e6a7067, 220),
(88, 'Lifebuoy(Total 10)', 'Beauty & Hygiene', 'Bath & Handwash', 50, 60, 0x4c69666562756f7928546f74616c203130292e6a7067, 0),
(89, 'Lifebuoy(Care)', 'Beauty & Hygiene', 'Bath & Handwash', 55, 60, 0x4c69666562756f792843617265292e6a7067, 0),
(90, 'Lifebuoy(Lemon Fresh)', 'Beauty & Hygiene', 'Bath & Handwash', 55, 50, 0x4c69666562756f79284c656d6f6e204672657368292e6a7067, 0),
(91, 'Clinic Plus', 'Beauty & Hygiene', 'Bath & Handwash', 180, 42, 0x436c696e696320506c75732e6a7067, 0),
(92, 'Sunsilk(Black Shine)', 'Beauty & Hygiene', 'Bath & Handwash', 230, 20, 0x53756e73696c6b28426c61636b205368696e65292e6a7067, 0),
(93, 'Head & Shoulders(Classic)', 'Beauty & Hygiene', 'Bath & Handwash', 230, 15, 0x4865616420262053686f756c646572732e6a7067, 0),
(94, 'Head & Shoulders(Menthal Fresh)', 'Beauty & Hygiene', 'Bath & Handwash', 250, 20, 0x4865616420262053686f756c64657273284d656e7468616c204672657368292e6a7067, 0),
(95, 'Nivea Men Styling Cream', 'Beauty & Hygiene', 'Hair Products', 155, 5, 0x4e69766561204d656e205374796c696e6720437265616d2e6a7067, 0),
(96, 'Nivea Creame', 'Beauty & Hygiene', 'Others(Beauty & Hygiene)', 75, 15, 0x4e6976656120437265616d652e6a706567, 0),
(97, 'Navratna Cool Talc(Active Deo)', 'Beauty & Hygiene', 'Others(Beauty & Hygiene)', 150, 3, 0x4e61767261746e6120436f6f6c2054616c63284163746976652044656f292e6a7067, 0),
(98, 'Doritos(Nacho Cheese)', 'Food & Snacks', 'Noodles, Chips & Pasta', 50, 18, 0x446f7269746f734e6163686f4368656573652e706e67, 0),
(101, 'Toilet Paper', 'Cleaning & Household', 'Others(Cleaning & Household)', 60, 99, 0x36303933363363626362353566326563383531623937396666326633383433352e6a7067, 0),
(102, 'Something', 'Others', 'Others', 500, 500, 0x61336534303565663631383833306133643633663663303563343666663266372e706e67, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_info`
--

CREATE TABLE `sales_info` (
  `bill_no` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `delivered` char(1) NOT NULL,
  `transaction_info` text NOT NULL,
  `date_and_time` datetime NOT NULL,
  `date_of_delivery` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_info`
--

INSERT INTO `sales_info` (`bill_no`, `user_id`, `amount`, `delivered`, `transaction_info`, `date_and_time`, `date_of_delivery`) VALUES
(5, 2, 1760, 'N', 'PDF/6edd64f56f60acacc52b9e395b7e875b.pdf', '2019-10-16 01:01:01', '0000-00-00 00:00:00'),
(6, 2, 904, 'Y', 'PDF/9d8c0e794981bec436a0b10dfd515eed.pdf', '2019-10-17 02:02:02', '2019-11-14 08:17:04'),
(7, 2, 1479, 'Y', 'PDF/4cb1ef25a5beeae14dd585375fdf74f6.pdf', '2019-10-17 03:03:03', '2019-11-14 08:17:04'),
(8, 2, 708, 'Y', 'PDF/f43efdec326995d4ad5ae25fee8b0796.pdf', '2019-10-17 01:01:01', '2019-11-14 08:17:04'),
(9, 3, 645, 'N', 'PDF/9a5f0af6de14048a707e5ba51c183478.pdf', '2019-10-19 06:49:30', '0000-00-00 00:00:00'),
(10, 2, 449, 'N', 'PDF/7f0c4394a148995e69ff58b867cc76cc.pdf', '2019-10-23 21:10:32', '0000-00-00 00:00:00'),
(11, 5, 323, 'Y', 'PDF/2208d14363aefdef7607cd3ced0e0815.pdf', '2019-11-06 15:29:59', '2019-11-06 15:35:48'),
(12, 5, 1203, 'N', 'PDF/518faf943cfcfd3e3b166680ef4e55d8.pdf', '2019-11-06 20:40:15', '0000-00-00 00:00:00'),
(13, 5, 495, 'N', 'PDF/3a46d6661ebf89c6232937f20bd9890f.pdf', '2019-11-07 06:44:36', '0000-00-00 00:00:00'),
(14, 6, 1841, 'Y', 'PDF/f809e956d7fffe5b04a1cb05f291f3d6.pdf', '2019-11-07 06:57:44', '2019-11-07 06:58:41'),
(15, 6, 501, 'N', 'PDF/7a4c44b6dfc1c1596fef94e8e0ed6946.pdf', '2019-11-07 07:25:00', '0000-00-00 00:00:00'),
(16, 5, 1645, 'Y', 'PDF/54a452e45eb14e038f9aef97165d631f.pdf', '2019-11-07 07:53:59', '2019-11-07 07:55:08'),
(17, 5, 639, 'Y', 'PDF/c0369a69d299a66ea2a7f708c1d170a9.pdf', '2019-11-07 09:13:38', '2019-11-07 09:17:53'),
(18, 7, 587, 'Y', 'PDF/2b26b6fa36673e1687a98b80282a570a.pdf', '2019-11-08 08:45:48', '2019-11-08 08:47:10'),
(19, 5, 610, 'Y', 'PDF/5a60b37f08d0e50c4b3e998576817aed.pdf', '2019-11-14 09:54:38', '2019-11-14 09:55:31');

-- --------------------------------------------------------

--
-- Table structure for table `user_accounts`
--

CREATE TABLE `user_accounts` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `post` varchar(10) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_accounts`
--

INSERT INTO `user_accounts` (`user_id`, `username`, `password`, `firstname`, `lastname`, `post`, `note`, `email`, `contact_no`, `address`) VALUES
(4, 'admin', '$2y$10$dFxiieji3rHmMsi6eOmo5uacaifh.22oGpEn.8txs/YXLQrHv8Q0W', 'Admin', 'Admin', 'admin', '', 'thepasalofficial2019@gmail.com', '9845XXXXX', 'Undefined, Unknown'),
(8, 'New person', '$2y$10$F/JxxFWpWgosLCz3XF7C.eXmNYO2ph5ZZIEgY4vOtNjRjKRNjTXSy', 'aaa', 'aaaa', 'customer', '', 'Apiy20@gmail.com', '9845XXXXX', 'Hetauda'),
(6, 'Nikesh ', '$2y$10$Affa8FM6Lt8PJdKWv2zZEebxrKSYK..3DhAtlAJH43gfmT8mVom1i', 'Nikesh', 'Kharel', 'customer', '', 'nikesh123kharel@gmail.com', '9845837964', 'Jeetpur Simara-16'),
(7, 'prashant', '$2y$10$83Qe7dMeUmNqOZfHH2BaBeHTvQlmZdruMhn/Is3aWSsUUFgoPR.8y', 'prashant', 'regmi', 'customer', '', 'regmis96@gmail.com', '9865011176', 'hetauda'),
(5, 'Random', '$2y$10$0bvmUszeYmK.XSfZDSh83e/7/PWD1xs/ThgJYoaqXXenoHhtbjy8i', 'Someone', 'Something', 'customer', '', 'random123@gmail.com', '98XXXXXXXX', 'Somewhere');

-- --------------------------------------------------------

--
-- Table structure for table `user_notifications`
--

CREATE TABLE `user_notifications` (
  `user_id` int(11) NOT NULL,
  `msg` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `sales_info`
--
ALTER TABLE `sales_info`
  ADD PRIMARY KEY (`bill_no`);

--
-- Indexes for table `user_accounts`
--
ALTER TABLE `user_accounts`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_notifications`
--
ALTER TABLE `user_notifications`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `sales_info`
--
ALTER TABLE `sales_info`
  MODIFY `bill_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user_notifications`
--
ALTER TABLE `user_notifications`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
