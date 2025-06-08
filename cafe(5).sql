-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2024 at 07:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cafe`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('Admin', 'qwe123');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `orderId` varchar(40) NOT NULL,
  `customerName` varchar(50) NOT NULL,
  `phoneNumber` int(11) NOT NULL,
  `productDetails` varchar(40) NOT NULL,
  `amount` int(11) NOT NULL,
  `deliveryAddress` varchar(40) NOT NULL,
  `deliveryDateTime` datetime NOT NULL,
  `otherInformation` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`orderId`, `customerName`, `phoneNumber`, `productDetails`, `amount`, `deliveryAddress`, `deliveryDateTime`, `otherInformation`) VALUES
('ORDp88h871713331465306', 'Eddie', 2147483647, 'Latte', 2, 'York street, Yangon', '2024-04-15 00:00:00', 'Hurry'),
('ORDsm753p1713362505525', 'Martin', 943044567, 'Cappucino', 1, 'Moon condo, Room No: 206, Yangon', '2024-04-18 00:00:00', 'Don\'t put in ice too much.'),
('ORD6jtg271714744288519', 'sdfsadf', 9, 'sdfsdf', 1, 'Theingi street, Bago', '2024-05-14 00:00:00', 'aF'),
('ORD8xgv961714901606433', 'Mao', 9, 'Prawn Spaghatti', 1, 'York Street, Yangon', '2024-05-06 00:00:00', 'No need cutlery!');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `title` varchar(20) NOT NULL,
  `price` varchar(20) NOT NULL,
  `image` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`title`, `price`, `image`) VALUES
('LA COLOMBE', '25000', 0x486f7573657761726573202b204b69746368656e776172652053746f72652e6a7067),
('BOUSE BLEND', '25000', 0x5061636b6167696e672044657369676e2053657420426f782044657369676e204c6162656c2044657369676e20427573696e657373204272616e64696e672050657266756d65204c6162656c20436f66666565204c6162656c2044657369676e20546561204c6162656c2044657369676e20536f6170204c6162656c7320437573746f6d202d20457473792043616e6164612e6a7067),
('LUGARTI', '20000', 0x5072656d69756d20546172616e74756c61205375627374726174652038205175617274732e6a7067),
('BOVUNG', '40000', 0x426f76756e67204f7267616e69632047617264656e20416d656e646d656e7420305f37352063752066742e6a7067),
('VETERAN OWNED', '20000', 0x496e766164657220426c61636b20486561727420436f6666656520426c656e6420627920696e766164657220636f66666565202d2057686f6c65204265616e205f203520506f756e64204261672e6a7067),
('BLACK COFFEE', '20000', 0x7b2069206e2073207020692072206120722065207d2e6a7067),
('Chemie', '20000', 0x764e5a6236512d332e6a7067),
('Caffe\' D\'arte', '40000', 0x536d656c6c2054686520436f666665652e6a7067),
('Rooster $ Roaster', '30000', 0x5061636b6167696e672044657369676e20666f7220526f6f73746572202620526f617374657220436f6666656520436f6d70616e792062792044657369676e42726f212e6a7067),
('COFFEE BEAN', '30000', 0x43422e6a7067),
('COFFEE BEAN', '30000', 0x4342422e6a7067),
('MAHDANEH', '40000', 0x4d4f2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `user_email` varchar(50) NOT NULL,
  `star_rating` int(11) NOT NULL,
  `additional_notes` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`user_email`, `star_rating`, `additional_notes`) VALUES
('phyo@gmail.com', 2, 'The shop is located in a nice place and customer service is well.'),
('yoon@gmail.com', 2, 'The taste is so good and nice packing.'),
('lily@gmail.com', 1, 'What a wonderful a cafe.');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
