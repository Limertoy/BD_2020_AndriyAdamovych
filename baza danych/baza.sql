-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Час створення: Чрв 11 2020 р., 14:50
-- Версія сервера: 10.4.11-MariaDB
-- Версія PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `baza`
--

-- --------------------------------------------------------

--
-- Структура таблиці `auto`
--

CREATE TABLE `auto` (
  `ID_AUTA` int(10) NOT NULL,
  `Nazwa` varchar(32) COLLATE utf8_bin NOT NULL,
  `Rok` int(4) NOT NULL,
  `Przebieg` varchar(32) COLLATE utf8_bin NOT NULL,
  `Pojemnosc` varchar(32) COLLATE utf8_bin NOT NULL,
  `Moc` varchar(32) COLLATE utf8_bin NOT NULL,
  `Cena` int(10) NOT NULL,
  `ID_DEALERA` int(10) NOT NULL,
  `ID_SKLEPU` int(10) NOT NULL,
  `img_auto` varchar(32) COLLATE utf8_bin NOT NULL,
  `Hidden` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `auto`
--

INSERT INTO `auto` (`ID_AUTA`, `Nazwa`, `Rok`, `Przebieg`, `Pojemnosc`, `Moc`, `Cena`, `ID_DEALERA`, `ID_SKLEPU`, `img_auto`, `Hidden`) VALUES
(1, 'Ford KA+', 2020, '0 km', '1,2 L', '75Km', 13000, 6, 1, 'img/fordka.jpg', 0),
(5, 'Nissan Skyline', 2007, '75342km', '3,5 L', '320KM', 15000, 5, 2, 'img/nissangtr.jpg', 0),
(6, 'Renault Logan', 2013, '0 km', '1,2 L', '75KM', 12000, 5, 2, 'img/renaultlogan.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблиці `dealer`
--

CREATE TABLE `dealer` (
  `ID_DEALERA` int(10) NOT NULL,
  `Nazwa_dealera` varchar(32) COLLATE utf8_bin NOT NULL,
  `Kraj_pochodzenia` varchar(32) COLLATE utf8_bin NOT NULL,
  `Opis_dealera` text COLLATE utf8_bin NOT NULL,
  `img_dealer` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `dealer`
--

INSERT INTO `dealer` (`ID_DEALERA`, `Nazwa_dealera`, `Kraj_pochodzenia`, `Opis_dealera`, `img_dealer`) VALUES
(5, 'Renault Official', 'Francja', 'Renault - mniej słów, więcej jazdy.', 'img/renaultlogo.jpg'),
(6, 'Ford Auto', 'Stany Zjednoczone', 'Spośród współcześnie sprzedawanych modeli Forda największą popularnością cieszy się, dostępny na wielu rynkach, Ford Focus, który pojawił się na rynku po czwartej generacji Escorta. Również Ford Mondeo, który w Stanach Zjednoczonych sprzedawany jest jako Fusion, należy do jednych z bardziej rozpoznawalnych modeli z błękitnym owalem na masce. W portfolio Forda dużą popularnością cieszą się także takie modele jak Fiesta czy Kuga, a za Oceanem na spore zainteresowanie mogą liczyć pickupy serii F, w tym najbardziej popularny Ford F-150.\r\nFord jako koncern motoryzacyjny największa lata świetności ma jednak za sobą. Obecnie w skład tego koncernu, poza marką Ford, wchodzi jeszcze tylko Lincoln, marka większych i luksusowych modeli oferowanych na amerykańskim rynku. W przeszłości jednak do Forda należały m.in. Mercury, brytyjskie marki Daimler, Aston Martin, Jaguar oraz Land Rover, a także Volvo, które w 2010 r. zostało sprzedane chińskiemu koncernowi Zheijang Geely Holding Group.', 'img/fordlogo.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `klient`
--

CREATE TABLE `klient` (
  `ID_KLIENTA` int(11) NOT NULL,
  `Imie` varchar(32) COLLATE utf8_bin NOT NULL,
  `Telefon_klienta` varchar(32) COLLATE utf8_bin NOT NULL,
  `Email_klienta` varchar(32) COLLATE utf8_bin NOT NULL,
  `Haslo` varchar(16) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `klient`
--

INSERT INTO `klient` (`ID_KLIENTA`, `Imie`, `Telefon_klienta`, `Email_klienta`, `Haslo`) VALUES
(1, 'Andriy Adamovych', '555 555 555', 'admin@email.com', 'admin'),
(37, 'Zwykły użytkownik', '123123', 'limertoy@ukr.net', '123');

-- --------------------------------------------------------

--
-- Структура таблиці `koszyk`
--

CREATE TABLE `koszyk` (
  `ID_ZAKUPU` int(10) NOT NULL,
  `ID_AUTA` int(10) NOT NULL,
  `ID_KLIENTA` int(10) NOT NULL,
  `Data_zakupu` date NOT NULL,
  `Nazwa_car` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela łącząca';

-- --------------------------------------------------------

--
-- Структура таблиці `sklep`
--

CREATE TABLE `sklep` (
  `ID_SKLEPU` int(11) NOT NULL,
  `Nazwa_sklepu` varchar(32) COLLATE utf8_bin NOT NULL,
  `Adres` varchar(32) COLLATE utf8_bin NOT NULL,
  `Telefon_sklepu` varchar(20) COLLATE utf8_bin NOT NULL,
  `Email_sklepu` varchar(32) COLLATE utf8_bin NOT NULL,
  `img_sklep` varchar(32) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Дамп даних таблиці `sklep`
--

INSERT INTO `sklep` (`ID_SKLEPU`, `Nazwa_sklepu`, `Adres`, `Telefon_sklepu`, `Email_sklepu`, `img_sklep`) VALUES
(1, 'Otomoto', 'Warszawa, ul.Mickiewicza, 15', '506 234 123', 'otomoto@email.com', 'img/otomoto.jpg'),
(2, 'Omega Cars', 'Rzeszów, al. Rejtana, 2', '555 001 223', 'omega@email.com', '');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `auto`
--
ALTER TABLE `auto`
  ADD PRIMARY KEY (`ID_AUTA`),
  ADD KEY `ID_DEALERA` (`ID_DEALERA`),
  ADD KEY `ID_SKLEPU` (`ID_SKLEPU`);

--
-- Індекси таблиці `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`ID_DEALERA`),
  ADD KEY `ID_DEALERA` (`ID_DEALERA`);

--
-- Індекси таблиці `klient`
--
ALTER TABLE `klient`
  ADD PRIMARY KEY (`ID_KLIENTA`),
  ADD UNIQUE KEY `Email_klienta` (`Email_klienta`);

--
-- Індекси таблиці `koszyk`
--
ALTER TABLE `koszyk`
  ADD PRIMARY KEY (`ID_ZAKUPU`),
  ADD UNIQUE KEY `ID_AUTA` (`ID_AUTA`),
  ADD KEY `ID_KLIENTA` (`ID_KLIENTA`);

--
-- Індекси таблиці `sklep`
--
ALTER TABLE `sklep`
  ADD PRIMARY KEY (`ID_SKLEPU`),
  ADD KEY `ID_SKLEPU` (`ID_SKLEPU`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `auto`
--
ALTER TABLE `auto`
  MODIFY `ID_AUTA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `dealer`
--
ALTER TABLE `dealer`
  MODIFY `ID_DEALERA` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `klient`
--
ALTER TABLE `klient`
  MODIFY `ID_KLIENTA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT для таблиці `koszyk`
--
ALTER TABLE `koszyk`
  MODIFY `ID_ZAKUPU` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT для таблиці `sklep`
--
ALTER TABLE `sklep`
  MODIFY `ID_SKLEPU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `auto`
--
ALTER TABLE `auto`
  ADD CONSTRAINT `auto_ibfk_1` FOREIGN KEY (`ID_DEALERA`) REFERENCES `dealer` (`ID_DEALERA`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auto_ibfk_2` FOREIGN KEY (`ID_SKLEPU`) REFERENCES `sklep` (`ID_SKLEPU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `koszyk`
--
ALTER TABLE `koszyk`
  ADD CONSTRAINT `ID_AUTA` FOREIGN KEY (`ID_AUTA`) REFERENCES `auto` (`ID_AUTA`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
