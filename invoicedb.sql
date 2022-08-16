-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Vært: 127.0.0.1
-- Genereringstid: 16. 08 2022 kl. 09:09:24
-- Serverversion: 10.4.24-MariaDB
-- PHP-version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `invoicedb`
--

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `clients`
--

CREATE TABLE `clients` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `company department` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `Company` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `company adress` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `clients`
--

INSERT INTO `clients` (`id`, `name`, `phone`, `email`, `address`, `company department`, `Company`, `company adress`) VALUES
(1, 'Alden Raymond', '1-523-550-5839', 'eget.lacus@yahoo.couk', '253-1239 Rhoncus. St.', 'Accounting', 'Big Company A/S', 'Awesome Avenue 28'),
(2, 'Armando Terry', '1-244-281-4613', 'cubilia.curae.donec@aol.net', 'Ap #368-7307 Arcu. Rd.', 'Webdevelopment', 'Small Company A/S', 'Piccadilly Lane 746'),
(3, 'Caleb Diaz', '(643) 347-3542', 'nec.urna@aol.net', 'Ap #773-5740 Convallis, St.', 'Key Account Management', 'Medium Company A/S', 'Jernbanegade 27 7TH'),
(4, 'Octavius Whitaker', '(225) 717-0038', 'montes.nascetur@icloud.org', '708-5689 Vestibulum Street', 'Webdesign', 'Freelance Company Inc.', 'Over Åen 2'),
(5, 'Lacota Quinn', '1-708-284-7189', 'nibh.lacinia.orci@icloud.edu', 'Ap #431-7836 Nunc Av.', 'Communications', 'Deutsches GMBH & Co.kg', '211B Bakerstreet');

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `invoices`
--

CREATE TABLE `invoices` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `InvoiceID` mediumint(9) DEFAULT NULL,
  `ClientID` mediumint(9) DEFAULT NULL,
  `Date` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `invoices`
--

INSERT INTO `invoices` (`id`, `InvoiceID`, `ClientID`, `Date`, `address`) VALUES
(1, 3265, 1, 'Jul 25, 2021', NULL),
(2, 3266, 2, 'Jul 23, 2021', NULL),
(3, 3267, 3, 'Aug 2, 2021', NULL),
(4, 3268, 4, 'Jul 17, 2021', NULL),
(5, 3269, 5, 'Aug 13, 2021', NULL);

-- --------------------------------------------------------

--
-- Struktur-dump for tabellen `products`
--

CREATE TABLE `products` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `text` text DEFAULT NULL,
  `numberrange` mediumint(9) DEFAULT NULL,
  `currency` varchar(100) DEFAULT NULL,
  `ClientID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Data dump for tabellen `products`
--

INSERT INTO `products` (`id`, `text`, `numberrange`, `currency`, `ClientID`) VALUES
(1, 'Hammer', 5, '$79.96', '1'),
(2, 'Table', 2, '$43.62', '2'),
(3, 'Gaming Chair', 3, '$20.23', '3'),
(4, 'Pack of Nails 100pcs', 3, '$92.55', '4'),
(5, 'Coffee Mug', 6, '$8.53', '5');

--
-- Begrænsninger for dumpede tabeller
--

--
-- Indeks for tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indeks for tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Brug ikke AUTO_INCREMENT for slettede tabeller
--

--
-- Tilføj AUTO_INCREMENT i tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tilføj AUTO_INCREMENT i tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5007;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
