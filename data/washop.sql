-- phpMyAdmin SQL Dump
-- version 4.2.9.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas generowania: 23 Lis 2017, 22:16
-- Wersja serwera: 10.1.22-MariaDB
-- Wersja PHP: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `washop`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `id` varchar(36) NOT NULL COMMENT 'Product identifier',
  `user_id` varchar(36) NOT NULL COMMENT 'User identifier',
  `name` varchar(255) NOT NULL COMMENT 'Product name',
  `description` varchar(150) NOT NULL COMMENT 'Product description',
  `price_amount` decimal(10,2) unsigned NOT NULL COMMENT 'Product price value',
  `price_currency` char(3) NOT NULL COMMENT 'Product price currency',
  `added_at` datetime NOT NULL COMMENT 'Add date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table with products';

--
-- Zrzut danych tabeli `product`
--

INSERT INTO `product` (`id`, `user_id`, `name`, `description`, `price_amount`, `price_currency`, `added_at`) VALUES
('115a4225-f8ba-40d4-8f7b-be81c09d85f7', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Phoebe Clements', 'Qui enim fuga Sit error Sed molestias qui in et sit et porro voluptas quia mollitia eu alias fugiat optio placeat officiis consequatur iste', '542.00', 'EUR', '2017-11-23 22:13:17'),
('13cf90ed-deac-4579-a7d5-ab67506dded3', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Baxter Sanchez', 'Similique voluptatem incidunt asperiores voluptatibus consectetur necessitatibus consequatur beatae harum aliquip sit quas repellendus Dolor harum fug', '122.00', 'EUR', '2017-11-23 22:13:42'),
('3705f57b-2403-4f48-9996-86467a789f80', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Mannix Klein', 'Eum voluptates voluptatem ratione porro doloribus explicabo Irure Voluptatem quod explicabo Dolorem enim', '566.00', 'EUR', '2017-11-23 22:11:44'),
('3dccb038-c7fb-4342-924c-6fd28787c9fa', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Hop Cantrell', 'Officiis qui maxime possimus proident amet alias illum maiores est commodo tempora neque Ipsa quis illo non dolor et consequatur voluptatem ullamco lo', '195.00', 'USD', '2017-11-23 22:12:19'),
('434d7c20-f84a-4eb8-be17-9a8dfd83e59c', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Brenden Osborn', 'Consectetur labore molestiae quis nihil pariatur Irure officiis quia ullam non quis magnam repudiandae Quidem ut dolorem commodo accusantium consequat', '167.00', 'EUR', '2017-11-23 22:11:58'),
('519501ea-d029-47d6-a178-439b790a2dcb', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Angela Kaufman', 'Adipisci error dolor sed lorem et qui Laborum Ducimus vero qui magnam proident quis sed enim non eligendi in voluptatum occaecat debitis eiusmod', '483.00', 'USD', '2017-11-23 22:11:30'),
('5454f776-74d8-4fbe-aa9d-825f038c7157', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Laith Hardy', 'Quae sint voluptas est architecto libero facilis magnam ducimus Proident ex voluptas et non ex fuga Expedita anim incididunt aliquip voluptatem esse e', '816.00', 'EUR', '2017-11-23 22:12:25'),
('672410ff-cba2-4f09-8ced-7f75dcc8da79', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Kane Sosa', 'Non quia dolore nihil voluptatem Similique ratione est odit porro iste a repellendus Totam est iste impedit iusto deleniti reiciendis eveniet officiis', '441.00', 'USD', '2017-11-23 22:13:22'),
('74ef9de8-4a37-48c5-9223-447012808d7e', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Dakota Meyers', 'Minima aut quam magni nisi dolorem vitae magna aperiam totam debitis delectus Impedit soluta accusamus maiores corporis magnam minus qui atque in aut ', '292.00', 'USD', '2017-11-23 22:12:04'),
('80e2aae0-35a3-4dc7-8339-eadb07f41e42', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Unity Conner', 'Eaque aliqua Id dolores consectetur autem elit sed ex proident harum nisi officiis sunt eu accusantium fugit Quis laboris qui sint cumque consectetur ', '445.00', 'EUR', '2017-11-23 22:13:52'),
('84c6a989-05d8-495a-b796-fb2f6d925b74', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Jermaine Vaughan', 'Pariatur Enim eum sit dolor est excepturi iusto Saepe est aliqua Tempora rerum exercitation non illum dolor laudantium labore temporibus voluptatem', '516.00', 'USD', '2017-11-23 22:11:37'),
('84de5cd5-bb42-4bec-9119-702a6363425f', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Farrah Mccarty', 'Et est aut illum distinctio Eu a officiis sint qui labore omnis Voluptas cum repudiandae neque laboris cupiditate quos molestias ut non esse ullamco d', '146.00', 'USD', '2017-11-23 22:12:48'),
('8794a575-36fe-4e14-903d-dc814b0e6d2f', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Lael Ware', 'Inventore omnis dolore sed rem laborum esse voluptates et ut enim eaque beatae deserunt aliqua Asperiores Quia consectetur pariatur Modi rerum deserun', '713.00', 'USD', '2017-11-23 22:11:51'),
('94e00ba9-a2d5-4a46-9578-413da4147b05', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Aidan Chang', 'Rem officiis quis sit ullamco modi Aut error ipsum et enim facilis cupidatat rerum et non possimus aut quia sapiente quia ut', '493.00', 'USD', '2017-11-23 22:13:59'),
('a19a46b4-3874-45fc-b473-d7f320e2d396', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Jessamine Valentine', 'Hic quasi quis expedita exercitation provident odio non quis nostrum aperiam aut quis maxime fugiat in dolor dicta porro Dolore quas ex rerum tenetur ', '814.00', 'EUR', '2017-11-23 22:13:29'),
('a97f59a7-8d3d-485a-9b96-3b9f81518746', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Courtney Frazier', 'Sit aliquip tempor sint atque minus deserunt voluptatem magna tempora quia dolores amet nostrud Velit voluptas quia esse molestiae magni autem volupta', '706.00', 'USD', '2017-11-23 22:12:53'),
('ac33b376-7fb4-45fd-a7ef-efa8ef0b4d74', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Pascale Doyle', 'Voluptatem ea aut excepteur nostrud rerum delectus Voluptatem ea aut excepteur nostrud rerum delectus', '233.00', 'USD', '2017-11-23 21:38:57'),
('b7f1692c-b6ae-4391-b2f3-1570b1d9f754', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Quentin Gilliam', 'Natus id laborum commodi nulla et voluptate ad aliquip nulla Debitis aliquid qui laborum fugiat itaque inventore sunt illo est tempora sed id doloribu', '309.00', 'USD', '2017-11-23 22:11:22'),
('dc23e538-8400-4e79-9acf-e74291bec6eb', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Kaye Bell', 'Dignissimos sed delectus facere praesentium voluptatem eius ad officia eum ipsum quisquam sed in eveniet et non corporis cupiditate Enim elit deserunt', '696.00', 'USD', '2017-11-23 22:12:41'),
('e6f52e5b-3ca5-4f4d-88b0-d51dfa7a82e0', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Imani Booth', 'Aut eligendi molestias aperiam magni sit nemo similique dolorem eum repellendus In veniam voluptas id quibusdam Est et voluptatibus adipisci sequi ull', '778.00', 'EUR', '2017-11-23 22:13:04'),
('f4743665-5f7d-487b-87f5-bcf61f0f76b3', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Zachery Wagner', 'Tenetur excepteur quasi voluptatum quis occaecat quis explicabo Non et ex vitae ea laborum Provident ut quaerat distinctio Laudantium quis Nostrud rep', '949.00', 'EUR', '2017-11-23 22:12:59'),
('fbe5c9b0-32e5-4ca8-9831-2a41ec8f2ce8', 'dd109afd-a4dd-4b37-b926-bf4010d53240', 'Callie West', 'Deserunt ratione voluptates aliquam autem repudiandae autem a incidunt natus sit harum odit in et rerum omnis similique beatae Provident temporibus il', '333.00', 'USD', '2017-11-23 22:12:36');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` varchar(36) NOT NULL COMMENT 'User identifier',
  `email` varchar(255) NOT NULL COMMENT 'E-mail address',
  `algorithm` varchar(128) NOT NULL DEFAULT 'sha1' COMMENT 'Password algorithm',
  `salt` varchar(128) DEFAULT NULL COMMENT 'Password salt',
  `password` varchar(40) DEFAULT NULL COMMENT 'Hashed password',
  `added_at` datetime NOT NULL COMMENT 'Add date'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Table with users';

--
-- Zrzut danych tabeli `user`
--

INSERT INTO `user` (`id`, `email`, `algorithm`, `salt`, `password`, `added_at`) VALUES
('12453fc6-d08b-11e7-b902-28d244285bde', 'fake@example.com', 'sha1', NULL, 'a94a8fe5ccb19ba61c4c0873d391e987982fbbd3', '2017-11-19 12:17:42'),
('dd109afd-a4dd-4b37-b926-bf4010d53240', 'codesensus@gmail.com', 'sha1', NULL, '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', '2017-11-11 17:50:08');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `product`
--
ALTER TABLE `product`
 ADD PRIMARY KEY (`id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `product`
--
ALTER TABLE `product`
ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
