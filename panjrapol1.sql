-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 17, 2018 at 05:44 AM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `panjrapol1`
--

-- --------------------------------------------------------

--
-- Table structure for table `animal_detail`
--

CREATE TABLE `animal_detail` (
  `Animal_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Big` varchar(255) NOT NULL,
  `Small` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `animal_detail`
--

INSERT INTO `animal_detail` (`Animal_id`, `Panjrapol_id`, `Year`, `Role`, `Big`, `Small`) VALUES
(59, 17, '2017-2018', 'Opening Balance', '167', '20'),
(60, 17, '2017-2018', 'New Arrived', '2', '5'),
(61, 17, '2017-2018', 'Taken Away', '2', '2'),
(62, 17, '2017-2018', 'Died', '14', '20'),
(63, 17, '2017-2018', 'Closing Balance', '153', '3'),
(64, 21, '2017-2018', 'Opening Balance', '100', '10'),
(65, 21, '2017-2018', 'New Arrived', '23', '2'),
(66, 21, '2017-2018', 'Taken Away', '2', '3'),
(67, 21, '2017-2018', 'Died', '2', '3'),
(68, 21, '2017-2018', 'Closing Balance', '119', '6'),
(89, 17, '2016-2017', 'Opening Balance', '100', '20'),
(90, 17, '2016-2017', 'New Arrived', '23', '2'),
(91, 17, '2016-2017', 'Taken Away', '20', '2'),
(92, 17, '2016-2017', 'Died', '20', '2'),
(93, 17, '2016-2017', 'Closing Balance', '83', '18');

-- --------------------------------------------------------

--
-- Table structure for table `auditor_detail`
--

CREATE TABLE `auditor_detail` (
  `Auditor_id` int(255) NOT NULL,
  `Panjrapol_id` int(100) DEFAULT NULL,
  `Auditor_name` varchar(255) NOT NULL,
  `City_id` int(100) DEFAULT NULL,
  `CA_registration_no` varchar(255) NOT NULL,
  `Mobile_no` varchar(255) NOT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `auditor_detail`
--

INSERT INTO `auditor_detail` (`Auditor_id`, `Panjrapol_id`, `Auditor_name`, `City_id`, `CA_registration_no`, `Mobile_no`, `Email`, `Password`) VALUES
(3, NULL, 'admin', NULL, '', '0', 'admin@gmail.com', 'admin'),
(4, 16, 'saurin vora', 15, 'fghj56789', '+079456788768', '', ''),
(5, 18, 'dfghj', 13, 'cvbn4567vbn', '3456789145', '', ''),
(10, 21, 'dfgh', 14, 'xdfgh4567', '23456789567', '', ''),
(11, 17, 'cvbn', 14, 'dfgh45678', '3456776545', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `bank_detail`
--

CREATE TABLE `bank_detail` (
  `Bank_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Bank_name` varchar(255) NOT NULL,
  `Branch_name` varchar(255) NOT NULL,
  `IFSC` varchar(255) NOT NULL,
  `Acc_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bank_detail`
--

INSERT INTO `bank_detail` (`Bank_id`, `Panjrapol_id`, `Bank_name`, `Branch_name`, `IFSC`, `Acc_no`) VALUES
(1, 16, 'hdfc', 'ahmedabadsola', 'hdfc1278657', '3456789087'),
(2, 16, 'sbi', 'ahmedabad-kankaria', 'sbi456788', '23456789876'),
(3, 17, 'hdfc', 'hdfcsola', 'hdfc1278657', '456789045680'),
(5, 17, 'State bank of india', 'sbikakriya', 'sbi456780', '3456786789'),
(6, 21, 'gygbyh', 'hgbh', 'hbh4567', '4567'),
(7, 21, 'dfgh', 'sdfgh', 'sdf345', '345678');

-- --------------------------------------------------------

--
-- Table structure for table `city_detail`
--

CREATE TABLE `city_detail` (
  `City_id` int(255) NOT NULL,
  `City_name` varchar(255) NOT NULL,
  `State_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `city_detail`
--

INSERT INTO `city_detail` (`City_id`, `City_name`, `State_id`) VALUES
(12, 'AHMEDABAD', 14),
(13, 'BARODA', 14),
(14, 'GURGAON', 15),
(15, 'BANGLORE', 16);

-- --------------------------------------------------------

--
-- Table structure for table `contact_detail`
--

CREATE TABLE `contact_detail` (
  `Contact_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_detail`
--

INSERT INTO `contact_detail` (`Contact_id`, `Panjrapol_id`, `Role`, `Name`, `Contact`) VALUES
(22, 16, 'Main executive trustee', 'dfghjkdfghj', '3456789567'),
(23, 16, 'Local Person', 'wertyudfgh', '2345678678'),
(24, 16, 'Panjrapole', 'sdfghdfgh', '3456789567'),
(25, 16, 'Mumbai', 'ghjdfghgfd', '3456789234'),
(26, 16, 'Ahmedabad', 'qwerty', '2345678123'),
(27, 16, 'Surat', 'qwertyu', '2345678123'),
(28, 16, 'Other', 'wertyj', '3456789123'),
(43, 22, 'Main executive trustee', '', ''),
(44, 22, 'Local Person', '', ''),
(45, 22, 'Panjrapole', '', ''),
(46, 22, 'Mumbai', 'dfghj', '2345678'),
(47, 22, 'Ahmedabad', '', ''),
(48, 22, 'Surat', '', ''),
(49, 22, 'Other', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `donor_detail`
--

CREATE TABLE `donor_detail` (
  `Donor_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Transaction_id` bigint(255) NOT NULL,
  `Firstname` varchar(255) NOT NULL,
  `Lastname` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Contact` varchar(255) NOT NULL,
  `CardNo` varchar(255) NOT NULL,
  `Exp_Date` varchar(255) NOT NULL,
  `Donation_Date` varchar(255) NOT NULL,
  `Donation_Time` varchar(255) NOT NULL,
  `Amount` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `image_detail`
--

CREATE TABLE `image_detail` (
  `Image_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Images` varchar(255) NOT NULL,
  `Video` varchar(255) NOT NULL,
  `Request` varchar(255) NOT NULL,
  `Event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image_detail`
--

INSERT INTO `image_detail` (`Image_id`, `Panjrapol_id`, `Images`, `Video`, `Request`, `Event`) VALUES
(2, 17, '../certificates/FGHJI15141.jpg,../certificates/FGHJI15142.jpg', '../certificates/FGHJI1514videoplayback.mp4', '../certificates/FGHJI151480g.jpg', '../certificates/FGHJI151412A.jpg'),
(3, 20, '', '', '', ''),
(4, 22, '../certificates/DFGHJ141212A.jpg,../certificates/DFGHJ141280g.jpg', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `incomeexpense_detail`
--

CREATE TABLE `incomeexpense_detail` (
  `Incomeexpense_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Year` varchar(255) NOT NULL,
  `Donation_recevied` varchar(255) NOT NULL,
  `Donation_recevied1` varchar(255) NOT NULL,
  `Subsidy` varchar(255) NOT NULL,
  `Dividend` varchar(255) NOT NULL,
  `Other_income` varchar(255) NOT NULL,
  `Capital_income` varchar(255) NOT NULL,
  `Total_income` varchar(255) NOT NULL,
  `Grasswater_expense` varchar(255) NOT NULL,
  `Administration_expense` varchar(255) NOT NULL,
  `Advertisement_expense` varchar(255) NOT NULL,
  `Construction_expense` varchar(255) NOT NULL,
  `Total_expense` varchar(255) NOT NULL,
  `Net_surplus` varchar(255) NOT NULL,
  `Investment` varchar(255) NOT NULL,
  `Savings` varchar(255) NOT NULL,
  `Shares` varchar(255) NOT NULL,
  `Total_investment` varchar(255) NOT NULL,
  `Audit_report_certificate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `incomeexpense_detail`
--

INSERT INTO `incomeexpense_detail` (`Incomeexpense_id`, `Panjrapol_id`, `Year`, `Donation_recevied`, `Donation_recevied1`, `Subsidy`, `Dividend`, `Other_income`, `Capital_income`, `Total_income`, `Grasswater_expense`, `Administration_expense`, `Advertisement_expense`, `Construction_expense`, `Total_expense`, `Net_surplus`, `Investment`, `Savings`, `Shares`, `Total_investment`, `Audit_report_certificate`) VALUES
(1, 17, '2017-2018', '1000', '1000', '1000', '1000', '1000', '1000', '6000', '1000', '1000', '1000', '1000', '4000', '2000', '1000', '1000', '1000', '3000', '../certificates/FGHJI1514IMG_20171213_145248622.jpg'),
(2, 21, '2017-2018', '1000', '1000', '1000', '1000', '10001', '100', '14101', '1000', '100', '100', '100', '1300', '12801', '1000', '1000', '1000', '3000', '../certificates/GVG1413IMG_20171213_145248622.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `panjrapol_detail`
--

CREATE TABLE `panjrapol_detail` (
  `Panjrapol_id` int(255) NOT NULL,
  `Panjrapol_name` varchar(255) NOT NULL,
  `State_id` int(255) NOT NULL,
  `City_id` int(255) NOT NULL,
  `District` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `Pincode` varchar(255) NOT NULL,
  `Foundation_year` varchar(255) NOT NULL,
  `Registration_no` varchar(255) NOT NULL,
  `Registration_date` varchar(255) NOT NULL,
  `Charity_commisioner_certificate` varchar(255) NOT NULL,
  `Income_tax_12Acertificate` varchar(255) NOT NULL,
  `Income_tax_80Gcertificate` varchar(255) NOT NULL,
  `Pan_no` varchar(255) NOT NULL,
  `Pancard_certificate` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile_no` varchar(255) NOT NULL,
  `Is_allow` tinyint(1) NOT NULL DEFAULT '0',
  `Registration_no12A` varchar(255) NOT NULL,
  `Registration_date12A` varchar(255) NOT NULL,
  `Registration_no80G` varchar(255) NOT NULL,
  `Registration_date80G` varchar(255) NOT NULL,
  `Pancard_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `panjrapol_detail`
--

INSERT INTO `panjrapol_detail` (`Panjrapol_id`, `Panjrapol_name`, `State_id`, `City_id`, `District`, `Address`, `Pincode`, `Foundation_year`, `Registration_no`, `Registration_date`, `Charity_commisioner_certificate`, `Income_tax_12Acertificate`, `Income_tax_80Gcertificate`, `Pan_no`, `Pancard_certificate`, `Email`, `Mobile_no`, `Is_allow`, `Registration_no12A`, `Registration_date12A`, `Registration_no80G`, `Registration_date80G`, `Pancard_date`) VALUES
(16, 'TEST', 14, 12, 'ahmedabad', 'd/9-A panchratna appt. opp. sunview tower', '380052', '2018-03-21', 'hh567', '2018-03-23', '../certificates/TEST1412New Doc 2018-03-22_1.jpg', '../certificates/TEST1412New Doc 2018-03-22_2.jpg', '../certificates/TEST1412New Doc 2018-03-22.pdf', 'ghjkl567hj', '../certificates/TEST1412New Doc 2018-03-22_5.jpg', 'ishani@gmail.com', '+919834256789', 0, 'ghjk678', '2018-03-08', '6789hjk', '2018-03-10', ''),
(17, 'FGHJI', 15, 14, '', 'vcxcvbnmnbgffghj', '345678', '2018-04-01', '', '', '', '', '', '', '', 'hh@gmail.com', '5678904590', 0, '', '', '', '', ''),
(18, 'VBNMNBG', 14, 12, '', 'vbnjhg..jh', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(19, 'FGHJHG', 14, 13, '', 'fghjkk,jhg', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(20, 'FGHJ', 14, 12, '', 'rtghjkjhg', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', ''),
(21, 'GVG', 14, 13, '', 'ghvbuyhgyu', '345678', '', '', '', '', '', '', '', '', 'dhsd@gmail.com', '', 0, '', '', '', '', ''),
(22, 'DFGHJ', 14, 12, '', 'cvbnm,.', '', '', '', '', '', '', '', '', '', '', '', 0, '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `property_detail`
--

CREATE TABLE `property_detail` (
  `Property_id` int(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Area_sq_ft` varchar(255) NOT NULL,
  `Evidence` varchar(255) NOT NULL,
  `Installed_capacity` varchar(255) NOT NULL,
  `State_id` int(255) NOT NULL,
  `City_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_detail`
--

INSERT INTO `property_detail` (`Property_id`, `Panjrapol_id`, `Area_sq_ft`, `Evidence`, `Installed_capacity`, `State_id`, `City_id`) VALUES
(4, 16, '45678', '../certificates/TEST1412New Doc 2018-02-17 (2).jpg', '160', 14, 12),
(5, 16, '6578', '../certificates/TEST1412p2.jpg', '1967', 15, 14),
(8, 17, '567', '', '4567', 14, 13),
(9, 21, '345', '', '456', 14, 12);

-- --------------------------------------------------------

--
-- Table structure for table `state_detail`
--

CREATE TABLE `state_detail` (
  `State_id` int(255) NOT NULL,
  `State_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state_detail`
--

INSERT INTO `state_detail` (`State_id`, `State_name`) VALUES
(14, 'GUJARAT'),
(15, 'DELHI'),
(16, 'KARNATAKA');

-- --------------------------------------------------------

--
-- Table structure for table `trustee_detail`
--

CREATE TABLE `trustee_detail` (
  `Trustee_id` int(255) NOT NULL,
  `Trustee_name` varchar(255) NOT NULL,
  `Panjrapol_id` int(255) NOT NULL,
  `Position` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `City_id` int(255) NOT NULL,
  `Mobile_no` varchar(255) NOT NULL,
  `Validity_term` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trustee_detail`
--

INSERT INTO `trustee_detail` (`Trustee_id`, `Trustee_name`, `Panjrapol_id`, `Position`, `Address`, `City_id`, `Mobile_no`, `Validity_term`) VALUES
(1, 'jainy vora', 16, 'ceo', '123/gurukul,char rasta', 12, '+919834256789', '28 years'),
(2, 'dev', 16, 'secretory', 'njknjkdcnkdc/', 15, '8765456789', '20 years'),
(9, 'dfgh', 17, 'sdfghj', 'sdfghgfre', 13, '9426319416', '20 year'),
(10, 'dfg', 21, '', 'dfghjk', 14, '345678', '23 year');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `animal_detail`
--
ALTER TABLE `animal_detail`
  ADD PRIMARY KEY (`Animal_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `auditor_detail`
--
ALTER TABLE `auditor_detail`
  ADD PRIMARY KEY (`Auditor_id`),
  ADD KEY `City_id` (`City_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD PRIMARY KEY (`Bank_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `city_detail`
--
ALTER TABLE `city_detail`
  ADD PRIMARY KEY (`City_id`),
  ADD KEY `State_id` (`State_id`);

--
-- Indexes for table `contact_detail`
--
ALTER TABLE `contact_detail`
  ADD PRIMARY KEY (`Contact_id`);

--
-- Indexes for table `donor_detail`
--
ALTER TABLE `donor_detail`
  ADD PRIMARY KEY (`Donor_id`),
  ADD KEY `panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `image_detail`
--
ALTER TABLE `image_detail`
  ADD PRIMARY KEY (`Image_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `incomeexpense_detail`
--
ALTER TABLE `incomeexpense_detail`
  ADD PRIMARY KEY (`Incomeexpense_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `panjrapol_detail`
--
ALTER TABLE `panjrapol_detail`
  ADD PRIMARY KEY (`Panjrapol_id`),
  ADD KEY `State_id` (`State_id`),
  ADD KEY `City_id` (`City_id`);

--
-- Indexes for table `property_detail`
--
ALTER TABLE `property_detail`
  ADD PRIMARY KEY (`Property_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`);

--
-- Indexes for table `state_detail`
--
ALTER TABLE `state_detail`
  ADD PRIMARY KEY (`State_id`);

--
-- Indexes for table `trustee_detail`
--
ALTER TABLE `trustee_detail`
  ADD PRIMARY KEY (`Trustee_id`),
  ADD KEY `Panjrapol_id` (`Panjrapol_id`),
  ADD KEY `City_id` (`City_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `animal_detail`
--
ALTER TABLE `animal_detail`
  MODIFY `Animal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `auditor_detail`
--
ALTER TABLE `auditor_detail`
  MODIFY `Auditor_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `bank_detail`
--
ALTER TABLE `bank_detail`
  MODIFY `Bank_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `city_detail`
--
ALTER TABLE `city_detail`
  MODIFY `City_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `contact_detail`
--
ALTER TABLE `contact_detail`
  MODIFY `Contact_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `donor_detail`
--
ALTER TABLE `donor_detail`
  MODIFY `Donor_id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `image_detail`
--
ALTER TABLE `image_detail`
  MODIFY `Image_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `incomeexpense_detail`
--
ALTER TABLE `incomeexpense_detail`
  MODIFY `Incomeexpense_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `panjrapol_detail`
--
ALTER TABLE `panjrapol_detail`
  MODIFY `Panjrapol_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `property_detail`
--
ALTER TABLE `property_detail`
  MODIFY `Property_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `state_detail`
--
ALTER TABLE `state_detail`
  MODIFY `State_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `trustee_detail`
--
ALTER TABLE `trustee_detail`
  MODIFY `Trustee_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `animal_detail`
--
ALTER TABLE `animal_detail`
  ADD CONSTRAINT `animal_detail_ibfk_1` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `auditor_detail`
--
ALTER TABLE `auditor_detail`
  ADD CONSTRAINT `auditor_detail_ibfk_1` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bank_detail`
--
ALTER TABLE `bank_detail`
  ADD CONSTRAINT `bank_detail_ibfk_2` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city_detail`
--
ALTER TABLE `city_detail`
  ADD CONSTRAINT `city_detail_ibfk_1` FOREIGN KEY (`State_id`) REFERENCES `state_detail` (`State_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donor_detail`
--
ALTER TABLE `donor_detail`
  ADD CONSTRAINT `donor_detail_ibfk_1` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `image_detail`
--
ALTER TABLE `image_detail`
  ADD CONSTRAINT `image_detail_ibfk_1` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `incomeexpense_detail`
--
ALTER TABLE `incomeexpense_detail`
  ADD CONSTRAINT `incomeexpense_detail_ibfk_1` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `panjrapol_detail`
--
ALTER TABLE `panjrapol_detail`
  ADD CONSTRAINT `panjrapol_detail_ibfk_1` FOREIGN KEY (`State_id`) REFERENCES `state_detail` (`State_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `panjrapol_detail_ibfk_2` FOREIGN KEY (`City_id`) REFERENCES `city_detail` (`City_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `property_detail`
--
ALTER TABLE `property_detail`
  ADD CONSTRAINT `property_detail_ibfk_1` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `trustee_detail`
--
ALTER TABLE `trustee_detail`
  ADD CONSTRAINT `trustee_detail_ibfk_1` FOREIGN KEY (`City_id`) REFERENCES `city_detail` (`City_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trustee_detail_ibfk_2` FOREIGN KEY (`Panjrapol_id`) REFERENCES `panjrapol_detail` (`Panjrapol_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
