-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 27 2020 г., 00:32
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `catalog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'Александр Авраменко'),
(2, 'Джоан Роллинг'),
(3, 'Марк Менсон'),
(4, 'Стивен Кинг'),
(5, 'Аманда Мейсон'),
(6, 'Лев Толстой'),
(7, 'Александр Пушкин'),
(8, 'Иван Бунин'),
(9, 'Григорий Сковорода');

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `shortDesc` varchar(256) NOT NULL,
  `fullDesc` varchar(256) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `name`, `shortDesc`, `fullDesc`, `price`) VALUES
(1, 'Война и Мир', 'Описание Война и Мир', 'Описание Война и Мир', 125),
(2, 'Солдат удачи', 'Описание Солдат удачи', 'Описание Солдат удачи', 345),
(3, 'Евгений Онегин', 'Описание Евгений Онегин', 'Описание Евгений Онегин', 331),
(4, 'Вкус рая', 'Описание Вкус рая', 'Описание Вкус рая', 654),
(5, 'Садовник счастья', 'Описание Садовник счастья', 'Описание Садовник счастья', 556),
(6, 'Гарри Поттер', 'Описание Гарри Поттер', 'Описание Гарри Поттер', 457),
(7, 'Антоновские яблоки', 'Описание Антоновские яблоки', 'Описание Антоновские яблоки', 332),
(8, 'Мужские правила', 'Описание Мужские правила', 'Описание Мужские правила', 554),
(9, 'Сияние', 'Описание Сияние', 'Описание Сияние', 543);

-- --------------------------------------------------------

--
-- Структура таблицы `books_authors`
--

CREATE TABLE `books_authors` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `books_authors`
--

INSERT INTO `books_authors` (`id`, `author_id`, `book_id`) VALUES
(1, 6, 1),
(2, 1, 2),
(3, 7, 3),
(4, 5, 4),
(5, 9, 5),
(7, 2, 6),
(8, 8, 7),
(9, 3, 8),
(11, 4, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `books_genres`
--

CREATE TABLE `books_genres` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `books_genres`
--

INSERT INTO `books_genres` (`id`, `genre_id`, `book_id`) VALUES
(1, 3, 1),
(2, 4, 2),
(3, 6, 3),
(4, 2, 4),
(5, 7, 5),
(7, 4, 6),
(8, 5, 6),
(9, 7, 7),
(10, 4, 8),
(12, 4, 9),
(13, 5, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Дамп данных таблицы `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Детективы'),
(2, 'Романы'),
(3, 'Исторические'),
(4, 'Приключения'),
(5, 'Фантастика'),
(6, 'Поэзия'),
(7, 'Проза'),
(8, 'Детские');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_authors`
--
ALTER TABLE `books_authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books_genres`
--
ALTER TABLE `books_genres`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `books_authors`
--
ALTER TABLE `books_authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `books_genres`
--
ALTER TABLE `books_genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
