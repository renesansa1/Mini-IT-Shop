-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2019 at 01:01 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mini it shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

CREATE TABLE `korisnici` (
  `id` int(11) NOT NULL,
  `tip` int(10) NOT NULL DEFAULT '0',
  `ime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontakt_telefon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id`, `tip`, `ime`, `email`, `password`, `kontakt_telefon`, `grad`, `adresa`) VALUES
(4, 0, 'Miloš Stevanović', 'test_proba@gmail.com', 'test_proba12', '0115546551', 'Beograd', 'Bulevar Mihajla Pupina 52'),
(5, 1, 'Petar Petrović', 'admin@gmail.com', 'admin321', '0116549873', 'Kragujevac', 'Stevana Sremca 14'),
(6, 0, 'Jovan', 'test2@yahoo.com', 'testiran', '011951753', 'Novi Sad', 'Stevana Mokranjca 8');

-- --------------------------------------------------------

--
-- Table structure for table `korisnicka_korpa`
--

CREATE TABLE `korisnicka_korpa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `status` enum('Ubaceno u korpu','Kupljeno') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `id` int(11) NOT NULL,
  `tip_proizvoda` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ime_proizvoda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cena` int(11) NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slika` varchar(80) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`id`, `tip_proizvoda`, `ime_proizvoda`, `cena`, `opis`, `slika`) VALUES
(1, 'Monitori', 'Dell S2719H', 39500, '<p>Velicina ekrana 27\"</p><p>\r\nRezolucija 1.920 x 1.080</p><p>\r\nTip ekrana TFT LCD</p><p>\r\nTip panela IPS</p><p>\r\nPozadinsko osvetljenje LED</p><p>\r\nOdnos stranica 16:9</p><p>\r\nNativni kontrast 1.000:1</p><p>\r\nOsvetljenje 250cd/m</p><p>\r\nUglovi gledanja 178 horizontalni, 178 vertikalni</p><p>\r\nVertikalno osvezavanje 60Hz</p><p>\r\nVelicina piksela 0.3114mm</p><p>\r\nPaleta boja 16.7 miliona boja</p><p>\r\nOstalo Low haze with 3H hardness</p>', 'img/kom1.jpg'),
(2, 'Monitori', 'Asus Swift PG278QE', 42000, '<p>Dijagonala 	27\" </p><p>Pozadinsko osvetljenje 	W-LED </p><p>Tip panela 	TN </p><p>Rezolucija 	2560 x 1440 WQHD <p>Odnos stranica 	16 : 9 </p><p>Vreme odziva 	1ms </p><p>Osvezavanje 	165Hz FreeSync/ G-Sync 	G-Sync </p><p>Osvetljenje 	350 cd/m2 <p>Kontrast 	1000 : 1 </p><p>Dinamicki kontrast 	20 000 000 : 1 </p><p>Ugao vidljivosti - Horizontalno 	170 </p><p>Ugao vidljivosti - Vertikalno 	160 <p>HDMI 	1 </p><p>Display port 	1 ', 'img/kom2.jpg'),
(3, 'Monitori', 'LG 34UC79G-B', 50000, '<p>Tip 	IPS</p><p>Model 34UC79G-B</p><p>Ergonomija Ugao vidljivosti: 170/160 stepeni</p><p>Zakrivljeni ekran 	Da</p><p>Namena 	Home/Gaming</p><p>Dijagonala ekrana 	34\'</p><p>Maksimalna rezolucija 	2560x1080 Ultra Wide FullHD</p><p>Vreme odziva 	5 ms GTG (od sive prema sivoj)</p><p>Brzina osvezavanja 	144Hz</p><p>Osvetljenje 	250cd/m2</p><p>Kontrast 	1000:1</p><p>HDMI 	Da, 2</p><p>USB Da (1 gornji / 2 donja)</p><p>Display port 	Da</p>', 'img/kom3.jpg'),
(4, 'Monitori', 'Samsung LS27H', 28000, '<p>Velicina ekrana\r\n27 \"</p>\r\n<p>Tip panela\r\nPLS</p>\r\n<p>Maksimalna rezolucija\r\n2560 x 1440 piksela</p>\r\n<p>MaksimalnA svetlina\r\n350 cd / m2</p>\r\n<p>Kontrast\r\n1000: 01: 00</p>\r\n<p>Ugao (H / V)\r\n178 / 178 ordm</p>\r\n<p>Vreme odziva (sivo u sivo)\r\n4ms</p>\r\n<p>Dubina boja\r\n1,07 milijardi</p>\r\n<p>Zvucnik Da</p>\r\n<p>Prikljucak za slusalice Da</p>\r\n<p>Stand\r\nTilt, podesavanje visine, okretni, pivot, prenosivi</p>\r\n<p>TV Tuner\r\nne</p>\r\n<p>HDMI, USB, DisplayPort</p>', 'img/kom4.jpg'),
(5, 'Komponente', 'RTX 2070 Gigabyte', 88400, '<p>Model	RTX 2070</p>\r\n<p>Broj unificiranih procesora	2304</p>\r\n<p>Radni takt	1.620MHz ( 1.770MHz boost clock)</p>\r\n<p>Kolicina memorije	8GB</p>\r\n<p>Tip memorije	GDDR6</p>\r\n<p>Sirina memorijske magistrale	256bit</p>\r\n<p>Takt memorije	14.000MHz</p>\r\n<p>DisplayPort priključci	3x DisplayPort 1.4</p>\r\n<p>HDMI priključci	3x HDMI 2.0</p>\r\n<p>USB priključci	1x USB Type-C</p>\r\n<p>Dodatni naponski prikljucci	1x6pin</p>\r\n<p>Slot	PCI-Express 3.0</p>\r\n<p>Sistem hladjenja	WindForce 3X</p>\r\n<p>Podrzane tehnologije	Microsoft DirectX 12</p>', 'img/kom5.jpg'),
(6, 'Komponente', 'Thermaltake C35', 21550, '<p>Tip 	Midi Tower</p>\r\n<p>Kompatibilnost 	Micro-ATX, Mini-ITX, ATX</p>\r\n<p>Napajanje 	-</p>\r\n<p>Hladjenje 	Napred: 3 x 120mm, 2 x 140mm, 2 x 200mm (opciono) (instalirani 200 x 200 x 30 mm ARGB ventilatori x2 (800rpm, 29.2 dBA))\r\nGore: 2 x 120mm, 2 x 140mm (opciono)\r\nPozadi: 1 x 120mm (opciono) (instaliran 120 x 120 x 25 mm ventilator (1000rpm, 16 dBA))</p>\r\n<p>Podrska za hladnjak vodenog hladjenja:\r\nNapred: 1 x 360mm, 1 x 280mm\r\nGore: 1 x 240mm, 1 x 280mm\r\nPozadi: 1 x 120mm</p>\r\n<p>Interfejs 	USB 3.0 x 2, HD Audio x 1, RGB Switch x 1</p>\r\n<p>Maksimalna duzina graficke karte 	310 mm</p>\r\n<p>Maksimalna visina CPU kulera 	180mm</p>\r\n<p>Mesta za PCI kartice 	7+2</p>\r\n<p>Boja 	Crna</p>\r\n<p>Dimenzije 	462 x 233 x 533 mm (VxSxD)</p>', 'img/kom6.jpg'),
(7, 'Komponente', 'Ryzen 2970WX', 92600, '<p>Model 	2970WX</p>\r\n<p>Slot/Socket 	AMD TR4</p>\r\n<p>Radni takt procesora 	3.0 GHz (4.2 GHz Turbo)</p>\r\n<p>Broj jezgara 	Cores : 24 / <p>Treads : 48\r\n<p>Kes 	L3 : 64 MB</p>\r\n<p>Proizvodni proces 	12 nm</p>\r\n<p>TDP 	250 W</p>\r\n<p>Tip pakovanja 	BOX</p>\r\n<p>Napomena 	Procesor dolazi bez hladnjaka.</p>\r\n<p>Maksimalna brzina memorije 	DDR4 2933 MHz</p>', 'img/kom7.jpg'),
(8, 'Komponente', 'Samsung 860 EVO', 25000, '<p>Model 	MZ-76E250B/EU</p>\r\nPovezivanje 	SATA 3<p></p>\r\nKapacitet 	1TB<p></p>\r\nBrzina citanja/pisanja 	550/520MB/s<p></p>\r\nKontroler 	Samsung MJX<p></p>\r\nVek trajanja 	1.5 miliona sati<p></p>\r\nDimenzije 	100x70x6.8mm</p>', 'img/kom8.jpg'),
(9, 'Ulazni uredjaji', 'Logitech G903', 18990, '<p>Proizvodjac 	Logitech</p>\r\nModel 	G903<p></p>\r\nPovezivanje 	Wireless<p></p>\r\nRezolucija 	200-12000dpi<p></p>\r\nSenzor 	PMW3366<p></p>\r\nBoja 	Crna<p></p>\r\nKompatibilnost 	Windows 10/8.1/8/7; Mac OS X 10.10 ili raniji<p></p>\r\nGaming 	Da<p></p>\r\nZa obe ruke 	/<p></p>\r\nDimenzije 	130.3x66.5x40.4mm<p></p>\r\nMasa 	110g bez baterije</p>', 'img/kom9.jpg'),
(10, 'Ulazni uredjaji', 'Logitech Z625', 20800, '<p>Tip 	2.1</p>Ukupna snaga 	200W<p></p>Pojedinacna snaga zvucnika 	<p></p>Subwoofer: 130W RMS<p></p>Satellites: 2 x 35W<p></p>Precnik zvucnika (driver)<p></p> 	Satellites: 63.5mm/2.5inch<p></p>Subwoofer: 177.8mm/7inch<p></p>Opseg frekvencija 	35Hz-20KHz<p></p>Impedansa: 	4 Ohm<p></p>Kontrole 	Kontrola jacine zvuka i bas-a<p></p>Materijal 	Drvo (woofer), plastika (sateliti)<p></p>Napajanje 	Strujno<p></p>Povezivanje 	2xRCA + 2x3.5mm + Opticki ulaz</p>', 'img/kom10.jpg'),
(11, 'Ulazni uredjaji', 'Logitech BRIO 4K', 22100, '<p>Model 	BRIO</p><p>\r\nRezolucija 	4K Ultra HD video calling (up to 4096 x 2160 pixels @ 30 fps); 1080p Full HD video calling (up to 1920 x 1080 pixels @ 30 or 60 fps); 720p HD video calling (up to 1280 x 720 pixels @ 30, 60, or 90 fps)</p><p>\r\nKompatibilnost 	Windows 7 (1080p only), Windows 8.1, or Windows 10, macOS 10.10 or higher</p><p>\r\nBoja 	Crna</p><p>\r\nPovezivanje 	USB 3.0, kompatibilna sa USB 2.0 ili Type C</p><p>\r\nDimenzije 	27x102x27mm</p><p>\r\nNapomena 	63g</p><p>\r\nOstalo 	5x digitalni zoom u Full HD</p>', 'img/kom11.jpg'),
(12, 'Ulazni uredjaji', 'Razer Huntsman Elite', 12400, '<p>Tip tastera 	Mehanicki tasteri</p><p>\r\nModel mikroprekidaca 	Razer Opto-Mechanical</p><p>\r\nSlovni raspored 	EN (US)</p><p>\r\nBroj tastera 	108</p><p>\r\nNumericki deo 	Da</p><p>\r\nAnti-ghost tasteri 	10</p><p>\r\nOdziv (polling rate) 	1000Hz/1ms</p><p>\r\nProgramabilni tasteri (makro) 	Da</p><p>\r\nMemorija tastature 	Da</p><p>\r\nBroj profila 	5</p><p>\r\nMultimedijalni tasteri 	Da</p><p>\r\nIzdrzljivost tastera 	Do 100 miliona pritisaka</p><p>\r\nOslonac za dlanove 	Da</p><p>\r\nPozadinsko osvetljenje 	Da</p>', 'img/kom12.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnici`
--
ALTER TABLE `korisnici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnicka_korpa`
--
ALTER TABLE `korisnicka_korpa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`proizvod_id`),
  ADD KEY `item_id` (`proizvod_id`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tip_proizvoda` (`tip_proizvoda`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnici`
--
ALTER TABLE `korisnici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `korisnicka_korpa`
--
ALTER TABLE `korisnicka_korpa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=548;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
