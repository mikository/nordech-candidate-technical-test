CREATE DATABASE  IF NOT EXISTS `nordech_challenge`;
USE `nordech_challenge`;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP TABLE IF EXISTS `universities`;
CREATE TABLE `universities` (
  `id` int(11) NOT NULL,
  `webPage` longtext DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `domain` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;





DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `loginAttempts` int(11) NOT NULL,
  `lockedOut` tinyint(1) NOT NULL,
  `lockedoutUntil` datetime DEFAULT NULL,
  `passwordExpire` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


INSERT INTO `users` (`ID`, `email`, `password`, `loginAttempts`, `lockedOut`, `lockedoutUntil`, `passwordExpire`) VALUES
(1, 'carcus@aol.com', 'Mcknight', 0, 0, NULL, '2020-08-01 00:00:00'),
(2, 'jsnover@hotmail.com', 'Barrera', 2, 0, NULL, '2020-08-01 00:00:00'),
(3, 'ahuillet@hotmail.com', 'Blackburn', 3, 1, '2021-09-01 00:00:00', '2020-08-01 00:00:00'),
(4, 'kassiesa@msn.com', 'Stein', 3, 1, '2021-09-01 00:00:00', '2020-08-01 00:00:00'),
(5, 'sblack@live.com', 'Gallegos', 2, 0, NULL, '2020-08-01 00:00:00'),
(6, 'steve@outlook.com', 'Leblanc', 1, 0, NULL, '2020-08-01 00:00:00'),
(7, 'wiseb@live.com', 'Dawson', 0, 0, NULL, '2020-09-01 00:00:00'),
(8, 'dkrishna@hotmail.com', 'Riggs', 0, 0, NULL, '2020-09-01 00:00:00'),
(9, 'hillct@me.com', 'Riggs', 0, 0, NULL, '2020-09-01 00:00:00'),
(10, 'gozer@yahoo.ca', 'Sheppard', 0, 0, NULL, '2020-09-01 00:00:00'),
(11, 'pthomsen@optonline.net', 'Cain', 0, 0, NULL, '2020-09-01 00:00:00'),
(12, 'bryant@aol.com', 'Bryant', 0, 0, NULL, '2020-09-01 00:00:00'),
(13, 'test@test.com', 'test', 2, 0, NULL, '2020-08-01 00:00:00');

ALTER TABLE `universities`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

ALTER TABLE `universities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2551;

ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=524;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
