-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 21 2021 г., 12:39
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT ''''''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `token`) VALUES
(1, 'arthas', '12345', 'asdasdcxvxbb'),
(2, 'silvana', '12345', '123456vbn'),
(3, 'admin', 'qwerty', '\'\''),
(4, 'ivan', '$2y$10$tyxQfj1fdc7MRQsT4DMAD.F1fiEAZTYPpvnnrQvy6w34ZIDIhMhQ6', '9e91ea20f3a90c3773c5c64693a7f7f6'),
(5, 'oleg', '$2y$10$b0Rfhocd4EJy3AZdaL1VpOy.impRWbiSmlQZlQRAXVo6y18ioR.TC', '\'\''),
(6, 'vasya', '$2y$10$sHxlZ0uriYbPixB7h8kPdODu.Ea2sfcK7IplooP2lUnJmLXubQUcC', '\'\''),
(7, 'andrew', '$2y$10$3/WeZoTFn6QNHYmfKsdq.eVJDS0brOX2baJRFLUU6LiX0tLj.vAvq', '\'\''),
(8, 'kostya', '$2y$10$hRF8Mwm8J9g.y2YbatHHX.4hs5HI7XwG0KjeHeeBLnpDX0W6TyDPy', '\'\'');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
