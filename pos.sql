-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Bulan Mei 2023 pada 12.58
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pos`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` enum('L','P') NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `customers`
--

INSERT INTO `customers` (`customer_id`, `name`, `gender`, `phone`, `address`, `created`, `updated`) VALUES
(1, 'Amad', 'P', '08765432255', 'Karanganyar Rt 01/12', '2022-11-24 21:58:08', '2022-12-09 05:30:29'),
(3, 'namor', 'L', '125623456', 'wakanda', '2022-11-24 22:02:13', '2022-12-09 05:08:17'),
(4, 'gege', 'L', '09876532', 'wakanda', '2022-12-08 22:17:15', NULL),
(5, 'ADFGHJK', 'P', '1234567', 'SDFGHJ', '2022-12-09 11:04:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_category`
--

CREATE TABLE `p_category` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_category`
--

INSERT INTO `p_category` (`category_id`, `name`, `created`, `updated`) VALUES
(1, 'Minuman', '2022-11-24 22:40:21', '2022-11-24 16:42:43'),
(2, 'snack', '2022-11-24 22:42:50', NULL),
(6, 'alat mandi', '2022-11-27 19:19:45', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_item`
--

CREATE TABLE `p_item` (
  `item_id` int(11) NOT NULL,
  `barcode` varchar(100) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `price` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT '0',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_item`
--

INSERT INTO `p_item` (`item_id`, `barcode`, `name`, `category_id`, `unit_id`, `price`, `stock`, `created`, `updated`) VALUES
(1, '909091', 'Oky jely drink', 1, 4, 2000, 92, '2022-11-26 21:48:12', '2022-11-27 14:12:14'),
(2, '909095', 'Lidi pedas', 2, 2, 500, -2, '2022-11-26 22:00:55', '2022-11-27 14:15:01'),
(3, '909093', 'Sabun GIV', 6, 3, 3000, 7, '2022-11-27 19:19:19', '2022-11-27 13:19:56'),
(6, '909094', 'Marimas', 1, 5, 1000, 9, '2022-11-27 20:05:46', NULL),
(7, '909096', 'Le minerale Galon', 1, 6, 20000, 0, '2022-12-02 10:38:20', NULL),
(8, '909098', 'Taro', 2, 2, 2000, 0, '2022-12-02 16:15:05', NULL),
(9, '4970129726517', 'Snowman Permanent marker', 6, 3, 10000, 92, '2023-05-12 14:05:57', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `p_unit`
--

CREATE TABLE `p_unit` (
  `unit_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `p_unit`
--

INSERT INTO `p_unit` (`unit_id`, `name`, `created`, `updated`) VALUES
(2, 'Ons', '2022-11-24 22:42:50', '2022-11-26 13:28:20'),
(3, 'Buah', '2022-11-26 19:28:35', NULL),
(4, 'pack', '2022-11-27 18:13:48', NULL),
(5, 'lusin', '2022-11-27 18:13:55', NULL),
(6, 'liter', '2022-11-27 18:14:00', NULL),
(7, 'karung', '2022-11-27 18:14:06', NULL),
(8, 'ton', '2022-11-27 18:14:15', NULL),
(9, 'bungkus', '2022-11-27 18:14:38', NULL),
(10, 'gram', '2022-11-27 18:16:13', NULL),
(11, 'meter', '2022-11-27 18:16:27', NULL),
(12, 'Kubik', '2022-12-06 19:45:52', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int(11) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` text,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `nama`, `phone`, `address`, `description`, `created`, `updated`) VALUES
(1, 'Edd snack', '089765432111', 'Tawangsari', 'Supplier snack ringan ', '2022-11-17 21:06:14', '2022-12-06 14:17:15'),
(2, 'Toko Jayabaya', '089654322121', 'Surakarta', 'adhghjkadada', '2022-11-17 21:06:14', '2023-05-26 11:21:20'),
(7, 'Hamido', '098645634', 'WAkanda', 'UvuWeWonyeTOsAS', '2022-12-06 22:15:59', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_cart`
--

CREATE TABLE `t_cart` (
  `cart_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL DEFAULT '0',
  `total` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale`
--

CREATE TABLE `t_sale` (
  `sale_id` int(11) NOT NULL,
  `invoice` varchar(50) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `final_price` int(11) NOT NULL,
  `cash` int(11) NOT NULL,
  `remaining` int(11) NOT NULL,
  `note` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_sale`
--

INSERT INTO `t_sale` (`sale_id`, `invoice`, `customer_id`, `total_price`, `discount`, `final_price`, `cash`, `remaining`, `note`, `date`, `user_id`, `created`) VALUES
(17, 'AK2212080004', 1, 4500, 0, 4500, 20000, 15500, '', '2022-12-08', 9, '2022-12-08 22:03:05'),
(18, 'AK2212080005', NULL, 2000, 0, 2000, 20000, 18000, '', '2022-12-08', 9, '2022-12-08 22:07:04'),
(19, 'AK2212080006', 4, 2000, 0, 2000, 5000, 3000, '', '2022-12-08', 9, '2022-12-08 22:12:51'),
(20, 'AK2212080007', NULL, 500, 0, 500, 1000, 500, '', '2022-12-08', 9, '2022-12-08 22:15:40'),
(21, 'AK2212080008', NULL, 2000, 0, 2000, 5000, 3000, '', '2022-12-08', 9, '2022-12-08 22:46:02'),
(22, 'AK2212080009', NULL, 1000, 0, 1000, 3000, 2000, '', '2022-12-08', 9, '2022-12-08 22:46:54'),
(23, 'AK2212080010', NULL, 5500, 0, 5500, 15000, 9500, '', '2022-12-08', 9, '2022-12-08 22:50:05'),
(24, 'AK2212080011', NULL, 2000, 0, 2000, 11111, 9111, '', '2022-12-08', 9, '2022-12-08 22:51:09'),
(25, 'AK2212080012', NULL, 6000, 0, 6000, 9000, 3000, '', '2022-12-08', 9, '2022-12-08 22:52:50'),
(29, 'AK2212220001', NULL, 6000, 1000, 5000, 50000, 45000, 'sdf', '2022-12-22', 9, '2022-12-22 20:17:23'),
(30, 'AK2212220002', NULL, 2000, 0, 2000, 400000, 398000, '', '2022-12-22', 9, '2022-12-22 20:18:12'),
(31, 'AK2305010001', NULL, 5000, 0, 5000, 20000, 15000, '', '2023-05-01', 9, '2023-05-01 12:46:45'),
(32, 'AK2305010002', NULL, 4500, 0, 4500, 20000, 15500, '', '2023-05-01', 9, '2023-05-01 12:55:21'),
(33, 'AK2305140001', NULL, 100000, 0, 100000, 200000, 100000, '', '2023-05-14', 9, '2023-05-14 16:32:53');

--
-- Trigger `t_sale`
--
DELIMITER $$
CREATE TRIGGER `del_detail` AFTER DELETE ON `t_sale` FOR EACH ROW BEGIN
	DELETE FROM t_sale_detail
    WHERE sale_id = OLD.sale_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_sale_detail`
--

CREATE TABLE `t_sale_detail` (
  `detail_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(10) NOT NULL,
  `discount_item` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_sale_detail`
--

INSERT INTO `t_sale_detail` (`detail_id`, `sale_id`, `item_id`, `price`, `qty`, `discount_item`, `total`) VALUES
(24, 17, 2, 500, 5, 0, 2500),
(25, 17, 6, 1000, 2, 0, 2000),
(27, 19, 1, 2000, 1, 0, 2000),
(28, 20, 2, 500, 1, 0, 500),
(29, 21, 1, 2000, 1, 0, 2000),
(30, 22, 2, 500, 2, 0, 1000),
(31, 23, 2, 500, 3, 0, 1500),
(32, 23, 1, 2000, 2, 0, 4000),
(33, 24, 1, 2000, 1, 0, 2000),
(34, 25, 3, 3000, 2, 0, 6000),
(35, 26, 6, 1000, 1, 0, 1000),
(38, 29, 1, 2000, 3, 0, 6000),
(39, 30, 6, 1000, 2, 0, 2000),
(40, 31, 1, 2000, 2, 0, 4000),
(41, 31, 6, 1000, 1, 0, 1000),
(42, 32, 3, 3000, 1, 0, 3000),
(43, 32, 2, 500, 3, 0, 1500),
(44, 33, 1, 2000, 8, 0, 16000),
(45, 33, 9, 10000, 8, 0, 80000),
(46, 33, 2, 500, 8, 0, 4000);

--
-- Trigger `t_sale_detail`
--
DELIMITER $$
CREATE TRIGGER `stock_min` AFTER INSERT ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock= stock - New.qty
    WHERE item_id = NEW.item_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stock_return` AFTER DELETE ON `t_sale_detail` FOR EACH ROW BEGIN
	UPDATE p_item SET stock = stock + OLD.qty
    WHERE item_id = OLD.item_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_stock`
--

CREATE TABLE `t_stock` (
  `stock_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `type` enum('in','out') NOT NULL,
  `detail` varchar(200) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `qty` int(10) NOT NULL,
  `date` date NOT NULL,
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `t_stock`
--

INSERT INTO `t_stock` (`stock_id`, `item_id`, `type`, `detail`, `supplier_id`, `qty`, `date`, `created`, `id`) VALUES
(15, 3, 'in', 'Kulakan', NULL, 10, '2022-12-05', '2022-12-06 19:43:11', 9),
(17, 6, 'in', 'Kulakan', NULL, 15, '2022-12-08', '2022-12-06 19:47:29', 9),
(19, 1, 'in', 'Tambahan', 1, 10, '2022-12-06', '2022-12-06 21:06:27', 9),
(25, 1, 'out', 'Kadaluarsa', NULL, 3, '2022-12-05', '2022-12-06 21:32:42', 9),
(26, 2, 'in', 'kulakan', 2, 20, '2022-12-06', '2022-12-06 21:35:12', 9),
(27, 1, 'in', 'kulakan', 1, 3, '2022-12-06', '2022-12-06 21:35:51', 9),
(28, 1, 'in', 'ASDFGH', 1, 0, '2022-12-22', '2022-12-22 13:48:36', 9),
(30, 1, 'out', 'sdsfd', NULL, 4, '2022-12-05', '2022-12-22 20:14:01', 9),
(31, 9, 'in', 'kulakan', 2, 100, '2023-05-10', '2023-05-12 14:14:41', 9),
(32, 1, 'in', 'tambahan', NULL, 100, '2023-05-12', '2023-05-12 14:47:40', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `email` varchar(128) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1.admin\r\n2.kasir'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama`, `email`, `level`) VALUES
(9, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'aaaa', 'aaaaasaa@asa.com', 1),
(10, 'admin2', '8f0fc65685509b3f1da1542f81895500771b40e4', 'andika', 'andika@a.com', 1),
(11, 'kasir2', '08dfc5f04f9704943a423ea5732b98d3567cbd49', 'Hamido', 'kasir@g.com', 2),
(12, 'admin3', '33aab3c7f01620cade108f488cfd285c0e62c1ec', 'andika', 'admin3@gmail.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indeks untuk tabel `p_category`
--
ALTER TABLE `p_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indeks untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD PRIMARY KEY (`item_id`),
  ADD UNIQUE KEY `barcode` (`barcode`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `unit_id` (`unit_id`);

--
-- Indeks untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indeks untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indeks untuk tabel `t_cart`
--
ALTER TABLE `t_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indeks untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indeks untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD PRIMARY KEY (`detail_id`),
  ADD KEY `item_id` (`item_id`);

--
-- Indeks untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD PRIMARY KEY (`stock_id`),
  ADD KEY `item_id` (`item_id`),
  ADD KEY `id` (`id`),
  ADD KEY `t_stock_ibfk_2` (`supplier_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `p_category`
--
ALTER TABLE `p_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `p_item`
--
ALTER TABLE `p_item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `p_unit`
--
ALTER TABLE `p_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `t_sale`
--
ALTER TABLE `t_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  MODIFY `detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `p_item`
--
ALTER TABLE `p_item`
  ADD CONSTRAINT `p_item_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `p_category` (`category_id`),
  ADD CONSTRAINT `p_item_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `p_unit` (`unit_id`);

--
-- Ketidakleluasaan untuk tabel `t_cart`
--
ALTER TABLE `t_cart`
  ADD CONSTRAINT `t_cart_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `t_sale_detail`
--
ALTER TABLE `t_sale_detail`
  ADD CONSTRAINT `t_sale_detail_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`);

--
-- Ketidakleluasaan untuk tabel `t_stock`
--
ALTER TABLE `t_stock`
  ADD CONSTRAINT `t_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `p_item` (`item_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `t_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`supplier_id`),
  ADD CONSTRAINT `t_stock_ibfk_3` FOREIGN KEY (`id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
