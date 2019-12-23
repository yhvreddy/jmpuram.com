-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2019 at 01:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `codexbox`
--

-- --------------------------------------------------------

--
-- Table structure for table `codexbox_register_users`
--

CREATE TABLE `codexbox_register_users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(350) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `email` varchar(300) DEFAULT NULL,
  `username` varchar(350) DEFAULT NULL,
  `password` varchar(350) DEFAULT NULL,
  `address` text,
  `status` int(11) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `codexbox_register_users`
--

INSERT INTO `codexbox_register_users` (`id`, `full_name`, `mobile`, `email`, `username`, `password`, `address`, `status`, `created`, `updated`) VALUES
(1, 'Harshavardhan Reddy', 8019660099, 'vardhan7794@gmail.com', 'yhvreddy', 'f8660dadb3e101ff25c6820d406dacac', 'Near sr.nagar Metro station,beside almas,SR.Nagar,Hyd', 1, '2019-04-24 08:24:09', '2019-04-24 13:54:09'),
(2, 'Anusha Reddy', 8142250099, 'anushareddyyenumula@gmail.com', 'anusha', 'b20e57f526a290bdf79f8e2cc77f2cb4', '16-163/A,Mail road Near tjps collage,Guntur', 1, '2019-04-24 10:22:06', '2019-04-24 15:52:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codexbox_register_users`
--
ALTER TABLE `codexbox_register_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codexbox_register_users`
--
ALTER TABLE `codexbox_register_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
