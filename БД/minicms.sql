-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Июн 11 2018 г., 20:52
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `minicms`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id_category` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `name_category` varchar(255) NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id_category`, `name_category`) VALUES
(1, 'todo'),
(2, 'doing'),
(3, 'done');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `comment` text NOT NULL,
  `ticket` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `comment`, `ticket`) VALUES
(1, 'Это комментарий к первому тикету под номером #1', 1),
(2, 'Это второй комментарий к первому тикету под номером #1', 1),
(3, 'Это комментарий к тикету под номером #2', 2),
(4, '2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением', 2),
(5, '2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением', 2),
(6, '2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением', 1),
(7, '2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением', 4),
(8, '2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением', 137),
(9, '2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением2Сервер не найден - Устранение проблем с подключением', 137),
(10, '12313131231231', 2),
(11, '123123123', 2),
(12, '123123', 137),
(13, '123123123123123123', 2),
(14, '123123123123123123', 2),
(15, '123123123123123123', 2),
(16, '123123123123123123', 2),
(17, '123123123123123123', 2),
(18, '123123123123123123', 2),
(19, '123123123123123123', 2),
(20, '123123123123123123', 2),
(21, '13123123', 4),
(22, '13123123', 4),
(23, '13123123', 4),
(24, '13123123', 4),
(25, '555', 141),
(26, '555', 141),
(27, 'GFsdgsfsfsfsfsfsdf', 141),
(28, '123', 141),
(29, '5555123', 141),
(30, 'dddddddddddddddd', 4),
(31, 'новый коммент', 2),
(32, 'Новый комментарий аываыаыаыаыаыа', 142),
(33, 'Тест на ошибки пройдет, требуется правка программиста', 145),
(34, 'Программист пофиксил, требуется тест', 145),
(35, 'Тестирование прошло успешно', 145),
(36, 'Требуется тестирование функции', 143),
(37, 'Требуется перезагрузка сервера', 146),
(38, 'Требуется повторное тестирование', 143),
(39, 'Недостаточно времени на покупку', 148),
(40, 'Будет закуплен в срочном порядке', 148);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket`
--

CREATE TABLE IF NOT EXISTS `ticket` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `disc` text NOT NULL,
  `inwork` enum('todo','doing','done') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `inwork` (`inwork`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=149 ;

--
-- Дамп данных таблицы `ticket`
--

INSERT INTO `ticket` (`id`, `title`, `disc`, `inwork`, `date`) VALUES
(143, 'Задача1. Не работает вызов функции', 'Вызов функции не осуществляется, требуется правка', 'doing', '2018-06-11 16:22:34'),
(144, 'Задача2. Не работает  форма отправки', 'Форма не отправляет данные на сервер', 'todo', '2018-06-11 15:39:40'),
(145, 'Тест формы отправки', 'Форма отправки требует тестирования на ошибки', 'done', '2018-06-11 15:41:45'),
(146, 'Сервер не работает', 'Сервер google.ru не работает, требуется правка. Сервер google.ru не работает, требуется правка', 'doing', '2018-06-11 16:22:08'),
(147, 'Не работает форма отправки писем', 'Не работает форма отправки писем, срочно пофиксить. Не работает форма отправки писем, срочно пофиксить. Не работает форма отправки писем, срочно пофиксить. Не работает форма отправки писем, срочно пофиксить. ', 'todo', '2018-06-11 17:48:52'),
(148, 'Не работает ПК', 'Срочный ремонт', 'todo', '2018-06-11 17:50:06');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
