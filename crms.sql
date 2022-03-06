-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2021 at 10:33 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `User_id` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Full_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`User_id`, `Username`, `Pass`, `Full_Name`) VALUES
(1, 'mainadmin', 'test@111', 'Admin'),
(2, 'policeadmin', 'test@222', 'Jonathan Edwards'),
(3, 'useradmin', 'test@333', 'Robert Steve');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `Catno` int(4) NOT NULL,
  `Catname` varchar(25) NOT NULL,
  `Catsen` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`Catno`, `Catname`, `Catsen`) VALUES
(1200, 'Hit and Run', '1 Year'),
(1201, 'Murder', '4 Years to Lifetime'),
(1202, 'Burglary', '3 Years'),
(1203, 'Fraud', '5 Years'),
(1204, 'Drug Trafficking', '10 - 15 Years'),
(1205, 'DUI', '6 Months'),
(1206, 'Arson', '20 Years');

-- --------------------------------------------------------

--
-- Table structure for table `courts`
--

CREATE TABLE `courts` (
  `courtid` int(5) NOT NULL,
  `courtname` varchar(50) NOT NULL,
  `courttype` varchar(20) NOT NULL,
  `courtcity` varchar(20) NOT NULL,
  `courtstate` varchar(20) NOT NULL,
  `courtcountry` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courts`
--

INSERT INTO `courts` (`courtid`, `courtname`, `courttype`, `courtcity`, `courtstate`, `courtcountry`) VALUES
(18986, 'Yagami High Court', 'High Court', 'Shibuya', 'West Bengal', 'India'),
(41992, 'Sasori Revenue Court', 'Revenue Court', 'Akatsuki', 'Madhya Pradesh', 'India'),
(73351, 'Zoldyck High Court', 'Hight Court', 'Chennai', 'Tamil Nadu', 'India'),
(94421, 'Edward Elric High Court ', 'High Court ', 'Amestris', 'Gujarat ', 'India '),
(94866, 'Zoro Court', 'District Court', 'Konoha', 'Kerela', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `crime`
--

CREATE TABLE `crime` (
  `Crino` int(6) NOT NULL,
  `Criname` varchar(30) NOT NULL,
  `Cricomm` varchar(100) NOT NULL,
  `Cridt` datetime NOT NULL,
  `Jailsen` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `crime`
--

INSERT INTO `crime` (`Crino`, `Criname`, `Cricomm`, `Cridt`, `Jailsen`) VALUES
(107891, 'Pablo James', 'DUI ', '2021-04-15 07:30:00', '10 Months'),
(146211, 'Aaliyah Allison', 'Looting‎, Burglary‎, Manslaughter‎ ', '2021-08-07 12:29:00', '55 Years'),
(151988, 'Mark Smith', 'Civil disobedience‎', '2021-08-07 05:25:00', '6 Months'),
(190103, 'John Stevens', 'Looting, DUI, Child Abuse', '2020-05-09 04:30:00', '30 Years'),
(219817, 'James Hohnson', 'Burglary, Property Crimes', '2021-10-02 07:10:00', '10 Years');

-- --------------------------------------------------------

--
-- Table structure for table `criminal`
--

CREATE TABLE `criminal` (
  `Crino` int(6) NOT NULL,
  `Criname` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `height` varchar(20) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `crimes_comm` int(5) NOT NULL,
  `address` varchar(100) NOT NULL,
  `nationality` varchar(25) NOT NULL,
  `image` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `criminal`
--

INSERT INTO `criminal` (`Crino`, `Criname`, `status`, `height`, `contact`, `crimes_comm`, `address`, `nationality`, `image`) VALUES
(107891, 'Pablo James', 'Held', '6 feet 10 inches', 901987745, 3, '7A Street, Chennai, Tamil Nadu', 'Indian', 'cr6.jpg'),
(146211, 'Aaliyah Allison', 'In Search', '5 feet 11.9 inches', 8874539185, 3, '9A, Ved Vihar, New Delhi', 'Indian', 'cr2.jpg'),
(151988, 'Mark Smith', 'Held', '6 feet 0 inches', 1211334569, 1, '56-A, Downtown, San-Francisco', 'American', 'cr3.jpg'),
(190103, 'John Stevens', 'In Search', '5 feet 9.1 inches', 7891034676, 3, '8-56, Civil Lines, New Delhi', 'Indian', 'cr1.jpg'),
(219817, 'James Hohnson', 'In Search', '6 feet 4 inches', 1233456123, 2, 'Phr Apartments, Downtown, Los Angeles', 'American', 'cr4.jpg'),
(381900, 'Sam Anderson', 'In Search', '6 feet 9 inches', 991898825, 5, 'Welch Greens, London', 'Indian', 'cr5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fir`
--

CREATE TABLE `fir` (
  `firno` bigint(5) NOT NULL,
  `firname` varchar(30) NOT NULL,
  `firfathername` varchar(30) NOT NULL,
  `firmothername` varchar(30) NOT NULL,
  `aadhar` bigint(12) NOT NULL,
  `phno` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `datetime` datetime NOT NULL,
  `placeocc` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `crimedesc` longtext NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fir`
--

INSERT INTO `fir` (`firno`, `firname`, `firfathername`, `firmothername`, `aadhar`, `phno`, `email`, `datetime`, `placeocc`, `address`, `crimedesc`, `status`) VALUES
(1, 'Naruto', 'Minato Namikaze', 'Kushina Uzumaki', 819073815647, 8754710017, 'naruto@gmail.com', '2021-10-21 20:14:20', '5th Street, JP Nagar, Tirunelveli, Tamil Nadu', 'Flat 69, 4th Street, Konoha Nagar, Tirunelveli, Tamil Nadu', 'My bicycle has been stolen. I parked at street and went for shopping. When I came back, I didnt find my bicycle.', 'Closed'),
(2, 'Miyuki', 'Ayanakoji Shirogane', 'Kei Shirogane', 781134195002, 9445186610, 'shirogane@gmail.com', '2021-11-01 08:15:00', 'VOC Park, 7th Street, Thoraikpakkam, Chennai, Tamil Nadu', '7Z, KTC Street, Anna Nagar, Chennai, Tamil Nadu', 'My money purse has been stolen. I sat on a bench at the park. When I checked for my purse, I didnt find my purse.', 'Closed'),
(28, 'Naruto', 'Minato Namikaze', 'Kushina Uzumaki', 819073815647, 9486618986, 'naruto@gmail.com', '2021-12-19 03:22:00', 'Konoha', 'Flat 78, Konoha, India', 'They stole my hokagae title', 'Pending'),
(29, 'Naruto', 'Minato Namikaze', 'Kushina Uzumaki', 819073815647, 9778111456, 'naruto@gmail.com', '2022-01-01 03:29:00', '14th street, Indra Nagar, Tirunelveli, Tamil Nadu', 'Flat 88, KTC Nagar, Tirunelveli, Tamil Nadu', 'Someone stole my bike when I left it for parking ', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `nearbypolicestation`
--

CREATE TABLE `nearbypolicestation` (
  `psid` bigint(6) NOT NULL,
  `psname` varchar(50) NOT NULL,
  `psaddress` mediumtext NOT NULL,
  `psphno` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nearbypolicestation`
--

INSERT INTO `nearbypolicestation` (`psid`, `psname`, `psaddress`, `psphno`) VALUES
(1, 'C3 Perumalpuram Police Station', '2C, C Colony, Perumalpuram, Vasantha Nagar, Tirunelveli, Tamil Nadu.', '0462 2530175'),
(3, 'Palayamkottai Police Station', '69, South Bazaar, Kannanagam, Palayamkottai, Tirunelveli, Tamil Nadu.', '0462 2546332'),
(4, 'C3 Perumalpuram Police Station', '2C, C Colony, Perumalpuam, Vasantha Nagar, Tirunelveli, Tamil Nadu', '0462 253 0175'),
(5, 'C2 Police Station', 'Nethaji Rd, Melapalayam, Tirunelveli, Tamil Nadu 627005', ' 0462 235 2530'),
(6, 'Thisaynvillai police station', ' St Thomas Rd, Maharaja Nagar, Tirunelveli, Tamil Nadu 627011', ' 0462 236 2530'),
(7, 'Thachanallur Police Station', 'Tirunelveli-Sankaran Koil-Rajapalayam Rd, Tirunelveli, Tamil Nadu 627358', ' 0462 227 2530'),
(8, 'Pettai Police Station', '95, MNP Sannathi St, Tirunelveli, Tamil Nadu 627004', ' 0462 234 2006'),
(9, 'D B Marg Police Station', '397/A, Lamington Rd, Krishna Kunj, Grant Road East, Shapur Baug, Girgaon, Mumbai, Maharashtra 400007', ' 022 2386 7873'),
(10, 'Nagpada Police Station', 'Sofia Zubair Road, Chhota Sonapur, Siddharth Nagar, Kamathipura, Mumbai, Maharashtra 400008', ' 022 2309 2293'),
(11, 'Pydhonie Police Station', 'Ibrahim Rehmatullah Rd, opposite Hamidiya Masjid, Jamli Mohalla, Mumbadevi Area, Bhuleshwar, Mumbai, Maharashtra 400003', ' 022 2343 6114'),
(12, 'L T Marg Police Station', '27, R Champsi Rd, Tak Wadi, Lohar Chawl, Kalbadevi, Mumbai, Maharashtra 400002', ' 022 2208 0303'),
(13, 'VP Road Police Station', 'D, Shanti Bhavan, 123, Vithalbhai Patel Rd, Kakadwadi, Khandiwadi, Ambewadi, Girgaon, Mumbai, Maharashtra 400004', '022 2387 2525'),
(14, 'K3 Aminjikarai Police Station', ' 3rd Avenue, Shenoy Nagar, Anna Arch Rd, NSK Nagar, Arumbakkam, Chennai, Tamil Nadu 600106', '044 2345 2716'),
(15, 'D4 Police Station', ' 222, Bharathi Salai, Padupakkam, Royapettah, Chennai, Tamil Nadu 600014', '044 2675 2716'),
(16, 'EGMORE Police Station', ' Egmore High Road, Egmore, Chennai, Tamil Nadu 600008', '044 2345 2677'),
(17, 'E5 Police Station', '27FG+C2H, MIG Block, Foreshore Estate, Chennai, Tamil Nadu 600028', '044 2345 2575'),
(18, 'C3 Seven Wells Police Station', ' 145, Amman Koil Street, Amman Koil North, George Town, Chennai, Tamil Nadu 600001', '044 2345 2471'),
(19, 'G 7 Chetpet Police Station', '98, 14, MC Nicholas Rd, MS Colony, Mukta Gardens, Chetpet, Chennai, Tamil Nadu 600031', '044 2345 2687'),
(20, 'F1 Chintadripet Police Station', ' Arunachala St, Chintadripet, Chennai, Tamil Nadu 600002', ' 094981 00027'),
(21, 'R-8 Vadapalani Police Station', '283, Arcot Rd, Ottagapalayam, Somasundara Bharathi Nagar, Vadapalani, Chennai, Tamil Nadu 600026', '044 2345 2635'),
(22, 'Police Station Tambaram', ' W4F9+9X7, Railway Colony, East Tambaram, Tambaram, Kamarajar Salai, Tamil Nadu 600059', '044 2239 6003');

-- --------------------------------------------------------

--
-- Table structure for table `police`
--

CREATE TABLE `police` (
  `Poid` bigint(6) NOT NULL,
  `Poname` varchar(30) NOT NULL,
  `porank` varchar(100) NOT NULL,
  `policestation` varchar(100) NOT NULL,
  `contact` bigint(10) NOT NULL,
  `remark` varchar(100) NOT NULL,
  `address` varchar(150) NOT NULL,
  `service_yrs` varchar(20) NOT NULL,
  `image` varchar(2048) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `police`
--

INSERT INTO `police` (`Poid`, `Poname`, `porank`, `policestation`, `contact`, `remark`, `address`, `service_yrs`, `image`) VALUES
(112453, 'Lynn Carpenter', 'Director General of Police', 'T1 Police Station, Tirunelveli, Tamil Nadu ', 2147483647, 'A dedicated police officer', 'Flat 78, Agar Nagar, Tirunelveli, Tamil Nadu', '18 Years', 'p1.png'),
(291831, 'Alexandra Bridges', 'Addl. Director General of Police', 'C Police Station, Chennai, Tamil Nadu', 2147483647, 'A sincere officer', 'A9/1, Bapu Nagar, Chennai, Tamil Nadu', '12 Years', 'p2.jpg'),
(456435, 'Edmund Martin', 'Deputy Inspector General of Police	', 'B1 Police Station, Madurai, Tamil Nadu', 2147483647, 'A passionate police officer', '8, KTC Nagar, Madurai, Tamil Nadu', '7 Years', 'p4.jpg'),
(509103, 'Phillip Simmons', 'Superintendent of Police', 'G2, Vellore, Tamil Nadu', 2147483647, 'A devoted police officer', '8 N/1, MK Nagar, Vellore, Tamil Nadu', '9 Years', 'p5.jpg'),
(639034, 'Opal Paul', 'Assistant Superintendent of Police	', 'L3 Police Station, Nagercoil, Tamil Nadu', 2147483647, 'A brave police officer', 'Flat 69, Anna Nagar, Nagercoil, Tamil Nadu', '6 Years', 'p6.png');

-- --------------------------------------------------------

--
-- Table structure for table `policeusers`
--

CREATE TABLE `policeusers` (
  `User_id` int(5) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Full_Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policeusers`
--

INSERT INTO `policeusers` (`User_id`, `Username`, `Pass`, `Full_Name`) VALUES
(1, 'policeone', 'test@444', 'Lynn Carpenter'),
(2, 'policetwo', 'test@555', 'Alexandra Bridges'),
(3, 'policethree', 'test@666', 'Edmund Martin');

-- --------------------------------------------------------

--
-- Table structure for table `prisons`
--

CREATE TABLE `prisons` (
  `prisonid` int(5) NOT NULL,
  `prisonname` varchar(50) NOT NULL,
  `prisontype` varchar(20) NOT NULL,
  `prisoncapacity` int(5) NOT NULL,
  `prisoncity` varchar(20) NOT NULL,
  `prisonstate` varchar(30) NOT NULL,
  `prisoncountry` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prisons`
--

INSERT INTO `prisons` (`prisonid`, `prisonname`, `prisontype`, `prisoncapacity`, `prisoncity`, `prisonstate`, `prisoncountry`) VALUES
(21611, 'ALipore Prison', 'Central Prison', 2102, 'Kolkata', 'West Bengal', 'India'),
(50541, 'Alluka Central Prison ', 'State Prison ', 405, 'Kaze ', 'Delhi ', 'India '),
(56156, 'Yuji Central Prison', 'Central Prison', 3000, 'Chennai', 'Tamil Nadu', 'India'),
(60345, 'Madara Prison', 'Central Prison', 2102, 'Iwa', 'Delhi', 'India'),
(87547, 'Nobara Women Prison', 'Women Prison', 1252, 'Madurai', 'Tamil Nadu', 'India'),
(88258, 'Saitama State Prison', 'State Prison', 1332, 'Tirunelveli', 'Tamil Nadu', 'India'),
(88781, 'Naini Central Prison', 'Central Prison', 1252, 'Uchiha', 'West Bengal', 'India'),
(97210, 'Killua Central Prison', 'Central Prison', 1001, 'Hyuga', 'West Bengal', 'India');

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `qid` bigint(6) NOT NULL,
  `name` varchar(30) NOT NULL,
  `aadhar` bigint(12) NOT NULL,
  `phno` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `query` longtext NOT NULL,
  `reply` longtext NOT NULL DEFAULT 'Not Yet Answered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`qid`, `name`, `aadhar`, `phno`, `email`, `query`, `reply`) VALUES
(1, 'Aizen', 882589442135, 7538821633, 'aizen@gmail.com', 'What we need to do to join police department ?', 'Not Yet Answered'),
(2, 'Kurosaki', 948694428870, 9437556156, 'kurosaki@gmail.com', 'How does this CRMS web application maintain records and can you tell us about transperancy of the details disclosed to the people?', 'The CRMS Appllication was  built using HTML, CSS, JavaScript and PHP with enough security measures and the details which are disclosed are 100% true.'),
(3, 'Orihime', 712245856156, 9486694421, 'inoue@gmail.com', 'This web application looks cool !', 'Not Yet Answered'),
(6, 'Naruto', 819073815647, 1121311414, 'naruto@gmail.com', 'How to file a FIR?', 'There will be a seperate option for filing FIR');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `User_id` int(5) NOT NULL,
  `Aadhar` bigint(12) NOT NULL,
  `Pass` varchar(50) NOT NULL,
  `Full_Name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phno` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`User_id`, `Aadhar`, `Pass`, `Full_Name`, `email`, `phno`) VALUES
(1, 819073815647, 'e61c9b899eb1b1ad6d1499a73eb117af', 'Naruto', 'naruto@gmail.com', 8754710017),
(2, 781134195002, '4b9b98e9ec869619db700431a8986bff', 'Miyuki', 'shirogane@gmail.com', 9445186610),
(3, 882589442135, '4a39b439cd63f7b65a3ad3d4a084c9dc', 'Aizen', 'aizen@gmail.com', 7538821633);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`User_id`),
  ADD UNIQUE KEY `Pass` (`Pass`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`Catno`);

--
-- Indexes for table `courts`
--
ALTER TABLE `courts`
  ADD PRIMARY KEY (`courtid`);

--
-- Indexes for table `crime`
--
ALTER TABLE `crime`
  ADD PRIMARY KEY (`Crino`);

--
-- Indexes for table `criminal`
--
ALTER TABLE `criminal`
  ADD PRIMARY KEY (`Crino`);

--
-- Indexes for table `fir`
--
ALTER TABLE `fir`
  ADD PRIMARY KEY (`firno`);

--
-- Indexes for table `nearbypolicestation`
--
ALTER TABLE `nearbypolicestation`
  ADD PRIMARY KEY (`psid`);

--
-- Indexes for table `police`
--
ALTER TABLE `police`
  ADD PRIMARY KEY (`Poid`);

--
-- Indexes for table `policeusers`
--
ALTER TABLE `policeusers`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `prisons`
--
ALTER TABLE `prisons`
  ADD PRIMARY KEY (`prisonid`);

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`qid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `User_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `fir`
--
ALTER TABLE `fir`
  MODIFY `firno` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `nearbypolicestation`
--
ALTER TABLE `nearbypolicestation`
  MODIFY `psid` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `policeusers`
--
ALTER TABLE `policeusers`
  MODIFY `User_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `qid` bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `User_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
