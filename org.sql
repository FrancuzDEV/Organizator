-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Wersja serwera:               10.4.22-MariaDB - mariadb.org binary distribution
-- Serwer OS:                    Win64
-- HeidiSQL Wersja:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Zrzut struktury tabela organizator.todo
CREATE TABLE IF NOT EXISTS `todo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `whatlikedo` varchar(255) NOT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `zrobione` varchar(50) DEFAULT 'FALSE',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Zrzucanie danych dla tabeli organizator.todo: ~0 rows (około)
/*!40000 ALTER TABLE `todo` DISABLE KEYS */;
INSERT INTO `todo` (`id`, `whatlikedo`, `ip`, `zrobione`) VALUES
	(2, 'Zrobione', '::1', 'TRUE'),
	(3, 'Fajnie', '::1', 'TRUE'),
	(4, 'No nie zrobione', '::1', 'TRUE'),
	(5, 'Nie wiem', '::1', 'TRUE');
/*!40000 ALTER TABLE `todo` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
