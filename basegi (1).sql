-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 18 2022 г., 23:15
-- Версия сервера: 8.0.24
-- Версия PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `basegi`
--

-- --------------------------------------------------------

--
-- Структура таблицы `anatoli`
--

CREATE TABLE `anatoli` (
  `id` int NOT NULL,
  `marh` text NOT NULL,
  `rasst` text NOT NULL,
  `zakazi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `anatoli`
--

INSERT INTO `anatoli` (`id`, `marh`, `rasst`, `zakazi`) VALUES
(1, 'Маршрут к северному Басегу', '17000 км', '3982 раз'),
(4, 'Маршрут к южному Басегу', '7000 км ', '587 раз'),
(5, 'Маршрут к вершине северного Басега', '21000 км', '341 раз');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(191) NOT NULL,
  `login` varchar(50) NOT NULL,
  `pas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `pas`) VALUES
(1, 'admin', 'admin', '1'),
(2, 'beba', 'beba', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `anatoli`
--
ALTER TABLE `anatoli`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `anatoli`
--
ALTER TABLE `anatoli`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
