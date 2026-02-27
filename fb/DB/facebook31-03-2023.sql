-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2023 at 07:55 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `facebook`
--

-- --------------------------------------------------------

--
-- Table structure for table `abusedata`
--

CREATE TABLE `abusedata` (
  `id` int(10) NOT NULL,
  `postid` int(100) NOT NULL,
  `userid` int(100) NOT NULL,
  `logs` varchar(100) NOT NULL,
  `timedate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abusedata`
--

INSERT INTO `abusedata` (`id`, `postid`, `userid`, `logs`, `timedate`) VALUES
(1, 3, 2, 'Bad Words in Comment  : piss off', '2023-03-16 09:29:48'),
(2, 17, 2, 'Bad Words in Comment  : hii best lecture Bitch', '2023-03-16 10:26:49'),
(3, 17, 2, 'Stalling Image  : ', '2023-03-25 08:34:11'),
(4, 7, 2, 'Stalling Image  of Sakshi  More Than 2 sec', '2023-03-25 08:36:35'),
(5, 17, 2, 'RahulStalling Image  of Vidya More Than 2 sec', '2023-03-25 08:44:49'),
(6, 16, 2, 'Rahul Stalling Profile Photo of Sakshi  More Than 30 sec', '2023-03-25 13:22:57');

-- --------------------------------------------------------

--
-- Table structure for table `abuseword`
--

CREATE TABLE `abuseword` (
  `id` int(11) NOT NULL,
  `list` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `abuseword`
--

INSERT INTO `abuseword` (`id`, `list`) VALUES
(1, 'fuck you,fuck,shit,piss off,dick head,asshole,Bastard,Bitch,Damn');

-- --------------------------------------------------------

--
-- Table structure for table `commentdata`
--

CREATE TABLE `commentdata` (
  `id` int(10) NOT NULL,
  `postid` int(10) NOT NULL,
  `username` varchar(10) NOT NULL,
  `comment` varchar(400) NOT NULL,
  `datet` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `commentdata`
--

INSERT INTO `commentdata` (`id`, `postid`, `username`, `comment`, `datet`) VALUES
(1, 17, '2', 'DOne with post', '2023-03-14 04:18:25'),
(2, 17, '2', 'sss', '2023-03-14 04:19:13'),
(3, 17, '2', 'sss', '2023-03-14 04:19:56'),
(4, 17, '2', 'hii', '2023-03-14 04:20:34'),
(5, 17, '2', 'Hii', '2023-03-14 04:21:13'),
(6, 17, '2', 'ddd', '2023-03-14 04:21:56'),
(7, 15, '2', 'dest', '2023-03-14 04:26:07'),
(8, 14, '2', 'ddd', '2023-03-14 04:26:44'),
(9, 17, '3', 'Nice 👍', '2023-03-14 10:43:08'),
(10, 17, '4', 'good', '2023-03-14 10:43:10'),
(11, 16, '2', 'Good product', '2023-03-14 11:35:10'),
(12, 16, '2', 'idiot fuck you', '2023-03-16 06:37:25'),
(13, 17, '2', 'idiot fuck you', '2023-03-16 06:37:40'),
(14, 16, '2', 'idiot fuck you', '2023-03-16 06:46:39'),
(15, 15, '2', 'fukking idiots', '2023-03-16 06:46:55'),
(16, 15, '2', 'fukking idiots', '2023-03-16 06:47:29'),
(17, 11, '2', 'Fuck You ', '2023-03-16 07:01:30'),
(18, 11, '2', 'Fuck You ', '2023-03-16 07:01:39'),
(19, 11, '2', 'Fuck You ', '2023-03-16 07:01:57'),
(20, 11, '2', 'Fuck you\n', '2023-03-16 07:02:07'),
(21, 10, '2', 'fuck you', '2023-03-16 07:04:05'),
(22, 8, '2', 'piss off', '2023-03-16 07:04:47'),
(23, 3, '2', 'piss off', '2023-03-16 09:29:14'),
(24, 17, '2', 'hii best lecture', '2023-03-16 10:24:24'),
(25, 17, '2', 'hii best lecture Bitch', '2023-03-16 10:26:49');

-- --------------------------------------------------------

--
-- Table structure for table `likedata`
--

CREATE TABLE `likedata` (
  `id` int(10) NOT NULL,
  `postid` int(10) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likedata`
--

INSERT INTO `likedata` (`id`, `postid`, `username`) VALUES
(3, 13, '2'),
(4, 12, '2'),
(5, 11, '2'),
(6, 14, '2'),
(7, 6, '2'),
(13, 7, '2'),
(17, 17, '4'),
(18, 16, '2'),
(20, 17, '2'),
(26, 2, '2');

-- --------------------------------------------------------

--
-- Table structure for table `postdata`
--

CREATE TABLE `postdata` (
  `id` int(10) NOT NULL,
  `filename` varchar(100) NOT NULL,
  `postdisc` varchar(500) NOT NULL,
  `username` varchar(30) NOT NULL,
  `datet` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `userid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `postdata`
--

INSERT INTO `postdata` (`id`, `filename`, `postdisc`, `username`, `datet`, `userid`) VALUES
(1, 'uploads/inv.pdf', 'hiiii', 'Rahul', '2023-03-25 08:20:53', 2),
(2, 'uploads/photoes.jpeg', 'Amazing Nature ', 'Rahul', '2023-03-25 08:20:53', 2),
(3, 'uploads/DDajay.jpg', '65lakh DD recived', 'Rahul', '2023-03-25 08:20:53', 2),
(4, 'uploads/DDajay.jpg', '65lakh DD recived', 'Rahul', '2023-03-25 08:20:53', 2),
(5, 'uploads/DDajay.jpg', '65lakh DD recived', 'Rahul', '2023-03-25 08:20:53', 2),
(6, 'uploads/comp.jpeg', 'New computer added in bio', 'Rahul', '2023-03-25 08:20:53', 2),
(7, 'uploads/16786365686016887152125032080639.jpg', 'New job started', 'Sakshi ', '2023-03-25 08:21:19', 3),
(8, 'uploads/Screenshot_20230304_200936.jpg', 'Puzzle ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(9, 'uploads/16786370727685228658072581989724.jpg', 'Wether app', 'Sakshi ', '2023-03-25 08:21:19', 3),
(10, 'uploads/Screenshot_20230226_115602.jpg', 'Screen shot ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(11, 'uploads/Screenshot_20230226_115602.jpg', 'Screen shot ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(12, 'uploads/Screenshot_20230226_115602.jpg', 'Screen shot ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(13, 'uploads/IMG_20230312_113347.jpg', '10 rs with zoom', 'Rahul', '2023-03-25 08:20:53', 2),
(14, 'uploads/Screenshot_20230226_115602.jpg', 'Screen shot ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(15, 'uploads/Screenshot_20230226_115602.jpg', 'Screen shot ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(16, 'uploads/Screenshot_20230226_115602.jpg', 'Screen shot ', 'Sakshi ', '2023-03-25 08:21:19', 3),
(17, 'uploads/Screenshot_2023-02-23-16-36-35-971_com.instagram.android.jpg', 'Heyy', 'Vidya', '2023-03-25 08:21:39', 4),
(18, 'uploads/Rahul-logo-1.png', 'My office New logo updated', 'Rahul', '2023-03-25 08:24:01', 2),
(19, 'uploads/Screenshot 2023-03-18 142058.png', '', '', '2023-03-27 05:14:01', 2);

-- --------------------------------------------------------

--
-- Table structure for table `userlist`
--

CREATE TABLE `userlist` (
  `id` int(10) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `mob` varchar(13) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `dob` date NOT NULL,
  `pass` varchar(100) NOT NULL,
  `createdon` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `profileimg` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userlist`
--

INSERT INTO `userlist` (`id`, `fname`, `lname`, `mob`, `gender`, `dob`, `pass`, `createdon`, `profileimg`) VALUES
(1, 'asd', 'asd', '8948327821', 'female', '2023-03-31', 'Radd', '2023-03-05 14:39:01', ''),
(2, 'Rahul', 'Deshmukh', '8412003013', 'Male', '2023-03-10', 'Rahul@2022', '2023-03-28 11:02:40', 'uploads/Screenshot 2023-03-18 142058.png'),
(3, 'Sakshi ', 'Deshmukh ', '7588798211', 'female', '2001-03-03', 'sakshi123', '2023-03-27 05:27:52', 'uploads/Screenshot_20230323_100500.jpg'),
(4, 'Vidya', 'Wakchaure', '9021874969', 'female', '2000-06-30', '2000', '2023-03-13 08:58:40', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abusedata`
--
ALTER TABLE `abusedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `abuseword`
--
ALTER TABLE `abuseword`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commentdata`
--
ALTER TABLE `commentdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likedata`
--
ALTER TABLE `likedata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `postdata`
--
ALTER TABLE `postdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlist`
--
ALTER TABLE `userlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abusedata`
--
ALTER TABLE `abusedata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `abuseword`
--
ALTER TABLE `abuseword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `commentdata`
--
ALTER TABLE `commentdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `likedata`
--
ALTER TABLE `likedata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `postdata`
--
ALTER TABLE `postdata`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `userlist`
--
ALTER TABLE `userlist`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
