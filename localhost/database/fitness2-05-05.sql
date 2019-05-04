-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2019 at 01:12 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fitness2`
--

-- --------------------------------------------------------

--
-- Table structure for table `binaryfiles`
--

CREATE TABLE `binaryfiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `file_src` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binaryfiles`
--

INSERT INTO `binaryfiles` (`id`, `title`, `file_src`, `text`, `created_at`, `updated_at`) VALUES
(1, 'ViygFap7NT', 'images/person_1.jpg', 'Quos nulla ad natus magnam enim. Reiciendis molestiae earum nostrum voluptatem fugiat aliquid atque. Voluptas facilis repellat cupiditate ex. Expedita magni maxime at odio.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(2, '50C7llBpEL', 'images/person_2.jpg', 'Voluptas distinctio pariatur reiciendis iste et necessitatibus minus. Excepturi quae quo voluptate vel id. Ut eum fuga cum sed. Quia numquam voluptas non id qui.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(3, 'gpAFP1um88', 'images/person_3.jpg', 'Id sit qui ut velit corporis. Laudantium qui repellat eligendi iste odit dolor. Et similique ut sed ut. Debitis et non et beatae dignissimos dolores dolores. Quos ut temporibus expedita placeat quos repellendus. Ut cumque sint illo.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(4, 'dqHYUBpkPs', 'images/person_4.jpg', 'Vel omnis ab ipsum voluptas. Id odio illum et accusantium laborum. Aut qui voluptates error reprehenderit ex quo. Enim dolor quibusdam nesciunt molestiae adipisci sapiente. Necessitatibus et autem ratione.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(5, 'KwwxH7F7V2', 'images/person_1.jpg', 'Aut qui consequatur et dolores. Pariatur unde voluptatem quod delectus. Ab distinctio ducimus ut ut eos aut earum.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(6, '6YN0lz7BMG', 'images/person_2.jpg', 'Asperiores ea eveniet sed dolorum voluptates error minus. Perspiciatis et nam beatae autem aut inventore voluptatum. Deserunt et a ipsam vel est natus vero. Culpa accusamus doloribus magnam.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(7, 'tOfUgyjTdu', 'images/person_3.jpg', 'Qui iure delectus quo. Neque ut veritatis eveniet quasi praesentium. Voluptatem aut officiis consectetur veritatis sapiente omnis alias.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(8, 'GR96kN2mLd', 'images/person_4.jpg', 'Consequatur optio fuga sequi in officia. Aut mollitia inventore necessitatibus a et qui quo. Sit amet excepturi dolorum est. Quia ex tempore velit et ea aut aut.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(9, 'lCkZu7K6OD', 'images/person_1.jpg', 'Excepturi earum incidunt ex sed. Dolores debitis quae et. Perspiciatis magni et officia et ut quod.', '2019-04-20 21:32:53', '2019-04-20 21:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `binaryfile_user`
--

CREATE TABLE `binaryfile_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `binaryfile_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `binaryfile_user`
--

INSERT INTO `binaryfile_user` (`id`, `user_id`, `binaryfile_id`, `created_at`, `updated_at`) VALUES
(1, 21, 1, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(2, 22, 2, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(3, 23, 3, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(4, 24, 4, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(5, 25, 5, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(6, 11, 6, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(7, 12, 7, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(8, 13, 8, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(9, 14, 9, '2019-04-20 21:32:53', '2019-04-20 21:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `count_month` int(11) DEFAULT NULL,
  `count_day` int(11) DEFAULT NULL,
  `price` decimal(8,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `title`, `count_month`, `count_day`, `price`, `created_at`, `updated_at`) VALUES
(1, 'year', 12, 365, '120000', '2019-04-20 15:50:35', '2019-04-20 15:50:35'),
(2, '6month', 6, 182, '60000', '2019-04-20 15:54:40', '2019-04-20 15:54:40'),
(3, '3month', 3, 92, '30000', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(4, '1month', 1, 30, '10000', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(5, 'personal', 7, 243, '70000', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(6, 'child', 7, 286, '70000', '2019-04-20 16:12:57', '2019-04-20 16:12:57'),
(7, 'Quod iure soluta nostrum quas et. Perspiciati', 2, 241, '20000', '2019-04-20 16:12:57', '2019-04-20 16:12:57'),
(8, 'Exercitationem ipsam dolorum quis. Dignissimo', 2, 324, '20000', '2019-04-20 16:28:23', '2019-04-20 16:28:23'),
(9, 'Accusantium voluptatum rem debitis. Ut hic te', 11, 11, '110000', '2019-04-20 17:26:27', '2019-04-20 17:26:27'),
(10, 'Magnam quisquam voluptatum non odit et ex qui', 9, 312, '90000', '2019-04-20 17:26:27', '2019-04-20 17:26:27');

-- --------------------------------------------------------

--
-- Table structure for table `card_user`
--

CREATE TABLE `card_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `card_id` int(10) UNSIGNED DEFAULT NULL,
  `first_date_subscription` date DEFAULT NULL,
  `status` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_user`
--

INSERT INTO `card_user` (`id`, `user_id`, `card_id`, `first_date_subscription`, `status`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2019-01-01', NULL, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(2, 12, 2, '2019-01-01', NULL, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(3, 13, 3, '2019-01-01', NULL, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(4, 14, 4, '2019-01-01', NULL, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(5, 15, 5, '2019-01-01', NULL, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(6, 2, NULL, '2019-01-01', NULL, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(7, 13, NULL, '2019-01-01', NULL, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(8, 22, NULL, '2019-01-01', NULL, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(9, 18, NULL, '2019-01-01', NULL, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(10, 6, NULL, '2019-01-01', NULL, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(242, 254, 1, '2019-04-30', NULL, '2019-04-30 09:06:29', '2019-04-30 09:06:29'),
(243, 254, 3, '2019-04-30', NULL, '2019-04-30 09:19:59', '2019-04-30 09:19:59'),
(244, 254, 5, '2019-04-30', NULL, '2019-04-30 18:50:37', '2019-04-30 18:50:37');

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `title`, `slug`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Enim necessitatibus quas sed fuga. Sint deserunt aliquid ut dolor.', 'aliquam-praesentium-numquam-qui-distinctio-sit-quo-quibusdam', 'Fugiat eum velit porro. Eius voluptatem est in. Ut quisquam consequatur maiores qui aut impedit. Dolores atque totam molestias. Dolorum laboriosam vero error autem iusto et. Cum sequi maxime nihil perspiciatis. Ex porro sunt sed vel quod.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(2, 'Soluta doloribus quam architecto voluptatum optio dolore. Nisi est earum aut veniam et.', 'a-expedita-ipsam-repudiandae-et-error-officia', 'Et rerum nemo perspiciatis voluptas veritatis eius iusto. Est delectus exercitationem quo. Saepe placeat sapiente earum voluptas sed.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(3, 'Nostrum aliquam asperiores impedit sed. Est velit reprehenderit nemo distinctio.', 'nisi-ducimus-dignissimos-et-adipisci-id-aut-consequatur-harum', 'Repudiandae nemo magnam itaque consequatur. Error perferendis non qui laboriosam enim illum. Sequi debitis totam excepturi et sint eum. Corporis aut laboriosam dolor inventore.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(4, 'Corrupti sint non qui. Odio dicta et qui rerum fugit deserunt mollitia.', 'ut-eum-voluptatem-velit-qui-perferendis-aut', 'Eaque non quisquam labore dicta. Quae quasi tempora praesentium ratione in maxime id. Maxime quo harum molestiae voluptatibus sed numquam. Voluptatum explicabo nobis vel dolor officiis dolorum.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(5, 'Molestiae ut aut aliquam aliquam qui. Corrupti tempora ut qui velit.', 'ea-qui-magni-vel', 'Sapiente odio ut rerum id vel. Dolore est repellendus aut ipsa qui aut. Hic impedit quidem aut a non ut. Est atque ipsa eos perspiciatis et. Qui officia molestias aliquam voluptates laboriosam sed dolor laboriosam.', '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(6, 'Et fuga accusantium ut et qui. Earum illo laborum omnis cum aut est.', 'voluptates-consequatur-amet-fuga-praesentium-suscipit-repudiandae-cumque', 'Eius libero atque repellendus sequi sit incidunt qui. Incidunt fugit rerum incidunt dolorem quam non qui. Voluptas quia rerum quasi quia eveniet. Perferendis voluptas recusandae totam autem non. Et eos fugit sunt sapiente sed sequi qui.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(7, 'Dolor soluta quam corrupti minus aspernatur est doloribus eaque. Voluptas aut sit fugiat qui.', 'recusandae-quam-enim-asperiores-inventore-nihil', 'Reprehenderit modi officiis quod ex itaque. Vel itaque eum perferendis amet tenetur vel. Nostrum nobis repellat aut libero necessitatibus. Rerum molestiae ea fugiat corporis suscipit.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(8, 'Ducimus numquam autem nulla minima. Similique voluptas aut veritatis ipsum id.', 'unde-vel-aliquam-ut-qui-ut-maiores-atque', 'Dolor qui veritatis odio temporibus suscipit autem a. Minima temporibus odit tenetur hic. Quaerat dolores facilis ipsum consequatur.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(9, 'Libero quos provident id aut. Est magni hic quia libero.', 'et-consequuntur-repellat-ipsa-rerum-asperiores', 'Eos quisquam quia autem perferendis aut quibusdam odit error. Suscipit esse tempore voluptas qui sed voluptatem numquam. Sint rerum vel omnis reiciendis voluptatem exercitationem.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(10, 'Atque unde sint error. Sint delectus nihil delectus sit consectetur a.', 'architecto-quaerat-repellat-qui-voluptatem-est', 'Ut expedita dolore dolor qui dolorem. Et aut pariatur in officiis consectetur sit sed. Voluptate ab consequatur explicabo ut saepe atque iure ullam. Voluptatem non consequuntur consequatur aut magni earum corrupti nisi.', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(227, 'Некий контент', '', 'текст', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(228, 'ghfhfghfgh', '', 'текст', '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(229, NULL, '', 'hgcgmjh,khj.lh.lkhbjhchngx', '2019-04-30 20:51:35', '2019-04-30 20:51:35'),
(230, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 20:54:28', '2019-04-30 20:54:28'),
(231, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 20:55:30', '2019-04-30 20:55:30'),
(232, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 20:58:00', '2019-04-30 20:58:00'),
(233, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 20:59:41', '2019-04-30 20:59:41'),
(234, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 20:59:57', '2019-04-30 20:59:57'),
(235, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:00:14', '2019-04-30 21:00:14'),
(236, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:05:51', '2019-04-30 21:05:51'),
(237, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:06:15', '2019-04-30 21:06:15'),
(238, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:07:44', '2019-04-30 21:07:44'),
(239, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:08:57', '2019-04-30 21:08:57'),
(240, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:15:49', '2019-04-30 21:15:49'),
(241, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:16:55', '2019-04-30 21:16:55'),
(242, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'cnhv,knk.lj.n,n vbn bvnmhv,mhghj', '2019-04-30 21:17:08', '2019-04-30 21:17:08'),
(243, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'vnvnvmhgvjhmvjmh', '2019-04-30 21:22:01', '2019-04-30 21:22:01'),
(244, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'vnvnvmhgvjhmvjmh', '2019-04-30 21:22:47', '2019-04-30 21:22:47'),
(245, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'vnvnvmhgvjhmvjmh', '2019-04-30 21:23:09', '2019-04-30 21:23:09'),
(246, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'vnhfnhvngvfng', '2019-05-01 08:10:19', '2019-05-01 08:10:19'),
(247, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'chgcvnv', '2019-05-01 08:12:30', '2019-05-01 08:12:30'),
(248, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'kjbkjbk', '2019-05-01 09:09:37', '2019-05-01 09:09:37'),
(249, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'vdfvdfv', '2019-05-01 16:47:43', '2019-05-01 16:47:43'),
(250, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'ifjnsldnasdlfkjnoifnoxdifjdocnfodifjdoСообщение от пользователя: Миронов Яков Львович, e-mail: solnce52004@yandex.ru, телефон: 8-800-512-0071. Текст сообщения: ifjnsldnasdlfkjnoifnoxdifjdocnfodifjdo', '2019-05-01 16:57:43', '2019-05-01 16:57:43'),
(251, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Сообщение от пользователя: Миронов Яков Львович, e-mail: solnce52004@yandex.ru, телефон: 8-800-512-0071. Текст сообщения: xjdbksjdfneldkjnxwlejaxnlseknclakwel', '2019-05-01 16:59:00', '2019-05-01 16:59:00'),
(252, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Миронов Яков Львович, solnce52004@yandex.ru, 8-800-512-0071, fgsldknlskalskdmalke345p34534rsdlxkclx8', '2019-05-01 17:02:23', '2019-05-01 17:02:23'),
(253, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Миронов Яков Львович, solnce52004@yandex.ru, 8-800-512-0071, ', '2019-05-01 17:06:42', '2019-05-01 17:06:42'),
(276, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, e4534fsdfs', '2019-05-03 14:49:17', '2019-05-03 14:49:17'),
(277, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, hmbmbhmhn7567tgvnb', '2019-05-03 14:49:51', '2019-05-03 14:49:51'),
(278, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, lsdknclkxjcn  jbskdjbsk j kdjcsbkzjcxcbj bksjdbcksjdcbksj?', '2019-05-03 14:51:03', '2019-05-03 14:51:03'),
(279, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, тдалтмчдслт Овдилсдмдчл ЛДлваиьдслмтсдмл?', '2019-05-03 14:51:52', '2019-05-03 14:51:52'),
(280, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, nhvnhvjghjg', '2019-05-04 18:13:44', '2019-05-04 18:13:44'),
(281, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, l.khn.lk.lkn.l,nk.\r\njv mbkjb\r\nkb mjbkljl', '2019-05-04 18:15:30', '2019-05-04 18:15:30'),
(282, 'Вопрос из формы контактов', 'vopros-iz-formy-kontaktov', 'Владимир Сергеевич Максимов, m-a-grigoreva@yandex.ru, +7 (922) 769-7554, ;mlkn.lkn.l,nk.lkn.l,nk.l kjbln, lkjnlkn lknlknln', '2019-05-04 18:16:37', '2019-05-04 18:16:37');

-- --------------------------------------------------------

--
-- Table structure for table `content_user`
--

CREATE TABLE `content_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `content_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content_user`
--

INSERT INTO `content_user` (`id`, `content_id`, `user_id`, `created_at`, `updated_at`) VALUES
(218, 1, 21, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(219, 2, 22, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(220, 3, 23, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(221, 4, 24, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(222, 5, 25, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(223, 6, 11, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(224, 7, 12, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(225, 8, 13, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(226, 9, 14, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(227, 10, 6, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(228, 229, 260, '2019-04-30 20:51:35', '2019-04-30 20:51:35'),
(229, 231, 235, '2019-04-30 20:55:30', '2019-04-30 20:55:30'),
(230, 232, 235, '2019-04-30 20:58:00', '2019-04-30 20:58:00'),
(231, 233, 235, '2019-04-30 20:59:41', '2019-04-30 20:59:41'),
(232, 234, 235, '2019-04-30 20:59:57', '2019-04-30 20:59:57'),
(233, 235, 235, '2019-04-30 21:00:14', '2019-04-30 21:00:14'),
(234, 236, 235, '2019-04-30 21:05:51', '2019-04-30 21:05:51'),
(235, 237, 235, '2019-04-30 21:06:15', '2019-04-30 21:06:15'),
(236, 238, 235, '2019-04-30 21:07:44', '2019-04-30 21:07:44'),
(237, 239, 235, '2019-04-30 21:08:57', '2019-04-30 21:08:57'),
(238, 240, 235, '2019-04-30 21:15:49', '2019-04-30 21:15:49'),
(239, 241, 235, '2019-04-30 21:16:55', '2019-04-30 21:16:55'),
(240, 242, 235, '2019-04-30 21:17:08', '2019-04-30 21:17:08'),
(241, 243, 235, '2019-04-30 21:22:01', '2019-04-30 21:22:01'),
(242, 244, 235, '2019-04-30 21:22:47', '2019-04-30 21:22:47'),
(243, 245, 235, '2019-04-30 21:23:09', '2019-04-30 21:23:09'),
(244, 246, 261, '2019-05-01 08:10:19', '2019-05-01 08:10:19'),
(245, 247, 262, '2019-05-01 08:12:30', '2019-05-01 08:12:30'),
(246, 248, 235, '2019-05-01 09:09:37', '2019-05-01 09:09:37'),
(247, 249, 263, '2019-05-01 16:47:43', '2019-05-01 16:47:43'),
(248, 250, 254, '2019-05-01 16:57:43', '2019-05-01 16:57:43'),
(249, 251, 254, '2019-05-01 16:59:00', '2019-05-01 16:59:00'),
(250, 252, 254, '2019-05-01 17:02:23', '2019-05-01 17:02:23'),
(251, 253, 254, '2019-05-01 17:06:42', '2019-05-01 17:06:42'),
(274, 276, 235, '2019-05-03 14:49:17', '2019-05-03 14:49:17'),
(275, 277, 235, '2019-05-03 14:49:51', '2019-05-03 14:49:51'),
(276, 278, 235, '2019-05-03 14:51:03', '2019-05-03 14:51:03'),
(277, 279, 235, '2019-05-03 14:51:52', '2019-05-03 14:51:52'),
(278, 280, 235, '2019-05-04 18:13:44', '2019-05-04 18:13:44'),
(279, 281, 235, '2019-05-04 18:15:30', '2019-05-04 18:15:30'),
(280, 282, 235, '2019-05-04 18:16:38', '2019-05-04 18:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `equipments`
--

CREATE TABLE `equipments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(45) DEFAULT NULL,
  `count` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipments`
--

INSERT INTO `equipments` (`id`, `title`, `count`, `created_at`, `updated_at`) VALUES
(1, 'In.', 181, '2019-04-20 16:29:55', '2019-04-20 16:29:55'),
(2, 'Quo qui.', 77, '2019-04-20 16:30:44', '2019-04-20 16:30:44'),
(3, 'Qui.', 150, '2019-04-20 16:44:07', '2019-04-20 16:44:07'),
(4, 'Repellat.', 151, '2019-04-20 16:50:20', '2019-04-20 16:50:20'),
(5, 'Dolores.', 137, '2019-04-20 17:06:17', '2019-04-20 17:06:17'),
(6, 'Eligendi.', 109, '2019-04-20 17:14:52', '2019-04-20 17:14:52'),
(7, 'Ab.', 37, '2019-04-20 17:15:17', '2019-04-20 17:15:17'),
(8, 'Sunt.', 68, '2019-04-20 18:42:47', '2019-04-20 18:42:47'),
(9, 'Natus.', 75, '2019-04-20 18:44:34', '2019-04-20 18:44:34'),
(10, 'Corporis.', 154, '2019-04-20 20:58:01', '2019-04-20 20:58:01'),
(11, 'Fugit.', 123, '2019-04-20 21:00:24', '2019-04-20 21:00:24'),
(12, 'Ut.', 186, '2019-04-20 21:00:38', '2019-04-20 21:00:38'),
(13, 'Eum qui.', 172, '2019-04-20 21:01:19', '2019-04-20 21:01:19'),
(14, 'Quia.', 144, '2019-04-20 21:04:02', '2019-04-20 21:04:02'),
(15, 'Enim id.', 192, '2019-04-20 21:04:14', '2019-04-20 21:04:14'),
(16, 'Dolores.', 45, '2019-04-20 21:08:05', '2019-04-20 21:08:05'),
(17, 'Et aut ad.', 39, '2019-04-20 21:12:11', '2019-04-20 21:12:11'),
(18, 'Est amet.', 154, '2019-04-20 21:13:35', '2019-04-20 21:13:35'),
(19, 'Accusamus.', 25, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(20, 'Corrupti.', 144, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(21, 'Rerum sed.', 112, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(22, 'Dolorem.', 50, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(23, 'Est.', 164, '2019-04-20 21:32:53', '2019-04-20 21:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `equipment_gym`
--

CREATE TABLE `equipment_gym` (
  `id` int(10) UNSIGNED NOT NULL,
  `gym_id` int(10) UNSIGNED DEFAULT NULL,
  `equipment_id` int(10) UNSIGNED DEFAULT NULL,
  `count_equipment` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `equipment_gym`
--

INSERT INTO `equipment_gym` (`id`, `gym_id`, `equipment_id`, `count_equipment`, `created_at`, `updated_at`) VALUES
(19, 15, 14, 93, '2019-04-20 21:04:02', '2019-04-20 21:04:02'),
(20, 16, 15, 72, '2019-04-20 21:04:14', '2019-04-20 21:04:14'),
(21, 17, 16, 103, '2019-04-20 21:08:05', '2019-04-20 21:08:05'),
(22, 18, 17, 146, '2019-04-20 21:12:11', '2019-04-20 21:12:11'),
(23, 19, 18, 77, '2019-04-20 21:13:35', '2019-04-20 21:13:35'),
(24, 20, 19, 69, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(25, 21, 20, 13, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(26, 22, 21, 106, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(27, 23, 22, 29, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(28, 24, 23, 103, '2019-04-20 21:32:53', '2019-04-20 21:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `gyms`
--

CREATE TABLE `gyms` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gyms`
--

INSERT INTO `gyms` (`id`, `title`, `slug`, `number`, `created_at`, `updated_at`) VALUES
(1, 'Et rerum porro ad repellendus eos dignissimos. Fuga corrupti qui amet et error non.', '', 100, '2019-04-20 16:28:41', '2019-04-20 16:28:41'),
(2, 'Debitis optio eaque sapiente quo. Impedit in itaque magni nesciunt. Non dolorem nemo est non nihil.', '', 101, '2019-04-20 16:29:55', '2019-04-20 16:29:55'),
(3, 'Odio nihil dolorum sit. Voluptatem rerum vel dolor quam. Est eligendi eius sunt dolor.', '', 102, '2019-04-20 16:30:44', '2019-04-20 16:30:44'),
(4, 'Enim occaecati eum consectetur quis aut rerum. Soluta totam est ut sapiente dolores enim molestiae.', '', 103, '2019-04-20 16:44:07', '2019-04-20 16:44:07'),
(5, 'Ullam officiis temporibus deleniti. Est aperiam quidem ex. Dolor libero ut ratione qui.', '', 104, '2019-04-20 16:50:20', '2019-04-20 16:50:20'),
(6, 'Pariatur quia quidem atque. Est recusandae est voluptatibus assumenda qui et.', '', 105, '2019-04-20 17:06:17', '2019-04-20 17:06:17'),
(7, 'Non minus eum labore pariatur. Error nihil sequi sit voluptates vel quia totam.', '', 106, '2019-04-20 17:14:52', '2019-04-20 17:14:52'),
(8, 'Numquam et velit voluptas sint. Eum mollitia tenetur omnis mollitia alias dicta consequatur.', '', 107, '2019-04-20 17:15:17', '2019-04-20 17:15:17'),
(9, 'Aut nihil aperiam perferendis doloribus consequatur. Tempore quia et sint.', '', 108, '2019-04-20 18:42:47', '2019-04-20 18:42:47'),
(10, 'Sunt quidem facere eos rem tenetur. Fuga sed magnam veniam sit.', '', 109, '2019-04-20 18:44:34', '2019-04-20 18:44:34'),
(11, 'Quis distinctio rerum architecto sed. Et aut esse ipsum excepturi quia. Vero vel voluptates eum.', '', 110, '2019-04-20 20:58:01', '2019-04-20 20:58:01'),
(12, 'Eos omnis autem aliquam. Cupiditate expedita distinctio iusto aut.', '', 111, '2019-04-20 21:00:24', '2019-04-20 21:00:24'),
(13, 'Ab est rerum fuga aut eveniet sit. Et impedit rerum ad a omnis.', '', 112, '2019-04-20 21:00:38', '2019-04-20 21:00:38'),
(14, 'Architecto illo enim architecto veniam. Alias repellat iste ad ut. Qui nam ut explicabo temporibus.', '', 113, '2019-04-20 21:01:19', '2019-04-20 21:01:19'),
(15, 'Praesentium voluptatum soluta numquam esse exercitationem earum ut. Nihil eaque aut doloribus quo.', '', 114, '2019-04-20 21:04:02', '2019-04-20 21:04:02'),
(16, 'Qui perferendis architecto minima. Ex eos sit et dolor incidunt est.', '', 115, '2019-04-20 21:04:14', '2019-04-20 21:04:14'),
(17, 'Porro illum laudantium eligendi facere ab. Ut suscipit tempore maiores minima.', '', 116, '2019-04-20 21:08:05', '2019-04-20 21:08:05'),
(18, 'Quis tenetur quas amet eaque ex. Vel et veniam sunt consequatur rerum velit sit.', '', 117, '2019-04-20 21:12:11', '2019-04-20 21:12:11'),
(19, 'Ab quo sed sunt alias. Molestiae quibusdam nam placeat aliquam quod.', '', 118, '2019-04-20 21:13:35', '2019-04-20 21:13:35'),
(20, 'Aut amet quia sunt. Est ut facilis porro quia. In sequi quasi magni quo odit eum saepe.', '', 119, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(21, 'Quos atque et quia in. Laboriosam et in qui eos. Eius perspiciatis deleniti sequi nihil.', '', 120, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(22, 'Magnam aspernatur repellendus consequatur sunt et doloribus. Rerum earum facilis pariatur.', '', 121, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(23, 'Rerum ratione rerum qui laborum autem et magnam sit. Officiis ut ea ut voluptatem enim.', '', 122, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(24, 'Sequi odit qui excepturi quia. Cum qui tempora quo sint dolore est.', 'veritatis-aut-consequatur', 123, '2019-04-20 21:32:53', '2019-04-20 21:32:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_04_20_145152_create_binaryfile_user_table', 1),
(2, '2019_04_20_145152_create_binaryfiles_table', 1),
(3, '2019_04_20_145152_create_card_user_table', 1),
(4, '2019_04_20_145152_create_cards_table', 1),
(5, '2019_04_20_145152_create_content_user_table', 1),
(6, '2019_04_20_145152_create_contents_table', 1),
(7, '2019_04_20_145152_create_equipment_gym_table', 1),
(8, '2019_04_20_145152_create_equipments_table', 1),
(9, '2019_04_20_145152_create_gyms_table', 1),
(10, '2019_04_20_145152_create_personalinfos_table', 1),
(11, '2019_04_20_145152_create_roles_table', 1),
(12, '2019_04_20_145152_create_sections_table', 1),
(13, '2019_04_20_145152_create_shedule_user_table', 1),
(14, '2019_04_20_145152_create_shedules_table', 1),
(15, '2019_04_20_145152_create_trainingtimes_table', 1),
(16, '2019_04_20_145152_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 2),
(18, '2019_04_20_145153_add_foreign_keys_to_binaryfile_user_table', 3),
(19, '2019_04_20_145153_add_foreign_keys_to_card_user_table', 3),
(20, '2019_04_20_145153_add_foreign_keys_to_content_user_table', 3),
(21, '2019_04_20_145153_add_foreign_keys_to_equipment_gym_table', 3),
(22, '2019_04_20_145153_add_foreign_keys_to_shedule_user_table', 3),
(23, '2019_04_20_145153_add_foreign_keys_to_shedules_table', 3),
(24, '2019_04_20_145153_add_foreign_keys_to_users_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `personalinfos`
--

CREATE TABLE `personalinfos` (
  `id` int(10) UNSIGNED NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `birthdate` date DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `personalinfos`
--

INSERT INTO `personalinfos` (`id`, `login`, `name`, `surname`, `middle_name`, `email`, `telephone`, `birthdate`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Voluptas.', 'Стрелкова Инна Андреевна', 'Фадеев', 'Даниил', 'stefan50@blinov.ru', '(812) 466-56-38', '1980-06-04', 'Est nemo in enim sunt et. Et quidem similique ea praesentium.', '2019-04-20 15:50:35', '2019-04-20 15:50:35'),
(2, 'Numquam.', 'Марк Романович Пестов', 'Котов', 'Алексей', 'haritonov.sofa@zaharov.ru', '(495) 444-9639', '1981-01-28', 'Sunt et sequi et reiciendis enim ex. Eos similique quasi sint. Ipsam ut deleniti rerum consequatur.', '2019-04-20 15:54:40', '2019-04-20 15:54:40'),
(3, 'Eligendi.', 'Чернова Кристина Алексеевна', 'Федосеев', 'София', 'odmitriev@inbox.ru', '(35222) 31-5539', '2008-10-26', 'Hic aliquid vel voluptatum qui consectetur possimus. Id dolorem ut ea.', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(4, 'Amet qui.', 'Щукин Эрик Романович', 'Кошелев', 'Вадим', 'taisia.noskov@gmail.com', '(812) 548-35-55', '2016-12-27', 'Repellat officiis minus est delectus earum optio fugit. Ab possimus minus ut provident.', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(5, 'Rem rerum.', 'Матвей Фёдорович Молчанов', 'Зуев', 'Август', 'lubov.medvedev@mail.ru', '8-800-070-5198', '1975-11-18', 'A dignissimos voluptas minus earum. Mollitia nihil porro laborum nostrum aut.', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(6, 'Nihil qui.', 'Василиса Львовна Сазонова', 'Бобылёв', 'Ярослав', 'lkornilov@rambler.ru', '8-800-262-0900', '2013-03-16', 'Libero quam incidunt magnam et. Iusto corporis debitis ipsam atque in et et.', '2019-04-20 16:12:57', '2019-04-20 16:12:57'),
(7, 'Fugit.', 'Ершова Марина Сергеевна', 'Антонов', 'Вадим', 'voronov.aroslava@kirillov.net', '8-800-406-3343', '2016-06-01', 'Atque quis quidem itaque sit. Quos nulla voluptatibus enim laudantium eaque vero eligendi.', '2019-04-20 16:12:57', '2019-04-20 16:12:57'),
(8, 'Ut quo.', 'Вероника Фёдоровна Костина', 'Якушев', 'Иннокентий', 'vasilij.kiselev@mironov.ru', '(495) 681-0197', '2007-05-01', 'Qui ut ex exercitationem deleniti nihil. Quia architecto in sed dolores.', '2019-04-20 17:26:27', '2019-04-20 17:26:27'),
(9, 'Veniam.', 'Никита Дмитриевич Зайцев', 'Захаров', 'Альбина', 'ermakov.boris@bobylev.com', '(495) 162-2909', '2016-05-28', 'Nulla rem aut exercitationem vero quia. Sit numquam est modi hic est placeat.', '2019-04-20 17:26:27', '2019-04-20 17:26:27'),
(10, 'Molestias.', 'Феликс Евгеньевич Борисов', 'Комаров', 'Альбина', 'kapustin.david@yandex.ru', '(35222) 27-5859', '2013-10-07', 'Fugiat vitae porro inventore. Ut mollitia officia consequatur ex porro. Porro sapiente vero qui.', '2019-04-20 17:26:27', '2019-04-20 17:26:27'),
(11, 'Earum.', 'Копылова Валерия Романовна', 'Антонов', 'Олеся', 'dkalasnikov@gmail.com', '(812) 315-66-69', '1981-03-07', 'Vel repellat omnis qui natus nesciunt dolorem. Reprehenderit nihil non aliquid occaecati dolorem.', '2019-04-20 17:26:28', '2019-04-20 17:26:28'),
(12, 'Vero aut.', 'Клавдия Романовна Никитина', 'Зуев', 'Анна', 'kotov.lada@ya.ru', '+7 (922) 731-8284', '1974-11-02', 'Qui aut odit quibusdam ullam. Eveniet aliquam et ut quo.', '2019-04-20 17:26:28', '2019-04-20 17:26:28'),
(13, 'Deleniti.', 'Кононов Павел Львович', 'Афанасьев', 'Таисия', 'valentina03@mail.ru', '+7 (922) 038-9589', '1973-10-01', 'Et ratione accusamus et quo. Qui aut perferendis aut omnis.', '2019-04-20 17:51:09', '2019-04-20 17:51:09'),
(14, 'Ipsum est.', 'Рожкова Флорентина Евгеньевна', 'Мамонтов', 'Нонна', 'feliks07@list.ru', '8-800-972-6172', '1979-04-25', 'Optio ea sed praesentium. Animi rerum veniam in suscipit ea quia. Ut quo voluptatem odit omnis.', '2019-04-20 17:53:10', '2019-04-20 17:53:10'),
(15, 'Unde.', 'Алла Львовна Назарова', 'Никонов', 'Арсений', 'klim.seleznev@list.ru', '(495) 136-8105', '1987-05-16', 'Illum aperiam illum culpa ad voluptate. Illo ipsum qui ex.', '2019-04-20 17:54:35', '2019-04-20 17:54:35'),
(16, 'Sit fugit.', 'Сорокин Назар Романович', 'Лобанов', 'Дмитрий', 'kuznecov.vasilisa@dackov.com', '+7 (922) 976-4987', '2010-04-19', 'Eveniet et pariatur tempore iusto. Unde voluptas quaerat architecto explicabo.', '2019-04-20 17:55:16', '2019-04-20 17:55:16'),
(17, 'Ea.', 'Авдеева Алина Фёдоровна', 'Одинцов', 'Майя', 'ulana.bobrov@ya.ru', '8-800-483-5320', '1994-06-27', 'Aut quis temporibus reiciendis odit. Quae hic laudantium iusto. Cum harum neque assumenda ut.', '2019-04-20 17:55:32', '2019-04-20 17:55:32'),
(18, 'Unde.', 'Михаил Иванович Фролов', 'Белозёров', 'Нонна', 'zodincov@ya.ru', '(812) 747-37-37', '1986-12-04', 'Facilis quis provident vel ut temporibus enim. Natus ea quis hic. Quasi quos velit aut minima.', '2019-04-20 17:55:59', '2019-04-20 17:55:59'),
(19, 'Iure.', 'Таисия Андреевна Козлова', 'Архипов', 'Лилия', 'izabella.sestakov@narod.ru', '(495) 658-6238', '2018-07-21', 'Tempore culpa expedita architecto. Quod iusto possimus quia distinctio possimus eveniet ut.', '2019-04-20 17:57:20', '2019-04-20 17:57:20'),
(20, 'Qui.', 'Марат Иванович Шаров', 'Воронцов', 'Родион', 'medvedev.arkadij@petuhov.com', '(35222) 72-5008', '1975-02-21', 'Dolorem quisquam nisi id maiores. Aut at et sunt magni. Corrupti ea est ab quia aut.', '2019-04-20 17:59:01', '2019-04-20 17:59:01'),
(21, 'Fugit est.', 'Любовь Львовна Сысоева', 'Савин', 'Савва', 'klementina.sarapov@isaev.org', '(495) 795-8742', '2018-03-20', 'Animi et ipsum magnam qui. Et omnis et doloribus at voluptate qui. Sed labore ut occaecati qui.', '2019-04-20 17:59:51', '2019-04-20 17:59:51'),
(22, 'Magnam.', 'Евгений Андреевич Коновалов', 'Нестеров', 'Ольга', 'fsarov@orlov.net', '8-800-572-7030', '2011-09-23', 'Veritatis alias eveniet dicta officia. Consequuntur id rerum qui voluptas suscipit.', '2019-04-20 17:59:51', '2019-04-20 17:59:51'),
(23, 'Quidem.', 'Ростислав Евгеньевич Архипов', 'Никитин', 'Андрей', 'vladlen.bobrov@narod.ru', '8-800-202-0849', '1975-05-09', 'Et ut voluptatem commodi. Voluptas eum debitis cupiditate nisi velit. Aut sunt quia illo aut in.', '2019-04-20 17:59:51', '2019-04-20 17:59:51'),
(24, 'Dolore.', 'Розалина Владимировна Рожкова', 'Авдеев', 'Юлия', 'tit22@zimin.com', '(812) 208-45-63', '1980-11-04', 'Odio et odio blanditiis velit. Corrupti ea numquam mollitia harum.', '2019-04-20 17:59:51', '2019-04-20 17:59:51'),
(25, 'Autem et.', 'Клара Романовна Шарапова', 'Михеев', 'Игорь', 'milan50@ovcinnikov.ru', '(812) 987-22-69', '1989-05-26', 'Et consequatur est magni vel mollitia qui. Eaque quasi ipsam laboriosam magnam velit.', '2019-04-20 17:59:51', '2019-04-20 17:59:51'),
(26, 'Tempora.', 'Владимир Сергеевич Максимов', 'Наумов', 'Иосиф', 'aterentev@osipov.org', '+7 (922) 769-7554', '1983-08-06', 'Totam quibusdam ex ad iure qui iure. Rerum nostrum tempora excepturi optio.', '2019-04-20 18:00:18', '2019-04-20 18:00:18'),
(27, 'Quo atque.', 'Миронов Яков Львович', 'Колесников', 'Клементина', 'fkuznecov@yandex.ru', '8-800-512-0071', '1985-01-08', 'Vel odit laborum id quam. Consectetur exercitationem rem vitae est.', '2019-04-20 18:00:18', '2019-04-20 18:00:18'),
(28, 'Aut.', 'Антон Сергеевич Фадеев', 'Мельников', 'Август', 'nina42@cernov.ru', '+7 (922) 658-1257', '1974-01-29', 'Quo tenetur excepturi sit. Sint dolores quibusdam et aut. In assumenda nisi est nisi quo rerum.', '2019-04-20 18:00:18', '2019-04-20 18:00:18'),
(29, 'Cumque.', 'Цветков Донат Фёдорович', 'Беляков', 'Таисия', 'bogdanov.nonna@stepanov.net', '8-800-028-2739', '1973-10-16', 'Tempora culpa ex quo qui. Commodi omnis hic quo nihil vel. Enim qui mollitia officia.', '2019-04-20 18:00:18', '2019-04-20 18:00:18'),
(30, 'Fugit.', 'Кабанова Варвара Ивановна', 'Родионов', 'Арсений', 'kapitolina.panfilov@haritonov.ru', '(495) 846-3886', '1999-04-14', 'Ad eius occaecati dolor maiores. Temporibus ea non omnis. A iusto dolores non nesciunt.', '2019-04-20 18:00:18', '2019-04-20 18:00:18'),
(232, NULL, 'nvnvbvn', NULL, NULL, 'mashagrig@gmail.com', '7676', NULL, NULL, '2019-04-30 20:37:59', '2019-04-30 20:37:59'),
(233, NULL, 'mhmhhm', NULL, NULL, 'm-a-grigorieva@yandex.rufdd', '7676', NULL, NULL, '2019-04-30 20:40:03', '2019-04-30 20:40:03'),
(234, NULL, 'cgcbcv', NULL, NULL, 'm-a-grigorieva@yandex.ru1', '7657657', NULL, NULL, '2019-04-30 20:45:15', '2019-04-30 20:45:15'),
(235, NULL, 'jgjhgjh', NULL, NULL, 'm-a-grigoreva@yand555', '76574567', NULL, NULL, '2019-04-30 20:51:35', '2019-04-30 20:51:35'),
(236, NULL, 'hghgh', NULL, NULL, 'm-a-grigoreva@yand666', '8685856', NULL, NULL, '2019-05-01 08:10:19', '2019-05-01 08:10:19'),
(237, NULL, 'mhvhjv', NULL, NULL, 'm-a-grigoreva@yand888', '7675', NULL, NULL, '2019-05-01 08:12:30', '2019-05-01 08:12:30'),
(238, NULL, 'xfgdfd', NULL, NULL, 'm-a-grigoreva@yand444', '888', NULL, NULL, '2019-05-01 16:47:43', '2019-05-01 16:47:43');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `title`, `text`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Cumque excepturi sit eos aut. Qui quod dolore temporibus sit rerum nobis alias.', '2019-04-20 15:50:35', '2019-04-20 15:50:35'),
(2, 'guest', 'Fuga odio nostrum odio cum et suscipit est. Non iure nostrum distinctio. Ullam illum sapiente aut.', '2019-04-20 15:54:40', '2019-04-20 15:54:40'),
(3, 'trainer', 'Suscipit vel illo modi dolores libero. Mollitia ipsum et facere aliquid accusantium.', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(4, 'support', 'Ut esse est enim ab et. Omnis quis a dolore dolore in. Ducimus consectetur totam et pariatur.', '2019-04-20 16:12:56', '2019-04-20 16:12:56'),
(5, 'content', 'Voluptate quis maiores voluptas qui. Rerum et omnis autem porro. Non amet odit ut.', '2019-04-20 16:12:56', '2019-04-20 16:12:56');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `title`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'morning_programs', '', '2019-04-20 16:28:41', '2019-04-20 16:28:41'),
(2, 'body_building', '', '2019-04-20 16:29:55', '2019-04-20 16:29:55'),
(3, 'stretching', '', '2019-04-20 16:30:44', '2019-04-20 16:30:44'),
(4, 'fitness', '', '2019-04-20 16:33:12', '2019-04-20 16:33:12'),
(5, 'yoga', '', '2019-04-20 16:33:31', '2019-04-20 16:33:31'),
(6, 'child_programs', '', '2019-04-20 16:33:47', '2019-04-20 16:33:47'),
(7, 'stretching', '', '2019-04-20 16:38:12', '2019-04-20 16:38:12'),
(8, 'body_building', '', '2019-04-20 16:38:33', '2019-04-20 16:38:33'),
(9, 'body_building', '', '2019-04-20 16:39:45', '2019-04-20 16:39:45'),
(10, 'body_building', '', '2019-04-20 16:40:27', '2019-04-20 16:40:27');

-- --------------------------------------------------------

--
-- Table structure for table `shedules`
--

CREATE TABLE `shedules` (
  `id` int(10) UNSIGNED NOT NULL,
  `date_training` date DEFAULT NULL,
  `trainingtime_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL,
  `gym_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shedules`
--

INSERT INTO `shedules` (`id`, `date_training`, `trainingtime_id`, `user_id`, `section_id`, `gym_id`, `created_at`, `updated_at`) VALUES
(1, '2019-04-24', 1, 21, 1, 1, '2019-04-20 21:20:49', '2019-04-20 21:20:49'),
(2, '2019-04-25', 2, 22, 2, 2, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(4, '2019-04-25', 3, 23, 3, 3, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(5, '2019-05-05', 4, 24, 4, 4, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(42, '2019-05-10', 5, 25, 5, 5, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(43, '2019-05-11', 6, 21, 6, 6, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(44, '2019-05-15', 7, 22, 4, 7, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(45, '2019-05-15', 8, 23, 5, 8, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(46, '2019-05-15', 9, 24, 3, 9, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(47, '2019-05-15', 1, 25, 1, 10, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(48, '2019-05-16', 2, 21, 1, 11, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(49, '2019-05-17', 3, 22, 6, 12, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(50, '2019-05-17', 4, 23, 2, 13, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(51, '2019-05-19', 5, 24, 2, 14, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(52, '2019-05-19', 6, 25, 3, 15, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(53, '2019-05-19', 7, 21, 4, 16, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(54, '2019-05-20', 8, 22, 5, 17, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(55, '2019-05-20', 9, 23, 3, 18, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(56, '2019-05-20', 1, 24, 1, 19, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(57, '2019-05-21', 2, 25, 1, 20, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(58, '2019-05-21', 3, 21, 3, 21, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(59, '2019-05-21', 4, 22, 4, 22, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(60, '2019-05-25', 5, 23, 5, 23, '2019-04-20 21:32:53', '2019-04-20 21:32:54'),
(61, '2019-05-30', 6, 24, 6, 24, '2019-04-20 21:32:53', '2019-04-20 21:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `shedule_user`
--

CREATE TABLE `shedule_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `shedule_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shedule_user`
--

INSERT INTO `shedule_user` (`id`, `user_id`, `shedule_id`, `created_at`, `updated_at`) VALUES
(1, 11, 1, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(2, 12, 2, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(3, 13, 4, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(4, 14, 5, '2019-04-20 21:32:54', '2019-04-20 21:32:54'),
(95, NULL, 51, '2019-04-23 13:04:57', '2019-04-23 13:04:57'),
(101, 235, 4, '2019-04-24 13:09:20', '2019-04-24 13:09:20'),
(133, 254, 57, '2019-04-27 10:26:12', '2019-04-27 10:26:12'),
(134, 254, 58, '2019-04-27 10:26:12', '2019-04-27 10:26:12'),
(135, 254, 55, '2019-04-27 10:26:51', '2019-04-27 10:26:51'),
(137, 254, 56, '2019-04-27 10:27:08', '2019-04-27 10:27:08'),
(138, 254, 54, '2019-04-27 10:27:08', '2019-04-27 10:27:08'),
(267, 235, 5, '2019-05-04 18:27:00', '2019-05-04 18:27:00');

-- --------------------------------------------------------

--
-- Table structure for table `trainingtimes`
--

CREATE TABLE `trainingtimes` (
  `id` int(10) UNSIGNED NOT NULL,
  `start_training` time DEFAULT NULL,
  `stop_training` time DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `trainingtimes`
--

INSERT INTO `trainingtimes` (`id`, `start_training`, `stop_training`, `created_at`, `updated_at`) VALUES
(1, '06:00:00', '08:00:00', '2019-04-20 16:04:53', '2019-04-20 16:04:53'),
(2, '08:00:00', '10:00:00', '2019-04-20 16:13:01', '2019-04-20 16:13:01'),
(3, '10:00:00', '12:00:00', '2019-04-20 16:16:13', '2019-04-20 16:16:13'),
(4, '12:00:00', '14:00:00', '2019-04-20 16:17:21', '2019-04-20 16:17:21'),
(5, '14:00:00', '16:00:00', '2019-04-20 16:18:23', '2019-04-20 16:18:23'),
(6, '16:00:00', '18:00:00', '2019-04-20 16:24:46', '2019-04-20 16:24:46'),
(7, '18:00:00', '20:00:00', '2019-04-20 16:25:24', '2019-04-20 16:25:24'),
(8, '20:00:00', '22:00:00', '2019-04-20 16:28:23', '2019-04-20 16:28:23'),
(9, '22:00:00', '00:00:00', '2019-04-20 16:28:41', '2019-04-20 16:28:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `personalinfo_id` int(10) UNSIGNED DEFAULT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `personalinfo_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 'admin-1672', 'nikolaj71@example.org', '2019-04-21 00:22:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'odQzepvGRz', 1, 1, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(2, 'admin-1775', 'gordeev.lusa@example.org', '2019-04-21 00:32:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ooTDXxO1wD', 2, 1, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(3, 'admin-1838', 'zlata.gorbunov@example.com', '2019-04-21 00:24:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1MkSTmRUT7', 3, 1, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(4, 'admin-3291', 'anastasia64@example.net', '2019-04-21 00:21:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rYyTTL9io5', 4, 1, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(5, 'admin-4595', 'hefimov@example.org', '2019-04-21 00:14:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HoYyRzt4kG', 5, 1, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(6, 'content-2025', 'anna.nikiforov@example.org', '2019-04-21 00:32:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DqcOjkPUcn', 6, 5, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(7, 'content-5140', 'innokentij.noskov@example.net', '2019-04-21 00:21:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Jvm3BOszEH', 7, 5, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(8, 'content-6934', 'lubov.gordeev@example.com', '2019-04-21 00:24:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eXQudESIqp', 8, 5, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(9, 'content-7981', 'bzinovev@example.org', '2019-04-21 00:22:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7TQk8xtNpU', 9, 5, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(10, 'content-8991', 'bogdanov.maja@example.net', '2019-04-21 00:14:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'e2fJXjhdfr', 10, 5, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(11, 'guest-1304', 'eva.lihacev@example.com', '2019-04-21 00:21:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UIuBKcFIGO', 11, 2, '2019-04-20 21:21:45', '2019-04-26 10:54:34'),
(12, 'guest-1338', 'dfomin@example.net', '2019-04-21 00:24:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FSOsvRQRl5', 12, 2, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(13, 'guest-4610', 'befimov@example.com', '2019-04-21 00:32:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4oPd8ZCg1I', 13, 2, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(14, 'guest-6606', 'gtitov@example.org', '2019-04-21 00:22:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hMouuG8w2G', 14, 2, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(15, 'guest-663', 'kkonstantinov@example.com', '2019-04-21 00:14:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'whufp3I3gR', 15, 2, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(16, 'support-3048', 'anna.bogdanov@example.net', '2019-04-21 00:24:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aPugMdbhUw', 16, 4, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(17, 'support-3770', 'dsergeev@example.org', '2019-04-21 00:21:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ePn1li6MwJ', 17, 4, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(18, 'support-4749', 'dfilatov@example.org', '2019-04-21 00:32:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'g5EXoGYCeA', 18, 4, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(19, 'support-6277', 'filatov.ignat@example.com', '2019-04-21 00:14:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'FJpqP20XEp', 19, 4, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(20, 'support-998', 'natala69@example.com', '2019-04-21 00:22:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cxAvXIIjQN', 20, 4, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(21, 'trainer-4632', 'rozkov.adam@example.org', '2019-04-21 00:22:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OA7hFp1gUJ', 21, 3, '2019-04-20 21:22:26', '2019-04-20 21:22:26'),
(22, 'trainer-5520', 'vaceslav41@example.net', '2019-04-21 00:32:53', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6OeEFXfnOz', 22, 3, '2019-04-20 21:32:53', '2019-04-20 21:32:53'),
(23, 'trainer-6311', 'sestakov.margarita@example.com', '2019-04-21 00:21:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tcHEytI635', 23, 3, '2019-04-20 21:21:45', '2019-04-20 21:21:45'),
(24, 'trainer-6631', 'nika.korolev@example.org', '2019-04-21 00:14:42', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'T7okxCq4uF', 24, 3, '2019-04-20 21:14:42', '2019-04-20 21:14:42'),
(25, 'trainer-8372', 'eduard.rodionov@example.org', '2019-04-21 00:24:27', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gcB08QzD8e', 25, 3, '2019-04-20 21:24:27', '2019-04-20 21:24:27'),
(235, 'gggg', 'm-a-grigoreva@yandex.ru', '2019-04-22 11:54:05', '$2y$10$JvYnarsTQ.eNxqT/OEyfF.U28rwJbiZmBLcylM2fzJbIwGceriWgO', 'Vwzu8BC8lhNvA3PNCPrugkl4zvpFSELXlJHeDpTXpo32cs64T6ZlO7DErwPn', 26, 2, '2019-04-22 08:53:34', '2019-04-30 20:22:50'),
(254, 'hhhh', 'solnce52004@yandex.ru', '2019-04-27 11:42:13', '$2y$10$ptBh5Rkzq9zFQUHJul8jcesfb8TzjOH3y1WKqiET8SjBJG2u4s5Vu', 'guJx7BUexjQ8YB12lYN5Ud48FTfJcv549eLeU6qVW77hbsyNzupnAR8x0mjt', 27, 2, '2019-04-27 08:41:15', '2019-04-27 08:42:13'),
(255, '', 'v@v.ru', NULL, '', NULL, 28, NULL, '2019-04-30 19:49:51', '2019-04-30 19:53:42'),
(257, 'nvnvbvn', 'mashagrig@gmail.com', NULL, '', NULL, NULL, NULL, '2019-04-30 20:37:59', '2019-04-30 20:37:59'),
(258, 'mhmhhm', 'm-a-grigorieva@yandex.rufdd', NULL, '', NULL, NULL, 2, '2019-04-30 20:40:03', '2019-04-30 20:43:55'),
(259, 'cgcbcv', 'm-a-grigorieva@yandex.ru1', NULL, '', NULL, 234, 2, '2019-04-30 20:45:15', '2019-04-30 20:45:15'),
(260, 'jgjhgjh', 'm-a-grigoreva@yand555', NULL, '', NULL, 235, 2, '2019-04-30 20:51:35', '2019-04-30 20:51:35'),
(261, 'hghgh', 'm-a-grigoreva@yand666', NULL, '', NULL, 236, 2, '2019-05-01 08:10:19', '2019-05-01 08:10:19'),
(262, 'mhvhjv', 'm-a-grigoreva@yand888', NULL, '', NULL, 237, 2, '2019-05-01 08:12:30', '2019-05-01 08:12:30'),
(263, 'xfgdfd', 'm-a-grigoreva@yand444', NULL, '', NULL, 238, 2, '2019-05-01 16:47:43', '2019-05-01 16:47:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binaryfiles`
--
ALTER TABLE `binaryfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `binaryfile_user`
--
ALTER TABLE `binaryfile_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_binaryfile_user_user_id_idx` (`user_id`),
  ADD KEY `fk_binaryfile_user_binaryfile_id_idx` (`binaryfile_id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `card_user`
--
ALTER TABLE `card_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_card_user_user_id_idx` (`user_id`),
  ADD KEY `fk_card_user_card_id_idx` (`card_id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_user`
--
ALTER TABLE `content_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_content_user_content_id_idx` (`content_id`),
  ADD KEY `fk_content_user_user_id_idx` (`user_id`);

--
-- Indexes for table `equipments`
--
ALTER TABLE `equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `equipment_gym`
--
ALTER TABLE `equipment_gym`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_equipment_gym_gym_id_idx` (`gym_id`),
  ADD KEY `fk_equipment_gym_equipment_id_idx` (`equipment_id`);

--
-- Indexes for table `gyms`
--
ALTER TABLE `gyms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personalinfos`
--
ALTER TABLE `personalinfos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shedules`
--
ALTER TABLE `shedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shedules_trainingtime_id_idx` (`trainingtime_id`),
  ADD KEY `fk_shedules_user_id_idx` (`user_id`),
  ADD KEY `fk_shedules_section_id_idx` (`section_id`),
  ADD KEY `fk_shedules_gim_id_idx` (`gym_id`);

--
-- Indexes for table `shedule_user`
--
ALTER TABLE `shedule_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shedule_user_user_id_idx` (`user_id`),
  ADD KEY `fk_shedule_user_shedule_id_idx` (`shedule_id`);

--
-- Indexes for table `trainingtimes`
--
ALTER TABLE `trainingtimes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_personalinfos_idx` (`personalinfo_id`),
  ADD KEY `fk_users_roles_idx` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binaryfiles`
--
ALTER TABLE `binaryfiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `binaryfile_user`
--
ALTER TABLE `binaryfile_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=137;

--
-- AUTO_INCREMENT for table `card_user`
--
ALTER TABLE `card_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=293;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=283;

--
-- AUTO_INCREMENT for table `content_user`
--
ALTER TABLE `content_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;

--
-- AUTO_INCREMENT for table `equipments`
--
ALTER TABLE `equipments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `equipment_gym`
--
ALTER TABLE `equipment_gym`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `gyms`
--
ALTER TABLE `gyms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personalinfos`
--
ALTER TABLE `personalinfos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=239;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `shedules`
--
ALTER TABLE `shedules`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `shedule_user`
--
ALTER TABLE `shedule_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=268;

--
-- AUTO_INCREMENT for table `trainingtimes`
--
ALTER TABLE `trainingtimes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=264;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binaryfile_user`
--
ALTER TABLE `binaryfile_user`
  ADD CONSTRAINT `fk_binaryfile_user_binaryfile_id` FOREIGN KEY (`binaryfile_id`) REFERENCES `binaryfiles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_binaryfile_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `card_user`
--
ALTER TABLE `card_user`
  ADD CONSTRAINT `fk_card_user_card_id` FOREIGN KEY (`card_id`) REFERENCES `cards` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_card_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `content_user`
--
ALTER TABLE `content_user`
  ADD CONSTRAINT `fk_content_user_content_id` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_content_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `equipment_gym`
--
ALTER TABLE `equipment_gym`
  ADD CONSTRAINT `fk_equipment_gym_equipment_id` FOREIGN KEY (`equipment_id`) REFERENCES `equipments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_equipment_gym_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `shedules`
--
ALTER TABLE `shedules`
  ADD CONSTRAINT `fk_shedules_gym_id` FOREIGN KEY (`gym_id`) REFERENCES `gyms` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shedules_section_id` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shedules_trainingtime_id` FOREIGN KEY (`trainingtime_id`) REFERENCES `trainingtimes` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shedules_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `shedule_user`
--
ALTER TABLE `shedule_user`
  ADD CONSTRAINT `fk_shedule_user_shedule_id` FOREIGN KEY (`shedule_id`) REFERENCES `shedules` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_shedule_user_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_personalinfos` FOREIGN KEY (`personalinfo_id`) REFERENCES `personalinfos` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_users_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
