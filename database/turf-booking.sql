-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 26, 2025 at 12:10 PM
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
-- Database: `turf-booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `fullname`, `username`, `email`, `password`) VALUES
(1, 'Administrator', 'admin', 'admin@gmail.com', '0192023a7bbd73250516f069df18b500');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `b_id` int(10) UNSIGNED NOT NULL,
  `ground_name` varchar(50) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` enum('Pending','Completed','Failed') NOT NULL DEFAULT 'Pending',
  `reg_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`b_id`, `ground_name`, `start_date`, `end_date`, `category`, `price`, `total`, `status`, `reg_id`) VALUES
(1, 'Kankaria Football Ground', '2025-03-28', '2025-03-29', 'Football', 4500, 4500, 'Pending', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `name`, `status`) VALUES
(1, 'Cricket', 'Active'),
(2, 'Football', 'Active'),
(3, 'Volleyball', 'Active'),
(4, 'Basketball', 'Active'),
(5, 'Kabaddi', 'Unactive');

-- --------------------------------------------------------

--
-- Table structure for table `ground`
--

CREATE TABLE `ground` (
  `gro_id` int(10) UNSIGNED NOT NULL,
  `ground_name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `price` int(11) NOT NULL,
  `place` varchar(200) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `cat_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ground`
--

INSERT INTO `ground` (`gro_id`, `ground_name`, `description`, `price`, `place`, `picture`, `status`, `cat_id`) VALUES
(1, 'Sardar Patel Stadium', 'Sardar Patel Stadium, also known as Narendra Modi Stadium, is located in Ahmedabad, Gujarat, India. It is the worlds largest cricket stadium with a seating capacity of around 132000 spectators. The stadium is situated in the Motera area and is part of the larger Sardar Vallabhbhai Patel Sports Complex. Designed by the renowned firm Populous, the stadium boasts modern facilities, including four dressing rooms, a practice area, and a state-of-the-art drainage system. Instead of traditional floodlights, it uses an LED lighting system fixed along the roof perimeter, providing an unobstructed view. Apart from hosting cricket matches, including IPL games, Test matches, ODIs, and T20Is, the stadium has also been a venue for large public gatherings and events.', 5000, 'Sardar Patel Stadium Rd, Nayaknagar, Navrangpura, Ahemedabad, Gujrat 380014', 'Sardar-Vallbhbhai-Patel-Stadium-Ahmedabad.jpeg', 'Active', 1),
(2, 'Kankaria Football Ground', 'Kankaria Football Ground, located near Kankaria Lake in Ahmedabad, Gujarat, is a versatile open space utilized for various activities and events. Despite its name, the ground serves multiple purposes beyond football matches. The expansive area accommodates local sports enthusiasts, particularly for cricket and football. Its a popular spot for informal games and practice sessions. The open space is commonly used by individuals learning to drive, providing a safe environment for beginners to practice vehicle handling. Kankaria Football Ground hosts a variety of events, including exhibitions, circuses, funfairs, and cultural activities, especially during vacation periods. During peak visiting hours at Kankaria Lake, the ground often serves as an additional parking area to accommodate the influx of visitors.\r\n', 4500, 'Bhakt Vallabh Dhola Marg, Kankaria, Ahmedabad, Gujarat 380002, India', 'Kankariya_Football.jpg', 'Active', 2),
(3, 'C. B. Patel International Stadium', 'The C. B. Patel International Cricket Stadium, located in Surat, Gujarat, India, is a prominent venue for cricket enthusiasts and players. stablished in 2011, the stadium boasts a seating capacity of approximately 35,000 spectators. The stadium is equipped with floodlights, enabling day-night matches, and meets international standards for hosting cricket events. The stadium has hosted various cricket tournaments and matches, including local and regional competitions. For instance, the Jain Champions League-5 was held here in December 2021. Situated on the campus of Veer Narmad South Gujarat University, the stadium is accessible via Canal Road, near VIP Road, in the Althan-Vesu area of Surat.', 7500, 'Veer Narmad South Gujrat University, Surat, Gujrat 395007', 'cb_patel-surat.jpg', 'Active', 1),
(4, 'SRP Group2 Football Ground', 'The SRP Group 2 Football and Cricket Ground is a sports facility located in Krishnanagar, Ahmedabad, Gujarat, India. Situated in front of Cha-Cha Nehru Childrens Park, this ground serves as a venue for both football and cricket activities. The ground accommodates both football and cricket, catering to local sports enthusiasts and hosting various matches and tournaments. As part of the State Reserve Police Force Group 2 campus, the facility is utilized for sports events involving police personnel and community interactions.', 3500, 'In front of Cha-Cha Nehru Childrens Park, Krishnanagar, Ahmedabad, Gujarat 382345', 'srp-football.jpg', 'Active', 2),
(5, 'Ambedkar Cricket Stadium', 'The stadium is primarily utilized for cricket matches and practice sessions. While specific details about the amenities at Ambedkar Stadium are limited, it is known to host cricket activities. For more comprehensive information on the facilities, it is advisable to contact local sports authorities or visit the venue directly. The stadiums location within the ONGC Colony makes it accessible to residents and visitors in the Chandkheda area. However, access to the stadium may be subject to ONGC regulations and permissions.​', 5300, '120, Bal Krishna Nagar, ONGC Colony, Chandkheda, Ahmedabad, Gujarat 382424', 'ambedkar_stadium04.jpg', 'Active', 1),
(6, 'BJMC Vollayball Ground', 'BJMC in Ahmedabad offers a range of sports facilities to its students, including a dedicated volleyball court. The volleyball ground is part of the college commitment to promoting physical activities and ensuring a balanced campus life. Situated within the BJMC campus in Ahmedabad, Gujarat, the volleyball ground is easily accessible to students and staff. BJMC organizes an annual sports week, offering students opportunities to participate in various sports, including volleyball.', 4500, 'Sopanam Rd, Meghaninagar, Ahemedabad, Gujrat 380016', 'volley-ball-ground-faridabad-ijvsuh79th.jpg', 'Active', 3);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `log_id` int(10) UNSIGNED NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pay_id` int(10) NOT NULL,
  `b_id` int(10) UNSIGNED NOT NULL,
  `payment_method` enum('Card','UPI') NOT NULL DEFAULT 'Card',
  `card_name` varchar(100) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiry_date` varchar(5) DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `upi_id` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed','Failed') DEFAULT 'Pending',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pay_id`, `b_id`, `payment_method`, `card_name`, `card_number`, `expiry_date`, `cvv`, `upi_id`, `amount`, `status`, `payment_date`) VALUES
(1, 1, 'Card', 'Example User', '1234123412341234', '08/30', '123', NULL, 4500.00, 'Pending', '2025-03-26 09:37:57');

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `reg_id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(10) NOT NULL,
  `dob` date NOT NULL,
  `city` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`reg_id`, `fullname`, `username`, `gender`, `age`, `dob`, `city`, `contact`, `email`, `password`) VALUES
(1, 'Example user', 'user', 'male', 19, '2000-01-01', 'ahemedabad', 1234512345, 'user@gmail.com', '6ad14ba9986e3615423dfca256d04e3f'),
(2, 'Example user2', 'user2', 'Female', 23, '1998-12-02', 'gandhinagar', 2147483647, 'user2@gmail.com', 'b2adfbf49b5a8facf2ac499630ea96bd'),
(3, 'Example user3', 'user3', 'Male', 20, '2001-12-12', 'ahemedabad', 1231231231, 'user3@gmail.com', '2fa5319fb2333fabb82b3ab68b100a33'),
(4, 'Example user4', 'user4', 'Male', 18, '1991-06-14', 'dholera', 2147483647, 'user4@gmail.com', 'f029259da141c1cf391b921d3af57f95'),
(5, 'Example user5', 'user5', 'Female', 25, '2002-08-01', 'rajkot', 2147483647, 'user5@gmail.com', 'a4742fd169e5c84330d45ac3bc6b176a');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `foreign key` (`reg_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `ground`
--
ALTER TABLE `ground`
  ADD PRIMARY KEY (`gro_id`),
  ADD KEY `foreignkey` (`cat_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pay_id`),
  ADD KEY `b_id` (`b_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`reg_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `b_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ground`
--
ALTER TABLE `ground`
  MODIFY `gro_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `log_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pay_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `reg_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `foreign key` FOREIGN KEY (`reg_id`) REFERENCES `registration` (`reg_id`);

--
-- Constraints for table `ground`
--
ALTER TABLE `ground`
  ADD CONSTRAINT `foreignkey` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`b_id`) REFERENCES `booking` (`b_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
