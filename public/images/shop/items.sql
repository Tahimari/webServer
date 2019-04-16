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

INSERT INTO `item` (`title`, `description`, `price`, `image_url`,`category`) VALUES
('GIVENCHY BUTY SPORTOWE Z LOGO', 'Białe, wsuwane buty sportowe Givenchy. Wykonane ze skóry cielęcej. Z przodu wszyte czarne gumy z wyszytym logo w kolorze białym. Z tyłu wytłoczone logo w kolorze złotym. Biała, gumowa podeszwa.', 2825, 'http://localhost/sklep/givenchy1.JPG','SHOES'),
('PHILIPP PLEIN BUTY SPORTOWE Z MOTYWEM CZASZKI', 'Czarne, sznurowane buty sportowe Philipp Plein. Wykończone zamszem i skórą. Ozdobione metalową aplikacją z motywem czaszki w kolorze srebrnym. Z tyłu metalowe logo. Biała, gumowa podeszwa.', 2365, 'http://localhost/sklep/philip.JPG','SHOES'),
('FENDI BUTY SPORTOWE Z DEKORACYJNYM WZOREM', 'Czarne, sznurowane buty sportowe Fendi. Ozdobione wypukłym wzorem w kolorze czerwonym. Z tyłu wytłoczone logo. Czarna, gumowa podeszwa.', 2595, 'http://localhost/sklep/fendi.JPG','SHOES'),
('BALENCIAGA BUTY SPORTOWE \'TRIPLE S\'', 'Czarne, sznurowane buty sportowe, model \'Triple S\' Balenciaga. Edycja limitowana. Ozdobione czarnymi wstawkami ze skóry. Z boku wyszyte logo w kolorze białym. Biało-czerwono-granatowa podeszwa wykonana z gumy.', 3000, 'http://localhost/sklep/balenciaga.JPG','SHOES'),
('ADIDAS ORIGINALS KURTKA Z LOGO','Zielona kurtka ADIDAS Originals. Zapinana na zamek. Ozdobiona białą aplikacją z logo i nadrukiem z potrójnymi paskami w kolorze biało-zielonym. Z przodu dwie kieszenie zamykane na zamek. Dół i rękawy zakończone ściągaczami.',379,'http://localhost/sklep/adidas.JPG','JACKET'),
('MONCLER PIKOWANA KURTKA PUCHOWA','Granatowa, pikowana kurtka puchowa z odpinanym kapturem Moncler. Wykończona materiałem z siatką w kolorze żółto-czarnym. Zapinana na dwubiegunowy zamek i zatrzaski. Ozdobiona czarnymi wszytymi paskami oraz naszywką z logo w kolorze kremowo-granatowo-czerwonym. Z przodu dwie kieszenie zamykane na zamki. Długie rękawy.',4745,'http://localhost/sklep/moncler.JPG','JACKET'),
('YOHJI YAMAMOTO T-SHIRT Z WYSZYTYM LOGO','Biały, bawełniany t-shirt Yohji Yamamoto. Z przodu wyszyte logo w kolorze granatowym. Okrągły dekolt.',949,'http://localhost/sklep/yohji.JPG',"TSHIRT");

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
