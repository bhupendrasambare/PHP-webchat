-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 18, 2021 at 11:44 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `wmassages` (
  `wmassage_id` int(11) NOT NULL,
  `wincomming_id` int(255) NOT NULL,
  `woutgoing_id` int(255) NOT NULL,
  `mgs` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `userwebchat` (
  `webuserId` int(11) NOT NULL,
  `uniquewebid` int(255) NOT NULL,
  `wname` varchar(255) NOT NULL,
  `wlast` varchar(255) NOT NULL,
  `wemail` varchar(255) NOT NULL,
  `wpassword` varchar(255) NOT NULL,
  `wimg` varchar(255) NOT NULL,
  `webstatus` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `wmassages`
  ADD PRIMARY KEY (`wmassage_id`);

ALTER TABLE `wmassages`
  MODIFY `wmassage_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- Indexes for table `users`
--
ALTER TABLE `userwebchat`
  ADD PRIMARY KEY (`webuserId`);

ALTER TABLE `userwebchat`
  MODIFY `webuserId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;



