-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Янв 23 2021 г., 17:04
-- Версия сервера: 10.4.12-MariaDB
-- Версия PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `practice`
--

-- --------------------------------------------------------

--
-- Структура таблицы `user_form`
--

CREATE TABLE `user_form` (
  `nickname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Anonimus',
  `select1` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `thems` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_text` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `select2` tinytext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bookgenre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `publication_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_form`
--

INSERT INTO `user_form` (`nickname`, `select1`, `thems`, `user_text`, `select2`, `bookname`, `bookgenre`, `publication_time`) VALUES
('Anonymous', 'Приклад з мистецтва', '', 'У фільмі режисера Девіда Френкела «Диявол носить «Прада»» молода асистентка завойовала повагу прискіпливих та вимогливих співробітників модного журналу завдяки спілкуванню та вмінню знаходити шлях до серця кожного. Вона не соромилася питати поради в усіх працівників і намагалася максимально адаптуватися у новому для неї середовищі. Її світосприйняття змінилося. Вона знайшла свій стиль, і стала більш вишуканою. Отже, вміння спілкуватися допомогло їй досягти успіху у кар’єрі.', '', '«Диявол носить «Прада»»', 'драма; ‎комедія', '2021-01-08 21:15:00');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `user_form`
--
ALTER TABLE `user_form`
  ADD UNIQUE KEY `user_text` (`user_text`) USING HASH;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
