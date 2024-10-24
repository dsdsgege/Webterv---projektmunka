-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2024. Ápr 21. 23:49
-- Kiszolgáló verziója: 10.4.32-MariaDB
-- PHP verzió: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `login&register`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `felhasznalok`
--

CREATE TABLE `felhasznalok` (
  `felhasznalonev` varchar(50) NOT NULL,
  `email` varchar(120) NOT NULL,
  `jelszo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `felhasznalok`
--

INSERT INTO `felhasznalok` (`felhasznalonev`, `email`, `jelszo`) VALUES
('admin', 'admin@gmail.com', '$2y$10$vi7m7pbPMKW.qWPWZsDZ/.UUhLJOaPmk7aYc8vDAS1dGZkvBVTJIi'),
('tothtomi', 'toth@gmail.com', '$2y$10$2U8bGJwwcPB3XGy9zgdq7.jbupvJZGOXXibC3fIbf11ElGIAKktWO');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `ismerteto`
--

CREATE TABLE `ismerteto` (
  `fajta` varchar(1024) NOT NULL,
  `rozsa_id` varchar(1024) NOT NULL,
  `url` varchar(1024) NOT NULL,
  `alt` varchar(1024) NOT NULL,
  `leiras` varchar(1024) NOT NULL,
  `gondozas` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `ismerteto`
--

INSERT INTO `ismerteto` (`fajta`, `rozsa_id`, `url`, `alt`, `leiras`, `gondozas`) VALUES
('rózsa', 'valamilyen', 'mindegy', 'ez egy rózsa', 'ez egy gyönyörű rózsa', 'Locsold erősen vastagon');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kedvencek`
--

CREATE TABLE `kedvencek` (
  `felhasznalonev` varchar(50) NOT NULL,
  `kedvenc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kerdesek`
--

CREATE TABLE `kerdesek` (
  `felhasznalonev` varchar(50) NOT NULL,
  `kerdes` varchar(1024) NOT NULL,
  `valasz` varchar(1024) NOT NULL,
  `prof_utvonal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `kosar`
--

CREATE TABLE `kosar` (
  `felhasznalonev` varchar(50) NOT NULL,
  `termek` varchar(512) NOT NULL,
  `egyedi` tinyint(1) NOT NULL,
  `kep_utvonal` varchar(255) NOT NULL,
  `html_id` varchar(40) NOT NULL,
  `szamlalo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `kosar`
--

INSERT INTO `kosar` (`felhasznalonev`, `termek`, `egyedi`, `kep_utvonal`, `html_id`, `szamlalo`) VALUES
('tothtomi', 'Bianca', 0, 'img/rozsak/bianca.jpg', 'bianca', 1),
('tothtomi', 'Sissi', 0, 'img/rozsak/sissi.jpg', 'sissi', 1),
('tothtomi', 'Casanova', 0, 'img/rozsak/casanova.png', 'casanova', 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profilkep`
--

CREATE TABLE `profilkep` (
  `felhasznalonev` varchar(50) NOT NULL,
  `prof_utvonal` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
