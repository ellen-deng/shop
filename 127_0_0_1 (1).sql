-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2019 年 08 月 10 日 21:26
-- 伺服器版本： 10.3.16-MariaDB
-- PHP 版本： 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `shop`
--
CREATE DATABASE IF NOT EXISTS `shop` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `shop`;

-- --------------------------------------------------------

--
-- 資料表結構 `car`
--

CREATE TABLE `car` (
  `car_id` int(15) NOT NULL,
  `p_id` int(15) NOT NULL,
  `u_id` int(15) NOT NULL,
  `c_qty` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `car`
--

INSERT INTO `car` (`car_id`, `p_id`, `u_id`, `c_qty`) VALUES
(27, 3, 1, 1),
(28, 5, 2, 2),
(30, 1, 1, 8),
(31, 5, 1, 1),
(32, 4, 2, 3),
(33, 1, 2, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `user_id` int(15) NOT NULL,
  `mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(35) COLLATE utf8_unicode_ci NOT NULL,
  `sex` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`user_id`, `mail`, `name`, `password`, `sex`) VALUES
(1, 'ellendeng@gmail.com', 'ellen', '81dc9bdb52d04dc20036dbd8313ed055', 'girl'),
(2, 'max@gmail.com', 'max', '81dc9bdb52d04dc20036dbd8313ed055', 'boy');

-- --------------------------------------------------------

--
-- 資料表結構 `product`
--

CREATE TABLE `product` (
  `p_id` int(15) NOT NULL,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `info` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `price` int(10) NOT NULL,
  `p_qty` int(5) NOT NULL,
  `picture` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- 傾印資料表的資料 `product`
--

INSERT INTO `product` (`p_id`, `name`, `info`, `price`, `p_qty`, `picture`) VALUES
(1, 'Pima 棉圓領T恤', '產地：中國\r\n棉100%', 390, 10, '4125005_500.jpg'),
(2, 'Pima 棉V領T恤', '產地：中國\r\n棉100%', 390, 15, '4125103_500.jpg'),
(3, '牛津長袖襯衫', '產地：中國\r\n棉100%', 299, 20, '4356501_500.jpg'),
(4, '純棉拉克蘭長袖T恤', '產地：台灣\r\n棉100%', 199, 15, '4303404_500.jpg'),
(5, '法蘭絨格紋襯衫', '產地：中國\r\n棉100%', 299, 7, '4354203_500.jpg'),
(6, '竹節棉條紋寬鬆上衣', '產地：台灣\r\n棉100%', 199, 12, '4066602_500.jpg');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`car_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `u_id` (`u_id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- 資料表索引 `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`p_id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `car`
--
ALTER TABLE `car`
  MODIFY `car_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `user_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `product`
--
ALTER TABLE `product`
  MODIFY `p_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- 已傾印資料表的限制式
--

--
-- 資料表的限制式 `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `product` (`p_id`),
  ADD CONSTRAINT `car_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `member` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
