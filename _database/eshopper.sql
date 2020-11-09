-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2020 at 09:57 PM
-- Server version: 10.4.6-MariaDB
-- PHP Version: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eshopper`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_20_101213_create_tbl_admin_table', 1),
(2, '2020_10_20_190333_create_tbl_category_table', 2),
(3, '2020_10_23_182817_create_brand_table', 3),
(4, '2020_10_24_141056_create_tbl_product_table', 4),
(5, '2020_10_25_112107_create_tbl_slider_table', 5),
(6, '2020_10_28_193855_create_tbl_customer_table', 6),
(7, '2020_10_28_210516_create_tbl_shipping_table', 7),
(8, '2020_11_03_205754_create_tbl_payment_table', 8),
(9, '2020_11_03_205813_create_tbl_order_table', 8),
(10, '2020_11_03_205840_create_tbl_order_details_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_email`, `admin_password`, `admin_name`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'armaansanjeed@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Armaan Hossain', '01785973940', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(10) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`, `brand_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(1, 'Samsung', 'this is samsung edited', 1, NULL, NULL),
(5, 'Aarong', 'this is aarong', 1, NULL, NULL),
(6, 'Apple', 'this is apple', 1, NULL, NULL),
(7, 'Xiaomi', 'xiaomi', 1, NULL, NULL),
(8, 'Zara', 'cloth zara', 1, NULL, NULL),
(9, 'HP', 'laptop HP', 1, NULL, NULL),
(10, 'Adidas', 'sports adidas', 1, NULL, NULL),
(11, 'Otobi', 'furniture otobi', 1, NULL, NULL),
(12, 'Regal', 'regal furniture', 1, NULL, NULL),
(13, 'Toyota', 'into other category', 1, NULL, NULL),
(14, 'Suzuki', 'into other category', 1, NULL, NULL),
(15, 'Puma', 'sports', 1, NULL, NULL),
(16, 'Bashundhara', 'other', 1, NULL, NULL),
(17, 'Pran', 'other', 1, NULL, NULL),
(18, 'Dell', 'saddddddd', 1, NULL, NULL),
(19, 'suiko', 'suiko brand', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`, `category_description`, `publication_status`, `created_at`, `updated_at`) VALUES
(14, 'Men', 'this is men', 1, NULL, NULL),
(15, 'Women', 'this is women', 1, NULL, NULL),
(16, 'Child', 'this is child', 1, NULL, NULL),
(17, 'Furniture', 'this is furniture', 1, NULL, NULL),
(18, 'Electronics', 'this is electronics', 1, NULL, NULL),
(19, 'Sports', 'this is sports', 1, NULL, NULL),
(20, 'Others', 'this is others', 1, NULL, NULL),
(21, 'Cloths', 'this is cloths', 1, NULL, NULL),
(22, 'Laptop', 'this is laptop', 1, NULL, NULL),
(23, 'Decoration', 'this is decoration', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_password` varchar(255) CHARACTER SET macce COLLATE macce_bin NOT NULL,
  `mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `mobile_number`, `created_at`, `updated_at`) VALUES
(3, 'Armaan Hossain', 'armaansanjeed@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01785973940', NULL, NULL),
(9, 'Ashraf Hossain', 'ashraf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '01785977364', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order_status` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(16, 9, 9, 16, '10,890.00', 'Pending', '2020-11-09 20:33:23', NULL),
(17, 9, 9, 17, '1,800.00', 'Pending', '2020-11-09 20:34:34', NULL),
(18, 9, 9, 18, '12,000.00', 'Pending', '2020-11-09 20:41:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_details`
--

CREATE TABLE `tbl_order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_order_details`
--

INSERT INTO `tbl_order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_sales_quantity`, `created_at`, `updated_at`) VALUES
(8, 16, 26, 'DJ Light', '3000', '3', NULL, NULL),
(9, 17, 6, 'Jersey BD', '600', '3', NULL, NULL),
(10, 18, 8, 'Chair', '12000', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`payment_id`, `payment_method`, `payment_status`, `created_at`, `updated_at`) VALUES
(16, 'bkash', 'Pending', '2020-11-09 20:33:23', NULL),
(17, 'debit_card', 'Pending', '2020-11-09 20:34:34', NULL),
(18, 'cash_on_delivery', 'Pending', '2020-11-09 20:41:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_short_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `category_id`, `brand_id`, `product_name`, `product_short_description`, `product_long_description`, `product_price`, `product_image`, `product_size`, `product_color`, `publication_status`, `created_at`, `updated_at`) VALUES
(3, 18, 6, 'Iphone 12', 'this is short iphone 12 edited', 'The iPhone 12 and iPhone 12 mini are Apple\'s mainstream flagship iPhones for 2020. The phones come in 6.1-inch and 5.4-inch sizes with identical features, including support for faster 5G cellular networks, OLED displays, improved cameras, and Apple\'s latest A14 chip, all in a completely refreshed design. If you\'re considering splurging on a new iPhone in the near future, it\'s probably best to re-think that decision.\r\n\r\nApple typically releases its new iPhones in the fall, meaning the next-generation model may only be less than two months away. If you were already planning to spend around $1,000 to upgrade your iPhone, you\'d be best advised to wait until the much-rumored iPhone 12 hits store shelves rather than investing in a phone that may soon feel outdated.\r\n\r\nApple announced that it will be holding a virtual event on September 15, where it\'s almost certain to announce new products.\r\n\r\nWhat\'s less clear, however, is whether we can expect to see new iPhones on that day. New Apple Watch models and a new iPad may be the focus of Apple\'s upcoming September event, according to Bloomberg\'s Mark Gurman.\r\n\r\nSince this year\'s new iPhone is expected to be slightly delayed because of the coronavirus pandemic, Apple may announce its new iPhones in October. If that is indeed this case, it would mark the first year since 2012 that Apple has not unveiled a new iPhone in September.\r\n\r\nApple has also said its next-generation iPhone will likely be delayed. Speaking on the company\'s fiscal third-quarter earnings call, Luca Maestri, Apple\'s senior vice president and chief financial officer, said the company expects supply of the new product to be available \"a few weeks later\" compared to last year\'s iPhone 11 and 11 Pro launch.\r\n\r\nStill, it\'s probably best to hold off if you can. You don\'t want to find yourself in a situation where you upgrade your device only to find a brand-new model hitting the market several weeks later.  \r\n\r\nThis year\'s iPhone is expected to come with 5G support, a new processor, different size options, a refreshed design that\'s similar to that of the iPad Pro, and OLED screens across all models. That latter point is significant because Apple usually reserves OLED display panels, which are capable of showing richer blacks and bolder colors compared to LCD screens, specifically for its pricier \"Pro\" iPhone models. ', 80000.00, 'image/DhJr8Az0fIaVyGbRpjHC.jpg', '6.5 inch', 'Black, White, Red', 1, NULL, NULL),
(4, 19, 10, 'Boot ZS', 'sdsad', 'sdadsa', 1200.00, 'image/xjrhLsv2jAPnpWCONHoO.jpg', '7, 8, 9', 'Black, White, Red', 1, NULL, NULL),
(5, 19, 15, 'Boot BX', 'asdasd', 'asdasdas', 1000.00, 'image/WxFYjJK2DfvflN1FiD0u.jpg', '7, 8, 9, 10', 'Black, White, Blue', 1, NULL, NULL),
(6, 19, 10, 'Jersey BD', 'asdasd', 'asdsadsa', 600.00, 'image/oCwHP0OqLX027ZTqvmRC.jpg', '36, 38, 40', 'Green, Red', 1, NULL, NULL),
(7, 19, 15, 'Jersey Barca', 'dsasa', 'sdadsa', 500.00, 'image/FYJJ41Nxks66mtspAwnw.jpg', '36, 38, 40', 'Red, Blue', 1, NULL, NULL),
(8, 17, 12, 'Chair', 'sdsd', 'ssasa', 12000.00, 'image/Y6tpV66Fnn8t2ZTzENtq.jpg', 'Any', 'Black, White, Blue', 1, NULL, NULL),
(9, 17, 11, 'Bed', 'sadsagghh', 'hhhhhhhhhhh', 80000.00, 'image/ZFFvWK1y4GDa3gpxpole.jpg', 'Any', 'Black, White', 1, NULL, NULL),
(10, 17, 11, 'Sofa', 'dassadsd', 'sadsddssa', 40000.00, 'image/kvivXHUTXegene2ldZ8G.jpg', 'Any', 'Black, White', 1, NULL, NULL),
(11, 20, 16, 'Tissue', 'sssss', 'aaaaa', 30.00, 'image/2OMCS5vyM9CQpluOue1g.jpg', 'Any', 'White', 1, NULL, NULL),
(12, 20, 16, 'Book', 'sdsad', 'saddsad', 30.00, 'image/2SwY2JWxkpf7DdiBFqmr.jpg', 'Any', 'White', 1, NULL, NULL),
(13, 20, 17, 'Juice', 'sss', 'ssss', 20.00, 'image/0ydKym59KUTUtac3eQFm.jpg', 'Not Available', 'Not Available', 1, NULL, NULL),
(14, 21, 8, 'Black Tshirt', 'fffgff', 'ffffff', 300.00, 'image/hJOIoOPvlJj1BLGBdYUR.jpg', '36, 38, 40', 'Black, White', 1, NULL, NULL),
(15, 21, 5, 'Blue Tshirt', 'sss', 'sss', 300.00, 'image/6ftNCmvCN9vCF3Ofy1Ze.jpg', '36, 38, 40', 'Blue', 1, NULL, NULL),
(16, 15, 8, 'Women White T Shirt', 'sss', 'sss', 300.00, 'image/kU63AvsbMgHLdckwoAof.jpg', '36, 38, 40', 'White', 1, NULL, NULL),
(17, 21, 5, 'White T Shirt Mini', 'sss', 'sss', 300.00, 'image/feepgO1XW7mvOTHNygdK.jpg', '36, 38, 40', 'White', 1, NULL, NULL),
(18, 14, 8, 'Men TShirt', 'sss', 'sss', 300.00, 'image/6riDiNp75y1pOnLLx1w4.jpg', '36, 38, 40', 'Pink', 1, NULL, NULL),
(19, 16, 5, 'Kid Girl Tshirt', 'sss', 'sss', 200.00, 'image/RyeFK0gVxov8F2a9ClFd.jpg', 'Any', 'White', 1, NULL, NULL),
(20, 16, 8, 'Kid Boy Tshirt', 'sss', 'ssss', 200.00, 'image/W0CyXJiGNVIQWFTgMnbc.jpg', 'Any', 'Red', 1, NULL, NULL),
(21, 18, 7, 'Xiaomi Mi 10', 'sssff', 'fffffffffffff', 20000.00, 'image/QCHw3qf4dROabENL8b5p.webp', '6.5 inch', 'Black, White', 1, NULL, NULL),
(22, 18, 1, 'Samsung Galaxy A60', 'ssssssssssss', 'sssssssssssssssssss', 30000.00, 'image/9x0aAAtMOU4woaGAyTx7.webp', '6.5 inch', 'White', 1, NULL, NULL),
(23, 22, 9, 'HP MAX Pro', 'sss', 'ssss', 40000.00, 'image/zzzNOrkaLZEEKA8i4jWn.jpg', '15 inch', 'Black, White', 1, NULL, NULL),
(24, 22, 6, 'Macbook Pro', 'sdaaaaaaa', 'asddddddddddd', 100000.00, 'image/hH6WpoFXCO10x4Q5lv9r.jpg', '15 inch', 'White', 1, NULL, NULL),
(25, 22, 18, 'DELL Surface', 'fgfgfghg', 'kjmhngbfvc', 40000.00, 'image/GwIl4B2xQIxiE7sVG9Qh.jpg', '15 inch', 'Black, White', 1, NULL, NULL),
(26, 23, 19, 'DJ Light', 'asdasd', 'asdasdas', 3000.00, 'image/Ts7xTFgj1k97unxsDPYx.jpg', '15 inch', 'Black, White', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_mobile_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`shipping_id`, `shipping_email`, `shipping_first_name`, `shipping_last_name`, `shipping_address`, `shipping_mobile_number`, `shipping_city`, `created_at`, `updated_at`) VALUES
(9, 'jamilhossain@gmail.com', 'jamil', 'hossain', 'dhanmondi', '01785979876', 'Dhaka', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publication_status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_slider`
--

INSERT INTO `tbl_slider` (`slider_id`, `slider_image`, `publication_status`, `created_at`, `updated_at`) VALUES
(2, 'slider/MsECAzUo3DOeQ6gCWSTB.png', 0, NULL, NULL),
(3, 'slider/NLWbir7ByX69M139X4i1.jpg', 0, NULL, NULL),
(4, 'slider/IPBZWN3ZuHaoSWZMer4k.jpg', 0, NULL, NULL),
(5, 'slider/T1kCS93U3ddPnDwr5xR2.jpg', 0, NULL, NULL),
(6, 'slider/kAlfEy1w0lmdEKAooyqC.jpg', 0, NULL, NULL),
(7, 'slider/C8d8OQasdiYDr5lcrn5m.jpg', 0, NULL, NULL),
(8, 'slider/EkxEl9zCmsQnBEjmc8V7.jpg', 1, NULL, NULL),
(9, 'slider/wvcX2ZpQEs37u5LQLHsB.jpg', 1, NULL, NULL),
(10, 'slider/Hd8ttumnFRemRr9fTthC.jpg', 1, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_order_details`
--
ALTER TABLE `tbl_order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
