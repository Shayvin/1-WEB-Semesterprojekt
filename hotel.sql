-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 15. Jan 2023 um 18:50
-- Server-Version: 10.4.21-MariaDB
-- PHP-Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `hotel`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `accounts`
--

CREATE TABLE `accounts` (
  `USERNAME` varchar(255) DEFAULT NULL,
  `PASSWORD` varchar(255) DEFAULT NULL,
  `FIRST_NAME` varchar(255) DEFAULT NULL,
  `LAST_NAME` varchar(255) DEFAULT NULL,
  `EMAIL` varchar(255) DEFAULT NULL,
  `SALUTATION` varchar(255) DEFAULT NULL,
  `ID` int(255) NOT NULL,
  `GROUP` int(10) DEFAULT NULL,
  `ACTIVE` int(20) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `accounts`
--

INSERT INTO `accounts` (`USERNAME`, `PASSWORD`, `FIRST_NAME`, `LAST_NAME`, `EMAIL`, `SALUTATION`, `ID`, `GROUP`, `ACTIVE`) VALUES
('test1', '$2y$10$geIHN6VtAE7uRbMoFXb4yemqvF49K2pNTL3UjFWdnXqaEHhCCtd2a', 'test1', 'fssdasdsad', 'asdasd@email.test', '1', 17, 1, 1),
('test2', '$2y$10$kVybjUa6mHyemNTE3L1YxevykYJhTqyeWciI2QgAIsMQWxJ0d2ATi', 'fdsfsdfsdfsdfsdf', 'sdfsgsdf', 'test@gmail.com', '1', 18, 2, 1),
('string', '$2y$10$rpT8sp3PigGpW1i9AVeTqengKEw5qHewnf1R9.THLkgdJm.MtbsXC', 'Sinisa', 'Panic', 'p.sinisa@gmail.com', '1', 19, NULL, 1),
('qwert', '$2y$10$oY5BCDJBBrzLNquwn0epieOoIQvgoMnQqeBDJdnO4k94Pp..EAM6a', 'qwertz12111111', 'qwertz', 'qwertz@gmail.com', '1', 20, NULL, 1);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `news`
--

CREATE TABLE `news` (
  `TITEL` varchar(255) DEFAULT NULL,
  `NEWS` text DEFAULT NULL,
  `CREATED_AT` varchar(255) DEFAULT NULL,
  `IMAGES` varchar(255) NOT NULL,
  `ID` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `news`
--

INSERT INTO `news` (`TITEL`, `NEWS`, `CREATED_AT`, `IMAGES`, `ID`) VALUES
('Test News', 'dasdasd', '1673800263', 'jpg-vs-jpeg.jpg', 195),
('Test Neu', 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.', '1673800333', 'restaurant.jpg', 196);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `rooms`
--

CREATE TABLE `rooms` (
  `ROOM_ID` int(255) NOT NULL,
  `ROOM_TYPE` varchar(255) NOT NULL,
  `GUEST_FIRSTNAME` varchar(255) CHARACTER SET armscii8 DEFAULT NULL,
  `GUEST_LASTNAME` varchar(255) DEFAULT NULL,
  `CHECKIN_DATE` date NOT NULL,
  `CHECKOUT_DATE` date NOT NULL,
  `RESERVATION_TIME` timestamp NOT NULL DEFAULT current_timestamp(),
  `STAT` varchar(255) NOT NULL DEFAULT 'New',
  `BREAKFAST` varchar(255) NOT NULL DEFAULT 'No',
  `PARKING` varchar(255) NOT NULL DEFAULT 'No',
  `PET` varchar(255) NOT NULL DEFAULT 'No',
  `USERNAME` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Daten für Tabelle `rooms`
--

INSERT INTO `rooms` (`ROOM_ID`, `ROOM_TYPE`, `GUEST_FIRSTNAME`, `GUEST_LASTNAME`, `CHECKIN_DATE`, `CHECKOUT_DATE`, `RESERVATION_TIME`, `STAT`, `BREAKFAST`, `PARKING`, `PET`, `USERNAME`) VALUES
(6, 'Suite', 'Sinisa', 'Panic', '2023-01-13', '2023-01-18', '2023-01-13 20:49:44', 'Confirm', 'Yes', 'Yes', 'No', 'string'),
(7, 'Doubleroom', 'Sinisa', 'Panic', '2023-01-28', '2023-02-01', '2023-01-14 09:13:10', 'Canceled', 'Yes', 'Yes', 'No', 'string'),
(8, 'Doubleroom', 'sadasd', 'asdasd', '2023-01-03', '2023-01-06', '2023-01-14 16:28:07', 'New', 'Yes', 'Yes', 'Yes', 'test2'),
(9, 'Suite', 'Dominik', 'Leitner', '2023-01-23', '2023-01-30', '2023-01-15 16:24:35', 'Confirm', 'No', 'Yes', 'No', 'test1');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`ID`);

--
-- Indizes für die Tabelle `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`ROOM_ID`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT für Tabelle `news`
--
ALTER TABLE `news`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=197;

--
-- AUTO_INCREMENT für Tabelle `rooms`
--
ALTER TABLE `rooms`
  MODIFY `ROOM_ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
