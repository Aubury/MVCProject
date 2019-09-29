-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Сен 29 2019 г., 20:09
-- Версия сервера: 5.7.27-cll-lve
-- Версия PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `qvhklqzo_GIM`
--

-- --------------------------------------------------------

--
-- Структура таблицы `address`
--

CREATE TABLE `address` (
  `address` varchar(500) DEFAULT NULL,
  `telephones` varchar(1000) DEFAULT NULL,
  `link` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `patronymic` varchar(50) NOT NULL,
  `surname` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `role` int(10) NOT NULL DEFAULT '0' COMMENT 'admin - 0, superAdmin - 1',
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `name`, `patronymic`, `surname`, `email`, `password`, `role`, `registration_date`, `last_visit`) VALUES
(1, 'Наталья', 'Федотовна', 'Обури', 'aubury@ukr.net', '$2y$10$/83gDeUH/JJjT0CS3zu1gO44wmKDsG3RuGUpFSB.DfiXMVDHyCoiO', 1, '2019-09-23 11:38:09', '2019-09-29 17:08:48'),
(2, 'Петер', 'Петрович', 'Петров', 'nfaubury@gmail.com', '$2y$10$7k5C773mZcxbLcdXBfQr0u7fU9yhW3N3inNuXafG4wCqB7LVuTWgS', 0, '2019-09-23 11:38:51', '2019-09-23 11:38:51');

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `id_complaint` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_admin` int(11) NOT NULL,
  `text` varchar(2000) DEFAULT NULL,
  `date_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `id_complaint`, `email`, `id_admin`, `text`, `date_time`) VALUES
(1, 1, 'aubury@ukr.net', 0, '', '2019-09-25 12:33:41'),
(2, 2, 'nfaubury@gmail.com', 0, 'Bye!', '2019-09-25 12:34:49');

-- --------------------------------------------------------

--
-- Структура таблицы `budget`
--

CREATE TABLE `budget` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `timeDate` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `budget`
--

INSERT INTO `budget` (`id`, `project_name`, `email_user`, `amount`, `timeDate`) VALUES
(1, 'Дом', '0', 2000, '2019-09-29'),
(2, 'Дом', '0', 2000, '2019-09-29'),
(3, 'Дом 2', '0', 5000, '2019-09-29'),
(4, 'Дом 2', '0', 2000, '2019-09-29'),
(5, 'Дом 2', '0', 2000, '2019-09-29'),
(6, 'Дом 2', '', 2000, '2019-09-29'),
(7, 'Дом 2', 'poliak@ pol.com', 2000, '2019-09-29');

-- --------------------------------------------------------

--
-- Структура таблицы `complaints_suggestions`
--

CREATE TABLE `complaints_suggestions` (
  `id` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `text` varchar(1000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `complaints_suggestions`
--

INSERT INTO `complaints_suggestions` (`id`, `user`, `email`, `text`, `date`) VALUES
(1, 'Даша', 'aubury@ukr.net', 'Привет!', '2019-09-25 12:33:41'),
(2, 'Наташа', 'nfaubury@gmail.com', 'Hi', '2019-09-25 12:34:49');

-- --------------------------------------------------------

--
-- Структура таблицы `logIn`
--

CREATE TABLE `logIn` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `uPd` varchar(100) NOT NULL,
  `role` int(100) UNSIGNED NOT NULL,
  `table` varchar(50) NOT NULL,
  `timeDateLogIn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `logIn`
--

INSERT INTO `logIn` (`id`, `user_id`, `uPd`, `role`, `table`, `timeDateLogIn`) VALUES
(2, 1, '$2y$10$Zfhre31OG1koN7qtSWl3zuTxDulW1A3Xs0WxHbKP2jDK1NVwdQtrS', 1, 'supAdm', '2019-09-26 13:31:01');

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `budget` decimal(10,0) NOT NULL,
  `raiser_money` decimal(10,0) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `name`, `budget`, `raiser_money`) VALUES
(1, 'Дом', 1000000000, 2200),
(2, 'Дом 2', 1000000000, 13000),
(3, 'Полякова', 1000000000, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `patronymic` varchar(50) DEFAULT NULL,
  `surname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `project_name` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `telephon` varchar(20) DEFAULT NULL,
  `tax_code` varchar(10) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `share_investment` decimal(10,0) UNSIGNED NOT NULL,
  `invest_amount` decimal(10,0) UNSIGNED NOT NULL,
  `payment_time` date NOT NULL,
  `registration_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_visit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `patronymic`, `surname`, `email`, `password`, `project_name`, `address`, `telephon`, `tax_code`, `role`, `share_investment`, `invest_amount`, `payment_time`, `registration_date`, `last_visit`) VALUES
(3, 'Наталья', 'Федотовна', 'Обури', 'obn@ukr.net ', '$2y$10$JAdwa4Ml9.r7sw/YF6ZPFOWmihyKUFxswFzyoSPRwUAVYsqoooO9a', 'Дом', 'Днепр, \" Новая почта \" № 6', '+7 (123) 999-99-99', '2147483647', NULL, 0, 2000, '2019-09-29', '2019-09-29 07:05:42', '2019-09-29 07:05:42'),
(4, 'Петер', 'Петрович', 'Петров', 'petrov@petr.com', '$2y$10$LCTyuV6M.3.L1l.bGgiGLuy/c6jJbYSJfWdhZCiEkRchvHlvl9vZW', 'Дом', 'Дом df', '+7 (123) 999-99-99', '2147483647', NULL, 0, 0, '0000-00-00', '2019-09-29 07:06:23', '2019-09-29 07:06:23'),
(5, 'Саша', 'Викторовна', 'Поляк', 'poliak@ pol.com', '$2y$10$aKgmk08tCOXnDCvt.VKGW.rQ7/PIJuOblEGm/PUk.ZAjEvmI69Zxm', 'Дом 2', 'г.Днепр, ул.Шевченко 4, кв.4', '+7 (123) 999-99-99', '2147483647', NULL, 0, 8000, '2019-09-29', '2019-09-29 07:59:22', '2019-09-29 07:59:22');

-- --------------------------------------------------------

--
-- Структура таблицы `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `project_name` varchar(100) NOT NULL,
  `link` varchar(500) NOT NULL,
  `loud_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `weWatchingYou`
--

CREATE TABLE `weWatchingYou` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_admin` int(10) NOT NULL,
  `actions` varchar(100) NOT NULL,
  `timeDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `weWatchingYou`
--

INSERT INTO `weWatchingYou` (`id`, `id_admin`, `actions`, `timeDate`) VALUES
(1, 0, 'Вошел(а) на сайт', '2019-09-26 19:10:21'),
(2, 0, 'Вошел(а) на сайт', '2019-09-26 19:13:48'),
(3, 0, 'Вошел(а) на сайт', '2019-09-27 10:15:58'),
(4, 0, 'Вошел(а) на сайт', '2019-09-27 10:24:53'),
(5, 0, 'Вошел(а) на сайт', '2019-09-28 11:57:25'),
(6, 0, 'Вошел(а) на сайт', '2019-09-28 12:00:23'),
(7, 0, 'Вошел(а) на сайт', '2019-09-28 12:04:51'),
(8, 0, 'Вошел(а) на сайт', '2019-09-28 13:22:20'),
(9, 1, 'Вошел(а) на сайт', '2019-09-28 15:49:06'),
(10, 1, 'Добавил(а) проект  в базу данных', '2019-09-28 19:04:29'),
(11, 1, 'Добавил(а) проект Полякова в базу данных', '2019-09-28 19:11:10'),
(12, 1, 'Добавил(а) платёж от    в фонд проекта Дом', '2019-09-29 12:02:57'),
(13, 1, 'Добавил(а) платёж от Обури Наталья  Федотовна в фонд проекта Дом', '2019-09-29 13:38:23'),
(14, 1, 'Добавил(а) платёж от Поляк Саша  Викторовна в фонд проекта Дом 2', '2019-09-29 14:10:06'),
(15, 1, 'Добавил(а) платёж от Поляк Саша  Викторовна в фонд проекта Дом 2', '2019-09-29 14:16:42'),
(16, 1, 'Добавил(а) платёж от Поляк Саша  Викторовна в фонд проекта Дом 2', '2019-09-29 14:22:31'),
(17, 1, 'Добавил(а) платёж от Поляк Саша  Викторовна в фонд проекта Дом 2', '2019-09-29 14:27:38'),
(18, 1, 'Добавил(а) платёж от Поляк Саша  Викторовна в фонд проекта Дом 2', '2019-09-29 14:43:10'),
(19, 1, 'Вошел(а) на сайт', '2019-09-29 15:59:14'),
(20, 1, 'Админ- Dgfhgj Дом  Петрович удален из базы данных', '2019-09-29 16:11:28'),
(21, 1, 'Админ- Dgfhgj Дом  Петрович удален из базы данных', '2019-09-29 16:13:01');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `budget`
--
ALTER TABLE `budget`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `complaints_suggestions`
--
ALTER TABLE `complaints_suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `logIn`
--
ALTER TABLE `logIn`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `weWatchingYou`
--
ALTER TABLE `weWatchingYou`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `budget`
--
ALTER TABLE `budget`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `complaints_suggestions`
--
ALTER TABLE `complaints_suggestions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `logIn`
--
ALTER TABLE `logIn`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `weWatchingYou`
--
ALTER TABLE `weWatchingYou`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
