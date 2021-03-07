-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: sql.endora.cz:3312
-- Generation Time: Mar 07, 2021 at 08:54 PM
-- Server version: 5.6.45-86.1
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skolenia`
--

-- --------------------------------------------------------

--
-- Table structure for table `certificate`
--

CREATE TABLE `certificate` (
  `certificate_id` int(11) NOT NULL,
  `evidence_num` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `types` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `os` varchar(255) DEFAULT NULL,
  `aop` varchar(255) DEFAULT NULL,
  `person_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `os_exp` varchar(255) DEFAULT NULL,
  `aop_exp` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `certificate`
--

INSERT INTO `certificate` (`certificate_id`, `evidence_num`, `types`, `os`, `aop`, `person_id`, `course_id`, `os_exp`, `aop_exp`) VALUES
(15, '', '', '2020-01-22', '', 13, 14, '2021-01-22', ''),
(16, '', '', '2020-01-22', '', 13, 15, '2022-01-22', ''),
(17, '', '', '2020-01-22', '', 13, 16, '2022-01-22', ''),
(18, '', '', '2020-01-22', '', 14, 15, '2022-01-22', ''),
(19, '', '', '2020-01-22', '', 14, 14, '2021-01-22', ''),
(20, '', '', '2020-01-22', '', 14, 16, '2022-01-22', ''),
(21, '', '', '2020-01-22', '', 15, 15, '2022-01-22', ''),
(22, '', '', '2020-01-22', '', 15, 14, '2021-01-22', ''),
(23, '', '', '2020-01-22', '', 15, 16, '2022-01-22', ''),
(24, '', '', '2020-01-22', '', 16, 15, '2022-01-22', ''),
(25, '', '', '2020-01-22', '', 16, 16, '2022-01-22', ''),
(26, '', '', '2020-01-22', '', 16, 14, '2021-01-22', ''),
(27, '', '', '2020-01-22', '', 17, 15, '2022-01-22', ''),
(28, '', '', '2020-01-22', '', 17, 14, '2021-01-22', ''),
(29, '', '', '2020-01-22', '', 17, 16, '2022-01-22', ''),
(30, '', '', '2020-01-22', '', 18, 15, '2022-01-22', ''),
(31, '', '', '2020-01-22', '', 18, 14, '2021-01-22', ''),
(32, '', '', '2020-01-22', '', 18, 16, '2022-01-22', ''),
(33, '', '', '2020-01-22', '', 19, 15, '2022-01-22', ''),
(34, '', '', '2020-01-22', '', 19, 14, '2021-01-22', ''),
(35, '', '', '2020-01-22', '', 19, 16, '2022-01-22', ''),
(36, '', '', '2020-01-22', '', 20, 15, '2022-01-22', ''),
(37, '', '', '2020-01-22', '', 20, 14, '2021-01-22', ''),
(38, '', '', '2020-01-22', '', 20, 16, '2022-01-22', ''),
(39, '', '', '2020-01-22', '', 21, 15, '2022-01-22', ''),
(40, '', '', '2020-01-22', '', 21, 14, '2021-01-22', ''),
(41, '', '', '2020-01-22', '', 21, 16, '2022-01-22', ''),
(42, '', '', '2020-01-22', '', 22, 15, '2022-01-22', ''),
(43, '', '', '2020-01-22', '', 22, 14, '2021-01-22', ''),
(44, '', '', '2020-01-22', '', 22, 16, '2022-01-22', ''),
(45, '', '', '2020-01-22', '', 23, 15, '2022-01-22', ''),
(46, '', '', '2020-01-22', '', 23, 14, '2021-01-22', ''),
(47, '', '', '2020-01-22', '', 23, 16, '2022-01-22', ''),
(48, '', '', '2020-01-22', '', 24, 15, '2022-01-22', ''),
(49, '', '', '2020-01-22', '', 24, 14, '2021-01-22', ''),
(50, '', '', '2020-01-22', '', 24, 16, '2022-01-22', ''),
(51, '', '', '2020-01-22', '', 25, 15, '2022-01-22', ''),
(52, '', '', '2020-01-22', '', 25, 14, '2021-01-22', ''),
(53, '', '', '2020-01-22', '', 25, 16, '2022-01-22', ''),
(54, '', '', '2020-01-22', '', 26, 15, '2022-01-22', ''),
(55, '', '', '2020-01-22', '', 26, 14, '2021-01-22', ''),
(56, '', '', '2020-01-22', '', 26, 16, '2022-01-22', ''),
(57, '', '', '2020-01-22', '', 27, 15, '2022-01-22', ''),
(58, '', '', '2020-01-22', '', 27, 14, '2021-01-22', ''),
(59, '', '', '2020-01-22', '', 27, 16, '2022-01-22', ''),
(60, '09/2018-01.2', '', NULL, '2018-01-26', 28, 19, '', '2023-01-26'),
(61, '', '', '2020-01-10', '', 28, 15, '2022-01-10', ''),
(62, '20181106-02', '§22 v objektoch triedy A do 1000 V vrátane bleskozvodov', '2020-01-07', '2018-11-16', 28, 20, '2022-01-07', '2023-11-16'),
(63, '20200115-05', 'a b c d f', '2020-01-15', '2020-01-15', 28, 23, '2021-01-15', '2025-01-15'),
(64, '20200206-04', '', '2020-02-06', '2020-02-06', 28, 32, '2022-02-06', '2025-02-06'),
(65, '20180921-01', '	I.II. A B C D E W1 W2 G', '2020-01-14', '2018-09-21', 28, 24, '2022-01-14', '2023-09-21'),
(66, '', '', '2020-01-10', '', 28, 16, '2022-01-10', ''),
(67, '20200128-04', 'samochodné rezačky,obilné kombajny', '2020-01-28', '2020-01-28', 28, 25, '2022-01-28', '2025-01-28'),
(68, '', '', '2020-01-08', '', 28, 14, '2021-01-08', ''),
(69, '', '', '2020-02-03', '', 28, 26, '2022-02-03', ''),
(70, '20200220-07', 'rýpadlo a hlbidlo, nakladací a vykladací stroj, autodomiešavač a automiešač', '2020-02-20', '2020-02-20', 28, 27, '2022-02-20', '2025-02-20'),
(71, '', '', '2020-01-08', '', 28, 17, '2022-01-08', ''),
(72, '', '', NULL, '2018-11-20', 28, 28, '', '2023-11-20'),
(73, '20180926-01', '', '2020-01-20', '2018-09-26', 28, 18, '2022-01-20', '2023-09-26'),
(74, 'ZZ20200108-129', 'Abobm.', '2020-01-08', '', 28, 29, '2021-01-08', ''),
(75, 'ZZ20200108-128', 'AaMŽ, AaKŽ, AaLP, AaHR, AaRN, Bd, Bc, Bh, Bb, Be, Bg, Bi, Cb, Cc, Cd, Bf, Ba1, Ba2', '2020-01-08', '', 28, 30, '2022-01-08', ''),
(77, '2019-07-06-10', '', '', '2019-08-17', 35, 38, '', '2024-08-17'),
(78, 'NR AA177121', 'C1, C', '', '2019-08-17', 35, 39, '', '2024-08-17'),
(79, '20190927-04', 'I.II.A B C D E W1 W2 G', '2019-09-27', '2019-09-27', 35, 24, '2021-09-27', '2024-09-27'),
(80, '20190920-07', '', '2019-09-20', '2019-09-20', 35, 18, '2021-09-20', '2024-09-20'),
(81, 'ZZ20190917-109', 'AaHR', '2019-09-17', '', 35, 30, '2021-09-17', ''),
(82, '2019-07-06-11', '', '', '2019-07-06', 36, 38, '', '2024-07-06'),
(83, 'NR AA177118', 'C1 C C1E CE', '', '2019-08-17', 36, 39, '', '2024-08-17'),
(84, '20190927-05', 'I.II.A B C D E W1 W2 G', '2019-09-27', '2019-09-27', 36, 24, '2021-09-27', '2024-09-27'),
(85, '20190920-08', '', '2019-09-20', '2019-09-20', 36, 18, '2021-09-20', '2024-09-20'),
(86, 'ZZ20190917-110', 'AaHR', '2019-09-17', '', 36, 30, '2021-09-17', ''),
(87, '20190927-06', 'I.II.A B C D E W1 W2 G', '2019-09-27', '2019-09-27', 37, 24, '2021-09-27', '2024-09-27');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `contact_person` varchar(255) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `ico` varchar(255) DEFAULT NULL,
  `dic` varchar(255) DEFAULT NULL,
  `ic_dph` varchar(255) DEFAULT NULL,
  `company_address` varchar(500) CHARACTER SET utf8mb4 DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `phone`, `contact_person`, `email`, `ico`, `dic`, `ic_dph`, `company_address`) VALUES
(30, 'súkromne - Roland Izsóf', '0902 191 843', 'Roli', 'roland.izsof@gmail.com', '53451899', '1120515077', '', '927 05, Dlhá nad Váhom 313'),
(29, 'DJT TRANS, s.r.o.', '0905 251 394', 'Ján Deák', '', '50058738', '2120169656', '2120169656', 'Matúškovská cesta 885/12 924 01 Galanta'),
(28, 'Webasto Convertibles Slovakia s.r.o.', '0905 517 303', 'Lucia Lénárt', 'webasto@webasto.gmail.com', '44939426', '2022879089', '2022879089', 'Táborská 66, 932 01 Veľký Meder'),
(31, 'súkromne - Erik Izsóf', '903', NULL, 'izsof.erik@gmail.com', '51339609', '1121511501', NULL, 'Dlhá nad Váhom 313'),
(32, 'TZB Pro-Real s.r.o.', '0915 042 546', 'Bálint', 'lanczbalint@gmail.com', '47962038', '2024158697', '2024158697', 'Mierové námestie 940/1 924 01 Galanta'),
(33, 'súkromne - Ladislav Deák', '0948 016 266', 'Lackó Deák', '', '', '', '', 'Nová 414, 925 32 Veľká Mača'),
(34, 'ABAmet, s.r.o.', '0905 989 118', 'Kati Duba', 'dubak@abamet.eu', '47966947', '2024158279', '2024158279', 'Mierové nám. 4, 924 01 Galanta'),
(35, 'metaloBox Slovakia, s.r.o.', '0905 989 118', 'Kati Duba', 'dubak@abamet.eu', '35948248', '2022042814', '2022042814', 'Pražská 11, 949 01 Nitra'),
(36, 'súkromne - Viktor Bahík', '0948 227 962', 'Viktor', '', '', '', '', ''),
(37, 'Regenstav s.r.o.', '0915 411 545', 'Miro Regen', '', '48197777', '2120087431', '2120087431', 'Veľká Mača 1039, 925 32 Veľká Mača'),
(38, 'RACZIO s.r.o.', '0905 378 584', 'Feri Rácz', '', '50301055', '2120267105', '2120267105', 'Baka 780, 930 04 Baka'),
(39, 'ČAROLI, s.r.o.', '0905 605 083', 'Csányi', 'caroli@caroli.sk', '36564516', '2021888088', '2021888088', 'Kvetná 204/9 941 10 Tvrdošovce'),
(40, 'QUATTRO-H s.r.o.', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `os_time` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `aop_time` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `os_time`, `aop_time`) VALUES
(15, 'BOZP zamestnanci', '24', ''),
(19, 'Bezpečnostný technik BT', '0', '60'),
(14, 'Práca vo výškach a nad voľnou hĺbkou', '12', '0'),
(16, 'PO zamestnanci', '24', ''),
(17, 'Školenie vodičov', '24', ''),
(18, 'Viazač bremien', '24', '60'),
(20, 'Elektrotechnická spôsobilosť (§21,§22,§23)', '24', '60'),
(24, 'Motorové vozíky (VZV)', '24', '60'),
(23, 'Lešenie', '12', '60'),
(25, 'Poľnohospodárske stroje VYBRANÉ', '24', '60'),
(26, 'Prvá pomoc', '24', '0'),
(27, 'Stavebné stroje', '24', '60'),
(28, 'Technik požiarnej ochrany', '0', '60'),
(29, 'ZZ zdvíhacia plošina Ab mimo PK', '12', ''),
(30, 'ZZ Zdvíhacie zariadenia', '24', ''),
(31, 'Zdravotná spôsobilosť na prácu', '0', '60'),
(32, 'Motorové píly pri ťažbe dreva', '24', '60'),
(33, 'Poľnohospodárske stroje INÉ', '24', ''),
(34, 'Osobitné oprávnenie na kontroly hasiacich prístrojov', '0', '60'),
(35, 'Stavebné stroje Iné', '24', ''),
(36, 'Zváranie', '24', ''),
(38, 'Akreditovaný kurz prvej pomoci', '', '60'),
(39, 'Kvalifikačná karta vodiča (KKV)', '', '60');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `person_id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 NOT NULL,
  `birth` varchar(255) DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4,
  `occupation` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`person_id`, `name`, `birth`, `address`, `occupation`, `company_id`) VALUES
(14, 'Rekettei Dániel', '1956-09-01', '', 'Živnostník', 29),
(13, 'Krommel Krisztián', '1976-12-22', '', 'Živnostník', 29),
(12, 'Keket Jozef :D', '1998-07-22', '', 'Trvalý pracovný pomer', 28),
(15, 'Imre Lehoczky', '1969-03-15', '', 'Živnostník', 29),
(16, 'Béla Tóth', '1975-06-17', '', 'Živnostník', 29),
(17, 'György Nagy', '1971-10-08', '', 'Živnostník', 29),
(18, 'Sándor Zoltán Tolnai', '1970-06-24', '', 'Živnostník', 29),
(19, 'Zoltán Keindl', '1968-11-24', '', 'Živnostník', 29),
(20, 'Ladislav Hrbácsek', '1967-11-28', '', 'Živnostník', 29),
(21, 'Gábor Börcs', '1966-07-28', '', 'Živnostník', 29),
(22, 'František Horváth', '1972-11-03', '', 'Živnostník', 29),
(23, 'Ferenc Lázár', '1971-12-28', '', 'Živnostník', 29),
(24, 'Károly Csaba Tóth', '1982-04-30', '', 'Živnostník', 29),
(25, 'Ján Deák', '1968-04-06', '', 'Konateľ', 29),
(26, 'Zoltán Jakubec', '1984-12-28', '', 'Živnostník', 29),
(27, 'Zlatica Deákova', '1969-08-26', '', 'Živnostník', 29),
(28, 'Roland Izsóf Ing.', '1991-09-23', '', 'Živnostník', 30),
(30, 'Bálint Lancz, Ing.', '22-02-1990', '', 'Živnostník', 32),
(31, 'Benedik Slávik, Ing.', '12-11-1989', '', 'Živnostník', 32),
(32, 'David Regen', '14-03-2014', '', 'Živnostník', 37),
(33, 'Miroslav Regen', '15-03-2018', '', 'Živnostník', 37),
(35, 'Norbert Horváth', '1976-02-25', '', 'Trvalý pracovný pomer', 39),
(36, 'Michal Kuzslík', '1975-01-29', '', 'Trvalý pracovný pomer', 39),
(37, 'Dávid Szabó', '1994-08-25', '', 'Trvalý pracovný pomer', 39);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_password`) VALUES
(3, 'admin', 'd5bbdc5e7951c075a680af5427e18623'),
(9, 'Roli', 'f1d63da6e84b3044490b85977c7a2249');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `certificate`
--
ALTER TABLE `certificate`
  ADD PRIMARY KEY (`certificate_id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `person_id` (`person_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`person_id`),
  ADD KEY `company_id` (`company_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `certificate`
--
ALTER TABLE `certificate`
  MODIFY `certificate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `person_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
