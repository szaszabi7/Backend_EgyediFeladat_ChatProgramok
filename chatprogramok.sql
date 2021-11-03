-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2021. Nov 03. 23:32
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `chatprogramok`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `adatok`
--

CREATE TABLE `adatok` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_hungarian_ci NOT NULL,
  `launchDate` date NOT NULL,
  `numberOfUsers` bigint(20) NOT NULL,
  `availableForAndroid` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ratingOnGooglePlay` float NOT NULL,
  `availableForiOS` text COLLATE utf8mb4_hungarian_ci NOT NULL,
  `ratingOnAppStore` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

--
-- A tábla adatainak kiíratása `adatok`
--

INSERT INTO `adatok` (`id`, `name`, `launchDate`, `numberOfUsers`, `availableForAndroid`, `ratingOnGooglePlay`, `availableForiOS`, `ratingOnAppStore`) VALUES
(3, 'Messenger', '2021-11-04', 12312415125, 'Yes', 4.5, 'Yes', 4.2),
(27, 'Discord', '2021-10-07', 214115135, 'Yes', 5, 'Yes', 5),
(28, 'Snapchat', '2021-09-07', 214151235, 'Yes', 3, 'Yes', 3),
(29, 'WhatsApp', '2022-01-06', 124115151, 'Yes', 2.3, 'Yes', 3.6),
(30, 'Telegram', '2021-09-08', 121412515, 'Yes', 1, 'Yes', 1),
(32, 'Valami', '2021-07-08', 2141414, 'Yes', 1, 'Yes', 1),
(33, 'Valami Másik', '2021-11-03', 124124214, 'Yes', 3.9, 'Yes', 4.8);

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `adatok`
--
ALTER TABLE `adatok`
  ADD PRIMARY KEY (`id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `adatok`
--
ALTER TABLE `adatok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
