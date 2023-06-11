-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Чрв 06 2023 р., 15:16
-- Версія сервера: 5.7.39
-- Версія PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `OverclockBD`
--

-- --------------------------------------------------------

--
-- Структура таблиці `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `brand`
--

INSERT INTO `brand` (`id`, `name`, `photo`) VALUES
(21, 'Balmain', '63babb8b90111.jpg'),
(22, 'Calvin Klein', '63bb3a15cb6e3.jpg'),
(23, 'Diesel', '63c04d5834407.jpg'),
(24, 'Hugo Boss', '63c3e76a209d3.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `gender`
--

CREATE TABLE `gender` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `gender`
--

INSERT INTO `gender` (`id`, `name`, `photo`) VALUES
(51, 'Чоловічі', '63babb666e08c.jpg'),
(52, 'Жіночі', '63babb3269e8e.jpg'),
(53, 'Унісекс', '63bac9a1c10b7.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `material`
--

INSERT INTO `material` (`id`, `name`, `photo`) VALUES
(31, 'Алюміній', '63babb5e89510.jpg'),
(32, 'Бронза', '63babb7ce7ce2.jpg'),
(33, 'Золото', '63babbda6b261.jpg'),
(34, 'Кераміка', '63bac8a801955.jpg'),
(35, 'Карбон', '63bac9afbdb7e.jpg'),
(36, 'Латуни', '63bb397e53355.jpg'),
(37, 'Полімер', '63bb3aaa8bd27.jpg'),
(38, 'Полікарбонат', '63bb3b0945ff2.jpg'),
(39, 'Титан', '63bb3b60e925f.jpg'),
(40, 'Полімер/сталь', '63bb3f0beb61e.jpg'),
(41, 'Кераміка і нержавіюча сталь', '63c04adc787f5.jpg'),
(42, 'Золото/нержавіюча сталь', '63c3e70595f4f.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `order_item`
--

CREATE TABLE `order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `order_item`
--

INSERT INTO `order_item` (`id`, `order_id`, `product_id`, `count`) VALUES
(8, 29, NULL, 1),
(9, 30, NULL, 1),
(10, 30, NULL, 1),
(11, 30, NULL, 1),
(12, 30, NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) DEFAULT NULL,
  `gender_id` int(11) DEFAULT NULL,
  `material_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `count` int(11) NOT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `visible` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `name`, `photo`, `type_id`, `gender_id`, `material_id`, `brand_id`, `price`, `count`, `short_description`, `description`, `visible`) VALUES
(83, ' Elegant Time', '63babae27b0bb.jpg', 32, 52, 35, 21, 200, 5, '<p>Stylish smartwatch with advanced features</p>', '<p>The Elegant Time watch by Balmain is a sophisticated smartwatch designed for those who value style and functionality. It features a stainless steel case and band, and comes with advanced smart features such as fitness tracking, notifications, and more. Perfect for both men and women.</p>', 1),
(84, 'Classic Quartz', '63babae940091.jpg', 33, 53, 32, 22, 150, 10, '<p>Simple and elegant quartz watch</p>', '<p>The Classic Quartz watch by Calvin Klein is a timeless timepiece that combines simplicity and elegance. It features a leather strap and a quartz movement for accurate timekeeping. With its classic design, it is suitable for men who appreciate minimalistic style.</p>', 1),
(85, 'Mechanism Master', '63babae940091.jpg', 36, 53, 34, 24, 350, 15, '<p>Mechanical watch with a rugged look</p>', '<p>The Mechanism Master watch by Diesel is a mechanical timepiece with a rugged and bold design. It is crafted with a titanium case and offers precise mechanical movement. This watch is perfect for men who prefer a durable and masculine style.</p>', 1),
(86, 'Power Automatic', '63babae940091.jpg', 36, 53, 33, 23, 350, 3, '<p>Automatic watch with a touch of luxury</p>', '<p>The Power Automatic watch by Hugo Boss is an automatic timepiece that combines luxury and functionality. It features a stainless steel case and bracelet, and its automatic movement ensures accurate timekeeping. A perfect choice for women with refined taste.</p>', 1),
(87, 'Tech Chic', '63babae940091.jpg', 38, 52, 34, 21, 560, 23, '<p>Stylish smartwatch with ceramic finish</p>', '<p>The Tech Chic watch by Balmain is a stylish smartwatch designed for women who value fashion and technology. It features a ceramic case and bracelet, and offers a range of smart features including fitness tracking and notifications. Stay chic and connected with this watch..</p>', 1),
(88, 'Modern Minimalist', '63babae27b0bb.jpg', 32, 52, 42, 22, 550, 5, '<p>Minimalistic smartwatch with sleek design</p>', '<p>The Modern Minimalist watch by Calvin Klein is a sleek and minimalistic smartwatch suitable for both men and women. It features a stainless steel case and band, and offers smart features such as activity tracking and smartphone notifications. Stay connected in style..</p>', 1),
(90, ' Urban Elegance', '63babae27b0bb.jpg', 32, 52, 40, 23, 350, 5, '<p>Elegant smartwatch for both genders</p>', '<p>The Urban Elegance watch by Hugo Boss is a sophisticated smartwatch suitable for both men and women. It features a stainless steel case and band, and offers advanced smart features for a connected lifestyle. With its timeless design, it combines elegance and technology seamlessly..</p>', 1),
(91, ' Fashion Forward', '63babae27b0bb.jpg', 33, 51, 39, 21, 200, 5, '<p>Trendy quartz watch for women</p>', '<p>The Fashion Forward watch by Calvin Klein is a trendy timepiece designed for fashion-conscious women. It features a leather strap and a quartz movement, and its modern design adds a touch of style to any outfit. Stay on-trend with this fashionable accessory..</p>', 1),
(92, ' Classic Sophisticate', '63babae27b0bb.jpg', 36, 51, 38, 24, 450, 5, '<p>Sophisticated mechanical watch</p>', '<p>The Classic Sophisticate watch by Balmain is a true masterpiece of mechanical watchmaking. With its gold-plated case and intricate mechanical movement, it embodies timeless elegance and precision craftsmanship. It\'s a statement piece for those who appreciate fine horology.</p>', 1),
(93, 'Sporty Diver', '63babae940091.jpg', 33, 51, 37, 24, 280, 10, '<p>Diver-style watch with sporty features</p>', '<p>The Sporty Diver watch by Diesel is a sporty timepiece inspired by diver\'s watches. It features a stainless steel case, a rotating bezel, and a water resistance of 200 meters. It\'s the perfect choice for adventurous individuals who value style and functionality..</p>', 1),
(95, ' Elegant Smartwatch ', '63babae27b0bb.jpg', 32, 52, 36, 23, 350, 5, '<p>Elegant smartwatch for both genders</p>', '<p>The Urban Elegance watch by Hugo Boss is a sophisticated smartwatch suitable for both men and women. It features a stainless steel case and band, and offers advanced smart features for a connected lifestyle. With its timeless design, it combines elegance and technology seamlessly..</p>', 1),
(96, 'Diver watch', '63babae940091.jpg', 33, 51, 31, 24, 303, 10, '<p>Diver-style watch with sporty features</p>', '<p>The Sporty Diver watch by Diesel is a sporty timepiece inspired by diver\'s watches. It features a stainless steel case, a rotating bezel, and a water resistance of 200 meters. It\'s the perfect choice for adventurous individuals who value style and functionality..</p>', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `type`
--

CREATE TABLE `type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `type`
--

INSERT INTO `type` (`id`, `name`, `photo`) VALUES
(32, 'Smart-годинники', '63babb5167c81.jpg'),
(33, 'Кварцеві', '63bb39b396db7.jpg'),
(36, 'Мех', '63c04cd254916.jpg'),
(38, 'Автопідзавод', '63c3effac6a97.jpg');

-- --------------------------------------------------------

--
-- Структура таблиці `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_level` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `firstname`, `lastname`, `access_level`) VALUES
(8, 'Klim@gmail.com', '202cb962ac59075b964b07152d234b70', 'Klim', 'Malich', 1),
(9, 'Sasha@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Sasha', 'Murs', 1),
(10, 'Rwernq@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 'Some', 'One', 1),
(11, 'Newuser@gmail.com', '202cb962ac59075b964b07152d234b70', 'Dmitry', 'Lobster', 1),
(12, 'New@gmail.com', '202cb962ac59075b964b07152d234b70', 'New', 'New', 1),
(13, 'Taras@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Taras', 'Drak', 10),
(14, 'SashaMur@gmail.com', '698d51a19d8a121ce581499d7b701668', 'Sasha', 'Murs', 1),
(15, 'newusers@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710', '2', '231', 1),
(16, 'newuser11@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 'new', 'user', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `user_order`
--

CREATE TABLE `user_order` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` double NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'in processing'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `user_order`
--

INSERT INTO `user_order` (`id`, `date`, `user_id`, `name`, `phone`, `city`, `post_number`, `total_price`, `status`) VALUES
(29, '2023-01-11 21:15:50', NULL, 'Андрей Сахно', '+380933464748', 'Житомир', 'rtsertdsfxgfd', 12000, 'approved'),
(30, '2023-01-11 21:26:30', 8, 'Afanas Afanasich', '+11111111111', '111', '11', 36350, 'approved');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `basket_ibfk_1` (`product_id`),
  ADD KEY `basket_ibfk_2` (`user_id`);

--
-- Індекси таблиці `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `order_item`
--
ALTER TABLE `order_item`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`gender_id`),
  ADD KEY `category_id` (`type_id`),
  ADD KEY `character_id` (`material_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Індекси таблиці `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `user_order`
--
ALTER TABLE `user_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT для таблиці `gender`
--
ALTER TABLE `gender`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблиці `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT для таблиці `order_item`
--
ALTER TABLE `order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT для таблиці `type`
--
ALTER TABLE `type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT для таблиці `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблиці `user_order`
--
ALTER TABLE `user_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `basket`
--
ALTER TABLE `basket`
  ADD CONSTRAINT `basket_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basket_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `order_item`
--
ALTER TABLE `order_item`
  ADD CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `user_order` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Обмеження зовнішнього ключа таблиці `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `product_ibfk_3` FOREIGN KEY (`material_id`) REFERENCES `material` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `product_ibfk_4` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Обмеження зовнішнього ключа таблиці `user_order`
--
ALTER TABLE `user_order`
  ADD CONSTRAINT `user_order_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
