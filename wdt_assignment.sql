-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2021 at 08:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdt_assignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `payment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`UserID`, `ProductID`, `payment`) VALUES
(3, 10, 'no'),
(10, 3, 'yes'),
(10, 6, 'yes'),
(10, 4, 'yes'),
(10, 2, 'yes'),
(10, 1, 'yes'),
(10, 14, 'no');

-- --------------------------------------------------------

--
-- Table structure for table `customer_detail`
--

CREATE TABLE `customer_detail` (
  `ID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `UserProfile` varchar(100) NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) NOT NULL,
  `HomeAddress` varchar(500) NOT NULL,
  `Passwords` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_detail`
--

INSERT INTO `customer_detail` (`ID`, `Username`, `UserProfile`, `DOB`, `Gender`, `Email`, `PhoneNumber`, `HomeAddress`, `Passwords`) VALUES
(1, 'Admin', 'profileimage/defaultprofile.jpg', '1999-11-11', 'male', 'admin@petshop.com', '0123459876', 'KL', 'admin000'),
(2, 'dogowner', 'profileimage/defaultprofile.jpg', '2001-11-11', 'male', 'dogowner123@gmail.com', '0129876543', 'Selangor', 'dogowner12345'),
(3, 'James', 'profileimage/defaultprofile.jpg', '1995-01-11', 'Female', 'james1111@email.com', '0123456789', 'JB', 'James1995'),
(4, 'John', 'profileimage/defaultprofile.jpg', '1988-08-08', 'male', 'john88@gmail.com', '01288765943', 'Melaka', 'johnjohn0'),
(5, 'Amelia', 'profileimage/defaultprofile.jpg', '1978-10-08', 'female', 'ameliapet@gmail.com', '0127896435', 'Sabah', 'amelia031'),
(6, 'Olivia', 'profileimage/defaultprofile.jpg', '2003-01-01', 'female', 'oliviaaa@email.com', '0198765234', 'JB', 'olivia0s1'),
(7, 'Ais', 'profileimage/defaultprofile.jpg', '2000-05-09', 'female', 'aisssz999@email.com', '0169827345', 'Johor', '123aiszz321'),
(8, 'Abu', 'profileimage/kanna2.png', '1991-11-01', 'male', '123abu31@email.com', '3219685165', 'Kuching', 'abulovedogs'),
(9, 'fisher', 'profileimage/defaultprofile.jpg', '1991-09-11', 'male', 'fishered@gmail.com', '0187923564', 'KL', 'fishedlol62'),
(10, 'alice', 'profileimage/kanna3.png', '2021-11-07', 'female', 'alice@mail.com', '0123456232', 'Melaka', 'alicepass');

-- --------------------------------------------------------

--
-- Table structure for table `product_detail`
--

CREATE TABLE `product_detail` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `Category` varchar(100) NOT NULL,
  `ProductImage` varchar(100) NOT NULL,
  `TotalRating` int(11) NOT NULL,
  `num_of_rating` int(11) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `ProductImage2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_detail`
--

INSERT INTO `product_detail` (`ProductID`, `Name`, `Price`, `Category`, `ProductImage`, `TotalRating`, `num_of_rating`, `Description`, `ProductImage2`) VALUES
(1, 'Dog Canned Food', 30, 'food', 'productimage/ChickenDogCanned.jpg', 19, 4, 'Complete feed for dogs. Specially for adult and mature Poodles - Over 10 months old (loaf)', 'productimage/ChickenDogCanned2.jpg'),
(2, 'Dog Collar', 50, 'accessory', 'productimage/Collar.jpg', 9, 3, 'A sophisticated accessory redesigned with technical allure: the collar is made of nylon.', ''),
(3, 'Fish food', 21, 'food', 'productimage/fishfood.png', 7, 2, 'Contains natural ingredients which outstandingly increase appetite, enhance the body shape.The formulation is designed to provide the proper nutrition required for healthy growth, body shape and coloration', 'productimage/fishfood2.jpg'),
(4, 'Bird Seed', 11, 'food', 'productimage/bird_food.jpg', 47, 12, 'Feeder friendly wild bird blend works in most feeder styles including tube, hopper, and platform wild bird feeders', 'productimage/birdseed2.jpg'),
(6, 'Hamster food', 15, 'food', 'productimage/hamster_food.jfif', 29, 7, 'Menu contains a balance of nutrients designed just for hamsters. The high bio-availability of ingredients means that your hamster gets the nutrients it needs in a form that\'s easy to digest, to help keep it healthy, happy and playful. ', 'productimage/hamsterfood2.jpg'),
(7, 'dog chewtoy', 51, 'toys', 'productimage/dogchew.jpg', 50, 11, 'The flexible rubber material can avoid injury.Effectively help clean the teeth, massage gums and tongue, reducing dental plaque and tartar breeding, thus preventing a variety of oral diseases.', ''),
(8, 'Cat Scratch Board', 20, 'accessory', 'productimage/catscratch.jpg', 39, 9, 'Made of 100% eco-friendly and recyclable corrugated cardboard, upgraded AB craft for durable scratching. Reversible feature makes the scratching life last longer than most others', ''),
(9, 'Cat Jump Tree', 59, 'accessory', 'productimage/cattree.jpg', 63, 14, 'Not only does your cat get to jump and play, but they also have a designated place to sratch. With cheerful tones and less than 60 cm width, this cat tree squeezes comfortably into any small space. ', ''),
(10, 'Rope Ball Toy', 10, 'toys', 'productimage/ropeball.jpg', 76, 17, 'Made of cotton. With your pet attention and energy focused on trying to destroy a tough toy, there will be a decrease in anxiety!', ''),
(11, 'Pet Frisbee', 14, 'toys', 'productimage/frisbee.png', 43, 8, 'The frisbee is best-flying puncture-resistant disc that can stand up to gnashing canine teeth better than any other canine disc.', ''),
(12, 'Hamster', 29, 'pets', 'productimage/hamster.jpg', 100, 22, 'Its breed is a golden hamster. 9 months old. It is female.', ''),
(13, 'Rabbit', 38, 'pets', 'productimage/rabbit.jpg', 169, 34, 'Thrianta breed. 5 months old. Gender is male.', ''),
(14, 'Goldfish', 5, 'pets', 'productimage/goldfish.jpg', 45, 11, 'The common goldfish (Carassius auratus) is easily among the very first fish species to be kept by humans as a pet.', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD KEY `CID` (`UserID`),
  ADD KEY `PID` (`ProductID`);

--
-- Indexes for table `customer_detail`
--
ALTER TABLE `customer_detail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `product_detail`
--
ALTER TABLE `product_detail`
  ADD PRIMARY KEY (`ProductID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_detail`
--
ALTER TABLE `customer_detail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `product_detail`
--
ALTER TABLE `product_detail`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
