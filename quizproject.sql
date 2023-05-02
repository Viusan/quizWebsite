-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2023 at 06:50 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quizproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(256) DEFAULT NULL,
  `answer` varchar(256) NOT NULL,
  `display` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `answer`, `display`) VALUES
(10, 'Hvor mange dager er det til release?', 'Usikker, ikke noe bestemet dato', 1),
(11, 'Hvor mange spørsmål er det i en quiz?', 'Det varierer fra quiz til quiz', 1),
(12, 'Kan jeg lage spørsmål?', 'Du kan sende inn spørsmål så kan jeg vurdere det', 1),
(13, 'Hvor mange nivåer er det i hele spillet?', '', 0),
(14, 'Min bruker er banned, hva skal jeg gjøre?', '', 0),
(15, 'Hvordan lager jeg nettside?', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `usersId` int(11) NOT NULL,
  `usersName` varchar(128) NOT NULL,
  `usersEmail` varchar(128) NOT NULL,
  `usersUid` varchar(128) NOT NULL,
  `usersPwd` varchar(128) NOT NULL,
  `level` int(11) NOT NULL,
  `admin` int(1) DEFAULT 0,
  `banned` varchar(255) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`usersId`, `usersName`, `usersEmail`, `usersUid`, `usersPwd`, `level`, `admin`, `banned`) VALUES
(1, 'Jonathan Woodhouse', 'JWoodh@hotmail.com', 'JWoodh', '$2y$10$1Jg2U0zd6JrqqYuKH2l5xedtr8mrMbb3MFw9N6LEfJFuXzsrU3Zlq', 3, 0, '0'),
(18, 'Sanchay Phavan', 'sanchayphavanpower@gmail.com', 'Sanchay', '$2y$10$T11RyfySN0ofGZB/mrW.5OW/ePs0Y1eAKV4NILs1E6.pGyj7eZ.zi', 0, 0, '1'),
(20, 'Thea Kornmo', 'Theakornmo@hotmail.com', 'TheaK', '$2y$10$SxLI87Usl8mgfF/JaJLyGu/3ymdK1CxlDGFyX4jfE.B6Xgol2iTrq', 0, 0, '0'),
(25, 'Viu', 'viusansantos@gmail.com', 'viu', '$2y$10$UIdUhhFUAo2b3GL/M9A9j.h1G9MNb0s2Ssh0PI/dY6/QwjRHuQRD6', 3, 1, '0'),
(26, 'Vetle Heramb Krogh', 'vetle@hotmail.com', 'vetle', '$2y$10$KjSoH5.0kflL73xybQoqVOCLrpODsG8.uwdyU5z2LDr5g71rgkpW2', 0, 0, '1'),
(27, 'armand', 'cum@yahoo.cum', 'arkla', '$2y$10$kVAP7TdG1yNPwtlphWvKY.fk9laXiDTozWquD/DuKoJUY9rsBABXK', 2, 0, '0'),
(28, 'samuel', 's@gmail.com', 'samuel', '$2y$10$islaew2OUH.uSr3c8czSFuPDeMHRTjo56Hsyt4ucTBBtQ.hMXcdU6', 0, 0, '1'),
(29, 'a', 'a@a.a', 'a', '$2y$10$j.NADP8ldhdYgUBe.22k2uiySGDQqHw5RRYV1jLID3hAbGCWJs1tm', 3, 0, '0'),
(30, 'sanchay daniælsen', 'gay@sanchay.com', 'kulbil', '$2y$10$EOdf6ZS7fusQ7jXU.zs67udAw0UO5yk4S7fyUZyiCH3/PYd3WA11q', 2, 0, '0'),
(31, 'dig bick', 'hockeyole3@gmail.com', 'digbick', '$2y$10$Apu2wv7IvLX4D37wZDf/euoEMkZvAZpGXeF70KGS8S1FnS.JBBb8S', 3, 0, '0'),
(32, 'Adrian Georgiev Georgiev', 'fish&chips@gmail.com', 'FishAndChipsKriger', '$2y$10$U71zu1rfi.aQUeZ8EkcfOeO8/jQeX2.mDUBUDaDGCGEU/HrBh6OLK', 2, 0, '1'),
(33, 'yein', 'yomamasuckdick@gmail.com', 'yein', '$2y$10$oPV2Lp6HfImMEKntoRk1vOnlqlcQml8kfZ3oJO/wTrkaDYjlH2KbW', 3, 0, '0'),
(34, 'Admin User', 'admin@admin.com', 'Admin', '$2y$10$pyobkDqpxXD2s4NFBbB2seW02389ovpdqD9E6dy6StruOdCRppVDq', 0, 1, '0'),
(35, 'Martin Danielsen', 'vaidfas@gfmaflas.com', '12', '$2y$10$WKwkvS3EOjZVtj.JFgUlkOnv5HwZjhz6VhKKlaAUtAvmu.xH6dvg.', 0, 0, '0'),
(37, 'ygyugyug', 'w@d.com', '123', '$2y$10$Lh9RMpgLmETxUsr0TjcUMudqZWoIjClFz23FbUC6.NIyutbaD2ZOC', 0, 0, '0'),
(40, 'Malin Øien', 'nkjncjs@hdhiu.com', 'malin09', '$2y$10$hQelnT.23F8FrL5OStZSxOme9R0f8bkEn8K7GGaq0ZU6tCYmqN6ue', 3, 0, '0'),
(42, 'August', 'augi@gmail.com', 'AugiPlayz', '$2y$10$Fxu7TZbEBFPn6iK2GHCurOttnwheNZZl8HQyqqBzfJev6p9FsEo/G', 0, 0, '0'),
(43, 'Adrian Gerger', 'Gergermail@mail.com', 'UtenGrenser', '$2y$10$HwICI0lEoQtSrFYT2uBzfu06lRLEV8FFGZdMZmIWy6neHSoQLfAsu', 2, 0, '0'),
(44, 'Viusan', 'v@c.com', 'viugame', '$2y$10$75w7MiR1/YLMjUq8wHLWBO/gcixfZOZqH7v1CwwWgxgNzVQpQ8HpS', 0, 0, '0'),
(45, 'Viusan', 'as@ga.com', 'vafama', '$2y$10$4gv6R88stmM4BKmRXkMYWODI1Ahv5akvEA4LmLFEVGVAnNMEITdqW', 0, 0, '0'),
(46, 'gaji', 'viussantos@gmail.com', 'aaaaaahm', '$2y$10$tiPzeWOsfMZfT6jsKFNP6uqD4dq8EeWjthAFuHZrxB9FxtyIxQLYm', 0, 0, '0'),
(47, 'DKJBFKJ', 'viusanaaasantos@gmail.com', 'jjwjfw', '$2y$10$H.UfavSECA35HQWp4xE2euf21ixUXXOHEbVyc8GawXCtFKjwDM6/m', 0, 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`usersId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `usersId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
