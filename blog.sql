-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 29 2023 г., 00:56
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Питание'),
(2, 'Упражнения'),
(3, 'Гигиена');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `id_category` int DEFAULT NULL,
  `view` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `id_category`, `view`) VALUES
(1, '5 причин делать утреннюю зарядку ', 'Утреннее пробуждение всегда сопряжено с сонливостью и даже некоторой ленью. Чтобы взбодриться, некоторые люди тут же заваривают себе ароматный кофе, другие начинают день с принятия душа. И только немногие пробуждаются при помощи утренней зарядки. Как показывает практика, именно те, кто взбадривает организм физкультурой, быстрее переходят в активный режим. Итак, в чем же польза зарядки? Для чего она нужна? И какие упражнения лучше делать по утрам?', 2, 0),
(2, 'Правильное питание: переход на здоровый рацион', 'Правильное питание – это способ заботиться о себе, планировать бюджет и находить новые интересы в жизни. Это здоровая альтернатива диетам-семидневкам, голоданию или бесконтрольному поглощению всего того, что оказалось на тарелке.\r\n\r\nПереход на правильное питание помогает нормализовать массу тела, стать более энергичным и ответственным за свою жизнь.\r\nПравильное питание – это долгая история. Это понимание:\r\n\r\n-что и когда можно есть;\r\n-в каком количестве и соотношении;\r\n-как часто можно выбирать вредные продукты.', 1, 0),
(3, 'Новость 3', 'полный текст', 1, 1),
(4, 'Новость 4', 'полный текст', 2, 1),
(5, 'Новость 5', 'полный текст', 3, 1),
(6, 'Новость 6', 'полный текст', 1, 1),
(7, 'Новость 7', 'полный текст', 3, 1),
(8, 'Новость 8', 'полный текст', 2, 1),
(9, 'Новость 9', 'полный текст', 2, 1),
(10, 'Новость 10', 'полный текст', 1, 1),
(11, 'Новость 11', 'полный текст', 3, 1),
(12, 'Новость 12', 'полный текст', 1, 1),
(13, 'Новость 13', 'полный текст', 1, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `grants` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'moderator'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `email`, `password`, `grants`) VALUES
(5, 'Tanya', 'tanya', 'tanya_bondar_03@mail.ru', '25d55ad283aa400af464c76d713c07ad', 'moderator'),
(6, 'nik', 'nik1', 'nik@mail.ru', '3fc0a7acf087f549ac2b266baf94b8b1', 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
