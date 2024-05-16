-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 14 2023 г., 11:35
-- Версия сервера: 10.3.36-MariaDB
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `zoo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `animaltype_id` int(11) NOT NULL,
  `sex_id` int(11) DEFAULT NULL,
  `img` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `animal`
--

INSERT INTO `animal` (`id`, `name`, `user_id`, `animaltype_id`, `sex_id`, `img`) VALUES
(19, 'мурзик', 4, 1, 1, '1141781 (1).jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `animaltype`
--

CREATE TABLE `animaltype` (
  `id` int(11) NOT NULL,
  `title` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `animaltype`
--

INSERT INTO `animaltype` (`id`, `title`) VALUES
(1, 'кошка'),
(2, 'собака'),
(3, 'лошадь'),
(4, 'попугай');

-- --------------------------------------------------------

--
-- Структура таблицы `application`
--

CREATE TABLE `application` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `username` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uslugi_id` int(11) NOT NULL,
  `status` int(2) DEFAULT NULL,
  `animal_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `application`
--

INSERT INTO `application` (`id`, `user_id`, `username`, `email`, `phone`, `uslugi_id`, `status`, `animal_id`) VALUES
(11, 4, 'admin', 'ii@mail.com', '+7(896)-301-04-64', 1, NULL, 19);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `img`) VALUES
(1, 'лошади', 'horse.jpg'),
(2, 'собаки', 'dog.jpg'),
(3, 'кошки', 'cat.jpeg'),
(4, 'грызуны', 'ham.jpg'),
(5, 'пернатые', 'ara.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Россия'),
(2, 'Китай');

-- --------------------------------------------------------

--
-- Структура таблицы `measure`
--

CREATE TABLE `measure` (
  `id` int(11) NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `measure`
--

INSERT INTO `measure` (`id`, `name`) VALUES
(1, '100г'),
(2, '85г'),
(3, '1кг'),
(4, '1,5кг'),
(5, '500г'),
(6, '2кг');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `proizvod_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `measure_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `img`, `count`, `country_id`, `proizvod_id`, `type_id`, `measure_id`, `category_id`) VALUES
(1, 'Cesar влажный корм', '42', '1.jpeg', 87, 1, 4, 1, 1, 2),
(2, 'Whiskas Вкусный обед, Мясная коллекция, Говядина, Желе', '22', '1.png', 200, 1, 7, 1, 2, 3),
(3, 'PURINA ONE сухой корм для привередливых кошек с уткой и печенью', '460', '2.png', 100, 2, 6, 1, 5, 3),
(4, 'Felix Влажный корм для взрослых кошек, с говядиной, суп', '30', '3.png', 45, 2, 8, 1, 2, 3),
(5, 'Kitekat сухой полнорационный корм для взрослых кошек «Телятинка Аппетитная»', '507', '4.png', 72, 1, 5, 1, 6, 3),
(6, 'Smart Cat лакомства легкое говяжье', '118', '13.png', 420, 1, 6, 1, 1, 3),
(7, 'Корм Royal Canin корм сухой сбалансированный для стерилизованных котят до 12 месяцев', '1000', '13.png', 50, 2, 3, 1, 4, 3),
(8, 'Корм Purina Pro Plan для котят с чувствительным пищеварением или с особыми предпочтениями в еде, с высоким содержанием индейки', '2750', '13.png', 20, 1, 6, 1, 6, 3),
(9, 'Корм Purina Pro Plan для котят с чувствительным пищеварением или с особыми предпочтениями в еде, с высоким содержанием индейки', '450', '13.png', 20, 2, 6, 1, 5, 3),
(10, 'Smart Cat лакомства легкое говяжьеSmart Cat лакомства легкое говяжье', '400', '0.png', 6, 1, 8, 1, 5, 3),
(13, 'Smart Cat лакомства легкое говяжье', '800', '13.png', 20, 2, 6, 1, 2, 3),
(14, 'Smart Cat лакомства легкое говяжье', '4000', '0.png', 6, 2, 8, 1, 6, 3),
(15, 'Корм Purina Pro Plan для котят с чувствительным пищеварением или с особыми предпочтениями в еде, с высоким содержанием индейки', '670', '13.png', 20, 2, 3, 1, 3, 3),
(16, 'Корм Purina Pro Plan для котят с чувствительным пищеварением или с особыми предпочтениями в еде, с высоким содержанием индейки', '100', '0.png', 6, 1, 7, 1, 2, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `proizvod`
--

CREATE TABLE `proizvod` (
  `id` int(11) NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `proizvod`
--

INSERT INTO `proizvod` (`id`, `name`) VALUES
(1, 'Педигри'),
(2, 'Grand dog'),
(3, 'Вискас'),
(4, 'Cesar'),
(5, 'Kitecat'),
(6, 'Purino ONE'),
(7, 'Whiskas'),
(8, 'Felix');

-- --------------------------------------------------------

--
-- Структура таблицы `sex`
--

CREATE TABLE `sex` (
  `id` int(11) NOT NULL,
  `title` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `sex`
--

INSERT INTO `sex` (`id`, `title`) VALUES
(1, 'самец'),
(2, 'самка');

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(56) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`id`, `name`) VALUES
(1, 'корм'),
(2, 'игрушка'),
(3, 'витамины'),
(4, 'аксессуар ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(34) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(34) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int(2) NOT NULL DEFAULT 0,
  `password` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `surname`, `email`, `role`, `password`) VALUES
(3, 'admin', 'admin', 'admin@admin.ru', 1, '$2y$13$qRJBN2vlq9TYKDzSBWF/OewxicdBKJyYeCL2foizDkGvZIZfwiZ5W'),
(4, 'test1@mail.ru', 'test1@mail.ru', 'test1@mail.ru', 0, '$2y$13$ufMNglroY8YwgQxwZ9LDC.xsOK9thSbcnMo2ZOsp5VTz3LBcZ5Y..');

-- --------------------------------------------------------

--
-- Структура таблицы `uslugi`
--

CREATE TABLE `uslugi` (
  `id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` varchar(56) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `uslugi`
--

INSERT INTO `uslugi` (`id`, `title`, `price`, `text`, `img`) VALUES
(1, 'Первичный прием', '600', 'Первичный прием в любом учреждении здравоохранения начинается с регистрации. На животное заводится амбулаторная карта, в которую вносится вся важная информация. Затем питомец попадает в кабинет врача, где ветеринар досконально опрашивает хозяина, чтобы выяснить причины обращения в ветклинику', '8.jpg'),
(2, 'Вторичный прием', '400', 'Повторный прием- это повторное обращение владельца животного планово по предписанию врача или же в случае необходимости в виду изменения состояния здоровья животного. Но не позднее одного месяца, после первичного приема и постановки диагноза. Во время повторного(ых) приема врач оценивает динамику заболевания (улучшение/ухудшение состояния), производится корректировка лечения, могут быть назначены дополнительные анализы, ставится окончательный диагноз.', 'so.jpg'),
(3, 'Вакцинация ', '500', 'Вакцинация животных – это профилактическое мероприятие, направленное на формирование у питомца стойкого иммунитета к вирусам и бактериям – возбудителям опасных заболеваний (бешенство, чума, кальцивирусная инфекция и других). Профилактическая вакцинация позволит предотвратить развитие болезни и подарить животному счастливую полноценную жизнь.', '1.jpg'),
(4, 'Стерилизация', '2800', 'Под стерилизацией в обиходе понимают проведение операции, в результате которой у кошки (или кота) пропадает половой инстинкт. © «Lapkins.ru» Копирование материалов запрещено', 'ad.jpeg'),
(5, 'Кастрация', '1000', 'Кастрация – это операция, которая заключается в удалении у животных репродуктивных органов.\r\n', 'kos.jpg'),
(6, 'Подрезка когтей', '170-210', 'механическое удаление ороговевшего дальнего участка когтя. Ниже представлены основные показания для проведения процедуры: Предотвращение травматического повреждения когтей, который может развиться при значительной его длине, удаление поврежденных и вросших когтей, обеспечения нормальной постановки животного на подушечки пальцев, снижение вероятности повреждений когтями животного человека, мебели и других животных.', 'kogti.jpg'),
(7, 'Наклейка \"Анти-царапок\"', '70', ' Мягкие коготки (они же антицарапки) – прекрасное современное средство, спасающее мебель, ковры, стены и руки хозяев от чрезмерной активности кошек и в то же время ничуть не вредящее физиологии кошки. В отличие от операции по удалению когтей (онихэктомии) мягкие коготки не изменяют поведение и не вредят здоровью кошки.', 'anty.jpeg'),
(8, 'Инъекция п/кож. и в/мыш.', '138', 'Подкожные инъекции\r\nМногие лекарства, в том числе и вакцины, вводятся подкожным методом. Он считается наиболее безболезненным. Благодаря тому, что под кожей расположено большое количество капилляров – состав быстро впитывается в кровь и начинает свое действие. Обычно местом подкожно введения лекарств является холка животного. Перед процедурой и после место прокола обрабатывается спиртом.\r\nВнутримышечные инъекции\r\nВведение лекарственных препаратов иногда бывает внутримышечным. Все зависит от самого состава. В мышцах большое количество сосудов, которые ускоряют начало действия препаратов. Этот метод намного сложнее, чем подкожный. Ведь есть риск того, что игла шприца попадет в нерв или сосуд. Поэтому ни в коем случае не делайте такие инъекции самостоятельно. Лучше доверить манипуляцию профессионалу.', 'ин.jpeg'),
(9, 'Гигиеническая чистка ушей', '200', 'Классическая процедура включает выщипывание волосков внутри слухового аппарата, которые создают сложности для естественной вентиляции, промывку гигиеническим лосьоном или протирание ватным диском, смоченным в специальном средстве. Периодичность проведения процедуры определяется различными факторами, среди них возраст, порода, форма ушей и привычки четвероногого друга.', 'чист.jpeg'),
(10, 'Лечение отодектозы', '450', 'Отодектоз – паразитирование на теле животного клеща Otodectes cyanotis. Наибольшее количества ушного клеща определяется в наружном слуховом проходе, но он также живет на теле животного без развития поражения кожи.', 'одок.jpeg'),
(11, 'Бактериальный анализ(мазок)', '300', 'Бактериологический анализ представляет собой лабораторное исследование, заключающееся в посеве взятого от больного материала на питательные среды, на которых вырастают колонии бактерий, изучаемых и идентифицируемых потом под микроскопом.', 'сним.png'),
(12, 'Анализ на дерматомикозы', '450', 'Посев на возбудителей дерматомикозов (Trichophyton spp., Microsporum spp., Epidermophyton spp.) без определения чувствительности к антимикотическим препаратам – метод микробиологической диагностики с культивированием и последующей идентификацией возбудителя поверхностных грибковых инфекций кожи и её производных без выявления его чувствительности к противогрибковым лекарственным препаратам.', 'покороче.jpg'),
(13, 'Вскрытие с постановкой диагноза', '1000-5000', 'Патологоанатомическим вскрытием — аутопсией, называется всестороннее исследование павшего или убитого животного для уточнения правильности прижизненного диагноза, установления морфологических изменений в органах и причины его смерти.\r\n', '9058.jpg'),
(14, 'Оценка хоз. деятельности предприятий и КФХ', '4000-5000', 'Анализ оценки эффективности деятельности крестьянских (фермерских) хозяйств как самостоятельной предпринимательской структуры', '005_1.jpg'),
(15, 'Выезд специалиста на дом (в час)', '20', 'Вызов ветеринарного врача – это отличная возможность не подвергать заболевшую собаку или кошку дополнительному стрессу, связанному с транспортировкой в клинику.\r\n', 'вет.jpg'),
(16, 'Кремация', '250', 'Кремация – это единственный достойный способ проводить умершего домашнего питомца, который много лет был преданным другом. Процедура кремации проводится после естественной смерти или вынужденной эвтаназии животного.\r\n', 'krem.jpg');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animaltype_id` (`animaltype_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `sex_id` (`sex_id`);

--
-- Индексы таблицы `animaltype`
--
ALTER TABLE `animaltype`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`),
  ADD KEY `animal_id` (`animal_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `uslugi_id` (`uslugi_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `measure`
--
ALTER TABLE `measure`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `country__id` (`country_id`),
  ADD KEY `type_id` (`type_id`),
  ADD KEY `proizvod_id` (`proizvod_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `measure_id` (`measure_id`);

--
-- Индексы таблицы `proizvod`
--
ALTER TABLE `proizvod`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `sex`
--
ALTER TABLE `sex`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `uslugi`
--
ALTER TABLE `uslugi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `animaltype`
--
ALTER TABLE `animaltype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `application`
--
ALTER TABLE `application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `measure`
--
ALTER TABLE `measure`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `proizvod`
--
ALTER TABLE `proizvod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `sex`
--
ALTER TABLE `sex`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `uslugi`
--
ALTER TABLE `uslugi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `animal`
--
ALTER TABLE `animal`
  ADD CONSTRAINT `animal_ibfk_1` FOREIGN KEY (`animaltype_id`) REFERENCES `animaltype` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `animal_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `animal_ibfk_3` FOREIGN KEY (`sex_id`) REFERENCES `sex` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `application`
--
ALTER TABLE `application`
  ADD CONSTRAINT `application_ibfk_1` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `application_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `application_ibfk_3` FOREIGN KEY (`uslugi_id`) REFERENCES `uslugi` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`proizvod_id`) REFERENCES `proizvod` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_5` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_ibfk_6` FOREIGN KEY (`measure_id`) REFERENCES `measure` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
