-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 14, 2021 at 05:22 AM
-- Server version: 10.3.31-MariaDB-log-cll-lve
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `echologlo_naijakitchen`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `description`, `slug`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 'Others', '', 'others-1478883', NULL, NULL, '2020-11-01 05:39:00', NULL),
(7, 'Soup', '', 'soup-1604231014', NULL, '2020-11-01 05:43:34', '2020-11-01 05:43:34', NULL),
(8, 'Rice', '', 'rice-1604336415', NULL, '2020-11-02 18:00:15', '2020-11-02 18:00:15', NULL),
(9, 'Peppersoup', '', 'peppersoup-1605545678', NULL, '2020-11-16 17:54:38', '2020-11-16 17:54:38', NULL),
(10, 'Yam', '', 'yam-1606415170', NULL, '2020-11-26 19:26:10', '2020-11-26 19:26:10', NULL),
(11, 'Protein', '', 'protein-1606479733', NULL, '2020-11-27 13:22:13', '2020-11-27 13:22:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_id` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `total` varchar(5) DEFAULT NULL,
  `payment` varchar(20) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `request` text DEFAULT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'active',
  `payment_status` varchar(10) DEFAULT NULL,
  `payment_reference` varchar(50) DEFAULT NULL,
  `paystack_payment_data` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `fullname`, `address`, `email`, `phone`, `total`, `payment`, `created_at`, `updated_at`, `deleted_at`, `request`, `status`, `payment_status`, `payment_reference`, `paystack_payment_data`) VALUES
(1, 'qwOBDuQj', 'Ifeoma Bassey', '12E Buena Vista Estate Eleganza lekki', 'ifeomaagwuibe@gmail.com', '08134667746', '600', 'payment-on-delivery', '2020-11-02 20:08:35', '2020-11-02 20:08:35', NULL, 'a:1:{i:0;a:3:{s:4:\"name\";s:6:\"Jollof\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"600\";}}', 'active', NULL, NULL, NULL),
(16, 'wJyPG2L4', 'Ifeoma Bassey', '12E Buena Vista Estate Eleganza lekki', 'ifeomaagwuibe@gmail.com', '08134667746', '700', 'online-payment', '2020-11-17 20:58:33', '2020-11-17 20:58:33', NULL, 'a:1:{i:0;a:3:{s:4:\"name\";s:19:\"Goatmeat Peppersoup\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"700\";}}', 'active', 'success', 'T644120217846994', 'O:8:\"stdClass\":3:{s:6:\"status\";b:1;s:7:\"message\";s:23:\"Verification successful\";s:4:\"data\";O:8:\"stdClass\":28:{s:2:\"id\";i:888114189;s:6:\"domain\";s:4:\"live\";s:6:\"status\";s:7:\"success\";s:9:\"reference\";s:16:\"T644120217846994\";s:6:\"amount\";i:70000;s:7:\"message\";s:11:\"madePayment\";s:16:\"gateway_response\";s:18:\"Payment successful\";s:7:\"paid_at\";s:24:\"2020-11-17T19:58:30.000Z\";s:10:\"created_at\";s:24:\"2020-11-17T19:57:17.000Z\";s:7:\"channel\";s:4:\"ussd\";s:8:\"currency\";s:3:\"NGN\";s:10:\"ip_address\";s:15:\"129.205.124.177\";s:8:\"metadata\";O:8:\"stdClass\":1:{s:8:\"referrer\";s:40:\"https://naijakitchen01.com/cart/my-carts\";}s:3:\"log\";O:8:\"stdClass\":8:{s:10:\"start_time\";i:1605643026;s:10:\"time_spent\";i:73;s:8:\"attempts\";i:0;s:6:\"errors\";i:0;s:7:\"success\";b:1;s:6:\"mobile\";b:1;s:5:\"input\";a:0:{}s:7:\"history\";a:3:{i:0;O:8:\"stdClass\":3:{s:4:\"type\";s:6:\"action\";s:7:\"message\";s:27:\"Set payment method to: card\";s:4:\"time\";i:4;}i:1;O:8:\"stdClass\":3:{s:4:\"type\";s:6:\"action\";s:7:\"message\";s:27:\"Set payment method to: ussd\";s:4:\"time\";i:31;}i:2;O:8:\"stdClass\":3:{s:4:\"type\";s:7:\"success\";s:7:\"message\";s:26:\"Successfully paid with 737\";s:4:\"time\";i:73;}}}s:4:\"fees\";i:1050;s:10:\"fees_split\";N;s:13:\"authorization\";O:8:\"stdClass\":15:{s:18:\"authorization_code\";s:20:\"AUTH_ge37brldawpo5kf\";s:3:\"bin\";s:6:\"XXXXXX\";s:5:\"last4\";s:4:\"XXXX\";s:9:\"exp_month\";s:2:\"10\";s:8:\"exp_year\";s:4:\"2020\";s:7:\"channel\";s:4:\"ussd\";s:9:\"card_type\";s:7:\"offline\";s:4:\"bank\";s:19:\"Guaranty Trust Bank\";s:12:\"country_code\";s:2:\"NG\";s:5:\"brand\";s:7:\"offline\";s:8:\"reusable\";b:0;s:9:\"signature\";N;s:12:\"account_name\";N;s:28:\"receiver_bank_account_number\";N;s:13:\"receiver_bank\";N;}s:8:\"customer\";O:8:\"stdClass\":9:{s:2:\"id\";i:33765303;s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:0:\"\";s:5:\"email\";s:23:\"ifeomaagwuibe@gmail.com\";s:13:\"customer_code\";s:19:\"CUS_atsrqn62b5f84fh\";s:5:\"phone\";s:0:\"\";s:8:\"metadata\";N;s:11:\"risk_action\";s:7:\"default\";s:26:\"international_format_phone\";N;}s:4:\"plan\";N;s:5:\"split\";O:8:\"stdClass\":0:{}s:8:\"order_id\";N;s:6:\"paidAt\";s:24:\"2020-11-17T19:58:30.000Z\";s:9:\"createdAt\";s:24:\"2020-11-17T19:57:17.000Z\";s:16:\"requested_amount\";i:70000;s:20:\"pos_transaction_data\";N;s:16:\"transaction_date\";s:24:\"2020-11-17T19:57:17.000Z\";s:11:\"plan_object\";O:8:\"stdClass\":0:{}s:10:\"subaccount\";O:8:\"stdClass\":0:{}}}'),
(17, 'o0fQu1vz', 'mike', 'ogba lagos', 'andyfobby0705@gmail.com', '08115824227', '14200', 'payment-on-delivery', '2020-11-27 13:53:21', '2020-11-27 13:53:21', NULL, 'a:13:{i:0;a:3:{s:4:\"name\";s:19:\"Goatmeat Peppersoup\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"700\";}i:1;a:3:{s:4:\"name\";s:3:\"Oha\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"2200\";}i:2;a:3:{s:4:\"name\";s:9:\"Kote fish\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"900\";}i:3;a:3:{s:4:\"name\";s:10:\"Afang Soup\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"2200\";}i:4;a:3:{s:4:\"name\";s:24:\"Assorted Meat Peppersoup\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"600\";}i:5;a:3:{s:4:\"name\";s:19:\"Basmati Native Rice\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1300\";}i:6;a:3:{s:4:\"name\";s:21:\"Vegetable yam pottage\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"800\";}i:7;a:3:{s:4:\"name\";s:12:\"Coconut Rice\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1000\";}i:8;a:3:{s:4:\"name\";s:4:\"Beef\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"300\";}i:9;a:3:{s:4:\"name\";s:7:\"Chicken\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1000\";}i:10;a:3:{s:4:\"name\";s:19:\"Yam pottage (plain)\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"700\";}i:11;a:3:{s:4:\"name\";s:18:\"Basmati White Rice\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1000\";}i:12;a:3:{s:4:\"name\";s:10:\"Fried Rice\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1500\";}}', 'active', NULL, NULL, NULL),
(18, 'sCjTMLZK', 'Eires Stanley', 'Awolowo way.  Ikeja', 'stanley.eires@gmail.com', '+2347033385484', '1200', 'payment-on-delivery', '2021-06-08 11:10:38', '2021-06-08 11:10:38', NULL, 'a:1:{i:0;a:3:{s:4:\"name\";s:18:\"Chicken Peppersoup\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1200\";}}', 'active', NULL, NULL, NULL),
(19, 'hJ7CozQr', 'Eires Stanley', 'Awolowo way.  Ikeja', 'stanley.eires@gmail.com', '+2347033385484', '3000', 'payment-on-delivery', '2021-06-08 11:55:29', '2021-06-08 11:55:29', NULL, 'a:4:{i:0;a:3:{s:4:\"name\";s:14:\"Fried Plantain\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"400\";}i:1;a:3:{s:4:\"name\";s:10:\"Ajoke Rice\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:3:\"400\";}i:2;a:3:{s:4:\"name\";s:12:\"Tilapia fish\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1200\";}i:3;a:3:{s:4:\"name\";s:15:\"Catfish in stew\";s:3:\"qty\";s:1:\"1\";s:6:\"amount\";s:4:\"1000\";}}', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `per` varchar(10) NOT NULL DEFAULT 'litre',
  `fake_order` varchar(10) DEFAULT 'true',
  `fake_ratings` varchar(10) DEFAULT 'true',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `slug`, `title`, `description`, `price`, `image`, `category`, `per`, `fake_order`, `fake_ratings`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'edikang-ikong-soup-1604094756', 'Edikang Ikong Soup', '', 1300, '20201030/1604094756_837fb59479429425ab5c.jpg', 7, 'litre', 'true', 'true', '2020-10-30 16:52:36', '2020-11-26 13:06:10', NULL),
(2, 'egusi-soup-1604096910', 'Egusi Soup', '', 1000, '20201030/1604096910_9218f59b2fc8ab8807fd.jpg', 7, 'litre', 'true', 'true', '2020-10-30 17:28:30', '2020-11-26 13:06:42', NULL),
(3, 'ogbono-1604141445', 'Ogbono', '', 1200, '20201031/1604141445_13eb95da1a300b813822.png', 7, 'litre', 'true', 'true', '2020-10-31 05:50:45', '2020-11-26 13:07:23', NULL),
(4, 'afang-soup-1604141484', 'Afang Soup', '', 2200, '20201031/1604141481_a47462b691fefcbe162f.jpg', 7, 'litre', 'true', 'true', '2020-10-31 05:51:24', '2020-11-01 05:43:56', NULL),
(7, 'eforiro-1604336688', 'Eforiro', '', 1200, '20201102/1604336688_6e04a4a1dc61e17d3c04.jpg', 7, 'litre', 'true', 'true', '2020-11-02 18:04:48', '2020-11-02 18:04:48', NULL),
(8, 'oha-1604336773', 'Oha', '', 2200, '20201102/1604336773_08e2fe4ad4133f262f0a.jpg', 7, 'litre', 'true', 'true', '2020-11-02 18:06:13', '2020-11-02 18:06:13', NULL),
(9, 'okra-1604336984', 'Sea Food Okra ', '', 1750, '20201102/1604336984_4c15744f8e1b4860d5fb.jpg', 7, 'litre', 'true', 'true', '2020-11-02 18:09:44', '2020-11-26 13:10:36', NULL),
(10, 'peppersoup-1604337079', 'Catfish Peppersoup', '', 900, '20201102/1604337079_f9c24bbde007ca222604.jpg', 9, 'plate', 'true', 'true', '2020-11-02 18:11:19', '2020-11-16 18:15:26', NULL),
(11, 'banga-1604337189', 'Banga', '', 1200, '20201102/1604337189_0212dbb536f670c26918.jpg', 7, 'litre', 'true', 'true', '2020-11-02 18:13:09', '2020-11-26 13:08:10', NULL),
(12, 'bitterleaf-1604337313', 'Bitterleaf', '', 1300, '20201102/1604337313_4511391a8c41147d0a45.jpg', 7, 'litre', 'true', 'true', '2020-11-02 18:15:13', '2020-11-26 13:07:45', NULL),
(13, 'jollof-1604337504', 'Jollof', '', 1000, '20201102/1604337504_ce1a1b65368ff09863b3.jpg', 8, 'plate', 'true', 'true', '2020-11-02 18:18:24', '2020-11-26 13:23:10', NULL),
(14, 'fried-rice-1604337783', 'Fried Rice', '', 1500, '20201102/1604337783_0710ed37a2199deca970.jpg', 8, 'plate', 'true', 'true', '2020-11-02 18:23:03', '2020-11-26 14:05:10', NULL),
(15, 'coconut-rice-1604337890', 'Coconut Rice', '', 1000, '20201102/1604337890_cb7839e716be6b4e5f94.jpg', 8, 'plate', 'true', 'true', '2020-11-02 18:24:50', '2020-11-26 14:05:50', NULL),
(16, 'white-rice-stew-1604337998', 'White Rice & Stew', '', 500, '20201102/1604337998_32d2d5ecc1d6b9bc4f12.jpg', 8, 'plate', 'true', 'true', '2020-11-02 18:26:38', '2020-11-26 13:24:10', NULL),
(17, 'plantain-1604338166', 'Plantain', '', 500, '20201102/1604338224_21f7eefd93b51f40990d.jpg', 5, 'plate', 'true', 'true', '2020-11-02 18:29:26', '2020-11-02 18:30:24', NULL),
(18, 'chicken-1604351619', 'Chicken', '', 1000, '20201102/1604351619_0143f16c9d4012ccff87.jpg', 5, 'plate', 'true', 'true', '2020-11-02 22:13:39', '2020-11-02 22:13:39', NULL),
(19, 'eggs-1604395527', 'Eggs', '', 200, '20201103/1604395527_e80a0395cd11a857e402.jpg', 5, 'plate', 'true', 'true', '2020-11-03 10:25:27', '2020-11-03 10:25:27', NULL),
(20, 'beef-1604395865', 'Beef', '', 300, '20201103/1604395865_08723d7720711aad093c.jpg', 5, 'litre', 'true', 'true', '2020-11-03 10:31:05', '2020-11-03 10:31:05', NULL),
(21, 'fish-1604396196', 'Fish', '', 300, '20201103/1604396196_43fd3bcf1a8d5944cf05.jpg', 5, 'plate', 'true', 'true', '2020-11-03 10:36:36', '2020-11-03 10:36:36', NULL),
(22, 'yam-1604396705', 'Yam', '', 550, '20201103/1604396705_a773519c3ef836b76b89.jpg', 5, 'plate', 'true', 'true', '2020-11-03 10:45:05', '2020-11-03 10:45:05', NULL),
(23, 'ajoke-rice-1605546365', 'Ajoke Rice', '', 400, '20201116/1605546365_39cd9437be562d04a866.jpg', 8, 'plate', 'true', 'true', '2020-11-16 18:06:05', '2020-11-16 18:06:05', NULL),
(24, 'goatmeat-peppersoup-1605546848', 'Goatmeat Peppersoup', '', 700, '20201116/1605546848_8c05a5283d4a1c997a8d.jpg', 9, 'plate', 'true', 'true', '2020-11-16 18:14:08', '2020-11-16 18:14:08', NULL),
(25, 'chicken-peppersoup-1605547098', 'Chicken Peppersoup', '', 1200, '20201116/1605547098_f6551740e77e2e28b45d.jpg', 9, 'plate', 'true', 'true', '2020-11-16 18:18:18', '2020-11-16 18:18:18', NULL),
(26, 'assorted-meat-peppersoup-1605547676', 'Assorted Meat Peppersoup', '', 600, '20201116/1605547676_37019ff96c67b9e6359b.jpg', 9, 'plate', 'true', 'true', '2020-11-16 18:27:56', '2020-11-16 18:27:56', NULL),
(27, 'okra-1606392671', 'Okra', '', 1000, '20201126/1606392671_6bc4df70384efcaf8b98.jpg', 7, 'litre', 'true', 'true', '2020-11-26 13:11:11', '2020-11-26 13:11:11', NULL),
(28, 'basmati-jollof-rice-1606392899', 'Basmati jollof rice', '', 1200, '20201126/1606392899_be72761d8c59007c898e.jpg', 8, 'plate', 'true', 'true', '2020-11-26 13:14:59', '2020-11-26 13:14:59', NULL),
(29, 'basmati-fried-rice-1606393006', 'Basmati fried rice', '', 1400, '20201126/1606393006_0d1fad518e12703bb1f1.png', 8, 'plate', 'true', 'true', '2020-11-26 13:16:46', '2020-11-26 13:16:46', NULL),
(30, 'basmati-white-rice-1606393213', 'Basmati White Rice', '', 1000, '20201126/1606393213_94a6f580b4e51759c8cd.jpg', 8, 'plate', 'true', 'true', '2020-11-26 13:20:13', '2020-11-26 13:20:13', NULL),
(31, 'basmati-native-rice-1606393322', 'Basmati Native Rice', '', 1300, '20201126/1606393322_3fe48ac767aeb7da305b.jpg', 8, 'plate', 'true', 'true', '2020-11-26 13:22:02', '2020-11-26 13:22:02', NULL),
(32, 'ofada-rice-and-sauce-1606394115', 'Ofada Rice And Sauce', '', 1800, '20201126/1606394115_7ffad9b90e13f34766c2.jpg', 8, 'plate', 'true', 'true', '2020-11-26 13:35:15', '2020-11-26 13:35:15', NULL),
(33, 'sea-food-fried-rice-1606395479', 'Sea Food Fried Rice', '', 2000, '20201126/1606395479_5eaec9d5b8d4f8e55b6f.jpg', 8, 'plate', 'true', 'true', '2020-11-26 13:57:59', '2020-11-26 13:57:59', NULL),
(34, 'sea-food-jollof-rice-1606395601', 'Sea food Jollof rice', '', 1400, '20201126/1606395601_6a1e042f3dc665225d3f.jpg', 8, 'plate', 'true', 'true', '2020-11-26 14:00:01', '2020-11-26 14:00:01', NULL),
(35, 'boiled-yam-and-sauce-1606415272', 'Boiled yam and sauce', '', 400, '20201126/1606415272_5388f0c9e7e4318711da.jpg', 10, 'plate', 'true', 'true', '2020-11-26 19:27:52', '2020-11-26 19:27:52', NULL),
(36, 'yam-pottage-plain-1606415446', 'Yam pottage (plain)', '', 700, '20201126/1606415446_a270f7d2d8bd6b8d56e3.jpg', 10, 'plate', 'true', 'true', '2020-11-26 19:30:46', '2020-11-26 19:30:46', NULL),
(37, 'vegetable-yam-pottage-1606479356', 'Vegetable yam pottage', '', 800, '20201127/1606479356_4169555b2f35bea5c1f5.jpg', 10, 'plate', 'true', 'true', '2020-11-27 13:15:56', '2020-11-27 13:15:56', NULL),
(38, 'yamarita-1606479426', 'Yamarita', '', 500, '20201127/1606479426_bc883e66e5e0785bf9ab.jpg', 10, 'plate', 'true', 'true', '2020-11-27 13:17:06', '2020-11-27 13:17:06', NULL),
(39, 'plantain-pottage-1606479509', 'Plantain pottage', '', 800, '20201127/1606479509_55a7821723ad7536aef5.jpg', 10, 'plate', 'true', 'true', '2020-11-27 13:18:29', '2020-11-27 13:18:29', NULL),
(40, 'fried-plantain-1606479577', 'Fried Plantain', '', 400, '20201127/1606479577_fb9e0f5dda28ed0fabbf.jpg', 5, 'plate', 'true', 'true', '2020-11-27 13:19:37', '2020-11-27 13:19:37', NULL),
(41, 'diced-plantain-1606479676', 'Diced plantain', '', 350, '20201127/1606479676_898df950b314e3d6c534.jpg', 5, 'plate', 'true', 'true', '2020-11-27 13:21:16', '2020-11-27 13:21:16', NULL),
(42, 'beans-pottage-1606479819', 'Beans pottage', '', 600, '20201127/1606479819_f2e09491a34a3d5bf452.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:23:39', '2020-11-27 13:23:39', NULL),
(43, 'moi-moi-1606479886', 'Moi moi', '', 500, '20201127/1606479886_f2b16911ac94e73da082.png', 11, 'plate', 'true', 'true', '2020-11-27 13:24:46', '2020-11-27 13:24:46', NULL),
(44, 'ewa-aganyi-1606479946', 'Ewa Aganyi', '', 600, '20201127/1606479946_c30eadf4088bc9ed485f.jpg', 5, 'plate', 'true', 'true', '2020-11-27 13:25:46', '2020-11-27 13:25:46', NULL),
(45, 'beef-1606480004', 'Beef', '', 300, '20201127/1606480004_7bc5ef101f0fcad2c512.jpg', 5, 'plate', 'true', 'true', '2020-11-27 13:26:44', '2020-11-27 13:26:44', NULL),
(46, 'goat-meat-1606480093', 'Goat Meat', '', 800, '20201127/1606480093_6899480509ef3ced048a.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:28:13', '2020-11-27 13:28:13', NULL),
(47, 'kote-fish-1606480167', 'Kote fish', '', 900, '20201127/1606480167_91010b2b01312e948378.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:29:27', '2020-11-27 13:29:27', NULL),
(48, 'croaker-fish-1606480230', 'croaker fish ', '', 1200, '20201127/1606480230_63d05a2e06d6a64a6539.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:30:30', '2020-11-27 13:30:30', NULL),
(49, 'tilapia-fish-1606480423', 'Tilapia fish', '', 1200, '20201127/1606480423_da37daeea3787dc380fd.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:33:43', '2020-11-27 13:33:43', NULL),
(50, 'peppered-chicken-18-1606480496', 'Peppered chicken (1/8) ', '', 600, '20201127/1606480496_05fed4b5bbd139a41031.jpeg', 11, 'plate', 'true', 'true', '2020-11-27 13:34:56', '2020-11-27 13:34:56', NULL),
(51, 'peppered-chicken-14-1606480566', 'Peppered chicken (1/4)', '', 1200, '20201127/1606480566_17c39e1abb3b2f1edcf0.png', 11, 'plate', 'true', 'true', '2020-11-27 13:36:06', '2020-11-27 13:36:06', NULL),
(52, 'turkey-1606480665', 'Turkey', '', 1300, '20201127/1606480665_5dff306470e65c6c2c23.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:37:45', '2020-11-27 13:37:45', NULL),
(53, 'kponmo-1606480744', 'Kponmo', '', 300, '20201127/1606480744_a3471637f8284a784a6b.png', 11, 'plate', 'true', 'true', '2020-11-27 13:39:04', '2020-11-27 13:39:04', NULL),
(54, 'boiled-egg-1606480810', 'Boiled egg ', '', 300, '20201127/1606480810_a07d13720d609820e252.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:40:10', '2020-11-27 13:40:10', NULL),
(55, 'egg-sauce-1606480872', 'Egg sauce', '', 600, '20201127/1606480872_27822a4d13d6ec65ab55.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:41:12', '2020-11-27 13:41:12', NULL),
(56, 'assorted-meat-1606480936', 'Assorted meat', '', 1200, '20201127/1606480936_e4410d175e93ad8c4417.jpeg', 11, 'plate', 'true', 'true', '2020-11-27 13:42:16', '2020-11-27 13:42:16', NULL),
(57, 'catfish-in-stew-1606480994', 'Catfish in stew', '', 1000, '20201127/1606480994_4f20c59c31c793398958.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:43:14', '2020-11-27 13:43:14', NULL),
(58, 'spicy-gizzard-1606481061', 'Spicy gizzard', '', 1000, '20201127/1606481061_b340aa700dbcc726ee8f.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:44:21', '2020-11-27 13:44:21', NULL),
(59, 'peppered-shrimps-1606481122', 'Peppered shrimps', '', 1500, '20201127/1606481122_75e30ecf2f169f0c7f9b.jpg', 11, 'plate', 'true', 'true', '2020-11-27 13:45:23', '2020-11-27 13:45:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `type`, `description`) VALUES
(1, 'site_name', 'NaijaKitchen01'),
(2, 'site_email', 'info@naijakitchen01.com'),
(3, 'site_description', 'They say better soup, na money kill am... we say You dont have to break the bank to eat good food'),
(4, 'addresses', 'a:1:{i:0;s:46:\"Lagos Office: Lekki, Lagos Island. Lagos State\";}'),
(5, 'phones', 'a:2:{i:0;s:25:\"Main: +(234) 815 8896 873\";i:1;s:28:\"Support: +(234) 915 1688 418\";}'),
(6, 'site_password', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8');

-- --------------------------------------------------------

--
-- Table structure for table `settings_email_template`
--

CREATE TABLE `settings_email_template` (
  `id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `email_body` text DEFAULT NULL,
  `status` varchar(10) DEFAULT 'enabled',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings_email_template`
--

INSERT INTO `settings_email_template` (`id`, `title`, `subject`, `email_body`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Order Confirmation', 'Order Confirmation', '<p><h3>Thank you {fullname} for patronizing us,</h3><h5>Below are the contents of your order</h5></p>\r\n<dl>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Orders</dt>\r\n<dd>{orders}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Total Cost</dt>\r\n<dd>{total}</dd><hr>We would be sending your request to <i>{address}</i> shortly. Thanks again</dl>\r\n', 'enabled', NULL, '2020-11-03 10:42:49'),
(2, 'Order Request', 'New Order Request', '<h2>There is a new Order. Details below,</h2>\r\n\r\n<dl>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Orders</dt>\r\n<dd>{orders}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Client Name</dt>\r\n<dd>{fullname}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Client Email</dt>\r\n<dd>{email}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Client Phone</dt>\r\n<dd>{phone}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Payment Method</dt>\r\n<dd>{method}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Order Id</dt>\r\n<dd>{order_id}</dd>\r\n<hr>\r\n<dt style=\"font-weight:bolder;font-size:1.2rem\">Total Cost</dt>\r\n<dd>{total}</dd>\r\n</dl>', 'enabled', NULL, '2020-11-03 10:34:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_email_template`
--
ALTER TABLE `settings_email_template`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `settings_email_template`
--
ALTER TABLE `settings_email_template`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
