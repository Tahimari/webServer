-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Czas generowania: 22 Lut 2019, 14:07
-- Wersja serwera: 10.1.36-MariaDB
-- Wersja PHP: 7.2.11


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `shop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `item`
--
--
-- Zrzut danych tabeli `item`
--

INSERT INTO `products` (`title`, `description`, `price`, `image_url`) VALUES
('GIVENCHY BUTY SPORTOWE Z LOGO', 'Białe, wsuwane buty sportowe Givenchy. Wykonane ze skóry cielęcej. Z przodu wszyte czarne gumy z wyszytym logo w kolorze białym. Z tyłu wytłoczone logo w kolorze złotym. Biała, gumowa podeszwa.', 2825, 'http://localhost:8080/sklep/givenchy.JPG'),
('PHILIPP PLEIN BUTY SPORTOWE Z MOTYWEM CZASZKI', 'Czarne, sznurowane buty sportowe Philipp Plein. Wykończone zamszem i skórą. Ozdobione metalową aplikacją z motywem czaszki w kolorze srebrnym. Z tyłu metalowe logo. Biała, gumowa podeszwa.', 2365, 'http://localhost:8080/sklep/philip.JPG'),
('FENDI BUTY SPORTOWE Z DEKORACYJNYM WZOREM', 'Czarne, sznurowane buty sportowe Fendi. Ozdobione wypukłym wzorem w kolorze czerwonym. Z tyłu wytłoczone logo. Czarna, gumowa podeszwa.', 2595, 'http://localhost:8080/sklep/fendi.JPG'),
('BALENCIAGA BUTY SPORTOWE \'TRIPLE S\'', 'Czarne, sznurowane buty sportowe, model \'Triple S\' Balenciaga. Edycja limitowana. Ozdobione czarnymi wstawkami ze skóry. Z boku wyszyte logo w kolorze białym. Biało-czerwono-granatowa podeszwa wykonana z gumy.', 3000, 'http://localhost:8080/sklep/balenciaga.JPG');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `item`
--
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `item`
--

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
