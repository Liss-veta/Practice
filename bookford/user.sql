-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 13 2021 г., 06:15
-- Версия сервера: 8.0.19
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `user`
--

-- --------------------------------------------------------

--
-- Структура таблицы `userss`
--

CREATE TABLE `userss` (
  `id_user` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `login` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `profile` varchar(1000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(10000) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `userss`
--

INSERT INTO `userss` (`id_user`, `name`, `surname`, `login`, `email`, `profile`, `password`) VALUES
(7, 'lisa', 'iva', 'liss', 'lizavetivannikova@gmail.com', 'images_for_reg/16366245346pgkyH-R1AM.jpg', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Artem', 'Kim', 'Allogikal', 'kimag@bk.ru', 'images_for_reg/1636656964rgjaUca3N74.jpg', 'd8578edf8458ce06fbc5bb76a58c5ca4');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `userss`
--
ALTER TABLE `userss`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `userss`
--
ALTER TABLE `userss`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
