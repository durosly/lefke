-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2021 at 06:34 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esl`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `body`) VALUES
(1, 'SYNTHESIS AND SOME ENVIRONMENTAL APPLICATIONS OF NANOPARTICLES', 'Nanotechnology is a forthcoming technology that offers promising solution for\r\ntreating pollution by changing size and shape of the material at the nanoscale.\r\nNanoparticles are the building blocks of numerous approaches for realizing\r\nnanostructure materials and devices. The used of nanoparticles in diverse\r\napplications make them \"tiny heroes\" that bring out certain processes which were\r\notherwise unfeasible. This review focuses on synthesis and application of\r\nnanoparticles on the ongoing research to the environment. The synthesis and\r\nenvironmental applications of nanoparticles has been reviewed. Nanoparticles are\r\nbeen classified based on their dimension, origin and its structure and their synthesis\r\nprocess can be biological, chemical and physical, their synthesis from chemical and\r\nbiological (plants and microbes) are listed and discussed. The environmental\r\napplication of nanoparticles as pollutants remediation is the most promising one due\r\nto large surface area and small size, enable then to absorb large amount of pollutants\r\nand there are found to have excellent performance compared to other conventional\r\nmethods in groundwater remediation, treatment of contaminated soils, solid\r\nwastes, adsorption of heavy metal ions and adsorption of organic contaminants and\r\ngreenhouse gases.'),
(2, 'ASSESSMENT OF GROUNDWATER QUALITY USING WATER QUALITY INDEX IN\r\nWARRI METROPOLIS, DELTA STATE, NIGERIA.', 'Water Quality Index was used to assess suitability of groundwater quality in Warri\r\nMetropolis. The groundwater samples, collected from sixteen selected boreholes\r\nover a period of three months, were subjected to comprehensive physico-chemical\r\nand bacteriological analysis by applying standard procedures.The study was\r\nintended to ascertain the quality of water for public consumption, recreation and\r\nother purposes. The mean values of thirteen important parameters were calculated\r\nand were computed to water quality index (WQI) using the weighted arithmetic\r\nindex method. Only two of the sixteen parameters analysed; pH and dissolved\r\noxygen were above regulatory standard limit. The calculated water quality index\r\n(WQI) showed that the index for the locations range from 24.2 (Otokutu) to 38.5\r\n(NPA) indicating good to excellent water quality. It was observed that most of the\r\ngroundwater indicating excellent water quality are from the semi-urban areas\r\n(Jeddo, Otokutu and Ugbomro) while majority of the locations indicating good water\r\nquality are from the urban and well populated areas of the metropolis. Some of these\r\nurban areas have poor sanitary and waste disposal conditions with industries and\r\nfactories located within their locations. This result indicates that water from the\r\nunderground are generally clean and fit-for-purpose with respect to portability,\r\nrecreation and other purposes but anthropogenic factors may affect the water either\r\nby the method used for abstraction or the storage means. Overall the results indicate\r\nthat the different water samples analysed from the groundwater from Warri\r\nMetropolis are safe for human consumptions and domestics purposes.');

-- --------------------------------------------------------

--
-- Table structure for table `complain`
--

CREATE TABLE `complain` (
  `id` int(11) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `category` enum('land','air','water') NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `complain`
--

INSERT INTO `complain` (`id`, `message`, `date`, `category`, `user_id`) VALUES
(1, 'nice to meet you', '2021-06-04', 'water', 2);

-- --------------------------------------------------------

--
-- Table structure for table `contact_msg`
--

CREATE TABLE `contact_msg` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_msg`
--

INSERT INTO `contact_msg` (`id`, `email`, `message`) VALUES
(1, 'slyboydon1@gmail.com', 'nice'),
(2, 'slyboydon1@gmail.com', 'nice'),
(3, 'slyboydon1@gmail.com', 'Tok say');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `password`) VALUES
(2, 'Wilfred', 'Mike', 'test@gmail.com', '$2y$10$UMMtcUweqA1StrMPoe0DcesI0DaaY0Rd3Q2kEuaZ0WL2zTNCByOkK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complain`
--
ALTER TABLE `complain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_msg`
--
ALTER TABLE `contact_msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `complain`
--
ALTER TABLE `complain`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_msg`
--
ALTER TABLE `contact_msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
