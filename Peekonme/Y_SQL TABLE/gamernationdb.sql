-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2015 at 01:07 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamernationdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `buyer`
--

CREATE TABLE IF NOT EXISTS `buyer` (
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `Total_Expenditure` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buyer`
--

INSERT INTO `buyer` (`UserID`, `Total_Expenditure`) VALUES
('Hu0xing', 140),
('meatshield', 0),
('necrodiver', 0),
('necrodiverTesting', 0),
('necrodiverTesting2', 0),
('necrodiverTesting3', 0),
('pewpewbeam', 0),
('Testuser', 80);

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE IF NOT EXISTS `game` (
  `GameID` int(11) NOT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Publisher` varchar(255) DEFAULT NULL,
  `Year_Released` int(11) DEFAULT NULL,
  `Platform` varchar(255) DEFAULT NULL,
  `Region` varchar(255) DEFAULT NULL,
  `Price` float DEFAULT NULL,
  `ImagePath` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=159 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GameID`, `Title`, `Publisher`, `Year_Released`, `Platform`, `Region`, `Price`, `ImagePath`) VALUES
(1, 'DIABLO 3', 'BLIZZARD', 2015, 'PC', 'ASIA', 40, 'Picture/diablo_3.jpg'),
(2, 'STARCRAFT 2', 'BLIZZARD', 2000, 'PC', 'US', 60, 'Picture/SC2_Heart_of_the_Swarm_cover.jpg'),
(3, 'TOTAL WAR ROME', 'SEGA EUROPE', 2000, 'PC', 'EURO', 14, 'Picture/Total_War_Rome_II_cover.jpg'),
(4, 'AIRLINE TYCOON 2', ' KALYPSO MEDIA DIGITAL', 5021, 'XBOX', 'SG', 30, 'Picture/Airline_Tycoon_2_Gold_Edition_Cover.jpg'),
(6, 'ARMA III', 'BOHEMIA INTERACTIVE', 2013, 'PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(7, 'TOTAL WAR: SHOGUN 2 GOLD EDITION', 'SEGA EUROPE', 2013, 'PC', 'EURO', 50, 'Picture/no_image_available.jpg'),
(8, 'COMPANY OF HEROES 2', 'SEGA EUROPE', 2013, 'PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(10, 'NINJA GAIDEN SIGMA 2 PLUS', 'TECMO KOEI GAMES CO.LTD', 2013, 'Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(12, 'PS3 BEST HIT COLLECTION VOL. 2', 'SONY COMPUTER ENTERTAINMENT INC', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(13, 'NCAA FOOTBALL 14', 'ELECTRONIC ARTS', 2013, 'Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(14, 'DYNASTY WARRIORS 7 EMPIRES', 'TECMO KOEI GAMES CO. LTD', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(15, 'SAINTS ROW 4', 'KOCH MEDIA', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(16, 'ARMY OF TWO: THE DEVIL''S CARTEL', 'ELECTRONIC ARTS', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(17, 'DEADPOOL', 'ACTIVISION', 2013, 'Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(18, 'STARCRAFT II: HEART OF THE SWARM', 'BLIZZARD ENTERTAINMENT', 2013, 'Macintosh,PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(22, 'BEJEWELED 3', 'EA GAMES', 2012, 'Macintosh,Nintendo DS,PC,Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(23, 'TOMB RAIDER (2013)', 'SQUARE ENIX', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(24, 'ARCANIA: THE COMPLETE TALE', 'NORDIC GAMES', 2013, 'Sony Playstation 3,Xbox 360', 'EURO', 50, 'Picture/no_image_available.jpg'),
(25, 'GUNDAM BREAKER', 'NAMCO BANDAI', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(29, 'ANGRY BIRDS: STAR WARS', 'ACTIVISION', 2013, 'Nintendo Wii,Nintendo 3DS,Nintendo Wii U,Sony Playstation 3,Sony PS Vita,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(30, 'PUPPETEER', 'SONY COMPUTER ENTERTAINMENT INC.', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(33, 'DEAD OR ALIVE 5 ULTIMATE', 'TECMO KOEI', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(34, 'ARCADIAS NO IKUSAHIME', 'NIPPON ICHI SOFTWARE INC', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(35, 'SIMCITY: CITIES OF TOMORROW', 'ELECTRONIC ARTS', 2013, 'Macintosh,PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(36, 'NEED FOR SPEED: RIVALS', 'ELECTRONIC ARTS', 2013, 'PC,Sony Playstation 3,Sony Playstation 4,Xbox 360,Xbox One', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(37, 'FIFA MANAGER 14', 'ELECTRONIC ARTS', 2013, 'PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(38, 'THE CROODS: PREHISTORIC PARTY!', 'D3 PUBLISHER OF AMERICA', 2013, 'Nintendo DS,Nintendo Wii,Nintendo 3DS,Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(39, 'LUIGI''S MANSION: DARK MOON', 'NINTENDO OF AMERICA', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(41, 'MONSTER HUNTER 3 ULTIMATE', 'CAPCOM', 2013, 'Nintendo 3DS,Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(42, 'SINS OF A SOLAR EMPIRE: REBELLION', 'KALYPSO', 2013, 'PC', 'US', 50, 'Picture/no_image_available.jpg'),
(43, 'ANIMAL CROSSING: NEW LEAF', 'NINTENDO OF AMERICA', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(44, 'LOST PLANET 3', 'CAPCOM', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(45, 'FIFA 14', 'ELECTRONIC ARTS', 2013, 'Nintendo Wii,Nintendo 3DS,PC,Sony Playstation 3,Sony Playstation 4,Sony Playstation Portable (PSP),Sony PS Vita,Xbox 360,Xbox One', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(47, 'SLY COOPER: THIEVES IN TIME', 'SONY COMPUTER ENTERTAINMENT INC', 2013, 'Sony Playstation 3,Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(48, 'MURAMASA REBIRTH', 'AKYSYS / MARVELOUS AQL INC', 2013, 'Sony PS Vita', 'ASIA,US', 50, 'Picture/no_image_available.jpg'),
(49, 'SHIN MEGAMI TENSEI 4', 'ATLUS', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(50, 'TURBO: SUPER STUNT SQUAD', 'D3PUBLISHER', 2013, 'Nintendo DS,Nintendo Wii,Nintendo 3DS,Nintendo Wii U,Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(51, 'ARMORED CORE: VERDICT DAY', 'NAMCO BANDAI GAMES', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(52, 'PROJECT X ZONE', 'NAMCO BANDAI GAMES', 2013, 'Nintendo 3DS', 'US', 50, 'Picture/no_image_available.jpg'),
(54, 'THE SIMS 3 MOVIE STUFF', 'ELECTRONIC ARTS', 2013, 'Macintosh,PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(56, 'HEAVY FIRE: SHATTERED SPEAR', 'MASTIFF', 2013, 'PC,Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(58, 'FIRE EMBLEM: AWAKENING', 'NINTENDO OF AMERICA', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(59, 'THE SIMS 3 ISLAND PARADISE', 'ELECTRONIC ARTS', 2013, 'Macintosh,PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(60, 'SUPERSTARS V8 NEXT CHALLENGE', 'BLACK BEAN GAMES', 2010, 'PC,Sony Playstation 3,Xbox 360', 'EURO', 50, 'Picture/no_image_available.jpg'),
(61, 'STAR TREK', 'NAMCO BANDAI GAMES', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(64, 'GAME & WARIO', 'NINTENDO OF AMERICA', 2013, 'Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(65, 'RUNE FACTORY 4', 'XSEED GAMES', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(67, 'AIRLINE TYCOON 2 GOLD EDITION', 'KALYPSO', 2013, 'PC', 'US', 50, 'Picture/no_image_available.jpg'),
(68, 'THE LAST OF US', 'SONY COMPUTER ENTERTAINMENT INC', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(69, 'SUPER BLACK BASS 3D', 'RISING STAR GAMES', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(70, 'BATMAN: ARKHAM ORIGINS', 'WARNER BROS', 2013, 'PC,Nintendo Wii U,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(71, 'FINAL FANTASY XIV: A REALM REBORN', 'SQUARE ENIX', 2013, 'PC,Sony Playstation 3', 'EURO', 50, 'Picture/no_image_available.jpg'),
(72, 'RIDE TO HELL: RETRIBUTION', 'KOCH MEDIA', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(73, 'MOTOGP 13', 'MILESTONE', 2013, 'Sony Playstation 3', 'EURO', 50, 'Picture/no_image_available.jpg'),
(74, 'WWE 2K14', 'TAKE 2/2K', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(76, 'THE BUREAU: XCOM DECLASSIFIED', 'TAKE 2 / 2K MARIN', 2013, 'Macintosh,PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(78, 'RAYMAN LEGENDS', 'UBISOFT', 2013, 'PC,Nintendo Wii U,Sony Playstation 3,Sony PS Vita,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(79, 'DISNEY PLANES', 'DISNEY INTERACTIVE', 2013, 'Nintendo DS,Nintendo Wii,Nintendo 3DS,Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(80, 'NEW SUPER LUIGI U', 'NINTENDO OF AMERICA', 2013, 'Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(81, 'PIKMIN 3', 'NINTENDO OF AMERICA', 2013, 'Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(82, 'SWEET FUSE: AT YOUR SIDE', 'AKSYS', 2013, 'Sony Playstation Portable (PSP)', 'US', 50, 'Picture/no_image_available.jpg'),
(83, 'MARIO & LUIGI: DREAM TEAM', 'NINTENDO OF AMERICA', 2013, 'Nintendo 3DS', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(85, 'NBA 2K14', 'TAKE 2/2K SPORTS/VISUAL CONCEPTS', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(86, 'FABLE ANNIVERSARY', 'LIONHEAD STUDIOS', 2013, 'Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(87, 'RAGNAROK ODYSSEY ACE', 'GUNGHO ONLINE ENTERTAINMENT CO.LTD', 2013, 'Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(89, 'DYNASTY WARRIORS 8', 'TECMO KOEI', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(90, 'METRO: LAST LIGHT', 'KOCH MEDIA', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(91, 'THE SMURFS 2', 'UBISOFT', 2013, 'Nintendo Wii,Nintendo Wii U,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(92, 'INJUSTICE: GODS AMONG US', 'WARNER BROS', 2013, 'Nintendo Wii U,Sony Playstation 3,Xbox 360', 'EURO', 50, 'Picture/no_image_available.jpg'),
(93, 'WARGAME: AIRLAND BATTLE', 'FOCUS HOME', 2013, 'PC', 'EURO', 50, 'Picture/no_image_available.jpg'),
(94, 'DRAGON''S DOGMA: DARK ARISEN', 'CAPCOM', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(95, 'BORDERLANDS 2: BONUS CONTENT PACK', 'TAKE2/2K GAMES/GEARBOX', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(96, 'DISGAEA D2', 'NIPPON ICHI SOFTWARE INC.', 2013, 'Sony Playstation 3', 'ASIA,JP', 50, 'Picture/no_image_available.jpg'),
(97, 'DEAD ISLAND: RIPTIDE', 'TECHLAND / DEEP SILVER', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(98, 'SPELLFORCE: COMPLETE COLLECTION', 'NORDIC GAMES', 2012, 'PC', 'EURO', 50, 'Picture/no_image_available.jpg'),
(99, 'MADDEN NFL 25', 'ELECTRONIC ARTS', 2013, 'Sony Playstation 3,Sony Playstation 4,Xbox 360,Xbox One', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(100, 'KILLER IS DEAD', 'SONY COMPUTER ENTERTAINMENT INC / XSEED GAMES', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(101, 'MLB 13: THE SHOW', 'SONY COMPUTER ENTERTAINMENT INC.', 2013, 'Sony Playstation 3,Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(102, 'BROOKTOWN HIGH', 'KONAMI', 2007, 'Sony Playstation Portable (PSP)', 'US', 50, 'Picture/no_image_available.jpg'),
(103, 'LEGO MARVEL SUPER HEROES', 'WARNER BROS', 2013, 'Nintendo DS,Nintendo 3DS,PC,Nintendo Wii U,Sony Playstation 3,Sony Playstation 4,Sony PS Vita,Xbox 360,Xbox One', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(104, 'ALIENS: COLONIAL MARINES', 'SEGA EUROPE', 2013, 'PC,Sony Playstation 3,Xbox 360', 'EURO', 50, 'Picture/no_image_available.jpg'),
(105, 'REMEMBER ME', 'CAPCOM', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(107, 'DISGAEA D2: A BRIGHTER DARKNESS', 'NIPPON ICHI SOFTWARE', 2013, 'Sony Playstation 3', 'ASIA,US', 50, 'Picture/no_image_available.jpg'),
(108, 'PS3 BEST HIT COLLECTION VOL. 1', 'SONY COMPUTER ENTERTAINMENT INC', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(109, 'TIME AND ETERNITY', 'NIS', 2013, 'Sony Playstation 3', 'ASIA,EURO,US', 50, 'Picture/no_image_available.jpg'),
(110, 'MARCH OF THE EAGLES', 'PARADOX', 2013, 'PC', 'EURO', 50, 'Picture/no_image_available.jpg'),
(111, 'GRID 2', 'CODEMASTERS', 2013, 'PC,Sony Playstation 3,Xbox 360', 'EURO', 50, 'Picture/no_image_available.jpg'),
(112, 'PUZZLE CHRONICLES', 'KONAMI', 2010, 'Sony Playstation Portable (PSP)', 'US', 50, 'Picture/no_image_available.jpg'),
(113, 'THE SIMS 3 INTO THE FUTURE', 'ELECTRONIC ARTS', 2013, 'Macintosh,PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(114, 'DRAGON''S CROWN', 'ATLUS / INDEX CORPORATION', 2013, 'Sony Playstation 3,Sony PS Vita', 'ASIA,US', 50, 'Picture/no_image_available.jpg'),
(115, 'XBLAZE CODE: EMBRYO', 'ARC SYSTEM WORKS CO LTD.', 2013, 'Sony Playstation 3,Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(117, 'MAJOR LEAGUE BASEBALL 2K13', 'TAKE 2/2K SPORTS/VISUAL CONCEPT', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(118, 'GOD OF WAR: ASCENSION', 'SONY COMPUTER ENTERTAINMENT INC.', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(119, 'GRAND THEFT AUTO V', 'TAKE 2/ROCKSTAR GAMES/ROCKSTAR NORTH', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(122, 'HARVEY BIRDMAN: ATTORNEY AT LAW', 'CAPCOM', 2008, 'Nintendo Wii,Sony Playstation 2,Sony Playstation Portable (PSP)', 'US', 50, 'Picture/no_image_available.jpg'),
(123, 'FIST OF THE NORTH STAR: KEN''S RAGE 2', 'TECMO KOEI GAMES CO.LTD', 2013, 'Nintendo Wii U,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(124, 'DEAD OR ALIVE 5 PLUS', 'TECMO KOEI GAMES CO. LTD', 2013, 'Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(126, 'KINGDOM HEARTS HD 1.5 REMIX', 'SQUARE ENIX', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(127, 'LEGO CITY UNDERCOVER', 'NINTENDO OF AMERICA', 2013, 'Nintendo Wii U', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(128, 'THE SIMS 3: DRAGON VALLEY', 'ELECTRONIC ARTS', 2013, 'Macintosh,PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(129, 'ULTIMATE SHOOTER PACK', 'SONY COMPUTER ENTERTAINMENT INC.', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(130, 'SQUARE ENIX ADVENTURE PACK', 'SQUARE ENIX', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(131, 'ULTIMATE ADVENTURE PACK', 'SONY COMPUTER ENTERTAINMENT INC.', 2013, 'Sony Playstation 3', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(132, 'ALIEN RAGE', 'CITY INTERACTIVE', 2013, 'PC,Sony Playstation 3,Xbox 360', 'EURO', 50, 'Picture/no_image_available.jpg'),
(133, 'VAMPIRE RESURRECTION', 'CAPCOM', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(134, 'DISNEY INFINITY', '2013', 2013, 'Nintendo Wii,Nintendo 3DS,PC,Nintendo Wii U,Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(135, 'JAGGED ALLIANCE: GOLD EDITION', 'KALYPSO', 2013, 'PC', 'US', 50, 'Picture/no_image_available.jpg'),
(136, 'VALHALLA KNIGHTS 3', 'MARVELOUS AQL INC.', 2013, 'Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(137, 'MINECRAFT', 'MOJANG', 2013, 'PC,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(138, 'TRON EVOLUTION: BATTLE GRIDS', 'DISNEY', 2010, 'Nintendo DS,Nintendo Wii', 'US', 50, 'Picture/no_image_available.jpg'),
(141, 'METAL GEAR RISING: REVENGEANCE', 'KONAMI', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(142, 'ANARCHY REIGNS', 'SEGA', 2013, 'Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(144, 'FAST & FURIOUS: SHOWDOWN', 'ACTIVISION', 2013, 'Nintendo 3DS,PC,Nintendo Wii U,Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(145, 'SOUL SACRIFICE', 'SONY COMPUTER ENTERTAINMENT INC.', 2013, 'Sony PS Vita', 'ASIA,JP', 50, 'Picture/no_image_available.jpg'),
(146, 'KILLZONE: MERCENARY', 'SONY COMPUTER ENTERTAINMENT INC', 2013, 'Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(147, 'PAYDAY 2', '505 GAMES', 2013, 'PC,Sony Playstation 3,Xbox 360', 'US', 50, 'Picture/no_image_available.jpg'),
(148, 'BIOSHOCK INFINITE', 'TAKE2/2K GAMES/IRRATIONAL', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(149, 'HITMAN: HD TRILOGY', 'SQUARE ENIX', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(150, 'PANDORA''S TOWER', 'XSEED', 2013, 'Nintendo Wii', 'US', 50, 'Picture/no_image_available.jpg'),
(151, 'CITIES IN MOTION 2', 'PARADOX', 2013, 'PC', 'EURO', 50, 'Picture/no_image_available.jpg'),
(152, 'XCOM: ENEMY WITHIN', 'TAKE 2/2K', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(153, 'TOTAL WAR: ROME II', 'SEGA EUROPE', 2013, 'PC', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(155, 'BIOSHOCK ULTIMATE RAPTURE EDITION', 'TAKE 2/2K GAMES/IRRATIONAL GAMES', 2013, 'PC,Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(156, 'BUZZ! MASTER QUIZ', 'SONY COMPUTER ENTERTAINMENT', 2008, 'Sony Playstation Portable (PSP)', 'US', 50, 'Picture/no_image_available.jpg'),
(157, 'MIND 0', 'ACQUIRE CORP.', 2013, 'Sony PS Vita', 'ASIA', 50, 'Picture/no_image_available.jpg'),
(158, 'FUSE', 'ELECTRONIC ARTS', 2013, 'Sony Playstation 3,Xbox 360', 'ASIA', 50, 'Picture/no_image_available.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ordered_product`
--

CREATE TABLE IF NOT EXISTS `ordered_product` (
  `OrderedProductID` int(11) NOT NULL,
  `Supplier_UserID` varchar(255) DEFAULT NULL,
  `GameID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Price` float DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordered_product`
--

INSERT INTO `ordered_product` (`OrderedProductID`, `Supplier_UserID`, `GameID`, `OrderID`, `Quantity`, `Price`) VALUES
(3, 'Hu0xing', 1, 11, 2, 40),
(4, 'meatshield', 1, 12, 2, 40),
(5, 'pewpewbeam', 2, 13, 1, 60);

-- --------------------------------------------------------

--
-- Table structure for table `order_make`
--

CREATE TABLE IF NOT EXISTS `order_make` (
  `OrderID` int(11) NOT NULL,
  `Buyer_UserID` varchar(255) DEFAULT NULL,
  `Purchare_Time` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_make`
--

INSERT INTO `order_make` (`OrderID`, `Buyer_UserID`, `Purchare_Time`) VALUES
(11, 'Testuser', '2015-11-21 10:41:10'),
(12, 'Hu0xing', '2015-11-21 13:05:30'),
(13, 'Hu0xing', '2015-11-21 13:05:55');

-- --------------------------------------------------------

--
-- Table structure for table `review_have`
--

CREATE TABLE IF NOT EXISTS `review_have` (
  `GameID` int(11) NOT NULL,
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `Rating` float DEFAULT NULL,
  `Comment` varchar(255) DEFAULT NULL,
  `TimeStamp` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `review_have`
--

INSERT INTO `review_have` (`GameID`, `UserID`, `Rating`, `Comment`, `TimeStamp`) VALUES
(1, 'necrodiver', 5, 'Comment 2', '2015-02-17 00:00:00'),
(1, 'necrodiverTesting', 3.5, 'Gaaaaa', '2015-10-31 08:32:07'),
(1, 'necrodiverTesting2', 3, 'OMT', '2015-10-31 08:35:22'),
(1, 'necrodiverTesting3', 0, 'Latest Comment', '2015-10-31 08:55:21'),
(1, 'pewpewbeam', 2, 'Oldest Comment', '2012-11-15 00:00:00'),
(8, 'meatshield', 4, 'Testing Review', '2015-11-17 09:11:18');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE IF NOT EXISTS `supplier` (
  `UserID` varchar(255) NOT NULL DEFAULT '',
  `Total_Sales` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`UserID`, `Total_Sales`) VALUES
('Hu0xing', 80),
('meatshield', 10080),
('necrodiver', 1402),
('necrodiverTesting', 103200),
('necrodiverTesting2', 0),
('necrodiverTesting3', 0),
('pewpewbeam', 261);

-- --------------------------------------------------------

--
-- Table structure for table `supplier_own_game`
--

CREATE TABLE IF NOT EXISTS `supplier_own_game` (
  `Supplier_UserID` varchar(255) NOT NULL DEFAULT '',
  `GameID` int(11) NOT NULL,
  `Stock` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier_own_game`
--

INSERT INTO `supplier_own_game` (`Supplier_UserID`, `GameID`, `Stock`) VALUES
('Hu0xing', 1, 2),
('meatshield', 1, 6),
('necrodiver', 1, 3),
('necrodiver', 2, 2),
('necrodiver', 3, 48),
('necrodiver', 4, 2),
('necrodiver', 10, 100),
('necrodiverTesting', 1, 3),
('necrodiverTesting', 2, 0),
('pewpewbeam', 1, 3),
('pewpewbeam', 2, 17),
('pewpewbeam', 4, 2),
('pewpewbeam', 6, 20),
('pewpewbeam', 8, 40);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` varchar(255) NOT NULL,
  `Hashed_Password` varchar(255) DEFAULT NULL,
  `Email` varchar(255) NOT NULL,
  `Salt` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Hashed_Password`, `Email`, `Salt`) VALUES
('Hu0xing', '6f8583f7eb6709746ba67ad619750a083873226cf30e4299c48eff52a54f4bf5', 'elson_ho@hotmail.com', '6f0d79f093cdae2750e51732'),
('meatshield', '451c4b9028640ab91ee7adea0ffb81b4a2fbb6c81a4b822387ad60072bb666e3', 'daere@gotmail.com', '36343b77b2bb99a438054b45'),
('necrodiver', '3587ed34811992df70eaa554448bdb3684efd8ed8353a2644f27f3e44889ecd2', 'mehmeh@gmail.com', '9c914132540914a5c34c807d'),
('necrodiverTesting', 'a3c69166757134256ac5b9ea63bc9900fe80698f283e122db12327b86402852a', 'darkdanito@hotmail.com', '25cbdda0f4273d4a3a683522'),
('necrodiverTesting2', '3c02876333e088bcbefbc741a73b07157dd0bc9ae9088d3e5886501ce66c8f1a', 'sadasdas@erewrw.com', 'd54c6968645e7d48b6da60fb'),
('necrodiverTesting3', '8686cce505624e4e1e46e89ccca9fbbe3bce4120ac5fa5889d5625a03cdf5fe7', 'assdasda@gdffere.com', '1a98e3076ca04a13a0afabbc'),
('pewpewbeam', '694884e11e14a6650802a048ac8751843555819e5f00927737169b991f82dd5e', 'sadsadas@hotmail.com', 'b66f907425b6549db70ba157'),
('Testuser', 'f555a221d416b1eb13ef30f299b4e54d580dc8ced4e7185f039d8fd35fbd6b9f', 'elson_ho@hotmail.com', 'fe9aeac93536e34a068e62aa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GameID`),
  ADD UNIQUE KEY `GameID` (`GameID`);

--
-- Indexes for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD PRIMARY KEY (`OrderedProductID`),
  ADD UNIQUE KEY `OrderedProductID` (`OrderedProductID`),
  ADD KEY `Supplier_UserID` (`Supplier_UserID`,`GameID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `order_make`
--
ALTER TABLE `order_make`
  ADD PRIMARY KEY (`OrderID`),
  ADD UNIQUE KEY `OrderID` (`OrderID`),
  ADD KEY `Buyer_UserID` (`Buyer_UserID`);

--
-- Indexes for table `review_have`
--
ALTER TABLE `review_have`
  ADD PRIMARY KEY (`GameID`,`UserID`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `supplier_own_game`
--
ALTER TABLE `supplier_own_game`
  ADD PRIMARY KEY (`Supplier_UserID`,`GameID`),
  ADD KEY `GameID` (`GameID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GameID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=159;
--
-- AUTO_INCREMENT for table `ordered_product`
--
ALTER TABLE `ordered_product`
  MODIFY `OrderedProductID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `order_make`
--
ALTER TABLE `order_make`
  MODIFY `OrderID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `buyer`
--
ALTER TABLE `buyer`
  ADD CONSTRAINT `buyer_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `ordered_product`
--
ALTER TABLE `ordered_product`
  ADD CONSTRAINT `ordered_product_ibfk_1` FOREIGN KEY (`Supplier_UserID`, `GameID`) REFERENCES `supplier_own_game` (`Supplier_UserID`, `GameID`) ON DELETE NO ACTION,
  ADD CONSTRAINT `ordered_product_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `order_make` (`OrderID`) ON DELETE NO ACTION;

--
-- Constraints for table `order_make`
--
ALTER TABLE `order_make`
  ADD CONSTRAINT `order_make_ibfk_1` FOREIGN KEY (`Buyer_UserID`) REFERENCES `buyer` (`UserID`) ON DELETE NO ACTION;

--
-- Constraints for table `review_have`
--
ALTER TABLE `review_have`
  ADD CONSTRAINT `review_have_ibfk_1` FOREIGN KEY (`GameID`) REFERENCES `game` (`GameID`) ON DELETE CASCADE;

--
-- Constraints for table `supplier`
--
ALTER TABLE `supplier`
  ADD CONSTRAINT `supplier_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `supplier_own_game`
--
ALTER TABLE `supplier_own_game`
  ADD CONSTRAINT `supplier_own_game_ibfk_1` FOREIGN KEY (`Supplier_UserID`) REFERENCES `supplier` (`UserID`),
  ADD CONSTRAINT `supplier_own_game_ibfk_2` FOREIGN KEY (`GameID`) REFERENCES `game` (`GameID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
