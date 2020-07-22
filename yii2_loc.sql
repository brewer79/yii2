-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 08 2020 г., 04:38
-- Версия сервера: 5.6.38
-- Версия PHP: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2_loc`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) UNSIGNED NOT NULL,
  `postal_code` char(10) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `building` char(10) NOT NULL,
  `apartment` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `address`
--

INSERT INTO `address` (`id`, `customer_id`, `postal_code`, `country`, `city`, `street`, `building`, `apartment`) VALUES
(3, 6, '01234', 'AA', 'City1', 'Main street', '11', '22'),
(4, 5, '03210', 'LL', 'City2', 'Some str.', '43', '34'),
(25, 5, '00123', 'QQ', 'City3', 'Some str.', '23', '45'),
(26, 5, '23456', 'WW', 'City4', 'Some str.', '321', '432'),
(28, 5, '67890', 'ER', 'City5', 'Qwerty street', '12', '345'),
(30, 5, '76543', 'RR', 'City', 'First Street', '222', '34'),
(31, 5, '00000', 'UA', 'City6', '1 Street', '33', '44'),
(32, 5, '0147', 'US', 'City7', 'Some str.', '1', '1'),
(33, 7, '12345', 'DE', 'Some City', '1 Street', '45', '77'),
(34, 8, '09876', 'RR', 'City', 'Street', '01', '11'),
(35, 9, '55555', 'DD', 'City', 'Street', '55', '555'),
(36, 10, '13579', 'TT', 'Capital', 'Main str.', '34', '42');

-- --------------------------------------------------------

--
-- Структура таблицы `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `customer`
--

INSERT INTO `customer` (`id`, `login`, `password`, `first_name`, `last_name`, `gender`, `created_at`, `email`) VALUES
(5, 'login1', 'pass11', 'First1', 'Last1', 'Male', '2019-12-23 12:41:30', 'mail1@mail.com'),
(6, 'login2', 'pass22', 'First2', 'Last2', 'Male', '2019-12-23 13:20:15', 'mail2@mail.com'),
(7, 'login3', 'pass33', 'First3', 'Last3', 'Female', '2020-01-08 01:03:45', 'mail3@mail.com'),
(8, 'login4', 'pass44', 'First4', 'Last4', 'Undefined', '2020-01-08 01:05:10', 'mail4@mail.com'),
(9, 'login5', 'pass55', 'First5', 'Last5', 'Male', '2020-01-08 01:06:16', 'mail5@mail.com'),
(10, 'login6', 'pass67', 'First6', 'Last6', 'Female', '2020-01-08 01:07:30', 'mail6@mail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `address`
--
ALTER TABLE `address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT для таблицы `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
