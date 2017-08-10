-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2017 at 02:16 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `followup`
--

-- --------------------------------------------------------

--
-- Table structure for table `employe_master`
--

CREATE TABLE `employe_master` (
  `sno` int(5) NOT NULL,
  `firstname` varchar(15) NOT NULL,
  `surname` varchar(15) NOT NULL,
  `Designation` varchar(25) NOT NULL,
  `id` int(20) NOT NULL,
  `username` int(20) NOT NULL,
  `password` varchar(80) NOT NULL,
  `project_code` varchar(10) NOT NULL,
  `last_login` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(13) NOT NULL,
  `followup_status` int(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employe_master`
--

INSERT INTO `employe_master` (`sno`, `firstname`, `surname`, `Designation`, `id`, `username`, `password`, `project_code`, `last_login`, `email`, `phone`, `followup_status`) VALUES
(1, 'Anuj', 'Gupta', 'Developer', 110026, 110026, '1234', 'proj1001', '2017-08-10 05:45:34', 'vrattantarora@gmail.com', '8577986617', 1),
(2, 'Akhil', 'Singh', 'Project Manager', 110059, 110059, '1234', 'proj1001', '2017-07-21 12:00:20', 'vrattantarora1@gmail.com', '8286792861', 1),
(3, 'Rakesh', 'Arora', 'Developer', 110086, 110086, '1234', 'proj1001', '2017-07-21 11:51:11', 'rakesharora@hcl.com', '9716819919', 1),
(4, 'Raveesh', 'Malhotra', 'Designer', 110065, 110065, '1234', 'proj1001', '2017-06-30 08:14:21', 'raveeshmalhotra@hcl.com', '8588792761', 1),
(5, 'Anil', 'Kumar', 'Project Manager', 18005, 18005, '1234', 'proj1099', '2017-07-21 12:48:01', 'akumar@hcl.com', '8572728695', 1),
(6, 'Gaurav', 'Singh', 'Developer', 18002, 18002, '1234', 'proj1099', '', 'gauravsingh@hcl.com', '8577986687', 1),
(7, 'Ankit', 'Yadav', 'Developer', 110087, 110087, '1234', 'proj1099', '2017-07-20 10:30:12', 'yadavankit12@gmail.com', '8871447726', 1),
(8, 'Anant', 'Pandey', 'Developer', 11879, 11879, '1234', 'proj1001', '2017-07-20 10:29:25', 'apandey110@gmail.com', '8577986643', 1);

-- --------------------------------------------------------

--
-- Table structure for table `proj1001`
--

CREATE TABLE `proj1001` (
  `sno` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj1001`
--

INSERT INTO `proj1001` (`sno`, `designation`, `id`) VALUES
(1, 'Developer', '110026'),
(2, 'Project Manager', '110059'),
(3, 'Developer', '110086'),
(4, 'Designer', '110065');

-- --------------------------------------------------------

--
-- Table structure for table `proj1099`
--

CREATE TABLE `proj1099` (
  `sno` int(11) NOT NULL,
  `designation` varchar(30) NOT NULL,
  `id` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `proj1099`
--

INSERT INTO `proj1099` (`sno`, `designation`, `id`) VALUES
(1, 'Project Manager', '18005'),
(2, 'Developer', '18002'),
(3, 'Developer', '110087');

-- --------------------------------------------------------

--
-- Table structure for table `project_master`
--

CREATE TABLE `project_master` (
  `sno` int(11) NOT NULL,
  `project_code` varchar(10) NOT NULL,
  `project_name` varchar(40) NOT NULL,
  `proj_manager_id` varchar(30) NOT NULL,
  `project_start` varchar(30) NOT NULL,
  `project_deadline` varchar(30) NOT NULL,
  `project_status` varchar(30) NOT NULL,
  `project_desc` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_master`
--

INSERT INTO `project_master` (`sno`, `project_code`, `project_name`, `proj_manager_id`, `project_start`, `project_deadline`, `project_status`, `project_desc`) VALUES
(1, 'proj1001', 'DATA CENTER PROJECT xyz', '110059', '2017-01-31', '2017-12-31', 'Development', 'Create New Application HCL On the Go  '),
(2, 'proj1099', 'Order Processing v1', '18005', '2017-04-30', '2018-01-01', 'Design', 'Create New System for order processing');

-- --------------------------------------------------------

--
-- Table structure for table `reg_followup`
--

CREATE TABLE `reg_followup` (
  `sno` int(11) NOT NULL,
  `project_code` varchar(10) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reg_followup`
--

INSERT INTO `reg_followup` (`sno`, `project_code`, `status`) VALUES
(1, 'proj1001', 1),
(2, 'proj1099', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tasks_proj1001`
--

CREATE TABLE `tasks_proj1001` (
  `sno` int(11) NOT NULL,
  `taskcode` varchar(10) NOT NULL,
  `taskname` varchar(25) NOT NULL,
  `taskdesc` varchar(200) NOT NULL,
  `assignedto` varchar(30) NOT NULL,
  `assignedby` varchar(30) NOT NULL,
  `assignedon` varchar(20) NOT NULL,
  `completiondate` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'INCOMPLETE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks_proj1001`
--

INSERT INTO `tasks_proj1001` (`sno`, `taskcode`, `taskname`, `taskdesc`, `assignedto`, `assignedby`, `assignedon`, `completiondate`, `status`) VALUES
(1, 'dev11', 'change UI 2', 'Please change the UI of users section as discussed', '110026', '110059', '2017-06-20', '2017-07-24', 'INCOMPLETE'),
(2, 'dev13', 'Remove Error', '"Permission to access file denied" error is observed in demo.java file. Please remove.', '110026', '110086', '2017-07-30', '2017-07-01', 'COMPLETE'),
(14, 'Dev_65', 'Updation of client table', 'Kindly update the client table attributes, as discussed today.', '110086', '110026 ', '2017-06-29', '2017-07-04', 'INCOMPLETE'),
(15, 'Des_A1', 'CHANGE CUSTOMER UI DESIGN', 'Please change the customer UI design so that it becomes more readable and user-friendly', '110065', '110026 ', '2017-06-29', '2017-07-02', 'INCOMPLETE'),
(20, 'Pro_22', 'Send Client list', 'Sir, please upload the client list in project documents.', '110059', '110026 ', '2017-06-29', '2017-07-21', 'COMPLETE'),
(21, 'Dev_85', 'Complete admin component', 'Please complete the component for admin, so that it can be tested', '110026', '110059 ', '2017-06-30', '2017-07-24', 'INCOMPLETE'),
(25, 'Des_5C', 'Update page4.html', 'please update the layout of page4.html file, as discussed today.', '110065', '110059 ', '2017-06-30', '2017-07-22', 'INCOMPLETE'),
(26, 'Dev_7C', 'Update client.java ', 'Please update this file as discussed.', '110026', '110059 ', '2017-07-21', '2017-07-22', 'COMPLETE'),
(27, 'Dev_FB', 'Check emp5.java', 'Please check emp5.java file and update as discussed today.', '110026', '110059 ', '2017-07-21', '2017-07-22', 'INCOMPLETE'),
(28, 'Pro_DC', 'abcd', 'do{  \n\n\n  }', '110059', '110026 ', '2017-07-21', '2017-07-22', 'COMPLETE'),
(29, 'Dev_E8', 'sdbnsj', 'sdank', '110086', '110026 ', '2017-07-21', '2017-07-22', 'INCOMPLETE');

-- --------------------------------------------------------

--
-- Table structure for table `tasks_proj1099`
--

CREATE TABLE `tasks_proj1099` (
  `sno` int(11) NOT NULL,
  `taskcode` varchar(10) NOT NULL,
  `taskname` varchar(25) NOT NULL,
  `taskdesc` varchar(200) NOT NULL,
  `assignedto` varchar(30) NOT NULL,
  `assignedby` varchar(30) NOT NULL,
  `assignedon` varchar(20) NOT NULL,
  `completiondate` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'INCOMPLETE'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `sno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `employe_master`
--
ALTER TABLE `employe_master`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `proj1001`
--
ALTER TABLE `proj1001`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `proj1099`
--
ALTER TABLE `proj1099`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `project_master`
--
ALTER TABLE `project_master`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `reg_followup`
--
ALTER TABLE `reg_followup`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `tasks_proj1001`
--
ALTER TABLE `tasks_proj1001`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employe_master`
--
ALTER TABLE `employe_master`
  MODIFY `sno` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `proj1001`
--
ALTER TABLE `proj1001`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `proj1099`
--
ALTER TABLE `proj1099`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_master`
--
ALTER TABLE `project_master`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `reg_followup`
--
ALTER TABLE `reg_followup`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasks_proj1001`
--
ALTER TABLE `tasks_proj1001`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
